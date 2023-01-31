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
    $sql="INSERT INTO  tblenterprises(enterpriseName,username,password,category,email,introduction) 
VALUES(:etname,:username,:password,:category,:email,:introduction)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':etname',$etname,PDO::PARAM_STR);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':category',$category,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':introduction',$introduction,PDO::PARAM_STR);
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


<div class="cover">
    <div class="bg">
        <div class="form">
            <h3 class="header-text"><b>Create Your <span style="color: #4A8EFF">ENTERPRISE</span> <br>Account<b></h3>
            <div class="submit-form">
                <form name="signup" method="post">

                    <input type="text" value="" id="E_name" placeholder="Enterprise Name" name="etname" autocomplete="off"
                           required="">
                    <br>
                    <input type="text" value="" placeholder="Username" name="username" id="e_username"
                           onBlur="checkAvailability()"
                           autocomplete="off" required=""> <br>
                    <span id="user-availability-status" style="font-size:12px;"></span>
                    <input type="password" id="e_password" value="" placeholder="Password" name="password" required=""> <br>
                    <input type="category" id="e_type" value="" placeholder="Business Type" name="category" required=""> <br>
                    <input type="email" id="e_email" value="" placeholder="Email" name="email" required=""> <br>
                    <input type="text" id="e_intro" value="" placeholder="Introduction about your business" name="introduction" required=""> <br>
                    <input type="submit" name="submit" id="submit" value="CREATE ACCOUNT"> <br>

                </form>
                <div class="signin">
                    <a href="index.php"><button id="sign-in">SIGN-IN</button></a>

                </div>


            </div>
            <?php header('location:signup.php'); ?>


        </div>

    </div>

    <style>
        *{
            margin: 0;
            padding: 0;
        }

        .signin{
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid red;
        }

        .form{
            width: 600px;
            height: 550px;
            /*display: flex;*/
            /*border: 1px solid red;*/
            background-color: white;
            box-shadow: 0 0 0px #888888,
            0 0 5px #888888,
            0 0 10px #888888;
            border-radius: 10px;

        }

        .bg{
            background-image: url("images/enterprise_bg.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            height: 750px;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .form {
            text-align: center;

        }

        .header-text {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
            font-size: 40px;
        }

        .submit-form {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #submit{
            margin-top: 20px;
            width: 140px;
            height: 30px;
            border-radius: 10px;
            border: 3px solid #4A8EFF;
            background-color: #4A8EFF;
            color: white;
            font-weight: bold;
        }

        #sign-in{
            margin-top: 20px;
            width: 140px;
            height: 30px;
            border-radius: 10px;
            border: 3px solid #4A8EFF;
            background-color: #4A8EFF;
            color: white;
            font-weight: bold;
        }

        #submit:hover{
            background-color: white;
            color: #4A8EFF;
            cursor: pointer;

        }
        #e_username{
            height: 30px;
            width: 250px ;
            margin: 5px;
            border: 2px solid #4A8EFF;
            border-radius: 5px;
        }
        #E_name{
            height: 30px;
            width: 250px ;
            margin: 5px;
            border: 2px solid #4A8EFF;
            border-radius: 5px;
        }

        #e_password{
            height: 30px;
            width: 250px ;
            margin: 5px;
            border: 2px solid #4A8EFF;
            border-radius: 5px;
        }

        #e_type{
            height: 30px;
            width: 250px ;
            margin: 5px;
            border: 2px solid #4A8EFF;
            border-radius: 5px;
        }

        #e_email{
            height: 30px;
            width: 250px ;
            margin: 5px;
            border: 2px solid #4A8EFF;
            border-radius: 5px;

        }

        #e_intro{
            height: 30px;
            width: 250px ;
            margin: 5px;
            border: 2px solid #4A8EFF;
            border-radius: 5px;

        }
    </style>

</div>
