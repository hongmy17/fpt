<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);

        $arr = [
            'success' => true,
            'message' => 'Danh sách nguoi dung',
            'data' => $users,
        ];

        return response()->json($arr, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'avatar' => 'nullable|string',
            'is_admin' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi kiểm tra dữ liệu',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();
        $user = User::create($data);

        return response()->json([
            'success' => true,
            'message' => 'User đã được tạo thành công',
            'data' => $user,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => "User với id $id không tồn tại",
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => "Thông tin user",
            'data' => $user,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => "User với id $id không tồn tại",
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string|min:6',
            'avatar' => 'nullable|string',
            'is_admin' => 'nullable|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        if (isset($data['name'])) {
            $user->name = $data['name'];
        }
        if (isset($data['email'])) {
            $user->email = $data['email'];
        }
        if (isset($data['password']) && $data['password']) {
            $user->password = $data['password']; 
        }
        if (isset($data['avatar'])) {
            $user->avatar = $data['avatar'];
        }
        if (isset($data['is_admin'])) {
            $user->is_admin = $data['is_admin'];
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User đã được cập nhật thành công',
            'data' => $user,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => "User với id $id không tồn tại",
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User đã được xóa thành công',
        ], 200);
    }
}
