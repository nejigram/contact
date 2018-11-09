<?php include_once(__DIR__ ."/code/contact.php"); $cdata = new contact();?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
<title>contact</title>
<link rel='stylesheet' href='https://www.nejigram.com/assets/css/reboot.css' type='text/css' />
<link rel='stylesheet' href='css/contact.css' type='text/css' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
<script src='https://www.google.com/recaptcha/api.js?render=<?=$cdata->recaptchasitekey;?>'></script>

</head>
<body>
<script>
grecaptcha.ready(function() {
grecaptcha.execute('<?=$cdata->recaptchasitekey;?>', {action: 'action_name'})
.then(function(token) {

    $("[name=g-recaptcha-response]").val(token);
});
});
</script>
<header class="pt_1">
    <p class="tc fs_2"><img src="https://www.nejigram.com/assets/img/stamp/002.png" class="buruburu w8"><span class="buruburu">contact.</span><img src="https://www.nejigram.com/assets/img/stamp/009.png" class="buruburu w8"></p>
    <p class="tc fs_0_7 lh_1 ja">お問い合わせ。</p>
</header>
<article class="box m0a pd_1 mt_1">
    <?=$cdata->vdata;?>
</article>
</body>
</html>
