<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Style;
use App\Supplier;
use App\Unit;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sid)
    {
        $accessories = Accessory::all()->where('style_id', '=', $sid);
//        dd($accessories);
        return view('accessories.index')->with([
            'accessories' => $accessories, 'sid' => $sid,'oid'=>Style::find($sid)->order_id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sid)
    {
        return view('accessories.create')
            ->with([
                'suppliers' => Supplier::all()->where('activity', '=', 1),
                'units' => Unit::all(),
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
        $accessory = new Accessory();
        $accessory->name = $request->name;
        $accessory->booking_quantity = $request->booking_quantity;
        $accessory->received_quantity = $request->received_quantity;
        $accessory->unit_id = $request->unit_id;
        $accessory->balance = $request->balance;
        $accessory->goods_received_date = $request->goods_received_date;
        $accessory->work_order_submit_date = $request->work_order_submit_date;
        $accessory->supplier_id = $request->supplier_id;
        $accessory->style_id = $sid;
        $accessory->save();
        return redirect()->back()
            ->with([
                'message' => 'Accessories added successfully!'
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
        $accessory = Accessory::find($id);
        return view('accessories.edit')
            ->with([
                'accessory' => $accessory,
                'suppliers' => Supplier::all()->where('activity', '=', 1),
                'units' => Unit::all(),
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
    public function update($sid, Request $request, $id)
    {
        $accessory = Accessory::find($id);
        $accessory->name = $request->name;
        $accessory->booking_quantity = $request->booking_quantity;
        $accessory->received_quantity = $request->received_quantity;
        $accessory->unit_id = $request->unit_id;
        $accessory->balance = $request->balance;
        $accessory->goods_received_date = $request->goods_received_date;
        $accessory->work_order_submit_date = $request->work_order_submit_date;
        $accessory->supplier_id = $request->supplier_id;
        $accessory->style_id = $sid;
//        $change=$accessory->getDirty();
//        echo json_encode($change);
//        exit();
        $accessory->save();
        return redirect(route('accessories.index', ['sid' => $sid]))
            ->with([
                'message' => 'Accessories updated successfully!'
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
        $accessory = Accessory::find($id);
        $accessory->delete();
        return redirect()->back()
            ->with([
                'message' => 'Accessories deleted successfully!'
            ]);
    }
}
/*
 * private $accessories;

    public function __construct()
    {
        $this->accessories=new Accessories();
    }

    public function add_accessories()
    {
        return view('accessories.add_accessories');
    }

    public function all_accessories()
    {
        $this->accessories=Accessory::all();
        return view('accessories.all_accessories');
    }

    public function ajaxAccessories()
    {
        $accessories = Accessory::select('*');
        return DataTables::of($accessories)->addColumn('action', function ($accessories) {
            return $accessories->id;
        })->make(true);
    }

    public function save_accessories(Request $request)
    {
        $this->accessories->name=$request->name;
        $this->accessories->booking_quantity=$request->booking_quantity;
        $this->accessories->received_quantity=$request->received_quantity;
        $this->accessories->balance=$request->balance;
        $this->accessories->goods_receive_date=$request->goods_receive_date;
        $this->accessories->work_order_submit_date=$request->work_order_submit_date;
        $this->accessories->supplier_name=$request->supplier_name;

        $this->accessories->save();
        Session::put('message','Accessories added successfully!');

        return redirect(route('all_accessories'));
    }

    public function edit_accessories($id)
    {
        $this->accessories=Accessory::find($id);
        return view('accessories.edit_accessories',['accessories'=>$this->accessories]);
    }
    public function update_buyer(Request $request,$id){
        $this->accessories=Accessory::find($id);
        $this->accessories->name=$request->name;
        $this->accessories->booking_quantity=$request->booking_quantity;
        $this->accessories->received_quantity=$request->received_quantity;
        $this->accessories->balance=$request->balance;
        $this->accessories->goods_receive_date=$request->goods_receive_date;
        $this->accessories->work_order_submit_date=$request->work_order_submit_date;
        $this->accessories->supplier_name=$request->supplier_name;


        $this->accessories->save();
        Session::put('message','Accessories Information updated Successfully');
        return redirect(route('all_accessories'));

    }

    public function delete_accessories($id){
        $this->accessories = Accessory::find($id);
        $this->accessories->delete();
        Session::put('message','Accessories deleted successfully!');
        return redirect(route('all_accessories'));
    }
    public function accessories_details($id)
    {
        $this->accessories= Accessory::find($id);
        return view('accessories.accessories_details',['accessories'=>$this->accessories]);

    }
 */