var ajaxPath = 'http://localhost/4sail/';

$(document).on("click",".addMessage",function(){
	// Variable to store your files
	var object = $(this).closest("form").find(".objectInput").val();
	var messaged = $(this).closest("form").find(".messageInput").val();
	var fk_user_to = $("#user_id").text();
	
	var container = $(".divToDisplay");
    var container2 = $(".allpage");
	
	var dataToSend = "";
	
	dataToSend += "object=" + object + "&messaged=" + messaged + "&fk_user_to=" + fk_user_to;

	if(object != "" && messaged != ""){
	  $.ajax({
	        url: ajaxPath + 'actions/addMessage.php',
	        type: 'POST',
	        data: dataToSend,
	        success: function(data)
	        {
	        	container.html('');
	            container.hide();
	            container2.hide();
	        }
	    });
	}else{
		alert("Please fill all the fields");
	}
	
});

$(document).on("click","#contactSeller",function(){
	var div = $(".divToDisplay");
	var allPage = $(".allpage");
	var id_user = $(this).attr("idtosend");
	
	var fill = '';
	
	fill += "<h4 class='h4Margin'>Send message</h4>" +
			"<label id='user_id' class='none'>"+ id_user +"</label>" +
			"<form>" +
			"<div class='divInput'><label for='object'>Object:</label><input class='objectInput' name='object' type='text'></input></div>" +
			"<div class='divInput'><label for='messaged'>Message:</label><textarea class='messageInput' name='messaged' type='text'/></div>" +
			"<div class='divButton'><a class='btn btn-fill addMessage'>Send</a></div>" +
			"</form>";
	
	div.append(fill);
	div.show();
	allPage.show();
});

$(document).mouseup(function(e) {
    var container = $(".divToDisplay");
    var container2 = $(".allpage");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
    	container.html('');
        container.hide();
        container2.hide();
    }
});

//Filter price
$(document).on("click","#filter",function(){
	filter();
})

//Filter Order
$(document).on("change","#order",function(){
    filter();
})

//Search
$(document).on("click",".btn-search",function(){
    filter();
})



function filter() {

	//price filter
    var pricerangetext = $("#amount").val();
    var pricewithoutsymbol = pricerangetext.replace('$', '');
    var pricewithoutsymbol2 = pricewithoutsymbol.replace('$', '');
    var pricerange = pricewithoutsymbol2.split(' - ');

    //order by
    var orderSense = $("#order").val();
    var orderBy = null;
    switch(orderSense) {
        case '1':
            orderBy = 'price';
            orderSense = 'ASC';
            break;
        case '2':
            orderBy = 'price';
            orderSense = 'DESC';
            break;
        default:
            orderBy = null;
            orderSense = null;
    }

    //search
	var keyword = $("#search").val();
	if (keyword !== ''){
        var search = 'active';
	}else{
		var search = null;
	}


    var data = {priceFrom : pricerange[0], priceTo : pricerange[1], orderBy : orderBy, orderSense : orderSense, search : search, keyword : keyword};

    $.ajax({
        url: ajaxPath + 'actions/store.php?filter=1',
        type: 'POST',
        data: data ,
        success: function(data, textStatus, jqXHR)
        {

            if(typeof data.error === 'undefined')
            {
                $('.xt-each-feature').html(' ');
                $('.xt-each-feature').html(data);
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {

            // Handle errors here
            console.log('ERRORS: ' + textStatus + errorThrown + jqXHR);
            // STOP LOADING SPINNER
        }
    });
}