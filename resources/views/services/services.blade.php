@extends('master')
@section('dashboard')
    <div x-data="exportTable">
        <div class="panel mt-6">
            <div class="md:absolute md:top-5 ltr:md:left-5 rtl:md:right-5">
                <div class="mb-5 flex flex-wrap items-center">
                    <div x-data="modal">
                        <button type="button" class="btn btn-info" @click="toggle">Hizmet Ekle</button>
                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="open && '!block'">
                            <div class="flex min-h-screen items-start justify-center px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300
                                    class="panel my-8 w-full max-w-sm overflow-hidden rounded-lg border-0 py-1 px-4">
                                    <div
                                        class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
                                        Hizmet Ekle
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
                                        <form id="addServiceForm">
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
                                                <input type="text" name="service_name" placeholder="Hizmet Adı"
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
            <table id="serviceTable" class="table-hover whitespace-nowrap"></table>
        </div>
    </div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('exportTable', () => ({
            datatable: null,
            services: [],
            init() {
                this.fetchArtists();
            },

            fetchArtists() {
                fetch('{{ url('/services/get') }}')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.services = data.services;
                            this.renderTable();
                        } else {
                            console.error('Hizmet verileri alınamadı.');
                        }
                    })
                    .catch(error => {
                        console.error('Hata:', error);
                    });
            },

            renderTable() {
                const rows = this.services.map(service => {
                const serviceDetailUrl = "{{ url('/services/edit') }}";
                const serviceDetailUrlWithId = `${serviceDetailUrl}/${service.id}`;
                const serviceId = service.id;
                    return [
                        service.id,
                        service.service_name,
                        `<div class="flex">
                            <a href="${serviceDetailUrlWithId}"  class="btn btn-sm btn-outline-primary mr-2">
                                Düzenle
                            </a>
                            <a onclick="deleteService(${serviceId})" class="btn btn-sm btn-outline-danger" id="delete">
                                Sil
                            </a>
                        </div>`
                    ];
                });

                this.datatable = new simpleDatatables.DataTable('#serviceTable', {
                    data: {
                        headings: ['ID', 'Hizmet Adı', 'İşlem'],
                        data: rows, // Oluşturulan satırları buraya ekleyin
                    },
                    perPage: 10,
                    perPageSelect: [10, 20, 30, 50, 100],
                    columns: [{
                            select: 0,
                            sort: 'asc',
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
        }));
    });

    function deleteService(serviceId) {
        Swal.fire({
            title: 'Emin misiniz?',
            html: "<div style='margin-top: 20px;'>Bu hizmeti silmek istediğinizden emin misiniz?</div>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil',
            cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ url('/services/delete') }}/${serviceId}`,
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
                            'Hizmet başarılı bir şekilde silindi.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Hata:', errorThrown);
                        Swal.fire(
                            'Hata!',
                            'Hizmet silinirken bir hata oluştu.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        $('#addServiceForm').submit(function(event) {
            event.preventDefault();

            var loaderButton = $(this).find('button[type="submit"]');
            loaderButton.html(
                '<span class="animate-spin border-2 border-white border-l-transparent rounded-full w-5 h-5 ltr:mr-4 rtl:ml-4 inline-block align-middle"></span> Kaydediliyor'
                );

            var formData = new FormData(this);
            var addArtistUrl = "{{ route('services.add') }}";

            $.ajax({
                url: addArtistUrl,
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
@endsection
