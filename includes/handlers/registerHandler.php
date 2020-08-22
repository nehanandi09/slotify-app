<?php

function sanitizeFormPassword($inputText)
{
    $inputText = strip_tags($inputText);
    return $inputText;
}

function sanitizeFormUsername($inputText)
{
    $inputText = strip_tags($inputText); //strips all html elements within a string
    $inputText = str_replace(" ", "", $inputText); //replace empty spaces with no space
    return $inputText;
}

function sanitizeFormString($inputText)
{
    $inputText = strip_tags($inputText); //strips all html elements within a string
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText)); //first character is upper cased, strtolower converts rest of the characters to lower case
    return $inputText;
}



if (isset($_POST['registerButton'])) {
    //register button was pressed
    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $email2 = sanitizeFormString($_POST['email2']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);

    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

    if ($wasSuccessful) {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
}