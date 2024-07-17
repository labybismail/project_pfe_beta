<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Profile</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include('admin.layouts.adminNav')
        <!-- /Header -->
        <!-- Sidebar -->
        @include('admin.layouts.adminSideNav')
        @include('functions')
        <!-- /Sidebar -->
		@php
			$user=App\Models\User::find(session()->get('user')->id);
		@endphp
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">
                                    <a href="#">
                                        <img class="rounded-circle" alt="User Image"
                                            src="{{asset('storage/doctors/default.jpg')}}">
                                    </a>
                                </div>
                                <div class="col ml-md-n2 profile-user-info">
                                    <h4 class="user-name mb-0">{{$user->nom.' '.$user->prenom}}</h4>
                                    <h6 class="text-muted">{{$user->email}}</h6>
                                    <div class="user-Location"><i class="fa fa-map-marker"></i> {{$user->ville->name}}, Morocco
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="profile-menu">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content profile-tab-cont">

                            <!-- Personal Details Tab -->
                            <div class="tab-pane fade show active" id="per_details_tab">

                                <!-- Personal Details -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
												<form action="{{ route('admin.updateInfos', $user->admin->id) }}" method="POST" enctype="multipart/form-data">
													@csrf
													@method('put')
													<div class="row form-row">
													 
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>First Name</label>
																<input type="text" class="form-control" name="prenom" value="{{ old('prenom', $user->prenom) }}">
																@error('prenom')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
															</div>
														</div>
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>Last Name</label>
																<input type="text" class="form-control" name="nom" value="{{ old('nom', $user->nom) }}">
																@error('nom')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
															</div>
														</div>
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>Date of Birth</label>
																<div class="cal-icon">
																	<input type="text" class="form-control datetimepicker" name="dateNaissance" value="{{ old('dateNaissance', \Carbon\Carbon::parse($user->dateNaissance)->format('d/m/Y')) }}">
																</div>
																@error('dateNaissance')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
															</div>
														</div>
														 
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>Email</label>
																<input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
																@error('email')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
															</div>
														</div>
														<div class="col-6 col-md-6">
															<div class="form-group">
																<label>Mobile</label>
																<input type="text" name="tel" value="{{ old('tel', $user->tel) }}" class="form-control">
																@error('tel')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
															</div>
														</div>
														<div class="col-6">
															<div class="form-group">
																<label>Address</label>
																<input type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}">
																@error('address')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
															</div>
														</div>
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>City</label>
																<select name="ville" class="form-control">
																	@foreach($villes as $ville)
																		<option value="{{ $ville->id }}" @if(old('ville', $user->ville_id) == $ville->id) selected @endif>{{ $ville->name }}</option>
																	@endforeach
																</select>
																@error('ville')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
															</div>
														</div>
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>Country</label>
																<input type="text" class="form-control" value="Morocco" disabled>
															</div>
														</div>
													</div>
													<div class="submit-section">
														<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
													</div>
                                            </div>
                                        </div>

                                        <!-- Edit Details Modal -->
                                      
                                        <!-- /Edit Details Modal -->

                                    </div>


                                </div>
                                <!-- /Personal Details -->

                            </div>
                            <!-- /Personal Details Tab -->

                            <!-- Change Password Tab -->
                            <div id="password_tab" class="tab-pane fade">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Change Password</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-lg-6">
                                                <form>
                                                    {{-- <div class="form-group">
                                                        <label>Old Password</label>
                                                        <input type="password" class="form-control">
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input type="password" name="password_confirmation" class="form-control">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Save
                                                        Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</form>

                            <!-- /Change Password Tab -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>


</html>
