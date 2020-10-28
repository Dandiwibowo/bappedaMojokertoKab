<?php
include "../connect.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// ================================ Login ============================================
if(isset($_GET['login'])){
    $username = $_POST['username'] != "" ? htmlentities(strip_tags(trim($_POST['username']))) : "";
    $password = $_POST['password'] != "" ? htmlentities(strip_tags(trim($_POST['password']))) : "";

    $message="Account doesn't exis";
        
    if(isEmailExist($connect,"superadmin",$username)){
        $message="Wrong Password";
        $data = showDb($connect,"superadmin",array("username"=>$username));

        if(password_verify($password, $data[0]['password'])){
            $message="Account Found";

            $dataResponse = array (
                "id"=>$data[0]['id'],
                "username" => $data[0]['username'],
                "nama" => $data[0]['nama'],
            );
            $token = Encript(json_encode($dataResponse));

            $response = array(
                "message"=>$message,
                "data"=>$dataResponse,
                "token"=>$token,
            );
            
        }
        else 
            $response = array(
                "message"=>$message,
            ); 
    }
    else 
        $response = array(
            "message"=>$message,
        );
        
    echo json_encode($response);
        
}

// ========================== Login ================================


// ========================= Show Admin ============================
else if(isset($_GET['showAdmin'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $where = "all";
    
    if(isset($_POST['idAdmin'])){
        $where = array(
            "id"=>$_POST['idAdmin']
        );
    }
    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
        $dataResponse = showDb($connect,"superadmin",$where);

        $response = array(
            "message"=>$message,
            "data"=>$dataResponse,
        );
    
    }
    else 
        $response = array(
            "message"=>$message,
        );

    echo json_encode($response);
}
// ========================= Show Admin ============================

// ========================= Edit Admin ============================
else if(isset($_GET['editAdmin'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $idAdmin = $_POST['idAdmin'] != "" ? htmlentities(strip_tags(trim($_POST['idAdmin']))) : "";
    $nama = $_POST['nama'] != "" ? htmlentities(strip_tags(trim($_POST['nama']))) : "";
    $username = $_POST['username'] != "" ? htmlentities(strip_tags(trim($_POST['username']))) : "";
    $password = $_POST['password'] != "" ? htmlentities(strip_tags(trim($_POST['password']))) : "";
    

    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";

        $dataSupAdmin=showDb($connect,"superadmin",array("id"=>$idAdmin));
        if(sizeof($dataSupAdmin)>0){
            if($dataSupAdmin[0]['username']!=$username){
                
                $accountFound=0;

                if(isEmailExist($connect,"superadmin",$username))
                    $accountFound=1;

                if($accountFound){
                    $message = "Sorry, username already exist";
                    $username=$dataSupAdmin[0]['username'];
                }

            }
            if($password!=$dataSupAdmin[0]['password'])
                $password=password_hash($password, PASSWORD_DEFAULT);

            $myValue= array(
                "nama" => $nama,
                "username"=>$username,
                "password"=>$password,
            );
            $where=array(
                "id"=>$idAdmin
            );

            if(updateDb($connect,"superadmin",$where,$myValue)){
                $message="Update Success";

                $dataResponse = array (
                    "id"=>$idAdmin,
                    "username" => $username,
                    "nama" => $nama,
                );
                $token = Encript(json_encode($dataResponse));

                $response = array(
                    "message"=>$message,
                    "data"=>$myValue,
                    "newToken"=>$token,
                );
            }

            else{
                $message = "Update Failed";
                $response = array(
                    "message"=>$message,
                );
            }
        }
        else{
            $message = "Account doesn't exist";
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
// ========================= Edit Admin ============================

// ========================= Add New Admin ============================
else if(isset($_GET['addNewAdmin'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $nama = $_POST['nama'] != "" ? htmlentities(strip_tags(trim($_POST['nama']))) : "";
    $username = $_POST['username'] != "" ? htmlentities(strip_tags(trim($_POST['username']))) : "";
    $password = $_POST['password'] != "" ? htmlentities(strip_tags(trim($_POST['password']))) : "";
    

    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";

       
        $accountFound=0;

        if(isEmailExist($connect,"superadmin",$username))
            $accountFound=1;

        if($accountFound){
            $message = "Sorry, username already exist";
            
        }
        else{
            $password=password_hash($password, PASSWORD_DEFAULT);

            $myValue= array(
                "nama" => $nama,
                "username"=>$username,
                "password"=>$password,
            );

            if(addToDb($connect,"superadmin",$myValue)){
                $message="Insert Success";
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
        
    }
    else 
        $response = array(
            "message"=>$message,
        );

    echo json_encode($response);
}
// ========================= Add New Admin ============================


// ========================= Delete Admin ============================
else if(isset($_GET['deleteAdmin'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $idAdmin = $_POST['idAdmin'] != "" ? htmlentities(strip_tags(trim($_POST['idAdmin']))) : "";
    
    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
       
        $where=array(
            "id"=>$idAdmin
        );

        if(deleteDb($connect,"superadmin",$where)){
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
// ========================= Delete Admin ============================


?>