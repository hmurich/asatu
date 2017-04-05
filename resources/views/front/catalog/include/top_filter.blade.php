<div class="restaurants-filtr">
    <form action='{{ action('Front\CatalogController@postAddress') }}' method="post">
        <div class="restaurants-filtr__item restaurants-filtr__item-city">
            <span>{{ $location->address }}</span>
            <a href='#modal_change_address' class="button restaurants-filtr__button--city open_modal" >
                изменить
            </a>
        </div>
    </form>

    <form action='{{ action('Front\CatalogController@getList') }}' method="get">
        <div class="restaurants-filtr__item restaurants-filtr__item--bot">
            <input type="text" name='name' value='{{ (isset($ar_input["name"]) ? $ar_input["name"] : null) }}' placeholder="Введите ресторан	" required="">
            <button class="button restaurants-filtr__button" type='submit'>
                найти
            </button>
        </div>
    </form>
</div>
