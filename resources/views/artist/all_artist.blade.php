@extends('master')
@section('dashboard')
    <div x-data="exportTable">
        <div class="panel mt-6">
            <div class="md:absolute md:top-5 ltr:md:left-5 rtl:md:right-5">
                <div class="mb-5 flex flex-wrap items-center">
                    <div x-data="modal">
                        <button type="button" class="btn btn-info" @click="toggle">Sanatçı Ekle</button>
                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="open && '!block'">
                            <div class="flex min-h-screen items-start justify-center px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300
                                    class="panel my-8 w-full max-w-sm overflow-hidden rounded-lg border-0 py-1 px-4">
                                    <div
                                        class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
                                        Sanatçı Ekle
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
                                        <form id="addArtistForm">
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
                                                <input type="text" name="artist_name" placeholder="Adı ve Soyadı"
                                                    class="form-input ltr:pl-10 rtl:pr-10" />
                                            </div>
                                            <div class="relative mb-4">
                                                <span class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                        <path
                                                            d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 12.7215 17.8726 13.4133 17.6392 14.054C17.5551 14.285 17.4075 14.4861 17.2268 14.6527L17.1463 14.727C16.591 15.2392 15.7573 15.3049 15.1288 14.8858C14.6735 14.5823 14.4 14.0713 14.4 13.5241V12M14.4 12C14.4 13.3255 13.3255 14.4 12 14.4C10.6745 14.4 9.6 13.3255 9.6 12C9.6 10.6745 10.6745 9.6 12 9.6C13.3255 9.6 14.4 10.6745 14.4 12Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" />
                                                        <path opacity="0.5"
                                                            d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z"
                                                            stroke="currentColor" stroke-width="1.5" />
                                                    </svg>
                                                </span>
                                                <input type="email" name="artist_email" placeholder="Email"
                                                    class="form-input ltr:pl-10 rtl:pr-10" />
                                            </div>
                                            <div class="relative mb-10">
                                                <span class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.97631 2.87868L3.47803 3.43615L3.47803 3.43615L2.97631 2.87868ZM2.97631 19.1213L3.47803 18.5639L2.97631 19.1213ZM6.25 20C6.25 20.4142 6.58579 20.75 7 20.75C7.41421 20.75 7.75 20.4142 7.75 20H6.25ZM7.75 2C7.75 1.58579 7.41422 1.25 7 1.25C6.58579 1.25 6.25 1.58579 6.25 2H7.75ZM2 6.25C1.58579 6.25 1.25 6.58579 1.25 7C1.25 7.41421 1.58579 7.75 2 7.75V6.25ZM2 15.25C1.58579 15.25 1.25 15.5858 1.25 16C1.25 16.4142 1.58579 16.75 2 16.75V15.25ZM21.0237 4.87868L20.522 5.43615L21.0237 4.87868ZM21.0237 21.1213L20.522 20.5639L21.0237 21.1213ZM16.25 22C16.25 22.4142 16.5858 22.75 17 22.75C17.4142 22.75 17.75 22.4142 17.75 22H16.25ZM17.75 4C17.75 3.58579 17.4142 3.25 17 3.25C16.5858 3.25 16.25 3.58579 16.25 4H17.75ZM22 9.75C22.4142 9.75 22.75 9.41421 22.75 9C22.75 8.58579 22.4142 8.25 22 8.25V9.75ZM22 18.75C22.4142 18.75 22.75 18.4142 22.75 18C22.75 17.5858 22.4142 17.25 22 17.25V18.75ZM2.75 14V8H1.25V14H2.75ZM2.75 8C2.75 7.64443 2.75 7.31409 2.75192 7.00464L1.25195 6.99536C1.25 7.31032 1.25 7.6455 1.25 8H2.75ZM2.75192 7.00464C2.75868 5.91065 2.79037 5.14239 2.90886 4.56183C3.02163 4.00928 3.20202 3.68456 3.47803 3.43615L2.47459 2.32121C1.89684 2.84118 1.59677 3.48961 1.43915 4.26187C1.28726 5.00611 1.25863 5.91433 1.25195 6.99536L2.75192 7.00464ZM8.66667 1.25C8.05506 1.25 7.4967 1.24999 6.99024 1.25658L7.00977 2.75645C7.50454 2.75001 8.05246 2.75 8.66667 2.75V1.25ZM6.99024 1.25658C5.95477 1.27006 5.08619 1.31098 4.36486 1.45123C3.62845 1.59441 2.99885 1.84937 2.47459 2.32121L3.47803 3.43615C3.73967 3.20068 4.08877 3.033 4.65115 2.92366C5.22862 2.81138 5.97893 2.76988 7.00977 2.75645L6.99024 1.25658ZM8.66667 19.25C8.05246 19.25 7.50453 19.25 7.00976 19.2435L6.99024 20.7434C7.4967 20.75 8.05506 20.75 8.66667 20.75V19.25ZM7.00977 19.2435C5.97893 19.2301 5.22862 19.1886 4.65115 19.0763C4.08877 18.967 3.73967 18.7993 3.47803 18.5639L2.47459 19.6788C2.99885 20.1506 3.62845 20.4056 4.36486 20.5488C5.08619 20.689 5.95476 20.7299 6.99024 20.7434L7.00977 19.2435ZM1.25 14C1.25 14.7603 1.24991 15.4349 1.26967 16.0251L2.76883 15.9749C2.75009 15.4151 2.75 14.7679 2.75 14H1.25ZM1.26967 16.0251C1.32166 17.5781 1.50653 18.8075 2.47459 19.6788L3.47803 18.5639C3.02098 18.1525 2.82085 17.5288 2.76883 15.9749L1.26967 16.0251ZM6.25 19.9935V20H7.75V19.9935H6.25ZM6.25 2V2.00652H7.75V2H6.25ZM2.00193 6.25H2V7.75H2.00193V6.25ZM2.01925 15.25H2V16.75H2.01925V15.25ZM11 19.25H8.66667V20.75H11V19.25ZM8.66667 2.75H11V1.25H8.66667V2.75ZM22.75 16V10H21.25V16H22.75ZM22.75 10C22.75 9.6455 22.75 9.31032 22.7481 8.99536L21.2481 9.00464C21.25 9.31409 21.25 9.64443 21.25 10H22.75ZM22.7481 8.99536C22.7414 7.91433 22.7127 7.00611 22.5608 6.26187C22.4032 5.48961 22.1032 4.84118 21.5254 4.32121L20.522 5.43615C20.798 5.68456 20.9784 6.00928 21.0911 6.56183C21.2096 7.14239 21.2413 7.91065 21.2481 9.00464L22.7481 8.99536ZM15.3333 4.75C15.9475 4.75 16.4955 4.75001 16.9902 4.75645L17.0098 3.25658C16.5033 3.24999 15.9449 3.25 15.3333 3.25V4.75ZM16.9902 4.75645C18.0211 4.76988 18.7714 4.81138 19.3489 4.92366C19.9112 5.033 20.2603 5.20068 20.522 5.43615L21.5254 4.32121C21.0011 3.84937 20.3716 3.59441 19.6351 3.45123C18.9138 3.31098 18.0452 3.27006 17.0098 3.25658L16.9902 4.75645ZM15.3333 22.75C15.9449 22.75 16.5033 22.75 17.0098 22.7434L16.9902 21.2435C16.4955 21.25 15.9475 21.25 15.3333 21.25V22.75ZM17.0098 22.7434C18.0452 22.7299 18.9138 22.689 19.6351 22.5488C20.3716 22.4056 21.0011 22.1506 21.5254 21.6788L20.522 20.5639C20.2603 20.7993 19.9112 20.967 19.3489 21.0763C18.7714 21.1886 18.0211 21.2301 16.9902 21.2435L17.0098 22.7434ZM21.25 16C21.25 16.7679 21.2499 17.4151 21.2312 17.9749L22.7303 18.0251C22.7501 17.4349 22.75 16.7603 22.75 16H21.25ZM21.2312 17.9749C21.1792 19.5288 20.979 20.1525 20.522 20.5639L21.5254 21.6788C22.4935 20.8075 22.6783 19.5781 22.7303 18.0251L21.2312 17.9749ZM16.25 21.9935V22H17.75V21.9935H16.25ZM16.25 4V4.00652H17.75V4H16.25ZM21.9981 9.75H22V8.25H21.9981V9.75ZM21.9808 18.75H22V17.25H21.9808V18.75ZM13 22.75H15.3333V21.25H13V22.75ZM15.3333 3.25H13V4.75H15.3333V3.25ZM11.25 21C11.25 21.9665 12.0335 22.75 13 22.75V21.25C12.8619 21.25 12.75 21.1381 12.75 21H11.25ZM12.75 3C12.75 2.0335 11.9665 1.25 11 1.25V2.75C11.1381 2.75 11.25 2.86193 11.25 3L12.75 3ZM13 3.25C12.8619 3.25 12.75 3.13807 12.75 3L11.25 3C11.25 3.9665 12.0335 4.75 13 4.75V3.25ZM11 20.75C11.1381 20.75 11.25 20.8619 11.25 21H12.75C12.75 20.0335 11.9665 19.25 11 19.25V20.75Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.5"
                                                            d="M2.00195 6.25032C1.58774 6.25032 1.25195 6.5861 1.25195 7.00032C1.25195 7.41453 1.58774 7.75032 2.00195 7.75032L2.00195 6.25032ZM7.75002 2.00684C7.75002 1.59262 7.41424 1.25684 7.00002 1.25684C6.58581 1.25684 6.25002 1.59262 6.25002 2.00684H7.75002ZM6.25002 19.9938C6.25002 20.408 6.58581 20.7438 7.00002 20.7438C7.41424 20.7438 7.75002 20.408 7.75002 19.9938H6.25002ZM2.01927 15.2503C1.60506 15.2503 1.26927 15.5861 1.26927 16.0003C1.26927 16.4145 1.60506 16.7503 2.01927 16.7503L2.01927 15.2503ZM7.00002 7.00032V7.75032V7.00032ZM11.25 20.0003C11.25 20.4145 11.5858 20.7503 12 20.7503C12.4142 20.7503 12.75 20.4145 12.75 20.0003H11.25ZM21.9981 9.75032C22.4123 9.75032 22.7481 9.41453 22.7481 9.00032C22.7481 8.5861 22.4123 8.25032 21.9981 8.25032V9.75032ZM17.75 4.00684C17.75 3.59262 17.4142 3.25684 17 3.25684C16.5858 3.25684 16.25 3.59262 16.25 4.00684H17.75ZM16.25 21.9938C16.25 22.408 16.5858 22.7438 17 22.7438C17.4142 22.7438 17.75 22.408 17.75 21.9938H16.25ZM21.9808 18.7503C22.395 18.7503 22.7308 18.4145 22.7308 18.0003C22.7308 17.5861 22.395 17.2503 21.9808 17.2503V18.7503ZM17 9.00032V9.75032V9.00032ZM12 9.00032V8.25032H11.25V9.00032H12ZM12 18.0003H11.25V18.7503H12V18.0003ZM12.75 3.00032C12.75 2.58611 12.4142 2.25032 12 2.25032C11.5858 2.25032 11.25 2.5861 11.25 3.00032L12.75 3.00032ZM6.25002 16.0003L6.25002 19.9938H7.75002L7.75002 16.0003H6.25002ZM6.25002 2.00684V7.00032H7.75002V2.00684H6.25002ZM11.25 3.00032L11.25 7.00032L12.75 7.00032L12.75 3.00032L11.25 3.00032ZM12 6.25032L7.00002 6.25032V7.75032L12 7.75032V6.25032ZM7.00002 6.25032L2.00195 6.25032L2.00195 7.75032L7.00002 7.75032V6.25032ZM11.25 7.00032V16.0003H12.75V7.00032H11.25ZM11.25 16.0003V20.0003H12.75V16.0003H11.25ZM12 15.2503L7.00002 15.2503V16.7503L12 16.7503V15.2503ZM7.00002 15.2503L2.01927 15.2503L2.01927 16.7503L7.00002 16.7503V15.2503ZM16.25 18.0003L16.25 21.9938H17.75L17.75 18.0003H16.25ZM16.25 4.00684V9.00032H17.75V4.00684H16.25ZM12 9.75032L17 9.75032V8.25032L12 8.25032V9.75032ZM17 9.75032L21.9981 9.75032V8.25032L17 8.25032V9.75032ZM11.25 9.00032V18.0003H12.75V9.00032H11.25ZM12 18.7503H17V17.2503H12V18.7503ZM17 18.7503H21.9808V17.2503H17V18.7503Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <input type="tel" name="artist_telefon" placeholder="Telefon"
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
            <table id="artistTable" class="table-hover whitespace-nowrap"></table>
        </div>
    </div>

