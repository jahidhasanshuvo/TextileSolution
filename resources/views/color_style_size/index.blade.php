@extends('admin_layout')
@section('admin_content')

    <div class="card">
        <div class="card-body">
            <div class="col-md-12">
                <h5><a href="{{route('styles.index',['oid'=>$oid])}}" class="btn btn-default">Back To Style List</a>
                <a class="btn btn-success" href="{{route('size_colors.create',['sid'=>$sid])}}">New Size Color</a>
                </h5>
                @if(Session::get('message'))
                    <div class="alert-success">
                        {{Session::get('message')}}
                        <?php Session::put('message', null)?>
                    </div>
                @endif
                <table class="table table-hover">
                    <thead class="label-success" style="color: white">
                    <th>Color</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($color_styles as $color_style)
                        @foreach($color_style->sizes as $color_style_size)
                            <tr>
                                <td>{{$color_style->colors->name}}</td>
                                <td>{{$color_style_size->name}}</td>
                                <td>{{$color_style_size->pivot->qty}}</td>
                                <td>
                                    <form style="display: inline;" method="post"
                                          action="{{route('size_colors.destroy',['color_style_id'=>$color_style->id,'size_id'=>$color_style_size->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger delete_form_btn" value="Delete"/>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<?php
/*
  *

<td>
                                    <a class="btn btn-default"
                                       href="{{route('size_colors.edit',['sid'=>$sid,'id'=>$size_color->id])}}">Edit</a>
                                    <form style="display: inline;" method="post"
                                          action="{{route('size_colors.destroy',['sid'=>$sid ,'id'=>$size_color->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger delete_form_btn" value="Delete"/>
                                    </form>
                                </td>*/

?>