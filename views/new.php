<!doctype html>
<html lang="en">

<head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.2.1 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './header.php';
require_once './new.php';
require_once './footer.php';
?>

<body>
	<div class="container mt-4">
		<form id="create-task-form" action="../assets/php/task.php" method="post">
			<div class="mb-3">
				<label for="title" class="form-label">Título</label>
				<input type="text" class="form-control" id="title" name="title">
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Descripción</label>
				<textarea class="form-control" id="description" name="description" rows="3"></textarea>
			</div>
			<div class="mb-3">
				<select class="form-select" aria-label="estado" name="estado">
					<option selected>Pendiente</option>
					<option value="1">Completada</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Añadir tarea</button>
		</form>
	</div>
	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
	</script>
</body>

</html>