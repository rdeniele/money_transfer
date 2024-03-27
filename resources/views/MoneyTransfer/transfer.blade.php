<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <h1>Transactions</h1>
    <form method="POST" action="/transactions">  @csrf
        <p>
            <label for="reference_number">Reference Number:</label>
            <input type="text" name="reference_number" id="reference_number">
        </p>
        <p>
            <label for="sender_name">Sender Name:</label>
            <input type="text" name="sender_name" id="sender_name">
        </p>
        <p>
            <label for="sender_contact">Sender contact:</label>
            <input type="text" name="sender_contact" id="sender_contact">
        </p>
        <p>
            <label for="receiver_name">Recipient Name:</label>
            <input type="text" name="receiver_name" id="receiver_name">
        </p>
       
        <p>
            <label for="receiver_contact">Recipient Contact:</label>
            <input type="text" name="receiver_contact" id="receiver_contact">
        </p>

        <p>
            <label for="transaction_type">Branch Assigned:</label>
            <select name="transaction_type" id="transaction_type" required>
                <option value="National">Local</option>
                <option value="International">International</option>
            </select>
        </p>
       
        <p>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" min="0" step="0.01" required>
          </p>
         
          <p>
            <label for="conversion_rate">Currency Conversion Code:</label>
            <select name="conversion_rate" id="conversion_rate" required>
              <option value="PHP">PHP</option>
              <option value="USD">USD</option>
            </select>
          </p>

          <p>
            <label for="amount_converted">Converted Amount:</label>
            <input type="text" id="amount_converted" name="amount_converted">
          </p>
          

          <script>
           const amountInput = document.getElementById('amount');
const convertedAmountInput = document.getElementById('amount_converted');
const currencySelect = document.getElementById('conversion_rate');

function convertCurrency() {
  const amount = parseFloat(amountInput.value);
  const fromCurrency = 'PHP'; // Replace with actual source currency
  const toCurrency = currencySelect.value;
  const conversionRate = getConversionRate(fromCurrency, toCurrency);

  if (isNaN(amount) || !conversionRate) {
    convertedAmountInput.value = 'Invalid Input or Rate Unavailable';
    return;
  }

  const convertedAmount = amount * conversionRate;
  convertedAmountInput.value = convertedAmount.toFixed(2); // Format to 2 decimal places
}

function getConversionRate(from, to) {
  // Replace this function with your logic to define conversion rates
  // This example uses a simple object but could be extended for more currencies
  const conversionRates = {
    'PHP/USD': 0.020,
    'USD/PHP': 50.0,
    'PHP/PHP': 1,
    // Add rates for other currencies if needed
  };

  const key = `${from}/${to}`;
  return conversionRates[key] || null; // Return null for unavailable rates
}

amountInput.addEventListener('keyup', convertCurrency);
currencySelect.addEventListener('change', convertCurrency);
          </script>

        <p>
            <label for="transaction_status">Transaction Status:</label>
            <input type="text" id="transaction_status" name="transaction_status">
        </p>
        <p>
            <label for="branch_sent">Branch Sent:</label>
            <input type="text" id="branch_sent" name="branch_sent">
        </p>
        <p>
            <label for="branch_received">Branch Received:</label>
            <input type="text" id="branch_received" name="branch_received">
        </p>
        <p>
            <label for="transfer_fee_id">Transfer Fee ID:</label>
            <input type="text" id="transfer_fee_id" name="transfer_fee_id">
        </p>
        {{-- <p>Date Time Transaction: {{ Carbon::now() }}</p> --}}
        <p>Current Date and Time: {{ now() }}</p>
        <input type="hidden" name="datetime_transaction" id="datetime_transaction" value="{{ now() }}">

        <button type="submit">Submit</button>
    </form>

    <h1>Transaction List</h1>

    @if (session()->has('message'))
      <div class="alert alert-info">
        {{ session()->get('message') }}
      </div>
    @endif
    
    @if (isset($transactions))
    <form action="{{ route('MoneyTransfer.index') }}" method="GET" class="search-form">
      <input type="text" name="search" placeholder="Search transactions...">
      <button type="submit">Search</button>
    </form>
      </form>
    
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Reference Number</th>
            <th>Sender Name</th>
            <th>Sender Contact</th>
            <th>Recipient Name</th>
            <th>Recipient Contact</th>
            <th>Transaction Type</th>
            <th>Amount Local Currency</th>
            <th>Currency Coversion Code</th>
            <th>Amount Converted</th>
            <th>Transaction Status</th>
            <th>Branch Sent</th>
            <th>Branch Received</th>
            <th>Transfer Fee Id</th>
            <th>Date & Time Transaction</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @if (count($transactions) > 0)
            @foreach ($transactions as $transactions)
              <tr>
                <td>{{ $transactions->id }}</td>
                <td>{{ $transactions->reference_number }}</td>
                <td>{{ $transactions->sender_name }}</td>
                <td>{{ $transactions->sender_contact }}</td>
                <td>{{ $transactions->receiver_name }}</td>
                <td>{{ $transactions->receiver_contact }}</td>
                <td>{{ $transactions->transaction_type }}</td>
                <td>{{ $transactions->amount }}</td>
                <td>{{ $transactions->conversion_rate }}</td>
                <td>{{ $transactions->amount_converted }}</td>
                <td>{{ $transactions->transaction_status }}</td>
                <td>{{ $transactions->branch_sent }}</td>
                <td>{{ $transactions->branch_received }}</td>
                <td>{{ $transactions->transfer_fee_id }}</td>
                <td>{{ $transactions->datetime_transaction }}</td>
    
                <td>
                    <a href="{{ route('MoneyTransfer.edit', ['id' => $transactions->id]) }}" class="btn">
            Edit
                    </a>
                </td>

                <td>
                  <form action="{{ route('MoneyTransfer.delete',['id' => $transactions->id])  }}" method="GET" onsubmit="return confirm('{{ ('Are you sure you want to delete this? ') }}');">
                    @csrf
                    <button type="submit" class="submitbtn">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="16">No Transactions found!</td>
            </tr>
          @endif
        </tbody>
      </table>
    @else
      <p>Transactions not found!</p>
    @endif
    </body>


</html> 