@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">

	<div class="table-container">
		<table border="1">
		    <tr>
		        <th>ID</th>
                <th>Статус</th>
                <th>Ресторан</th>
		        <th>Заголовок</th>
		        <th>Описание</th>
                <th>Email</th>
                <th>Создан</th>
                <th></th>
		    </tr>
            @foreach ($tickets as $o)
    		    <tr>
    		        <td>{{ $o->id }}</td>
                    <td>{{ $ar_status[$o->status_id] }}</td>
                    <td>{{ $o->relRestoran->name }}</td>
    		        <td>{{ $o->title }}</td>
    		        <td>{{ $o->note }}</td>
                    <td>{{ $o->relUser->email }}</td>
    		        <td>{{ $o->created_at }}</td>
                    <td>
                        @if ($o->status_id == 0)
                            <a href='{{ action("Admin\TicketController@getChangeStatus", array($o->id, 1)) }}'>В обработке</a>
                        @elseif ($o->status_id == 1)
                            <a href='{{ action("Admin\TicketController@getChangeStatus", array($o->id, 2)) }}'>Закрыть</a>
                        @endif
                    </td>
    		    </tr>
            @endforeach
		</table>
	</div>
</div>

@endsection
