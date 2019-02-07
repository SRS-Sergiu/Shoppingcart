<?php
session_start();
include("conectare.php");
include("page_top.php");
include("meniu.php");
//$actiune=$_GET['actiune'];


if(isset($_GET['actiune'])&&$_GET['actiune']=="adauga"){
	$_SESSION['id_carte'][]=$_POST['id_carte'];
	$_SESSION['nr_buc'][]=1;
	$_SESSION['pret'][]=$_POST['pret'];
	$_SESSION['titlu'][]=$_POST['titlu'];
	$_SESSION['nume_autor'][]=$_POST['nume_autor'];
}


if(isset($_GET['actiune'])&&$_GET['actiune']=="modifica")
{
	for($i=0;$i<count($_SESSION['id_carte']);$i++)
	{
		$_SESSION['nr_buc'][$i]=$_POST['noulNrBuc'][$i];
	}
}
?>


<td valign="top">
	<h1>Coşul de shopping!</h1>
		<form action="cos.php?actiune=modifica" method="POST">
		<table border="1" cellspacing="0" cellpadding="4">
			<tr bgcolor="#F9F1E7">
				<td><b>Nr buc</b></td>
				<td><b>Carte</b></td>
				<td><b>Preţ</b></td>
				<td><b>Total</b></td>
			</tr>

			
<?php
$totalGeneral=0;
if(isset($_SESSION['id_carte']))
{
for($i=0;$i<count($_SESSION['id_carte']);$i++)
	{
		if($_SESSION['nr_buc'][$i]!=0)
		{
		print '<tr><td><input type="text" name="noulNrBuc['.$i.']" size="1" value="'.$_SESSION['nr_buc'][$i].'"></td>
			<td><b>'.$_SESSION['titlu'][$i].'</b> de '.$_SESSION['nume_autor'][$i].'</td>
			<td align="right">'.$_SESSION['pret'][$i].' lei</td>
			<td align="right">'.($_SESSION['pret'][$i]*$_SESSION['nr_buc'][$i]).' lei</td>
			</tr>';
		$totalGeneral=$totalGeneral+($_SESSION['pret'][$i]*$_SESSION['nr_buc'][$i]);	
		
		print '<tr><td align="right" colspan="3"><b>Total in cos</b></td>
		<td align="right"><b>'.$totalGeneral.'</b> lei </td></tr>';
		}
	}
}
?>
</table>
<input type="submit" value="Modifică"> <br><br> Introduceţi <b>0</b> pentru cărţile pe care doriţi să le scoateţi din coş!
			<h1>Continuare</h1>
			<br>
			<br>
			<table>
			<tr><td width="200" align="center">

			<a href="index.php" ><img src="cos.jpg" height="150px" width="150px">Continuă cumpărăturile </a></td>
			<td width="200" align="center">
			<a href="casa.php"><img src="plata.jpg" height="150px" width="150px"><br>Mergi la casă</a>
			</td>
			</tr>
			</table>
</td>
<?php
include ("page_bottom.php");
?>


	

