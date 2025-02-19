<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Reviews Page</title>

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
                            <h3 class="page-title">Reviews</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Reviews</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <style>
                    .modal-body {
                        max-height: 400px;
                        /* Adjust the height as needed */
                        overflow-y: auto;
                    }
                </style>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Doctor Name</th>
                                                <th>Ratings</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reviews as $review)
                                                <tr>
                                                    <td>{{ $review->patient->user->nom }}
                                                        {{ $review->patient->user->prenom }}</td>
                                                    <td>{{ $review->doctor->user->nom }}
                                                        {{ $review->doctor->user->prenom }}</td>
                                                    <td>{{ $review->rating }}</td>
                                                    <td>
                                                        @if (strlen($review->comment) > 15)
                                                            {{ substr($review->comment, 0, 15) }}...
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#commentModal"
                                                                data-comment="{{ $review->comment }}">Read more</a>
                                                        @else
                                                            {{ $review->comment }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $review->created_at->format('d M Y') }}</td>
                                                    <td class="text-right">
                                                        <form action="{{ route('admin.reviewDelete', $review->id) }}"
                                                            onsubmit="if(!confirm('Are you sure you want to delete this review?')){return false;}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <!-- Modal -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="commentModal" tabindex="-1" role="dialog"
                                                aria-labelledby="commentModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="commentModalLabel">Full Comment
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="modalCommentBody">
                                                            <!-- Full comment will be displayed here -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tbody>
                                    </table>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            $('#commentModal').on('show.bs.modal', function(event) {
                                                var button = $(event.relatedTarget); // Button that triggered the modal
                                                var comment = button.data('comment'); // Extract info from data-* attributes
                                                var modal = $(this);
                                                modal.find('.modal-body').text(comment);
                                            });
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

        <!-- Delete Modal -->
        <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
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
        </div>
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
