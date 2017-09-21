@extends('layouts.app')

@section('content')
<div class="row-fluid">
    <div class="span4"></div>
    <div class="span3">

        <div class="alert alert-error">
		{{ $alerttext }}
        </div>

        <form action="" method="post" class="form-horizontal">
			{{ csrf_field() }}
			
            <div class="control-group">
                <b>Авторизация</b>
            </div>
            <div class="control-group{{ $errors->has('username') ? ' error' : '' }}">
                <input type="text" id="inputLogin" name="username" placeholder="Логин" data-cip-id="inputLogin"
                       autocomplete="off">
            </div>
            <div class="control-group{{ $errors->has('password') ? ' error' : '' }}">
                <input type="password" id="inputPassword" name="password" placeholder="Пароль"
                       data-cip-id="inputPassword">
            </div>
            <div class="control-group">
                <label class="checkbox">
                    <input type="checkbox" name="remember" value="1"> Запомнить меня
                </label>
                <button type="submit" class="btn btn-primary">Вход</button>
            </div>
        </form>
    </div>
</div>
@endsection