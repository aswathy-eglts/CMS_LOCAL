$(function(){
    var $resetforms= $("#resetforms");
    if($resetforms.length){
        $resetforms.validate({
            rules:
            {
                email:{
                    required:true
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
            messages:
            {
                email:
                {
                    required:"email is required"
                },
                password:
                {
                    required:"password is required",
                    minlength: "Please enter a password at least 5 characters!"

                },
                c_password:
                {
                    required:"confirm password is required",
                    equalTo: "The two passwords do not match!"
                }
                

            }
        })

    }
})
