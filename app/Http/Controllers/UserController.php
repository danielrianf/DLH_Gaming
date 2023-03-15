<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if(!empty($search)){
            $dataUser = User::sortable()
            ->orWhere('users.name','like','%'.$search.'%')
            ->orWhere('users.email','like','%'.$search.'%')
            ->orWhere('users.role','like','%'.$search.'%')
            ->paginate(4)->onEachSide(1)->fragment('user');
        }else{
            $dataUser = User::sortable()->paginate(4)->onEachSide(1)->fragment('user');
        }

        return View('user.user')->with([
            'users' => $dataUser,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/user.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);


        return redirect('/user')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::find($user);
        return view('/user.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
        public function edit(User $user)
    {
        $user = User::find($user);
        return view('/user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required'
        ]);

        $user->name = $request->name;
        $user->role = $request->role;
        if ($request->password != null) {
            $user->password = $request->password;
        }
        $user->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect('/user')
            ->with('success', 'User Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/user')->with('success', 'User Berhasil Dihapus');
    }
}
