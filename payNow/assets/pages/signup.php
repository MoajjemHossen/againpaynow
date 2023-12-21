<h1>This is Sign up page</h1>




<!-- form -->



<div class="container-fluid ">
  <div class="wraper">
          <div class="main_div">
        <div class="form_title">
          <h1>Please input your infomation</h1>
        </div>
        <div class="form_fields">
          <form action="assets/inc/process.php" method="post" accept-charset="utf-8">

            <div class="form-group">
              <label for="">Full name</label>
              <input type="text" name="fullName" value="<?= showPreviousValue('fullName') ?>" class="form-control" placeholder="Full Name "><?=showError('fullName')?>
            </div>
           
            <div class="form-group">
              <label for="exampleInputNumber1">Mobile Number</label>
              <input type="number" value="<?=showPreviousValue('cellphone')?>" name="cellphone" class="form-control" id="exampleInputNumber1" aria-describedby="numberHelp" placeholder="Enter Your Mobile Number"><?=showError('cellphone')?>
              <small id="numberHelp" class="form-text text-muted">We'll never share your number whith anyone else.</small>
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Email Address</label>
              <input type="email" value="<?=showPreviousValue('email')?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email"><?=showError('email')?>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email whith anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              <?=showError('password')?>
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label for="exampleCheck1" class="form-check-label">Check me out.</label>
            </div>
            <input type="submit" name="signupBtn" value="Signup">

          </form>
        </div>
      </div>
      
    
  </div>
</div>







