
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Menu</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<?php 
	//这个文件用于输出y86.php中的左边的菜单条
?>
</head>
<script language="javascript">
  function openspgl(){
    if(document.all.spgl.style.display=="none"){
	   document.all.spgl.style.display="";
	   document.all.d1.src="images/point3.gif";
	 }
	 else{
	  document.all.spgl.style.display="none";
	  document.all.d1.src="images/point1.gif";
	 }  
  }
  function openyhgl(){
    if(document.all.yhgl.style.display=="none"){
	   document.all.yhgl.style.display="";
	   document.all.d2.src="images/point3.gif";
	 }
	 else{
	  document.all.yhgl.style.display="none";
	  document.all.d2.src="images/point1.gif";
	 }  
  }
  function openddgl(){
    if(document.all.ddgl.style.display=="none"){
	   document.all.ddgl.style.display="";
	   document.all.d3.src="images/point3.gif";
	 }
	 else{
	  document.all.ddgl.style.display="none";
	  document.all.d3.src="images/point1.gif";
	 }  
  }
  function opengggl(){
    if(document.all.gggl.style.display=="none"){
	   document.all.gggl.style.display="";
	   document.all.d4.src="images/point3.gif";
	 }
	 else{
	  document.all.gggl.style.display="none";
	  document.all.d4.src="images/point1.gif";
	 }  
  }
</script>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="212" border="0" cellpadding="0" cellspacing="0" background="left_bg.gif">
  <tr>
    <td height="150" valign="top" background="images/left_bg.gif"><div align="center">
      <table width="212" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="212" height="20" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="212" height="32" background="images/default_09.gif" onClick="javascript:openspgl()"><div align="center"><a href="#"><img id="d1" border="0"src="images/point1.gif" width="10" height="10">&nbsp;&nbsp;y86管理</a></div></td>
            </tr>
          </table>
            <table width="212" border="0" cellpadding="0" cellspacing="0" id="spgl" style="display:">
              <tr>
                <td height="20" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#upload" >上传文件</a></td>
              </tr>
              <tr>
                <td height="22" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#assemble">查看汇编代码</a></td>
              </tr>
              <tr>
                <td height="22" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#register">查看寄存器</a></td>
              </tr>
              <tr>
                <td height="26" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#memory" >查看内存</a></td>
              </tr>
			  <tr>
                <td height="26" background="images/default_12.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#jump" >查看跳转页</a></td>
              </tr>
			<tr><td height="100" background="images/left_bottom.gif">&nbsp;</td>
			</tr>
			<tr><td height="3" background="images/left_stop.gif"></td>
            </table>
			</td>
        </tr>
      </table>
      </div></td>
  </tr>
</table>
</body>
</html>

