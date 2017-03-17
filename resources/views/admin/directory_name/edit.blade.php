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
    					<input type="text" name='sys_key' value='{{ isset($item) ? $item->sys_key : null }}' />
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Наименование:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<input type="text" name='name' value='{{ isset($item) ? $item->name : null }}' />
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Заметка:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<input type="text" name='note' value='{{ isset($item) ? $item->note : null }}' />
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
