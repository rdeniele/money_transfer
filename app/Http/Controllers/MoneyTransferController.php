<?php

namespace App\Http\Controllers;

use App\Models\transactions;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator; // For validation
use Illuminate\Support\Facades\Hash; // For password hashing
use Illuminate\Support\Facades\Config; // For configuration values

class MoneyTransferController extends Controller
{
    public function index(Request $request)
    {
      // $moneyTransfer = transactions::find($request->id);
      $moneyTransfer = transactions::all(); 
      return view('MoneyTransfer.transfer')->with("transactions", $moneyTransfer);
    }
    public function store(Request $request)
    {
      
      $validator = Validator::make($request->all(), [
        'reference_number' => 'required',
       
        'datetime_transaction' => 'required',
        
    ]);
    

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }
      $moneyTransfer = new transactions;
      $moneyTransfer->reference_number = $request->reference_number;
      $moneyTransfer->sender_name = $request->sender_name;
      $moneyTransfer->sender_contact = $request->sender_contact;
      $moneyTransfer->receiver_name = $request->receiver_name;
      $moneyTransfer->receiver_contact = $request->receiver_contact;
      $moneyTransfer->transaction_type = $request->transaction_type;
      $moneyTransfer->amount = $request->amount;
      $moneyTransfer->conversion_rate = $request->conversion_rate;
      $moneyTransfer->amount_converted = $request->amount_converted;
      $moneyTransfer->transaction_status = $request->transaction_status;
      $moneyTransfer->branch_sent = $request->branch_sent;
      $moneyTransfer->branch_received = $request->branch_received;
      $moneyTransfer->transfer_fee_id	 = $request->transfer_fee_id;
      $moneyTransfer->datetime_transaction= $request->datetime_transaction;
  
      $moneyTransfer->save();
      return redirect()->back()->with('message', 'Branch added successfully!'); // Flash message
    }
    public function delete(Request $request)
    {
      $moneyTransfer = transactions::find($request->id);
      $moneyTransfer->delete();
      return redirect()->back();
    }
    // public function edit(Request $request)
    // {
    //   $moneyTransfer = transactions::find($request->id);
    //   $transactions = transactions::all();
    //   return view('MoneyTransfer.edit', compact('transactions'));
    // }
    public function edit(Request $request)
{
  $transactions = transactions::find($request->id); // Use Transaction (assuming your model name)

  if (!$transactions) {
    // Handle case where transaction not found (optional)
    return abort(404); // Redirect to a 404 page (optional)
  }

  return view('MoneyTransfer.edit', compact('transactions'));
}
    public function update(Request $request, transactions $moneyTransfer)
    {
      // $user = User::find($request->id);
      $moneyTransfer->update([
        
        'reference_number' => $request->reference_number,
        'sender_name' =>$request->sender_name,
        'sender_contact' => $request->sender_contact,
        'recipient_name' => $request->recipient_name,
        'recipient_contact' => $request->recipient_contact	,
        'transaction_type' => $request->transaction_type	,
        'amount' => $request->amount	,
        'conversion_rate' => $request->conversion_rate	,
        'amount_converted' => $request->amount_converted	,
        'transaction_status' => $request->transaction_status	,
        'branch_sent' => $request->branch_sent	,
        'branch_received' => $request->branch_received	,
        'transfer_fee_id' => $request->transfer_fee_id	,
        'datetime_transaction' => $request->datetime_transaction	,
      ]);
  
      return redirect()->back()->with('message', 'Transactions updated successfully!');
    }

    public function search(Request $request)
  {
    $searchTerm = $request->input('search');

  
    $transactions = transactions::where('reference_number', 'like', "%{$searchTerm}%")
                                ->orWhere('sender_name', 'like', "%{$searchTerm}%")
                                ->orWhere('receiver_name', 'like', "%{$searchTerm}%")
                                ->paginate(10); 

    return view('MoneyTransfer.index', compact('transactions'));
  }
}
 



