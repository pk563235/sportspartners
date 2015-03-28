<!DOCTYPE html>
<html>
<head>
<?php include 'module/head_import.php'; ?>	
</head>
<body>

<div class="body_frame">

<?php include 'module/menu.php'; ?>

<div class="body_content">



<p> <b> Events: </b></p>

<table class="ui table">
  <thead>
    <tr>
      <th>Event Name</th>
      <th> Date</th>
      <th>Time</th>
      <th>Category</th>
	  <th>Location</th>
	  <th>No. of joiner</th>
	  <th>Created by</th>	  
	  <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  foreach ($event_array as $event) {
		echo '<tr>';
		echo '<td>'.$event['event_name'].'</td>';
		echo '<td>'.$event['event_date'].'</td>';
		echo '<td>'.$event['start_time'].'-'.$event['end_time'].'</td>';
		echo '<td>'.$event['cat_name'].'</td>';
		echo '<td>'.$event['event_location'].'</td>';
		echo '<td>'.$event['join_person'].'/'.$event['event_person'].'</td>';
		echo '<td>'.$event['user_name'].'</td>';
		echo '<td><div class="ui quit button" onclick="goto(\'/Event/View/'.$event['event_id'].'\')">Detail/Join</a></td>';
		echo '</tr>';
    }
  ?>
  </tbody>
</table>

<br>
<div class="field">
  <div class="ui submit button">New Event</div>
  </div>

  </div>
</body>

</html>