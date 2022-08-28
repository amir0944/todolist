<?php
include_once("config.php");
function select(){
    global $db;
	$sql="SELECT * FROM `tesktable`";
$stmt=$db->prepare($sql);
$stmt->execute();
$rows=$stmt->fetchAll();
return $rows;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
	 .stage {
      animation: animateBg 40s linear infinite;
      background-image: linear-gradient(0deg, #cf5c5c, #c19b4a, #def2a0, #c6ee4a, #42eca6, #64b3d9, #208ea2, #498ada, #5b73df, #897ed3, #cf5c5c, #c19b4a);
      background-size: 100% 1100%;
      height: 90vh;
    }
  @keyframes animateBg {
      0% {
        background-position: 0% 0%;
      }

      100% {
        background-position: 0% 100%;
      }
    }
    .f1{
        background-color:white;
        border-radius: 10px;
        padding:10px;
        width:240px;
    }
    .f1 button{
        border-radius:10px;
        margin:10px;
        width:200px;
    }
    .f1 button:hover{
        background-color:black;
        color:white;
    }
    .list{
        border:4px solid red;
        float:right;
        width:200px;
        height:100px;
    }
    .list h1{
        padding:30px;
    }
	</style>
</head>
<body class="stage" dir="rtl">
    <form action="table.php" class="f1" method="POST">
        <label>توضیحات:</label>
        <input type="text" name="desk">
        <button name="save">ثبت</button>
    </form>
		    <?php $rows=select();?>
              
                <div class="list">
                    <h1>بزودی</h1>
                    <?php foreach ($rows as $row){
                    if($row["state"]==0){
                        echo $row["desk"];
                    }
                } ?>
                </div>
                <div class="list">
                    <h1>درحال انجام</h1>
                    <?php foreach ($rows as $row){
                    if($row["state"]==1){
                        echo "state 1";
                    }
                }  ?>
                </div>
                <div class="list">
                <h1>انجام شده</h1>
                    <?php foreach ($rows as $row){
                    if ($row["state"]==2) {
                        echo "state 2";
                    }
                }  ?></div>
</body>
</html>
<?php 
if(isset($_POST["save"])){
    $desk=$_POST["desk"];
    $sql="INSERT INTO `tesktable` (`desk`) VALUES (?)";
$stmt=$db->prepare($sql);
$stmt->bindValue(1,$desk);
$user=$stmt->execute();
}
