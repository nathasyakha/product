<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Simulasi</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="{{asset('/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{asset('/css.css')}}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">

  <body class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!--Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar-->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{ url('invoice') }}" class="nav-link">

                <p style="font-size: 20px">
                  Invoices
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('product') }}" class="nav-link">

                <p style="font-size: 20px">
                  Products
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('item') }}" class="nav-link">

                <p style="font-size: 20px">
                  Items
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Invoices</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Invoice</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4><a href="javascript:void(0)" id="add-invoice" class="btn btn-primary pull-right" style="margin-top: -8px">Add Invoice</a></h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="invoice-table" class="table table-bordered table-striped">
                  <thead>
                    <tr style="font-size: 20px">
                      <th>User ID</th>
                      <th>Invoice Date</th>
                      <th>Invoice Due</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </section>
    </div>

    <!--Modal Invoice-->
    <div class="modal fade" id="addModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="Modaltitle"></h4>
          </div>
          <div class="modal-body">
            <form id="invoiceForm" name="invoiceForm" class="form-horizontal">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label class="col-sm-2 control-label">UserID</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter User ID" value="" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Invoice Date</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="invoiceDate" name="invoiceDate" required="" placeholder="Enter Invoice Date" class="form-control"></input>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Invoice Due</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="invoiceDue" name="invoiceDue" required="" placeholder="Enter Invoice Due" class="form-control"></input>
                </div>
              </div>

              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('jquery.validate.min.js')}}" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="{{asset('sweetalert2@9.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset('/dist/js/adminlte.js')}}"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      });

      $(document).ready(function() {
        $('#invoice-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: "{{ url('invoice') }}",
            type: 'GET'
          },
          columns: [{
              data: 'user_id',
              name: 'user_id'
            },
            {
              data: 'invoiceDate',
              name: 'invoiceDate'
            },
            {
              data: 'invoiceDue',
              name: 'invoiceDue'
            },
            {
              data: 'action',
              name: 'action'
            },
          ],
          order: [
            [0, 'asc']
          ]
        });
      });
      /*  When user click add user button */
      $('#add-invoice').click(function() {
        $('#saveBtn').val("create-invoice");
        $('#id').val('');
        $('#invoiceForm').trigger("reset");
        $('#Modaltitle').html("Add New Invoice");
        $('#addModal').modal('show');
      });

      /* When click edit user */
      $('body').on('click', '.editInvoice', function() {
        var id = $(this).data('id');
        $.get('invoice/' + id, function(data) {
          $('#Modaltitle').html("Edit Invoice");
          $('#saveBtn').val("editInvoice");
          $('#addModal').modal('show');

          $('#user_id').val(data.user_id);
          $('#invoiceDate').val(data.invoiceDate);
          $('#invoiceDue').val(data.invoiceDue);
        })
      });

      if ($("#invoiceForm").length > 0) {
        $("#invoiceForm").validate({

          submitHandler: function(form) {

            var actionType = $('#saveBtn').val();
            $('#saveBtn').html('Saving..');

            $.ajax({
              data: $('#invoiceForm').serialize(),
              url: "{{url('invoice')}}",
              type: "POST",
              dataType: 'json',
              success: function(data) { //jika berhasil 
                $('#invoiceForm').trigger("reset");
                $('#addModal').modal('hide');
                $('#saveBtn').html('Save');
                var oTable = $('#invoice-table').dataTable();
                oTable.fnDraw(false); //reset datatable
                Swal.fire(
                  'Done!',
                  'Data Saved Successfully!',
                  'success')
              },
              error: function(data) {
                console.log('Error:', data);
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!',
                })
              }
            });

          }
        })
      }

      $(document).on('click', '.delete', function() {
        id = $(this).attr('id');
        Swal.fire({
          title: 'Are you sure ?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type: "DELETE",
              url: "{{ url('invoice') }}" + '/' + id,
              success: function(data) {
                var oTable = $('#invoice-table').dataTable();
                oTable.fnDraw(false);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              },
              error: function(data) {
                console.log('Error:', data);
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!',
                })
              }
            });
          } else {
            Swal.fire('Your data is safe');
          }
        });
      });
    </script>
  </body>

</html>