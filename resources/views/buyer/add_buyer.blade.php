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
                <form class="form" action="{{route('save_buyer')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label" for="fileInput">Buyer Name: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Code: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="code">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Season: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="season">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Brand: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="brand">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Address: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Contact: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="contact">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label" for="fileInput">Email: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="fileInput">Activity: </label>
                        <div class="controls">
                            <select class="form-control" name="activity">
                                <option value=1>Active</option>
                                <option value=0>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>

                </form>
            </div>
        </div>
    </div>



@endsection