<?php 
session_start();
include("phpconf.php");
include("func.php");
conDB();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>- - �к��Թ����� | <?php echo "&nbsp;".$Hospname."&nbsp;"; ?> |�ӹǹ�����·���� BP ����� <= 130/80 </title>
<style type="text/css">
<!--
body {  margin: 0px  0px; padding: 0px  0px}
body{font-family:MS Sans Serif;font-size:10pt}
table,td{font-family:MS Sans Serif;font-size:10pt}
form{font-family:MS Sans Serif;font-size:10pt}
-->
</style>
<?php
//set theme
print "<link href='css/$Theme.css' rel='stylesheet' type='text/css'>";
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>
<?php
if (!$_SESSION["ip_Log"] and !Check_Online(get_ip())){ //check  ->off line
	echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;  URL=index.php'>";
}else{ //on line

?>
<body>
<table width="1024" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="927" height="276" align="center">
	  <table width="1010" cellpadding="0" cellspacing="0" align="center">
        <tr>
          <td colspan="2" valign="top">
            <?php if (Check_Online(get_ip()) and $Header=="N") {} else {include("header.inc");} ?>
          </td>
        </tr>
        <tr>
          <td width="659" height="24" valign="middle" background="img_mian/bgcolor.gif" bgcolor="#3399CC"><?php include("manu.inc"); ?>
          </td>
          <td width="139" align="left" valign="bottom" background="img_mian/bgcolor.gif" bgcolor="#3399CC">&nbsp; </td>
        </tr>
        <tr>
          <td height="177" colspan="2" align="center" valign="top" class="td-left"><br>
              <table width="1019" border="0" cellpadding="0" cellspacing="0" class="bd-external">
                <tr align="center" bgcolor="#99CCFF">
                  <td height="24" colspan="2" background="img_mian/bgcolor2.gif" class="headmenu">�ӹǹ������ ��ԹԤ����ҹ (੾�м�������ä�á��͹ �����á��͹�ҧ�  (����ҹ),�����á��͹��ʹ���ʹᴧ  (����ҹ),�����á��͹��ͧ�Ѵ������  (����ҹ),�����á��͹�������ҧ  (����ҹ)) ����� BP ����� <= 130/80 mmHg(���)</td>
                </tr>
                <tr align="center">
           <td colspan="2" valign="top">
<form action="<?php $PHP_SELF ?>" method="get" name="f_select_dmy">
		   <table width="360" border="0" cellspacing="2" cellpadding="1">
             <tr align="center">
               <td colspan="3"><font color="green"><b><u>���͡��ǧ����</u></b></font></td>
               </tr>
             <tr>
               <td width="78">
			<?php
				print"�ѹ���&nbsp;";
				print"<select name='sd1' id='Txt-Field'>";
				if($sd1<>""){print"<option value='$sd1'>$sd1</option>";}
					for($i=1;$i<=31;$i++){
						print"<option value='$i'>$i</option>";
					}
				print"</select>"; 
				?>
				 </td>
               <td width="129">
			<?php
				print"&nbsp;��͹&nbsp;";
				print"<select name='sm1' id='Txt-Field'>";
				if($sm1<>""){print"<option value='$sm1'>".change_month_isThai($sm1)."</option>";}
					for($i=1;$i<=12;$i++){
						print"<option value='$i'>".change_month_isThai($i)."</option>";
					}
				print"</select>"; 
				?>
			   </td>
               <td width="135">
				<?php
				print"&nbsp;��&nbsp;";
				$sqlSyear="select   DISTINCT YEAR(vstdate) as s_year  from dtmain group by  vstdate desc  ";
				$result=ResultDB($sqlSyear);//echo mysql_num_rows($result);
				print"<select name='sy1'  id='Txt-Field'>";
				if($sy1<>""){print"<option value='$sy1'>".($sy1+543)."</option>";}
					 if(mysql_num_rows($result)>0){
						for($i=0;$i<mysql_num_rows($result);$i++){
						$rs=mysql_fetch_array($result);
						print "<option value='".$rs['s_year']."'>".($rs['s_year']+543)."</option>";
						}										    
					}
					print"</select>";
	   		?>&nbsp;&nbsp;&nbsp;&nbsp;	�֧		   </td>
               </tr>
             <tr>
               <td><?php
				print"�ѹ���&nbsp;";
				print"<select name='sd2' id='Txt-Field'>";
				if($sd2<>""){print"<option value='$sd2'>$sd2</option>";}
					for($i=1;$i<=31;$i++){
						print"<option value='$i'>$i</option>";
					}
				print"</select>"; 
				?></td>
               <td><?php
				print"&nbsp;��͹&nbsp;";
				print"<select name='sm2' id='Txt-Field'>";
				if($sm2<>""){print"<option value='$sm2'>".change_month_isThai($sm2)."</option>";}
					for($i=1;$i<=12;$i++){
						print"<option value='$i'>".change_month_isThai($i)."</option>";
					}
				print"</select>"; 
				?></td>
               <td>
			   <?php
				print"&nbsp;��&nbsp;";
				$sqlSyear="select   DISTINCT YEAR(vstdate) as s_year  from dtmain group by  vstdate desc  ";
				$result=ResultDB($sqlSyear);//echo mysql_num_rows($result);
				print"<select name='sy2'  id='Txt-Field'>";
				if($sy2<>""){print"<option value='$sy2'>".($sy2+543)."</option>";}
					 if(mysql_num_rows($result)>0){
						for($i=0;$i<mysql_num_rows($result);$i++){
						$rs=mysql_fetch_array($result);
						print "<option value='".$rs['s_year']."'>".($rs['s_year']+543)."</option>";
						}										    
					}
				
				print"</select>&nbsp;&nbsp;&nbsp;<input type='submit' value='Continue' id='Button'>";
	   		?>				</td>
               </tr>
           </table>
</form>

		 	</td>
                </tr>
                <tr align="center">
                  <td colspan="2">
				  
				  
				  </td>
                </tr>
                <tr>
                  <td colspan="2"><!-- end ���ҧ��ͺ���ҧ --></td>
                </tr>
                <tr align="center" valign="top">
                  <td colspan="2"> </td>
                </tr>
                <tr align="center">
                  <td colspan="2">

				  </td>
                </tr>
                <tr align="center">
                  <td colspan="2">
				  
				
			<?php
				//sql create table show
				$d1=$sy1."-".$sm1."-".$sd1;$d2=$sy2."-".$sm2."-".$sd2;//echo $d1."dd".$d2;


$sqlOpd_Socail ="select ov.vstdate,ov.hn as hn_number,concat(pt.pname,pt.fname,'  ',pt.lname) as pname,ov.pttypeno,
       ov.pttype,ptt.name as pttype_name,cl.clinic as clinic_code,cl.name as clinic_name


from ovst ov


left outer join patient pt on pt.hn = ov.hn

left outer join pttype ptt ON ptt.pttype = ov.pttype

left outer join clinicmember cm on cm.hn = ov.hn

left outer join clinic  cl on  cl.clinic = cm.clinic

left outer join clinic_cormobidity_list ccl on ccl.hn = ov.hn

left outer join clinic_cormobidity ccb on ccb.cormobidity = ccl.cormobidity 

left outer join opdscreen oc on oc.hn = ov.hn

where cm.clinic='001' and ccl.cormobidity in('2','4','5','6')

      and (oc.bps!='' and oc.bpd!='') and (oc.bps<=130 and oc.bpd<=80)

      and ov.vstdate between '$d1' and '$d2'

      
      GROUP BY ov.hn";



				$resultOpd_Socail=ResultDB($sqlOpd_Socail);//echo mysql_num_rows($resultDenService);
				if(mysql_num_rows($resultOpd_Socail)>0){
					print"<u><font color='green'><b>�ʴ������Ţͧ�ѹ��� <font color='red'>$sd1</font> ��͹ <font color='red'>".change_month_isThai($sm1)."</font> �� <font color='red'>".($sy1+543)."</font> �֧�ѹ��� <font color='red'>$sd2</font> ��͹ <font color='red'>".change_month_isThai($sm2)."</font> �� <font color='red'>".($sy2+543)."</font>";
					print"<br>�շ����� ".mysql_num_rows($resultOpd_Socail)." ��¡��</b></font></u>";
						//create row
						?><br><br>
					<table width="890" border="1" cellspacing="0" cellpadding="0" class="bd-external">
                      <tr>
                        <td height="44" align="center"><table width="900" border="0" cellpadding="1" cellspacing="1">
                          <tr class="headtable">
                            <td width="20" height="21"  align="center" background="img_mian/bgcolor2.gif">���</td>
                            <td width="120"  align="center" background="img_mian/bgcolor2.gif">�ѹ������ѡ��</td>

							 <td width="54" align="center"  background="img_mian/bgcolor2.gif">�ӹǹ����</td>

                            <td width="54" align="center"  background="img_mian/bgcolor2.gif">HN</td>
                           

                            <td width="119" align="center"  background="img_mian/bgcolor2.gif">����-ʡ��</td>

							 <td width="119" align="center"  background="img_mian/bgcolor2.gif">�����á��͹</td>
                            
                            <td width="49" align="center"  background="img_mian/bgcolor2.gif">��ԹԤ</td>
                            <td width="110" align="center"  background="img_mian/bgcolor2.gif">���ͤ�ԹԤ</td>
                            <td width="210" align="center"  background="img_mian/bgcolor2.gif">����ѵԡ�õ�ǨBP</td>
                           
                           
                          </tr>
                          <?php
				$i=0;
			        while($i<mysql_num_rows($resultOpd_Socail)){//while
						
						$rsOpd_Socail=mysql_fetch_array($resultOpd_Socail);

									
									
					$sqlOpd_Socail_details ="select count(o.hn) as hn_num
					from ovst o

					left outer join clinicmember cl on cl.hn = o.hn
					left outer join clinic c on c.clinic =cl.clinic
					left outer join opdscreen oc on oc.vn = o.vn
					left outer join patient pt on pt.hn = o.hn
					where cl.clinic = '001'  and (oc.bps!='' and oc.bpd!='') and (oc.bps<=130 and oc.bpd<=80) and o.hn='$rsOpd_Socail[hn_number]'

					and o.vstdate between '$d1' and '$d2'";

					$w=0;

					$resultOpd_Socail_details=ResultDB($sqlOpd_Socail_details);

					
					 while($w<mysql_num_rows($resultOpd_Socail_details)){
						$rsOpd_Socail_details=mysql_fetch_array($resultOpd_Socail_details);


					if ($bg=="#FFFFFF") { //color
						$bg="#B1C3D9";
					//$bgm="";
						}else{
						$bg="#FFFFFF";
						//$bgm="img_mian/bgcolor.gif";
						} //color
						?>
                          <tr bgcolor="<?php echo $bg;?>">
                            <td  align="center"><?php echo ($i+1); ?></td>
                            <td  align="center"><?php echo $rsOpd_Socail['vstdate']; ?></td>

							
							<td align="center"><?php echo $rsOpd_Socail_details['hn_num']; ?></td>
							
							
                            <td align="center"><?php echo $rsOpd_Socail['hn_number']; ?></td>
                          
                            <td align="left">&nbsp;<?php echo $rsOpd_Socail['pname']; ?>
							
							<br/>
							<font color='blue'>
							[<?php echo $rsOpd_Socail['pttype']; ?>]

							<?php echo $rsOpd_Socail['pttype_name']; ?>


							</font>
							
							</td>

							<td><a href='report_in_department_social_opd_clinic_dm_bp_cormobidity_details.php?hn=<?=$rsOpd_Socail[hn_number]?>' target='_blank' title='��ԡ���ʹ������á��͹�������˹��ͧ�ؤ�Ź��'><center>�����á��͹</center></a></td>
                           

                            <td align="center"><?php echo $rsOpd_Socail['clinic_code']; ?></td>
                            <td align="left">&nbsp;<?php echo $rsOpd_Socail['clinic_name']; ?></td>
                            <td align="center"><a href='report_in_department_social_opd_clinic_dm_bp_details.php?hn=<?=$rsOpd_Socail[hn_number]?>&d1=<?=$d1?>&d2=<?=$d2?>' target='_blank' title="��ԡ���ʹ���������´��õ�Ǩ BP �����͹䢷���˹�������¹��">��ԡ���ʹٻ���ѵԡ�õ�Ǩ BP</a></td>
                           
                        
                          </tr>
                          <?php
							  $w++;
					 }
						$i++;
					} //while 
					
					?>
                        </table></td>
                      </tr>
                    </table>
					<?php 
					
					
				}else{

					
				}
				?>
                  </td>
                </tr>
                <tr>
                  <td width="544">&nbsp;</td>
                  <td width="475">&nbsp;</td>
                </tr>
              </table>
              <!-- form -->
              <!-- end form --></td>
        </tr>
        <tr>
          <td height="16" colspan="2" align="center" background="img_mian/bgcolor2.gif" bgcolor="#B1C3D9">|&nbsp;<?php echo"<a href=\"javascript:history.back(-1)\">��͹��Ѻ</a>" ?>&nbsp;|</td>
        </tr>
        <tr>
          <td height="16" valign="top"><img src="img_mian/bn_03_2.gif" width="634" height="36"></td>
          <td height="16" valign="top">&nbsp;</td>
        </tr>
      </table>
	</td>
  </tr>
  <tr> 
    <td height="23">
	
	</td>
  </tr>
</table>
<?php 
}//ch online
CloseDB(); //close connect db ?>
</body>
</html>
