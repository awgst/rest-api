<!-- API KEY : AIzaSyCNcYUoCrGZg4bdnwhWOTbXGsGgFko0Btc -->
<?php
    function getCurl($url){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }
    $result = getCurl('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCGJqAUGLk_GRT0B0wS6qK9A&key=AIzaSyCNcYUoCrGZg4bdnwhWOTbXGsGgFko0Btc');
    $youtubeProfilePict = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
    $youtubeChannelName = $result['items'][0]['snippet']['title'];
    $subscriberCount = $result['items'][0]['statistics']['subscriberCount'];
    $subscriberCount = $subscriberCount > 0 ? $subscriberCount : 'Belum ada subscriber';

    $res = getCurl('https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyCNcYUoCrGZg4bdnwhWOTbXGsGgFko0Btc&channelId=UCGJqAUGLk_GRT0B0wS6qK9A&order=date&maxResults=1');
    if($res['pageInfo']['totalResults']>0){
        $lastVideoId = $res['items'][0]['id']['videoId'];
    }
    // IG
    $apiToken = 'IGQVJWT1FLcHZA3Vi0wU3dWRzFOSVY4alplMEdrYUxBR1k3Q0RjVEplT2xZAc1Q0dXhxS2JMNjJJYW1JLWhCbWNTWGhkRkFnMVZAnaWlaalVIZAHgzZAjdaZAzR3YXVxMzViZAjhCVDkzZAGJ4cTRWOFdQZAmswbgZDZD';
    $clientId = '869708843961654';
    $userId = '4507928715905440';
    // Get username
    $result = getCurl('https://graph.instagram.com/v11.0/me?fields=username&access_token='.$apiToken);
    $username = $result['username'];
    // Get img
    $result = getCurl('https://graph.instagram.com/me/media?access_token=IGQVJWT1FLcHZA3Vi0wU3dWRzFOSVY4alplMEdrYUxBR1k3Q0RjVEplT2xZAc1Q0dXhxS2JMNjJJYW1JLWhCbWNTWGhkRkFnMVZAnaWlaalVIZAHgzZAjdaZAzR3YXVxMzViZAjhCVDkzZAGJ4cTRWOFdQZAmswbgZDZD&fields=id,media_url');
    $gambar = array();
    for ($i=0; $i < 3 ; $i++) { 
        array_push($gambar, $result['data'][$i]['media_url']);
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Public API</title>
  </head>
  <body>
    <h1>Hello</h1>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Social Media</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?=$youtubeProfilePict?>" alt="ini gambar" class='rounded-circle img-thumbnail' style="width: 100%; height: 100%;">
                    </div>
                    <div class="col-md-8">
                        <h5><?=$youtubeChannelName?></h5>
                        <p><?=$subscriberCount?></p>
                        <div class="d-flex justify-content-end pe-5">
                            <div class="g-ytsubscribe" data-channelid="UCGJqAUGLk_GRT0B0wS6qK9A" data-layout="default" data-theme="dark" data-count="default"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <?php
                            if (isset($lastVideoId)) {
                               echo `<div class="ratio ratio-16x9">
                                    <iframe
                                        src="https://www.youtube.com/embed/vlDzYIIOYmM"
                                        title="Latest Video"
                                        allowfullscreen
                                    ></iframe>
                                </div>`;                                
                            }
                            else{
                                echo 'Belum ada video';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="21480282_518322535181257_5481070034308562944_a.jpg" alt="ini gambar" class='rounded-circle img-thumbnail'>
                        </div>
                        <div class="col-md-8">
                            <h5><?=$username?></h5>
                        </div>
                    </div>
                    <div class="row row-cols-3">
                        <?php
                            foreach ($gambar as $gb){
                                echo '<div class="col"><img src="'.$gb.'" alt="" style="width: 100%; height:150px"></div>';
                            }
                        ?>
                        
                    </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>