@extends('layout')

@section('title', $title)
@section('header_class', 'video-header second-page-header' )

@section('top_panel')
    @include('include.top_panel_second')
@endsection


@section('top_block')
    @include('front.index.include.top_block')
    <div class="middle-icon position-absolute">
        @include('front.index.include.middle_icon')
    </div>
@endsection

@section('content')
    <!-- Content ================================================== -->
         <div class="container margin_60">
             <div class="main_title">
                 <h2 class="nomargin_top" style="padding-top:0">Как это работает</h2>
                 {{--<p>--}}
                     {{--Cum doctus civibus efficiantur in imperdiet deterruisset.--}}
                 {{--</p>--}}
             </div>
             <div class="row">
                 <div class="col-md-3">
                     <div class="box_home" id="one">
                         <span>1</span>
                         <h3>Введите адрес</h3>
                         <p>
                             Поиск заведений радом с Вами.
                         </p>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="box_home" id="two">
                         <span>2</span>
                         <h3>{{ $translator->getTrans('select_restoran') }}</h3>
                         <p>
                             У нас зарегестрированно более 100 ресторанов.
                         </p>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="box_home" id="three">
                         <span>3</span>
                         <h3>{{ $translator->getTrans('reserve_meal') }}</h3>
                         <p>
                             It's quick, easy and totally secure.
                         </p>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="box_home" id="four">
                         <span>4</span>
                         <h3>{{ $translator->getTrans('food_will_come') }}</h3>
                         <p>
                             You are lazy? Are you backing home?
                         </p>
                     </div>
                 </div>
             </div><!-- End row -->

             <div id="delivery_time" class="hidden-xs">
                 <strong><span>2</span><span>0</span></strong>
                 <h4>минут обычно уходит на доставку!</h4>
             </div>
         </div><!-- End container -->

    <div class="white_bg">
        <div class="container margin_60">
            <div class="main_title margin_mobile">
                <h2 class="nomargin_top">{{ $translator->getTrans('week_offer') }}</h2>
            </div>
            <div class="row">
                @foreach ($help_article as $a)
                    <div class="col-md-4">
                        <a href="/show/{{ $a->alias }}" class="box_work">
                            @if ($a->photo)
                                <img src="{{ $a->photo }}" alt="" style='width: 100%;' class="img-responsive">
                            @endif
                            <h3>{{ $a->title_trans }}</h3>
                            <div style="height: 120px;">{!! $a->short_note_trans !!}</div>
                            <div class="btn_1">Читать далее</div>
                        </a>
                    </div>
                @endforeach
            </div><!-- End row -->
        </div><!-- End container -->
    </div>

    <div class="container margin_60">
        <div class="main_title margin_mobile">
            <h2 class="nomargin_top">{{ $translator->getTrans('sales') }}</h2>
        </div>
        <div class="row">
            @foreach ($news as $a)
                <div class="col-md-4">
                    <a href="/show/{{ $a->alias }}" class="box_work">
                        @if ($a->photo)
                            <img src="{{ $a->photo }}" alt="" style='width: 100%;' class="img-responsive">
                        @endif
                        <h3>{{ $a->title_trans }}</h3>
                        <div style="height: 120px;">{!! $a->short_note_trans !!}</div>
                        <div class="btn_1">Читать далее</div>
                    </a>
                </div>
            @endforeach
        </div><!-- End row -->
    </div><!-- End container -->

    <div class="high_light">
        @include('front.index.include.about')
    </div><!-- End hight_light -->

</div>


@endsection
