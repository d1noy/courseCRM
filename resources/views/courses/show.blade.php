@extends('layout')

@section('content')
    <div class="main">
        <div class="topbar">
            <div>
                <p class="eyebrow"><a href="{{route('home')}}" style="color:inherit;text-decoration:none;">Курсы</a> / {{$product->name}}</p>
            </div>
        </div>

        <div class="content">
            <div class="course-detail panel">
                <div class="head">
                    <div>
                        <span class="pill">{{$product->name}}</span>
                        <h2>{{$product->description}}</h2>
                    </div>
                    <a href="" title="Удалить курс" class="del">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13"></path></svg>
                    </a>
                </div>
                <div class="body-grid">
                    <div class="gallery">
                        <img src="assets/img/default.jpg" alt="Python с нуля">
                        <img src="assets/img/default.jpg" alt="Python с нуля">
                        <img src="assets/img/default.jpg" alt="Python с нуля">
                        <img src="assets/img/default.jpg" alt="Python с нуля">
                    </div>
                    <div class="course-info">
                        <p class="about">Курс проведёт от основ синтаксиса Python до первых собственных
                            проектов: консольные приложения, работа с файлами и базовая автоматизация.</p>
                        <div class="price-tag">2 499.99 ₽</div>
                        <div class="stat-row">
                            <div class="stat"><b>18</b>уроков</div>
                            <div class="stat"><b>24 ч</b>видео</div>
                            <div class="stat"><b>Начальный</b>уровень</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
