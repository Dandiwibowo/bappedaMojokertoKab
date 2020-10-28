<?php
include "../connect.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// ========================= Show Angsuran ============================
if(isset($_GET['showAngsuran'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $message="Token doesn't valid";
    $response = array(
        "message"=>$message,
    );
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
        
        if(isset($_POST['idAngsuran']) || isset($_POST['idNasabah'])){
            if(isset($_POST['idAngsuran']))
                $where["id"]=htmlentities(strip_tags(trim($_POST['idAngsuran'])));
            if(isset($_POST['idNasabah']))
                $where["idNasabah"]=htmlentities(strip_tags(trim($_POST['idNasabah'])));
        }
        else
            $where = "all";

        $dataAngsuran = showDb($connect,"angsuran",$where);

        for($a=0; $a< sizeof($dataAngsuran); $a++){
            $dataNasabah = showDb($connect,"nasabah",array("id"=>$dataAngsuran[$a]['idNasabah']));
            $dataResponse[$a]=array(
                "angsuran" => $dataAngsuran[$a],
                "nasabah" => $dataNasabah[0]
            );
        }

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
// ========================= Show Angsuran ============================

// ========================= Add New Angsuran ============================
else if(isset($_GET['addNewAngsuran'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $idNasabah = $_POST['idNasabah'] != "" ? htmlentities(strip_tags(trim($_POST['idNasabah']))) : "";
    $nominal = $_POST['nominal'] != "" ? htmlentities(strip_tags(trim($_POST['nominal']))) : "";
    $tgl =  $_POST['tgl'] != "" ? htmlentities(strip_tags(trim($_POST['tgl']))) : "";;
    $bln =  $_POST['bln'] != "" ? htmlentities(strip_tags(trim($_POST['bln']))) : "";;
    $thn =  $_POST['thn'] != "" ? htmlentities(strip_tags(trim($_POST['thn']))) : "";;
      

    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){

        $message="Token valid";

        $myValue= array(
            "idNasabah" => $idNasabah,
            "nominal"=>$nominal,
            "tgl"=>$tgl,
            "bln"=>$bln,
            "thn"=>$thn,
        );
        $where = array(
            "idNasabah" => $idNasabah,
            "tgl"=>$tgl,
            "bln"=>$bln,
            "thn"=>$thn,
        );
        $checkAngsuran = showDb($connect,"angsuran",$where);
        if(sizeof($checkAngsuran)==0){
            if(addToDb($connect,"angsuran",$myValue)){
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
        else{
            $message = "Angsuran sudah dimasukkan sebelumnya";
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
// ========================= Add New Angsuran ============================
// ========================= Add New Bunga ============================
else if(isset($_GET['addNewBunga'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $idNasabah = $_POST['idNasabah'] != "" ? htmlentities(strip_tags(trim($_POST['idNasabah']))) : "";
    $nominal = $_POST['nominal'] != "" ? htmlentities(strip_tags(trim($_POST['nominal']))) : "";
    $tgl =  $_POST['tgl'] != "" ? htmlentities(strip_tags(trim($_POST['tgl']))) : "";;
    $bln =  $_POST['bln'] != "" ? htmlentities(strip_tags(trim($_POST['bln']))) : "";;
    $thn =  $_POST['thn'] != "" ? htmlentities(strip_tags(trim($_POST['thn']))) : "";;
      

    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){

        $message="Token valid";

        $myValue= array(
            "idNasabah" => $idNasabah,
            "nominal"=>$nominal,
            "tgl"=>$tgl,
            "bln"=>$bln,
            "thn"=>$thn,
        );
        $where = array(
            "idNasabah" => $idNasabah,
            "tgl"=>$tgl,
            "bln"=>$bln,
            "thn"=>$thn,
        );
        $checkBunga = showDb($connect,"bunga",$where);
        if(sizeof($checkBunga)==0){
            if(addToDb($connect,"bunga",$myValue)){
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
        else{
            $message = "Bunga sudah dimasukkan sebelumnya";
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
// ========================= Add New Bunga ============================

// ========================= Delete Angsuran ============================
else if(isset($_GET['deleteAngsuran'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $idAngsuran = $_POST['idAngsuran'] != "" ? htmlentities(strip_tags(trim($_POST['idAngsuran']))) : "";
    
    $message="Token doesn't valid";
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
       
        $where=array(
            "id"=>$idAngsuran
        );

        if(deleteDb($connect,"angsuran",$where)){
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
// ========================= Delete Angsuran ============================

// ========================= Show Jurnals ============================
else if(isset($_GET['showJurnal'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $tahun = $_POST['tahun'] != "" ? $_POST['tahun'] : "";
    $message="Token doesn't valid";
    $response = array(
        "message"=>$message,
    );
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
 
        $where = "all";

        $dataNasabah = showDb($connect,"nasabah",$where);

        for($a=0; $a< sizeof($dataNasabah); $a++){
            $whereAngsuran = array(
                "idNasabah" => $dataNasabah[$a]['id']
            );

            $dataAngsuranAll = showDb($connect,"angsuran",$whereAngsuran);
            $dataAngsuran = searchData($dataAngsuranAll,array("thn"),array("$tahun"));

            $jmlAngsuranAwal =0;
            for($b=0;$b<sizeof($dataAngsuranAll);$b++){
                if($dataAngsuranAll[$b]['thn']<$tahun)
                    $jmlAngsuranAwal +=$dataAngsuranAll[$b]['nominal'];
            }

            $jmlAngsuranTahunan = 0;
            $angsuranTahun = array();
            for($b=1; $b<=12; $b++){
                $dataPerBulan = searchData($dataAngsuran,array("bln"),array("$b"));
                if(empty($dataPerBulan[0]))
                    $angsuranTahun["a".$b] = "0";
                else
                    $angsuranTahun["a".$b] = $dataPerBulan[0]['nominal'];

                $jmlAngsuranTahunan += $angsuranTahun["a".$b];
            }
            $blnAwal = $dataNasabah[$a]['thn'] == idate("Y") ? $dataNasabah[$a]['bln'] : 1;
            $jmlAngsuranAkhir = $jmlAngsuranAwal + $jmlAngsuranTahunan;

            $bakilAwal =  $dataNasabah[$a]['thn'] >= $tahun ? 0 : $dataNasabah[$a]['jumlah_pinjaman']-$jmlAngsuranAwal;
            $bakilAkhir = $dataNasabah[$a]['thn'] > $tahun ? 0 : $dataNasabah[$a]['jumlah_pinjaman']-$jmlAngsuranAkhir;
            $tanggunganAkhir = $dataNasabah[$a]['thn'] > $tahun ? 0 : ($dataNasabah[$a]['plafond']*(12-$blnAwal))-$jmlAngsuranTahunan;
            
            $dataResponse[$a]=array(
                "angsuran" => $angsuranTahun,
                "nasabah" => $dataNasabah[$a],
                "bakil_awal" => $bakilAwal,
                "jumlah_tahunan" => $jmlAngsuranTahunan,
                "bakil_akhir" => $bakilAkhir,
                "tanggungan_akhir" => $tanggunganAkhir,
            );
        }

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
// ========================= Show Jurnals ============================

// ========================= Show Recons ============================
else if(isset($_GET['showRecons'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $tahun = $_POST['tahun'] != "" ? $_POST['tahun'] : "";
    $message="Token doesn't valid";
    $response = array(
        "message"=>$message,
    );
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
 
        $where = "all";

        $dataNasabah = showDb($connect,"nasabah",$where);

        for($a=0; $a< sizeof($dataNasabah); $a++){
            $whereAngsuran = array(
                "idNasabah" => $dataNasabah[$a]['id'],
                "thn" => $tahun
            );

            $dataAngsuranAll = showDb($connect,"angsuran",$whereAngsuran);
            
            $bln = $dataNasabah[$a]['bln'];
            
            $seharusnyaKe = idate("m")-$bln;
            $seharusnyaJml = $seharusnyaKe*$dataNasabah[$a]['plafond'];
            $angsuranSeharusnya = array(
                "ke" => $seharusnyaKe,
                "ang_per_bulan" => $dataNasabah[$a]['plafond'],
                "jml" => $seharusnyaJml,
            );

            $realisasiKe=sizeof($dataAngsuranAll);
            $realisasiJml = $realisasiKe*$dataNasabah[$a]['plafond'];
            $angsuranRealisasi = array(
                "ke" => $realisasiKe,
                "ang_per_bulan" => $dataNasabah[$a]['plafond'],
                "jml" => $realisasiJml,
            );

            $tunggakanKe=$seharusnyaKe-$realisasiKe;
            $tunggakanJml = $tunggakanKe*$dataNasabah[$a]['plafond'];
            $angsuranTunggakan = array(
                "ke" => $tunggakanKe,
                "ang_per_bulan" => $dataNasabah[$a]['plafond'],
                "jml" => $tunggakanJml,
            );
            
            $angsuranBerbaikan = array(
                "ke" => $tunggakanKe,
                "ang_per_bulan" => $dataNasabah[$a]['plafond'],
                "jml" => 0,
            );
            
            $dataResponse[$a]=array(
                "nasabah" => $dataNasabah[$a],
                "angsuran_seharusnya" => $angsuranSeharusnya,
                "realisasi_angsuran" => $angsuranRealisasi,
                "tunggakan" => $angsuranTunggakan,
                "perbaikan" => $angsuranBerbaikan,
            );
        }

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
// ========================= Show Recons ============================

// ========================= Show NRVPokok ============================
else if(isset($_GET['showNRVPokok'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $tahun = $_POST['tahun'] != "" ? $_POST['tahun'] : "";
    $kelompok = $_POST['kelompok'] != "" ? $_POST['kelompok'] : "ALL";
    $message="Token doesn't valid";
    $response = array(
        "message"=>$message,
    );
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
 
        $where = $kelompok == "ALL" ? "all" : array("kelompok" => $kelompok);

        $dataNasabah = showDb($connect,"nasabah",$where);

        $dataResponse=array();
        for($a=0; $a< sizeof($dataNasabah); $a++){
            $whereAngsuran = array(
                "idNasabah" => $dataNasabah[$a]['id']
            );

            $dataAngsuranAll = showDb($connect,"angsuran",$whereAngsuran);

           
            $jmlAngsuranAwal = 0;
            for($b=0;$b<sizeof($dataAngsuranAll);$b++){
                if($dataAngsuranAll[$b]['thn']<$tahun){
                    $jmlAngsuranAwal += $dataAngsuranAll[$b]['nominal'];
                }
            }
            $saldoAwal = $dataNasabah[$a]['thn'] < $tahun ? ($dataNasabah[$a]['jumlah_pinjaman']-$jmlAngsuranAwal) : 0;


            $dataAngsuranTahunAkhir = searchData($dataAngsuranAll,array("thn"),array($tahun));
            $jmlAngsuranAkhir = 0;
            for($b=0;$b<sizeof($dataAngsuranTahunAkhir);$b++){
                $jmlAngsuranAkhir += $dataAngsuranTahunAkhir[$b]['nominal'];
            }
            $saldoAkhir = $dataNasabah[$a]['thn'] < $tahun ? $saldoAwal-$jmlAngsuranAkhir : ($dataNasabah[$a]['thn'] == $tahun ?  $dataNasabah[$a]['jumlah_pinjaman']-$jmlAngsuranAkhir : 0);


            $penambahan = $dataNasabah[$a]['thn'] == $tahun ? $dataNasabah[$a]['jumlah_pinjaman'] : 0;
            $pengurangan = $jmlAngsuranAkhir;

                        
            // =============== Masih Salah ==============
            $tahunNasabah = $dataNasabah[$a]['thn'];
            $bulanNasabah = $dataNasabah[$a]['bln'];
            $nPembayaranSaatIni = sizeof($dataAngsuranAll);
            $nPembayaranAll = $dataNasabah[$a]['durasi_pinjaman'];
            $nPembayaranSeharusnya = 0;
            $nTunggakan = 0;

            $date2 = date("Y-n-d");
            //$date2 = "2018-6-19";
            $ts2 = strtotime($date2);
            $year2 = date('Y', $ts2);
            $month2 = date('n', $ts2);
            $nPembayaranSeharusnya = (($year2 - $tahunNasabah) * 12) + ($month2 - $bulanNasabah);

            //echo $nPembayaranAll." ".$nPembayaranSeharusnya."<br>";
            if($nPembayaranAll >= $nPembayaranSeharusnya)
                $nTunggakan = $nPembayaranSeharusnya - $nPembayaranSaatIni;
            else 
                $nTunggakan = $nPembayaranAll-$nPembayaranSaatIni;

            // echo $nTunggakan;
            // =========================================

            $persen0 = ($nTunggakan > 0 && $nTunggakan <= 2) ? $saldoAkhir*0/100 : 0 ;
            $persen20 = ($nTunggakan > 2 && $nTunggakan <= 4) ? $saldoAkhir*20/100 : 0;
            $persen60 = ($nTunggakan > 4 && $nTunggakan <= 12) ? $saldoAkhir*60/100 : 0;
            $persen100 = ($nTunggakan > 12) ? $saldoAkhir*100/100 : 0;
            $dana_diragukan = $persen0+$persen20+$persen60+$persen100;
            $nrv_dana = $saldoAkhir-$dana_diragukan;

            $dataNRVFix = array(
                "idNasabah" => $dataNasabah[$a]['id'],
                "thn" => $tahun,
                "persen0" => $persen0,
                "persen20" => $persen20,
                "persen60" => $persen60,
                "persen100" => $persen100,
                "dana_diragukan" => $dana_diragukan,
                "nrv_dana" => $nrv_dana,
                "jenis" => "Pokok",
            );
            
            $dataResponse[$a]=array(
                "nasabah" => $dataNasabah[$a],
                "nrv" => $dataNRVFix,
                "saldo_awal" => $saldoAwal,
                "saldo_akhir" => $saldoAkhir,
                "penambahan" => $penambahan,
                "pengurangan" => $pengurangan,
            );
        }

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
// ========================= Show NRVPokok ============================

// ========================= Show NRVBunga ============================
else if(isset($_GET['showNRVBunga'])){
    $token = $_POST['token'] != "" ? $_POST['token'] : "";
    $tahun = $_POST['tahun'] != "" ? $_POST['tahun'] : "";
    $kelompok = $_POST['kelompok'] != "" ? $_POST['kelompok'] : "ALL";
    $message="Token doesn't valid";
    $response = array(
        "message"=>$message,
    );
        
    if(isTokenValid($connect,$token)){
        $message="Token valid";
 
        $where = $kelompok == "ALL" ? "all" : array("kelompok" => $kelompok);

        $dataNasabah = showDb($connect,"nasabah",$where);

        $dataResponse=array();
        for($a=0; $a< sizeof($dataNasabah); $a++){
            $whereBunga = array(
                "idNasabah" => $dataNasabah[$a]['id']
            );

            $dataBungaAll = showDb($connect,"bunga",$whereBunga);

           
            $jmlBungaAwal = 0;
            for($b=0;$b<sizeof($dataBungaAll);$b++){
                if($dataBungaAll[$b]['thn']<$tahun){
                    $jmlBungaAwal += $dataBungaAll[$b]['nominal'];
                }
            }
            $saldoAwal = $dataNasabah[$a]['thn'] < $tahun ? (($dataNasabah[$a]['jumlah_pinjaman']*6/100)-$jmlBungaAwal) : 0;


            $dataBungaTahunAkhir = searchData($dataBungaAll,array("thn"),array($tahun));
            // print_r($dataBungaAll);
            $jmlBungaAkhir = 0;
            for($b=0;$b<sizeof($dataBungaTahunAkhir);$b++){
                $jmlBungaAkhir += $dataBungaTahunAkhir[$b]['nominal'];
            }
            $saldoAkhir = $dataNasabah[$a]['thn'] < $tahun ? $saldoAwal-$jmlBungaAkhir : ($dataNasabah[$a]['thn'] == $tahun ?  ($dataNasabah[$a]['jumlah_pinjaman']*6/100)-$jmlBungaAkhir : 0);


            $penambahan = $dataNasabah[$a]['thn'] == $tahun ?($dataNasabah[$a]['jumlah_pinjaman']*6/100) : 0;
            $pengurangan = $jmlBungaAkhir;

                        
            // =============== Masih Salah ==============
            $tahunNasabah = $dataNasabah[$a]['thn'];
            $bulanNasabah = $dataNasabah[$a]['bln'];
            $nPembayaranSaatIni = sizeof($dataBungaAll);
            $nPembayaranAll = $dataNasabah[$a]['durasi_pinjaman'];
            $nPembayaranSeharusnya = 0;
            $nTunggakan = 0;

            $date2 = date("Y-n-d");
            //$date2 = "2018-6-19";
            $ts2 = strtotime($date2);
            $year2 = date('Y', $ts2);
            $month2 = date('n', $ts2);
            $nPembayaranSeharusnya = (($year2 - $tahunNasabah) * 12) + ($month2 - $bulanNasabah);

            //echo $nPembayaranAll." ".$nPembayaranSeharusnya."<br>";
            if($nPembayaranAll >= $nPembayaranSeharusnya)
                $nTunggakan = $nPembayaranSeharusnya - $nPembayaranSaatIni;
            else 
                $nTunggakan = $nPembayaranAll-$nPembayaranSaatIni;

            // echo $nTunggakan;
            // =========================================

            $persen0 = ($nTunggakan > 0 && $nTunggakan <= 2) ? $saldoAkhir*0/100 : 0 ;
            $persen20 = ($nTunggakan > 2 && $nTunggakan <= 4) ? $saldoAkhir*20/100 : 0;
            $persen60 = ($nTunggakan > 4 && $nTunggakan <= 12) ? $saldoAkhir*60/100 : 0;
            $persen100 = ($nTunggakan > 12) ? $saldoAkhir*100/100 : 0;
            $dana_diragukan = $persen0+$persen20+$persen60+$persen100;
            $nrv_dana = $saldoAkhir-$dana_diragukan;

            $dataNRVFix = array(
                "idNasabah" => $dataNasabah[$a]['id'],
                "thn" => $tahun,
                "persen0" => $persen0,
                "persen20" => $persen20,
                "persen60" => $persen60,
                "persen100" => $persen100,
                "dana_diragukan" => $dana_diragukan,
                "nrv_dana" => $nrv_dana,
                "jenis" => "Bunga",
            );
            
            $dataResponse[$a]=array(
                "nasabah" => $dataNasabah[$a],
                "nrv" => $dataNRVFix,
                "saldo_awal" => $saldoAwal,
                "saldo_akhir" => $saldoAkhir,
                "penambahan" => $penambahan,
                "pengurangan" => $pengurangan,
            );
        }

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
// ========================= Show NRVPokok ============================
?>