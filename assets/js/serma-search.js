function get_more_posts (element) {
	let $ = jQuery
	let btn = $( element )

	btn.prop('disabled', true)

	let container = $( btn.attr('serma-list-target') )
	let url = serma_ajax_url + 'serma_get_search_ajax'
	let data = {
		page: parseInt(btn.attr('serma-sm-post-page')),
		query: btn.attr('serma-sm-query'),
		post_type: btn.attr('serma-sm-post-type')
	}
	$.ajax({
		url : url,
		data : data,
		type : 'POST',
		success : function( res ){
			btn.prop('disabled', false)
			if( res ) { 
				container.append(res)
				btn.attr('serma-sm-post-page', data.page + 1)
			} else {
				btn.remove()
			}
		}
	})
}
