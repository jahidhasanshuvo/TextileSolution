@extends('admin_layout')
@section('admin_content')

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h4>EDIT UNIT</h4></div>

                <form method="post" action="{{route('units.update',['id'=>$unit->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <div>
                            <input type="text" class="form-control" name="name" value="{{$unit->name}}" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <div>
                            <input type="text" class="form-control" name="description" value="{{$unit->description}}">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="SUBMIT">
                    <a class="btn btn-default" href="{{route('units.index')}}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection