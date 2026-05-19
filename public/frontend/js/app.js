
$.validator.addMethod('nospace', 
function(value, element) {
    return $.validator.methods.required.call(this, $.trim(value), element);
}, $.validator.messages.required);


$.validator.addMethod("customname", 
    function(value, element) { return /^[a-zA-Z ]*$/.test(value);}, "Please enter valid Name"
);

$.validator.addMethod("customemail", 
    function(value, element) {return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);}, "Please enter valid email"
);

$.validator.addMethod("customphone", 
    function(value, element) {return /^\d{10}$/.test(value);}, "Please enter 10 digit mobile number"
);

$.validator.addMethod('custommessage', 
function(value, element) { return $.validator.methods.required.call(this, $.trim(value), element);
}, $.validator.messages.required);


$.validator.addMethod("alphanumeric", function (value, element) {
    return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value); // old value
}, "Please enter valid character");

var insertForm = $("#enquire_now");
var validator = insertForm.validate({
    ignore: ".ignore",
    rules:{
        name :{ required : true ,nospace:true,customname:true},
        email : { required : true, nospace:true, customemail:true },
        mobile :{ required : true , nospace:true, customphone:true},
        message : {alphanumeric: true}
    },
    messages:{
        name :{ required : "This field is required" ,customname:"Please enter valid name."},
        email : { required : "This field is required", customemail : "Please enter valid email" },
        mobile :{ required : "This field is required", customphone: "Please enter 10 digit mobile number" },       
    },

    submitHandler: function(form, event) {
        event.preventDefault();
        var fd = new FormData();

        fd.append('name',$('#name').val());
        fd.append('email',$('#email').val());
        fd.append('mobile',$('#mobile').val());
        fd.append('country',$('#country').val());
        fd.append('vtype',$('#vtype').val());
        fd.append('expected', $('#expected').val());
        fd.append('message', $('#message').val());      
        
        $.ajax({
          url: 'submit.php',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          beforeSend: function () {
                $("#enquire_now").find('.sbt-btn').prop('disabled', true).html("Processing...");
          },
          success: function(response){
             $("#enquire_now")[0].reset();
             $("#enquire_now").find('.sbt-btn').prop('disabled', false).html("Submit");
             window.location.href = "thankyou.php";
             //$('#success').show().html("Thank you for contacting us.");
          },
        });
    },

});
 