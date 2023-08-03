<?php
// require once C:\xampp\htdocs\todolist\config\db.php
require_once '../../config/db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

class DeleteTask
{
	private $task;

	public function __construct()
	{
		$this->task = new Task();
	}

	public function delete($id)
	{
		$this->task->delete($id);
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['task_id'])) {
		$deleteTask = new DeleteTask();
		$deleteTask->delete($_POST['task_id']);
		echo json_encode(["status" => "success"]);
	} else {
		echo json_encode(["status" => "error", "message" => "task_id not set"]);
	}
} else {
	echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
