$(document).ready(function(){
	var data;
	console.log(_ID);
	// if(_ID==undefined)
	// {
	// 	var _ID=0;
	// }
	function set_option(select,data)
	{
		while (select[0].options.length) {
    	select[0].remove(0);
    }
		var selectbox = select[0].options;
		for(var i = 0, l = data.length; i < l; i++){
		  var option = data[i];
		  select[0].options.add( new Option(option.text, option.value, option.selected) );
		}

	}

	$('select[name="position_id"]').on('change', function(){
		var a = $(this).val();
		var select = $('select[name="par_id"]');
		if(data[a] == undefined){
			var tmp = [{'text':'None','value':'0','selected':'true'}];
		}else{
			var option = data[a];
			var tmp = [{'text':'None','value':'0','selected':'true'}];
			for(var i =0; i< option.length;i++){
				tmp[i+1] = [];
				tmp[i+1].text = option[i].title;
				tmp[i+1].value = option[i].id;
			}
		}
		set_option(select, tmp);
	});
	$.ajax({
		type:'post',
		data: {id:_ID},
    url: _URL+'admin/menu/parent',
    success:function(result){
    	result = JSON.parse(result);
    	console.log(result);
    	if(result.status)
    	{
    		var a = $('select[name="position_id"]').val();
    		data = result.data;
    		var select = $('select[name="par_id"]');
				if(data[a] == undefined){
					var tmp = [{'text':'None','value':'0','selected':'true'}];
				}else{
					var option = data[a];
					var tmp = [{'text':'None','value':'0','selected':'true'}];
					for(var i =0; i< option.length;i++){
						tmp[i+1] = [];
						tmp[i+1].text = option[i].title;
						tmp[i+1].value = option[i].id;
					}
				}
				set_option(select, tmp);
    	}else{
    		alert('data not found');
    	}
    }
  });
});