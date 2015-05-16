$(document).ready(function ()
{	$('#updateDialog').on('show.bs.modal', function (event)
	{	var button = $(event.relatedTarget);

		var id = button.data("update-id");
		var image = button.data('update-img');
		var name = button.data('update-name');
		var designation = button.data('update-designation');
		var imgUrl = button.data('update-imgUrl');

		var modal = $(this);
		modal.find('.modal-body input[name="id"]').val(id);
		modal.find('.modal-body #name').val(name);
		modal.find('.modal-body #displayPic').text('/assets/'+image);
		modal.find('.modal-body input[name="default_img"]').
			val(image);
		modal.find('.modal-body #designation').
			val(designation);		
	});

	$("#insertForm").submit(function ()
	{	var is_valid = $("#insertForm input[name='valid']").val();
		
		if (is_valid == "true")
		{	return true;
		}

		var image = $("#insertForm #image").val();
		var name = $("#insertForm #name").val();
		var designation = $("#insertForm #designation").val();

		var validateUrl = $("#insertForm input[name='validUrl']").val();

		var data = {'image':image, 'name':name, 'designation':designation};

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
		var name = $("#updateForm #name").val();
		var designation = $("#updateForm #designation").val();
		var image = $("#updateForm #image").val();

		var validateUrl = $("#updateForm input[name='validUrl']").val();

		var data = {'image':image, 'name':name, 
			'designation':designation, "id":id};

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
});
