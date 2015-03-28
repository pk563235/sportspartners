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
  <h4 class="ui dividing header">New Event</h4>

  
	<div>
    <label>Event Name</label>
	<input type="text" name="eventname" placeholder="Event Name">
		</div>
<br>
<div class="two fields">
	<div class="field">
	 <label>Date</label>
		<input type="text" name="date" placeholder="Date">
    </div>
	<div class="field">
	 <label>Time</label>
		<input type="text" name="time" placeholder="Time">
    </div></div>

	
<br>
	 
	<div class="two fields">

	<div class="field">
	 <label>Deadline Date</label>
		<input type="text" name="deaddate" placeholder="Date">
    </div>
	<div class="field">
	 <label>Deadline Time</label>
		<input type="text" name="deadtime" placeholder="Time">
    </div>
	</div>

	<div class="two fields">
	<div class="field">
	 <label>Location</label>
		<input type="text" name="location" placeholder="Location">
    </div>
	<div class="field">
    </div>
	</div>

	

  <div class="two fields">
    <div class="field">
      <label>Category</label>
      <select class="ui search dropdown">
        <option value="">Sports</option>
      </select>
    </div>
    <div class="field">
	<label>No. of Joiners</label>
	<input type="text" name="numjoiners" placeholder="No. of Joiners"></div>
  </div>
  <div class="field">
    <label>Event Description</label>
    <textarea></textarea>
  </div>
 
 <div class="two fields">
     <div class="field"><label class="field"><b>Joiner List</b></label> </div>
	 
 </div>
  
  
<div class="ui divided list">
  <div class="item">
    <div class="right floated compact ui button">Kick</div>
    <img class="ui avatar image" src="/images/avatar/small/justen.jpg">
    <div class="content">
      <div class="header" onclick="goto('profile_view')" ><i class="user icon"></i>Justen Kitsune</div>
    </div>
  </div>
  <div class="item">
    <div class="right floated compact ui button">Kick</div>
    <img class="ui avatar image" src="/images/avatar/small/joe.jpg">
    <div class="content">
      <div class="header" onclick="goto('profile_view')"><i class="user icon"></i>Joe Henderson</div>
    </div>
  </div>
</div>

<br>
  <div class="ui submit button">Delete Event</div>
  <input type="reset" name="cleared" value="Clear" class="ui submit button"/>
</form>

</div>
</div>

</div>

</body>

</html>