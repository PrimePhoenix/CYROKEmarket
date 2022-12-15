

var selectlogin=document.getElementById("selectlogin");
if(selectlogin!=null){
selectlogin.addEventListener("click",()=>{
    document.getElementById("Main-container").style.display="none";
    document.getElementById("login-section").style.display="flex";
})
}
loginform=document.getElementById("loginForm");


if(loginform!=null)
{
    loginBtn=document.getElementById("login");
}

gotoHomeFromLogin=()=>{
    document.getElementById("Main-container").style.display="block";
    document.getElementById("login-section").style.display="none";
}

function goshopping(ID){
    window.location="shopping.php?id="+ID+"";
}

function ShowNewUserForm(){

    form=document.getElementById("newAdmin");
    form.style.display="block";

    document.getElementById("adminMain").style.display="none";
}

function ShowNewstoreForm(){

    form=document.getElementById("newStore");
    form.style.display="block";

    document.getElementById("adminMain").style.display="none";
}
//sign up page validation
if(document.getElementById("customersignupform")!=null)
{
    var validated=false;
    var signupForm=document.getElementById("customersignupform");
    //var CreateAccountBtn=document.getElementById("CreateAccountBtn");

    signupForm.addEventListener("submit",validateAndSubmit);
function validateAndSubmit(e){
  
   
	e.preventDefault();
	parish=signupForm.parish.value;	 

	if(parish==="Select a Parish")
	{
        messageDialog("Add your Parish","default","images/error.png");  
        //"passwords mismatch"
       
return;
	}else
		{	
			pword=signupForm.pword;
				pword2=signupForm.pword2;

				if(CheckPassword(pword.value))
				{
					if(pword.value!=pword2.value)
					{
						e.preventDefault();
						//alert("passwords mismatch");
                        messageDialog("passwords mismatch","default","../images/error.png");  
						pword2.setAttribute("value",null);
                        return;
					}else{
                        validated=true;
                    }
				}
				e.preventDefault();
			}

	if(validated==true)
    {
        confirmDialog("Are you ure ure you want to submit?","Confirmsignup","Confirm Signup");  
       
      //  signupForm.action="../process/signup.php";
       // signupForm.submit();
    }
}

function showCartItems(){
  
    document.getElementById("overlay").display("block");
}
var showCartIcon=document.getElementById("showMyCart");
showCartIcon.addEventListener("click",()=>{
    document.getElementById("overlay").display("block");
   

})




//function to check validity of password
function CheckPassword(inputtxt) 
{ 
var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
if(inputtxt.match(decimal)) 
{ 

return true;
}
else
{ 
    messageDialog('password does not meet minimum criteria!',"passwordfailedcriteria","../images/error.png");  
//alert('password does not meet minimum criteria!')
return false;
}
}

}

if(document.getElementById("usemyaddress")!=null)
{
    function postAddress(){
if(document.getElementById('addresschange').checked)
{
    document.getElementById("alternativeaddress").submit();
}else{
     document.getElementById("usemyaddress").submit();
}
    }
}