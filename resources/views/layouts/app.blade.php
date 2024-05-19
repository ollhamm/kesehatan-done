<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .fade-in {
            animation: fadeInAnimation ease 0.5s;
            animation-iteration-count: 1;
            opacity: 0;
            transform: translateX(-100%);
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
                transform: translateX(-100%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }


        .fade-in-left {
            animation: fadeInLeftAnimation ease 0.5s;
            animation-iteration-count: 1;
            opacity: 0;
            transform: translateX(-100%);
        }

        @keyframes fadeInLeftAnimation {
            0% {
                opacity: 0;
                transform: translateX(-100%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .fade-in-right {
            animation: fadeInRightAnimation ease 0.5s;
            animation-iteration-count: 1;
            opacity: 0;
            transform: translateX(100%);
        }

        @keyframes fadeInRightAnimation {
            0% {
                opacity: 0;
                transform: translateX(100%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }


        .navbar-content {
            animation: slideInFromTop ease 0.5s forwards;
            opacity: 0;
            transform: translateY(-100%);
            z-index: 1000;
        }

        @keyframes slideInFromTop {
            0% {
                opacity: 0;
                transform: translateY(-100%);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }


        }

        .vertical-line {
            margin-top: -16px;
            height: 30px;
            margin-left: 10px;
            display: inline-block;
            writing-mode: vertical-rl;
        }

        :root {
            --dark-body: #508568;
            --dark-main: #141529;
            --dark-second: #79788c;
            --dark-hover: #323048;
            --dark-text: #f8fbff;

            --light-body: #f3f8fe;
            --light-main: #fdfdfd;
            --light-second: #c3c2c8;
            --light-hover: #edf0f5;
            --light-text: #151426;

            --blue: #0000ff;
            --white: #fff;

            --shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;

        }

        .light {
            --bg-body: var(--light-body);
            --bg-main: var(--light-main);
            --bg-second: var(--light-second);
            --color-hover: var(--light-hover);
            --color-txt: var(--light-text);
        }

        .body {
            display: grid;
            font-family: var(--font-family);
        }

        /* kalender */
        .calendar {
            height: 100%;
            width: 100%;
            background-color: #f3f3ff;
            border-radius: 30px;
            padding: 10px;
            overflow: hidden;
            box-sizing: border-box;

        }


        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 20px;
            font-weight: 600;
            color: var(--color-txt);
            padding: 10px;
        }

        .calendar-body {
            padding: 10px;
        }

        .calendar-week-day {
            height: 50px;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            font-weight: 600;
            text-align: center;
            /* Ensure text is centered horizontally */
            align-items: center;
        }

        .calendar-week-day div {
            display: grid;
            place-items: center;
            color: var(--bg-second);
        }

        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 2px;
            color: var(--color-txt);
        }

        .calendar-days div {
            width: 100%;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
            position: relative;
            cursor: pointer;
            animation: to-top 1s forwards;
        }

        .calendar-days div span {
            position: absolute;
        }

        .calendar-days div:hover span {
            transition: width 0.2s ease-in-out, height 0.2s ease-in-out;
        }

        .calendar-days div span:nth-child(1),
        .calendar-days div span:nth-child(3) {
            width: 2px;
            height: 0;
            background-color: var(--color-txt);
        }

        .calendar-days div:hover span:nth-child(1),
        .calendar-days div:hover span:nth-child(3) {
            height: 100%;
        }

        .calendar-days div span:nth-child(1) {
            bottom: 0;
            left: 0;
        }

        .calendar-days div span:nth-child(3) {
            top: 0;
            right: 0;
        }

        .calendar-days div span:nth-child(2),
        .calendar-days div span:nth-child(4) {
            width: 0;
            height: 2px;
            background-color: var(--color-txt);
        }

        .calendar-days div:hover span:nth-child(2),
        .calendar-days div:hover span:nth-child(4) {
            width: 100%;
        }

        .calendar-days div span:nth-child(2) {
            top: 0;
            left: 0;
        }

        .calendar-days div span:nth-child(4) {
            bottom: 0;
            right: 0;
        }

        .calendar-days div:hover span:nth-child(2) {
            transition-delay: 0.2s;
        }

        .calendar-days div:hover span:nth-child(3) {
            transition-delay: 0.4s;
        }

        .calendar-days div:hover span:nth-child(4) {
            transition-delay: 0.6s;
        }

        .calendar-days div.curr-date,
        .calendar-days div.curr-date:hover {
            background-color: var(--blue);
            color: var(--white);
            border-radius: 50%;
        }

        .calendar-days div.curr-date span {
            display: none;
        }

        .month-picker {
            padding: 5px 10px;
            border-radius: 10px;
            cursor: pointer;
        }

        .month-picker:hover {
            background-color: var(--color-hover);
        }

        .year-picker {
            display: flex;
            align-items: center;
        }

        .year-change {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            margin: 0 10px;
            cursor: pointer;
        }

        .year-change:hover {
            background-color: var(--color-hover);
        }

        .calendar-footer {
            padding: 10px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }


        .dark .dark-mode-switch .dark-mode-switch-ident {
            top: 2px;
            left: calc(2px + 50%);
        }

        .month-list {
            position: absolute;
            height: 100%;
            top: 0;
            left: 0;
            background-color: var(--bg-main);
            padding: 10px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* Adjust columns to be equal */
            gap: 6px;
            transform: scale(1.5);
            visibility: hidden;
            pointer-events: none;
        }


        .month-list>div {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .month-list>div>div {
            width: 100%;
            padding: 5px 20px;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            color: var(--color-txt);
        }

        .month-list>div>div:hover {
            background-color: var(--color-hover);
        }

        .alamat {
            max-width: 200px;
            /* Sesuaikan dengan lebar maksimum kolom alamat */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* logout style */
        .dropdown-item:hover,
        .dropdown-item:focus,
        .dropdown-item:active {
            color: inherit;
            background-color: transparent !important;
            text-decoration: none;
        }

        .form-control:focus {
            border-color: #28a745 !important;
            box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25) !important;
        }
        .small-text {
            font-size: 12px; /* Adjust this value as needed */
        }
        .small-banget {
            font-size: 10px; /* Adjust this value as needed */
        }
    </style>
</head>

<body style="background-color: #e5f2e5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4 navbar-content" style="background-color: #b2d8b2">
        <a class="navbar-brand" href="/">
            <span style="font-weight: bold; color: #7fbf7f;"> <i class="fa-solid fa-notes-medical"></i> RSU Cinta
                Kasih</span>
        </a>
        @if (!Route::is('login') && !Route::is('register'))
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <!-- Tambahkan kelas ms-auto di sini -->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a style="font-weight: bold; color: #7fbf7f;" class="nav-link dropdown-toggle"
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-user"></i> {{ session('user_name') }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-danger mt-2" aria-labelledby="navbarDropdown"
                                style="max-width:200px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                                <a class="dropdown-item text-light" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout <i class="fas fa-sign-out-alt ms-2"></i>
                                </a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endif <!-- End of the conditional statement -->
    </nav>





    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <script src="https://kit.fontawesome.com/09b5482c09.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    {{-- print barcode --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('btn-print-barcode').addEventListener('click', function() {
                var kodeRM = document.getElementById('barcode').getAttribute('data-rm');
                generateBarcode(kodeRM);
            });

            function generateBarcode(text) {
                var printWidth = 300;
                var printHeight = 300;
                var paperWidth = '8in';
                var paperHeight = '10in';

                var barcodeImage = document.createElement('img');
                barcodeImage.src = 'https://barcode.tec-it.com/barcode.ashx?data=' + text + '&code=Code128&dpi=96';
                barcodeImage.style.width = printWidth + 'px';
                barcodeImage.style.height = 'auto';
                barcodeImage.style.display = 'block';
                barcodeImage.style.margin = 'auto';

                var barcodeDiv = document.getElementById('barcode');
                barcodeDiv.innerHTML = '';
                barcodeDiv.appendChild(barcodeImage);

                // Apply CSS for printing
                var style = document.createElement('style');
                style.textContent = `
        @media print {
            body * {
                visibility: hidden;
            }
            #barcode, #barcode * {
                visibility: visible;
            }
            #barcode {
                position: absolute;
                left: 50%;
                top: 80%;
                transform: translate(-50%, -50%);
                width: ${printWidth}px;
                height: ${printHeight}px;
            }
            @page {
                size: ${paperWidth} ${paperHeight};
                margin: 0;
            }
        }
    `;
                document.head.appendChild(style);

                setTimeout(function() {
                    window.print(); 
                }, 1000); 
            }
        });
    </script>
    {{-- end print barcode --}}

{{-- print detail --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('btn-print-detail').addEventListener('click', function() {
            var navbar = document.querySelector('.navbar');
            if (navbar) {
                navbar.style.visibility = 'hidden'; // Menyembunyikan navbar saat mencetak
            }

            var printButtonDetail = document.getElementById('btn-print-detail');
            if (printButtonDetail) {
                printButtonDetail.style.display = 'none'; // Menyembunyikan tombol cetak saat mencetak
            }
            var printButtonBarcode = document.getElementById('btn-print-barcode');
            if (printButtonBarcode) {
                printButtonBarcode.style.display = 'none'; // Menyembunyikan tombol cetak saat mencetak
            }

            var printStyle = document.createElement('style');
            printStyle.textContent = `
                @media print {
                    @page {
                        size: A4;
                        margin: 0.5cm;
                    }

                    body {
                        margin: 0;
                        padding: 0;
                        font-size: 60%;
                    }

                    .container {
                        max-width: 100% !important;
                        width: 90% !important;
                        margin-top: 20px;
                        margin-bottom: 20px;
                    }

                    .row, .col-md-6, .card, .card-header, .card-body, pre {
                        width: 100% !important;
                        margin: 0 !important;
                        padding: 0 !important;
                    }

                    .card {
                        margin: 10px 0; /* Jarak atas dan bawah antar card */
                    }

                    .navbar,
                    #btn-print-detail,
                    #btn-print-barcode {
                        display: none !important;
                    }
                }
            `;
            document.head.appendChild(printStyle);

            window.print();

            // Mengembalikan tampilan elemen setelah pencetakan
            setTimeout(function() {
                if (navbar) {
                    navbar.style.visibility = 'visible';
                }
                if (printButtonDetail) {
                    printButtonDetail.style.display = 'block';
                }
                if (printButtonBarcode) {
                    printButtonBarcode.style.display = 'block';
                }
                document.head.removeChild(printStyle);
            }, 1000);
        });
    });
</script>





    {{-- Animasi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elementsFadeIn = document.querySelectorAll('.fade-in');
            elementsFadeIn.forEach(element => {
                element.classList.add('animate_animated', 'animate_fadeIn');
                element.addEventListener('animationend', () => {
                    element.classList.remove('animate_animated', 'animate_fadeIn');
                });
                element.style.opacity = 1;
                element.style.transform = 'translateX(0)';
            });

            const elementsFadeInLeft = document.querySelectorAll('.fade-in-left');
            elementsFadeInLeft.forEach(element => {
                element.classList.add('animate_animated', 'animate_fadeInLeft');
                element.addEventListener('animationend', () => {
                    element.classList.remove('animate_animated', 'animate_fadeInLeft');
                });
                element.style.opacity = 1;
                element.style.transform = 'translateX(0)';
            });

            const elementsFadeInRight = document.querySelectorAll('.fade-in-right');
            elementsFadeInRight.forEach(element => {
                element.classList.add('animate_animated', 'animate_fadeInRight');
                element.addEventListener('animationend', () => {
                    element.classList.remove('animate_animated', 'animate_fadeInRight');
                });
                element.style.opacity = 1;
                element.style.transform = 'translateX(0)';
            });

            const navbarContent = document.querySelector('.navbar-content');
            navbarContent.classList.add('animate_animated', 'animate_slideInFromTop');
            navbarContent.addEventListener('animationend', () => {
                navbarContent.classList.remove('animate_animated', 'animate_slideInFromTop');
            });
            navbarContent.style.opacity = 1;
            navbarContent.style.transform = 'translateY(0)';
        });
    </script>
    <script>
        let calendar = document.querySelector('.calendar')

        const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
            'October', 'November', 'December'
        ]

        isLeapYear = (year) => {
            return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 === 0)
        }

        getFebDays = (year) => {
            return isLeapYear(year) ? 29 : 28
        }

        generateCalendar = (month, year) => {
            let calendar_days = calendar.querySelector('.calendar-days')
            let calendar_header_year = calendar.querySelector('#year')

            let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

            calendar_days.innerHTML = ''

            let currDate = new Date()
            if (!month) month = currDate.getMonth()
            if (!year) year = currDate.getFullYear()

            let curr_month = month_names[month]
            month_picker.innerHTML = curr_month
            calendar_header_year.innerHTML = year

            // get first day of month
            let first_day = new Date(year, month, 1)

            for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
                let day = document.createElement('div')
                if (i >= first_day.getDay()) {
                    day.classList.add('calendar-day-hover')
                    day.innerHTML = i - first_day.getDay() + 1
                    day.innerHTML += `<span></span><span></span><span></span><span></span>`
                    if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() &&
                        month === currDate.getMonth()) {
                        day.classList.add('curr-date')
                    }
                }
                calendar_days.appendChild(day)
            }
        }

        let month_list = calendar.querySelector('.month-list')

        month_names.forEach((e, index) => {
            let month = document.createElement('div')
            month.innerHTML = `<div data-month="${index}">${e}</div>`
            month.querySelector('div').onclick = () => {
                month_list.classList.remove('show')
                curr_month.value = index
                generateCalendar(index, curr_year.value)
            }
            month_list.appendChild(month)
        })

        let month_picker = calendar.querySelector('#month-picker')

        month_picker.onclick = () => {
            month_list.classList.add('show')
        }

        let currDate = new Date()

        let curr_month = {
            value: currDate.getMonth()
        }
        let curr_year = {
            value: currDate.getFullYear()
        }

        generateCalendar(curr_month.value, curr_year.value)

        document.querySelector('#prev-year').onclick = () => {
            --curr_year.value
            generateCalendar(curr_month.value, curr_year.value)
        }

        document.querySelector('#next-year').onclick = () => {
            ++curr_year.value
            generateCalendar(curr_month.value, curr_year.value)
        }

        let dark_mode_toggle = document.querySelector('.dark-mode-switch')

        dark_mode_toggle.onclick = () => {
            document.querySelector('body').classList.toggle('light')
            document.querySelector('body').classList.toggle('dark')
        }
    </script> 
    <script>
        // Fungsi untuk menampilkan popup notifikasi
        function showSuccessAlert() {
            const alert = document.getElementById('successAlert');
            alert.classList.remove('d-none');
            setTimeout(() => {
                alert.classList.add('d-none');
            }, 3000); // Waktu dalam milidetik (5 detik)
        }
    
        // Panggil fungsi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function () {
            showSuccessAlert();
        });
    </script>
    
    
</body>
</html>
