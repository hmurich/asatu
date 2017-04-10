@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    <div class="side-bar full-wight">
        @include('admin.restoran.include.menu', ['item'=>$item])
    </div>
    <div class="restaurants-box full-wight">
        <div class="admin-edit-card">
            <div class="admin-edit-card__title">
                {{ $title }}
            </div>
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Тип блюда:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <select name="cat_id" required="">
                            <option value="">Тип блюда</option>
                            @foreach ($ar_menu_type as $id=>$name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
						</select>
    				</div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Название блюда:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='title'  placeholder="Название блюда">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Цена:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='cost_item' placeholder="Цена">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Фото
                    </div>
                    <div class="admin-edit-card__item__right">
                        <div class="admin-edit-card__input-file">
                            <input type="file" id="main_photo" class="input-file" name='photo'>
                            <label for="main_photo"  class="name-file">Выберите файл</label>
                        </div>
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Описание:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <textarea name='note' placeholder='Описание' class='js_redactor'></textarea>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        <button class="button">
                            Добавить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
