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
});

function format_date(date)
{	var date = new Date(date);

	return (date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear();
}
