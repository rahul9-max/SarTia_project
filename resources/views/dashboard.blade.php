<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add this in the head section of your HTML file -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Dashboard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .edit-btn {
            background-color: #4CAF50;
        }

        .delete-btn {
            background-color: #f44336;
        }
        .logout-btn {
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            background-color: #428bca;
            margin-bottom: 10px; /* Add margin to separate from the table */
        }
    </style>
</head>
<body>
<a href="{{ route('logout') }}" class="logout-btn" onclick="logout()">Logout</a>

    <h2>Dashboard</h2>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->title }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td class="action-buttons">
                    <a href="{{ route('users.edit',['user'=>$user->id]) }}" class="edit-btn" 
                    onclick="editUser('{{ $user->id }}')">Edit</a>

                    <form action="{{ route('users.delete',['user'=>$user->id]) }}" 
                             onclick="deleteUser('{{ $user->id }}')" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function editUser(userId) {
            // Implement your edit logic here
            console.log('Edit user with ID: ' + userId);
        }

        function deleteUser(userId) {
        // Add your custom logic for deletion
        console.log('Delete user with ID:', userId);

        // Trigger the form submission using jQuery
        $('#deleteForm_' + userId).submit();
    }
    </script>
</body>
</html>
