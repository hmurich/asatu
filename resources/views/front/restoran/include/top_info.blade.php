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
        {{ ($restoran->is_open ? $translator->getTrans('open') : $translator->getTrans('close')) }}
    </div>
</div>
<div class="restaurant-info ">
    <div class="restaurant-info__item restaurant-info__item-second-page">
        {{ $translator->getTrans('del_cost') }}: <span>{{ ( $restoran->relData->delivery_price ? $restoran->relData->delivery_price.' тг': "Бесплатно") }}</span>
    </div>
    <div class="restaurant-info__item restaurant-info__item-second-page">
        {{ $translator->getTrans('del_time') }}:  <span>
            @if (isset($ar_delivery[$restoran->id]) && $ar_delivery[$restoran->id])
                {{ $ar_delivery[$restoran->id][0] }}
            @else
                30 минут
            @endif
            </span>
    </div>
    <div class="restaurant-info__item restaurant-info__item-second-page">
        {{ $translator->getTrans('pay_title') }}: <span>{{ $translator->getTrans('cash') }}, {{ ($restoran->epay ? 'онлайн' : null) }}</span>
    </div>
    @if (isset($sale) && $sale)
        <div class="restaurant-info__item restaurant-info__item-second-page">
            Акция:
            <span>{!! $sale->note_trans !!}</span>
        </div>
    @endif
</div>
