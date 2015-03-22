<title><?php echo "$title"?></title>

<meta charset="utf-8">
<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
<meta name="description" content="Sports Partners">
<meta name="keywords" content="" />
<meta name="author" content="Brian Wong">
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="stylesheet" type="text/css" href="<?php echo "$base$css"?>" />
<link rel="stylesheet" type="text/css" href="<?php echo "$base$css_semantic"?>" />

<script type="text/javascript" src="<?php echo "$base$js"?>"></script>
<script type="text/javascript" src="<?php echo "$base$jquery"?>"></script>
<script type="text/javascript" src="<?php echo "$base$js_semantic"?>"></script>

<?php

function br2nl ( $string ){
	return preg_replace('/<br\\s*?\/??>/i','',$string);
}

?>

