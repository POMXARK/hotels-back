<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Правила</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Правила</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('rules.index') }}">Список правил</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rules.create') }}">Создать правило</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-menu-left" id="notification-count" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Уведомления (@php $notifications = \App\Models\Notification::all(); echo $notifications->count(); @endphp)
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="container">
                            @include('notifications.index', ['notifications' => $notifications])
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelector('.dropdown-menu').addEventListener('click', function(event) {
        event.stopPropagation();
    });

    document.querySelector('.dropdown').addEventListener('click', function(event) {
        this.classList.add('open');
        event.stopPropagation();
    });

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown')) {
            document.querySelector('.dropdown').classList.remove('open');
        }
    });

</script>
<style>
    .dropdown-menu[data-bs-popper]{
        left: -300px;
    }

    .dropdown-menu li {
        padding: 5px;
        margin-bottom: 5px;
    }

    .dropdown-menu li input[type="checkbox"] {
        margin-right: 10px;
    }

    .dropdown-menu {
        pointer-events: auto;
        overflow: visible;
    }
</style>
</body>
</html>
