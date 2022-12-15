var cart=[];


if(document.getElementById("products")!=null)
{ 
    
  shopper=document.getElementById("shopper").innerText;
store=document.getElementById("Store").innerText;
theorder=shopper+""+store;
console.log(theorder);
if(localStorage.getItem(theorder)!=null)
{
    var retrievedObject = localStorage.getItem(theorder);
    cart=JSON.parse(retrievedObject);
   

}  
    
   function emptyStorage()
   {
       
    shopper=document.getElementById("shopper").innerText;
    store=document.getElementById("Store").innerText;
    theorder=shopper+""+store;
    localStorage.removeItem(theorder);
   } 
    updateCartDisplay();
    checkChanges();
            //increae quantity of an item
             function   addQuantity(item){
               

                    if((item.quantity==item.Quantityinstock))
                    {
                        //alert("Not enough items in stock. Change Quantity");
                     messageDialog("Not enough items in stock.\nChange quantity!","default","../images/error.png");
                      //  outofstock(item.id);
                       
                    }
                    
                    else
                    {
                      
                        item.quantity+=1;
                        var newQ=document.getElementsByName(item.id);

                       var newQuantity= parseInt(newQ[0].innerText)+1;
                       newQ[0].innerText=" "+newQuantity+" ";

                    }
                

                }

                //reduce quantity odf an item
                function
                reduceQuantity(item){
                    if(item.quantity==1)
                    {
                        
                    }else
                    {item.quantity-=1;
                        var newQ=document.getElementsByName(item.id);

            
                       var newQuantity= parseInt(newQ[0].innerText)-1;
                       newQ[0].innerText=" "+newQuantity+" ";
                    
                    }
                }
               
                //calculate the cost when an item quantity changes

                function calculateItemCost(Pricefor3,UnitPrice,Quantity)
                {
                    var NoofitemsdiscountedForpricefor3=1;
                    var NoofItemsfornormalPrice=Quantity; 
                    var ProductCost=1.0;


                    if(Quantity>2)
                    {
                        if(Quantity%3==0)
                        {
                            ProductCost=Math.floor((Pricefor3*UnitPrice*(parseInt(Quantity/3)))*100)/100;
                        }else{
                            NoofitemsdiscountedForpricefor3=(parseInt(Quantity/3));
                        NoofItemsfornormalPrice=Quantity%3;
                       
                        ProductCost=(NoofItemsfornormalPrice*UnitPrice)+(Math.floor((NoofitemsdiscountedForpricefor3*Pricefor3*UnitPrice)*100)/100);
                      
                        }
                    }
                        else
                    { ProductCost=Math.floor((NoofItemsfornormalPrice*UnitPrice)*100)/100;
                    
                    
                    }
        
                    return ProductCost;
                }
                
                function showCartItems(){

                }

                function isIncart(item){
               
                  
                    indextoreturn=-1;
                    for (let index = 0; index < cart.length; index++) {
                        if(cart[index].id==item.id)
                        {
                            indextoreturn=index;
                            break;
                        }
                       ;
                    }
                    return indextoreturn;
                }

              function  populateCart(item){
                
                        var Item="";
                        
                        var index=isIncart(item);
                        if(index==-1)
                        {
                            
                            Item={id:item.id,Name:item.Name,Description:"descrip goes here",NoItems:item.quantity,Total:this.calculateItemCost(item.pricefor3,item.UnitPrice,item.quantity),unitprice:item.UnitPrice,pricefor3:item.pricefor3,instock:item.Quantityinstock}
                        
                       
                        cart.push(Item); 
                       
                      
                        }else
                        {
                            
                        if( (cart[index].NoItems+item.quantity)>item.Quantityinstock)
                        {
                            cart[index].NoItems=item.Quantityinstock;
                           // alert("Only "+item.Quantityinstock+" s in stock!");
                            messageDialog("Only "+item.Quantityinstock+" s in stock!","default","../images/error.png");
                            
                        }else
                        {
                           
                            cart[index].NoItems+=item.quantity;
                          
                           
                        }
                        cart[index].Total=(this.calculateItemCost(item.pricefor3,item.UnitPrice,cart[index].NoItems));
                      

                        
                        } item.quantity=1;

        
                        
var filtered = cart.filter(function (el) {
    return el != null;
  });

             }
            function    updateCartDisplay()
                {
                var cost=0.0;
                    var Allquantity=0;
                    if(cart!=null){
                    for (let i = 0; i < cart.length; i++) {
                        
                        
                    
                    
        cost+=cart[i].Total;
       
        Allquantity+=parseInt(cart[i].NoItems);
                    }}else{
                        emptyStorage();
                    }
             
                    
                    //update item count display
                    var itemCount;//=parseInt(document.getElementById("icount").innerText);

                    // itemCount+=item.quantity;
                    itemCount=Allquantity;

                    var items=document.getElementById("icount");
                    items.innerHTML=itemCount+" items";

                    //update itemcost display
                    var itemsCostwithoutformat=document.getElementById("icost").innerText.replace("$","");
                    itemsCostwithoutformat=itemsCostwithoutformat.replace(",","")
                    var itemCost=parseFloat(itemsCostwithoutformat);

                    itemCost=cost;
                    var items=document.getElementById("icost");
                    items.innerHTML="$"+itemCost.toLocaleString();

// Put the object into storage

shopper=document.getElementById("shopper").innerText;
store=document.getElementById("Store").innerText;
theorder=shopper+""+store;
localStorage.setItem(theorder, JSON.stringify(cart));

                }
                
              function  addToCart(item)
                {
                   // productCost= calculateItemCost(item.pricefor3,item.UnitPrice,item.quantity);
                  
                    populateCart(item);
                    updateCartDisplay();
                    checkChanges();
                    var temp=document.getElementsByName(item.id);
                    temp[0].innerText="1";

                }
                function  checkChanges()
                {  
                    TheCart=cart.filter(function (el) {
                     
                    return el != null;
                   
                  }) ;  
                  var top=document.getElementById("theItems");
                  top.innerHTML="";
                  for(let i=0;i<TheCart.length;i++)
            {
                  MainContent= document.createElement("div");
                  unorderedlist=document.createElement("ul");
                  Bold=document.createElement("b");
                   Nme=document.createElement("li");
                   Qty=document.createElement("li");
                   totalP=document.createElement("li");
                   quantitychange=document.createElement("input");
                   quantitychange.setAttribute("type","number");
                   quantitychange.setAttribute("step","1");
                   quantitychange.setAttribute("max","100");
                   quantitychange.setAttribute("min","0");
                   quantitychange.setAttribute("value",TheCart[i].NoItems);
                   quantitychange.setAttribute("name",TheCart[i].Name);
                   quantitychange.setAttribute("style","max-width:30px;");
                   rmvItem=document.createElement("button");
                   rmvItem.innerHTML="Remove";
                   rmvItem.setAttribute("class","btn btn-danger");
                   rmvItem.setAttribute("name",i);
                   
                   Nme.innerHTML=TheCart[i].Name;
                  Qty.innerHTML="Quantity: "+TheCart[i].NoItems+`<input id= "${i}" style="max-width:50px;max-height:35px; margin-left:5px;margin-right:5px;" type="number" step="1" max="100"min="0",name=${i} value="${TheCart[i].NoItems}"/>`;
                   totalP.innerHTML="Cost: $"+TheCart[i].Total;

                   Bold.appendChild(Nme);
                   MainContent.appendChild(Bold);
                   MainContent.appendChild(unorderedlist);

                   MainContent.appendChild(Qty);
                   MainContent.appendChild(totalP);    
                   

                   MainContent.appendChild(rmvItem);
                   top.appendChild(MainContent);
                   
                   rmvItem.addEventListener("click",(e)=>{
                  
                       cart[e.target.name]=null;
                  Cart=cart.filter(function (el) {
                     
                        return el != null;
                       
                      }) ;  

                      cart=Cart;
                       updateCartDisplay();
                        checkChanges();
                   });

                   document.getElementById(i).addEventListener("change",(e)=>{
                  


                       var item=e.target.id;

                       if(e.target.value==="0")
                       {
                          
                           cart[item]=null;
                           Cart=cart.filter(function (el) {
                     
                            return el != null;
                           
                          }) ; 
                           
    
                          cart=Cart;
                          updateCartDisplay();
                          checkChanges();
                       }else if(TheCart[item].instock<parseInt(e.target.value))
                       {
                         //  alert("Only "+TheCart[item].instock+" in stock!");
                           messageDialog("Only "+TheCart[item].instock+" in stock!","default","../images/error.png");
                           TheCart[item].NoItems=TheCart[item].instock;
                           TheCart[item].Total=(this.calculateItemCost(TheCart[item].pricefor3,TheCart[item].unitprice,cart[item].NoItems));
                       }
                       else{
                      
                                TheCart[item].NoItems=parseInt(e.target.value);
                               
                                TheCart[item].Total=(this.calculateItemCost(TheCart[item].pricefor3,TheCart[item].unitprice,cart[item].NoItems));
                                cart=TheCart;
                       }
                       updateCartDisplay();
                       checkChanges();

                   })

            }
            if(cart.length==0){
                emptyStorage();
            }

                }
       
            
            }
        


        
   
    
    
    

    if(document.getElementById("shop")!=null)
          

       {    
             function   saveCart()
                {
                    var myObj = cart;
                

                
var filtered = cart.filter(function (el) {
 
    return el != null;
  });


  var myObjString = JSON.stringify(filtered);
                // store string in mySQL database here
                orderdata=myObjString;
               
                        return myObjString;
                }

            function    retrieveCart(myJSONString){
                    // load string from database

                    var myLoadedObj = JSON.parse(myJSONString);
                    var cart3=cart.some(car => car.color === "red");
                 
                                    }
                                    //show cart items
                                   function showCartItems(){
                                        TheCart=cart.filter(function (el) {
                                         
                                            return el != null;
                                           
                                          }) ;  
                                          cart=TheCart;
                                     
                                        if(cart.length<1)
                                        {
                                           // alert("No item in your cart a yet");
                                            messageDialog("No item in your cart yet!","default","../images/error.png");
                                        }else{
                                        document.getElementById("overlay").style["display"]="block";
                                        showcartitemsandcheckChanges();
                                        }
                                    }
                                  
                                  function showcartitemsandcheckChanges()
                                    {  
                                        TheCart=cart.filter(function (el) {
                                         
                                        return el != null;
                                       
                                      }) ;  
                                      var top=document.getElementById("cartItemsDialog");
                                      top.innerHTML="";
                                       if(cart==null)
                                       {
                                        top.innerHTML="No item in Cart";
                                       }

                                       var finaltotal=0;
                                      for(var i in TheCart)
                                {
                                      MainContent= document.createElement("div");
                                      unorderedlist=document.createElement("ul");
                                       Nme=document.createElement("li");
                                       Qty=document.createElement("li");
                                       totalP=document.createElement("li");
            
                                       Nme.innerHTML="<b>"+TheCart[i].Name+"</b>";
                                      Qty.innerHTML="<b>Quantity:</b> "+TheCart[i].NoItems;
                                       totalP.innerHTML="<b>Cost: $</b>"+TheCart[i].Total;
            
                                    
                                       MainContent.appendChild(Nme);
                                       MainContent.appendChild(unorderedlist);
                                       MainContent.appendChild(Qty);
                                       MainContent.appendChild(totalP);
                                       MainContent.setAttribute("class","cart-card");
                                       top.appendChild(MainContent);
                                       finaltotal+=TheCart[i].Total;
                                     
                                       
            
                                }  document.getElementById("cartTotal").innerHTML="<br/>Your bill total is $"+finaltotal+"<br/>";
            
                                    }
                                 
            }
     


      
    
    if(document.getElementById("myitems")!=null)

            {
                       function printItems(){

                            this.MyCartItems=cart.filter(function (el) {
                             
                                return el != null;
                               
                              }) ; 

if(this.refresh==false)
                            this.refresh=true;
                            else
                            this.refresh=false;
                            
                          
                            

                            }
                        

            
                        
            }
   
        


