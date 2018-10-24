@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h4>SIZES</h4></div>
                <h5><a class="btn btn-primary" href="{{route('sizes.create')}}">ADD NEW SIZE</a></h5>
                @if(Session::get('message'))
                    <div class="alert-success">
                        {{Session::get('message')}}
                        <?php Session::put('message', null)?>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="datatable">
                        <thead class="label-success">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="50%">Action</th>
                        </thead>
                        <tbody>
                        @foreach($sizes as $size)
                            <tr>
                                <td>{{$size->id}}</td>
                                <td>{{$size->name}}</td>
                                <td>{{$size->description}}</td>
                                <td>
                                    <a href="{{route('sizes.edit',['id'=>$size->id])}}"><i class="fas fa-edit"></i></a>
                                    <form style="display: inline;" method="post"
                                          action="{{route('sizes.destroy',['id'=>$size->id])}}">
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
    </div>
@endsection
@section('page_script')
    <script type="text/javascript">
        $('#datatable').DataTable({
            "scrollX": true,
            'dom': '<"#lchange"l>Brftip',
            "scrollY": "60vh",
            "scrollCollapse": true,
            "destroy": true,
            "order": [[0, "asc"]],
            "buttons": [],
            "columnDefs": [
                {"orderable": false, "searchable": false, "targets": 3},
                {"searchable": false, "targets": 3}
            ]
        });
        document.getElementById('datatable_filter').style.cssFloat = 'left';
        s=document.getElementById('datatable_paginate').style;
        s.marginLeft="18%";
        s.marginRight="100%";
    </script>
@endsection