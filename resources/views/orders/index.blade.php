@extends('admin_layout')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h4>Order</h4></div>
            <h2><a href="{{route('orders.create')}}" class="btn btn-primary">ADD NEW ORDER</a></h2>
            @if(Session::get('message'))
                <div class="alert alert-{{Session::get('status')}} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('message')}}</strong>
                </div>
                <?php Session::put('message', null);?>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="datatable">
                    <thead class="label-success" style="color: white">
                    <th>ID</th>
                    <th>Program Code</th>
                    <th>Buyer Name</th>
                    <th>Order Date</th>
                    <th width="20%">Action</th>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->program_code}}</td>
                            <td>{{$order->buyer->name}}</td>
                            <td>{{$order->date}}</td>
                            <td>
                                <a href="{{route('orders.show',['id'=>$order->id])}}"><i class="fas fa-info"></i></a>&nbsp;&nbsp;&nbsp;
                                <a href="{{route('orders.edit',['id'=>$order->id])}}"><i class="fas fa-edit"></i></a>
                                <form style="display: inline;" method="post"
                                      action="{{route('orders.destroy',['id'=>$order->id])}}">
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
            "buttons": [],
            "columnDefs": [
                {"orderable": false, "searchable": false, "targets": 4},
                {"searchable": false, "targets": 4}
            ]
        });
    </script>
@endsection
