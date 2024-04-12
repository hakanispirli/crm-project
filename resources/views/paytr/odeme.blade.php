@extends('master')
@section('dashboard')
    <div class="dvanimation animate__animated p-6">
        <div x-data="mesafeliSatisSozlesmesiModal" class="mb-5">
            <div class="fixed inset-0 bg-[black]/60 z-[999]  hidden" :class="open && '!block'">
                <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                    <div x-show="open" x-transition x-transition.duration.300
                        class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-5xl my-8 max-h-500">
                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3"
                            id="scrollableModalContent">
                            <h5 class="font-bold text-lg">Mesafeli Satış Sözleşmesi</h5>
                            <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-6 w-6">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <div class="p-5">
                            <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                <p><strong>1. TARAFLAR</strong></p>
                                <p>
                                    İşbu Sözleşme aşağıdaki taraflar arasında aşağıda belirtilen hüküm ve şartlar
                                    çerçevesinde imzalanmıştır.
                                </p>
                                <p>
                                    • “ALICI” ; (sözleşmede bundan sonra “ALICI” olarak anılacaktır)<br>
                                    AD- SOYAD:<br>
                                    ADRES:<br>
                                </p>
                                <p>
                                    • “SATICI” ; (sözleşmede bundan sonra “SATICI” olarak anılacaktır)<br>
                                    AD- SOYAD:<br>
                                    ADRES:<br>
                                </p>
                                <p>
                                    İş bu sözleşmeyi kabul etmekle ALICI, sözleşme konusu siparişi onayladığı takdirde
                                    sipariş konusu bedeli ve varsa kargo ücreti, vergi gibi belirtilen ek ücretleri ödeme
                                    yükümlülüğü altına gireceğini ve bu konuda bilgilendirildiğini peşinen kabul eder.
                                </p><br>
                                <p><strong>2. TANIMLAR</strong></p>
                                <p>
                                    İşbu sözleşmenin uygulanmasında ve yorumlanmasında aşağıda yazılı terimler
                                    karşılarındaki yazılı açıklamaları ifade edeceklerdir.<br>
                                    BAKAN: Gümrük ve Ticaret Bakanı’nı,<br>
                                    BAKANLIK: Gümrük ve Ticaret Bakanlığı’nı,<br>
                                    KANUN: 6502 sayılı Tüketicinin Korunması Hakkında Kanun’u,<br>
                                    YÖNETMELİK: Mesafeli Sözleşmeler Yönetmeliği’ni (RG:27.11.2014/29188)<br>
                                    HİZMET: Bir ücret veya menfaat karşılığında yapılan ya da yapılması taahhüt edilen mal
                                    sağlama dışındaki her türlü tüketici işleminin konusunu ,<br>
                                    SATICI: Ticari veya mesleki faaliyetleri kapsamında tüketiciye mal sunan veya mal sunan
                                    adına veya hesabına hareket eden şirketi,<br>
                                    ALICI: Bir mal veya hizmeti ticari veya mesleki olmayan amaçlarla edinen, kullanan veya
                                    yararlanan gerçek ya da tüzel kişiyi,<br>
                                    SİTE: SATICI’ya ait internet sitesini,<br>
                                    SİPARİŞ VEREN: Bir mal veya hizmeti SATICI’ya ait internet sitesi üzerinden talep eden
                                    gerçek ya da tüzel kişiyi,<br>
                                    TARAFLAR: SATICI ve ALICI’yı,<br>
                                    SÖZLEŞME: SATICI ve ALICI arasında akdedilen işbu sözleşmeyi,<br>
                                    MAL: Alışverişe konu olan taşınır eşyayı ve elektronik ortamda kullanılmak üzere
                                    hazırlanan yazılım, ses, görüntü ve benzeri gayri maddi malları ifade eder.<br>
                                </p><br>
                                <p><strong>3. KONU</strong></p>
                                <p>
                                    İşbu Sözleşme, ALICI’nın, SATICI’ya ait internet sitesi üzerinden elektronik ortamda
                                    siparişini verdiği aşağıda nitelikleri ve satış fiyatı belirtilen ürünün satışı ve
                                    teslimi ile ilgili olarak 6502 sayılı Tüketicinin Korunması Hakkında Kanun ve Mesafeli
                                    Sözleşmelere Dair Yönetmelik hükümleri gereğince tarafların hak ve yükümlülüklerini
                                    düzenler.<br>
                                    Listelenen ve sitede ilan edilen fiyatlar satış fiyatıdır. İlan edilen fiyatlar ve
                                    vaatler güncelleme yapılana ve değiştirilene kadar geçerlidir. Süreli olarak ilan edilen
                                    fiyatlar ise belirtilen süre sonuna kadar geçerlidir.<br>
                                    Malın /Ürün/Ürünlerin/ Hizmetin temel özelliklerini (türü, miktarı, marka/modeli, rengi,
                                    adedi) SATICI’ya ait internet sitesinde yayınlanmaktadır. Satıcı tarafından kampanya
                                    düzenlenmiş ise ilgili ürünün temel özelliklerini kampanya süresince inceleyebilirsiniz.
                                    Kampanya tarihine kadar geçerlidir.<br>
                                    Listelenen ve sitede ilan edilen fiyatlar satış fiyatıdır. İlan edilen fiyatlar ve
                                    vaatler güncelleme yapılana ve değiştirilene kadar geçerlidir. Süreli olarak ilan edilen
                                    fiyatlar ise belirtilen süre sonuna kadar geçerlidir.<br>
                                    Sözleşme konusu mal ya da hizmetin tüm vergiler dâhil satış fiyatı aşağıda
                                    gösterilmiştir.<br>
                                </p>
                                <p>
                                <table border="1">
                                    <tr>
                                        <th>Sözleşme Konusu Ürün/Ürünler Bilgileri</th>
                                        <th>Adet</th>
                                        <th>Birim Fiyat</th>
                                        <th>Ara Toplam (KDV Dahil)</th>
                                    </tr>
                                    <tr>
                                        <td>Kargo Tutarı:</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Toplam:</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                                </p>
                                <p><strong>4. Fesih</strong></p>
                                <p>
                                    - Taraflardan biri, ... (fesih koşulları ve prosedürleri hakkında açıklama yapılabilir)
                                    ...
                                </p>
                            </div>
                            <div class="flex justify-end items-center mt-8">
                                <button type="button" class="btn btn-outline-danger" @click="toggle">Kapat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <div class="mb-2 text-center text-2xl font-bold dark:text-white md:text-5xl">Ödeme</div>
                    </div>
                    <p class="mb-9 mt-5 text-center text-base font-semibold">
                        Fatura bilgilerinizi girdikten sonra PAYTR güvenli ödeme sayfasına yönlendirileceksiniz.
                    </p>
                </div>
            </div>
            <div class="mb-12 flex items-center rounded-b-md bg-[#DBE7FF] dark:bg-[#141F31]">
                <ul class="mx-auto flex items-center gap-5 overflow-auto whitespace-nowrap px-3 py-4.5 xl:gap-8">
                    <li>
                        <a href="#"
                            class="group flex min-w-[120px] cursor-pointer flex-col items-center justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690] duration-300 hover:bg-white hover:text-primary dark:hover:bg-[#1B2E4B]"
                            :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]': tab === 'general' }">
                            <img src="{{ asset('assets/images/faq/documentation.png') }}" width="32" height="32">
                            <h5 class="font-bold text-black dark:text-white">Genel</h5>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group flex min-w-[120px] cursor-pointer flex-col items-center justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690] duration-300 hover:bg-white hover:text-primary dark:hover:bg-[#1B2E4B]"
                            :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]': tab === 'pricing' }">
                            <img src="{{ asset('assets/images/faq/pricing.png') }}" width="32" height="32">
                            <h5 class="font-bold text-black dark:text-white">Fiyatlandırma</h5>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group flex min-w-[120px] cursor-pointer flex-col items-center justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690] duration-300 hover:bg-white hover:text-primary dark:hover:bg-[#1B2E4B]"
                            :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]': tab === 'lisans' }">
                            <img src="{{ asset('assets/images/faq/licence.png') }}" width="32" height="32">
                            <h5 class="font-bold text-black dark:text-white">Lisans</h5>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="flex justify-center items-center">
                <div class="mx-auto dark:text-white-dark">
                    <div class="md:flex space-y-4 md:space-y-0 mt-5 md:mt-16 text-white-dark">
                        <div
                            class="relative p-4 pt-14 lg:p-9 border border-[#e0e6ed] dark:border-[#1b2e4b] transition-all duration-300 rounded-t-md">
                            <form class="space-y-6" action="{{ route('odeme.sonuc') }}" method="post" id="paymentForm"
                                style="padding-bottom: 60px;">
                                @csrf
                                <input type="hidden" name="product_name" value="Webmarka Tattoo CRM Sistem">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_price" value="4299">

                                <div
                                    class="absolute top-0 md:-top-[30px] inset-x-0 bg-primary text-white h-10 flex items-center justify-center text-base rounded-t-md">
                                    Fatura Bilgileri
                                </div>
                                <div class="table-responsive mt-6">
                                    <table class="table-striped">
                                        <thead>
                                            <tr>
                                                <th>Ürün Adı</th>
                                                <th>Ürün Adedi</th>
                                                <th class="ltr:text-right rtl:text-left">Ürün Fiyatı</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Webmarka Tattoo CRM Sistem</td>
                                                <td>1</td>
                                                <td class="ltr:text-right rtl:text-left">4.299,00 TL</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-6 grid grid-cols-1 px-4 sm:grid-cols-2">
                                    <div></div>
                                    <div class="space-y-2 ltr:text-right rtl:text-left">
                                        <div class="flex items-center text-lg font-semibold">
                                            <div class="flex-1">Toplam (KDV Dahil): </div>
                                            <div class="w-[37%]">4.299,00 TL</div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-6 border-[#e0e6ed] dark:border-[#1b2e4b]" />
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="mb-3 form-group">
                                        <label for="name">Ad *</label>
                                        <input type="text" name="name" id="name"
                                            placeholder="Adınızı Giriniz" class="form-input" />
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="surname">Soyad *</label>
                                        <input type="text" name="surname" id="surname"
                                            placeholder="Soyadınızı Giriniz" class="form-input" />
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="email">E-Posta Adresiniz *</label>
                                        <input type="email" name="email" id="email"
                                            placeholder="E-Posta Adresiniz" class="form-input" />
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="phone">Telefon *</label>
                                        <input type="tel" name="phone" id="phone"
                                            placeholder="Telefon Numaranız" class="form-input" />
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="city">İl *</label>
                                        <input type="text" name="city" id="city"
                                            placeholder="Bulunduğunuz İl" class="form-input" />
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="town">İlçe *</label>
                                        <input type="text" name="town" placeholder="Bulunduğunuz İlçe"
                                            class="form-input" />
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="address">Adresiniz *</label>
                                        <textarea name="address" id="address" placeholder="Adresinizi Giriniz" class="form-input"></textarea>
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label class="text-white-dark text-[16px] inline-block">* Gerekli
                                            Alanlar</label><br>
                                        <label class="text-white-dark text-[16px] inline-block">
                                            * Fatura bilgilerinizi girdikten sonra PAYTR güvenli ödeme sayfasına
                                            yönlendirileceksiniz.
                                        </label><br>
                                        <label class="flex items-center mt-1 cursor-pointer">
                                            <input type="checkbox" name="mesafeliSatis" checked class="form-checkbox" />
                                            <span class="text-white-dark">
                                                <a @click="toggle" style="font-weight: bold; color: blue;">
                                                    Mesafeli Satış Sözleşmesini</a> Okudum ve
                                                Onaylıyorum.</span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary text-center block w-full">Fatura Bilgilerini
                                    Onayla</button>
                            </form>
                            <p class="mt-6">
                                <img src="{{ asset('assets/images/bankalar-tek-parca.jpg') }}" class="mt-6">
                            </p>
                        </div>
                    </div>
                </div>
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
            Alpine.data("mesafeliSatisSozlesmesiModal", (initialOpenState = false) => ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                    if (this.open) {
                        // Modal açıldığında Perfect Scrollbar'ı etkinleştir
                        const scrollableModalContent = document.getElementById(
                        'scrollableModalContent');
                        if (scrollableModalContent) {
                            new PerfectScrollbar(scrollableModalContent);
                        }
                    }
                },
            }));
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#paymentForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    surname: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    town: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    mesafeliSatis: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Bu Alan Gerekli!',
                    },
                    surname: {
                        required: 'Bu Alan Gerekli!',
                    },
                    email: {
                        required: 'Bu Alan Gerekli!',
                        email: 'Lütfen geçerli bir e-posta adresi girin.'
                    },
                    phone: {
                        required: 'Bu Alan Gerekli!',
                    },
                    address: {
                        required: 'Bu Alan Gerekli!',
                    },
                    town: {
                        required: 'Bu Alan Gerekli!',
                    },
                    city: {
                        required: 'Bu Alan Gerekli!',
                    },
                    mesafeliSatis: {
                        required: 'Mesafeli Satış Sözleşmesi Kutucuğunu İşaretlemelisiniz!',
                    },
                },
                errorElement: 'p',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    error.addClass('text-danger'); // text-danger sınıfı eklendi
                    error.addClass('mt-1'); // mt-1 sınıfı eklendi
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
