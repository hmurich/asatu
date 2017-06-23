<h2>
    <span class="restaurant-status {{ ($restoran->is_open ? '' : 'close') }}">
        {{ ($restoran->is_open ? $translator->getTrans('open') : $translator->getTrans('close')) }}
    </span>
    <span>{{ $restoran->name }}</span>
</h2>
