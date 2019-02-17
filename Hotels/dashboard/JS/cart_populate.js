/*<div class="Table1">      
            <img src="ICONS/CHAIR.PNG" alt="" id="chair_icon" style="margin-left: 30px;">  
             <p id="text1">Table1</p>
             <p id="text2" >@Ramakrishnan</p>
             <img src="ICONS/meal.png" alt="" id="cup_icon" >
             <p id="text3" >7 items</p>                 
             <p id="text4" >$500.00</p>
             <a href="" id="text5" ><u style="color:white;font-size:125%;">Bill Print</u></a>
            </div> */

function cart()
{ var cart_data;
    i=1;
    $.ajax({
        type : 'post',
        url : 'PHP/cart.php',
        data : {},
        dataType:'json',
        success : function(result){
      console.log("cart");
      console.log(result);

    $.each(result,function(key,value){
    console.log(value.name);
    console.log(value.table_number);
    cart_data = '<div class="Table1">'
    +'<img src="ICONS/CHAIR.PNG"'+' alt="" class="chair_icon" id="icon1'+i+'" style="margin-left: 30px;">'
    +'<p class="text1" id="table'+i+'">Table'+value.table_number+'</p>'
    +'<p class="text2" id="att'+i+'">@'+value.name+'</p>'
    +'<img src="ICONS/salad.png" alt="" id="icon'+i+'" class="cup_icon">'
    +'<p class="text3" id="item'+i+'">7items</p>'
    +'<p class="text4" id="amt'+i+'">$500.00</p>'
    +'<a href="" class="text5" data-toggle="modal" data-target="#bill" id="a'+i+'">'
    +'<u style="color:white;font-size:125%">Bill Print</u>'+'</a>'
    +'</div>';   
    console.log(cart_data);
    $('#cart').append(cart_data);
    i++;
});
}
});
}