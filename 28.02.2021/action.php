<?php

    if(isset($_POST['submit'])) {
        $file = $_FILES['image'];
        $result = file_upload($file,1);

        if(isset($result['error'])) {
            echo $result['error']."<a href='index.php'>Geri qayit</a>";
        } else {
            $db = new PDO("mysql:host=localhost;dbname=fscode_intern","root","", array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));

            $image_url = $result['file'];
            $sql = "INSERT INTO `file_upload` SET image_url=? ";
        
            $insert_Data = $db->prepare($sql);
            $adding = $insert_Data->execute([
                "$image_url",
            ]);
            header('Location:result.php');
        }
    }

    function file_upload($file,$limit,$formats=null) {
        $upload_info = [];
        // ------------- //
        if(is_uploaded_file($file['tmp_name'])) {
            $max_size = (1024*1024)*$limit;
            $formats = $formats ? $formats : [
                'image/jpeg',
                'image/png',
                'image/gif'
            ];
            $type = $file['type'];
            $folder = "uploads";
            $image_name = explode('.', $file['name']);
            $image_name = uniqid().".".$image_name[1];

            if($file['error'] == 4) {
                $upload_info['error'] = "Please! Select one file.";
            } else if($file['size'] > $max_size) {
                $upload_info['error'] = "Your selected file is more than $limit mb. You can select a smaller file.";
            } else if(!in_array($type,$formats)) {
                $upload_info['error'] = "Your selected file is not fit format. You can select a fit file.";
            } else {
                $upload = move_uploaded_file($file["tmp_name"], $folder."/".$image_name);
                if($upload) {
                    $upload_info['file'] = "$folder/$image_name";
                } else {
                    $upload_info['error'] = "Download proccess is not successfull! Please try again..";
                }
            }
        } else {
            $upload_info['error'] = "An error occurred while loading the file...";
        }
        return $upload_info;
    }
?>