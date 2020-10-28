<!--=========================== Modal Add ==============================-->
    <!-- Modal Structure -->
    <div id="modAddNasabah" class="modal">
        <div class="modal-content">
            <form action="<?php echo "$actual_link"; ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <h4><b>Tambah Nasabah</b></h4>
                    <div class="input-field col s12">
                        <input placeholder="Nama Lengkap" id="namaForm" value="" type="text" class="validate">
                        <label for="namaForm">Nama Lengkap</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Alamat" id="alamatForm" value="" type="text" class="validate">
                        <label for="alamatForm">Alamat</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select id="bankForm" class="browser-default">
                            <option value="" disabled selected>Pilih Bank</option>
                            <option value="Bank Jatim Kraksan">Bank Jatim Kraksan</option>
                            <option value="Bank Jatim Kab. Probolinggo">Bank Jatim Kab. Probolinggo</option>
                        </select>
                    </div>
                    <div class="input-field col s12 m6">
                        <select id="kelompokForm" class="browser-default">
                            <option value="" disabled selected>Pilih Kelompok</option>
                            <option value="UKM">UKM</option>
                            <option value="DAC">DAC</option>
                            <option value="KPRI">KPRI</option>
                            <option value="UP">UP</option>
                            <option value="SENKUKO">SENKUKO</option>
                            <option value="MIKRO">MIKRO</option>
                        </select>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="Plafond Kredit" id="plafondForm" value="" type="text" class="validate">
                        <label for="plafondForm">Plafond Kredit</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="Jumlah Pinjaman" id="pinjamanForm" value="" type="text" class="validate">
                        <label for="pinjamanForm">Jumlah Pinjaman</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="(bln)" id="durasiForm" value="" type="number" class="validate">
                        <label for="durasiForm">Durasi Pinjaman</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="" id="tglForm" value="" type="date" class="validate">
                        <label for="tglForm">Tanggal Realisasi</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="(%)" id="bungaForm" value="" type="number" class="validate">
                        <label for="bungaForm">Bunga</label>
                    </div>
                        
                </div>
                <div onclick="addNewData()" class="btn modal-close">Tambah</div>
            </form>
        </div>
    </div>
<!-- ========================================================================= -->

<!--=========================== Modal Show Nasabah ==============================-->
    <!-- Modal Structure -->
    <div id="modShowNasabah" class="modal">
        <div class="modal-content">
            <form>
                <div class="row">
                    <h4><b>Detail Nasabah</b></h4>

                    <div class="col s12 m6">
                        <b>No. Rekening : <span id="nomorForm">337659156</span></b>
                    </div>
                    <div class="col s12 m6">
                        <b>Tanggal Realisasi : <span id="tglForm">12/12/2020</span></b>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Nama Lengkap" id="namaFormEdit" value="" type="text" class="validate">
                        <label for="namaFormEdit">Nama Lengkap</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Alamat" id="alamatFormEdit" value="" type="text" class="validate">
                        <label for="alamatFormEdit">Alamat</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="Jenis Bank" id="bankFormEdit" value="" type="text" class="validate">
                        <label for="bankFormEdit">Jenis Bank</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="Kelompok" id="kelompokFormEdit" value="" type="text" class="validate">
                        <label for="kelompokFormEdit">Kelompok</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="Plafond Kredit" id="plafondFormEdit" value="" type="text" class="validate">
                        <label for="plafondFormEdit">Plafond Kredit</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="Jumlah Pinjaman" id="pinjamanFormEdit" value="" type="text" class="validate">
                        <label for="pinjamanFormEdit">Jumlah Pinjaman</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="(bln)" id="durasiFormEdit" value="" type="number" class="validate">
                        <label for="durasiFormEdit">Durasi Pinjaman</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="(%)" id="bungaFormEdit" value="" type="number" class="validate">
                        <label for="bungaFormEdit">Bunga</label>
                    </div>
                                             
                </div>
                <a href="#modShowPembayaran" class="btn purple modal-trigger">Bayar Angsuran</a>
                <a href="#modShowBunga" class="btn yellow modal-trigger">Bayar Bunga</a>
                <div onclick="simpanData()" class="btn blue modal-close">Simpan</div>
                <div onclick="deleteData()" class="btn red modal-close">Hapus</div>
                <div onclick="" class="btn grey modal-close">Tutup</div>
            </form>
        </div>
    </div>
<!-- ========================================================================= -->
<!--=========================== Modal Add Angsuran ==============================-->
    <!-- Modal Structure -->
    <div id="modShowPembayaran" class="modal">
        <div class="modal-content">
        <form action="" method="POST">
            <h4>Bayar angsuran :</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input id="tanggalAngsuranForm" type="date">
                    <label for="tanggalAngsuranForm">Tanggal</label>
                </div>
                <div class="input-field col m12">
                    <input placeholder="Nominal" id="nominalAngsuranForm" type="number" class="validate">
                    <label for="nominalAngsuranForm">Nominal</label>
                </div>                        
            </div>
            <div onclick="addNewAngsuran()" class="btn modal-close">simpan</div>
        </form>
        </div>
    </div>
