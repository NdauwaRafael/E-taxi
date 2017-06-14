<ol class="breadcrumb">
  <li><a zlass="go-home">Home</a></li>
  <li class="active">Library</li>
</ol>
<form action="login.php" method="post" id="Owner_reg_taxi_frm">
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
          <label >Desgnate Taxi</label>
            <select class="form-control" id="taxi">
            <option value="">Select Taxi</option>     
            <?php
            session_start();
            include("../../config/connection.php");
            $select_taxi = "SELECT * FROM `taxi` WHERE `owner`='{$_SESSION['owner_email']}'";
            $result_taxi = mysqli_query($con, $select_taxi);
            while($taxid = mysqli_fetch_array($result_taxi)){
            ?>
                <option value="<?=$taxid['plate']; ?>"><?=$taxid['plate']; ?></option>
            <?php    
            }
            ?> 
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
        <button type="button" id="register_taxi_now" class="btn btn-default" style="  background-color: #6d4c41;
  padding-left: 15px; color:#ccc;" >Registration </button>


      </form>
<script>
$(".go-home").click(function(){
    $("#owner_area").html('');
});

    $("#register_taxi_now").click(function(){
        var fname1 = $("#fname").val();
        var lname1 = $("#lname").val();
        var email1 = $("#email").val();
        var phone1 = $("#phone").val();
        var gender1 = $("#gender").val();
        var taxi1 = $("#taxi").val();
        var password1 = $("#password").val();
        var cpassword1 = $("#cpassword").val();

        if (fname1==''||lname1==''||email1==''||phone1==''||gender1==''||taxi1==''||password1==''||cpassword1=='') {
             $("#registration_status").html('Fill In All Empty Fields, A driver Cannot Be Added With Empty Fields').css("color","red");
        }else{
            if(password1==cpassword1){
                $.post("drivers/add.config.php",{fname:fname1, lname:lname1, email:email1, gender:gender1,taxi:taxi1, password:password1,phone:phone1 },function(data){
                        
                        if(data=='Success...'){
                            $("#Owner_reg_taxi_frm")[0].reset();
                            $("#registration_status").html('<div class="alert alert-success" role="alert"> <i class="fa fa-motorcycle" aria-hidden="true"></i> You Have Successfuly <i class="fa fa-thumbs-up fa-spin fa-fw" aria-hidden="true"></i><span class="sr-only">Loading...</span> Registered This Taxi Driver To Online E-taxi, You Can View The Taxi Driver Details Under Taxies Menu On The Stacked Navigation On The Left And Select View Drivers. The Car You Have Desgnated To This Driver Will Be Accessesible To This Driver Once The Driver Logs In Their E-Taxi Driver Account. <img src="../assets/icons/48/driver-48.png">. <i class="fa fa-cog fa-spin fa-3x fa-fw"></i> <span class="sr-only">Loading...</span></div>');
                        }else{
                            $("#registration_status").html(data);
                        }
                })
            }else{
               $("#registration_status").html('Password Do Not Match!!').css("color","red");
            }

        }

    })

    </script>