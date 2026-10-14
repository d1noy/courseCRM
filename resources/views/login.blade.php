@extends('layout')

@section('content')
    <div class="auth-wrap">
        <div class="auth-card">
            <div class="auth-mark">Eq</div>
            <h2>Вход в EduCRM</h2>
            <p class="sub">Панель управления обучением</p>
            <form action="{{route('postLogin')}}" method="POST">
                @csrf
                <div class="field" >
                    <label for="email">Электронная почта</label>
                    <input id="email" type="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="admin@example.com">
                    @error('email')
                         <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="field ">
                    <label for="password"> Пароль</label>
                    <input id="password" type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Введите пароль">
                    @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div style="margin-top: 30px;"><button class="btn btn-primary btn-block">Войти</button></div>
            </form>
            <div style="margin-top:25px;text-align:center;font-size:13px;color:var(--muted);">© 2026 EduCRM
            </div>
        </div>
    </div>
@endsection
