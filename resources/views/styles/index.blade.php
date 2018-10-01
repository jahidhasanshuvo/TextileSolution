@extends('admin_layout')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            <div class="div-title">STYLES</div>
            <?php
            if(Session::get('message')){ ?>
            <p class="alert-success">{{Session::get('message')}}</p>
            <?php } Session::put('message', null);
            ?>
            <h6><a href="{{route('styles.create', ['oid' => $order_id])}}" class="btn btn-success">Create new style</a>
            <a href="{{route('all_order')}}" class="btn btn-default">Back To order list</a></h6>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="datatable">
                    <thead class="label-success" style="color: white">
                    <th>Id</th>
                    <th>Style No.</th>
                    <th>Art No.</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th style="width: 20%">Action</th>
                    </thead>
                    <tbody>
                    @foreach($styles as $style)
                        <tr>
                            <td>{{$style->id}}</td>
                            <td>{{$style->style_no}}</td>
                            <td>{{$style->art_no}}</td>
                            <td>{{$style->description}}</td>
                            <td>{{$style->qty}}</td>
                            <td><a href="{{route('styles.show',['id'=>$style->id,'oid'=>$order_id])}}"><i class="fas fa-info"></i></a> |
                                <a href="{{route('styles.edit',['id'=>$style->id,'oid'=>$order_id])}}"><i class="fas fa-edit"></i></a> |
                                <form style="display: inline;" method="post"
                                      action="{{route('styles.destroy',['id'=>$style->id,'oid'=>$order_id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete_form_btn" style="border: none;background-color: transparent"><i class="fas fa-trash-alt"></i></button>
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
@section('page_script')
    <script type="text/javascript">
        $('#datatable').DataTable({
            "scrollX": true,
            'dom': '<"#lchange"l>Brftip',
            "scrollY": "60vh",
            "scrollCollapse": true,
            "destroy": true,
            "order": [[0, "asc"]],
            buttons: [

            ],
            "columnDefs": [
                {"orderable": false, "searchable": false, "targets": 5},
            ]
        });
    </script>
@endsection