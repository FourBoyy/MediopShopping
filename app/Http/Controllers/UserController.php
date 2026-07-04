<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\CloudinaryService;

class UserController extends Controller
{
    public function userList()
    {
        $users =   User::paginate(10);
        return view('admin.user.user-list', compact('users'));
    }

    public function userAdd()
    {
        $roles = Role::all();
        return view('admin.user.user-add', compact('roles'));
    }

    protected function userDetail($id)
    {
   
        $user = User::find($id);
        return view('admin.user.user-detail', compact('user'));
    }


    public function userEdit($id) {
        $user = User::find($id); 
        return view('admin.user.user-edit', compact('user')); 
    }
    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|max:40',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'avatar'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['username', 'email', 'phonenumber', 'roleId']);
        $data['password'] = Hash::make($request->password);

        // Gọi hàm storeAvatar nếu có file
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $this->storeAvatar($request->file('avatar'));
        }

        User::create($data);

        return redirect()->back()->with('success', 'Thêm người dùng thành công!');
    }

    protected function storeAvatar($file)
    {
        if (!env('CLOUDINARY_CLOUD_NAME')) {
            dd('Check your .env: CLOUDINARY_CLOUD_NAME is empty!');
        }
        // Dùng cách này để đảm bảo configuration được load đúng
        \Cloudinary\Configuration\Configuration::instance([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => ['secure' => true]
        ]);

        // Gọi trực tiếp UploadApi mà không cần tạo object $cloudinary
        $result = (new \Cloudinary\Api\Upload\UploadApi())->upload($file->getRealPath());

        return $result['secure_url'];
    }
}
