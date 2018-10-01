<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SizeController extends Controller
{
//    private $size;

    public function __construct()
    {
//        $this->size = new size();
    }

    public function all_size()
    {
        $size = Size::all();
        return view('size.all_size', ['sizes' => $size]);
    }

    public function add_size()
    {
        return view('size.add_size');
    }

    public function save_size(Request $request)
    {
        $size = new Size();
        $size->name = $request->name;
        $size->description = $request->description;
        $size->save();
        Session::put('message', 'size Added');
        return redirect(route('add_size'));
    }

    public function edit_size($id)
    {
        $size = Size::find($id);
        return view('size.edit_size', ['size' => $size]);
    }

    public function update_size(Request $request,$id)
    {
        $size = Size::find($id);
        $size->name = $request->name;
        $size->description = $request->description;
        $size->save();
        Session::put('message','size Updated Successfully');
        return redirect(route('all_size'));
    }

    public function delete_size($id){
        $size = Size::find($id);
        $size->delete();
        Session::put('message','size deleted successfully');
        return redirect(route('all_size'));
    }
}
