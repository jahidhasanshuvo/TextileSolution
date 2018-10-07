@extends('admin_layout')
@section('admin_content')

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h4>EDIT COLOR</h4></div>

                <form method="post" action="{{route('update_color',['id'=>$color->id])}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <div>
                            <input type="text" class="form-control" name="name" value="{{$color->name}}" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Var</label>
                        <div>
                            <input type="text" class="form-control" name="var" value="{{$color->var}}" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <div>
                            <input type="text" class="form-control" name="description" value="{{$color->description}}">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success">
                    <a href="{{route('all_color')}}" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection