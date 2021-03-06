<?php
require_once './db.php';
require_once './common.php';

session_start();
if (isset($_SESSION['is_new_user'])) {
    $is_new_user = $_SESSION['is_new_user'];
    check_new_user($is_new_user);
}

if (isset($_POST['username']) && $_POST['password']) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user_data = login($username, $password);
    print_r($user_data);
    if (isset($user_data['IS_LOCKED']) && $user_data['IS_LOCKED'] === 0) {
        echo "Tài khoản đã bị khóa do nhập sai mật khẩu nhiều lần, vui lòng liên hệ quản trị viên để được hỗ trợ";
    } else if ($user_data['code'] === 0) {
        $is_new_user = $user_data['data']['IS_NEW_USER'];
        unset($_SESSION['user_id']);
        unset($_SESSION['is_new_user']);
        $_SESSION['user_id'] = $user_data['data']['USER_ID'];
        $_SESSION['is_new_user'] = $user_data['data']['IS_NEW_USER'];
        if ($is_new_user === 0) {
            header('Location: change_password_first_time.php');
        }
    } else if ($user_data['code'] === 1) {
        echo $user_data['error'];
    }
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
      <form class="col-4" action="login.php" method="POST">
        <h1>Đăng nhập:</h1>
        <div class="form-group">
          <label for="username">Tên đăng nhập: </label>
          <input
            id="username"
            class="form-control"
            placeholder="Tên đăng nhập"
            type="text"
            name="username"
          />
        </div>
        <div class="form-group">
          <label for="username">Mật khẩu: </label>
          <input
            id="password"
            class="form-control"
            placeholder="Mật khẩu"
            type="password"
            name="password"
          />
        </div>
        <button type="submit" class="btn btn-success btn-block mb-3">
          Đăng nhập
        </button>
        <div class="text-right"><a href="./forgot_password.php">For got password</a></div>
      </form>
    </div>
  </body>
</html>
