<?php

namespace App\Http\Controllers;

use App\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StyleController extends Controller
{
//    private $style;
    public function __construct()
    {
//        $this->style = new Style();
    }

    public function index($oid)
    {
        $style = Style::all()->where('order_id', '=', $oid);
        return view('styles.index',
            [
                'styles' => $style,
                'order_id' => $oid
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($oid)
    {
        return view('styles.create')->with([
            'order_id' => $oid
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $oid)
    {
        try {
            $style = new Style();
            $style->style_no = $request->style_no;
            $style->art_no = $request->art_no;
            $style->description = $request->description;
            $style->qty = $request->qty;
            $style->order_id = $oid;
            $style->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
//        Session::put('message', 'Style Added');
        return redirect(route('styles.index', ['oid' => $oid]))->with([
            'message' => 'Style Added Successfully!',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($oid, $id)
    {
        try {
            $style = Style::find($id);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return view('styles.details', ['style' => $style, 'oid' => $oid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($oid, $id)
    {
        try {
            $style = Style::find($id);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return view('styles.edit', ['style' => $style, 'oid' => $oid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($oid, Request $request, $id)
    {
        try {
            $style = Style::find($id);
            $style->style_no = $request->style_no;
            $style->art_no = $request->art_no;
            $style->description = $request->description;
            $style->qty = $request->qty;
            $style->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect(route('styles.index', ['oid' => $oid]))->with([
            'message' => 'Style Updated Successfully',
            'status' => 'success'
        ]);
    }

    public function destroy($oid, $id)
    {
        try {
            $style = Style::find($id);
            $style->delete();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect()->back()->with([
                'message' => 'Style Deleted Successfully!',
                'status'  => 'success'
            ]);
    }
}
