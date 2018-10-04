<?php

namespace App\Http\Controllers;

use App\WorkingItem;
use Illuminate\Http\Request;

class WorkingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $working_items = WorkingItem::all();
        return view('working_items.index')->with(['working_items' => $working_items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('working_items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $working_item = new WorkingItem();
        $working_item->name=$request->name;
        $working_item->save();
        return redirect()->back()->with([
            'message'=>'Items Created Successfully',
            'status'=>'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $working_item = WorkingItem::find($id);
        return view('working_items.edit')->with([
            'working_item'=>$working_item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $working_item = WorkingItem::find($id);
        $working_item->name=$request->name;
        $working_item->save();
        return redirect(route('working_items.index'))->with([
            'message'=>'Items Updated Successfully',
            'status'=>'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $working_item = WorkingItem::find($id);
        $working_item->delete();
        return redirect()->back()->with([
            'message'=>'Items Deleted Successfully',
            'status'=>'success'
        ]);
    }
}
