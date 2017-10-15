<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <script src="<?php echo base_url('assets/jquery/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

    <style type="text/css">
    body
    {
        background: url('<?php echo base_url('assets/img/R1.jpg') ?>') fixed;
        background-size: cover;
        padding: 0;
        margin: 0;
    }  

</style>
</head>
<body>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="loginform" class="form-horizontal" role="form" method="POST" action="<?php echo base_url('Login/cek_login') ?>">

                     <?php echo form_error('username', '<div class="alert alert-danger" role="alert" > <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>', '</div>'); ?>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="username" type="text" class="form-control" name="username" value="<?php echo set_value('username') ?>" placeholder="Username">                                        
                    </div>

                    <?php echo form_error('password', '<div class="alert alert-danger" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>', '</div>'); ?>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>


                    <div class="input-group">
                      <div class="checkbox">
                        <label>
                          <input  type="checkbox" id="remember" name="remember" value="1"> Remember me
                      </label>
                  </div>
              </div>


              <div style="margin-top:10px" class="form-group">
                <!-- Button -->

                <div class="col-sm-12 controls">
                  <input type="submit" id="btn-login"  class="btn btn-success" value="Login">
              </div>
          </div>

<!-- 
              <div class="form-group">
                <div class="col-md-12 control">
                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                        Don't have an account! 
                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                            Sign Up Here
                        </a>
                    </div>
                </div>
            </div>   -->  
        </form>     



    </div>                     
</div>  
</div>
<!-- <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
        </div>  
        <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form">

                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>Error:</p>
                    <span></span>
                </div>



                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                    </div>
                </div>

                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="icode" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                                      
                    <div class="col-md-offset-3 col-md-9">
                        <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                        <span style="margin-left:8px;">or</span>  
                    </div>
                </div>

                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">

                    <div class="col-md-offset-3 col-md-9">
                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                    </div>                                           

                </div>



            </form>
        </div>
    </div>

</div>  -->
</div>


</body>
</html>