<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branch_profile;
use Illuminate\Support\Facades\DB;

class BranchManagementController extends Controller
{
    public function index(Request $request)
    {
      $branchProfile = branch_profile::all();
      return view('BranchManagement.branch')->with("branch", $branchProfile);
    }
  
    public function store(Request $request)
    {
     
      $branchProfile = new branch_profile;
      $branchProfile->branch_name = $request->branch_name;
      $branchProfile->branch_code = $request->branch_code;
      $branchProfile->country_iso_code = $request->country_iso_code;
  
      $branchProfile->save();
      return redirect()->back()->with('message', 'Branch added successfully!'); // Flash message
    }

    public function delete(Request $request)
    {
      $branchProfile = branch_profile::find($request->id);
      $branchProfile->delete();
      return redirect()->back();
    }
    public function edit(Request $request)
    {
      $branchProfile = branch_profile::find($request->id);
      return view('BranchManagement.edit', compact('branch'));
    }
  
    public function update(Request $request, branch_profile $branchProfile)
    {
      // $user = User::find($request->id);
      $branchProfile->update([
        
        'branch_name' => $request->branch_name,
        'branch_code' =>$request->branch_code,
        'country_iso_code' => $request->country_iso_code,
      ]);
  
      return redirect()->back()->with('message', 'Branch updated successfully!');
    }
}
