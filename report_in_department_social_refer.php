<?php 
session_start();
include("phpconf.php");
include("func.php");
conDB();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>- - �к��Թ����� | <?php echo "&nbsp;".$Hospname."&nbsp;"; ?> | - - �ʹ����Ѻ��ԡ�� -> ����觵�� Refer ���� - - |</title>
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
	  <table width="1010" cellpadding="0" cellspacing="0" align="center" >
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
                  <td height="24" colspan="2" background="img_mian/bgcolor2.gif" class="headmenu"> ��§ҹ����觵�� Refer ����</td>
                </tr>
		
		<tr>
			<td colspan='2'>
				&nbsp;
			</td>
		</tr>

                <tr align="center">
           <td colspan="2" valign="top">
<form action="<?php $PHP_SELF ?>" method="get" name="f_select_dmy">
		   <table width="360" border="1" cellspacing="2" cellpadding="1">
             <tr align="center">
               <td colspan="3"><font color="green"><b><u>���͡��ǧ����</u></b></font></td>
               </tr>


			   	<tr align="left">
					<td colspan="3">
						<?
								$sql_refer_type = "select * from refer_type";

								$result=ResultDB($sql_refer_type);//echo mysql_num_rows($result);

								print"<br/><b><u>��س����͡����������觵�� ����ͧ��ô���§ҹ</u></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
								print"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>

								
						<?

								if(mysql_num_rows($result)>0){
	
									for($i=0;$i<mysql_num_rows($result);$i++){
										
										$rs=mysql_fetch_array($result);
										
										print "<br/>";
										print "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='refer_type' value=".$rs['refer_type'].">".($rs['refer_type_name'])."</option>";
									
										
										}										    
									}
								
								




						?>


					
					</td>
               </tr>

			    	<tr align="left">

					<td>
						���͡˹��§ҹ : 
					</td>
					<td colspan="2">

						<select name='department_type'>
						<?
								$sql_department = "select * from kskdepartment";

								$result_department=ResultDB($sql_department);//echo mysql_num_rows($result);


								if(mysql_num_rows($result_department)>0){
	
									for($i=0;$i<mysql_num_rows($result_department);$i++){
										
										$rs_dp=mysql_fetch_array($result_department);
										
										
						
									print "<option value='$rs_dp[depcode]'>$rs_dp[department]</option>";

						
									
										
										}										    
									}

						?>

					</select>
					

					</td>
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
			


$sql_Socail="select
ro.refer_hospcode, concat(hp.hosptype,' ',hp.name) as refer_hospname,
rp.refer_response_type_name,rt.refer_type_name,ro.department,ro.vn,ro.refer_number,ro.hn,rfp.name as refer_point_name,ro.pre_diagnosis,d.name as doctor_name,ro.refer_number as refer_number,ks.department as department_name,ro.other_text,ro.refer_date,o.vstdate,ro.refer_time,o.vsttime,

