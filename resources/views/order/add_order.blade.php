@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
                if(Session::get('message')){ ?>
                <p class="alert-success">{{Session::get('message')}}</p>
                <?php } Session::put('message', null);
                ?>
                <h2>Add New Order</h2>
                <form action="{{route('save_order')}}" method="post">
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
                        <label class="control-label"> Select Buyer</label>
                        <div>
                            <input type="date" name="date" class="form-control">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success">
                    <input type="reset" class="btn btn-default">
                </form>
            </div>
        </div>
    </div>
@endsection