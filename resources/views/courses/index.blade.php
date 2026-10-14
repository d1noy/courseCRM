@extends('layout')

@section('content')

    <div class="main">
        <div class="topbar">
            <div>
                <p class="eyebrow"><a href="{{route('home')}}" style="color:inherit;text-decoration:none;">Курсы</a> / {{$category->name}}</p>
                <h1>{{$category->name}}</h1>
            </div>
            <a href="{{route('courses.edit', $category)}}" class="btn btn-ghost">Редактировать курс</a>
        </div>

        <div class="content">
            <div class="panel" style="padding:22px 26px;margin-bottom:30px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:14px;">
                <div>
                    <span class="pill">Программирование</span>
                    <p style="color:var(--muted);font-size:13.5px;max-width:520px;margin:10px 0 0;">
                        {{$category->description}}
                    </p>
                </div>
                <div style="display:flex;align-items:center;gap:18px;">
                    <div class="price-tag" style="font-size:22px;">2 499.99 ₽</div>
                    <a href="" title="Удалить курс" class="icon-btn delete">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Lessons -->
            <div class="section-block">
                <div class="section-head">
                    <div>
                        <h2>Уроки курса</h2>
                        <p class="section-note">Заголовок и текстовое содержание обязательны, видеоссылка SuperTube — по желанию.</p>
                    </div>
                    <a href="{{route('courses.create', $category)}}" class="btn btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"></path></svg>
                        Добавить урок
                    </a>
                </div>
                @foreach($course as $courses)
                <div class="lesson-list" style="margin-bottom: 50px">
                    <div class="lesson-item">
                        <div class="lesson-num">{{$courses->id}}</div>
                        <div class="lesson-body">
                            <h3 class="lesson-title">{{$courses->name}}</h3>
                            <p class="lesson-snippet">{{$courses->description}}</p>
                            <div class="lesson-meta">
                                <a href="https://super-tube.cc/video/v23189" class="video-badge" target="_blank" rel="noopener">
                                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"></path></svg>
                                    SuperTube
                                </a>
                            </div>
                        </div>
                        <div class="lesson-actions" >
                            <a href="add_lesson.html" class="icon-btn edit" title="Редактировать">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"></path></svg>
                            </a>
                            <a href="" class="icon-btn delete" title="Удалить">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13"></path></svg>
                            </a>
                        </div>
                        @endforeach

                </div>
            </div>

            <!-- Certificates -->
            <div class="section-block">
                <div class="section-head">
                    <div>
                        <h2>Сертификаты</h2>
                        <p class="section-note">Доступно студентам, прошедшим все уроки курса.</p>
                    </div>
                </div>

                <div class="cert-note">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2 2 7l10 5 10-5-10-5Z"></path><path d="M2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                    <span>Номер сертификата — 12 символов: первые 6 возвращает сервис сертификации, последние 6 генерирует система, последняя цифра всегда «1» — признак действительного сертификата. Печать выполняется на бланке фирменного шаблона.</span>
                </div>

                <div class="ledger-wrap">
                    <table class="ledger">
                        <thead>
                        <tr>
                            <th>Студент</th>
                            <th>Email</th>
                            <th>Дата завершения</th>
                            <th>№ сертификата</th>
                            <th class="text-end">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><strong>Анна Соколова</strong></td>
                            <td>example@mail.com</td>
                            <td class="num">21.07.2026</td>
                            <td>
                                <span class="cert-number"><span class="server-part">8K2N4Q</span>-00023<span class="check-digit">1</span></span>
                            </td>
                            <td class="text-end">
                                <a href="certificate.html" class="icon-btn view" title="Печать сертификата" target="_blank">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 9V3h12v6M6 18H4a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-2M6 14h12v7H6z"></path></svg>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Игорь Петров</strong></td>
                            <td>example@mail.com</td>
                            <td class="num">— уроки не завершены</td>
                            <td><span class="no-video">не выдан</span></td>
                            <td class="text-end">
                                <span class="icon-btn" style="opacity:.35;pointer-events:none;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 9V3h12v6M6 18H4a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-2M6 14h12v7H6z"></path></svg>
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
