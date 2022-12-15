
function rendercart(){


    for (let index = 0; index < products.length; index++) {
      
        document.getElementById("products").innerHTML+=`
        <div >        
       <div class="productcard store" style="width: 18rem;">
       
               <div id="productimg"> <img class="product-img"  style="height:80px; width:auto;" src= '${products[index].srcImg}'   alt="Card image cap"/></div>
            <div id="productbody" style="height:140px;">
                  <span><b>${products[index].Name}</b></span>
                  <span>Price:$ ${products[index].UnitPrice}</span>
                  <span>3 for $ ${Math.floor((products[index].UnitPrice*products[index].pricefor3)*100)/100}</span>
                  <div style="display:flex; flex-direction:row; justify-content:space-between;margin-bottom:10px;"> 
                     
                  <span>Quantity:</span><span><button  onclick="reduceQuantity(products[${index}])">-</button><span name="${products[index].id}"> ${products[index].quantity} </span><button onclick="addQuantity(products[${index}])">+</button></span>
                  </div>
                  <div style="display:flex; flex-direction:row; justify-content:space-between;margin-bottom:10px;" > 
                     
                  <span id="${products[index].id}" style="display:none;color:red">Out of stock</span>
        </div>
                 
              </div> <button class="btn btn-success" style=" width:70%;margin-left:15%;" onclick="addToCart(products[${index}])">Add to Cart</button>
        </div>
        </div>
        `;
        


    }


}


function clearcart()
{
    cart=null;
    cart=[];
   updateCartDisplay();
    stopshowCartItems();
    checkChanges();
}

function outofstock(id){
    if(products[2].instock===false)
    {
        document.getElementById(id).style["display"]="block";
    }
   if(products[0].id==id)
{document.getElementById(id).style["display"]="block";}else{
    products[2].instock=false;
}
}
function stillinstock(id){
   
    document.getElementById(id).style["display"]="block";
    }