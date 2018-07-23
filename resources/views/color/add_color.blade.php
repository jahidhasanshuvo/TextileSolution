@extends('admin_layout')
@section('admin_content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @if(Session::get('message'))
                    <div class="alert-success">
                        {{Session::get('message')}}
                        <?php Session::put('message',null)?>
                    </div>
                @endif
                <form method="post" action="{{route('save_color')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <div>
                            <input type="text" class="form-control" name="name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Var</label>
                        <div>
                            <input type="text" class="form-control" name="var" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <div>
                            <input type="text" class="form-control" name="description">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success">
                    <input type="reset" class="btn  btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection