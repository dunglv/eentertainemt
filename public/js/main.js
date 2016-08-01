$(function(){
	$('.item-block.item-video').each(function(){
		var id = $(this).attr('id').substr(8,30);
		var $strid = $(this).attr('id');
		console.log(id);
			// alert(id.length);
		$('#'+$strid+' .thumb-item').html('Loading...');
		$('#'+$strid+' .title-item a').html('Loading...');
		$('#'+$strid+' .no-item span .count').html('...');
	$.ajax({
		url: 'https://www.googleapis.com/youtube/v3/videos?id='+id+'&key=AIzaSyAJjL8TE8BQ2TwwuanBLdHixq_RCLpRvBE&part=snippet,statistics',
		dataType: 'json',
        // cache: false,
		success: function(data){
			$('#'+$strid+' .thumb-item').html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+id+'" frameborder="0" allowfullscreen></iframe>');
			$('#'+$strid+' .title-item a').html(data.items[0].snippet.title);
			$('#'+$strid+' .no-item span .viewCount').html(data.items[0].statistics.viewCount);
			$('#'+$strid+' .no-item span .likeCount').html(data.items[0].statistics.likeCount);
			$('#'+$strid+' .no-item span .dislikeCount').html(data.items[0].statistics.dislikeCount);
			$('#'+$strid+' .no-item span .commentCount').html(data.items[0].statistics.commentCount);
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

