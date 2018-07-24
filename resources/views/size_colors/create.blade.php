@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><a class="btn btn-default" href="{{route('size_colors.index',['sid'=>$sid])}}">Back To List</a></h2>
                <h1>Save Size and Color</h1>
                @if(Session::get('message'))
                    <div class="alert-success">
                        {{Session::get('message')}}
                        <?php Session::put('message', null)?>
                    </div>
                @endif
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
                            <option value="">Select Size</option>
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
                    <input type="submit" value="Save" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn btn-warning">
                </form>
            </div>
        </div>
    </div>
@endsection()