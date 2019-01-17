<?php
include('connect.php');

if(isset($_POST) & !empty($_POST)){
$title = $_POST['title']; // get by post method
$fnm = $_POST['fnm'];
$lnm = $_POST['lnm'];
$cnm = $_POST['cnm'];
$caddress = $_POST['caddress'];
$state1 = $_POST['state1'];
$city1 = $_POST['city1'];
$zcode1 = $_POST['zcode1'];
$mob = $_POST['mob'];
$phone1 = $_POST['phone1'];
$email = $_POST['email'];
$nat = $_POST['nat'];
$products = $_POST['products'];
$ownership = $_POST['ownership'];
$other = $_POST['other'];
$message = $_POST['message'];
    
   if(!isset($title) || empty($title)){ 
       $error[]="Title is required";
}
    if(!isset($fnm) || empty($fnm)){ 
       $error[]="First name is required";
}
    if(!isset($lnm) || empty($lnm)){ 
       $error[]="L name is required";
}
    if(!isset($cnm) || empty($cnm)){ 
       $error[]="company name is required";
}
    if(!isset($caddress) || empty($caddress)){ 
       $error[]="address is required";
}
    if(!isset($state1) || empty($state1)){ 
       $error[]="state is required";
}
    if(!isset($city1) || empty($city1)){ 
       $error[]="city is required";
}
    if(!isset($zcode1) || empty($zcode1)){ 
       $error[]="pin code is required";
}
    if(!isset($mob) || empty($mob)){ 
       $error[]="mobile is required";
}
    if(!isset($email) || empty($email)){ 
       $error[]="email is required";
}
    if(!isset($nat) || empty($nat)){ 
       $error[]="nature is required";
}
    if(!isset($products) || empty($products)){ 
       $error[]="products is required";
}
if(!isset($ownership) || empty($ownership)){ 
       $error[]="ownership is required";
}
if(!isset($error) || empty($error)){ 
       $to ="priya@razorbee.com";
    $headers="From :"  .$email;
    if(mail($to,$fnm,$lnm,$cnm,$caddress,$state1,$city1,$zcode1,$mob,$email,$nat,$nat,$products)){
       $ins ="insert into dealership values('','".$title."','".$fnm."','".$lnm."','".$cnm."','".$caddress."','".$state1."','".$city1."','".$zcode1."','".$mob."','".$phone1."','".$email."','".$nat."','".$products."','".$ownership."','".$other."','".$message."')";
        if(mysqli_query($connection,$ins)){
            echo "Message received";
        }
        else{
            echo "failed to send";
        }
    }
}
 
}
    ?>
<?php include('head.php');?>
<?php include('header.php');?>	

<div class="bg"><img src="img/business.jpg" class="img-fluid" style="filter: blur(1px);
  -webkit-filter: blur(1px);">
       <div class="hero-text">
    <h1 style="color:#ffffff">Business</h1>
    <div class="btn-group btn-breadcrumb breadcrumb-default" style="margin-left:-320px;">
            <a href="index.php" class="btn btn-default"><i class="glyphicon glyphicon-home"  style="color:white;"></i></a>
         <div class="btn btn-default visible-xs-block hidden-xs visible-sm-block ">...</div>
            <div class="btn btn-info1" style="color:white;"><b>Business</b></div>
        </div>
  </div>

    </div>
  
<div class="container">
    <div class="row">
		<h3 style="text-align:center;margin-top:20px;">Dealership Form</h3>
<form method="post" id="order_form" class="dealerform">
<div class="row">
<div class="col-lg-2">
<div class="form-group">

<label>Title:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-check"></span> </div>
<select class="form-control" name="title" required="">
<option selected="selected" disabled="disabled" value="">Select Option</option>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>

</div>
</div>
</div>
<div class="col-lg-5">
<div class="form-group">

<label for="text">First Name:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </div>
<input id="fn" class="form-control" name="fnm" type="text" pattern="^[a-zA-Z]*$" placeholder="Enter First Name" required="">

</div>
</div>
</div>
<div class="col-lg-5">
<div class="form-group">

<label for="text">Last Name:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </div>
<input id="ln" class="form-control" name="lnm" type="text" pattern="^[a-zA-Z]*$" placeholder="Enter Last name" required="">

</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4">
<div class="form-group">

