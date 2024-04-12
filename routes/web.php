<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaytrController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\LockScreenController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'Index'])->name('admin.login');

Route::get('/dashboard', 'App\Http\Controllers\IndexController@Dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () { 
    // Notlar
    Route::get('/notes', [NoteController::class, 'showNotesView'])->name('all.notes')->middleware('permission:notlar.menu');
    Route::get('/api/notes', [NoteController::class, 'notes']);
    Route::post('/api/notes', [NoteController::class, 'store']);
    Route::get('/api/notes/{id}', [NoteController::class, 'show']);
    Route::put('/api/notes/{id}', [NoteController::class, 'update']);
    Route::delete('/api/notes/{id}', [NoteController::class, 'destroy']);

    Route::get('/logout', [IndexController::class, 'Logout'])->name('admin.logout');
    Route::get('/profile', [IndexController::class, 'Profile'])->name('profile');
    Route::post('/profile/store', [IndexController::class, 'ProfileStore'])->name('profile.store');
    Route::post('/profile/password', [IndexController::class, 'ChangePassword'])->name('profile.password');

    //API Randevu
    Route::get('/api/appointments/get', [AppointmentController::class, 'get'])->name('api.appointments.get')->middleware('permission:randevular.menu');
    Route::get('/api/appointments/view', [AppointmentController::class, 'view'])->name('api.appointments.view')->middleware('permission:randevular.menu');
    Route::post('/api/appointments/store', [AppointmentController::class, 'store'])->name('api.appointment.store');
    Route::put('/api/appointments/update/{id}', [AppointmentController::class, 'update'])->name('api.appointment.update');

    // Post Randevu
    Route::get('/randevu/listesi', [AppointmentController::class, 'RandevuListesi'])->name('randevu.listesi')->middleware('permission:randevular.menu');
    Route::get('/randevu/listesi/get', [AppointmentController::class, 'RandevuListesiGet'])->name('randevu.listesi.get');
    Route::get('/randevu/detay/{id}', [AppointmentController::class, 'RandevuDetay'])->name('randevu.detay');

    // müşteriler
    Route::get('/customers/customers', [CustomersController::class, 'Customers'])->name('customers')->middleware('permission:musteriler.menu');
    Route::get('/customers/customers/all', [CustomersController::class, 'allCustomers'])->middleware('permission:musteriler.menu');
    Route::post('/customers/customers/add', [CustomersController::class, 'AddCustomers'])->name('add.customers');
    Route::get('/customers/edit/{id}', [CustomersController::class, 'EditCustomer'])->name('edit.customers');
    Route::post('/customers/update', [CustomersController::class, 'UpdateCustomer'])->name('update.customers');
    Route::delete('/customers/delete/{id}', [CustomersController::class, 'DeleteCustomer'])->name('delete.customers');

    // Ürünler
    Route::get('/products', [ProductController::class, 'Products'])->name('products')->middleware('permission:urunler.menu');
    Route::get('/products/get', [ProductController::class, 'GetProduct'])->middleware('permission:urunler.menu');
    Route::get('/products/add', [ProductController::class, 'AddProducts'])->name('add.products');
    Route::post('/products/store', [ProductController::class, 'StoreProduct'])->name('store.products');
    Route::get('/products/edit/{id}', [ProductController::class, 'EditProduct'])->name('edit.products');
    Route::post('/products/update', [ProductController::class, 'UpdateProduct'])->name('update.products');
    Route::delete('/products/delete/{id}', [ProductController::class, 'DeleteProduct'])->name('delete.products');
    Route::post('/brand/store', [ProductController::class, 'StoreBrand'])->name('store.brand');

    // Siparişler
    Route::controller(OrderController::class)->group(function(){
        Route::get('/orders','Orders')->name('orders')->middleware('permission:satis.menu');
        Route::get('/add-product-cart','GetCartProduct');
        Route::get('/cart/remove/{rowId}', 'RemoveCart');
    });

    Route::get('/fiyatlandirma', [OrderController::class, 'Fiyatlandirma'])->name('fiyatlandirma')->middleware('permission:satis.menu');
    Route::get('/siparis-olustur', [OrderController::class, 'SiparisOlustur'])->name('siparis.olustur')->middleware('permission:satis.menu');
    Route::post('/cart/data/store/{id}', [OrderController::class, 'AddToCart']);
    Route::get('/cart/data/', [OrderController::class, 'CartData']);
    Route::post('/stok/uygula/{id}', [OrderController::class, 'StokUygula']);
    Route::post('/satis/olustur', [OrderController::class, 'SatisOlustur'])->name('satis.olustur');

    // Sanatçılar
    Route::get('/artist', [ArtistController::class, 'Artist'])->name('artist')->middleware('permission:sanatcilar.menu');
    Route::get('/artist/all', [ArtistController::class, 'AllArtist']);
    Route::post('/artist/add', [ArtistController::class, 'AddArtist'])->name('add.artist');
    Route::get('/artist/edit/{id}', [ArtistController::class, 'EditArtist'])->name('edit.artist');
    Route::post('/artist/update', [ArtistController::class, 'UpdateArtist'])->name('update.artist');
    Route::delete('/artist/delete/{id}', [ArtistController::class, 'DeleteArtist'])->name('delete.artist');

    // Hizmetler
    Route::get('/services/view', [ServicesController::class, 'ServicesView'])->name('services.view')->middleware('permission:hizmetler.menu');
    Route::get('/services/get', [ServicesController::class, 'ServicesGet']);
    Route::post('/services/add', [ServicesController::class, 'ServicesAdd'])->name('services.add');
    Route::get('/services/edit/{id}', [ServicesController::class, 'ServicesEdit'])->name('services.edit');
    Route::post('/services/update', [ServicesController::class, 'ServicesUpdate'])->name('services.update');
    Route::delete('/services/delete/{id}', [ServicesController::class, 'ServicesDelete'])->name('services.delete');

    // İzinler
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission','AllPermission')->name('all.permission');
        Route::get('/get/permissions','GetPermission')->name('get.permission');
        Route::post('/add/permission','AddPermission')->name('add.permission');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission');
        Route::post('/update/permission','UpdatePermission')->name('update.permission');
        Route::delete('/delete/permission/{id}','DeletePermission')->name('delete.permission');
    });

    // Roller
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles','AllRoles')->name('all.roles');
        Route::get('/get/role','GetRole')->name('get.role');
        Route::post('/add/roles','AddRoles')->name('add.roles');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles');
        Route::post('/update/roles','UpdateRoles')->name('update.roles');
        Route::delete('/delete/roles/{id}','DeleteRoles')->name('delete.roles');
    });

    // Roller ve İzinler
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles/permission','AllRolesPermission')->name('all.roles.permission');
        Route::get('/get/roles/permission','GetRolesPermission')->name('get.roles.permission');
        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store','RolePermissionStore')->name('role.permission.store');
        Route::get('/edit/roles/permission/{id}','EditRolesPermission')->name('edit.roles.permission');
        Route::post('/update/roles/permission/{id}','UpdateRolesPermission')->name('update.roles.permission');
        Route::delete('/delete/roles/permission/{id}','DeleteRolesPermission')->name('delete.roles.permission');
    });

    // Yöneticiler
    Route::controller(RoleController::class)->group(function(){
        Route::get('/yoneticiler','Yoneticiler')->name('yoneticiler');
        Route::get('/get/yoneticiler','GetYoneticiler')->name('get.yoneticiler');
        Route::post('/yonetici/ekle','YoneticiEkle')->name('yonetici.ekle');
        Route::get('/yonetici/duzenle/{id}','YoneticiDuzenle')->name('yonetici.duzenle');
        Route::post('/yonetici/update/{id}','YoneticiUpdate')->name('yonetici.update');
        Route::delete('/yonetici/sil/{id}','YoneticiSil')->name('yonetici.sil');
    });

    // SMS
    Route::get('/sms/information', [SmsController::class, 'SmsInformation'])->name('sms.information')->middleware('permission:sms.menu');
    Route::get('/sms/template', [SmsController::class, 'SmsTemplate'])->name('sms.template')->middleware('permission:sms.menu');
    Route::post('/sms/template/update', [SmsController::class, 'UpdateSmsTemplate'])->name('sms.template.update')->middleware('permission:sms.menu');

    // Lock Screen
    Route::get('/lockscreen', [LockScreenController::class, 'showLockScreenForm'])->name('lockscreen');
    Route::post('/lockscreen/unlock', [LockScreenController::class, 'unlock'])->name('lockscreen.unlock');

    // FAQ
    Route::get('/faq', [IndexController::class, 'Faq'])->name('faq');

    // Grafikler
    Route::get('/sales/brand', [IndexController::class, 'SalesBrand'])->name('sales.brand');

    // PAYTR
    Route::get('/odeme/index', [PaytrController::class, 'OdemeIndex'])->name('odeme.index');
    Route::post('/odeme/sonuc', [PaytrController::class, 'OdemeSonuc'])->name('odeme.sonuc');

    Route::get('/odeme/basarili', [PaytrController::class, 'OkUrl'])->name('odeme.basarili');
    Route::get('/odeme/hata', [PaytrController::class, 'FailUrl'])->name('odeme.hata');

});

require __DIR__.'/auth.php';
