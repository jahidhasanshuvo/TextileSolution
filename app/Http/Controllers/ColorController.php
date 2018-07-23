<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
{
    private $color;

    public function __construct()
    {
        $this->color = new Color();
    }

    public function all_color()
    {
        $this->color = Color::all();
        return view('color.all_color', ['colors' => $this->color]);
    }

    public function add_color()
    {
        return view('color.add_color');
    }

    public function save_color(Request $request)
    {
        $this->color->name = $request->name;
        $this->color->var = $request->var;
        $this->color->description = $request->description;
        $this->color->save();
        Session::put('message', 'Color Added');
        return redirect(route('add_color'));
    }

    public function edit_color($id)
    {
        $this->color = Color::find($id);
        return view('color.edit_color', ['color' => $this->color]);
    }

    public function update_color(Request $request,$id)
    {
        $this->color = Color::find($id);
        $this->color->name = $request->name;
        $this->color->var = $request->var;
        $this->color->description = $request->description;
        $this->color->save();
        Session::put('message','Color Updated Successfully');
        return redirect(route('all_color'));
    }

    public function delete_color($id){
        $this->color = Color::find($id);
        $this->color->delete();
        Session::put('message','Color deleted successfully');
        return redirect(route('all_color'));
    }
}
