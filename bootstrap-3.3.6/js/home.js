$(document).ready(function(){
	$(':text').click(function(){
		current_input_val = $(this).val();
		$(this).select();
	}).focusout(function(){
		if($(this).val() == ''){
			$(this).val(current_input_val);
		}
	});

	$(':password').focusin(function() {
		if($(this).attr('placeholder') != undifined){
			$(this).removeAttr('placeholder')
		}
	});

	$(':password.password').focusout(function(){
		$(this).attr('placeholder', 'Password');
	});

	$('password.password_confirm').focusout(function(){
		$(this).attr('placeholder', 'Confirm Password');
	});

		
});

$(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
});
