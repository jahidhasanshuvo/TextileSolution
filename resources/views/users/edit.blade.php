@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    @if(Session::get('message'))
                        <div class="alert alert-{{Session::get('status')}} alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{Session::get('message')}}</strong>
                        </div>
                        <?php Session::put('message', null);?>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">Edit User Information</h4>
                        <form class="form" action="{{route('users.update',['uid'=>$user->id])}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="control-label" for="fileInput">Role </label>
                                <div class="controls">
                                    <input class="form-control" type="text" name="role" value="{{$user->role}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="fileInput">Approved </label>
                                <div class="controls">
                                    <input type="checkbox" name="approved" value=1 @if($user->approved) checked @endif>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{route('users.index')}}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection