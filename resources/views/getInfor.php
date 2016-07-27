<?php 
function youtube_title($id) {
// $id = 'YOUTUBE_ID';
// returns a single line of JSON that contains the video title. Not a giant request.
// key = API KEY
$videoTitle = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$id."&key=AIzaSyAJjL8TE8BQ2TwwuanBLdHixq_RCLpRvBE&part=snippet,statistics");
// despite @ suppress, it will be false if it fails
if ($videoTitle) {
$json = json_decode($videoTitle, true);

return $json['items'][0];
} else {
return false;
}
}
// echo "<pre>";
// print_r(youtube_title('MlndhFK0VrE')); 
// echo "</pre>";
?>