<?php
require_once ("clsdb.php");

class user extends db{
	
	function createAccount(){
		if(isset($_POST['btnCreate'])){
			$fname=mysql_escape_string($_POST['Fname']);
			$lname=mysql_escape_string($_POST['Lname']);
			$gender=mysql_escape_string($_POST['gender']);
			$dob=mysql_escape_string($_POST['txtDoB']);
			$mstatus=mysql_escape_string($_POST['mstatus']);
			$address=mysql_escape_string($_POST['address']);
			$phone=mysql_escape_string($_POST['phone']);
			$psw=mysql_escape_string($_POST['psw']);
			$cpsw=mysql_escape_string($_POST['cpsw']);
			
			if($fname!="" && $lname!="" && $address!="" && $phone!=""){
				if($psw!="" && $psw==$cpsw){
					$is_present=$this->retrieve("select phone_no from account where phone_no='$phone'");
					
					if(empty($is_present)){
						$this->save("insert into account(fname,lname,gender,marital_status,dob,phone_no,address,psw) values('$fname','$lname','$gender','$mstatus','$dob','$phone','$address','$psw')");
						$errMsg="<div class=\"success\">Account successfully created, <a href=\"#\">login</a> to access your account</a></div>";
					}else{
						$errMsg="<div class=\"err\">Phone number already used by another.</div>";
					}
				}else{
						$errMsg="<div class=\"err\">Password mismatch</div>";
					}
			}else{
				$errMsg="<div class=\"err\">One or more required fields is empty.</div>";
			}
			echo $errMsg;
		}
	}
	function login(){
		if(isset($_POST['login'])){
			$username=mysql_escape_string($_POST['username']);
			$phone=mysql_escape_string($_POST['phone']);
			$psw=mysql_escape_string($_POST['psw']);
			$msg="";
			
			if($username!="" && $phone!="" && $psw!=""){
				
				$list=$this->retrieve("select * from account");
				
				for($i=0;$i<count($list);$i++){
					if(strtolower($list[$i]['fname'])==strtolower($username) && $list[$i]['phone_no']==$phone && strtolower($list[$i]['psw'])==strtolower($psw)){
						$msg="<div class=\"success\">logged in successfully</div>";
						break;
					}else{
						$msg="<div class=\"err\">Invalid username, phone number or password.</div>";
					}
				}
				
			}else{
				$msg="<div class=\"err\">One or more required fields is empty.</div>";	
			}
			
			echo "$msg";
		}
	}
	function loginForm(){
		include("views/usreauth.php");
	}
}
?>