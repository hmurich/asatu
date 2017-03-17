@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    <div class="restaurants-box" style='margin-left: 0px;'>
		<div class="admin-edit-card">
			<div class="admin-edit-card__title">
				{{ $title }}
			</div>
            <form action='{{ $action }}' method='post'>
    			<div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Системный код:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<input type="text" name='key' value='{{ isset($item) ? $item->key : null }}' />
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Русский:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<input type="text" name='trans_ru' value='{{ isset($item) ? $item->trans_ru : null }}' />
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Казахский:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<input type="text" name='trans_kz' value='{{ isset($item) ? $item->trans_kz : null }}' />
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Английский:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<input type="text" name='trans_en' value='{{ isset($item) ? $item->trans_en : null }}' />
    				</div>
    			</div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
    			<div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					<button class="button">
    						Сохранить
    					</button>
    				</div>
    			</div>
            </form>
		</div>
	</div>

</div>

@endsection
