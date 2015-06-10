  <script type="text/javascript">

  $(document).ready (function(){
  $("#frm_add_vender").submit ( function(){
               

               var vender_name        = $('form #vendor_name').val();
               var address              = $('form #vendor_addr').val();
               var email              = $('form #vendor_email').val();
               var phone            = $('form #vendor_phone').val();
               var password           = $('form #vendor_password').val();
               var password2          = $('form #vendor_password2').val();
               var cell         = $('form #vendor_cell').val();
               var admin     = $('form #vendor_admin').val();
     

              if(vender_name == "" || vender_name.length < 3){
                  $('#vendor_name_error').html("</b>Please enter a valid Vender name.</b>");
                  return false;
              }else if(!isValidEmailAddress( email )){
                  $('#vendor_email_error').html("</b>Please enter a valid email.</b>");
                  return false;
              }else if(phone == "" || phone.length < 3 ){
                  $('#vendor_phone_error').html("</b>Please enter a valid phone number.</b>");
                  return false;
              }else if(password = "" || password !== password2){
                  $('#vendor_password2_error').html("</b>password combination does not match.</b>");
                  return false;
                  $('#vendor_password_error').html("</b>password combination does not match.</b>");
                  return false;
              }else if(admin== "" || admin.length < 3 ){
                  $('#vendor_admin_error').html("</b>Please Enter admin Name.</b>");
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