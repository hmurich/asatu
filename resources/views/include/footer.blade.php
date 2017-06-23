<!-- Footer ================================================== -->
    <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-3">
                <h3>Secure payments with</h3>
                <p>
                    <img src="/new/img/cards.png" alt="" class="img-responsive">
                </p>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3>Страницы</h3>
                <ul>
                    <li><a href="/page/about/">{{ $translator->getTrans('about') }}</a></li>
                    <li><a href="/page/how-we-work/">{{ $translator->getTrans('how_we_work') }}</a></li>
                    <li><a href="#0" data-toggle="modal" data-target="#registr_restoran" class='open_modal'>{{ $translator->getTrans('registr_restoran') }}</a></li>
                </ul>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="#0"><i class="icon-facebook"></i></a></li>
                        <li><a href="#0"><i class="icon-twitter"></i></a></li>
                        <li><a href="#0"><i class="icon-google"></i></a></li>
                        <li><a href="#0"><i class="icon-instagram"></i></a></li>
                        <li><a href="#0"><i class="icon-pinterest"></i></a></li>
                        <li><a href="#0"><i class="icon-vimeo"></i></a></li>
                        <li><a href="#0"><i class="icon-youtube-play"></i></a></li>
                    </ul>
                    <p>
                        © Quick Food 2015
                    </p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    </footer>
    <!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->
{{--<footer class="footer">--}}
    {{--<div class="footer-inner">--}}
        {{--<ul class="footer-nav">--}}
            {{--<li>--}}
                {{--<a href="/page/about/">{{ $translator->getTrans('about') }}</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="/page/how-we-work/">{{ $translator->getTrans('how_we_work') }}</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#registr_restoran" class='open_modal'>{{ $translator->getTrans('registr_restoran') }}</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<ul class="footer-soc-seti">--}}
            {{--<li>--}}
                {{--<a href="{{ App\Model\SiteSetting::getNameByKey('vk') }}" >--}}
                    {{--<img src="/img/vk.png" alt="">--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{ App\Model\SiteSetting::getNameByKey('facebook') }}" >--}}
                    {{--<img src="/img/face.png" alt="">--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{ App\Model\SiteSetting::getNameByKey('instagramm') }}" >--}}
                    {{--<img src="/img/insta.png" alt="">--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<a href="/" class="footer-logo">--}}
            {{--<img src="/img/footer-logo.png" alt="">--}}
        {{--</a>--}}
        {{--<div class="footer-copyright">--}}
            {{--{{ $translator->getTrans('copyright') }}--}}
        {{--</div>--}}
        {{--<a href="/page/confidentiality/" class="footer-confidentiality">--}}
            {{--{{ $translator->getTrans('private_policy') }}--}}
        {{--</a>--}}
        {{--<a href="/page/agreement/" class="footer-agreement">--}}
            {{--{{ $translator->getTrans('user_agreement') }}--}}
        {{--</a>--}}
    {{--</div>--}}
{{--</footer>--}}
