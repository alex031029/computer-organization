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
include"css.php";				//������ڰ�ť�Լ�����һЩע��
if(isset($_POST[submit]))
{
      move_uploaded_file($_FILES["file"]["tmp_name"],"lab3");		//�������upload�����ϴ����ļ�,Ȼ������ļ����Ϊlab3
     system( "a.exe");												//Ȼ��ִ��a.exe,�����һ��C����,���ڽ�ԭ���Ķ������ļ���Ϊ��ͨ���ļ�
}
echo"<table class=th align=center id='assemble'>";					
if(isset($_POST[submit])||isset($_POST[submit2]))					//����upload����run������ʾassemble code
{
	echo"<caption>Assemble code</caption>";
	echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo"<iframe src=assemble.php width=500 height=300 allowtransparency=yes frameborder=no border=0 marginwidth=0></iframe></td>";
}
echo"</tr></table>";
	
	 $arr=file("a.out");											//�����ļ�,���а����ڴ�Ŀռ��Լ�ָ����



    $Data=array(0,0,0,0,0,0,0,0);			//�����register
    function writeE($src,$val)				//д��dste
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if ($src<8)
            $Data[$src]=$val;
    }
    function writeM($src,$val)				//д��dstm,��ʵ��writeE����û������
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if ($src<8)
            $Data[$src]=$val;
    }
    function readA($src)					//����dstA
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if ($src==8) return 0;
            return $Data[$src];
    }
    function readB($src)					//����dstB,��ʵ��readA����û������
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if ($src==8) return 0;
            return $Data[$src];
    }

