<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
</head>

<body>
    <div class='container-fluid'>
        <div class='row' id='title' style="color: white; background-color: #006666">
            <h1 style="text-align:center">To-Do Task Management System</h1>
        </div>
        <div class='row' id='navbar' style="background-color: #006666; padding-bottom: 20px;">
            <br>
            <!-- Drop Down Menus and Navigation Buttons-->
            <div class='col-sm-2'>
                <div class='dropdown'>
                <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false" style="width: 100%; color: white; background-color: #006666">Add or Delete Tasks</button>
                    <div class='dropdown-menu' aria-labelledby="dropdownMenu2" style="color: white; background-color: #006666">
                    <button class='btn btn-secondary dropdown-toggle' id="enterTask" style="width: 100%; color: white; background-color: #006666;" data-toggle='modal' data-target='#enter-modal'>Enter a Task</button>
                    <button id='deletelist' class='btn btn-secondary dropdown-toggle' style="width: 100%; color: white; background-color: #006666">Delete a Task</button>
                    </div>
                </div>
            </div>
            <div class='col-sm-2'>
                <div class='dropdown'>
                <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false" style="width: 100%; color: white; background-color: #006666">Task Editing Options</button>
                    <div class='dropdown-menu' aria-labelledby="dropdownMenuButton" style="color: white; background-color: #006666">
                    <button id='changePro' class='btn btn-secondary dropdown-toggle' style="width: 100%; color: white; background-color: #006666">Change Progress</button>
                    <button id='changePri' class='btn btn-secondary dropdown-toggle' style="width: 100%; color: white; background-color: #006666">Change Priority</button>
                    <button id='editDesc' class='btn btn-secondary dropdown-toggle' style="width: 100%; color: white; background-color: #006666">Edit Description</button>
                    </div>
                </div>
            </div>
            <div class='col-sm-2'>
                <button id='list' style="width: 100%; color: white; background-color: #006666" class='btn btn-secondary dropdown-toggle'>List My Tasks</button>
            </div>
            <div class='col-sm-2'></div>
            <div class='col-sm-2'>
                <div class='dropdown'>
                <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false" style="width: 100%; color: white; background-color: #006666">More Options</button>
                    <div class='dropdown-menu' aria-labelledby="dropdownMenuButton" style="color: white; background-color: #006666">
                    <button id='remind' class='btn btn-secondary dropdown-toggle' style="width: 100%; color: white; background-color: #006666">Change Reminder Preference</button>
                    <button id='showtips' class='btn btn-secondary dropdown-toggle' style="width: 100%; color: white; background-color: #006666">Change ShowTips Preference</button>
                    <button class='btn btn-secondary dropdown-toggle' style="width: 100%; color: white; background-color: #006666" data-toggle='modal' data-target='#change-modal'>Change User's Profile</button>
                    <button id="seeProfile" class='btn btn-secondary dropdown-toggle' style="width: 100%; color: white; background-color: #006666">See User's Profile</button>
                    <button id='unsub' class='btn btn-secondary dropdown-toggle' style="width: 100%; color: white; background-color: #006666">Unsubscribe</button>
                    </div>
                </div>
            </div>
            <div class='col-sm-2'>
                <button id='sign-out' style="width: 100%; color: white; background-color: #006666" class='btn btn-secondary dropdown-toggle'>Sign Out</button>
            </div>
        </div>
        <div class='row'>
            <!--Enter Task Modal-->
            <div class='modal fade' id='enter-modal'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <form class='form-horizontal' method='post' action='controller.php'>
                    <div class='modal-header'>
                        <h2 class='modal-title'>Enter your Task</h2>
                    </div>
                    <div class='modal-body'>
                        <input type='hidden' name='page' value='AppPage'>
                        <input type='hidden' name='command' value='Enter'>
                        <div class='form-group'>
                            <label class="control-label" for="task">Task Name:</label> 
                            <input type="text" class="form-control" id="task" name='task' placeholder="Enter your Tasks Name" required><br>
                            <label class="input-group-text" for="progress">Progress Status</label>
                            <select class="custom-select" id="progress" name="progress" required>
                                <option selected value="Incomplete">Icomplete</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select><br><br>
                            <label class="input-group-text" for="priority">Please Select the Priority of the Task</label>
                            <select class="custom-select" id="priority" name="priority" required>
                                <option selected value="Low">Low</option>
                                <option value="Moderate">Moderate</option>
                                <option value="High">High</option>
                            </select><br><br>
                            <label class="control-label" for="desc">Please Enter Task Description (if any):</label> 
                            <input type="text" class="form-control" id="desc" name='desc' placeholder="Enter your Task's Description (if any)">
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <div class="form-group"> 
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-default" id='submitTask' data-dismiss="modal">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            <!--Change Profile Modal Window-->
            <div class='modal fade' id='change-modal'>
        <div class='modal-dialog modal-dialog-centered' role="document">
            <div class='modal-content'>
                <form class='' id='changing' method='post' action='controller.php'>
                    <div class='modal-header'>
                        <h2 class='modal-title'>Enter The Desired Changes</h2>
                    </div>
                    <div class='modal-body'>
                        <input type='hidden' name='page' value='AppPage'>
                        <input type='hidden' name='command' value='ChangeInfo'>
                        <div class='form-group'>
                            <label class="control-label" for="newUser">Username:</label> 
                            <input type="text" class="form-control" id="newUSer" name='newUser' placeholder="Enter your Username" required><br>
                            <label class="control-label" for="newPassword">Password:</label> 
                            <input type="text" class="form-control" id="newPassword" name='newPassword' placeholder="Enter your Password" required><br>
                            <label class="control-label" for="newEmail">Email ID:</label> 
                            <input type="text" class="form-control" id="newEmail" name='newEmail' placeholder="Enter your Email" required><br>
                            
                        </div>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="newWork">Working Status</label>
                                </div>
                                <select class="custom-select" id="newWork" name="newWork">
                                    <option selected value="Working">Working</option>
                                    <option value="Student">Student</option>
                                    <option value="Unemployed">Unemployed</option>
                                </select>
                    </div>
                    <div class='modal-footer'>
                        <div class="form-group"> 
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-default" id='submitNewChanges'>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            <!--Sign Out Form-->
            <form method='post' action='controller.php' id='form-sign-out' style='display:none'>
        <input type='hidden' name='page' value='AppPage'>
        <input type='hidden' name='command' value='SignOut'>
    </form>
            <!--UnSubscribe Form-->
            <form method='post' action='controller.php' id='form-unsubscribe' style='display:none'>
        <input type='hidden' name='page' value='AppPage'>
        <input type='hidden' name='command' value='UnSubscribe'>
    </form>
        </div>
        <div class='row' id='welcome' style="padding: 30px">
        </div>
        <div class='row' id='results'>
        </div>
        <div class='row' id='tips' style="padding: 30px">
        </div>
    </div>
    
