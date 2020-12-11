<?php
if(empty($_POST['page'])) {
    include ('homepage.php');
    exit();
}

require('model.php');

session_start();

//Commands from HomePage
if($_POST['page'] == 'HomePage')
{
    $command = $_POST['command'];
    switch($command) {
            //Sign in command
        case 'Signin':
            $_SESSION['username'] = $_POST['username'];
            $result = check_validity($_SESSION['username'],$_POST['password']);
            
            if($result)
            {
                include ("applicationpage.php");
                exit();
            }
            else
            {
                $message = "Either Username or Password was Wrong";
                include ("homepage.php");
            }
            break;
            //join command
        case 'Join':
            $exist = check_existence($_POST['username']);
            
            if($exist)
            {
                $message = "User Already Exists";
                include ("homepage.php");
            }
            else
            {
                join_user($_POST['username'], $_POST['password'], $_POST['email'], $_POST['work']);
                $message = "User has been Successfully Joined";
                include ("homepage.php");
            }
            exit();
            break;
    }
}
//Commands from Application Page
else if($_POST['page'] == 'AppPage')
{
    $command = $_POST['command'];
    switch($command) {
            //task enter command
        case 'Enter':
            $res = enter_task($_SESSION['username'], $_POST['TName'], $_POST['progress'], $_POST['priority'], $_POST['desc']);
            if($res)
            {
                echo "<h3 style='text-align:center'>Task was Successfully Entered!</h3>";
            }
            else
                echo "<h3 style='text-align:center'>Task Was not Entered</hr>";
            break;
            
        //list tasks command
        case 'List':
            $data = list_tasks($_SESSION['username']);
            echo json_encode($data);
            break;
            
            //Delete task command
        case 'Delete':
            delete_task($_POST['id']);
            $data = list_tasks($_SESSION['username']);
            echo json_encode($data);
            break;
            
            //change progress command
        case 'ChangeProgress':
            change_progress($_POST['id'],$_POST['progress']);
            $data = list_tasks($_SESSION['username']);
            echo json_encode($data);
            break;
            
            //change priority command
        case 'ChangePriority':
            change_priority($_POST['id'],$_POST['priority']);
            $data = list_tasks($_SESSION['username']);
            echo json_encode($data);
            break;
            
            //change decription command
        case 'ChangeDesc':
            $result = change_description($_POST['id'],$_POST['description']);
            echo $result;
            break;
            
            //changes the reminder
        case 'SetReminder':
            $reminder = get_reminder($_POST['id']);
            if($reminder == 'No')
                $reminder = 'Yes';
            else if($reminder == 'Yes')
                $reminder = 'No';
            $result = change_reminder($_POST['id'], $reminder);
            echo $result;
            break;
            
            //retrieves the reminder tasks
        case 'displayReminder':
            $tasks = remind_tasks($_SESSION['username']);
            echo json_encode($tasks);
            break;
            
            //retrieves randomized productivity tips
        case 'showTips':
            $choice = get_tip_choice($_SESSION['username']);
            if($choice == 'Yes')
            {
                $max = count_row();
                $number = rand(1,$max);
                $res = show_tip($number);
                echo $res;
            }
            else
                echo "";
            break;
            
            //To display the name of the user
        case 'DisplayName':
            echo $_SESSION['username'];
            break;
            
            //changes show tips preference
        case 'ShowTips':
            $res = change_tip_choice($_SESSION['username']);
            echo $res;
            break;
            
            //signs out the user
        case 'SignOut':
            session_unset();
            session_destroy();
            include("homepage.php");
            exit();
            break;
            
            //unsubsrcibes the user from the website
        case 'UnSubscribe':
            if(!empty($_SESSION['username']))
            {
                delete_tasks($_SESSION['username']);
                delete_user($_SESSION['username']);
                $message = "We Are Sorry to See You Go!<br>Thank you for Using Our Services";
            }
            session_unset();
            session_destroy();
            include("homepage.php");
            exit();
            break;
            
            //changes user information
        case 'ChangeInfo':
            $id = get_user_id($_SESSION['username']);
            $res = edit_user($id,$_POST['newUser'],$_POST['newPassword'],$_POST['newEmail'],$_POST['newWork']);
            session_unset();
            session_destroy();
            include("homepage.php");
            exit();
            break;
            
            //filter tasks according to progress status
        case 'filter':
            $data = get_progress_list($_SESSION['username'],$_POST['value']);
            echo json_encode($data);
            break;
            
            //gets the array of user information
        case 'seeProfile':
            $result = see_Profile($_SESSION['username']);
            echo json_encode($result);
            break;
    }
}
?>