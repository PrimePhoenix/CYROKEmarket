var tester=9;
var cart=[];
var cart2=[];
var orderdata="";

if(document.getElementById("products")!=null)
{    const productCard=Vue.createApp({
            //data


            data(){
                return{
                    srcImg:"src='../products/EveAppleJuice.PNG'",
                
                    items:[
                        {Name:"Adam and Eve Apple Juice 200ml",
                        srcImg:"../products/EveAppleJuice.PNG",
                            UnitPrice:270.00,
                            pricefor3:2.89,
                            quantity:1, 
                            Quantityinstock:6,
                            instock:true,id:21},

                            {Name:"Heineken 6pk 300ml",
                        srcImg:"../products/heinekin6pk.PNG",
                            UnitPrice:187.00,
                            pricefor3:2.89,
                            quantity:1, 
                            Quantityinstock:24,
                            instock:true,id:78},

                            {Name:"N95 Mask 25pcs",
                            srcImg:"../products/kn95mask.PNG",
                                UnitPrice:600.00,
                                pricefor3:2.89,
                                quantity:1, 
                                Quantityinstock:24,
                                instock:true,id:456}, {Name:"Adam and Eve Apple Juice 200ml",
                                srcImg:"../products/EveAppleJuice.PNG",
                                    UnitPrice:270.00,
                                    pricefor3:2.89,
                                    quantity:1, 
                                    Quantityinstock:32,
                                    instock:true,id:232},
                
                                    {Name:"Heineken 6pk 300ml",
                                srcImg:"../products/heinekin6pk.PNG",
                                    UnitPrice:187.00,
                                    pricefor3:2.89,
                                    quantity:1, 
                                    Quantityinstock:24,
                                    instock:true,id:154},
                
                                    {Name:"N95 Mask 25pcs",
                                    srcImg:"../products/kn95mask.PNG",
                                        UnitPrice:600.00,
                                        pricefor3:2.89,
                                        quantity:1, 
                                        Quantityinstock:24,
                                        instock:true,id:753},
                                        {Name:"Adam and Eve Apple Juice 200ml",
                        srcImg:"../products/EveAppleJuice.PNG",
                            UnitPrice:270.00,
                            pricefor3:2.89,
                            quantity:1, 
                            Quantityinstock:32,
                            instock:true, id:192},

                            {Name:"Heineken 6pk 300ml",
                        srcImg:"../products/heinekin6pk.PNG",
                            UnitPrice:187.00,
                            pricefor3:2.89,
                            quantity:1, 
                            Quantityinstock:24,
                            instock:true,id:635},

                            {Name:"N95 Mask 25pcs",
                            srcImg:"../products/kn95mask.PNG",
                                UnitPrice:600.00,
                                pricefor3:2.89,
                                quantity:1, 
                                Quantityinstock:24,
                                instock:true,id:394}, {Name:"Adam and Eve Apple Juice 200ml",
                                srcImg:"../products/EveAppleJuice.PNG",
                                    UnitPrice:270.00,
                                    pricefor3:2.89,
                                    quantity:1, 
                                    Quantityinstock:32,
                                    instock:true,id:66},
                
                                    {Name:"Heineken 6pk 300ml",
                                srcImg:"../products/heinekin6pk.PNG",
                                    UnitPrice:187.00,
                                    pricefor3:2.89,
                                    quantity:1, 
                                    Quantityinstock:24,
                                    instock:true,id:152},
                
                                    {Name:"N95 Mask 25pcs",
                                    srcImg:"../products/kn95mask.PNG",
                                        UnitPrice:600.00,
                                        pricefor3:2.89,
                                        quantity:1, 
                                        Quantityinstock:24,
                                        instock:true,id:636}

                        ]



                }
            },
            methods: {
            
                addQuantity(item){
                
                    if((item.quantity==item.Quantityinstock))
                    {
                        alert("Not enough items in stock. Change Quantity");
                        
                        
                    }
                    
                    else
                    {
                        item.quantity+=1;
                    }
                
                },
                reduceQuantity(item){
                    if(item.quantity==1)
                    {
                        
                    }else
                    {item.quantity-=1;
                    
                    
                    }
                },
                calculateItemCost(Pricefor3,UnitPrice,Quantity)
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
                        console.log("("+NoofItemsfornormalPrice+"*"+UnitPrice+")+("+NoofitemsdiscountedForpricefor3+"*"+Pricefor3+"*"+UnitPrice+")") ;
                        ProductCost=(NoofItemsfornormalPrice*UnitPrice)+(Math.floor((NoofitemsdiscountedForpricefor3*Pricefor3*UnitPrice)*100)/100);
                        console.log(ProductCost);
                        }
                    }
                        else
                    { ProductCost=Math.floor((NoofItemsfornormalPrice*UnitPrice)*100)/100;
                    
                    
                    }
        
                    return ProductCost;
                },showCartItems(){

                },
                populateCart(item){
                
                        var Item=item.id;
                        
                        
                        if(cart[Item]==null)
                        {
                            
                            cart[Item]={Name:item.Name,Description:"descrip goes here",NoItems:item.quantity,Total:this.calculateItemCost(item.pricefor3,item.UnitPrice,item.quantity)}
                        
                        var t={Name:item.Name,Description:"descrip goes here",NoItems:item.quantity,Total:this.calculateItemCost(item.pricefor3,item.UnitPrice,item.quantity)};
                        cart2.push(t); 
                       
                      
                        }else
                        {
                        if( (cart[Item].NoItems+item.quantity)>item.Quantityinstock)
                        {
                            cart[Item].NoItems=item.Quantityinstock;
                            alert("Only "+item.Quantityinstock+" s in stock!");
                            
                        }else
                        {
                           
                            cart[Item].NoItems+=item.quantity;
                          
                           
                        }
                        cart[Item].Total=(this.calculateItemCost(item.pricefor3,item.UnitPrice,cart[Item].NoItems));
                      

                        
                        } item.quantity=1;

        
                        
var filtered = cart.filter(function (el) {
    return el != null;
  });

             },
                updateCartDisplay()
                {
                var cost=0.0;
                    var Allquantity=0;
                    for(var i in cart)
                    {
        cost+=cart[i].Total;
        console.log("totals.."+cart[i].Total)
        Allquantity+=cart[i].NoItems;
                    }
                console.log(cost);
                    
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
                }
                ,
                addToCart(item)
                {
                    productCost= this.calculateItemCost(item.pricefor3,item.UnitPrice,item.quantity);
                    
                    this.populateCart(item);
                    this.updateCartDisplay();
                    this.checkChanges();
                    

                },   checkChanges()
                {  
                    TheCart=cart.filter(function (el) {
                     
                    return el != null;
                   
                  }) ;  
                  var top=document.getElementById("theItems");
                  top.innerHTML="";
                  for(var i in TheCart)
            {
                  MainContent= document.createElement("div");
                  unorderedlist=document.createElement("ul");
                  Bold=document.createElement("b");
                   Nme=document.createElement("li");
                   Qty=document.createElement("li");
                   totalP=document.createElement("li");
                   rmvItem=document.createElement("button");
                   rmvItem.innerHTML="Remove";
                   rmvItem.setAttribute("class","btn btn-danger");
                   rmvItem.setAttribute("click","alert('hrey')");
                   
                   
                   Nme.innerHTML=TheCart[i].Name;
                  Qty.innerHTML="Quantity: "+TheCart[i].NoItems;
                   totalP.innerHTML="Cost: $"+TheCart[i].Total;

                   Bold.appendChild(Nme);
                   MainContent.appendChild(Bold);
                   MainContent.appendChild(unorderedlist);
                   MainContent.appendChild(Qty);
                   MainContent.appendChild(totalP);
                   MainContent.appendChild(rmvItem);
                   top.appendChild(MainContent);
                   
                   

            }

                }
       
            
            }
        })


        
   
    
    
        productCard.mount('#products');
    }

    if(document.getElementById("shop")!=null)
            {const cart2=Vue.createApp({

            data(){

                return{
                    cartTotals:0,
                    itemCount:0
                }
            },
            methods:
            {
                saveCart()
                {
                    var myObj = cart;
                

                
var filtered = cart.filter(function (el) {
    console.log("we here");
    return el != null;
  });

  console.log(filtered);
  var myObjString = JSON.stringify(filtered);
                // store string in mySQL database here
                orderdata=myObjString;
                console.log(myObjString);
                        return myObjString;
                },
                retrieveCart(myJSONString){
                    // load string from database

                    var myLoadedObj = JSON.parse(myJSONString);
                    var cart3=cart.some(car => car.color === "red");
                    for(var i in cart)
                    {
                    console.log(cart[i]);
                    }
                                    },
                                    //show cart items
                                    showCartItems(){
                                        TheCart=cart.filter(function (el) {
                                         
                                            return el != null;
                                           
                                          }) ;  
                                          cart=TheCart;
                                     
                                        if(cart.length<1)
                                        {
                                            alert("No item in your cart a yet");
                                        }else{
                                        document.getElementById("overlay").style["display"]="block";
                                        this.checkChanges();
                                        }
                                    },
                                    checkChanges()
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
            
                                    },
                                 
            }
        })

        cart2.mount("#shop")


      
    }
    if(document.getElementById("myitems")!=null){
  const MYcartItems=Vue.createApp(
            {
              
            
                    data(){
                        return{
                            refresh:false,
                            MyCartItems:cart.filter(function (el) {
                             
                                return el != null;
                               
                              })
                            
                        }

                    },
                    methods:{

                        printItems(){

                            this.MyCartItems=cart.filter(function (el) {
                             
                                return el != null;
                               
                              }) ;  console.log(this.MyCartItems);

if(this.refresh==false)
                            this.refresh=true;
                            else
                            this.refresh=false;
                            
                          
                            },


                        

                        checkChanges()
                        {  
                            TheCart=cart.filter(function (el) {
                             
                            return el != null;
                           
                          }) ;  
                           
                          for(var i in TheCart)
                    {
                          MainContent= document.createElement("div");
                          unorderedlist=document.createElement("div");
                           Nme=document.createElement("div");
                           Qty=document.createElement("div");
                           totalP=document.createElement("div");
                           var rmv=document.createElement("div");
                          var text=document.createTextNode("CLICK ME");
                          rmv.appendChild(text);
                           rmv.createAttribute("class","btn btn-success");
                           rmv.createAttribute("value","Remove");
                          // rmv.addEventListener("click",()=>{cart[TheCart[i].Name]=null;
                        //this.checkChanges();});
                           

                           Nme.innerHTML=TheCart[i].Name;
                          Qty.innerHTML=TheCart[i].NoItems;
                           totalP.innerHTML=TheCart[i].Total;

                          var top=document.getElementById("theItems");
                           MainContent.appendChild(Nme);
                           MainContent.appendChild(unorderedlist);
                           MainContent.appendChild(Qty);
                           MainContent.appendChild(totalP);
                           MainContent.appendChild(text);
                           MainContent.appendChild(rmv);
                           top.appendChild(MainContent);
                           

                    }

                        },
                    
                    
                },
            }

   ) 
   MYcartItems.mount("#myitems"); 
        }

