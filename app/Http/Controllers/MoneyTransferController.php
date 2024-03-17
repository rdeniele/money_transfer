<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator; // For validation
use Illuminate\Support\Facades\Hash; // For password hashing
use Illuminate\Support\Facades\Config; // For configuration values

class MoneyTransferController extends Controller
{
  public function index(Request $request)
  {
    $user = User::all();
    return view('UserManagement.users')->with("users", $user);
  }

  public function add(Request $request)
  {
    $validator = Validator::make($request->all(), [
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
    $user->first_name = $request->first_name;
    $user->middle_name = $request->middle_name;
    $user->last_name = $request->last_name;
    $user->birthdate = $request->birthdate;
    $user->full_address = $request->full_address;
    $user->branch_assigned = $request->branch_assigned;
    $user->user_type_id = $request->user_type_id;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    $user->save();
    return redirect()->back()->with('message', 'User added successfully!'); // Flash message
  }

  public function delete(Request $request)
  {
    $user = User::find($request->id);
    $user->delete();
    return redirect()->back();
  }

  public function edit(Request $request)
  {
    $user = User::find($request->id);
    return view('UserManagement.user_edit', compact('user'));
  }

  public function update(Request $request, User $user)
  {
    $user = User::find($request->id);

    $user->update([
      'first_name' => $request->first_name,
      'middle_name' =>$request->middle_name,
      'last_name' => $request->last_name,
      'birthdate' => $request->birthdate,
      'full_address' => $request->full_address,
      'branch_assigned' => $request->branch_assigned,
      'user_type_id' => $request->user_type_id,
      'email' => $request->email,
      'password' => $request->password ? Hash::make($request->password) : $user->password,
    ]);

    return redirect()->back()->with('message', 'User updated successfully!');
  }
}
