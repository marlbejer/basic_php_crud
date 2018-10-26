<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CRUD Operation</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<link rel="stylesheet" href="assets/index.css">
	</head>
	<body>
		<div class="container">
			<h1>PHP and MySQL CRUD</h1>
			<h2>with JavaScript | jQuery</h2>
			<h3>HTML and CSS</h3>

			<div class="card">
				<div class="card-header">
					<h3>Employees</h3>
					<!-- <span class="close">&times;</span> -->
				</div>
					
				<div class="card-body">
					<label class="text text-success"></label>
					<table>
						<tr>
							<td hidden><input type="text" name="id" class="form-control"></td>
							<td><input type="text" name="name" class="form-control" placeholder="Full Name"></td>
							<td><input type="text" name="position" class="form-control" placeholder="Position"></td>
							<td>
								<input type="button" id="add" class="btn btn-primary" value="Submit">
							</td>
						</tr>
					</table>
					<table id="tblList" class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Full Name</th>
								<th>Position</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>		

		<script src="assets/jquery-3.3.1.min.js"></script>
		<script src="assets/index.js"></script>
	</body>
</html>