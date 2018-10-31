<?php

namespace App\Http\Controllers;

use App\Size;
use App\Color;
use App\SizeColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SizeColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sid)
    {
        $size_colors = SizeColor::all()->where('style_id', '=', $sid);
        return view('size_colors.index', ['sid' => $sid, 'size_colors' => $size_colors]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sid)
    {
        $sizes = Size::all();
        $colors = Color::all();
        return view('size_colors.create', ['sizes' => $sizes, 'colors' => $colors, 'sid' => $sid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sid)
    {
        try {
            $size_color = new SizeColor();
            $size_color->size_id = $request->size;
            $size_color->color_id = $request->color;
            $size_color->qty = $request->qty;
            $size_color->style_id = $sid;
            $size_color->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect()->back()
            ->with([
                'message' => "Size Color Added"
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sid, $id)
    {
        try {
            $sizes = Size::all();
            $colors = Color::all();
            $size_color = SizeColor::find($id);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return view('size_colors.edit', ['sizes' => $sizes, 'colors' => $colors, 'sid' => $sid, 'size_color' => $size_color]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($sid, Request $request, $id)
    {
        try {
            $size_color = SizeColor::find($id);
            $size_color->size_id = $request->size;
            $size_color->color_id = $request->color;
            $size_color->qty = $request->qty;
            $size_color->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect(route('size_colors.index', ['sid' => $sid]))
            ->with([
                'message' => "Size Color Updated Successfully!",
                'status' => 'success'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sid, $id)
    {
        try {
            $size_color = SizeColor::find($id);
            $size_color->delete();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect()->back()
            ->with([
                'message' => "Size Color Deleted",
                'status'  => 'success'
            ]);
    }
}
