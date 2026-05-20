@extends('frontend.layouts.main')
@section('title', 'hcpl')
@section('meta_description', 'hcpl')
@section('meta_keywords', 'hcpl')
@section('canonical')
<link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')

<div class="inner-banner product-banner bg-grey" >
   
   <div class="product-caption">
     <h1>Contact Us</h1>
   </div>
   
</div>
    
<div class="pad100"  >
 <div class="container">
  <div class="row">
      
      <div class="col-md-8 mx-auto text-center">
           <h1 class="heading mb-3 " >Contact Us</h1>
           <p>Whether you are a player, sponsor, franchise owner, or media partner — our team is ready to help. Reach out through the form or contact us directly.</p>
                
	        
      </div>
      
      <div class="col-md-10 mx-auto mt-5">
          <div class="row">
              
          
  
    <div class="col-md-7">
	             
	         
	     <div class="contact-box">
	        
	        
	             <form id="contactForm">
	                 @csrf
	          <div class="row">
	            
	             
	             <div class="col-md-6">
	                 <div class="form-group">
	                     <label>Name*</label>
	                      <input type="text" class="form-control" name="name" id="name" required="" placeholder="Name">
	                      <span class="text-danger error-text name_error"></span>
	                 </div>
	             </div>
	             
	             <div class="col-md-6">
	                 <div class="form-group">
	<label>Email*</label>
	                   <input type="email" class="form-control" name="email" id="email" required="" placeholder="Email">
	                   <span class="text-danger error-text email_error"></span>
	                 </div>
	             </div>
	             
	             
	             <div class="col-md-12">
	                 <div class="form-group">
	                      <label>Phone No*</label>
	                      <input type="text" class="form-control" name="phone" id="phone" required="" placeholder="Phone Number" maxlength="10" size="10">
	                      <span class="text-danger error-text phone_error"></span>
	                 </div>
	             </div>
	             
	             <div class="col-md-12">
	                 <div class="form-group">
	                      <label>Message</label>
	                     <textarea id="message" required="" name="message" class="form-control" placeholder="Message" rows="4"></textarea>
	                     <span class="text-danger error-text message_error"></span>
	                 </div>
	             </div>
	             
	             
				<div class="col-md-12 ">
				     <button type="submit" id="submitBtn" class="form-btn btn mt-2">SUBMIT </button>
				</div>
	           
	             </div>
	             
	             </form>
	             
	             </div>
	             </div>
	    
<div class="col-lg-5 col-md-6">
    <div class="address-thumb">
        <div class="cnt-add">
	                   
	                 
	                  <h5>Address</h5>
	                  <p>{{ $web_setting->address ?? '165, New Railway Road, Bhim Nagar, Gurugram, Haryana-122001' }}</p>
	              </div>
	              <div class="cnt-add mt-4">
	                 
	                  <h5>Contact</h5>
	                  <p><a href="mailto:{{ $web_setting->email ?? 'info@hcplt20.com' }}">Email: {{ $web_setting->email ?? 'info@hcplt20.com' }}</a><br>
	                  <a href="tel:{{ $web_setting->phone ?? '+919211335612' }}">Phone No: {{ $web_setting->phone ?? '+91 9211335612' }}</a></p>
	              </div>
	              
	               <div class="cnt-add mt-4">
	                 
	                  <h5> Working Hours</h5>
	                  <p>Mon – Sat: 9:00 AM – 6:00 PM</p>
	                  
	              </div>
	         
	               
	        

	               
	          </div>
	           
</div>
	 
	
	 </div>
     
  </div>
      </div>
  
  </div>
  </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function(){
    $("#contactForm").on('submit', function(e){
        e.preventDefault();
        
        // Reset errors
        $(".error-text").text("");
        $("#submitBtn").prop('disabled', true).text("Sending...");

        $.ajax({
            url: "{{ route('contact.submit') }}",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        timer: 3000,
                        showConfirmButton: false
                    });
                    $("#contactForm")[0].reset();
                }
                $("#submitBtn").prop('disabled', false).text("SUBMIT");
            },
            error: function(xhr){
                $("#submitBtn").prop('disabled', false).text("SUBMIT");
                if(xhr.status == 422){
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong. Please try again later.'
                    });
                }
            }
        });
    });
});
</script>
@endsection