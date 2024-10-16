<html>
<head>
	<title>PLUG</title>
</head>

<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
	*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	text-decoration: none;
	font-family: 'Poppins', sans-serif;
	}	
	@font-face{

		font-family: headFont;
		src: url(ui/fonts/Summer-Vibes-OTF.otf);
	}

	@font-face{

		font-family: myFont;
		src: url(ui/fonts/OpenSans-Regular.ttf);
	}

body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #27344b;
  padding: 0 10px;
}	

.wrapper{
  background: rgba(41, 98, 255, 1);
  max-width: 450px;
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}

.form{
  padding: 25px 30px;
}

.form form{
  margin: 20px 0;
}

.form form .field input{
  outline: none;
}
	input[type=text],input[type=password],input[type=submit]{

		padding:10px;
		margin: 10px;
		width:100%;
		border-radius: 5px;
		border:solid 1px grey;
	}

	input[type=submit]{

		width: 100%;
		cursor: pointer;
		background-color: #2b5488;
		color: white;
	}

	input[type=radio]{

		transform: scale(1.2);
		cursor: pointer;
	}

	#header{

		font-size: 50px;
		text-align: center;
		font-family: headFont;
		width: 100%;
		color: white;
	}

	
	#error{
		color: #721c24;
		padding: 8px 10px;
		text-align: center;
		border-radius: 5px;
		background: #f8d7da;
		border: 1px solid #f5c6cb;
		margin-bottom: 10px;
		display: none;
	}

</style>
<body>

	<div id="wrapper">
 
 		<div id="header" style="font-size: 30px;font-family: Poppins;">
 			PLUG
 			<div style="font-size: 20px;font-family: Poppins;">Login</div>
 		</div>
 		<div id="error" style="">some text</div>
		<form id="myform">
			<div class="field input">
 				<input type="text" name="email" placeholder="Email" required><br>
				<input type="password" name="password" placeholder="Password" required><br>
 				<input style="background: #404b56;"  type="submit" value="Login" id="login_button" ><br>
			 </div>
 			<br>
			 <div class="link" style="display: block;text-align: center">Not yet signed up? <a href="signup.php" style="font-family: Poppins;text-decoration: underline;color: white;" ><b>Signup now</b></a></div>
		</form>
	</div>
</body>
</html>

<script type="text/javascript">

	function _(element){

		return document.getElementById(element);
	}

   	var login_button = _("login_button");
   	login_button.addEventListener("click",collect_data);

   	function collect_data(e){

   		e.preventDefault();
   		login_button.disabled = true;
   		login_button.value = "Loading...Please wait..";

   		var myform = _("myform");
   		var inputs = myform.getElementsByTagName("INPUT");

   		var data = {};
   		for (var i = inputs.length - 1; i >= 0; i--) {

   			var key = inputs[i].name;

   			switch(key){
 
   				case "email":
   					data.email = inputs[i].value;
   					break;
 
   				case "password":
   					data.password = inputs[i].value;
   					break;
 
   			}
   		}

   		send_data(data,"login");

   	}

   	function send_data(data,type){

   		var xml = new XMLHttpRequest();

   		xml.onload = function(){

   			if(xml.readyState == 4 || xml.status == 200){

   				handle_result(xml.responseText);
   				login_button.disabled = false;
   				login_button.value = "Login";
   			}
   		}

		data.data_type = type;
		var data_string = JSON.stringify(data);

		xml.open("POST","api.php",true);
		xml.send(data_string);
   	}

   	function handle_result(result){

   		var data = JSON.parse(result);
   		if(data.data_type == "info"){

   			window.location = "index.php";
   		}else{

   			var error = _("error");
   			error.innerHTML = data.message;
   			error.style.display = "block";
 
   		}
   	}

</script>

