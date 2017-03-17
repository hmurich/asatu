<footer class="footer">
    <div class="footer-inner">
        <ul class="footer-nav">
            <li>
                <a href="">{{ $translator->getTrans('about') }}</a>
            </li>
            <li>
                <a href="">{{ $translator->getTrans('how_we_work') }}</a>
            </li>
            <li>
                <a href="">{{ $translator->getTrans('registr_restoran') }}</a>
            </li>
        </ul>
        <ul class="footer-soc-seti">
            <li>
                <a href="" >
                    <img src="/img/vk.png" alt="">
                </a>
            </li>
            <li>
                <a href="" >
                    <img src="/img/face.png" alt="">
                </a>
            </li>
            <li>
                <a href="" >
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
        <a href="" class="footer-confidentiality">
            {{ $translator->getTrans('private_policy') }}
        </a>
        <a href="" class="footer-agreement">
            {{ $translator->getTrans('user_agreement') }}
        </a>
    </div>
</footer>
