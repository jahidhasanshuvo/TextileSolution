<?php

namespace App\Http\Controllers;

use App\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class BuyerController extends Controller
{
//    private $buyers;

      public function index()
      {
          $buyer= Buyer::all();
          return view('buyers.index',['buyers'=>$buyer]);
      }
//    public function __construct()
//    {
////        $this->buyers = new Buyer();
//    }
//
//    public function all_buyer()
//    {
//        return view('buyers.all_buyer');
//    }

//    public function ajax_buyer()
//    {
//        $buyer = Buyer::all();
//        return DataTables::of($buyer)->addColumn('action', function ($buyer) {
//            return $buyer->id;
//        })->make(true);
//    }

    public function create()
    {
        return view('buyers.create');
    }

//    public function add_buyer()
//    {
//        return view('buyers.add_buyer');
//    }

    public function store(Request $request)
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

    public function edit($id)
    {
        $buyer = Buyer::find($id);
        return view('buyers.edit', ['buyer' => $buyer]);

    }

    public function update(Request $request, $id)
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
        return redirect(route('buyers.index'))->with([
            'message' =>'Buyer Information Updated Successfully!',
            'status' => 'success'
        ]);

    }

    public function destroy($id)
    {
        $buyer = Buyer::find($id);
        $buyer->delete();
        Session::put('message', 'Buyer deleted successfully!');
        return redirect(route('buyers.index'))->with([
            'status' => 'success']);
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
    private $buyers;
    public function __construct()
    {
        $this->buyers=new Buyer();
    }

    public function add_buyer()
    {
        return view('buyers.add_buyer');
    }

    public function save_buyer(Request $request){

        $this->buyers->buyerID=$request->buyerID;
        $this->buyers->name=$request->name;
        $this->buyers->house=$request->house;
        $this->buyers->address=$request->address;
        $this->buyers->phone=$request->phone;
        $this->buyers->email=$request->email;

            $this->buyers->save();
            Session::put('message','Buyer Information Added Successfully!');
            return redirect(route('add_buyer'));

    }

    public function all_buyer(){
        $this->buyers = Buyer::all();
        return view('buyers.all_buyer',['buyers'=>$this->buyers]);
    }


    public function edit_buyer($id){
        $this->buyers=Buyer::find($id);
        return view('buyers.edit_buyer',['buyers'=>$this->buyers]);

    }

    public function update_buyer(Request $request,$id){
        $this->buyers=Buyer::find($id);
        $this->buyers->buyerID=$request->buyerID;
        $this->buyers->name=$request->name;
        $this->buyers->house=$request->house;
        $this->buyers->address=$request->address;
        $this->buyers->phone=$request->phone;
        $this->buyers->email=$request->email;

        $this->buyers->save();
        Session::put('message','Buyer Information updated Successfully');
        return redirect(route('all_buyer'));

    }

    public function delete_buyer($id){
        $this->buyers = Buyer::find($id);
        $this->buyers->delete();
        Session::put('message','Buyer deleted successfully!');
        return redirect(route('all_buyer'));
    }




}

 */