@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="{{route('size_colors.update',['sid'=>$sid,'id'=>$size_color->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label">Select Size</label>
                        <select class="form-control" name="size" required="">
                            <option value="">Select Size</option>
                            @foreach($sizes as $size)
                                <option value="{{$size->id}}"
                                        @if($size_color->size_id == $size->id) selected @endif>{{$size->name}}</option>
                            @endforeach()
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Select Color</label>
                        <select class="form-control" name="color" required="">
                            <option value="">Select Size</option>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}"
                                        @if($size_color->color_id == $color->id) selected @endif>{{$color->name}}</option>
                            @endforeach()
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Select Quantity</label>
                        <div>
                            <input type="number" name="qty" value="{{$size_color->qty}}">
                        </div>
                    </div>
                    <input type="submit" value="Save" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
@endsection()