<?php
include('class/user.class.php');
include('class/area.class.php');
include('class/profession.class.php');


session_start();

$area = new Area();

$areaList = $area->retrieve();
$profession = new Profession();

$professionList = $profession->retrieve();

$user = new User();
$user->set('id', $_GET['id']);
$retrieveUser = $user->getById();

if (isset($_GET['v'])) {
    $errorMsg = $_GET['v'];
}

$pattern = '/^(98[4-9]|97[7-9]|96[6-9])\d{7}$/';

$passPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/';


if (isset($_POST['submit'])) {

    $emptyName = $emptyAge = $emptyEmail = $emptyPhone = $emptyGender = $emptyOccupation = $emptyArea = $emptyAddress = $emptyPassword = $invalidEmail = $invalidPhone = $invalidPasswordLength = $invalidPassword = '';

    if (empty($_POST['fullname'])) {
        $emptyName = "Name Field Empty!";
    }

    if (empty($_POST['age'])) {
        $emptyAge = "Age Field Empty!";
    }

    if (empty($_POST['email'])) {
        $emptyEmail = "Email Field Empty!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $invalidEmail = "Invalid Email Format!";
    }

    if (empty($_POST['phone'])) {
        $emptyPhone = "Phone Field Empty!";
    } elseif (strlen($_POST['phone']) != 10 || !preg_match($pattern, $_POST['phone'])) {
        $invalidPhone = "Invalid Phone Number!";
    }

    if (empty($_POST['gender'])) {
        $emptyGender = "Gender Not Selected!";
    }

    if (empty($_POST['occupation'])) {
        $emptyOccupation = "Occupation Not Selected!";
    }

    if (empty($_POST['area'])) {
        $emptyArea = "Area Not Selected!";
    }

    if (empty($_POST['address'])) {
        $emptyAddress = "Address Field Empty!";
    }

    if (empty($_FILES['image']['name'])) {
        $imageError = "Image Not Selected!";
    } elseif ($_FILES['image']['error'] == 0) {
        if (
            $_FILES['image']['type'] == "image/png" ||
            $_FILES['image']['type'] == "image/jpg" ||
            $_FILES['image']['type'] == "image/jpeg"
        ) {
            if ($_FILES['image']['size'] <= 1024 * 1024) {
                $imageName = uniqid() . $_FILES['image']['name'];
                if (move_uploaded_file($_FILES['image']['tmp_name'], 'images' . DIRECTORY_SEPARATOR . $imageName)) {
                    $user->set('image', $imageName);
                } else {
                    $imageError = "Error moving uploaded file: " . error_get_last()['message'];
                    file_put_contents('upload_debug.log', $imageError . PHP_EOL, FILE_APPEND);
                }
            } else {
                $imageError = "Error, Exceeded 1mb!";
            }
        } else {
            $imageError = "Invalid Image!";
        }
    }


    if (empty($_POST['password'])) {
        $emptyPassword = "Password Field Empty!";
    } elseif (strlen($_POST['password']) < 8 || !preg_match($passPattern, $_POST['password'])) {
        $invalidPasswordLength = "Invalid Password!";
    }


    if (empty($emptyName) && empty($emptyAge) && empty($emptyEmail) && empty($emptyPhone) && empty($emptyGender) && empty($emptyOccupation) && empty($emptyArea) && empty($emptyAddress) && empty($emptyPassword) && empty($invalidEmail) && empty($invalidPhone) && empty($imageError) && empty($invalidPasswordLength) && empty($invalidPassword)) {

        $user->set('fullname', $_POST['fullname']);
        $user->set('email', $_POST['email']);
        $user->set('age', $_POST['age']);
        $user->set('phone', $_POST['phone']);
        $user->set('gender', $_POST['gender']);
        $user->set('occupation', $_POST['occupation']);
        $user->set('area', $_POST['area']);
        $user->set('address', $_POST['address']);
        $user->set('password', $_POST['password']);

        $user->save();
    } else {
        $globalError = "Something went wrong! Please Check All the Fields!";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KHS | Registration Form</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/common.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="container">


        <?php if (isset($ErrMsg)) { ?>
            <div class="alert-container">
                <div class="alert alert-danger"><?php echo $ErrMsg;  ?> <button class="alertTerminator" onclick="alertCloser()"><i class="bx bx-x"></i></button> </div>
            </div> <?php  } ?>

        <?php if (isset($globalError)) { ?>
            <div class="alert-container">
                <div class="alert alert-danger"><?php echo $globalError; ?> <button class="alertTerminator" onclick="alertCloser()"><i class="bx bx-x"></i></button> </div>
            </div> <?php  } ?>


        <div class="sidebar">
            <ul class="steps step-one">
                <li class="step1 all-steps">
                    <div class="list-num lists-active">1</div>
                    <div class="side-content">
                        <p>Step 1</p>
                        <div class="info">Your info</div>
                    </div>
                </li>
                <li class="step2 all-steps">
                    <div class="list-num">2</div>
                    <div class="side-content">
                        <p>Step 2</p>
                        <div class="info">Additional</div>
                    </div>
                </li>
                <li class="step3 all-steps">
                    <div class="list-num">3</div>
                    <div class="side-content">
                        <p>Step 3</p>
                        <div class="info">Image</div>
                    </div>
                </li>
                <li class="step4 all-steps">
                    <div class="list-num">4</div>
                    <div class="side-content">
                        <p>Step 4</p>
                        <div class="info">Password</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <form method="post" id="myForm" enctype="multipart/form-data" novalidate>
                <div class="step-one-container">
                    <!-- Step 1 start -->
                    <div class="header-sec">
                        <h1 class="title">Personal info</h1>
                        <p class="info-p">
                            Please provide your name, email address, and phone number.
                        </p>
                    </div>
                    <div class="input-container">
                        <div class="input-content">
                            <div class="label-container">
                                <label for="fullname">Name</label>
                                <?php if (isset($emptyName)) { ?>

                                    <small class="error-message"> <?php echo $emptyName; ?> </small>

                                <?php } ?>


                            </div>
                            <input type="text" name="fullname" placeholder="e.g. Stephen King" class="inputs" value="<?php echo $retrieveUser->fullname; ?>" required />
                        </div>
                        <div class="input-content">
                            <div class="label-container">
                                <label for="email">Email Address</label>
                                <?php if (isset($invalidEmail)) { ?>
                                    <small class="error-message"> <?php echo $invalidEmail; ?></small>
                                <?php } ?>
                                <?php if (isset($emptyEmail)) { ?>
                                    <small class="error-message"> <?php echo $emptyEmail; ?></small>
                                <?php } ?>
                            </div>
                            <input type="text" placeholder="e.g. example@gmail.com" name="email" class="inputs" value="<?php echo $retrieveUser->email; ?>" required />
                        </div>
                        <div class="input-content">
                            <div class="label-container">
                                <label for="phone">Phone Number</label>
                                <?php if (isset($invalidPhone)) { ?>
                                    <small class="error-message"> <?php echo $invalidPhone; ?></small>
                                <?php } ?>

                                <?php if (isset($emptyPhone)) { ?>
                                    <small class="error-message"> <?php echo $emptyPhone; ?></small>
                                <?php } ?>
                            </div>
                            <input type="number" name="phone" placeholder="e.g. 9840 000 000" class="inputs" value="<?php echo $retrieveUser->phone; ?>" required />
                        </div>
                        <div class="input-content">
                            <div class="label-container">
                                <label for="age">Age</label>
                                <?php if (isset($emptyAge)) { ?>

                                    <small class="error-message"> <?php echo $emptyAge; ?> </small>

                                <?php } ?>
                            </div>
                            <input type="number" name="age" placeholder="Enter your age" class="inputs" value="<?php echo $retrieveUser->age; ?>" required />
                        </div>
                    </div>
                    <div class="btns">
                        <button class="next-step">Next Step</button>
                    </div>
                </div>
                <div class="step-two-container hidden">
                    <!-- Step 1 start -->
                    <div class="header-sec">
                        <h1 class="title">Additional Details</h1>
                        <p class="info-p">
                            Please provide your additional info
                        </p>
                    </div>
                    <div class="input-container">
                        <div class="input-content">
                            <div class="label-container">
                                <label for="address">Address</label>
                                <?php if (isset($emptyAddress)) { ?>
                                    <small class="error-message"> <?php echo $emptyAddress; ?></small>
                                <?php } ?>
                            </div>
                            <input type="text" name="address" placeholder="Please enter your full address" class="inputs" value="<?php echo $retrieveUser->address; ?>" required />
                        </div>
                        <div class="input-content">
                            <div class="label-container">
                                <label for="area">Area</label>
                                <?php if (isset($emptyArea)) { ?>
                                    <small class="error-message"> <?php echo $emptyArea; ?></small>
                                <?php } ?>
                            </div>
                            <select name="area" required>
                                <option disabled>Select Your Area</option>
                                <?php

                                foreach ($areaList as $a) {
                                ?>
                                    <option value="<?php echo $a['name']; ?>"  <?php if($retrieveUser->area==$a['name']){echo "selected";} ?>><?php echo $a['name']; ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>
                        <div class="input-content">
                            <div class="label-container">
                                <label for="gender">Gender</label>
                                <?php if (isset($emptyGender)) { ?>
                                    <small class="error-message"> <?php echo $emptyGender; ?></small>
                                <?php } ?>
                            </div>
                            <select name="gender" required>
                                <option disabled selected>Select Your Gender</option>
                                <option>Male</option>
                                <option>Female</option>

                            </select>
                        </div>
                        <div class="input-content">
                            <div class="label-container">
                                <label for="occupation">Profession</label>
                                <?php if (isset($emptyOccupation)) { ?>
                                    <small class="error-message"> <?php echo $emptyOccupation; ?></small>
                                <?php } ?>
                            </div>
                            <select name="occupation" required>
                                <option disabled selected>Select Your Profession</option>
                                <?php
                                foreach ($professionList as $p) { ?>
                                    <option value="<?php echo $p['name']; ?>"><?php echo $p['name']; ?></option>

                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="btn-container">
                        <button class="next-step btns2 stagebtn2b" id="towbtn">Next Step</button>
                        <button class="go-back btns2 stagebtn2a" id="goBack">Go Back</button>
                    </div>
                </div>
                <div class="step-three-container hidden">
                    <!-- Step 1 start -->
                    <div class="header-sec">
                        <h1 class="title">Image Details</h1>
                        <p class="info-p">
                            Please provide us with your passport size photo
                        </p>
                    </div>
                    <div class="input-container">

                        <div class="input-content" enctype="multipart/form-data">
                            <div class="label-container">
                                <label for="image">Photo</label>
                                <?php if (isset($imageError)) { ?>
                                    <small class="error-message"> <?php echo $imageError; ?></small>
                                <?php } ?>

                            </div>



                            <input type="file" name="image" class="inputs" id="image" required />
                        </div>
                        <div id="imageContainer"></div>
                    </div>
                    <div class="btn-container">
                        <button class="next-step btns2 stagebtn3b" id="towbtn">Next Step</button>
                        <button class="go-back btns2 stagebtn3a" id="goBack">Go Back</button>
                    </div>
                </div>
                <div class="step-four-container hidden">
                    <!-- Step 1 start -->
                    <div class="header-sec">
                        <h1 class="title">Create Password</h1>
                        <p class="info-p">
                            Create a password with given instructions
                        </p>
                    </div>
                    <div class="input-container">

                        <div class="input-content">
                            <div class="label-container">
                                <label for="password">Password</label>
                                <?php if (isset($emptyPassword)) { ?>
                                    <small class="error-message"> <?php echo $emptyPassword; ?></small>
                                <?php } ?>
                                <?php if (isset($invalidPasswordLength)) { ?>
                                    <small class="error-message"> <?php echo $invalidPasswordLength; ?></small>
                                <?php } ?>
                            </div>
                            <input type="password" name="password" id="passwordField" placeholder="Create a password" class="inputs" required />
                        </div>
                        <div class="input-content passToggle">
                            <input type="checkbox" id="passwordToggle" class="inputs passwordToggler" onclick="togglePassword()" />
                            <label for="passwordToggle">Show Password</label>
                        </div>
                    </div>

                    <div class="password-requirement">
                        <div class="requirementBox">
                            <i class='bx bx-arrow-back'></i>
                            <p>Minimum 8 characters long</p>
                        </div>
                        <div class="requirementBox">
                            <i class='bx bx-arrow-back'></i>
                            <p>A uppercase letter</p>
                        </div>
                        <div class="requirementBox">
                            <i class='bx bx-arrow-back'></i>
                            <p>A lowercase letter</p>
                        </div>
                        <div class="requirementBox">
                            <i class='bx bx-arrow-back'></i>
                            <p>A number</p>
                        </div>
                    </div>

                    <div class="btn-container">
                        <!-- <input type="submit" value="submit" id="submitBtn"> -->
                        <button class="next-step btns2" type="submit" name="submit">Submit</button>
                        <button class="go-back btns2 stagebtn4a" id="goBack">Go Back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- <p class="loginLink">Already Registered? <a href="login.php">LogIn Here</a></p> -->
    <p class="loginLink homePage"><a href="index.php">Go to Home Page! &nbsp;<i class='bx bx-link-external'></i></a></p>



    <script src="js/script.js"></script>
    <script>
        let stagebtn1 = document.querySelector(".next-step"),
            stagebtn2b = document.querySelector(".stagebtn2b"),
            stagebtn2a = document.querySelector(".stagebtn2a"),
            stagebtn3a = document.querySelector(".stagebtn3a"),
            stagebtn3b = document.querySelector(".stagebtn3b"),

            stagebtn4a = document.querySelector(".stagebtn4a"),

            submitBtn = document.getElementById("submitBtn"),



            step1btn = document.querySelector(".step1 > .list-num"),
            step2btn = document.querySelector(".step2 >.list-num"),
            step3btn = document.querySelector(".step3 >.list-num"),
            step4btn = document.querySelector(".step4 >.list-num"),

            firstContainer = document.querySelector(".step-one-container"),
            secondContainer = document.querySelector(".step-two-container"),
            thirdContainer = document.querySelector(".step-three-container"),
            fourthContainer = document.querySelector(".step-four-container"),
            myForm = document.getElementById("myForm");

        function stage1to2(event) {
            event.preventDefault();
            firstContainer.classList.add("hidden");
            secondContainer.classList.remove("hidden");
            step1btn.classList.remove("lists-active");
            step2btn.classList.add("lists-active");
        }
        stagebtn1.addEventListener("click", stage1to2);


        function stage2to1(event) {
            event.preventDefault();
            firstContainer.classList.remove("hidden");
            secondContainer.classList.add("hidden");
            step1btn.classList.add("lists-active");
            step2btn.classList.remove("lists-active");
        }
        stagebtn2a.addEventListener("click", stage2to1);

        function stage2to3(event) {
            event.preventDefault();
            secondContainer.classList.add("hidden");
            thirdContainer.classList.remove("hidden");
            step2btn.classList.remove("lists-active");
            step3btn.classList.add("lists-active");
        }
        stagebtn2b.addEventListener("click", stage2to3);



        function stage3to2(event) {
            event.preventDefault();
            secondContainer.classList.remove("hidden");
            thirdContainer.classList.add("hidden");
            step2btn.classList.add("lists-active");
            step3btn.classList.remove("lists-active");

        }
        stagebtn3a.addEventListener("click", stage3to2);


        function stage3to4(event) {
            event.preventDefault();
            thirdContainer.classList.add("hidden");
            fourthContainer.classList.remove("hidden");
            step3btn.classList.remove("lists-active");
            step4btn.classList.add("lists-active");
        }
        stagebtn3b.addEventListener("click", stage3to4);

        function stage4to3(event) {
            event.preventDefault();
            thirdContainer.classList.remove("hidden");
            fourthContainer.classList.add("hidden");
            step3btn.classList.add("lists-active");
            step4btn.classList.remove("lists-active");
        }
        stagebtn4a.addEventListener("click", stage4to3);


        document.addEventListener("DOMContentLoaded", function() {
            var imageInput = document.getElementById("image");
            var inputContainer = document.getElementById("imageContainer");

            imageInput.addEventListener("change", function(event) {
                var file = event.target.files[0];

                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        inputContainer.innerHTML = '<img src="' + event.target.result + '" alt="Uploaded Image"/> <br> <p style="color:red;"> To change the image again click on the "Choose File" button! </p>';
                    }
                    reader.readAsDataURL(file);
                }
            })
        });
    </script>


</body>

</html>