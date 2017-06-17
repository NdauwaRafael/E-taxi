<form action="login.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="login_email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="login_password" placeholder="Password" required>
        </div>

        <div id="login_status"></div>
        <button type="button" class="btn btn-default" style="  background-color: #6d4c41;
  padding-left: 15px; color:#ccc;" id="login_btn" >Login</button>


      </form>
<script>
          $("#login_btn").click(function(){
              var email1 = $("#login_email").val();
              var password1 = $("#login_password").val();

              if (email1==''|| password1=='') {
                  $("#login_status").html('Fill in Empty Fields').css("color","red");
              }else{
                  $.post("police/login.config.php",{email:email1, password:password1}, function(data){
                      $("#login_status").html(data);
                      if(data=='success'){
                          window.location.href="police/police.php";
                      }
                  });
              }
          })    
</script>      