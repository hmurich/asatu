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
                    Email:
                </div>
                <div class="admin-edit-card__item__right">
                    <input type="email" name='email' placeholder="Email" value='{{ isset($item) ? $item->reluser->email : null }}' readonly="">
                </div>
            </div>
			<div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Фамилия:
				</div>
				<div class="admin-edit-card__item__right">
					<input type="text" name='s_name' placeholder="Фамилия" value='{{ isset($item) ? $item->s_name : null }}' readonly="">
				</div>
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Имя:
				</div>
				<div class="admin-edit-card__item__right">
					<input type="text" name='f_name' placeholder="Имя" value='{{ isset($item) ? $item->f_name : null }}' readonly="">
				</div>
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Отчество:
				</div>
				<div class="admin-edit-card__item__right">
					<input type="text" name='p_name' placeholder="Отчество" value='{{ isset($item) ? $item->p_name : null }}' readonly>
				</div>
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Телефон:
				</div>
				<div class="admin-edit-card__item__right">
					<input type="text" name='phone' placeholder="Телефон" value='{{ isset($item) ? $item->phone : null }}' readonly="">
				</div>
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Адресс:
				</div>
				<div class="admin-edit-card__item__right">
					<input type="text" name='address' placeholder="Адресс" value='{{ isset($item) ? $item->address : null }}' readonly>
				</div>
			</div>
            <div class="admin-edit-card__item">
				<div class="admin-edit-card__item-left">
					Заметка:
				</div>
				<div class="admin-edit-card__item__right">
                    <input type="text" name='note' placeholder="Заметка" value='{{ isset($item) ? $item->note : null }}' readonly>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection
