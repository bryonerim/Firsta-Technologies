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
		<title>Acknowledgement Slip</title>
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
.notice{
	color: blue;
	font-family: trebuchet;
	font-size:19px;
}
input{
	outline:1px solid;
	width:50px;

}
button{
	font:inherit;margin:0;
	overflow:visible;
	-webkit-appearance:button;
	width:70px;
	height:40px;

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

        </style>
		
		
	</head>
	<body>
	
		<header>
			<h1>Acknowledgement Slip</h1>
			
			<span><img alt="" src="hhh.jpg"><input type="file" accept="image/*"></span>
		</header><form action ="print1.php" method="post">

		<article>
		

		<?php
if(isset($_POST['fetchprint'])){
    $can_id = $_POST['can_id'];

$sql = "SELECT * FROM tbl_users WHERE can_id='$can_id'";
$result = mysqli_query($conn, $sql);

$resultCheck = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)){
$programme = $row['programme'];

echo			"<table class=meta>
				<tr>
				<td class=mid></td><td class=mid></td><th><span contenteditable><b>Date Printed:</b></span></th>
					<td><span contenteditable> 
         ".date('l, d, M, Y')." </span></td>
				</tr>
				<tr>
				<td class=mid></td><td class=mid></td>	<th><span contenteditable><b>Date Registered:</b></span></th>
					<td><span id=prefix contenteditable>".$row['date'];"</span></td>
				</tr></table>";
	echo 	"<tr>
					<th class=data><span contenteditable>Full Name:</span></th>
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
					<th class=data><span contenteditable>Date of Birth:</span></th>
					<td class=mid><strong>".$row['dob'] . "</strong></span></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Phone No:</span></th>
					<td class=mid><strong>".$row['phone'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Sex:</span></th>
					<td class=mid><strong>".$row['sex'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>State:</span></th>
					<td class=mid><strong>".$row['state'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Address:</span></th>
					<td class=mid><strong>".$row['address'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Programme:</span></th>
					<td class=mid><strong>".$row['programme'] . "</strong></td><td class=mid></td>
				</tr>
				<tr>
					<th class=data><span contenteditable>Tuition Fee:</span></th>
					<td class=mid><strike>N</strike>".$row['fee'] . "</td><td class=mid></td>
				</tr>";
				
				if($programme =='Basic Computer Training'){
					$courses = ' You are by this programme required to offer the following courses:<br>
					* Computer Basics<br>* Microsoft Word<br>* Microsoft Powerpoint<br>* Microsoft Excel<br>* Internet';
					echo "<tr>";
					echo '<th class=data><span contenteditable><strong>Programme Duration:</strong></th><td class=mid> Three (3) months'. "</td>";echo "</tr>";
		
				}elseif($programme=="Advanced Computer Training"){
					$courses = 'You are by this programme required to offer the following courses:<br>
					* Computer Basics<br>* Microsoft Word<br>* Microsoft Powerpoint<br>* Microsoft Excel<br>* Internet* Microsoft Access<br>* CorelDraw<br>* Introduction to Web Development';
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Five (5) months'. "</td>";echo "</tr>";
				}elseif($programme=="Website Development(Contemporary)"){
					$courses = ' You are by this programme required to offer the following courses:<br>
					* Maths & Database<br>* Graphic Design<br>* HTML5<br>* CSS<br>* JavaScript';
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Website Development(Career)"){
					$courses = ' You are by this programme required to offer the following courses:<br>
					* Maths & Database<br>* Graphic Design<br>* HTML5<br>* CSS<br>* JavaScript<br>* MySQL<br>* PHP<br>* Bootstrap';
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}elseif($programme=="Ethical Hacking"){
					$courses = ' You are by this programme required to offer the following courses:<br>
					* C++<br>* Java<br>* Ethical Tricks';
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Three (3) months'. "</td>";echo "</tr>";
				}elseif($programme=="Video Editing(contemporary)"){
					$courses = ' You are by this programme required to offer the following courses:<br>
					* Presentation Effect<br>* Introduction Wondershare';
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Video Editing(career)"){
					$courses = 'You are by this programme required to offer the following courses:<br>
					* Presentation Effect<br>* Wondershare';
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}elseif($programme=="Graphic Design(contemporary)"){
					$courses = 'You are by this programme required to offer the following courses:<br>
					* Powerpoint<br>* CorelDraw';
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Graphic Design(career)"){
					$courses = ' <br> You are by this programme required to offer the following courses:<br>
					* Powerpoint<br>* CorelDraw<br>* Photoshop';
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}elseif($programme=="Blogging"){
					$courses = ' You are by this programme required to offer the following courses:<br>
					* English Language<br>* Information Management<br>* Niche';
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Two (2) months'. "</td>";echo "</tr>";
				}elseif($programme=="Bulk SMS"){
					$courses = ' You are by this programme required to offer the following courses:<br>
					* SMS Management';
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> One (1) months'. "</td>";echo "</tr>";
				}elseif($programme=="Computer Programming"){
					$courses = 'You are by this programme required to offer the following courses:<br>
					* C++<br>* Java<br>* Pascal<br>* Python<br>* Software Approach';
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Four (4) months'. "</td>";echo "</tr>";
				}else{
					echo "<tr>";
					echo '<th class=data><strong>Programme Duration:</strong></td><td class=mid> Unknown Duration'. "</td>";echo "</tr>";
				}
			
			  
				echo "<table cellspacing=1>
				$courses
				</table>";
			}}?>
				
			</table>
		</article>
		<aside>
			<h1><span>Notes</span></h1>
			<div>
			<div class='notice'>
           * You have been successfully enrolled for the above programme<br>
           * Proceed to pay Tuition Fee, in order to get your handout and begin your lectures<br>
           * Installmental payment is allowed at 60%<br>
           * In the course of this programme you shall undergoe a practical assessment and at the end you shall take 
           or sit for an e-Exams (Computer Based Exams) to grade your performance and issue your certificate of completion.
			</div><hr/>
		</aside>
		 </form>
	</body>
</html>