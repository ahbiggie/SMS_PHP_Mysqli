<?php
// including DB connection and functions
require 'private/autoload.php';
require 'private/student.php';


$firstname = "";
$middlename = "";
$lastname = "";
$dob = "";



if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $firstname = trim($_POST["firstname"]);
  $middlename = trim($_POST["middlename"]);
  $lastname = trim($_POST["lastname"]);
  $gender = $_POST["gender"];
  $state = $_POST['state'];
  $class =  $_POST['class'];
  $category = $_POST['category'];
  $section = $_POST['section'];
  $dob = $_POST['dob'];
  $password = $_POST['password'];
  $date = date("Y-m-d H:i:s");
  $user_id = get_random_string(60);
  $reg_no = createRegNumber();

  $errors = validateStudent($firstname, $middlename, $lastname, $gender, $state, $class, $category, $section, $dob, $password);

  if (empty($errors)) {

    $conn = getDB();

    $sql = "INSERT INTO student (firstname,middlename,lastname,gender,state,class,category,section,dob,password,reg_no,user_id,date)
               VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt == false) {
      echo mysqli_error($conn);
        }
      mysqli_stmt_bind_param($stmt, "sssssssssssss", $firstname, $middlename, $lastname, $gender, $state, $class, $category, $section, $dob, $password,$reg_no, $user_id, $date);
        if (mysqli_stmt_execute($stmt)) {

          $id = mysqli_insert_id($conn);

                redirect("localhost/dawah/addParent.php");
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
            <h4 class="text-blue h4">Add New Student</h4>
            <p class="mb-30">Enter Correct Student Details to Register</p>
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

          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="firstname">Firstname:</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="Firstname" id="firstname" name="firstname" value="<?= htmlspecialchars($firstname); ?>" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="middlename">Middlename:</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="(Optional)" id="middlename" name="middlename" value="<?= htmlspecialchars($middlename); ?>" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="lastname">Lastname:</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="Lastname" id="lastname" name="lastname" value="<?= htmlspecialchars($lastname); ?>" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="gender">Gender</label>
            <div class="col-sm-12 col-md-10">
              <select id="gender" name="gender" class="custom-select col-12">
                <option selected="">Choose...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="state">State</label>
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

          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="class">Class</label>
            <div class="col-sm-12 col-md-10">
              <select id="class" class="custom-select col-12" name="class">
                <option selected value="">Choose...</option>
                <option value="1">class one</option>
                <option value="2">class two</option>
                <option value="3">class three</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="category">Category</label>
            <div class="col-sm-12 col-md-10">
              <select id="category" class="custom-select col-12" name="category">
                <option selected="" value="">Choose...</option>
                <option value="JSS">Junior Secondary</option>
                <option value="SSS">Senior Secondary</option>
                <option value="BAS">Basic</option>
                <option value="PBAS">Pre Basic</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="section">Session</label>
            <div class="col-sm-12 col-md-10">
              <select id="section" class="custom-select col-12" name="section">
                <option selected="" value="">Choose...</option>
                <option value="2021/2022">2021/2022</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="dob">Date of Birth</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control date-picker" placeholder="Select Date" type="text" value="<?= htmlspecialchars($dob); ?>" name="dob" id="dob">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="password">Password</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="password" id="password" name="password" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="password2">Confirm Password</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="password" id="password2" name="password2" />
            </div>
          </div>

          <button class="pull-right btn btn-success btn-sm"><i class="fa fa-save"></i> Save</button>
          <button class="pull-left btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancel</button>
        </form>
      </div>
    </div>
  </div>

  <?php require 'includes/footer.inc.php'; ?>
