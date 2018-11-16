//category Ajax Filtering
jQuery(document).ready(function($){
	//Load posts on page load
	category_get_posts();

	//If list item is clicked, trigger input change and add css class
	$('#category-filter li').live('click', function(){
		var input = $(this).find('input');
		
		if ( $(this).attr('class') == 'clear-all' ) {

			$('#category-filter li').removeClass('selected').find('input').prop('checked',false);
			category_get_posts();

		} else if (input.is(':checked')) {

			input.prop('checked', false);
			$(this).removeClass('selected');

		} else {

			input.prop('checked', true);
			$(this).addClass('selected');	

		}

		input.trigger("change");
	});
	
	//If input is changed, load posts
	$('#category-filter input').live('change', function(){
		category_get_posts(); //Load Posts
	});
	
	//Find Selected categorys
	function getSelectedCat() {
		var category = [];
	
		$("#category-filter li input:checked").each(function() {
			var val = $(this).val();
			category.push(val);
		});		
		
		return category;
	}
	


	//Main ajax function
	function category_get_posts(paged) {
		var paged_value = paged;
		var ajax_url = ajax_category_params.ajax_url;

		$.ajax({
			type: 'GET',
			url: ajax_url,
			data: {
				action: 'category_filter',
				albums: getSelectedCat,
				paged: paged_value
			},
			beforeSend: function () {
				//Show loader here
				console.log('LOADER');
			},
			success: function(data) {
				console.log("SUCCESS");
				$('#filter-results').html(data);

				new LazyLoad({
					elements_selector: ".lazy",
				});

			},
			error: function() {
				$("#filter-results").html('<p>There has been an error</p>');
			}
		});				
	}
	
});