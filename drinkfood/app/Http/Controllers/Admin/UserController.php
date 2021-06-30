<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserManageRequest;
use Illuminate\Support\Str;
use App\LibraryStrings\Strings;

class UserController extends Controller
{
    public function __construct()
    {
        $this->strings = new Strings;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $condition = $this->createCondition($request); 
        $users = User::orderBy('status', 'ASC')->where($condition)->get();
        return view('admin.pages.users.user', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.user_add'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserManageRequest $request)
    {
        $users = $request->except('_token');
        $users['password'] = bcrypt($request->password);
        $users['uid'] = $this->strings->rand_string();
        $users['url_key'] = Str::slug($request->fullname);

        $saveUser = User::create($users);
        if($saveUser) return redirect()->route('user.index')->with('save_user_success', __('user_lang.save_user_success'));
        else return redirect()->back()->with('save_user_error', __('user_lang.save_user_error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        $users = User::where('uid', $uid)->get();
        return view('admin.pages.users.user_detail', ['users'=>$users]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blockUser($uid)
    {
        $user['status'] = 2;
        $blockUser = User::where('uid', $uid)->update($user);
        if($blockUser == true) return redirect()->back()->with('block_success', __('user_lang.block_success'));
        else return redirect()->back()->with('block_error', __('user_lang.block_error'));
    }

    public function unBlockUser($uid)
    {
        $user['status'] = 1;
        $unblockUser = User::where('uid', $uid)->update($user);
        if($unblockUser == true) return redirect()->back()->with('unblock_success', __('user_lang.unblock_success'));
        else return redirect()->back()->with('unblock_error', __('user_lang.unblock_error'));
    }

    private function createCondition($request)
    {
        $condition = [];
        if($request->searchtype == 0 && $request->filled('content')) array_push($condition, ['fullname', 'LIKE', '%'.$request->content.'%']);
        if($request->searchtype == 1 && $request->filled('content')) array_push($condition, ['username', 'LIKE', '%'.$request->content.'%']);
        if($request->type == '0' || $request->type == 1 || $request->type == 2) array_push($condition, ['type', '=', $request->type]);
        if($request->status == 1 || $request->status == 2) array_push($condition, ['status', '=', $request->status]);
        return $condition;
    }
}
