$(document).ready(function(){
	$('input[name="image_link"]').on('change',function(){
		var a = $(this).val();
		if(a!==''){
			var c = ''+
							'<label for="image_link">Image_link</label>'+
							'<div class="image">'+
									'<a href="#">'+
										'<img src="'+a+'" class="img-responsive image-thumbnail image" style="object-fit: cover;width: 50px;height: 50px;" data-toggle="modal" data-target="#img_image_link">'+
									'</a>'+
								'</div>'+
								'<div class="modal fade" id="img_image_link" tabindex="-1" role="dialog" aria-labelledby="img_image_link">'+
								  '<div class="modal-dialog" role="document">'+
								    '<div class="modal-content">'+
								      '<div class="modal-header">'+
								        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
								        '<h4 class="modal-title" id="img_title_image_link">image_link</h4>'+
								      '</div>'+
								      '<div class="modal-body" style="text-align: center;">'+
								        '<img src="'+a+'" class="img-thumbnail img-responsive">'+
								      '</div>'+
								      '<div class="modal-footer">'+
								      '</div>'+
								    '</div>'+
								  '</div>'+
								'</div>'+
								'';
			$('#thumbnail-image_link').html(c);
		}
	});
});