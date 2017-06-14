<form action="login.php" method="post" id="Owner_reg_Company">
        <div class="form-group">
          <label >Company Name</label>
          <input type="text" name="cname" class="form-control" id="cname" placeholder="The Company Name You Want to Register" required>
        </div>

        <div class="form-group">
          <label >Location</label>
 <select class="form-control" id="location">
  <option value="">Select Location</option>     
<?php
include("../../config/connection.php");
  $select_county = "SELECT * FROM `counties`";
  $result_county = mysqli_query($con, $select_county);
  while($county = mysqli_fetch_array($result_county)){
  ?>
    <option value="<?=$county['name']; ?>"><?=$county['name']; ?></option>
  <?php    
  }
 ?> 
</select>           
        </div>


        <div class="form-group">
          <label >Description</label>
            <textarea class="form-control" rows="6" id="description" placeholder="Describe briefly details abotu yourr company. A good description is appealing to your customers"></textarea>       
             </div>

<div id="registration_status"></div>
        <button type="button" id="register_company_now" class="btn btn-default" style="  background-color: #6d4c41;
  padding-left: 15px; color:#ccc;" ><span class="glyphicon glyphicon-blackboard"></span> Register Company </button>


      </form>
<script>
    $("#register_company_now").click(function(){
        var cname1 = $("#cname").val();
        var location1 = $("#location").val();
        var description1 = $("#description").val();


        if (cname1==''||description1==''||location1=='') {
             $("#registration_status").html('<div class="alert alert-danger" role="alert">Fill In All Empty Fields. <span class="glyphicon glyphicon-info-sign"></span> A company Cannot Be Registered With Incomplete Details.</div>').css("color","red");
        }else{
                $.post("company/add.config.php",{cname:cname1, location:location1, description:description1 },function(data){
                        
                        if(data=='added'){
                            $("#Owner_reg_Company")[0].reset();
                             $("#registration_status").html('<div class="alert alert-success" role="alert"> <i class="fa fa-university" aria-hidden="true"></i> You Have Successfuly <i class="fa fa-thumbs-up fa-spin fa-fw" aria-hidden="true"></i><span class="sr-only">Loading...</span> Registered A Company To Online E-taxi, You Can View The Company Details Under Company Menu On The Stacked Navigation On The Left And Select View Company. In The Mean Time, Welcome To Eservices, we value you. <i class="fa fa-university fa-3x" aria-hidden="true"></i>. <i class="fa fa-cog fa-spin fa-3x fa-fw"></i> <span class="sr-only">Loading...</span></div>');
                        }else{
                           $("#registration_status").html(data).css("color","red");
                        }
                });

        }

    })

    </script>           