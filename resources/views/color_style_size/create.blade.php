@extends('admin_layout')
@section('title','Size Color')
@section('admin_content')
    <div class="col-md-6">
        @if(Session::get('message'))
            <div class="alert-success">
                {{Session::get('message')}}
                <?php Session::put('message', null)?>
            </div>
        @endif
        <div class="card">
            <div class="card-title"><h4 style="margin-left: 20px;margin-top: 20px">Add Size and Color</h4></div>
            <div class="card-body">

                <form method="post" action="{{route('size_colors.store',['sid'=>$sid])}}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">Select Size</label>
                        <select class="form-control" name="size" required="">
                            <option value="">Select Size</option>
                            @foreach($sizes as $size)
                                <option value="{{$size->id}}">{{$size->name}}</option>
                            @endforeach()
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Select Color</label>
                        <select class="form-control" name="color" required="">
                            <option value="">Select Color</option>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->name}}</option>
                            @endforeach()
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Select Quantity</label>
                        <div>
                            <input type="number" name="qty">
                        </div>
                    </div>
                    <input type="submit" value="SUBMIT" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn btn-warning">
                    <h2 style="float: right"><a class="btn btn-primary" href="{{route('size_colors.index',['sid'=>$sid])}}">Back</a></h2>

                </form>
            </div>
        </div>
    </div>
@endsection()