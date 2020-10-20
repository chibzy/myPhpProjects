<?php
class db{
	private $fields=array();
	private $country=array();
	private $state=array();
	
	function __construct(){
		
	}
	function checkstatus(){
		if(!$_SESSION){
			header("Location:index.php");
			exit();
		}
	}
	function retrieve($sql){
		$this->connectdb();
		$fields=array();
		
		$exec=mysql_query($sql);
		
		if(empty($exec)){
			#exit();
		}else{
		$i=0;
		while($values=mysql_fetch_array($exec)){#retrieve table content and save in filed list.
				$total=count($values);
				
				$fields[$i]=$values;
				$i++;
		}
		
		}#end of else.
		return $fields;
	}
	function save($sql){
		$this->connectdb();		
		$exec=mysql_query($sql);
	}
	
	function update($sql){
		$this->connectdb();		
		$exec=mysql_query($sql);
	}
	function delete($sql){
		$this->connectdb();		
		$exec=mysql_query($sql);
	}
	private function connectdb(){
		$hostname_school = "localhost";
		$database_school = "resturant";
		$username_school = "root";
		$password_school = "";
		
		$conn=mysql_connect($hostname_school,$username_school,$password_school);
		$db=mysql_select_db($database_school);
		
	}
	function gen_id(){
		$no="";
		for($i=1;$i<=6;$i++){
			$no.=rand(1,9);
		}
		$date=date('ymd');
		return "$no$date";
	}
	function genDishId(){
		$no="";
		for($i=1;$i<=4;$i++){
			$no.=rand(1,9);
		}
		$time=date('hs');
		return "$no$time";
	}
	/*function loadCountry($cur){
		
		$country=$this->retrieve("select * from country");
		
		for($i=0;$i<(count($country));$i++){
			if($cur==$country[$i][1]){
				echo "<option selected=\"selected\" value=\"{$country[$i][1]}\">{$country[$i][2]}</option>";
			}else{
				echo "<option value=\"{$country[$i][1]}\">{$country[$i][2]}</option>";
			}
		}
	}
	function loadState($sel,$st){
		$state=$this->retrieve("select * from state where country_id='$sel'");
		for($i=0;$i<(count($state));$i++){
			if($st==$state[$i][2]){
				echo "<option selected=\"selected\" value=\"{$state[$i][2]}\">{$state[$i][3]}</option>";
			}else{
				echo "<option value=\"{$state[$i][2]}\">{$state[$i][3]}</option>";
			}
		}
	}
	function loadOperatingCapacity($cur){
		$list=array(1=>"intercity","intracity","car hire","All");
		
		for($i=1;$i<=count($list);$i++){
			if($list[$i]==$cur){
				echo "<option selected=\"selected\" value=\"{$list[$i]}\">{$list[$i]}</option>";
			}else{
				echo "<option value=\"{$list[$i]}\">{$list[$i]}</option>";
			}
		}
	}
	function loadRegion($cur){
		$region=array(1=>"North Central","North West","North East","South South","South West","South East");
		
		for($i=1;$i<=count($region);$i++){
			
			if($region[$i]==$cur){
				echo "<option value='$region[$i]' selected=\"selected\">{$region[$i]}</option>";
			}else{
				echo "<option value='$region[$i]'>{$region[$i]}</option>";
			}
		}
	}
	function loadCategory($cur){
		$cat=array(1=>"Local","International","Both");
		
		for($i=1;$i<=count($cat);$i++){
			
			if($cat[$i]==$cur){
				echo "<option value='$cat[$i]' selected=\"selected\">{$cat[$i]}</option>";
			}else{
				echo "<option value='$cat[$i]'>{$cat[$i]}</option>";
			}
		}
	}
	function loadAirlineBusMode($cur){
		$cat=array(1=>"Cargo","Passenger","Charter","All");
		
		for($i=1;$i<=count($cat);$i++){
			
			if($cat[$i]==$cur){
				echo "<option value='$cat[$i]' selected=\"selected\">{$cat[$i]}</option>";
			}else{
				echo "<option value='$cat[$i]'>{$cat[$i]}</option>";
			}
		}
	}
	function loadCapacityUnit($cur){
		$cat=array(1=>"Passenger","kg");
		
		for($i=1;$i<=count($cat);$i++){
			
			if($cat[$i]==$cur){
				echo "<option value='$cat[$i]' selected=\"selected\">{$cat[$i]}</option>";
			}else{
				echo "<option value='$cat[$i]'>{$cat[$i]}</option>";
			}
		}
	}
	function loadCountriesAirline($cur){
		$cat=$this->retrieve("select * from airlines where country='$cur'");
		
		for($i=0;$i<count($cat);$i++){
			
			if($cat[$i]==$cur){
				echo "<option value='{$cat[$i]['Airline_id']}' selected=\"selected\">{$cat[$i]['name']}</option>";
			}else{
				echo "<option value='{$cat[$i]['Airline_id']}'>{$cat[$i]['name']}</option>";
			}
		}
	}
	function loadAirlineFleet($cur){
		$cat=$this->retrieve("select * from airline_fleet_reg where airline_id='$cur'");
		
		for($i=0;$i<count($cat);$i++){
			
			if($cat[$i]==$cur){
				echo "<option value='{$cat[$i]['fleet_id']}' selected=\"selected\">{$cat[$i]['name']}</option>";
			}else{
				echo "<option value='{$cat[$i]['fleet_id']}'>{$cat[$i]['name']}</option>";
			}
		}
	}
	function getAirport($id){
		$cat=$this->retrieve("select * from airport where airport_id='$id'");

		$name="";
	
		if(!empty($cat)){
			for($i=0;$i<count($cat);$i++){
				$name=$cat[$i]['name'];
			}
		}
		return $name;
	}
	function loadCountriesAirport($country,$cur){
		$cat=$this->retrieve("select * from airport where country='$country'");
		
		if(!empty($cat)){
		
		for($i=0;$i<count($cat);$i++){
			
			if($cat[$i]['airport_id']==$cur){
				echo "<option value='{$cat[$i]['airport_id']}' selected=\"selected\">{$cat[$i]['name']}</option>";
			}else{
				echo "<option value='{$cat[$i]['airport_id']}'>{$cat[$i]['name']}</option>";
			}
		}
		}else{
			echo "<option>select country</option>";
		}
	}
	function loadPaymentMode($cur){
		$number=array(1=>"Bank Transfer","Online Payment");
		
		for($i=1;$i<=count($number);$i++){
			
			if($number[$i]==$cur){
				echo "<option value='{$number[$i]}' selected=\"selected\">$number[$i]</option>";
			}else{
				echo "<option value={$number['$i']}>$number[$i]</option>";
			}
		}
	}
	function loadNoOfDrop($cur){
		$number=array(1=>"1","2");
		
		for($i=1;$i<=count($number);$i++){
			
			if($number[$i]==$cur){
				echo "<option value='$i' selected=\"selected\">$number[$i]</option>";
			}else{
				echo "<option value='$i'>$number[$i]</option>";
			}
		}
	}
	function loadYear(){
		$curYr=date('y');
		for($i=$curYr;$i>$curYr-3;$i--){
			echo "<option value='$i'>$i</option>";
		}
	}
	function loadMonth(){
		$month=array(1=>"January","Febuary","March","April","May","June","July","August","September","October","November","December");
		
		for($i=1;$i<=count($month);$i++){
			
			if($i==date('m')){
				echo "<option value='$i' selected=\"selected\">{$month[$i]}</option>";
			}else{
				echo "<option value='$i'>{$month[$i]}</option>";
			}
		}
	}
	function getFormattedMonth($yr,$month){
		if(count($month)<2){
			$month="0$month";
		}
		$date="$month-$yr";
		#echo $date."<br>";
		return $date;
	}
	function loadPassengerNo(){
		for($i=0;$i<6;$i++){
			echo "<option value=\"$i\">$i</option>";
		}
	}
	function removeFile($path,$filename){
		if(is_dir($path)==true && is_file($filename)==true){
			$f="$path/$filename";
			if(file_exists($f)){
				unlink($f);
			}else{
				echo "file is no longer there.";
			}
		}else{
			echo "the filename / path is wrong.";
		}
	}*/
	
