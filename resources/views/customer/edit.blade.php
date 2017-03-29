@extends('layout')
@section('title', $title)

@section('top_block')
    @include('customer.include.top_block')
@endsection

@section('content')
<div class="middle-icon position-absolute">
    @include('front.index.include.middle_icon')
</div>


@endsection
