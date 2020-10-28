<?php
include "../connect.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// ========================= Show Kategori ============================
if(isset($_GET['showKategori'])){
   
    $where = "all";
    
    if(isset($_POST['idKategori'])){
        $where = array(
            "id"=>$_POST['idKategori']
        );
    }
    
        
    
    $message="Token valid";
    $dataResponse = showDb($connect,"kategori",$where);

    $response = array(
        "message"=>$message,
        "data"=>$dataResponse,
    );
    
    

    echo json_encode($response);
}
// ========================= Show Kategori ============================

// ========================= Show Induk Kategori ============================
else if(isset($_GET['showIndukKategori'])){
    
        $dataAll = showDb($connect,"kategori","all");
        $dataResponse = showUnicDataOnColumn($dataAll,"induk");

        $response = array(
           
            "data"=>$dataResponse,
        );
    
    
    echo json_encode($response);
}
// ========================= Show Induk Kategori ============================


// ========================= Edit Kategori ============================
else if(isset($_GET['editKategori'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $idKategori = $_POST['idKategori'] != "" ? htmlentities(strip_tags(trim($_POST['idKategori']))) : "";
    $nama = $_POST['nama'] != "" ? htmlentities(strip_tags(trim($_POST['nama']))) : "";
    $induk = $_POST['induk'] != "" ? htmlentities(strip_tags(trim($_POST['induk']))) : "";
    
    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";

        $dataSupKategori=showDb($connect,"kategori",array("id"=>$idKategori));

        $myValue= array(
            "nama" => $nama,
            "induk"=>$induk,
        );
        $where=array(
            "id"=>$idKategori
        );

        if(updateDb($connect,"kategori",$where,$myValue)){
            $message="Update Success";
                
            if(isset($_FILES["icon"]['error'])){
            // if($_FILES["icon"]['error'] == 0){
                $file_dir="";

                $dataKategori=showDb($connect,"kategori",$myValue);
                $nama_file=$dataKategori[0]['id'];

                $icon=explode('.',$_FILES["icon"]["name"]);
                $ext= count($icon)-1;
                $target_dir = "../imagesAPI/kategori/";
                $nama_file="kategori_$nama_file.".$icon[$ext];
                $target_file = $target_dir .$nama_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                
                $check = getimagesize($_FILES['icon']["tmp_name"]);
                if($check !== false) {
                    $message = "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $message = "File is not an image.";
                    $uploadOk = 0;
                }
                
                
                // Check file size
                if ($_FILES['icon']["size"] > (5*1048576)) {
                    $message = "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
                    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $message = "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES['icon']["tmp_name"], $target_file)) {
                        $tmp_file_dir=explode("../",$target_file);
                        $file_dir=$tmp_file_dir[1];
        
                        $where = array(
                        "id" => $dataKategori[0]['id']
                        );
                        $myvalue= array(
                        "icon"=>$file_dir
                        );
                        if(updateDb($connect,"kategori",$where,$myvalue))
                        $message = "File berhasil ditambahkan";
        
                    } else {
                        $message = "Sorry, there was an error uploading your file.";
                    }
                }
                        
            }

            $response = array(
                "message"=>$message,
                "data"=>$myValue,
            );
            
        }

        else{
            $message = "Update Failed";
            $response = array(
                "message"=>$message,
            );
        }

    }
    else 
        $response = array(
            "message"=>$message,
        );

    echo json_encode($response);
}
// ========================= Edit Kategori ============================

// ========================= Add New Kategori ============================
else if(isset($_GET['addNewKategori'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $nama = $_POST['nama'] != "" ? htmlentities(strip_tags(trim($_POST['nama']))) : "";
    $induk = $_POST['induk'] != "" ? htmlentities(strip_tags(trim($_POST['induk']))) : "";
    
    

    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";

        $myValue= array(
            "nama" => $nama,
            "induk"=>$induk,    
        );

        if(addToDb($connect,"kategori",$myValue)){
            $message="Insert Success";
            
            if($_FILES["icon"]['error'] == 0){
                $file_dir="";

                $dataKategori=showDb($connect,"kategori",$myValue);
                $nama_file=$dataKategori[0]['id'];

                $icon=explode('.',$_FILES["icon"]["name"]);
                $ext= count($icon)-1;
                $target_dir = "../imagesAPI/kategori/";
                $nama_file="kategori_$nama_file.".$icon[$ext];
                $target_file = $target_dir .$nama_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                
                $check = getimagesize($_FILES['icon']["tmp_name"]);
                if($check !== false) {
                    $message = "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $message = "File is not an image.";
                    $uploadOk = 0;
                }
                
                
                // Check file size
                if ($_FILES['icon']["size"] > (5*1048576)) {
                    $message = "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
                    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $message = "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES['icon']["tmp_name"], $target_file)) {
                      $tmp_file_dir=explode("../",$target_file);
                      $file_dir=$tmp_file_dir[1];
      
                      $where = array(
                        "id" => $dataKategori[0]['id']
                      );
                      $myvalue= array(
                        "icon"=>$file_dir
                      );
                      if(updateDb($connect,"kategori",$where,$myvalue))
                        $message = "File berhasil ditambahkan";
      
                    } else {
                        $message = "Sorry, there was an error uploading your file.";
                    }
                }
                      
            }

            $response = array(
                "message"=>$message,
                "data"=>$myValue,
            );
        }

        else{
            $message = "Insert Failed";
            $response = array(
                "message"=>$message,
            );
        }
        
        
    }
    else 
        $response = array(
            "message"=>$message,
        );

    echo json_encode($response);
}
// ========================= Add New Kategori ============================


// ========================= Delete Kategori ============================
else if(isset($_GET['deleteKategori'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $idKategori = $_POST['idKategori'] != "" ? htmlentities(strip_tags(trim($_POST['idKategori']))) : "";
    
    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
       
        $where=array(
            "id"=>$idKategori
        );

        if(deleteDb($connect,"kategori",$where)){
            $message="Delete Success";

            $response = array(
                "message"=>$message,
            );
        }

        else{
            $message = "Delete Failed";
            $response = array(
                "message"=>$message,
            );
        }

    }
    else 
        $response = array(
            "message"=>$message,
        );

    echo json_encode($response);
}
// ========================= Delete Kategori ============================


?>