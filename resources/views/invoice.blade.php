@extends('layouts.dashboard')

@section('content')
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
@endsection

@push('script')
<script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        "Authorization": 'Bearer' + localStorage.getItem("laravel_token")
      },
    });
    console.log(localStorage.getItem("laravel_token"));
  });

  $(document).ready(function() {
    $('#invoice-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ url('invoice') }}",
        type: 'GET',
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
          url: "/api/invoice",
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
@endpush