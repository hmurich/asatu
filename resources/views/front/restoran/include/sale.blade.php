@if (isset($sale) && $sale)
    <h2>Акция</h2>
    {!! $sale->note_trans !!}
@endif
