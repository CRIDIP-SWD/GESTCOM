<?php
$fonction = new \App\fonction();
if($fonction->is_ajax()){
    if(isset($_GET['action']) && $_GET['action'] == 'connector')
    {
        require "../application/classe.php";
        $connect = $_GET['connect'];
        $username = $user->username;

        $sql_update = $DB->execute("UPDATE users SET connect = :connect WHERE username = :username", array(
            "username"  => $username,
            "connect"   => $connect
        ));

        echo json_encode($connect, $sql_update);
    }
}
?>

<?php
if (is_ajax()) {
    if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
        $action = $_POST["action"];
        switch($action) { //Switch case for value of action
            case "test": test_function(); break;
        }
    }
}

//Function to check if the request is an AJAX request
function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function test_function(){
    $return = $_POST;

    //Do what you need to do with the info. The following are some examples.
    //if ($return["favorite_beverage"] == ""){
    // $return["favorite_beverage"] = "Coke";
    //}
    //$return["favorite_restaurant"] = "McDonald's";

    $return["json"] = json_encode($return);
    echo json_encode($return);
}
?>
