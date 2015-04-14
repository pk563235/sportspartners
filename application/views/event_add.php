<!DOCTYPE html>
<html>
<head>
<?php include 'module/head_import.php'; ?>	
</head>
<body>

<div class="body_frame">

<?php include 'module/menu.php'; ?>
<script>
	function Add_event() {
		//$("#user_gender").value = $("#user_gender_select").value;
		//alert($("#user_gender_select").val());
		//alert($("#user_gender_select").val() );
		document.new_event.submit();
	}
	
	
</script>
<div style="padding-left:10px;padding-right:10px">




<form class="ui form" name="new_event" action="Add_Event" method="post">
  <h4 class="ui dividing header">Event Details</h4>

  
	<div>
    <label><b>Event Name</b></label><br>
	<input type="text" name="event_name" id="event_name" placeholder="Event Name" value='<?php echo $event_name; ?>'>
		</div>
<br>
<div class="two fields">
	<div class="field">
	 <label>Date</label>
		<input type="date" name="event_date" id="event_date" placeholder="Event Date"  value='<?php echo $event_date; ?>'>
    </div>
	<div class="field">
	 <label></label>
    </div></div>

	
<br>

<div class="two fields">
	<div class="field">
	 <label>Start Time</label>
		<input type="time" name="start_time" id="start_time" placeholder="Start Time"  value='<?php echo $start_time; ?>'>
    </div>
	<div class="field">
	 <label>End Time</label>
		<input type="time" name="end_time" id="end_time" placeholder="End Time"  value='<?php echo $end_time; ?>'>
    </div></div>

	
<br>

	<div class="two fields">
	<div class="field">
	 <label>Location</label>
		<input type="text" name="event_location" id="event_location" placeholder="Event Location"  value='<?php echo $event_location; ?>'>
    </div>
	<div class="field">
    </div>
	</div>

	

  <div class="two fields">
    <div class="field">
      <label>Category</label>
      <select class="ui search dropdown" name="cat_id" id="cat_id">
	  <?php
		foreach ($category as $cat) {
			if ($cat['cat_id'] == $cat_id)
				echo '<option value='.$cat['cat_id'].' selected="selected">'.$cat['cat_name'].'</option>';
			else
				echo '<option value='.$cat['cat_id'].'>'.$cat['cat_name'].'</option>';
		}
	  ?>
	  </select>
    </div>
    <div class="field">
	<label>No. of Joiners</label>
	<input type="number" name="event_person" id="event_person" placeholder="No. of Joiners" min="1" max="1000"  value='<?php echo $event_person; ?>'>
  </div>
  <div class="two fields">
	  <div class="field">
		<label>Event Description</label>
		<input type="text" name="event_detail" id="event_detail" placeholder="Event Description"  value='<?php echo $event_detail; ?>'>
	  </div>
  </div>
  </div>
</form>
<br>
<div class="field">
  <div class="ui submit button" onclick="Add_event()">Add</div>
  </div>
<div>
<?php echo $message; ?>
</div>
  </div>
</body>

</html>