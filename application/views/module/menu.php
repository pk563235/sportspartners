
<script>
	function goto_profile()
	{
		$.post( "Home/Profile", function( data ) {

		}, "json");
	}
</script>
<div class="ui green inverted  menu">
  <a class="active item" onclick="goto('/')">
    <i class="home icon"></i> Home
  </a>
 
  <a class="item" onclick="goto('/Event/HotEvent')">
    <i class="rss icon"></i> Updated Events
  </a>
  
  <a class="item" onclick="goto('/Profile/ViewProfile')">
    <i class="user icon"></i> Profile
  </a>
 
  <a class="ui dropdown item">
    <i class="icon star" onclick="goto('/Event')"></i> Events <i class="dropdown icon"></i>
    <div class="menu">
  	
  	<div class="item" onclick="goto('/Event/Add')"><i class="plus icon"></i>Create New Event</div>
	<div class="item" onclick="goto('/Event/MyEvent')"><i class="calendar icon"></i>My Event</div>
	<div class="item" onclick="goto('/Event/SearchEvent')"><i class="search icon"></i>Search Event</div>
    </div>
  </a>
  
  <div class="right menu">
	<img src='<?php echo $this->session->userdata('user_photo').'?type=square'; ?>' width='30' height='30'>
	<a class="item" onclick="goto('/Home/Logout')">
		<i class='user icon'></i>Logout
	</a>
  </div>
  <script>
    $('.ui.dropdown.item').dropdown({on: 'hover'});

  </script>
  
</div>

