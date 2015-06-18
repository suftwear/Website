<?php

    // register.php
    // description

    require_once("api.php");

    function clean_input($input) {
        return htmlspecialchars(stripslashes(trim($input)));
    }

    $request_uri = "/user?";
    $request_method = "POST";

    if (isset($_POST["reg_email"]) && isset($_POST["reg_zipcode"]) &&
        isset($_POST["reg_acces_token"])) {

        $email = $_POST["reg_email"];
        $zipcode = $_POST["reg_zipcode"];
        $fb_token = $_POST["reg_acces_token"];

        $user = array("email" => $email);
        $usermeta = array("fb_token" => $fb_token, "zipcode" => $zipcode);

        if (isset($_POST["reg_phone"])) {
            $usermeta["phone"] = $_POST["phone"];
        }

        if (isset($_POST["reg_description"])) {
            $usermeta["description"] = $_POST["description"];
        }

        $data = array("user" => $user, "usermeta" => $usermeta);

        $response = api_request($request_uri, $request_method, $data);

    }

    // Perform login


    if ($response["response_code"] == 200) {
        // succesful registration, proceed to login
    } else if ($response["response_code"] == 400) {
        // Check for faulty data (duplicate email, invalid fb token)
        print_r($response["response"]);
    } else {
        // Unknown error
        echo "Unknown Errors";
        print_r($response["response"]);
    }

    header("Location: " . $_SERVER["HTTP_REFERER"]);

?>
