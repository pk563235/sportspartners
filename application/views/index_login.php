<!doctype html>
<html>
<head>

<?php include 'module/head_import.php'; ?>	
</head>

<body>

<div class="body_frame">

<script>
    
	$( document ).ready(function() {
		Login();
	});

	window.fbAsyncInit = function() {
		FB.init({
		  appId      : '382974928570290', // App ID
		  status     : true, // check login status
		  cookie     : true, // enable cookies to allow the server to access the session
		  xfbml      : true  // parse XFBML
		});
			
		FB.Event.subscribe('auth.authResponseChange', function(response) {
		 if (response.status === 'connected') {
			//document.getElementById("message").innerHTML +=  "<br>Connected to Facebook";
			//SUCCESS
		} else if (response.status === 'not_authorized') {
			//document.getElementById("message").innerHTML +=  "<br>Failed to Connect";
			//FAILED
		} else {
			//document.getElementById("message").innerHTML +=  "<br>Logged Out";
			//UNKNOWN ERROR
		}
		});	
	
    };


   	function Login(){
		FB.login(function(response) {
		   if (response.authResponse) {
		    	getUserInfo();
				document.getElementById("login_btn").disabled=true;
				
				/* 
				$.post( "user/login", { name: "John", time: "2pm" })
				  .done(function( data ) {
					alert( "Data Loaded: " + data );
				  });
 */
				
  			} else{
  	    	 console.log('User cancelled login or did not fully authorize.');
   			}
		},{scope: 'email'});
	}

  function getUserInfo() {
	    FB.api('/me', function(response) {

		var str="";
		
		  //str +="<b>Name</b> : "+response.name+"<br>";
	  	  //str +="<b>Link: </b>"+response.link+"<br>";
	  	  //str +="<b>id: </b>"+response.id+"<br>";
		  //str +="<b>gender:</b> "+response.gender+"<br>";
		  //str +="<b>Email:</b> "+response.email+"<br>";
		  //str +="<b>locale:</b> "+response.locale+"<br>";
		  //str +="<b>age_range:</b> "+response.age_range+"<br>";
		  
		  
	  	  document.getElementById("status").innerHTML=str;
			
			document.getElementById("id").value = response.id;
			document.getElementById("name").value = response.name;
			document.getElementById("gender").value = response.gender;
			document.getElementById("email").value = response.email;
			
			//getPhoto(response);
		document.login.submit();
			});
			
		
    }
	
	function getPhoto(response)	{
	  FB.api('/me/picture?type=normal', function(response2) {
		  var str="<br/><b>Pic</b> : <img src='"+response2.data.url+"'/>";
	  	  //document.getElementById("status").innerHTML+=str;
			document.getElementById("id").value = response.id;
			document.getElementById("name").value = response.name;
			document.getElementById("gender").value = response.gender;
			document.getElementById("email").value = response.email;
			document.getElementById("photo").value = response2.data.url;
			
			document.login.submit();
			
    });
	}
	
	function Logout(){
		FB.logout(function(){document.location.reload();});
	}

  // Load the SDK asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));


</script>
<div class="ui green inverted  menu">
  <a class="active item" onclick="goto('/')">
    <i class="home icon"></i> Home
  </a>
</div>
	<div align="center">
	<h2>Sportspartners Login</h2>

	 <br/>

	<p> Welcome to <b>Sportspartners!</b> </p>
	<p> Feel lonely on play sport alone? Or missing 1 member in you football match? We can help you! </p>
	<p>  Please Sign in Facebook to join us!</p>

	 <div class="ui facebook button" onclick="Login()">
	  <i class="facebook icon"></i>
	  Facebook
	</div>
	 
	 <br/><br/>
	 
	 <form name="login" action='Home/LoginFB/' method="post">
	 <input type="hidden" id="id" name="id">
	 <input type="hidden" id="name" name="name">
	 <input type="hidden" id="gender" name="gender">
	 <input type="hidden" id="email" name="email">
	 <input type="hidden" id="photo" name="photo">
	 
	 </form>


	 
	 
	<div id="status"> 
		
	</div>
	<br/><br/><br/><br/><br/>
	<div id="message">
	<br/>
	</div>

	</div>
</div>
<script>
   $( document ).ready(function() {
		Login();
	});
</div>
</body>
</html>