<!DOCTYPE html>
<html>
<head>
<?php include 'module/head_import.php'; ?>	
</head>
<body>

<div class="body_frame">

<?php include 'module/menu.php'; ?>

<div class="body_content">


<p> <b> Events you joined: </b></p>

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
    <tr>
      <td>Sunday Football la!</td>
      <td>September 14, 2013</td>
      <td>3PM</td>
      <td>Football</td>
	  <td>Lok Fu</td>
	  <td>20 / 20 </td>
	  <td onclick="goto('profile_view')" > <i class="user icon"></i><u>David Beckham </u></td>
	  <td class="ui quit button"><a href="#">Quit</a></td>

    </tr>

</table>

<p><b>  Events you created:</b> </p>
<table class="ui table">
  </tbody>
    <thead>
    <tr>
      <th>Event Name</th>
      <th> Date</th>
      <th>Time</th>
      <th>Category</th>
	  <th>Location</th>
	  <th>No. of joiner</th>
	  <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Weekly Tennis</td>
      <td>September 15, 2013</td>
      <td>4PM</td>
      <td>Tennis</td>
	  <td>Shek Kip Mei Park</td>
	  <td>4 / 4 </td>
	  <td class="ui submit button" onclick="goto('event_edit')">Check</td>

    </tr>
  </tbody>
</table>

</div>
</div>
</body>

</html>