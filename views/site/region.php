<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
        <title>行政区数据联动</title>
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
    </head>

    <body>
        <div id="dropdown">
            <select name="province" onchange="getCity(this.value);" id="province">
                <option value="0">----省/直辖市/自治区----</option>
                <?php
                foreach ($data as $v){
                    echo '<option name="'.$v['adname'].'" value="'.$v['adcode'].'">'.$v['adname'].'</option>';
                }
                ?>
            </select>
            <select name="city" onchange="getAd(this.value);" id="city">
                <option value="0">----市----</option>
            </select>
            <select name="area" onchange="getArea(this.value);" id="area">
                <option value="0">----区----</option>
            </select>
            <select name="street" id="street" onchange="document.getElementById('code').value=this.value">
                <option value="0">----街道----</option>
            </select>
        </div>
        <input type="text" disabled value="0" id="code">
        <script>
            function getCity(code) {
                $.ajax({
                    url: "<?= \yii\helpers\Url::toRoute('/site/get-city')?>",
                    type: 'post',
                    data: { code: code, _csrf: "<?= \Yii::$app->request->getCsrfToken() ?>" },
                    dataType: "json",
                    success:function (e) {
                        //将市清空
                        $("#code").val(code);
                        $("#area").html('<option value="0">----区----</option>');
                        $("#street").html('<option value="0">----街道----</option>');
                        var html = '<option value="0">----市----</option>';
                        $(e).each(function (m,n) {
                            html += '<option name="'+n.adname+'" value="'+n.adcode+'">'+n.adname+'</option>';
                        })
                        $("#city").html(html);
                    }
                });
            }
            function getAd(code) {
                $.ajax({
                    url: "<?= \yii\helpers\Url::toRoute('/site/get-city')?>",
                    type: 'post',
                    data: { code: code, _csrf: "<?= \Yii::$app->request->getCsrfToken() ?>" },
                    dataType: "json",
                    success:function (e) {
                        //将市清空
                        $("#code").val(code);
                        $("#street").html('<option value="0">----街道----</option>');
                        var html = '<option value="0">----区----</option>';
                        $(e).each(function (m,n) {
                            html += '<option name="'+n.adname+'" value="'+n.adcode+'">'+n.adname+'</option>';
                        })
                        $("#area").html(html);
                    }
                });
            }
            function getArea(code) {
                $.ajax({
                    url: "<?= \yii\helpers\Url::toRoute('/site/get-city')?>",
                    type: 'post',
                    data: { code: code, _csrf: "<?= \Yii::$app->request->getCsrfToken() ?>" },
                    dataType: "json",
                    success:function (e) {
                        //将市清空
                        $("#code").val(code);
                        var html = '<option value="0">----街道----</option>';
                        $(e).each(function (m,n) {
                            html += '<option name="'+n.adname+'" value="'+n.adcode+'">'+n.adname+'</option>';
                        })
                        $("#street").html(html);
                    }
                });
            }
        </script>
    </body>

</html>