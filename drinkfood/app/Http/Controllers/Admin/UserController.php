<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserManageRequest;
use Illuminate\Support\Str;
use App\LibraryStrings\Strings;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UploadFileService;
use App\Services\ResetPasswordService;
use Illuminate\Support\Facades\Auth;

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
        $user = $this->findUser($uid);
        $users = $user->get();
        return view('admin.pages.users.user_detail', ['users'=>$users]);

    }

    public function edit($uidUser)
    {
        $user = $this->findUser($uidUser);
        $users = $user->get();
        return view('admin.pages.users.user_edit', ['users'=>$users]);
    }

    public function update(UpdateUserRequest $request, UploadFileService $uploadFileService, $uidUser)
    {
        $user = $this->findUser($uidUser);

        $infoUpdate = $request->except('_method', '_token');
        $infoUpdate['url_key'] = Str::slug($request->fullname);       
        if($request->hasFile('image'))
        {
            $pathSaveFile = public_path('/uploads/images/users');
            $infoUpdate['image'] = $uploadFileService->UploadImage($request, $request->file('image'), $pathSaveFile);
        }
        $updateUser = $user->update($infoUpdate);
        if($updateUser == true) return redirect()->route('user.index')->with('update_success', __('user_lang.update_success'));
        else return redirect()->route('user.index')->with('update_error', __('user_lang.update_error'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blockUser($uid)
    {   
        /* Check if info of current user not admin then block */
        $typeUser = User::where('uid', Auth::user()->uid)->value('type');
        if($typeUser == 1)
        {   
            $user = $this->findUser($uid);
            $user->status = 2;
            $blockUser = $user->save();
            if($blockUser == true) return redirect()->back()->with('block_success', __('user_lang.block_success'));
            else return redirect()->back()->with('block_error', __('user_lang.block_error'));
        }else{
            return redirect()->route('user.index')->with('block_error', __('user_lang.not_block_user'));
        }
        
    }

    public function unBlockUser($uid)
    {
        $user = $this->findUser($uid);
        $user->status = 1;
        $unblockUser = $user->save();
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

    public function resetPassword(Request $request, ResetPasswordService $resetPasswordService)
    {
        $resetPassword = $resetPasswordService->resetPassword($request, $request->route('email'));

        if($resetPassword['status'] == true)
        {
            return redirect()->back()->with('reset_pass_success', __('message.reset_pass_success'));
            
        }

        if($resetPassword['status'] == false && $resetPassword['msg'] == 'err_check_mail')
        {
            return redirect()->back()->with('err_check_mail', __('message.err_check_mail'));
        }       

        if($resetPassword['status'] == false && $resetPassword['msg'] == 'send_mail_error')
        {
            return redirect()->back()->with('send_mail_error', __('message.send_mail_error'));
        } 

    }

    private function findUser($uidUser)
    {
        /* Select id user from uid */
        $idUser = User::where('uid', $uidUser)->value('id');
        $user = User::find($idUser);
        if($user == null)
        {
            return abort(redirect()->route('user.index'));
        }
        else return $user;
    }
}