$cc_of=false;		//condition code�ĳ�ʼ
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

	$hex=array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f');		//������������������ʮ��������ʮ����֮��ת��
	$de=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
    $F_predpc=0;												//���ֱ����ĳ�ʼ,�����ֵ��Ϊ0,�����ʾ�Ĵ�����Ϊ8
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
	$F_stall;					//��ʾ����stall�Լ�bubble�ı���
	$D_stall;
	$D_bubble;
	$E_bubble;
	
			
    function F_initpredpc($x)			//��ʼF_predpc,���������Ϊ0x400
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $F_predpc=$x;
    }
	function F_bubble()					//fetch��bubble�ж�
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm,$F_stall,$D_stall,$D_bubble,$E_bubble;
		$F_stall=false;
		if(((($E_icode==$IMRMOVL)||($E_icode==$IPOPL))&&(($E_dstm==$d_srca)||($E_dstm==$d_srcb)))||($D_icode==$IRET)||($E_icode==$IRET)||($M_icode-$IRET==0))
		{
			$F_stall=true; 
		}
	}
    function F_write()					//��fetch�Ĵ�����ֵ��fetch stage
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm,$F_stall,$D_stall,$D_bubble,$E_bubble;
	
        if(!$F_stall)
            $F_predpc=$f_predpc;
    }


    function f_selectpc()					//�ж�f_pc��ѡ��,�����Ƿ�Ϊret�����ߴ���jump�����ж�
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
    function f_needregids()		//�Ƿ���Ҫ�Ĵ���
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
    function f_needvalc()		//�Ƿ���valc
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
	function f_geticodeifun()		//���icode�Լ�ifun
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
	function f_align()			//����rA,rB(�����Ҫ),����valC(�����Ҫ)
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
			}			if($arr[$temp2][0]=='8'||$arr[$temp2][0]=='9'||$arr[$temp2][0]=='a'||$arr[$temp2][0]=='b'||$arr[$temp2][0]=='c'||$arr[$temp2][0]=='d'||$arr[$temp2][0]=='e'||$arr[$temp2][0]=='f')			//��Ϊphp�������ͱ���,���α���û�й涨��32λ,���������������ʮ���������ķ���λ��1,����Ҫ-0x80000000*2
			{
				$f_valc-=0x80000000;
				$f_valc-=0x80000000;
			}

		}

	}
    function f_pcincresement()			//pc������
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $f_valp=$f_pc+1;
        if(f_needregids())
			$f_valp+=1;
        if(f_needvalc())
            $f_valp+=4;
    }
    function f_newpredpc()			//f_predpc��ѡ��
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if($f_icode==$IJXX||$f_icode==$ICALL)
            $f_predpc=$f_valc;
        else
            $f_predpc=$f_valp;
		
    }
	function f_exe()			//fetch stage�׶ε�ִ��
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		f_selectpc();
		f_geticodeifun();
		f_align();
		f_pcincresement();
		f_newpredpc();
	}
	function D_bubble()		//decode��bubble�Լ�stall�ж�
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

    function D_write()			//decode register�Ķ���
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


    function decode()			//��decode register�ж���ֵ
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $d_icode=$D_icode;
        $d_ifun=$D_ifun;
        $d_valc=$D_valc;
    }
    function d_newsrca()			//�ж�srcA
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
    function d_newsrcb()			//�ж�srcB
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
    function d_newdste()			//�ж�dstE
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
    function d_newdstm()			//�ж�dstM
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
    function d_newvala()			//valA�ļ���
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
    function d_newvalb()		//valB�ļ���
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
	function d_exe()			//decode stage��ִ��
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

	function E_bubble()			//execute register��bubble�ж�
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm,$F_stall,$D_stall,$D_bubble,$E_bubble;
		$E_bubble=false;
		if(($E_icode==$IJXX&&$e_bch==false)||(($E_icode==$IMRMOVL||$E_icode==$IPOPL)&&($E_dstm==$d_srca||$E_dstm==$d_srcb)))
		{
			$E_bubble=true;
			
		}
	}

    function E_write()		//execute register��д��
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




    function execute()		//execute stage��executeregister�ж���
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $e_icode=$E_icode;
        $e_vala=$E_vala;
        $e_dste=$E_dste;
        $e_dstm=$E_dstm;
    }
    function e_alua()		//���뵽alu��aֵ�ļ���
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
    function e_alub()		//���뵽alu��bֵ�ļ���
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
    function e_alufun()		//��Ҫalu�������ּ���
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if(($e_icode-$IOPL)==0	)
            return $E_ifun;
        else
            return $ALUADD;
    }
    function e_setcc()			//���Ƿ���Ҫ�ı�condition code���ж�
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        return $e_icode==$IOPL;
    }
    function e_alu()			//alu����
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $a=e_alua();
        $b=e_alub();
        switch(e_alufun())
        {
            case 0:						//�ӷ�
                $e_vale=$a+$b;
                $e_of=($a<0==$b<0)&&($e_vale<0!=$a<0);
                $e_zf=($e_vale==0);
                $e_sf=($e_vale<0);
                break;
            case 1:						//����
                $a=-$a;
                $e_vale=$a+$b;
                $e_of=($a<0==$b<0)&&($e_vale<0!=$a<0);
                $e_zf=($e_vale==0);
                $e_sf=($e_vale<0);
                break;
            case 2:						//λ��
                $e_vale=$a&$b;
                $e_of=false;
                $e_zf=($e_vale==0);
                $e_sf=($e_vale<0);
                break;
            case 3:						//�ֻ�
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
    function e_concode()			//��condition code�ĸ���
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if(($e_icode-$IOPL)==0)
        {
            $cc_of=$e_of;
            $cc_sf=$e_sf;
            $cc_zf=$e_zf;
        }
    }
    function e_branch()				//��bch���ж�
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
	function e_exe()			//execute stage��ִ��
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		execute();
		e_alu();
		e_concode();
		e_branch();


	}


    function M_write()			//memory register�Ķ���
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $M_icode=$e_icode;
        $M_vale=$e_vale;
        $M_vala=$e_vala;
        $M_dste=$e_dste;
        $M_dstm=$e_dstm;
        $M_bch=$e_bch;
    }


    function memory()			//��memory register�ж�������
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        $m_icode=$M_icode;
        $m_vale=$M_vale;
        $m_dste=$M_dste;
        $m_dstm=$M_dstm;
    }
    function m_addr()				//��Ҫ������д��memory���ݵ�ַ
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        if($M_icode==$IRRMOVL||$M_icode==$IPUSHL||$M_icode==$ICALL||$M_icode==$IMRMOVL)
            return $M_vale;
        if($M_icode==$IPOPL||$M_icode==$IRET)
            return $M_vala;
        return 0;

    }
    function m_memread()				//�Ƿ���Ҫ��memory
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        return ($M_icode==$IMRMOVL||$M_icode==$IPOPL||$M_icode==$IRET);
    }
    function m_memwrite()				//�Ƿ���ҪЩmemory
    {
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
        return ($M_icode==$IRMMOVL||$M_icode==$IPUSHL||$M_icode==$ICALL);
    }
	function m_readmem()			//���ڴ�
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
			if($arr[$temp][0]=='8'||$arr[$temp][0]=='9'||$arr[$temp][0]=='a'||$arr[$temp][0]=='b'||$arr[$temp][0]=='c'||$arr[$temp][0]=='d'||$arr[$temp][0]=='e'||$arr[$temp][0]=='f')			//ͬ��Ϊ����λΪ1��ʮ��������Ҫ��ֵ��ȥ0x80000000*2
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
		if($val<0)					//����Ǹ���,��Ҫ�ȼ���0x80000000*2,�Ա�֮�����
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
	function m_exe()				//memory stage��ִ��
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		memory();
		m_readmem();
	}

	function W_write()			//write back register�Ķ���
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		$W_icode=$m_icode;
		$W_vale=$m_vale;
		$W_valm=$m_valm;
		$W_dste=$m_dste;
		$W_dstm=$m_dstm;
	}
	function Halt()					//����haltָ���Ƶ�write back registerʱ���������
	{
		global $arr,$Data,$cc_of,$cc_zf,$cc_sf,$INOP,$IHALT,$IRRMOVL,$IIRMOVL,$IRMMOVL,$IMRMOVL,$IOPL,$IJXX,$ICALL,$IRET,$IPUSHL,$IPOPL,$RESP,$RNONE,$ALUADD,$hex,$de,$F_predpc,$f_pc,$f_icode,$f_ifun,$f_ra,$f_rb,$f_valc,$f_valp,$f_predpc,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp,$d_icode,$d_ifun,$d_vala,$d_valb,$d_valc,$d_srca,$d_srcb,$d_dste,$d_dstm,$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_srca,$E_srcb,$E_dste,$E_dstm,$e_icode,$e_vala,$e_vale,$e_dstm,$e_dste,$e_bch,$e_zf,$e_of,$e_sf,$M_icode,$M_vale,$M_vala,$M_dste,$M_dstm,$M_bch,$m_icode,$m_vale,$m_valm,$m_dste,$m_dstm,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm;
		return $W_icode==$IHALT;
	}
	function invalid()				//�������Ƿ���ָ������
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
	F_initpredpc(0x400);			//��ʼ��pc��ֵΪ0x400
	$Data[4]=0x400;					//��ʼ��esp��ֵΪ0x400
	$cnt=0;							//���ڵ�circle��
	$connect=@mysql_connect("localhost","root","wotamashitiancai");	//���ݿ�����
	if(!$connect)
	{
		echo "<script>alert('cannot connect mysql!');</script>";	//�������ݿ�ʧ�ܵ����
		exit;
	}
	mysql_select_db("pipe",$connect);
