<div class="restaurant-title">
    <span>{{ $restoran->name }}</span>
</div>
<div class="restaurant-img">
    @if ($restoran->photo)
        <img src="{{ $restoran->photo }}" alt="">
    @else
        <img src="/img/restaurant-big.jpg" alt="">
    @endif
</div>
<div class="restaurant-reiting-status ">
    <ul class="reiting restaurant-reiting">
        {!! $restoran->generateHtmlStar() !!}
        <div class="reiting-text">{{ $restoran->raiting }}/5</div>
    </ul>
    <div class="restaurant-status {{ ($restoran->is_open ? '' : 'close') }}">
        {{ ($restoran->is_open ? 'открыто' : 'закрыто') }}
    </div>
</div>
<div class="restaurant-info ">
    <div class="restaurant-info__item restaurant-info__item-second-page">
        Стомость доставки: <span>{{ ( $restoran->relData->delivery_price ? $restoran->relData->delivery_price.' тг': "Бесплатно") }}</span>
    </div>
    <div class="restaurant-info__item restaurant-info__item-second-page">
        Время доставки:  <span>{{ $restoran->relData->delivery_duration }} минут </span>
    </div>
    <div class="restaurant-info__item restaurant-info__item-second-page">
        Оплата: <span>Наличный, {{ ($restoran->epay ? 'онлайн' : null) }}</span>
    </div>
</div>
