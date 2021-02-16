<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $this->middleware('auth');
            $datas = User::paginate(5);
            return view('user.index', compact('datas'));
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('user.create');
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $unset              = array('password_confirmation');
        $fields             = $request->all();
        $fields['password'] = bcrypt($request->password);
        $fields['phone']    = serialize($fields['phone']);
        $fields['address']  = serialize($fields['address']);
        $data               = array_diff_key($fields, array_flip($unset));
        User::create($data);
        return response()->json([
            'success' => true,
            'message' => 'record updated',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $users = User::where('status', '<>', 0)->where('id', $id)->first();
            if ($users) {
                $obj            = User::findOrFail($id);
                $data['method'] = 'PUT';
                $data['url']    = 'user.update';
                $data['obj']    = $obj;
                return view('auth.register', $data);
            } else {
                return redirect()->route('user.index');
            }
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user   = User::findOrFail($id);
        $fields = $request->all();
        if (trim($request->password) == '') {
            $fields = $request->all();
            $fields = $request->except('password');
        } else {
            $fields             = $request->all();
            $fields['password'] = bcrypt($request->password);
        }
        $fields['phone']   = serialize($fields['phone']);
        $fields['address'] = serialize($fields['address']);
        $user->update($fields);

        return response()->json([
            'success' => true,
            'message' => 'record updated',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function remove($id, $status)
    {
        if (Auth::check()) {
            User::where('id', $id)->update(['status' => $status]);
            return redirect()->route('user.index');
        } else {
            return redirect()->route('login');
        }
    }
}
