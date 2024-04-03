<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

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
        $status = $request->input('status', 'all');

        if ($status == 'activated') {
            $users = User::where('is_active', 1)->get();
        } elseif ($status == 'not_activated') {
            $users = User::where('is_active', 0)->get();
        } else {
            $users = User::all();
        }

        return view('admin.userList', compact('users', 'status'));
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
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'address' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:11',
            'role' => ['required', Rule::in(['user', 'seller', 'admin'])],
        ]);

        // Cập nhật dữ liệu người dùng
        $updated = $user->update($request->all());
        if ($updated) {
            // Nếu thành công, đặt thông điệp thành công vào session
            session()->flash('success', 'Thông tin người dùng đã được cập nhật thành công.');
        } else {
            // Nếu không thành công, đặt thông điệp lỗi vào session
            session()->flash('error', 'Đã xảy ra lỗi khi cập nhật thông tin người dùng.');
        }
        // Chuyển hướng về trang chi tiết người dùng sau khi cập nhật thành công
        return redirect()->route('admin.editUser', $user->id)->with('success', 'Thông tin người dùng đã được cập nhật thành công.');
    }

    public function showEditForm(User $user)
    {
        return view('admin.editUserForm', compact('user'));
    }


    /**
     * Xóa một người dùng khỏi cơ sở dữ liệu.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function main()
    {
        return view('user.main');
    }
}
