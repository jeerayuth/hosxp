<?php 
session_start();
include("phpconf.php");
include("func.php");
conDB();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>�к��Թ����� | <?php echo "&nbsp;".$Hospname."&nbsp;"; ?>  | - - ˹����ѡ����Ѻ�����ҹ - -|</title>
<style type="text/css">
<!--
body {  margin: 0px  0px; padding: 0px  0px}
body{font-family:MS Sans Serif;font-size:10pt}
table,td{font-family:MS Sans Serif;font-size:10pt}
form{font-family:MS Sans Serif;font-size:10pt}
.style1 {color: #FFFFFF}
-->
</style>
<?php
//set theme
$Theme=$_SESSION["Theme"];
print "<link href='css/$Theme.css' rel='stylesheet' type='text/css'>";
?>
<script language="JavaScript">
//Flash and html call this function to minimize window
function mini() {
miniobj.Click();
}
</script>
<script src="css/topmsg.js">
//Always-on-top message 
</script>
</head>
<?php
$ip=get_ip();
$online=Check_Online($ip); //func check online
if($online){$ip_Log=user_change($ip);}else{$ip_Log=$_SESSION['ip_Log'];}

if (!$_SESSION["ip_Log"]){ //check  ->off line
	echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;  URL=index.php'>";
}else{ //on line
		if  (($_SESSION["user_type"]=="online")  AND !Check_Onlines()){
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;  URL=index.php'>";}
		if($online){
		$ip_online=sys_detail($ip); //call function find ip/login/com name/depart
		$ip_name=explode("#",$ip_online);
		$ip_Add=$ip_name[0];$ip_Log=$ip_name[1];$ip_comname=$ip_name[2];$ip_Depart=$ip_name[3];
		//not online but pass word complete
				}else{ //login come to system user and passweb complete
						$ip_Log=$_SESSION["ip_Log"];
						$sql="select  * from opduser  where  loginname='$ip_Log' ";
						$result=mysql_db_query($DBName,$sql)
						or die("�������ö���͡���������ʴ���".mysql_error());
	   					$rs=mysql_fetch_array($result); 
				}//online
?>
<body>
<table width="800" border="0" cellspacing="0" cellpadding="0" class="table">
  <tr>
    <td height="736" valign="top"><table width="800" cellpadding="0" cellspacing="0">
        <tr valign="top"> 
          <td colspan="2">
<?php if (Check_Onlines() and $Header=="N") {} else {include("header.inc");} ?>
		  </td>
        </tr>
        <tr> 
          <td height="24" valign="middle" background="img_mian/bgcolor.gif" class="menu-status">&nbsp;
		  <?php
			$n_online=num_online();
			 echo "User online in HOSxP :&nbsp; <font color=white>".$n_online."</font>&nbsp;��"; 
			echo "&nbsp;ʶҹ�&nbsp;<font color=white>[ ";
			if($online){
			echo "ON Line";
			}else{
			echo "OFF Line";}
			echo " ]</font>&nbsp;��к� HOSxP"; 
						?>
		  </td>
          <td width="163" align="center" valign="middle" background="img_mian/bgcolor.gif"><font color="#FFFFFF">| &nbsp;<a href="#closeform">�Դ˹�ҵ�ҧ</a>&nbsp;|&nbsp;<a href="index.php">�͡�ҡ�к�</a>&nbsp;|</font>
			 </td>
        </tr>
        <tr> 
          <td width="637" height="187" valign="top"><div align="center"> <br>
              <table width="600" height="656" border="0" cellpadding="0" cellspacing="0" class="bd-external">
                <tr>
                  <td height="16" align="left"><table cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td width="1"></td>
                        <td width="150" align="center" style="padding-top: 12px;" title="������ѡ" onMouseOver="this.style.cursor = 'hand'" ><img src="img_mian/menu_new/main_menu.gif" border="0"></td>
                        <td width="1"></td>
                        <td width="150" align="center" style="padding-top: 12px;" title="�ͺ���������" onMouseOver="this.style.cursor = 'hand'"> <img src="img_mian/menu_new/data.gif" width="150" height="36" border="0"></td>
                        <td width="1"></td>
                        <td width="150" align="center" style="padding-top: 12px;" title="��§ҹ��ҧ�" onMouseOver="this.style.cursor = 'hand'"> <img src="img_mian/menu_new/report.gif" width="150" height="36" border="0"></td>
                        <td width="1"></td>
                        <td width="162" align="center" valign="top" style="padding-top: 12px;" title="System" onMouseOver="this.style.cursor = 'hand'" ><img src="img_mian/menu_new/system.gif" border="0"></td>
                      </tr>
                      <tr>
                        <td width="1"></td>
                        <td bgcolor="#ffffff" height="2"></td>
                        <td width="1"></td>
                        <td bgcolor="#ffffff" height="2"></td>
                        <td width="1"></td>
                        <td bgcolor="#ffffff" height="2"></td>
                        <td width="1"></td>
                        <td bgcolor="#ffffff" height="2"></td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
                <tr>
                  <td height="498" align="left" valign="top"><table width="590" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="18" colspan="2" align="left" bgcolor="#FFF2DD" ><strong> &nbsp;<font color="#000000"> �Թ�յ�͹�Ѻ �س</font><font color="#000000">&nbsp;</font><font color="red"> <?php echo $ip_Log;?></font></strong></td>
                      </tr>
                    
                    <tr>
                      <td width="192" align="right" valign="top" ><table width="185" border="0" cellspacing="0" cellpadding="0" class="bd-external">
                        <tr>
                          <td align="center" valign="middle" ><img src="img_mian/menu_new/quiz_data.gif" border="0"></td>
                        </tr>
                        <tr>
                          <td width="185" align="left" >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="patient_search.php">���Ҽ�����</a></td>
                        </tr>
                        <tr>
                          <td align="left" >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="patient_in_department_count.php">��ػ�����Ż�Ш��ѹ</a></td>
                        </tr>
                        <tr>
                          <td align="left" >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="graphic_result.php">��Ҿ��ػ������</a></td>
                        </tr>
                        <tr>
                          <td align="left" >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="drug_review_1.php">����ҳ�ҷ����</a></td>
                        </tr>
                        <tr>
                          <td align="left" >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="icd_review.php">�ѹ�Ѻ�ä��辺����</a></td>
                        </tr>
                        <tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="pttype_service.php">���� OPD Card</a> </td>
                        </tr>
                        <tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"><a href="icdsearch.php"> �������� icd10</a> </td>
                        </tr>
                     
                        <tr>
                          <td >&nbsp;</td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF"></td>
                        </tr>
                   
                     
                        <tr>
                          <td height="36" align="center"><img src="img_mian/menu_new/other.gif" width="150" height="36" border="0"></td>
                        </tr>
						
						
						 <tr>
                          <td align="left">&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="med_verify.php">�׹�ѹ�Է������ҹ�к���ͧ��</a></td>
                        </tr>
					
					

					<? if($_SESSION["pass_verify"]){ ?>
							
						<tr>
                          <td align="left">&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> 
							<a href="show_pharmacy_advice.php">��������йӻ�֡������ͧ��</a></td>
                        </tr>

						 <tr>
                          <td align="left">&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="show_pharmacy_advice_report.php">��§ҹ���йӻ�֡������ͧ��</a></td>
                        </tr>

						 <tr>
                          <td align="left">&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="show_pharmacy_advice_report_group.php">��§ҹ��ػ���йӻ�֡������ͧ��</a></td>
                        </tr>
                        
                        <tr>
                          <td align="left">&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="medicate_err_form.php">�����Դ��Ҵ�ҧ��</a></td>
                        </tr>


				
					<?}else{?>
						
						<tr>
                          <td align="left">&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> 
							��������йӻ�֡������ͧ��</td>
                        </tr>

						 <tr>
                          <td align="left">&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> ��§ҹ���йӻ�֡������ͧ��</td>
                        </tr>

						 <tr>
                          <td align="left">&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">��§ҹ��ػ���йӻ�֡������ͧ��</td>
                        </tr>
                        
                        <tr>
                          <td align="left">&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> �����Դ��Ҵ�ҧ��</td>
                        </tr>



					<? } ?>

					

						
                        
                        <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="risk_report_form.php">�غѵԡ��/�����ͧ���¹</a></td>
                        </tr>

						  <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="frm-dm-eye-screen.php" target="_blank" >�Ѵ��ͧ����ҹ��Ҩͻ���ҷ��</a></td>
                        </tr>

						 <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="show_opd_egfr.php" target="_blank" >������ѹ�֡��� GFR</a></td>
                        </tr>

						 <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="show_opd_egfr_report.php" target="_blank" >��§ҹ ������ѹ�֡��� GFR</a></td>
                        </tr>
                     

                     
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="25" align="center" ><img src="img_mian/menu_new/report.gif" width="150" height="36" border="0"></td>
                        </tr>

						<tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹ��ͧ��</b></td>
                        </tr>
						
						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="drug_repost_antibiotics.php" title="��§ҹ��Ť�ҡ�����һ�Ԫ�ǹ�">��Ť�ҡ�����һ�Ԫ�ǹ�</a></td>
                        </tr>

						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="drug_usage_report.php" title="��§ҹ��Ť�ҡ�����ҷ�����">��Ť�ҡ�����ҷ�����</a></td>
                        </tr>

						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_opd_trcs.php" title="�ӹǹ���駡������ TRCS">�ӹǹ���駡������ TRCS</a></td>
                        </tr>

						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_opd_pcec.php" title="�ӹǹ���駡������ TRCS">�ӹǹ���駡������ PCEC</a></td>
                        </tr>

						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_opd_tetanus.php" title="�ӹǹ���駡������  Tetanus">�ӹǹ���駡������  Tetanus</a></td>
                        </tr>





						<tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹ���§ҹ�������� </b></td>
                        </tr>
						
						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_OPD_baby.php" title="��§ҹ����� Refer ����">��§ҹ�� OPD �����ǧ����</a></td>
                        </tr>

						<tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹ����� </b></td>
                        </tr>

						
						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_refer.php" title="��§ҹ����� Refer ����">��§ҹ����� Refer ����</a></td>
                        </tr>
						


						<tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹ����������� </b></td>
                        </tr>

						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_pcu_vaccine_search.php" title="���ҡ�éմ�Ѥ�չ�������ͧ���������">���ҡ�éմ�Ѥ�չ��</a></td>
                        </tr>

						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_nutrition34.php" title="��§ҹ��ػ ��������ҡ���� �ѭ��3,4">�.��������ҡ�� �ѭ��3,4</a></td>
                        </tr>
						
						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_person_research.php" title="���һ�Ъҡõ�������ҹ">���һ�Ъҡõ�������ҹ</a></td>
                        </tr>


						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_opd_pcu_appointment.php" title="��§ҹ�Ѵ������������������������">��§ҹ�Ѵ������</a></td>
                        </tr>

						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_OPD_age_baby.php" title="��§ҹ�ӹǹ���ࢵ�Ѻ�Դ�ͺ���� 0-6 ��">��§ҹ���ࢵ�Ѻ�Դ�ͺ</a></td>
                        </tr>



						 <tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp; <b>��§ҹ��ͧ��ʹ</b></td>
                        </tr>

                        <tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_lr.php">�ʹ����Ѻ��ԡ�ä�ʹ</a></td>
                        </tr>

						 <tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;
						  
						  <b>��§ҹ�Ǫ����¹</b></td>
                        </tr>


						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_opd_30.php" title="��§ҹ�ӹǹ������¤�Ҹ������� 30 �ҷ">�.������¤�Ҹ������� 30 �ҷ</a></td>
                        </tr>

						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_opd_uc_all.php" title="��§ҹ�������Է��� UC ������">�.�������Է��� UC ������</a></td>
                        </tr>

						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_refer_out.php" title="��§ҹ Refer Out �¡����ش�觵��">�. Refer Out �¡��� ICD10</a></td>
                        </tr>


						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_refer_in.php" title="��§ҹ Refer In �¡���Ἱ�">�. Refer In �¡��� ICD10</a></td>
                        </tr>


						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_opd_service_time.php" title="��§ҹ���������ͤ������¡�����Ѻ��ԡ�âͧ����">�.������������¡�����Ѻ��ԡ��</a></td>
                        </tr>

						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_opd_between_diag.php" title="��§ҹ�ӹǹ�����¹͡������ԹԨ���">��§ҹ�����¹͡�к�Diag</a></td>
                        </tr>

						<tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_opd_mianma.php" title="��§ҹ�ӹǹ�����¹͡������ԹԨ���">��§ҹ��ҧ����Z008</a></td>
                        </tr>




                        <tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_opd.php">��Сѹ�ѧ�������¹͡</a></td>
                        </tr>
                        <tr>
                          <td >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="report_in_department_social_ipd.php">��Сѹ�ѧ���������</a></td>
                        </tr>
                        <tr>
                          <td > &nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_den.php">��Сѹ�ѧ���ѹ�����</a></td>
                        </tr>
                        <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_anc_out.php">��Сѹ�ѧ�� ANC �����¹͡</a></td>
                        </tr>
                       

						 <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_1.php" title="¡��鹼��ԹԨ��� E100 - E119 ��� I10">�ѵû�Сѹ�آ�Ҿ(UC)��µ�� 1</a></td>
                        </tr>

						 <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_2.php" title="���ԹԨ��� E100 - E119 ��� I10">�ѵû�Сѹ�آ�Ҿ(UC)��µ�� 2</a></td>
                        </tr>


						 <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_4.php" title="��§ҹ���������Է����ç��è��µç�����¹͡">�ç��è��µç (�����¹͡)</a></td>
                        </tr>


						 <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_ipd_1.php" title="��§ҹ���������Է����ç��è��µç�������">�ç��è��µç (�������)</a></td>
                        </tr>




						 <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_5.php" title="E-claim �����¹͡">E-Claim �����¹͡</a></td>
                        </tr>


						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_special.php" title="��§ҹ�����¹͡�¡����Է������ѡ�ҵ�ҧ�">��§ҹ�����¹͡�¡����Է�����ѡ</a></td>
                        </tr>


						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_ipd_special.php" title="��§ҹ��������¡����Է������ѡ�ҵ�ҧ�">��§ҹ��������¡����Է�����ѡ</a></td>
                        </tr>
						
						
						<tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹᾷ��Ἱ�� </b></td>
                        </tr>
						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_pat1.php" title="��§ҹ���������ع��" target="_blank">��§ҹ���������ع��(���ͺ) </a></td>
                        </tr>
						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="#" title="��§ҹ����������">��§ҹ����������(���ͺ) </a></td>
                        </tr>
						<tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹ��ͧ�ء�Թ </b></td>
                        </tr>

						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="patient_in_department_er_list.php" title="��§ҹ�����·�����Ѻ��ԡ�÷����ͧ�ء�Թ (ER)">��§ҹ�����·���Ѻ��ԡ�÷�� ER </a></td>
                        </tr>


						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="icd_er_review.php" title="��§ҹ�ѹ�Ѻ�ä��辺���·����ͧ�غѵ��˵ةء�Թ (ER) ���ҹ��">��§ҹ�ѹ�Ѻ�ä��� ER </a></td>
                        </tr>

						<tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹ�ҧ����Թ </b></td>
                        </tr>

						
						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_rcpt.php" title="�����Ẻ���������¹�����¤�ҧ����">��§ҹ�����¤�ҧ����</a></td>
                        </tr>
							<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_rcpt2.php" title="��§ҹ�١˹�����ѡ�Ҿ�Һ��">��§ҹ�١˹�����ѡ�Ҿ�Һ��</a></td>
                        </tr>

						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_hospcode.php" title="��§ҹ�����¹͡�¡���ʶҹ��Һ��">�����¹͡�¡���ʶҹ��Һ��</a></td>
                        </tr>


						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_anc_wbc.php' title='������Ѻ��ԡ�÷�� ANC'>������Ѻ��ԡ�÷�� ANC,WBC</a>

						  </td>
						 </tr>

						 	<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_not_anc_wbc.php' title='������Ѻ��ԡ��¡��鹷�� ANC'>������Ѻ��ԡ��¡��鹷�� ANC,WBC,ER</a>

						  </td>
						 </tr>

						<tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹ����ҡ�� </b></td>
                        </tr>
						
						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_ward_food.php" title=">��¡������� IPD �Ѩ�غѹ">��¡������� IPD</a></td>
                        </tr>


						<tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹ��ԹԤ�����ѹ���Ե�٧ </b></td>
                        </tr>

						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_clinic_ht_new_register.php" title="����¹������ �����ѹ���Ե�٧ �������">����¹�������������</a></td>
                        </tr>
						
						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_clinic_ht_old_register.php" title="����¹������ ��ԹԤ�����ѹ���Ե�٧ ������">����¹������������</a></td>
                        </tr>


							
					
						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_ht_new_lipidprofile.php' title='�ӹǹ��������ѹ���Ե�٧  ��Ǩ��� Lipid Profile �������'>��� Lipid Profile(�������)</a>
						  </td>
						 </tr>

						
						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_ht_old_lipidprofile.php' title='�ӹǹ��������ѹ���Ե�٧  ��Ǩ��� Lipid Profile ������'>��� Lipid Profile(������)</a>
						  </td>
						 </tr>

						
  <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_ht_new_urineprotein.php' title='�ӹǹ��������ѹ���Ե�٧  ��Ǩ��� Urine Protine �������'>��� Urine Protein(�������)</a>
						  </td>
						 </tr>

						

						  <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_ht_old_urineprotein.php' title='�ӹǹ��������ѹ���Ե�٧  ��Ǩ��� Urine Protine ������'>��� Urine Protein(������)</a>
						  </td>
						 </tr>


						 

						 
						 <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_ht_new_fbs.php' title='�ӹǹ��������ѹ���Ե�٧  ��Ǩ FBS �������'>�����Ǩ FBS (�������)</a>
						  </td>
						 </tr>


						 
						 <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_ht_old_fbs.php' title='�ӹǹ��������ѹ���Ե�٧  ��Ǩ FBS ������'>�����Ǩ FBS (������)</a>
						  </td>
						 </tr>


						
						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_ht_bp.php' title='�ӹǹ��������ѹ���Ե�٧  ����� BP ����� ���¡��� 140/90'>���� BP< ���¡��� 140/90</a>
						  </td>
						 </tr>


						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_ht_ldl100.php' title='�ӹǹ��������ѹ���Ե�٧  ����� LDL  ���¡��� 100'>���� LDL< ���¡��� 100</a>
						  </td>
						 </tr>


						 	<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_ht_urineprotein.php' title='�ӹǹ��������ѹ���Ե�٧  �����  Urine Protein  �Դ����'>���� Urine Protein �Դ����</a>
						  </td>
						 </tr>


	<tr bgcolor="yellow">
       <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹ��ԹԤ����ҹ </b></td>
    </tr>
					
					
					<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_screen_smoking.php" title="�.�Ѵ��ͧ�ٺ������">�.�Ѵ��ͧ�ٺ������ </a></td>
                    </tr>



					<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_clinic_dm_do_eye_screen.php" title="�.��Ǩ�Ҥ�������ҹ">�.��Ǩ�Ҥ�������ҹ </a></td>
                    </tr>

					<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_clinic_dm_do_foot_screen.php" title="�.��Ǩ��Ҥ�������ҹ">�.��Ǩ��Ҥ�������ҹ </a></td>
                    </tr>
							
					<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_clinic_dm_new_register.php" title="����¹������ ����ҹ �������">����¹�������������</a></td>
                        </tr>

						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_clinic_dm_old_register.php" title="����¹������ ����ҹ ������">����¹������������</a></td>
                        </tr>

						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_clinic_dm_new_hba1c.php" title="������ ����ҹ��Ǩ HbA1c �������">��Ǩ HbA1c �������</a></td>
                        </tr>

						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_clinic_dm_old_hba1c.php" title="������ ����ҹ��Ǩ HbA1c ������">��Ǩ HbA1c ������</a></td>
                        </tr>


						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_dm_new_lipidprofile.php' title='�ӹǹ��������ҹ  ��Ǩ��� Lipid Profile �������'>��� Lipid Profile(�������)</a>
						  </td>
						 </tr>

						 	
					
						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_dm_old_lipidprofile.php' title='�ӹǹ��������ҹ  ��Ǩ��� Lipid Profile ������'>��� Lipid Profile(������)</a>
						  </td>
						 </tr>


						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_clinic_dm_new_microalbumin.php" title="������ ����ҹ��Ǩ Microalbumin �������">��Ǩ Microalbumin �������</a></td>
                        </tr>

						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">&nbsp;<a href="report_in_department_social_opd_clinic_dm_old_microalbumin.php" title="������ ����ҹ��Ǩ Microalbumin ������">��Ǩ Microalbumin ������</a></td>
                        </tr>

	
						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_dm_hba1c.php' title='�ӹǹ��������ҹ  ����� HbA1c <7%'>���� HbA1c< 7%</a>
						  </td>
						 </tr>



						 <tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_dm_ldl100.php' title='�ӹǹ��������ҹ  ����� LDL  ���¡��� 100'>���� LDL< ���¡��� 100</a>
						  </td>
						 </tr>

						
						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_clinic_dm_bp13080.php' title='�ӹǹ��������ҹ  ����� BP ����� ���¡���������ҡѺ 130/80'>���� BP<= 130/80</a>
						  </td>
						 </tr>
						
						  <tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹ COPD </b></td>
                        </tr>

						<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_readmit28day.php' title='������ RE-ADMIT ���� 28 ੾�Ф��� COPD'>������ RE-ADMIT ���� 28�ѹ</a>

						  </td>
						 </tr>
					

						  <tr bgcolor="yellow">
                          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��§ҹ�ٹ��ѵ÷ͧ </b></td>
                        </tr>

							<tr>
                          <td >&nbsp; &nbsp;<img src="img_mian/collapsed.gif" width="5" height="5">
								<a href='report_in_department_social_opd_checksit.php' title='������Ѻ��ԡ�õ���ѹ��������������'>������Ѻ��ԡ�õ����������</a>

						  </td>
						 </tr>


					
						







                        <tr>
                          <td >&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="25" align="center" ><img src="img_mian/menu_new/system.gif" width="150" height="36" border="0"></td>
                        </tr>
                        <tr>
                          <td align="left" >
                            <?php
					$aright=array("ADMIN");	//protect by change user in program by online
					//echo $online;
					if($online){$right=access_right($ip_Log);}else{$right=$_SESSION["right"];}
					//echo $right;
					//if(isset($_SESSION["right"])){$right=$_SESSION["right"];}else{$right=access_right($ip_Log);}  //not work change user in program
				

					/*if(check_right($_SESSION["right"],"ADMIN")==1){
				  		echo "&nbsp;&nbsp;&nbsp;<img src=\"img_mian/collapsed.gif\" width=5 height=5>&nbsp;<a href=\"webconf.php\">Setting</a>";
					 }//cc */
				  ?>                          </td>
                        </tr>
                     

                        <tr>
                          <td align="left" >&nbsp;&nbsp;&nbsp;<img src="img_mian/collapsed.gif" width="5" height="5"> <a href="system_onlineuser.php">Current Online User</a></td>
                        </tr>
                        <?php 
					//protect by change user in program by online
					$aright=array("ADMIN");
					if($online){$right=access_right($ip_Log);}else{$right=$_SESSION["right"];}
					//if(isset($_SESSION["right"])){$right=$_SESSION["right"];}else{$right=access_right($ip_Log);}   //not work change user in program
					//echo $right;
					//echo check_right($right,$aright);
				
				  ?>
                        <tr>
                          <td align="left">
                            <?php 
				//sql check user loginname and password in web_ table
				$sql="select count(*) as cc from web_pwd where loginname='$ip_Log' ";
				$result=ResultDB($sql);$rs=mysql_fetch_array($result);
				if($rs['cc']<>0){
				  		echo "&nbsp;&nbsp;&nbsp;<img src=\"img_mian/collapsed.gif\" width=5 height=5>&nbsp;<a href=\"fchange_pwd.php\">Change Password</a>";
				}else{echo "&nbsp;&nbsp;&nbsp;<img src=\"img_mian/collapsed.gif\" width=5 height=5>&nbsp;Change Password";}//cc
				  ?></td>
                        </tr>
                        <?php 
					//protect by change user in program by online$aright=array("ADMIN","Risk_Review");
					$aright=array("ADMIN","Risk_Review");
					if($online){$right=access_right($ip_Log);}else{$right=$_SESSION["right"];}
					//if(isset($_SESSION["right"])){$right=$_SESSION["right"];}else{$right=access_right($ip_Log);} //not work change user in program
					if(check_right($right,$aright)==2){
					echo"<tr><td align='left'>\n";
				  		echo "&nbsp;&nbsp;&nbsp;<img src=\"img_mian/collapsed.gif\" width=5 height=5>&nbsp;<a href=\"#risk_set_user.php\">Set Risk User</a>";
                    echo"</td><td>&nbsp;</td></tr>\n";
					 }//cc
				  ?>
                       
                        <tr>
                          <td height="52" align="center"><span class="headtable"><img src="img_mian/menu_new/aboutas.gif" width="150" height="36" border="0" usemap="#Map"></span></td>
                        </tr>
                      </table></td>
                      <td width="398" align="left" valign="top" class="headtable"><table width="397" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="10" height="24" background="img_mian/bgcolor.gif ">&nbsp;</td>
                            <td width="378" background="img_mian/bgcolor.gif ">&nbsp; <img src="img_mian/mail.gif" width="16" height="16" align="absmiddle"> <strong><font color="#000000">����</font></strong> </td>
                            <td width="10" background="img_mian/bgcolor.gif ">&nbsp;</td>
                          </tr>
                          <tr>
                            <td bgcolor="#CAE5F8"></td>
                            <td valign="top" bgcolor="#CAE5F8"><?php
				  	//call check login for  passweb empty
					$empty_pass=empty_passweb2($ip_Log);
					if (!$empty_pass){ //�ѧ����˹� check passweb empty 
					echo "&nbsp;<font color=red>�ѧ����˹����ʼ�ҹ����Ѻ��������ҹ Web Service</font>";
					}
				  		//call check login for  passweb empty
					if (!$empty_pass and !$online){ //�ѧ����˹� check passweb empty 
					echo "&nbsp;<font color=red>��ҹ�е�ͧ Login �������к� HoSxP ��˹����ʼ�ҹ ��Ѻ</font>";
					}
				  		//call check login for  passweb empty
					if (!$empty_pass and $online){ //�ѧ����˹� check passweb empty 
					echo "&nbsp;>>&nbsp;<font color=red><a href=set_pweb.php>��˹����ʼ�ҹ</a></font>";
					}
				  	//call check login for  command_doctor
						//$sql="select  doctorcode from opduser  where loginname='$ip_Log' ";
						$Dcode=cmdDoctor_code($ip_Log);//echo $Dcode;
						//find command_doctor='$Dcode' and Approve=''  from code in command_doctor in ovst table
						//$sql_chCom_doc="select * from ovst where  (vstdate >'2005-10-01') and command_doctor='$Dcode'  and (Approve_Doctor ='' or Approve_Doctor is null) ";
						$sql_chCom_doc="select count(*) as total from ovst where  (vstdate >'2005-10-01') and command_doctor='$Dcode' ";
						$result_chCom_doc=ResultDB($sql_chCom_doc);
	   					$rs_chCom_doc=mysql_fetch_array($result_chCom_doc); 
						if($rs_chCom_doc['total']>0){
								$sqlApprComplete="select count(*) as total2 from approve_doctor where  command_doctor='$Dcode' and (vstdate >'2005-10-01') ";
								$resultApprComplete=ResultDB($sqlApprComplete);
	   							$rsApprComplete=mysql_fetch_array($resultApprComplete);//echo $rsApprComplete['total2'];
								
							echo "&nbsp;<b><font color=red>>></b>&nbsp;<u>�ѧ����׹�ѹ&nbsp;<font color=red>��¡�ä����ᾷ��</u>&nbsp;�ӹǹ ".($rs_chCom_doc['total']-$rsApprComplete['total2'])." ��¡��</font>";
							session_register('Dcode');
							echo "&nbsp;->&nbsp;<b><font color=red><a href=command_doc.php?Dcode=$Dcode>����¡��</a></font>";
						} 
						 //end  check login for  command_doctor
						
						 
						 print "<br/><br/>&nbsp;&nbsp;<font size='3' color='green'><b>- �к����ʹ�Ȣͧ�ç��Һ�� (�к��Թ�����)</b></font>&nbsp;&nbsp;<br>&nbsp;&nbsp;<font  color='blue'>


						<br>
						 
						 
						
						 <b><u><font size='4' color='black'>���ǻ�С�Ȩҡ���§ҹ������</font></u>
						<br/>
						<font color='black'>����ͧ :��ѡࡳ������Ƿҧ�������͹�Թ��͹����Ҫ��� �ͺ��� 1(1 ����¹ 2554)</font>
						<br/>
						<font color='black'>��觷�����Ҵ��� : ��ѡࡳ������Ƿҧ�������͹�Թ��͹����Ҫ��� </font>
						<br/>
							���¹ : ˹.����/˹.�ҹ �ء���·�Һ
						
						<br>
						���¤�С�����á��蹡�ͧ��û����Թ�š�û�Ժѵ��Ҫ��èѧ��Ѵ����� �բ���ѧࡵ��Ф������ ���������Ƿҧ㹡�þԨ�ó�����͹�Թ��͹����Ҫ��� �ͺ���1
						<b>��������´�����������ö��ǹ���Ŵ�¤�ԡ�ԧ���ҹ��ҧ���</b>
						<br/>
					

						<a href='download/�Ƿҧ�������͹�Թ��͹����Ҫ���.rar'><u><font color='red'>��ԡ����� ���ʹ�ǹ���Ŵ��� �Ƿҧ�������͹�Թ��͹����Ҫ���</font></u></a>
						
						 <br/>
						 <br/>";


						 echo "
						
						 <b><u><font size='4' color='black'>���ǻ�С�Ȩҡ���§ҹ�������þ�Һ��</font></u>
						<br/>
						<font color='black'>����ͧ :��èѴ��Ἱ���Թ�ҹ�� 54</font>
						<br/>
						<font color='black'>��觷�����Ҵ��� : ˹ѧ��ͨҡ�Ⱥ�� </font>
						<br/>
							���¹ : ˹.����/˹.�ҹ �ء���·�Һ
						
						<br>
						�����Ⱥ�ŵӺ����� �դ������ʧ����з�Ἱ���Թ�ҹ��Шӻէ� 54 �Ⱥ�������֧�ͺ������ѧ˹��§ҹ�ͧ��ҹ�����Ἱ�ҹ �ç�����СԨ����㴺�ҧ���д��Թ�ҹ㹾�鹷���Ⱥ�ŵӺ�������Шӻէ� 54 ��������´�����������ǹ���Ŵ���˹ѧ��� ���Ẻ�������ô��Թ�ҹ�� 54 ��ҡ�ԧ���ҹ��ҧ ��������觷��������þ�Һ�� �����ѹ�ѹ����� 8 �.�.53
						<br/>
					

						<a href='download/Ẻ�����Ἱ��ô��Թ�ҹ ��Шӻ� 2554.rar'><u><font color='red'>��ԡ����� ���ʹ�ǹ���Ŵ���˹ѧ��ͨҡ�Ⱥ�����Ẻ��ػ�ç��÷��ͧ�ʹѺʹع�ҡ�Ⱥ������</font></u></a>

						<br/>
						<br/>
						�Ԫҡ�  ������ʡ��
						<br/>
							�ӹѡ�ҹ�س�Ҿ
						<br/>
							4��.53

					

						 <br/>
						 <br/>
						
						
						 <b><u><font size='4' color='black'>���ǻ�С�Ȩҡ�ҹ�Ǻ����ä</font></u>
						<br/>	
						
						<font color='black'>����ͧ : �Ƿҧ���������ѧ�ҧ�кҴ�Է�����Щء�Թ�ҧ�Ҹ�ó�آ (�ó��ط����)</font>
						<br/>
							���¹ : ˹.����/˹.�ҹ �ء���·�Һ
						<br/>
							���ͧ����㹢�й���繪�ǧ����� �Ҩ�Դ�����ط������ �֧���������§ҹ��ҧ�
							������������駤�,�ػ�ó�,�� ��� ������ 㹡�û�Ժѵԡ�ê�������ͻ�ЪҪ�
							����Ƿҧ���ҹ�Ǻ����ä �ʨ.������������ ���˹�ҷ���Ҹ�ó�آ �黯Ժѵ�
							����Ƿҧ�ѧ�����
						<br/>
							�֧�����ء��ҹ���֡���Ƿҧ�ѧ���������������˹�ҷ�� �ء��ҹ��Һ�·��ǡѹ
						<br/>
					

						<br><a href='download/Disease Surveillance Emergency (Flood).rar'><u><font color='red'>��ԡ����� ���ʹ�ǹ���Ŵ����Ƿҧ���������ѧ�ҧ�кҴ�Է�����Щء�Թ�ҧ�Ҹ�ó�آ</font></u></a>

						<br/><br/>
							�Ԫҡ�  ������ʡ��
						<br/>
							�ӹѡ�ҹ�س�Ҿ
						<br/>
							4��.53
						 
						 
						 <br/><br/>

					
						 <b><u><font size='4' color='black'>���ǻ�С�� ���˹�ҧҹ�������þ�Һ�� (30-09-53)</font></u>
						 <br><font size='3' color='red'>����ͧ ���ԭ������Ъ���Ѵ��Ἱ�Ѳ�� þ.����</font>
						 <br>���¹���˹�ҷ�� �ء��ҹ
						 <br>�ͻ�Ъ�����ѹ�������� ����ͧ ��º�� ���.���Թ��� �ѡɳ����ɮ�  �ӹǹ10��� 
						  <br/>����������˹�ҷ���Ѻ��Һ��л�ԺѵԵ����º�����������Ъ����Ѵ��Ἱ
						  <br/>�Ѳ�� þ.���� ��ѹ��� 7-8 �.�.53 �.��ͧ��Ъ�� þ.����
						  <br/><b><u>���ԭ</u></b>���˹�ҽ������˹�ҧҹ ��������������ʹ��
						  <br/>㹧ҹ�ͧ��ҹ ������������ػ�š�ô��Թ�ҹ�� 2553 ��й��ʹ�Ἱ
						  <br/>�Ѳ�һ� 2554 �����Ҿ�ѭ�Ңͧ�ҹ�ͧ��ҹ����ͺ���� ��� 4 �Ե�
						  <br/>(��ͧ�ѹ ������� �ѡ�� ��п�鹿����ö�Ҿ) ��������ᾷ���Ҹ�ó�آ
						  <br/>�ѧ��Ѵ����� ����֧����ʹ���ͧ�Ѻ��º�¢ͧ�Ѱ����� ���Թ��� �ѡɳ����ɮ�
						  <br/>��� 10��� ���¤��
						  <br/>�ҡ�ӹѡ�س�Ҿ ��� ��.110

						 <br><a href='download/����Ҹ�ó�آ.doc'><u><font color='red'>��ԡ��������ʹ�ǹ���Ŵ����º���Ҹ�ó�آ</font></u></a>
						 
						<br/><br/><br/>					 


						 ���ǻ�С������ͧ �ӵ�Ǫ���Ѵ��ºؤ����������͹�Թ��͹��Шӻ�
						<br/>���¹ ���˹�ҽ������˹�ҧҹ�ء��ҹ��Һ
						<br/>�����ء��ҹ �Ѵ�Ӥ��Ѻ�ͧ��û�Ժѵԧҹ��е�Ǫ���Ѵ��ºؤ��
						<br/>(�ͧ�����ѧ�Ѻ�ѭ��)��е�Ƿ�ҹ�ͧ ���������ѧ�Ѻ�ѭ�ҾԨ�ó�
						<br/>����͹�Թ��͹��Шӻ��ͺ2 �է� ����ҳ 2553
						<br/>�֧��Ṻ��������ҧ�ͧ�������Һ�� �����繵�����ҧ �����
						<br/>PowerPoint ��ù��ʹ����ͷӤ������㨴����ա 2���
						<br/>�����ء���ª��¡ѹ�ӹФ� ����������������������ʹ���ͧ�Ѻ
						<br/>Vision(����·�ȹ�)+�ѹ��Ԩ+�ط��ʵ��
						<br/><a href='download/KPIIDP.zip'><u>��ԡ��������ʹ�ǹ���Ŵ��������ҧ</u></a>
						 </font><br>
						 
						 ";







	
			



						
				  
				  
				  ?>                              </td>
                            <td bgcolor="#D4ECFA" >&nbsp;</td>
                          </tr>
                          <tr>
                            <td bgcolor="#CAE5F8">&nbsp;</td>
                            <td height="16" bgcolor="#CAE5F8" >&nbsp;</td>
                            <td bgcolor="#CAE5F8" >&nbsp;</td>
                          </tr>
                                            </table></td>
                    </tr>
                    <tr align="center">
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr align="center" >
                      <td colspan="2">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
              </table>
              
			  <?php print"<p><table width='400' border='0' cellspacing='0' cellpadding='0' class='bd-external'><tr><td align='center'><b><font color='#FF0000'>Programming &amp; Development &amp; Design By :: <br>���§ҹ�ͷ� �ç��Һ������, Lamae Team Support</font></b></td></tr></table></p>"; ?><br>
          </div></td>
          <td width="163" align="left" valign="top" class="td-right"> 
            <p>
              <?php
			echo "<table  width='163' border='0' cellspacing='0' cellpadding='0' class='bd-external'><tr>";
            echo"<td height=\"58\" background=\"img_mian/menu_new/hosxp_loin.jpeg\" class=\"headtable\" align='center'>HOSxP Data Login</td></tr>";
            echo"<tr><td align=\"left\" bgcolor=\"#FFF2DD\">";
		  	echo "&nbsp;<center><b>::&nbsp;<u>�����Ţͧ�س</u>&nbsp;::</b></center>";
		  //select full name
  						$sql2="select  * from opduser  where  loginname='$ip_Log' ";
						$result2=mysql_db_query($DBName,$sql2)
						or die("�������ö���͡���������ʴ���".mysql_error());
	   					$rs2=mysql_fetch_array($result2); 
		  	echo "&nbsp;<b>User :</b>&nbsp;<font color=green>&nbsp;&nbsp;".$ip_Log."</font><br>"."&nbsp;<b>Full Name :</b><br>&nbsp;<font color=green>&nbsp;&nbsp;".$rs2["name"]."</font>";
		  	echo "<br>&nbsp;<b>IP Address :</b><br>&nbsp;";
		  	echo "<font color=green>&nbsp;&nbsp;";
		  if (!$ip_Add){
		  echo $ip."</font>";
		  }else{echo $ip_Add."</font>";}
		  echo "<br>&nbsp;<b>Computer Name :</b><br>&nbsp;";
		  echo "<font color=green>";
		  if (!$ip_comname){  
		  echo"&nbsp;&nbsp;-"."</font>";
		  }else{echo $ip_comname."</font>";}
		  if (!$ip_Depart){ 
		  echo "<br>&nbsp;<b>Position :</b><br>&nbsp;<font color=green>&nbsp;&nbsp;".$rs["entryposition"]."</font><hr>";
		  }else{
		  echo "<br>&nbsp;<b>Department :</b><br>&nbsp;<font color=green>".$ip_Depart."</font><hr>";
		  }
		echo"</td></tr></table>";
			?>
            </p>
          

		</td>
        </tr>
        <tr> 
          <td height="16" align="center" background="img_mian/bgcolor.gif" bgcolor="#B1C3D9"> 
		  <font color="#FFFFFF">| &nbsp;<a href="#closeform">�Դ˹�ҵ�ҧ</a>&nbsp;|&nbsp;<a href="index.php">�͡�ҡ�к�</a>&nbsp;|</font>
		  </td>
          <td height="16" background="img_mian/bgcolor.gif" bgcolor="#3399CC">&nbsp;</td>
        </tr>
        <tr valign="top"> 
          <td height="100"><img src="img_mian/bn_03_2.gif" width="634" height="36"></td>
          <td height="100" align="center" valign="middle">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="23"><br>
        <br>
     </td>
  </tr>
</table>
<map name="Map">
  <area shape="rect" coords="35,8,112,26" href="about.php">
</map>
</body>
<?php 
 } //check
?>
</html>