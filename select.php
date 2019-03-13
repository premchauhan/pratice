<?php 

$title= "Pakistan,India";
$a=array($title);
print_r($title).'<br>';
$contant='Pakistan is my country, my motherland. 
            I love it and I am proud of it. India is a big country. <br><br>
            In population it is second only to China. Pakistan has a rich and glorious past.
             Once it was the seat of learning. Students from all over the world used to come here 
             to study. Pakistan culture spread abroad. Pakistan goods had a ready market in foreign 
             countries. It was a time when India was a land of plenty.';
    $active=0;

//include('title.php');
$resArray[] = array('title'=>$title,
                'contant'=>$contant,
                'active'=>0);
   

function pannel($title,$contant,$active)
{

  if($active ==1 ) { $active = 'in' ;} else {$active = ''; }
  
  $msg='<div class="panel panel-default">

          <div class="panel-heading">
              <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">'.$title.'</a>
              </h4>
          </div>

          <div id="collapse1" class="panel-collapse collapse '.$active.'">
              <div class="col-md-12">
              <label data-toggle="collapse" data-target="#collapse1">'.$contant.'</label>
              </div>
          </div>

        </div>';
  
  return $msg;
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery/jquery.min.js"></script>
  <script src="jquery/bootstrap.min.js"></script>
</head>
<body>

<form action="" method="post">
<div class="container">
  
  <div class="panel-group" id="accordion">
    <?php  
     
     foreach($resArray as $rowdata)
     {
        
          echo $result=pannel($rowdata['title'],$rowdata['contant'],$rowdata['active']);

      }

    ?>
</div>
</div>

</form>


</body>
</html>