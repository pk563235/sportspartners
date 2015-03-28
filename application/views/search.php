<!doctype html>
<html>
<head>
<?php include 'module/head_import.php'; ?>	
</head>

<body>

<div class="body_frame">

<?php include 'module/menu.php'; ?>

<form class="ui form">
  <h4 class="ui dividing header">Search Event</h4>
  
  <div class="two fields">
    <div class="field">
      <label>Category</label>
      <select class="ui search dropdown">
        <option value="">Sports</option>
      </select>
    </div>
	
    <div class="field">
	<label>Event Date</label>
	<input type="text" name="date" placeholder="Event Date"></div>
  </div>
<br>
  <div class="ui submit button">Search</div>
  <input type="reset" name="cleared" value="Clear" class="ui submit button"/>
  </form>
  
</div>
  
</body>

</html>