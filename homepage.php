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
        <div class='row' id='buttons' style="color: white; background-color: #006666; padding-bottom: 20px;">
            <div class='col-sm-6'>
                <br><button class='btn btn-secondary dropdown-toggle' id='sign-in' style="color: white; background-color: #006666; width: 100%; font-size: 1.5em; font-weight: bold;" data-toggle='modal' data-target='#signin-modal'>Sign-In</button><br>
            </div>
            <div class='col-sm-6'>
                <br><button class='btn btn-secondary dropdown-toggle' id='join' style="color: white; background-color: #006666; width: 100%; font-size: 1.5em; font-weight: bold;" data-toggle='modal' data-target='#join-modal'>Join</button><br>
            </div>
        </div>
        <div class="row" id='home' style="padding: 150px 0px">
            <!--Prints the Message on the Home Page retrieved from controller-->
            <?php
                if(!empty($message))
                    echo '<h1 class="align-middle" style="font-size: 3em; text-align: center; font-weight: bold;">'.$message.'</h1>';
                else
                    echo '<h1 class="align-middle" style="font-size: 3em; text-align: center; font-weight: bold;">Welcome to An Efficient Lifestyle<br>Plan your Tasks and Achieve your Goals</h1>';
            ?>
        </div>
        <div class='row'>
            <!--Sign In Modal-->
            <div class='modal fade' id='signin-modal'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <form id='Signin-form' method='post' action='controller.php'>
                    <div class='modal-header'>
                        <h2 class='modal-title'>Sign-In</h2>
                    </div>
                    <div class='modal-body'>
                        <input type='hidden' name='page' value='HomePage'>
                        <input type='hidden' name='command' value='Signin'>
                        <div class='form-group'>
                            <label class="control-label" for="username">Username:</label> 
                            <input type="text" class="form-control" id="susername" name='username' placeholder="Enter your Username" required><br>
                            <label class="control-label" for="password">Password:</label> 
                            <input type="password" class="form-control" id="spassword" name='password' placeholder="Enter your Password" required>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <div class="form-group"> 
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-default" id='submitSign'>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            <!--Join Modal-->
            <div class='modal fade' id='join-modal'>
        <div class='modal-dialog modal-dialog-centered' role="document">
            <div class='modal-content'>
                <form id='join-form' method='post' action='controller.php'>
                    <div class='modal-header'>
                        <h2 class='modal-title'>Join</h2>
                    </div>
                    <div class='modal-body'>
                        <input type='hidden' name='page' value='HomePage'>
                        <input type='hidden' name='command' value='Join'>
                        <div class='form-group'>
                            <label class="control-label" for="username">Username:</label> 
                            <input type="text" class="form-control" id="username" name='username' placeholder="Enter your Username" required><br>
                            <label class="control-label" for="password">Password:</label> 
                            <input type="password" class="form-control" id="password" name='password' placeholder="Enter your Password" required><br>
                            <label class="control-label" for="email">Email ID:</label> 
                            <input type="text" class="form-control" id="email" name='email' placeholder="Enter your Email" required><br>
                            
                        </div>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="work">Working Status</label>
                                </div>
                                <select class="custom-select" id="work" name="work">
                                    <option selected value="Working">Working</option>
                                    <option value="Student">Student</option>
                                    <option value="Unemployed">Unemployed</option>
                                </select>
                    </div>
                    <div class='modal-footer'>
                        <div class="form-group"> 
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-default" id='submitJoin'>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
</body>
</html>