<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <h2>Edit Profile</h2>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('users.update',['user'=>$user->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating resources -->

        <div>
            <label for="title">Title:</label>
            <select name="title">
                <option value="mr" @if(old('title', $user->title) == 'mr') selected @endif>Mr</option>
                <option value="ms" @if(old('title', $user->title) == 'ms') selected @endif>Ms</option>
                <option value="mrs" @if(old('title', $user->title) == 'mrs') selected @endif>Mrs</option>
            </select>
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Optionally allow the user to update their password -->
        <div>
            <label for="password">New Password:</label>
            <input type="password" name="password">
            @error('password')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="role">Role:</label>
            <select name="role">
                <option value="user" @if(old('role', $user->role) == 'user') selected @endif>User</option>
                <option value="admin" @if(old('role', $user->role) == 'admin') selected @endif>Admin</option>
            </select>
        </div>
        <div>
            <button type="submit">Update Profile</button>
        </div>
    </form>
</body>
</html>
