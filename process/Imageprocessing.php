<!DOCTYPE html>
<html>
  <head>
    <title>Upload Image To Database</title>
  </head>
  <body>
    <!-- (A) HTML FILE UPLOAD FORM -->
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="upload" required/>
      <input type="submit" name="submit" value="Upload Image"/>
</form>
<form  method="post" enctype="multipart/form-data">
      <input type="submit" name="download" value="Download Image"/>
    </form>

    <?php
    // (B) SAVE IMAGE INTO DATABASE
    if (isset($_FILES["upload"]) && isset($_POST["submit"])) {
        uploadimg() ;


    }else if(isset($_POST["download"]))
    {
        downloadImg("atit");
    }
        function downloadImg($ImgID){

            
            try{ 
                
           // require "../database/include/connection.php";
$connect= OpenCon();
            $sql ="SELECT *FROM images where ItemID='$ImgID'";

            $res=mysqli_query($connect,$sql);
            if(mysqli_num_rows($res)>0){
                while($images=mysqli_fetch_assoc($res)){
                    $result="uploads/".$images['ImageName'];
                    return $result;
                   ?>  
                    <?php
                }

            }
            $connect->close();
        }

    catch(Exception $ex) {
    echo $ex->getMessage();
    }

}
        function uploadimg() {
      try {
         
        // (B1) CONNECT To DATABASE
        require "../database/include/connection.php";
$connect= OpenCon();
        // (B2) READ IMAGE FILE & INSERT
      
        $img_ex=pathinfo($_FILES["upload"]["name"],PATHINFO_EXTENSION);
        $img_ex_lc=strtolower($img_ex);

        $allowed_exs=array("jpg","jpeg","png");
        if(in_array($img_ex_lc,$allowed_exs))
        {
            //prepare file 
            $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path="uploads/".$new_img_name;
            $tmp_name=$_FILES["upload"]["tmp_name"];
            move_uploaded_file($tmp_name,$img_upload_path);   
        
        //add to Database
        $sql="INSERT INTO images (imageName,ItemID) VALUES ('$new_img_name','atit')";
         if($connect->query($sql)===true)
       {
           echo "yeah";
       }else 
       {
           echo $connect->error;
       }
        
    }
        echo $img_ex;
        echo "<pre>";
                print_r($_FILES["upload"]);
          echo "</pre>";

          
        
        echo "OK";
        $connect->close();
}
      catch (Exception $ex) { echo $ex->getMessage(); }
    }

    ?>
  </body>
</html>
</html>
