@extends('master')
@section('dashboard')
    <div x-data="calendar">
        <div class="panel">
            <div class="mb-5">
                <div class="mb-4 flex flex-col items-center justify-center sm:flex-row sm:justify-between">
                    <div class="mb-4 sm:mb-0">
                        <div class="text-center text-lg font-semibold ltr:sm:text-left rtl:sm:text-right">Randevu Takvimi
                        </div>
                        <div class="mt-2 flex flex-wrap items-center justify-center sm:justify-start">
                            <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                <div class="h-2.5 w-2.5 rounded-sm bg-primary ltr:mr-2 rtl:ml-2"></div>
                                <div>Tattoo</div>
                            </div>
                            <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                <div class="h-2.5 w-2.5 rounded-sm bg-danger ltr:mr-2 rtl:ml-2"></div>
                                <div>Piercing</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex">
                        <a href="{{ route('randevu.listesi') }}" class="btn btn-danger mr-2">
                            <svg style="margin-right: 5px;" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.082 3.01787L20.1081 3.76741L20.082 3.01787ZM16.5 3.48757L16.2849 2.76907V2.76907L16.5 3.48757ZM13.6738 4.80287L13.2982 4.15375L13.2982 4.15375L13.6738 4.80287ZM3.9824 3.07501L3.93639 3.8236L3.9824 3.07501ZM7 3.48757L7.19136 2.76239V2.76239L7 3.48757ZM10.2823 4.87558L9.93167 5.5386L10.2823 4.87558ZM13.6276 20.0694L13.9804 20.7312L13.6276 20.0694ZM17 18.6335L16.8086 17.9083H16.8086L17 18.6335ZM19.9851 18.2229L20.032 18.9715L19.9851 18.2229ZM10.3724 20.0694L10.0196 20.7312H10.0196L10.3724 20.0694ZM7 18.6335L7.19136 17.9083H7.19136L7 18.6335ZM4.01486 18.2229L3.96804 18.9715H3.96804L4.01486 18.2229ZM2.75 16.1437V4.99792H1.25V16.1437H2.75ZM22.75 16.1437V4.93332H21.25V16.1437H22.75ZM20.0559 2.26832C18.9175 2.30798 17.4296 2.42639 16.2849 2.76907L16.7151 4.20606C17.6643 3.92191 18.9892 3.80639 20.1081 3.76741L20.0559 2.26832ZM16.2849 2.76907C15.2899 3.06696 14.1706 3.6488 13.2982 4.15375L14.0495 5.452C14.9 4.95981 15.8949 4.45161 16.7151 4.20606L16.2849 2.76907ZM3.93639 3.8236C4.90238 3.88297 5.99643 3.99842 6.80864 4.21274L7.19136 2.76239C6.23055 2.50885 5.01517 2.38707 4.02841 2.32642L3.93639 3.8236ZM6.80864 4.21274C7.77076 4.46663 8.95486 5.02208 9.93167 5.5386L10.6328 4.21257C9.63736 3.68618 8.32766 3.06224 7.19136 2.76239L6.80864 4.21274ZM13.9804 20.7312C14.9714 20.2029 16.1988 19.6206 17.1914 19.3587L16.8086 17.9083C15.6383 18.2171 14.2827 18.8702 13.2748 19.4075L13.9804 20.7312ZM17.1914 19.3587C17.9943 19.1468 19.0732 19.0314 20.032 18.9715L19.9383 17.4744C18.9582 17.5357 17.7591 17.6575 16.8086 17.9083L17.1914 19.3587ZM10.7252 19.4075C9.71727 18.8702 8.3617 18.2171 7.19136 17.9083L6.80864 19.3587C7.8012 19.6206 9.0286 20.2029 10.0196 20.7312L10.7252 19.4075ZM7.19136 17.9083C6.24092 17.6575 5.04176 17.5357 4.06168 17.4744L3.96804 18.9715C4.9268 19.0314 6.00566 19.1468 6.80864 19.3587L7.19136 17.9083ZM21.25 16.1437C21.25 16.8295 20.6817 17.4279 19.9383 17.4744L20.032 18.9715C21.5062 18.8793 22.75 17.6799 22.75 16.1437H21.25ZM22.75 4.93332C22.75 3.47001 21.5847 2.21507 20.0559 2.26832L20.1081 3.76741C20.7229 3.746 21.25 4.25173 21.25 4.93332H22.75ZM1.25 16.1437C1.25 17.6799 2.49378 18.8793 3.96804 18.9715L4.06168 17.4744C3.31831 17.4279 2.75 16.8295 2.75 16.1437H1.25ZM13.2748 19.4075C12.4825 19.8299 11.5175 19.8299 10.7252 19.4075L10.0196 20.7312C11.2529 21.3886 12.7471 21.3886 13.9804 20.7312L13.2748 19.4075ZM13.2982 4.15375C12.4801 4.62721 11.4617 4.65083 10.6328 4.21257L9.93167 5.5386C11.2239 6.22189 12.791 6.18037 14.0495 5.452L13.2982 4.15375ZM2.75 4.99792C2.75 4.30074 3.30243 3.78463 3.93639 3.8236L4.02841 2.32642C2.47017 2.23065 1.25 3.49877 1.25 4.99792H2.75Z"
                                    fill="currentColor"></path>
                                <path opacity="0.5" d="M12 5.854V20.9999" stroke="currentColor" stroke-width="1.5"></path>
                                <path opacity="0.5" d="M5 9L9 10" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"></path>
                                <path opacity="0.5" d="M5 13L9 14" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"></path>
                                <path opacity="0.5" d="M19 13L15 14" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"></path>
                                <path
                                    d="M19 5.5V9.51029C19 9.78587 19 9.92366 18.9051 9.97935C18.8103 10.035 18.6806 9.97343 18.4211 9.85018L17.1789 9.26011C17.0911 9.21842 17.0472 9.19757 17 9.19757C16.9528 9.19757 16.9089 9.21842 16.8211 9.26011L15.5789 9.85018C15.3194 9.97343 15.1897 10.035 15.0949 9.97935C15 9.92366 15 9.78587 15 9.51029V6.95002"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                            Tüm Randevular
                        </a>
                        <button type="button" class="btn btn-primary" @click="editEvent()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Randevu Oluştur
                        </button>
                    </div>

                    <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                        :class="addRandevuModal && '!block'">
                        <div class="flex min-h-screen items-center justify-center px-4"
                            @click.self="addRandevuModal = false">
                            <div x-show="addRandevuModal" x-transition x-transition.duration.300
                                class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full">
                                <button type="button"
                                    class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                    @click="addRandevuModal = false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <h3 class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]"
                                    x-text="params.id ? 'Randevu Güncelle' : 'Randevu Oluştur'"></h3>
                                <div class="p-5">
                                    <form @submit.prevent="saveEvent">
                                        <div class="mb-5">
                                            <label for="title">Randevu Başlığı :</label>
                                            <input type="text" id="title" name="title" class="form-input"
                                                x-model="params.title" />
                                            <div class="mt-2 text-danger" id="titleErr"></div>
                                        </div>
                                        <div class="mb-5">
                                            <label>Müşteri :</label>
                                            <select class="form-select" name="customer_id" id="customer_id" x-model="params.customer_id">
                                                @foreach ($musteri as $item)
                                                    <option value="{{ $item->id }}" {{ $loop->first ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="mt-2 text-danger"></div>
                                        </div>
                                        <div class="mb-5">
                                            <label>Sanatçı :</label>
                                            <select class="form-select" name="artist_id" id="artist_id" x-model="params.artist_id">
                                                @foreach ($sanatci as $item)
                                                    <option value="{{ $item->id }}" {{ $loop->first ? 'selected' : '' }}>{{ $item->artist_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="mt-2 text-danger"></div>
                                        </div>


                                        <div class="mb-5">
                                            <label for="dateStart">Başlangıç :</label>
                                            <input id="dateStart" type="datetime-local" name="start"
                                                class="form-input" x-model="params.start" />
                                            <div class="mt-2 text-danger" id="startDateErr"></div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="dateEnd">Bitiş :</label>
                                            <input id="dateEnd" type="datetime-local" name="end"
                                                class="form-input" x-model="params.end" />
                                            <div class="mt-2 text-danger" id="endDateErr"></div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="description">Açıklama :</label>
                                            <textarea id="description" name="description" class="form-textarea min-h-[130px]"
                                                placeholder="Randevu Açıklama Bölümü" x-model="params.description"></textarea>
                                        </div>
                                        <div class="mb-5">
                                            <label for="on_odeme">Ön Ödeme :</label>
                                            <input type="text" id="on_odeme" name="on_odeme" class="form-input"
                                                x-model="params.on_odeme" />
                                        </div>
                                        <div class="mb-5">
                                            <label for="toplam_odeme">Toplam Ödeme :</label>
                                            <input type="text" id="toplam_odeme" name="toplam_odeme"
                                                class="form-input" x-model="params.toplam_odeme" />
                                        </div>
                                        <div class="mb-5">
                                            <label>Dövme Modeli :</label>
                                            <input id="dovme_modeli" name="dovme_modeli" type="file" x-model="params.dovme_modeli" accept="image/*"
                                            class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" />
                                        </div>
                                        <div class="mb-5">
                                            <label>Hizmet :</label>
                                            <div class="mt-3">
                                                @foreach ($service as $item)
                                                    <label class="inline-flex cursor-pointer ltr:mr-3 rtl:ml-3">
                                                        <input type="radio" class="form-radio" name="service_id" id="service_id" value="{{ $item->id }}" x-model="params.service_id"/>
                                                        <span class="ltr:pl-2 rtl:pr-2">{{ $item->service_name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-8 flex items-center justify-end">
                                            <button type="button" class="btn btn-outline-danger"
                                                @click="addRandevuModal = false">Cancel</button>
                                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                x-text="params.id ? 'Randevu Güncelle' : 'Randevu Oluştur'"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="calendar-wrapper" id="calendar"></div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('alpine:init', () => {
            // main section
            Alpine.data('scrollToTop', () => ({
                showTopButton: false,
                init() {
                    window.onscroll = () => {
                        this.scrollFunction();
                    };
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

            //calendar
            Alpine.data('calendar', () => ({
                defaultParams: {
                    id: null,
                    title: '',
                    customer_id: '',
                    artist_id: '',
                    start: '',
                    end: '',
                    description: '',
                    on_odeme: '',
                    toplam_odeme: '',
                    service_id: '',
                    dovme_modeli: null,
                },
                params: {},
                addRandevuModal: false,
                events: [],
                calendar: null,
                init() {
                    this.fetchAppointments();
                },
                getClassNameForService(service_id) {
                    switch (service_id) {
                        case 1:
                            return 'primary';
                        case 2:
                            return 'danger';
                        case 3:
                            return 'info';
                        case 4:
                            return 'success';
                        default:
                            return 'primary';
                    }
                },
                fetchAppointments() {
                    fetch('{{ route('api.appointments.get') }}')
                        .then(response => response.json())
                        .then(data => {
                            this.events = data.map(appointment => ({
                                id: appointment.id,
                                title: appointment.title ? appointment.title : 'Yeni Randevu',
                                start: appointment.start,
                                end: appointment.end,
                                description: appointment.description,
                                on_odeme: appointment.on_odeme,
                                toplam_odeme: appointment.toplam_odeme,
                                className: this.getClassNameForService(appointment.service_id),
                                customer_id: appointment.customer_id,
                                artist_id: appointment.artist_id,
                                dovme_modeli: appointment.dovme_modeli,
                            }));
                            this.initializeCalendar();
                        })
                    .catch(error => {
                        console.error('Randevuları çekerken bir hata oluştu:', error);
                    });
                },
                initializeCalendar() {
                    const calendarEl = document.getElementById('calendar');
                    this.calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        timeZone: 'local',
                        locale: 'tr',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay',
                        },
                        editable: true,
                        dayMaxEvents: true,
                        selectable: true,
                        droppable: true,
                        eventClick: (event) => {
                            this.editEvent(event);
                        },
                        select: (event) => {
                            this.editDate(event);
                        },
                        events: this.events,
                    });
                    this.calendar.render();
                },
                editEvent(data) {
                    if (data && data.event) {
                        const event = data.event;
                        this.params = {
                            id: event.id ? event.id : null,
                            title: event.title ? event.title : '',
                            customer_id: event.extendedProps && event.extendedProps.customer_id ?
                                event.extendedProps.customer_id : document.getElementById('customer_id').value,
                            artist_id: event.extendedProps && event.extendedProps.artist_id ? event
                                .extendedProps.artist_id : document.getElementById('artist_id').value,
                            start: this.dateFormat(event.start),
                            end: this.dateFormat(event.end),
                            description: event.extendedProps ? event.extendedProps.description : '',
                            on_odeme: event.extendedProps && event.extendedProps.on_odeme ? event
                                .extendedProps.on_odeme : '',
                            toplam_odeme: event.extendedProps && event.extendedProps.toplam_odeme ?
                                event.extendedProps.toplam_odeme : '',
                            service_id: event.extendedProps && event.extendedProps.service_id ? event
                                .extendedProps.service_id : '',
                            dovme_modeli: event.dovme_modeli ? event.dovme_modeli : '',
                        };
                    } else {
                        this.params = Object.assign({}, this.defaultParams);
                        this.params.customer_id = document.getElementById('customer_id').value;
                        this.params.artist_id = document.getElementById('artist_id').value;
                    }
                    this.addRandevuModal = true;
                },
                editDate(data) {
                    const obj = {
                        event: {
                            start: data.start,
                            end: data.end,
                        },
                    };
                    this.editEvent(obj);
                },
                dateFormat(dt) {
                    dt = new Date(dt);
                    const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt.getMonth() +
                        1;
                    const date = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                    const hours = dt.getHours() < 10 ? '0' + dt.getHours() : dt.getHours();
                    const mins = dt.getMinutes() < 10 ? '0' + dt.getMinutes() : dt.getMinutes();
                    dt = dt.getFullYear() + '-' + month + '-' + date + 'T' + hours + ':' + mins;
                    return dt;
                },
                saveEvent() {
                    const url = this.params.id ? "{{ route('api.appointment.update', ':id') }}" :
                        "{{ route('api.appointment.store') }}";
                    const method = this.params.id ? 'PUT' : 'POST';
                    const csrfToken = "{{ csrf_token() }}";

                    const fileInput = document.getElementById('dovme_modeli');
                    const file = fileInput.files[0];

                    const formData = new FormData();
                    formData.append('title', this.params.title);
                    formData.append('customer_id', this.params.customer_id);
                    formData.append('artist_id', this.params.artist_id);
                    formData.append('start', this.params.start);
                    formData.append('end', this.params.end);
                    formData.append('description', this.params.description);
                    formData.append('on_odeme', this.params.on_odeme);
                    formData.append('toplam_odeme', this.params.toplam_odeme);
                    formData.append('service_id', this.params.service_id);
                    formData.append('dovme_modeli', file);

                    fetch(url.replace(':id', this.params.id), {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-HTTP-Method-Override': method,
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                    })
                    .then(response => {
                        if (!response.ok) {
                            // Sunucudan dönen yanıtın JSON formatında olduğunu kontrol et
                            if (response.headers.get('content-type') !== 'application/json') {
                                console.error('Sunucudan dönen yanıt JSON formatında değil.');
                                return Promise.reject('Sunucudan dönen yanıt JSON formatında değil.');
                            }
                            return response.json().then(errorData => {
                                if (errorData.errors) {
                                    const errorMessages = Object.values(errorData.errors).flat().join('\n');
                                    this.showMessage(errorMessages, 'error');
                                } else {
                                    this.showMessage('Beklenmeyen bir hata oluştu. Lütfen tekrar deneyin.', 'error');
                                }
                                throw new Error('Ağ yanıtı düzgün değil');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (this.params.id) {
                            let eventIndex = this.events.findIndex(event => event.id === this.params.id);
                            if (eventIndex !== -1) {
                                this.events[eventIndex].title = data.title;
                                this.events[eventIndex].start = data.start;
                                this.events[eventIndex].end = data.end;
                                this.events[eventIndex].description = data.description;
                                this.events[eventIndex].className = this.getClassNameForService(data.service_id);
                                this.events[eventIndex].customer_id = data.customer_id;
                                this.events[eventIndex].artist_id = data.artist_id;
                                this.events[eventIndex].on_odeme = data.on_odeme;
                                this.events[eventIndex].toplam_odeme = data.toplam_odeme;
                                this.events[eventIndex].dovme_modeli = data.dovme_modeli;
                            }
                        } else {
                            this.events.push({
                                id: data.id,
                                title: data.title,
                                start: data.start,
                                end: data.end,
                                description: data.description,
                                className: this.getClassNameForService(data.service_id),
                                customer_id: data.customer_id,
                                artist_id: data.artist_id,
                                on_odeme: data.on_odeme,
                                toplam_odeme: data.toplam_odeme,
                                dovme_modeli: data.dovme_modeli,
                            });
                        }
                        this.calendar.refetchEvents();
                        this.showMessage('Randevu başarıyla ' + (this.params.id ?
                            'güncellendi' : 'eklendi') + '.', 'success');
                            setTimeout(() => {
                            window.location.reload();
                        }, 500);
                        this.addRandevuModal = false;
                    })
                    .catch(error => {
                        console.error('Sistemsel bir hata meydana geldi. Lütfen daha sonra tekrar deneyin.:', error);
                        this.showMessage('Lütfen eksik alanları doldurun.', 'error');
                    });
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
@endsection
