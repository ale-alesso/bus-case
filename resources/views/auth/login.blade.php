<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $setting->description ?? 'Краткое описание АТП' }}">
    <title>Авторизация - {{ $setting->name ?? 'АТП' }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

<div class="container">
    <h1>{{ $setting->name ?? 'АТП' }}</h1>
    @if(isset($setting->logo))
        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Логотип" style="max-width: 150px;">
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" required autofocus>
        </div>
        <div>
            <label for="password">Пароль:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Войти</button>
    </form>
</div>

</body>
</html>
