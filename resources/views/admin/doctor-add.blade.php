<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Add Doctor</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.png') }}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">
    
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/feathericon.min.css') }}">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    
    <!--[if lt IE 9]>
        <script src="{{ asset('admin/assets/js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/respond.min.js') }}"></script>
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
        <!-- /Sidebar -->
        
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Add a Doctor</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-md-12 ">
    
                        <!-- Register Content -->
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                                <!-- Left Side -->
                                <div class="col-md-7">
                                    <div class="login-header">
                                        <h3>Personal Information</h3>
                                    </div>
    
                                    <!-- Register Form - Personal Information -->
                                    <form action="{{ route('registerAttempt') }}" method="POST" id="signupForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group form-focus">
                                                <input type="text" class="form-control floating" autocomplete="off" name="first_name" required oninput="validateInput(this)">
                                                <label class="focus-label">First Name</label>
                                                @error('first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <input type="text" class="form-control floating" autocomplete="off" name="last_name" required oninput="validateInput(this)">
                                                <label class="focus-label">Last Name</label>
                                                @error('last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <input type="email" class="form-control floating" autocomplete="off" name="email" required oninput="validateInput(this)">
                                                <label class="focus-label">Email</label>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <input type="tel" class="form-control floating" autocomplete="off" name="phone" required oninput="validateInput(this)">
                                                <label class="focus-label">Phone</label>
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <input type="password" class="form-control floating" autocomplete="off" name="password" required oninput="validateInput(this)">
                                                <label class="focus-label">Create Password</label>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <input type="password" class="form-control floating" autocomplete="off" name="password_confirmation" required oninput="validateInput(this)">
                                                <label class="focus-label">Confirm Password</label>
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <select name="specialty" id=""  class="form-control floating">
                                                    @foreach($specialities as $speciality)
                                                        <option value="{{$speciality->id}}">{{$speciality->name}}</option>
                                                    @endforeach
                                                   </select>
                                                <label class="focus-label">Specialty</label>
                                                @error('specialty')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <input type="text" class="form-control floating" autocomplete="off" name="appointment_price" required oninput="validateInput(this)">
                                                <label class="focus-label">Appointment Price</label>
                                                @error('appointment_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <button type="submit" class="btn btn-success ">
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /Register Form - Personal Information -->
    
                                </div>
                                <!-- /Left Side -->
                                <div class="col-md-5">
                                    <div class="bg-light" style="width: 400px; height: 500px;">
                                        <img src="{{ asset('assets/img/doctor-banner1.png') }}" width="390" alt="doctor img">
                                    </div>
                                </div>
                                <!-- Right Side -->
                               
                                <!-- /Right Side -->
                            </div>
                        </div>
                        <!-- /Register Content -->
    
                    </div>
                </div>
    
            </div>          
        </div>
        <!-- /Page Wrapper -->
    
    </div>
    <!-- /Main Wrapper -->
    
    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    
    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    
    <!-- Validation Script -->
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
    
        // Validation for Professional Information form
        document.getElementById('professionalInfoForm').addEventListener('submit', function(event) {
            var form = event.target;
            var inputs = form.querySelectorAll('input');
    
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
    <!-- /Validation Script -->
    		<!-- jQuery -->
            <script src="assets/js/jquery-3.2.1.min.js"></script>
		
            <!-- Bootstrap Core JS -->
            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            
            <!-- Slimscroll JS -->
            <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
            
            <!-- Datatables JS -->
            <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="assets/plugins/datatables/datatables.min.js"></script>
            
            <!-- Custom JS -->
            <script  src="assets/js/script.js"></script>
            
</body>
</html>
