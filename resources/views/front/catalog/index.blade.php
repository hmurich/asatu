@extends('layout')
@section('title', $title)
@section('body_class', 'second-page')
@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
@endsection

@section('top_block')
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_short.jpg" data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>{{ count($items) }} {{ Lang::choice('объект найден|объекта найдено|объектов найдено', count($items), [], 'ru') }}</h1>

                <div><i class="icon_pin"></i> <span>Ваше местоположение: {{ (isset($ar_city[$location->city_id]) ? $ar_city[$location->city_id].',' : null) }} {{ $location->address }}</span></div>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

    <link href="/new/css/skins/square/grey.css" rel="stylesheet">
    <link href="/new/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="/new/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" >
@endsection


@section('content')
    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#0">Home</a></li>
                <li><a href="#0">Category</a></li>
                <li>Page active</li>
            </ul>
            <a href="#0" class="search-overlay-menu-btn"><i class="icon-search-6"></i> Search</a>
        </div>
    </div><!-- Position -->

    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div><!-- End Map -->
    <div class="container margin_60_35">
	<div class="row">

		<div class="col-md-3">
            @include('front.catalog.include.side_bar')
		</div><!--End col-md -->

		<div class="col-md-9">
          <div id="tools">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-6">
                        <a href='?sort_name=count_view&sort_asc=0'>По просмотрам</a>
					</div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a href='?sort_name=raiting&sort_asc=0'>по рейтингу</a>
					</div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a href='?sort_name=price&sort_asc=1'>По мин цене заказа</a>
					</div>
				</div>
			</div><!--End tools -->
            @foreach ($items as $i)
                <?php /*
                @if(!(strtotime($i->betin_time) <= time() && strtotime($i->end_time) > time()))
                    <?php continue; ?>
                @endif */ ?>
                    <div class="strip_list wow fadeIn {{ ($i->is_gold ? 'gold' : null) }} {{ (!$i->is_gold && $i->is_platinum ? 'premium' : null) }}" data-wow-delay="0.3s">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <div class="desc">
                                    <div class="thumb_strip">
                                        <a href="#">
                                            @if ($i->logo && false)
                                                <img src="{{ $i->logo }}" alt="">
                                            @else
                                                <img src="/images/restaurant.png" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="rating">
                                        {!! $i->generateHtmlStar() !!}
                                        (<small>{{ $i->raiting }}/5</small>)
                                    </div>
                                    <h3 class="{{ (!$i->is_open ? 'closed' : null) }}">{{ $i->name }}</h3>
                                    <div class="type">
                                        <span>Кухня : </span>
                                        <?php
                                            $ar_kithen = $i->relKitchens()->select('kitchen_name')->get()->keyBy('kitchen_name')->toArray();
                                            $ar_kithen = array_keys($ar_kithen);
                                        ?>
                                        {{ implode('/ ', $ar_kithen) }}
                                    </div>
                                    <div class="location">
                                        Мин.заказ <span>{{ $i->relData->min_price }} тг</span>
                                    </div>
                                    <ul>
                                        <li>
                                            {{ $translator->getTrans('deliv_time') }}
                                            <span>
                                                @if (isset($ar_delivery[$i->id]) && $ar_delivery[$i->id])
                                                    {{ $ar_delivery[$i->id][0] }}
                                                @else
                                                    30 минут
                                                @endif
                                            </span>
                                            <i class="icon_check_alt2 ok"></i>
                                        </li>
                                        <li>
                                            Доставка:
                                            <span>
                                                @if (isset($ar_delivery_price[$i->id][0]) && $ar_delivery_price[$i->id][0])
                                                    {{ $ar_delivery_price[$i->id][0] }} тг
                                                @else
                                                    Бесплатно
                                                @endif
                                            </span>
                                        </li>
                                        <li>
                                            Самовывоз:
                                            <span>
                                                @if ($i->self_remote)
                                                    есть
                                                @else
                                                    нет
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="go_to">
                                    <div>
                                        <a href="{{ action('Front\Restoran\MenuController@getList', $i->id) }}" class="btn_1 button restaurants-filtr__button">
                                            {{ $translator->getTrans('eat_me') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End row-->
                    </div><!-- End strip_list-->
            @endforeach
		</div><!-- End col-md-9-->

	</div><!-- End row -->
</div><!-- End container -->


@include('front.catalog.include.modal_change_address')
@endsection