{{-- Sanatçı Listele --}}
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('exportTable', () => ({
            datatable: null,
            artists: [], // Değişken adını 'artists' olarak güncelledim
            init() {
                this.fetchArtists(); // 'fetchArtists' olarak güncelledim
            },

            fetchArtists() { // 'fetchArtists' olarak güncelledim
                fetch('{{ url('/artist/all') }}')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.artists = data.artists; // Verileri doğru şekilde ata
                            this.renderTable();
                        } else {
                            console.error('Sanatçı verileri alınamadı.');
                        }
                    })
                    .catch(error => {
                        console.error('Hata:', error);
                    });
            },

            renderTable() {
                const rows = this.artists.map(artist => {
                const artistDetailUrl = "{{ url('/artist/edit') }}";
                const artistDetailUrlWithId = `${artistDetailUrl}/${artist.id}`;
                const artistId = artist.id;
                    return [
                        artist.id,
                        artist.artist_name,
                        artist.artist_email,
                        artist.artist_telefon,
                        `<div class="flex">
                            <a href="${artistDetailUrlWithId}"  class="btn btn-sm btn-outline-primary mr-2">
                                Düzenle
                            </a>
                            <a onclick="deleteArtist(${artistId})" class="btn btn-sm btn-outline-danger" id="delete">
                                Sil
                            </a>
                        </div>`
                    ];
                });

                this.datatable = new simpleDatatables.DataTable('#artistTable', {
                    data: {
                        headings: ['ID', 'Adı Soyadı', 'Email', 'Telefon', 'İşlem'],
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

    function deleteArtist(artistId) {
        Swal.fire({
            title: 'Emin misiniz?',
            html: "<div style='margin-top: 20px;'>Sanatçıyı silmek istediğinizden emin misiniz?</div>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil',
            cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ url('/artist/delete') }}/${artistId}`,
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
                            'Sanatçı başarılı bir şekilde silindi.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Hata:', errorThrown);
                        Swal.fire(
                            'Hata!',
                            'Sanatçı silinirken bir hata oluştu.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>
{{-- End Sanatçı Listele --}}

{{-- Sanatçı Ekle --}}
<script>
    $(document).ready(function() {
        $('#addArtistForm').submit(function(event) {
            event.preventDefault();

            var loaderButton = $(this).find('button[type="submit"]');
            loaderButton.html(
                '<span class="animate-spin border-2 border-white border-l-transparent rounded-full w-5 h-5 ltr:mr-4 rtl:ml-4 inline-block align-middle"></span> Kaydediliyor'
                );

            var formData = new FormData(this);
            var addArtistUrl = "{{ route('add.artist') }}";

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
{{-- End Sanatçı Ekle --}}
@endsection
