@extends('admin_layout')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            @if(Session::get('message'))
                <div class="alert alert-{{Session::get('status')}} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('message')}}</strong>
                </div>
                <?php Session::put('message', null);?>
            @endif
            <a href="{{route('styles.index',['oid'=>$oid])}}" class="btn btn-default">Back To style list</a>
            <h2><a href="{{route('accessories.create',['sid'=>$sid])}}" class="btn btn-success">Add new
                    Accessory</a></h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="zero_config">
                    <thead class="label-success" style="color: white">
                    <th>Name</th>
                    <th>Booking Quantity</th>
                    <th>Received Quantity</th>
                    <th>Balance</th>
                    <th>Goods Received Date</th>
                    <th width="15%">Work Order</br>Submit Date</th>
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
                                <a class="btn btn-primary"
                                   href="{{route('accessories.edit',['sid'=>$sid,'id'=>$accessory->id])}}">Edit</a> |
                                <form style="display: inline;" method="post"
                                      action="{{route('accessories.destroy',['sid'=>$sid,'id'=>$accessory->id])}}">
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
@endsection
@section('page_script')
    <script type="text/javascript">
        $('#zero_config').DataTable({
            "scrollX": true,
            'dom': '<"#lchange"l>Brftip',
            "scrollY": "60vh",
            "scrollCollapse": true,
            "destroy": true,
            "order": [[0, "asc"]],
            buttons: [
                'print',
            ],
            "columnDefs": [
                {"orderable": false, "searchable": false, "targets": 7},
            ]
        });
    </script>
@endsection