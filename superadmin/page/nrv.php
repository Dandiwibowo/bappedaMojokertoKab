<div class="col s12">
    <style>
        th,td{
            border: solid 1px black;
        }
    </style>
    <!--=========================== Modal Show NRV ==============================-->
    <!-- Modal Structure -->
    <div id="modShowNRV" class="modal">
        <div class="modal-content">
            <form>
                <div class="row">
                    <h4><b>Detail NRV</b></h4>
                    <div class="row">
                        <div class="col s12 m6">
                            <b>No. Rekening : <span id="nomorForm">337659156</span></b>
                        </div>
                        <div class="col s12 m6">
                            <b>Nama Nasabah : <span id="namaForm"></span></b>
                        </div>
                        <div class="col s12 m6">
                            <b>Alamat : <span id="alamatForm"></span></b>
                        </div>
                        <div class="col s12 m6">
                            <b>Kelompok : <span id="kelompokForm"></span></b>
                        </div>
                        <div class="col s12 m6">
                            <b>Saldo Per 31 Des <span>2018</span> : <span id="saldoAwalForm"></span></b>
                        </div>
                        <div class="col s12 m6">
                            <b>Saldo Per 31 Des <span>2019</span> : <span id="saldoAkhirForm"></span></b>
                        </div>
                    </div>
                    <div class="col s12">
                        <b class="col s12">Mutasi : </b>
                        <div class="input-field col s12 m6">
                            <input placeholder="Penambahan" id="penambahanEdit" value="" type="text" class="validate">
                            <label for="penambahanEdit">Penambahan</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input placeholder="Pengurangan" id="penguranganEdit" value="" type="text" class="validate">
                            <label for="penguranganEdit">Pengurangan</label>
                        </div>
                    </div>
                    <div class="col s12">
                        <b class="col s12">Persentase Penyisihan Piutang Tak Tertagih : </b>
                        <div class="input-field col s12 m6">
                            <input id="persen0Edit" value="" type="number" class="validate">
                            <label for="persen0Edit">0-2 Bulan (0%)</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="persen20Edit" value="" type="number" class="validate">
                            <label for="persen20Edit">>2-4 Bulan (20%)</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="persen60Edit" value="" type="number" class="validate">
                            <label for="persen60Edit">>4-12 Bulan (60%)</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="persen100Edit" value="" type="number" class="validate">
                            <label for="persen100Edit">>12 Bulan (100%)</label>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="input-field col s12 m6">
                            <input id="takTertagihEdit" value="" type="number" class="validate">
                            <label for="takTertagihEdit">Persentase Penyisihan Piutang Tak Tertagih</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="nrvEdit" value="" type="number" class="validate">
                            <label for="nrvEdit">NRV dana bergulir</label>
                        </div>
                        
                    </div>
                    
                                             
                </div>
                <div onclick="simpanData()" class="btn blue modal-close">Simpan</div>
                <div onclick="" class="btn grey modal-close">Tutup</div>
            </form>
        </div>
    </div>
    <!-- ========================================================================= -->
    <h4><b>Tabel NRV</b></h4>
    <div class="row">
        <input class="col s12 left" type="text" placeholder="Cari Nama atau Rekening" id="searchUser" oninput="searchUser()">
        <div class="input-field col s12 m4">
            <p>Pilih Tahun</p>
            <select class="browser-default" id="tahunSelect" onchange="showItem()">
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
        <div class="input-field col s12 m4">
            <p>Pilih Kelompok</p>
            <select id="kelompokSelect" class="browser-default" onchange="showItem()">
                <option value="ALL" selected>ALL</option>
                <option value="UKM">UKM</option>
                <option value="DAC">DAC</option>
                <option value="KPRI">KPRI</option>
                <option value="UP">UP</option>
                <option value="SENKUKO">SENKUKO</option>
                <option value="MIKRO">MIKRO</option>
            </select>
        </div>
        <div class="input-field col s12 m4">
            <p>Pilih NRV</p>
            <select id="jenisSelect" class="browser-default" onchange="showItem()">
                <option value="pokok" selected>Pokok</option>
                <option value="bunga">Bunga</option>
            </select>
        </div>
    </div>
    <div class="row" style="width: 100%; overflow-x:scroll;">
        <table class="striped highlight centered" id="tabelPokok" style="width:200%;">
            <thead>
                <tr>
                    <th rowspan="2">Nomor Rekening</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Alamat</th>
                    <th rowspan="2">Kelompok</th>
                    <th rowspan="2">Bank</th>
                    <th rowspan="2">Saldo Per 31 Des <span id="thnAwl">2018</span></th>
                    <th colspan="2">Mutasi</th>
                    <th rowspan="2">Saldo Per 31 Des <span id="thnAkr">2019</span></th>
                    <th colspan="4">Persentase Penyisihan Piutang Tak Tertagih</th>
                    <th rowspan="2">Jumlah Dana Bergulir Diragukan Tertagih</th>
                    <th rowspan="2">NRV Dana</th>
                    
                </tr>
                <tr>
                    <th >Penambahan</th>
                    <th >Pengurangan</th>
                    <th >0%</th>
                    <th >20%</th>
                    <th >60%</th>
                    <th >100%</th>
                </tr>
            </thead>

            <tbody id="listData">
               
            </tbody>
        </table>
        <table class="striped highlight centered" id="tabelBunga" style="width:200%; display:none;">
            <thead>
                <tr>
                    <th rowspan="2">Nomor Rekening</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Alamat</th>
                    <th rowspan="2">Kelompok</th>
                    <th rowspan="2">Bank</th>
                    <th rowspan="2">Saldo Per 31 Des <span id="thnAwlBunga">2018</span></th>
                    <th colspan="2">Mutasi</th>
                    <th rowspan="2">Saldo Per 31 Des <span id="thnAkrBunga">2019</span></th>
                    <th colspan="4">Persentase Penyisihan Piutang Tak Tertagih</th>
                    <th rowspan="2">Jumlah Dana Bergulir Diragukan Tertagih</th>
                    <th rowspan="2">NRV Piutang</th>
                    
                </tr>
                <tr>
                    <th >Penambahan</th>
                    <th >Pengurangan</th>
                    <th >0%</th>
                    <th >20%</th>
                    <th >60%</th>
                    <th >100%</th>
                </tr>
            </thead>

            <tbody id="listDataBunga">
               
            </tbody>
        </table>
    </div>
