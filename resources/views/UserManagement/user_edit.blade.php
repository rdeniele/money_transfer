<!DOCTYPE html>
<html>
<head>
  <title>User Edit</title>
</head>
<body>
  <h1>Edit User</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('UserManagement.user_update', ['id' => $user->id]) }}">
    @csrf
    @method('PUT')
      <p>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" required maxlength="25">
      </p>
      <p>
        <label for="middle_name">Middle Name (Optional):</label>
        <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', $user->middle_name) }}" maxlength="25">
      </p>
      <p>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" required maxlength="25">
      </p>
      <p>
        <label for="birthdate">Birthdate:</label>
        <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', $user->birthdate) }}" required>
      </p>
      <p>
        <label for="full_address">Full Address:</label>
        <textarea name="full_address" id="full_address" rows="3" required maxlength="255">{{ old('full_address', $user->full_address) }}</textarea>
      </p>
      <p>
        <label for="branch_assigned">Branch Assigned:</label>
        <select name="branch_assigned" id="branch_assigned" required>
          <option value="None">Select Branch</option>
          <option value="Bacolod" {{ $user->branch_assigned == 'Bacolod' ? 'selected' : '' }}>Bacolod</option>
          <option value="Cebu" {{ $user->branch_assigned == 'Cebu' ? 'selected' : '' }}>Cebu</option>
          <option value="Manila" {{ $user->branch_assigned == 'Manila' ? 'selected' : '' }}>Manila</option>
          <option value="Makati" {{ $user->branch_assigned == 'Makati' ? 'selected' : '' }}>Makati</option>
          <option value="Tawi-tawi" {{ $user->branch_assigned == 'Tawi-tawi' ? 'selected' : '' }}>Tawi-tawi</option>
        </select>
      </p>
      <p>
        <label for="user_type_id">User Type:</label>
        <select name="user_type_id" id="user_type_id" required>
          <option value="">Select User Type</option>
          <option value="1" {{ $user->user_type_id == 1 ? 'selected' : '' }}>Admin</option>
          <option value="2" {{ $user->user_type_id == 2 ? 'selected' : '' }}>Teller</option>
        </select>
      </p>
      <p>
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
      </p>
      <p>
        <label for="password">Password (Leave blank to keep current password):</label>
        <input type="password" name="password" id="password" minlength="6">
      </p>
      <p>
        <button type="submit">Update</button>
      </p>
  </form>

  </body>
</html>
