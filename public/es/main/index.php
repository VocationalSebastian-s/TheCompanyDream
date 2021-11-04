<?php
	echo $_SERVER['DOCUMENT_ROOT'];
	require '../../../server/secure/seguridad.php';
	require '../../../server/connection/conexion.php';
?>
<?php if (!empty($user)): ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../assets/components/main/src/js/bootstrap.min.css">
		<!----css3---->
		<link rel="stylesheet" href="../assets/components/main/src/css/custom.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

		<!--google material icon-->
		<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		<?php include('../../assets/components/main/index.html') ?>
	</body>
</html>
<?php else: ?>

<!DOCTYPE html><!--html sino ha iniciado sesion-->
<html>
<body>
	<script>
		setTimeout(alertFunc, 1000);
		function alertFunc() {
		  location.replace("../Login");
		}
	</script>
</body>
</html>

<?php endif; ?>