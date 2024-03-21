<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branch_profile;
use Illuminate\Support\Facades\DB;

class BranchManagementController extends Controller
{
    public function index(Request $request)
    {
      $branch_profile = branch_profile::all();
      return view('BranchManagement.branch')->with("branch", $branch_profile);
    }
  
    public function store(Request $request)
    {
     
      $branch_profile = new branch_profile;
      $branch_profile->branch_name = $request->branch_name;
      $branch_profile->branch_code = $request->branch_code;
      $branch_profile->country_iso_code = $request->country_iso_code;
  
      $branch_profile->save();
      return redirect()->back()->with('message', 'Branch added successfully!'); // Flash message
    }

    public function delete(Request $request)
    {
      $branch_profile = branch_profile::find($request->id);
      $branch_profile->delete();
      return redirect()->back();
    }
    public function edit(Request $request)
    {
      $branch_profile = branch_profile::find($request->id);
      return view('BranchManagement.edit', compact('branch'));
    }
  
    public function update(Request $request, branch_profile $branch_profile)
    {
      // $user = User::find($request->id);
      $branch_profile->update([
        
        'branch_name' => $request->branch_name,
        'branch_code' =>$request->branch_code,
        'country_iso_code' => $request->country_iso_code,
      ]);
  
      return redirect()->back()->with('message', 'Branch updated successfully!');
    }
}
