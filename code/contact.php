<?php
class contact{
    public $req = array("mailaddress" => "","content" => "","btntype" => "");

    public function __construct(){
        $confi_ok_flg = false;

        include_once("config.php");

        $this->receivemail = $receivemail;
        $this->recaptchasitekey = $recaptchasitekey;

        if($_REQUEST){
            $this->req = $this->req_clean($_REQUEST);
        }

        //confi move start --------------------------------
        if(isset($this->req["btntype"])){
            if($this->req["btntype"] == "confi" || $this->req["btntype"] == "send"){
                $rdata = array(
                    "secret" => $recaptchasecretkey,
                    "response" => $this->req["g-recaptcha-response"],
                );
                $rdata = $this->send_post($recaptchaconfiurl,$rdata);


                if($rdata["success"]){
                    if($this->formcheck($this->req)){
                        $confi_ok_flg = true;
                    }
                }
            }
        }
        //confi move end -----------------------------------

        if($confi_ok_flg){
            if($this->req["btntype"] == "confi"){
                include_once("views/confirm_view.php");

            }else if($this->req["btntype"] == "send"){

                if($this->sendmove($this->receivemail,$this->req)){
                    include_once("views/thanks_view.php");

                }else{
                    include_once("views/error_view.php");


                }
                $this->req = array();

            }
        }else{
            include_once("views/form_view.php");
        }

        $this->vdata = $vdata;

    }

    private function sendmove($receivemail,$data){

        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        $title = "お問い合わせメールが届きました。";
        $header = "From: ".$receivemail;
$content = <<<EOL
メールアドレス:{$data["mailaddress"]}\n
\n
内容：\n
{$data["content"]}


EOL;

        return mb_send_mail($receivemail,$title,$content,$header);

    }

    private function formcheck($req){
        $checkflg = true;
        if(!preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/i",$req["mailaddress"])){
            $checkflg = false;
        }
        return $checkflg;
    }

    private function req_clean($data){
        $rdata = array();

        foreach($data as $key => $val){
            if(is_array($val)){
                foreach($val as $tmp => $temp){
                    $rdata[$key][$tmp][] = htmlspecialchars(strip_tags($temp));
                }

            }else{
                $rdata[$key] = htmlspecialchars(strip_tags($val));
            }

        }

        return $rdata;
    }

    private function send_post($url,$data){
        $rdata = array();
        $content = http_build_query($data);

        $header = array(
        	'Content-Type: application/x-www-form-urlencoded',
        	'Content-Length: '.strlen($content)
        );

        $context = array(
        	'http' => array(
        		'ignore_errors' => true,
        		'method' => 'POST',
        		'header' => implode("\r\n", $header),
        		'content' => $content
        	)
        );

        $res = file_get_contents($url, false, stream_context_create($context));
        $rdata = json_decode($res,true);
        return $rdata;
    }
}

 ?>
