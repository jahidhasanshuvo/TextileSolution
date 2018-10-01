<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
{
//    private $color;

    public function __construct()
    {
//        $this->color = new Color();
    }

    public function all_color()
    {
        $color = Color::all();
        return view('color.all_color', ['colors' => $color]);
    }

    public function add_color()
    {
        return view('color.add_color');
    }

    public function save_color(Request $request)
    {
        $color =new Color();
        $color->name = $request->name;
        $color->var = $request->var;
        $color->description = $request->description;
        $color->save();
        Session::put('message', 'Color Added');
        return redirect(route('add_color'));
    }

    public function edit_color($id)
    {
        $color = Color::find($id);
        return view('color.edit_color', ['color' => $color]);
    }

    public function update_color(Request $request,$id)
    {
        $color = Color::find($id);
        $color->name = $request->name;
        $color->var = $request->var;
        $color->description = $request->description;
        $color->save();
        Session::put('message','Color Updated Successfully');
        return redirect(route('all_color'));
    }

    public function delete_color($id){
        $color = Color::find($id);
        $color->delete();
        Session::put('message','Color deleted successfully');
        return redirect(route('all_color'));
    }
}
