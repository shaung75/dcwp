<?php if(!isset($_COOKIE['eucookie'])) { ?>
<script type="text/javascript">
function SetCookie(c_name,value,expiredays) {
var exdate=new Date()
	exdate.setDate(exdate.getDate()+expiredays)
	document.cookie=c_name+ "=" +escape(value)+";path=/"+((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
}
</script>
<?php } ?>
<?php
if(!isset($_COOKIE['eucookie']))
{ ?>
<div id="eucookielaw">
  <p class="aligncenter">This website uses cookies. To read about the cookies we use and to change your settings see our <a href="/cookies" style="color: #FFF;font-weight: bold;">cookie policy</a>.&nbsp;&nbsp;<a id="removecookie" style="cursor: pointer;"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/cookies/close.png" alt="Accept Cookies" align="absmiddle"></a></p>
</div>
<script type="text/javascript">
	if( document.cookie.indexOf("eucookie") ===-1 ){
		$("#eucookielaw").show();
	}
    $("#removecookie").click(function () {
		SetCookie('eucookie','eucookie',365*10)
      $("#eucookielaw").remove();
    });
</script>
<?php } ?>
