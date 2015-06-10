  <script type="text/javascript">

  $(document).ready (function(){
  $("#frm_add_parent").submit ( function(){
               

               var firstname        = $('form #par_firstname').val();
               var lastname              = $('form #par_lastname').val();
               var email              = $('form #par_email').val();
               var phone            = $('form #par_phone').val();
               var password           = $('form #par_password').val();
               var password2          = $('form #par_password2').val();
               var address         = $('form #par_address').val();


              if(firstname == "" || firstname.length < 3){
                  $('#par_firstname_error').html("</b>Please enter a valid first name.</b>");
                  return false;
              }else if(!isValidEmailAddress( email )){
                  $('#par_email_error').html("</b>Please enter a valid email.</b>");
                  return false;
              }else if(phone == "" || phone.length < 3 ){
                  $('#par_phone_error').html("</b>Please enter a valid phone number.</b>");
                  return false;
              }else if(password = "" || password !== password2){
                  $('#par_password2_error').html("</b>password combination does not match.</b>");
                  return false;
                  $('#par_password_error').html("</b>password combination does not match.</b>");
                  return false;
              }else{

                     return true;
                  
              }

           });
  });

      function isValidEmailAddress(emailAddress) {
      var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
      return pattern.test(emailAddress);
      };

  </script>