@extends('admin_layout')
@section('title','Buyer')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h4>Buyer</h4></div>
            <h2><a href="{{route('add_buyer')}}" class="btn btn-primary">ADD NEW BUYER</a></h2>
            @if(Session::get('message'))
                <div class="alert alert-{{Session::get('status')}} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('message')}}</strong>
                </div>
                <?php Session::put('message',null);?>
            @endif
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead class="label-success" style="color: white">
                    <th width="10px">ID</th>
                    <th>Buyer Name</th>
                    <th>Code</th>
                    <th>Season</th>
                    <th>Brand</th>
                    <th>Activity</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Action</th>
                    </thead>
                </table>
            </div>

        </div>
    </div>
@endsection()
@section('page_script')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#zero_config').DataTable({
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
                            if (data)
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
                            return '<a href="edit_buyer/' + data + '" ><i class="fas fa-edit"></i></a>&nbsp;&nbsp;<a id="delete" href="delete_buyer/' + data + '" ><i class="fas fa-trash-alt"><i></a>'
                        }
                    }
                ]
            });
        });
    </script>

@endsection