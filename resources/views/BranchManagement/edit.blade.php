@section('branach')

<main>
    <h2> EDIT BRANCH </h2>
    <form method="POST" action="{{ route('BranchManagement.update', ['id' => $branchProfile->id]) }}">
      @csrf 
      @method('PUT')
      <p>
        <label for="branch_name">Branch Name:</label>
        <select name="branch_name" id="branch_name" required>
            <option value="None">Select Branch</option>
            <option value="Bacolod">Bacolod</option>
            <option value="Cebu">Cebu</option>
            <option value="Manila">Manila</option>
            <option value="Makati">Makati</option>
            <option value="Tawi-tawi">Tawi-tawi</option>
        </select>
    </p>
    <p>
        <label for="branch_code">Branch Code:</label>
        <input type="text" name="branch_code" id="branch_code" maxlength="11">
    </p>
    <p>
        <label for="country_iso_code">Country Iso Code:</label>
        <input type="text" name="country_iso_code" id="country_iso_code" maxlength="11">
    </p>
    <p>
        <button type="submit">Update</button>
    </p>
</form>

    </form>
</main>
