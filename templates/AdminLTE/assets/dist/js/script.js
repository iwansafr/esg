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
	function isFileImage(file) {
    return file && file['type'].split('/')[0] === 'image';
	}
	function readURL(input,a){
    if (input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
      	// if(e.total>500000 && isFileImage(input.files[0])){
      	// 	var suc = $(a).siblings('input[type="file"]').val('');
    			// alert('ukuran file tidak boleh lebih dari 500KB');
      	// }else{
        	$(a).attr('src', e.target.result);
      	// }
      };
      reader.readAsDataURL(input.files[0]);
    }
	}
	$(document).on('change', 'input[type="file"]', function(){
		console.log($(this));
		var a = $(this).siblings('.image_place');
		readURL(this,a);
	});

	$(document).on('change', 'textarea[name="videos"]', function(){
		console.log($(this));
		var a = $(this).val();
		a = a.split(',');
		if(a.length>1){
			for(i = 0 ; i<a.length; i ++){
				$(this).closest('.form-group').append('<iframe width="560" height="315" src="'+a[i]+'" frameborder="0" allow="accelerometer; autoplay; gyroscope; picture-in-picture" allowfullscreen></iframe>');
			}
		}
		
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
			
		}else if(event.metaKey){
			
		}
		else if($(this).hasClass('load_link') || $(this).hasClass('page-link')){
			e.preventDefault();
			$('#loading').removeClass('hidden');
			$('.content').load(this_link, function(){
				$('#loading').addClass('hidden');
				$('.select2').select2();
				$('form').on('submit',function(){
					$('#loading').removeClass('hidden');
				});
			});
		}
		else{
			$('#loading').removeClass('hidden');
		}
	});
	$('.download_file').on('click',function(){
		var a = $(this).attr('href');
		window.open(a,'_blank').document.write('<h1>File Berhasil di Download, silahkan cek folder download anda, dan silahkan tutup jendela ini</h1>');
	});
	$('button').on('click',function(){
		var new_tab = false;
		if(event.ctrlKey){
			new_tab = true;
		}else if(event.metaKey){
			new_tab = true;
		}
		if(new_tab){
			var hide = setInterval(hide_load,500);
			clearInterval(hide);
		}
	});

	function type_url(){
		$(document).on('keyup','input[type="url"]', function(){
			a = this.value;
			a = a.split(' ').join('');
			$(this).val(a);
		});
	}
	type_url();
	function hide_load(){
		$('#loading').addClass('hidden');
	}
	$('form').on('submit',function(){
		$('#loading').removeClass('hidden');
	});
	$('#summernote').summernote({maximumImageFileSize:524288});	
	$('.summernote').summernote({maximumImageFileSize:524288});	
	$('.table-responsive').doubleScroll();

});
function set_option(select,data)
{
	console.log(select);
	console.log(data);
	while (select[0].options.length) {
  	select[0].remove(0);
  }
	var selectbox = select[0].options;
	for(var i = 0, l = data.length; i < l; i++){
	  var option = data[i];
	  select[0].options.add( new Option(option.text, option.value, option.selected) );
	}
}
function options(url = '', select = '',title = ''){
	$.ajax({
		type:'post',
		data: {id:_ID,title:title},
    url: _URL+url,
    dataType:'json',
    success:function(result){
    	if(result.status)
    	{
    		data = result.data;
				var option = data;
				var tmp = [{'text':'None','value':'0'}];
				for(var i =0; i< option.length;i++){
					tmp[i+1] = [];
					tmp[i+1].text = option[i][title];
					tmp[i+1].value = option[i].id;
				}
				tmp.splice(0,1);
				set_option(select, tmp);
    	}
    }
  });
}
