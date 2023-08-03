document.getElementById('newTaskForm').addEventListener('submit', function (event) {
	event.preventDefault();
	var title = document.getElementById('taskTitle').value;
	var description = document.getElementById('taskDescription').value;
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'addTask.php', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send('title=' + title + '&description=' + description);
});

function loadTasks () {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'getTasks.php', true);
	xhr.onload = function () {
		if (this.status == 200) {
			var tasks = JSON.parse(this.responseText);
			var output = '';
			for (var i in tasks) {
				output += '<tr>' +
					'<td>' + tasks[ i ].title + '</td>' +
					'<td>' + tasks[ i ].description + '</td>' +
					// Agrega los botones de eliminar y marcar como completado aquí
					'</tr>';
			}
			document.getElementById('taskTable').innerHTML = output;
		}
	};
	xhr.send();
}

// delete task
$(document).ready(function () {
	$('.delete-task').click(function () {
		var taskId = $(this).data('task-id');

		$.ajax({
			url: 'assets/php/delete_task.php',
			type: 'POST',
			data: {
				task_id: taskId
			},
			success: function (response) {
				console.log(response);
				var json = JSON.parse(response);
				if (json.status === 'success') {
					alert('Tarea eliminada con éxito');
				} else {
					alert('Hubo un error al eliminar la tarea: ' + json.message);
				}
			},
			error: function (err) {
				alert('Hubo un error al enviar la solicitud');
				console.log(err);
			}
		});
	});
});

/* $(document).ready(function () {
	$('.delete-task').click(function () {
		var taskId = $(this).data('task-id');

		$.ajax({
			url: 'assets/php/delete_task.php',
			type: 'POST',
			data: {
				task_id: taskId
			},
			success: function (response) {
				var json = JSON.parse(response);
				if (json.status === 'success') {
					alert('Tarea eliminada con éxito');
				} else {
					alert('Hubo un error al eliminar la tarea');
				}
			},
			error: function () {
				alert('Hubo un error al enviar la solicitud');
			}
		});
	});
});
 */
