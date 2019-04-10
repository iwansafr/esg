$(document).ready(function(){
	function li_active(){
		var current = $('a[href="'+location.href+'"]').closest('li');
		current.addClass('active');
		if(current.parent('ul').length>0){
			current.closest('ul').closest('li').addClass('active');
		}
	}
	$('[data-toggle="tooltip"]').tooltip()
	li_active();
	$('input,textarea,select').filter(':visible:first').focus();
	// CKEDITOR.replace('textckeditor');
	$(document).on('click','#selectAllDel',function() {
	  var checkedStatus = this.checked;
	  $('input[class="del_check"]').each(function() {
	    $(this).prop('checked', checkedStatus);
	  });
	});
	$(document).on('click','.selectAll',function(){
		var checkedStatus = this.checked;
		var add = $(this).attr('add');
		$('input[class="'+add+'"]').each(function() {
	    $(this).prop('checked', checkedStatus);
	  });
	});
	$(document).on('click','#selectAllPub',function() {
	  var checkedStatus = this.checked;
	  $('input[class="pub_check"]').each(function() {
	    $(this).prop('checked', checkedStatus);
	  });
	});
	function readURL(input,a){
    if (input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
        $(a).attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
	}
	$(document).on('change', 'input[type="file"]', function(){
		var a = $(this).siblings('.image_place');
		console.log(a);
		readURL(this,a);
	});

	// $('img.image').on('click', function(){
	// 	var a = $(this).attr('src');
	// 	alert(a);
	// });

	$(document).on('change', 'input[type="checkbox"]', function(){
		var a = $(this);
		var b = $(this).closest('table');
		var c = b.attr('table_name');
		var d = a.val();
		var e = a.attr('class');
		var f = this.checked;
		if(c!==undefined&&d!==undefined&&e!==undefined)
		{
			console.log(c);
			console.log(d);
			console.log(e);
			console.log(f);
			$.ajax({
				 url: ''
			});
		}
	});

	$('.del_image').on('click', function(){
		var a = $(this).parent().parent().attr('data');
		$(this).closest('.image').remove();
		$('input[type="hidden"][name="'+a+'"]').val('');
	});
	$('.del_images').on('click', function(){
		var a = $(this).parent().parent().attr('data');
		$(this).closest('.image').remove();
		$('input[type="hidden"][value="'+a+'"]').remove();
	});
	$(document).on('click','a',function(e){
		var this_link = this.href;
		var target = this.target;
		var no_load = $(this).attr('no_load');
		if(this_link.includes('#')){

		}else if(this_link.includes('javascript')){

		}else if(target=='_blank')
		{

		}else if(no_load){
			
		}else if(event.ctrlKey){
			
		}
		else if($(this).hasClass('page-link')){
			e.preventDefault();
			$('#loading').removeClass('hidden');
			$('.content').load(this_link, function(){
				$('#loading').addClass('hidden');
			});
		}
		else{
			$('#loading').removeClass('hidden');
		}
	});
	$('form').on('submit',function(){
		$('#loading').removeClass('hidden');
	});
});