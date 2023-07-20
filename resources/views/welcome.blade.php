<!DOCTYPE html>
<html>
<head>
    <title>Import Excel Data</title>
</head>
<body>

    <h1>Import Excel Data</h1>

    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="excel_file">
        <button type="submit">Import Excel</button>
    </form>

    <h1>Export CSV</h1>

    <p>
        Click the button below to export user data as a CSV file.
    </p>

    <a href="{{ route('export.csv') }}" class="btn btn-primary">Export CSV</a>

</body>
</html>
