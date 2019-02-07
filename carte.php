<?php 
session_start();
include('conectare.php');
include('page_top.php');
include('meniu.php');

$id_carte = $_GET['id_carte'];
$sql = "SELECT titlu, nume_autor, descriere, pret
		FROM carti, autori
		WHERE id_carte='.$id_carte.'
		AND carti.id_autor=autori.id_autor";
$resursa = mysql_query($sql);
$row = mysql_fetch_array($resursa);
 ?>


<!-- setam imaginea conform id de la carte -->
 <td valign="top" style="margin-left: 70px;">
 	<table>
 		<tr>
 			<td valign="top">
 				<?php 
 					$adresaImagine = "coperte/".$id_carte.".jpg";
 					if (file_exists($adresaImagine))
 					 {
 						 echo '<img src="'.$adresaImagine.'" width="75" height="100" hspace="10"><br>';
 					}
 				 ?>
 			</td>
 			<td valign="top">
 				<h1><?php echo $row['titlu']?></h1>
 				<i>de <b><?php echo $row['nume_autor']?></b></i>
 				<p><i><?php echo $row['descriere']?></i></p>
 				<p>Pret: <?php echo $row['pret']?> lei</p>
 			</td>
 		</tr>
 	</table>



<!--Formular pentru adaugare in cos--> 
	<form action="cos1.php?actiune=adauga"method="POST" style="margin-left: 570px; background-color: red;">
		<input type="hidden" name="id_carte" value="<?php echo $id_carte?>">
		<input type="hidden" name="titlu" value="<?php echo $row['titlu']?>">
		<input type="hidden" name="nume_autor" value="<?php echo $row['nume_autor']?>">
		<input type="hidden" name="pret" value="<?php echo $row['pret']?>">
		<input type="submit" value="Cumpără acum!" style="background-color: red; border: none; height: 30px; text-transform: uppercase;">	
	</form>



<!-- Opiniile cititorilor -->
 <p><b>Opiniile cititorilor:</b></p>
 	<?php 
 		$sqlComentarii = "SELECT *
 						  FROM comentarii 
 						  WHERE id_carte=".$id_carte;
 		$resursaComentarii = mysql_query($sqlComentarii);
 		while ($row = mysql_fetch_array($resursaComentarii))
 		 {
 			echo '<div style="width:600px;
 							  border:4px dotted #fff;
 							  background-color:#99ef7a;
 							  padding:10px;
 							  margin-left:70px;">
 						<a href="mailto:'.$row['adresa_mail'].'">'.$row['nume_utilizator'].'</a><br>'.$row['comentariu'].'</div> ';
 		}
 	 ?>

 	 <br>


<!-- formular de adaugare a comentariilor -->
 	 <div style="width:400px;
 	 			 border:2px dotted #662613;
 	 			 background-color:#ccc;
 	 			 padding:10px;
 	 			 margin-left: 70px;">

 	 	<b>Adauga opinia ta:</b>
 	 	<hr size="1">
	 	 	<form action="adauga_comentariu.php" method="POST">
	 	 		Nume: <input type="text" name="nume_utilizator"><br><br>
	 	 		Email: <input type="test" name="adresa_email"><br><br>
	 	 		Comentariu: <br> <textarea name="comentariu" cols="45"></textarea><br><br>
	 	 		<input type="hidden" name="id_carte" value="<?php echo $id_carte?>">
	 	 		<center><input type="submit" value="Adauga"></center>
	 	 	</form>		 	
 	 </div>
 </td>

<?php include('page_bottom.php'); ?>
