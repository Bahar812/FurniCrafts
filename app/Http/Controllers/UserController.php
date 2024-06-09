<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loadAllUsers(){
        $all_users = User::orderBy('created_at', 'desc')->get();
        // dd($all_users);
        return view('admin.pageUser', compact('all_users'));
    }

    public function loadAddUser(){
        return view('admin.addUser');
    }
    public function addUser(Request $request){
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
            );

            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'role' => $request->input('role'),
            ];

            User::create($data);
            return redirect('/users')->with('success', 'Berhasil Simpan');
    }

    public function loadEditForm($uuid){
        $user = User::find($uuid);

        return view('admin.editUser', compact('user'));
    }

    public function EditUser(Request $request){
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]
            );

            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
            ];

            User::where('uuid',$request->user_id)->update($data);
            return redirect('/users')->with('success', 'Berhasil di Update');
    }

    public function deleteUser($uuid){
        try {
            // Debugging
            // dd($uuid); // Uncomment this line to debug the value of $uuid

            // Validate if the UUID is correct
            if (User::where('uuid', $uuid)->exists()) {
                User::where('uuid', $uuid)->delete();
                return redirect('/users')->with('success', 'Sukses Menghapus User');
            } else {
                return redirect('/users')->with('fail', 'User not found');
            }
        } catch (\Exception $e) {
            return redirect('/users')->with('fail', $e->getMessage());
        }
    }

}
