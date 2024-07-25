<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Patient List Page</title>

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
                            <h3 class="page-title">List of Patient</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li> 
                                <li class="breadcrumb-item active">Patient</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Patient ID</th>
                                                    <th>Patient Name</th>
                                                    <th>Age</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th class="text-right">Member since</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @include('functions')
                                                @foreach ($patients as $patient)
                                                    <tr>
                                                        <td>{{ $patient->id }}</td>

                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a class="avatar avatar-sm mr-2"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="{{patientProfileImage($patient->user->nom, $patient->user->prenom)}}"
                                                                        alt="User Image"></a>
                                                                {{ $patient->user->nom . ' ' . $patient->user->prenom }}
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            @php 
                                                                $dateOfBirth =  Carbon\Carbon::parse(
                                                                    $patient->user->dateNaissance,
                                                                );
                                                                $age = $dateOfBirth->diffInYears( Carbon\Carbon::now());

                                                                echo (int)$age;
                                                            @endphp
                                                        </td>

                                                        <td>{{ $patient->user->address }}</td>
                                                        <td>{{ $patient->user->tel }}</td>
                                                        <td>{{ $patient->user->created_at?Carbon\Carbon::parse($patient->user->created_at)->format('d F Y'):'' }}</td> 
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
