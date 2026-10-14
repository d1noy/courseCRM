@extends('layout')

@section('content')
    <div class="main">
        <div class="topbar">
            <div>
                <p class="eyebrow">Категории / форма</p>
                <h1>Категория</h1>
            </div>
        </div>
        <div class="content">
            <div class="form-page">
                <div class="panel">
                    <h2>Изменить категорию</h2>
                    <p class="sub">Категории группируют курсы в каталоге.</p>
                   @if($errors->any())
                        <div class="alert-banner" id="errorMessage">
                            {{$errors->first()}}
                        </div>
                    @endif
                    <form id="addCategory" action="{{route('categories.update', $category)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('categories._form', compact('category'))
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
