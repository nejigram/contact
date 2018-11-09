<?php $vdata = '

    <form method="post" action="?">
        <input type="hidden" name="btntype" value="confi">
        <input type="hidden" name="g-recaptcha-response" value="">
        <p class="ja"><label class="fs_0_8">メールアドレス<span class="col_red">[※必須]</span></lavel><span id="err_mail" class="fs_0_8 col_red"></span></p>
        <input type="email" name="mailaddress" value="' .$this->req["mailaddress"] .'" width="100%" class="ja" id="mailaddress">

        <p class="ja mt_1"><label class="fs_0_8">お問い合わせ内容<span class="col_red">[※必須]</span></lavel><span id="err_content" class="fs_0_8 col_red"></span></p>
        <textarea name="content" class="ja" id="content">'.$this->req["content"] .'</textarea>
        <p class="tc mt_1"><input type="submit" value="確認" class="ja"></p>
    </form>
';?>
