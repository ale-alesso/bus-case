<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявка на получение водительского удостоверения</title>
</head>
<body>

<h1>Новая заявка на получение водительского удостоверения</h1>
<p>Имя: {{ $application->first_name }}</p>
<p>Фамилия: {{ $application->last_name }}</p>
<p>Дата рождения: {{ $application->birthdate }}</p>

</body>
</html>
