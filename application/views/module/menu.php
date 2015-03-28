
<script>
	function goto_profile()
	{
		$.post( "Home/Profile", function( data ) {

		}, "json");
	}
</script>
<div class="ui green inverted  menu">
  <a class="active item" onclick="goto('index')">
    <i class="home icon"></i> Home
  </a>
 
  <a class="item" onclick="goto('news')">
    <i class="rss icon"></i> Updated Events
  </a>
  
  <a class="item" onclick="goto('Home/Profile')">
    <i class="user icon"></i> Profile
  </a>
 
  <a class="ui dropdown item">
    <i class="icon star"></i> Events <i class="dropdown icon"></i>
    <div class="menu">
  	
  	<div class="item" onclick="goto('newevent')"><i class="plus icon"></i>Create New Event</div>
	<div class="item" onclick="goto('myevent')"><i class="calendar icon"></i>My Event</div>
	<div class="item" onclick="goto('search')"><i class="search icon"></i>Search Event</div>
    </div>
  </a>
  
  
  <div class="right menu">
  

	
	<?php


	echo "<a class='item' href='".$base."user/logout'>";
    echo "<i class='user icon'></i> Logout";
	echo "</a>";
	
	?>

	
  </div>
  <script>
    $('.ui.dropdown.item').dropdown({on: 'hover'});

  </script>
  
</div>

