<html lang="ru"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Категории — EduCRM</title>
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<div class="app-shell">
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="mark">Eq</div>
            <div class="name">EduCRM<small>Панель обучения</small></div>
        </div>
        @auth
            <nav class="sidebar-nav">
                <a href="{{route('home')}}" class="active">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="8" height="8" rx="2"></rect><rect x="13" y="3" width="8" height="8" rx="2"></rect><rect x="3" y="13" width="8" height="8" rx="2"></rect><rect x="13" y="13" width="8" height="8" rx="2"></rect></svg>
                    Категории
                </a>
                <a href="index.html">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 5.5C4 4.7 4.7 4 5.5 4H11v16H5.5A1.5 1.5 0 0 1 4 18.5V5.5Z"></path><path d="M20 5.5c0-.8-.7-1.5-1.5-1.5H13v16h5.5c.8 0 1.5-.7 1.5-1.5V5.5Z"></path></svg>
                    Курсы
                </a>
                <a href="orders.html">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 3h12v18l-3-2-3 2-3-2-3 2V3Z"></path><path d="M9 8h6M9 12h6"></path></svg>
                    Заказы
                </a>
            </nav>
        @guest
        <div class="sidebar-foot">
            <a href="{{route('login')}}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1h-4"></path><path d="M10 8l4 4-4 4M14 12H3"></path></svg>
                Вход
            </a>
        </div>
        @endguest
        <div class="sidebar-foot">
            <a href="{{route('logout')}}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1h-4"></path><path d="M10 8l4 4-4 4M14 12H3"></path></svg>
                Выход
            </a>
        </div>
        @endauth
    </aside>

    <main class="main">
        @yield('content')
    </main>

</div>

</body>
</html>
