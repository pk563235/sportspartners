<!DOCTYPE html>
<html>
<head>
<?php include 'module/head_import.php'; ?>	
</head>
<body>

<div class="body_frame">

<?php include 'module/menu.php'; ?>

<div class="body_content">




<form class="ui form">
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
</form>
<br>
<div class="field">
  <div class="ui submit button">Join</div>
  </div>

  </div>
</body>

</html>