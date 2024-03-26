<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('MoneyTransfer.update', ['id' => $transactions->id]) }}">
        @csrf 
        @method('PUT')
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

  const key = `<span class="math-inline">\{from\}/</span>{to}`;
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
            <label for="branch_sent">Branch Sent:</
