<div class="col s12">
    <style>
        th,td{
            border: solid 1px black;
        }
    </style>
    <h4><b>Tabel Recons</b></h4>
    <div class="row">
        <input class="col s10 left" type="text" placeholder="Cari Kategori" id="searchUser" oninput="searchUser()">
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
                    <th colspan="3">Angsuran Seharusnya</th>
                    <th colspan="3">Realisasi Angsuran</th>
                    <th colspan="3">Tunggakan</th>
                    <th colspan="3">Perbaikan</th>
                    
                </tr>
                <tr>
                    <th >Ke</th>
                    <th >Angs Per Bln</th>
                    <th >Jml</th>
                    
                    <th >Ke</th>
                    <th >Angs Per Bln</th>
                    <th >Jml</th>
                    
                    <th >Ke</th>
                    <th >Angs Per Bln</th>
                    <th >Jml</th>
                    
                    <th >Ke</th>
                    <th >Angs Per Bln</th>
                    <th >Jml</th>
                    
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
            url: '<?php echo $URL; ?>/API/showRecons',
            method: 'POST',
            data: {
                "token":token,
                "tahun":tahun,
            },
            
            success: function (data) {
                var response= JSON.stringify(data);
                myResponAllData=JSON.parse(response);

                console.log(myResponAllData);
                if(myResponAllData.message=="Token valid"){
                    $("#listData").html("");
                    for(a=0; a<myResponAllData.data.length;a++){
                    
                        $("#listData").append(`<tr>
                            
                            <td>`+myResponAllData.data[a].nasabah.id+`</td>
                            <td>`+myResponAllData.data[a].nasabah.nama+`</td>

                            <td>`+myResponAllData.data[a].angsuran_seharusnya.ke+`</td>
                            <td>`+myResponAllData.data[a].angsuran_seharusnya.ang_per_bulan+`</td>
                            <td>`+myResponAllData.data[a].angsuran_seharusnya.jml+`</td>

                            <td>`+myResponAllData.data[a].realisasi_angsuran.ke+`</td>
                            <td>`+myResponAllData.data[a].realisasi_angsuran.ang_per_bulan+`</td>
                            <td>`+myResponAllData.data[a].realisasi_angsuran.jml+`</td>

                            <td>`+myResponAllData.data[a].tunggakan.ke+`</td>
                            <td>`+myResponAllData.data[a].tunggakan.ang_per_bulan+`</td>
                            <td>`+myResponAllData.data[a].tunggakan.jml+`</td>

                            <td>`+myResponAllData.data[a].perbaikan.ke+`</td>
                            <td>`+myResponAllData.data[a].perbaikan.ang_per_bulan+`</td>
                            <td>`+myResponAllData.data[a].perbaikan.jml+`</td>
                            
                            
                            
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
                            
                        <td>`+myResponAllData.data[a].nasabah.id+`</td>
                        <td>`+myResponAllData.data[a].nasabah.nama+`</td>

                        <td>`+myResponAllData.data[a].angsuran_seharusnya.ke+`</td>
                        <td>`+myResponAllData.data[a].angsuran_seharusnya.angs_per_bulan+`</td>
                        <td>`+myResponAllData.data[a].angsuran_seharusnya.jml+`</td>

                        <td>`+myResponAllData.data[a].realisasi_angsuran.ke+`</td>
                        <td>`+myResponAllData.data[a].realisasi_angsuran.angs_per_bulan+`</td>
                        <td>`+myResponAllData.data[a].realisasi_angsuran.jml+`</td>

                        <td>`+myResponAllData.data[a].tunggakan.ke+`</td>
                        <td>`+myResponAllData.data[a].tunggakan.angs_per_bulan+`</td>
                        <td>`+myResponAllData.data[a].tunggakan.jml+`</td>

                        <td>`+myResponAllData.data[a].perbaikan.ke+`</td>
                        <td>`+myResponAllData.data[a].perbaikan.angs_per_bulan+`</td>
                        <td>`+myResponAllData.data[a].perbaikan.jml+`</td>
                        
                        
                        
                    </tr>`);
            }
        }
    }
</script>