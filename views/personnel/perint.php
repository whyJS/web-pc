
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div style="width: 10%; padding-top: 20%; margin: 0 auto; color: red;">
    <?php if($show_param['regist']==1){ ?>
        账号已存在
            <a href="regist">返回</a>
    <?php }else if($show_param['regist']==2){ ?>
        登记成功
            <a href="index">返回</a>
    <?php }else{?>
        登记失败
            <a href="index">重新登记</a>
    <?php }?>

</div>
</body>
</html>