<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('suppliers.index')
            ->with(['suppliers' => Supplier::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = new Supplier();
//        $supplier = Supplier::create([
//            'name' =>  $request->name,
//        ]);
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->mobile = $request->mobile;
        $supplier->activity = $request->activity?1:0;
        $supplier->save();
        return redirect()->back()
            ->with([
                'message' => 'Suppliers Added Successfully'
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
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.edit')
            ->with(['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->mobile = $request->mobile;
        $supplier->save();
        return redirect(route('suppliers.index'))
            ->with([
                'message' => 'Suppliers Updated Successfully'
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
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->back()
            ->with([
                'message' => 'Suppliers Deleted Successfully'
            ]);
    }
    public function active_supplier($id)
    {
        $supplier = Supplier::find($id);
        $supplier->activity = 1;
        $supplier->save();
        return redirect()->back()
            ->with([
                'message' => 'Suppliers Activated Successfully'
            ]);
    }
    public function inactive_supplier($id)
    {
        $supplier = Supplier::find($id);
        $supplier->activity = 0;
        $supplier->save();
        return redirect()->back()
            ->with([
                'message' => 'Suppliers Inactivated Successfully'
            ]);
    }

}
