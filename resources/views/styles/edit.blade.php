@extends('admin_layout')
@section('admin_content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h4>EDIT STYLE</h4></div>
            <div class="col-md-12">
                <?php
                if(Session::get('message')){ ?>
                <p class="alert-success">{{Session::get('message')}}</p>
                <?php } Session::put('message', null);
                ?>
                <form method="post" action="{{route('styles.update',['id'=>$style->id,'oid'=>$oid])}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label">Style No.</label>
                        <div>
                            <input type="text" class="form-control" name="style_no" value="{{$style->style_no}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Art No.</label>
                        <div>
                            <input type="text" class="form-control" name="art_no" value="{{$style->art_no}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <div>
                            <input type="text" class="form-control" name="description" value="{{$style->description}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <div>
                            <input type="number" class="form-control" name="qty" value="{{$style->qty}}">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="UPDATE">
                </form>
            </div>
        </div>
    </div>
@endsection