<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
<h1>Edit Profile</h1>
<form action="{{ route('profiles.update') }}" method="post">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    <div>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email">E-mail: </label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
        @error('email')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" >
        @error('password')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="new_password">New password: </label>
        <input type="password" name="new_password" id="new_password" >
        @error('new_password')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="new_password_confirmation">Confirm new password: </label>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation" >
    </div>
    <div>
        <input type="submit">
    </div>
</form>
<div>
    <a href="{{ url('/') }}">Back</a>
</div>
</body>
</html>
