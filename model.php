<?php
$conn = mysqli_connect('localhost', 'ksandhuf20','ksandhuf20424','C354_ksandhuf20');

//Checks if user and password is correct
function check_validity($u, $p) 
{
    global $conn;
    
    $sql = "select * from TUsers where Username = '$u' and Password = '$p'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}


//Checks if user already exists
function check_existence($u) 
{
    global $conn;
    
    $sql = "select * from TUsers where Username = '$u'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

//Joins the user in the table
function join_user($u, $p, $email, $w) 
{
    global $conn;
    
    $date = date("Ymd");
    
    $sql = "Insert into TUsers values (NULL, '$u', '$p', '$email','$w', 'No', $date)";
    $result = mysqli_query($conn, $sql);
    
    return $result;
}

//Gets user id from username
function get_user_id($u) 
{
    global $conn;
    
    $sql = "select * from TUsers where Username = '$u'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['ID'];
    } else
        return -1;
}

//Enters task in the database
function enter_task($u, $name,$pro,$pri,$desc)
{
    global $conn;
    
    $id = get_user_id($u);
    $date = date("Ymd");
    $sql = "Insert into Tasks values (NULL, '$name', '$pri', '$pro', '$desc', 'No', '$id', $date)";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//retrieves array of all the tasks and return it
function list_tasks($u)
{
    global $conn;
    
    $id = get_user_id($u);
    $sql = "select * from Tasks where UserId = '$id'";
    $result = mysqli_query($conn,$sql);
    $data = [];
    while($row = mysqli_fetch_assoc($result))
        $data[] = $row;
    return $data;
}

//Deleted the task
function delete_task($id)
{
    global $conn;
    
    $sql = "Delete from Tasks where ID = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//Change progress status
function change_progress($id, $pro)
{
    global $conn;
    
    $sql = "Update Tasks Set Progress = '$pro' where ID = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//Change priority
function change_priority($id, $pri)
{
    global $conn;
    
    $sql = "Update Tasks Set Priority = '$pri' where ID = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//Changes description of the record
function change_description($id, $des)
{
    global $conn;
    
    $sql = "Update Tasks Set Description = '$des' where ID = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//retrieves the reminder preference of the user
function get_reminder($id)
{
    global $conn;
    
    $sql = "select * from Tasks where ID = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['Reminder'];
    } else
        return -1;
}

//changes the reminder
function change_reminder($id, $rem)
{
    global $conn;
    
    $sql = "update Tasks set Reminder = '$rem' where ID = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//retrieves the tasks which has reminder set as yes
function remind_tasks($u)
{
    global $conn;
    
    $id = get_user_id($u);
    
    $sql = "select * from Tasks where Reminder = 'Yes' AND UserId = '$id'";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while($row = mysqli_fetch_assoc($result))
        $data[] = $row;
    return $data;
}

//retrieves the productivity tips from the table
function show_tip($id)
{
    global $conn;
    
    $sql = "select * from Planning where Id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['Tips'];
    } else
        return -1;
}

//retrieves the preference choice of the user
function get_tip_choice($name)
{
    global $conn;
    
    $id = get_user_id($name);
    $sql = "select * from TUsers where ID = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['ShowTips'];
    } else
        return -1;
}

//changes tip choice of the user
function change_tip_choice($name)
{
    global $conn;
    
    $id = get_user_id($name);
    $choice = get_tip_choice($name);
    if($choice == 'Yes')
        $choice = 'No';
    else if($choice == 'No')
        $choice = 'Yes';
    $sql = "Update TUsers set ShowTips = '$choice' where ID = '$id'";
    $result = mysqli_query($conn, $sql);
    return $choice;
}

//changes the username of the user
function change_name($name, $newname)
{
    global $conn;
    
    $id = get_user_id($name);
    $sql = "update TUsers set Username = '$newname' where ID = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//changes the password of the user
function change_pass($name, $newpass)
{
    global $conn;
    
    $sql = "update TUsers set Password = '$newpass' where Username = '$name'";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//changes the mail of the user
function change_mail($name, $newmail)
{
    global $conn;
    
    $sql = "update TUsers set Email = '$newmail' where Username = '$name'";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//changes the working status of the user
function change_status($name, $newstatus)
{
    global $conn;
    
    $sql = "update TUsers set WorkingStatus = '$newstatus' where Username = '$name'";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//deletes the user
function delete_user($name)
{
    global $conn;
    
    $sql = "delete from TUsers where Username = '$name'";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//deletes the task that belong to a particular user
function delete_tasks($name)
{
    global $conn;
    
    $id = get_user_id($name);
    $sql = "delete from Tasks where UserId = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result)
        return true;
    else
        return false;
}

//changes user information
function edit_user($id,$name,$pass,$mail,$work)
{
    global $conn;
    
    $date = date("Ymd");
    
    $sql = "update TUsers set Username = '$name', Password = '$pass', Email = '$mail', WorkingStatus = '$work' where ID= '$id'";
    $result = mysqli_query($conn, $sql);
    
    return $result;
}

//returns array of tasks with particular progress status
function get_progress_list($u,$v)
{
    global $conn;
    
    $id = get_user_id($u);
    $sql = "select * from Tasks where UserId = '$id' and Progress = '$v'";
    $result = mysqli_query($conn,$sql);
    $data = [];
    while($row = mysqli_fetch_assoc($result))
        $data[] = $row;
    return $data;
}

//Counts the number of rows in planning table
function count_row()
{
    global $conn;
    
    $sql = "select count(*) as total from Planning";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    } else
        return -1;
    
    return $result;
}

//retrieves the user information
function see_Profile($name)
{
    global $conn;
    
    $sql = "select * from TUsers where Username = '$name'";
    $result = mysqli_query($conn,$sql);
    $data = [];
    while($row = mysqli_fetch_assoc($result))
        $data[] = $row;
    return $data;
}
?>