<?php

function addToDb($connect,$dbName, $myvalue){
  $queri= 'INSERT INTO '.$dbName.' (';


  $par=array_keys($myvalue);

    
    for($a=0; $a<(sizeof($myvalue)-1);$a++){
        $queri = $queri." ".$par[$a].",";
    }

    $queri = $queri." ".$par[$a].") VALUES (";

    for($a=0; $a<(sizeof($myvalue)-1);$a++){
        $queri = $queri." '".$myvalue[$par[$a]]."',";
    }

    $queri = $queri." '".$myvalue[$par[$a]]."')";

  $process=mysqli_query ($connect,$queri);
//   echo $queri;
  if($process)
     return true;

  return false;
}

function showDb($connect,$dbName,$where){
    $queri= 'SELECT * FROM '.$dbName.' ';
    if($where!="all"){
        $queri .= " Where ";
        $par=array_keys($where);
        for($a=0; $a<(sizeof($where)-1);$a++){
            $queri = $queri." ".$par[$a]."='".$where[$par[$a]]."' and";
        }
        $queri = $queri." ".$par[$a]."='".$where[$par[$a]]."'";
    }
    $queri .= " ORDER BY id DESC";
    $info = array();
    $a=0;
    // echo $queri;
    $process=mysqli_query ($connect,$queri);
    while($data=mysqli_fetch_array($process)){
        
        $info [$a]=$data;
        $a++;
    }
    
  
    return $info;
}

function deleteDb($connect,$dbName,$where){
    
    $queri="";

    if($where =="all")
        $queri= 'DELETE FROM '.$dbName.' WHERE 1';
    else {
        $queri= 'DELETE FROM '.$dbName.' where ';

        $par=array_keys($where);


        for($a=0; $a<(sizeof($where)-1);$a++){
            $queri = $queri." ".$par[$a]."= '".$where[$par[$a]]."' and ";
        }

        $queri = $queri." ".$par[$a]."= '".$where[$par[$a]]."' ";
    }
    // echo $queri;
    $process=mysqli_query ($connect,$queri);
    if($process)
     return true;

    return false;
}


function updateDb($connect,$dbName,$where,$myvalue){
    $queri =' UPDATE '.$dbName.' SET';

    $par=array_keys($myvalue);

    
    for($a=0; $a<(sizeof($myvalue)-1);$a++){
        $queri = $queri." ".$par[$a]."= '".$myvalue[$par[$a]]."',";
    }

    $queri = $queri." ".$par[$a]."= '".$myvalue[$par[$a]]."' WHERE ";

    $par=array_keys($where);

    
    for($a=0; $a<(sizeof($where)-1);$a++){
        $queri = $queri." ".$par[$a]."= '".$where[$par[$a]]."' and ";
    }

    $queri = $queri." ".$par[$a]."= '".$where[$par[$a]]."' ";
    
    // echo $queri;
    $process=mysqli_query ($connect,$queri);
    if($process)
     return true;

    return false;
}

function isEmailExist($connect,$dbName,$email){
    $queri= "SELECT username FROM `".$dbName."` where username="."'".$email."'";
    $process=mysqli_query ($connect,$queri);
    // echo $queri;
    $row = mysqli_num_rows($process);
    if($row==0)
        return false;
    else
        return true;
}

function filterData($data,$column,$myvalue){
    $b=0;
    $info = array();
    for($a=0;$a<sizeof($data);$a++){
        $found=0;
        for($aa=0; $aa<sizeof($myvalue);$aa++){
            for($bb=0; $bb<sizeof($column);$bb++){
                // echo strtolower($myvalue[$aa])." ".strtolower($data[$a][$column[$bb]])."<br/>";
                if(preg_match('/'.strtolower($myvalue[$aa]).'/',strtolower($data[$a][$column[$bb]]))){       
                    $found++;
                    // echo strtolower($myvalue[$aa])." ".strtolower($data[$a][$column[$bb]])."<br/>";
                }
            }
        }
        if($found>0){
            $info [$b]=$data[$a];
            $b++;
        }
    }
    return $info;
}

function searchData($data,$column,$myvalue){
    $b=0;
    $info = array();
    for($a=0;$a<sizeof($data);$a++){
        $found=0;
        for($aa=0; $aa<sizeof($myvalue);$aa++){
            for($bb=0; $bb<sizeof($column);$bb++){
                // echo strtolower($myvalue[$aa])." ".strtolower($data[$a][$column[$bb]])."<br/>";
                if( strtolower($myvalue[$aa])==strtolower($data[$a][$column[$bb]]) ){       
                    $found++;
                    // echo strtolower($myvalue[$aa])." ".strtolower($data[$a][$column[$bb]])."<br/>";
                }
            }
        }
        if($found>0){
            $info [$b]=$data[$a];
            $b++;
        }
    }
    return $info;
}

function showUnicDataOnColumn($data,$columnName){

    $info = array();
    for($a=0;$a<sizeof($data);$a++){
        if(in_array($data[$a][$columnName], $info))
            continue;
        else
            array_push($info, $data[$a][$columnName]);
    }
    return $info;
}

function extracMyToken($token){
    $str=Decript($token);
    $myArray= json_decode($str,true);
    return $myArray;
}

function isTokenValid($connect,$token){
    // echo $token;
    $dataToken=extracMyToken($token);
    // print_r($dataToken);

    $username=$dataToken['username'];
    $id=$dataToken['id'];
    $nama=$dataToken['nama'];
    $queri= "SELECT * FROM superadmin where username = '$username' and id = '$id' and nama = '$nama'";
    $process=mysqli_query ($connect,$queri);
    
    $row = mysqli_num_rows($process);
    // echo $row;
    if($row==0)
        return false;
    else
        return true;
}

function generateRekening($connect){
    $found = 1;
    $norek = 0;
    
    while($found){
        $norek = rand(1000000000,10000000000);
        $where = array(
            "id"=>$norek
        );

        $foundData = showDb($connect,"nasabah",$where);
        // echo sizeof($foundData);
        if(sizeof($foundData)==0)
            $found=0;
    }

    return $norek;
}
?>