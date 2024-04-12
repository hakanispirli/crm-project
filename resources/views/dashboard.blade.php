@extends('master')
@section('dashboard')
    <div x-data="sales">
        <div class="pt-5">
            <div class="mb-6 grid grid-cols-1 gap-6 text-white sm:grid-cols-2 xl:grid-cols-4">
                <!-- Randevular -->
                @php
                    use Illuminate\Support\Facades\DB;
                    use Carbon\Carbon;

                    // Bu haftaki randevu gelirini hesapla
                    $currentWeekRevenue = DB::table('appointments')
                        ->whereBetween('start', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                        ->sum('toplam_odeme');

                    // Geçen haftaki randevu gelirini hesapla
                    $lastWeekRevenue = DB::table('appointments')
                        ->whereBetween('start', [
                            Carbon::now()->startOfWeek()->subWeek(),
                            Carbon::now()->endOfWeek()->subWeek(),
                        ])
                        ->sum('toplam_odeme');

                    // Bu hafta oluşturulan randevu sayısını hesapla
                    $currentWeekAppointments = DB::table('appointments')
                        ->whereBetween('start', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                        ->count();

                    // Geçen hafta oluşturulan randevu sayısını hesapla
                    $lastWeekAppointments = DB::table('appointments')
                        ->whereBetween('start', [
                            Carbon::now()->startOfWeek()->subWeek(),
                            Carbon::now()->endOfWeek()->subWeek(),
                        ])
                        ->count();

                    // Haftalık Randevu Sayısı Farkı
                    $weeklyIncrease = $currentWeekAppointments - $lastWeekAppointments;

                    // Haftalık Randevulardan Elde Edilen Gelir Farkı
                    $weeklyRevenueIncrease = $currentWeekRevenue - $lastWeekRevenue;

                    // Yüzdesel artış veya azalışı hesapla
                    $appointmentCountPercentageDifference = 0;
                    $totalAppointmentPercentageDifference = 0;

                    if ($lastWeekAppointments != 0) {
                        $appointmentCountPercentageDifference = ($weeklyIncrease / $lastWeekAppointments) * 100;
                    } else {
                        $appointmentCountPercentageDifference =
                            'Önceki hafta randevu oluşturulmadığı için yüzdesel değişim hesaplanamıyor.';
                    }

                    if ($lastWeekRevenue != 0) {
                        $totalAppointmentPercentageDifference = ($weeklyRevenueIncrease / $lastWeekRevenue) * 100;
                    } else {
                        $totalAppointmentPercentageDifference =
                            'Önceki hafta randevu oluşturulmadığı için yüzdesel değişim hesaplanamıyor.';
                    }
                @endphp

                <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
                    <div class="flex justify-between">
                        <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Randevu Geliri (Haftalık)</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">₺{{ $currentWeekRevenue }}</div>
                        <div class="badge bg-white/30">
                            @if ($totalAppointmentPercentageDifference > 0)
                                + {{ number_format($totalAppointmentPercentageDifference, 2) }}%
                            @else
                                {{ number_format($totalAppointmentPercentageDifference, 2) }}%
                            @endif
                        </div>
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5"
                                d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path
                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        @if ($weeklyRevenueIncrease > 0)
                            Bu hafta geçen haftaya göre gelir {{ number_format($weeklyRevenueIncrease, 2) }} TL arttı.
                        @elseif ($weeklyRevenueIncrease < 0)
                            Bu hafta geçen haftaya göre gelir {{ number_format(abs($weeklyRevenueIncrease), 2) }} TL azaldı.
                        @else
                            Bu hafta geçen hafta ile aynı gelir elde edildi.
                        @endif
                    </div>
                </div>
                <div class="panel bg-gradient-to-r from-violet-500 to-violet-400">
                    <div class="flex justify-between">
                        <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Randevu Sayısı (Haftalık)</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">{{ $currentWeekAppointments }}</div>
                        <div class="badge bg-white/30">
                            @if ($appointmentCountPercentageDifference > 0)
                                + {{ number_format($appointmentCountPercentageDifference, 2) }}%
                            @else
                                {{ number_format($appointmentCountPercentageDifference, 2) }}%
                            @endif
                        </div>
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5"
                                d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path
                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        @if ($weeklyIncrease > 0)
                            Bu hafta geçen haftaya göre {{ $weeklyIncrease }} adet daha fazla randevu oluşturuldu.
                        @elseif ($weeklyIncrease < 0)
                            Bu hafta geçen haftaya göre {{ abs($weeklyIncrease) }} adet daha az randevu oluşturuldu.
                        @else
                            Bu hafta geçen hafta ile aynı sayıda randevu oluşturuldu.
                        @endif
                    </div>
                </div>
                @php
                    // Bu ayın aylık satış sayısını hesapla
                    $currentMonthSalesCount = DB::table('satis')
                        ->where('order_month', Carbon::now()->locale('tr_TR')->isoFormat('MMMM'))
                        ->where('order_year', Carbon::now()->locale('tr_TR')->isoFormat('YYYY'))
                        ->count();

                    // Bu ayın aylık satış gelirini hesapla
                    $currentMonthTotalRevenue = DB::table('satis')
                        ->where('order_month', Carbon::now()->locale('tr_TR')->isoFormat('MMMM'))
                        ->where('order_year', Carbon::now()->locale('tr_TR')->isoFormat('YYYY'))
                        ->sum('toplam_satis_tutari');

                    // Geçen ayın aylık satış sayısını ve gelirini hesapla
                    $lastMonthSalesCount = DB::table('satis')
                        ->where('order_month', Carbon::now()->subMonth()->locale('tr_TR')->isoFormat('MMMM'))
                        ->where('order_year', Carbon::now()->subMonth()->locale('tr_TR')->isoFormat('YYYY'))
                        ->count();

                    $lastMonthTotalRevenue = DB::table('satis')
                        ->where('order_month', Carbon::now()->subMonth()->locale('tr_TR')->isoFormat('MMMM'))
                        ->where('order_year', Carbon::now()->subMonth()->locale('tr_TR')->isoFormat('YYYY'))
                        ->sum('toplam_satis_tutari');

                    // Geçen ay ile bu ay arasındaki satış miktarındaki fark
                    $salesCountDifference = $currentMonthSalesCount - $lastMonthSalesCount;
                    // Geçen ay ile bu ay arasındaki gelirdeki fark
                    $totalRevenueDifference = $currentMonthTotalRevenue - $lastMonthTotalRevenue;

                    // Yüzdesel artış veya azalışı hesapla
                    if ($lastMonthSalesCount != 0) {
                        $salesCountDifference = $currentMonthSalesCount - $lastMonthSalesCount;
                        $salesCountPercentageDifference = ($salesCountDifference / $lastMonthSalesCount) * 100;
                    } else {
                        $salesCountDifference = 0;
                        $salesCountPercentageDifference =
                            'Önceki ayda satış yapılmadığı için yüzdesel değişim hesaplanamıyor.';
                    }

                    // Önceki ayın toplam geliri sıfır olmayan durumda yüzdesel artış veya azalışı hesapla
                    if ($lastMonthTotalRevenue != 0) {
                        $totalRevenueDifference = $currentMonthTotalRevenue - $lastMonthTotalRevenue;
                        $totalRevenuePercentageDifference = ($totalRevenueDifference / $lastMonthTotalRevenue) * 100;
                    } else {
                        $totalRevenueDifference = 0;
                        $totalRevenuePercentageDifference =
                            'Önceki ayda gelir elde edilmediği için yüzdesel değişim hesaplanamıyor.';
                    }

                @endphp

                <!-- Satışlar -->
                <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
                    <div class="flex justify-between">
                        <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Toplam Satışlar (Aylık)</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">₺{{ $currentMonthTotalRevenue }}</div>
                        <div class="badge bg-white/30">
                            @if ($totalRevenuePercentageDifference > 0)
                                + {{ $totalRevenuePercentageDifference }}%
                            @else
                                - {{ $totalRevenuePercentageDifference }}%
                            @endif
                        </div>
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5"
                                d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path
                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        @if ($totalRevenueDifference > 0)
                            Bu ay geçen aya göre gelir {{ abs($totalRevenueDifference) }} TL arttı.
                        @elseif ($totalRevenueDifference > 0)
                            Bu ay geçen aya göre gelir {{ abs($totalRevenueDifference) }} TL azaldı.
                        @else
                            Bu ay geçen ay ile aynı gelir elde edildi.
                        @endif
                    </div>
                </div>

                <!-- Bounce Rate -->
                <div class="panel bg-gradient-to-r from-fuchsia-500 to-fuchsia-400">
                    <div class="flex justify-between">
                        <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Toplam Satış Sayısı (Aylık)</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">{{ $currentMonthSalesCount }}</div>
                        <div class="badge bg-white/30">
                            @if ($salesCountPercentageDifference > 0)
                                + {{ $salesCountPercentageDifference }}%
                            @else
                                - {{ $salesCountPercentageDifference }}%
                            @endif
                        </div>
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5"
                                d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path
                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        @if ($salesCountDifference > 0)
                            Bu ay geçen aya göre satış sayısı {{ abs($salesCountDifference) }} Arttı.
                        @elseif ($totalRevenueDifference > 0)
                            Bu ay geçen aya göre satış sayısı {{ abs($salesCountDifference) }} azaldı.
                        @else
                            Bu ay geçen ay ile aynı satış sayısı elde edildi.
                        @endif
                    </div>
                </div>
            </div>

            <div class="mb-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                <div class="panel h-full pb-0 sm:col-span-2 xl:col-span-1">
                    <h5 class="mb-5 text-lg font-semibold dark:text-white-light">Son İşlemler</h5>
                    <div class="perfect-scrollbar relative-mr-3 mb-4 h-[320px] pr-3">
                        @php
                        use App\Models\Appointment;
                        use App\Models\Customers;
                        use App\Models\Artist;
                        use App\Models\Service;
                        use App\Models\Satis;
                        use App\Models\Product;
                        use App\Models\User;
                        use App\Models\Brand;
                        use App\Models\Note;
                        use Spatie\Permission\Models\Role;

                        $latestAppointments = Appointment::latest()->limit(1)->get();
                        $latestCustomers = Customers::latest()->limit(1)->get();
                        $latestArtist = Artist::latest()->limit(1)->get();
                        $latestService = Service::latest()->limit(1)->get();
                        $latestSatis = Satis::latest()->limit(1)->get();
                        $latestProduct = Product::latest()->limit(1)->get();
                        $latestAdmin = User::latest()->limit(1)->get();
                        $latestBrand = Brand::latest()->limit(1)->get();
                        $latestNote = Note::latest()->limit(1)->get();
                        $latestRole = Role::latest()->limit(1)->get();

                        // Tüm verileri birleştirme
                        $latestData = $latestAppointments
                            ->merge($latestCustomers)
                            ->merge($latestArtist)
                            ->merge($latestService)
                            ->merge($latestSatis)
                            ->merge($latestProduct)
                            ->merge($latestAdmin)
                            ->merge($latestBrand)
                            ->merge($latestNote)
                            ->merge($latestRole);

                        // Tarihine göre sıralama
                        $sortedData = $latestData->sortByDesc('created_at');
                    @endphp
                        <div class="cursor-pointer text-sm">
                            @foreach ($sortedData  as $item)
                                @if ($item instanceof \App\Models\Appointment)
                                    <div class="group relative flex items-center py-1.5">
                                        <div class="h-1.5 w-1.5 rounded-full bg-primary ltr:mr-1 rtl:ml-1.5"></div>
                                        <div class="flex-1">Yeni Randevu Oluşturuldu | {{ $item->title }}</div>
                                        <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">
                                            @if ($item->created_at)
                                                {{ $item->created_at->diffForHumans() }}
                                            @else
                                                Henüz oluşturulmadı
                                            @endif
                                        </div>
                                        <span class="badge badge-outline-primary absolute bg-primary-light
                                            text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">
                                            İşlem Başarılı
                                        </span>
                                    </div>
                                @elseif ($item instanceof \App\Models\Customers)
                                    <div class="group relative flex items-center py-1.5">
                                        <div class="h-1.5 w-1.5 rounded-full bg-success ltr:mr-1 rtl:ml-1.5"></div>
                                        <div class="flex-1">Yeni Müşteri Kaydedildi | {{ $item->name }}</div>
                                        <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">
                                            @if ($item->created_at)
                                                {{ $item->created_at->diffForHumans() }}
                                            @else
                                                Henüz oluşturulmadı
                                            @endif
                                        </div>
                                        <span class="badge badge-outline-success absolute bg-success-light text-xs opacity-0
                                        group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">İşlem Başarılı</span>
                                    </div>
                                @elseif ($item instanceof \App\Models\Artist)
                                    <div class="group relative flex items-center py-1.5">
                                        <div class="h-1.5 w-1.5 rounded-full bg-black ltr:mr-1 rtl:ml-1.5"></div>
                                        <div class="flex-1">Yeni Dövme Sanatçısı Eklendi | {{ $item->artist_name }}</div>
                                        <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">
                                            @if ($item->created_at)
                                                {{ $item->created_at->diffForHumans() }}
                                            @else
                                                Henüz oluşturulmadı
                                            @endif
                                        </div>
                                        <span class="badge badge-outline-dark absolute bg-dark-light text-xs opacity-0
                                            group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">
                                            İşlem Başarılı
                                        </span>
                                    </div>
                                @elseif ($item instanceof \App\Models\Service)
                                    <div class="group relative flex items-center py-1.5">
                                        <div class="h-1.5 w-1.5 rounded-full bg-warning ltr:mr-1 rtl:ml-1.5"></div>
                                        <div class="flex-1">Yeni Hizmet Eklendi | {{ $item->service_name }}</div>
                                        <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">
                                            @if ($item->created_at)
                                                {{ $item->created_at->diffForHumans() }}
                                            @else
                                                Henüz oluşturulmadı
                                            @endif
                                        </div>
                                        <span class="badge badge-outline-warning absolute bg-warning-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">In
                                            İşlem Başarılı
                                        </span>
                                    </div>
                                @elseif ($item instanceof \App\Models\Satis)
                                    <div class="group relative flex items-center py-1.5">
                                        <div class="h-1.5 w-1.5 rounded-full bg-info ltr:mr-1 rtl:ml-1.5"></div>
                                        <div class="flex-1">Yeni Satış Oluşturuldu | {{ number_format($item->toplam_satis_tutari, 2, ',', '.') }}
                                        </div>
                                        <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">
                                            @if ($item->created_at)
                                                {{ $item->created_at->diffForHumans() }}
                                            @else
                                                Henüz oluşturulmadı
                                            @endif
                                        </div>
                                        <span class="badge badge-outline-info absolute bg-info-light text-xs opacity-0
                                            group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">
                                            İşlem Başarılı
                                        </span>
                                    </div>
                                @elseif ($item instanceof \App\Models\Product)
                                    <div class="group relative flex items-center py-1.5">
                                        <div class="h-1.5 w-1.5 rounded-full bg-secondary ltr:mr-1 rtl:ml-1.5"></div>
                                        <div class="flex-1">Yeni Ürün Eklendi | {{ $item->name }}</div>
                                        <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">
                                            @if ($item->created_at)
                                                {{ $item->created_at->diffForHumans() }}
                                            @else
                                                Henüz oluşturulmadı
                                            @endif
                                        </div>
                                        <span class="badge badge-outline-secondary absolute bg-secondary-light
                                            text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">
                                            İşlem Başarılı
                                        </span>
                                    </div>
                                @elseif ($item instanceof \App\Models\User)
                                    <div class="group relative flex items-center py-1.5">
                                        <div class="h-1.5 w-1.5 rounded-full bg-primary ltr:mr-1 rtl:ml-1.5"></div>
                                        <div class="flex-1">Yeni Yönetici Eklendi | {{ $item->name }}</div>
                                        <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">
                                            @if ($item->created_at)
                                                {{ $item->created_at->diffForHumans() }}
                                            @else
                                                Henüz oluşturulmadı
                                            @endif
                                        </div>
                                        <span class="badge badge-outline-primary absolute bg-primary-light text-xs opacity-0
                                            group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">
                                            İşlem Başarılı
                                        </span>
                                    </div>
                                @elseif ($item instanceof \App\Models\Brand)
                                    <div class="group relative flex items-center py-1.5">
                                        <div class="h-1.5 w-1.5 rounded-full bg-success ltr:mr-1 rtl:ml-1.5"></div>
                                        <div class="flex-1">Yeni Marka Eklendi | {{ $item->name }}</div>
                                        <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">
                                            @if ($item->created_at)
                                                {{ $item->created_at->diffForHumans() }}
                                            @else
                                                Henüz oluşturulmadı
                                            @endif
                                        </div>

                                        <span class="badge badge-outline-success absolute bg-success-light text-xs opacity-0
                                            group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">
                                            İşlem Başarılı
                                        </span>
                                    </div>
                                @elseif ($item instanceof \App\Models\Note)
                                    <div class="group relative flex items-center py-1.5">
                                        <div class="h-1.5 w-1.5 rounded-full bg-black ltr:mr-1 rtl:ml-1.5"></div>
                                        <div class="flex-1">Yeni Not Eklendi | {{ $item->title }}</div>
                                        <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">
                                            @if ($item->created_at)
                                                {{ $item->created_at->diffForHumans() }}
                                            @else
                                                Henüz oluşturulmadı
                                            @endif
                                        </div>

                                        <span class="badge badge-outline-dark absolute bg-dark-light text-xs opacity-0
                                            group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">
                                            İşlem Başarılı
                                        </span>
                                    </div>
                                @elseif ($item instanceof \App\Models\Role)
                                    <div class="group relative flex items-center py-1.5">
                                        <div class="h-1.5 w-1.5 rounded-full bg-danger ltr:mr-1 rtl:ml-1.5"></div>
                                        <div class="flex-1">Yeni Rol Eklendi | {{ $latestRole->name }}</div>
                                        <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">
                                            @if ($latestRole->created_at)
                                                {{ $latestRole->created_at->diffForHumans() }}
                                            @else
                                                Henüz oluşturulmadı
                                            @endif
                                        </div>

                                        <span class="badge badge-outline-danger absolute bg-danger-light text-xs opacity-0
                                            group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">
                                            İşlem Başarılı
                                        </span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="panel h-full">
                    <div class="mb-5 flex items-center justify-between dark:text-white-light">
                        <h5 class="text-lg font-semibold">Tamamlanan Randevular</h5>
                    </div>
                    <div>
                        <div class="space-y-6">

                            @foreach ($appointment as $item)
                                @php
                                    $endDate = \Carbon\Carbon::parse($item->end);
                                    $today = \Carbon\Carbon::today();
                                @endphp
                                @if ($endDate->lt($today))
                                    <div class="flex">
                                        <span
                                            class="grid h-9 w-9 shrink-0 place-content-center
                                                rounded-md bg-danger-light text-danger
                                                dark:bg-danger dark:text-danger-light">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="6" r="4" stroke="currentColor"
                                                    stroke-width="1.5" />
                                                <path opacity="0.5"
                                                    d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z"
                                                    stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                        </span>
                                        <div class="flex-1 px-3">
                                            <div>{{ $item->customer->name }}</div>
                                            <div class="text-xs text-white-dark dark:text-gray-500">
                                                {{ $item->start }} - {{ $item->end }}
                                            </div>
                                        </div>
                                        <span class="whitespace-pre px-1 text-base text-success ltr:ml-auto rtl:mr-auto">
                                            +{{ $item->toplam_odeme }} TL</span>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="panel h-full">
                    <div
                        class="-mx-5 mb-5 flex items-start justify-between border-b border-[#e0e6ed] p-5 pt-0 dark:border-[#1b2e4b] dark:text-white-light">
                        <h5 class="text-lg font-semibold">Yönetici Aktivitesi</h5>
                    </div>
                    <div class="perfect-scrollbar relative -mr-3 h-[360px] pr-3">
                        @if ($users->isNotEmpty())
                            <div class="space-y-7">
                                @foreach ($users as $user)
                                    <div class="flex">
                                        <div
                                            class="relative z-10 shrink-0 before:absolute before:left-4
                                                before:top-10 before:h-[calc(100%-24px)] before:w-[2px]
                                                before:bg-white-dark/30 ltr:mr-2 rtl:ml-2">
                                            <div
                                                class="flex h-8 w-8 items-center justify-center rounded-full bg-primary text-white">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5" d="M4 12.9L7.14286 16.5L15 7.5"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M20.0002 7.5625L11.4286 16.5625L11.0002 16"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="font-semibold dark:text-white-light">
                                                {{ $user->name }}
                                            </h5>
                                            <p class="text-xs text-white-dark">{{ $user->last_successful_login_at }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="panel h-full w-full">
                    <div class="mb-5 flex items-center justify-between">
                        <h5 class="text-lg font-semibold dark:text-white-light">Müşteri Ödemeleri</h5>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="ltr:rounded-l-md rtl:rounded-r-md">ID</th>
                                    <th>Müşteri</th>
                                    <th>Ön Ödeme</th>
                                    <th>Toplam Ödeme</th>
                                    <th class="ltr:rounded-r-md rtl:rounded-l-md">Alınacak Ödeme</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointment as $item)
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="min-w-[150px] text-black dark:text-white">
                                            <div class="flex items-center">
                                                <span class="whitespace-nowrap">{{ $item->customer->id }}</span>
                                            </div>
                                        </td>
                                        <td class="text-primary">{{ $item->customer->name }}</td>
                                        <td><a href="apps-invoice-preview.html">{{ $item->on_odeme }} TL</a></td>
                                        <td>{{ $item->toplam_odeme }} TL</td>
                                        <td>
                                            <span class="badge bg-success shadow-md dark:group-hover:bg-transparent">
                                                {{ isset($item->on_odeme) ? $item->toplam_odeme - $item->on_odeme : $item->toplam_odeme }}
                                                TL
                                            </span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel h-full w-full">
                    <div class="mb-5 flex items-center justify-between">
                        <h5 class="text-lg font-semibold dark:text-white-light">Çok Satan Ürünler</h5>
                    </div>
                    @php
                        $mostSoldProducts = DB::table('products as p')
                            ->select('p.id', 'p.name as product_name', 'p.brand_id', DB::raw('SUM(o.quant) as total_sales'), 'p.price')
                            ->join('orders as o', 'p.id', '=', 'o.product_id')
                            ->groupBy('p.id', 'p.name', 'p.brand_id', 'p.price')
                            ->orderByDesc('total_sales')
                            ->get();
                    @endphp
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr class="border-b-0">
                                    <th class="ltr:rounded-l-md rtl:rounded-r-md">ID</th>
                                    <th>Ürün Adı</th>
                                    <th>Marka</th>
                                    <th>Satış Sayısı</th>
                                    <th class="ltr:rounded-r-md rtl:rounded-l-md">Alış Fiyatı</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mostSoldProducts as $product)
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="min-w-[150px] text-black dark:text-white">
                                            <div class="flex">
                                                <p class="whitespace-nowrap">
                                                    {{ $product->id }}
                                                </p>
                                            </div>
                                        </td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->brand_id }}</td>
                                        <td>{{ $product->total_sales }}</td>
                                        <td>
                                            <a class="flex items-center text-danger" href="javascript:;">
                                                <svg class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.6644 5.47875L16.6367 9.00968C18.2053 10.404 18.9896 11.1012 18.9896 11.9993C18.9896 12.8975 18.2053 13.5946 16.6367 14.989L12.6644 18.5199C11.9484 19.1563 11.5903 19.4746 11.2952 19.342C11 19.2095 11 18.7305 11 17.7725V15.4279C7.4 15.4279 3.5 17.1422 2 19.9993C2 10.8565 7.33333 8.57075 11 8.57075V6.22616C11 5.26817 11 4.78917 11.2952 4.65662C11.5903 4.52407 11.9484 4.8423 12.6644 5.47875Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path opacity="0.5"
                                                        d="M15.5386 4.5L20.7548 9.34362C21.5489 10.081 22.0001 11.1158 22.0001 12.1994C22.0001 13.3418 21.4989 14.4266 20.629 15.1671L15.5386 19.5"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                {{ $product->price }} TL
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
