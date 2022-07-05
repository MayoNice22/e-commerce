<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $id = Auth::user()->id;
        $this->authorize('administrasi', $id);
        $user = User::where('role', 'Pegawai')->get();
        return view('administrasi.penguasa.index', compact('user'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $id_user = Auth::user()->id;
        $this->authorize('administrasi', $id_user);
        $new_sup = new User();
        $new_sup->name = $request->name;
        $new_sup->email = $request->email;
        $new_sup->password = Hash::make($request->password);
        $new_sup->role = 'Pegawai';
        $check = $new_sup->save();

        if ($check) {
            return redirect('/administrasi')->with('success', 'Employee created successfully!');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit', Auth::user()->id);
        $id_user = decrypt($id);
        $user = User::find($id_user);
        $user->password = Hash::make($request->password);
        $check = $user->save();
        if ($check) {
            return redirect()->back()->with('success', 'Refresh password success!');
        }
    }

    public function destroy($id)
    {
        //
    }

    public function suspendUser($id)
    {
        $id_user = Auth::user()->id;
        $this->authorize('administrasi', $id_user);
        // ban for days
        $ban_for_next_7_days = Carbon::now()->addDays(7);
        // $ban_for_next_14_days = Carbon::now()->addDays(14);
        // $ban_permanently = 0;

        // ban user
        $user = User::find($id);
        $user->banned_till = $ban_for_next_7_days;
        $user->save();

        return redirect('/administrasi')->with('failed', 'Employee '.$user->name.' suspended for 7 days!');
    }
    public function bannedStatus()
    {
        $user_id = 1;
        $user = User::find($user_id);

        $message = "The user is not banned";
        if ($user->banned_till != null) {
            if ($user->banned_till == 0) {
                $message = "Banned Permanently";
            }

            if (now()->lessThan($user->banned_till)) {
                $banned_days = now()->diffInDays($user->banned_till) + 1;
                $message = "Suspended for " . $banned_days . ' ' . Str::plural('day', $banned_days);
            }
        }

        dd($message);
    }

    public function unban($id)
    {
        $id_user = Auth::user()->id;
        $this->authorize('administrasi', $id_user);
        $user = User::find($id);
        $user->banned_till = null;
        $user->save();

        return redirect('/administrasi')->with('success', 'Employee '.$user->name.' has been unbanned!');
    }

    public function editForm(Request $request){
        $id_user = Auth::user()->id;
        $this->authorize('administrasi', $id_user);
        $data = $request->get('id');
        $user = User::find($data);
        return response()->json(array(
            'msg' => view('administrasi.penguasa.edit', compact('user'))->render()
        ), 200);
    }
}
