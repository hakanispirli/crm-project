@extends('master')
@section('dashboard')
    <div x-data="notes">
        <div class="relative flex h-full gap-5 sm:h-[calc(100vh_-_150px)]">
            <div class="absolute z-10 hidden h-full w-full rounded-md bg-black/60"
                :class="{ '!block xl:!hidden': isShowNoteMenu }" @click="isShowNoteMenu = !isShowNoteMenu">
            </div>
            <div class="panel absolute z-10 hidden h-full w-[240px] flex-none space-y-4 overflow-hidden p-4 ltr:rounded-r-none rtl:rounded-l-none ltr:lg:rounded-r-md rtl:lg:rounded-l-md xl:relative xl:block xl:h-auto"
                :class="{ 'hidden shadow': !isShowNoteMenu, 'h-full ltr:left-0 rtl:right-0': isShowNoteMenu }">
                <div class="flex h-full flex-col pb-16">
                    <div class="flex items-center text-center">
                        <div class="shrink-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                <path
                                    d="M20.3116 12.6473L20.8293 10.7154C21.4335 8.46034 21.7356 7.3328 21.5081 6.35703C21.3285 5.58657 20.9244 4.88668 20.347 4.34587C19.6157 3.66095 18.4881 3.35883 16.2331 2.75458C13.978 2.15033 12.8504 1.84821 11.8747 2.07573C11.1042 2.25537 10.4043 2.65945 9.86351 3.23687C9.27709 3.86298 8.97128 4.77957 8.51621 6.44561C8.43979 6.7254 8.35915 7.02633 8.27227 7.35057L8.27222 7.35077L7.75458 9.28263C7.15033 11.5377 6.84821 12.6652 7.07573 13.641C7.25537 14.4115 7.65945 15.1114 8.23687 15.6522C8.96815 16.3371 10.0957 16.6392 12.3508 17.2435L12.3508 17.2435C14.3834 17.7881 15.4999 18.0873 16.415 17.9744C16.5152 17.9621 16.6129 17.9448 16.7092 17.9223C17.4796 17.7427 18.1795 17.3386 18.7203 16.7612C19.4052 16.0299 19.7074 14.9024 20.3116 12.6473Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.5"
                                    d="M16.415 17.9741C16.2065 18.6126 15.8399 19.1902 15.347 19.6519C14.6157 20.3368 13.4881 20.6389 11.2331 21.2432C8.97798 21.8474 7.85044 22.1495 6.87466 21.922C6.10421 21.7424 5.40432 21.3383 4.86351 20.7609C4.17859 20.0296 3.87647 18.9021 3.27222 16.647L2.75458 14.7151C2.15033 12.46 1.84821 11.3325 2.07573 10.3567C2.25537 9.58627 2.65945 8.88638 3.23687 8.34557C3.96815 7.66065 5.09569 7.35853 7.35077 6.75428C7.77741 6.63996 8.16368 6.53646 8.51621 6.44531"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path d="M11.7769 10L16.6065 11.2941" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <path opacity="0.5" d="M11 12.8975L13.8978 13.6739" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold ltr:ml-3 rtl:mr-3">Notlar</h3>
                    </div>
                    <div class="my-4 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                    <div class="perfect-scrollbar relative -mr-3.5 h-full grow pr-3.5">
                        <div class="space-y-1">
                            <button type="button"
                                class="flex h-10 w-full items-center justify-between rounded-md p-2 font-medium hover:bg-white-dark/10 hover:text-primary dark:hover:bg-[#181F32] dark:hover:text-primary"
                                :class="{ 'bg-gray-100 dark:text-primary text-primary dark:bg-[#181F32]': selectedTab === 'all' }"
                                @click="tabChanged('all')">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0">
                                        <path
                                            d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path opacity="0.5"
                                            d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    <div class="ltr:ml-3 rtl:mr-3">Tüm Notlar</div>
                                </div>
                            </button>
                            <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                            <div class="px-1 py-3 text-white-dark">Konular</div>
                            <button type="button"
                                class="flex h-10 w-full items-center rounded-md p-1 font-medium text-primary duration-300 hover:bg-white-dark/10 ltr:hover:pl-3 rtl:hover:pr-3 dark:hover:bg-[#181F32]"
                                :class="{ 'ltr:pl-3 rtl:pr-3 bg-gray-100 dark:bg-[#181F32]': selectedTab === 'Kisisel' }"
                                @click="tabChanged('Kisisel')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0 rotate-45 fill-primary">
                                    <path
                                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                        stroke="currentColor" stroke-width="1.5"></path>
                                </svg>
                                <div class="ltr:ml-3 rtl:mr-3">Kişisel</div>
                            </button>

                            <button type="button"
                                class="flex h-10 w-full items-center rounded-md p-1 font-medium text-warning duration-300 hover:bg-white-dark/10 ltr:hover:pl-3 rtl:hover:pr-3 dark:hover:bg-[#181F32]"
                                :class="{ 'ltr:pl-3 rtl:pr-3 bg-gray-100 dark:bg-[#181F32]': selectedTab === 'Calismalar' }"
                                @click="tabChanged('Calismalar')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0 rotate-45 fill-warning">
                                    <path
                                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                        stroke="currentColor" stroke-width="1.5"></path>
                                </svg>
                                <div class="ltr:ml-3 rtl:mr-3">İş</div>
                            </button>

                            <button type="button"
                                class="flex h-10 w-full items-center rounded-md p-1 font-medium text-info duration-300 hover:bg-white-dark/10 ltr:hover:pl-3 rtl:hover:pr-3 dark:hover:bg-[#181F32]"
                                :class="{ 'ltr:pl-3 rtl:pr-3 bg-gray-100 dark:bg-[#181F32]': selectedTab === 'Sosyal Medya' }"
                                @click="tabChanged('Sosyal Medya')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0 rotate-45 fill-info">
                                    <path
                                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                        stroke="currentColor" stroke-width="1.5"></path>
                                </svg>
                                <div class="ltr:ml-3 rtl:mr-3">Sosyal Medya</div>
                            </button>

                            <button type="button"
                                class="flex h-10 w-full items-center rounded-md p-1 font-medium text-danger duration-300 hover:bg-white-dark/10 ltr:hover:pl-3 rtl:hover:pr-3 dark:hover:bg-[#181F32]"
                                :class="{ 'ltr:pl-3 rtl:pr-3 bg-gray-100 dark:bg-[#181F32]': selectedTab === 'Onemli' }"
                                @click="tabChanged('Onemli')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0 rotate-45 fill-danger">
                                    <path
                                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                        stroke="currentColor" stroke-width="1.5"></path>
                                </svg>
                                <div class="ltr:ml-3 rtl:mr-3">Önemli</div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-0 w-full p-4 ltr:left-0 rtl:right-0">
                    <button class="btn btn-primary w-full" type="button" @click="editNote">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Yeni Not Ekle
                    </button>
                </div>
            </div>

            <div class="panel h-full flex-1 overflow-auto">
                <div class="pb-5">
                    <button type="button" class="hover:text-primary xl:hidden"
                        @click="isShowNoteMenu = !isShowNoteMenu">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                            <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round"></path>
                            <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                    </button>
                </div>
                <template x-if="!filterdNotesList.length">
                    <div
                        class="flex h-full min-h-[400px] items-center justify-center text-lg font-semibold sm:min-h-[300px]">
                        Görüntülenecek Not Bulunmuyor.
                    </div>
                </template>
                <template x-if="filterdNotesList.length">
                    <div class="min-h-[400px] sm:min-h-[300px]">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
                            <template x-for="note in filterdNotesList" :key="note.id">
                                <div class="panel pb-12"
                                    :class="{
                                        'bg-primary-light shadow-primary': note.tag === 'Kisisel',
                                        'bg-warning-light shadow-warning': note.tag === 'Calismalar',
                                        'bg-info-light shadow-info': note.tag === 'Sosyal Medya',
                                        'bg-danger-light shadow-danger': note.tag === 'Onemli',
                                        'dark:shadow-dark': !note.tag
                                    }">
                                    <div class="min-h-[142px]">
                                        <div class="flex justify-between">
                                            <div class="flex w-max items-center">
                                                <div class="flex-none">
                                                    <template x-if="note.thumb">
                                                        <div class="rounded-full bg-gray-300 p-0.5 dark:bg-gray-700">
                                                            <img class="h-8 w-8 rounded-full object-cover"
                                                                :src="`assets/images/${note.thumb}`" />
                                                        </div>
                                                    </template>
                                                    <template x-if="!note.thumb && note.user">
                                                        <div class="grid h-8 w-8 place-content-center rounded-full bg-gray-300 text-sm font-semibold dark:bg-gray-700"
                                                            x-text="note.user.charAt(0) + '' + note.user.charAt(note.user.indexOf(' ') + 1)">
                                                        </div>
                                                    </template>
                                                    <template x-if="!note.thumb && !note.user">
                                                        <div class="rounded-full bg-gray-300 p-2 dark:bg-gray-700">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4.5 w-4.5">
                                                                <circle cx="12" cy="6" r="4"
                                                                    stroke="currentColor" stroke-width="1.5"></circle>
                                                                <ellipse opacity="0.5" cx="12" cy="17"
                                                                    rx="7" ry="4" stroke="currentColor"
                                                                    stroke-width="1.5"></ellipse>
                                                            </svg>
                                                        </div>
                                                    </template>
                                                </div>
                                                <div class="ltr:ml-2 rtl:mr-2">
                                                    <div class="font-semibold" x-text="note.user"></div>
                                                    <div class="text-sx text-white-dark" x-text="note.date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                <button type="button" class="text-primary" @click="toggle">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 rotate-90 opacity-70 hover:opacity-100">
                                                        <circle cx="5" cy="12" r="2" stroke="currentColor"
                                                            stroke-width="1.5"></circle>
                                                        <circle opacity="0.5" cx="12" cy="12" r="2"
                                                            stroke="currentColor" stroke-width="1.5">
                                                        </circle>
                                                        <circle cx="19" cy="12" r="2" stroke="currentColor"
                                                            stroke-width="1.5"></circle>
                                                    </svg>
                                                </button>
                                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                                    class="text-sm font-medium ltr:right-0 rtl:left-0">
                                                    <li>
                                                        <button class="w-full" @click="toggle, editNote(note)">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4 shrink-0 ltr:mr-3 rtl:ml-3">
                                                                <path
                                                                    d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                                    stroke="currentColor" stroke-width="1.5" />
                                                                <path opacity="0.5"
                                                                    d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                                    stroke="currentColor" stroke-width="1.5" />
                                                            </svg>
                                                            Düzenle
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button class="w-full" @click="toggle, deleteNoteConfirm(note)">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4.5 w-4.5 shrink-0 ltr:mr-3 rtl:ml-3">
                                                                <path d="M20.5001 6H3.5" stroke="currentColor"
                                                                    stroke-width="1.5" stroke-linecap="round"></path>
                                                                <path
                                                                    d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round"></path>
                                                                <path opacity="0.5" d="M9.5 11L10 16"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round"></path>
                                                                <path opacity="0.5" d="M14.5 11L14 16"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round"></path>
                                                                <path opacity="0.5"
                                                                    d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                            </svg>
                                                            Sil
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button class="w-full" @click="toggle, viewNote(note)">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4.5 w-4.5 shrink-0 ltr:mr-3 rtl:ml-3">
                                                                <path opacity="0.5"
                                                                    d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                                                    stroke="currentColor" stroke-width="1.5" />
                                                                <path
                                                                    d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                                                    stroke="currentColor" stroke-width="1.5" />
                                                            </svg>
                                                            Görüntüle
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="mt-4 font-semibold" x-text="note.title"></h4>
                                            <p class="mt-2 text-white-dark" x-text="note.description"></p>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-5 left-0 w-full px-5">
                                        <div class="mt-2 flex items-center justify-between">
                                            <div class="flex items-center">
                                                <button type="button" class="text-danger"
                                                    @click="deleteNoteConfirm(note)">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5">
                                                        <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round">
                                                        </path>
                                                        <path
                                                            d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5"
                                                            d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                            stroke="currentColor" stroke-width="1.5"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>

                <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60 px-4"
                    :class="isAddNoteModal && '!block'">
                    <div class="flex min-h-screen items-center justify-center">
                        <div x-show="isAddNoteModal" x-transition x-transition.duration.300
                            @click.outside="isAddNoteModal = false"
                            class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full">
                            <button type="button"
                                class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                @click="isAddNoteModal = false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                            <div class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pl-[50px] rtl:pr-5 dark:bg-[#121c2c]"
                                x-text="params.id ? 'Not Düzenle' : 'Not Ekle'"></div>
                            <div class="p-5">
                                <form @submit.prevent="saveNote">
                                    <div class="mb-5">
                                        <label for="title">Başlık</label>
                                        <input id="title" type="text" placeholder="Not Başlığı"
                                            class="form-input" x-model="params.title" />
                                    </div>
                                    @php
                                        $customers = App\Models\Customers::all();
                                    @endphp
                                    <div class="mb-5">
                                        <label for="name">Müşteriler</label>
                                        <select id="seachable-select" class="form-select" x-model="params.user">
                                                <option value="Diğer"> Diğer</option>
                                            @foreach ($customers as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label for="tag">Konu</label>
                                        <select id="tag" class="form-select" x-model="params.tag">
                                            <option value="">Konular</option>
                                            <option value="Kisisel">Kişisel</option>
                                            <option value="Calismalar">Çalışmalar</option>
                                            <option value="Sosyal Medya">Sosyal Medya</option>
                                            <option value="Onemli">Önemli</option>
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label for="desc">Açıklamalar</label>
                                        <textarea id="desc" rows="3" class="form-textarea min-h-[130px] resize-none"
                                            placeholder="Not Açıklamaları" x-model="params.description"></textarea>
                                    </div>
                                    <div class="mt-8 flex items-center justify-end">
                                        <button type="button" class="btn btn-outline-danger gap-2"
                                            @click="isAddNoteModal = false">
                                            İptal
                                        </button>
                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                            x-text="params.id ? 'Notu Güncelle' : 'Not Ekle'"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60 px-4"
                    :class="isDeleteNoteModal && '!block'">
                    <div class="flex min-h-screen items-center justify-center">
                        <div x-show="isDeleteNoteModal" x-transition x-transition.duration.300
                            @click.outside="isDeleteNoteModal = false"
                            class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full">
                            <button type="button"
                                class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                @click="isDeleteNoteModal = false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                            <div
                                class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pl-[50px] rtl:pr-5 dark:bg-[#121c2c]">
                                Not Siliniyor!
                            </div>
                            <div class="p-5 text-center">
                                <div class="mx-auto w-fit rounded-full bg-danger p-4 text-white ring-4 ring-danger/30">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mx-auto h-7 w-7">
                                        <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path
                                            d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                        </path>
                                        <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path opacity="0.5"
                                            d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                </div>
                                <div class="mx-auto mt-5 sm:w-3/4">Bu notu silmek istediğinizden emin misiniz?
                                </div>

                                <div class="mt-8 flex items-center justify-center">
                                    <button type="button" class="btn btn-outline-danger"
                                        @click="isDeleteNoteModal = false">İptal</button>
                                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                        @click="deleteNote">Sil</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60 px-4"
                    :class="isViewNoteModal && '!block'">
                    <div class="flex min-h-screen items-center justify-center">
                        <div x-show="isViewNoteModal" x-transition x-transition.duration.300
                            @click.outside="isViewNoteModal = false"
                            class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full">
                            <button type="button"
                                class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                @click="isViewNoteModal = false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                            <div
                                class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pl-[50px] rtl:pr-5 dark:bg-[#121c2c]">
                                <div class="flex flex-wrap items-center">
                                    <div class="ltr:mr-3 rtl:ml-3" x-text="selectedNote.title"></div>
                                    <div class="flex items-center">
                                        <button x-show="selectedNote.tag" type="button"
                                            class="badge badge-outline-primary rounded-3xl capitalize ltr:mr-3 rtl:ml-3"
                                            :class="{
                                                'shadow-primary': selectedNote.tag === 'Kisisel',
                                                'shadow-warning': selectedNote.tag === 'Calismalar',
                                                'shadow-info': selectedNote.tag === 'Sosyal Medya',
                                                'shadow-danger': selectedNote.tag === 'Onemli',
                                            }"
                                            x-text="selectedNote.tag">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="text-base" x-text="selectedNote.description"></div>

                                <div class="mt-8 ltr:text-right rtl:text-left">
                                    <button type="button" class="btn btn-outline-danger"
                                        @click="isViewNoteModal = false">Kapat</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            // main section
            Alpine.data('scrollToTop', () => ({
                showTopButton: false,
                init() {
                    window.addEventListener('scroll', this.scrollFunction);
                },

                scrollFunction() {
                    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                        this.showTopButton = true;
                    } else {
                        this.showTopButton = false;
                    }
                },

                goToTop() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                },
            }));

            // theme customization
            Alpine.data('customizer', () => ({
                showCustomizer: false,
            }));

            // sidebar section
            Alpine.data('sidebar', () => ({
                init() {
                    const selector = document.querySelector('.sidebar ul a[href="' + window.location
                        .pathname + '"]');
                    if (selector) {
                        selector.classList.add('active');
                        const ul = selector.closest('ul.sub-menu');
                        if (ul) {
                            let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                            if (ele) {
                                ele = ele[0];
                                setTimeout(() => {
                                    ele.click();
                                });
                            }
                        }
                    }
                },
            }));

            const notesUrl = "{{ url('/api/notes') }}";
            const csrfToken = "{{ csrf_token() }}";
            // notes
            Alpine.data('notes', () => ({
                defaultParams: {
                    id: null,
                    title: '',
                    description: '',
                    tag: '',
                    user: '',
                    thumb: '',
                },

                isAddNoteModal: false,
                isDeleteNoteModal: false,
                isViewNoteModal: false,

                params: {
                    id: null,
                    title: '',
                    description: '',
                    tag: '',
                    user: '',
                    thumb: '',
                },

                isShowNoteMenu: false,

                notesList: [],

                filterdNotesList: '',
                selectedTab: 'all',
                deletedNote: null,
                selectedNote: {
                    id: null,
                    title: '',
                    description: '',
                    tag: '',
                    user: '',
                    thumb: '',
                },

                init() {
                    this.fetchNotes();
                },

                fetchNotes() {
                    fetch('{{ url('/api/notes') }}')
                        .then(response => response.json())
                        .then(data => {
                            this.notesList = data;
                            this.searchNotes();
                        })
                    .catch(error => console.error('Error fetching notes:', error));
                },

                saveNote() {
                    if (!this.params.title) {
                        this.showMessage('Title is required.', 'error');
                        return false;
                    }

                    if (this.params.id) {
                        // Update existing note
                        fetch(`${notesUrl}/${this.params.id}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: JSON.stringify(this.params),
                            })
                            .then(response => {
                                if (response.ok) {
                                    // Update note in the local list
                                    let index = this.notesList.findIndex(note => note.id === this
                                        .params.id);
                                    if (index !== -1) {
                                        this.notesList[index] = this.params;
                                        this.searchNotes();
                                    }
                                    this.showMessage('Not başarılı şekilde güncellendi.');
                                } else {
                                    throw new Error('Error updating note:', response.statusText);
                                }
                            })
                            .catch(error => console.error(error));
                    } else {
                        // Add new note
                        fetch('{{ url('/api/notes') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: JSON.stringify(this.params),
                            })
                            .then(response => {
                                if (response.ok) {
                                    // Add new note to the local list
                                    return response.json();
                                } else {
                                    throw new Error('Error adding note:', response.statusText);
                                }
                            })
                            .then(data => {
                                this.notesList.unshift(data);
                                this.searchNotes();
                                this.showMessage('Not başarılı şekilde eklendi.');
                            })
                            .catch(error => console.error(error));
                    }

                    this.isAddNoteModal = false;
                },

                tabChanged(type) {
                    this.selectedTab = type;
                    this.searchNotes();
                    this.isShowNoteMenu = false;
                },

                searchNotes() {
                    if (this.selectedTab !== 'fav') {
                        if (this.selectedTab !== 'all' || this.selectedTab === 'delete') {
                            this.filterdNotesList = this.notesList.filter(note => note.tag === this
                                .selectedTab);
                        } else {
                            this.filterdNotesList = this.notesList;
                        }
                    } else {
                        this.filterdNotesList = this.notesList.filter(note => note.isFav);
                    }
                },

                deleteNoteConfirm(note) {
                    this.deletedNote = note;
                    this.isDeleteNoteModal = true;
                },

                viewNote(note) {
                    this.selectedNote = note;
                    this.isViewNoteModal = true;
                },

                editNote(note) {
                    this.isShowNoteMenu = false;
                    this.params = Object.assign({}, this.defaultParams, note);
                    this.isAddNoteModal = true;
                },

                deleteNote() {
                    fetch(`${notesUrl}/${this.deletedNote.id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                // Remove note from the local list
                                this.notesList = this.notesList.filter(note => note.id !== this
                                    .deletedNote.id);
                                this.searchNotes();
                                this.showMessage('Not başarılı şekilde silindi.');
                            } else {
                                throw new Error('Error deleting note:', response.statusText);
                            }
                        })
                        .catch(error => console.error(error));

                    this.isDeleteNoteModal = false;
                },

                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px',
                    });
                },
            }));
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function(e) {
            var options = {
                searchable: true
            };
            NiceSelect.bind(document.getElementById("seachable-select"), options);
        });
    </script>
@endsection
