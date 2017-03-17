@extends('admin.layout')

@section('title', $title)

@section('content')

<div class="admin-content__body">
	<form action="" method='get' class="admin-search-form">
		<div class="admin-search-form__item input-search">
            <input type='text' name='filter[id]' value='{{ $ar_input["filter"]["id"] or null }}' placeholder="id">
		</div>
        <div class="admin-search-form__item input-search">
            <input type='text' name='filter[sys_key]' value='{{ $ar_input["filter"]["sys_key"] or null }}' placeholder="Системный код">
		</div>
        <div class="admin-search-form__item input-search">
            <input type='text' name='filter[name]' value='{{ $ar_input["filter"]["name"] or null }}' placeholder="Наименование">
		</div>
        <div class="admin-search-form__item input-search">
            <input type='text' name='filter[note]' value='{{ $ar_input["filter"]["note"] or null }}' placeholder="Заметка">
		</div>
		<div class="admin-search-form__item button-search">
			<button class="button">приминить фильтр</button>
		</div>
	</form>
	<table border="1">
	    <tr>
	        <th>id</th>
	        <th>Системный код</th>
	        <th>Наименование</th>
	        <th>Заметка</th>
            <th>Создан</th>
	        <th>
                <a href='{{ action($action_class."@getEdit") }}'>+</a>
            </th>
	    </tr>
        @foreach($items as $i)
    	    <tr>
    	        <td>{{ $i->id }}</td>
    	        <td>{{ $i->sys_key }}</td>
    	        <td>{{ $i->name }}</td>
                <td>{{ $i->note }}</td>
                <td>{{ $i->created_at }}</td>
    	        <td>
    	        	<a href="{{ action($action_class."@getEdit", $i->id) }}" class="table-item edit edit-icon">
    				</a>
                    <a href="{{ action($action_class."@getDelete", $i->id) }}" class="table-item delete delete-icon">
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
