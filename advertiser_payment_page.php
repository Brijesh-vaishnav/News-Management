<?php
session_start();
$email = $_SESSION["login"];
// echo "<script>alert('$email'); </script>";

if (isset($_SESSION["login"])) {
    if ($_SESSION["type"] != "Advertiser")
        echo "<script>document.location='./admin/login.php' </script>";
} else {
    // echo "<script>alert('bye'); </script>";
    echo "<script>document.location='./admin/login.php' </script>";
}
?>

<?php
$api_key = "rzp_test_VWtIgKTE2o0hTH";
?>



<form action="payment-success.php" method="POST">
    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key=<?php echo $api_key ?> // Enter the Test API Key ID generated from Dashboard → Settings → API Keys data-amount=<?php echo $_GET["price"] * 100 ?> // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35. data-currency="INR" // You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account data-id=<?php echo "OID" . rand(10, 100) ?>// Replace with the order_id generated by you in the backend. data-buttontext="Pay with Razorpay" data-name="News Portal" data-description="Pay safely" data-image="https://example.com/your_logo.jpg" data-prefill.name="Parth Shrimali" data-prefill.email="shrimaliparth@gmail.com" data-theme.color="#F37254"></script>
    <!-- for user -->
    <!-- for advertiser only -->
    <input type="hidden" name="advertise_id" value=<?php echo $_GET["advertise_id"] ?> />
    <input type="hidden" custom="Hidden Element" name="period" value=<?php echo $_GET["period"] ?>  />
</form>

<script>
    document.querySelector(".razorpay-payment-button").style.visiblity = "hidden";
    document.querySelector(".razorpay-payment-button").click();
</script>