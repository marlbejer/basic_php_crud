
 <?php 
	include 'repository.php';

	if(isset($_POST['action'])) {
		$action = $_POST['action'];
		$id = $_POST['id'];
		$fullname = $_POST['fullname'];
		$position = $_POST['position'];
		
		//echo json_encode(GetEmployees());

		switch ($action) {
			case 'add':
				echo json_encode(AddEmployee($fullname, $position, $id));
				break;
			case 'getall':
				echo json_encode(GetEmployees());
				break;
			case 'delete':
				echo json_encode(DeleteEmployee($id));
				break;
			case 'edit':
				echo json_encode(EditEmployee($id));
				break;
			default:
				# code...
				break;
		}
	}

 ?>