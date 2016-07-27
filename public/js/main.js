$(function(){
	$('#featured-home .item-block').each(function(){
		var id = $(this).attr('id');
			// alert(id.length);
		$('#'+id+' .thumb-item').html('Loading...');
		$('#'+id+' .title-item a').html('Loading...');
		$('#'+id+' .no-item span .count').html('...');
	$.ajax({
		url: 'https://www.googleapis.com/youtube/v3/videos?id='+id+'&key=AIzaSyAJjL8TE8BQ2TwwuanBLdHixq_RCLpRvBE&part=snippet,statistics',
		dataType: 'json',
        // cache: false,
		success: function(data){
			$('#'+id+' .thumb-item').html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+id+'" frameborder="0" allowfullscreen></iframe>');
			$('#'+id+' .title-item a').html(data.items[0].snippet.title);
			$('#'+id+' .no-item span .viewCount').html(data.items[0].statistics.viewCount);
			$('#'+id+' .no-item span .likeCount').html(data.items[0].statistics.likeCount);
			$('#'+id+' .no-item span .dislikeCount').html(data.items[0].statistics.dislikeCount);
			$('#'+id+' .no-item span .commentCount').html(data.items[0].statistics.commentCount);
		},
		error: function(){
			console.log('fail');
		}
	});


	})
	// var tt = [];
	// $('#'+id+' .thumb-item').html('Loading...');
	// $('#'+id+' .title-item a').html('Loading...');
	// $('#'+id+' .thumb-item').html('Loading...');
	// $('#'+id+' .thumb-item').html('Loading...');
	// $.getJSON('https://www.googleapis.com/youtube/v3/videos?id='+id+'&key=AIzaSyAJjL8TE8BQ2TwwuanBLdHixq_RCLpRvBE&part=snippet,statistics', function(data){	 
	// 	if (typeof(data.items[0]) != "undefined") {
	// 		$('#'+id+' .thumb-item').html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+id+'" frameborder="0" allowfullscreen></iframe>');
	// 		$('#'+id+' .title-item a').html(data.items[0].snippet.title);
	// 		// $('#'+id).html(data.items[0].snippet.title);
	// 	   } else {
	// 	     console.log('video not exists');
	// 	 }   
	// });
	
});

