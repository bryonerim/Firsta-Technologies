<?php
session_start();
include_once('dbcon.php');
if(!isset($_SESSION['username'])){
    header('location: index.php');
}


$error = false;

if(isset($_POST['btn-register'])){ 
    $username = $_POST['username'];
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $email = $_POST['email'];
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = $_POST['password'];
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $confirmpassword = $_POST['confirmpassword'];
    $confirmpassword = strip_tags($confirmpassword);
    $confirmpassword = htmlspecialchars($confirmpassword);

    $phone = $_POST['phone'];
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);

    $dob = $_POST['dob'];
    $dob = strip_tags($dob);
    $dob = htmlspecialchars($dob);

    $firstname = $_POST['firstname'];
    $firstname = strip_tags($firstname);
    $firstname = htmlspecialchars($firstname);

    $surname = $_POST['surname'];
    $surname = strip_tags($surname);
    $surname = htmlspecialchars($surname);

    $phone = $_POST['phone'];
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);

    $sex = $_POST['sex'];
    $sex = strip_tags($sex);
    $sex = htmlspecialchars($sex);

    $state = $_POST['state'];
    $state = strip_tags($state);
    $state = htmlspecialchars($state);

    $address = $_POST['address'];
    $address = strip_tags($address);
    $address = htmlspecialchars($address);

    $date = $_POST['date'];
    $date = strip_tags($date);
    $date = htmlspecialchars($date);

    $programme = $_POST['programme'];
    $programme = strip_tags($programme);
    $programme = htmlspecialchars($programme);

    if($programme=="Basic Computer Training"){
        $fee='20000';
    }elseif($programme=="Advanced Computer Training"){
     $fee ='30000' ;  
    }elseif($programme=="Website Development(Contemporary)"){
        $fee='20000';
    }elseif($programme=="Website Development(Career)"){
        $fee='30000';}
        elseif($programme=="Ethical Hacking"){
            $fee='40000';
        }elseif($programme=="Video Editing(contemporary)"){
            $fee='25000';
        }elseif($programme=="Video Editing(career)"){
            $fee='40000';
        }elseif($programme=="Graphic Design(contemporary)"){
            $fee='20000';
        }elseif($programme=="Graphic Design(career)"){
            $fee='30000';
        }elseif($programme=="Blogging"){
            $fee='15000';
        }elseif($programme=="Bulk SMS"){
            $fee='10000';
        }elseif($programme=="Computer Programming"){
            $fee='40000';
        }else{
        $fee = "100000";
    }


    //validate
   
    if(empty($username)){
        $error = true;
        $errrorUsername = 'Please Input Username'; 
    }
    if(empty($email)){
        $error = true;
        $errorEmail = 'Please Enter a valid Email';
    }

if(empty($password)){
    $error = true;
    $errorPassword = 'Please input a password';
}elseif(strlen($password) < 6){
    $error = true;
    $errorPassword = 'Password should be at least 6 characters long';
}
if($password!=$confirmpassword){
    $error = true;
    $errorconfirm = 'Password do not match';
}



//encryption
$password = md5($password);

//insert data if successful

    if(!$error){
        $sql = "insert into tbl_users(username, email, password, phone, dob, firstname, surname, sex, state, address, programme, fee, date) values('$username', '$email', '$password', '$phone', '$dob', '$firstname', '$surname', '$sex', '$state', '$address', '$programme', '$fee', '$date')";
        if(mysqli_query($conn, $sql)){
            $successMsg = 'Registration Successful';
        }else{
            echo 'Error '.mysqli_error($conn);
        }
    }
}




?>

<html>
    <head>
        <title>
           FirstaApp
        </title>
        <link rel="stylesheet" type="text/css" href="modalstyle.css">
        <style>
           

/* reset */

input{
    border:solid 1px;
}
select{
    border:none;
}
button:-moz-focusring{
	outline:1px dotted ButtonText;}
}
tr{
    font-size:20px;
    height:50px;
}

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; width:170px; height:14px;}

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }


