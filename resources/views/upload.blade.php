<!-- resources/views/upload.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>

<body>
    <h2>Upload Image</h2>
    @if ($message = Session::get('success'))
    <div>{{ $message }}</div>
    @endif
    @if ($message = Session::get('error'))
    <div>{{ $message }}</div>
    @endif
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Upload</button>
    </form>
</body>

</html>