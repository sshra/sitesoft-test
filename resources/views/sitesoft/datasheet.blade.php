
	@foreach ($elms as $elm)
			<div class="well" data-id="{{ $elm->id }}">
				<h5>{{ $elm->user->name }}, <span style="font-weight: normal">{{ $elm->created_at }}</span></h5>
					<?= nl2br(e($elm->text)) ?>
				
				<div class="btn-group pull-right">
				@if ( Auth::user() && Auth::user()->canEdit($elm) )
					<button class="btn edit-button precesswait"><i class="icon-pencil"></i></button>
				@endif;
				@if ( Auth::user() && Auth::user()->canDelete($elm) )
					<button class="btn delete-button precesswait"><i class="icon-trash"></i></button>
				@endif;
				</div>
				
			</div>
	@endforeach
