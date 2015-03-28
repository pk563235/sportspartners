<!DOCTYPE html>
<html>
<head>
<?php include 'module/head_import.php'; ?>	
</head>
<body>

<div class="body_frame">

<?php include 'module/menu.php'; ?>
<script>
	function Add_Comment() {
		//$("#user_gender").value = $("#user_gender_select").value;
		//alert($("#user_gender_select").val());
		//alert($("#user_gender_select").val() );
		document.add_comment.submit();
	}
	
	
</script>
<div class="body_content">




<form class="ui form" name="add_comment" action="http://sportspartners.net/Event/Add_Comment" method="post">
  <h4 class="ui dividing header">Event Details</h4>

  
	<div>
    <label><b>Event Name</b></label><br>
	<?php echo $event['event_name']; ?>
		</div>
<br>
<div class="two fields">
	<div class="field">
	 <label>Date</label>
		<?php echo $event['event_date']; ?>
    </div>
	<div class="field">
	 <label>Time</label>
		<?php echo $event['start_time'].'-'.$event['end_time']; ?>
    </div></div>

	
<br>

	<div class="two fields">
	<div class="field">
	 <label>Location</label>
		<?php echo $event['event_location']; ?>
    </div>
	<div class="field">
    </div>
	</div>

	

  <div class="two fields">
    <div class="field">
      <label>Category</label>
      <?php echo $category['cat_name']; ?>
    </div>
    <div class="field">
	<label>No. of Joiners</label>
	<?php echo $join_person['join_person'].'/'.$event['event_person']; ?>
  </div>
  <div class="field">
    <label>Event Description</label>
    <?php echo $event['event_detail']; ?>
  </div>
  </div>
  
	<h4 class="ui dividing header">Event Comment</h4>
  <div>
		<table class="ui table">
			<thead>
				<tr>
					<th>User</th>
				</tr>
			</thead>
			<tbody>
			  <?php
			  foreach ($comment as $user_com) {
					echo '<tr>';
					echo '<td>'.$user_com['user_comment'].'</td>';
					echo '</tr>';
				}
			  ?>
			</tbody>
		</table>
  </div>
  <div>
	<input type="text" name="user_comment" id="user_comment" placeholder="User Comment">
	<input type="hidden" name="event_id" id="event_id" value="<?php echo $event['event_id']; ?>">
	<div class="ui submit button" onclick="Add_Comment()">Add Comment</div>
  </div>
</form>
<br>
<div class="field">
  <div class="ui submit button">Join</div>
  </div>

  </div>
</body>

</html>