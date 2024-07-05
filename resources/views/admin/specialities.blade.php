<!DOCTYPE html>
<html lang="en">


<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Specialities Page</title>

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

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">Specialities</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Specialities</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#Add_Specialities_details" data-toggle="modal"
                                class="btn btn-primary float-right mt-2">Add</a>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Specialities</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($specialities as $speciality)
                                                <tr>
                                                    <td>{{ $speciality->id }}</td>

                                                    <td>
                                                        <h2 class="table-avatar">
                                                            {{-- <a href="profile.html" class="avatar avatar-sm mr-2"> --}}
																<img class="avatar-img" width="50"
																src="{{ asset('assets/img/specialities/' . $speciality->name . '.png') }}"
																onerror="this.onerror=null; this.src='{{ asset('assets/img/specialities/' . $speciality->name . '.jpg') }}';"
																onerror="this.onerror=null; this.src='{{ asset('assets/img/specialities/' . $speciality->name . '.jpeg') }}';"
																onerror="this.onerror=null; this.src='{{ asset('assets/img/specialities/' . $speciality->name . '.gif') }}';"
																onerror="this.onerror=null; this.src='{{ asset('assets/img/specialities/default-speciality.png') }}';"
																alt="Speciality">
															
                                                            &nbsp;{{ $speciality->name }}
                                                        </h2>
                                                    </td>

                                                    <td class="text-right">
                                                        <div class="actions">
                                                            <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                                            href="#edit_specialities_details"
                                                            data-id="{{ $speciality->id }}" 
                                                            data-name="{{ $speciality->name }}" onclick="getEditFields({{ $speciality->id }})">
                                                            <i class="fe fe-pencil"></i> Edit
                                                        </a>
                                                            <a data-toggle="modal" onclick="if(!confirm('Are you sure you want to delete this speciality?')){return false;}else{$('#formDelete{{$speciality->id}}').submit()}"  
                                                                class="btn btn-sm bg-danger-light">


                                                                <form id="formDelete{{$speciality->id}}" action="{{route('speciality.destroy',$speciality->id)}}" method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <i class="fe fe-trash"></i> Delete
                                                                    <input type="submit" id="suppBtn" style="display: none"  onclick="if(!confirm('Are you sure you want to delete this speciality?')){return false;} " value="">
                                                                </form>

                                                            </a>
                                                        </div>
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


        <!-- Add Modal -->
        <div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Speciality</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('speciality.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Speciality</label>
                                        <input type="text" name="speciality_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="speciality_img" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /ADD Modal -->

        <!-- Edit Details Modal -->
        <div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Specialities</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('speciality.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div id="content_js"></div>
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>

            function getEditFields(idSpeciality) {
                var csrfToken ='{{ csrf_token() }}';
                $.ajax({
                url: '{{route('speciality.get_edit_fields')}}',
                type: 'POST',
                data: {id:idSpeciality,
                    _token: csrfToken,
                },
                success: function(response) {
                    $('#content_js').html(response);
                },
                error: function(xhr) {
                    alert('An error occurred while updating the speciality');
                }
            })
        }
        </script>
        
        <!-- /Edit Details Modal -->

        <!-- Delete Modal -->
        {{-- <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <!--	<div class="modal-header">
					<h5 class="modal-title">Delete</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>-->
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <button type="button" class="btn btn-primary">Save </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
	
		
        <!-- /Delete Modal -->
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
