@extends('admin.layout')

@section('title', $title)

@section('content')

<div class="admin-content__body">
	<form action="" method='get' class="admin-search-form">
		<div class="admin-search-form__item input-search">
            <input type='text' name='filter[id]' value='{{ $ar_input["filter"]["id"] or null }}' placeholder="id">
		</div>
        <div class="admin-search-form__item select-search">
			<select name="filter[type_id]">
				<option value="0">Тип страницы</option>
                @foreach($ar_type as $id=>$name)
                    @if (isset($ar_input["filter"]["type_id"]) &&  $ar_input["filter"]["type_id"] == $id)
                        <option value="{{ $id }}" selected="selected">{{ $name }}</option>
                    @else
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endif
                @endforeach
			</select>
		</div>
        <div class="admin-search-form__item input-search">
            <input type='text' name='filter[alias]' value='{{ $ar_input["filter"]["alias"] or null }}' placeholder="Альяс">
		</div>
        <div class="admin-search-form__item input-search">
            <input type='text' name='filter[title]' value='{{ $ar_input["filter"]["title"] or null }}' placeholder="Заголовок">
		</div>
		<div class="admin-search-form__item button-search">
			<button class="button">приминить фильтр</button>
		</div>
	</form>
	<table border="1">
	    <tr>
	        <th>id</th>
            <th>Тип</th>
	        <th>Альяс</th>
	        <th>Заголовок</th>
            <th>Создан</th>
	        <th>
                <a href='{{ action("Admin\PageController@getEdit") }}'>+</a>
            </th>
	    </tr>
        @foreach($items as $i)
    	    <tr>
    	        <td>{{ $i->id }}</td>
                <td>
                    @if (isset($ar_type[$i->type_id]))
                        {{ $ar_type[$i->type_id] }}
                    @else
                        не указано
                    @endif
                </td>
    	        <td>{{ $i->alias }}</td>
    	        <td>{{ $i->title }}</td>
                <td>{{ $i->created_at }}</td>
    	        <td>
                    <a href="{{ action("Admin\PageController@getShow", $i->id) }}" class="table-item show show-icon">
                        show
    				</a>
    	        	<a href="{{ action("Admin\PageController@getEdit", $i->id) }}" class="table-item edit edit-icon">
    				</a>
                    <a href="{{ action("Admin\PageController@getDelete", $i->id) }}" class="table-item delete delete-icon">
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
