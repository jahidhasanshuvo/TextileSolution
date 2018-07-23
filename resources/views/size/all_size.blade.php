@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5><a class="btn btn-success" href="{{route('add_size')}}">Add new size</a></h5>
                @if(Session::get('message'))
                    <div class="alert-success">
                        {{Session::get('message')}}
                        <?php Session::put('message', null)?>
                    </div>
                @endif
                <table class="table table-hover">
                    <thead class="label-success">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($sizes as $size)
                        <tr>
                            <td>{{$size->id}}</td>
                            <td>{{$size->name}}</td>
                            <td>{{$size->description}}</td>
                            <td>
                                <a class="btn btn-default" href="{{route('edit_size',['id'=>$size->id])}}">Edit</a>
                                <a class="btn btn-danger" href="{{route('delete_size',['id'=>$size->id])}}"
                                   id="delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection