<?php $vdata = '

<p><span class="ja fs_0_8">メールアドレス</span></p>
<p class="ja">' .$this->req["mailaddress"] .'</p>
<p class="ja mt_1 fs_0_8">お問い合わせ内容：</p>
<div class="ja">
' .$this->req["content"] .'
</div>
<form method="post" action="?">
<input type="hidden" name="btntype" value="back">
<input type="hidden" name="mailaddress" value="' .$this->req["mailaddress"] .'">
<input type="hidden" name="content" value="' .$this->req["content"] .'">
<p class="tc mt_1"><input type="submit" value="戻る" class="ja"></p>
</form>
<form method="post" action="?">
<input type="hidden" name="btntype" value="send">
<input type="hidden" name="g-recaptcha-response" value="">
<input type="hidden" name="mailaddress" value="' .$this->req["mailaddress"] .'">
<input type="hidden" name="content" value="' .$this->req["content"] .'">
<p class="tc mt_1"><input type="submit" value="送信" class="ja"></p>
</form>

';?>
