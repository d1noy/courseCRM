@extends('layout')

@section('content')
    <div class="main">
        <div class="topbar">
            <div>
                <p class="eyebrow">Каталог курсов</p>
                <h1>Категории</h1>
            </div>
            <a href="{{route('categories.create' )}}" class="btn btn-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"></path></svg>
                Добавить категорию
            </a>
        </div>

        <div class="content">
            <div class="category-grid">
                @foreach($categories as $category)
                    <article class="category-card">
                        @if($category->default_image)
                        <div class="cover">
                            <img src="{{$category->default_image}}" alt="{{$category->name}}">
                            <span class="count">{{$category->courses()->count()}}</span>
                        </div>
                        @endif
                        <div class="body">
                            <h3>{{$category->name}}</h3>
                            <p class="desc">{{$category->description}}</p>
                        </div>
                        <div class="foot">
                            <a href="{{route('courses.index', $category)}}" class="btn btn-ghost">Курсы</a>
                            <a href="{{route('categories.edit', $category)}}" class="icon-btn edit" title="Редактировать">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"></path></svg>
                            </a>

                            @if($category->courses()->count() === 0)
                                <a href="{{route('categories.destroy', $category)}}" class="icon-btn delete" title="Удалить">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13"></path></svg>
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection
