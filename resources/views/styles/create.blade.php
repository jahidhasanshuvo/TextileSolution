@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(Session::get('message')){ ?>
                <p class="alert-success">{{Session::get('message')}}</p>
                <?php } Session::put('message', null);
                ?>
                <form method="post" action="{{route('styles.store',['oid'=>$order_id])}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label">Style No.</label>
                        <div>
                            <input type="text" class="form-control" name="style_no">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Art No.</label>
                        <div>
                            <input type="text" class="form-control" name="art_no">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <div>
                            <input type="text" class="form-control" name="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <div>
                            <input type="number" class="form-control" name="qty">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
@endsection