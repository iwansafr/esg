$(document).ready(function(){
	var data;
	function set_option(select,data)
	{
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

	$('select[name="position_id"]').on('change', function(){
		var a = $(this).val();
		var select = $('select[name="par_id"]');
		var option = data[a];
		var tmp = [];
		for(var i =0; i< option.length;i++){
			tmp[i] = [];
			tmp[i].text = option[i].title;
			tmp[i].value = option[i].id;
		}
		set_option(select, tmp);
	});
	$.ajax({
    url: _URL+'admin/menu/parent',
    success:function(result){
    	result = JSON.parse(result);
    	if(result.status)
    	{
    		var a = $('select[name="par_id"]').selectedIndex;
    		data = result.data;
    		// var tmp = [{'text':'none','value':'','selected':'true'}];
    		// set_option($('select[name="par_id"]'), tmp);
    		var option = data[a];
				var tmp = [];
				for(var i =0; i< option.length;i++){
					tmp[i] = [];
					tmp[i].text = option[i].title;
					tmp[i].value = option[i].id;
				}
    		set_option($('select[name="par_id"]'), tmp);
    	}else{
    		alert('data not found');
    	}
    }
  });
});