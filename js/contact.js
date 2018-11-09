$(function(){
    if($("[name=btntype]").val() == "confi" && $("[name=mailaddress]").val().length == 0 && $("[name=content]").val().length == 0){
        $("[type=submit]").hide();

    }
    $("[name=mailaddress]").on('input', function(event) {
        var value = $("[name=mailaddress]").val();
        if(!value.match(/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
            $("#err_mail").html("メールアドレスを入力してください。");
            $("[type=submit]").hide();

        }else{
            $("#err_mail").html("");
            if($("#err_content").html().length == 0 && $("[name=content]").val().length !== 0){
                $("[type=submit]").show();
            }
        }

    });
    $("[name=content]").on('input', function(event) {
        var value = $("[name=content]").val();
        if(value.length == 0){
            $("#err_content").html("内容を入力してください。");
            $("[type=submit]").hide();

        }else{
            $("#err_content").html("");
            if($("#err_mail").html().length == 0){
                $("[type=submit]").show();
            }
        }

    });
})
