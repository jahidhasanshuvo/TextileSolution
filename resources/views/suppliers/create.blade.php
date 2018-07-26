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
                <h2>ADD SUPPLIER INFORMATION</h2>
                <form class="form" action="{{route('suppliers.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">Supplier Name: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Address: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Phone: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Mobile: </label>
                        <div class="controls">
                            <input class="form-control" type="text" name="mobile">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="fileInput">Activity: </label>
                        <div class="controls">
                            <select class="form-control" name="activity">
                                <option value="">Select Activity</option>
                                <option value=1>Active</option>
                                <option value=0>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="Submit"/>
                    <input type="reset" class="btn btn-danger" value="Reset"/>
                    <h2><a class="btn btn-default" href="{{route('suppliers.index')}}">Back to List</a></h2>
                </form>
            </div>
        </div>
    </div>
@endsection