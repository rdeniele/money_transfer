{{-- @extends('layouts.app')
 --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    {{-- <p>Today's date: <?= date('Y-m-d') ?></p> --}}
    @section('content')
    <p>Date & time: <?= date('d-m-Y H:i:s') ?></p>
    @endsection

<a href="{{ route('users') }}" class="btn btn-primary">User Management</a><br>
<a href="{{ route('branch') }}" class="btn btn-primary">Branch Management</a><br>
<a href="{{ route('transactions') }}" class="btn btn-primary">Money Transfer</a><br>

</body>
</html>