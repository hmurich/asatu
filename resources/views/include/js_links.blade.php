<script type="text/javascript" src="{{ URL::asset('new/js/modernizr.js') }}" ></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    window.jQuery || document.write('<script type="text/javascript" src="/js/jquery-1.6.2.min.js"><\/script>');
</script>
<script type="text/javascript" src="{{ URL::asset('new/js/jquery-2.2.4.min.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('new/js/common_scripts_min.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('new/js/functions.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('new/assets/validate.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('new/js/video_header.js') }}" ></script>
<script src="{{ URL::asset('new/js/ion.rangeSlider.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.rating-2.0.min.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('js/range.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.fancybox.pack.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.timepicker.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('js/wow.min.js') }}" ></script>
<script type="text/javascript" src="{{ URL::asset('js/tab.js') }}" ></script>

<script type="text/javascript" src="{{ URL::asset('add/main.js') }}" ></script>

<script>
$(document).ready(function() {
	'use strict';
    HeaderVideo.init({
        container: $('.header-video'),
        header: $('.header-video--media'),
        videoTrigger: $("#video-trigger"),
        autoPlayVideo: true
    });

    $("#range").ionRangeSlider({
        hide_min_max: true,
        keyboard: true,
        min: 2000,
        max: 14000,
        from: 2000,
        to:14000,
        type: 'double',
        step: 1,
        prefix: "",
        postfix: ' тг.',
        grid: true
    });
});
</script>

<script>
    new WOW().init();
</script>
