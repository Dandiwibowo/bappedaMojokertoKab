<!--=========================== Modal Add Tambahan ==============================-->

<!--=========================== Modal Add Tambahan 2 ==============================-->

<!--=========================== Modal Add ==============================-->
    <!-- Modal Structure -->
    <div id="modAddAdmin" class="modal">
        <div class="modal-content">
            <form action="<?php echo "$actual_link"; ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <h4><b>Tambah Admin</b></h4>
                    <div class="input-field col s12">
                        <input placeholder="Nama Lengkap" id="namaForm" value="" type="text" class="validate">
                        <label for="namaForm">Nama Lengkap</label>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Username" id="usernameForm" value="" type="text" class="validate">
                        <label for="usernameForm">Username</label>
                    </div>
                    
                    <div class="input-field col s12">
                        <input placeholder="Password" id="passwordForm" value="" type="text" class="validate">
                        <label for="passwordForm">Password</label>
                    </div>
                        
                </div>
                <div onclick="addNewData()" class="btn modal-close">Tambah</div>
            </form>
        </div>
    </div>
<!-- ========================================================================= -->

<div class="col s12">
    <h4><b>List Admin</b></h4>
    <div class="row">
        <input class="col s10 left" type="text" placeholder="Cari Nama atau Username" id="searchUser" oninput="searchUser()">
        <div class="col s2 right"><a href="#modAddAdmin" class="btn-floating blue modal-trigger"><i class=" material-icons">add</i></a></div>
    </div>

    <div class="row" id="listUser">
        <table class="striped highlight centered">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
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
            url: '<?php echo $URL; ?>/API/showAdmin',
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
                                <td>`+myResponAllData.data[a].username+`</td>
                                <td>
                                    <div class="btn red" onclick=(deleteData(`+myResponAllData.data[a].id+`)) style="border-radius: 250px;">Delete <i class="material-icons left">delete</i> </div>
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

    function deleteData(x){
        var token = localStorage.getItem('token');
        var idAdmin = x;

        // alert("masuk");
        if(confirm("Are you really want to delete this data ?")){
            $.ajax({
                url: '<?php echo $URL; ?>/API/deleteAdmin',
                method: 'POST',
                data: {
                    "token":token,
                    "idAdmin":idAdmin,
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
        var username=$("#usernameForm").val();
        var password=$("#passwordForm").val();

        $.ajax({
            url: '<?php echo $URL; ?>/API/addNewAdmin',
            method: 'POST',
            data: {
                "token":token,
                "nama":nama,
                "username":username,
                "password":password,
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
                var username=myResponAllData.data[a].username.toLowerCase();
                if(nama.match(searchItem)||username.match(searchItem))
                $("#listData").append(`<tr>
                    
                        <td>`+myResponAllData.data[a].nama+`</td>
                        <td>`+myResponAllData.data[a].username+`</td>
                        <td>
                            <div class="btn red" onclick=(deleteData(`+myResponAllData.data[a].id+`)) style="border-radius: 250px;">Delete <i class="material-icons left">delete</i> </div>
                        </td>
                   
                </tr>`);
            }
        }
    }
</script>