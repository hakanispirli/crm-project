<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('urunlerTablo', () => ({
            datatable: null,
            product: [],

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
                    const productId = product.id;
                    return [
                        product.id,
                        product.name,
                        product.brand.name,
                        product.stock,
                        product.price,
                        product.description,
                        `<div class="flex">
                        <button id="productBtn_${productId}" onclick="addToCart(${productId})" type="button" class="btn btn-info">Seç</button>
                        </div>`
                    ];
                });

                this.datatable = new simpleDatatables.DataTable('#urunler', {
                    data: {
                        headings: ['ID', 'Ürün Adı', 'Marka', 'Stok Adedi', 'Alış Fiyatı',
                            'Açıklama', 'İşlem'
                        ],
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
                    firstText: '<svg> ... </svg>',
                    lastText: '<svg> ... </svg>',
                    prevText: '<svg> ... </svg>',
                    nextText: '<svg> ... </svg>',
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
</script>

<script type="text/javascript">
    function addToCart(productId) {
        const button = document.getElementById(`productBtn_${productId}`);
        button.innerText = 'Seçildi';
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}'
            },

            url: '{{ url('/cart/data/store/') }}/' + productId,

            success: function(data) {

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
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
            }
        });
    }
</script>

<script type="text/javascript">
    function cart() {
        $.ajax({
            type: 'GET',
            url: '{{ url('/add-product-cart') }}',
            dataType: 'json',
            success: function(response) {

                var rows = ""
                $('#cartSubTotal').text('₺ ' + response.cartTotal);
                $('#cartQty').text(response.cartQty);

                $.each(response.carts, function(key, value) {
                    rows += `
                    <tr>
                        <td class="pro-thumbnail">
                            <span>${value.name}</span>
                        </td>
                        <td class="pro-title">
                            <span>₺ ${value.price}</span>
                        </td>
                        <td class="pro-price">
                            <div class="inline-flex">
                                <button type="button" class="bg-primary text-white flex justify-center
                                        items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary"
                                        style="padding: 0.3rem; font-size: 0.5rem;"
                                        onclick="stokUygula('${value.rowId}', 'decrease')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                    </svg>
                                </button>
                                <input id="input_${value.rowId}" type="text" value="${value.qty}" class="form-input rounded-none text-center" min="1" max="${value.stock}">
                                <button type="button" class="bg-primary text-white flex justify-center
                                        items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary"
                                        style="padding: 0.3rem; font-size: 0.5rem;"
                                        onclick="stokUygula('${value.rowId}', 'increase')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                        <td class="pro-remove">
                            <button x-tooltip="Sil" type="submit" id="${value.rowId}" onclick="CartRemove(this.id)" class="rbt-round-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="m-auto h-5 w-5">
                                    <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
                                    <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>`
                });

                $('#cartPage').html(rows);
            }
        })
    }
    cart();

    function CartRemove(rowId) {
        if (rowId === undefined || rowId === null) {
            console.error("Invalid rowId:", rowId);
            return;
        }

        $.ajax({
            type: 'GET',
            url: '{{ url('/cart/remove') }}/' + rowId,
            dataType: 'json',
            success: function(data) {
                cart();

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
                        title: data.success,
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
            }
        });
    }

    function stokUygula(rowId, action) {
        $.ajax({
            type: 'POST',
            url: '{{ url('/stok/uygula') }}/' + rowId,
            data: { action: action, _token: '{{ csrf_token() }}' },
            dataType: 'json',
            success: function(response) {
                cart();
                var updatedQty = response.cartQty;
                $('#input_' + rowId).val(updatedQty);
            }
        });
    }

</script>
