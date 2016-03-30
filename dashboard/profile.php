<?php
include_once 'includes/header.php';
include_once("../inc/connect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['editProfile'])) {
        $errors = array();

        if (!empty($_POST['company'])) {
            $company = $_POST['company'];
        } else {
            $errors[] = "You did not enter company name";
        }

        if (!empty($_POST['fname'])) {
            $fname = $_POST['fname'];
        } else {
            $errors[] = "You did not enter first name";
        }

        if (!empty($_POST['lname'])) {
            $lname = $_POST['lname'];
        } else {
            $errors[] = "You did not enter last name";
        }

        if (!empty($_POST['email'])) {
            $email = $_POST['email'];

        } else {
            $errors[] = "You did not enter email";
        }

        if (isset($_POST['designation'])) {
            if ($_POST['designation'] > 0) {
                $designation = $_POST['designation'];
            } else {
                $designation = null;
            }
        } else {
            $designation = null;
        }

        if (isset($_POST['address1'])) {
            $address1 = $_POST['address1'];
        } else {
            $address1 = null;
        }

        if (isset($_POST['address2'])) {
            $address2 = $_POST['address2'];
        } else {
            $address2 = null;
        }

        if (isset($_POST['telephone1'])) {
            $telephone1 = $_POST['telephone1'];
        } else {
            $telephone1 = null;
        }

        if (isset($_POST['telephone2'])) {
            $telephone2 = $_POST['telephone2'];
        } else {
            $telephone2 = null;
        }

        if (isset($_POST['mobile1'])) {
            $mobile1 = $_POST['mobile1'];
        } else {
            $mobile1 = null;
        }

        if (isset($_POST['mobile2'])) {
            $mobile2 = $_POST['mobile2'];
        } else {
            $mobile2 = null;
        }

        if (isset($_POST['fax1'])) {
            $fax1 = $_POST['fax1'];
        } else {
            $fax1 = null;
        }

        if (isset($_POST['fax2'])) {
            $fax2 = $_POST['fax2'];
        } else {
            $fax2 = null;
        }

        if (isset($_POST['city'])) {
            $city = $_POST['city'];
        } else {
            $city = null;
        }

        if (isset($_POST['zip'])) {
            $zip = $_POST['zip'];
        } else {
            $zip = null;
        }

        if (isset($_POST['email2'])) {
            $email2 = $_POST['email2'];
        } else {
            $email2 = null;
        }

        /**
         * File upload code starts
         */
        $target_dir = "uploads/" . $table . "/avatar/";

        $target_file = mt_rand(1, 1000) . "_" . mt_rand(1001, 9000) . "_" . basename($_FILES["post_image"]["name"]);
        $dest = $target_dir . $target_file;

        $uploadOk = 1;
        if (empty($_FILES["post_image"]["name"])) {
            $image_name = "";
        } else {
            $image_name = $target_file;
        }
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        //check if there is a file
        if ($_FILES['post_image']['size'] != 0) {
            // Check file size
            if ($_FILES["post_image"]["size"] > 5000000) {
                $errors[] = "Sorry, your file is too large.";
                $uploadOk = 0;
            } else // Allow certain file formats
            {
                if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png"
                    && $imageFileType != "gif"
                ) {
                    $errors[] = "Sorry, only jpg, jpeg, png, gif files are allowed.";
                    $uploadOk = 0;
                } else // Check if file already exists
                {
                    if (file_exists($target_file)) {
                        $errors[] = "Sorry, file already exists.";
                        $uploadOk = 0;
                    }
                }
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $errors[] = "Sorry, your file was not uploaded.";

                // if everything is ok, try to upload file
            } else {

                if (!move_uploaded_file($_FILES["post_image"]["tmp_name"], $dest)) {
                    $errors[] = "There was an error";
                }
            }
        }

        /**
         * File upload code ends here
         */
        if (empty($errors)) {
            $query1 = "UPDATE " . $table . " SET `company` = '$company', `fname`='$fname', `lname`='$lname', `email`='$email', `city`='$city', `zip`='$zip' WHERE `id` = $userid LIMIT 1";
            $Stmt1 = $pdo->prepare($query1);
            $result1 = $Stmt1->execute();

            /*  if (empty($image_name)) {
                  $query2 = "UPDATE " . $table . "_profile SET `email2`='$email2', `designation` = $designation, `fax2` = '$fax2', `fax1` = '$fax1', `mobile2` = '$mobile2', `mobile1` = '$mobile1', `telephone2` = '$telephone2', `telephone1` = '$telephone1', address1='$address1', address2='$address2' WHERE cid = $userid LIMIT 1";
              } else {
                  $query2 = "UPDATE " . $table . "_profile SET `email2`='$email2', `designation` = $designation, `fax2` = '$fax2', `fax1` = '$fax1', `mobile2` = '$mobile2', `mobile1` = '$mobile1', `telephone2` = '$telephone2', `telephone1` = '$telephone1', address1='$address1', address2='$address2', `photo`='$image_name' WHERE cid = $userid LIMIT 1";
              }
              $Stmt2 = $pdo->prepare($query2);
              $result2 = $Stmt2->execute();*/
            if (/*$result2 && */
            $result1
            ) {
                $msg = "Your profile is updated successfully";
            } else {
                $msg = "Your profile was not updated";
            }
        }
    }
}
$checkQuery = "SELECT " . $table . ".id as uid, company, fname, lname, email, countryId, stateId, city, zip, " . $table . "_profile.*
                FROM " . $table . "
               LEFT JOIN " . $table . "_profile
               ON " . $table . ".id = " . $table . "_profile.cid
               WHERE `email`='" . $email . "' LIMIT 1";
