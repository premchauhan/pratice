<?php include("database.php");?>
<?php 
if(isset($_GET["ExportType"])){
    switch($_GET["ExportType"]){
		case "csv" :
            // Submission from
			$filename = 'user_'.time(). ".csv";		 
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-type: text/csv");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			ExportCSVFile();
            exit();
        default :
            die("Unknown action : ".$_GET["ExportType"]);
            break;
    }
}
function ExportCSVFile() {
	// create a file pointer connected to the output stream
	$fh = fopen( 'php://output', 'w' );
	$heading = false;
	$headingArr = array('ID','Name','Email','Phone','Gender','Address','Status');
	global $db;
   	$sec=mysqli_query($db,"select * from tbl_add");
   	while($res=mysqli_fetch_row($sec)){
		if(!$heading) {
		  // output the column headings
		  fputcsv($fh, $headingArr);
		  $heading = true;
		}
		// loop over the rows, outputting them
		fputcsv($fh, array_values($res));
	}
	fclose($fh);
}
?>