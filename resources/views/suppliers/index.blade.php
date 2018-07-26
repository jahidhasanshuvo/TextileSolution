@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(Session::get('message')){ ?>
                <p class="alert-success">{{Session::get('message')}}</p>
                <?php } Session::put('message', null);
                ?>
                <h2><a href="{{route('suppliers.create')}}" class="btn btn-success">Add new Supplier</a></h2>
                <table class="table table-hover" id="datatable">
                    <thead class="label-success">
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Phone</th>
                    <th>Activity</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($suppliers as $supplier)
                        <tr>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->address}}</td>
                            <td>{{$supplier->mobile}}</td>
                            <td>{{$supplier->phone}}</td>
                            @if($supplier->activity)
                                <td><a href="{{route('suppliers.inactive_supplier',['id'=>$supplier->id])}}"
                                       class="btn btn-default">Active</a>
                                </td>
                            @else
                                <td><a href="{{route('suppliers.active_supplier',['id'=>$supplier->id])}}"
                                       class="btn btn-danger">Inactive</a>
                                </td>
                            @endif
                            <td>
                                <a class="btn btn-success"
                                   href="{{route('suppliers.edit',['id'=>$supplier->id])}}">Edit</a> |
                                <form style="display: inline;" method="post"
                                      action="{{route('suppliers.destroy',['id'=>$supplier->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger delete_form_btn" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#datatable').DataTable({
            "scrollX": true,
            'dom': '<"#lchange"l>Brftip',
            "scrollY": "60vh",
            "scrollCollapse": true,
            "destroy": true,
            "order": [[0, "asc"]],
            buttons: [
                'colvis'
            ],
            "columnDefs": [
                {"orderable": false, "targets": 5}
            ]
        });
    </script>
@endsection

<?php
/*
  * <td><a class="btn btn-info" href="{{route('styles.show',['id'=>$style->id,'oid'=>$order_id])}}">Details</a> |
                            <a class="btn btn-success" href="{{route('styles.edit',['id'=>$style->id,'oid'=>$order_id])}}">Edit</a> |
                            <form style="display: inline;" method="post" action="{{route('styles.destroy',['id'=>$style->id,'oid'=>$order_id])}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger delete_form_btn"  value="Delete"/>
                            </form>
                        </td>


<script type="text/javascript">
                    $(document).ready(function () {
                        $('#dt').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "ajax": "{{route('ajaxSupplier')}}",
                            "columns": [
                                {"data": "name"},
                                {"data": "address"},
                                {"data": "mobile"},
                                {"data": "phone"},
                                {
                                    "data": "activity",
                                    searchable : false ,
                                    render: function (data) {
                                        if (data)
                                            return "Active"
                                        else
                                            return "Inactive"
                                    }
                                },
                                {
                                    data: 'action',
                                    name: 'action',
                                    orderable: false,
                                    searchable: false,
                                    render: function (data) {
                                        return "<a class='btn btn-success' href='{{route('suppliers.edit',['id'=>4])}}'>Edit</a>|"
                                    }
                                }
                            ]
                        });
                    });
                </script>

 */ ?>