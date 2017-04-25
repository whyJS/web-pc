<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
        <title>顺道嘉合作商铺分布</title>
        <link rel="stylesheet" href="http://cache.amap.com/lbs/static/main1119.css" />
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
        <script src="<?= \yii\helpers\Url::toRoute('/js/jquery-2.1.0.js')?>"></script>
        <script src="http://webapi.amap.com/maps?v=1.3&key=82648f3c6ec98b0393858477b333499d"></script>
        <script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script>
    </head>

    <body>
        <div id="container"></div>
        <script>
            var infoWindow,marker,map = new AMap.Map("container", {
                resizeEnable: true,
                mapStyle: 'blue_night',
                center: [116.582899, 39.90765],
                zoom: 13
            });
            $.ajax({
                url: "<?= \yii\helpers\Url::toRoute('/site/get-all-shop')?>",
                type: 'post',
                data: { _csrf: "<?= \Yii::$app->request->getCsrfToken() ?>",type:1 },
                dataType: "json",
                success: function(e) {
                    $(e).each(function (m,n) {
                        marker = new AMap.Marker({
                            map: map,
                            position: [n.lontitude, n.latitude],
                            icon: new AMap.Icon({
                                size: new AMap.Size(30, 30), //图标大小
                                image: "<?= \yii\helpers\Url::toRoute('/images/map/mark.png')?>",
                                imageOffset: new AMap.Pixel(0,0),
                            })

                        });

                        AMap.event.addListener(marker, 'click', function() {
                            if (typeof infoWindow === "object"){
                                infoWindow.close();
                            }
                            openInfo(n.name,n.lontitude,n.latitude,n.tel,n.locaddress,n.headPic);
                        });
                    })
                }
            });

            AMap.event.addListener(map,'click',function () {
                if (typeof infoWindow === "object"){
                    infoWindow.close();
                }
            });

            function openInfo(name,lon,lat,tel,addr,pic) {
                //构建信息窗体中显示的内容
                var info = [];
                info.push("<div><div><img src=\""+pic+"\" style=\"height: 300px;\" /></div>");
                info.push("<div style=\"padding:0px 0px 0px 4px;\"><b>"+name+"</b>");
                info.push("地址 :"+addr+"</div></div>");
                infoWindow = new AMap.InfoWindow({
                    content: info.join("<br/>")  //使用默认信息窗体框样式，显示信息内容
                });
                infoWindow.open(map, [lon,lat]);
            }
        </script>
    </body>

</html>