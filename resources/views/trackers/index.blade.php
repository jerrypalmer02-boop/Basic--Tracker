
<!DOCTYPE html>
<html>
<head>
    <title>Basic Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }
        h2 { color: #333; }
        .add-btn {
            display: inline-block;
            background: #2874a6;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th { background: #eee; }
        .edit-btn { color: #2874a6; }
        .delete-btn { color: red; }
        .message {
            background: #d4edda;
            padding: 10px;
            margin-bottom: 15px;
        }
        button { cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h2>Basic Tracker</h2>
    <p>Manage your records easily.</p>

    @if(session('success'))
        <div class="message">{{ session('success') }}</div>
    @endif

    <a href="{{ route('trackers.create') }}" class="add-btn">
        Add New Record
    </a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($trackers as $tracker)
                <tr>
                    <td>{{ $tracker->title }}</td>
                    <td>{{ $tracker->description }}</td>
                    <td>{{ $tracker->status }}</td>
                    <td>
                        <a class="edit-btn"
                           href="{{ route('trackers.edit', $tracker->id) }}">
                            Edit
                        </a>

                        <form action="{{ route('trackers.destroy', $tracker->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Delete this record?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
