@extends('admin_layout')
@section('admin_content')
    <div class="col-md-6">
        <div class="card">
            @if(Session::get('message'))
                <div class="alert alert-{{Session::get('status')}} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('message')}}</strong>
                </div>
                <?php Session::put('message', null);?>
            @endif
            <form class="form-horizontal" action="{{route('working_items.store')}}" method="post">
                <div class="card-body">
                    <h4 class="card-title">Working Items</h4>
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label" for="fileInput">Working Item
                            Name: </label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="name" required>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button><br>
                        <a href="{{route('working_items.index')}}" class="btn btn-block">Back to List</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection