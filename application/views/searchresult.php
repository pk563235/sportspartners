<!doctype html>
<html>
<head>
<?php include 'module/head_import.php'; ?>	
</head>

<body>

<div class="body_frame">

<?php include 'module/menu.php'; ?>


<p>  Please check below updated evnets! Click the link of the evnet to join!</p>

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
	  <th>Join?</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Sunday Football la!</td>
      <td>September 14, 2013</td>
      <td>3PM</td>
      <td>Football</td>
	  <td>Lok Fu</td>
	  <td onclick="goto('profile_view')" > <i class="user icon"></i><u>David Beckham </u></td>
	  <td class="ui submit button"><a href="#" >Join</a></td>

    </tr>
  </tbody>
</table>

</div>

</div>

</body>

</html>