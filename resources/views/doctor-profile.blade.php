<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->

		
        <!-- /Header -->
		
        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
			@include('layouts.header')
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Doctor Profile</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container">
                @include('functions')
                <!-- Doctor Widget -->
                <div class="card">
                    <div class="card-body">
                        <div class="doctor-widget">
                            <div class="doc-info-left">
                                <div class="doctor-img">
                                    <img src="{{doctorProfileImage($doctor->user->nom,$doctor->user->prenom)}}" class="img-fluid"
                                        alt="User Image">
                                </div>
                                <div class="doc-info-cont">
                                    <h4 class="doc-name">Dr. {{$doctor->user->nom.' '.$doctor->user->prenom}}</h4>
                                    {{-- <p class="doc-speciality"></p> --}}
                                    <p class="doc-department">
                                        <img src="{{ asset('assets/img/specialities/' . $doctor->speciality->name . '.png') }}" alt="{{ $doctor->speciality->name }}">
                                        {{$doctor->speciality->name}}</p>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(35)</span>
                                    </div>
                                    <div class="clinic-details">
                                        <p class="doc-location">
                                            <i class="fas fa-map-marker-alt"></i> {{ $doctor->user->address }}
                                        </p>
                                       
                                    </div> 
                                </div>
                            </div>
                            <div class="doc-info-right">
                                <div class="clini-infos">
                                    <ul>
                                        <li><i class="far fa-thumbs-up"></i> {{ ($doctorReviews->where('rating','>',2)->count()/$doctorReviews->count())*100 }}%</li>
                                        <li><i class="far fa-comment"></i> {{$doctorReviews->count()}} Feedback</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $doctor->user->ville->name }},Casablanca</li>
                                        <li><i class="far fa-money-bill-alt"></i>{{ $doctor->prix }} DH per appointment</li>
                                    </ul>
                                </div>
                               
                                @if (session()->has('user') &&
                                    !App\Models\Admin::where('user_id', session()->get('user')->id)->exists() &&
                                    !App\Models\Doctor::where('user_id', session()->get('user')->id)->exists())
                                               
                                <div class="clinic-booking">
                                    <form action="{{route('bookingPage')}}" method="post">
                                        @csrf 
                                        <input type="hidden" name="doctorID" value="{{$doctor->id}}">
                                        <button type="submit" class="apt-btn btn btn-primary btn-md">Book Appointment</button >
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Widget -->

                <!-- Doctor Details Tab -->
                <div class="card">
                    <div class="card-body pt-0">

                        <!-- Tab Menu -->
                        <nav class="user-tabs mb-4">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
                                </li> 
                            </ul>
                        </nav>
                        <!-- /Tab Menu -->

                        <!-- Tab Content -->
                        <div class="tab-content pt-0">

                            <!-- Overview Content -->
                            <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-12 col-lg-9">

                                        <!-- About Details -->
                                        <div class="widget about-widget">
                                            <h4 class="widget-title">About Me</h4>
                                            <p>{{$doctor->about}}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /Overview Content -->

                         

                            <!-- Reviews Content -->
                            <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                                <!-- Review Listing -->
                                <div class="widget review-listing">
                                    <ul class="comments-list">

                                        <!-- Comment List -->

                                        @foreach($reviews as $review)
                                        <li>
                                            <div class="comment">
                                                <img class="avatar avatar-sm rounded-circle" alt="User Image"
                                                    src="{{patientProfileImage($review->patient->user->nom,$review->patient->user->prenom)}}">
                                                <div class="comment-body">
                                                    <div class="meta-data">
                                                        <span class="comment-author">{{$review->patient->user->nom.' '.$review->patient->user->prenom}}</span>
                                                        @php
                                                           $diffDays=  (int)Carbon\Carbon::parse($review->created_at)->diffInDays(Carbon\Carbon::today());
                                                        @endphp
                                                        <span class="comment-date">Reviewed {{ $diffDays==0 ?' Today': $diffDays.' Days ago' }} </span>
                                                        <div class="review-count rating">
                                                            <i class="fas fa-star @if($review->rating>=1) filled @endif"></i>
                                                            <i class="fas fa-star @if($review->rating>=2) filled @endif"></i>
                                                            <i class="fas fa-star @if($review->rating>=3) filled @endif"></i>
                                                            <i class="fas fa-star @if($review->rating>=4) filled @endif"></i>
                                                            <i class="fas fa-star @if($review->rating>=5) filled @endif"></i>
                                                        </div>
                                                    </div>
                                                    <p class="@if($review->recomended==true) text-success @else text-danger @endif">
                                                        @if($review->recomended==true)
                                                            <i class="far fa-thumbs-up"></i> I recommend the doctor
                                                        @elseif($review->recomended==false)
                                                            <i class="far fa-thumbs-down"></i> I don't recommend the doctor
                                                        @endif
                                                    </p>
                                                    <p class="comment-content">
                                                        {{$review->comment}}
                                                    </p>
                                                    
                                                </div>
                                            </div>
 

                                        </li>
                                        @endforeach
                                        <!-- /Comment List -->
 

                                    </ul>

                                     
                                </div>
                                <!-- /Review Listing -->

                                <!-- Write Review -->
                                <div class="write-review">
                                    <h4>Write a review for <strong>Dr. {{$doctor->user->nom.' '.$doctor->user->prenom}}</strong></h4>

                                    <!-- Write Review Form -->
                                    <form action="{{route('review.store')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="patientId" value="{{ session()->get('user')->patient->id }}">
                                            <input type="hidden" name="doctorId" value="{{$doctor->id}}">
                                            <label>Review</label>
                                            <div class="star-rating">
                                                <input id="star-5" type="radio" name="rating" value="5">
                                                <label for="star-5" title="5 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-4" type="radio" name="rating" value="4">
                                                <label for="star-4" title="4 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-3" type="radio" name="rating" value="3">
                                                <label for="star-3" title="3 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-2" type="radio" name="rating" value="2">
                                                <label for="star-2" title="2 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-1" type="radio" name="rating" value="1">
                                                <label for="star-1" title="1 star">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Your review</label>
                                            <textarea name="comment" id="review_desc" maxlength="100" class="form-control"></textarea>

                                            <div class="d-flex justify-content-between mt-3"><small
                                                    class="text-muted"><span id="chars">100</span> characters
                                                    remaining</small></div>
                                        </div>
                                        <hr>
                                      
                                        </div>
                                        <div class="submit-section">
                                            <button type="submit" class="btn btn-primary submit-btn">Add
                                                Review</button>
                                        </div>
                                    </form>
                                    <!-- /Write Review Form -->

                                </div>
                                <!-- /Write Review -->

                            </div>
                            <!-- /Reviews Content -->
 

                        </div>
                    </div>
                </div>
                <!-- /Doctor Details Tab -->

            </div>
        </div>
        <!-- /Page Content -->

        <!-- Footer -->
		@include('layouts.footer')

        <!-- /Footer -->

    </div>
    <!-- /Main Wrapper -->

    <!-- Voice Call Modal -->
    <div class="modal fade call-modal" id="voice_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Outgoing Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img alt="User Image" src="assets/img/doctors/doctor-thumb-02.jpg"
                                        class="call-avatar">
                                    <h4>Dr. Darren Elder</h4>
                                    <span>Connecting...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal"
                                        aria-label="Close"><i class="material-icons">call_end</i></a>
                                    <a href="voice-call.html" class="btn call-item call-start"><i
                                            class="material-icons">call</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Outgoing Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Voice Call Modal -->

    <!-- Video Call Modal -->
    <div class="modal fade call-modal" id="video_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <!-- Incoming Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img class="call-avatar" src="assets/img/doctors/doctor-thumb-02.jpg"
                                        alt="User Image">
                                    <h4>Dr. Darren Elder</h4>
                                    <span>Calling ...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal"
                                        aria-label="Close"><i class="material-icons">call_end</i></a>
                                    <a href="video-call.html" class="btn call-item call-start"><i
                                            class="material-icons">videocam</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Incoming Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- Video Call Modal -->

    <!-- jQuery -->
    <script data-cfasync="false" src="{{ asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}">
    </script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Fancybox JS -->
    <script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>


</body>


</html>
