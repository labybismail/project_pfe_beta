<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-html.dreamguystech.com/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:17:06 GMT -->

<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta autocomplete="off" name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->

</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="" style="background-color:rgb(96, 96, 151)">
            @include('layouts.header')
        </div>
        <!-- /Header -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <!-- Register Content -->
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-7 col-lg-6 login-left">
                                    <img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">
                                </div>
                                <div class="col-md-12 col-lg-6 login-right">
                                    <div class="login-header">
                                        <h3>Patient Register</h3>
                                    </div>

                                    <!-- Register Form -->
									<form action="{{ route('registerAttempt') }}" method="POST" id="signupForm">
										@csrf
										<div class="row">
											<div class="col-md-6 form-group form-focus">
												<input type="text" class="form-control floating" autocomplete="off" name="first_name" required oninput="validateInput(this)">
												<label class="focus-label" style="padding-left:6px">First Name</label>
												@error('first_name')
													<span class="text-danger">{{ $message }}</span>
												@enderror
												<div class="invalid-feedback"></div>
											</div>
											<div class="col-md-6 form-group form-focus">
												<input type="text" class="form-control floating" autocomplete="off" name="last_name" required oninput="validateInput(this)">
												<label class="focus-label" style="padding-left:6px">Last Name</label>
												@error('last_name')
													<span class="text-danger">{{ $message }}</span>
												@enderror
												<div class="invalid-feedback"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group form-focus">
												<input type="email" class="form-control floating" autocomplete="off" name="email" required oninput="validateInput(this)">
												<label class="focus-label" style="padding-left:6px">Email</label>
												@error('email')
													<span class="text-danger">{{ $message }}</span>
												@enderror
												<div class="invalid-feedback"></div>
											</div>
											<div class="col-md-6 form-group form-focus">
												<input type="tel" class="form-control floating" autocomplete="off" name="phone" required oninput="validateInput(this)">
												<label class="focus-label" style="padding-left:6px">Phone</label>
												@error('phone')
													<span class="text-danger">{{ $message }}</span>
												@enderror
												<div class="invalid-feedback"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group form-focus">
												<input type="password" class="form-control floating" autocomplete="off" name="password" required oninput="validateInput(this)">
												<label class="focus-label" style="padding-left:6px">Create Password</label>
												@error('password')
													<span class="text-danger">{{ $message }}</span>
												@enderror
												<div class="invalid-feedback"></div>
											</div>
											<div class="col-md-6 form-group form-focus">
												<input type="text" class="form-control floating" autocomplete="off" name="cin" required oninput="validateInput(this)">
												<label class="focus-label" style="padding-left:6px">CIN</label>
												@error('cin')
													<span class="text-danger">{{ $message }}</span>
												@enderror
												<div class="invalid-feedback"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 form-group form-focus">
												<input type="text" class="form-control floating" autocomplete="off" name="address" required oninput="validateInput(this)">
												<label class="focus-label" style="padding-left:6px">Address</label>
												@error('address')
													<span class="text-danger">{{ $message }}</span>
												@enderror
												<div class="invalid-feedback"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group form-focus">
												<select class="form-control floating" autocomplete="off" name="gender" required oninput="validateInput(this)">
													<option value="" disabled selected></option>
													<option value="M">Male</option>
													<option value="F">Female</option>
												</select>
												<label class="focus-label" style="padding-left:6px">Gender</label>
												@error('gender')
													<span class="text-danger">{{ $message }}</span>
												@enderror
												<div class="invalid-feedback"></div>
											</div>
											<div class="col-md-6 form-group form-focus">
												<input type="date" class="form-control floating" autocomplete="off" name="date_of_birth" required oninput="validateInput(this)">
												<label class="focus-label" style="padding-left:6px">Date of Birth</label>
												@error('date_of_birth')
													<span class="text-danger">{{ $message }}</span>
												@enderror
												<div class="invalid-feedback"></div>
											</div>
										</div>
										<div class="text-right">
											<a class="forgot-link" href="{{ route('login') }}">Already have an account?</a>
										</div>
										<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Sign Up</button>
										<div class="login-or">
											<span class="or-line"></span>
										</div>
									</form>
									
									<script>
										function validateInput(input) {
											var validity = input.validity;
									
											if (validity.valueMissing) {
												input.setCustomValidity('This field is required.');
											} else if (input.name === 'email' && validity.typeMismatch) {
												input.setCustomValidity('Please enter a valid email address.');
											} else if (input.name === 'phone' && !input.value.match(/^\d{10}$/)) {
												input.setCustomValidity('Please enter a valid 10-digit phone number.');
											} else if (input.name === 'password' && !input.value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/)) {
												input.setCustomValidity('Password must be at least 8 characters long and contain at least one digit, one lowercase and one uppercase letter.');
											} else if (input.name === 'cin' && !input.value.match(/^[A-Za-z0-9]{6,20}$/)) {
												input.setCustomValidity('CIN must be alphanumeric and between 6 to 20 characters.');
											} else {
												input.setCustomValidity('');
											}
									
											// Show or hide validation feedback
											var feedbackElement = input.parentElement.querySelector('.invalid-feedback');
											if (!input.checkValidity()) {
												feedbackElement.textContent = input.validationMessage;
												feedbackElement.style.display = 'block';
											} else {
												feedbackElement.textContent = '';
												feedbackElement.style.display = 'none';
											}
										}
									
										// Submit form with JavaScript validation
										document.getElementById('signupForm').addEventListener('submit', function(event) {
											var form = event.target;
											var inputs = form.querySelectorAll('input, select');
									
											inputs.forEach(function(input) {
												validateInput(input);
											});
									
											if (!form.checkValidity()) {
												event.preventDefault();
												event.stopPropagation();
											}
									
											form.classList.add('was-validated');
										}, false);
									</script>
									
									
                                    <!-- /Register Form -->

                                </div>
                            </div>
                        </div>
                        <!-- /Register Content -->

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

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:17:06 GMT -->

</html>
