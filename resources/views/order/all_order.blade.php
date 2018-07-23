@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <h2><a href="{{route('add_order')}}" class="btn btn-success">ADD NEW ORDER</a></h2>
                <h2>Orders</h2>
                <p class="alert-success">
                    <?php
                    if (Session::get('message')) {
                        echo Session::get('message');
                        Session::put('message', null);
                    }
                    ?>
                </p>
                <table class="table table-hover" id="dt">
                    <thead class="label-success">
                    <th>ID</th>
                    <th>Program Code</th>
                    <th>Buyer Name</th>
                    <th>Order Date</th>
                    <th>Action</th>
                    </thead>
                </table>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#dt').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "ajax": "{{route('ajaxOrder')}}",
                            "columns": [
                                {"data": "id"},
                                {"data": "program_code"},
                                {"data": "buyer_id"},
                                {"data": "date"},
                                {
                                    "data": "action",
                                    render: function (data) {
                                        return '<a href="/order_details/'+data+'" class="btn btn-default">Details </a>|'+
                                        '<a href="/edit_order/'+data+'" class="btn btn-info">Edit </a>|'+
                                        '<a href="/delete_order/'+data+'" class="btn btn-danger" id="delete">Delete</a>'
                                    }
                                }
                            ]
                        });
                    });
                </script>
            </div>
        </div>
    </div>
@endsection