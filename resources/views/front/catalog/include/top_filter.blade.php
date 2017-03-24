<div class="restaurants-filtr">
    <form action='{{ action('Front\CatalogController@postAddress') }}' method="post">
        <div class="restaurants-filtr__item restaurants-filtr__item-city">
            <span>{{ $location->address }}</span>
            <button class="button restaurants-filtr__button--city" type='button'>
                изменить
            </button>
        </div>
    </form>

    <form action='{{ action('Front\CatalogController@getList') }}' method="get">
        <div class="restaurants-filtr__item ">
            <input type="text" name='name' value='{{ (isset($ar_input["name"]) ? $ar_input["name"] : null) }}' placeholder="Введите ресторан	" required="">
            <button class="button restaurants-filtr__button" type='submit'>
                найти
            </button>
        </div>
    </form>
</div>
