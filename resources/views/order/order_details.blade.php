@extends('admin_layout')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            <div class="col-md-6">
                <a class="btn btn-success" href="{{route('styles.index',['oid'=>$order->id])}}">Styles</a>
                <a class="btn btn-success" href="{{route('accessories.index',['oid'=>$order->id])}}">Accessories</a>
                </br>
                <div class="card-title"><h4>Order Details</h4></div>
                <table class="table table-bordered">
                    <tr>
                        <td>Program Code</td>
                        <td>{{$order->program_code}}</td>
                    </tr>
                    <tr>
                        <td>Buyer name</td>
                        <td>{{$order->buyer->name}}</td>
                    </tr>
                    <tr>
                        <td>Order Date</td>
                        <td>{{$order->created_at}}</td>
                    </tr>
                </table>
                <div class="table-responsive"></div>
                <table class="table table-bordered" width="100%">
                    <thead>
                    <th>Sl.</th>
                    <th>Style No.</th>
                    <th>Art No.</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Var</th>
                    <th>Color</th>
                    @foreach($sizes as $size)
                        <th>{{$size->name}}</th>
                    @endforeach
                    <th>Quantity</th>
                    </thead>
                    @foreach($order->styles as $style)
                        <?php $rowspan = $style->color_styles->count() + 1?>
                        <tbody>
                        <td @if($rowspan>2) rowspan="{{$rowspan}}" @endif>{{$loop->index+1}}</td>
                        <td @if($rowspan>2) rowspan="{{$rowspan}}" @endif>{{$style->style_no}}</td>
                        <td @if($rowspan>2) rowspan="{{$rowspan}}" @endif>{{$style->art_no}}</td>
                        <td @if($rowspan>2) rowspan="{{$rowspan}}" @endif>{{$style->description}}</td>
                        <td @if($rowspan>2) rowspan="{{$rowspan}}" @endif>{{$style->qty}} PCS</td>
                        @foreach($style->color_styles as $color_style)
                            @if($color_style->sizes->count())
                                @if($rowspan > 2)
                                    <tr>
                                        @endif
                                        <td>{{$color_style->colors->var}}</td>
                                        <td>{{$color_style->colors->name}}</td>
                                        <?php $qty = 0;?>
                                        @foreach($sizes as $size)
                                            <?php $flag = true;?>
                                            @foreach($color_style->sizes as $color_style_size)
                                                @if($color_style_size->id == $size->id)
                                                    <?php $flag = false; $qty += $color_style_size->pivot->qty; ?>
                                                    <td>{{$color_style_size->pivot->qty}}</td>
                                                @endif
                                            @endforeach
                                            @if($flag)
                                                <td></td>
                                            @endif
                                        @endforeach
                                        <td>{{$qty}}</td>
                                    </tr>
                                @endif
                                @endforeach
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>


@endsection()
