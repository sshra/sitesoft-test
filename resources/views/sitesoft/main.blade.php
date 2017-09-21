@extends('layouts.app')

@section('content')
<div class="row-fluid">
    <div class="span2"></div>
    <div class="span8">
		@guest
		@else 
			@if ( Auth::user() && Auth::user()->canAdd() )
        <form action="" method="post" class="form-horizontal" style="margin-bottom: 50px;" id="messageEditor">
			{{ csrf_field() }}
            <div class="alert alert-error" style="display: none;">
                Сообщение не может быть пустым
            </div>
            <div class="alert alert-success" style="display: none;">
                Сообщение сохранено
            </div>

            <div class="control-group">
                <textarea style="width: 100%; height: 50px;" id="inputText" name="text" placeholder="Ваше сообщение..."
                       data-cip-id="inputText"></textarea>
            </div>
            <div class="control-group">
				<input type="hidden" name="id" id="storedId" value="0" />
                <button type="button" class="btn btn-primary" id="messageSend">Отправить сообщение</button>
            </div>
        </form>
			@endif
		@endguest
		<div id="datasheet">
			@include('sitesoft.datasheet', ['elms' => $mesres])
		</div>
    </div>
</div>
<script>

( function () {
	$('#messageSend').on('click', function () {
		$('#messageEditor .alert').hide();

		if ($('#messageEditor #inputText').get(0).value == '') {
			$('#messageEditor .alert-error').show();
			return;
		}
		
		$.ajax({
			url: '/', 
			dataType: "html",
			type: 'POST',
			data: $('#messageEditor').serialize(),
			success: function (response) {
				$('#messageEditor .alert-success').show();
				$('#datasheet').html(response);
				preprocess();
			},
			error: function () {
				$('#messageEditor .alert-error').show();
			}
		});
		
		//переключаем в режим нового месс 
		form = $('#messageEditor').get(0);
		form.id.value = 0;
	});

	preprocess();

}) ();

function preprocess ()
{ 
	//вызовы редактора
	$('#datasheet .well .edit-button.precesswait').removeClass('precesswait').on('click', function () {
		$('#messageEditor .alert').hide();
		
		id = $(this).parents('.well').attr('data-id');
		
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	
			},
			url: '/chatmess/' + id, 
			type: 'POST',
			success: function (out) {
				form = $('#messageEditor').get(0);
				form.text.value = out.text;
				form.id.value = out.id;
				form.text.focus();
			},
		});		
	});

	//удаление сообщений
	$('#datasheet .well .delete-button.precesswait').removeClass('precesswait').on('click', function () {
		$('#messageEditor .alert').hide();
		
		id = $(this).parents('.well').attr('data-id');
		
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	
			},
			url: '/delmess/' + id, 
			type: 'POST',
			success: function (response) {
				$('#datasheet').html(response);
				preprocess();
			},
		});		
	});	
}

</script>
@endsection
