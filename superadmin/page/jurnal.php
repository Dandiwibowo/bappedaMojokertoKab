<div class="col s12">
    <style>
        th,td{
            border: solid 1px black;
        }
    </style>
    <h4><b>Tabel Jurnal</b></h4>
    <div class="row">
        <input class="col s10 left" type="text" placeholder="Cari Nama atau Nomor Rekening" id="searchUser" oninput="searchUser()">
        <div class="input-field col s2">
            <select class="browser-default" id="tahunForm" onchange="searchUser()">
                <option value="" disabled selected>Pilih tahun</option>
                <?php
                    for($a=(idate("Y")-5); $a < (idate("Y")+5); $a++){
                        if($a==idate("Y"))
                            echo "<option value='".$a."' selected>".$a."</option>";
                        else
                            echo "<option value='".$a."' >".$a."</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    
    <div class="row" style="width: 100%; overflow-x:scroll;">
        <table class="striped highlight centered" style="width:2500px;">
            <thead>
                <tr>
                    <th rowspan="2">Nomor Rekening</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Kecamatan</th>
                    <th rowspan="2">Bank</th>
                    <th rowspan="2">Kelompok</th>
                    <th rowspan="2">Tanggal Realisasi</th>
                    <th rowspan="2">Realisasi Kredit</th>
                    <th rowspan="2">Baki Debet Awal Tahun</th>
                    <th colspan="12">Angsuran</th>
                    <th rowspan="2">Jumlah Angsuran Tahunan</th>
                    <th rowspan="2">Baki Debet Akhir Tahunan</th>
                    <th rowspan="2">Tunggakan Akhir Tahun</th>
                </tr>
                <tr>
                    <th >Januari</th>
                    <th >Februari</th>
                    <th >Maret</th>
                    <th >April</th>
                    <th >Mei</th>
                    <th >Juni</th>
                    <th >Juli</th>
                    <th>Agustus</th>
                    <th >September</th>
                    <th >Oktober</th>
                    <th >November</th>
                    <th >Desember</th>
                </tr>
            </thead>

            <tbody id="listData">
                
            </tbody>
        </table>
    </div>
</div>

<script>
    var myResponAllData=[];
    showItem();

    function showItem(){
        var token = localStorage.getItem('token');
        var tahun= $("#tahunForm").val().toLowerCase();

        $.ajax({
            url: '<?php echo $URL; ?>/API/showJurnal',
            method: 'POST',
            data: {
                "token":token,
                "tahun":tahun,
            },
            
            success: function (data) {
                var response= JSON.stringify(data);
                myResponAllData=JSON.parse(response);

                console.log(myResponAllData.data);
                if(myResponAllData.message=="Token valid"){
                    $("#listData").html("");
                    for(a=0; a<myResponAllData.data.length;a++){
                    
                        $("#listData").append(`<tr>
                            
                            <td>`+myResponAllData.data[a].nasabah.id+`</td>
                            <td>`+myResponAllData.data[a].nasabah.nama+`</td>
                            <td>`+myResponAllData.data[a].nasabah.alamat+`</td>
                            <td>`+myResponAllData.data[a].nasabah.bank+`</td>
                            <td>`+myResponAllData.data[a].nasabah.kelompok+`</td>
                            <td>`+myResponAllData.data[a].nasabah.tgl+`-`+myResponAllData.data[a].nasabah.bln+`-`+myResponAllData.data[a].nasabah.thn+`</td>
                            <td>`+myResponAllData.data[a].nasabah.jumlah_pinjaman+`</td>
                            <td>`+myResponAllData.data[a].bakil_awal+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a1+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a2+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a3+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a4+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a5+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a6+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a7+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a8+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a9+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a10+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a11+`</td>
                            <td>`+myResponAllData.data[a].angsuran.a12+`</td>
                            
                            <td>`+myResponAllData.data[a].jumlah_tahunan+`</td>
                            <td>`+myResponAllData.data[a].bakil_akhir+`</td>
                            <td>`+myResponAllData.data[a].tanggungan_akhir+`</td>
                            
                            
                        </tr>`);
                    }
                }
                else{
                    alert(myResponAllData.message);
                }
                // console.log(JSON.stringify(myResponse.token));
                // alert(data);
            }
        });
    }


    function searchUser(){
        var searchItem= $("#searchUser").val().toLowerCase();
        $("#listData").html("");
        if(searchItem=="")
            showItem();
        else{
            for(a=0; a<myResponAllData.data.length;a++){
                var nama=myResponAllData.data[a].nama.toLowerCase();
                var induk=myResponAllData.data[a].induk.toLowerCase();

                if(nama.match(searchItem)||induk.match(searchItem))
                    $("#listData").append(`<tr>
                                
                        <td>`+myResponAllData.data[a].induk+`</td>
                        <td>`+myResponAllData.data[a].nama+`</td>
                        <td>
                            <a href="#modEditKategori" onclick="setEditForm(`+myResponAllData.data[a].id+`)" class="btn orange modal-trigger" style="border-radius: 250px;">Edit <i class="material-icons left">edit</i> </a>
                            <a class="btn red" onclick="deleteData(`+myResponAllData.data[a].id+`)" style="border-radius: 250px;">Delete <i class="material-icons left">delete</i> </a>
                        </td>
                        
                    </tr>`);
            }
        }
    }
</script>