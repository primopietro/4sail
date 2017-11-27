$(document).on("click",".addObj",function(){
		// Variable to store your files
		var title = $("#item_title").val();
		var category = $("#item_cat").val();
		var price = $("#item_price").val();
		var description = $("#item_desc").val();
		var keywords = $("#item_keywords").val();
		var idUser = "0";
		
		data+="&item_cat="+category;
		data+="&item_title="+title;
		data+="&item_price="+price;
		data+="&item_desc="+description;
		data+="&item_keywords="+keywords;
		data+="&user_id="+idUser;

		
		  $.ajax({
		        url: ajaxPath + 'actions/addItem.php?files',
		        type: 'POST',
		        data: data,
		        cache: false,
		        dataType: 'json',
		        processData: false, // Don't process the files
		        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		        success: function(data, textStatus, jqXHR)
		        {
		            if(typeof data.error === 'undefined')
		            {
		                // Success so call function to process the form
		                submitForm(event, data);
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
		            console.log('ERRORS: ' + textStatus);
		            // STOP LOADING SPINNER
		        }
		    });
		
	}