</div>

<script>
    var myResponAllData=[];
    var myResponAllDataBunga=[];
    showItem();

    function showItem(){
        var token = localStorage.getItem('token');
        var tahun = $("#tahunSelect").val();
        var kelompok = $("#kelompokSelect").val();
        $("#thnAwl").html(tahun-1);
        $("#thnAkr").html(tahun);
        $("#thnAwlBunga").html(tahun-1);
        $("#thnAkrBunga").html(tahun);
        var jenis = document.getElementById("jenisSelect").value;

        if(jenis == "pokok"){
            $("#tabelPokok").css("display","block");
            $("#tabelBunga").css("display","none");
        }
        else if(jenis == "bunga"){
            $("#tabelPokok").css("display","none");
            $("#tabelBunga").css("display","block");
        }
        // console.log(tahun+" "+kelompok+" "+jenis);
        $.ajax({
            url: '<?php echo $URL; ?>/API/showNRVPokok',
            method: 'POST',
            data: {
                "token" : token,
                "tahun" : tahun,
                "kelompok" : kelompok,
                "jenis" : jenis,
            },
            success: function (data) {
                var response= JSON.stringify(data);
                myResponAllData=JSON.parse(response);

                // console.log(myResponAllData.data);
                if(myResponAllData.message=="Token valid"){
                    $("#listData").html("");
                    for(a=0; a<myResponAllData.data.length;a++){
                    
                        $("#listData").append(`<tr>
                            
                            <td>`+myResponAllData.data[a].nasabah.id+`</td>
                            <td>`+myResponAllData.data[a].nasabah.nama+`</td>
                            <td>`+myResponAllData.data[a].nasabah.alamat+`</td>
                            <td>`+myResponAllData.data[a].nasabah.kelompok+`</td>
                            <td>`+myResponAllData.data[a].nasabah.bank+`</td>
                            <td>`+myResponAllData.data[a].saldo_awal+`</td>
                            <td>`+myResponAllData.data[a].penambahan+`</td>
                            <td>`+myResponAllData.data[a].pengurangan+`</td>
                            <td>`+myResponAllData.data[a].saldo_akhir+`</td>
                            <td>`+myResponAllData.data[a].nrv.persen0+`</td>
                            <td>`+myResponAllData.data[a].nrv.persen20+`</td>
                            <td>`+myResponAllData.data[a].nrv.persen60+`</td>
                            <td>`+myResponAllData.data[a].nrv.persen100+`</td>
                            <td>`+myResponAllData.data[a].nrv.dana_diragukan+`</td>
                            <td>`+myResponAllData.data[a].nrv.nrv_dana+`</td>
                        </tr>`);

                    }
                }
                else{
                    alert(myResponAllData.message);
                }
                // console.log(JSON.stringify(myResponse.token));
                // alert(data);
            },
            error: function(error){
                console.log(JSON.parse(JSON.stringify(error)));
            }
            
        });

        $.ajax({
            url: '<?php echo $URL; ?>/API/showNRVBunga',
            method: 'POST',
            data: {
                "token" : token,
                "tahun" : tahun,
                "kelompok" : kelompok,
                "jenis" : jenis,
            },
            success: function (data) {
                var response= JSON.stringify(data);
                myResponAllDataBunga=JSON.parse(response);

                // console.log(myResponAllDataBunga.data);
                if(myResponAllDataBunga.message=="Token valid"){
                    $("#listDataBunga").html("");
                    for(a=0; a<myResponAllDataBunga.data.length;a++){
                    
                        $("#listDataBunga").append(`<tr>
                            
                            <td>`+myResponAllDataBunga.data[a].nasabah.id+`</td>
                            <td>`+myResponAllDataBunga.data[a].nasabah.nama+`</td>
                            <td>`+myResponAllDataBunga.data[a].nasabah.alamat+`</td>
                            <td>`+myResponAllDataBunga.data[a].nasabah.kelompok+`</td>
                            <td>`+myResponAllDataBunga.data[a].nasabah.bank+`</td>
                            <td>`+myResponAllDataBunga.data[a].saldo_awal+`</td>
                            <td>`+myResponAllDataBunga.data[a].penambahan+`</td>
                            <td>`+myResponAllDataBunga.data[a].pengurangan+`</td>
                            <td>`+myResponAllDataBunga.data[a].saldo_akhir+`</td>
                            <td>`+myResponAllDataBunga.data[a].nrv.persen0+`</td>
                            <td>`+myResponAllDataBunga.data[a].nrv.persen20+`</td>
                            <td>`+myResponAllDataBunga.data[a].nrv.persen60+`</td>
                            <td>`+myResponAllDataBunga.data[a].nrv.persen100+`</td>
                            <td>`+myResponAllDataBunga.data[a].nrv.dana_diragukan+`</td>
                            <td>`+myResponAllDataBunga.data[a].nrv.nrv_dana+`</td>
                        </tr>`);

                    }
                }
                else{
                    alert(myResponAllDataBunga.message);
                }
                // console.log(JSON.stringify(myResponse.token));
                // alert(data);
            },
            error: function(error){
                console.log(JSON.parse(JSON.stringify(error)));
            }
            
        });
    }

    

    function searchUser(){
        var searchItem= $("#searchUser").val().toLowerCase();
        $("#listData").html("");
        $("#listDataBunga").html("");
        if(searchItem=="")
            showItem();
        else{
            for(a=0; a<myResponAllData.data.length;a++){
                var nama=myResponAllData.data[a].nasabah.nama.toLowerCase();
                var induk=myResponAllData.data[a].nasabah.id.toLowerCase();

                if(nama.match(searchItem)||induk.match(searchItem))
                    $("#listData").append(`<tr>
                                
                        <td>`+myResponAllData.data[a].nasabah.id+`</td>
                        <td>`+myResponAllData.data[a].nasabah.nama+`</td>
                        <td>`+myResponAllData.data[a].nasabah.alamat+`</td>
                        <td>`+myResponAllData.data[a].nasabah.kelompok+`</td>
                        <td>`+myResponAllData.data[a].nasabah.bank+`</td>
                        <td>`+myResponAllData.data[a].saldo_awal+`</td>
                        <td>`+myResponAllData.data[a].penambahan+`</td>
                        <td>`+myResponAllData.data[a].pengurangan+`</td>
                        <td>`+myResponAllData.data[a].saldo_akhir+`</td>
                        <td>`+myResponAllData.data[a].nrv.persen0+`</td>
                        <td>`+myResponAllData.data[a].nrv.persen20+`</td>
                        <td>`+myResponAllData.data[a].nrv.persen60+`</td>
                        <td>`+myResponAllData.data[a].nrv.persen100+`</td>
                        <td>`+myResponAllData.data[a].nrv.dana_diragukan+`</td>
                        <td>`+myResponAllData.data[a].nrv.nrv_dana+`</td>
                            
                    </tr>`);

            }

            for(a=0; a<myResponAllDataBunga.data.length;a++){
                var nama=myResponAllDataBunga.data[a].nasabah.nama.toLowerCase();
                var induk=myResponAllDataBunga.data[a].nasabah.id.toLowerCase();

                if(nama.match(searchItem)||induk.match(searchItem))

                    $("#listDataBunga").append(`<tr>
                                
                                <td>`+myResponAllDataBunga.data[a].nasabah.id+`</td>
                                <td>`+myResponAllDataBunga.data[a].nasabah.nama+`</td>
                                <td>`+myResponAllDataBunga.data[a].nasabah.alamat+`</td>
                                <td>`+myResponAllDataBunga.data[a].nasabah.kelompok+`</td>
                                <td>`+myResponAllDataBunga.data[a].nasabah.bank+`</td>
                                <td>`+myResponAllDataBunga.data[a].saldo_awal+`</td>
                                <td>`+myResponAllDataBunga.data[a].penambahan+`</td>
                                <td>`+myResponAllDataBunga.data[a].pengurangan+`</td>
                                <td>`+myResponAllDataBunga.data[a].saldo_akhir+`</td>
                                <td>`+myResponAllDataBunga.data[a].nrv.persen0+`</td>
                                <td>`+myResponAllDataBunga.data[a].nrv.persen20+`</td>
                                <td>`+myResponAllDataBunga.data[a].nrv.persen60+`</td>
                                <td>`+myResponAllDataBunga.data[a].nrv.persen100+`</td>
                                <td>`+myResponAllDataBunga.data[a].nrv.dana_diragukan+`</td>
                                <td>`+myResponAllDataBunga.data[a].nrv.nrv_dana+`</td>
                                    
                            </tr>`);
            }
        }
    }
</script>