<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index() {
        $users = User::orderByRaw('id')->paginate(5);
        return view("admin.user.index", [
            "users" => $users
        ]);
    }

    public function showAddForm() {
        return view("admin.user.add-form");
    }

    public function store(UserRequest $request) {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->avatar = 'person_1.jpg';
        $user->password = Hash::make($request->input('password'));
        $user->is_admin = 0;
        $user->save();
        
        return 
            redirect()
                ->route("admin.user.index")
                ->with('success', 'Thêm người dùng thành công!');;
    }

    public function showInfo($id) {
        $user = User::where('id', $id)->first();
        return view("admin.user.info", [
            "user" => $user
        ]);
    }

    public function showEditForm($id) {
        $user = User::where('id', $id)->first();
        return view("admin.user.edit-form", [
            "user" => $user
        ]);
    }

    public function update(UserRequest $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->avatar = 'person_1.jpg';
        $user->password = Hash::make($request->input('password'));
        $user->is_admin = 0;
        $user->save();

        return 
            redirect()
                ->route('admin.user.index')
                ->with('success', 'Cập nhật người dùng thành công!');
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Xoá người dùng thành công!');
    }
}
