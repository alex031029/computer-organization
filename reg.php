<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> Register! </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<script type="text/javascript">
function writeText(txt,txt2)
{
document.getElementById("desc").innerHTML=txt;
document.getElementById("desc2").innerHTML=txt2;
}
</script>
<style type="text/css">
h3.line1
{
position:absolute;
left:650px;
top:50px
}
p.line2
{
position:absolute;
left:500px;
top:100px
}
p.line3
{
position:absolute;
left:500px;
top:510px
}
p.line4
{
position:absolute;
left:500px;
top:550px
}
p.line5
{
position:absolute;
left:500px;
top:590px
}
p.line6
{
position:absolute;
left:500px;
top:630px
}
</style>
</HEAD>

<BODY>
<body background="images/sozai.jpg">
<?php
//这个文件用于输出指定步数的各个寄存器中的值
	$reg=array("%eax","%ecx","%edx","%ebx","%esp","%ebp","%esi","%edi","no_reg");
	function detohex($x)
	{
		$val=sprintf("0x%x",$x);
		return $val;
	}
	$connect=@mysql_connect("localhost","root","wotamashitiancai");	//连接数据库
	if(!$connect)
	{
		echo "<script>alert('cannot connect mysql!');</script>";	//连接数据库失败的情况
		exit;
	}
	mysql_select_db("pipe",$connect);
	if(isset($_REQUEST[page]))		//如果有指定页数
	{
		echo"<table width='100%' height='630px'>";
		echo"<tr><td rowspan=5><img src=images/pipeline.jpg usemap=#$_REQUEST[page] alt=pipeline ></td>";
		$url="reg.php?f_icode=$_REQUEST[page]";
		echo"<map name=$_REQUEST[page] id=$_REQUEST[page]>";		//输出pipeline的图
		$qw="select * from wreg where cir='$_REQUEST[page]'";		//对各个阶段的寄存器值以及register的查询
		$qm="select * from mreg where cir='$_REQUEST[page]'";
		$qe="select * from ereg where cir='$_REQUEST[page]'";
		$qd="select * from dreg where cir='$_REQUEST[page]'";
		$qf="select * from freg where cir='$_REQUEST[page]'";
		$qr="select * from reg where cir='$_REQUEST[page]'";
		$resultw=mysql_query($qw);
		$resultm=mysql_query($qm);
		$resulte=mysql_query($qe);
		$resultd=mysql_query($qd);
		$resultf=mysql_query($qf);
		$resultr=mysql_query($qr);
		//echo $qw;
		mysql_data_seek($resultw,0);
		mysql_data_seek($resultm,0);
		mysql_data_seek($resulte,0);
		mysql_data_seek($resultd,0);
		mysql_data_seek($resultf,0);
		mysql_data_seek($resultr,0);
		//echo"<p id=desc></p>";
		$dataw=mysql_fetch_array($resultw);
		$datam=mysql_fetch_array($resultm);
		$datae=mysql_fetch_array($resulte);
		$datad=mysql_fetch_array($resultd);
		$dataf=mysql_fetch_array($resultf);
		$datar=mysql_fetch_array($resultr);
		$textw="W_icode=".detohex($dataw[icode])."&nbsp;W_vale=".detohex($dataw[vale])."&nbsp;W_valm=".detohex($dataw[valm])."&nbsp;W_dste=".$reg[$dataw[dste]]."&nbsp;W_dstm=".$reg[$dataw[dstm]];
		$textm="M_icode=".detohex($datam[icode])."&nbsp;M_bch=".$datam[bch]."&nbsp;M_vale=".detohex($datam[vale])."&nbsp;M_vala=".detohex($datam[vala])."&nbsp;M_dste=".$reg[$datam[dste]]."&nbsp;M_dstm=".$reg[$datam[dstm]];
		$texte="E_icode=".detohex($datae[icode])."&nbsp;E_ifun=".$datae[ifun]."&nbsp;E_valc=".detohex($datae[valc])."&nbsp;E_vala=".detohex($datae[vala])."&nbsp;E_valb=".detohex($datae[valb]);
		$texte1="E_dste=".$reg[$datae[dste]]."&nbsp;E_dstm=".$reg[$datae[dstm]]."&nbsp;E_srca=".$reg[$datae[srca]]."&nbsp;E_srcb=".$reg[$datae[srcb]];		
		$textd="D_icode=".detohex($datad[icode])."&nbsp;D_ifun=".$datad[ifun]."&nbsp;D_ra=".$reg[$datad[ra]]."&nbsp;D_rb=".$reg[$datad[rb]]."&nbsp;D_valc=".detohex($datad[valc])."&nbsp;D_valp=".detohex($datad[valp]);
		$textf="F_predpc=".detohex($dataf[predpc]);
		$textr="%eax=".detohex($datar[eax])." %ecx=".detohex($datar[ecx])." %edx=".detohex($datar[edx])." %ebx=".detohex($datar[edx]);
		$textr1="%esp=".detohex($datar[esp])." %ebp=".detohex($datar[ebp])." %esi=".detohex($datar[esi])." %edi=".detohex($datar[edi]);
		//echo"$textw<br>$textm<br>$texte<br>$textd<br>$textf<br>";
		echo"<area shape=rect coords=80,0,360,60 onMouseOver=writeText('$textw','&nbsp;') alt=f_icode nohref />";			//利用图片热区进行输出
		echo"<area shape=rect coords=80,60,360,190 onMouseOver=writeText('$textm','&nbsp;') alt=f_icode nohref />";
		echo"<area shape=rect coords=80,190,360,348 onMouseOver=writeText('$texte','$texte1') alt=f_icode nohref />";
		echo"<area shape=rect coords=80,348,360,475 onMouseOver=writeText('$textd','&nbsp;') alt=f_icode nohref />";
		echo"<area shape=rect coords=80,475,360,630 onMouseOver=writeText('$textf','&nbsp;') alt=f_icode nohref />";
		$pre=$_REQUEST[page]-1;
		$next=$pre+2;
		if($_REQUEST[page]>1)				//如果有上一页的话则有指向上一页的热区
		{
			echo"<area shape=rect coords=0,0,80,630 alt='previous_page' href =reg.php?page=$pre&cnt=$_REQUEST[cnt] />";
		}
		if($_REQUEST[page]<$_REQUEST[cnt])	//如果有下一页的话则有指向下一页的热区
		{
			echo"<area shape=rect coords=360,0,440,630 alt='previous_page' href =reg.php?page=$next&cnt=$_REQUEST[cnt] />";
		}
		echo"</map>";
		echo"<td align=center ><h3 class=line1>assemble code</h3></td></tr>";
		echo"<tr><td align=center height=60%><p class=line2><iframe src=assemble.php width=500 height=400 allowtransparency=yes frameborder=no border=0 marginwidth=0></iframe></p></td></tr>";
		echo"<tr><td height=10%><p id=desc class=line3></p></td></tr>";		//对获取的字符串的打印
		echo"<tr><td height=10%><p id=desc2 class=line4></p></td></tr>";
		echo"<tr><td height=10%><p class=line5>$textr</p></td></tr>";
		echo"<tr><td height=10%><p class=line6>$textr1</p></td></tr>";
		echo"</table>";
	}
?>
</BODY>
</HTML>
