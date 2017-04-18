<div class="restaurants-filtr">
    <form action='{{ action('Front\CatalogController@postAddress') }}' method="post">
        <div class="restaurants-filtr__item restaurants-filtr__item-city">
            <span>{{ $location->address }}</span>
            <a href='#modal_change_address' class="button restaurants-filtr__button--city open_modal" >
                {{ $translator->getTrans('change_2') }}
            </a>
        </div>
    </form>

    <form action='{{ action('Front\CatalogController@getList') }}' method="get">
        <div class="restaurants-filtr__item restaurants-filtr__item--bot">
            <input type="text" name='name' value='{{ (isset($ar_input["name"]) ? $ar_input["name"] : null) }}' placeholder="Введите ресторан	" required="">
            @if (isset($ar_input["name"]))
                <div class="sort-reiting">
                     Сортировка по рейтингу
                    <div class="sort-reiting__sub">
                         <a href='?name='.$ar_input["name"].'&sort_name=raiting&sort_asc=0'>Рэйтингу</a>
                         <a href='?name='.$ar_input["name"].'&sort_name=count_view&sort_asc=0'>Просмотрам</a>
                     </div>
                </div>
                <div class="sort-reiting">
                     Сортировка по цене
                    <div class="sort-reiting__sub">
                         <a href='?name='.$ar_input["name"].'&sort_name=price&sort_asc=1'>Цене, с малого</a>
                         <a href='?name='.$ar_input["name"].'&sort_name=price&sort_asc=0'>Цене, с большого</a>
                     </div>
                </div>
                
            @endif
            <div class="akci-checkbox">
                <input id="checkbox-akc" type="checkbox">
                <label for="checkbox-akc">С акцией</label>     
            </div>
            <button class="button restaurants-filtr__button" type='submit'>
                {{ $translator->getTrans('find') }}
            </button>
        </div>

    </form>
</div>
