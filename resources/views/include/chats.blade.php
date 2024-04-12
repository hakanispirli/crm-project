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

        // header section
        Alpine.data('header', () => ({
            init() {
                const selector = document.querySelector('ul.horizontal-menu a[href="' + window
                    .location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.classList.add('active');
                            });
                        }
                    }
                }
            },

            notifications: [{
                id: 1,
                profile: 'user-profile.jpeg',
                message: '<strong class="text-sm mr-1">John Doe</strong>invite you to <strong>Prototyping</strong>',
                time: '45 min ago',
            }, ],

            messages: [{
                    id: 1,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                    title: 'Congratulations!',
                    message: 'Your OS has been updated.',
                    time: '1hr',
                },
                {
                    id: 2,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                    title: 'Did you know?',
                    message: 'You can switch between artboards.',
                    time: '2hr',
                },
                {
                    id: 3,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                    title: 'Something went wrong!',
                    message: 'Send Reposrt',
                    time: '2days',
                },
                {
                    id: 4,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                    title: 'Warning',
                    message: 'Your password strength is low.',
                    time: '5days',
                },
            ],

            languages: [{
                    id: 1,
                    key: 'Chinese',
                    value: 'zh',
                },
                {
                    id: 2,
                    key: 'Danish',
                    value: 'da',
                },
                {
                    id: 3,
                    key: 'English',
                    value: 'en',
                },
                {
                    id: 4,
                    key: 'French',
                    value: 'fr',
                },
                {
                    id: 5,
                    key: 'German',
                    value: 'de',
                },
                {
                    id: 6,
                    key: 'Greek',
                    value: 'el',
                },
                {
                    id: 7,
                    key: 'Hungarian',
                    value: 'hu',
                },
                {
                    id: 8,
                    key: 'Italian',
                    value: 'it',
                },
                {
                    id: 9,
                    key: 'Japanese',
                    value: 'ja',
                },
                {
                    id: 10,
                    key: 'Polish',
                    value: 'pl',
                },
                {
                    id: 11,
                    key: 'Portuguese',
                    value: 'pt',
                },
                {
                    id: 12,
                    key: 'Russian',
                    value: 'ru',
                },
                {
                    id: 13,
                    key: 'Spanish',
                    value: 'es',
                },
                {
                    id: 14,
                    key: 'Swedish',
                    value: 'sv',
                },
                {
                    id: 15,
                    key: 'Turkish',
                    value: 'tr',
                },
                {
                    id: 16,
                    key: 'Arabic',
                    value: 'ae',
                },
            ],

            removeNotification(value) {
                this.notifications = this.notifications.filter((d) => d.id !== value);
            },

            removeMessage(value) {
                this.messages = this.messages.filter((d) => d.id !== value);
            },
        }));

        // content section
        Alpine.data('sales', () => ({
            salesByBrand: [],
            init() {
                this.fetchSalesByBrand();

                isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true :
                    false;
                isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;
                const revenueChart = null;
                const dailySales = null;
                const totalOrders = null;
                const uniqueVisitorSeries = null;

                // revenue
                setTimeout(() => {
                    // unique visitors
                    this.uniqueVisitorSeries = new ApexCharts(this.$refs
                        .uniqueVisitorSeries, this.uniqueVisitorSeriesOptions);
                    this.$refs.uniqueVisitorSeries.innerHTML = '';
                    this.uniqueVisitorSeries.render();

                    // daily sales
                    this.dailySales = new ApexCharts(this.$refs.dailySales, this
                        .dailySalesOptions);
                    this.$refs.dailySales.innerHTML = '';
                    this.dailySales.render();

                    // total orders
                    this.totalOrders = new ApexCharts(this.$refs.totalOrders, this
                        .totalOrdersOptions);
                    this.$refs.totalOrders.innerHTML = '';
                    this.totalOrders.render();
                }, 300);

                this.$watch('$store.app.theme', () => {
                    isDark = this.$store.app.theme === 'dark' || this.$store.app
                        .isDarkMode ? true : false;
                    this.dailySales.updateOptions(this.dailySalesOptions);
                    this.totalOrders.updateOptions(this.totalOrdersOptions);
                    this.uniqueVisitorSeries.updateOptions(this.uniqueVisitorSeriesOptions);
                });

                this.$watch('$store.app.rtlClass', () => {
                    isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;
                    this.uniqueVisitorSeries.updateOptions(this.uniqueVisitorSeriesOptions);
                });
            },

            renderSalesByBrandChart() {
                const chartOptions = this.salesByBrandOptions;
                chartOptions.series = this.salesByBrand.map(item => item.total_sales);
                chartOptions.labels = this.salesByBrand.map(item => item.brand_id);
                const salesByBrandChart = new ApexCharts(this.$refs.salesByBrand, chartOptions);
                salesByBrandChart.render();
            },

            get salesByBrandOptions() {
                return {
                    series: this.salesByBrand.map(item => item.total_sales),
                    labels: this.salesByBrand.map(item => item.brand_id),
                    chart: {
                        type: 'donut',
                        height: 460,
                        fontFamily: 'Nunito, sans-serif',
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        show: true,
                        width: 25,
                        colors: isDark ? '#0e1726' : '#fff',
                    },
                    colors: isDark ? ['#5c1ac3', '#e2a03f', '#e7515a', '#e2a03f'] : ['#e2a03f',
                        '#5c1ac3', '#e7515a'
                    ],
                    legend: {
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontSize: '14px',
                        markers: {
                            width: 10,
                            height: 10,
                            offsetX: -2,
                        },
                        height: 50,
                        offsetY: 20,
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '65%',
                                background: 'transparent',
                                labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                        fontSize: '29px',
                                        offsetY: -10,
                                    },
                                    value: {
                                        show: true,
                                        fontSize: '26px',
                                        color: isDark ? '#bfc9d4' : undefined,
                                        offsetY: 16,
                                        formatter: (val) => {
                                            return val;
                                        },
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total',
                                        color: '#888ea8',
                                        fontSize: '29px',
                                        formatter: (w) => {
                                            return w.globals.seriesTotals.reduce(function(a,
                                                b) {
                                                return a + b;
                                            }, 0);
                                        },
                                    },
                                },
                            },
                        },
                    },
                    labels: this.salesByBrand.map(item => item.brand_id),
                    states: {
                        hover: {
                            filter: {
                                type: 'none',
                                value: 0.15,
                            },
                        },
                        active: {
                            filter: {
                                type: 'none',
                                value: 0.15,
                            },
                        },
                    },
                };
            },

            // daily sales
            get dailySalesOptions() {
                return {
                    series: [{
                            name: 'Sales',
                            data: [44, 55, 41, 67, 22, 43, 21],
                        },
                        {
                            name: 'Last Week',
                            data: [13, 23, 20, 8, 13, 27, 33],
                        },
                    ],
                    chart: {
                        height: 160,
                        type: 'bar',
                        fontFamily: 'Nunito, sans-serif',
                        toolbar: {
                            show: false,
                        },
                        stacked: true,
                        stackType: '100%',
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        show: true,
                        width: 1,
                    },
                    colors: ['#e2a03f', '#e0e6ed'],
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                                position: 'bottom',
                                offsetX: -10,
                                offsetY: 0,
                            },
                        },
                    }, ],
                    xaxis: {
                        labels: {
                            show: false,
                        },
                        categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1,
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '25%',
                        },
                    },
                    legend: {
                        show: false,
                    },
                    grid: {
                        show: false,
                        xaxis: {
                            lines: {
                                show: false,
                            },
                        },
                        padding: {
                            top: 10,
                            right: -20,
                            bottom: -20,
                            left: -20,
                        },
                    },
                };
            },

            // total orders
            get totalOrdersOptions() {
                return {
                    series: [{
                        name: 'Sales',
                        data: [28, 40, 36, 52, 38, 60, 38, 52, 36, 40],
                    }, ],
                    chart: {
                        height: 290,
                        type: 'area',
                        fontFamily: 'Nunito, sans-serif',
                        sparkline: {
                            enabled: true,
                        },
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                    },
                    colors: isDark ? ['#00ab55'] : ['#00ab55'],
                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                    yaxis: {
                        min: 0,
                        show: false,
                    },
                    grid: {
                        padding: {
                            top: 125,
                            right: 0,
                            bottom: 0,
                            left: 0,
                        },
                    },
                    fill: {
                        opacity: 1,
                        type: 'gradient',
                        gradient: {
                            type: 'vertical',
                            shadeIntensity: 1,
                            inverseColors: !1,
                            opacityFrom: 0.3,
                            opacityTo: 0.05,
                            stops: [100, 100],
                        },
                    },
                    tooltip: {
                        x: {
                            show: false,
                        },
                    },
                };
            },

            // unique visitors
            get uniqueVisitorSeriesOptions() {
                return {
                    series: [{
                            name: 'Direct',
                            data: [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63],
                        },
                        {
                            name: 'Organic',
                            data: [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70],
                        },
                    ],
                    chart: {
                        height: 360,
                        type: 'bar',
                        fontFamily: 'Nunito, sans-serif',
                        toolbar: {
                            show: false,
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        width: 2,
                        colors: ['transparent'],
                    },
                    colors: ['#5c1ac3', '#ffbb44'],
                    dropShadow: {
                        enabled: true,
                        blur: 3,
                        color: '#515365',
                        opacity: 0.4,
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            borderRadius: 10,
                        },
                    },
                    legend: {
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontSize: '14px',
                        itemMargin: {
                            horizontal: 8,
                            vertical: 8,
                        },
                    },
                    grid: {
                        borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        padding: {
                            left: 20,
                            right: 20,
                        },
                    },
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug',
                            'Sep', 'Oct', 'Nov', 'Dec'
                        ],
                        axisBorder: {
                            show: true,
                            color: isDark ? '#3b3f5c' : '#e0e6ed',
                        },
                    },
                    yaxis: {
                        tickAmount: 6,
                        opposite: isRtl ? true : false,
                        labels: {
                            offsetX: isRtl ? -10 : 0,
                        },
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: isDark ? 'dark' : 'light',
                            type: 'vertical',
                            shadeIntensity: 0.3,
                            inverseColors: false,
                            opacityFrom: 1,
                            opacityTo: 0.8,
                            stops: [0, 100],
                        },
                    },
                    tooltip: {
                        marker: {
                            show: true,
                        },
                        y: {
                            formatter: (val) => {
                                return val;
                            },
                        },
                    },
                };
            },
        }));
    });
</script>