if(document.getElementById("storepage")!=null){
    
    const stores=Vue.createApp({
            
        
            data()
            {
                        return{ 
                             // calling above function
               Stores: [],  

              temp: this.readTextFile("storedata.json",(text)=>{
                this.Stores= JSON.parse(text); //parse JSON
            }),
                
                            Stores2:
                            [
                                    {
                                        Name:"Megamart Cost Club",
                                        SrcImg:"../images/megamart.jpg",
                                        OpeningHours:"Monday to Saturday 8am-10pm,Sundays 10am to 6pm",
                                        Address:" PerthRoad, Mandeville , Manchester"

                                    }, {
                                        Name:"Hilo Supermarket",
                                        SrcImg:"../images/Hilo.jpg",
                                        OpeningHours:"Monday to Saturday 8am-10pm,Sundays 10am to 6pm",
                                        Address:" Negril Town Center , Westmoreland"

                                    }, {
                                        Name:"Superplus Food Store",
                                        SrcImg:"../images/superplus.jpg",
                                        OpeningHours:"Monday to Saturday 8am-10pm,Sundays 10am to 6pm",
                                        Address:" Mainstreet, Mandeville , Manchester"

                                    }, {
                                        Name:"Progressive Grocers Food Store",
                                        SrcImg:"../images/progressive.png",
                                        OpeningHours:"Monday to Saturday 8am-10pm,Sundays 10am to 6pm",
                                        Address:" Beckford Plaza, Savanna-LaMar , Westmoreland"

                                    }
                            ]
                    }
                            
            },

            methods:{

                readTextFile(file, callback) {
                    var rawFile = new XMLHttpRequest();
                    rawFile.overrideMimeType("application/json");
                    rawFile.open("GET", file, true);
                    rawFile.onreadystatechange = function() {
                        if (rawFile.readyState === 4 && rawFile.status == "200") {
                            callback(rawFile.responseText);
                        }
                    }
                    rawFile.send(null);
                },

                testFile(){

                    this.readTextFile("storedata.json",(text)=>{
                        this.Stores = JSON.parse(text); //parse JSON
                        console.log(this.Stores);
                        return this.Stores;
                    }),
                        
                    console.log(this.Stores);
                }, 
              
            }
        })

        stores.mount("#storepage")
  


  

}



if(document.getElementById("overlay")!=null){

const cartPopup=Vue.createApp({

data(){

    return{
itemtoDisplay:cart,
    }

},
methods:{
            stopshowCartItems(){
                document.getElementById("overlay").style["display"]="none";
              
            

        },

       


}

})
cartPopup.mount("#overlay")

      
      /*  var showCartIcon=document.getElementById("showMyCart");
        showCartIcon.addEventListener("click",()=>{
          document.getElementById("overlay").style["display"]="block";
            alert("yesss");
        
        })*/
    
}

function SaveCart()
{
    var myObj = cart;



var filtered = cart.filter(function (el) {
console.log("we here");
return el != null;
});

console.log(filtered);
var myObjString = JSON.stringify(filtered);
// store string in mySQL database here
orderdata=myObjString;
console.log(myObjString);
        return myObjString;
}
