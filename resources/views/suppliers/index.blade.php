@extends('admin_layout')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">Suppliers</div>

            <?php
            if(Session::get('message')){ ?>
            <p class="alert-success">{{Session::get('message')}}</p>
            <?php } Session::put('message', null);
            ?>
            <h2><a href="{{route('suppliers.create')}}" class="btn btn-primary">ADD NEW SUPPLIER</a></h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="datatable">
                    <thead class="label-success" style="color: white">
                    <th style="width: 5%;">Name</th>
                    <th style="width: 40%;">Address</th>
                    <th style="width: 10%;">Mobile</th>
                    <th style="width: 20%;">Phone</th>
                    <th style="width: 10%;">Activity</th>
                    <th style="width: 10%;">Action</th>
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
                                <a href="{{route('suppliers.edit',['id'=>$supplier->id])}}"><i class="fas fa-edit"></i></a>
                                <form style="display: inline;" method="post"
                                      action="{{route('suppliers.destroy',['id'=>$supplier->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete_form_btn"
                                            style="border: none;background-color: transparent"><i
                                                class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('page_script')
    <script type="text/javascript">
        $('#datatable').DataTable({
            "scrollX": true,
            // 'dom': '<"#lchange"l>Brftip',
            "scrollY": "60vh",
            "scrollCollapse": true,
            "destroy": true,
            "order": [[0, "asc"]],
            "buttons": [          ],
            "columnDefs": [
                {"orderable": false, "searchable": false, "targets": 5},
                {"searchable": false, "targets": 4}
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