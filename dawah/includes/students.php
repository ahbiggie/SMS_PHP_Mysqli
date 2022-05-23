<?php
// including DB connection and functions
require 'private/autoload.php';

$conn = getDB();

$sql = "SELECT * FROM student ORDER BY id";

$results = mysqli_query($conn, $sql);
if ($results === false) {
	echo mysqli_error($conn);
} else {
	$students = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
?>

<?php require 'includes/header.inc.php'; ?>
<?php require 'includes/sidebar.inc.php'; ?>

<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Students</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Students</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary" href="addStudent.php" role="button">
									<i class="fa fa-plus"></i> Add New
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Students</h4>
						<p class="mb-0">Registered students</p>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Name</th>
									<th>Gender</th>
									<th>State</th>
									<th>Class</th>
									<th>Reg No</th>
									<th>Added</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if (empty($students)): ?> 
									<tr>
										<td colspan="7" class="text-center"><h4>No Students Found</h4></td>
									</tr>
									<?php else: ?>
										<?php foreach ($students as $student): ?>
								<tr>
									
									<td class="table-plus"><?= htmlspecialchars($student['firstname']); ?>
									 <?= htmlspecialchars($student['middlename']); ?>
									 <?= htmlspecialchars($student['lastname']); ?></td>
									<td><?= htmlspecialchars($student['gender']); ?></td>
									<td><?= htmlspecialchars($student['state']); ?></td>
									<td><?= htmlspecialchars($student['class']); ?></td>
									<td><?= htmlspecialchars($student['reg_no']); ?> </td>
									<td><?= htmlspecialchars($student['date']); ?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
									<?php endforeach; ?>

								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>

<?php require 'includes/footer.inc.php'; ?>