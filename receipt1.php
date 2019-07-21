<?php
session_start();
include_once('dbcon.php');
if(!isset($_SESSION['username'])){
    header('location: index.php');
}


?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Payment Receipt</title>
		<style>

/* reset */

*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}
cent{
	text-align:right;
}

button:-moz-focusring{
	outline:1px dotted ButtonText;
}
tr{
	font-size:14px;
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
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 1; opacity: 0; position: absolute; top: 1; width: 100%; }

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
i{
	color:red;
}

        </style>
		
		
	</head>
	<body>
	
		<header>
			<h1>Payment Receipt</h1>
			
		<span>	</span>	<span><img alt="" src="hhh.jpg"><input type="file" accept="image/*"></span>
		</header><form action ="print1.php" method="post">

		<article>
		

		<?php
if(isset($_POST['fetchreceipt'])){
    $can_id = $_POST['can_id'];
	
$sql = "SELECT * FROM tbl_users WHERE can_id='$can_id'";
$result = mysqli_query($conn, $sql);

$resultCheck = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)){
$programme = $row['programme'];
$feepaid=$row['feepaid'];

$fee=$row['fee'];
$feepaid2=$row['feepaid2'];
if(($feepaid+$feepaid2)==$fee){ $cleared='CLEARED' ;}
$debt=($fee-($feepaid+$feepaid2));
echo			"<table class=meta>
				<tr>
				<td class=mid> 
  </td><td class=mid></td><th><span contenteditable><b>Transaction Date:</b></span></th>
					<td><span contenteditable> 
         ".date('l, d, M, Y')." </span></td>
				</tr>
				";
	echo 	"<tr>
					<th class=data><span contenteditable>Received From:</span></th>
					<td class=mid><strong>".$row['firstname'].' ' .$row['surname'] . "</strong></td></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Registration No:</span></th>
					<td class=mid><strong>FC2200".$row['can_id'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Email:</span></th>
					<td class=mid><strong>".$row['email'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Phone No:</span></th>
					<td class=mid><strong>".$row['phone'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Being Payment For:</span></th>
					<td class=mid><strong>".$row['programme'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>The Sum of:</span></th>
					<td class=mid><strike>N</strike>".$row['feepaid'] . "</td><td class=mid></td>
				</tr>";
			
				if($programme =='Basic Computer Training'){
				
					echo '<tr><th class=data><span contenteditable><strong>Programme Duration:</strong></th><td class=mid> Three (3) months </td>';echo "</tr>";
		
				}elseif($programme=="Advanced Computer Training"){
					
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Five (5) months'. "</td>";echo "</tr>";
				}elseif($programme=="Website Development(Contemporary)"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Website Development(Career)"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}elseif($programme=="Ethical Hacking"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Three (3) months'. "</td>";echo "</tr>";
				}elseif($programme=="Video Editing(contemporary)"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Video Editing(career)"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}elseif($programme=="Graphic Design(contemporary)"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Graphic Design(career)"){
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}elseif($programme=="Blogging"){
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Bulk SMS"){
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> One (1) months'. "</td>";echo "</tr>";
				}elseif($programme=="Computer Programming"){
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}else{
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Unknown Duration'. "</td>";echo "</tr>";
				}
			
				echo "<tr style='color:red;'>";
				echo '<th ><strong>Outstanding Debt:</strong></th><td class=mid> <strike>N</strike>'.$debt ."</td>";echo "</tr>";
							
				
			}}?>
				
			</table>
		</article>
        <?php
           
            $sql = "SELECT * FROM tbl_users WHERE can_id='$can_id'";
            $result = mysqli_query($conn, $sql);
            
            $resultCheck = mysqli_num_rows($result);
            
                while($row = mysqli_fetch_assoc($result)){
					$feepaid=$row['feepaid'];
					$fee=$row['fee'];
           
            $feepaid2=$row['feepaid2'];
			$programme = $row['programme'];
			if(($feepaid+$feepaid2)==$fee){ $debt='CLEARED' ;}else{
			$debt=($fee-($feepaid+$feepaid2));}
		

            if($feepaid2>0){
            echo"<header>
			<h1>Second Installment</h1>
			
					</header>

		<article>

<table class=meta>
				<tr>
				<td class=mid></td><td class=mid></td><th><span contenteditable><b>Transaction Date:</b></span></th>
					<td><span contenteditable> 
         ".date('l, d, M, Y')." </span></td>
				</tr>
				";
	echo 	"<tr>
					<th class=data><span contenteditable>Received From:</span></th>
					<td class=mid><strong>".$row['firstname'].' ' .$row['surname'] . "</strong></td></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Registration No:</span></th>
					<td class=mid><strong>FC2200".$row['can_id'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Email:</span></th>
					<td class=mid><strong>".$row['email'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Phone No:</span></th>
					<td class=mid><strong>".$row['phone'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Being Payment For:</span></th>
					<td class=mid><strong>".$row['programme'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>The Sum of:</span></th>
					<td class=mid><strike>N</strike>".$row['feepaid2'] . "</td><td class=mid></td>
				</tr>";
				
				if($programme =='Basic Computer Training'){
				
					echo '<tr><th class=data><span contenteditable><strong>Programme Duration:</strong></th><td class=mid> Three (3) months </td>';echo "</tr>";
		
				}elseif($programme=="Advanced Computer Training"){
					
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Five (5) months'. "</td>";echo "</tr>";
				}elseif($programme=="Website Development(Contemporary)"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Website Development(Career)"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}elseif($programme=="Ethical Hacking"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Three (3) months'. "</td>";echo "</tr>";
				}elseif($programme=="Video Editing(contemporary)"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Video Editing(career)"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}elseif($programme=="Graphic Design(contemporary)"){
					echo '<tr><th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Graphic Design(career)"){
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}elseif($programme=="Blogging"){
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Bulk SMS"){
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> One (1) months'. "</td>";echo "</tr>";
				}elseif($programme=="Computer Programming"){
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}else{
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Unknown Duration'. "</td>";echo "</tr>";
				}
			
				echo "<tr style='color:red;'>";
				echo '<th ><strong>Outstanding Debt:</strong></th><td class=mid><doublestrike>N</doublestrike>'.$debt ."</td>";echo "</tr>";
							 
				
			}}?>
				
			</table>
		
		</article>
		
	</body>
</html>