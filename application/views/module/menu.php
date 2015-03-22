
<div class="ui green inverted  menu">
  <a class="active item" onclick="goto('<?php echo "$base"?>')">
    <i class="home icon"></i> 主頁
  </a>
 
  <a class="item" onclick="goto('<?php echo "$base"?>news')">
    <i class="rss icon"></i> New event
  </a>
  
  <a class="item" onclick="goto('<?php echo "$base"?>profile')">
    <i class="user icon"></i> Profile
  </a>
 
  <a class="ui dropdown item">
    <i class="icon star"></i> Event <i class="dropdown icon"></i>
    <div class="menu">
  	
  	<div class="item" onclick="goto('<?php echo "$base"?>')"><i class="heart icon"></i>New event</div>
	<div class="item" onclick="goto('<?php echo "$base"?>')"><i class="map marker icon"></i>婚宴地點</div>
	<div class="item" onclick="goto('<?php echo "$base"?>')"><i class="users icon"></i>兄弟姊妹</div>
    </div>
  </a>
  
  <a class="ui dropdown item">
    <i class="icon star"></i> Event <i class="dropdown icon"></i>
    <div class="menu">
  	<div class="item">
  	  <i class="star icon"></i>婚宴資訊
  	  <div class="menu">
  		<div class="item" onclick="goto('<?php echo "$base"?>wedding/detail')">宴會詳情</div>
  		<div class="item" onclick="goto('<?php echo "$base"?>wedding/intro')">新人介紹</div>
  		<div class="item" onclick="goto('<?php echo "$base"?>wedding/schedule')">婚宴流程</div>
		<div class="item" onclick="goto('<?php echo "$base"?>wedding/info')">酒席分佈</div>
  	  </div>
  	</div>
  	<div class="item" onclick="goto('<?php echo "$base"?>')"><i class="heart icon"></i>football</div>
	<div class="item" onclick="goto('<?php echo "$base"?>')"><i class="map marker icon"></i>婚宴地點</div>
	<div class="item" onclick="goto('<?php echo "$base"?>')"><i class="users icon"></i>兄弟姊妹</div>
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

