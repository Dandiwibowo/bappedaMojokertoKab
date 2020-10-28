<?php
    include 'connect.php';
    $dataAll=showDb($connect,"lokasi","all");
    for($a=0;$a<sizeof($dataAll);$a++){
        $latlong=explode(",",$dataAll[$a]['lat_long']);
        $fixLatLong=trim($latlong[1]).", ".trim($latlong[0]);
        $where = array(
            "id"=>$dataAll[$a]['id']
        );
        
        $myValue = array(
            "lat_long"=>$fixLatLong
        );

        echo updateDb($connect,"lokasi",$where,$myValue)? $dataAll[$a]['nama']."Success" : $dataAll[$a]['nama']."Failed";
    }
?>