@extends('admin_layout')
@section('admin_content')

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">EDIT SUPPLIER INFORMATION</div>
                <form class="form" action="{{route('suppliers.update',['id'=>$supplier->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label">Supplier Name: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="name" value="{{$supplier->name}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Address: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="address" value="{{$supplier->address}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Phone: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="phone" value="{{$supplier->phone}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mobile: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="mobile" value="{{$supplier->mobile}}">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="Update"/>
                    <h2><a class="btn btn-default" href="{{route('suppliers.index')}}">Cancel</a></h2>
                </form>
            </div>
        </div>
    </div>
@endsection