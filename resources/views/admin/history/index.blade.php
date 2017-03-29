@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
	<form action="" class="admin-search-form add-form">
		<div class="admin-search-form__item input-search">
			<input type="search" placeholder="Поиск ...">
		</div>
		<div class="admin-search-form__item button-add">
			<a href="" class="button">Скачать историю</a>
		</div>
	</form>
	<div class="table-container">
		<table border="1">
		    <tr>
		        <th>ID</th>
                <th>Ресторан</th>
                <th>Статус</th>
		        <th>Город</th>
		        <th>Ф.И.О.</th>
		        <th>Почта</th>
		        <th>Адрес</th>
		        <th>Способ оплаты</th>
		        <th>Итоговая сумма</th>
		        <th>Время оформления</th>
		        <th>Сумма </th>
		    </tr>
            @foreach ($orders as $o)
    		    <tr>
    		        <td>{{ $o->id }}</td>
                    <td>{{ $o->relRestoran->name }}</td>
                    <td>{{ $ar_status[$o->status_id] }}</td>
    		        <td>{{ $ar_city[$o->relRestoran->city_id] }}</td>
    		        <td>{{ $o->relCustomer->name }}</td>
    		        <td>{{ $o->relCustomer->relUser->email }}</td>
    		        <td>{{ $o->relCustomer->full_adress }}</td>
    		        <td>Наличными курьеру</td>
    		        <td>{{ $o->total_sum }}</td>
    		        <td>{{ $o->duration }}</td>
    		        <td>{{ $o->total_sum }}</td>
    		    </tr>
            @endforeach
		</table>
	</div>
</div>

@endsection
