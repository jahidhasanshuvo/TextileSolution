@extends('admin_layout')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h4>COLORS</h4></div>
            <div class="col-md-12">
                <h5><a class="btn btn-primary" href="{{route('colors.create')}}">ADD NEW COLOR</a></h5>
                @if(Session::get('message'))
                    <div class="alert-success">
                        {{Session::get('message')}}
                        <?php Session::put('message', null)?>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="datatable">
                        <thead class="label-success">
                        <th  width="10%">Id</th>
                        <th  width="20%">Name</th>
                        <th  width="20%">Var</th>
                        <th  width="10%">Description</th>
                        <th width="40%">Action</th>
                        </thead>
                        <tbody>

                        @foreach($colors as $color)
                            <tr>
                                <td>{{$color->id}}</td>
                                <td>{{$color->name}}</td>
                                <td>{{$color->var}}</td>
                                <td>{{$color->description}}</td>

                                <td>
                                    <a href="{{route('colors.edit',['id'=>$color->id])}}"><i
                                                class="fas fa-edit"></i></a>
                                    <form style="display: inline;" method="post"
                                          action="{{route('colors.destroy',['id'=>$color->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete_form_btn"
                                                style="border: none;background-color: transparent"><i
                                                    class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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
            "buttons": [],
            "columnDefs": [
                {"orderable": false, "searchable": false, "targets": 4},
                {"searchable": false, "targets": 4}
            ]
        });
        // document.getElementById('datatable_filter').style.cssFloat = 'left';
        // s = document.getElementById('datatable_paginate').style;
        // s.marginLeft = "18%";
        // s.marginRight = "100%";
    </script>
@endsection
