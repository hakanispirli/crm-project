<!DOCTYPE html>
<html lang="tr" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>404 - Tattoo Crm System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="favicon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/css/style.css') }}" />
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased">
    <div class="fixed bottom-6 right-6 z-50" x-data="scrollToTop">
        <template x-if="showTopButton">
            <button type="button" class="btn btn-outline-primary animate-pulse rounded-full p-2">
                <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                        fill="currentColor" />
                    <path
                        d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                        fill="currentColor" />
                </svg>
            </button>
        </template>
    </div>

    <div class="main-container min-h-screen text-black dark:text-white-dark">
        <div class="relative flex min-h-screen items-center justify-center overflow-hidden">
            <div
                class="px-6 py-16 text-center font-semibold before:container
                before:absolute before:left-1/2 before:aspect-square before:-translate-x-1/2
                before:rounded-full before:bg-[linear-gradient(180deg,#4361EE_0%,rgba(67,97,238,0)_50.73%)]
                before:opacity-10 md:py-20">
                <div class="relative">
                    <img src="assets/images/error/404-light.svg"
                        class="mx-auto -mt-10 w-full max-w-xs object-cover md:-mt-14 md:max-w-xl" />
                    <p class="mt-5 text-base dark:text-white">İstediğiniz sayfa bulunamadı!</p>
                    <a href="{{ route('dashboard') }}"
                        class="btn btn-gradient mx-auto !mt-7 w-max border-0 uppercase shadow-none">Kontrol Paneli</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
