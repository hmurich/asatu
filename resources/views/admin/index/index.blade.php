@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
	<form action="" class="admin-search-form">
		<div class="admin-search-form__item select-search">
			<select name="" id="">
				<option value="">город</option>
				<option value="">астана</option>
				<option value="">алматы</option>
			</select>
		</div>
		<div class="admin-search-form__item select-search">
			<select name="" id="">
				<option value="">статус заказа</option>
				<option value="">1</option>
				<option value="">2</option>
			</select>
		</div>
		<div class="admin-search-form__item select-search">
			<select name="" id="">
				<option value="">выбор доставки</option>
				<option value="">выбор доставки</option>
				<option value="">выбор доставки</option>
			</select>
		</div>
		<div class="admin-search-form__item input-search">
			<input type="search" placeholder="Поиск блюда...">
		</div>
		<div class="admin-search-form__item button-search">
			<button class="button">приминить фильтр</button>
		</div>
	</form>
	<div class="table-container">
	<table border="1">
	    <tr>
	        <th>Код</th>
	        <th>Город</th>
	        <th>Ф.И.О.</th>
	        <th>Способ оплаты</th>
	        <th>Ресторан</th>
	        <th>Сумма</th>
	        <th>Время</th>
	        <th>Ожидание</th>
	        <th>Статус</th>
	        <th></th>
	    </tr>
	    <tr>
	        <td>#3-451</td>
	        <td>Астана</td>
	        <td>Алферова Анастасия Ивановна</td>
	        <td>Наличными курьеру</td>
	        <td>Astana RestCity</td>
	        <td>23.500тг</td>
	        <td>22.02.2017   19.17</td>
	        <td>Предзаказ</td>
	        <td>3</td>
	        <td>
	        	<a href="" class="table-item edit edit-icon">
				</a>
			</td>
	    </tr>
	    <tr>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	    </tr>
	    <tr>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	    </tr>
	    <tr>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	    </tr>
	</table>
	</div>
</div>

@endsection
