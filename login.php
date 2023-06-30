<?php 
include "path.php";
include ROOT_PATH . "/app/controllers/users.php";
require_once ROOT_PATH . "/app/helpers/middleware.php";

include ROOT_PATH."/app/include/header.php" ;
include ROOT_PATH . "/app/helpers/formErrors.php";
guestOnly();
?>
<style>
  header {
    display: hidden;
  }
</style>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://th.bing.com/th/id/R.424de86db969a3f3232152d847645ac8?rik=y86nE1a5nnrxzQ&pid=ImgRaw&r=0"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">We are D2F Team</h4>
                </div>

                <form action="login.php" method ="post">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <input value="<?php echo $username; ?>" name="username" type="text" id="form2Example11" class="form-control"
                      placeholder="Phone number or email address" />
                    <label  class="form-label" for="form2Example11">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input value="<?php echo $password; ?>" name="password" type="password" id="form2Example22" class="form-control" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name='login-btn' type="submit">Log
                      in</button>
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button  type="button" class="btn btn-outline-danger"> <a href="<?php echo BASE_URL . '/register.php' ?>"> Create new</a></button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
include ROOT_PATH."/app/include/footer.php" ;
?>