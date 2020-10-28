  <h4><b>Setting</b></h4>
  
  <form action="" method="POST">
      <div class="row">
          <div class="input-field col s12">
              <input placeholder="Nama Lengkap" id="namaForm" type="text" class="validate">
              <label for="namaForm">Nama Lengkap</label>
          </div>
          
          <div class="input-field col m6 s12">
              <input placeholder="Email" id="emailForm" type="email" class="validate">
              <label for="emailForm">Email</label>
          </div>
          <div class="input-field col m6 s12">
              <input placeholder="Password" id="passwordForm" type="password" class="validate">
              <label for="passwordForm">Password</label>
          </div>                        
      </div>
      <div onclick="save()" class="btn">simpan</div>
  </form>

  <script>
    showItem();
    function showItem(){
        var token = localStorage.getItem('token');
        var idAdmin = localStorage.getItem("iduser");

        $.ajax({
            url: '<?php echo $URL; ?>/API/showAdmin',
            method: 'POST',
            data: {
                "token":token,
                "idAdmin":idAdmin,
            },
            
            success: function (data) {
                var response= JSON.stringify(data);
                var myResponse=JSON.parse(response);

                // console.log(myResponse.message);
            if(myResponse.message=="Token valid"){
                $("#namaForm").val(myResponse.data[0].nama);
                $("#emailForm").val(myResponse.data[0].username);
                $("#passwordForm").val(myResponse.data[0].password);
            }
            else{
                alert(myResponse.message);
            }
                // console.log(JSON.stringify(myResponse.token));
                // alert(data);
            }
        });
    }

    function save(){
        var token = localStorage.getItem('token');
        var idAdmin = localStorage.getItem("iduser");

        var nama= $("#namaForm").val();
        var username=$("#emailForm").val();
        var password=$("#passwordForm").val();

        $.ajax({
            url: '<?php echo $URL; ?>/API/editAdmin',
            method: 'POST',
            data: {
                "token":token,
                "idAdmin":idAdmin,
                "nama":nama,
                "username":username,
                "password":password,
            },
            
            success: function (data) {
                var response= JSON.stringify(data);
                var myResponse=JSON.parse(response);
                localStorage.setItem("token", myResponse.newToken);
                alert(myResponse.message);
                showItem();               
            }
        });
    }
  </script>

        