@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Настройки АТП</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Название АТП</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $setting->name ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="logo">Логотип</label>
                <input type="file" class="form-control" name="logo" accept="image/*">
                @if (isset($setting->logo))
                    <img src="{{ asset($setting->logo) }}" alt="Логотип" style="width: 100px; height: auto;">
                @endif
            </div>

            <div class="form-group">
                <label for="description">Краткое описание</label>
                <textarea class="form-control" name="description" rows="3" required>{{ old('description', $setting->description ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить настройки</button>
        </form>
    </div>
@endsection
