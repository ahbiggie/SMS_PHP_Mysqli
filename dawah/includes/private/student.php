<?php

/**
 * Gets the student record based on the ID
 *
 * 
 *
 * @param object $conn connection to the database
 * @param integer $id the student ID
 * @param string $column optional list of column for the select, defaults to *
 * 
 * 
 * @return mixed an Associative array containing the student with that ID, or null if not found 
 *
 **/
function getStudent($conn, $id, $columns = '*')
{
    $sql = "SELECT $columns FROM student WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt == false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }
}


/**
 * Process User input
 *
 * Validate User inputs for student
 *
 * @param string $firstname firstname, required
 * @param string $middlename middlename, optional
 * @param string $lastname lastname, required
 * @param string $gender gender, required
 * @param string $state state, required
 * @param string $class class, required
 * @param string $category category, required
 * @param string $section section, required
 * @param string $dob dob, required
 * @param string $password password, required
 * 
 * @return array
 * 
 * 
 */
function validateStudent($firstname, $middlename, $lastname, $gender, $state, $class, $category, $section, $dob, $password)
{
    $errors = [];
    if ($firstname == '') {
        $errors[] = 'Firstname cannot be empty';
    } else if(!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
        $errors[] = 'Only letters \' and white space allowed';
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/",$middlename)) {
        $error = 'Only letters \' and white space allowed';
        } 

        if ($lastname == '') {
            $errors[] = 'Lastname cannot be empty';
        } else if(!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
            $errors[] = 'Only letters \' and white space allowed';
        }

        if ($gender == '') {
            $errors[] = 'Gender is required';
        }

        if ($state == '') {
            $errors[] = 'Choose state of origin';
        }

        if ($class == '') {
            $errors[] = 'Class is required';
        }
        
        if ($category == '') {
            $errors[] = 'Category is required';
        }
        
        if ($section == '') {
            $errors[] = 'Session is required';
        }
        
        if ($dob == '') {
            $errors[] = 'Date is required';
        }
        if ($password == '') {
            $errors[] = 'Password is required';
        } else if ($_POST['password'] !== $_POST['password2'])
        {
          $errors[] = "Passwords do not match";
        } else if(strlen($_POST['password']) < 8)
            {
                $error[] = "Password must be at least 8 characters";
            }
        return $errors;

}
function createRegNumber()
{

    $schname = "DFA";
    $month = date("m");
    $year = date("Y");
    $new_year = substr($year, 2, 2);

    $base_year = 2019; // Set a base when the intakes started

    $intake = intval($year) - $base_year; // This will increase for every year

    $increase_with = $intake++;

    if ($month == '3') {
        $intake += $increase_with;
    } else if ($month == '9') {
        $increase_with++;
        $intake += $increase_with;
    }
    $reg_no = $schname . "/" . $_POST['category'] . "/" . $new_year . "/" . rand(1000, 9999);
    return $reg_no;
}

