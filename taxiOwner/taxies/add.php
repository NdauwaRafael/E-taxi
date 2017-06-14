<?php
 require "../config/company_details.php";

?>
<form action="login.php" method="post" id="Owner_reg_Taxi">
        <div class="form-group">
          <label >Taxi Plate</label>
          <input type="text" name="plate" class="form-control" id="taxiplate" placeholder="Taxi Plate Number" required>
        </div>   

        <div class="form-group">
          <label >Taxi Route</label>
          <input type="text" name="cname" class="form-control" id="taxiroute" placeholder="Route Assigned" required>
        </div>             

        <div class="form-group">
          <label >Taxi Company</label>
            <select class="form-control" id="taxicompany">
            <option value="">Select Location</option>
            <option value="<?=$comapany_id;?>"><?=$company_name;?></option>
            <option value="3">Privately Owned</option>  

            </select>           
        </div>


        <div class="form-group">
          <label >Cab Description(Optional)</label>
            <textarea class="form-control" rows="6" id="taxidescription" placeholder="Describe briefly details this Car. A good description is appealing to your customers"></textarea>       
             </div>

<div id="registration_status"></div>
        <button type="button" id="register_taxi_now" class="btn btn-default" style="  background-color: #6d4c41;
  padding-left: 15px; color:#ccc;" ><span class="glyphicon glyphicon-blackboard"></span> Register Cab </button>


      </form>

<script>

    $("#register_taxi_now").click(function(){
        var plate1 = $("#taxiplate").val();
        var route1 = $("#taxiroute").val();
        var description1 = $("#taxidescription").val();
        var company1 =  $("#taxicompany").val();


        if (plate1==''||route1==''||description1==''||company1=='') {
             $("#registration_status").html('<div class="alert alert-danger" role="alert">Fill In All Empty Fields. <span class="glyphicon glyphicon-info-sign"></span> A Taxi Cannot Be Registered With Incomplete Details.</div>').css("color","red");
        }else{
                $.post("taxies/add.config.php",{plate:plate1,route:route1, description:description1, company:company1 },function(data){
                        
                        if(data=='added'){
                            $("#Owner_reg_Taxi")[0].reset();
                             $("#registration_status").html('<div class="alert alert-success" role="alert"> <i class="fa fa-motorcycle" aria-hidden="true"></i> You Have Successfuly <i class="fa fa-thumbs-up fa-spin fa-fw" aria-hidden="true"></i><span class="sr-only">Loading...</span> Registered This Taxi To Online E-taxi, You Can View The Taxi Details Under Taxies Menu On The Stacked Navigation On The Left And Select View Taxies. Enjoy Our services. <i class="fa fa-taxi fa-3x" aria-hidden="true"></i>. <i class="fa fa-cog fa-spin fa-3x fa-fw"></i> <span class="sr-only">Loading...</span></div>');
                        }else{
                           $("#registration_status").html(data).css("color","red");
                        }
                });

        }

    })


</script>      