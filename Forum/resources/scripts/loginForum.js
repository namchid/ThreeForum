function checkLogin (){

var username = document.getElementById("username").value;
var password = document.getElementById("password").value;

var result_login;

  if (username == "" || password == ""){
        alert("Please enter a username and password.");
        return;
  }
  if (window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
  }
  else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
 
   xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
 	  result_login= xmlhttp.responseText;
          result_login = result_login.trim();
       }

   }
    
  xmlhttp.open("GET","../Forum/resources/php/loginCheck.php?username="+username+"&password="+password,false); 
  xmlhttp.send();    

 
	if (result_login=="good"){
		document.loginform.action="forum.php";
		document.loginform.submit(); 
  }
	else 
		alert("Please enter username and password.");


}




