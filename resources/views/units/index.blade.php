@extends('admin_layout')
@section('admin_content')
    <script src="{{asset('backend/js/bootbox.min.js')}}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5><a class="btn btn-success" href="{{route('units.create')}}">Add new unit</a></h5>
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
                    @foreach($units as $unit)
                        <tr>
                            <td>{{$unit->id}}</td>
                            <td>{{$unit->name}}</td>
                            <td>{{$unit->description}}</td>
                            <td>
                                <a class="btn btn-default" href="{{route('units.edit',['id'=>$unit->id])}}">Edit</a>
                                <form style="display: inline;" class="delete_form" method="post" action="{{route('units.destroy',['id'=>$unit->id])}}">
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