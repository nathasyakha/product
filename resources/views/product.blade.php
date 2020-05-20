@extends('layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
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
                    <h4><a href="javascript:void(0)" id="add-product" class="btn btn-primary pull-right" style="margin-top: -8px">Add Product</a></h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="product-table" class="table table-bordered table-striped">
                        <thead>
                            <tr style="font-size: 20px">
                                <th>Name</th>
                                <th>Price</th>
                                <th>Vat</th>
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
                <form id="productForm" name="productForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="price" name="price" required="" placeholder="Enter Price" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Vat</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="vat" name="vat" required="" placeholder="Enter Vat" class="form-control"></input>
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
        $('#product-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('product') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'vat',
                    name: 'vat'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],

        });
    });

    /*  When user click add user button */
    $('#add-product').click(function() {
        $('#saveBtn').val("create-product");
        $('#id').val('');
        $('#productForm').trigger("reset");
        $('#Modaltitle').html("Add New Product");
        $('#addModal').modal('show');
    });

    /* When click edit user */
    $('body').on('click', '.editProduct', function() {
        var id = $(this).data('id');
        $.get('product/' + id, function(data) {
            $('#Modaltitle').html("Edit Product");
            $('#saveBtn').val("editProduct");
            $('#addModal').modal('show');

            $('#name').val(data.name);
            $('#price').val(data.price);
            $('#vat').val(data.vat);
        })
    });

    if ($("#productForm").length > 0) {
        $("#productForm").validate({

            submitHandler: function(form) {

                var actionType = $('#saveBtn').val();
                $('#saveBtn').html('Saving..');

                $.ajax({
                    data: $('#productForm').serialize(),
                    url: "{{url('product')}}",
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    success: function(data) { //jika berhasil 
                        $('#productForm').trigger("reset");
                        $('#addModal').modal('hide');
                        $('#saveBtn').html('Save');
                        var oTable = $('#product-table').dataTable(); //inialisasi datatable
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
                    url: "{{ url('product') }}" + '/' + id,
                    success: function(data) {
                        var oTable = $('#product-table').dataTable();
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