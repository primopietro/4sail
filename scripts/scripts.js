var ajaxPath = 'http://localhost/4sail/';

/***************SEND MESSAGE***************/
$(document).on("click",".addMessage",function(){
	// Variable to store your files
	var object = $(this).closest("form").find(".objectInput").val();
	var messaged = $(this).closest("form").find(".messageInput").val();
	var fk_user_to = $("#user_id").text();
	var fk_item_id = $("#item_id").text();
	
	var container = $(".divToDisplay");
    var container2 = $(".allpage");
	
	var dataToSend = "";
	
	dataToSend += "object=" + object + "&messaged=" + messaged + "&fk_user_to=" + fk_user_to +"&item_id="+fk_item_id;

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

/***************CREATE MESSAGE***************/
$(document).on("click","#contactSeller",function(){
	var div = $(".divToDisplay");
	var allPage = $(".allpage");
	var id_user = $(this).attr("idtosend");
	var id_item = $(this).attr("iditemtosend");
	//alert(id_item);
	var fill = '';
	
	fill += "<h4 class='h4Margin'>Send message</h4>" +
			"<label id='user_id' class='none'>"+ id_user +"</label>" +
			"<label id='item_id' class='none'>"+ id_item +"</label>" +
			"<form>" +
			"<div class='divInput'><label for='object'>Object:</label><input class='objectInput' name='object' type='text'></input></div>" +
			"<div class='divInput'><label for='messaged'>Message:</label><textarea class='messageInput' name='messaged' type='text'/></div>" +
			"<div class='divButton'><a class='btn btn-fill addMessage'>Send</a></div>" +
			"</form>";
	
	div.append(fill);
	div.show();
	allPage.show();
});

/***************ENTER LOGIN INFO***************/
$(document).on("click","#btnLogin",function(){
	var div = $(".divLogin");
	var allPage = $(".allpage");
	
	var fill = '';
	
	fill += "<div style='width:100%;'><h4 class='h4Login'>Login to 4Sail</h4></div>" +
			"<form>" +
			"<div class='divInput'><label for='email' style='margin-left: 58px;'>Email</label><br><input id='email' class='emailPasswordInput' name='email' type='text' placeholder='ex: test@hotmail.com'></input></div>" +
			"<div class='divInput'><label for='messaged' style='margin-left: 58px;'>Password</label><br><input id='password' class='emailPasswordInput' name='password' type='password' placeholder='Password'></input></div>" +
			"<span id='error'></span>"+
			"<div class='divButton'><a class='btn btn-fill btnLogin'>Login</a></div>" +
			"</form>";
	
	div.append(fill);
	div.show();
	allPage.show();
});

/***************LOG USER IN***************/
$(document).on("click",".btnLogin",function(){
	var div = $(".divLogin");
	var span = $(this).closest("form").find("#error");
	var allPage = $(".allpage");
	
	var email = $(this).closest("form").find("#email");
	var password = $(this).closest("form").find("#password");
	
	
	
	if(email.val() != '' && password.val() != ''){
		var dataToSend = 'email=' + email.val() + '&password=' + password.val();
		$.ajax({
	        url: ajaxPath + 'actions/login.php',
	        type: 'POST',
	        data: dataToSend,
	        success: function(data)
	        {
	        	if(data == "success"){
	        		span.html('');
	        		div.html('');
		        	div.hide();
		        	allPage.hide();
		        	
		        	var completPath = ajaxPath + "index.php";
		        	$(location).attr('href', completPath);
	        	} else{
	        		span.html('');
	        		span.append('Incorrect email or password');
	        	}
	        }
	    });
	} else{
		span.html('');
		span.append('Please fill all the fields');
	}
	
	
});

/***************ENTER SIGN UP INFO***************/
$(document).on("click","#btnSignUp",function(){
	var div = $(".divSignUp");
	var allPage = $(".allpage");
	
	var fill = '';
	
	fill += "<div style='width:100%;'><h4 class='h4Login'>Join 4Sail</h4></div>" +
			"<form>" +
			"<div class='divInput'><label for='first_name' style='margin-left: 58px;'>First name</label><br><input id='first_name' class='emailPasswordInput' name='first_name' type='text' placeholder='ex: Joe'></input></div>" +
			"<div class='divInput' style='padding-top: 4px;'><label for='last_name' style='margin-left: 58px;'>Last name</label><br><input id='last_name' class='emailPasswordInput' name='last_name' type='text' placeholder='ex: Doe'></input></div>" +
			"<span id='space'></span>"+
			
			"<div class='divInput'><label for='email' style='margin-left: 58px;'>Email</label><br><input id='email' class='emailPasswordInput' name='email' type='text' placeholder='ex: test@gmail.com'></input></div>" +
			"<div class='divInput' style='padding-top: 4px;'><label for='email_confirm' style='margin-left: 58px;'>Confirm email</label><br><input id='email_confirm' class='emailPasswordInput' name='email_confirm' type='text' placeholder='ex: test@gmail.com'></input></div>" +
			"<span id='errorEmail'></span>"+
			
			"<div class='divInput'><label for='password' style='margin-left: 58px;'>Password</label><br><input id='password' class='emailPasswordInput' name='password' type='password' placeholder='Password'></input></div>" +
			"<div class='divInput' style='padding-top: 4px;'><label for='password_confirm' style='margin-left: 58px;'>Confirm password</label><br><input id='password_confirm' class='emailPasswordInput' name='password_confirm' type='password' placeholder='Confirm password'></input></div>" +
			"<span id='errorPassword'></span>"+
			
			"<div class='divInput'><label for='phone' style='margin-left: 58px;'>Phone number</label><br><input id='phone' class='emailPasswordInput' name='phone' type='text' placeholder='ex: (819) 582-9971'></input></div>" +
			
			"<div class='divInput'><label for='address' style='margin-left: 58px;'>Address</label><br><input id='address' class='emailPasswordInput' name='address' type='text' placeholder='ex: 1838 rue dunant'></input></div>" +
			
			"<span id='error'></span>"+
			"<div class='divButton'><a class='btn btn-fill btnSignUp'>Sign up</a></div>" +
			"</form>";
	
	div.append(fill);
	div.show();
	allPage.show();
});

/***************SIGN UP USER***************/
$(document).on("click",".btnSignUp",function(){
	var div = $(".divSignUp");
	var allPage = $(".allpage");
	

	var span = $(this).closest("form").find("#error");
	var spanEmail = $(this).closest("form").find("#errorEmail");
	var spanPassword = $(this).closest("form").find("#errorPassword");
	
	
	var first_name = $(this).closest("form").find("#first_name");
	var last_name = $(this).closest("form").find("#last_name");
	
	var email = $(this).closest("form").find("#email");
	var email_confirm = $(this).closest("form").find("#email_confirm");
	
	var password = $(this).closest("form").find("#password");
	var password_confirm = $(this).closest("form").find("#password_confirm");
	
	var phone = $(this).closest("form").find("#phone");
	
	var address = $(this).closest("form").find("#address");
	
	var boolEmail = 0;
	var boolPassword = 0;
	
	if(first_name.val() != '' && last_name.val() != '' && email.val() != '' && email_confirm.val() != '' && password.val() != '' 
		&& password_confirm.val() != '' && phone.val() != '' && address.val() != '' && email.val()){
		span.html('');
		
		if(email.val() == email_confirm.val()){
			spanEmail.html('');
			boolEmail = 1;
		}else{
			spanEmail.html('');
			spanEmail.append('Email confirmation does not correspond');
		}
		
		if(password.val() == password_confirm.val()){
			spanPassword.html('');
			boolPassword = 1;
		}else{
			spanPassword.html('');
			spanPassword.append('Password confirmation does not correspond');
		}
		
		if(boolPassword == 1 && boolEmail == 1){
			var dataToSend = 'first_name=' + first_name.val() + '&last_name=' + last_name.val() + '&email=' + email.val() + '&password=' + password.val() + '&phone=' + phone.val() + '&address=' + address.val();
			$.ajax({
		        url: ajaxPath + 'actions/addAccount.php',
		        type: 'POST',
		        data: dataToSend,
		        success: function(data)
		        {
		        	if(data == "success"){
		        		span.html('');
		        		spanEmail.html('');
		        		spanPassword.html('');
		        		
		        		div.html('');
			        	div.hide();
			        	allPage.hide();
			        	
			        	alert("Successful account creation. You can now login with: " + email.val());
		        	}
		        }
		    });
		}
	} else{
		span.html('');
		span.append('Please fill all the fields');
	}
	
	
});

/***************CONSULT USER INFO***************/
$(document).on("click","#userConsult",function(){
	var div = $(".divUserConsult");
	var allPage = $(".allpage");
	
	var dataToSend = "";
	
	$.ajax({
        url: ajaxPath + 'actions/getAccount.php',
        type: 'POST',
        data: dataToSend,
        success: function(data)
        {
    		div.append(data);
    		div.show();
    		allPage.show();
        }
    });
});

/***************CONFIRM USER INFO***************/
$(document).on("click",".btnConfirmProfile",function(){
	var div = $(".divUserConsult");
	var allPage = $(".allpage");
	

	var span = $(this).closest("form").find("#error");
	
	var first_name = $(this).closest("form").find("#first_name");
	var last_name = $(this).closest("form").find("#last_name");
	
	var email = $(this).closest("form").find("#email");
	
	var password = $(this).closest("form").find("#password");
	
	var phone = $(this).closest("form").find("#phone");
	
	var address = $(this).closest("form").find("#address");
	
	if(first_name.val() != '' && last_name.val() != '' && email.val() != '' && password.val() != '' 
		&& phone.val() != '' && address.val() != '' && email.val()){
		span.html('');
		
		var dataToSend = 'first_name=' + first_name.val() + '&last_name=' + last_name.val() + '&email=' + email.val() + '&password=' + password.val() + '&phone=' + phone.val() + '&address=' + address.val();
		$.ajax({
	        url: ajaxPath + 'actions/updateAccount.php',
	        type: 'POST',
	        data: dataToSend,
	        success: function(data)
	        {
	        	if(data == "success"){
	        		span.html('');
	        		
	        		div.html('');
		        	div.hide();
		        	allPage.hide();
		        	
		        	alert("Successful account update.");
		        	
		        	var completPath = ajaxPath + "index.php";
		        	$(location).attr('href', completPath);
	        	}
	        }
	    });
	} else{
		span.html('');
		span.append('Please fill all the fields');
	}
	
	
});

//MODAL HANDLES CLICKS OUTSIDE
$(document).mousedown(function(e) {
	var container = null;
	
	if($('.divToDisplay').css('display') == 'block'){
		container = $(".divToDisplay");
	} else if($('.divLogin').css('display') == 'block'){
		container = $(".divLogin");
	} else if($('.divSignUp').css('display') == 'block'){
		container = $(".divSignUp");
	} else if($('.divUserConsult').css('display') == 'block'){
		container = $(".divUserConsult");
	}
	
    
    var container2 = $(".allpage");
    // if the target of the click isn't the container nor a descendant of the container
    if (container != null){
	    if (!container.is(e.target) && container.has(e.target).length === 0) 
	    {
	    	container.html('');
	        container.hide();
	        container2.hide();
	    }
    }
});

//Create referral links
$(document).on("click","#share",function(){
	var div = $('#reflink');
	var infos = $('#infos').val();
	infos = infos.split(' ');
	var iId = infos[0];
	var sId = infos[1];
	var data = {sellerId : sId, itemId : iId};

    $.ajax({
        url: ajaxPath + 'actions/refToken.php',
        type: 'POST',
        data: data,
        success: function(data)
        {
            div.val(window.location.href+'?ref='+data);
            div.show();
            $('#copy').show();

        }
    });
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
//Get message list
$(document).on("click","#loadMessages",function(){
	var div = $(".divToDisplay");
	var allPage = $(".allpage");
	
	var fill = '';
	
	
	 fill += "<h4 class='h4Margin'>Message list</h4>" ;
	 $.ajax({
	        url: ajaxPath + 'actions/getMessageList.php',
	        success: function (response) {
	        	
	        	fill +=response;
	        	div.append(fill);
	        	div.show();
	        	allPage.show();
	        }
	    });
});
//Get actual message
$(document).on("click",".4sMessage",function(){
	$(".divToDisplay").html("")
	var div = $(".divToDisplay");
	var allPage = $(".allpage");
	var idMessage = $(this).attr('idmsg');
	var fill = '';
	
	 
	 $.ajax({
	        url: ajaxPath + 'actions/getMessage.php?idMessage='+idMessage,
	        success: function (response) {
	        	fill +=response;
	        	div.append(fill);
	        	div.show();
	        	allPage.show();
	        }
	    });
});
