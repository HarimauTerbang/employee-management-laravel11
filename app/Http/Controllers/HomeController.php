<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        return view('home');
    }

    public function adminHome(): View
    {
        return view('adminHome');
    }

    public function listUsers()
    {
        $users = User::paginate(9);
        return view('adminusers', compact('users'));
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('admin.users')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('admin.users')->with('error', 'User not found');
        }
    }

    public function createUserForm()
    {
        return view('admincreate_user');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'type' => 'required|integer|max:1',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User created successfully');
    }

    public function editUserForm($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('adminedit_user', compact('user'));
        } else {
            return redirect()->route('admin.users')->with('error', 'User not found');
        }
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
            'type' => 'required|integer|max:1',
        ]);

        $user = User::find($id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->type = $request->type;
            $user->save();

            return redirect()->route('admin.users')->with('success', 'User updated successfully');
        } else {
            return redirect()->route('admin.users')->with('error', 'User not found');
        }
    }

    public function showUser($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('adminshow_user', compact('user'));
        } else {
            return redirect()->route('admin.users')->with('error', 'User not found');
        }
    }
}
