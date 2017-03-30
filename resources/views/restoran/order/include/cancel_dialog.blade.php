<div id="modal2222" class="modal_div"> <!-- скрытый див с уникальным id = modal1 -->
    <span class="modal_close"></span>
	<div class="modal-title">Выберите причину отказа ?</div>
	<ul class="cancel-list">
        @foreach ($ar_close_ar as $id=>$name)
            <li>
                <a href="{{ action('Restoran\OrderController@getChangeStatus', array($order->id, $status_cancel, $id)) }}" >
                    {{ $name }}
                </a>
            </li>
        @endforeach
	</ul>
</div>