<!-- ========================================================================= -->
<!--=========================== Modal Add Angsuran ==============================-->
    <!-- Modal Structure -->
    <div id="modShowBunga" class="modal">
        <div class="modal-content">
        <form action="" method="POST">
            <h4>Bayar bunga :</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input id="tanggalBungaForm" type="date">
                    <label for="tanggalBungaForm">Tanggal</label>
                </div>
                <div class="input-field col m12">
                    <input placeholder="Nominal" id="nominalBungaForm" type="number" class="validate">
                    <label for="nominalBungaForm">Nominal</label>
                </div>                        
            </div>
            <div onclick="addNewBunga()" class="btn modal-close">simpan</div>
        </form>
        </div>
    </div>
<!-- ========================================================================= -->


<div class="col s12">
    <h4><b>List Nasabah</b></h4>
    <div class="row">
        <input class="col s10 left" type="text" placeholder="Cari Nama atau Nomor Rekening" id="searchUser" oninput="searchUser()">
        <div class="col s2 right"><a href="#modAddNasabah" class="btn-floating blue modal-trigger " data-position="right" data-tooltip="Bayar angsuran"><i class=" material-icons">add</i></a></div>
    </div>

    <div class="row" id="listUser">
        <table class="striped highlight centered responsive-table" style="width: 100%; overflow-x:scroll;">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor</th>
                <th>Kecamatan</th>
                <th>Kelompok</th>
                <th>Tahun</th>
                <th></th>
            </tr>
            </thead>

            <tbody id="listData">
                
            </tbody>
        </table>
    </div>
</div>

