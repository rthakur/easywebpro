$(document).ready(function ()
{	$('.datepicker').datepicker();

	$('#updateDialog').on('show.bs.modal', function (event)
	{	var button = $(event.relatedTarget);

		var id = button.data("update-id");
		var image = button.data('update-img');
		var title = button.data('update-title');
		var description = button.data('update-description');
		var to = button.data('update-to');
		var from = button.data('update-from');
		var imgUrl = button.data('update-imgUrl');

		var modal = $(this);
		modal.find('.modal-body input[name="id"]').val(id);
		modal.find('.modal-body #title').val(title);
		modal.find('.modal-body #displayPic').text('/assets/'+image);
		modal.find('.modal-body input[name="default_img"]').
			val(image);
		modal.find('.modal-body #description').val(description);
		modal.find('.modal-body #to').val(format_date(to));
		if (from != '0000-00-00')
			modal.find('.modal-body #from').val(format_date(from));
	});

	$("#insertForm").submit(function ()
	{	var is_valid = $("#insertForm input[name='valid']").val();

		if (is_valid == "true")
			return true;

		var image = $("#insertForm #image").val();
		var title = $("#insertForm #title").val();
		var description = $("#insertForm #description").val();
		var from = $("#insertForm #from").val();
		var to = $("#insertForm #to").val();

		var validateUrl = $("#insertForm input[name='validUrl']").val();

		var data = {'image':image, 'title':title,
			'description':description, 'from':from, 'to':to};

		$.post(validateUrl, data, function (val)
		{	var error_list = $("#insertDialog div.errors ul");
			var res = $.parseJSON(val);
			var error_count = 0;

			error_list.empty();

			for (var key in res)
			{	error_list.append("<li>"+res[key][0]+"</li>");
				error_count++;
			}

			if (error_count == 0)
			{	$("#insertForm input[name='valid']").val("true");
				$("#insertForm").submit()
			}
		});

		return false;
	});

	$("#updateForm").submit(function ()
	{	var is_valid = $("#updateForm input[name='valid']").val();

		if (is_valid == "true")
			return true;

		var id = $("#updateForm #id").val();
		var image = $("#updateForm #image").val();
		var title = $("#updateForm #title").val();
		var description = $("#updateForm #description").val();
		var from = $("#updateForm #from").val();
		var to = $("#updateForm #to").val();

		var validateUrl = $("#updateForm input[name='validUrl']").val();

		var data = {'image':image, 'title':title,
			'description':description, 'from':from, 'to':to, 'id':id};

		$.post(validateUrl, data, function (val)
		{	var error_list = $("#updateDialog div.errors ul");
			var res = $.parseJSON(val);
			var error_count = 0;

			error_list.empty();

			for (var key in res)
			{	error_list.append("<li>"+res[key][0]+"</li>");
				error_count++;
			}

			if (error_count == 0)
			{	$("#updateForm input[name='valid']").val("true");
				$("#updateForm").submit()
			}
		});

		return false;
	});

	$("#collapse_title").on("show.bs.collapse", function (event)
	{	var button = $(event.relatedTarget);
		var url = $(this).find("#url_get").val();
		var data = {'var':'title'}

		$.get(url, data, function (val)
		{	var res = $.parseJSON(val);

			$("#collapse_title #title").val(res['res']);
		});
	});

	$("#collapse_description").on("show.bs.collapse", function (event)
	{	var button = $(event.relatedTarget);
		var url = $(this).find("#url_get").val();
		var data = {'var':'description'}

		$.get(url, data, function (val)
		{	var res = $.parseJSON(val);

			$("#collapse_description #description").val(res['res']);
		});
	});

	$("#toggleHtml").change(function ()
	{	var active = true;
		var $this = $(this);
		if ($(this).prop('checked'))
			active = false;
		else
			active = true;
		active = (active == true) ? "true": "false";
		
		var url = $(this).attr("data-url");
		
		$.post(url, {'active':active}, function (val)
		{	if (val == "failure"){
				$("#toggleHtml").toggle();
			}else{		
				if($this.parent().hasClass('off'))
 				$('a[href$="#about_tab_make"]').click();
				else
				$("a[href='#about_tab_timeline']").click();	
			}		
		});			
	});

});

function format_date(date)
{	var date = new Date(date);

	return (date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear();
}
