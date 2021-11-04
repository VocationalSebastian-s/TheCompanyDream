<?php
 require '../../../server/secure/seguridad.php';
?>
<?php if (!empty($user)): ?>
<!DOCTYPE html>
<html>
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