if(isset($_REQUEST[submit2]))				//�������run��ť
{
	mysql_query("drop table freg");			//ɾ��ԭ���ݿ�������
	mysql_query("drop table dreg");
	mysql_query("drop table ereg");
	mysql_query("drop table mreg");
	mysql_query("drop table wreg");
	mysql_query("drop table reg");
	mysql_query("create table freg(cir int,predpc char(20),primary key(cir))");		//�½����ݿ�
	mysql_query("create table dreg(cir int,icode char(20),ifun char(20),ra char(20),rb char(20),valc char(20),valp char(20),primary key(cir))");
	mysql_query("create table ereg(cir int,icode char(20),ifun char(20),vala char(20),valb char(20),valc char(20),dste char(20),dstm char(20),srca char(20),srcb char (20),primary key(cir))");
	mysql_query("create table mreg(cir int,icode char(20),bch char(20),vala char(20),vale char(20),dste char(20),dstm char(20),primary key(cir))");
	mysql_query("create table wreg(cir int,icode char(20),vale char(20),valm char(20),dste char(20),dstm char(20),primary key(cir))");
	mysql_query("create table reg(cir int,eax char(20),ecx char(20),edx char(20),ebx char(20),esp char(20),ebp char(20),esi char(20),edi char(20),primary key(cir))");
	$f1=fopen("output.out","w");		//�����ı����

	$queryf;
	$queryd;
	$querye;
	$querym;
	$queryw;
	$queryr;
	while(1)
	{

		m_exe();			//������forward,������ִ���Ǵ�memory��fetch	
		e_exe();
		d_exe();
		f_exe();
		m_writemem();		//ִ��д�ڴ��д���ݿ����
		w_writeback();
		F_bubble();			//�¸����ڵ�register�ĸ���bubble��stall�ж�
		E_bubble();
		D_bubble();
		F_write();			//д��register
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
		if($_REQUEST[step]=="yes")		//�����Ҫ��ʾÿ��
		{
			$i=$cnt%1024;				//ÿִ��1024������һ�����ݿ�
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
			$queryf=$queryf."($cnt,$F_predpc)";					//������register�е����ݱ����ڱ�����
			$queryd=$queryd."($cnt,$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp)";
			$querye=$querye."($cnt,$E_icode,$E_ifun,$E_vala,$E_valb,$E_valc,$E_dste,$E_dstm,$E_srca,$E_srcb)";
			$querym=$querym."($cnt,$M_icode,$bch,$M_vala,$M_vale,$M_dste,$M_dstm)";
			$queryw=$queryw."($cnt,$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm)";
			$queryr=$queryr."($cnt,$Data[0],$Data[1],$Data[2],$Data[3],$Data[4],$Data[5],$Data[6],$Data[7])";
			if($i==0)
			{
				mysql_query($queryf);			//ÿ1024��дһ�����ݿ�
				mysql_query($queryd);
				mysql_query($querye);
				mysql_query($querym);
				mysql_query($queryw);
				mysql_query($queryr);
			}
		}
		fprintf($f1,"Circle_%d\r\n--------------------\r\n",$cnt);			//�ı��ļ����
		fprintf($f1,"FETCH:\r\n\tF_predPC\t=\t%x\r\n\r\n",$F_predpc);
		fprintf($f1,"DECODE:\r\n\tD_icode\t\t=\t%x\r\n\tD_ifun\t\t=\t%x\r\n\tD_rA\t\t=\t%x\r\n\tD_rB\t\t=\t%x\r\n\tD_valC\t\t=\t%x\r\n\tD_valP\t\t=\t%x\r\n\r\n",$D_icode,$D_ifun,$D_ra,$D_rb,$D_valc,$D_valp);
		fprintf($f1,"EXECUTE:\r\n\tE_icode\t\t=\t%x\r\n\tE_ifun\t\t=\t%x\r\n\tE_valC\t\t=\t%x\r\n\tE_valA\t\t=\t%x\r\n\tE_valB\t\t=\t%x\r\n\tE_dstE\t\t=\t%x\r\n\tE_dstM\t\t=\t%x\r\n\tE_srcA\t\t=\t%x\r\n\tE_srcB\t\t=\t%x\r\n\r\n",$E_icode,$E_ifun,$E_valc,$E_vala,$E_valb,$E_dste,$E_dstm,$E_srca,$E_srcb);
		fprintf($f1,"MEMORY:\r\n\tM_icode\t\t=\t%x\r\n\tM_bch\t\t=\t%x\r\n\tM_valE\t\t=\t%x\r\n\tM_valA\t\t=\t%x\r\n\tM_dstE\t\t=\t%x\r\n\tM_dstM\t\t=\t%x\r\n\r\n",$M_icode,$bch,$M_vale,$M_vala,$M_dste,$M_dstm);
		fprintf($f1,"WRITE BACK:\r\n\tW_icode\t\t=\t%x\r\n\tM_valE\t\t=\t%x\r\n\tM_valM\t\t=\t%x\r\n\tM_dstE\t\t=\t%x\r\n\tM_dstM\t\t=\t%x\r\n\r\n",$W_icode,$W_vale,$W_valm,$W_dste,$W_dstm);
		if(Halt())
		{	
			echo "<script>alert('Halt exit!');</script>";		//��Ϊhalt�˳�
			break;
		}
		if(invalid())
		{
			echo "<script>alert('Invalid exit!');</script>";	//��Ϊvalid code�˳�
			break;
		}
	}
	if($_REQUEST[step]=="yes")		
	{
		if($cnt%1024!=0)				//����ʣ�²���1024�������ݴ浽���ݿ�
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
	echo"<table class=th align=center id='register' width='100%'>";		//������ļĴ�����ֵ
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
	echo"<table class=th align=center id='memory' width='100%'>";		//��������ڴ��ֵ
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
		echo"<table align=center class=th id='jump' width='100%'>";			//�����Ҫ��ÿ���Ļ�,�����һ����ת��ÿ���õ�����
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
