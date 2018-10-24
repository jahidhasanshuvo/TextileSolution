@extends('admin_layout')
@section('title','Buyer')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h4>Buyer</h4></div>
            <h2><a href="{{route('buyers.create')}}" class="btn btn-primary">ADD NEW BUYER</a></h2>
            @if(Session::get('message'))
                <div class="alert alert-{{Session::get('status')}} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('message')}}</strong>
                </div>
                <?php Session::put('message',null);?>
            @endif
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead class="label-success" style="color: white">
                    <th>Sl.</th>
                    <th>Buyer Name</th>
                    <th>Code</th>
                    <th>Season</th>
                    <th>Brand</th>
                    <th>Activity</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th width="9%">Action</th>
                    </thead>
                    @foreach($buyers as $buyer)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$buyer->name}}</td>
                            <td>{{$buyer->code}}</td>
                            <td>{{$buyer->season}}</td>
                            <td>{{$buyer->brand}}</td>
                            @if($buyer->activity)<td>Active</td>
                            @else<td>Inactive</td>
                            @endif

                            <td>{{$buyer->email}}</td>
                            <td>{{$buyer->address}}</td>
                            <td>{{$buyer->contact}}</td>
                            <td>
                                <a href="{{route('buyers.edit',['id'=>$buyer->id])}}"><i class="fas fa-edit"></i></a>
                                <form style="display:inline;" method="post"
                                      action="{{route('buyers.destroy',['id'=>$buyer->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete_form_btn"
                                            style="border: none;background-color: transparent"><i
                                                class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
@endsection()
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
