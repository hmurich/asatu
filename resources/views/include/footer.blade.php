<footer class="footer">
    <div class="footer-inner">
        <ul class="footer-nav">
            <li>
                <a href="/page/about/">{{ $translator->getTrans('about') }}</a>
            </li>
            <li>
                <a href="/page/how-we-work/">{{ $translator->getTrans('how_we_work') }}</a>
            </li>
            <li>
                <a href="#registr_restoran" class='open_modal'>{{ $translator->getTrans('registr_restoran') }}</a>
            </li>
        </ul>
        <ul class="footer-soc-seti">
            <li>
                <a href="{{ App\Model\SiteSetting::getNameByKey('vk') }}" >
                    <img src="/img/vk.png" alt="">
                </a>
            </li>
            <li>
                <a href="{{ App\Model\SiteSetting::getNameByKey('facebook') }}" >
                    <img src="/img/face.png" alt="">
                </a>
            </li>
            <li>
                <a href="{{ App\Model\SiteSetting::getNameByKey('instagramm') }}" >
                    <img src="/img/insta.png" alt="">
                </a>
            </li>
        </ul>
        <a href="/" class="footer-logo">
            <img src="/img/footer-logo.png" alt="">
        </a>
        <div class="footer-copyright">
            {{ $translator->getTrans('copyright') }}
        </div>
        <a href="/page/confidentiality/" class="footer-confidentiality">
            {{ $translator->getTrans('private_policy') }}
        </a>
        <a href="/page/agreement/" class="footer-agreement">
            {{ $translator->getTrans('user_agreement') }}
        </a>
    </div>
</footer>
