<?php keke_tpl_class::checkrefresh('control/admin/tpl/admin_login', '1418773995' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]> <html dir="ltr" lang="zh-cn" id="ie6" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="zh-cn" id="ie7" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="zh-cn" id="ie8" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" lang="zh-cn" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_K['charset'];?>">
<title><?php echo P_NAME;?> <?php echo KEKE_VERSION;?>--<?php echo $_lang['admin_keke_sys'];?></title>
</head>
<link href="tpl/css/admin_management.css" rel="stylesheet" type="text/css" />
<link href="../../resource/css/button/stylesheets/css3buttons.css" rel="stylesheet" type="text/css" />
<link title="style1" href="tpl/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../resource/js/jquery.js"></script>
</head>
<body class="skin">
<div id="append_parent"></div>
<div class="login_box">
<div class="login_con">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="pl">
        	<div>
                <div>
                  <h1><img src="tpl/img/logo.png" alt="<?php echo $_lang['keke_professional_witkey_system'];?>" title="<?php echo $_lang['keke_professional_witkey_system'];?>"/><?php echo $_lang['system_manage'];?></h1>
                </div>
                <div>
                  <p>Powered by <?php echo P_NAME;?><?php echo KEKE_VERSION;?> &copy;2010 <?php echo $_lang['keke_info_technology_company'];?></p>
                </div>
          	</div>
        </td>
        <td class="pr">
        	<div>
            <form action="index.php?do=<?php echo $do?>" method="post" id="admin_login">
            <input type="hidden" name="token" id="token" value="<?php echo FORMHASH;?>"/>
            <input  type="hidden" name="allow_time" id="allow_num" value="<?php echo $allow_times;?>"/>
            <p>
             	&nbsp;<span id="try_info"></span>
 </p>
              <p class="logintitle"><?php echo $_lang['username'];?>: </p>
              <p class="loginform">
                <input name="username" type="text" id="txt_username" class="txt"  limit="required:true" msg="<?php echo $_lang['username_can_not_null'];?>" title="<?php echo $_lang['please_input_right_login_username'];?>" msgArea="try_info"/>
              </p>
              <p class="logintitle"><?php echo $_lang['password'];?>:</p>
              <p class="loginform">
                <input name="password" type="password" id="pwd_pwd" class="txt"   limit="required:true" msg="<?php echo $_lang['password_can_not_null'];?>" title="<?php echo $_lang['please_input_right_login_password'];?>" msgArea="try_info"/>
              </p>
              <p class="loginbtn">
              	
                <button  type="submit" id="logsubmit" name="login" onclick=" return check_login();"><span class="icon key">&nbsp;</span><?php echo $_lang['submit'];?></button>
                <button id="re" type="reset" name="reset"><span class="icon reload">&nbsp;</span><?php echo $_lang['reset'];?></button>	
              </p>
            </form>
          </div>
          </td>
      </tr>
    </table>
  </div>
</div>

<script type="text/javascript">
$(function(){
$("#txt_username").focus();
})
function check_login(){
var allow_num=$("#allow_num").val();

var i = checkForm(document.getElementById("admin_login"));
if(i){
if(allow_num>0){
var username=$("#txt_username").val();
var password=$("#pwd_pwd").val();
var token=$("#token").val();
$.post("index.php?do=login&is_submit=1&tt="+new Date().getTime(),
{user_name:username,pass_word:password,allow_num:allow_num,token:token},function(json){
if(json.status==1){
location.href="index.php";
}else{
$("#try_info").html(json.msg);
return false;
}
},'json')
}
 }
return false;

}
</script>
<script type="text/javascript" src="../../resource/js/system/form_and_validation.js"></script>
 
<?php if($remain_times>0) { ?>
<script type="text/javascript" src="tpl/js/artDialog.min.js"></script>
<?php } ?>
 
 
</body>
</html><?php keke_tpl_class::ob_out();?>