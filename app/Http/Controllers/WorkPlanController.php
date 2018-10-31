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
    public function index($sid)
    {
        $work_plans = WorkPlan::all()->where('style_id', '=', $sid);
        return view('work_plans.index')->with([
            'work_plans' => $work_plans,
            'sid' => $sid
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sid)
    {
        return view('work_plans.create')->with([
            'sid' => $sid,
            'working_items' => WorkingItem::all()
        ]);
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
            $work_plan = new WorkPlan();
            $work_plan->style_id = $sid;
            $work_plan->working_item_id = $request->working_item_id;
            $work_plan->start_date = $request->start_date;
            $work_plan->close_date = $request->close_date;
            $work_plan->remarks = $request->remarks;
            $work_plan->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect()->back()->with([
            'message' => 'Work Plan Created Successfully',
            'status' => 'success',
            'sid' => $sid
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
            $work_plan = WorkPlan::find($id);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return view('work_plans.edit')->with([
            'work_plan' => $work_plan,
            'working_items' => WorkingItem::all(),
            'sid' => $sid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sid, $id)
    {
        try {
            $work_plan = WorkPlan::find($id);
            $work_plan->working_item_id = $request->working_item_id;
            $work_plan->start_date = $request->start_date;
            $work_plan->close_date = $request->close_date;
            $work_plan->remarks = $request->remarks;
            $work_plan->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect(route('work_plans.index', ['sid' => $sid]))->with([
            'message' => 'Work Plan Updated Successfully',
            'status' => 'success',
            'sid' => $sid
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $work_plan = WorkPlan::find($id);
            $work_plan->delete();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect()->back()->with([
            'message' => 'Work Plan Deleted Successfully',
            'status' => 'success'
        ]);
    }
}
