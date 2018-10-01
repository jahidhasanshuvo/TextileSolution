@extends('admin_layout')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h4>Order</h4></div>
            <h2><a href="{{route('add_order')}}" class="btn btn-success">ADD NEW ORDER</a></h2>
            @if(Session::get('message'))
                <div class="alert alert-{{Session::get('status')}} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('message')}}</strong>
                </div>
                <?php Session::put('message', null);?>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dt">
                    <thead class="label-success" style="color: white">
                    <th>ID</th>
                    <th>Program Code</th>
                    <th>Buyer Name</th>
                    <th>Order Date</th>
                    <th>Action</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('page_script')
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
                        orderable: false,
                        searchable: false,
                        render: function (data) {
                            return '<a href="/order_details/' + data + '" class="btn btn-primary">Details </a>|' +
                                '<a href="/edit_order/' + data + '" class="btn btn-info">Edit </a>|' +
                                '<a href="/delete_order/' + data + '" class="btn btn-danger" id="delete">Delete</a>'
                        }
                    }
                ]
            });
        });
    </script>
@endsection