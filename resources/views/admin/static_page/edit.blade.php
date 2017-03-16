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
    					<input type="text" name='sys_key' placeholder="Системный код" value='{{ isset($item) ? $item->sys_key : null }}' required="">
    				</div>
    			</div>

    			<div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Заголовок:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<input type="text" name='title' placeholder="Заголовок" value='{{ isset($item) ? $item->title : null }}' required="">
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Краткий текст:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<textarea name='short_note' placeholder='Краткий текст'>{{ isset($item) ? $item->short_note : null }}</textarea>
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Текст:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<textarea name='note' placeholder='Текст'>{{ isset($item) ? $item->note : null }}</textarea>
    				</div>
    			</div>

                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Заголовок на казахском:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<input type="text" name='title_kz' placeholder="Заголовок на казахском" value='{{ isset($item) ? $item->title_kz : null }}' required="">
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Краткий текст на казахском:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<textarea name='short_note_kz' placeholder='Краткий текст на казахском'>{{ isset($item) ? $item->short_note_kz : null }}</textarea>
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Текст на казахском:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<textarea name='note_kz' placeholder='Текст на казахском'>{{ isset($item) ? $item->note_kz : null }}</textarea>
    				</div>
    			</div>

                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Заголовок на английском:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<input type="text" name='title_en' placeholder="Заголовок на английском" value='{{ isset($item) ? $item->title_en : null }}' required="">
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Краткий текст на английском:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<textarea name='short_note_en' placeholder='Краткий текст на английском'>{{ isset($item) ? $item->short_note_en : null }}</textarea>
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Текст на английском:
    				</div>
    				<div class="admin-edit-card__item__right">
                        <textarea name='note_en' placeholder='Текст на английском'>{{ isset($item) ? $item->note_en : null }}</textarea>
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
