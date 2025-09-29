<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->remember_token = Str::random(10);
        $user->email_verified_at = Carbon::now();
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

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
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
