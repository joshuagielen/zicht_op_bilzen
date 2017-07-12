<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="vakantiewoning, haspengouw, fruit, bloesems, ontbijt, fietsen, wandelen, shoppen, voetreflexologie, Maastricht, Tongeren, kamer, Bilzen, Demer, vakantiewoning, fietsen, fiets, rust, gezellig">
<meta name="description" content="Een vakantiewoning gelegen in het knusse demerstadje Bilzen, waar men tot rust kan komen, voor 2 personen.">
<meta name="title" content="vakantiewoning gelegen in Bilzen">
<link rel="stylesheet" type="text/css" href="styleSheet.css"/>


<title>Contact</title>

<script>
	

	function checkEmail(){
		var email = document.getElementsByName('mail')[0].value;
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
		
		if(email.match(mailformat)){ 
			document.getElementsByName('mail')[0].style.borderColor = "";
			return true;  
		}else{ 
			document.getElementById('error_Email').innerHTML = "Ongeldig e-mailadres!";
			document.getElementsByName('mail')[0].style.borderColor = "red";
			
			return false;  
		}  
	}

	function checkName(){
		var empt = document.getElementsByName('name')[0].value;
		if (empt == "")  
		{  
			document.getElementById('error_Naam').innerHTML = "Verplicht veld!";
			document.getElementsByName('name')[0].style.borderColor = "red";
			return false;  
		}else{
			document.getElementById('error_Naam').innerHTML = "";
			document.getElementsByName('name')[0].style.borderColor = "";
			return true;
		}
	}
	function checkPhone(){
		var empt = document.getElementsByName('phoneNumber')[0].value;
		if (empt == "")  
		{  
			document.getElementById('error_Phone').innerHTML = "Verplicht veld!";
			document.getElementsByName('phoneNumber')[0].style.borderColor = "red";
			return false;  
		}else{
			document.getElementById('error_Phone').innerHTML = "";
			document.getElementsByName('phoneNumber')[0].style.borderColor = "";
			return true;
		} 
	}
	
	function validateForm(){
		var name = checkName();
		var email = checkEmail();
		
		if(name && email){
			return true;
		}else{
			return false;
		}
		
	}
</script>



</head>

<body>
<nav>
<h1>Zicht op Bilzen</h1>
<ul>
	<li><a href="index.html">Home</a></li>
    <li><a href="bezienswaardigheden.html">Bezienswaardigheden</a></li>
	<li><a href="contact.php">Contact & Reservatie</a></li>

</ul>

</nav>
<main>
<h1>Tarieven</h1>
<ul>
<li>2 nachten 140 euro</li>
<li>Bij verblijf vanaf 3 nachten: prijs op afspraak</li>

</ul>

<h1>Reservatie</h1>

<p>Om te reserveren kan u telefonisch contact met ons opnemen via het nummer  
+32(0)472 77 55 41 of +32(0)491 11 50 05 of u kan onderstaand formulier invullen. Wij nemen hierna zo snel mogelijk contact met u op.</p>



<form name="contact_form" method="post" action="sent_contact.php"   onsubmit="return validateForm(this);" >
		<div class="form">
		
		<label>Naam:</label>
		
		<input type="text" name="name" size="30" class="input">
		<div class='error' id='error_Naam' ></div>
	
		<label>Telefoonnummer:</label>
		<input type="text" name="phoneNumber" size="30" class="input">
		<div class='error' id='error_Phone' ></div>
	
		<label>E-mail:</label>
		<input type="mail" name="mail" size="30" class="input">
		<div class='error' id='error_Email' ></div>
	
		<label>Uw vraag of reservatie</label>
		<textarea name="bericht" rows="4" cols="40" class="input" ></textarea>
		
		
		<button type="submit" >Verstuur</button>
		</div>
</form>	

<address>
	<h3>Contactgegevens</h1>
	Fam. Gielen-Gijbels <br>
	Brabantsestraat 15 <br>
	3740 Bilzen <br>
	GSM +32(0)472.775541 of +32(0)491.115005 <br>
	E-mail: miagijbels@hotmail.com
</address>
</main>
<footer>© Zicht op Bilzen</footer>
</body>

</html>
