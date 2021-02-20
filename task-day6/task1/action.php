<?php
    if(isset($_POST['username']) && !empty($_POST['username'])) {
        $username = $_POST['username'];

        $page = file_get_contents("https://www.instagram.com/$username?__a=1");
        $obj = json_decode($page, true);
        // daxil edilən username-də hesab yoxdursa ana səhifəyə gedib error versin
        empty($obj) ? header('Location: index.php?user=error') : null;

        $user = $obj['graphql']['user'];

        $bio = $user['biography'];
        $name = $user['full_name'];
        $pic = $user['profile_pic_url_hd'];
        $follower = $user['edge_followed_by']['count'];
        $following = $user['edge_follow']['count'];


        // alternativ variant
        $url = "https://www.instagram.com/$username/";

        $curl = curl_init();
    
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        
        $response = curl_exec($curl);
        if(!$response){
            echo 'Curl error: ' . curl_error($curl);
        }
        else{
            $dom = new DOMDocument();
            @$dom->loadHTML($response);
    
            $metas = $dom->getElementsByTagName('meta');
            $data = [
                'name' => '',
                'followers' => 0,
                'followings' => 0,
                'bio' => '',
                'image' => ''
            ];
            foreach($metas as $meta){
                $attributes = $meta->attributes;
                foreach($attributes as $attribute){
                    $nodeName = $attribute->nodeName;
                    $nodeValue = $attribute->nodeValue;
                    if($nodeName === 'property' && $nodeValue === 'og:title'){
                        $name = $meta->getAttribute('content');
                        if(strpos($name, '(@') !== false) {
                            $name = explode('(@', $name)[0];
                        } else {
                            $name = explode(' ', $name)[0]." ".explode(' ', $name)[1];
                        }
                        $data['name'] = $name;
                    }
                    if($nodeName === 'property' && $nodeValue === 'og:description'){
                        $followerdata = $meta->getAttribute('content');
                        $followerdata = explode(', ', $followerdata);
                        $data['followers'] = preg_replace('/[^\d]+/im', '', $followerdata[0]);
                        $data['followings'] = preg_replace('/[^\d]+/im', '', $followerdata[1]);
                    }
                    if($nodeName === 'property' && $nodeValue === 'og:image'){
                        $image = $meta->getAttribute('content');
                        $data['image'] = $image;
                    }
                }
            }
        }
    } else {
        header('Location: index.php?user=?');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        .image {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Name Surname</th>
                <th scope="col">Followers</th>
                <th scope="col">Followings</th>
                <th scope="col">Bio</th>
                <th scope="col">Profile Image</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td><?=$username;?></td>
                <td><?=$name;?></td>
                <td><?=$follower;?></td>
                <td><?=$following;?></td>
                <td><?=$bio;?></td>
                <td>
                    <img class="image" src="<?=$pic;?>" alt="User Profile Picture">
                </td>
            </tr>
            <!-- alternative variant result -->
            <tr>
                <th scope="row">1</th>
                <td><?=$username;?></td>
                <td><?=$data['name'];?></td>
                <td><?=$data['followers'];?></td>
                <td><?=$data['followings'];?></td>
                <td><?=$data['bio'];?></td>
                <td>
                    <img class="image" src="<?=$data['image'];?>" alt="User Profile Picture">
                </td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-primary ml-1" href="index.php">Geri Qayıt</a>
</body>
</html>