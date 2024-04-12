@extends('master')
@section('dashboard')
    <div>
        <div class="pt-5">
            <div class="mb-2 grid grid-cols-1 gap-5 lg:grid-cols-3 xl:grid-cols-4">
                <div class="panel">
                    <div class="mb-5 flex items-center justify-between">
                        <h5 class="text-lg font-semibold dark:text-white-light">Dövme Modeli</h5>
                        <a href="{{ asset($randevuBilgileri->dovme_modeli) }}" download="{{ asset($randevuBilgileri->dovme_modeli) }}"
                            class="btn btn-primary rounded-full p-2 ltr:ml-auto rtl:mr-auto">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                <path opacity="0.5" d="M3 15C3 17.8284 3 19.2426 3.87868 20.1213C4.75736 21 6.17157 21 9 21H15C17.8284 21 19.2426 21 20.1213 20.1213C21 19.2426 21 17.8284 21 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12 3V16M12 16L16 11.625M12 16L8 11.625" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="border-b border-gray-300 mb-5"></div>
                    <div class="mb-5">
                        <div class="flex flex-col items-center justify-center">
                            <img src="{{ asset($randevuBilgileri->dovme_modeli) }}"/>
                        </div>
                    </div>
                </div>
                <div class="panel lg:col-span-2 xl:col-span-3">
                    <div class="mb-2">
                        <h5 class="text-lg font-semibold dark:text-white-light">Randevu Detayları</h5>
                    </div>

                    <div class="border-b border-gray-300 mb-5"></div>

                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-1/2 xl:w-1/2">
                            <div class="mb-5">
                                <div class="table-responsive font-semibold text-[#515365] dark:text-white-light">
                                    <div class="flex sm:flex-row flex-col mb-4">
                                        <label for="horizontalEmail" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2 font-bold">Müşteri Adı Soyadı</label>
                                        <span class="text-dark">: {{ $randevuBilgileri->customer->name }}</span>
                                    </div>

                                    <div class="border-b border-gray-300 mb-4"></div>

                                    <div class="flex sm:flex-row flex-col mb-4">
                                        <label for="horizontalEmail" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2 font-bold">Müşteri Telefon No</label>
                                        <span class="text-dark">: {{ $randevuBilgileri->customer->telefon }}</span>
                                    </div>

                                    <div class="border-b border-gray-300 mb-5"></div>

                                    <div class="flex sm:flex-row flex-col mb-4">
                                        <label for="horizontalEmail" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2 font-bold">Müşteri Email</label>
                                        <span class="text-dark">: {{ $randevuBilgileri->customer->email }}</span>
                                    </div>

                                    <div class="border-b border-gray-300 mb-5"></div>

                                    <div class="flex sm:flex-row flex-col mb-4">
                                        <label for="horizontalEmail" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2 font-bold">Randevu Başlangıç Tarihi</label>
                                        <span class="text-dark">: {{ $randevuBilgileri->start }}</span>
                                    </div>

                                    <div class="border-b border-gray-300 mb-5"></div>

                                    <div class="flex sm:flex-row flex-col mb-4">
                                        <label for="horizontalEmail" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2 font-bold">Randevu Bitiş Tarihi</label>
                                        <span class="text-dark">: {{ $randevuBilgileri->end }}</span>
                                    </div>

                                    <div class="border-b border-gray-300 mb-5"></div>

                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 xl:w-1/2">
                            <div class="mb-5">
                                <div class="table-responsive font-semibold text-[#515365] dark:text-white-light">
                                    <div class="flex sm:flex-row flex-col mb-4">
                                        <label for="horizontalEmail" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2 font-bold">Sanatçı Adı Soyadı</label>
                                        <span class="text-dark">: {{ $randevuBilgileri->artist->artist_name }}</span>
                                    </div>

                                    <div class="border-b border-gray-300 mb-4"></div>

                                    <div class="flex sm:flex-row flex-col mb-4">
                                        <label for="horizontalEmail" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2 font-bold">Hizmet</label>
                                        <span class="text-dark">: {{ $randevuBilgileri->service->service_name }}</span>
                                    </div>

                                    <div class="border-b border-gray-300 mb-5"></div>

                                    <div class="flex sm:flex-row flex-col mb-4">
                                        <label for="horizontalEmail" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2 font-bold">Ön Ödeme</label>
                                        <span class="text-dark">: {{ $randevuBilgileri->on_odeme }}</span>
                                    </div>

                                    <div class="border-b border-gray-300 mb-5"></div>

                                    <div class="flex sm:flex-row flex-col mb-4">
                                        <label for="horizontalEmail" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2 font-bold">Toplam Ödeme</label>
                                        <span class="text-dark">: {{ $randevuBilgileri->toplam_odeme }}</span>
                                    </div>

                                    <div class="border-b border-gray-300 mb-5"></div>

                                    <div class="flex sm:flex-row flex-col mb-4">
                                        <label for="horizontalEmail" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2 font-bold">Açıklama</label>
                                        <span class="text-dark">: {{ $randevuBilgileri->description }}</span>
                                    </div>

                                    <div class="border-b border-gray-300 mb-5"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
