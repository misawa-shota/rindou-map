@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="map"></div>
    </div>
    <script type="text/javascript">
        // コントローラーからjson形式のデータを取得
        var markers = {!! $json !!};
    </script>
@endsection
