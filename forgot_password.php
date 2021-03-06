<?php
require_once './db.php';
require_once './common.php';
session_start();

if (isset($_SESSION['is_new_user'])) {
    $is_new_user = $_SESSION['is_new_user'];
    check_new_user($is_new_user);
}

if (isset($_POST['email_phone_number']) && $_POST['email_phone_number'] !== '') {
    $email_phone_number = $_POST['email_phone_number'];
    if (check_email_phone_number($email_phone_number)['code'] === 0) {
        header('Location: reset_password.php');
    }
}

if (isset($_POST['otp']) && $_POST['otp'] === $otp) {
    header('Location: change_password_first_time.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./register.css" />
  </head>
  <body>
    <?php include './navbar.php'?>
    <div class="d-flex justify-content-center align-items-center">
      <form class="col-4" action="forgot_password.php" method="POST">
        <h1>Quên mật khẩu:</h1>
        <div class="form-group">
          <label for="otp">Số điện thoại/ email:</label>
          <input
            id="email_phone_number"
            class="form-control"
            placeholder="Số điện thoại/ email"
            type="text"
            name="email_phone_number"
          />
        </div>
        <button type="submit" class="btn btn-success btn-block mb-3">
			Xác nhận
        </button>
      </form>
    </div>
  </body>
</html>