if(document.getElementById("overlay")!=null){

            function stopshowCartItems(){
                var top=document.getElementById("cartItemsDialog");
                                      top.innerHTML="";
                document.getElementById("overlay").style["display"]="none";
              
            

        }

       


}

if(document.getElementById("saveData")!=null){


 function saveMyCart(){
    shopper=document.getElementById("shopper").innerText;
    store=document.getElementById("Store").innerText;
    theorder=shopper+""+store;
    let product= localStorage.getItem(theorder);
   
    let data=document.getElementById("saveData");

 data.value=product;

 var theform=document.getElementById("submittosave");
theform.action="saveorder.php";

  theform.submit();  


}}
//DIALOG BOXES
if(document.getElementById("cyrokdialog")!=null)
{

function confirmDialog(mess,action,subject,sessID){

    let Confirmdialog=document.createElement("dialog");
   Confirmdialog.setAttribute("class","confirmdialogform");
    Confirmdialog.innerHTML=`<div><h3>${subject}</h3/><div class="dialogbody">${mess}</div><div class='confirmdialogbtn'><button class='btn btn-danger' id='no'>NO</button><button class='btn btn-success' id='yes'>YES</button></div></div>`;
document.getElementById("cyrokdialog").append(Confirmdialog);

switch(action){

  case "Cancelsignup":
    document.getElementById("yes").addEventListener('click',()=>{
       
        window.location='../homepage.php';
     document.getElementById("cyrokdialog").innerHTML="";

});
   
    document.getElementById("no").addEventListener('click',()=>{
document.getElementById("cyrokdialog").innerHTML="";
});
  
    break;
    case "Confirmsignup":
    document.getElementById("yes").addEventListener("click",(e)=>{
        var signupForm=document.getElementById("customersignupform");
        signupForm.action="../process/signup.php";
        signupForm.submit();
        
      document.getElementById("cyrokdialog").innerHTML="";
    });

    document.getElementById("no").addEventListener("click",()=>{document.getElementById("cyrokdialog").innerHTML="";});

    break;
    case "Cancelupdate":
        document.getElementById("yes").addEventListener('click',()=>{
           
            window.location='../pages/CustomerDashboard.php?id='+sessID+'';
         document.getElementById("cyrokdialog").innerHTML="";
    
    });
       
        document.getElementById("no").addEventListener('click',()=>{
    document.getElementById("cyrokdialog").innerHTML="";
    });
      
        break;
        case "Confirmupdate":
        document.getElementById("yes").addEventListener("click",(e)=>{
          updateform= document.getElementById("updateformcontent");
          updateform.action='update_process.php?id='+sessID+'&update=true';
          updateform.submit();
          document.getElementById("cyrokdialog").innerHTML="";
        });
    
        document.getElementById("no").addEventListener("click",()=>{document.getElementById("cyrokdialog").innerHTML="";});
    
        break;
    
        case 'clearcart':
            document.getElementById("yes").addEventListener("click",()=>{
                  clearcart(); 
                  Confirmdialog.close();
                document.getElementById("cyrokdialog").innerHTML="";
            });
            document.getElementById("no").addEventListener("click",()=>{
              
             
                document.getElementById("cyrokdialog").innerHTML="";
                Confirmdialog.close();
            });
        

break;
    default:
    document.getElementById("yes").addEventListener("click",()=>{console.log("There i no default");
    Confirmdialog.close();});

    document.getElementById("no").addEventListener("click",()=>Confirmdialog.close());
    

};

Confirmdialog.showModal();
   }

   //Information dialogs
   
function messageDialog(mess,action,mess_img,sessid){

    dialog=document.createElement("dialog");
    dialog.setAttribute("class","dialogform");
    dialog.innerHTML=`<div class="dialogImg"><img style ="width:100px; height:100px;" src="${mess_img}" alt="icon"/></div><div class="dialogbody"><b>${mess}</b></div><br><button class="btn btn-success" id='ok'>OK</button>`;
document.getElementById("cyrokdialog").append(dialog);

switch(action){
//admin login 
  case "Admin":
    setTimeout(()=>window.location='../pages/admin.php?id='+sessid,3000);
    document.getElementById("ok").addEventListener('click',(e)=>{
        dialog.close();
        document.getElementById("cyrokdialog").innerHTML="";
        window.location='../pages/admin.php?id='+sessid;
        });
        
  break;
  //customerlogin
  case "Customer":
      setTimeout(()=>window.location='../pages/storehome.php?id='+sessid,3000);
    document.getElementById("ok").addEventListener('click',(e)=>{
        dialog.close();
        document.getElementById("cyrokdialog").innerHTML="";
        window.location='../pages/storehome.php?id='+sessid;
        });
       
    break;
    //invalid credential or any page which you try to access when u are noit authorized to 
    case "wrongsignin":
      setTimeout(()=>window.history.back(),3000);
    document.getElementById("ok").addEventListener("click",(e)=>{dialog.close();
        document.getElementById("cyrokdialog").innerHTML="";
      window.history.back();
    });
        
    
  
    break;
    case "loggedout":
        setTimeout(()=>window.location='../homepage.php',3000);
    document.getElementById("ok").addEventListener('click',(e)=>{
        dialog.close();
        document.getElementById("cyrokdialog").innerHTML="";
        window.location='../homepage.php';
        });
break;
case "sessionerror":
    //try to access a page which you dont have acce to 
    setTimeout(()=>window.history.back(),3000);
document.getElementById("ok").addEventListener('click',(e)=>{
    dialog.close();
    document.getElementById("cyrokdialog").innerHTML="";
    window.history.back();
    });  
break;
case "unauthorized":
    
  setTimeout(()=>window.history.back(),3000);
document.getElementById("ok").addEventListener('click',(e)=>{
    dialog.close();
    document.getElementById("cyrokdialog").innerHTML="";
    window.history.back();
    });  
    break;
case "confirmpassworderror":
    setTimeout(()=>window.history.back(),3000);
    document.getElementById("ok").addEventListener('click',(e)=>{
        dialog.close();
        document.getElementById("cyrokdialog").innerHTML="";
        window.history.back();
        }); 
break;

case "adminactioned":
setTimeout(()=>window.location="../pages/administrators.php?id="+sessid,3000);
document.getElementById("ok").addEventListener('click',(e)=>{
    dialog.close();
    document.getElementById("cyrokdialog").innerHTML="";
    window.location="../pages/administrators.php?id="+sessid;
    }); 
break;
case "manageractioned":
    setTimeout(()=>window.location="../pages/managers.php?id="+sessid,3000);
document.getElementById("ok").addEventListener('click',(e)=>{
    dialog.close();
    document.getElementById("cyrokdialog").innerHTML="";
    window.location="../pages/managers.php?id="+sessid;
    }); 

break;
case "sdberror":
    setTimeout(()=>window.location="../pages/stores.php?id="+sessid,3000);
    document.getElementById("ok").addEventListener('click',(e)=>{
        dialog.close();
        document.getElementById("cyrokdialog").innerHTML="";
        window.location="../pages/stores.php?id="+sessid;
        }); 
        break;
        case "storecreated":
   
       setTimeout(()=>window.location="../pages/stores.php?id="+sessid,3000);
document.getElementById("ok").addEventListener('click',(e)=>{
    dialog.close();
    document.getElementById("cyrokdialog").innerHTML="";
    window.location="../pages/stores.php?id="+sessid;
    }); 
break;
        
case "savedorder":
    setTimeout(()=>window.location="../pages/storehome.php?id="+sessid,3000);
document.getElementById("ok").addEventListener('click',(e)=>{
    dialog.close();
    document.getElementById("cyrokdialog").innerHTML="";
    window.location="../pages/storehome.php?id="+sessid;
    }); 
    break;

    case "orderdberror":
        setTimeout(()=>window.location="../pages/storehome.php?id="+sessid,3000);
        document.getElementById("ok").addEventListener('click',(e)=>{
            dialog.close();
            document.getElementById("cyrokdialog").innerHTML="";
            window.location="../pages/storehome.php?id="+sessid;
            }); 
    break;

    case "unauthorizedadmin":
        setTimeout(()=>  window.location="../pages/signin.html",3000);
        document.getElementById("ok").addEventListener('click',(e)=>{
            dialog.close();
            document.getElementById("cyrokdialog").innerHTML="";
            window.location="../pages/signin.html";
            }); 
            break;
case "gotosignin":
   
    setTimeout(()=>window.location="../pages/signin.html",3000);
        document.getElementById("ok").addEventListener('click',(e)=>{
            dialog.close();
            document.getElementById("cyrokdialog").innerHTML="";
            window.location="../pages/signin.html";
            }); 
            break;

            case "successupdate":
                //uccesfuly update a customer account
                setTimeout(()=> window.location='../pages/CustomerDashboard.php?id='+sessid,3000);
                document.getElementById("ok").addEventListener('click',(e)=>{
                    dialog.close();
                    document.getElementById("cyrokdialog").innerHTML="";
                    window.location='../pages/CustomerDashboard.php?id='+sessid;
                    }); 
break;

case "deleteadmin":
    setTimeout(()=> window.location='../pages/CustomerDashboard.php?id='+sessid,3000);
    document.getElementById("ok").addEventListener('click',(e)=>{
        dialog.close();
        document.getElementById("cyrokdialog").innerHTML="";
        window.location='../pages/CustomerDashboard.php?id='+sessid;
        });
        break;
        //user is logged in
        case 'resetpasswordsuccess':
            setTimeout(()=> window.location='../pages/CustomerDashboard.php?id='+sessid,3000);
            document.getElementById("ok").addEventListener('click',(e)=>{
                dialog.close();
                document.getElementById("cyrokdialog").innerHTML="";
                window.location='../pages/CustomerDashboard.php?id='+sessid;
                });

break;
//uer forgot password
        case "passwordchangedsuccess":
            setTimeout(()=> window.location='../signin.html',3000);
            document.getElementById("ok").addEventListener('click',(e)=>{
              
                document.getElementById("cyrokdialog").innerHTML="";
                window.location='../pages/signin.html';
                }); 
break;
    case "emaildontexist":
    
    document.getElementById("ok").addEventListener("click",()=>{
    document.getElementById("cyrokdialog").innerHTML="";
window.location='../pages/Useroperations/forgot.inc.php?mode=enteremail';});
 
  break;
    case 'expiredcode':
        document.getElementById("ok").addEventListener("click",()=>{
            dialog.close();
            document.getElementById("cyrokdialog").innerHTML="";
        window.location='../pages/Useroperations/forgot.inc.php?mode=entercode';});
    break;
    case 'resetmismatchedpassword':
        document.getElementById("ok").addEventListener("click",()=>{
            dialog.close();
            document.getElementById("cyrokdialog").innerHTML="";
        window.location='../pages/Useroperations/forgot.inc.php?mode=loggedinreset';});
break;
case 'mismatchedpasswordforgot':
    document.getElementById("ok").addEventListener("click",()=>{
        dialog.close();
        document.getElementById("cyrokdialog").innerHTML="";
    window.location='../pages/Useroperations/forgot.inc.php?mode=reset&error=yes';});
break;

case 'passwordfailedcriteria':
    document.getElementById("ok").addEventListener("click",()=>{
        dialog.close();
        document.getElementById("cyrokdialog").innerHTML="";
    });
    break;
    case 'incorrectcodeignup':
        document.getElementById("ok").addEventListener("click",()=>{
            dialog.close();
            document.getElementById("cyrokdialog").innerHTML="";
        window.location='../pages/Signupform.php?mode=entercode';})
break;

   default:
    document.getElementById("ok").addEventListener("click",()=>{
        dialog.close();
        document.getElementById("cyrokdialog").innerHTML="";
    });
    break;


};

dialog.showModal();
   }
}

