<div class="col s12">
    <h4><b>Riwayat Pembayaran</b></h4>
    <div class="row">
        <input class="col s10 left" type="text" placeholder="Cari Nomor Rekening" id="searchUser" oninput="searchUser()">
    </div>

    <div class="row" id="listUser">
        <table class="striped highlight centered">
            <thead>
            <tr>
                <th>Nomor Rekening</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Nominal</th>
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
    showItem();

    function showItem(){
        var token = localStorage.getItem('token');

        $.ajax({
            url: '<?php echo $URL; ?>/API/showAngsuran',
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
                            
                            <td>`+myResponAllData.data[a].nasabah.id+`</td>
                            <td>`+myResponAllData.data[a].nasabah.nama+`</td>
                            <td>`+myResponAllData.data[a].angsuran.tgl+`-`+myResponAllData.data[a].angsuran.bln+`-`+myResponAllData.data[a].angsuran.thn+`</td>
                            <td>`+myResponAllData.data[a].angsuran.nominal+`</td>
                            <td>
                                <a class="btn-floating red tooltipped" onclick="deleteData(`+myResponAllData.data[a].angsuran.id+`)" style="border-radius: 250px;"><i class="material-icons left">delete</i> <span class="tooltiptext">Tooltip text</span></a>
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

    function searchUser(){
        var searchItem= $("#searchUser").val().toLowerCase();
        $("#listData").html("");
        if(searchItem=="")
            showItem();
        else{
            for(a=0; a<myResponAllData.data.length;a++){
                var nama=myResponAllData.data[a].nasabah.id.toLowerCase();
                var induk=myResponAllData.data[a].nasabah.nama.toLowerCase();

                if(nama.match(searchItem)||induk.match(searchItem))
                    $("#listData").append(`<tr>
                                
                        <td>`+myResponAllData.data[a].nasabah.id+`</td>
                        <td>`+myResponAllData.data[a].nasabah.nama+`</td>
                        <td>`+myResponAllData.data[a].angsuran.tgl+`-`+myResponAllData.data[a].angsuran.bln+`-`+myResponAllData.data[a].angsuran.thn+`</td>
                        <td>`+myResponAllData.data[a].angsuran.nominal+`</td>
                        <td>
                            <a class="btn-floating red tooltipped" onclick="deleteData(`+myResponAllData.data[a].angsuran.id+`)" style="border-radius: 250px;"><i class="material-icons left">delete</i> <span class="tooltiptext">Tooltip text</span></a>
                        </td>
                    </tr>`);
            }
        }
    }

    function deleteData(x){
        var token = localStorage.getItem('token');
       
        // alert("masuk");
        if(confirm("Are you really want to delete this data ?")){
            $.ajax({
                url: '<?php echo $URL; ?>/API/deleteAngsuran',
                method: 'POST',
                data: {
                    "token":token,
                    "idAngsuran":x,
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
</script>