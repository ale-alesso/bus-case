<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Хочу стать водителем</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

<div class="container">
    <h1>Заполните форму, чтобы стать водителем</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('become.driver.submit') }}">
        @csrf
        <div>
            <label for="first_name">Имя:</label>
            <input type="text" name="first_name" required>
        </div>
        <div>
            <label for="last_name">Фамилия:</label>
            <input type="text" name="last_name" required>
        </div>
        <div>
            <label for="birthdate">Дата рождения:</label>
            <input type="date" name="birthdate" required>
        </div>
        <button type="submit">Отправить</button>
    </form>
</div>

</body>
</html>
