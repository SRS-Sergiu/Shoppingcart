
<?php
include("conectare.php");
include("page_top.php");
// include("meniu.php");
?>
<center><div style="width:400px;
 	 			 border:2px dotted #662613;
 	 			 background-color:#ccc;
 	 			 padding:10px;
 	 			 margin-left: 100px;
 	 			 float: right;">


 	 			 <br><b>Adauga o caarte </b>
	 	 	<form action="Fara_chef_miercuri.php" method="POST">

	 	 		Numee autor: <input type="text" name="nume"><br><br>
	 	 		<center><input type="submit" value="Adauga"></center>
	 	 	</form>		 	
 	 
</div></center>

<?php
include("page_bottom.php");
?>