</body>
</html>

<script>
    /*Window Load Commands*/
    $(window).on("load", function() {
        var url = "controller.php";
        
        var que = {
            page: "AppPage",
            command: "DisplayName"
        };
        $.post(url, que,
              function(data){
            var welcome = "<h1 style='text-align: center'>Welcome " + data + "!!!</h1>";
            $('#welcome').html(welcome);
        });
        
        var query = {
            page: "AppPage",
            command: "displayReminder"
        };
        $.post(url, query,
              function(data){
            $('#results').html(reminder_table(data));
        });
        var qu = {
            page: "AppPage",
            command: "showTips"
        };
        $.post(url, qu,
              function(res){
            if(res != "")
                {
            var tip = '<h3 style="text-align: center">Planning Tip for the Day:</h3><h2 style="text-align: center">"' + res + '"</h2>';
            $('#tips').html(tip);
                }
            else
                $('#tips').html(res);
        });
    });
    
    /*Enter Task Command*/
    $('#submitTask').click(function() {
        var tname = $('#task').val();
        var pro = $('#progress').val();
        var pri = $('#priority').val();
        var des = $('#desc').val();
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "Enter",
            TName: tname,
            progress: pro,
            priority: pri,
            desc: des
        };
        $.post(url, query,
              function(data){
            $('#results').html(data);
        });
    });
    
    /*List Tasks Command*/
    $('#list').click(function () {
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "List"
        };
        $.post(url, query,
              function(data){
            $('#results').html(table(data));
        });
    });
    
    /*Sign-Out & Unsubscribe Commands*/
    $('#sign-out').click(function() {
        $('#form-sign-out').submit();
    });
    
    $('#unsub').click(function() {
        $('#form-unsubscribe').submit();
    });
    
    /*See Profile Command*/
    $('#seeProfile').click(function () {
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "seeProfile"
        };
        $.post(url, query,
              function(data){
            $('#results').html(profile(data));
        });
    });
    
    /*Show Tips Preference Commands*/
    $('#showtips').click(function () {
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "ShowTips"
        };
        $.post(url, query,
              function(data){
            if(data == 'No')
                {
            var result = "<h3 style='text-align:center'>Your Show Tips Preference Has Been Changed to <b>" + data + "</b><br>Now, You Won't be Seeing Planning Tips from Next Time...</h3>";
            $('#results').html(result);
                }
            else if (data == 'Yes')
                {
                    var result = "<h3 style='text-align:center'>Your Show Tips Preference Has Been Changed to <b>" + data + "</b><br>Now, You Will be able See Productive Planning Tips!!!</h3>";
            $('#results').html(result);
                }
        });
    });
    
    /*Delete List Command*/
    $('#deletelist').click(function () {
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "List"
        };
        $.post(url, query,
              function(data){
            $('#results').html(delete_table(data));
            /*Delete button working command to delete the record*/
            $('button[data-q-id]').click(function () {
                var value = $(this).attr('data-q-id');
                var u = "controller.php";
                var q = {
                    page: "AppPage",
                    command: "Delete",
                    id: value
                };
                $.post(u, q,
                      function(res){
                    $('#results').html("<h3 style='text-align:center'>Your Selected Record Was Deleted</h3>");
                });
            });
        });
    });
    
    /*Change Priority Command*/
    $('#changePri').click(function () {
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "List"
        };
        $.post(url, query,
              function(data){
            $('#results').html(priority_table(data));
            /*Changes the Priority of selected record*/
            $('button[data-t-id]').click(function () {
                    var s = $("select#prio").children("option:selected").val();
                    var value = $(this).attr('data-t-id');
                    var url = "controller.php";
                    var query = {
                        page: "AppPage",
                        command: "ChangePriority",
                        id: value,
                        priority: s
                    };
                $.post(url, query,
                      function(res){
                    if(res)
                        $('#results').html("<h3 style='text-align:center'>Your Selected Task's Priority has been Changed</h3>");
                    else
                        $('#results').html("<h3 style='text-align:center'>Unfortunately! Your Selected Task's Priority Was not Changed</h3>");
                });
            });
        });
    });
    
    /*Change Progress Command*/
    $('#changePro').click(function () {
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "List"
        };
        $.post(url, query,
              function(data){
            $('#results').html(progress_table(data));
            /*Changes the Priority of the selected record*/
            $('button[data-t-id]').click(function () {
                    var s = $("select#pro").children("option:selected").val();
                    var value = $(this).attr('data-t-id');
                    var url = "controller.php";
                    var query = {
                        page: "AppPage",
                        command: "ChangeProgress",
                        id: value,
                        progress: s
                    };
                $.post(url, query,
                      function(res){
                    if(res)
                        $('#results').html("<h3 style='text-align:center'>Your Selected Task's Progress Status has been Changed</h3>");
                    else
                        $('#results').html("<h3 style='text-align:center'>Unfortunately! Your Selected Task's Progress Status has not been Changed</h3>");
                });
            });
        });
    });
    
    /*Edit Description Command*/
    $('#editDesc').click(function () {
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "List"
        };
        $.post(url, query,
              function(data){
            $('#results').html(desc_table(data));
            /*Edit Description of the selected record*/
            $('button[data-q-id]').click(function () {
                    var des = $("input#descr").val();
                    var value = $(this).attr('data-q-id');
                    var url = "controller.php";
                    var query = {
                        page: "AppPage",
                        command: "ChangeDesc",
                        id: value,
                        description: des
                    };
                $.post(url, query,
                      function(res){
                    if(res)
                        $('#results').html("<h3 style='text-align:center'>Your Selected Task's Description has been Edited</h3>");
                    else
                        $('#results').html("<h3 style='text-align:center'>Unfortunately! Your Selected Task's Description has not been Edited</h3>");
                });
            });
        });
    });
    
    /*Change reminder preference command*/
    $('#remind').click(function() {
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "List"
        };
        $.post(url, query,
              function(data){
            $('#results').html(remind_table(data));
            /*Changes the reminder of the selected record*/
            $('button[data-q-id]').click(function () {
                var value = $(this).attr('data-q-id');
                var u = "controller.php";
                var q = {
                    page: "AppPage",
                    command: "SetReminder",
                    id: value
                };
                $.post(u, q,
                      function(res){
                    $('#results').html("<h3 style='text-align:center'>Reminder Has Been to Changed for the Selected Record</h3>");
                });
            });
        });
    });
    
    /*Constructs the profile table of the user*/
    function profile(data){
        var obj = JSON.parse(data);
        var profile = '<div style="padding: 0px 150px">'+
            '<table class=\'table table-bordered table-condensed\'><thead>'+
            '<tr style="background-color: #006666; color: white"><th>Fields</th><th>User Information</th></tr></thead>'+
            '<tbody><tr><th>UserID</th><td>'+ obj[0]['ID']+'</td></tr>'+
            '<tr><th>Username</th><td>'+ obj[0]['Username']+'</td></tr>'+
            '<tr><th>Email</th><td>'+ obj[0]['Email']+'</td></tr>' +
            '<tr><th>Working Status</th><td>'+ obj[0]['WorkingStatus']+'</td></tr>'+
            '<tr><th>Show Tips Preference</th><td>'+ obj[0]['ShowTips']+'</td></tr>'+
            '<tr><th>Date Joined</th><td>'+ obj[0]['Date']+'</td></tr></tbody></table></div>';
        
        return profile;
    }
    
    /*constructs the Table consisting reminder change buttons*/
    function remind_table(data) {
        var tobj = JSON.parse(data);
        if(tobj.length > 0)
            {
                var table = '<h3 style="text-align: center">Your Tasks</h3>';
                table += '<table class=\'table table-bordered table-condensed\'>';
                table += '<thead><tr style="background-color: #006666; color: white">' +
                '<th>Task Name</th>' +
                '<th>Progress Status</th>' +
                '<th>Priority</th>' +
                '<th>Description</th>' +
                '<th>Date</th>' +
                '<th>Reminder Status</th>' +
                '<th>Reminder Buttons</th>' +
                '</tr></thead><tbody>';
                for(var i = 0; i < tobj.length; i++) {
                var priority = tobj[i]['Priority'];
                var color = assign_color(priority);
                table += '<tr style="background-color: '+ color+'">';
                table += '<td>' + (tobj[i])["TaskName"] + '</td>';
                table += '<td>' + (tobj[i])["Progress"] + '</td>';
                table += '<td>' + (tobj[i])["Priority"] + '</td>';
                table += '<td>' + (tobj[i])["Description"] + '</td>';
                table += '<td>' + (tobj[i])["Date"] + '</td>';
                table += '<td>' + (tobj[i])["Reminder"] + '</td>';
                table += '<td><button data-q-id="' +tobj[i]['ID'] + '" class="btn btn-secondary dropdown-toggle" style="width: 100%; background-color: '+ color+'">Change Reminder</button></td>';
                table += '</tr>';
                }
                table += '</tbody></table>';
            }
        else {
            var table = "<h3 style='text-align: center'>No Tasks Have Been Entered</h3>";
        }
        
        return table;
    }
    
    /*constructs the Table consisting delete change buttons*/
    function delete_table(data) {
        var tobj = JSON.parse(data);
        if(tobj.length > 0)
            {
                var table = '<h3 style="text-align: center">Your Tasks</h3><table class=\'table table-bordered table-condensed\'>';
                table += '<thead><tr style="background-color: #006666; color: white">' +
                '<th>Task Name</th>' +
                '<th>Progress Status</th>' +
                '<th>Priority</th>' +
                '<th>Description</th>' +
                '<th>Date</th>' +
                '<th>Delete Buttons</th>' +
                '</tr></thead><tbody>';
                for(var i = 0; i < tobj.length; i++) {
                var priority = tobj[i]['Priority'];
                var color = assign_color(priority);
                table += '<tr style="background-color: '+ color+'">';
                    table += '<td>' + (tobj[i])["TaskName"] + '</td>';
                    table += '<td>' + (tobj[i])["Progress"] + '</td>';
                    table += '<td>' + (tobj[i])["Priority"] + '</td>';
                    table += '<td>' + (tobj[i])["Description"] + '</td>';
                    table += '<td>' + (tobj[i])["Date"] + '</td>';
                    table += '<td><button data-q-id="' +tobj[i]['ID'] + '" class="btn btn-secondary dropdown-toggle" style="width: 100%; background-color: '+ color+'"> Delete</button></td>';
                table += '</tr>';
                }
                table += '</tbody></table>';
            }
        else {
            var table = "<h3 style='text-align: center'>No Tasks Have Been Entered</h3>";
        }
        
        return table;
    }
    
    /*constructs the Table consisting edit description change buttons*/
    function desc_table(data) {
        var tobj = JSON.parse(data);
        if(tobj.length > 0)
            {
                var table = '<h3 style="text-align: center">Your Tasks</h3>';
                table += '<div style="text-align: center; font-size: 2em"><label>Enter a Description and Click the "Set Description" button next to the Desired Record</label></div>';
                table += '<div style="height: 50px; padding: 0px 100px"><input type="text" class="form-control" id="descr" name=\'desc\' style="width: 100%; height: 100%; font-size: 25px; text-align: center" placeholder="Enter your Task\'s Description" required></div><br>';
                table += '<table class=\'table table-bordered table-condensed\'>';
                table += '<thead><tr style="background-color: #006666; color: white">' +
                '<th>Task Name</th>' +
                '<th>Progress Status</th>' +
                '<th>Priority</th>' +
                '<th>Description</th>' +
                '<th>Date</th>' +
                '<th>Set Buttons</th>' +
                '</tr></thead><tbody>';
                for(var i = 0; i < tobj.length; i++) {
                var priority = tobj[i]['Priority'];
                var color = assign_color(priority);
                table += '<tr style="background-color: '+ color+'">';
                    table += '<td>' + (tobj[i])["TaskName"] + '</td>';
                    table += '<td>' + (tobj[i])["Progress"] + '</td>';
                    table += '<td>' + (tobj[i])["Priority"] + '</td>';
                    table += '<td>' + (tobj[i])["Description"] + '</td>';
                    table += '<td>' + (tobj[i])["Date"] + '</td>';
                    table += '<td><button data-q-id="' +tobj[i]['ID'] + '" class="btn btn-secondary dropdown-toggle" style="width: 100%; background-color: '+ color+'">Set Description</button></td>';
                table += '</tr>';
                }
                table += '</tbody></table>';
            }
        else {
            var table = "<h3 style='text-align: center'>No Tasks Have Been Entered</h3>";
        }
        
        return table;
    }
    
    /*constructs the Table consisting change buttons*/
    function priority_table(data) {
        var tobj = JSON.parse(data);
        if(tobj.length > 0)
            {
                var table = '<h3 style="text-align: center">Your Tasks</h3>';
                table += '<div style="text-align: center; font-size: 2em"><label>Select a New Priority and Click "Change" button in front of the Desired Record</label></div>';
                table += '<div style="height: 50px; padding: 0px 100px"><select class="custom-select" id="prio" name="priority" style="width: 100%; height: 100%; font-size: 25px; text-align-last: center">';
                table += '<option selected value="Low">Low</option>';
                table += '<option value="Moderate">Moderate</option>';
                table += '<option value="High">High</option>';
                table += '</select></div><br>';
                table += '<table class=\'table table-bordered table-condensed\'>';
                table += '<thead><tr style="background-color: #006666; color: white">' +
                '<th>Task Name</th>' +
                '<th>Progress Status</th>' +
                '<th>Priority</th>' +
                '<th>Description</th>' +
                '<th>Date</th>' +   
                '<th>Change Buttons</th>' +
                '</tr></thead><tbody>';
                for(var i = 0; i < tobj.length; i++) {
                var priority = tobj[i]['Priority'];
                var color = assign_color(priority);
                table += '<tr style="background-color: '+ color+'">';
                    table += '<td>' + (tobj[i])["TaskName"] + '</td>';
                    table += '<td>' + (tobj[i])["Progress"] + '</td>';
                    table += '<td>' + (tobj[i])["Priority"] + '</td>';
                    table += '<td>' + (tobj[i])["Description"] + '</td>';
                    table += '<td>' + (tobj[i])["Date"] + '</td>';
                    table += '<td><button data-t-id="'+ tobj[i]['ID'] +'"class="btn btn-secondary dropdown-toggle" style="width: 100%; background-color: '+ color+'">Change</button></td>';
                table += '</tr>';
                }
                table += '</tbody></table>';
            }
        else {
            var table = "<h3 style='text-align: center'>No Tasks Have Been Entered</h3>";
        }
        
        return table;
    }
    
    /*constructs the Table consisting change buttons*/
    function progress_table(data) {
        var tobj = JSON.parse(data);
        if(tobj.length > 0)
            {
                var table = '<h3 style="text-align: center">Your Tasks</h3>';
                table += '<div style="text-align: center; font-size: 2em"><label>Select a New Progress Status and Click "Change" button in front of the Desired Record</label></div>';
                table += '<div style="height: 50px; padding: 0px 100px"><select class="custom-select" id="pro" name="progress" style="width: 100%; height: 100%; font-size: 25px; text-align-last: center">';
                table += '<option selected value="Incomplete">Incomplete</option>';
                table += '<option value="In Progress">In Progress</option>';
                table += '<option value="Completed">Completed</option>';
                table += '</select></div><br>';
                table += '<table class=\'table table-bordered table-condensed\'>';
                table += '<thead><tr style="background-color: #006666; color: white">' +
                '<th>Task Name</th>' +
                '<th>Progress Status</th>' +
                '<th>Priority</th>' +
                '<th>Description</th>' +
                '<th>Date</th>' +   
                '<th>Change Buttons</th>' +
                '</tr></thead><tbody>';
                for(var i = 0; i < tobj.length; i++) {
                var priority = tobj[i]['Priority'];
                var color = assign_color(priority);
                table += '<tr style="background-color: '+ color+'">';
                    table += '<td>' + (tobj[i])["TaskName"] + '</td>';
                    table += '<td>' + (tobj[i])["Progress"] + '</td>';
                    table += '<td>' + (tobj[i])["Priority"] + '</td>';
                    table += '<td>' + (tobj[i])["Description"] + '</td>';
                    table += '<td>' + (tobj[i])["Date"] + '</td>';
                    table += '<td><button data-t-id="'+ tobj[i]['ID'] +'"class="btn btn-secondary dropdown-toggle" style="width: 100%; background-color: '+ color+'">Change</button></td>';
                table += '</tr>';
                }
                table += '</tbody></table>';
            }
        else {
            var table = "<h3 style='text-align: center'>No Tasks Have Been Entered</h3>";
        }
        
        return table;
    }
    
    /*In complete Filter Button command*/
    $('#results').on('click','#Incom', function() {
        var val = $('#Incom').val();
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "filter",
            value: val
        };
        $.post(url, query,
              function(data) {
            $('#results').html(table(data));
        });
    });
    
    /*In Progress Filter Button command*/
    $('#results').on('click','#Inprog', function() {
        var val = $('#Inprog').val();
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "filter",
            value: val
        };
        $.post(url, query,
              function(data) {
            $('#results').html(table(data));
        });
    });
    
    /*Complete Filter Button Command*/
    $('#results').on('click','#com', function() {
        var val = $('#com').val();
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "filter",
            value: val
        };
        $.post(url, query,
              function(data) {
            $('#results').html(table(data));
        });
    });
    
    /*Show all Filter Button Command*/
    $('#results').on('click','#all', function() {
        var url = "controller.php";
        var query = {
            page: "AppPage",
            command: "List",
        };
        $.post(url, query,
              function(data) {
            $('#results').html(table(data));
        });
    });
    
    /*Contructs the list of tasks with buttons displayed at the bottom*/
    function table(data) {
        var tobj = JSON.parse(data);
        if(tobj.length > 0)
            {
                var table = '<h3 style="text-align: center">Your Tasks</h3><table class=\'table table-bordered table-condensed\'>';
                table += '<thead><tr style="background-color: #006666; color: white">' +
                '<th>Task Name</th>' +
                '<th>Progress Status</th>' +
                '<th>Priority</th>' +
                '<th>Description</th>' +
                '<th>Date</th>' +
                '</tr></thead><tbody>';
                for(var i = 0; i < tobj.length; i++) {
                var priority = tobj[i]['Priority'];
                var color = assign_color(priority);
                table += '<tr style="background-color: '+ color+'">';
                    table += '<td>' + (tobj[i])["TaskName"] + '</td>';
                    table += '<td>' + (tobj[i])["Progress"] + '</td>';
                    table += '<td>' + (tobj[i])["Priority"] + '</td>';
                    table += '<td>' + (tobj[i])["Description"] + '</td>';
                    table += '<td>' + (tobj[i])["Date"] + '</td>';
                table += '</tr>';
                }
                
            }
        else {
            var table = '<h3 style="text-align: center">Your Tasks</h3><table class=\'table table-bordered table-condensed\'>';
                table += '<thead><tr style="background-color: #006666; color: white">' +
                '<th>Task Name</th>' +
                '<th>Progress Status</th>' +
                '<th>Priority</th>' +
                '<th>Description</th>' +
                '<th>Date</th>' +
                '</tr></thead><tbody>';
        }
        
        table += '<tr style="font-size: 15px; background-color: #006666;"><th style="color: white">Show Only:</th>'+
                    '<td><button id="Incom" class="btn btn-secondary dropdown-toggle" value="Incomplete" style="width: 100%; background-color: #FFFFFF; font-weight: bold">Incomplete</button></td>'+
                    '<td><button id="Inprog" value="In Progress" class="btn btn-secondary dropdown-toggle" style="width: 100%; background-color: #FFFFFF; font-weight: bold">In Progress</button></td>'+
                    '<td><button id="com" value="Completed" class="btn btn-secondary dropdown-toggle" style="width: 100%; background-color: #FFFFFF; font-weight: bold">Complete</button></td>'+
                    '<td><button id="all" class="btn btn-secondary dropdown-toggle" style="width: 100%; background-color: #FFFFFF; font-weight: bold">Show All</button></td>'+
                    '</tr>';
                table += '</tbody></table>';
        
        return table;
    }
    
    /*Contruct table consisting remind change button*/
    function reminder_table(data) {
        var tobj = JSON.parse(data);
        if(tobj.length > 0)
            {
                var table = '<h2 style="text-align: center">You have these Tasks Set for Reminder</h2><table class=\'table table-bordered table-condensed\'>';
                table += '<thead><tr style="background-color: #006666; color: white">' +
                '<th>Task Name</th>' +
                '<th>Progress Status</th>' +
                '<th>Priority</th>' +
                '<th>Description</th>' +
                '<th>Date</th>' +
                '</tr></thead><tbody>';
                for(var i = 0; i < tobj.length; i++) {
                var priority = tobj[i]['Priority'];
                var color = assign_color(priority);
                table += '<tr style="background-color: '+ color+'">';
                    table += '<td>' + (tobj[i])["TaskName"] + '</td>';
                    table += '<td>' + (tobj[i])["Progress"] + '</td>';
                    table += '<td>' + (tobj[i])["Priority"] + '</td>';
                    table += '<td>' + (tobj[i])["Description"] + '</td>';
                    table += '<td>' + (tobj[i])["Date"] + '</td>';
                table += '</tr>';
                }
                table += '</tbody></table>';
            }
        else {
            var table = "";
        }
        
        return table;
    }
    
    /*Function that returns color depending on priority*/
    function assign_color(p)
    {
        var color;
        if(p == 'High')
        {
            color = 'rgba(255,0,0,0.5)';
        }
        else if(p == 'Moderate')
        {
            color = 'rgba(255,165,0,0.5)';
        }
        else{
            color = 'rgba(255,255,0,0.5)';
        }
        
        return color;
    }
</script>