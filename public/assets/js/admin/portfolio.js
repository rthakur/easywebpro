$(document).ready(function ()
{	$('#updateDialog').on('show.bs.modal', function (event)
	{	var button = $(event.relatedTarget);

		var id = button.data("update-id");
		var image = button.data('update-img');
		var title = button.data('update-title');
		var category = button.data('update-category');
		var imgUrl = button.data('update-imgUrl');

		var modal = $(this);
		modal.find('.modal-body input[name="id"]').val(id);
		modal.find('.modal-body #title').val(title);
		modal.find('.modal-body #displayPic').text('/assets/'+image);
		modal.find('.modal-body input[name="default_img"]').
			val(image);
		modal.find('.modal-body #category').val(category);		
	});
});
