@extends('layout')

@section('body_class', 'second-page')
@section('title', $title)
@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
@endsection

@section('content')
    <?php
        $img = $restoran->photo ? $restoran->photo : '/img/restaurant-big.jpg';
    ?>

    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?=$img?>" data-natural-width="1170" data-natural-height="250">
        <div id="subheader">
            <div id="sub_content" class="zoomIn">
                <h1>{{ $restoran->name }}</h1>
                <div class="rating">{!! $restoran->generateHtmlStar() !!} (<small><a>{{ $restoran->raiting }}/5</a></small>)</div>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('front.restoran.include.top_info')
            </div>
        </div>
        <br />
		<div class="row">

			<div class="col-md-3">
                <p><a href="/catalog/list" class="btn_side">Вернуться к поиску</a></p>
                <div class="box_style_1">@include('front.restoran.include.nav')</div>
                <div class="box_style_2 hidden-xs">
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
                            {{ $translator->getTrans('pay_title') }}: <span>{{ $translator->getTrans('cash') }} {{ ($restoran->epay ? ', онлайн' : null) }}</span>
                        </div>
                        @if (isset($sale) && $sale)
                            <div class="restaurant-info__item restaurant-info__item-second-page">
                                Акция:
                                <span>{!! $sale->note_trans !!}</span>
                            </div>
                        @endif
                    </div>
                </div>
			</div><!-- End col-md-3 -->

			<div class="col-md-6">
				<div class="box_style_2" id="main_menu">
					<h2 class="inner">Меню</h2>
                        <?php $cat_id = 0; ?>
                        @forelse ($items as $i)
                        @if ($cat_id != $i->cat_id)
                            @if ($cat_id != 0)
                                </tbody>
                            </table>
                            @endif
                            <h3>{{ $ar_menu_type[$i->cat_id] }}</h3>
                            <p>{{ $ar_menu_type_sadasdas[$i->cat_id] }}</p>

                            <table class="table table-striped cart-list" id='astaasdkalsjdkjahsd_{{ $i->cat_id }}'>
                                <thead>
                                <tr>
                                    <th>
                                        Наименование
                                    </th>
                                    <th>
                                        {{ $translator->getTrans('Price') }}
                                    </th>
                                    <th>
                                        Заказать
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                            <?php $cat_id = $i->cat_id; ?>
                        @endif
                            <tr>
                                <td>
                                    <figure class="thumb_menu_list">
                                        @if ($i->photo)
                                            <img src="{{ $i->photo }}" alt="">
                                        @else
                                            <img src="/images/restaurant.png" alt="">
                                        @endif
                                    </figure>
                                    <h5>{{ $i->title }}</h5>
                                    <p>{!! $i->note !!}</p>
                                </td>
                                <td>
                                    <strong>
                                        <span>{{ $i->cost_item }} тг</span>
                                    </strong>
                                </td>
                                <td class="options">
                                    <div class="product-item-count">
                                        <div class="product-item-count-item js-min hover-but"> - </div>
                                        <div class="product-item-count-item count">
                                            <span class="js-count">
                                                @if ($busket && isset($busket[$i->id]))
                                                    {{ $busket[$i->id]['count'] }}
                                                @else
                                                    1
                                                @endif
                                            </span> шт
                                            <input  type="hidden"
                                                    class="js-count-input js_menu_item_{{ $i->id }}"
                                                    value="{{ ($busket && isset($busket[$i->id]) ? $busket[$i->id]['count'] : 1) }}"
                                                    data-id='{{ $i->id }}'
                                                    data-cost='{{ $i->cost_item }}'
                                                    data-restoran_id='{{ $i->restoran_id }}'
                                                    data-title='{{ $i->title }}'
                                                    data-cat='{{ $ar_menu_type[$i->cat_id] }}' />
                                        </div>
                                        <div class="product-item-count-item js-plus hover-but"> + </div>
                                        <button class="btn btn-default product-item__button js_add_menu_item" data-id='{{ $i->id }}'>
                                            {{ $translator->getTrans('zakaz') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <p>По вашему запросу не найдено блюд</p>
                                <table>
                                    <tbody>
                            @endforelse
                                </tbody>
                            </table>
				</div><!-- End box_style_1 -->
			</div><!-- End col-md-6 -->

			<div class="col-md-3" id="sidebar">
                <div class="theiaStickySidebar">
                    @include('front.restoran.include.side_bar_menu')
                </div><!-- End theiaStickySidebar -->
            </div><!-- End col-md-3 -->

        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->




@endsection
