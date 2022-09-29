$(function(){
  var $registerform= $("#registrationform");
//   method for validate firstname
  $.validator.addMethod("firstname_regex", function(value, element) {
    return this.optional(element) || /^[a-zA-Z\.\-_]{3,20}$/i.test(value);
    }, "Please choise a firstName with only a-z A-Z.");

    //   method for validate lastname
    $.validator.addMethod("lastname_regex", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\.\-_]{1,20}$/i.test(value);
        }, "Please choise a firstName with only a-z A-Z.");

      //   method for validate email
    $.validator.addMethod("email_regex", function(value, element) {
        return this.optional(element) || /^[a-z 0-9]{3,20}[@]{1}[a-z]{4,8}[.]{1}[a-z]{3,8}$/i.test(value);
        }, "Please choise a firstName with only a-z A-Z.");

        //   method for validate phone number
        $.validator.addMethod("phone_regex", function(value, element) {
            return this.optional(element) || /^[0-9]{10}$/i.test(value);
            }, "Please choise a firstName with only a-z A-Z.");
  if($registerform.length){
    $registerform.validate({
        rules:{
            firstName:{
                required:true,
                firstname_regex:true
            },
            lastName:{
                required:true,
                lastname_regex:true
            },
            email:{
                required:true,
                email:true,
                email_regex:true
            },
            age:{
                required:true
            },
            phno:{
                required:true,
                phone_regex:true
                
            },
            password:{
                required:true,
                minlength: 5

            },
            c_password:{
                required:true,
                equalTo: '#pass1'

            }

        },
        messages:{
            firstName:{
                required:"firstName is required",
                firstname_regex:"You have used invalid characters. Are permitted only letters!"

            },
            lastName:{
                required:"lastName is required",
                lastname_regex:"You have used invalid characters. Are permitted only letters!"

            },
            email:{
                required:"email is required",
                email:"Please enter a valid email address!",
                email_regex:"You have used invalid email address"

            },
            age:{
                required:"age is required"

            },
            phno:{
                required:"phone number is required",
                phone_regex:"Please enter a valid phone number!"

            },
            password:{
                required:"password is required",
                minlength: "Please enter a password at least 5 characters!"


            },
            c_password:{
                required:"confirm password is required",
                equalTo: "The two passwords do not match!"


            }



        }

    })
  }
})