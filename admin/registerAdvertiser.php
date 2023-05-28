<?php
  include('includes/config.php');
    if(isset($_POST["signup"]))
    {
        $username=$_POST["email"];
        $password=$_POST["password"];
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];

        $query = mysqli_query($con, "insert into advertiser(mail,password,fname,lname) values('$username','$password','$fname','$lname')") ;
        if($query)
        {
            echo "<script>alert('Registration completed')</script>";
        }
        else{
            echo "Registration failed";
        }
    }
?>


<script src="https://cdn.tailwindcss.com"></script>
<div class="container flex items-center justify-center h-full">
    <form class="w-full max-w-sm" action="" method="post">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Email
                <span style="color: red;"> *</span></label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="john123@gmail.com" name="email">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    First Name
                <span style="color: red;"> *</span></label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="John" name="fname">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                  Last Name
                <span style="color: red;"> *</span></label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="Doe" name="lname">
            </div>
        </div>
        
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                   Password
                <span style="color: red;"> *</span></label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password" name="password" placeholder="******************">
            </div>
        </div>
       
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" name="signup" type="submit">
                    Sign Up
                </button>
            </div>
        </div>
    </form>
</div>