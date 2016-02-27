<?php
if(isset($_GET['action']) && $_GET['action'] == 'connector')
{
    session_start();
    require "../application/classe.php";
    $connect = $_GET['connect'];
    $username = $user->username;

    $user_u = $DB->execute("UPDATE users SET connect = :connect WHERE username = :username", array(
        "connect"   => $connect,
        "username"  => $username
    ));
    if($fonction->is_ajax()){
        $json_get = array(
            "connect" => $connect
        );

        return json_encode($json_get);
    }else{
        $fonction->redirect("dashboard", "","", "info", "connector", "Changement du Statut !");
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
