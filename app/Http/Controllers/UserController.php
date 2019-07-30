<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Config;
use Illuminate\Support\Facades\Storage;

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
        $list_users = ['list_users' => $users];
        return view('index', $list_users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $path = null;
        $input = $request->except('avatar', '_method', '_token');
        if ($request->hasFile('avatar')) {
            $path = $request->avatar->store('images', ['disk' => 'public']);
            $input['avatar'] = $path;
        }
        User::create($input);
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
        $user = User::findOrFail($id);
        $url_avatar = url('/') .Storage::url(''.$user->avatar);
        return view('show', ['user' => $user, 'url_avatar' => $url_avatar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', ['user' => $user]);
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
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')) {
            Storage::disk('public')->delete('/' . $user->avatar);
            $path = $request->avatar->store('images', ['disk' => 'public']);
            $input['avatar'] = $path;
        }
        $user->update($input);
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
        User::findOrFail($id)->delete();
        return redirect('user')->with('message', __('messages.user_destroy'));
    }
}
