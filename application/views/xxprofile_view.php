<!doctype html>
<html>
<head>
<?php include 'module/head_import.php'; ?>
</head>

<body>

<div class="body_frame">

<?php include 'module/menu.php'; ?>

<div class="ui stacked segment content_frame">

<?php foreach ($user_array as $item){

 echo $item['user_name'];

}
echo "<br><br><br>";

echo "user_profile:".$user_profile['user_mobile'];

?>

</div>

</div>

</body>
</html>