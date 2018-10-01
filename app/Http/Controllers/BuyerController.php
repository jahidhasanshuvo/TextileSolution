<?php

namespace App\Http\Controllers;

use App\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class BuyerController extends Controller
{
//    private $buyer;

    public function __construct()
    {
//        $this->buyer = new Buyer();
    }

    public function all_buyer()
    {
        return view('buyer.all_buyer');
    }

    public function ajax_buyer()
    {
        $buyer = Buyer::all();
        return DataTables::of($buyer)->addColumn('action', function ($buyer) {
            return $buyer->id;
        })->make(true);
    }

    public function add_buyer()
    {
        return view('buyer.add_buyer');
    }

    public function save_buyer(Request $request)
    {
        $buyer = new Buyer();
        $buyer->name = $request->name;
        $buyer->code = $request->code;
        $buyer->season = $request->season;
        $buyer->brand = $request->brand;
        $buyer->activity = $request->activity;
        $buyer->email = $request->email;
        $buyer->address = $request->address;
        $buyer->contact = $request->contact;
        $buyer->save();
        return redirect()->back()->with([
           'message' =>'Buyer Information Added Successfully!',
            'status' => 'success'
        ]);

    }

    public function edit_buyer($id)
    {
        $buyer = Buyer::find($id);
        return view('buyer.edit_buyer', ['buyer' => $buyer]);

    }

    public function update_buyer(Request $request, $id)
    {
        $buyer = Buyer::find($id);
        $buyer->name = $request->name;
        $buyer->code = $request->code;
        $buyer->season = $request->season;
        $buyer->brand = $request->brand;
        $buyer->activity = $request->activity;
        $buyer->email = $request->email;
        $buyer->address = $request->address;
        $buyer->contact = $request->contact;

        $buyer->save();
        return redirect(route('all_buyer'))->with([
            'message' =>'Buyer Information Updated Successfully!',
            'status' => 'success'
        ]);

    }

    public function delete_buyer($id)
    {
        $buyer = Buyer::find($id);
        $buyer->delete();
        Session::put('message', 'Buyer deleted successfully!');
        return redirect(route('all_buyer'));
    }
}


/*
 * <?php

namespace App\Http\Controllers;

use App\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BuyerController extends Controller
{
    private $buyer;
    public function __construct()
    {
        $this->buyer=new Buyer();
    }

    public function add_buyer()
    {
        return view('buyer.add_buyer');
    }

    public function save_buyer(Request $request){

        $this->buyer->buyerID=$request->buyerID;
        $this->buyer->name=$request->name;
        $this->buyer->house=$request->house;
        $this->buyer->address=$request->address;
        $this->buyer->phone=$request->phone;
        $this->buyer->email=$request->email;

            $this->buyer->save();
            Session::put('message','Buyer Information Added Successfully!');
            return redirect(route('add_buyer'));

    }

    public function all_buyer(){
        $this->buyer = Buyer::all();
        return view('buyer.all_buyer',['buyers'=>$this->buyer]);
    }


    public function edit_buyer($id){
        $this->buyer=Buyer::find($id);
        return view('buyer.edit_buyer',['buyer'=>$this->buyer]);

    }

    public function update_buyer(Request $request,$id){
        $this->buyer=Buyer::find($id);
        $this->buyer->buyerID=$request->buyerID;
        $this->buyer->name=$request->name;
        $this->buyer->house=$request->house;
        $this->buyer->address=$request->address;
        $this->buyer->phone=$request->phone;
        $this->buyer->email=$request->email;

        $this->buyer->save();
        Session::put('message','Buyer Information updated Successfully');
        return redirect(route('all_buyer'));

    }

    public function delete_buyer($id){
        $this->buyer = Buyer::find($id);
        $this->buyer->delete();
        Session::put('message','Buyer deleted successfully!');
        return redirect(route('all_buyer'));
    }




}

 */