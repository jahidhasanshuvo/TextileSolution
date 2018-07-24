@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h5><a class="btn btn-success" href="{{route('size_colors.create',['sid'=>$sid])}}">New Size Color</a>
                </h5>
                @if(Session::get('message'))
                    <div class="alert-success">
                        {{Session::get('message')}}
                        <?php Session::put('message', null)?>
                    </div>
                @endif
                <table class="table table-hover">
                    <thead class="label-success">
                    <th>Size</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($size_colors as $size_color)
                        <tr>
                            <td>{{$size_color->size->name}}</td>
                            <td>{{$size_color->color->name}}</td>
                            <td>{{$size_color->qty}}</td>
                            <td>
                                <a class="btn btn-default"
                                   href="{{route('size_colors.edit',['sid'=>$sid,'id'=>$size_color->id])}}">Edit</a>
                                <form style="display: inline;" method="post"
                                      action="{{route('size_colors.destroy',['sid'=>$sid ,'id'=>$size_color->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger delete_form_btn" value="Delete"/>
                                </form>
                            </td>
                        </tr>
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
  */

?>