<form action="#" method="post">
        <div class="form-group">
          <label>Email address</label>
          <input type="email" name="email" class="form-control" id="owner_login_email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="owner_login_password" placeholder="Password" required>
        </div>

        <div id="login_status"></div>
        <button type="button" class="btn btn-default" style="  background-color: #6d4c41;
  padding-left: 15px; color:#ccc;" id="owner_login_btn" >Login</button>

  <a class="btn btn-success" id="register_owner" role="button"><i class="fa fa-user-plus " aria-hidden="true"></i> Register</a>
      </form>

      <script>
        $("#owner_login_btn").click(function(){
              var email1 = $("#owner_login_email").val();
              var password1 = $("#owner_login_password").val();

              if (email1==''|| password1=='') {
                  $("#login_status").html('Fill in Empty Fields').css("color","red");
              }else{
                  $.post("taxiOwner/config/login.php",{email:email1, password:password1}, function(data){
                      $("#login_status").html(data);
                      if(data=='success'){
                          window.location.href="taxiOwner/taxiowner.php";
                      }
                  });
              }            
        });


        $("#register_owner").click(function(){
            $("#login_load").load("taxiOwner/register.php");
            $(".changing_title").text("Register as a New Car Owner.");
        })
      
      </script>