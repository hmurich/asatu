@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
	<form action="" class="admin-search-form add-form">
		<div class="admin-search-form__item input-search">
			<input type='text' name='filter[name]' value='{{ $ar_input["filter"]["name"] or null }}' placeholder="Поиск ...">
		</div>
		<div class="admin-search-form__item button-add">
			<input type="submit" class='button' value="приминить фильтр">
		</div>
	</form>
	<div class="table-container">
		<table border="1">
		    <tr>
		        <th>ID</th>
                <th>Ф.И.О.</th>
		        <th>Email</th>
		        <th>Телефон</th>
		        <th>Адрес</th>
		        <th>Общая сумма заказов</th>
		        <th>Средняя сумма заказов</th>
		        <th>Кол-во заказов</th>
		        <th>Создан</th>
		    </tr>
            @foreach ($items as $i)
    		    <tr>
    		        <td>{{ $i->id }}</td>
                    <td>{{ $i->name }}</td>
    		        <td>{{ $i->relUser->email }}</td>
    		        <td>{{ $i->phone }}</td>
    		        <td>{{ $i->full_address }}</td>
    		        <td>{{ $i->relOrders()->sum('total_sum') }}</td>
    		        <td>{{ round($i->relOrders()->avg('total_sum')) }}</td>
    		        <td>{{ $i->relOrders()->count() }}</td>
    		        <td>{{ $i->created_at }}</td>
    		    </tr>
            @endforeach
			<tr>
				<td colspan=12>{!! $items->appends(Input::all())->render() !!}</td>
			</tr>
		</table>
	</div>
</div>


@endsection
