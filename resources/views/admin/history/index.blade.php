@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
	<form action="" class="admin-search-form">
		<div class="admin-search-form__item select-search">
			<select name="filter[city_id]">
				<option value="0">Город</option>
                @foreach($ar_city as $id=>$name)
                    @if (isset($ar_input["filter"]["city_id"]) &&  $ar_input["filter"]["city_id"] == $id)
                        <option value="{{ $id }}" selected="selected">{{ $name }}</option>
                    @else
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endif
                @endforeach
			</select>
		</div>
		<div class="admin-search-form__item select-search">
			<select name="filter[status_id]">
				<option value="0">статус заказа</option>
                @foreach($ar_status as $id=>$name)
                    @if (isset($ar_input["filter"]["status_id"]) &&  $ar_input["filter"]["status_id"] == $id)
                        <option value="{{ $id }}" selected="selected">{{ $name }}</option>
                    @else
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endif
                @endforeach
			</select>
		</div>
		<div class="admin-search-form__item input-search">
			<input type='text' name='filter[r_name]' value='{{ $ar_input["filter"]["r_name"] or null }}' placeholder="Ресторан">
		</div>
		<div class="admin-search-form__item button-search">
			<input type='submit' name='download' class='button' value="скачать">
		</div>
		<div class="admin-search-form__item button-search">
			<input type='submit' name='filtered' class='button' value="приминить фильтр">
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
			<tr>
				<td colspan=12>{!! $orders->appends(Input::all())->render() !!}</td>
			</tr>
		</table>
	</div>
</div>

@endsection
