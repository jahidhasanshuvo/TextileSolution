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
                <table class="table table-hover" id="datatable">
                    <thead class="label-success">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Var</th>
                    <th>Description</th>
                    <th>Action</th>
                    </thead>
                    <tbody>

                    @foreach($colors as $color)
                        <tr>
                            <td>{{$color->id}}</td>
                            <td>{{$color->name}}</td>
                            <td>{{$color->var}}</td>
                            <td>{{$color->description}}</td>

                            <td>
                                <a href="{{route('colors.edit',['id'=>$color->id])}}"><i class="fas fa-edit"></i></a>
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
@endsection

@section('page_script')
    <script type="text/javascript">
        $('#datatable').DataTable({
            "scrollX": true,
            // 'dom': '<"#lchange"l>Brftip',
            "scrollY": "60vh",
            "scrollCollapse": true,
            "destroy": true,
            "order": [[0, "asc"]],
            "buttons": [          ],
            "columnDefs": [
                {"orderable": false, "searchable": false, "targets": 5},
                {"searchable": false, "targets": 4}
            ]
        });
    </script>
@endsection
