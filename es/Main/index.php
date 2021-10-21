<?php
 require '../../Seguridad.php';
?>
<?php if (!empty($user)): ?>
<?php else: ?>

<!DOCTYPE html><!--html sino ha iniciado sesion-->
<html>
<body>
	<script>
		setTimeout(alertFunc, 1000);
		function alertFunc() {
		  location.replace("../login");
		}
	</script>
</body>
</html>

<?php endif; ?>