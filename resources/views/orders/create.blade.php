@extends('admin_layout')
@section('admin_content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h4>ADD NEW ORDER</h4></div>
                <?php
                if(Session::get('message')){ ?>
                <p class="alert-success">{{Session::get('message')}}</p>
                <?php } Session::put('message', null);
                ?>
                <form action="{{route('orders.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label"> Order Program Code</label>
                        <div>
                            <input class="form-control" type="text" name="program_code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"> Select Buyer</label>
                        <div>
                            <select class="form-control" name="buyer_id">
                                <option>Select Buyer</option>
                                @foreach($buyers as $buyer)
                                    <option value="{{$buyer->id}}">{{$buyer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"> Select Date</label>
                        <div>
                            <input type="date" name="date" class="form-control">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success" value="SUBMIT">
                    <input type="reset" class="btn btn-default">
                </form>
            </div>
        </div>
    </div>
@endsection