<?php
require_once "./db.php";
require_once "./common.php";

session_start();
print_r($_SESSION);
if (isset($_SESSION['is_new_user'])) {
    $is_new_user = $_SESSION['is_new_user'];
    check_new_user($is_new_user);
}
if (isset($_POST['email']) && isset($_POST['phone_number']) && isset($_POST['full_name']) && isset($_POST['date_of_birth']) && isset($_POST['address'])) {
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $full_name = $_POST['full_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];

    $username_password = register($phone_number, $email, $full_name, $date_of_birth, $address);
    print_r($username_password);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="" />
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
    <?php include_once './navbar.php'?>
    <div class="d-flex justify-content-center align-items-center">
      <form class="col-md-4" method="POST" action="register.php">
        <h1>????ng k?? t??i kho???n</h1>
        <div class="form-group">
          <label for="phone_number">S??? ??i???n tho???i: </label>
          <input
            id="phone_number"
            class="form-control"
            placeholder="S??? ??i???n tho???i"
            type="text"
            name="phone_number"
          />
        </div>
        <div class="form-group">
          <label for="email">Email: </label>
          <input
            id="email"
            class="form-control"
            type="email"
            placeholder="Email"
            name="email"
          />
        </div>
        <div class="form-group">
          <label for="lastname">H???: </label>
          <input
            type="text"
            id="full_name"
            placeholder="H??? v?? t??n"
            class="form-control"
            name="full_name"
          />
        </div>
        <div class="form-group">
          <label for="date_of_birth">Ng??y/th??ng/n??m sinh: </label>
          <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
        </div>
        <div class="form-group">
          <label for="address">?????a ch???: </label>
          <input type="text" class="form-control" id="address" placeholder="S??? nh??,t??n ???????ng,...." name="address">
        </div>
        <div class="form-group">
          <label for="frontsideimg">???nh m???t tr?????c CMND: </label>
          <input
            type="file"
            accept="image/*"
            name="frontsideimg"
            id="frontsideimg"
          />
        </div>
        <div class="form-group">
          <label for="backsideimg">???nh m???t sau CMND: </label>
          <input
            type="file"
            accept="image/*"
            name="backsideimg"
            id="backsideimg"
          />
        </div>
        <button type="submit" class="btn btn-success btn-block">????ng k??</button>
      </form>
    </div>
    <?php
if (isset($username_password) && $username_password['code'] === 0) {
    echo '<a href="login.php"><button class="btn btn-success">Chuy???n ?????n trang ????ng nh???p</button></a>';
}
?>
  </body>
</html>
