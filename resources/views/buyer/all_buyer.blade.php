@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-14">
                <h2><a href="{{route('add_buyer')}}" class="btn btn-success">ADD NEW BUYER</a></h2>
                <h2>Buyers</h2>
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
                    <th width="10px">ID</th>
                    <th>Buyer Name</th>
                    <th>Code</th>
                    <th>Season</th>
                    <th>Brand</th>
                    <th>Activity</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th width="100px">Action</th>
                    </thead>
                </table>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#dt').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "ajax": "{{route('ajax_buyer')}}",
                            "columns": [
                                {"data": "id"},
                                {"data": "name"},
                                {"data": "code"},
                                {"data": "season"},
                                {"data": "brand"},
                                {
                                    "data": "activity",
                                    render: function (data) {
                                        if(data)
                                            return "Active"
                                        else
                                            return "Inactive"
                                    }
                                },
                                {"data": "email"},
                                {"data": "address"},
                                {"data": "contact"},
                                {
                                    data: 'action',
                                    name: 'action',
                                    orderable: false,
                                    searchable: false,
                                    render: function (data) {
                                        return '<a class="btn btn-info" href="edit_buyer/' + data + '" ><i class="halflings-icon edit"><i></a><a id="delete" class="btn btn-danger" href="delete_buyer/' + data + '" ><i class="halflings-icon trash"><i></a>'
                                    }
                                }
                            ]
                        });
                    });
                </script>

            </div>
        </div>
    </div>
@endsection()