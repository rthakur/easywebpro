$(document).ready(function ()
{	$("#heading_color_picker").colorpicker();
	$("#sub_heading_color_picker").colorpicker();

	$("#collapse_heading").on("show.bs.collapse", function (event)
	{	var button = $(event.relatedTarget);
		var url = $(this).find("#url_get").val();
		var data = {'var':'heading'}

		$.get(url, data, function (val)
		{	var res = $.parseJSON(val);

			$("#collapse_heading #heading").val(res['res']);
		});
	});
	
	//If heading blank then show default text in heading
	if($('.heading').text().trim()=='')
	{	
		$('.heading').text('Tag Line For Heading');
		$('.aheading').text('Add');
		$('.updateheading').text('Add');
	}
	
	//If Sub-heading blank then show default text in sub-heading
	if($('.subheading').text().trim()=='')
	{	
		$('.subheading').text('Tag Line For Sub-Heading');
		$('.asubheading').text('Add');
		$('.updatesubheading').text('Add');
	}
	
	
	
	$("#collapse_sub_heading").on("show.bs.collapse", function (event)
	{	var button = $(event.relatedTarget);
		var url = $(this).find("#url_get").val();
		var data = {'var':'sub_heading'}

		$.get(url, data, function (val)
		{	var res = $.parseJSON(val);

			$("#collapse_sub_heading #sub_heading").val(res['res']);
		});
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

	$("#collapse_social").on("show.bs.collapse", function (event)
	{	var button = $(event.relatedTarget);
		var url = $(this).find("#url_get").val();
		var data = {'var':'social'}
		
		$("html, body").animate({scrollTop: $('body').height()});

		$.get(url, data, function (val)
		{	var res = $.parseJSON(val);

			$("#collapse_social #facebook").val(res['res']['fb']);
			$("#collapse_social #twitter").val(res['res']['tw']);
			$("#collapse_social #linkedin").val(res['res']['ln']);
		});
	});

	$("div#skin-selector button.skin-change").click(function ()
	{	var btn = $(this);
		var url = $("div#skin-selector").attr("data-url");
		var skin_id = $(this).attr("data-id");
		var redirect_url = $("div#skin-selector").attr("data-redir-url");

		$.post(url, {'skin_id':skin_id}, function (val)
		{	if(val == "success")
			{	var new_btn = $("#cur_skin_btn");

				new_btn.attr("style", new_btn.attr("style") + 
					";background-color:"+btn.css("background-color")+
					";color:"+btn.css("color"));
				new_btn.text(btn.text());
			}
		});
	});

	$("form#update-sections input[type='checkbox']").change(function ()
	{	var id = $(this).val();
		var url = $("form#update-sections").attr("action");
		var btn = $(this);

		var active = $(this).prop('checked');
		active = (active == true)?"true":"false";

		$.post(url, {'id':id, 'active':active}, function (val)
		{	if (val == "failure")
				btn.bootstrapToggle('toggle');
		});
	});
	
	//Delete Section
	$('.deletesection').click(function(){
		var id =$(this).attr('data-id');
		var Data = confirm("Do you want delete "+$(this).attr('data-name'));
		if(Data==true){
			$.get('admin/sections/deletesection', {'id':id}, function (val)
			{		if(val=='success')
					location.reload();
			});
		}
	});

 
   $( "#sortable" ).sortable({
		   update: function(event, ui) {
		   var menuOrder="";
		   var url = $('#menuOrderPath').val();

			$("#sortable li").each(function(i) {
			    if (menuOrder=='')
					menuOrder = $(this).attr('data-menu-id');
				else
				   menuOrder += "," + $(this).attr('data-menu-id');
			});
	
			$.post(url, {'menuOrder':menuOrder}, function (data)
			{	

			});

		}
	});

	$(".html_page_save").click(function ()
	{	var btn = $(this);
		var visible = btn.attr("data-visible");
		var save_url = btn.attr("data-save-url");
		var post_url = btn.attr("href");

		$.post(post_url, {'url':save_url, 'visible':visible}, function (val)
		{	if (val == "success")
			{	if (visible == "true")
					btn.attr("data-visible", "false");
				else
					btn.attr("data-visible", "true");

				location.reload();
			}
			else
				alert("Some problem occured!!");
		});

		return false;
	});

	$("#title_image").change(function ()
	{	var btn = $(this);
		var post_url = btn.attr("data-post-url");

		var active = "false";
		if (btn.prop('checked'))
		{	active = "true";
		}

		$.post(post_url, {'active':active}, function (val)
		{	
		});
	});

	$(".heading_colorpicker").on("changeColor", function (event)
	{	$(".heading").css("color", event.color.toString());
		$("input[name=heading_color]").val(event.color.toString());
	});

	$(".sub_heading_colorpicker").on("changeColor", function (event)
	{	$(".subheading").css("color", event.color.toString());
		$("input[name=sub_heading_color]").val(event.color.toString());
	});

	var title_image_active = $(".title_image_div").attr("data-");
});
