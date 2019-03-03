<?php
/**
 * @author: TruongTC
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\AddUserRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * @desc: Show all  user and show control function
     */
    public function index()
    {
        $users = User::get();
        return view('admin.user.list_user')->with('users', $users);
    }

    /**
     * @desc: Delete User By ID
     * @param: $id from router
     */
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('message', 'Bạn đã xóa thành công');
    }

    /**
     * @desc: View info user by id
     * @param: $id
     */
    public function getUserByID($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit_user')->with('user', $user);
    }

    /**
     * @desc: Execute edit user
     * @param: $id, $request
     */
    public function editUserByID(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        if ($request->txtPass2 != "")
        {
            $user->password = Hash::make($request->txtPass2);
        }
        $user->save();

        return back()->withInput()->with('success','Sửa thành công!');
    }

    /**
     * @desc: Thêm thành viên
     * @param: AddUserRequest $request
     */
    public function addUser(AddUserRequest $request)
    {
        $user = new User;
        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        $user->password = Hash::make($request->txtPass2);
        $user->save();

        return redirect('admin/users.tct')->with('add-success', 'Thêm thành công');    
    }
}
