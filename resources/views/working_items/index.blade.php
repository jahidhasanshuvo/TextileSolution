@extends('admin_layout')
@section('title','Working Item')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h4>Working Item</h4></div>
            <h2><a href="{{route('working_items.create')}}" class="btn btn-primary">Add New Working Item</a></h2>
            @if(Session::get('message'))
                <div class="alert alert-{{Session::get('status')}} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('message')}}</strong>
                </div>
                <?php Session::put('message', null);?>
            @endif
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead class="label-success" style="color: white">
                    <th>Sl No.</th>
                    <th>Working Items Name</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($working_items as $working_item)
                        <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$working_item->name}}</td>
                        <td>
                            <a href="{{route('working_items.edit',['id'=>$working_item->id])}}"><i class="fas fa-edit"></i></a>
                            <form style="display: inline;" method="post"
                                  action="{{route('working_items.destroy',['id'=>$working_item->id])}}">
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
@endsection()
