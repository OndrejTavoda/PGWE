


<form name="loginForm" action="router.php" onsubmit="return validateLoginForm()">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input id="login-username" type="email" class="form-control" name="username" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input id="login-password" type="password" class="form-control" name="password" required>
  </div>
  <!-- <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div> -->
    <input id="action" type="hidden" value="login" name="action">
    <button id="login-submit" type="submit" class="btn btn-default">Submit</button>
</form>

<form name="registerForm" action="router.php"  onsubmit="return validateRegisterForm()">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email/Username</b></label>
    <input type="text" placeholder="Enter Email" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <!-- <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required> -->
    <hr>
    <input type="hidden" value="register" name="action">
   <button type="submit" class="registerbtn">Register</button>
  </div>

</form>