@extends('admin_layout')
@section('admin_content')
    <div class="col-md-6">
        <div class="card">
            @if(Session::get('message'))
                <div class="alert alert-{{Session::get('status')}} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('message')}}</strong>
                </div>
                <?php Session::put('message',null);?>
            @endif
            <form class="form-horizontal" action="{{route('buyers.store')}}" method="post">
                <div class="card-body">
                    <h4 class="card-title">Buyer Info</h4>
                {{csrf_field()}}
                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label" for="fileInput">Buyer Name: </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="name" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label" for="fileInput">Code: </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="code" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label" for="fileInput">Season: </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="season" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label" for="fileInput">Brand: </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="brand" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label" for="fileInput">Address: </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="address" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label" for="fileInput">Contact: </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="contact" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label" for="fileInput">Email: </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="email" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label" for="fileInput">Activity: </label>
                    <div class="col-sm-9">
                        <select class="form-control" name="activity">
                            <option value=1>Active</option>
                            <option value=0>Inactive</option>
                        </select>
                    </div>
                </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection