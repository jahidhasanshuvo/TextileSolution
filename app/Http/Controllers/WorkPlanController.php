<?php

namespace App\Http\Controllers;

use App\WorkingItem;
use App\WorkPlan;
use Illuminate\Http\Request;

class WorkPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($oid)
    {
        $work_plans = WorkPlan::all()->where('order_id','=',$oid);
        return view('work_plans.index')->with([
            'work_plans'=>$work_plans,
            'oid'=>$oid
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($oid)
    {
        return view('work_plans.create')->with([
            'oid'=>$oid,
            'working_items'=>WorkingItem::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$oid)
    {
        $work_plan = new WorkPlan();
        $work_plan->order_id = $oid;
        $work_plan->working_item_id = $request->working_item_id;
        $work_plan->start_date=$request->start_date;
        $work_plan->close_date=$request->close_date;
        $work_plan->remarks=$request->remarks;
        $work_plan->save();
        return redirect()->back()->with([
            'message'=> 'Work Plan Created Successfully',
            'status'=>'success',
            'oid'=>$oid
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
    public function edit($oid,$id)
    {
        $work_plan = WorkPlan::find($id);
        return view('work_plans.edit')->with([
            'work_plan'=>$work_plan,
            'working_items' => WorkingItem::all(),
            'oid'=>$oid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$oid,$id)
    {
        $work_plan=WorkPlan::find($id);
        $work_plan->working_item_id = $request->working_item_id;
        $work_plan->start_date=$request->start_date;
        $work_plan->close_date=$request->close_date;
        $work_plan->remarks=$request->remarks;
        $work_plan->save();
        return redirect(route('work_plans.index',['oid'=>$oid]))->with([
            'message'=> 'Work Plan Updated Successfully',
            'status'=>'success',
            'oid'=>$oid
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
        $work_plan = WorkPlan::find($id);
        $work_plan->delete();
        return redirect()->back()->with([
            'message'=>'Work Plan Deleted Successfully',
            'status' =>'success'
        ]);
    }
}
