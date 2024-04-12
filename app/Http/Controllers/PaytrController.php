<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaytrController extends Controller
{
    public function OdemeIndex()
    {
        return view('paytr.odeme');
    }

    public function OkUrl()
    {
        return view('paytr.ok_url');
    }

    public function FailUrl()
    {
        return view('paytr.fail_url');
    }

    public function OdemeSonuc(Request $request){

        $data =request()->all();
        $merchant_id    = env('PAYTR_MERCHANT_ID');
        $merchant_key   = env('PAYTR_MERCHANT_KEY');
        $merchant_salt  = env('PAYTR_MERCHANT_SALT');

        $random_id = "11".rand(1,999).rand(1,88)*rand(1,50);
        $email = $data['email'];
        $payment_amount = $data['product_price']*100;
        $merchant_oid = $random_id;
        $user_name = $data['name'] . " " . $data['surname'];
        $user_address = $data['address'] . " " . $data['town'] . "/" . $data['city'];
        $user_phone = $data['phone'];
        $merchant_ok_url = route('odeme.basarili');
        $merchant_fail_url = route('odeme.hata');
        $user_basket = base64_encode(json_encode(array(
            array($data['product_name'], $data['product_price'], $data['product_quantity'])
        )));

        ## Kullanıcının IP adresi
        if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
        $user_ip=$ip;
        $timeout_limit = "5";
        $debug_on = 1;
        $test_mode = 0;
        $no_installment = 0;
        $max_installment = 3;

        $currency = "TL";
        $hash_str = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment.$currency.$test_mode;
        $paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
        $data_vals=array(
            'merchant_id'=>$merchant_id,
            'user_ip'=>$user_ip,
            'merchant_oid'=>$merchant_oid,
            'email'=>$email,
            'payment_amount'=>$payment_amount,
            'paytr_token'=>$paytr_token,
            'user_basket'=>$user_basket,
            'debug_on'=>$debug_on,
            'no_installment'=>$no_installment,
            'max_installment'=>$max_installment,
            'user_name'=>$user_name,
            'user_address'=>$user_address,
            'user_phone'=>$user_phone,
            'merchant_ok_url'=>$merchant_ok_url,
            'merchant_fail_url'=>$merchant_fail_url,
            'timeout_limit'=>$timeout_limit,
            'currency'=>$currency,
            'test_mode'=>$test_mode
        );

        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1) ;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_vals);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        $result = @curl_exec($ch);

        if(curl_errno($ch))
            die("PAYTR IFRAME connection error. err:".curl_error($ch));

        curl_close($ch);

        $result=json_decode($result,1);

        if ($result['status'] == 'success') {
            $payment = new Payment();
            $payment->user_id = Auth::id();
            $payment->merchant_oid = $merchant_oid;
            $payment->ip_address = $user_ip;
            $payment->amount = $payment_amount / 100;
            $payment->status = 'success';
            $payment->save();

            $user = Auth::user();
            $user->lisans_son_tarih = now()->addYear();
            $user->save();

            // Token'i view'a gönder
            $token = $result['token'];
            return view("odeme.sonuc", compact("token"));
        } else {
            die("PAYTR IFRAME failed. reason:" . $result['reason']);
        }
    }

    public function bildirim(Request $request)
    {
        $data = request()->all();
        $merchant_key   = env('PAYTR_MERCHANT_KEY');
        $merchant_salt  = env('PAYTR_MERCHANT_SALT');
        $hash = base64_encode( hash_hmac('sha256', $data['merchant_oid'].$merchant_salt.$data['status'].$data['total_amount'], $merchant_key, true) );

        if( $hash != $data['hash'] )
            die('PAYTR notification failed: bad hash');

        ## BURADA YAPILMASI GEREKENLER
        ## 1) Siparişin durumunu $data['merchant_oid'] değerini kullanarak veri tabanınızdan sorgulayın.
        ## 2) Eğer sipariş zaten daha önceden onaylandıysa veya iptal edildiyse  echo "OK"; exit; yaparak sonlandırın.

        /* Sipariş durum sorgulama örnek
           $durum = SQL
           if($durum == "onay" || $durum == "iptal"){
                echo "OK";
                exit;
            }
         */

        if( $data['status'] == 'success' ) { ## Ödeme Onaylandı

            ## BURADA YAPILMASI GEREKENLER
            ## 1) Siparişi onaylayın.
            ## 2) Eğer müşterinize mesaj / SMS / e-posta gibi bilgilendirme yapacaksanız bu aşamada yapmalısınız.
            ## 3) 1. ADIM'da gönderilen payment_amount sipariş tutarı taksitli alışveriş yapılması durumunda
            ## değişebilir. Güncel tutarı $data['total_amount'] değerinden alarak muhasebe işlemlerinizde kullanabilirsiniz.

        } else { ## Ödemeye Onay Verilmedi

            ## BURADA YAPILMASI GEREKENLER
            ## 1) Siparişi iptal edin.
            ## 2) Eğer ödemenin onaylanmama sebebini kayıt edecekseniz aşağıdaki değerleri kullanabilirsiniz.
            ## $data['failed_reason_code'] - başarısız hata kodu
            ## $data['failed_reason_msg'] - başarısız hata mesajı

        }

        ## Bildirimin alındığını PayTR sistemine bildir.
        echo "OK";
        exit;

    }
}
