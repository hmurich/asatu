@extends('admin.layout')

@section('title', $title)

@section('content')

<div class="admin-content__body">
	<table border="1">
	    <tr>
	        <th>id</th>
            <th>Название ресторана</th>
	        <th>Город</th>
	        <th>Имя</th>
            <th>Телефон</th>
            <th>Электронная почта</th>
            <th>Создан</th>
	        <th>
                
            </th>
	    </tr>
        @foreach($items as $i)
    	    <tr>
    	        <td>{{ $i->id }}</td>
    	        <td>{{ $i->name }}</td>
    	        <td>{{ $i->city }}</td>
                <td>{{ $i->fio }}</td>
                <td>{{ $i->phone }}</td>
                <td>{{ $i->email }}</td>
                <td>{{ $i->created_at }}</td>
    	        <td>
                    <a href="{{ action("Admin\RegistrRestoranController@getDelete", $i->id) }}" class="table-item delete delete-icon">
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
