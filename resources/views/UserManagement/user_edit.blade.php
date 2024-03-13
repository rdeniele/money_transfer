<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/adduser">  @csrf
        @csrf
        <p>
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" required maxlength="25">
        </p>
        <p>
            <label for="middle_name">Middle Name (Optional):</label>
            <input type="text" name="middle_name" id="middle_name" maxlength="25">
        </p>
        <p>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" required maxlength="25">
        </p>
        <p>
            <label for="birthdate">Birthdate:</label>
            <input type="date" name="birthdate" id="birthdate" required>
        </p>
        <p>
            <label for="full_address">Full Address:</label>
            <textarea name="full_address" id="full_address" rows="3" required maxlength="255"></textarea>
        </p>
        <p>
            <label for="branch_assigned">Branch Assigned:</label>
            <select name="branch_assigned" id="branch_assigned" required>
                <option value="">Select Branch</option>
                <option value="">Bacolod</option>
                <option value="">Cebu</option>
                <option value="">Manila</option>
                <option value="">Makati</option>
                {{-- <option value="1">Branch 1</option>
                <option value="2">Branch 2</option> --}}
            </select>
        </p>
        <p>
            <label for="user_type_id">Birthdate:</label>
            <input type="text" name="user_type_id" id="user_type_id" required>
        </p>
        <p>
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" required unique>
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required minlength="6">
        </p>
        <p>
            <button type="submit">Register</button>
        </p>
    </form>


    <h1>Users List</h1>

    @if (session()->has('message'))
        <div class="alert alert-info">
            {{ session()->get('message') }}
        </div>
    @endif

    @if (count($users) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Birthdate</th>
                    <th>Address</th>
                    <th>Branch</th>
                    <th>User Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->last_name }}, {{ $user->first_name }} 
                            @if ($user->middle_name)
                                {{ $user->middle_name }}.
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->birthdate }}</td>
                        <td>{{ $user->full_address }}</td>
                        <td>{{ /* Branch Name */  }}</td>  <td>{{ /* User Type Name */  }}</td>  </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No users found.</p>
    @endif
</body>
</html>