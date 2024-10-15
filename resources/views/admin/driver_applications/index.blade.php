@extends('layouts.admin')

@section('content')
    <h1>Запросы стать водителем</h1>

    @if($applications->isEmpty())
        <p>На данный момент нет запросов.</p>
    @else
        <table class="table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Дата рождения</th>
                <th>Дата заявки</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ ucfirst($application->first_name) }}</td>
                    <td>{{ ucfirst($application->last_name) }}</td>
                    <td>{{ $application->birthdate->format('d.m.Y') }}</td>
                    <td>{{ $application->created_at->format('d.m.Y H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
