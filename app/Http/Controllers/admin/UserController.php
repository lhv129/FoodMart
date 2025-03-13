<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('users.*')
            ->where('role_id', 3)
            ->where('deleted_at', null)
            ->paginate(10);
        return view('admin/users/index', compact('users'));
    }

    public function indexStaff()
    {
        $users = User::select('users.*','roles.name AS role_name')
            ->join('roles','roles.id','role_id')
            ->whereIn('role_id', [1, 2])
            ->where('users.deleted_at', null)
            ->paginate(10);
        return view('admin/users/indexStaff', compact('users'));
    }

    public function detail($id)
    {
        $user = User::where('id', $id)
            ->where('deleted_at', null)
            ->first();
        if ($user) {
            return view('admin/users/detail', compact('user'));
        }
        toast('Người dùng này không tồn tại', 'error');
        return back();
    }

    public function detailStaff($id)
    {
        $user = User::where('id', $id)
            ->where('deleted_at', null)
            ->first();
        if ($user) {
            return view('admin/users/detailStaff', compact('user'));
        }
        toast('Người dùng này không tồn tại', 'error');
        return back();
    }

    public function updateStatus(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'status' => $request->status
        ]);
        $user->save();
        toast('Cập nhật thành công', 'success');
        return back();
    }

    public function updateRole(Request $request,$id){
        $user = User::find($id);
        $user->update([
            'role_id' => $request->role_id
        ]);
        $user->save();
        toast('Cập nhật thành công', 'success');
        return back();
    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        toast('Xóa người dùng này thành công', 'success');
        return back();
    }
}
