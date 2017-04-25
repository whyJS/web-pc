<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>顺道嘉合作商铺分布</title>
    <link rel="stylesheet" href="http://cache.amap.com/lbs/static/main1119.css"/>
    <style>
        .marker {
            color: #ff6600;
            padding: 4px 10px;
            border: 1px solid #fff;
            white-space: nowrap;
            font-size: 12px;
            font-family: "";
            background-color: #0066ff;
        }
    </style>
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://webapi.amap.com/maps?v=1.3&key=82648f3c6ec98b0393858477b333499d"></script>
    <script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script>
</head>

<body>
<div id="container"></div>
<script>
    var infoWindow, map = new AMap.Map("container", {
        resizeEnable: true,
        mapStyle: 'blue_night',
        center: [116.582899, 39.90765],
        zoom: 13
    });
    //添加点标记，并使用自己的icon
    //    new AMap.Marker({
    //        map: map,
    //        position: [116.405467, 39.907761],
    //        icon: new AMap.Icon({
    //            size: new AMap.Size(40, 50),  //图标大小
    //            image: "http://webapi.amap.com/theme/v1.3/images/newpc/way_btn2.png",
    //            imageOffset: new AMap.Pixel(0, -60)
    //        })
    //    });
    //    new AMap.Marker({
    //        map: map,
    //        position: [116.405267, 39.907561],
    //        icon: new AMap.Icon({
    //            size: new AMap.Size(40, 50),  //图标大小
    //            image: "http://webapi.amap.com/theme/v1.3/images/newpc/way_btn2.png",
    //            imageOffset: new AMap.Pixel(0, -60)
    //        })
    //    });

    var xxx = 0;
    var markers = [];
    var id = [];

    // 弹窗
    function openInfo(lng, lat, headPic, name, addr) {
        //构建信息窗体中显示的内容
        var info = [];
        if ( headPic.length > 1 ) {
            info.push("<div><div style='display: block'><img src=\"" + headPic + "\" height=\"400\" /></div>");
        }
        info.push("<div style=\"padding:0px 0px 0px 4px;\"><b>" + name + "</b>");
        info.push("地址 :" + addr + "</div></div>");
        infoWindow = new AMap.InfoWindow({
            content: info.join("<br/>")  //使用默认信息窗体框样式，显示信息内容
        });
        infoWindow.open(map, [lng, lat]);
    }
    AMap.event.addListener(map,'click',function () {
        if (typeof infoWindow === "object"){
            infoWindow.close();
        }
    });

    function sdjdt() {

        $.ajax({
            url: "<?= \yii\helpers\Url::toRoute('/site/get-map-info-shop')?>",
            type: 'post',
            data: {num: xxx, _csrf: "<?= \Yii::$app->request->getCsrfToken() ?>"},
            dataType: "json",
            success: function (e) {
                var time1 = 0;
                var json = e.data;
                (function loop(index) {
                    if (json.length == 0) {
                        xxx++;
                        sdjdt();
                    } else {
                        if (json.createTime == -100000000) {
                            xxx = 0;
                            map.remove(markers);
                            sdjdt();
                        } else {

                            time1 = json[index].createTime;

                            var marker = new AMap.Marker({
                                map: map,
                                position: [json[index].lontitude, json[index].latitude],
                                icon: new AMap.Icon({
                                    size: new AMap.Size(40, 50), //图标大小
                                    image: "http://webapi.amap.com/theme/v1.3/images/newpc/way_btn2.png",
                                    imageOffset: new AMap.Pixel(0, -60)
                                })
                            });
                            //弹窗
                            AMap.event.addListener(marker, "click", function () {
                                if (typeof infoWindow === "object") {
                                    infoWindow.close();
                                }
                                openInfo(json[index-1].lontitude, json[index-1].latitude, json[index-1].headPic, json[index-1].name, json[index-1].locaddress);
                            });
                            markers.push(marker);
                            setTimeout(function () {
                                if (++index < json.length) {

                                    loop(index);
                                } else {

                                    xxx++;
                                    sdjdt();

                                }
                            }, 800);

                        }
                    }

                })(0);

            }
        });
    }
    map.on("complete",function () {
        sdjdt();
    });
</script>
</body>

</html>