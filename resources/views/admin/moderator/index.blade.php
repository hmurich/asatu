@extends('admin.layout')

@section('title', $title)

@section('content')

<div class="admin-content__body">
	<form action="" method='get' class="admin-search-form">
		<div class="admin-search-form__item input-search">
            <input type='text' name='filter[email]' value='{{ $ar_input["filter"]["email"] or null }}' placeholder="Email">
		</div>
        <div class="admin-search-form__item input-search">
            <input type='text' name='filter[s_name]' value='{{ $ar_input["filter"]["s_name"] or null }}' placeholder="Фамилия">
		</div>
        <div class="admin-search-form__item input-search">
            <input type='text' name='filter[f_name]' value='{{ $ar_input["filter"]["f_name"] or null }}' placeholder="Имя">
		</div>
        <div class="admin-search-form__item input-search">
            <input type='text' name='filter[p_name]' value='{{ $ar_input["filter"]["p_name"] or null }}' placeholder="Отчество">
		</div>
		<div class="admin-search-form__item button-search">
			<button class="button">приминить фильтр</button>
		</div>
	</form>
	<table border="1">
	    <tr>
	        <th>id</th>
	        <th>Email</th>
	        <th>Ф.И.О.</th>
	        <th>Телефон</th>
	        <th>
                <a href='{{ action("Admin\ModeratorController@getEdit") }}'>+</a>
            </th>
	    </tr>
        @foreach($items as $i)
    	    <tr>
    	        <td>{{ $i->id }}</td>
    	        <td>{{ $i->relUser->email }}</td>
    	        <td>{{ $i->total_name }}</td>
    	        <td>{{ $i->phone }}</td>
    	        <td>
                    <a href="{{ action("Admin\ModeratorController@getShow", $i->id) }}" class="table-item show show-icon">
                        show
    				</a>
    	        	<a href="{{ action("Admin\ModeratorController@getEdit", $i->id) }}" class="table-item edit edit-icon">
    				</a>
                    <a href="{{ action("Admin\ModeratorController@getDelete", $i->id) }}" class="table-item delete delete-icon">
                        X
    				</a>
    			</td>
    	    </tr>
        @endforeach
        <tr>
            <td colspan=12>{!! $items->appends(Input::all())->render() !!}</td>
        </tr>
    </table>
</div>

@endsection
