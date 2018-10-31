<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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
        try {
            $size = new Size();
            $size->name = $request->name;
            $size->description = $request->description;
            $size->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
//        Session::put('message', 'size Added successfully!');
        return redirect(route('sizes.index'))->with([
            'message' => 'Size Added Successfully!'
        ]);
    }

    public function edit($id)
    {
        try {
            $size = Size::find($id);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return view('sizes.edit', ['size' => $size]);
    }

    public function update(Request $request, $id)
    {
        try {
            $size = Size::find($id);
            $size->name = $request->name;
            $size->description = $request->description;
            $size->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
//        Session::put('message', 'size Updated Successfully');
        return redirect(route('sizes.index'))->with([
            'message' => 'Size Updated Successfully!'
        ]);
    }

    public function destroy($id)
    {
        try {
            $size = Size::find($id);
            $size->delete();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
//        Session::put('message', 'size deleted successfully');
        return redirect(route('sizes.index'))->with([
            'message' => 'Size Deleted Successfully!',
            'status'  => 'success'
        ]);
    }
}
