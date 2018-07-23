@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-success" href="{{route('styles.index',['oid'=>$order->id])}}">Styles</a>
                <a class="btn btn-success" href="">Accessories</a>
                </br>
                <h2>Order Details</h2>
                <table class="table table-bordered">
                    <tr>
                        <td>Order ID</td>
                        <td>{{$order->id}}</td>
                    </tr>
                    <tr>
                        <td>Program Code</td>
                        <td>{{$order->program_code}}</td>
                    </tr>
                    <tr>
                        <td>Buyer Name</td>
                        <td>{{$order->buyer->name}}</td>
                    </tr>
                    <tr>
                        <td>Order Date</td>
                        <td>{{$order->date}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


@endsection()