concat(p.pname,p.fname,'  ',p.lname) as ptname,  concat(h.hosptype,' ',h.name) as hospname,pe.name as pttype_name,

 r.name as refername, ro.refer_point,ro.pre_diagnosis,ro.pdx as icd,ic.name as icd_name ,o.vstdate

   from referout ro


   left outer join ovst o on o.vn = ro.vn
   left outer join patient p on p.hn=ro.hn
   left outer join hospcode h on h.hospcode = ro.hospcode
   left outer join rfrcs r on r.rfrcs = ro.rfrcs
   left outer join refer_point_list rfp on rfp.name = ro.refer_point 
   left outer join kskdepartment ks on ks.depcode = ro.depcode
   left outer join doctor d on d.code = ro.doctor
   left outer join pttype pe on pe.pttype = o.pttype
   left outer join icd101 ic on ic.code = ro.pdx
   left outer join refer_type rt on rt.refer_type = ro.refer_type
   left outer join refer_response_type rp on rp.refer_response_type_id = ro.refer_response_type_id


   left outer join hospcode hp on hp.hospcode = ro.refer_hospcode

   where   ro.department = 'OPD' and ro.refer_date between '$d1' and '$d2' and ro.refer_type='$refer_type' and ro.depcode='$department_type'


   union  
   
   select 
   ro.refer_hospcode, concat(hp.hosptype,' ',hp.name) as refer_hospname,
   rp.refer_response_type_name,rt.refer_type_name,ro.department,ro.vn,ro.refer_number,ro.hn,rfp.name as refer_point_name,ro.pre_diagnosis,d.name as doctor_name,ro.refer_number as refer_number,ks.department as department_name,ro.other_text,ro.refer_date,o.regdate as vstdate,

   ro.refer_time,o.regtime as vsttime,concat(p.pname,p.fname,'  ',p.lname) as ptname,
   concat(h.hosptype,' ',h.name) as hospname,pe.name as pttype_name,  r.name as refername,
   ro.refer_point,ro.pre_diagnosis,ro.pdx as icd,ic.name as icd_name,o.regdate as vstdate

   from referout ro

   left outer join ipt o on o.an = ro.vn
   left outer join patient p on p.hn=ro.hn
   left outer join hospcode h on h.hospcode = ro.hospcode
   left outer join rfrcs r on r.rfrcs = ro.rfrcs
   left outer join refer_point_list rfp on rfp.name = ro.refer_point 
   left outer join kskdepartment ks on ks.depcode = ro.depcode
   left outer join doctor d on d.code = ro.doctor
   left outer join pttype pe on pe.pttype = o.pttype
   left outer join icd101 ic on ic.code = ro.pdx
   left outer join refer_type rt on rt.refer_type = ro.refer_type
   left outer join refer_response_type rp on rp.refer_response_type_id = ro.refer_response_type_id

   left outer join hospcode hp on hp.hospcode = ro.refer_hospcode

   where   ro.department = 'IPD' and ro.refer_date between '$d1' and '$d2'  and ro.refer_type='$refer_type' and ro.depcode='$department_type' ";




				$result_Socail=ResultDB($sql_Socail);//echo mysql_num_rows($resultDenService);
				if(mysql_num_rows($result_Socail)>0){
					print"<u><font color='green'><b>�ʴ������Ţͧ�ѹ��� <font color='red'>$sd1</font> ��͹ <font color='red'>".change_month_isThai($sm1)."</font> �� <font color='red'>".($sy1+543)."</font> �֧�ѹ��� <font color='red'>$sd2</font> ��͹ <font color='red'>".change_month_isThai($sm2)."</font> �� <font color='red'>".($sy2+543)."</font>";
					print"<br>�շ����� ".mysql_num_rows($result_Socail)." ��¡��</b></font></u>";
						//create row
						?><br><br>
					<table  border="1" cellspacing="0" cellpadding="0" class="bd-external">
                      <tr>
                        <td height="44" align="center"><table width="900" border="0" cellpadding="1" cellspacing="1">
                          <tr class="headtable">
                            <td width="20" height="21"  align="center" background="img_mian/bgcolor2.gif">No.</td>

							

							<td width="140"  align="center" background="img_mian/bgcolor2.gif">��ͧ</td>
							
							 <td  width="90"  align="center" background="img_mian/bgcolor2.gif">�.�.�.</td>

                            <td  width="80"  align="center" background="img_mian/bgcolor2.gif">�Ţ���Refer</td>

                            <td  width="54" align="center"  background="img_mian/bgcolor2.gif">HN</td>
                            <td  width="130" align="center"  background="img_mian/bgcolor2.gif">����-ʡ�ż�����</td>
                            <td  align="center"  background="img_mian/bgcolor2.gif">˹��»��·ҧ</td>
                            <td  align="center"  background="img_mian/bgcolor2.gif">�˵ؼŷ��١����ʸ</td>
                            <td  align="center"  background="img_mian/bgcolor2.gif">���˵ط���觵��</td>
							<td  align="center"  background="img_mian/bgcolor2.gif">�š�û���ҹ�ҹ�觵��</td>
							
						
                          </tr>

                          <?php
				$i=0;
			          while($i<mysql_num_rows($result_Socail)){//while
						 $rs_Socail=mysql_fetch_array($result_Socail);
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

						
							  <td  align="left"><?php echo $rs_Socail['department_name']; ?></td>



                            <td  align="center"><?php echo $rs_Socail['refer_date']; ?></td>
							 <td  align="center"><?php echo $rs_Socail['refer_number']; ?></td>

                            <td align="center"><?php echo $rs_Socail['hn']; ?></td>
                            <td align="left">&nbsp;<?php echo "<a href='patient_medication_record.php?hn=".$rs_Socail['hn']."&vn=".$rs_Socail['vn']."'>".change_misis($rs_Socail['ptname'])."</a>"; ?></td>
                            <td align="left">&nbsp;<?php echo $rs_Socail['refer_hospname'];?></td>
                           
							
							<td align="left"><?php echo $rs_Socail['refer_response_type_name']; ?></td>
							
							
                            <td align="left"><?php echo $rs_Socail['refername']; ?></td>

							<td align="left"><?php echo $rs_Socail['other_text']; ?></td>
                           
                          </tr>
                          <?php
						$i++;
					} //while 
					?>
                        </table></td>
                      </tr>
                    </table>
					<?php 
					$exp_file="refer_export";
					print"<br><br><img src='img_mian/excel_icon.gif' align='middle'>&nbsp;<a href='excel_export.php?sy1=$sy1&sm1=$sm1&sd1=$sd1&sy2=$sy2&sm2=$sm2&sd2=$sd2&refer_type=$refer_type&department_type=$department_type&exp_file=$exp_file'>Excel Export File</a><br><br>";
				}else{
						if($sy1<>""){print"<font color='green'><b>����բ����Ţͧ<br>�ѹ��� <font color='red'>$sd1</font> ��͹ <font color='red'>".change_month_isThai($sm1)."</font> �� <font color='red'>".($sy1+543)."</font> �֧�ѹ��� <font color='red'>$sd2</font> ��͹ <font color='red'>".change_month_isThai($sm2)."</font> �� <font color='red'>".($sy2+543)."</font></b></font>";
						}else{print"<font color='green'><b>��س����͡��ǧ���� ����Ѻ��§ҹ</b></font><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";}
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
