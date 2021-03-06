//category Ajax Filtering
jQuery(document).ready(function($){
	//Load posts on page load
	category_get_posts();

	//If list item is clicked, trigger input change and add css class
	$('#category-filter li').live('click', function(){
		const input = $(this).find('input');
		
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
		const category = [];
	
		$("#category-filter li input:checked").each(function() {
			const val = $(this).val();
			category.push(val);
		});		
		
		return category;
	}
	


	//Main ajax function
	function category_get_posts(paged) {
		const paged_value = paged;
		const ajax_url = ajax_category_params.ajax_url;

		$.ajax({
			type: 'GET',
			url: ajax_url,
			data: {
				action: 'category_filter',
				albums: getSelectedCat,
				paged: paged_value
			},
			// beforeSend: function () {
			// 	// $("#filter-results").html('<div id="preloader" class="preloader"><div class="load"><svg class="load__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" width="100" height="100"><g fill="#FFF"><path d="M55.201 15.5h-8.524l-4-10H17.323l-4 10H12v-5H6v5H4.799A4.803 4.803 0 0 0 0 20.299v29.368A4.838 4.838 0 0 0 4.833 54.5h50.334A4.838 4.838 0 0 0 60 49.667V20.299a4.803 4.803 0 0 0-4.799-4.799zM8 12.5h2v3H8v-3zm50 37.167a2.836 2.836 0 0 1-2.833 2.833H4.833A2.836 2.836 0 0 1 2 49.667V20.299A2.803 2.803 0 0 1 4.799 17.5h9.878l4-10h22.646l4 10h9.878A2.803 2.803 0 0 1 58 20.299v29.368z"/><path d="M30 14.5c-9.925 0-18 8.075-18 18s8.075 18 18 18 18-8.075 18-18-8.075-18-18-18zm0 34c-8.822 0-16-7.178-16-16s7.178-16 16-16 16 7.178 16 16-7.178 16-16 16z"/><path d="M30 20.5c-6.617 0-12 5.383-12 12s5.383 12 12 12 12-5.383 12-12-5.383-12-12-12zm0 22c-5.514 0-10-4.486-10-10s4.486-10 10-10 10 4.486 10 10-4.486 10-10 10zM52 19.5c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"/></g></svg><div class="load__dots"><span class="load__dot"></span><span class="load__dot"></span><span class="load__dot"></span><span class="load__dot"></span></div></div></div>');
			// 	$('#filter-results').html('Ładujemy ...');
			// },
			success: function(data) {
				// console.log("SUCCESS");
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