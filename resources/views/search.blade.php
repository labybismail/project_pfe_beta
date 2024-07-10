<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link href="assets/img/favicon.png" rel="icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
                    <div class="col-md-8 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Search</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">{{ $doctors->count() }} matches found </h2>
                    </div>
                    {{-- <div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
										<option class="sorting">Free</option>
									</select>
								</span>
							</div>
						</div> --}}
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                        <!-- Search Filter -->
                        <div class="card search-filter">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Search Filter</h4>
                            </div>
                            <div class="card-body">
                                {{-- <div class="filter-widget">
									<div class="cal-icon">
										<input type="text" class="form-control datetimepicker" placeholder="Select Date">
									</div>			
								</div> --}}
                                <div class="filter-widget">
                                    <h4>Gender</h4>
                                    <form action="{{ route('searchDoctor') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ville" value="{{ $villeID }}">
                                        <div>
                                            <label class="custom_check">
                                                <input type="radio"
                                                    @if ($genderID == 'M') @checked(true) @endif
                                                    name="gender" value="M">
                                                <span class="checkmark"></span> Male Doctor
                                            </label>
                                        </div>
                                        <div>
                                            <label class="custom_check">
                                                <input type="radio"
                                                    @if ($genderID == 'F') @checked(true) @endif
                                                    name="gender" value="F">
                                                <span class="checkmark"></span> Female Doctor
                                            </label>
                                        </div>
                                </div>
                                <div class="filter-widget">
                                    <h4>Select Specialist </h4>
                                    @foreach ($specialities as $speciality)
                                        <div>
                                            <label class="custom_check">
                                                <input type="radio"
                                                    @if ($speciality->id == $specialityID) @checked(true) @endif
                                                    name="speciality" value="{{ $speciality->id }}">
                                                <span class="checkmark"></span> {{ $speciality->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="btn-search">
                                    <button type="submit" class="btn btn-block">Search</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- /Search Filter -->

                    </div>

                    <div class="col-md-12 col-lg-8 col-xl-9">
                        @php
                        function doctorProfileImage($nom, $prenom)
                        {
                            $extensions = ['jpg', 'jpeg', 'png', 'gif'];
                            foreach ($extensions as $ext) {
                                $filename = public_path(
                                    "storage/doctors/{$nom}_{$prenom}.{$ext}",
                                );
                                if (file_exists($filename)) {
                                    return asset(
                                        "storage/doctors/{$nom}_{$prenom}.{$ext}",
                                    );
                                }
                            }
                            return asset('storage/doctors/default.jpg');
                        }
                    @endphp
                        <!-- Doctor Widget -->
                        @foreach ($doctors as $doctor)
                            <div class="card">
                                <div class="card-body">
                                    <div class="doctor-widget">
                                        <div class="doc-info-left">
                                            <div class="doctor-img">
                                                <a href="{{route('doctorProfile',$doctor->id)}}">
                                                  
                                                    <img src="{{doctorProfileImage($doctor->user->nom, $doctor->user->prenom)}}" class="img-fluid"
                                                        alt="User Image">
                                                </a>
                                            </div>
                                            <div class="doc-info-cont">
                                                <h4 class="doc-name"><a href="{{route('doctorProfile',$doctor->id)}}">Dr.
                                                        {{ $doctor->user->nom . ' ' . $doctor->user->prenom }}</a>
                                                </h4>
                                                <p class="doc-speciality">{{ $doctor->speciality->name }}</p>
                                                <h5 class="doc-department"><img
                                                        src="assets/img/specialities/{{ $doctor->speciality->name }}.png"
                                                        class="img-fluid"
                                                        alt="Speciality">{{ $doctor->speciality->name }}</h5>
                                                <div class="rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                    {{-- <span class="d-inline-block average-rating">(17)</span> --}}
                                                </div>
                                                <div class="clinic-details">
                                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i>
                                                        {{ $doctor->user->ville->name }}, Morocco</p>
                                                    {{-- <ul class="clinic-gallery">
                                                        <li>
                                                            <a href="assets/img/features/feature-01.jpg"
                                                                data-fancybox="gallery">
                                                                <img src="assets/img/features/feature-01.jpg"
                                                                    alt="Feature">
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="assets/img/features/feature-02.jpg"
                                                                data-fancybox="gallery">
                                                                <img src="assets/img/features/feature-02.jpg"
                                                                    alt="Feature">
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="assets/img/features/feature-03.jpg"
                                                                data-fancybox="gallery">
                                                                <img src="assets/img/features/feature-03.jpg"
                                                                    alt="Feature">
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="assets/img/features/feature-04.jpg"
                                                                data-fancybox="gallery">
                                                                <img src="assets/img/features/feature-04.jpg"
                                                                    alt="Feature">
                                                            </a>
                                                        </li>
                                                    </ul> --}}
                                                </div>
                                                {{-- <div class="clinic-services">
                                                    <span>Dental Fillings</span>
                                                    <span> Whitneing</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="doc-info-right">
                                            <div class="clini-infos">
                                                <ul>
                                                    {{-- <li><i class="far fa-thumbs-up"></i> 98%</li> --}}
                                                    {{-- <li><i class="far fa-comment"></i> 17 Feedback</li> --}}
                                                    <li><i class="fas fa-map-marker-alt"></i>{{$doctor->user->address.', '.$doctor->user->ville->name }}, morocco</li>
                                                    <li><i class="far fa-money-bill-alt"></i>{{ $doctor->prix }} DH</li>
                                                </ul>
                                            </div>
                                            <div class="clinic-booking">
                                                <a class="view-pro-btn" href="{{route('doctorProfile',$doctor->id)}}">View Profile</a>
                                                <a class="apt-btn" href="booking.html">Book Appointment</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- /Doctor Widget -->

                        {{-- <div class="load-more text-center">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>
                        </div> --}}
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
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Sticky Sidebar JS -->
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <!-- Select2 JS -->
    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <!-- Datetimepicker JS -->
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Fancybox JS -->
    <script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/search.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:16:55 GMT -->

</html>
