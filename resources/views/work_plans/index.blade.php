@extends('admin_layout')
@section('title','Work Plan')
@section('admin_content')
    <div class="card">
        <div class="card-body">
            <div class="col-md-12">
                <a class="btn btn-success" href="{{route('work_plans.create',['sid'=>$sid])}}">New Work Plan</a>
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
                        <th>Working Details</th>
                        <th>Start/Submit Date</th>
                        <th>Close Date</th>
                        <th>Remarks</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($work_plans as $work_plan)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$work_plan->working_item->name}}</td>
                                <td>{{$work_plan->start_date}}</td>
                                <td>{{$work_plan->close_date}}</td>
                                <td>{{$work_plan->remarks}}</td>
                                <td>
                                    <a href="{{route('work_plans.edit',['id'=>$work_plan->id,'sid'=>$work_plan->style_id])}}"><i class="fas fa-edit"></i></a>
                                    <form style="display: inline;" method="post"
                                          action="{{route('work_plans.destroy',['id'=>$work_plan->id,'sid'=>$work_plan->style_id])}}">
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