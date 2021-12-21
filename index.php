<?php 
include "db.php";

if(isset($_POST['submit'])) {
	
$nameError = "";
$lastnameError = "";
$phoneError = "";

if(isset($_POST['name']) && (preg_match("/^[a-zA-ZА-Яа-яЁё-]{2,150}/", $_POST['name']))) {
	$name = $_POST['name'];
} else {
    $nameError = "Имя - значение обязательно для заполнения,  должно быть больше 2ух символов, может содержать буквы и тире, максимальная длина 150 символов";
}
if(isset($_POST['lastname']) && (preg_match("/^[a-zA-ZА-Яа-яЁё-]{2,150}/", $_POST['lastname']))) {
	$lastname = $_POST['lastname'];
} else {
    $lastnameError = "Фамилия - значение  обязательно для заполнения, должно быть больше 2ух символов, может содержать буквы и тире, максимальная длина 150 символов";
}
if(isset($_POST['phone']) && (preg_match("/^[0-9]{10,}/", $_POST['phone']))) {
	$phone = $_POST['phone'];
} else {
    $phoneError = "Мобильный телефон - значение обязательно для заполнения, должно быть больше или равно 10 символам, должно состоять только из цифр";
}

if(isset($_POST['comment'])) {
	$comment = $_POST['comment'];
}

	if (empty($nameError) && empty($lastnameError) && empty($phoneError)) {
		$namelastname = $lastname . " " . $name;
		$datetime = date('Y-m-d H:i:s');
		$insert = mysqli_query($db, "INSERT INTO `test` (`datetime`, `namelastname`, `phone`, `comment`) VALUES ('$datetime', '$namelastname', '$phone', '$comment')") or die(mysqli_error($db));
		echo '<meta http-equiv="refresh" content="0;url=/">';
	}
}
?>
<!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="/style.css">
		<title>Hello, world!</title>
	</head>
	<body>
		<section class="mb-4">
			<div class="row">
				<div class="col-md-9 mb-md-0 mb-5">
					<form id="addClient" name="addClient" action="index.php" method="POST">
						<div class="row">
							<div class="col-md-12">
								<div class="md-form mb-0">
									<?php if(!empty($nameError)) { echo "<ul><li color=red> $nameError </li></ul>"; } ?>
									<input type="text" id="name" name="name" class="form-control" value="" placeholder="Имя" pattern="^[a-zA-ZА-Яа-яЁё-]{2,150}" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="md-form mb-0">
									<?php if(!empty($lastnameError)) { echo "<ul><li color=red> $lastnameError </li></ul>"; } ?>
									<input type="text" id="lastname" name="lastname" class="form-control" value="" placeholder="Фамилия" pattern="^[a-zA-ZА-Яа-яЁё-]{2,150}" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="md-form mb-0">
									<?php if(!empty($phoneError)) { echo "<ul><li color=red> $phoneError </li></ul>"; } ?>
									<input type="tel" id="phone" name="phone" class="form-control" value="" placeholder="Мобильный телефон" pattern="^[0-9]{10,}" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="md-form">
									<textarea type="text" id="comment" name="comment" class="form-control md-textarea" placeholder="Комментарий"></textarea>
								</div>
							</div>
						</div>
						<div class="text-center text-md-left">
							<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Отправить" />
						</div>
					</form>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Фамилия Имя</th>
								<th scope="col">Телефон</th>
								<th scope="col">Комментарий</th>
							</tr>
						</thead>
						<tbody>
							<?php $res = mysqli_query($db, "SELECT * FROM test ORDER BY namelastname ASC");
								while($row = mysqli_fetch_array($res)) { ?>
							<tr>
								<td><?php echo $row["id"]; ?></td>
								<td><?php echo $row["namelastname"]; ?></td>
								<td><?php echo $row["phone"]; ?></td>
								<?php if(!empty($row["comment"])) { ?>
								<td><?php echo $row["comment"]; ?></td>
								<? } ?>
								<?php }} ?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</body>
</html>