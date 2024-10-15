@can('admin')
    <a href="{{ route('admin.dashboard') }}">Админ Панель</a>
@endcan

@can('manager')
    <a href="{{ route('manager.dashboard') }}">Менеджер Панель</a>
@endcan

@can('driver')
    <a href="{{ route('driver.dashboard') }}">Водитель Панель</a>
@endcan
