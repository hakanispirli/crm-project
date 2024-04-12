@extends('master')
@section('dashboard')
    <div x-data="exportTable">
        <div class="relative flex items-center rounded border !border-primary p-3.5 text-dark bg-dark-light border-dark before:absolute before:top-1/2 before:-mt-2 before:border-l-8 before:border-t-8 before:border-b-8 before:border-t-transparent before:border-b-transparent before:border-l-inherit ltr:border-l-[64px] ltr:before:left-0 rtl:border-r-[64px] rtl:before:right-0 rtl:before:rotate-180 dark:bg-primary-dark-light">
            <span class="absolute inset-y-0 m-auto h-6 w-6 text-white ltr:-left-11 rtl:-right-11">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                    <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
                    <path d="M12 7V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <circle cx="12" cy="16" r="1" fill="currentColor"></circle>
                </svg>
            </span>
            <span class="ltr:pr-2 rtl:pl-2">
                Bu bölümde yer alan izinler menüleri ifade etmektedir.
                <strong class="ltr:mr-1 rtl:ml-1">
                    Bu bölüm ile ilgili değişiklik yapmadan önce lütfen bizimle iletişime geçin!
                </strong>
            </span>
        </div>
        <div class="panel mt-6">
            <div class="md:absolute md:top-5 ltr:md:left-5 rtl:md:right-5">
                <div class="mb-5 flex flex-wrap items-center">
                    <button type="button" class="btn btn-primary btn-sm m-1" @click="exportTable('csv')">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                            <path
                                d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z"
                                fill="currentColor" />
                            <path opacity="0.5"
                                d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22"
                                stroke="currentColor" stroke-width="1.5" />
                        </svg>
                        EXCEL
                    </button>
                    <button type="button" class="btn btn-primary btn-sm m-1" @click="exportTable('txt')">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                            <path
                                d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z"
                                fill="currentColor" />
                            <path opacity="0.5" d="M6 14.5H14" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" />
                            <path opacity="0.5" d="M6 18H11.5" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" />
                            <path opacity="0.5"
                                d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22"
                                stroke="currentColor" stroke-width="1.5" />
                        </svg>
                        TXT
                    </button>
                    <button type="button" class="btn btn-primary btn-sm m-1" @click="printTable">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                            <path
                                d="M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C22 7.75736 22 9.17157 22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827"
                                stroke="currentColor" stroke-width="1.5" />
                            <path opacity="0.5" d="M9 10H6" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" />
                            <path d="M19 14L5 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path
                                d="M18 14V16C18 18.8284 18 20.2426 17.1213 21.1213C16.2426 22 14.8284 22 12 22C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V14"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path opacity="0.5"
                                d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2427 2 14.8284 2 12 2C9.17158 2 7.75737 2 6.87869 2.87868C6.23739 3.51998 6.06414 4.44655 6.01733 6"
                                stroke="currentColor" stroke-width="1.5" />
                            <circle opacity="0.5" cx="17" cy="10" r="1" fill="currentColor" />
                            <path opacity="0.5" d="M15 16.5H9" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" />
                            <path opacity="0.5" d="M13 19H9" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" />
                        </svg>
                        YAZDIR
                    </button>
                    <div x-data="modal">
                        <button type="button" class="btn btn-danger" @click="toggle">İzin Ekle</button>
                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="open && '!block'">
                            <div class="flex min-h-screen items-start justify-center px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300
                                    class="panel my-8 w-full max-w-sm overflow-hidden rounded-lg border-0 py-1 px-4">
                                    <div class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
                                        İzin Ekle
                                        <button type="button" @click="toggle" class="text-white-dark hover:text-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="p-5">
                                        <form id="addPermission">
                                            @csrf
                                            <div class="relative mb-4">
                                                <span
                                                    class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                        <circle cx="12" cy="6" r="4" stroke="currentColor"
                                                            stroke-width="1.5" />
                                                        <ellipse opacity="0.5" cx="12" cy="17" rx="7"
                                                            ry="4" stroke="currentColor" stroke-width="1.5" />
                                                    </svg>
                                                </span>
                                                <input type="text" name="name" placeholder="İzinler"
                                                    class="form-input ltr:pl-10 rtl:pr-10" />
                                            </div>
                                            <div class="relative mb-4">
                                                <span
                                                    class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                        <path
                                                            d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 12.7215 17.8726 13.4133 17.6392 14.054C17.5551 14.285 17.4075 14.4861 17.2268 14.6527L17.1463 14.727C16.591 15.2392 15.7573 15.3049 15.1288 14.8858C14.6735 14.5823 14.4 14.0713 14.4 13.5241V12M14.4 12C14.4 13.3255 13.3255 14.4 12 14.4C10.6745 14.4 9.6 13.3255 9.6 12C9.6 10.6745 10.6745 9.6 12 9.6C13.3255 9.6 14.4 10.6745 14.4 12Z"
                                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                        <path opacity="0.5"
                                                            d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z"
                                                            stroke="currentColor" stroke-width="1.5" />
                                                    </svg>
                                                </span>
                                                <input type="text" name="group_name" placeholder="Grup Adı"
                                                    class="form-input ltr:pl-10 rtl:pr-10" />
                                            </div>

                                            <button type="submit" class="btn btn-primary w-full">Kaydet</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table id="myTable" class="table-hover whitespace-nowrap"></table>
        </div>
    </div>

