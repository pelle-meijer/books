@extends('layouts.showtemp')
@section('content')
<div id="app">
    @if($store)
    <store-stat-view :stat="{{ json_encode($store) }}" :dates="{{ json_encode($dates) }}"></store-stat-view>
    @endif
    <stat-view :stats="{{ json_encode($stats) }}"></stat-view>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection