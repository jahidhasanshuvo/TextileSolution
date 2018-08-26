<?php

namespace App\Http\Controllers;

use App\Color;
use App\ColorStyle;
use App\Size;
use App\Style;
use Illuminate\Http\Request;

class ColorStyleSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sid)
    {
        $styles = Style::where('id', $sid)->with('color_styles.sizes')->first();
      //  dd($styles->color_styles->first()->colors->name);
        return view('color_style_size.index')->with([
            'sid' => $sid,
            'oid' => $styles->order_id,
            'color_styles' => $styles->color_styles
        ]);
        dd($style->first()->color_styles->first()->sizes()->first()->pivot->qty);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sid)
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('color_style_size.create')->with([
            'sizes' => $sizes,
            'colors' => $colors,
            'sid' => $sid
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($sid, Request $request)
    {
        try {
            $colorStyle = ColorStyle::where('color_id', $request->color)
                ->where('style_id', $sid)->first();
            if (is_null($colorStyle)) {
                $colorStyle = new ColorStyle();
                $colorStyle->style_id = $sid;
                $colorStyle->color_id = $request->color;
                $colorStyle->save();
            }
            $colorStyle->sizes()->attach($request->size, ['qty' => $request->qty]);
            return redirect()->back()
                ->with([
                    'message' => 'New Color With size Added'
                ]);
        } Catch (\Exception $exception) {
            if ($exception->getCode() == '23000') {
                return redirect()->back()
                    ->with([

                        'status' => 'failed',
                        'message' => 'duplicate entry errors',
                    ]);
            }
            return redirect()->back()
                ->with([

                    'status' => 'failed',
                    'message' => 'error occures, errors: ' . $exception->getMessage(),
                ]);
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($color_style_id,$size_id)
    {
        $color_style = ColorStyle::find($color_style_id);
        $color_style->sizes()->detach($size_id);
        return redirect()->back()->with([
            'message' => 'Successfully Deleted'
        ]);
    }
}
