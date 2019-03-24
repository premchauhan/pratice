<?php 
function stateList()
{	
  
  global $db;
  $outputArray =array();
  $query =mysqli_query($db,"select state,population from regestration");
  while($res=mysqli_fetch_object($query)){
  	$outputArray[] =$res;
  }
  //echo '<pre>';
  //print_r($outputArray);
  return $outputArray; 
}

?>