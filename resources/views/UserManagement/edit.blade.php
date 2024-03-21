
@section('users')

<main>
  <h2> EDIT USER </h2>
  <form method="POST" action="{{ route('UserManagement.update', ['id' => $user->id]) }}">
      @csrf 
      @method('PUT')

      <p>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required maxlength="25" value="{{$user->first_name}}">
      </p>
      <p>
          <label for="middle_name">Middle Name (Optional):</label>
          <input type="text" name="middle_name" id="middle_name" maxlength="25"  value="{{$user->middle_name}}">
      </p>
      <p>
          <label for="last_name">Last Name:</label>
          <input type="text" name="last_name" id="last_name" required maxlength="25"  value="{{$user->last_name}}">
      </p>
      <p>
          <label for="birthdate">Birthdate:</label>
          <input type="date" name="birthdate" id="birthdate" required  value="{{$user->birthdate}}">
      </p>
      <p>
          <label for="full_address">Full Address:</label>
          <textarea name="full_address" id="full_address" rows="3" required maxlength="255"  value="{{$user->full_address}}"></textarea>
      </p>
      <p>
          <label for="branch_assigned">Branch Assigned:</label>
          <select name="branch_assigned" id="branch_assigned" required  value="{{$user->brand_assigned}}">
              <option value="None">Select Branch</option>
              <option value="Bacolod">Bacolod</option>
              <option value="Cebu">Cebu</option>
              <option value="Manila">Manila</option>
              <option value="Makati">Makati</option>
              <option value="Tawi-tawi">Tawi-tawi</option>
          </select>
      </p>
      <p>
          <label for="user_type_id">User Type:</label>
          <input type="text" name="user_type_id" id="user_type_id" required  value="{{$user->user_type_id}}">
      </p>
      <p>
          <label for="email">Email Address:</label>
          <input type="email" name="email" id="email" required unique  value="{{$user->email}}">
      </p>
      <p>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" required minlength="6"  value="{{$user->password}}">
      </p>
      <p>
          <button type="submit">Update</button>
      </p>
</form>
</main>
