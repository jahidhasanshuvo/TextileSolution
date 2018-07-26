@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <br class="col-md-12">
            <?php
            if(Session::get('message')){ ?>
            <p class="alert-success">{{Session::get('message')}}</p>
            <?php } Session::put('message', null);
            ?>
            <a href="{{route('all_order')}}" class="btn btn-default">Back To order list</a>
            <h2><a href="{{route('styles.create', ['oid' => $order_id])}}" class="btn btn-success">Create new style</a>
            </h2>

            <table class="table table-hover">
                <thead class="label-success">
                <th>Id</th>
                <th>Style No.</th>
                <th>Art No.</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($styles as $style)
                    <tr>
                        <td>{{$style->id}}</td>
                        <td>{{$style->style_no}}</td>
                        <td>{{$style->art_no}}</td>
                        <td>{{$style->description}}</td>
                        <td>{{$style->qty}}</td>
                        <td><a class="btn btn-info" href="{{route('styles.show',['id'=>$style->id,'oid'=>$order_id])}}">Details</a> |
                            <a class="btn btn-success" href="{{route('styles.edit',['id'=>$style->id,'oid'=>$order_id])}}">Edit</a> |
                            <form style="display: inline;" method="post" action="{{route('styles.destroy',['id'=>$style->id,'oid'=>$order_id])}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger delete_form_btn"  value="Delete"/>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection