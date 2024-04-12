@extends('master')
@section('dashboard')
    <div x-data="tumUrunler">
        <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
            <!-- button -->
            <a href="{{ route('add.products') }}" class="btn btn-primary btn-sm m-1">
                <svg style="margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H19"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path
                        d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z"
                        stroke="currentColor" stroke-width="1.5"></path>
                    <path
                        d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z"
                        stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M11 9H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path
                        d="M5 6H16.4504C18.5054 6 19.5328 6 19.9775 6.67426C20.4221 7.34853 20.0173 8.29294 19.2078 10.1818L18.7792 11.1818C18.4013 12.0636 18.2123 12.5045 17.8366 12.7523C17.4609 13 16.9812 13 16.0218 13H5"
                        stroke="currentColor" stroke-width="1.5"></path>
                </svg>
                Yeni Ürün Ekle
            </a>
            <div x-data="modal">
                <button type="button" class="btn btn-primary btn-sm m-1" @click="toggle">
                    <svg style="margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20.3116 12.6473L20.8293 10.7154C21.4335 8.46034 21.7356 7.3328 21.5081 6.35703C21.3285 5.58657 20.9244 4.88668 20.347 4.34587C19.6157 3.66095 18.4881 3.35883 16.2331 2.75458C13.978 2.15033 12.8504 1.84821 11.8747 2.07573C11.1042 2.25537 10.4043 2.65945 9.86351 3.23687C9.27709 3.86298 8.97128 4.77957 8.51621 6.44561C8.43979 6.7254 8.35915 7.02633 8.27227 7.35057L8.27222 7.35077L7.75458 9.28263C7.15033 11.5377 6.84821 12.6652 7.07573 13.641C7.25537 14.4115 7.65945 15.1114 8.23687 15.6522C8.96815 16.3371 10.0957 16.6392 12.3508 17.2435L12.3508 17.2435C14.3834 17.7881 15.4999 18.0873 16.415 17.9744C16.5152 17.9621 16.6129 17.9448 16.7092 17.9223C17.4796 17.7427 18.1795 17.3386 18.7203 16.7612C19.4052 16.0299 19.7074 14.9024 20.3116 12.6473Z"
                            stroke="currentColor" stroke-width="1.5"></path>
                        <path
                            d="M16.415 17.9741C16.2065 18.6126 15.8399 19.1902 15.347 19.6519C14.6157 20.3368 13.4881 20.6389 11.2331 21.2432C8.97798 21.8474 7.85044 22.1495 6.87466 21.922C6.10421 21.7424 5.40432 21.3383 4.86351 20.7609C4.17859 20.0296 3.87647 18.9021 3.27222 16.647L2.75458 14.7151C2.15033 12.46 1.84821 11.3325 2.07573 10.3567C2.25537 9.58627 2.65945 8.88638 3.23687 8.34557C3.96815 7.66065 5.09569 7.35853 7.35077 6.75428C7.77741 6.63996 8.16368 6.53646 8.51621 6.44531"
                            stroke="currentColor" stroke-width="1.5"></path>
                        <path d="M11.7769 10L16.6065 11.2941" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path d="M11 12.8975L13.8978 13.6739" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                    </svg>Marka Ekle</button>
                <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="open && '!block'">
                    <div class="flex min-h-screen items-start justify-center px-4" @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300
                            class="panel my-8 w-full max-w-sm overflow-hidden rounded-lg border-0 py-1 px-4">
                            <div class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
                                Marka Ekle
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
                                <form id="addBrand">
                                    @csrf
                                    <div class="relative mb-4">
                                        <span class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20.3116 12.6473L20.8293 10.7154C21.4335 8.46034 21.7356 7.3328 21.5081 6.35703C21.3285 5.58657 20.9244 4.88668 20.347 4.34587C19.6157 3.66095 18.4881 3.35883 16.2331 2.75458C13.978 2.15033 12.8504 1.84821 11.8747 2.07573C11.1042 2.25537 10.4043 2.65945 9.86351 3.23687C9.27709 3.86298 8.97128 4.77957 8.51621 6.44561C8.43979 6.7254 8.35915 7.02633 8.27227 7.35057L8.27222 7.35077L7.75458 9.28263C7.15033 11.5377 6.84821 12.6652 7.07573 13.641C7.25537 14.4115 7.65945 15.1114 8.23687 15.6522C8.96815 16.3371 10.0957 16.6392 12.3508 17.2435L12.3508 17.2435C14.3834 17.7881 15.4999 18.0873 16.415 17.9744C16.5152 17.9621 16.6129 17.9448 16.7092 17.9223C17.4796 17.7427 18.1795 17.3386 18.7203 16.7612C19.4052 16.0299 19.7074 14.9024 20.3116 12.6473Z"
                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                <path opacity="0.5"
                                                    d="M16.415 17.9741C16.2065 18.6126 15.8399 19.1902 15.347 19.6519C14.6157 20.3368 13.4881 20.6389 11.2331 21.2432C8.97798 21.8474 7.85044 22.1495 6.87466 21.922C6.10421 21.7424 5.40432 21.3383 4.86351 20.7609C4.17859 20.0296 3.87647 18.9021 3.27222 16.647L2.75458 14.7151C2.15033 12.46 1.84821 11.3325 2.07573 10.3567C2.25537 9.58627 2.65945 8.88638 3.23687 8.34557C3.96815 7.66065 5.09569 7.35853 7.35077 6.75428C7.77741 6.63996 8.16368 6.53646 8.51621 6.44531"
                                                    stroke="currentColor" stroke-width="1.5"></path>
                                            </svg>
                                        </span>
                                        <input type="text" name="name" placeholder="Marka Adı" required
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
        <div class="panel mt-6 justify-content-between">
            <h4 class="mb-5 text-lg font-semibold dark:text-white-light md:absolute md:top-[25px] md:mb-0">Ürünler</h4>
            <table id="urunler" class="whitespace-nowrap"></table>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('tumUrunler', () => ({
                datatable: null,
                product: [],
                editProductModal: false,
                selectedProduct: {},
                init() {
                    this.fetchProduct();
                },

                fetchProduct() {
                    fetch('{{ url('/products/get') }}')
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.product = data.product;
                                this.renderTable();
                            } else {
                                console.error('Ürün verileri alınamadı.');
                            }
                        })
                        .catch(error => {
                            console.error('Hata:', error);
                        });
                },

                renderTable() {
                    const rows = this.product.map(product => {
                        const productDetailUrl = "{{ url('/products/edit') }}";
                        const productDetailUrlWithId = `${productDetailUrl}/${product.id}`;
                        const productId = product.id;
                        return [
                            product.id,
                            product.name,
                            product.brand.name,
                            product.stock,
                            product.price,
                            product.description,
                            `<div class="flex">
                                <a href="${productDetailUrlWithId}" class="btn btn-sm btn-outline-primary mr-2">
                                    Düzenle
                                </a>
                                <a onclick="deleteProduct(${productId})" class="btn btn-sm btn-outline-danger">
                                    Sil
                                </a>
                            </div>`
                        ];
                    });

                    this.datatable = new simpleDatatables.DataTable('#urunler', {
                        data: {
                            headings: ['ID', 'Ürün Adı', 'Marka', 'Stok Adedi', 'Alış Fiyatı', 'Açıklama', 'İşlem'],
                            data: rows,
                        },
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                                select: 0,
                                sort: 'asc',
                            },
                            {
                                select: 7,
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

        function deleteProduct(productId) {
            Swal.fire({
                title: 'Emin misiniz?',
                html: "<div style='margin-top: 20px;'>Ürünü silmek istediğinizden emin misiniz?</div>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, Sil',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ url('/products/delete') }}/${productId}`,
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
                                'Ürün başarılı bir şekilde silindi.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Hata:', errorThrown);
                            Swal.fire(
                                'Hata!',
                                'Ürün silinirken bir hata oluştu.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>

    {{-- Marka Ekle --}}
    <script>
        $(document).ready(function() {
            $('#addBrand').submit(function(event) {
                event.preventDefault();

                var loaderButton = $(this).find('button[type="submit"]');
                loaderButton.html(
                    '<span class="animate-spin border-2 border-white border-l-transparent rounded-full w-5 h-5 ltr:mr-4 rtl:ml-4 inline-block align-middle"></span> Kaydediliyor'
                    );

                var formData = new FormData(this);
                var addBrandUrl = "{{ url('/brand/store') }}";

                $.ajax({
                    url: addBrandUrl,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
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
    {{-- End Marka Ekle --}}
@endsection