/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left;}
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; font-size:14px;}
td { border-color: #DDD; }


    /* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: left; width: 100%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 100%; }
table.meta td { width: 100%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: left; }

table.inventory td:nth-child(1) { width: 100%; }
table.inventory td:nth-child(2) { width: 100%; }
table.inventory td:nth-child(3) { text-align: left; width: 12%; }
table.inventory td:nth-child(4) { text-align: left; width: 12%; }
table.inventory td:nth-child(5) { text-align: left; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 100%; }
table.balance td { text-align: left; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; font-family:trebuchet;}
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
.mid{
	border:0px;
}
.data{
	width:10px;
}

        
        .w3-modal-content{
            width: 1364px; 
            
            height: 604px;
         
           
        }
      .w3-button{
          border:none;display:inline-block;padding:8px 16px;vertical-align:middle;overflow:hidden;text-decoration:none;color:inherit;text-align:center;cursor:pointer;white-space:nowrap;
          background-color: buttonface;
        }


        h3{
    color: #2196F3!important;
}
        h5{
    color: #2196F3!important;
}
table{
    font-size: 17px;
}
strong{
    color: green;
}
#fc{
    width: 45px;
}
#reg{
    width: 75px;
}
prt{
    color: green;  
}
.dat{
    text-align: right;}


#id01{
    width: 100%;
}

.notice{
    color: green;
    font-size: 20px;
}
.form-control{
    border:none;
}
dang{
    color:green;
}
            </style>
    </head>
    <body> 
        
        <div id="id1" class="w3-modal-content w3-card-4 w3-animate-zoom">
         <header class="w3-container w3-blue"> 
          <span onclick="document.getElementById('id1').style.display='none'" 
          class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
          <center><h2> <?php echo $_SESSION['username']; ?> ,Welcome to Admin Dashboard</h2></center>
         </header>
       
         <div class="w3-bar w3-border-bottom">
          <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'London')">Register</button>
          <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Paris')">Reprint</button>
          <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Tokyo')">Pay Fee</button>
          <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Receipt')">Receipt</button>
          <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Assess')">Assessment</button>
          
          <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Certs')">Certificates</button>
          <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Portals')">Other-Portals</button>
          <button class="tablink w3-bar-item w3-button w3-right" onclick="openCity(event, 'About')">About</button>
         </div>
       
         <div id="London" class="w3-container city">
        <table cellspacing=5>
    
            <form method="post" action="<?php echo htmlspecialcharS($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            


<tr><th>
                    <label for="date" class="control-label">Confirm Today's Date</label></th><td>
                    <input type="date" name="date" class="form-control" autocomplete="off"></td>
           
         
                    <th>    
                    <label for="username" class="control-label">Username</label></th><td>
                    <input type="username" name="username" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errrorUsername))echo $errrorUsername; ?></span></td></tr>
          
                    <tr><th>
                    <label for="email" class="control-label">Email</label></th><td>
                    <input type="email" name="email" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errorEmail))echo $errorEmail; ?></span></td>
             
                    <th>
                    <label for="password" class="control-label">Password</label></th><td>
                    <input type="password" name="password" class="form-control" autocomplete="off"></td><td class="mid">
                    <?php if(isset($errorPassword))echo $errorPassword; ?></td></tr>
                
                    <tr><th>
                    <label for="confirmpassword" class="control-label">Confirm Password</label></th><td>
                    <input type="password" name="confirmpassword" class="form-control" autocomplete="off"><?php if(isset($errorconfirm))echo $errorconfirm; ?></td>
               

              <th>
                    <label for="phone" class="control-label">Phone</label></th><td>
                    <input type="number" name="phone" class="form-control" autocomplete="off" required></td><td class="mid">
                   </td></tr>
                    
              <tr> <th>
                    <label for="dob" class="control-label">Date of Birth</label></th><td>
                    <input type="date" name="dob" class="form-control" autocomplete="off" required></td>
                    
                <th>
                    <label for="firstname" class="control-label">First Name</label></th><td>
                    <input type="text" name="firstname" class="form-control" autocomplete="off" required></td></tr>
                    
            <tr>   <th>
                    <label for="surname" class="control-label">Surname</label></th><td>
                    <input type="text" name="surname" class="form-control" autocomplete="off" required></td>
                    
                <th>
                    <label for="sex" class="control-label">Sex</label></td><td>
                    <select name="sex" id="sex" required>
                    <option value="0">Select Gender....</option>
                    <option value ="Male">Male</option>
                    <option value ="Female">Female</option>
                    </select></td></tr>
                 <tr><th>
                    
                    <label for="state" class="control-label">State</label></th><td>
                    <select name="state" id="state" required>
                    <option value ="Cross River">Cross River</option>
                    <option value ="Akwa Ibom">Akwa Ibom</option>
                    <option value ="Imo">Imo</option>
                    <option value ="Anambra">Anambra</option>
                    <option value ="Rivers">Rivers</option>
                    <option value ="Delta">Delta</option>
                    <option value ="Bayelsa">Bayelsa</option>
                    <option value ="Ebonyi">Ebonyi</option>

                    </select></td>
                   
                    <th>
                    <label for="address" class="control-label">Address</label></th><td>
                    <input type="address" name="address" class="form-control" autocomplete="off" required></td></tr>
                   
                   <tr><th>
                    <label for="programme" class="control-label">Programme</label></td><td>
                    <select name="programme" id="programme" style="width:200px;" required>
                    <option value ="Basic Computer Training">Basic Computer Training</option>
                    <option value ="Advanced Computer Training">Advanced Computer Training</option>
                    <option value ="Website Development(Contemporary)">Website Development(Contemporary)</option>
                    <option value ="Website Development(Career)">Website Development(Career)</option>
                    <option value ="Ethical Hacking">Ethical Hacking</option>
                    <option value ="Video Editing(contemporary)">Video Editing(contemporary)</option>
                    <option value ="Video Editing(career)">Video Editing(career)</option>
                    <option value ="Graphic Design(contemporary)">Graphic Design(contemporary)</option>
                    <option value ="Graphic Design(career)">Graphic Design(career)</option>
                    <option value ="Blogging1">Blogging</option>
                    <option value ="Bulk SMS">Bulk SMS</option>
                    <option value ="Computer Programming">Computer Programming</option>

                    </select></td><td class="mid"></td><td class="mid"></td>
                   
                
                  <td class="mid"> <button type="submit" class="form-group w3-button" name="btn-register">Register</button></td><td class="mid"></td>
</form>

                  
                    <?php
if(isset($_POST['btn-register'])){
    $sql = "SELECT * FROM tbl_users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    
    $resultCheck = mysqli_num_rows($result);
    
    
    if($resultCheck != ""){
        while($row = mysqli_fetch_assoc($result)){
           echo "<strong>You Have been Registered Successfully, your Registration Number is:</strong> FC2200".$row['can_id'];
    
}
    }

}else{
    echo '<h3>Register New Candidate Here</h3>';
}
                    ?>
</td></tr>
                </div>
                </table>
        </div>
       
         <div id="Paris" class="w3-container city">
             <div class="container">
             <form action ="print1.php" method="post">
<h3>Reprint Registration Slip Here</h3><table>
<tr><th>Complete Your Reg No:</th><td>
<input type=text id=fc name=fc maxlength=4 value=FC22 class=mid><input class=mid type=text id=reg name=can_id required></td><td class=mid>
         <button type ="submit" name="fetchprint" class=w3-button>Fetch</button></td><td class=mid></td><td class=mid></td></tr></table>
  
         </form>
        

     

<script>
function myFunction() {
  window.open("http://localhost/firstaapp/print.php", "", "toolbar=yes,scrollbars=yes,resizable=yes,width=800,height=650");
}
</script>   
               
               
         </div>
</div>
       
         <div id="Tokyo" class="w3-container city">
         
         <div id=paypage>
         <table>
         <?php


if(isset($_POST['fetch'])){ 

    $can_id=$_POST['can_id'];

$sql = "SELECT * FROM tbl_users WHERE can_id='$can_id'";
$records=mysqli_query($conn, $sql);


while($row =mysqli_fetch_assoc($records)){
$feepaid=$row['feepaid'];
$fee=$row['fee'];
$debt=($fee-$feepaid);
if($debt!=$fee){
    $error = true;
    $errorFee ='<h3>Please pay your outstanding debt completely in the second installment</h3>';
}


$can_id=$row['can_id'];
$form1= "<form action ='home.php' method='post'>
<tr><th>Reg No:<input class=form-control type=text id=fc name=fc maxlength=4 value=FC22><input class=form-control type=text id=reg name=can_id></th>
<th>Amount:<input class=form-control type=text name='realfeepaid' value='".$row['feepaid']."'></th><td class=mid>
<input type ='submit' name='paid' value='Pay' class=w3-button></td></tr>
</form>"; 
$form2= "<h3>You are paying second installment</h3><form action ='home.php' method='post'>
<tr><th>Reg No:<input class=form-control type=text id=fc name=fc maxlength=4 value=FC22><input class=form-control type=text id=reg name=can_id></th><th>
Amount:<input class=form-control type=text name='realfeepaid2' value='".$row['feepaid2']."'></th><td class=mid>
<input type ='submit' name='paid2' value='Pay'></td></tr>
</form>"; 

if(isset($errorFee)) {echo $errorFee;}
if($feepaid>0){
echo $form2;
}else{
echo $form1;
}
echo "<tr>";
   echo "<td><strong>Full Name:</strong></td><td>".$row['firstname'].' ' .$row['surname'] . "</td>";echo "</tr>";
   echo "<tr>";
   echo "<td><strong>Registration No:</strong></td><td>".'FC2200'.$row['can_id'] . "</td>";echo "</tr>";
   echo "<tr>";
    echo '<td><strong>Outstanding Debt:</strong></td><td> <strike>N</strike>'.$debt ."</td>";echo "</tr>";
}}else{echo '<h3>Fee Payment</h3>';}
if(isset($_POST['paid'])){
$realfeepaid=$_POST['realfeepaid'];
$can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET feepaid=$realfeepaid WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
echo '<strong>Payment of Fee was Successful, Proceed to Print Receipt</strong>';
}
}
if(isset($_POST['paid2'])){
$realfeepaid2=$_POST['realfeepaid2'];
$can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET feepaid2=$realfeepaid2 WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
echo '<strong>Payment of Second Installment Fee was Successful, Proceed to Print Receipt</strong>';
}

}

?>
           
           
  
    
           
           <?php  echo"<form action=home.php method='post'>";
    echo "<tr><th>Complete Your Reg No:</th>";
    echo "<td><input type=text id=fc class=form-control name=fc maxlength=4 value=FC22><input class=form-control type=text id=reg name=can_id></td>";
     echo  "<td class=mid><button id=buton class=w3-button name='fetch'>Fetch</button></td><td class=mid></td><td class=mid></td><td class=mid></td></tr>";
               echo  "</form>";?> </table>
               <div class="notice">
        
        * Installmental payment is allowed at 60%
        <br>
        </div>
           </div>
         </div>

         <div id="Receipt" class="w3-container city">
             <div class="container">
             <form action ="receipt1.php" method="post">
                 <h3>Print Receipt</h3><table>
<tr><th>Complete Your Reg No:</th><td>
<input type=text id=fc name=fc maxlength=4 value=FC22 class=mid><input class=mid type=text id=reg name=can_id required></td><td class=mid>
         <button type ="submit" name="fetchreceipt" class=w3-button>Fetch</button></td><td class=mid>  <span><?php if(isset($errorAdvance)){echo $errorAdvance;} ?></span>
</td><td class=mid></td> </tr></table>  </form>
      <?php  
    if(isset($_POST['fetchreceipt'])){
        $can_id=$_POST['can_id'];
       $sql = "SELECT * FROM tbl_users WHERE can_id='$can_id'";
$records=mysqli_query($conn, $sql);


while($row =mysqli_fetch_assoc($records)){
    $feepaid=$row['feepaid'];
    $feepaid2=$row['feepaid2'];
if($feepaid==0){
    $error = true;
    $errorAdvance ='Please you have not made any payment yet';
}}

}?>               
               
         </div>
</div>
       
         <div id="Assess" class="w3-container city">
             <div class="container">
            
             <form method='post'>
    <h3>Complete Your Registration Number:</h3>
    <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id>
     <button name='fetchass'>Fetch</button>
               </form>
 

       
               
               <table width="400" border="0" cellspacing="3">
                <?php
if(isset($_POST['fetchass'])){
    $can_id = $_POST['can_id'];

$sql = "SELECT * FROM tbl_users WHERE can_id='$can_id'";
$result = mysqli_query($conn, $sql);

$resultCheck = mysqli_num_rows($result);


if($resultCheck > 0);{
    while($row = mysqli_fetch_assoc($result)){
$programme = $row['programme'];
$assbasic=$row['assbasic'];
if($assbasic>0){
    $error=true;
    $errorAss='Computer Basics Assessment uploaded';
}
  echo "<tr>";
       echo "<td><strong>Full Name:</strong></td><td>".$row['firstname'].' ' .$row['surname'] . "</td>";echo "</tr>";
       echo "<tr>";
       echo "<td><strong>Registration No:</strong></td><td>".'FC2200'.$row['can_id'] . "</td>";echo "</tr>";
        echo "<tr>";
        echo '<td><strong>Programme:</strong></td><td> '.$row['programme'] . "</td>";echo "</tr>";
      

        if($programme =='Basic Computer Training'){
            $assform = '<form action=home.php method=post><tr><td>
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>   
          <tr><td>  <label for=assbasic class=control-label>Computer Basics</label></td><td>
            <input type=number name=assbasic class=form-control value="'.$row['assbasic'].'">
            </td>
           
            <td>    
            <label for=assword class=control-label>Microsoft Word</label></td><td>
            <input type=number name=assword class=form-control value="'.$row['assword'].'">
            </td>
            <tr><td>    
            <label for=asspower class=control-label>Microsoft Powerpoint</label></td><td>
            <input type=number name=asspower class=form-control value="'.$row['asspower'].'">
            </td>
            <td>    
            <label for=assexcel class=control-label>Microsoft Excel</label></td><td>
            <input type=number name=assexcel class=form-control value="'.$row['assexcel'].'">
            </td>
            <tr>    
          
            <td>    
            <label for=assinternet class=control-label>Internet</label></td><td>
            <input type=number name=assinternet class=form-control value="'.$row['assinternet'].'">
           </td><td><button type=submit name=post>Post</button></td></tr></form>';

        }elseif($programme=="Advanced Computer Training"){
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=assbasic class=control-label>Computer Basics</label></td><td>
            <input type=number name=assbasic class=form-control value="'.$row['assbasic'].'">
            
            <td>    
            <label for=assword class=control-label>Microsoft Word</label></td><td>
            <input type=number name=assword class=form-control value="'.$row['assword'].'">
         
            <tr><td>    
            <label for=asspower class=control-label>Microsoft Powerpoint</label></td><td>
            <input type=number name=asspower class=form-control value="'.$row['asspower'].'">
            
            <td>    
            <label for=assexcel class=control-label>Microsoft Excel</label></td><td>
            <input type=number name=assexcel class=form-control value="'.$row['assexcel'].'">
         
            <tr><td>    
            <label for=asscorel class=control-label>CorelDraw</label></td><td>
            <input type=number name=asscorel class=form-control value="'.$row['asscorel'].'">
           
            <td>    
            <label for=assinternet class=control-label>Internet</label></td><td>
            <input type=number name=assinternet class=form-control value="'.$row['assinternet'].'">
           </td><td><button type=submit name=postad>Post</button></td></tr></form>';
            
        }elseif($programme=="Website Development(Contemporary)"){
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=assweb class=control-label>Web Development</label></td><td>
            <input type=number name=assweb class=form-control value="'.$row['assweb'].'">
            </td><td><button type=submit name=postweb>Post</button></td></tr>
            </form>';
        }elseif($programme=="Website Development(Career)"){
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=asswebad class=control-label>Web Development(Career)</label></td><td>
            <input type=number name=asswebad class=form-control value="'.$row['asswebad'].'">
            </td><td><button type=submit name=postwebad>Post</button></td></tr>
            </form>';
        }elseif($programme=="Ethical Hacking"){
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=asshack class=control-label>Ethical Hacking</label></td><td>
            <input type=number name=asshack class=form-control value="'.$row['asshack'].'">
            </td><td><button type=submit name=posthack>Post</button></td></tr>
            </form>';
        }elseif($programme=="Video Editing(contemporary)"){
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=assvideo class=control-label>Video Editing</label></td><td>
            <input type=number name=assvideo class=form-control value="'.$row['assvideo'].'">
            </td><td><button type=submit name=postvideo>Post</button></td></tr>
            </form><form>
            ';
        }elseif($programme=="Video Editing(career)"){
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=assvideoad class=control-label>Video Editing(Career)</label></td><td>
            <input type=number name=assvideoad class=form-control value="'.$row['assvideoad'].'">
            </td><td><button type=submit name=postvideoad>Post</button></td></tr>
            </form><form>';
        }elseif($programme=="Graphic Design(contemporary)"){
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=asscorel class=control-label>Graphic Design</label></td><td>
            <input type=number name=asscorel class=form-control value="'.$row['asscorel'].'">
            </td><td><button type=submit name=postgraph>Post</button></td></tr>
            </form><form>';
        }elseif($programme=="Graphic Design(career)"){
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=asscorel class=control-label>Graphic Design</label></td><td>
            <input type=number name=asscorel class=form-control value="'.$row['asscorel'].'">
            </td><td>
            <td>
            
            <label for=assphoto class=control-label>Photoshop</label></td><td>
            <input type=number name=assphoto class=form-control value="'.$row['assphoto'].'">
            </td><td><button type=submit name=postgraphad>Post</button></td></tr>
            </form><form>
           ';
        }elseif($programme=="Blogging"){
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=assblog class=control-label>Blogging</label></td><td>
            <input type=number name=assblog class=form-control value="'.$row['assblog'].'">
            </td><td><button type=submit name=postblog>Post</button></td></tr>
            </form><form>';
        }elseif($programme=="Bulk SMS"){
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=assbsms class=control-label>Bulk SMS</label></td><td>
            <input type=number name=assbsms class=form-control value="'.$row['assbsms'].'">
            </td><td><button type=submit name=postbsms>Post</button></td></tr>
            </form><form>';
        }elseif($programme=="Computer Programming"){
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=asscp class=control-label>Computer Programming</label></td><td>
            <input type=number name=asscp class=form-control value="'.$row['asscp'].'">
            </td><td><button type=submit name=postcp>Post</button></td>
            </form><form>
            ';
        }else{
            $assform = ' <form action=home.php method=post><tr><td>  
            <input type=text id=fc name=fc maxlength=4 value=FC22><input type=text id=reg name=can_id></td></tr>  
         <tr><td>   <label for=assbasic class=control-label>Computer Basics</label></td><td>
            <input type=number name=assbasic class=form-control value="'.$row['assbasic'].'">
            </td><td><button type=submit name=postbasic>Post</button></td>
            </form><form>
            <td>    
            <label for=assword class=control-label>Microsoft Word</label></td><td>
            <input type=number name=assword class=form-control value="'.$row['assword'].'">
            </td><td><button type=submit name=postword>Post</button></td></tr>
            </form><form>
            <tr><td>    
            <label for=asspower class=control-label>Microsoft Powerpoint</label></td><td>
            <input type=number name=asspower class=form-control value="'.$row['asspower'].'">
            </td><td><button type=submit name=postpower>Post</button></td>
            </form><form>
            <td>    
            <label for=assexcel class=control-label>Microsoft Excel</label></td><td>
            <input type=number name=assexcel class=form-control value="'.$row['assexcel'].'">
            </td><td><button type=submit name=postexcel>Post</button></td></tr>
            </form><form>
            <tr><td>    
            <label for=asscorel class=control-label>CorelDraw</label></td><td>
            <input type=number name=asscorel class=form-control value="'.$row['asscorel'].'">
           </td><td><button type=submit name=postcorel>Post</button></td>
            </form><form>
            <td>    
            <label for=assinternet class=control-label>Internet</label></td><td>
            <input type=number name=assinternet class=form-control value="'.$row['assinternet'].'">
           </td><td><button type=submit name=postinternet>Post</button></td></tr></form>';
        }
    
      
        echo "<table>
        $assform
        </table>";
        
    }
   
}  

}
if(isset($_POST['post'])){
    $assbasic=$_POST['assbasic'];
    $assword=$_POST['assword'];
    $asspower=$_POST['asspower'];
    $assexcel=$_POST['assexcel'];
    $assinternet=$_POST['assinternet'];
    


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET assbasic=$assbasic, assword=$assword, asspower=$asspower, assexcel=$assexcel,  assinternet=$assinternet WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}

if(isset($_POST['postad'])){
    $assbasic=$_POST['assbasic'];
    $assword=$_POST['assword'];
    $asspower=$_POST['asspower'];
    $assexcel=$_POST['assexcel'];
    $asscorel=$_POST['asscorel'];
    $assinternet=$_POST['assinternet'];


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET assbasic=$assbasic, assword=$assword, asspower=$asspower, assexcel=$assexcel, asscorel=$asscorel, assinternet=$assinternet WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}
if(isset($_POST['postwebad'])){
    $asswebad=$_POST['asswebad'];
    


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET asswebad=$asswebad WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}
if(isset($_POST['postweb'])){
    $assweb=$_POST['assweb'];
    


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET assweb=$assweb WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}
if(isset($_POST['posthack'])){
    $asshack=$_POST['asshack'];
    


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET asshack=$asshack WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}
if(isset($_POST['postvideo'])){
    $assvideo=$_POST['assvideo'];
    


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET assvideo=$assvideo WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}
if(isset($_POST['postvideoad'])){
    $assvideoad=$_POST['assvideoad'];
    


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET assvideoad=$assvideoad WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}
if(isset($_POST['postgraph'])){
    $asscorel=$_POST['asscorel'];
  


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET asscorel=$asscorel WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}
if(isset($_POST['postgraphad'])){
    $asscorel=$_POST['asscorel'];
    $assphoto=$_POST['assphoto'];


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET assphoto=$assphoto WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}
if(isset($_POST['postblog'])){
    $assblog=$_POST['assblog'];
    


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET assblog=$assblog WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}
if(isset($_POST['postbsms'])){
    $assbsms=$_POST['assbsms'];
    


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET assbsms=$assbsms WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}
if(isset($_POST['postcp'])){
    $asscp=$_POST['asscp'];
    


    $can_id=$_POST['can_id'];
$sql = "UPDATE tbl_users SET asscp=$asscp WHERE can_id='$can_id'";
if(mysqli_query($conn, $sql)){
    echo 'Updated';
}
}


?>


  
</table>

          
          
         </div>
</div>


<div id="Certs" class="w3-container city">
<a href="cert">Open Certificate Page</a>
</div>

<div id="Portals" class="w3-container city">
             <div class="container">
          <h1>Portals</h1>
       
        <a href="student/examinations" target="">Students Portal</a>
         </div>
</div>

<div id="About" class="w3-container city">
             <div class="container">
          <h1>About Us</h1>
       
         This Web Application was developed by<br> <b>Firsta Technologies Incorporated</b><br>
        The leading Web & Mobile App Development Company in Africa<br>
79 Etagbor, Calabar, Nigeria.<br>
Tel: +2349060966606<br>
Email: firstanetinfo@yahoo.com<br><b>
CEO: Emmanuel Erim</b>

         </div>
</div>
         
        </div>
       </div>
       
       </div>
       <div class="w3-container w3-light-grey w3-padding"><span class="cright"><span style="font-family:trebuchet; font-size:11px;"><i>Powered By:</i></span> <span style="font-family:trebuchet; font-size:13px;">Firsta Inc. 2019</span></span>
         <a href="logout.php"> <button class="w3-button w3-right w3-white w3-border">Logout</button></a>
         </div>
       <script>
       document.getElementsByClassName("tablink")[0].click();
       
       function openCity(evt, cityName) {
         var i, x, tablinks;
         x = document.getElementsByClassName("city");
         for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";
         }
         tablinks = document.getElementsByClassName("tablink");
         for (i = 0; i < x.length; i++) {
           tablinks[i].classList.remove("w3-light-grey");
         }
         document.getElementById(cityName).style.display = "block";
         evt.currentTarget.classList.add("w3-light-grey");
       }
       </script>


         
             

                
                
        
    </body>
</html>
