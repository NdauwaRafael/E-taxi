<form action="login.php" method="post" id="customer_reg_frm">
        <div class="form-group">
          <label >First Name</label>
          <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" required>
        </div>

        <div class="form-group">
          <label >Last Name</label>
          <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" required>
        </div>

        <div class="form-group">
          <label >Email address</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
        </div>

        <div class="form-group">
          <label >Phone Number</label>
          <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone Number" required>
        </div>

        <div class="form-group">
          <label>Gender</label>
            <select class="form-control" id="gender">
            <option value="">--------Select Gender------------</option>
            <option value="Female">Female</option>
            <option value="Male">Male</option>
            </select>          
        </div>

        <div class="form-group">
          <label >Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>

        <div class="form-group">
          <label >Confirm Password</label>
          <input type="password" name="password" class="form-control" id="cpassword" placeholder="Confirm Password" required>
        </div>

<div id="registration_status"></div>
        <button type="button" id="register" class="btn btn-default" style="  background-color: #6d4c41;
  padding-left: 15px; color:#ccc;" >Registration </button>


      </form>

<script>
    $("#register").click(function(){
        var fname1 = $("#fname").val();
        var lname1 = $("#lname").val();
        var email1 = $("#email").val();
        var phone1 = $("#phone").val();
        var gender1 = $("#gender").val();
        var password1 = $("#password").val();
        var cpassword1 = $("#cpassword").val();

        if (fname1==''||lname1==''||email1==''||phone1==''||gender1==''||password1==''||cpassword1=='') {
             $("#registration_status").html('Fill In All Empty Fields').css("color","red");
        }else{
            if(password1==cpassword1){
                $.post("customer/register.php",{fname:fname1, lname:lname1, email:email1, gender:gender1, password:password1,phone:phone1 },function(data){
                        $("#registration_status").html(data);
                        if(data=='Success...'){
                            $("#customer_reg_frm")[0].reset();
                            window.location.href="home.php";
                        }
                })
            }else{
               $("#registration_status").html('Password Do Not Match!!').css("color","red");
            }

        }

    })

    </script>          