<label for="text">Company Name:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-building"></i> </div>
<input id="cn" class="form-control" name="cnm" type="text" pattern="^[a-zA-Z0-9][-./&amp;+\w\s]*$" placeholder="Enter Company name" required="">

</div>
</div>
</div>
<div class="col-lg-8">
<div class="form-group">

<label for="text">Address:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-address-book"></i></div>
<input id="address" class="form-control" name="caddress" type="text" pattern="^[#]{1}[a-zA-Z0-9]+[\,][a-zA-Z0-9\s]|[a-zA-Z0-9\s,'-]*$" placeholder="Enter Company Address" required="">

</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4">
<div class="form-group"><label for="text">State:<span style="color:red;">*</span></label>
<select id="state" class="form-control" name="state1" required="">
<option selected="selected" value="Select State" disabled="disabled">Select State</option>
<opti   on value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Puducherry">Puducherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select></div>
</div>
<div class="col-lg-4">
<div class="form-group"><label for="text">City:<span style="color:red;">*</span></label>
<input id="city" class="form-control" name="city1" type="text" pattern="^[a-zA-Z]+$" placeholder="City" required=""></div>
</div>
<div class="col-lg-4">
<div class="form-group"><label for="text">Postal/Zip-Code:<span style="color:red;">*</span></label>
<input id="zcode" class="form-control" name="zcode1" type="text" pattern="^[0-9]{6,8}$" placeholder="Enter Postal code" required=""></div>
</div>
</div>
<div class="row">
<div class="col-lg-4">
<div class="form-group">
<label for="text">Mobile:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
<input id="mobile" class="form-control" name="mob" type="tel" pattern="^[789]\d{9}$" maxlength="10" placeholder="Enter Valid Mobile number" required="">
</div>
</div>
</div>
<div class="col-lg-4">
<div class="form-group">
<label for="text">Phone:</label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></div>
<input id="phone" class="form-control" name="phone1" type="text" pattern="^(\+)?[0-9]+(-[0-9]+)?(-[0-9]+)?(-[0-9]+)?$" placeholder="Enter Valid Phonenumber">
</div>
</div>
</div>
<div class="col-lg-4">
<div class="form-group">
<label for="email">Email:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
<input id="Email" class="form-control" name="email" type="email" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" placeholder="Email" required="">
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="form-group"><label for="text">Nature of Business:<span style="color:red;">*</span></label>
<input id="nature" class="form-control" name="nat" type="text" pattern="^[a-zA-Z][a-zA-Z '-&amp;\s]|[a-zA-Z]*$" placeholder="Eg: Seller of Home Appliances/Online Sellers of various products and services etc." required="">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="form-group"><label for="text">Please mention the brand/products for which you are dealers/distributors (if any):<span style="color:red;">*</span></label>
<input id="brands" class="form-control" name="products" type="text" pattern="^[a-zA-Z0-9][\,]|[\&amp;]|[\w]|[\s]|[\-][a-zA-Z0-9] |[a-zA-Z0-9] *$" placeholder="Brands/Products" required="">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="form-group">
<label for="text">Ownership Structure:<span style="color:red;">*</span></label>
<select class="form-control" name="ownership" id="owner" onchange="if (this.value=='other'){this.form['other'].style.display='inherit'}else {this.form['other'].style.display='none'};" required="">
   <option selected="selected" disabled="disabled" value="">
   Select Option</option>
	<option value="Public Company"> Public Company</option>
	<option value="Private Limited Company">Private Limited Company</option>
	<option value="Proprietorship">Proprietorship</option>
        <option value="Partnership">Partnership</option>
	<option value="other">Others</option>
  </select>
<br>
  <input type="text" class="form-control" name="other" style="display:none;" pattern="^[a-zA-Z][\w\s]$" placeholder="Enter Details">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 msg">
<div class="form-group">
<label for="text">Message:</label>
<textarea name="message" cols="50" rows="10" class="form-control"></textarea>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 hidden-xs hidden-sm"></div>
<div class="col-lg-4">
 <button id="submit" name="submit" align="center" class="btn btn-lg btn-warning btn-block" type="submit" width="50px" style="margin-top:25px;">Send Query</button><div id="message"></div> 
</div>

    
 
</div>
</form>
    </div>
</div>

<?php include('footer.php');?>
  <?php include('script.php');?>
