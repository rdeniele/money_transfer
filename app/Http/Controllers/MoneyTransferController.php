<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator; // For validation
use Illuminate\Support\Facades\Hash; // For password hashing
use Illuminate\Support\Facades\Config; // For configuration values

class MoneyTransferController extends Controller
{
    public function index(Request $req)
    {
        $user = User::all();
        return view('UserManagement.users')->with("users", $user);
    }

    public function add(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email' => 'required|email|unique:users', // Unique email validation
            'password' => 'required|min:6',
            // Add validation rules for other fields (birthdate, address, etc.)
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = new User;
        $user->first_name = $req->first_name;
        $user->middle_name = $req->middle_name;
        $user->last_name = $req->last_name;
        $user->birthdate = $req->birthdate;
        $user->full_address = $req->full_address;
        $user->branch_assigned = $req->branch_assigned;
        $user->user_type_id = $req->user_type_id;
        $user->email = $req->email;
        $user->password = Hash::make($req->password); 

        $user->save();
        return redirect()->back()->with('message', 'User added successfully!'); // Flash message
    }

    public function delete(Request $req)
    {
        $user = User::find($req->id);
        $user->delete();
        return redirect()->back();
    }

    public function edit(Request $req)
    {
        $user = User::find($req->id);
        return view('edit')->with("contact", $user);
    }

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email' => 'required|email|unique:users,email,' . $req->id, // Unique validation excluding current user
            'password' => 'nullable|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::find($req->id);
        $user->update([
            'first_name' => $req->first_name,
            'middle_name' => $req->middle_name,
            'last_name' => $req->last_name,
            'birthdate' => $req->birthdate,
            'full_address' => $req->full_address,
            'branch_assigned' => $req->branch_assigned,
            'user_type_id' => $req->user_type_id,
            'email' => $req->email,
            'password' => $req->password ? Hash::make($req->password) : $user->password, // Update password only if provided
        ]);

        return redirect()->back()->with('message', 'User updated successfully!'); // Flash message
    }
}
