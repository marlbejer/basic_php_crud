<?php 	
	include 'employees.php';

	//DeleteEmployee(20);
	EditEmployee(7);

	function EditEmployee($id) {
		$dns = 'mysql:host=localhost:3306;dbname=company';
		$username = 'user';
		$password = '';
		$options = [];
		$conn = new PDO($dns, $username, $password, $options);
		$sql = 'SELECT * FROM employees WHERE id = :id;';
		try {
			$stmt = $conn->prepare($sql);
			$stmt->execute([':id' => $id]);
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'employees');
			//var_dump($result); 
			return $result;

		} catch(Exception $e) {
			return $e->getMessage();
			die();
		}
		$conn = null;
	}

	function DeleteEmployee($id) {
		$dns = 'mysql:host=localhost:3306;dbname=company';
		$username = 'user';
		$password = '';
		$options = [];
		$conn = new PDO($dns, $username, $password, $options);
		$sql = 'DELETE FROM employees WHERE id = :id;';
		try {
			$stmt = $conn->prepare($sql);
			$stmt->execute([':id' => $id]);
			return "Entry has been deleted.";

		} catch(Exception $e) {
			return $e->getMessage();
			die();
		}
		$conn = null;
	}

	function AddEmployee($fullname, $position, $id) {
		$dns = 'mysql:host=localhost;dbname=company';
		$username = 'user';
		$password = '';
		$options = [];
		$conn = new PDO($dns, $username, $password, $options);

		//$sql = 'INSERT INTO employees(fullname, position) VALUES(:fullname, :position);' : 
				//'UPDATE employees SET fullname=:fullname, position=:position WHERE id=:id;';
		try {
			if($id == null) {
				$sql = 'INSERT INTO employees(fullname, position) VALUES(:fullname, :position);';
				$stmt = $conn->prepare($sql);
				$stmt->execute([':fullname' => $fullname, ':position' => $position]);
				return "Entry has been saved.";
			}
			else {
				$sql = 'UPDATE employees SET fullname=:fullname, position=:position WHERE id=:id;';
				$stmt = $conn->prepare($sql);
				$stmt->execute([':fullname' => $fullname, ':position' => $position, ':id' => $id]);
				return "Entry has been updated.";
			}
			

		} catch(Exception $e) {
			return $e->getMessage();
			die();
		}
		$conn = null;
	}

	function GetEmployees() {
		$data = array();
		$dns = 'mysql:host=localhost:3306;dbname=company';
		$username = 'user';
		$password = '';
		$options = [];
		$conn = new PDO($dns, $username, $password, $options);
		$sql = 'SELECT * FROM employees;';
		try {
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'employees');
			return $result;

		} catch(Exception $e) {
			return $e->getMessage();
			die();
		}
		$conn = null;
	}

?>