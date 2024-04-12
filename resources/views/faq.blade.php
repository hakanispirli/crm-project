@extends('master')
@section('dashboard')
    <div class="dvanimation animate__animated p-6">
        <div>
            <div
                class="relative rounded-t-md bg-primary-light bg-[url('../images/knowledge/pattern.png')] bg-contain bg-left-top bg-no-repeat px-5 py-10 dark:bg-black md:px-10">
                <div
                    class="absolute -bottom-1 -end-6 hidden text-[#DBE7FF] rtl:rotate-y-180 dark:text-[#1B2E4B] lg:block xl:end-0">
                    <img src="{{ asset('assets/images/faq/faq.png') }}" class="w-56 object-cover xl:w-80" />
                </div>
                <div class="relative">
                    <div class="flex flex-col items-center justify-center sm:-ms-32 sm:flex-row xl:-ms-60">
                        <div class="mb-2 flex gap-1 text-end text-base leading-5 sm:flex-col xl:text-xl">
                            <span>Gelişmiş </span>
                            <span>Yönetim Sistemi</span>
                        </div>
                        <div class="me-4 ms-2 hidden text-[#0E1726] rtl:rotate-y-180 dark:text-white sm:block">
                            <svg width="111" height="22" viewBox="0 0 116 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-16 xl:w-28">
                                <path
                                    d="M0.645796 11.44C0.215273 11.6829 0.0631375 12.2287 0.305991 12.6593C0.548845 13.0898 1.09472 13.2419 1.52525 12.9991L0.645796 11.44ZM49.0622 20.4639L48.9765 19.5731L48.9765 19.5731L49.0622 20.4639ZM115.315 2.33429L105.013 3.14964L110.87 11.6641L115.315 2.33429ZM1.52525 12.9991C10.3971 7.99452 17.8696 10.3011 25.3913 13.8345C29.1125 15.5825 32.9505 17.6894 36.8117 19.2153C40.7121 20.7566 44.7862 21.7747 49.148 21.3548L48.9765 19.5731C45.0058 19.9553 41.2324 19.0375 37.4695 17.5505C33.6675 16.0481 30.0265 14.0342 26.1524 12.2143C18.4834 8.61181 10.3 5.99417 0.645796 11.44L1.52525 12.9991ZM49.148 21.3548C52.4593 21.0362 54.7308 19.6545 56.4362 17.7498C58.1039 15.8872 59.2195 13.5306 60.2695 11.3266C61.3434 9.07217 62.3508 6.97234 63.8065 5.35233C65.2231 3.77575 67.0736 2.6484 69.8869 2.40495L69.7326 0.62162C66.4361 0.906877 64.1742 2.26491 62.475 4.15595C60.8148 6.00356 59.703 8.35359 58.6534 10.5568C57.5799 12.8105 56.5678 14.9194 55.1027 16.5557C53.6753 18.1499 51.809 19.3005 48.9765 19.5731L49.148 21.3548ZM69.8869 2.40495C72.2392 2.2014 75.0889 2.61953 78.2858 3.35001C81.4816 4.08027 84.9116 5.09374 88.4614 6.04603C91.9873 6.99189 95.6026 7.86868 99.0694 8.28693C102.533 8.70483 105.908 8.67299 108.936 7.75734L108.418 6.04396C105.72 6.85988 102.621 6.91239 99.2838 6.50981C95.9496 6.10757 92.4363 5.25904 88.9252 4.31715C85.4382 3.38169 81.9229 2.34497 78.6845 1.60499C75.4471 0.865243 72.3735 0.393097 69.7326 0.62162L69.8869 2.40495Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <div class="mb-2 text-center text-2xl font-bold dark:text-white md:text-5xl">S.S.S.</div>
                    </div>
                    <p class="mb-9 text-center text-base font-semibold">
                        Dövme Stüdyolarına Özel Gelişmiş CRM Panel Hakkında Sorularınız Mı Var?
                    </p>
                </div>
            </div>
            <div x-data="{ tab: 'general' }">
                <div class="mb-12 flex items-center rounded-b-md bg-[#DBE7FF] dark:bg-[#141F31]">
                    <ul class="mx-auto flex items-center gap-5 overflow-auto whitespace-nowrap px-3 py-4.5 xl:gap-8">
                        <li>
                            <a href="javascript:"
                                class="group flex min-w-[120px] cursor-pointer flex-col items-center
                            justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690] duration-300
                            hover:bg-white hover:text-primary dark:hover:bg-[#1B2E4B]"
                                :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]': tab === 'general' }"
                                @click="tab = 'general'">
                                <img src="{{ asset('assets/images/faq/documentation.png') }}" width="32" height="32">
                                <h5 class="font-bold text-black dark:text-white">Genel</h5>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:"
                                class="group flex min-w-[120px] cursor-pointer flex-col items-center
                            justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690] duration-300
                            hover:bg-white hover:text-primary dark:hover:bg-[#1B2E4B]"
                                :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]': tab === 'pricing' }"
                                @click="tab = 'pricing'">
                                <img src="{{ asset('assets/images/faq/pricing.png') }}" width="32" height="32">
                                <h5 class="font-bold text-black dark:text-white">Fiyatlandırma</h5>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:"
                                class="group flex min-w-[120px] cursor-pointer flex-col items-center
                            justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690] duration-300
                            hover:bg-white hover:text-primary dark:hover:bg-[#1B2E4B]"
                                :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]': tab === 'lisans' }"
                                @click="tab = 'lisans'">
                                <img src="{{ asset('assets/images/faq/licence.png') }}" width="32" height="32">
                                <h5 class="font-bold text-black dark:text-white">Lisans</h5>
                            </a>
                        </li>
                    </ul>
                </div>
                <template x-if="tab === 'general'">
                    <div class="panel" style="padding-left: 130px; font-size: 17px;">
                        <h3 class="mb-5 text-xl font-bold text-success">Tattoo CRM Panel Nedir?</h3>
                        <div class="space-y-4" style="margin-bottom: 20px;">
                            <p>Tattoo CRM panel, dövme stüdyolarının ihtiyaçlarına yönelik özel olarak tasarlanmış bir
                                araçtır.
                                Bu panel, dövme stüdyolarının işlerini daha verimli bir şekilde yönetmelerine olanak tanır.
                            </p>
                            <p>
                                Dövme stüdyoları için özel olarak tasarlanmış olan CRM sistemimiz, işletmenizin tüm
                                yönlerini kusursuz bir şekilde yönetmenize olanak sağlar. Müşteri ilişkilerini güçlendirmek,
                                randevuları verimli bir şekilde planlamak, satışları takip etmek ve stok yönetimini
                                kolaylaştırmak için geliştirilmiş bir çözüm sunuyoruz. Sistemimizin sunduğu kapsamlı
                                özellikler arasında, yöneticilerin hatırlatıcı notlar oluşturmasına, müşterilerle
                                etkileşimde bulunmasına ve işletme verilerini derinlemesine analiz etmesine olanak tanıyan
                                bir notlar modülü bulunmaktadır.
                            </p>
                            <p>
                                Randevu yönetimi için geliştirilmiş olan Calendar.js entegrasyonu, yöneticilere esneklik ve
                                kolaylık sunar. Dövme sanatçılarının çalışma takvimlerini düzenlemelerini, müşteri
                                randevularını planlamalarını ve hatta dövme modellerini randevu oluştururken yüklemelerini
                                sağlar. Ayrıca, sistemimizdeki kayıt işlemleri modülü, müşteri, dövme sanatçısı ve sunulan
                                hizmetlerin detaylı bir şekilde kaydedilmesini ve izlenmesini sağlar. Bu sayede, yöneticiler
                                geçmiş çalışmaları hızlıca gözden geçirebilir ve müşteri ilişkilerini güçlendirir.
                            </p>
                            <p>
                                Ürün yönetimi ve stok takibi, dövme stüdyolarının operasyonlarını daha verimli hale getirir.
                                Sistemimiz, stüdyo ürünlerini kaydetmeyi, satışları takip etmeyi ve stok seviyelerini
                                otomatik olarak güncellemeyi sağlar. Satış yönetimi modülü, kayıtlı ürünlerin satış
                                kayıtlarını oluşturur ve işletme kazançlarını izler. Ayrıca, SMS entegrasyonu sayesinde
                                yöneticiler, randevu oluşturduklarında müşterilere otomatik bildirimler gönderebilir ve
                                iletişimi güçlendirir.
                            </p>
                            <p>
                                Bu kapsamlı CRM çözümüyle, dövme stüdyonuzun performansını artırın, müşteri memnuniyetini
                                yükseltin ve işletmenizi daha etkili bir şekilde yönetin.
                            </p>
                            <ul class="space-y-2 pl-5">
                                <li style="display: flex; align-items: center;">
                                    <img src="{{ asset('assets/images/faq/arrow.svg') }}" style="margin-right: 10px;">
                                    <strong>Notlar :</strong>
                                    Hatırlatıcı notlar oluşturun, düzenleyin ve silin. İş akışınızı organize edin ve takipte
                                    kalın.
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <img src="{{ asset('assets/images/faq/arrow.svg') }}" style="margin-right: 10px;">
                                    <strong>Randevular :</strong>
                                    Calendar.js ile güçlendirilmiş randevu yönetimi. Müşterilerinizle kolayca randevular
                                    oluşturun ve yönetin. Dövme modeli ekleyerek daha iyi planlama yapın.
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <img src="{{ asset('assets/images/faq/arrow.svg') }}" style="margin-right: 10px;">
                                    <strong>Kayıt İşlemleri :</strong>
                                    Müşteri, dövme sanatçısı ve hizmetlerinizi kaydedin. Geçmiş çalışmalarınızı gözden
                                    geçirin ve iş akışınızı optimize edin.
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <img src="{{ asset('assets/images/faq/arrow.svg') }}" style="margin-right: 10px;">
                                    <strong>Ürünler ve Stok Takibi :</strong>
                                    Stüdyo ürünlerini sisteme kaydedin ve stok takibini yapın. Satışlarınızı izleyin ve
                                    kazançlarınızı optimize edin.
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <img src="{{ asset('assets/images/faq/arrow.svg') }}" style="margin-right: 10px;">
                                    <strong>Satış Yönetimi :</strong>
                                    Kayıtlı ürünlerinizin satışlarını yönetin ve stok takibini yapın. Gelirinizi arttırın ve
                                    işletmenizi büyütün.
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <img src="{{ asset('assets/images/faq/arrow.svg') }}" style="margin-right: 10px;">
                                    <strong>SMS Entegrasyonu :</strong>
                                    Randevu oluşturulduğunda müşterilere otomatik SMS bildirimleri gönderin. İletişimi
                                    güçlendirin ve müşteri memnuniyetini artırın.
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <img src="{{ asset('assets/images/faq/arrow.svg') }}" style="margin-right: 10px;">
                                    <strong>Yönetici Yetkilendirme Sistemi :</strong>
                                    Spatie permission sistemi ile yönetici rollerini atayın ve yetkilendirme yapın. Güvenlik
                                    ve kontrolü elinizde tutun.
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <img src="{{ asset('assets/images/faq/arrow.svg') }}" style="margin-right: 10px;">
                                    <strong>Kontrol Paneli :</strong>
                                    Geçmiş randevu bilgilerini, kazançlarınızı ve diğer işlemlerinizi görüntüleyin.
                                    İşletmenizin performansını izleyin ve gelişim fırsatlarını keşfedin.
                                </li>
                            </ul>
                        </div>
                    </div>
                </template>
                <template x-if="tab === 'pricing'" id="baslangicIcerik">
                    <div class="flex justify-center items-center h-screen">
                        <div class="max-w-[320px] md:max-w-[1140px] mx-auto dark:text-white-dark">
                            <div class="md:flex space-y-4 md:space-y-0 mt-5 md:mt-16 text-white-dark">
                                <div class="relative p-4 pt-14 lg:p-9 border border-[#e0e6ed] dark:border-[#1b2e4b] transition-all duration-300 rounded-t-md">
                                    <div
                                        class="absolute top-0 md:-top-[30px] inset-x-0 bg-primary text-white h-10 flex items-center justify-center text-base rounded-t-md">
                                        Profesyonel Yönetim ve İletişim
                                    </div>
                                    <h3 class="text-xl mb-5 font-semibold text-[#0e1726] dark:text-white-light text-center">
                                        DÖVME STÜDYOLARINA ÖZEL
                                    </h3>
                                    <p class="text-center">Dövme stüdyoları için özel olarak tasarlanmış CRM sistemimiz,
                                        işletmenizin müşteri ilişkilerini kolaylaştırır, <br>
                                        randevuları yönetir, satışları izler ve stok takibini sağlar.</p>
                                    <div class="my-7 p-2.5 text-center text-lg">
                                        <strong class="text-primary text-xl lg:text-4xl">
                                            ₺ 4.299,00
                                        </strong> / YIL <br><br><p style="font-weight: bold;"> 6 Aya Kadar Taksit İmkanı</p>
                                    </div>
                                    <div class="mb-6 text-center">
                                        <strong class="text-[#0e1726] dark:text-white-light mb-3 inline-block"
                                            style="font-size: 18px;">
                                            Sistem Özellikleri
                                        </strong>
                                        <ul class="space-y-3" style="font-size: 15px;">
                                            <li><span class="pricing-item"></span> 7/24 Teknik Destek</li>
                                            <li><span class="pricing-item"></span> SMS Entegrasyonu</li>
                                            <li><span class="pricing-item"></span> Randevu Kayıt Sistemi</li>
                                            <li><span class="pricing-item"></span> Ürün Kayıt Sistemi</li>
                                            <li><span class="pricing-item"></span> Stok Takip Sistemi</li>
                                            <li><span class="pricing-item"></span> Gelir/Gider Takip Sistemi</li>
                                            <li><span class="pricing-item"></span> Not Yönetim Sistemi</li>
                                            <li><span class="pricing-item"></span> Yönetici Yetki Sistemi</li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('odeme.index') }}" type="button"
                                        class="btn btn-primary text-center block w-full">Satın Al</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <template x-if="tab === 'lisans'">
                    <div>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kullanıcı Adı</th>
                                        <th>Sipariş No</th>
                                        <th>Ödeme Tutarı</th>
                                        <th>Ödeme Durumu</th>
                                        <th class="text-center">Lisans Yenileme Tarihi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $payments = App\Models\Payment::all();
                                    @endphp
                                    @if ($payments->isEmpty())
                                        <tr>
                                            <td colspan="12">
                                                <div class="flex justify-center items-center h-full p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
                                                    <span class="ltr:pr-2 rtl:pl-2">
                                                        <strong class="ltr:mr-1 rtl:ml-1">
                                                            Kayıtlı Veri Bulunamadı!
                                                        </strong>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($payments as $index => $payment)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $payment->user->name }}</td>
                                                <td>{{ $payment->merchant_oid }}</td>
                                                <td>{{ $payment->amount }} TL</td>
                                                @if ($payment->status == 'success')
                                                    <td class="badge-outline-primary">Tamamlandı</td>
                                                @else
                                                    <td class="badge-outline-danger">Bekliyor</td>
                                                @endif
                                                <td class="text-center">{{ $payment->user->lisans_son_tarih }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </template>
            </div>

            <div class="panel mt-10 text-center md:mt-20">
                <h3 class="mb-2 text-xl font-bold dark:text-white md:text-2xl">Yardıma mı ihtiyacınız var?</h3>
                <div class="text-lg font-medium text-white-dark">
                    Uzmanlarımız her zaman yardımcı olmaktan mutluluk duyacaktır. Standart çalışma saatleri içinde bizimle
                    iletişime geçin veya 7/24 bize e-posta gönderin; size geri döneceğiz.
                </div>
                <div class="mt-8 flex flex-col items-center justify-center gap-6 sm:flex-row">
                    <a href="" class="btn btn-info">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"
                            style="padding-right: 5px;">
                            <path
                                d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                            <path
                                d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                        </svg>
                        İletişim Formu
                    </a>
                    <a href="" class="btn btn-info">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" style="padding-right: 5px;">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 14C18 18.4183 14.4183 22 10 22C8.76449 22 7.5944 21.7199 6.54976 21.2198C6.19071 21.0479 5.78393 20.9876 5.39939 21.0904L4.17335 21.4185C3.20701 21.677 2.32295 20.793 2.58151 19.8267L2.90955 18.6006C3.01245 18.2161 2.95209 17.8093 2.7802 17.4502C2.28008 16.4056 2 15.2355 2 14C2 9.58172 5.58172 6 10 6C14.4183 6 18 9.58172 18 14ZM6.5 15C7.05228 15 7.5 14.5523 7.5 14C7.5 13.4477 7.05228 13 6.5 13C5.94772 13 5.5 13.4477 5.5 14C5.5 14.5523 5.94772 15 6.5 15ZM10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15ZM13.5 15C14.0523 15 14.5 14.5523 14.5 14C14.5 13.4477 14.0523 13 13.5 13C12.9477 13 12.5 13.4477 12.5 14C12.5 14.5523 12.9477 15 13.5 15Z"
                                fill="currentColor"></path>
                            <path opacity="0.6"
                                d="M17.9842 14.5084C18.0921 14.4638 18.1986 14.4163 18.3035 14.3661C18.5952 14.2264 18.9257 14.1774 19.2381 14.261L20.2343 14.5275C21.0194 14.7376 21.7377 14.0193 21.5277 13.2342L21.2611 12.238C21.1775 11.9256 21.2266 11.595 21.3662 11.3033C21.7726 10.4545 22.0001 9.50385 22.0001 8.5C22.0001 4.91015 19.09 2 15.5001 2C12.7901 2 10.4674 3.6585 9.4917 6.0159C9.65982 6.00535 9.82936 6 10.0001 6C14.4184 6 18.0001 9.58172 18.0001 14C18.0001 14.1708 17.9948 14.3403 17.9842 14.5084Z"
                                fill="currentColor"></path>
                        </svg>WhatsApp Destek
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("collapse", () => ({
                collapse: false,

                collapseSidebar() {
                    this.collapse = !this.collapse;
                },
            }));

            Alpine.data("dropdown", (initialOpenState = false) => ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    </script>
@endsection
