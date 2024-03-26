<!DOCTYPE html>
<html>
<head>
    <title>Branch Registration</title>
</head>
<body>
    <h1>Branch Registration</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/branches">  @csrf
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
            <button type="submit">Register</button>
        </p>
    </form>


    <h1>Branch List</h1>

        @if (session()->has('message'))
        <div class="alert alert-info">
            {{ session()->get('message') }}
        </div>
    @endif

    @if (isset($branch ))  
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Branch Name</th>
                <th>Branch Code</th>
                <th>Country ISO Code</th>
            </tr>  
          </thead>
            <tbody>
                @if (count($branch ) > 0) 
                @foreach ($branch  as $branchProfile)
                <tr>
                    <td>{{ $branchProfile->id }}</td>
                    <td>{{ $branchProfile->branch_name }}
                    <td>{{ $branchProfile->branch_code }}
                    <td>{{ $branchProfile->country_iso_code }}
                    <td>
                        <a href="{{ route('BranchManagement.edit', ['id' => $branchProfile->id]) }}" class="btn">
                          Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('BranchManagement.delete', ['id' => $branchProfile->id]) }}" method="GET" onsubmit="return confirm('{{ ('Are you sure you want to delete this? ') }}');">
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
                <td colspan="10">No Branches found!</td>
              </tr>
            @endif
            </tbody>
        </table>
        @else
        <p>Branch not found!</p>
      @endif
</body>
</html>