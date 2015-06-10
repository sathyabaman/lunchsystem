  <script type="text/javascript">

  $(document).ready (function(){
  $("#frm_add_school").submit ( function(){
               

               var school_name        = $('form #scl_name').val();
               var email              = $('form #scl_email').val();
               var phone              = $('form #scl_Phonenumber').val();
               var address            = $('form #scl_Address').val();
               var password           = $('form #scl_password').val();
               var password2          = $('form #scl_password2').val();
               var lunch_time         = $('form #scl_TimeofLunch').val();
               var no_of_students     = $('form #scl_TotalNumberOfStudent').val();
               var avatar             = $('form #avatar').val();
               var scl_admin_name     = $('form #scl_admin_name').val();

              if(school_name == "" || school_name.length < 3){
                  $('#scl_name_error').html("</b>Please enter a valid School name.</b>");
                  return false;
              }else if(!isValidEmailAddress( email )){
                  $('#scl_email_error').html("</b>Please enter a valid email.</b>");
                  return false;
              }else if(phone == "" || phone.length < 3 ){
                  $('#scl_Phonenumber_error').html("</b>Please enter a valid phone number.</b>");
                  return false;
              }else if(password = "" || password !== password2){
                  $('#scl_password2_error').html("</b>password combination does not match.</b>");
                  return false;
                  $('#scl_password_error').html("</b>password combination does not match.</b>");
                  return false;
              }else if(lunch_time == "" || lunch_time.length < 3 ){
                  $('#scl_TimeofLunch_error').html("</b>Please enter a valid lunch time.</b>");
                  return false;
              }else if(scl_admin_name==0){
                  $('#scl_admin_error').html("</b>Please Select a admin.</b>");
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