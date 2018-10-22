@extends('admin_layout')
@section('title','Work Plan')
@section('admin_content')
    <div class="col-md-6">
        <div class="card">
            @if(Session::get('message'))
                <div class="alert alert-{{Session::get('status')}} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('message')}}</strong>
                </div>
                <?php Session::put('message', null);?>
            @endif
            <form action="{{route('work_plans.update',['id'=>$work_plan->id,'sid'=>$work_plan->style_id])}}" method="post">
                <div class="card-body">
                    <h4 class="card-title">Work Plan</h4>
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Working Details: </label>
                        <div class="col-sm-9">
                            <select name="working_item_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($working_items as $working_item)
                                    <option value="{{$working_item->id}}" @if($working_item->id == $work_plan->working_item_id) selected @endif>{{$working_item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Start/Submit Date: </label>
                        <div class="col-sm-9">
                            <input class="form-control" type="date" name="start_date" value="{{$work_plan->start_date}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Close Date: </label>
                        <div class="col-sm-9">
                            <input class="form-control" type="date" name="close_date" value="{{$work_plan->close_date}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Remarks: </label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="remarks" value="{{$work_plan->remarks}}">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <br>
                        <a href="{{route('work_plans.index',['sid'=>$work_plan->style_id])}}" class="btn btn-block">Back to List</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection