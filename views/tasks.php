<?php

require_once '../assets/php/delete_task.php';

$task = new Task();

?>

<main class="lista-tareas mt-4">
	<div class="table table-striped table-hover table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Título</th>
					<th scope="col">Descripción</th>
					<th scope="col">Estado</th>
					<th scope="col">Acciones</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($task->read() as $tarea) : ?>
					<tr>
						<td><?php echo $tarea->titulo; ?></td>
						<td><?php echo $tarea->descripcion; ?></td>
						<td><?php echo $tarea->estado; ?></td>
						<td>
							<button type="button" class="btn btn-primary">Editar</button>
							<button type="button" class="btn btn-danger delete-task" data-task-id="<?php echo $tarea->id; ?>">Borrar</button>
						</td>
						<td>
							<button type="button" class="btn btn-success">Completar tarea</button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</main>