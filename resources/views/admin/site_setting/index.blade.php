@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    <div class="restaurants-box" style='margin-left: 0px;'>
		<div class="admin-edit-card">
			<div class="admin-edit-card__title">
				{{ $title }}
			</div>
            <form action='{{ $action }}' method='post'>
                @foreach($ar_value as $key=>$value)
        			<div class="admin-edit-card__item">
        				<div class="admin-edit-card__item-left">
        					{{ (isset($ar_titles[$key]) ? $ar_titles[$key] : 'Заголовок не найден') }}:
        				</div>
        				<div class="admin-edit-card__item__right">
        					<input type="text" name='ar[{{ $key }}]' value='{{ $value }}'>
        				</div>
        			</div>
                @endforeach
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
    			<div class="admin-edit-card__item">
    				<div class="admin-edit-card__item-left">
    					<button class="button">
    						Сохранить
    					</button>
    				</div>
    			</div>
            </form>
		</div>
	</div>

</div>

@endsection
