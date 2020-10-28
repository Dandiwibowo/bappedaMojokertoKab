<?php
include "../connect.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// ========================= Show Nasabah ============================
if(isset($_GET['showNasabah'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $message="Token doesn't valid";
    $response = array(
        "message"=>$message,
    );
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
        $where = "all";
        
        $dataResponse = showDb($connect,"nasabah",$where);

        $response = array(
            "message"=>$message,
            "data"=>$dataResponse,
        );
    }
    else{
        $message = "Update Failed";
        $response = array(
            "message"=>$message,
        );
    }
    echo json_encode($response);
}
// ========================= Show Nasabah ============================


// ========================= Edit Nasabah ============================
else if(isset($_GET['editNasabah'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $idNasabah = $_POST['idNasabah'] != "" ? htmlentities(strip_tags(trim($_POST['idNasabah']))) : "";
    $nama = $_POST['nama'] != "" ? htmlentities(strip_tags(trim($_POST['nama']))) : "";
    $alamat = $_POST['alamat'] != "" ? htmlentities(strip_tags(trim($_POST['alamat']))) : "";
    $bank = $_POST['bank'] != "" ? htmlentities(strip_tags(trim($_POST['bank']))) : "";
    $kelompok = $_POST['kelompok'] != "" ? htmlentities(strip_tags(trim($_POST['kelompok']))) : "";
    $plafond = $_POST['plafond'] != "" ? htmlentities(strip_tags(trim($_POST['plafond']))) : "";
    $jumlah_pinjaman = $_POST['pinjaman'] != "" ? htmlentities(strip_tags(trim($_POST['pinjaman']))) : "";
    $durasi_pinjaman = $_POST['durasi'] != "" ? htmlentities(strip_tags(trim($_POST['durasi']))) : "";
    $bunga = $_POST['bunga'] != "" ? htmlentities(strip_tags(trim($_POST['bunga']))) : "";
    
    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
        
        $myValue= array(
            "nama" => $nama,
            "alamat"=>$alamat,
            "bank"=>$bank,
            "kelompok"=>$kelompok,
            "plafond"=>$plafond,
            "jumlah_pinjaman"=>$jumlah_pinjaman,
            "durasi_pinjaman"=>$durasi_pinjaman,
            "bunga"=>$bunga,
        );
        $where=array(
            "id"=>$idNasabah
        );

        if(updateDb($connect,"nasabah",$where,$myValue)){
            $message="Update Success";
                
            
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
// ========================= Edit Nasabah ============================

// ========================= Add New Nasabah ============================
else if(isset($_GET['addNewNasabah'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $nama = $_POST['nama'] != "" ? htmlentities(strip_tags(trim($_POST['nama']))) : "";
    $alamat = $_POST['alamat'] != "" ? htmlentities(strip_tags(trim($_POST['alamat']))) : "";
    $bank = $_POST['bank'] != "" ? htmlentities(strip_tags(trim($_POST['bank']))) : "";
    $kelompok = $_POST['kelompok'] != "" ? htmlentities(strip_tags(trim($_POST['kelompok']))) : "";
    $plafond = $_POST['plafond'] != "" ? htmlentities(strip_tags(trim($_POST['plafond']))) : "";
    $jumlah_pinjaman = $_POST['pinjaman'] != "" ? htmlentities(strip_tags(trim($_POST['pinjaman']))) : "";
    $durasi_pinjaman = $_POST['durasi'] != "" ? htmlentities(strip_tags(trim($_POST['durasi']))) : "";
    $tgl = $_POST['tgl'] != "" ? htmlentities(strip_tags(trim($_POST['tgl']))) : "";
    $bln = $_POST['bln'] != "" ? htmlentities(strip_tags(trim($_POST['bln']))) : "";
    $thn = $_POST['thn'] != "" ? htmlentities(strip_tags(trim($_POST['thn']))) : "";
    $bunga = $_POST['bunga'] != "" ? htmlentities(strip_tags(trim($_POST['bunga']))) : "";
      

    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){
        $id = generateRekening($connect);
        $message="Token valid";

        $myValue= array(
            "id" => $id,
            "nama" => $nama,
            "alamat"=>$alamat,
            "bank"=>$bank,
            "kelompok"=>$kelompok, 
            "plafond"=>$plafond,
            "jumlah_pinjaman"=>$jumlah_pinjaman,
            "durasi_pinjaman"=>$durasi_pinjaman,
            "tgl"=>$tgl,
            "bln"=>$bln,
            "thn"=>$thn,
            "bunga"=>$bunga,
        );

        if(addToDb($connect,"nasabah",$myValue)){
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
    else 
        $response = array(
            "message"=>$message,
        );

    echo json_encode($response);
}
// ========================= Add New Nasabah ============================


// ========================= Delete Nasabah ============================
else if(isset($_GET['deleteNasabah'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $idNasabah = $_POST['idNasabah'] != "" ? htmlentities(strip_tags(trim($_POST['idNasabah']))) : "";
    
    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
       
        $where=array(
            "id"=>$idNasabah
        );

        if(deleteDb($connect,"nasabah",$where)){
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
// ========================= Delete Nasabah ============================


?>