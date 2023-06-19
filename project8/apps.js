function myCheck(){
    var pass1=document.getElementById('password');
    var pass2=document.getElementById('c_password');
    if(pass1.type=="password" || pass2.type=="password"){
        pass1.type="text";
        pass2.type="text";
    }else{
        pass1.type="password";
        pass2.type="password";
    }
}