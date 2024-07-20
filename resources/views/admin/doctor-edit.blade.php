<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Edit Doctor</title>

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
                            <h3 class="page-title">Edit Doctor</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="row">
                    <div class="col-md-12">

                        <!-- Edit Form - Personal Information -->
                        <div class="account-content">
                            <div class="row align-items-center justify-content-center">
                                <!-- Left Side -->
                                <div class="col-md-7">

                                    <!-- Edit Form -->
                                    <form action="{{ route('admin.doctorsListUpdate', $doctor->id) }}" method="POST" id="editDoctorForm" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-3 form-group form-focus">
                                                <input type="text" class="form-control floating" autocomplete="off" name="first_name" value="{{ $doctor->user->prenom }}" required>
                                                <label class="focus-label">First Name</label>
                                                @error('first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 form-group form-focus">
                                                <input type="text" class="form-control floating" autocomplete="off" name="last_name" value="{{ $doctor->user->nom }}" required>
                                                <label class="focus-label">Last Name</label>
                                                @error('last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 form-group form-focus">
                                                <input type="text" class="form-control floating" autocomplete="off" name="cin" value="{{ $doctor->user->cin }}" required>
                                                <label class="focus-label">CIN</label>
                                                @error('cin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 form-group form-focus">
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="" disabled>Select Gender</option>
                                                    <option value="M" {{ $doctor->user->gender == 'M' ? 'selected' : '' }}>Male</option>
                                                    <option value="F" {{ $doctor->user->gender == 'F' ? 'selected' : '' }}>Female</option>
                                                </select>
                                                <label class="focus-label">Gender</label>
                                                @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <input type="email" class="form-control floating" autocomplete="off" name="email" value="{{ $doctor->user->email }}" required>
                                                <label class="focus-label">Email</label>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 form-group form-focus">
                                                <input type="tel" class="form-control floating" autocomplete="off" name="phone" value="{{ $doctor->user->tel }}" required>
                                                <label class="focus-label">Phone</label>
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 form-group form-focus">
                                                <input type="date" class="form-control floating" autocomplete="off" name="dateNaissance" value="{{ $doctor->user->dateNaissance }}" required>
                                                <label class="focus-label">Birthday</label>
                                                @error('dateNaissance')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group form-focus" id="questionPwdOpen">
                                                <a href="#" onclick="showPwdFields()">Do you want to change password?</a>
                                            </div>
                                            <script>
                                                function showPwdFields(){
                                                    document.querySelector('.passwordFields').style.display='block';
                                                    document.querySelector('.passwordFields2').style.display='block';
                                                    document.getElementById('questionPwdOpen').style.display='none';
                                                }
                                            </script>
                                            <div class="col-md-3 form-group form-focus passwordFields" style="display: none">
                                                <input type="password" class="form-control floating" autocomplete="off" name="password">
                                                <label class="focus-label">Password</label>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 form-group form-focus passwordFields2" style="display: none">
                                                <input type="password" class="form-control floating" autocomplete="off" name="password_confirmation">
                                                <label class="focus-label">Confirm Password</label>
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 form-group form-focus">
                                                <input type="text" class="form-control floating" autocomplete="off" name="address" value="{{ $doctor->user->address }}" required>
                                                <label class="focus-label">Address</label>
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <select name="speciality" class="form-control">
                                                    <option value="" disabled>Select Speciality</option>
                                                    @foreach ($specialities as $speciality)
                                                        <option value="{{ $speciality->id }}" {{ $doctor->speciality_id == $speciality->id ? 'selected' : '' }}>{{ $speciality->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label class="focus-label">Speciality</label>
                                                @error('speciality')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 form-group form-focus">
                                                <input type="text" class="form-control floating" autocomplete="off" name="appointment_price" value="{{ $doctor->prix }}" required>
                                                <label class="focus-label">Appointment Price</label>
                                                @error('appointment_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 form-group form-focus">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="" disabled>Select Status</option>
                                                    <option value="A" {{ $doctor->user->status_compte == 'A' ? 'selected' : '' }}>Active</option>
                                                    <option value="I" {{ $doctor->user->status_compte == 'I' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                                <label class="focus-label">Account status</label>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <select name="ville" id=""
                                                    class="form-control floating">
                                                    @foreach ($villes as $ville)
                                                    <option value="{{ $ville->id }}" {{ old('ville') == $ville->id||$doctor->user->ville_id==$ville->id ? 'selected' : '' }}>{{ $ville->name }}</option>
                                                      </option>
                                                    @endforeach
                                                </select>
                                                <label class="focus-label">ville</label>
                                                @error('ville')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-6 form-group form-focus">
                                                <button type="submit" class="btn btn-success" style="width:285px">Update</button>
                                            </div>
                                        </div>
                                    <!-- /Edit Form -->

                                </div>
                                <!-- /Left Side -->

                                <!-- Right Side -->
                                <div class="col-md-5">
                                    @php
                                    function doctorProfileImage($nom, $prenom)
                                    {
                                        $extensions = ['jpg', 'jpeg', 'png', 'gif'];
                                        foreach ($extensions as $ext) {
                                            $filename = public_path(
                                                "storage/doctors/{$nom}_{$prenom}.{$ext}",
                                            );
                                            if (file_exists($filename)) {
                                                return asset("storage/doctors/{$nom}_{$prenom}.{$ext}");
                                            }
                                        }
                                        return asset('storage/doctors/default.jpg');
                                    }
                                @endphp
                                    <label class="focus-label">Profile Picture</label>
                                    <div class="bg-light" onclick="document.getElementById('profile_picture').click()" style="width: 400px; height: 400px; background: black;">
                                        <img id="profilePicturePreview" src="{{ doctorProfileImage($doctor->user->nom,$doctor->user->prenom) }}" alt="doctor img" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <input type="file" style="display: none;" name="profile_picture" id="profile_picture" class="form-control" onchange="previewProfilePicture(this)" accept="image/*">
                                    @error('profile_picture')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- /Right Side -->
                                <script>
                                    function previewProfilePicture(input) {
                                        var file = input.files[0];
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                            var preview = document.getElementById('profilePicturePreview');
                                            preview.src = e.target.result;
                                            preview.style.width = '100%';
                                            preview.style.height = '100%';
                                        }

                                        if (file) {
                                            reader.readAsDataURL(file);
                                        }
                                    }
                                </script>
                                    </form>
                                </div>
                        </div>
                        <!-- /Edit Content -->

                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin/assets/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>

    <!-- Validation Script -->
    <script>
        // Your validation script here
    </script>
    <!-- /Validation Script -->

</body>

</html>
