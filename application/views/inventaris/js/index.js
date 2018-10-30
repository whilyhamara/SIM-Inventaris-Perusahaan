$(document).ready(function () {
  
//BEGIN OO SELECT BOX with hidden inputs 1 of 2: DON'T MODIFY!

//Hide fields not supposed to be shown
$('.hideContent').hide();

/*** .live() method is deprecated and replaced with .on(). To use this code with jQuery libraries under 1.7+ you will need to use the following .live() method.
$("select.dropdownHideContent").live('change',function() {
	displaySelectContent($(this).attr("id"));
});
***/

$(document).on("change", "select.dropdownHideContent", function(){ 
	displaySelectContent($(this).attr("id"));
});

//Loop through selects with hidden content and display content if option selected on page refresh
//Support for browsers that don't clear form form fields on refresh
$("select.dropdownHideContent").each(function(){
	var selectID = $(this).attr("id");
    if($("#"+selectID).val()) {
		displaySelectContent($("#"+selectID).attr("id"));
	};	
});

function displaySelectContent(chkID)
	{
		var optionID = $("option:selected","#"+chkID).attr('id');  
		$('[id^="'+chkID+'-"]').hide('slow');
		$('#'+chkID+'-'+optionID).show('slow');
	};
//END OO SELECT BOX with hidden inputs 1 of 2
  
}); // End $(document).ready()