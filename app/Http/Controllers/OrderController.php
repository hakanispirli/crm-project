<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Satis;
use App\Models\Product;
use App\Models\Customers;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function Orders()
    {
        $product = Product::all();
        $customer = Customers::all();
        $brand = Brand::all();
        $order = Order::all();
        $cartTotal = Cart::total();
        return view('order.orders', compact('order','customer','brand','product','cartTotal'));
    }

    public function Fiyatlandirma()
    {
        return view('order.fiyatlandirma');
    }

    public function siparisOlustur()
    {
        if (Cart::total() > 0) {
            $customers = Customers::all();
            $brand = Brand::all();
            $carts = Cart::content();
            $cartTotal = Cart::total();
            $cartQty = Cart::count();

            return view('order.siparis_olustur', compact('customers','brand','carts','cartTotal','cartQty'));
        } else{

            $notification = array(
                'message' => 'Lütfen En Az Bir Ürün Seçiniz!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function AddToCart(Request $request, $id)
    {
        $product = Product::find($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {
            return response()->json(['error' => 'Ürün Zaten Seçildi']);
        }

            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'weight' => 1,
                'options' => ['brand_id' => $product->brand_id]
            ]);


        return response()->json(['success' => 'Ürün Seçildi']);
    }

    public function GetCartProduct()
    {
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));
    }

    public function CartData()
    {
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));
    }

    public function RemoveCart($rowId)
    {
        Cart::remove($rowId);

        return response()->json(['success' => 'Ürün Silindi']);
    }

    public function StokUygula(Request $request, $rowId)
    {
        $action = $request->input('action');
        $cartItem = Cart::get($rowId);

        if (!$cartItem) {
            return response()->json(['error' => 'Ürün bulunamadı']);
        }

        if ($action === 'increase') {
            Cart::update($rowId, $cartItem->qty + 1);
        } elseif ($action === 'decrease') {
            if ($cartItem->qty > 1) {
                Cart::update($rowId, $cartItem->qty - 1);
            }
        }

        // Sepet bilgilerini yeniden hesapla
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        return response()->json([
            'success' => 'Stok güncellendi',
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ]);
    }

    public function SatisOlustur(Request $request)
    {
        // Önce stoktan düşülecek ürünlerin miktarını hesapla
        $soldQuantities = $request->qty;

        // Stoktan düşülecek ürünleri işle
        foreach($soldQuantities as $index => $soldQty) {
            $productId = $request->product_id[$index];

            // İlgili ürünü bul
            $product = Product::find($productId);

            // Stoktan düş
            $product->stock -= $soldQty;
            $product->save();
        }

        $carts = Cart::content();
        $total_amount = Cart::total();

        foreach ($carts as $cartItem) {
            $total_amount += $cartItem->total_price;
        }

        // Yeni bir satış kaydı oluştur
        $satis = new Satis();
        $satis->customer_id = $request->customer_id;
        $satis->payment_type = $request->payment_type;
        $satis->toplam_satis_tutari = $total_amount;
        $satis->invoice_no = 'TATTOO' . mt_rand(10000000, 99999999);
        $satis->order_date = Carbon::now()->locale('tr_TR')->isoFormat('DD MMMM YYYY');
        $satis->order_month = Carbon::now()->locale('tr_TR')->isoFormat('MMMM');
        $satis->order_year = Carbon::now()->locale('tr_TR')->isoFormat('YYYY');
        $satis->save();

        // Her bir ürün için sipariş oluştur
        foreach ($carts as $cartItem) {
            $order = new Order();
            $order->customer_id = $request->customer_id;
            $order->product_id = $cartItem->id;
            $order->brand_id = $cartItem->options->brand_id;
            $order->quant = $cartItem->qty;
            $order->selling_price = $cartItem->price;
            $order->total_price = $cartItem->total_price;
            $order->save();
        }

        // Sepeti boşalt
        Cart::destroy();

        $notification = array(
            'message' => 'Satış Başarılı Şekilde Oluşturuldu.',
            'alert-type' =>'success'
        );
        return redirect()->route('orders')->with($notification);
    }
}
