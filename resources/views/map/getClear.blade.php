@extends('layouts.map_clear')

@section('content')
    <div class="container-xl my-5">
        <div id="map">
            <div class="rindou_name_search">
                <form action="#" class="d-flex" id="form">
                    <input type="text" placeholder="林道名で検索" id="rindou_name" name="rindou_name">
                    <input type="button" value="検索" id="index_button">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // コントローラーからjson形式のデータを取得
        var markers = {!! $rindouList !!};
        var clearList = {!! $clearList !!};
    </script>
@endsection
