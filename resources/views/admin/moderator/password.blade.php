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
                        Email:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="email" name='email' placeholder="Email" required="" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					Пароль:
    				</div>
    				<div class="admin-edit-card__item__right">
    					<input type="password" name='password' placeholder="Пароль" required="">
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
