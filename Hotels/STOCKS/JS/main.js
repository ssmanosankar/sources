$(document).ready(function(){

    populatedealer();

    var selected_data = "";

    $(document).on('click','.add .dealer_carts .cart',function () {
       
        console.log($(this).attr('id'));
              var id = $(this).attr('id');
              
        if(id == selected_data)
            return;
       $(this).addClass('selected');
       if(selected_data != "")
           $('#'+selected_data).removeClass('selected');
       selected_data = id;
     putdealerdetails(selected_data);
    });  

    $('#add_dealer').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type : 'post',
            url : 'PHP/add_dealer.php',
            data : new FormData(this),
            contentType : false,
            cache : false,
            processData : false,
            dataType : 'text',
            success : function(result){
                if(result == "success")
               alert("Dealer Deatils Added succesfully");
                else
                alert("Oops!!Error");
            }
    
          });
        });



        
});
function populatedealer() {
    $.ajax({
        type : 'post',
        url : 'PHP/cart_data.php',
        data : {},
        dataType : 'json',
        success : function (result) {
            var data;
            $.each(result,function (key, value) {
            
                data=
                '<div class="cart" id="'+value.dealer_name+'">'
                +'<div><p id="name_tag">Name:</p><p id="name_value">'+value.dealer_name+'</p></div>'
                +'<div><p id="dealer_tag">Category:</p><p id="dealer_value">'+value.dealer_category+'</p></div>'
                +'</div>';
                console.log(data);
                $('.add .dealer_carts').append(data);
                });
            }        
            });  
  
    }


    function putdealerdetails(dealer_name) {
        $.ajax({
            type : 'post',
            url : 'PHP/cart_dealer_data.php',
            data : {dealer_name :dealer_name },
            dataType : 'json',
            success : function (result) {
                 
            //      $('.add .dealer_carts_details .dealer').remove();
            //      var data=
            //      '<div class="dealer">'
            //     +'<div class="header_data"> <h3 id="tag1">Dealers Deatils</h3></div>'
            //     +'<div class="tag_parent1"><div><p id="tag2">Dealer Name: </p></div><div><p id="tag21">'+ result['dealer_name']+'</p></div> </div>'
            //     +'<div class="tag_parent2"><div><p id="tag3">Contact Number: </p></div><div><p id="tag31">'+ result['contact_number']+'</p></div> </div>'
            //     +'<div class="tag_parent3"><div><p id="tag4">Dealer Category: </p></div><div><p id="tag41">'+ result['dealer_category']+'</p></div> </div>'
            //     +'<div class="tag_parent4"><div><p id="tag5">Nick Name: </p></div><div><p id="tag51">'+ result['nick_name']+'</p></div> </div>'
            //     +'<div class="tag_parent5"><div><p id="tag6">Dealer Address: </p></div><div><p id="tag61">'+ result['dealer_address']+'</p></div> </div>'
            //     +'<div class="tag_parent6"><div><p id="tag7">Dealer Purchase: </p></div><div><p id="tag71">'+ result['dealer_purchase']+'</p></div><div><p id="tag72">'+ result['item_size']+'</p></div> </div>'
            //     +'<div class="tag_parent7"><div><p id="tag8">Dealer Amount: </p></div><div><p id="tag81">'+ result['dealer_amount']+'</p></div> </div>'
            //     +'<button id="delete" class="btn">Remove User</button>'
            //     +'</div>';              
            //  $('.add .dealer_carts_details').append(data);
                }
        });
        }