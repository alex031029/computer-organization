<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> Y86 Pipeline </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">




</HEAD>

<BODY>
<body background="images/sozai.jpg">
<table align=center border="0" cellpadding="0" cellspacing="0" id="upload">
<tr><td colspan=10><?php include"top.php"; ?></td></tr>
<tr><td><?php include("menu.php"); ?></td>
<td>
<table align=centr>
<form action="y86.php" method="post" enctype="multipart/form-data">
<tr><td height=30 width=100 align=right><label for="file">Filename:</label></td>
<td><input type="file" name="file" id="file" /></td>
<td><input type="submit" name="submit" class='button5' value="Upload" /></td></tr>
</form>
<form  method="post" enctype="multipart/form-data">
<tr><td height=30 width=100 align=right>Every circle:</td>
<td><select name='step' style='width:150px'>
<option value="no">ignore</option>
<option value="yes">see</option>
</select></td>
<td><input type="submit" class='button5' name="submit2" value="Run" /></td></tr></table>

</form>
<?php 
include"css.php";				//引入关于按钮以及表格的一些注明
if(isset($_POST[submit]))
{
      move_uploaded_file($_FILES["file"]["tmp_name"],"lab3");		//如果按了upload键则上传该文件,然后将这个文件另存为lab3
     system( "a.exe");												//然后执行a.exe,这个是一个C程序,用于将原本的二进制文件变为普通的文件
}
echo"<table class=th align=center id='assemble'>";					
if(isset($_POST[submit])||isset($_POST[submit2]))					//按了upload或者run都将显示assemble code
{
	echo"<caption>Assemble code</caption>";
	echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo"<iframe src=assemble.php width=500 height=300 allowtransparency=yes frameborder=no border=0 marginwidth=0></iframe></td>";
}
echo"</tr></table>";
	
	 $arr=file("a.out");											//读入文件,其中包括内存的空间以及指令区



    $Data=array(0,0,0,0,0,0,0,0);			//这个是register
    function writeE($src,$val)				//写到dste
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if ($src<8)
            $Data[$src]=$val;
    }
    function writeM($src,$val)				//写到dstm,其实跟writeE函数没有区别
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if ($src<8)
            $Data[$src]=$val;
    }
    function readA($src)					//读出dstA
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if ($src==8) return 0;
            return $Data[$src];
    }
    function readB($src)					//读出dstB,其实跟readA函数没有区别
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if ($src==8) return 0;
            return $Data[$src];
    }

