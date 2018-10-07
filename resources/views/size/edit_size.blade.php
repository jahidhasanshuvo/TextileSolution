@extends('admin_layout')
@section('admin_content')

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h4>EDIT SIZE</h4></div>

                <form method="post" action="{{route('update_size',['id'=>$size->id])}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <div>
                            <input type="text" class="form-control" name="name" value="{{$size->name}}" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Var</label>
                        <div>
                            <input type="text" class="form-control" name="description" value="{{$size->description}}">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="SUBMIT">
                    <a class="btn btn-default" href="{{route('all_size')}}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection