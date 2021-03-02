<?php
    // create dinamic curl
    function createCurl($url, $page = null) {
        $url = $url.$page;
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    // get page count
    function getPageCount($url) {
        $response = createCurl($url);

        if(!$response){
            echo 'Curl error: ' . curl_error($curl);
        }else{
            preg_match_all('@<li class=("page-item.+")>(.*?)</li>@', $response, $result);
            $li = $result[0];
            $page = 0;
            for($i=0;isset($li[$i]);$i++) {
                $page++;
            }
            return $page;
        }
    }
    // blocks count in page
    function getArrLen($response, $patterns) {
        preg_match_all('@'.$patterns['date'].'@', $response, $result);
        $result = $result[1];
        $arrLength=0;
        foreach($result as $value) {
            $arrLength++;
        }
        return $arrLength;
    }
    // get all data of eaach block
    function getBlockData($response,$patterns,$i) {
        $blockArr = [];
        // patterns arrayinin uzunlugu qeder 
        foreach ($patterns as $key => $pattern) {
            // göndərilən key-ə görə patterns arrayimdəki tag-ı secirəm
            preg_match_all('@'.$patterns[$key].'@', $response, $result);
            $result = $result[1];

            if($key === 'title' || $key === 'description' || $key === 'image') {
                $result = $result[$i+1];
            } else {
                $result = $result[$i];
            }
            
            $blockArr[$key] = $result;
        }
        return $blockArr;
    }
    // get data of all block of each page
    function getPageData($url,$page,$patterns) {
        $page = "?page=$page";
        $response = createCurl($url, $page);

        if(!$response){
            echo 'Curl error: ' . curl_error($curl);
        } else {
            $pageArr = [];
            // items length on page
            $arrLen = getArrLen($response, $patterns);
            for($i=0;$i<$arrLen;$i++) {
                // add the blocks on the page to pageArr[] array
                $pageArr[] = getBlockData($response,$patterns,$i);
            }
            return $pageArr;
        }

    }

    $url = "https://www.booknetic.com/blog";
    $page = getPageCount($url);  // page count
    $arr = [];  // all data
    $patterns = [
        'title' => '<h2>(.*?)</h2>',
        'date' => '<span class="bl-date">(.*?)</span>',
        'description' => '<p>(.*?)</p>',
        'image' => '<img src="(.*?)" alt="" class="img-fluid">',
        'url' => '<a href="(.*?)" class="btn btn-fill">Read More</a>'
    ];
    // get data for each page
    for($i=1;$i<=$page;$i++) {
        $arr["page_$i"] = getPageData($url,$i,$patterns);
    }

    echo "<pre>";
    print_r($arr);
    echo "</pre>";

?>