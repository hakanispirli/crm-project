@extends('master')
@section('dashboard')
    <div class="dvanimation animate__animated p-6">
        <div class="relative rounded-t-md bg-primary-light bg-[url('../images/knowledge/pattern.png')]
        bg-contain bg-left-top bg-no-repeat px-5 py-10 dark:bg-black md:px-10">
            <div class="relative">
                <div class="flex flex-col items-center justify-center sm:-ms-32 sm:flex-row xl:-ms-60">
                    <div class="mb-2 text-center text-2xl font-bold dark:text-white md:text-5xl">Ödemeniz Başarılı</div>
                </div>
                <p class="mb-9 mt-5 text-center text-base font-semibold">
                    1 Yıllık Lisans Hesabınıza Tanımlandı. Paneli ile ilgili tüm sorularınız için 7/24 WhatsApp Destek Hattından Bize Ulaşabilirsiniz.
                </p>
            </div>
        </div>
        <div class="mb-12 flex items-center rounded-b-md bg-[#DBE7FF] dark:bg-[#141F31]">
            <ul class="mx-auto flex items-center gap-5 overflow-auto whitespace-nowrap px-3 py-4.5 xl:gap-8">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="group flex min-w-[120px] cursor-pointer flex-col items-center justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690] duration-300 hover:bg-white hover:text-primary dark:hover:bg-[#1B2E4B]"
                        :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]'}">
                        <h5 class="font-bold text-black dark:text-white">Kontrol Paneli</h5>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
