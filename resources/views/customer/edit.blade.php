@extends('layout')
@section('title', $title)

@section('body_class', 'second-page')


@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
@endsection

@section('content')

<div class="container">
	<div class="container-inner">
		<div class="admin-content">
			<div class="admin-edit-card ">
                <form action="" method="post">
    				<div class="admin-edit__left admin-edit__item">
    					<div class="admin-edit-card__item">
    						<div class="admin-edit-card__item-left">
    							ФИО
    						</div>
    						<div class="admin-edit-card__item__right">
    							<input name='name' type="text" placeholder="ФИО" value="{{ $customer->name }}">
    						</div>
    					</div>
    					<div class="admin-edit-card__item">
    						<div class="admin-edit-card__item-left">
    							Телефон
    						</div>
    						<div class="admin-edit-card__item__right">
    							<input name='phone' type="text" placeholder="Телефон" value="{{ $customer->phone }}">
    						</div>
    					</div>
    				</div>
    				<div class="admin-edit__right admin-edit__item">
    					<div class="admin-edit-card__item">
    						<div class="admin-edit-card__item-left">
    							Адрес
    						</div>
    						<div class="admin-edit-card__item__right">
    							<input name='address' type="text" placeholder="Адрес" value="{{ $customer->address }}">
    						</div>
    					</div>
    					<div class="admin-edit-card__item">
    						<div class="admin-edit-card__item-left">
    							Квартира
    						</div>
    						<div class="admin-edit-card__item__right">
    							<input name='kvartira' type="text" placeholder="Квартира" value="{{ $customer->kvartira }}">
    						</div>
    					</div>
    				</div>
    				<div class="admin-edit__bottom admin-edit__item">
    					<div class="admin-edit-card__item">
    						<div class="admin-edit-card__item-left">
    							Подъезд
    						</div>
    						<div class="admin-edit__bottom__right">
    							<input name='podezd' type="text" placeholder="Подъезд" value="{{ $customer->podezd }}">
    						</div>
    					</div>
    					<div class="admin-edit-card__item">
    						<div class="admin-edit-card__item-left">
    							Этаж
    						</div>
    						<div class="admin-edit__bottom__right">
    							<input name='etag' type="text" placeholder="Этаж" value="{{ $customer->etag }}">
    						</div>
    					</div>
    					<div class="admin-edit-card__item">
    						<div class="admin-edit-card__item-left">
    							Домофон
    						</div>
    						<div class="admin-edit__bottom__right">
    							<input name='domofon' type="text" placeholder="Домофон" value="{{ $customer->domofon }}">
    						</div>
    					</div>
    				</div>

    				<div class="admin-edit-card__item">
    					<div class="admin-edit-card__item-left">
    						<button class="button">
    							Сохранить
    						</button>
    					</div>
    				</div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
			</div>
		</div>
	</div>
</div>

@endsection
