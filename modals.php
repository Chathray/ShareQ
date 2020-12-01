<!-- Setting Modal-->
<div class="modal animated--fade-in" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 25%">
        <div class="modal-content">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-1 d-flex flex-row align-items-center justify-content-between">
                <span class="small font-weight-bold pt-1">Settings</span>
            </div>
            <!-- Card Body -->
            <div class="card-body unselectable" style="font-size: 10.75pt">                    
                <div class="custom-control custom-checkbox my-1">
                    <input class="custom-control-input" type="checkbox" id="checkbox1" checked="checked">
                    <label class="custom-control-label" for="checkbox1">Switch square border pattern if possible</label>
                </div>
                <hr class="">
                <div class="custom-control custom-switch my-1">
                    <input class="custom-control-input" type="checkbox" id="switch1">
                    <label class="custom-control-label" for="switch1">Dark Mode</label>
                </div>
                <div class="custom-control custom-switch my-1">
                    <input class="custom-control-input" type="checkbox" id="switch2">
                    <label class="custom-control-label" for="switch2">Auto Sidebar</label>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if($isLoggedIn) {
    echo
    '<!-- Account Modal-->
    <div class="modal animated--fade-in" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 25%">
    <div class="modal-content">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-1 d-flex flex-row align-items-center justify-content-between">
    <span class="small font-weight-bold pt-1">Account</span>
    <div class="d-flex justify-content-end">
    <button type="button" class="btn btn-sm btn-circle" onclick="ResetSession();" title="Restore" data-toggle="tooltip">
    <i class="fa fa-sync-alt"></i>
    </button>
    <button type="button" class="btn btn-sm btn-circle" onclick="SubmitAccountData();" title="Save Changes" data-toggle="tooltip">
    <i class="fa fa-save"></i>
    </button>
    </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="text-center">
    <div class="sidebar-brand-icon">
    <img class="img-profile rounded-circle" src="img/avatar.png" width="64">
    </div>
    <h5 class="text-gray-800 mb-3 mt-3" id="user-id">'.$_SESSION['user_id'].'</h5>
    </div>
    <div class="input-group input-group-sm mb-3">
    <input type="text" class="form-control rounded-pill-left" id="user-name" placeholder="Username" value="'.$_SESSION['user_name'].'">
    <input type="hidden" id="user-namebk" value="'.$_SESSION['user_name'].'">
    <div class="input-group-append">
    <span class="input-group-text bg-white">
    <i class="fa fa-user-alt text-primary"></i>
    </span>
    </div>
    </div>
    <div class="input-group input-group-sm mb-3">
    <input type="text" class="form-control rounded-pill-left" id="user-pass" placeholder="Password" value="'.$_SESSION['user_pass'].'">
    <input type="hidden" id="user-passbk" value="'.$_SESSION['user_pass'].'">
    <div class="input-group-append">
    <span class="input-group-text bg-white">
    <i class="fa fa-key text-warning"></i>
    </span>
    </div>
    </div>
    <div class="input-group input-group-sm mb-3">
    <input type="text" class="form-control rounded-pill-left" id="user-email" placeholder="Email" value="'.$_SESSION['user_email'].'">
    <input type="hidden" id="user-emailbk" value="'.$_SESSION['user_email'].'">
    <div class="input-group-append">
    <span class="input-group-text bg-white">
    <i class="fa fa-envelope text-success"></i>
    </span>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>';
    return;
}
?>

<!-- Login Modal-->
<div class="modal animated--grow-in" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="p-3">
                    <div class="text-center pb-5">
                        <div class="sk-folding-cube">
                          <div class="sk-cube1 sk-cube"></div>
                          <div class="sk-cube2 sk-cube"></div>
                          <div class="sk-cube4 sk-cube"></div>
                          <div class="sk-cube3 sk-cube"></div>
                        </div>
                      <span style="font-size: 13pt">Sign in to Share?</span>
                  </div>
                    <form class="user" id="loginForm">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="lgnID" placeholder="Your ID">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="lgnPass" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary btn-user btn-block"
                            onclick="Signin($('#lgnID').val(), $('#lgnPass').val())">
                            Let's Go
                        </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#" data-toggle="modal" data-target="#forgotModal" onclick="$('.modal').modal('hide');">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <a class="small" href="#" data-toggle="modal" data-target="#registerModal" onclick="$('.modal').modal('hide');">Create an Account!</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Register Modal-->
<div class="modal animated--grow-in" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="p-3">
                    <div class="text-center pb-5">
                        <div class="sk-folding-cube">
                          <div class="sk-cube1 sk-cube"></div>
                          <div class="sk-cube2 sk-cube"></div>
                          <div class="sk-cube4 sk-cube"></div>
                          <div class="sk-cube3 sk-cube"></div>
                        </div>
                        <span style="font-size: 13pt">Create an Account!</span>
                    </div>
                    <form class="user" id="registerForm">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="rgtID" placeholder="Your ID">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="rgtPass" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="rgtRePass" placeholder="Repeat Password">
                        </div>
                        <a href="#" class="btn btn-primary btn-user btn-block"
                            onclick="Signup($('#rgtID').val(), $('#rgtPass').val(), $('#rgtRePass').val())">
                            Register Account
                      </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#" data-toggle="modal" data-target="#loginModal" onclick="$('.modal').modal('hide');">Already have an account? Login!</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Forgot Modal-->
<div class="modal animated--grow-in" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="p-4">
                    <div class="text-center">
                        <span style="font-size: 14pt">Forgot Your Password?</span>
                        <p class="mb-4 small text-gray-400">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                    </div>
                    <form class="user">
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="fgtEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                        </div>
                        <a href="#" class="btn btn-primary btn-user btn-block" onclick="ResetPassword($('#fgtEmail').val());">
                          Reset Password
                      </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#" data-toggle="modal" data-target="#registerModal" onclick="$('.modal').modal('hide');">Create an Account!</a>
                </div>
                <div class="text-center">
                    <a class="small" href="#" data-toggle="modal" data-target="#loginModal" onclick="$('.modal').modal('hide');">Already have an account? Login!</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
   
function ResetPassword(email)
{
    $.post( "php/forgot.php", { frgEmail: email } )
    .done(function( data ) {
        if(data == 1)
            $.alert('Your password has been sent to your email.')
        else
            $.alert("Can't completely.");
    });


}


</script>
