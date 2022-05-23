<?php
// including DB connection and functions
require 'private/autoload.php';
require 'private/parent.php';


$title = "";
$firstname = "";
$lastname = "";
$email = "";
$occupation = "";
$address = "";
$phone = "";



if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $title = trim($_POST['title']);
  $firstname = trim($_POST['firstname']);
  $lastname = trim($_POST['lastname']);
  $email = trim($_POST['email']);
  $occupation = trim($_POST['occupation']);
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $state = $_POST['state'];
  $wards = $_POST['wards'];
  $password = $_POST['password'];
  $date = date('Y-m-d H:i:s');
  $user_id = get_random_string(60);
  $parent_id = createParentID();

  $errors = validateParent($title, $firstname, $lastname, $email, $occupation, $gender, $address, $phone, $state,$wards, $password);

  if (empty($errors)) {

    $conn = getDB();

    $sql = "INSERT INTO parent (title,firstname,lastname,email,occupation,gender,address,phone,state,wards,password,parent_id,user_id,date)
               VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt == false) {
      echo mysqli_error($conn);
        }
      mysqli_stmt_bind_param($stmt, "ssssssssssssss", $title, $firstname, $lastname, $email, $occupation, $gender, $address, $phone, $state,$wards, $password, $parent_id, $user_id, $date);
      if (mysqli_stmt_execute($stmt)) {

        $id = mysqli_insert_id($conn);

              redirect("localhost/dawah/students.php");
      } else {

        echo mysqli_stmt_error($stmt);
      }

return $errors;
  }
}


?>

<?php require 'includes/header.inc.php'; ?>
<?php require 'includes/sidebar.inc.php'; ?>

<style>
  .error li {
    color: red;
    font-weight: 200;
    text-align: center;
    font-size: x-small;
  }
</style>

<div class="main-container">
  <div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">

      <!-- Default Basic Forms Start -->
      <div class="pd-20 card-box mb-30">
        <div class="clearfix">
          <div class="pull-left">
            <h4 class="text-blue h4">Parent Details</h4>
            <p class="mb-30">Enter Correct Parent Details to Register</p>
          </div>

        </div>
        <form method="post">

          <div class="error">

            <?php if (!empty($errors)) : ?>
              <ul> <?php foreach ($errors as $error) : ?> <li>
                    <?= $error ?>
                  </li>
                <?php endforeach ?>
              </ul>
            <?php endif ?>
          </div>
          <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Mr,Mrs,Dr, etc...">
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                  <label for="parent-firstname">Firstname</label>
                  <input class="form-control" type="text" placeholder="Firstname" id="firstname" name="firstname" value="<?= htmlspecialchars($firstname); ?>" />
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                  <label for="parent-lastname">Lastname</label>
                  <input class="form-control" type="text" placeholder="Lastname" id="lastname" name="lastname" value="<?= htmlspecialchars($lastname); ?>" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="example@email.com">
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label>Occupation</label>
                    <input class="form-control" type="text" placeholder="Occupation" id="occupation" name="occupation" value="<?= htmlspecialchars($occupation); ?>" />
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label class="col-sm-12 col-md-4 col-form-label" for="gender">Gender</label>
                    <div class="col-sm-12 col-md-10">
                      <select id="gender" name="gender" class="custom-select col-12">
                        <option value="">Select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>


                  <div class="row">
                    <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="address" class="form-control" name="address" id="address" placeholder="123 DFA avenue" value="<?= htmlspecialchars($address); ?>">
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                      <label for="phone">Phone</label>
                      <input class="form-control" type="tel" placeholder="081-2344-6543" id="phone" name="phone" value="<?= htmlspecialchars($phone); ?>" />
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                        <label class="col-sm-12 col-md-4 col-form-label" for="state">State</label>
                        <div class="col-sm-12 col-md-10">
                          <select id="state" name="state" class="custom-select col-12">
                            <option value="">--</option>
                            <option value="Abia">Abia</option>
                            <option value="Adamawa">Adamawa</option>
                            <option value="Akwa_Ibom">Akwa Ibom</option>
                            <option value="Anambra">Anambra</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Benue">Benue</option>
                            <option value="Borno">Borno</option>
                            <option value="Cross_River">Cross River</option>
                            <option value="Delta">Delta</option>
                            <option value="Ebonyi">Ebonyi</option>
                            <option value="Edo" selected>Edo</option>
                            <option value="Ekiti">Ekiti</option>
                            <option value="Enugu">Enugu</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Imo">Imo</option>
                            <option value="Jigawa">Jigawa</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Katsina">Kastina</option>
                            <option value="Kebbi">Kebbi</option>
                            <option value="Kogi">Kogi</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Nasarawa">Nasarawa</option>
                            <option value="Niger">Niger</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Plateau">Plaueau</option>
                            <option value="Rivers">Rivers</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>
                            <option value="Zamfara">Zamfara</option>
                            <option value="FCT_Abuja">FCT</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

              <div class="row">

                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                  <label for="wards">Wards</label>
                  <input class="form-control" type="number" placeholder="No. of students" id="wards" name="wards" value="<?= htmlspecialchars($wards); ?>" />
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" id="password" name="password" />
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input class="form-control" type="password" id="password2" name="password2" />
                  </div>
                </div>

              </div>

          <button class="pull-right btn btn-success btn-lg"><i class="fa fa-save"></i> Save</button>
          <button class="pull-left btn btn-danger btn-lg"><i class="fa fa-ban"></i> Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <?php require 'includes/footer.inc.php'; ?>