<script>
    
    var myResponAllData=[];
    var choosenData = 0;
    showItem();
    function showItem(){
        var token = localStorage.getItem('token');

        $.ajax({
            url: '<?php echo $URL; ?>/API/showNasabah',
            method: 'POST',
            data: {
                "token":token,
            },
            
            success: function (data) {
                var response= JSON.stringify(data);
                myResponAllData=JSON.parse(response);

                // console.log(myResponse.message);
                if(myResponAllData.message=="Token valid"){
                    $("#listData").html("");
                    for(a=0; a<myResponAllData.data.length;a++){
                    
                        $("#listData").append(`<tr>
                            
                                <td>`+myResponAllData.data[a].nama+`</td>
                                <td>`+myResponAllData.data[a].id+`</td>
                                <td>`+myResponAllData.data[a].alamat+`</td>
                                <td>`+myResponAllData.data[a].kelompok+`</td>
                                <td>`+myResponAllData.data[a].tgl+"-"+myResponAllData.data[a].bln+"-"+myResponAllData.data[a].thn+`</td>
                                <td>
                                    <a class="btn-floating blue tooltipped modal-trigger" onclick="showModData(`+a+`)" href="#modShowNasabah" style="border-radius: 250px;"><i class="material-icons left">visibility</i> <span class="tooltiptext">Tooltip text</span></a>
                                </td>
                            
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


    function showModData(x){
        
        $("#namaFormEdit").val(myResponAllData.data[x].nama);
        $("#alamatFormEdit").val(myResponAllData.data[x].alamat);
        $("#bankFormEdit").val(myResponAllData.data[x].bank);
        $("#kelompokFormEdit").val(myResponAllData.data[x].kelompok);
        $("#plafondFormEdit").val(myResponAllData.data[x].plafond);
        $("#pinjamanFormEdit").val(myResponAllData.data[x].jumlah_pinjaman);
        $("#durasiFormEdit").val(myResponAllData.data[x].durasi_pinjaman);
        $("#bungaFormEdit").val(myResponAllData.data[x].bunga);
        $("#nomorForm").html(myResponAllData.data[x].id);
        $("#tglForm").html(myResponAllData.data[x].tgl+"-"+myResponAllData.data[x].bln+"-"+myResponAllData.data[x].thn);
        choosenData = x;
    }

    function addNewAngsuran(){
        var token = localStorage.getItem('token');

        var nominal=$("#nominalAngsuranForm").val();
        var tanggal=$("#tanggalAngsuranForm").val();
        var newTgl = tanggal.split("-");
        console.log(tanggal);
        $.ajax({
            url: '<?php echo $URL; ?>/API/addNewAngsuran',
            method: 'POST',
            data: {
                "token":token,
                "idNasabah":myResponAllData.data[choosenData].id,
                "nominal":nominal,
                "tgl":newTgl[2],
                "bln":newTgl[1],
                "thn":newTgl[0],
            },
            
            success: function (data) {
                var response= JSON.stringify(data);
                var myResponse=JSON.parse(response);
                alert(myResponse.message);
                showItem();               
            }
        });
    }

    function addNewBunga(){
        var token = localStorage.getItem('token');

        var nominal=$("#nominalBungaForm").val();
        var tanggal=$("#tanggalBungaForm").val();
        var newTgl = tanggal.split("-");
        console.log(tanggal);
        $.ajax({
            url: '<?php echo $URL; ?>/API/addNewBunga',
            method: 'POST',
            data: {
                "token":token,
                "idNasabah":myResponAllData.data[choosenData].id,
                "nominal":nominal,
                "tgl":newTgl[2],
                "bln":newTgl[1],
                "thn":newTgl[0],
            },
            
            success: function (data) {
                var response= JSON.stringify(data);
                var myResponse=JSON.parse(response);
                alert(myResponse.message);
                showItem();               
            }
        });
    }

    function deleteData(){
        var token = localStorage.getItem('token');
       
        // alert("masuk");
        if(confirm("Are you really want to delete this data ?")){
            $.ajax({
                url: '<?php echo $URL; ?>/API/deleteNasabah',
                method: 'POST',
                data: {
                    "token":token,
                    "idNasabah":myResponAllData.data[choosenData].id,
                },
                
                success: function (data) {
                    var response= JSON.stringify(data);
                    var myResponse=JSON.parse(response);
                    alert(myResponse.message);
                    showItem();               
                }
            });
        }
    }

    function addNewData(){
        var token = localStorage.getItem('token');

        var nama= $("#namaForm").val();
        var alamat=$("#alamatForm").val();
        var bank=$("#bankForm").val();
        var kelompok=$("#kelompokForm").val();
        var plafond=$("#plafondForm").val();
        var pinjaman=$("#pinjamanForm").val();
        var durasi=$("#durasiForm").val();
        var tanggal=$("#tglForm").val();
        var bunga=$("#bungaForm").val();
        var newTgl = tanggal.split("-");
        console.log(tanggal);
        $.ajax({
            url: '<?php echo $URL; ?>/API/addNewNasabah',
            method: 'POST',
            data: {
                "token":token,
                "nama":nama,
                "alamat":alamat,
                "bank":bank,
                "kelompok":kelompok,
                "plafond":plafond,
                "pinjaman":pinjaman,
                "durasi":durasi,
                "tgl":newTgl[2],
                "bln":newTgl[1],
                "thn":newTgl[0],
                "bunga":bunga,
            },
            
            success: function (data) {
                var response= JSON.stringify(data);
                var myResponse=JSON.parse(response);
                alert(myResponse.message);
                showItem();               
            }
        });
    }

    function simpanData(){
        var token = localStorage.getItem('token');

        var nama= $("#namaFormEdit").val();
        var alamat=$("#alamatFormEdit").val();
        var bank=$("#bankFormEdit").val();
        var kelompok=$("#kelompokFormEdit").val();
        var plafond=$("#plafondFormEdit").val();
        var pinjaman=$("#pinjamanFormEdit").val();
        var durasi=$("#durasiFormEdit").val();
        var bunga=$("#bungaFormEdit").val();
        var idNasabah=$("#nomorForm").html();
        console.log(idNasabah);
        $.ajax({
            url: '<?php echo $URL; ?>/API/editNasabah',
            method: 'POST',
            data: {
                "token":token,
                "nama":nama,
                "alamat":alamat,
                "bank":bank,
                "kelompok":kelompok,
                "plafond":plafond,
                "pinjaman":pinjaman,
                "durasi":durasi,
                "bunga":bunga,
                "idNasabah":idNasabah,
            },
            
            success: function (data) {
                var response= JSON.stringify(data);
                var myResponse=JSON.parse(response);
                alert(myResponse.message);
                showItem();               
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
                var rekening=myResponAllData.data[a].id.toLowerCase();
                if(nama.match(searchItem)||rekening.match(searchItem))
                $("#listData").append(`<tr>
                    
                    <td>`+myResponAllData.data[a].nama+`</td>
                    <td>`+myResponAllData.data[a].id+`</td>
                    <td>`+myResponAllData.data[a].alamat+`</td>
                    <td>`+myResponAllData.data[a].kelompok+`</td>
                    <td>`+myResponAllData.data[a].tgl+"-"+myResponAllData.data[a].bln+"-"+myResponAllData.data[a].thn+`</td>
                    <td>
                        <a class="btn-floating blue tooltipped modal-trigger" onclick="showModData(`+a+`)" href="#modShowNasabah" style="border-radius: 250px;"><i class="material-icons left">visibility</i> <span class="tooltiptext">Tooltip text</span></a>
                    </td>
                   
                </tr>`);
            }
        }
    }

</script>