$checkStmt = $pdo->prepare($checkQuery);
$checkStmt->execute();
$row = $checkStmt->fetchObject();
$cid = $row->uid;
?>
    <div class="row">
<?php include_once("includes/sidebar.php"); ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h3 class="page-header">Contact Profile</h3>
        <?php
        if (isset($errors) && !empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br />";
            }
        }
        if (isset($msg) && !empty($msg)) {
            echo $msg . "<br />";
        }
        //echo $query2;
        ?>
        <div class="panel panel-info">
            <div class="panel-heading">Contact Profile</div>
            <div class="panel-body">
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            Company name
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-desktop icon-2x"></i></span>
                                    <input type="text" name="company" id="company" class="form-control input-sm"
                                           value="<?php echo $row->company; ?>"
                                           placeholder="Company Name"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Name
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="fname" id="fname" class="form-control input-sm"
                                       value="<?php echo $row->fname; ?>"
                                       placeholder="First Name"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="lname" id="lname" class="form-control input-sm"
                                       value="<?php echo $row->lname; ?>"
                                       placeholder="Last Name"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Profile Picture
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <img
                                    src="<?php echo(!empty($row->photo) ? 'uploads/' . $table . '/avatar/' . $row->photo : 'uploads/gravatar.png'); ?>"
                                    width="150"
                                    height="150"/><br/><br/>
                                <input type="file" name="post_image" id="post_image"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Designation / Job Title
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <select name="designation" id="designation" class="form-control input-sm">
                                    <?php
                                    if (!empty($row->designation)) {
                                        $userd = $row->designation;
                                        $getuserd = "SELECT * FROM designations WHERE id=$userd LIMIT 1";
                                        $checkUserD = $pdo->prepare($getuserd);
                                        $checkUserD->execute();
                                        $checkUserDResult = $checkUserD->fetchObject();
                                        ?>
                                        <option
                                            value="<?php echo $checkUserDResult->id; ?>"><?php echo $checkUserDResult->designation; ?></option>
                                        <?php
                                    }

                                    ?>
                                    <option value="0">-- Select Designation --</option>
                                    <?php
                                    $getdesignation = "SELECT * FROM designations";
                                    $checkD = $pdo->prepare($getdesignation);
                                    $checkD->execute();
                                    while ($d = $checkD->fetchObject()) {
                                        ?>
                                        <option
                                            value="<?php echo $d->id; ?>"><?php echo $d->designation; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Address Line 1
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-home icon-2x"></i></span>
                                    <input type="text" name="address1" id="address1" class="form-control input-sm"
                                           value="<?php echo(!empty($row->address1) ? $row->address1 : null); ?>"
                                           placeholder="Enter Address"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Address Line 2
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building-o icon-2x"></i></span>
                                    <input type="text" name="address2" id="address2" class="form-control input-sm"
                                           value="<?php echo(!empty($row->address2) ? $row->address2 : null); ?>"
                                           placeholder="Enter Address"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Country
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="country" id="country" class="form-control input-sm"
                                       value="<?php echo(!empty($row->countryId) ? $row->countryId : null); ?>"
                                       placeholder="Enter Country"/>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-1">
                            State
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="state" id="state" class="form-control input-sm"
                                       value="<?php echo(!empty($row->stateId) ? $row->stateId : null); ?>"
                                       placeholder="Enter State"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            City
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="city" id="city" class="form-control input-sm"
                                       value="<?php echo(!empty($row->city) ? $row->city : null); ?>"
                                       placeholder="Enter City"/>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-1">
                            Zip
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="zip" id="zip" class="form-control input-sm"
                                       value="<?php echo(!empty($row->zip) ? $row->zip : null); ?>"
                                       placeholder="Enter Zip"/>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            Telephone
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone icon-2x"></i></span>
                                    <input type="text" name="telephone1" id="telephone1"
                                           class="form-control input-sm"
                                           value="<?php echo(!empty($row->telephone1) ? $row->telephone1 : null); ?>"
                                           placeholder="Enter Telephone no. (+91)"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="tel2">
                        <div class="col-md-3">
                            Alternate Telephone
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone icon-2x"></i></span>
                                    <input type="text" name="telephone2" id="telephone2"
                                           class="form-control input-sm"
                                           value="<?php echo(!empty($row->telephone2) ? $row->telephone2 : null); ?>"
                                           placeholder="Enter Telephone no. (+91)"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Mobile
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile icon-2x"></i></span>
                                    <input type="text" name="mobile1" id="mobile1" class="form-control input-sm"
                                           value="<?php echo(!empty($row->mobile1) ? $row->mobile1 : null); ?>"
                                           placeholder="Enter Mobile no. (+91)"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="mob2">
                        <div class="col-md-3">
                            Alternate Mobile
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile icon-2x"></i></span>
                                    <input type="text" name="mobile2" id="mobile2" class="form-control input-sm"
                                           value="<?php echo(!empty($row->mobile2) ? $row->mobile2 : null); ?>"
                                           placeholder="Enter Mobile no. (+91)"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Fax
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fax icon-2x"></i></span>
                                    <input type="text" name="fax1" id="fax1" class="form-control input-sm"
                                           value="<?php echo(!empty($row->fax1) ? $row->fax1 : null); ?>"
                                           placeholder="Enter Fax no."/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="fx2">
                        <div class="col-md-3">
                            Alternate Fax
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fax icon-2x"></i></span>
                                    <input type="text" name="fax2" id="fax2" class="form-control input-sm"
                                           value="<?php echo(!empty($row->fax2) ? $row->fax2 : null); ?>"
                                           placeholder="Enter Fax no."/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Email
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope icon-2x"></i></span>
                                    <input type="email" name="email" id="email" class="form-control input-sm"
                                           value="<?php echo $row->email; ?>"
                                           placeholder="Email Address"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Alternative Email
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o icon-2x"></i></span>
                                    <input type="email" name="email2" id="alt_email"
                                           class="form-control input-sm"
                                           value="<?php echo(!empty($row->email2) ? $row->email2 : null); ?>"
                                           placeholder="Alternative Email Address"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="submit" class="btn-success btn" id="editProfile" name="editProfile"
                                       value="Update"/>
                                <input type="reset" class="btn-danger btn" value="Reset"/>
                            </div>
                        </div>
                    </div>
                    <br/>
                </form>
            </div>
        </div>
    </div>
<?php include_once 'includes/footer.php' ?>