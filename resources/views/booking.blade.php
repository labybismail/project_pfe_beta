<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* Hide the actual radio button */
        .timing-radio {
            display: none;
        }

        /* Style the label to look like the original anchor tag */
        .timing {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f0f0f0;
            /* Adjust to match original background color */
            border: 1px solid #ccc;
            /* Adjust to match original border */
            border-radius: 4px;
            /* Adjust to match original border radius */
            color: #333;
            /* Adjust to match original text color */
            text-align: center;
            cursor: pointer;
        }

        /* Change background color when the radio button is checked */
        .timing-radio:checked+.timing {

            /* Adjust to match the selected state background color */

            /* Adjust to match the selected state text color */
        }

        /* Hover effect */
        .timing:hover {
            background-color: #e0e0e0;
            /* Adjust to match original hover background color */
        }

        .day-slot ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .day-slot li {
            margin: 0 10px;
        }

        .slot-date {
            display: block;
        }

        .day-label {
            display: block;
            cursor: pointer;
            padding: 10px;
            background-color: transparent;
            /* Initial background color */
            border: 1px solid #ccc;
            /* Initial border color */
            border-radius: 4px;
            /* Border radius */
            color: #333;
            border-color: transparent;
            /* Initial text color */
            text-align: center;
        }

        .day-label.selected {
            background-color: cyan;
            /* Background color when selected */
            color: white;
            /* Text color when selected */
        }
    </style>

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include('layouts.header')

        <!-- /Header -->

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Booking</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Booking</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="booking-doc-info">
                                    <a href="{{ route('doctorProfile', $doctor->id) }}" class="booking-doc-img">
                                        <img src="{{ doctorProfileImage($doctor->user->nom, $doctor->user->prenom) }}"
                                            alt="User Image">
                                    </a>
                                    <div class="booking-info">
                                        <h4><a href="{{ route('doctorProfile', $doctor->id) }}">Dr.
                                                {{ $doctor->user->nom . ' ' . $doctor->user->prenom }}</a></h4>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">35</span>
                                        </div>
                                        <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i>
                                            {{ $doctor->user->ville->name . ', Morocco' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-6">
                                <h4 class="mb-1">@php echo Carbon\Carbon::now()->format('d F Y') @endphp</h4>
                                <p class="text-muted">@php echo Carbon\Carbon::now()->format('l') @endphp</p>
                            </div>

                        </div>
                        <!-- Schedule Widget -->
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card booking-schedule schedule-widget">

                            <!-- Schedule Header -->
                            <div class="schedule-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        @php
                                            function doctorProfileImage($nom, $prenom)
                                            {
                                                $extensions = ['jpg', 'jpeg', 'png', 'gif'];
                                                foreach ($extensions as $ext) {
                                                    $filename = public_path("storage/doctors/{$nom}_{$prenom}.{$ext}");
                                                    if (file_exists($filename)) {
                                                        return asset("storage/doctors/{$nom}_{$prenom}.{$ext}");
                                                    }
                                                }
                                                return asset('storage/doctors/default.jpg');
                                            }
                                        @endphp
                                        <!-- Day Slot -->
                                        <form action="{{ route('book.store') }}" method="post">@csrf
                                            <input type="hidden" name="doctorID" value="{{ $doctor->id }}">
                                            <input type="hidden" name="patientID"
                                                value="{{ session()->get('user')->patient->id }}">
                                            <div class="day-slot">
                                                <ul style="">



                                                </ul>
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const daySlotContainer = document.querySelector('.day-slot ul');
                                                    const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                                                    const monthsOfYear = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                                                        'Dec'
                                                    ];

                                                    let currentDate = new Date();
                                                    let count = 0;
                                                    let previousElement = null;

                                                    while (count < 5) {
                                                        const day = currentDate.getDay();
                                                        if (day !== 0 && day !== 6) { // Skip Sunday (0) and Saturday (6)
                                                            const dayElement = document.createElement('li');

                                                            const labelElement = document.createElement('label');
                                                            labelElement.classList.add('day-label');

                                                            const radioElement = document.createElement('input');
                                                            radioElement.type = 'radio';
                                                            radioElement.name = 'weekday';
                                                            radioElement.value = currentDate.toISOString().split('T')[0];
                                                            radioElement.style.display = 'none'; // Hide the radio input

                                                            const dayNameElement = document.createElement('span');
                                                            dayNameElement.textContent = daysOfWeek[day];

                                                            const dateElement = document.createElement('span');
                                                            dateElement.classList.add('slot-date');
                                                            dateElement.innerHTML =
                                                                `${currentDate.getDate()} ${monthsOfYear[currentDate.getMonth()]} <small class="slot-year">${currentDate.getFullYear()}</small>`;

                                                            labelElement.appendChild(radioElement);
                                                            labelElement.appendChild(dayNameElement);
                                                            labelElement.appendChild(dateElement);

                                                            labelElement.addEventListener('click', function() {
                                                                if (previousElement) {
                                                                    previousElement.classList.remove('selected');
                                                                }
                                                                labelElement.classList.add('selected');
                                                                radioElement.checked = true;
                                                                previousElement = labelElement;
                                                            });

                                                            dayElement.appendChild(labelElement);
                                                            daySlotContainer.appendChild(dayElement);

                                                            count++;
                                                        }
                                                        currentDate.setDate(currentDate.getDate() + 1);
                                                    }
                                                });
                                            </script>
                                            <!-- /Day Slot -->

                                    </div>
                                </div>
                            </div>
                            <!-- /Schedule Header -->

                            <!-- Schedule Content -->
                            <div class="schedule-cont">
                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- Time Slot -->
                                        <div class="time-slot">
                                            <ul class="clearfix">

                                                <li>

                                                    <div class="timing-container">
                                                        <input type="radio" id="time-0900-am" name="appointment_time"
                                                            onchange="check(this)" class="timing-radio"
                                                            value="09:00:00">
                                                        <label for="time-0900-am" class="timing">
                                                            <span>09:00</span> <span></span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <div class="timing-container">
                                                        <input type="radio" id="time-1000-am" name="appointment_time"
                                                            onchange="check(this)" class="timing-radio"
                                                            value="10:00:00">
                                                        <label for="time-1000-am" class="timing">
                                                            <span>10:00</span> <span></span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <div class="timing-container">
                                                        <input type="radio" id="time-1100-am" name="appointment_time"
                                                            onchange="check(this)" class="timing-radio"
                                                            value="11:00:00">
                                                        <label for="time-1100-am" class="timing">
                                                            <span>11:00</span> <span></span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <div class="timing-container">
                                                        <input type="radio" id="time-1200-am"
                                                            name="appointment_time" onchange="check(this)"
                                                            class="timing-radio" value="12:00:00">
                                                        <label for="time-1200-am" class="timing">
                                                            <span>12:00</span> <span></span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <div class="timing-container">
                                                        <input type="radio" id="time-1400-am"
                                                            name="appointment_time" onchange="check(this)"
                                                            class="timing-radio" value="14:00:00">
                                                        <label for="time-1400-am" class="timing">
                                                            <span>14:00</span> <span></span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <div class="timing-container">
                                                        <input type="radio" id="time-1500-am"
                                                            name="appointment_time" onchange="check(this)"
                                                            class="timing-radio" value="15:00:00">
                                                        <label for="time-1500-am" class="timing">
                                                            <span>15:00</span> <span></span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <div class="timing-container">
                                                        <input type="radio" id="time-1600-am"
                                                            name="appointment_time" onchange="check(this)"
                                                            class="timing-radio" value="16:00:00">
                                                        <label for="time-1600-am" class="timing">
                                                            <span>16:00</span> <span></span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <script>
                                                    let previousElement = null;

                                                    function check(obj) {
                                                        if (previousElement) {
                                                            // Reset the styles of the previously selected timing element
                                                            previousElement.style.backgroundColor = '#f0f0f0';
                                                            previousElement.style.color = '#333';
                                                        }

                                                        obj.checked = true;
                                                        let nextElement = obj.nextElementSibling;

                                                        while (nextElement && !nextElement.classList.contains('timing')) {
                                                            nextElement = nextElement.nextElementSibling;
                                                        }

                                                        if (nextElement && nextElement.classList.contains('timing')) {
                                                            nextElement.style.backgroundColor = 'cyan';
                                                            nextElement.style.color = 'white';
                                                            // Update the previous element reference
                                                            previousElement = nextElement;
                                                        }
                                                    }
                                                </script>



                                            </ul>
                                        </div>
                                        <!-- /Time Slot -->

                                    </div>
                                </div>
                            </div>
                            <!-- /Schedule Content -->

                        </div>
                        <!-- /Schedule Widget -->

                        <!-- Submit Section -->
                        <div class="submit-section proceed-btn text-right">
                            <button type="submit" class="btn btn-primary submit-btn">Proceed to Pay</button>
                        </div>
                        </form>

                        <!-- /Submit Section -->

                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->

        <!-- Footer -->
        @include('layouts.footer')

        <!-- /Footer -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Daterangepikcer JS -->
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>


</html>
