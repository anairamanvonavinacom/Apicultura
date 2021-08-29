<!DOCTYPE html>
<html>
<head>
<title> Prisaca.com</title>
<link rel="stylesheet" href="css/mystyle.css" >
</head>

<body>
<?php
// define variables and set to empty values
$nameErr = $adressErr =  $phoneErr = "";
$name = $adress =  $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   if (empty($_POST["name"]))
     {$nameErr = "Lipseste numele";}
   else
     {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name))
       {
       $nameErr = "Doar litere si spatiu"; 
       }
     }
   
   if (empty($_POST["adress"]))
     {$adressErr = "Nu ati indicat adresa";}
   else
     {
     $adress = test_input($_POST["adress"]);
     // check if  address syntax is valid
     if (!preg_match("/^[a-zA-Z0-9 ]*$/",$adress))
       {
       $adressErr = "Nu este complet"; 
       }
     }
     
   if (empty($_POST["phone"]))
     {$phoneErr = "Nu ati indicat telefonul";}
   else
     {
     $phone = test_input($_POST["phone"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/^[0-9 -]*$/",$phone))
       {
       $phoneErr = "Ati gresit numarul"; 
       }
     }

}

function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>
<div id="container">

  <div id="header">
   <h1><font color=#98bf21> Prisaca</font></h1>
  </div>
	<ul>
		<li class="a"><a href="home.htm" class="menu">Home</a></li>
		<li class="a"><a href="prod.htm" class="menu" >Produse</a></li>
		<li class="a"><a href="miere.htm"  class="menu">Miere</a></li>
		<li class="a"><a href="contact.htm"  class="menu">Contact</a></li>
		<li class="a"><a href="about.htm"  class="menu">About</a></li>
	</ul>
     <img src="img/bee-banner6.jpg" width=800 height=100> 
<table border=0 width=800>
 <tr> <td rowspan=4 width=250 valign=top> 
	<img src="img/cosdecumparaturi.jpg" width=150>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
	<p>Produsul:<select name="produs">
	<option value="mm1">Miere de mai 1kg</option>
	<option value="ms1">Miere de salcim 1kg</option>
	<option value="mt1">Miere de tei 1kg</option>
	<option value="mst1">Miere amestec de salcim si tei 1kg</option>
	<option value="msf1">Miere de sulfina 1kg</option>
	<option value="fa">Faguri (kg)</option>
	<option value="ca1">Capaceala 1kg</option>
	<option value="po">Polen 100g</option>
	<option value="mm5">Miere de mai 4,5kg</option>
	<option value="ms5">Miere de salcim 4,5kg</option>
	<option value="mt5">Miere de tei 4,5kg</option>
	<option value="mst5">Miere amestec de salcim si tei 4,5kg</option>
	<option value="msf5">Miere de sulfina 4,5kg</option>
	</select></p>
	<p><input type="submit" value="Adaoga">
	</p>
	</td>
      <td  width=500 bgcolor=#FFD700 height=20> <b> In cos</b> </td>
 <tr> <td> <h2> Nu aveti nimic in cos </h2></td> </tr>
 <tr><td bgcolor=#FFD700 height=20> Completati formularul   </td></tr>
<tr> <td> <p>Nume complet*: <br><input type="text" name="name" value="<?php echo $name;?>">
<span class="error">* <?php echo $nameErr;?></span></p>
	<p>Tara<br> <select name="tara">
            <option value="MD" selected="selected" >Moldova
            <option value="RO">Romania
            <option value="UA">Ukraine
</select>
	<p>Adresa complet*:<br><input type="text" name="adress"value="<?php echo $adress;?>">
<span class="error">* <?php echo $adressErr;?></span>
</p>
	<p>Telefonul de contact*: <br><input type="text" width=300 name="phone"value="<?php echo $phone;?>">
<span class="error">* <?php echo $phoneErr;?></span></p>
	<p>Livrare <br><select name="livrare">
            <option value="Domiciliu">Domiciliu - gratuit in raza or. Chisinau la comenzi mai mari de 1000 lei
            <option value="Curierat">Curierat - in or. Chisinau - 30 lei
	    <option value="RambursPostal">Ramburs postal (plata la livrarea coletului) in alta localitate
</select>
	<hr>  
	<input type="submit" value="Trimite comanda">
</form>    </td>
   </tr>
  </table>
<div id="footer">
     <a href="home.htm">Home</a> | <a href="about.htm">About</a> | <a href="galerie.htm">Galerie</a> | <a href="harta.htm">Harta</a> | <a href="#">News</a> | <a href="#">Support</a> | <a href="contact.htm">Contacts</a>
  
  <p>
<?php
$count = file_get_contents("count.txt");
$count++;
echo "Counts: $count";
file_put_contents("count.txt",$count);
?>
</p></div>
 
</div>
</body>
</html>