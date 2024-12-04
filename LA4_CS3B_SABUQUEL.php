<?php

function userReg() {
    echo "REGISTRATION FORM\nFill in the form below.\n\n";

    // Ask and collect user data
    $fName = readline("Enter your first name: ");
    $lName = readline("Enter your last name: ");
    $course = readline("Enter your Course: ");
    $yearLevel = readline("Enter your year Level: ");
    $section = readline("Enter your section: ");
    $username = readline("\nCreate a username: ");
    $password = readline("Create a password: ");

    // Create a pin code
    $pinCode = readline("Create an 8-digit pin code: ");
    // Ensure that the pin code is exactly 8 digits long and contains only numbers
    while (strlen($pinCode) != 8 || !ctype_digit($pinCode)) {
        echo "Pin code is invalid. It must contain exactly 8 digit numbers.\n";
        $pinCode = readline("Create an 8-digit pin code: ");
    }

    // Store all the collected user info in a list   
    $userInfo = [
        $fName,
        $lName,
        $course,
        $yearLevel,
        $section,
        $username,
        $password,
        $pinCode
    ];

    return $userInfo;
}

function userLogIn($userInfo) {

    // Loop until username and password are correct
    while (true) {
        echo "\nLog in with your username and password\n";
        $enterUsername = readline("Enter Username: ");
        $enterPassword = readline("Enter Password: ");

        // Check if the password and username matched what you have registered   
        if ($enterUsername === $userInfo[5] && $enterPassword === $userInfo[6]) {
            echo "\nYou are now successfully logged in.\n";

            // Loop until you got the correct pin code           
            while (true) {
                $enterPin = readline("Enter your 8 digit pin code to continue:\n ");
                if ($enterPin === $userInfo[7]) {
                    // Display user details       
                    echo "\nHERE ARE YOUR DETAILS.\n";
                    echo "Name: " . $userInfo[0] . " " . $userInfo[1] . "\n";
                    echo "Course, Year, Section: " . strtoupper($userInfo[2]) . ", " . $userInfo[3] . strtoupper($userInfo[4]) . "\n";
                    echo "Username: " . $userInfo[5] . "\n";
                    return;
                } else {
                    echo "Incorrect pin code. Please try again.\n"; // Tell the user that the pin is incorrect
                }
            }
        } else {
            echo "Incorrect username or password. Please try again.\n"; // Tell the user that the password or username is incorrect
        }
    }
}

function func() {
    // Register the user and save their info    
    $userInfo = userReg();
    echo "\nCongratulations! You have successfully registered.\n";

    // Ask the user if he/she wants to log in
    $logOption = strtoupper(trim(readline("Do you want to log in? YES or NO? ")));

    // Log in if the user entered "YES", else exit
    if ($logOption === "YES") {
        userLogIn($userInfo);
    } else {
        echo "Have a good day, BYE!\n";
    }
}

func();

?>