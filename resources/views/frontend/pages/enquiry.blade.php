<!doctype html>
<html lang="en">
  <head>
    <title>Enquiry</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0"/>
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
    <meta name="format-detection" content="telephone=no"/>
   <?php include 'header.php';?>
   

<!--<div class="inner-banner contact-banner " >
   <img src="images/contact-banner.jpg" class="w-100">
    </div>-->
    
    <div class="inner-banner " style="background: linear-gradient(45deg, #013b49, #1a83a191);">

   <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-title">
            <div>
          <h1 class="heading wow animate fadeInUp" >Contact Us</h1>

                 <ul>
                   <li><a href="index.php" class="txt-color">Home </a><span class="txt-color">/</span></li>
                    
                      <li><a href="enquiry.php">Enquiry</a></li>
                 </ul>  
                 </div>  
                 </div>  
        </div>
      </div>
    </div>
    
	  
    </div>




<section class="pad100 ">
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-8">
               <div class="enquiry-form">
                   <h2 class="heading">Enquiry</h2>
 <form method="POST" action="insert.php">
       
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" id="name" required="" placeholder="Name">
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" required="" placeholder="Email Id" >
              </div>
            </div>
            
			 <div class="col-md-12">
			     <div class="form-group">
                    <input type="text" class="form-control" name="phone" id="phone" required="" placeholder="Phone Number" maxlength="10" size="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event,this)">
                 </div>
            </div>
          
			             
	
            	<div class="col-md-12">
                <div class="form-group">
                    <textarea class="form-control" name="message" placeholder="Message" id="message" required="" rows="3"></textarea>
                 
              </div>
            </div>
             
            <div class="col-md-12">
                <button type="submit" name="submit_enquire" value="submit_enquire" class="form-btn mt-2 ">SUBMIT </button>
                
            </div>
          </div>
        </form>
        </div>
           </div>
           
           <div class="col-md-4">
               <div class="contact-infor">
                   <h6>Contact Information</h6>
                    <div class="regis-add">
	            <span><img src="images/location.svg" width="50" ></span>
	             <div class="add-detais">
	            <h5>Address</h5>
	             
	             <p>AG-47, Sanjay Gandhi Transport Nagar,<br> Delhi-110042 (India)</p>
	            </div>
	         </div>
	         
	          <div class="regis-add ">
	            
	           <span><img src="images/phone.svg" width="40" ></span>
	              <div class="add-detais">
	             <h5>Contact Number.</h5>
	             <p> +91 - 1141544900</p>
	             </div>
	         </div>
	         
	          <div class="regis-add">
	            <span><img src="images/email.svg" width="40" ></span>
	             <div class="add-detais">
	             <h5>Email Id:</h5>
	             <p>info@alimail.in</p>
	             </div>
	              
	         </div>
               </div>
               
           </div>



      </div>
    </div>
</section>	

<div class="pad800 ">
 
  <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3498.4545152740393!2d77.14764017550458!3d28.735843675608418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjjCsDQ0JzA5LjAiTiA3N8KwMDknMDAuOCJF!5e0!3m2!1sen!2sin!4v1732621619062!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
             
                

 </div>
 </div>

<?php include 'footer.php';?>

 