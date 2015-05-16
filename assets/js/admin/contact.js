$(document).ready(function ()
{	$("#collapse_title").on("show.bs.collapse", function (event)
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
