@extends('master')
@section('dashboard')
    <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-3 xl:grid-cols-4">
        <div class="panel">
            <div style="padding-top: 20px;">
                <div
                    class="relative flex items-center rounded border !border-primary bg-danger-light p-3.5 text-primary before:absolute before:top-1/2 before:-mt-2 before:border-b-8 before:border-l-8 before:border-t-8 before:border-b-transparent before:border-l-inherit before:border-t-transparent ltr:border-l-[64px] ltr:before:left-0 rtl:border-r-[64px] rtl:before:right-0 rtl:before:rotate-180 dark:bg-danger-dark-light">
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
                        <strong class="ltr:mr-1 rtl:ml-1">
                            Oluşturulan Rolün Hangi Menüleri Görebileceği Seçimi Bu Bölümde Yapılır.
                        </strong>
                    </span>
                </div>
            </div>
            <div style="padding-top: 20px;">
                <div
                    class="relative flex items-center rounded border !border-primary bg-danger-light p-3.5
                text-primary before:absolute before:top-1/2 before:-mt-2 before:border-b-8 before:border-l-8 before:border-t-8
                before:border-b-transparent before:border-l-inherit before:border-t-transparent ltr:border-l-[64px] ltr:before:left-0
                rtl:border-r-[64px] rtl:before:right-0 rtl:before:rotate-180 dark:bg-danger-dark-light">
                    <span class="absolute inset-y-0 m-auto h-6 w-6 text-white ltr:-left-11 rtl:-right-11">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                            <path
                                d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                    </span>
                    <span class="ltr:pr-2 rtl:pl-2">
                        <strong class="ltr:mr-1 rtl:ml-1">
                            Düzenlenen Role Ait İzinler Daha Sonra Yönetici Oluşturma Bölümünden Atanır.
                        </strong>
                    </span>
                </div>
            </div>
            <div style="padding-top: 20px;">
                <div
                    class="relative flex items-center rounded border !border-primary bg-danger-light p-3.5
                text-primary before:absolute before:top-1/2 before:-mt-2 before:border-b-8 before:border-l-8 before:border-t-8
                before:border-b-transparent before:border-l-inherit before:border-t-transparent ltr:border-l-[64px] ltr:before:left-0
                rtl:border-r-[64px] rtl:before:right-0 rtl:before:rotate-180 dark:bg-danger-dark-light">
                    <span class="absolute inset-y-0 m-auto h-6 w-6 text-white ltr:-left-11 rtl:-right-11">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                            <path
                                d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                    </span>
                    <span class="ltr:pr-2 rtl:pl-2">
                        <strong class="ltr:mr-1 rtl:ml-1">
                            Örneğin Dövme Sanatçısı Rolü İçin Notlar İçeriği Gösterilmek İsteniyorsa Her İki CheckBox
                            İşaretlenmelidir.
                        </strong>
                    </span>
                </div>
            </div>
            <div style="padding-top: 20px;">
                <div
                    class="relative flex items-center rounded border !border-primary bg-danger-light p-3.5
                text-primary before:absolute before:top-1/2 before:-mt-2 before:border-b-8 before:border-l-8 before:border-t-8
                before:border-b-transparent before:border-l-inherit before:border-t-transparent ltr:border-l-[64px] ltr:before:left-0
                rtl:border-r-[64px] rtl:before:right-0 rtl:before:rotate-180 dark:bg-danger-dark-light">
                    <span class="absolute inset-y-0 m-auto h-6 w-6 text-white ltr:-left-11 rtl:-right-11">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                            <path
                                d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                    </span>
                    <span class="ltr:pr-2 rtl:pl-2">
                        <strong class="ltr:mr-1 rtl:ml-1">Doğru Yapı</strong><br><br>
                        <strong class="ltr:mr-1 rtl:ml-1">
                            <label class="inline-flex mb-1 cursor-pointer">
                                <input type="radio" checked disabled
                                    class="form-checkbox rounded-full outline-primary flex-1">
                                <span>notlar</span>
                            </label>
                            <input type="hidden" name="notlar" value="1">
                            <label class="inline-flex mb-1 cursor-pointer">
                                <input type="radio" checked disabled
                                    class="form-checkbox rounded-full outline-primary flex-1">
                                <span>notlar.menu</span>
                            </label>
                        </strong>
                    </span>
                    <span class="ltr:pr-2 rtl:pl-2">
                        <strong class="ltr:mr-1 rtl:ml-1">Hatalı Yapı</strong><br><br>
                        <strong class="ltr:mr-1 rtl:ml-1">
                            <label class="inline-flex mb-1 cursor-pointer">
                                <input type="radio" disabled class="form-checkbox rounded-full outline-primary flex-1">
                                <span>notlar</span>
                            </label>
                            <label class="inline-flex mb-1 cursor-pointer">
                                <input type="radio" checked disabled
                                    class="form-checkbox rounded-full outline-primary flex-1">
                                <span>notlar.menu</span>
                            </label>
                        </strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="panel lg:col-span-2 xl:col-span-3">
            <form action="{{ route('update.roles.permission',$role->id) }}" method="POST" class="space-y-5">
                @csrf
                <div class="flex sm:flex-row flex-col">
                    <label for="horizontalEmail" class="mb-1 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Yönetici Rolü</label>
                    <h4><strong>{{ $role->name }}</strong></h4>
                </div>
                <div class="flex sm:flex-row flex-col">
                    <label class="mb-1 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Tüm İzinler</label>
                    <label class="inline-flex mb-1 cursor-pointer">
                        <input type="checkbox" class="form-checkbox flex-1" id="checkboxMain" />
                        <span class="text-white-dark" relative">Tüm İzinleri Ata</span>
                    </label>
                </div>


                <div class="flex sm:flex-row flex-col">
                    <label class="mb-5 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Menü İzinler</label>
                    <div class="lg:w-1/2">
                        @foreach ($permission_groups as $group)
                            <div class="flex flex-wrap">
                                <div class="sm:w-1/2 mb-4 sm:mb-1">
                                    <div class="checkbox-custom checkbox-default">
                                        @php
                                            $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                        @endphp
                                        <label class="inline-flex mb-3 cursor-pointer">
                                            <input class="form-checkbox flex-1"
                                            type="checkbox" id="checkbox{{ $group->group_name }}" value=""
                                                {{ App\Models\User::roleHasPermissions($role,$permissions) ? 'checked' : '' }}>
                                            <span for="checkbox{{ $group->group_name }}"
                                                class="text-white-dark">{{ $group->group_name }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="sm:w-1/2">
                                    @foreach ($permissions as $permission)
                                        <div class="checkbox-custom checkbox-default mr-5">
                                            <label class="inline-flex mb-3 cursor-pointer">
                                                <input class="form-checkbox flex-1"
                                                type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                id="checkbox{{ $permission->id }}"
                                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                <span for="checkbox{{ $permission->id }}"
                                                    class="text-white-dark">{{ $permission->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-2 mr-3">
                    <button type="submit" class="btn btn-primary w-full">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
@endsection
