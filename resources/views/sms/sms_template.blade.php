@extends('master')
@section('dashboard')
    <div x-data="form">
        <div
            class="relative flex items-center rounded border !border-primary bg-primary-light
        p-3.5 text-primary before:absolute before:top-1/2
        before:-mt-2 before:border-l-8 before:border-t-8
        before:border-b-8 before:border-t-transparent before:border-b-transparent
        before:border-l-inherit ltr:border-l-[64px] ltr:before:left-0 rtl:border-r-[64px]
        rtl:before:right-0 rtl:before:rotate-180 dark:bg-primary-dark-light mb-3">
            <span class="absolute inset-y-0 m-auto h-6 w-6 text-white ltr:-left-11 rtl:-right-11">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6">
                    <path
                        d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                        stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
            </span>
            <span class="ltr:pr-2 rtl:pl-2">
                <strong class="ltr:mr-3 rtl:ml-1">
                    Sms Bildirim Yönetimi
                </strong>
            </span>
        </div>
        <div
            class="relative flex items-center rounded border !border-primary p-3.5 text-dark bg-dark-light border-dark before:absolute before:top-1/2 before:-mt-2 before:border-l-8 before:border-t-8 before:border-b-8 before:border-t-transparent before:border-b-transparent before:border-l-inherit ltr:border-l-[64px] ltr:before:left-0 rtl:border-r-[64px] rtl:before:right-0 rtl:before:rotate-180 dark:bg-primary-dark-light">
            <span class="absolute inset-y-0 m-auto h-6 w-6 text-white ltr:-left-11 rtl:-right-11">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6">
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5"></circle>
                    <path opacity="0.5"
                        d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z"
                        stroke="currentColor" stroke-width="1.5"></path>
                </svg>
            </span>
            <span class="ltr:pr-2 rtl:pl-2">
                <strong class="ltr:mr-1 rtl:ml-1">
                    Müşteri Adı :
                </strong>
                {name}
            </span>
            <br>
            <span class="ltr:pr-2 rtl:pl-2">
                <strong class="ltr:mr-1 rtl:ml-1">
                    Randevu Tarihi :
                </strong>
                {start}
            </span><br>
        </div>
        <div class="panel lg:col-span-2 mt-5">
            <form action="{{ route('sms.template.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $smsTemplate->id }}">
                <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-2">
                    <div class="mb-5">
                        <h5 class="text-lg font-bold dark:text-white-light mb-5">Randevu Bildirim Şablonu</h5>
                        <textarea type="text" name="first_appointment" class="form-input">{{ $smsTemplate->first_appointment }}</textarea>
                    </div>

                    <div class="mb-5">
                        <h5 class="text-lg font-bold dark:text-white-light mb-5">Randevu Hatırlatma Şablonu</h5>
                        <textarea type="text" name="appointment_reminder" class="form-input">{{ $smsTemplate->appointment_reminder }}</textarea>
                    </div>
                    <div class="mb-5">
                        <h5 class="text-lg font-bold dark:text-white-light mb-5">Randevu Güncelleme Şablonu</h5>
                        <textarea type="text" name="update_appointment" class="form-input">{{ $smsTemplate->update_appointment }}</textarea>
                    </div>

                    <div class="mb-5">
                        <h5 class="text-lg font-bold dark:text-white-light mb-5">Randevu Sonrası Şablonu</h5>
                        <textarea type="text" name="after_appointment" class="form-input">{{ $smsTemplate->after_appointment }}</textarea>
                    </div>
                    <div class="mb-5">
                        <button type="submit" class="btn btn-primary mt-6">Randevu Şablonlarını Kaydet</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
