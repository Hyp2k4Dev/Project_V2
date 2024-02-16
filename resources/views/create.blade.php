<!-- create.blade.php -->

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address">

    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number">

    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth">

    <label for="role">Role:</label>
    <select id="role" name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>

    <button type="submit">Create User</button>
</form>