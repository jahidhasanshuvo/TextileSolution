<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('users.index',['users'=>$user]);
    }

    public function edit($id)
    {
        try {
            $user = User::find($id);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return view('users.edit', ['user' => $user]);

    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->role = $request->role;
            $user->approved = $request->approved?1:0;

            $user->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                'status' => 'danger'
            ]);
        }
        return redirect(route('users.index'))->with([
            'message' => 'User Information Updated Successfully!',
            'status' => 'success'
        ]);

    }

}
