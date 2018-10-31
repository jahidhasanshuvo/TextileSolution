<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
{
//    private $color;

//    public function __construct()
//    {
////        $this->color = new Color();
//    }

    public function index()
    {
        $color = Color::all();
        return view('colors.index', ['colors' => $color]);
    }

    public function create()
    {
        return view('colors.create');
    }

    public function store(Request $request)
    {
        try {
            $color = new Color();
            $color->name = $request->name;
            $color->var = $request->var;
            $color->description = $request->description;
            $color->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect()->back()
            ->with([
                'message' => 'Color stored Successfully',
                'status' => 'success'
            ]);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        try {
            $color = Color::find($id);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return view('colors.edit')
            ->with(['color' => $color]);

    }

    public function update(Request $request, $id)
    {
        try {
            $color = Color::find($id);
            $color->name = $request->name;
            $color->var = $request->var;
            $color->description = $request->description;
            $color->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect(route('colors.index'))
            ->with([
                'message' => 'Color updated successfully!',
                'status' => 'success'
            ]);
    }

    public function destroy($id)
    {
        try {
            $color = Color::find($id);
            $color->delete();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect()->back()
            ->with([
                'message' => 'Color Deleted Successfully',
                'status' => 'success'
            ]);
    }
}
