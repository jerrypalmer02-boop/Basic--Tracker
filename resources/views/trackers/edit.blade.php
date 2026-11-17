
<!DOCTYPE html>
<html>
<head>
    <title>Edit Record - Basic Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }
        .container {
            max-width: 550px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }
        button, .back {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        button {
            background: #2874a6;
            color: white;
        }
        .back {
            background: #777;
            color: white;
        }
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Record</h2>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('trackers.update', $tracker->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title</label>
        <input type="text" name="title"
               value="{{ old('title', $tracker->title) }}" required>

        <label>Description</label>
        <textarea name="description" rows="4">{{ old('description', $tracker->description) }}</textarea>

        <label>Status</label>
        <select name="status" required>
            <option value="Pending" {{ old('status', $tracker->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Completed" {{ old('status', $tracker->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <button type="submit">Update Record</button>
        <a href="{{ route('trackers.index') }}" class="back">Back</a>
    </form>
</div>

</body>
</html>
