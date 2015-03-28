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
          <input type="text" name="user_name" id="user_name" placeholder="Name" value='<?php echo $user_profile['user_name']; ?>' disabled>
        </div>
      </div>
    </div>

  </div>
  
    <div class=" two fields"> 	  
      	
        <div class="field">
		<label>Age</label>
          <input type="text" name="user_age" id="user_age" placeholder="Age" value='<?php echo $user_profile['user_age']; ?>' disabled>
        </div>	
		    <div class="field"></div>
		
	<div class=" two fields"> 
      <la
        <div class="field">
		<label>Mobile</label>	
          <input type="text" name="user_mobile" id="user_mobile" placeholder="Mobile" value='<?php echo $user_profile['user_mobile']; ?>' disabled>
        </div>		
		<div class="field"></div>
  </div>
  
	  
  <br>

  <div class="two fields">

    <div class="field"> 
      <label>Gender</label> 
	  <select class="ui search dropdown" name="user_gender_select" id="user_gender_select" disabled>
        <option value="" >Not Provide</option>
        <option value="male" <?php if ($user_profile['user_gender'] == 'male') echo 'selected'; ?>>Male</option>
        <option value="female" <?php if ($user_profile['user_gender'] == 'female') echo 'selected' ?>>Female</option>
      </select>
	  <input type="hidden" name="user_gender" id="user_gender" value="">
    </div>
    <div class="field"></div>
  </div>

  <br>
  <div class="field">
    <label>Greeting Message</label>
	<br>
    <textarea name="user_detail" id="user_detail" disabled><?php echo $user_profile['user_detail']; ?></textarea>
  </div>
   
 
  <br>
  <br>  

</form>

</div>

</div>

</body>

</html>