
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
$(document).ready(function(){
	
   $("#login").click(function(){
	email=$("#email").val();
        password=$("#password").val();

         $.ajax({
            type: "POST",
           url: "theme_includes/updatetheme.php",
            data: "email="+email+"&password="+password,


            success: function(html){
			
			  if(html=='true')
              {
                window.location.reload();
              }
              else
              {
              alert("Wrong Username/Email And Password Combination");
              }
            },
           
        });
         return false;
    });
});
