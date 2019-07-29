<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Requests\UserRequest;
use Config;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(Config::get('constants.number_per_page_users'));
        return view('pageUser', ['listUser' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->validated();
        User::create($request->all());
        return redirect('user')->with('message', __('messages.user_create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $urlAvatar = url('/') . Config::get('constants.url_avatar') . $user->avatar;
        return view('infoUser', ['user' => $user, 'urlAvatar' => $urlAvatar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('editUser', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UserRequest $request)
    {
        $path = null;
        $input = $request->except('avatar', '_method', '_token');
        if ($request->hasFile('avatar')) {
            $path = '' . $id . '.' . $request->file('avatar')->getClientOriginalName();
            $request->avatar->storeAs('public/images', $path);
            $input['avatar'] = $path;
        }
        User::where('id', '=', $id)->update($input);
        return redirect('user')->with('message', __('messages.user_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect('user')->with('message', __('messages.user_destroy'));
    }
}
