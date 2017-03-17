@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    <div class="restaurants-box" style='margin-left: 0px;'>
		<div class="admin-edit-card">
			<div class="admin-edit-card__title">
				{{ $title }}
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Альяс:
				</div>
				<div class="admin-edit-card__item__right">
					<input type="text" name='alias' placeholder="Системный код" value='{{ isset($item) ? $item->alias : null }}' readonly="">
				</div>
			</div>

			<div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Заголовок:
				</div>
				<div class="admin-edit-card__item__right">
					<input type="text" name='title' placeholder="Заголовок" value='{{ isset($item) ? $item->title : null }}' readonly="">
				</div>
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Краткий текст:
				</div>
				<div class="admin-edit-card__item__right">
                    {!! isset($item) ? $item->short_note : null !!}
				</div>
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Текст:
				</div>
				<div class="admin-edit-card__item__right">
                    {!! isset($item) ? $item->note : null !!}
				</div>
			</div>

            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Заголовок на казахском:
				</div>
				<div class="admin-edit-card__item__right">
					<input type="text" name='title_kz' placeholder="Заголовок на казахском" value='{{ isset($item) ? $item->title_kz : null }}' readonly="">
				</div>
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Краткий текст на казахском:
				</div>
				<div class="admin-edit-card__item__right">
                    {!! isset($item) ? $item->short_note_kz : null !!}
				</div>
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Текст на казахском:
				</div>
				<div class="admin-edit-card__item__right">
                    {!! isset($item) ? $item->note_kz : null !!}
				</div>
			</div>

            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Заголовок на английском:
				</div>
				<div class="admin-edit-card__item__right">
					<input type="text" name='title_en' placeholder="Заголовок на английском" value='{{ isset($item) ? $item->title_en : null }}' readonly="">
				</div>
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Краткий текст на английском:
				</div>
				<div class="admin-edit-card__item__right">
                    {!! isset($item) ? $item->short_note_en : null !!}
				</div>
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Текст на английском:
				</div>
				<div class="admin-edit-card__item__right">
                    {!! isset($item) ? $item->note_en : null !!}
				</div>
			</div>
		</div>
	</div>

</div>

@endsection
