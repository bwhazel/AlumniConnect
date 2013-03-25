$(function(){

    $('.duplicate').live('click', function(){
    	if($(this).hasClass('major'))
    	{
    		$(this).removeClass('duplicate icon-plus').addClass('icon-minus subtract');
    		$('#second_major').hide();
    		$('#second_major').html('<div class="control-group "><label class="control-label" for="second_major">Second Major: </label><div class="controls"><div class="input-prepend"><span class="add-on"><i class="icon-copy"></i></span><input placeholder="Second Major" class="input-xlarge" type="text" name="second_major"> </div></div></div>').fadeIn();
    	}
    	else
    	{
    		$(this).removeClass('duplicate icon-plus').addClass('icon-minus subtract');
    		$('#second_minor').hide();
    		$('#second_minor').html('<div class="control-group "><label class="control-label" for="second_minor">Second Minor: </label><div class="controls"><div class="input-prepend"><span class="add-on"><i class="icon-copy"></i></span><input placeholder="Second Minor" class="input-xlarge" type="text" name="second_minor"> </div></div></div>').fadeIn();
    	}
    });

    $('.subtract').live('click', function(){
		if($(this).hasClass('major')){
    		$(this).removeClass('icon-minus subtract').addClass('duplicate icon-plus');
    		$('#second_major').fadeOut(function(){
    			$('#second_major').delay(1000).empty();
    		});
    	}
    	else
    	{
    		$(this).removeClass('icon-minus subtract').addClass('duplicate icon-plus');
    		$('#second_minor').fadeOut(function(){
    			$('#second_minor').delay(1000).empty();
    		});
    	}
    });

});