@extends('master')
@section('dashboard')
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ route('dashboard') }}" class="text-primary hover:underline">Kontrol Paneli</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1">
                <span>Profil Ayarları</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="mb-5 flex items-center justify-between">
                <h5 class="text-lg font-semibold dark:text-white-light">Yönetici Bilgileri</h5>
            </div>
            <div x-data="{ tab: 'home' }">
                <ul class="mb-5 overflow-y-auto whitespace-nowrap border-b border-[#ebedf2] font-semibold dark:border-[#191e3a] sm:flex">
                    <li class="inline-block">
                        <a
                            href="javascript:;"
                            class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary"
                            :class="{'!border-primary text-primary' : tab == 'home'}"
                            @click="tab='home'"
                        >
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                <path
                                    opacity="0.5"
                                    d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                />
                                <path d="M12 15L12 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li class="inline-block">
                        <a
                            href="javascript:;"
                            class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary"
                            :class="{'!border-primary text-primary' : tab == 'password'}"
                            @click="tab='password'"
                        >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                            <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                            <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5"></ellipse>
                        </svg>
                            Şifre Bilgileri
                        </a>
                    </li>
                </ul>
                <template x-if="tab === 'home'">
                    <div>
                        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data"
                            class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
                            @csrf
                            <h6 class="mb-5 text-lg font-bold">Yönetici Bilgileri</h6>
                            <div class="flex flex-col sm:flex-row">
                                <div class="mb-5 w-full sm:w-2/12 ltr:sm:mr-4 rtl:sm:ml-4">
                                    <img src="{{ !empty($profileData->gorsel) ? url('upload/admin_images/' . $profileData->gorsel) : url('upload/profile.png') }}"
                                    id="showImage" alt="image" class="mx-auto h-20 w-20 rounded-full object-cover md:h-32 md:w-32" />
                                </div>
                                <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                                    <div>
                                        <label for="name">Yönetici Adı</label>
                                        <input id="name" type="text" name="name" class="form-input" value="{{ $profileData->name }}" />
                                    </div>
                                    <div>
                                        <label for="email">Email</label>
                                        <input id="email" type="text" name="email" class="form-input" value="{{ $profileData->email }}"/>
                                    </div>
                                    <div>
                                        <label for="telefon">Telefon</label>
                                        <input id="telefon" type="text" name="telefon" class="form-input" value="{{ $profileData->telefon }}"/>
                                    </div>
                                    <div>
                                        <label for="gorsel">Profil Görseli (90x90)</label>
                                        <input id="image" type="file" name="gorsel"
                                            class="rtl:file-ml-5 form-input p-0 file:border-0 file:bg-primary/90 file:py-2 file:px-4
                                            file:font-semibold file:text-white file:hover:bg-primary ltr:file:mr-5">
                                    </div>
                                    <div class="mt-3 sm:col-span-2">
                                        <button type="submit" class="btn btn-primary">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </template>
                <template x-if="tab === 'password'">
                    <div>
                        <form method="POST" action="{{ route('profile.password') }}"
                            class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
                            @csrf
                            <h6 class="mb-5 text-lg font-bold">Yönetici Şifre</h6>
                            <div class="flex flex-col sm:flex-row">
                                <div class="mb-5 w-full sm:w-2/12 ltr:sm:mr-4 rtl:sm:ml-4">
                                    <img src="{{ !empty($profileData->gorsel) ? url('upload/admin_images/' . $profileData->gorsel) : url('upload/profile.png') }}" alt="image"
                                        id="showImage"
                                        class="mx-auto h-20 w-20 rounded-full object-cover md:h-32 md:w-32" />
                                </div>
                                <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                                    <div>
                                        <label for="old_password">Yönetici Mevcut Şifre *</label>
                                        <input id="old_password" type="password" name="old_password" class="form-input" placeholder="********" />
                                    </div>
                                    @error('old_password')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                    <div>
                                        <label for="new_password">Yönetici Yeni Şifre *</label>
                                        <input id="new_password" type="password" name="new_password" class="form-input" placeholder="********" />
                                    </div>
                                    @error('new_password')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                    <div>
                                        <label for="new_password_confirmation">Yönetici Yeni Şifre Doğrula *</label>
                                        <input id="new_password_confirmation" type="password" name="new_password_confirmation" class="form-input" placeholder="********" />
                                    </div>
                                    <div class="mt-3 sm:col-span-2">
                                        <button type="submit" class="btn btn-primary">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </template>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
