<!doctype html>
<html>
<head>
<?php include 'module/head_import.php'; ?>	
</head>

<body>

<div class="body_frame">

<?php include 'module/menu.php'; ?>

<div style="padding-left:10px;padding-right:10px">
	<form class="ui form" name="user_profile" action="Profile/Profile_Update" method="post">
	  <h4 class="ui dividing header">Profile</h4>
	  <div class="field">
	  <input type="hidden" name="user_id" id="user_id" placeholder="ID" value='<?php echo $user_profile['user_id']; ?>' disabled>
		<table border="1">
			<tr>
				<td style="width:30%"><label>Name</label></td>
				<td style="width:50%"><label><?php echo $user_profile['user_name']; ?></label></td>
				<td rowspan='4'><img src='<?php echo $this->input->cookie('user_photo').'?type=normal'; ?>'></td>
			</tr>
			<tr>
				<td><label>Age</label></td>
				<td><label><?php echo $user_profile['user_age']; ?></label></td>
			</tr>
			<tr>
				<td><label>Mobile</label></td>
				<td><label><?php echo $user_profile['user_mobile']; ?></label></td>
			</tr>
			<tr>
				<td><label>Gender</label></td>
				<td><label><?php echo $user_profile['user_gender'] ?></label></td>
			</tr>
			<tr style="height:200px">
				<td>Greeting Message</td>
				<td colspan='2'><label><?php echo $user_profile['user_detail']; ?><label></td>
			</tr>
		</table>
	  </div>

	 
	  <br>
	  <br>  

	  <div class="ui submit button" onclick="goto('/Profile')">
		Edit
	  </div>
	</form>
</div>
</div>

</div>

</body>

</html>