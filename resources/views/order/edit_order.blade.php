@extends('admin_layout')
@section('admin_content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h4>EDIT ORDER</h4></div>

                <form action="{{route('update_order',['id'=>$order->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label"> Order Program Code</label>
                        <div>
                            <input class="form-control" type="text" name="program_code"
                                   value="{{$order->program_code}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"> Select Buyer</label>
                        <div>
                            <select class="form-control" name="buyer_id" required>
                                <option value="">Select Buyer</option>
                                @foreach($buyers as $buyer)
                                    <option value="{{$buyer->id}}"
                                            @if($buyer->id == $order->buyer_id) selected @endif>{{$buyer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"> Select Date</label>
                        <div>
                            <input type="date" name="date" class="form-control" value="{{$order->date}}">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success" value="SUBMIT">
                    <a href="{{route('all_order')}}" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection