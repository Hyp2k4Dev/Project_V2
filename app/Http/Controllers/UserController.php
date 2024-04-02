<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Hiển thị danh sách tất cả người dùng.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.editUser', compact('users'));
    }

    /**
     * Hiển thị form tạo người dùng mới.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }



    /**
     * Lưu người dùng mới vào cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'role' => ['required', Rule::in(['user', 'seller', 'admin'])],
        ]);
    }

    /**
     * Hiển thị thông tin chi tiết của một người dùng.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Hiển thị form để chỉnh sửa thông tin của một người dùng.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function userList(Request $request)
    {
        $user = Auth::user();
        $role = $request->input('role');

        $usersQuery = User::query();

        if ($role && $role != 'all-role') {
            $usersQuery->where('role', $role)->where('is_active', 1);
        } elseif ($role == 'all-role') {
            $usersQuery->where('is_active', 1);
        }

        $users = $usersQuery->get();
        return view('admin.userList', compact('users', 'user', 'role'));
    }




    /**
     * Cập nhật thông tin của người dùng trong cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editUser(Request $request, User $user)
    {
        // Validate dữ liệu đầu vào từ form
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => [
        //         'required',
        //         'email',
        //         Rule::unique('users')->ignore($user->id),
        //     ],
        //     'address' => 'nullable|string|max:255',
        //     'phone_number' => 'required|string|max:11',
        //     'role' => ['required', Rule::in(['user', 'seller', 'admin'])],
        //     'is_active' => 'required|boolean', // Thêm điều kiện cho trường is_active
        // ]);

        // Lấy ra dữ liệu từ request và cập nhật vào model User
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->is_active = $request->is_active;

        // Lưu thay đổi vào database
        $updated = $user->save();

        // Kiểm tra xem cập nhật thành công hay không
        if ($updated) {
            // Nếu thành công, đặt thông điệp thành công vào session
            session()->flash('success', 'User information has been successfully updated.');
        } else {
            // Nếu không thành công, đặt thông điệp lỗi vào session
            session()->flash('error', 'The error occurred while updating user information.');
        }

        // Chuyển hướng về trang chi tiết người dùng sau khi cập nhật thành công
        return redirect()->route('admin.userList');
    }


    public function showEditForm(User $user)
    {
        $userlogin = Auth::user();
        $usersall = User::all();
        return view('admin.editUserForm', compact('user', 'userlogin', 'usersall'));
    }


    /**
     * Xóa một người dùng khỏi cơ sở dữ liệu.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser(User $user)
    {
        $user->update(['is_active' => 0]);

        return redirect()->back()->with('success', 'User deactivated successfully.');
    }

    public function main()
    {
        return view('user.main');
    }
}
