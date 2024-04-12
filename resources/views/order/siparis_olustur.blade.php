@extends('master')
@section('dashboard')
    <div class="mb-5 mt-5">
        <div class="inline-block w-full">
            <ul class="mb-5 grid grid-cols-3">
                <li>
                    <a href="javascript:;" class="text-primary">
                        <div class="bg-[#f3f2ee] dark:bg-[#1b2e4b] flex justify-center items-center p-2.5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </div>
                        <span class="text-center block mt-2">Ürünler</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="text-primary">
                        <div class="bg-[#f3f2ee] dark:bg-[#1b2e4b] flex justify-center items-center p-2.5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </div>
                        <span class="text-center block mt-2">Fiyatlandırma</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="text-primary">
                        <div class="bg-[#f3f2ee] dark:bg-[#1b2e4b] flex justify-center items-center p-2.5 rounded-full"
                            :class="'!bg-primary text-white'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                            </svg>
                        </div>
                        <span class="text-center block mt-2">Sipariş Oluştur</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <form action="{{ route('satis.olustur') }}" method="POST">
        @csrf
        <div class="mb-5 grid grid-cols-3 gap-5">
            <div class="panel col-span-3 lg:col-span-2">
                <div class="mb-5">
                    <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-2">
                        <div class="mb-2 ml-3 mr-3">
                            <label>Müşteri</label>
                            <select id="aranabilir_select" name="customer_id">
                                <option selected disabled>Lütfen bir müşteri seçiniz</option>
                                @foreach ($customers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-white-dark text-xs">Müşteri Kayıtlı Değilse <a href="{{ route('customers') }}" class="text-primary">Buraya</a> Tıklayarak Önce Müşteri Kaydı Yapınız.</span>
                        </div>
                        <div class="mb-2 ml-3 mr-3">
                            <label>Ürünlerin Toplam Satış Fiyatı</label>
                            <input type="text" class="form-input" name="total_price" required>
                            <span class="text-white-dark text-xs">Fiyat Girerken Noktalama İşareti Kullanmayın! Örn;"15000"</span>
                        </div>
                        <div class="mb-2 ml-3 mr-3">
                            <label>Ödeme Yöntemi</label>
                            <select name="payment_type" class="form-select text-white-dark">
                                <option value="{{ \App\Enums\PaymentType::CASH }}">Nakit</option>
                                <option value="{{ \App\Enums\PaymentType::CREDIT_CARD }}">Kredi Kartı</option>
                                <option value="{{ \App\Enums\PaymentType::BANK_TRANSFER }}">Havale</option>
                            </select>
                            <span class="text-white-dark text-xs">Alınan Ödeme Türünü Seçiniz.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel col-span-3 lg:col-span-1">
                <div class="mb-5">
                    <h5 class="mb-4 text-lg font-semibold">Toplam Tutar</h5>
                </div>

                <ul>
                    @foreach ($carts as $item)
                        <li class="flex items-start justify-between">
                            {{ $item->name }}
                            <span class="font-bold text-[#515365]"> X{{ $item->qty }} </span>
                            <span class="font-bold text-[#515365]"> {{ $item->price }} TL</span>
                        </li>
                        <input type="hidden" name="product_id[]" value="{{ $item->id }}">
                        <input type="hidden" name="brand_id[]" value="{{ $item->options->brand_id }}">
                        <input type="hidden" name="name[]" value="{{ $item->name }}">
                        <input type="hidden" name="qty[]" value="{{ $item->qty }}">
                        <input type="hidden" name="price[]" value="{{ $item->price }}">
                    @endforeach
                </ul>

                <div class="mb-5 mt-3">
                    <div class="border-b border-[#ebedf2] dark:border-[#1b2e4b]">
                    </div>
                </div>
                <div class="flex items-start justify-between py-3">
                    <span class="text-[15px] font-bold text-[#515365] dark:text-white-dark">
                        Toplam Alış Tutarı
                    </span>
                    <div class="flex items-end justify-end ltr:ml-auto rtl:mr-auto">
                        <span id="cartSubTotal" class="mt-1 block text-lg font-bold text-white-dark dark:text-white-light">

                        </span>
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                    <button type="submit" class="btn btn-lg btn-primary">Satış İşlemini Tamamla</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function(e) {
            var options = {
                searchable: true
            };
            NiceSelect.bind(document.getElementById("aranabilir_select"), options);
        });
    </script>
@endsection
