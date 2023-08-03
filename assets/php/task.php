<?php

echo "Script executed!";

require_once __DIR__ . '/../../config/db.php';

$redirectUrl =  'http://localhost/todolist/index.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['title']) && isset($_POST['description'])) {
		$task = new Task();
		$title = $_POST['title'];
		$description = $_POST['description'];
		$task->create($title, $description);
		// Optionally, you can redirect the user to a success page after creating the task.
		header('Location: ' . $redirectUrl);
		exit; // Always exit after redirecting to prevent further execution.
	} else {
		// Handle the case when title and description are not set.
		echo "Title and description are required.";
	}
}


class Task
{

	private $db;

	public function __construct()
	{
		$this->db = Database::connect();

		if ($this->db->connect_error) {
			die("Database connection failed: " . $this->db->connect_error);
		}
	}

	// READ - GET ALL TASKS
	// La función "read" seleccionará todas las filas de tu tabla "Tareas".
	public function read()
	{
		$sql = "SELECT * FROM tareas";
		$result = $this->db->query($sql);

		$tasks = [];
		while ($task = $result->fetch_object()) {
			$tasks[] = $task;
		}

		return $tasks;
	}

	// CREATE
	// La función "create" insertará una nueva fila en tu tabla "Tareas". 
	// La columna "estado" se establecerá automáticamente en "pendiente" ya que eso es lo que estableciste como valor predeterminado en tu estructura de tabla.
	public function create($title, $description)
	{
		$sql = "INSERT INTO tareas(titulo, descripcion, estado) VALUES('$title', '$description', 'pendiente')";
		$task = $this->db->query($sql);
		return $task;
	}


	// UPDATE
	// La función "update" actualizará una fila existente en tu tabla "Tareas", identificada por el parámetro "id".
	public function update($id, $title, $description, $state)
	{
		$sql = "UPDATE tareas SET titulo='$title', descripcion='$description', estado='$state' WHERE id=$id";
		$task = $this->db->query($sql);
		return $task;
	}

	// DELETE
	// La función "delete" eliminará una fila existente en tu tabla "Tareas", identificada por el parámetro "id".
	public function delete($id)
	{
		$sql = "DELETE FROM tareas WHERE id=$id";
		$task = $this->db->query($sql);
		return $task;
	}
}