{{-- İzin Listele --}}
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('exportTable', () => ({
            datatable: null,
            permission: [],
            editPermissionModal: false,
            selectedPermission: {},
            init() {
                this.fetchPermission();
            },

            fetchPermission() {
                fetch('{{ url('/get/permissions') }}')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.permission = data.permission;
                            this.renderTable();
                        } else {
                            console.error('İzin verileri alınamadı.');
                        }
                    })
                .catch(error => {
                    console.error('Hata:', error);
                });
            },

            renderTable() {
                const rows = this.permission.map(permission => {
                    const editPermissionUrl = "{{ url('/edit/permission') }}";
                    const editPermissionUrlWithId = `${editPermissionUrl}/${permission.id}`;
                    const permissionId = permission.id;
                    return [
                        permission.id,
                        permission.name,
                        permission.group_name,
                        `<div class="flex">
                            <a href="${editPermissionUrlWithId}" class="btn btn-sm btn-outline-primary mr-2">
                                Düzenle
                            </a>
                            <a onclick="deletePermission(${permissionId})" class="btn btn-sm btn-outline-danger">
                                Sil
                            </a>
                        </div>`
                    ];
                });

                this.datatable = new simpleDatatables.DataTable('#myTable', {
                    data: {
                        headings: ['ID', 'İzinler', 'İzin Grup Adı', 'İşlem'],
                        data: rows,
                    },
                    perPage: 10,
                    perPageSelect: [10, 20, 30, 50, 100],
                    columns: [{
                            select: 0,
                            sort: 'asc',
                        },
                        {
                            select: 4,
                            render: (data, cell, row) => {
                                return this.formatDate(data);
                            },
                        },
                    ],
                    firstLast: true,
                    firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                    lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                    prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                    nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                    labels: {
                        perPage: '{select}',
                    },
                    layout: {
                        top: '{search}',
                        bottom: '{info}{select}{pager}',
                    },
                });
            },
            exportTable(eType) {
                var data = {
                    type: eType,
                    filename: 'table',
                    download: true,
                };

                if (data.type === 'csv') {
                    data.lineDelimiter = '\n';
                    data.columnDelimiter = ';';
                }
                this.datatable.export(data);
            },

            printTable() {
                this.datatable.print();
            },
        }));
    });

    function deletePermission(permissionId) {
        Swal.fire({
            title: 'Emin misiniz?',
            html: "<div style='margin-top: 20px;'>İzin verisini silmek istediğinizden emin misiniz?</div>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil',
            cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ url('/delete/permission') }}/${permissionId}`,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        _method: 'DELETE'
                    },
                    success: function(response) {
                        Swal.fire(
                            'Başarılı!',
                            'İzin verisi başarılı bir şekilde silindi.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Hata:', errorThrown);
                        Swal.fire(
                            'Hata!',
                            'İzin verisi silinirken bir hata oluştu.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>
{{-- End İzin Listele --}}

{{-- İzin Ekle --}}
<script>
    $(document).ready(function() {
        $('#addPermission').submit(function(event) {
            event.preventDefault();

            var loaderButton = $(this).find('button[type="submit"]');
            loaderButton.html('<span class="animate-spin border-2 border-white border-l-transparent rounded-full w-5 h-5 ltr:mr-4 rtl:ml-4 inline-block align-middle"></span> Kaydediliyor');

            var formData = new FormData(this);
            var addPermissionUrl = "{{ url('/add/permission') }}";

            $.ajax({
                url: addPermissionUrl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                    if (data.message) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                icon: 'success',
                                title: data.message,
                                customClass: {
                                    popup: 'swal-lg',
                                    title: 'swal-title',
                                    icon: 'swal-icon'
                                }
                            });
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.error,
                                customClass: {
                                    popup: 'swal-lg',
                                    title: 'swal-title',
                                    icon: 'swal-icon'
                                }
                            });
                        }
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                },
            });
        });
    });
</script>
{{-- End İzin Ekle --}}
@endsection
