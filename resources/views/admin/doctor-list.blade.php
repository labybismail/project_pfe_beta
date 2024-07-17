<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Doctor List Page</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

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

        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="col-sm-11">
                            <h3 class="page-title">List of Doctors</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                                <li class="breadcrumb-item active">Doctor</li>
                            </ul>
                        </div>
                        <div class="col-sm-1">
                            <a href="{{ route('admin.doctorsListAdd') }}" class="btn btn-info text-light">Add</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Doctor Name</th>
                                                <th>Speciality</th>
                                                <th>Member Since</th>
                                                <th>Appointment price</th>
                                                <th>Account Status</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
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
                                            @foreach ($doctors as $doctor)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a class="avatar avatar-sm mr-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ doctorProfileImage($doctor->user->nom, $doctor->user->prenom) }}"
                                                                    alt="User Image"></a>
                                                            <a>Dr.
                                                                {{ $doctor->user->nom . ' ' . $doctor->user->prenom }}</a>
                                                        </h2>
                                                    </td>
                                                    <td>{{ $doctor->speciality->name }}</td>

                                                    <td>{{ \Carbon\Carbon::parse($doctor->user->created_at)->translatedFormat('d/m/Y \a\t h:ia') }}
                                                    </td>

                                                    <td>{{ $doctor->prix }} DH</td>

                                                    <td>
                                                        {{ $doctor->user->status_compte == 'A' ? 'Active' : 'Inactive' }}
                                                        {{-- <div class="status-toggle">
															<input type="checkbox" id="status_1" class="check" checked>
															<label for="status_1" class="checktoggle">checkbox</label>
														</div> --}}
                                                    </td>
                                                    <td style="display: flex;justify-content:end">

                                                        <a style="margin: 0 2px 0 0"
                                                            href="{{ route('admin.deleteEdit', $doctor->id) }}">
                                                            <button class="btn btn-success btn-sm" type='submit'>
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                        </a>
                                                        <form action="{{ route('admin.deleteDoctor', $doctor->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm" type='submit'
                                                                onclick="if(!confirm('Are you sure you want to delete doctor {{ $doctor->user->nom }}?')){return false;}">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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

    <!-- Datatables JS -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>


</html>
