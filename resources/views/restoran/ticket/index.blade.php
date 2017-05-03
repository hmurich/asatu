@extends('restoran.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">

	<div class="table-container">
		<table border="1">
		    <tr>
		        <th>ID</th>
                <th>Статус</th>
		        <th>Заголовок</th>
		        <th>Описание</th>
                <th><a href='#modal_add_ticket' class='open_modal' >+</a></th>
		    </tr>
            @foreach ($tickets as $o)
    		    <tr>
    		        <td>{{ $o->id }}</td>
                    <td>{{ $ar_status[$o->status_id] }}</td>
    		        <td>{{ $o->title }}</td>
    		        <td>{{ $o->note }}</td>
    		        <td>{{ $o->created_at }}</td>
    		    </tr>
            @endforeach
		</table>
	</div>
</div>


<div id="modal_add_ticket" class="modal_div registar-zav"> <!-- скрытый див с уникальным id = modal1 -->
    <span class="modal_close"></span>
    <div class="modal-title">Добавить запрос</div>

    <form  action="{{ $action }}" method="post" >
        <div class="form-modal">
            <div class="modal-input__container ">
                <input type="text" name="title" required="required" placeholder="Заголовок" class="modal-input ">
            </div>
        </div>
        <div class="form-modal">
            <div class="modal-input__container ">
                <textarea name='note' placeholder="Описание" required="required" class="modal-input "></textarea>
            </div>
        </div>

        <div class="modal-button-container">
            <button class="modal-button button">
                Послать
            </button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>

@endsection
