<?php
if(isset($_POST["sb"])&&isset($_FILES["img"])){
   echo "<pre>";
   print_r($_FILES);
   echo "</pre>";

   $file_nm=$_FILES['img']['name'];
   $file_size=$_FILES['img']['size'];
   $file_tmp=$_FILES['img']['tmp_name'];
   $file_type=$_FILES['img']['type'];
   $er=$_FILES['img']['error'];
   if($er==0){
       if($file_size>1000000){
           $e="sorry,your file is too large!!";
           header("location:err.php?error=$e");
       }
       else{
            $im_ex=pathinfo($file_nm,PATHINFO_EXTENSION);
            $im_ex_ic=strtolower($im_ex);
            $allo=array("jpg","jpeg","png");
            if(in_array($im_ex_ic,$allo)){
                 $new_img_nm=uniqid("IMG-",true).'.'.$im_ex_ic;
                 $img_upload_path='upi/'.$new_img_nm;
                 move_uploaded_file($file_tmp,$img_upload_path);
            }
            else{
                $e="you cant upload file o this type!!";
                header("location:err.php?error=$e");
            }
       }
   }
   else{
    $e="you have an error!!";
    header("location:err.php?error=$e");
   }
   //move_uploaded_file($file_tmp,'upi/'.$file_nm);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="img" id=""><br><br>
        <input  name="sb" type="submit">
    </form>
</body>
</html>