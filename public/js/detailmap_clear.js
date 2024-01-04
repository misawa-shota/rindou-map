// マップの作成 ///////////////////////////////////////////////////////////////////////
var mymap = new L.map('map', {
    fullscreenControl: true,
    fullscreenControlOptions: {
        position: 'topleft',
        title: 'フルスクリーン表示',
        titleCancel: '通常表示に戻す',
    },
    drawControl: true
}).setView([37.508106, 139.930239], 13);
/////////////////////////////////////////////////////////////////////////////////////


// タイルレイヤー ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 地理院タイル
var gsi = L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
    minZoom: 2,
    maxZoom: 18,
    attribution: '<a href="https://maps.gsi.go.jp/development/ichiran.html" target="_blank">地理院タイル</a>',
});

// 地理院写真
var gsiphoto = L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/seamlessphoto/{z}/{x}/{y}.jpg', {
    minZoom: 2,
    maxZoom: 18,
    attribution: '<a href="http://portal.cyberjapan.jp/help/termsofuse.html" target="_blank">地理院写真</a>',
});

// OpenStreetMap
var osm = L.tileLayer('https://{s}.tile.openstreetmap.jp/{z}/{x}/{y}.png', {
    attribution: '<a href="http://osm.org/copyright" target="_blank">OpenStreetMap</a>contributors',
});

// google航空写真
var GmapsHYB = L.gridLayer.googleMutant({
    minZoom: 5,
    type: 'hybrid',
});

// google地形地図
var GmapsTER = L.gridLayer.googleMutant({
    minZoom: 5,
    type: 'terrain',
});

// タイル切り替えボタン
var baseMaps = {
    "地理院地図": gsi,
    "地理院写真": gsiphoto,
    "O.S.Map": osm,
    "Google航空写真": GmapsHYB,
    "Google地形地図": GmapsTER,
};

L.control.layers(baseMaps).addTo(mymap);
gsi.addTo(mymap);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// 林道のアイコン //////////////////////////////////////////////////////////////////////////////////////////////////////////
var icon = L.icon({
    iconUrl: 'https://rindou-map.s3.ap-northeast-1.amazonaws.com/img/icon.svg',
    iconSize: [38, 38]
});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// 走行済みの林道のアイコン //////////////////////////////////////////////////////////////////////////////
var clearIcon = L.icon({
    iconUrl: 'https://rindou-map.s3.ap-northeast-1.amazonaws.com/img/clear_stamp.png',
    iconSize: [38, 38]
});
//////////////////////////////////////////////////////////////////////////////////////////////


// マップ上に林道のマーカーを表示 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var cluster = L.markerClusterGroup();
for(var i = 0; i < markers.length; i++) {

    // マーカーをクリックした時にそのマーカーに対応するpolylineをマップ上に描画する関数 ////////////////////////////
    function setClickEvent(marker, $points, pointName) {
        marker.on('click', function(){
            $points = JSON.parse($points);
            var latlngs = [$points];
            var polyline = L.polyline(latlngs, {color: 'red'}).bindPopup(pointName, {autoClose: false}).openPopup().addTo(mymap);
            mymap.fitBounds(polyline.getBounds());
        });
    };
    ////////////////////////////////////////////////////////////////////////////////////////////////////


    // マーカーをクリックした時に表示する吹き出し /////////////////////////////////////////////////////////////
    var markerPopup = L.popup();
    const url = 'https://rindou-map-a6e1b467f031.herokuapp.com/rindous/';
    const params = '?prefecture=';
    markerPopup.setContent(
        "<a href='" + url + markers[i].id + params + markers[i].prefecture + "'>" + markers[i].name + "</a>"
    );
    ////////////////////////////////////////////////////////////////////////////////////////////////////


    const checkResult = clearList.some(function(clear) {
        return clear.rindou_id == markers[i].id;
    });

    if(checkResult) {
        marker = L.marker(
            [markers[i].lat, markers[i].lng],
            {icon: clearIcon}
        )
        .bindPopup(markerPopup);
    } else {
        marker = L.marker(
            [markers[i].lat, markers[i].lng],
            {icon: icon}
        )
        .bindPopup(markerPopup);
    }

    cluster.addLayer(marker);


    $points = markers[i].polyline_latlngs;
    var pointName = markers[i].name;

    setClickEvent(marker, $points, pointName);
}
mymap.addLayer(cluster);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// 詳細ページの地点を初期値として表示 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (rindou) {
    $polyline = JSON.parse(rindou.polyline_latlngs);
    let polyline = [$polyline];
    L.polyline(polyline, {color: 'red'}).bindPopup(rindou.name, {autoClose: false}).openPopup().addTo(mymap);
    mymap.setView([rindou.lat, rindou.lng], 16);
}