	/*function gen_id(){
		$no="";
		for($i=1;$i<=6;$i++){
			$no.=rand(1,9);
		}
		$date=date('ymd');
		return "IGONI$no$date";
	}
	function sendMail($dest,$subject,$msg){
		
		if(mail($dest,$subject,$msg)){
			$alert="Message sent successfully";
		}else{
			$alert="Message not sent";
		}
		return $alert;
	}
	function genPsw(){
		$no="";
		for($i=1;$i<=8;$i++){
			$no.=rand(1,9);
		}
		return $no;
	}*/
	
	/*function convertToArray($val){
		$va=array();
		for($i=0;$i<(strlen($val));$i++){
			
			$va[$i]=substr($val,$i);
			
		}
		return $va;
	}
	function convertToCountry($num){
		$val=$this->retrieve("select * from country where id='$num'");
		return $val[0]['Name'];
	}
	function convertToState($num){
		$val=$this->retrieve("select * from state where state_id='$num'");
		if(isset($val)){
			$name=$val[0]['Name'];
		}else{
			$name="Not set";
		}
		return $name;
	}
	function placeImage($pix,$file){
		if($pix!=''){
			$img=$pix;
		}else{
			$img=$file;
		}
		return $img;
	}
	function isRegistered($testField,$testValue,$table){
		$val=$this->retrieve("select * from $table where $testField='$testValue'");
		if(!empty($val)){
			return true;
		}else{
			return false;
		}
	}
	function getFlightList($client_id){
		if($clent_id!=""){
			$val=$this->retrieve("select * from flight_booking where customer_id='$client_id'");
		}else{
			$val=$this->retrieve("select * from flight_booking");
		}
		return $val;
	}
	function getHotelList($id){
		if($id!=""){
			$val=$this->retrieve("select * from room_ticket where customer_id='$id'");
		}else{
			$val=$this->retrieve("select * from room_ticket");
		}
		return $val;
	}
	function getPickupBookingList($id){
		if($id!=""){
			$val=$this->retrieve("select * from pickup_ticket where customer_id='$id'");
		}else{
			$val=$this->retrieve("select * from pickup_ticket");
		}
		return $val;
	}
	function getAirline($id){
		$val=$this->retrieve("select * from airlines where airline_id='$id'");
		return $val;
	}
	function getAircraft($id){
		$val=$this->retrieve("select * from airline_fleet_reg where fleet_id='$id'");
		return $val;
	}
	function getClient($id){
		$val=$this->retrieve("select * from client_reg where email_address='$id'");
		return $val;
	}
	function getVehicle($id){
		$val=$this->retrieve("select * from fleet_pickup_price where pickup_fleet_id='$id'");
		return $val;
	}
	function getPickup($id){
		$val=$this->retrieve("select * from pickup_n_taxi where pickup_id='$id'");
		return $val;
	}
	function getHotel($id){
		$val=$this->retrieve("select * from hotel where hotel_id='$id'");
		return $val;
	}
	function getRoom($id){
		$val=$this->retrieve("select * from rooms where room_id='$id'");
		return $val;
	}
	function InterpretPayment($val){
		if($val!=''){
			$ok="paid";
		}else{
			$ok="pending";
		}
		return $ok;
	}
	function getCountry($id){
		$val=$this->retrieve("select * from country where id='$id'");
		return $val;
	}
	function getState($id){
		$val=$this->retrieve("select * from state where state_id='$id'");
		return $val;
	}
	function getFlightScheduleDetail($id){
		$val=$this->retrieve("select * from flight_schedule where flight_schedule_id='$id'");
		return $val;
	}
	function InterpretStatus($val){
		if($val==''){
			$ok="enabled";
		}else{
			$ok="Disabled";
		}
		return $ok;
	}
	function encode($item){
		$new=array(0=>'a','b','c','d','e','f','g','h','i','j');
		$finished=array();
		$date=date('dmy');
		
		if($item!=""){
			$newItem=$this->convertToArray($item);
			
			$b=count($item);
			$a=count($newItem);
			
			echo ">$b >$a <br>";
			
			for($i=1;$i<=count($newItem);$i++){
				$j=$i-1;
				$finished[$i]=$new[$item[$j]];
				
				
			}
			$cfinished=join($finished);
			$ok=$date.$cfinished;
		}
		return $ok;
	}
	function decode($item){
		$val=strlen($item);
		$valueLen=$val-6;
		
		$value=substr($item,6,$valueLen);
		echo "$value ok<br>";
		
		$new=array('a'=>0,'b'=>1,'c'=>2,'d'=>3,'e'=>4,'f'=>5,'g'=>6,'h'=>7,'i'=>8,'j'=>9);
		$finished=array();
		
		if($value!=""){
			$newItem=$this->convertToArray($value);
			
			for($i=1;$i<=count($newItem);$i++){
				$j=$i-1;
				$finished[$i]=$new[$value[$j]];
				
				
			}
			$cfinished=join($finished);
			$ok=$cfinished;
		}
		return $ok;	
	}*/
	

}
?>