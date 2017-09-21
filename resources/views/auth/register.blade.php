@extends('layouts.app')

@section('content')
<div class="row-fluid">
    <div class="span4"></div>
    <div class="span8">

        <form action="{{ route('register') }}" method="post" class="form-horizontal">
			{{ csrf_field() }}
            <div class="control-group">
                <b>Регистрация</b>
            </div>
            <div class="control-group {{ $errors->has('name') ? ' error' : '' }}">
                <input type="text" id="inputLogin" name="name" placeholder="Логин" data-cip-id="inputLogin"  value="{{ old('name') }}"
                       autocomplete="off">
				@if ($errors->has('name'))
					<span class="help-inline">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
                @endif					   
            </div>
            <div class="control-group {{ $errors->has('password') ? ' error' : '' }}">
                <input type="password" id="inputPassword" name="password" placeholder="Пароль"
                       data-cip-id="inputPassword">
				@if ($errors->has('password'))
					<span class="help-inline">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
                @endif					   
            </div>
            <div class="control-group {{ $errors->has('password_confirmation') ? ' error' : '' }}">
                <input type="password" id="inputPassword2" name="password_confirmation" placeholder="Повторите пароль"
                       data-cip-id="inputPassword2">
				@if ($errors->has('password_confirmation'))
					<span class="help-inline">
						<strong>{{ $errors->first('password_confirmation') }}</strong>
					</span>
                @endif	
            </div>
            <div class="control-group">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </form>
    </div>
</div>
@endsection
