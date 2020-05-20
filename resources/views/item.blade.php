@extends('layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Item</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Items</li>
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
                    <h4><a href="javascript:void(0)" id="add-item" class="btn btn-primary pull-right" style="margin-top: -8px">Add Item</a></h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="item-table" class="table table-bordered table-striped">
                        <thead>
                            <tr style="font-size: 20px">
                                <th>Invoice ID</th>
                                <th>Item</th>
                                <th>Product ID</th>
                                <th>Quantity</th>
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

<div class="modal fade" id="addModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="Modaltitle"></h4>
            </div>
            <div class="modal-body">
                <form id="itemForm" name="itemForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">InvoiceID</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="invoice_id" name="invoice_id" placeholder="Enter Invoice ID" value="" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Item</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="item" name="item" required="" placeholder="Enter Item" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">ProductID</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="product_id" name="product_id" required="" placeholder="Enter Product ID" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Quantity</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="quantity" name="quantity" required="" placeholder="Enter Quantity" class="form-control"></input>
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
        $('#item-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('item') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'invoice_id',
                    name: 'invoice_id'
                },
                {
                    data: 'item',
                    name: 'item'
                },
                {
                    data: 'product_id',
                    name: 'product_id'
                },
                {
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
        });
    });

    /*  When user click add user button */
    $('#add-item').click(function() {
        $('#saveBtn').val("create-item");
        $('#id').val('');
        $('#itemForm').trigger("reset");
        $('#Modaltitle').html("Add New Item");
        $('#addModal').modal('show');
    });

    /* When click edit user */
    $('body').on('click', '.editItem', function() {
        var id = $(this).data('id');
        $.get('item/' + id, function(data) {
            $('#Modaltitle').html("Edit Item");
            $('#saveBtn').val("editItem");
            $('#addModal').modal('show');

            $('#invoice_id').val(data.invoice_id);
            $('#item').val(data.item);
            $('#product_id').val(data.product_id);
            $('#quantity').val(data.quantity);
        })
    });

    if ($("#itemForm").length > 0) {
        $("#itemForm").validate({

            submitHandler: function(form) {

                var actionType = $('#saveBtn').val();
                $('#saveBtn').html('Saving..');

                $.ajax({
                    data: $('#itemForm').serialize(),
                    url: "{{url('item')}}",
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    success: function(data) { //jika berhasil 
                        $('#itemForm').trigger("reset");
                        $('#addModal').modal('hide');
                        $('#saveBtn').html('Save');
                        var oTable = $('#item-table').dataTable(); //inialisasi datatable
                        oTable.fnDraw(false); //reset datatable
                        Swal.fire(
                            'Done!',
                            'Data Saved Successfully!',
                            'success')
                    },
                    error: function(data) { //jika error tampilkan error pada console
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
                    url: "{{ url('item') }}" + '/' + id,
                    success: function(data) {
                        var oTable = $('#item-table').dataTable();
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