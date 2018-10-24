<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SizeController extends Controller
{
////    private $size;
//
//    public function __construct()
//    {
////        $this->size = new size();
//    }

    public function index()
    {
        $size = Size::all();
        return view('sizes.index', ['sizes' => $size]);
    }

    public function create()
    {
        return view('sizes.create');
    }

    public function store(Request $request)
    {
        $size = new Size();
        $size->name = $request->name;
        $size->description = $request->description;
        $size->save();
        Session::put('message', 'size Added successfully!');
        return redirect(route('sizes.index'));
    }

    public function edit($id)
    {
        $size = Size::find($id);
        return view('sizes.edit', ['size' => $size]);
    }

    public function update(Request $request,$id)
    {
        $size = Size::find($id);
        $size->name = $request->name;
        $size->description = $request->description;
        $size->save();
        Session::put('message','size Updated Successfully');
        return redirect(route('sizes.index'));
    }

    public function destroy($id){
        $size = Size::find($id);
        $size->delete();
        Session::put('message','size deleted successfully');
        return redirect(route('sizes.index'));
    }
}
