<?php /* Smarty version Smarty-3.1.1, created on 2014-04-18 04:36:51
         compiled from "include\facebook.php" */ ?>
<?php /*%%SmartyHeaderCode:982653508fc3a071c1-46463388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5966fbc3eafa6f1fc7145585e92eb507678841f2' => 
    array (
      0 => 'include\\facebook.php',
      1 => 1394847943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '982653508fc3a071c1-46463388',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_53508fc3a0eec',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53508fc3a0eec')) {function content_53508fc3a0eec($_smarty_tpl) {?><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=428341490529969";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like-box" data-href="http://www.facebook.com/escolanewpoint" data-width="324" data-height="248" data-show-faces="true" data-stream="false" data-header="true"></div>​<?php }} ?>