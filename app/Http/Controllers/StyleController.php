<?php

namespace App\Http\Controllers;

use App\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StyleController extends Controller
{
    private $style;
    public function __construct()
    {
        $this->style = new Style();
    }

    public function index($oid)
    {
        $this->style = Style::all()->where('order_id','=',$oid);
        return view('styles.index',
            [
                'styles'=>$this->style,
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $oid)
    {
        $this->style->style_no = $request->style_no;
        $this->style->art_no = $request->art_no;
        $this->style->description = $request->description;
        $this->style->qty = $request->qty;
        $this->style->order_id =$oid;
        $this->style->save();
        Session::put('message','Style Added');
        return redirect(route('styles.index',['oid'=>$oid]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($oid, $id)
    {
        $this->style = Style::find($id);
        return view('styles.details',['style'=>$this->style,'oid'=>$oid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($oid,$id)
    {
        $style= Style::find($id);
        return view('styles.edit',['style'=>$style,'oid'=>$oid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($oid,Request $request, $id)
    {
        $style = Style::find($id);
        $style->style_no =$request->style_no;
        $style->art_no =$request->art_no;
        $style->description =$request->description;
        $style->qty =$request->qty;
        $style->save();
        return redirect(route('styles.index',['oid'=>$oid]))
            ->with([
               'message' =>'Style Updated Successfully'
            ]);
    }

    public function destroy($oid ,$id)
    {
        $style = Style::find($id);
        $style->delete();
        return redirect()->back()->with(
            [
                'message' => 'Styles Deleted Successfully'
            ]
        );
    }
}
