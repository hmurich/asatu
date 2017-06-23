@if ($about)
    <div class="container">
        <h3>{{ $about->title_trans }}</h3>
        <p>{!! $about->short_note_trans !!}</p>
    </div><!-- End container -->
@endif
