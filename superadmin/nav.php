<style>
	@media screen and (max-width: 2000px) {
		#navbarku{
			display:block;
			width:17%;
		}
		.minmen{
			display:none;
		}
		#backarow{
			display:none;
		}
	}
	@media screen and (max-width: 800px) {
		#navbarku{
			display:none;
			width:250px;
			overflow:scroll;
			overflow-x:hidden;
		}
		.minmen{
			display:block;
		}
		#backarow{
			display:block;
		}
	}
	.men a div{
		padding:10px;
		background:white;
		color:black;
	}
	.men a div:hover{
		background:#f2f2f2;
	}
	.men a div i{
		margin-right:15px;
	}
	nav{
		z-index: 2;
	}
</style>

<!--====================================SIDENAV============================================-->
<ul id="slide-out" class="sidenav">
        
    
	<li><a href="./akun"><i class="material-icons left">supervised_user_circle</i>Admin</a></li>
	<li><a href="./nasabah"><i class="material-icons left">group</i>Nasabah</a></li>
	<li><a href="./riwayatpembayaran"><i class="material-icons left">wysiwyg</i>Riwayat Pembayaran</a></li>
	<li><a href="./jurnal"><i class="material-icons left">analytics</i>Tabel Jurnal</a></li>
	<li><a href="./recons"><i class="material-icons left">assessment</i>Tabel Recons</a></li>
	<li><a href="./nrv"><i class="material-icons left">line_style</i>Tabel NRV</a></li>
	<li><a href="./setting"><i class="material-icons left">settings</i>Setting</a></li>    
    <li class="divider"></li>
    <li><a href="#" onclick="logout()"><i class="material-icons left">cancel</i>keluar</a></li>
    
</ul>
<!--======================================================================================-->


<div id="navbarku" style="position:fixed; left:0px; top:0px; height:100%; background:white; padding-top:65px;">
	<div class="row" style="background:url('../superadmin/images/back.jpg'); background-size:cover; margin:0px; padding:10px; color:white;">

		<!-- <a id="backarow" href="#" onclick="navout()" style="color:white;" class="col xl1 l1 m1 s1 push-xl10 push-l10 push-m10 push-s10 material-icons">arrow_back</a> -->
		<div class="col s12" style="text-align: center; ">
			<img src="../superadmin/images/avatar.png" style="width:100px; height:100px; margin:10px; border: 2px white solid; border-radius:50%;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
		</div>
		<div class="col s12" style="text-align: center; " id="adminName">
		</div>
		<div class="col s12" style="text-align: center; ">
			<b>(Admin)</b>
		</div>
	</div>
	<div style="background:#f2f2f2;">Main Navigation</div>
	<div class="men" style="font-size:16px;">
		
		<a href="./akun"><div><i class="material-icons left">supervised_user_circle</i>Admin</div></a>
		<a href="./nasabah"><div><i class="material-icons left">group</i>Nasabah</div></a>
		<a href="./riwayatpembayaran"><div><i class="material-icons left">wysiwyg</i>Riwayat Pembayaran</div></a>
		<a href="./jurnal"><div><i class="material-icons left">analytics</i>Tabel Jurnal</div></a>
		<a href="./recons"><div><i class="material-icons left">assessment</i>Tabel Recons</div></a>
		<a href="./nrv"><div><i class="material-icons left">line_style</i>Tabel NRV</div></a>
		<a href="./setting"><div><i class="material-icons left">settings</i>Setting</div></a>
		<a href="#" onclick="logout()"><div><i class="material-icons left">cancel</i>keluar</div></a>
	</div>
</div>

<nav class="col xl12 l12 m12 s12" style="background:#f44250; color:white; position:fixed; top:0px;  width: 100%;">
	<a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only">
		<i class="material-icons">menu</i>
	</a>
	<div class=" col xl12 l12 m11 s9">Dashboard Admin</div>
</nav>

<script>
	if (localStorage.getItem("username") === null||
		localStorage.getItem("token") === null||
		localStorage.getItem("iduser") === null||
		localStorage.getItem("nama") === null) {
		
		alert("Please login first");
		window.location="<?php echo $URL; ?>";
	}


	function logout(){
		localStorage.removeItem("token");
		localStorage.removeItem("iduser");
		localStorage.removeItem("nama");
		localStorage.removeItem("username");
		window.location="<?php echo $URL; ?>";       
	}
</script>