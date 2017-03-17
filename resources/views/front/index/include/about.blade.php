@if ($about)
    <div class="title">
        <h2 class="title-item">{{ $about->title_trans }}</h2>
    </div>
    {!! $about->short_note_trans !!}
@endif
