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
    					Тип:
    				</div>
    				<div class="admin-edit-card__item__right">
                        <select name="type_id">
                            @foreach($ar_type as $id=>$name)
                                @if (isset($item) &&  $item->type_id == $id)
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
						Фото
					</div>
					<div class="admin-edit-card__item__right">
						<div class="admin-edit-card__input-file">
							<input type="file" id="logo" name='photo' class="input-file">
							<label for="logo"  class="name-file">Выберите файл</label>
						</div>
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
    					<textarea name='short_note' placeholder='Краткий текст' class='js_redactor'>{{ isset($item) ? $item->short_note : null }}</textarea>
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
    					<textarea name='short_note_kz' placeholder='Краткий текст на казахском' class='js_redactor'>{{ isset($item) ? $item->short_note_kz : null }}</textarea>
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
    					<textarea name='short_note_en' placeholder='Краткий текст на английском' class='js_redactor'>{{ isset($item) ? $item->short_note_en : null }}</textarea>
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
                <input name="image" type="file" id="upload" style='display:none;'>

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
