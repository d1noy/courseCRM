@extends('layout')

@section('content')
        <div class="main">
            <div class="topbar">
                <div>
                    <p class="eyebrow">Курсы / форма</p>
                    <h1>Курсы</h1>
                </div>
            </div>
            <div class="content">
                <div class="form-page">
                    <div class="panel">
                        <h2>Добавить курс</h2>
                        <p class="sub">Заполните карточку курса для каталога.</p>
                        @if($errors->any())
                            <div class="alert-banner" id="errorMessage">
                                {{$errors->first()}}
                            </div>
                        @endif
                        <form id="addCourse" action="{{route('courses.store', $category)}}" method="POST" enctype="multipart/form-data" >
                          @csrf
                            @include('courses._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
