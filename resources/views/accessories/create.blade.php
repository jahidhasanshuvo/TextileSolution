@extends('admin_layout')
@section('admin_content')

    <div class="container">
        <div class="row">
            <div class="col-md-8" style="border:2px solid rgba(106,20,22,0.98);padding:25px">
                <?php
                if(Session::get('message')){ ?>
                <p class="alert-success">{{Session::get('message')}}</p>
                <?php } Session::put('message', null);
                ?>
                <div class="box-header yellow">
                    <h2><b>ACCESSORIES</b></h2>
                </div>
                <form class="form" action="{{route('accessories.store',['oid'=>$oid])}}" method="post">
                    {{csrf_field()}}
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="control-label" for="fileInput">Name</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="fileInput">Booking Quantity</label>
                            <div class="controls">
                                <input class="form-control" type="number" name="booking_quantity">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Unit</label>
                            <select name="unit_id" required="">
                                <option value="">Select Unit</option>
                                @foreach($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="fileInput">Received Quantity </label>
                            <div class="controls">
                                <input class="form-control" type="number" name="received_quantity">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="fileInput">Balance </label>
                            <div class="controls">
                                <input class="form-control" type="number" name="balance">
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-6">

                        <div class="form-group">
                            <label class="control-label" for="fileInput">Goods Received Date </label>
                            <div class="controls">
                                <input class="form-control" type="date" name="goods_received_date">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="fileInput">Work Order Submit Date </label>
                            <div class="controls">
                                <input class="form-control" type="date" name="work_order_submit_date">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="fileInput">Supplier Name</label>
                            <select name="supplier_id" class="form-control" required="">
                                <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="submit" class="btn btn-success" value="Save"/>
                        <input type="reset" class="btn btn-danger" value="Reset"/>
                        <h2><a class="btn btn-default" href="{{route('accessories.index',['oid'=>$oid])}}">Back To
                                List</a></h2>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection