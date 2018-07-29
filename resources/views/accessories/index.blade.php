@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(Session::get('message')){ ?>
                <p class="alert-success">{{Session::get('message')}}</p>
                <?php } Session::put('message', null);
                ?>
                <a href="{{route('all_order')}}" class="btn btn-default">Back To order list</a>
                <h2><a href="{{route('accessories.create',['oid'=>$oid])}}" class="btn btn-success">Add new
                        Accessory</a></h2>
                <table class="table table-hover" id="datatable">
                    <thead class="label-success">
                    <th>Name</th>
                    <th>Booking Quantity</th>
                    <th>Received Quantity</th>
                    <th>Balance</th>
                    <th>Goods Received Date</th>
                    <th>Work Order</br>Submit Date</th>
                    <th>Supplier</th>
                    <th width="140px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($accessories as $accessory)
                        <tr>
                            <td>{{$accessory->name}}</td>
                            <td>{{$accessory->booking_quantity}} {{$accessory->unit->name}}</td>
                            <td>{{$accessory->received_quantity}}</td>
                            <td>{{$accessory->balance}}</td>
                            <td>{{$accessory->goods_received_date}}</td>
                            <td>{{$accessory->work_order_submit_date}}</td>
                            <td>{{$accessory->supplier->name}}</td>
                            <td>
                                <a class="btn btn-success"
                                   href="{{route('accessories.edit',['oid'=>$oid,'id'=>$accessory->id])}}">Edit</a> |
                                <form style="display: inline;" method="post"
                                      action="{{route('accessories.destroy',['oid'=>$oid,'id'=>$accessory->id])}}">
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
                {"orderable": false, "searchable": false, "targets": 7},
            ]
        });
    </script>
@endsection