<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
    $etname=$_POST['etname'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $category=$_POST['category'];
    $email=$_POST['email'];
    $sql="INSERT INTO  tblenterprises(enterpriseName,username,password,category,email) 
VALUES(:etname,:username,:password,:category,:email)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':etname',$etname,PDO::PARAM_STR);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':category',$category,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        $_SESSION['msg']="You are Scuccessfully registered. Now you can login ";

    }
    else
    {
        $_SESSION['msg']="Something went wrong. Please try again.";

    }
}
?>
<!--Javascript for check email availabilty-->
<script>
    function checkAvailability() {

        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data:'username='+$("#username").val(),
            type: "POST",
            success:function(data){
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body modal-spa">
                    <div class="login-grids">
                        <div class="login">
                            <div class="login-left">
                                <ul>
                                    <br></br>
                                    <h3>Sign Up with</h3>
                                    <h3><b>SMART Journey<b></h3>
                                    <h3>for free</h3>
                                    <p>By connecting with SMART Journey you can get these <a href="ourservices.php">Services</a></p>
                                </ul>
                            </div>
                            <div class="login-right">
                                <form name="signup" method="post">
                                    <h3><b>Create your account<b></h3>


                                    <input type="text" value="" placeholder="Enterprise Name" name="etname" autocomplete="off" required="">
                                    <input type="text" value="" placeholder="Username" name="username" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">
                                    <span id="user-availability-status" style="font-size:12px;"></span>
                                    <input type="password" value="" placeholder="Password" name="password" required="">
                                    <input type="category" value="" placeholder="Category" name="category" required="">
                                    <input type="email" value="" placeholder="Email" name="email" required="">
                                    <input type="submit" name="submit" id="submit" value="CREATE ACCOUNT">
                                </form>
                            </div>
                            <div class="clearfix"></div>

                        </div>
            </section>
        </div>
    </div>
</div>
