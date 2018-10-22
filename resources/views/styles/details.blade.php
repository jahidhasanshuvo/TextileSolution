@extends('admin_layout')
@section('admin_content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <a class="btn btn-success" href="{{route('size_colors.index',['sid'=>$style->id])}}">Size
                            and Color</a></h2>
                    <a class="btn btn-success" href="{{route('accessories.index',['sid'=>$style->id])}}" style="margin-left: 5px">Accessories</a>
                    <a class="btn btn-success" href="{{route('work_plans.index',['sid'=>$style->id])}}" style="margin-left: 5px">Work Plan</a>

                    <thead class="label-success"><h2>Style Details</h2></thead>
                    <tr>
                        <td>Style ID</td>
                        <td>{{$style->id}}</td>
                    </tr>
                    <tr>
                        <td>Style No.</td>
                        <td>{{$style->style_no}}</td>
                    </tr>
                    <tr>
                        <td>Art No.</td>
                        <td>{{$style->art_no}}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$style->description}}</td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>{{$style->qty}}</td>
                    </tr>
                </table>

                <h2><a href="{{route('styles.index',['oid'=>$oid])}}" class="btn btn-default"> Back To List</a></h2>
            </div>
        </div>
    </div>
@endsection
