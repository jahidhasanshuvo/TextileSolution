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
    private $order;

    public function __construct()
    {
        $this->order = new Order();
    }

    public function all_order()
    {
        return view('order.all_order');
    }

    public function ajaxOrder()
    {
        $this->order = Order::all();
        return DataTables::of($this->order)
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
        $this->order = Order::find($id);
        $sizes = Size::all();

        /*        $size_color_usable = [];
                foreach ($this->order->styles as $style) {
                    foreach ($style->size_color as $size_color) {
                        if (array_key_exists($size_color->color_id, $size_color_usable)) {
                            $size_color_usable[$size_color->color_id]['total_qty'] = $size_color_usable[$size_color->color_id]['total_qty'] + $size_color->qty;
                            array_push($size_color_usable[$size_color->color_id]['items'], ['size_id' => $size_color->size_id, 'quantity' => $size_color->qty]);
                        } else {
                            $size_color_usable[$size_color->color_id]['total_qty'] = $size_color->qty;
                            $size_color_usable[$size_color->color_id]['items'] = [['size_id' => $size_color->size_id, 'quantity' => $size_color->qty]];
                        }
                    }
                }*/


        /*        foreach ($this->order->styles as $style) {
                    $re = $style->size_color()
                        ->groupBy('color_id')
                        ->select([
                            DB::raw('sum(qty) as qty'),
                        ])->get();*/

//            dd($re);
//            echo '<pre>';
//            print_r($re);
//            echo '</pre>';
//        }
        //     exit();
        return view('order.order_details', ['order' => $this->order, 'sizes' => $sizes]);
    }

    public function add_order()
    {
        $buyers = Buyer::all()->where('activity', '=', '1');
        return view('order.add_order', ['buyers' => $buyers]);
    }

    public function save_order(Request $request)
    {
        $this->order->program_code = $request->program_code;
        $this->order->buyer_id = $request->buyer_id;
        $this->order->date = $request->date;
        $this->order->save();
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
        $this->order = Buyer::find($id);
        $this->order->program_code = $request->program_code;
        $this->order->buyer_id = $request->buyer_id;
        $this->order->date = $request->date;
        $this->order->save();
        Session::put('message', 'Order Updated Successfully');
        return redirect(route('all_order'));
    }

    public function delete_order($id)
    {
        $this->order = Order::find($id);
        $this->order->delete();
        Session::put('message', 'Order Deleted Successfully');
        return redirect(route('all_order'));
    }
}
