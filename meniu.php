<td valign="top" width="125" height="400">

<div style="width: 120px; background-color: #f9f1f7; padding: 4px; border: solid #632415 1px;">

	<b>Alege domeniul</b><HR size="1">
	<?php 
		$sql = "SELECT * FROM domenii ORDER BY nume_domeniu ASC";
		$resursa = mysql_query($sql);
		while ($row = mysql_fetch_array($resursa)) {
				echo '<a href="domeniu.php? id_domeniu='.$row['id_domeniu'].'">'.$row['nume_domeniu'].'</a><br>';
			}
	 ?> 



<!-- Motor de Cautare -->


</div>
<br>
<div style="width: 120px; background-color: #f9f1f7; padding: 4px; border: solid #632415 1px;">

<form action="cautare.php" method="GET">
	<b> Cautare</b><br>
	<input type="text" name="cuvant" size="12">
	<input type="submit" value="cauta">
</form>
</div>



<!-- prezetare cos de cumparaturi -->


<br>
<div style="width=:120px; background-color:#F9F1E7; padding:4px; border:solid #632415 1px">
	<b>Coş</b><br>
<?php
	$nrCarti=0;
	$totalValoare=0;
	//daca exista carti in cos
	if(isset($_SESSION['titlu']))
	{
	for($i=0;$i<count($_SESSION['titlu']);$i++)
		
	{
		$nrCarti=$nrCarti+$_SESSION['nr_buc'][$i];
		$totalValoare=$totalValoare+($_SESSION['nr_buc'][$i]*$_SESSION['pret'][$i]);
	}
	}
?>

Aveţi <b><?php echo $nrCarti ?></b> cărţi în coş, în valoare totală de <b> <?php echo $totalValoare ?> </b> lei
<a href="cos1.php"> <br>Click aici pentru a vedea conţinutul coşului! </a>
</div>
</td>

<button style="border: dotteed; height: 30px; text-transform: uppercase;"><a href="index.php" style="text-decoration: none; color: green">HOME</a></button>