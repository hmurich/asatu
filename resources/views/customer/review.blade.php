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
                <form action="{{ $action }}" method="post">
    				<div class="admin-edit__left admin-edit__item">
    					<div class="admin-edit-card__item">
    						<div class="admin-edit-card__item-left">
    							Рэйтинг
    						</div>
    						<div class="admin-edit-card__item__right">
                                <select name='raiting'>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
    						</div>
    					</div>
    					<div class="admin-edit-card__item">
    						<div class="admin-edit-card__item-left">
    							Отзыв
    						</div>
    						<div class="admin-edit-card__item__right">
                                <textarea name='note'></textarea>
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
    				</div>
    				
                </form>
			</div>
		</div>
	</div>
</div>

@endsection
