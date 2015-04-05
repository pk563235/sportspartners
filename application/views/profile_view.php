<!doctype html>
<html>
<head>
<?php include 'module/head_import.php'; ?>	
</head>

<body>

<div class="body_frame">

<?php include 'module/menu.php'; ?>

<form class="ui form" name="user_profile" action="Profile/Profile_Update" method="post">
  <h4 class="ui dividing header">Profile</h4>
  <div class="two fields">
    <div class="field">
      <label>Name</label>
      <div class="two fields">
        <div class="field">
		  <input type="hidden" name="user_id" id="user_id" placeholder="ID" value='<?php echo $user_profile['user_id']; ?>' disabled>
          <label><?php echo $user_profile['user_name']; ?></label>
        </div>
      </div>
    </div>

  </div>
  <br>
  
    <div class=" two fields"> 	  
      	
        <div class="field">
		<label>Age</label>
          <label><?php echo $user_profile['user_age']; ?></label>
        </div>	
		    <div class="field"></div>
	<div class=" two fields"> 
        <div class="field">
		<label>Mobile</label>	
          <label><?php echo $user_profile['user_mobile']; ?></label>
        </div>		
		<div class="field"></div>
  </div>
  
	  
  <br>

  <div class="two fields">

    <div class="field"> 
      <label>Gender</label> 
	  <label><?php echo $user_profile['user_gender'] ?></label>
	  <input type="hidden" name="user_gender" id="user_gender" value="">
    </div>
    <div class="field"></div>
  </div>

  <br>
  <div class="two fields">
	  <div class="field">
		<label>Greeting Message</label>
		<label><?php echo $user_profile['user_detail']; ?><label>
	  </div>
  </div>
   
 
  <br>
  <br>  

  <div class="ui submit button" onclick="goto('/Profile')">
	Edit
  </div>
</form>

</div>

</div>

</body>

</html>