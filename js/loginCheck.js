function checkLoginStatus(){
	var result = false;
	$.ajax({
       type: 'GET',
       url: 'php/login.php',
       success: function (data) { // returns data
       		result = data.loginStatus;
       }
   });
	return result;
}