$cc_of=false;		//condition code的初始
$cc_zf=false;
$cc_sf=false;
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
$RESP=4;
$RNONE=8;
$ALUADD=0;

	$hex=array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f');		//这个跟下面的数组用于十六进制与十进制之间转换
	$de=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
    $F_predpc=0;												//各种变量的初始,如果是值则为0,如果表示寄存器则为8
	$f_pc=0;
    $f_icode=0;$f_ifun=0;$f_ra=8;$f_rb=8;$f_valc=0;$f_valp=0;
    $f_predpc=0;
	$D_icode=0;$D_ifun=0;$D_ra=8;$D_rb=8;$D_valc=0;$D_valp=0;
	$d_icode=0;$d_ifun=0;$d_vala=0;$d_valb=0;$d_valc=0;$d_srca=8;$d_srcb=8;$d_dste=8;$d_dstm=8;
	$E_icode=0;$E_ifun=0;$E_valc=0;$E_vala=0;$E_valb=0;$E_srca=8;$E_srcb=8;$E_dste=8;$E_dstm=8;
	$e_icode=0;$e_vala=0;$e_vale=0;$e_dstm=8;$e_dste=8;
    $e_bch;
    $e_zf;$e_of;$e_sf;
	$M_icode=0;$M_vale=0;$M_vala=0;$M_dste=8;$M_dstm=8;
    $M_bch=true;
	$m_icode=0;$m_vale;$m_valm;$m_dste;$m_dstm;
	$W_icode=0;$W_vale=0;$W_valm=0;$W_dste=8;$W_dstm=8;
	$F_stall;					//表示各种stall以及bubble的变量
	$D_stall;
	$D_bubble;
	$E_bubble;
	
			
    function F_initpredpc($x)			//初始F_predpc,这个程序中为0x400
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $F_predpc=$x;
    }
	function F_bubble()					//fetch的bubble判断
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm,$F_stall,$D_stall,$D_bubble,$E_bubble;
		$F_stall=false;
		if(((($E_icode==$IMRMOVL)||($E_icode==$IPOPL))&&(($E_dstm==$d_srca)||($E_dstm==$d_srcb)))||($D_icode==$IRET)||($E_icode==$IRET)||($M_icode-$IRET==0))
		{
			$F_stall=true; 
		}
	}
    function F_write()					//将fetch寄存器的值给fetch stage
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm,$F_stall,$D_stall,$D_bubble,$E_bubble;
	
        if(!$F_stall)
            $F_predpc=$f_predpc;
    }


    function f_selectpc()					//判断f_pc的选择,即对是否为ret语句或者错误jump语句的判断
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if(($M_icode-$IJXX==0)&&($M_bch==false))
        {
            $f_pc=$M_vala;
        }
        else
        {
            if(($W_icode-$IRET)==0)
            {
                $f_pc=$W_valm;
            }
            else
                $f_pc=$F_predpc;
        }
    }
    function f_needregids()		//是否需要寄存器
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $temp=array($IRRMOVL,$IOPL,$IPUSHL,$IPOPL,$IIRMOVL,$IRMMOVL,$IMRMOVL);
        for($i=0;$i<7;$i++)
        {
            if($f_icode==$temp[$i])
                return true;
        }
        return false;
    }
    function f_needvalc()		//是否有valc
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $temp=array($IIRMOVL,$IRMMOVL,$IMRMOVL,$IJXX,$ICALL);
        for($i=0;$i<5;$i++)
        {
            if($f_icode==$temp[$i])
                return true;
        }
        return false;
    }
	function f_geticodeifun()		//获得icode以及ifun
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		$f_icode=$arr[$f_pc][0];
		if($f_icode=='a')
			$f_icode=10;
		elseif($f_icode=='b')
			$f_icode=11;
		$f_ifun=$arr[$f_pc][1];
		if($f_ifun=='a')
			$f_ifun=10;
		elseif($f_ifun=='b')
			$f_ifun=11;
	}
	function f_align()			//读入rA,rB(如果需要),读入valC(如果需要)
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		$temp=0;
		if(f_needregids()==true)
		{
			$f_ra=$arr[$f_pc+1][0];
			$f_rb=$arr[$f_pc+1][1];
			$temp=1;
		}
		else
		{
			$f_ra=8;
			$f_ra=8;
		}
		$f_valc=0;
		if(f_needvalc()==true)
		{
			$temp2=$f_pc+1+$temp;
			for($i=0;$i<4;$i++)
			{
				$v0=0;
				$v1=0;
				for($j=0;$j<16;$j++)
				{
					if($arr[$temp2+$i][0]==$hex[$j])
					{
						$v0=$de[$j];
						break;
					}
				}
				for($j=0;$j<16;$j++)
				{
					if($arr[$temp2+$i][1]==$hex[$j])
					{
						$v1=$de[$j];
						break;
					}
				}
				$f_valc=$f_valc*16+$v0;
				$f_valc=$f_valc*16+$v1;
			}			if($arr[$temp2][0]=='8'||$arr[$temp2][0]=='9'||$arr[$temp2][0]=='a'||$arr[$temp2][0]=='b'||$arr[$temp2][0]=='c'||$arr[$temp2][0]=='d'||$arr[$temp2][0]=='e'||$arr[$temp2][0]=='f')			//因为php是弱类型变量,整形变量没有规定的32位,所以如果读进来的十六进制数的符号位是1,则需要-0x80000000*2
			{
				$f_valc-=0x80000000;
				$f_valc-=0x80000000;
			}

		}

	}
    function f_pcincresement()			//pc的自增
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $f_valp=$f_pc+1;
        if(f_needregids())
			$f_valp+=1;
        if(f_needvalc())
            $f_valp+=4;
    }
    function f_newpredpc()			//f_predpc的选择
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if($f_icode==$IJXX||$f_icode==$ICALL)
            $f_predpc=$f_valc;
        else
            $f_predpc=$f_valp;
		
    }
	function f_exe()			//fetch stage阶段的执行
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		f_selectpc();
		f_geticodeifun();
		f_align();
		f_pcincresement();
		f_newpredpc();
	}
	function D_bubble()		//decode的bubble以及stall判断
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm,$F_stall,$D_stall,$D_bubble,$E_bubble;
		$D_stall=false;
		$D_bubble=false;
		if(($E_icode==$IMRMOVL||$E_icode==$IPOPL)&&($E_dstm==$d_srca||$E_dstm==$d_srcb))
			$D_stall=true;
		if((($E_icode-$IJXX)==0&&!$e_bch)||($D_icode-$IRET)==0||($E_icode-$IRET)==0||($M_icode-$IRET==0))
		{
			$D_bubble=true;
		}
	}

    function D_write()			//decode register的读入
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm,$F_stall,$D_stall,$D_bubble,$E_bubble;
        if($D_stall==false)
        {
            if($D_bubble==true)
            {
                $D_icode=0;
                $D_ifun=0;
                $D_ra=8;
                $D_rb=8;
                $D_valc=0;
                $D_valp=0;
            }
            else
            {
                $D_icode=$f_icode;
                $D_ifun=$f_ifun;
                $D_ra=$f_ra;
                $D_rb=$f_rb;
                $D_valp=$f_valp;
                $D_valc=$f_valc;
            }
        }
    }


    function decode()			//从decode register中读入值
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $d_icode=$D_icode;
        $d_ifun=$D_ifun;
        $d_valc=$D_valc;
    }
    function d_newsrca()			//判断srcA
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $temp1=array($IRRMOVL,$IRMMOVL,$IOPL,$IPUSHL);
        $temp2=array($IPOPL,$IRET);
        for($i=0;$i<4;$i++)
            if($d_icode==$temp1[$i])
            {
                $d_srca=$D_ra;
                return;
            }
        for($i=0;$i<2;$i++)
            if($d_icode==$temp2[$i])
            {
                $d_srca=$RESP;
                return;
            }
        $d_srca=$RNONE;
    }
    function d_newsrcb()			//判断srcB
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $temp1=array($IOPL,$IRMMOVL,$IMRMOVL);
        $temp2=array($IPUSHL,$IPOPL,$ICALL,$IRET);
        for($i=0;$i<3;$i++)
            if($d_icode==$temp1[$i])
            {
                $d_srcb=$D_rb;				
                return;
            }
        for($i=0;$i<4;$i++)
            if($d_icode==$temp2[$i])
            {
                $d_srcb=$RESP;
                return;
            }
        $d_srcb=$RNONE;
    }
    function d_newdste()			//判断dstE
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $temp1=array($IRRMOVL,$IIRMOVL,$IOPL);
        $temp2=array($IPUSHL,$IPOPL,$ICALL,$IRET);
        for($i=0;$i<3;$i++)
            if($d_icode==$temp1[$i])
            {
                $d_dste=$D_rb;
                return;
            }
        for($i=0;$i<4;$i++)
            if($d_icode==$temp2[$i])
            {
                $d_dste=$RESP;
                return;
            }
        $d_dste=$RNONE;
    }
    function d_newdstm()			//判断dstM
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if($d_icode==$IMRMOVL||$d_icode==$IPOPL)
        {
            $d_dstm=$D_ra;
            return;
        }
        else
        {
            $d_dstm=$RNONE;
			return;
        }
    }
    function d_newvala()			//valA的计算
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if($d_icode==$ICALL||$d_icode==$IJXX)
        {
            $d_vala=$D_valp;
            return;
        }
        else
        {
            $set=array($E_dste,$M_dstm,$M_dste,$W_dstm,$W_dste);
            $val=array($e_vale,$m_valm,$M_vale,$W_valm,$W_vale);
            for ($i=0;$i<5;$i++)
                    if ($set[$i]==$d_srca)
                    {
                            $d_vala=$val[$i];
                            return;
                    }
        }
        $d_vala=readA($d_srca);
    }
    function d_newvalb()		//valB的计算
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $set=array($E_dste,$M_dstm,$M_dste,$W_dstm,$W_dste);
        $val=array($e_vale,$m_valm,$M_vale,$W_valm,$W_vale);
        for ($i=0;$i<5;$i++)
                if ($set[$i]==$d_srcb)
                {
                        $d_valb=$val[$i];
                        return;
                }
        $d_valb=readB($d_srcb);
		
    }
	function d_exe()			//decode stage的执行
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		decode();
		d_newdste();
		d_newdstm();
		d_newsrca();	
		d_newsrcb();
		d_newvala();
		d_newvalb();
	}

	function E_bubble()			//execute register的bubble判断
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm,$F_stall,$D_stall,$D_bubble,$E_bubble;
		$E_bubble=false;
		if(($E_icode==$IJXX&&$e_bch==false)||(($E_icode==$IMRMOVL||$E_icode==$IPOPL)&&($E_dstm==$d_srca||$E_dstm==$d_srcb)))
		{
			$E_bubble=true;
			
		}
	}

    function E_write()		//execute register的写入
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm,$F_stall,$D_stall,$D_bubble,$E_bubble;
        if($E_bubble==true)
        {	
            $E_icode=0;
            $E_ifun=0;
            $E_valc=0;
            $E_vala=0;
            $E_valb=0;
            $E_srca=8;
            $E_srcb=8;
            $E_dste=8;
            $E_dstm=8;
        }
        else
        {
            $E_icode=$d_icode;
            $E_ifun=$d_ifun;
            $E_valc=$d_valc;
            $E_vala=$d_vala;
            $E_valb=$d_valb;
            $E_srca=$d_srca;
            $E_srcb=$d_srcb;
            $E_dste=$d_dste;
            $E_dstm=$d_dstm;
        }
    }




    function execute()		//execute stage从executeregister中读入
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $e_icode=$E_icode;
        $e_vala=$E_vala;
        $e_dste=$E_dste;
        $e_dstm=$E_dstm;
    }
    function e_alua()		//输入到alu中a值的计算
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if($e_icode==$IRRMOVL||$e_icode==$IOPL)
            return $E_vala;
        if($e_icode==$IIRMOVL||$e_icode==$IRMMOVL||$e_icode==$IMRMOVL)
            return $E_valc;
        if($e_icode==$ICALL||$e_icode==$IPUSHL)
            return -4;
        if($e_icode==$IRET||$e_icode==$IPOPL)
            return 4;
        return 0;
    }
    function e_alub()		//输入到alu中b值的计算
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $temp=array($IRMMOVL,$IMRMOVL,$IOPL,$ICALL,$IPUSHL,$IRET,$IPOPL);
        for($i=0;$i<7;$i++)
            if($e_icode==$temp[$i])
                return $E_valb;
        if($e_icode==$IRRMOVL||$e_icode==$IIRMOVL)
            return 0;
        return 0;
    }
    function e_alufun()		//需要alu进行哪种计算
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if(($e_icode-$IOPL)==0	)
            return $E_ifun;
        else
            return $ALUADD;
    }
    function e_setcc()			//对是否需要改变condition code的判断
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        return $e_icode==$IOPL;
    }
    function e_alu()			//alu计算
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $a=e_alua();
        $b=e_alub();
        switch(e_alufun())
        {
            case 0:						//加法
                $e_vale=$a+$b;
                $e_of=($a<0==$b<0)&&($e_vale<0!=$a<0);
                $e_zf=($e_vale==0);
                $e_sf=($e_vale<0);
                break;
            case 1:						//减法
                $a=-$a;
                $e_vale=$a+$b;
                $e_of=($a<0==$b<0)&&($e_vale<0!=$a<0);
                $e_zf=($e_vale==0);
                $e_sf=($e_vale<0);
                break;
            case 2:						//位与
                $e_vale=$a&$b;
                $e_of=false;
                $e_zf=($e_vale==0);
                $e_sf=($e_vale<0);
                break;
            case 3:						//抑或
                $e_vale=$a^$b;
                $e_of=false;
                $e_zf=($e_vale==0);
                $e_sf=($e_vale<0);
                break;
            default:
                $e_vale=0;
                $e_of=false;
                $e_zf=false;
                $e_sf=false;
        }
    }
    function e_concode()			//对condition code的更改
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if(($e_icode-$IOPL)==0)
        {
            $cc_of=$e_of;
            $cc_sf=$e_sf;
            $cc_zf=$e_zf;
        }
    }
    function e_branch()				//对bch的判断
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if($E_icode==$IJXX)
        {
            switch($E_ifun)
            {
            case 0:
                $e_bch=true;
                break;
            case 1:
                $e_bch=($cc_sf^$cc_of)||$cc_zf;
                break;
            case 2:
                $e_bch=($cc_sf^$cc_of);
                break;
            case 3:
                $e_bch=$cc_zf;
                break;
            case 4:
                $e_bch=!$cc_zf;
                break;
            case 5:
                $e_bch=!($cc_sf^$cc_of);
                break;
            case 6:
                $e_bch=(!($cc_sf^$cc_of)&&!$cc_zf);
                break;
            default:
                $e_bch=false;
            }
        }
    }
	function e_exe()			//execute stage的执行
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		execute();
		e_alu();
		e_concode();
		e_branch();


	}


    function M_write()			//memory register的读入
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $M_icode=$e_icode;
        $M_vale=$e_vale;
        $M_vala=$e_vala;
        $M_dste=$e_dste;
        $M_dstm=$e_dstm;
        $M_bch=$e_bch;
    }


    function memory()			//从memory register中读入数据
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $m_icode=$M_icode;
        $m_vale=$M_vale;
        $m_dste=$M_dste;
        $m_dstm=$M_dstm;
    }
    function m_addr()				//需要读或者写的memory数据地址
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if($M_icode==$IRRMOVL||$M_icode==$IPUSHL||$M_icode==$ICALL||$M_icode==$IMRMOVL)
            return $M_vale;
        if($M_icode==$IPOPL||$M_icode==$IRET)
            return $M_vala;
        return 0;

    }
    function m_memread()				//是否需要读memory
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        return ($M_icode==$IMRMOVL||$M_icode==$IPOPL||$M_icode==$IRET);
    }
    function m_memwrite()				//是否需要些memory
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        return ($M_icode==$IRMMOVL||$M_icode==$IPUSHL||$M_icode==$ICALL);
    }
	function m_readmem()			//读内存
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		$m_valm=0;
		$x=0;
		$temp=m_addr();
		if(m_memread())
		{
			for($i=0;$i<4;$i++)
			{
				$temp2=$temp+$i;
				$v0=0;
				$v1=0;
				for($j=0;$j<16;$j++)
				{
					if($arr[$temp2][0]==$hex[$j])
					{
						$v0=$de[$j];
						break;
					}
				}
				for($j=0;$j<16;$j++)
				{
					if($arr[$temp2][1]==$hex[$j])
					{
						$v1=$de[$j];
						break;
					}
				}
				$x=$x*16+$v0;
				$x=$x*16+$v1;
			}
			if($arr[$temp][0]=='8'||$arr[$temp][0]=='9'||$arr[$temp][0]=='a'||$arr[$temp][0]=='b'||$arr[$temp][0]=='c'||$arr[$temp][0]=='d'||$arr[$temp][0]=='e'||$arr[$temp][0]=='f')			//同样为符号位为1的十六进制需要将值减去0x80000000*2
			{
				$x-=0x80000000;
				$x-=0x80000000;
			}
			$m_valm=$x;
		}

	}
	function m_writemem()
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		$temp=m_addr();
		$val=$M_vala;
		if($val<0)					//如果是负数,需要先加上0x80000000*2,以便之后计算
		{
			$val+=0x80000000;
			$val+=0x80000000;
		}
		if(m_memwrite())
		{
			for($i=3;$i>=0;$i--)
			{
				$temp2=$temp+$i;
				$v1=$val%16;
				$val/=16;
				$v0=$val%16;
				$val/=16;
				for($j=0;$j<16;$j++)
				{
						if($v0==$de[$j])
						{
							$arr[$temp2][0]=$hex[$j];
							break;
						}
				}
				
				for($j=0;$j<16;$j++)
				{
						if($v1==$de[$j])
						{
							$arr[$temp2][1]=$hex[$j];
							break;
						}
				}
			}
		}
	}
	function m_exe()				//memory stage的执行
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		memory();
		m_readmem();
	}

	function W_write()			//write back register的读入
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		$W_icode=$m_icode;
		$W_vale=$m_vale;
		$W_valm=$m_valm;
		$W_dste=$m_dste;
		$W_dstm=$m_dstm;
	}
	function Halt()					//当把halt指令推到write back register时便结束程序
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		return $W_icode==$IHALT;
	}
	function invalid()				//如果读入非法的指令便结束
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		if($W_icode<0||$W_icode>11)
			return true;
		else
			return false;
	}
	function w_writeback()
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		writeE($W_dste,$W_vale);
		writeM($W_dstm,$W_valm);
	}
	F_initpredpc(0x400);			//初始的pc赋值为0x400
	$Data[4]=0x400;					//初始的esp赋值为0x400
	$cnt=0;							//用于点circle数
	$connect=@mysql_connect("localhost","root","wotamashitiancai");	//数据库连接
	if(!$connect)
	{
		echo "<script>alert('cannot connect mysql!');</script>";	//连接数据库失败的情况
		exit;
	}
	mysql_select_db("pipe",$connect);
