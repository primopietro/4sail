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