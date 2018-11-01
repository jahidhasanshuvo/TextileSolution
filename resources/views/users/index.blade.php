@extends('admin_layout')
@section('title','User')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h4>User List</h4></div>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Role</th>
                    <th>Approve</th>
                    <th width="9%">Action</th>
                    </thead>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->role}}</td>
                            @if($user->approved)<td style="color: green">APPROVED</td>
                            @else<td style="color: red">NOT APPROVED</td>
                            @endif
                            <td>
                                <a href="{{route('users.edit',['uid'=>$user->id])}}"><i class="fas fa-edit"></i></a>
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
                {"orderable": false, "searchable": false, "targets": 6},
                {"searchable": false, "targets": 5}
            ]
        });
    </script>
@endsection