if(isset($_REQUEST[submit2]))				//如果按了run按钮
{
	mysql_query("drop table freg");			//删除原数据库中数据
	mysql_query("drop table dreg");
	mysql_query("drop table ereg");
	mysql_query("drop table mreg");
	mysql_query("drop table wreg");
	mysql_query("drop table reg");
	mysql_query("create table freg(cir int,predpc char(20),primary key(cir))");		//新建数据库
	mysql_query("create table dreg(cir int,icode char(20),ifun char(20),ra char(20),rb char(20),valc char(20),valp char(20),primary key(cir))");
	mysql_query("create table ereg(cir int,icode char(20),ifun char(20),vala char(20),valb char(20),valc char(20),dste char(20),dstm char(20),srca char(20),srcb char (20),primary key(cir))");
	mysql_query("create table mreg(cir int,icode char(20),bch char(20),vala char(20),vale char(20),dste char(20),dstm char(20),primary key(cir))");
	mysql_query("create table wreg(cir int,icode char(20),vale char(20),valm char(20),dste char(20),dstm char(20),primary key(cir))");
	mysql_query("create table reg(cir int,eax char(20),ecx char(20),edx char(20),ebx char(20),esp char(20),ebp char(20),esi char(20),edi char(20),primary key(cir))");
	$f1=fopen("output.out","w");		//用于文本输出

	$queryf;
	$queryd;
	$querye;
	$querym;
	$queryw;
	$queryr;
	while(1)
	{

		m_exe();			//由于有forward,所以是执行是从memory到fetch	
		e_exe();
		d_exe();
		f_exe();
		m_writemem();		//执行写内存跟写数据库操作
		w_writeback();
		F_bubble();			//下个周期的register的各个bubble与stall判断
		E_bubble();
		D_bubble();
		F_write();			//写入register
		D_write();
		E_write();
		M_write();
		W_write();		
		
		$cnt++;
		$bch;				
		if($M_bch==true)
			$bch="true";
		else
			$bch="false";
		if($_REQUEST[step]=="yes")		//如果需要显示每步
		{
			$i=$cnt%1024;				//每执行1024步将存一次数据库
			if($i==1)
			{
				$queryf="insert into freg values";
				$queryd="insert into dreg values";
				$querye="insert into ereg values";
				$querym="insert into mreg values";
				$queryw="insert into wreg values";
				$queryr="insert into reg values";
			}
			if($i!=1)
			{
				$queryf=$queryf.",";
				$queryd=$queryd.",";
				$querye=$querye.",";
				$querym=$querym.",";
				$queryw=$queryw.",";
				$queryr=$queryr.",";
			}
			$queryf=$queryf."($cnt,$F_predpc)";					//将各个register中的数据保存在变量中
			$queryd=$queryd."($cnt,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp)";
			$querye=$querye."($cnt,$E_icode,$E_ifun,$E_vala,$E_valb,$E_valc,$E_dste,$E_dstm,$E_srca,$E_srcb)";
			$querym=$querym."($cnt,$M_icode,$bch,$M_vala,$M_vale,$M_dste,$M_dstm)";
			$queryw=$queryw."($cnt,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm)";
			$queryr=$queryr."($cnt,$Data[0],$Data[1],$Data[2],$Data[3],$Data[4],$Data[5],$Data[6],$Data[7])";
			if($i==0)
			{
				mysql_query($queryf);			//每1024次写一次数据库
				mysql_query($queryd);
				mysql_query($querye);
				mysql_query($querym);
				mysql_query($queryw);
				mysql_query($queryr);
			}
		}
		fprintf($f1,"Circle_%d\r\n--------------------\r\n",$cnt);			//文本文件输出
		fprintf($f1,"FETCH:\r\n\tF_predPC\t=\t%x\r\n\r\n",$F_predpc);
		fprintf($f1,"DECODE:\r\n\tD_icode\t\t=\t%x\r\n\tD_ifun\t\t=\t%x\r\n\tD_rA\t\t=\t%x\r\n\tD_rB\t\t=\t%x\r\n\tD_valC\t\t=\t%x\r\n\tD_valP\t\t=\t%x\r\n\r\n",$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp);
		fprintf($f1,"EXECUTE:\r\n\tE_icode\t\t=\t%x\r\n\tE_ifun\t\t=\t%x\r\n\tE_valC\t\t=\t%x\r\n\tE_valA\t\t=\t%x\r\n\tE_valB\t\t=\t%x\r\n\tE_dstE\t\t=\t%x\r\n\tE_dstM\t\t=\t%x\r\n\tE_srcA\t\t=\t%x\r\n\tE_srcB\t\t=\t%x\r\n\r\n",$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_dste,$E_dstm,$E_srca,$E_srcb);
		fprintf($f1,"MEMORY:\r\n\tM_icode\t\t=\t%x\r\n\tM_bch\t\t=\t%x\r\n\tM_valE\t\t=\t%x\r\n\tM_valA\t\t=\t%x\r\n\tM_dstE\t\t=\t%x\r\n\tM_dstM\t\t=\t%x\r\n\r\n",$M_icode,$bch,$M_vale,$M_vala,$M_dste,$M_dstm);
		fprintf($f1,"WRITE BACK:\r\n\tW_icode\t\t=\t%x\r\n\tM_valE\t\t=\t%x\r\n\tM_valM\t\t=\t%x\r\n\tM_dstE\t\t=\t%x\r\n\tM_dstM\t\t=\t%x\r\n\r\n",$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm);
		if(Halt())
		{	
			echo "<script>alert('Halt exit!');</script>";		//因为halt退出
			break;
		}
		if(invalid())
		{
			echo "<script>alert('Invalid exit!');</script>";	//因为valid code退出
			break;
		}
	}
	if($_REQUEST[step]=="yes")		
	{
		if($cnt%1024!=0)				//最后把剩下不满1024个的数据存到数据库
		{
				mysql_query($queryf);
				mysql_query($queryd);
				mysql_query($querye);
				mysql_query($querym);
				mysql_query($queryw);
				mysql_query($queryr);
		}
	}
	$reg=array("%eax","%ecx","%edx","%ebx","%esp","%ebp","%esi","%edi");
	echo"<table class=th align=center id='register' width='100%'>";		//输出最后的寄存器的值
	echo"<caption>REGISTERS</caption>";
	echo"<tr>";
	for($i=0;$i<8;$i++)
	{
		echo"<th width='12.5%'>$reg[$i]</th>";		
	}
	echo"</tr><tr>";
	for($i=0;$i<8;$i++)
	{
		echo"<td align=center>";
		printf("0x%x",$Data[$i]);
		echo"</td>";
	}
	echo"</tr><tr><td colspan=8 align=right><a href='#upload'><span style=color:red>[back to top]</span></a></td></tr>";
	echo"</table>";
	echo"<table class=th align=center id='memory' width='100%'>";		//输出最后的内存的值
	echo"<caption>MEMORY</caption>";
	for($i=0;$i<0x400;$i+=4)
	{
		if($i%16==0)
			echo"<tr>";
		echo"<th width='10%'><b>";
		printf("0x%x",$i);
		echo"</b></th>";
		echo"<td width='15%'>".$arr[$i].$arr[$i+1].$arr[$i+2].$arr[$i+3]."</td>";	
		if($i%16==12)
			echo"</tr>";
	}
	echo"<tr><td colspan=8 align=right><a href='#upload'><span style=color:red>[back to top]</span></a></td></tr>";
	echo"</table>";
	if($_REQUEST[step]=="yes")
	{
		echo"<table align=center class=th id='jump' width='100%'>";			//如果有要求每步的话,再输出一个跳转到每步用的连接
		echo"<caption>EACH CIRCLE</caption><tr>";
		for($i=1;$i<=$cnt;$i++)
		{
			if($i%15==1&&$i!=1)
				echo"</tr><tr>";
			echo"<td><a href=reg.php?page=$i&cnt=$cnt target =_blank>[$i]</a></td>";
		}
		echo"</tr><tr><td colspan=15 align=right><a href='#upload'><span style=color:red>[back to top]</span></a></td></tr>";
		echo"</table>";
	}

	echo"</table>";


	
}
?>
</BODY>
</HTML>
