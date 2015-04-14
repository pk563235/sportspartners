<!DOCTYPE html>
<html>
<head>
<?php include 'module/head_import.php'; ?>	
</head>
<body>

<div class="body_frame">

<?php include 'module/menu.php'; ?>
<script>
	function Search_event() {
		//$("#user_gender").value = $("#user_gender_select").value;
		//alert($("#user_gender_select").val());
		//alert($("#user_gender_select").val() );
		document.new_event.submit();
	}
	
	
</script>
<div class="body_content">


<div style="padding-left:10px;padding-right:10px">
	<p> <b> Search Events: </b></p>
	<form class="ui form" name="new_event" action="SearchEvent" method="post">

	<div class="field">
		<input type="text" name="search_name" id="search_name" placeholder="Search Name">
	  <div class="ui submit button" onclick="Search_event()">Search</div>
	  </div>
	  </form>
	  
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
			echo '<td><div class="ui quit button" onclick="goto(\'/Event/View/'.$event['event_id'].'\')">Detail/Join</div></td>';
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
</div>
</body>

</html>