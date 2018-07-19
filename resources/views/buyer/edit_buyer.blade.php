@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="border:2px solid rgba(106,20,22,0.98);padding: 10px 25px">
                <?php
                if(Session::get('message')){ ?>
                <p class="alert-success">{{Session::get('message')}}</p>
                <?php } Session::put('message', null);
                ?>
                <h2>ADD BUYER INFORMATION</h2>
                <form class="form" action="{{route('update_buyer',['id'=>$buyer->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label" for="fileInput">Buyer Name: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="name" value="{{$buyer->name}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Code: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="code" value="{{$buyer->code}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Season: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="season" value="{{$buyer->season}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Brand: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="brand" value="{{$buyer->brand}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Address: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="address" value="{{$buyer->address}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Contact: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="contact" value="{{$buyer->contact}}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label" for="fileInput">Email: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="email" value="{{$buyer->email}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Activity: </label>
                        <div class="controls">
                            <select class="form-control" name="activity">
                                <option value=1 @if($buyer->activity) selected @endif>Active</option>
                                <option value=0 @if(!$buyer->activity) selected @endif>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{route('all_buyer')}}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection