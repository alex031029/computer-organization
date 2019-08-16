<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> asseble code </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<link rel="stylesheet" type="text/css" href="css/font.css">
</HEAD>

<BODY>
<?php
//这个文件用于输出汇编代码
$arr=file("a.out");
$pc=0x400;
$INOP=0;
$IHALT=1;
$IRRMOVL=2;
$IIRMOVL=3;
$IRMMOVL=4;
$IMRMOVL=5;
$IOPL=6;
$IJXX=7;
$ICALL=8;
$IRET=9;
$IPUSHL=10;
$IPOPL=11;
$reg=array("%eax","%ecx","%edx","%ebx","%esp","%ebp","%esi","%edi");
$hex=array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f');
$de=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
$jxx=array("jmp","jle","jl","je","jne","jge","jg");
$opl=array("addl","subl","andl","xorl");
	echo"<table>";
	while(1)
	{
		echo"<tr><td>";
		printf("0x%x  ",$pc);
		echo"</td><td>";
		if($arr[$pc][0]=="0")			//对nop到popl的判断
		{			
			echo"nop</td></tr>";
			$pc+=1;
		}
		elseif($arr[$pc][0]=="1")
		{	
			echo"halt</td></tr>";
			$pc+=1;
		}
		elseif($arr[$pc][0]=="2")
		{

			echo"rrmovl </td><td>".$reg[$arr[$pc+1][0]].", </td><td>".$reg[$arr[$pc+1][1]]."</td></tr>";
			$pc+=2;
		}
		elseif($arr[$pc][0]=="3")
		{
			echo"irmovl </td><td>0x".$arr[$pc+2].$arr[$pc+3].$arr[$pc+4].$arr[$pc+5].", </td><td>".$reg[$arr[$pc+1][1]]."</td></tr>";
			$pc+=6;
		}
		elseif($arr[$pc][0]=="4")
		{
			echo"rmmovl </td><td>".$reg[$arr[$pc+1][0]].", </td><td>0x".$arr[$pc+2].$arr[$pc+3].$arr[$pc+4].$arr[$pc+5]."(".$reg[$arr[$pc+1][1]].")</td></tr>";
			$pc+=6;
		}
		elseif($arr[$pc][0]=="5")
		{
			echo"mrmovl </td><td>0x".$arr[$pc+2].$arr[$pc+3].$arr[$pc+4].$arr[$pc+5]."(".$reg[$arr[$pc+1][1]]."), </td><td>".$reg[$arr[$pc+1][0]]."</td></tr>";
			$pc+=6;
		}
		elseif($arr[$pc][0]=="6")
		{
			echo $opl[$arr[$pc][1]]." </td><td>".$reg[$arr[$pc+1][0]].", </td><td>".$reg[$arr[$pc+1][1]]."</td></tr>";
			$pc+=2;
		}
		elseif($arr[$pc][0]=="7")
		{
			echo $jxx[$arr[$pc][1]]." </td><td>0x".$arr[$pc+1].$arr[$pc+2].$arr[$pc+3].$arr[$pc+4]."</td></tr>";
			$pc+=5;
		}
		elseif($arr[$pc][0]=="8")
		{
			echo "call </td><td>0x".$arr[$pc+1].$arr[$pc+2].$arr[$pc+3].$arr[$pc+4]."</td></tr>";
			$pc+=5;
		}
		elseif($arr[$pc][0]=="9")
		{
			echo"ret</td></tr>";
			$pc+=1;
		}
		elseif($arr[$pc][0]=="a")
		{
			echo"pushl </td><td>".$reg[$arr[$pc+1][0]]."</td></tr>";
			$pc+=2;
		}
		elseif($arr[$pc][0]=="b")
		{
			echo"popl </td><td>".$reg[$arr[$pc+1][0]]."</td></tr>";
			$pc+=2;
		}
		if(isset($arr[$pc])==false)		//直到读完所有代码
			break;
	}
	echo"</table>";
?>
</BODY>
</HTML>
