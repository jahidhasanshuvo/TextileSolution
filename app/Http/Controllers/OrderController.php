<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Order;
use App\Size;
use App\SizeColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
//    private $order;

    public function __construct()
    {
//        $this->order = new Order();
    }

    public function all_order()
    {
        return view('order.all_order');
    }

    public function ajaxOrder()
    {
        $order = Order::all();
        return DataTables::of($order)
            ->editColumn('buyer_id', function ($order) {
                return $order->buyer->name;
            })
            ->addColumn('action', function ($order) {
                return $order->id;
            })
            ->make(true);
    }

    public function order_details($id)
    {
        try {
            $order = Order::where('id', $id)->with('styles.color_styles.sizes')->first();
        } catch (\SQLiteException $exception) {

        } catch (\RuntimeException $exception) {

        } catch (\Exception $exception) {

        }
        return view('order.order_details', ['order' => $order, 'sizes' => Size::all()]);
    }

    public function add_order()
    {
        $buyers = Buyer::all()->where('activity', '=', '1');
        return view('order.add_order', ['buyers' => $buyers]);
    }

    public function save_order(Request $request)
    {
        $order = new Order();
        $order->program_code = $request->program_code;
        $order->buyer_id = $request->buyer_id;
        $order->date = $request->date;
        $order->save();
        Session::put('message', 'Order Saved Successfully');
        return redirect(route('add_order'));
    }

    public function edit_order($id)
    {
        $order = Order::find($id);
        $buyers = Buyer::all();
        return view('order.edit_order', ['order' => $order, 'buyers' => $buyers]);
    }

    public function update_order(Request $request, $id)
    {
        $order = Order::find($id);
        $order->program_code = $request->program_code;
        $order->buyer_id = $request->buyer_id;
        $order->date = $request->date;
        $order->save();
        return redirect(route('all_order'))->with([
            'message' => 'Order Updated Successfully',
            'status' => 'success'
        ]);
    }

    public function delete_order($id)
    {
        $order = Order::find($id);
        $order->delete();
        Session::put('message', 'Order Deleted Successfully');
        return redirect(route('all_order'));
    }
}
