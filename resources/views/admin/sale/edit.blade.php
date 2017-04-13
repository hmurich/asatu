@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    <div class="restaurants-box" style='margin-left: 0px;'>
		<div class="admin-edit-card">
			<div class="admin-edit-card__title">
				{{ $title }}
			</div>
            <form action='{{ $action }}' method='post' enctype="multipart/form-data">
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Ресторан:
    				</div>
    				<div class="admin-edit-card__item__right">
                        <select name="restoran_id">
                            @foreach($ar_restoran as $id=>$name)
                                @if (isset($item) &&  $item->restoran_id == $id)
                                    <option value="{{ $id }}" selected="selected">{{ $name }}</option>
                                @else
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endif
                            @endforeach
            			</select>
    				</div>
    			</div>

                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Текст:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<textarea name='note' placeholder='Текст' class='js_redactor'>{{ isset($item) ? $item->note : null }}</textarea>
    				</div>
    			</div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Текст на казахском:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<textarea name='note_kz' placeholder='Текст на казахском' class='js_redactor'>{{ isset($item) ? $item->note_kz : null }}</textarea>
    				</div>
    			</div>

                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Текст на английском:
    				</div>
    				<div class="admin-edit-card__item__right">
                        <textarea name='note_en' placeholder='Текст на английском' class='js_redactor'>{{ isset($item) ? $item->note_en : null }}</textarea>
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