if(document.getElementById("subtotalcheckout")!=null)
{
    
    function    updatecheckoutdisplay()
    {
        shopper=document.getElementById("user").innerText;
store=document.getElementById("Store").innerText;
theorder=shopper+""+store;
console.log(theorder);
if(localStorage.getItem(theorder)!=null)
{
    var retrievedObject = localStorage.getItem(theorder);
    cart=JSON.parse(retrievedObject);
   

}  
    

    var cost=0.0;
        var Allquantity=0;
        if(cart!=null){
        for (let i = 0; i < cart.length; i++) {
            
            console.log(cart[i].Total);
        
        
cost+=cart[i].Total;

Allquantity+=parseInt(cart[i].NoItems);
        }}else{
            emptyStorage();
        }
 var deliverycost=0.0;
 if(cost>=5000)
 {
     deliverycost=0.05*cost;
 }
        
        //update item count display
        var subtotal=document.getElementById("subtotalcheckout");
        var Delivery=document.getElementById("subtotaldeliveryfee");
        var TotalCost=document.getElementById("totalcheckout");

        //update itemcost display
        var itemsCostwithoutformat=document.getElementById("subtotalcheckout").innerText.replace("$","");
        itemsCostwithoutformat=itemsCostwithoutformat.replace(",","")
        var itemCost=parseFloat(itemsCostwithoutformat);

        itemCost=cost;
       
       subtotal.innerHTML="$"+itemCost.toLocaleString();

       var itemsCostwithoutformat=document.getElementById("subtotaldeliveryfee").innerText.replace("$","");
       itemsCostwithoutformat=itemsCostwithoutformat.replace(",","")
       var deliveryCost=parseFloat(itemsCostwithoutformat);

       deliveryCost=deliverycost;
      
      Delivery.innerHTML="$"+deliveryCost.toLocaleString();

      
      var itemsCostwithoutformat=document.getElementById("totalcheckout").innerText.replace("$","");
      itemsCostwithoutformat=itemsCostwithoutformat.replace(",","")
      var totalCost=parseFloat(itemsCostwithoutformat);

      totalCost=deliverycost+cost;
     
     TotalCost.innerHTML="$"+totalCost.toLocaleString();

    }


}