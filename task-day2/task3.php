<?php
    $tarix1 = "07-04-2000";
    $tarix2 = "12-10-1977";

    function setDate($date) {
        $date = explode('-', $date); //verilen tarixleri '-' isaresine gore parcalayib arraye elave etmek
        // arrayimdeki datalari sirasina gore day, month, year deyisenlerine elave edirik.
        $day = intval($date[0]);
        $month = intval($date[1]);
        $year = $date[2];
        // change month to month name
        switch($month) {
            case 1:
                $month = "Yanvar";
                break;
            case 2:
                $month = "Fevral";
                break;
            case 3:
                $month = "Mart";
                break;
            case 4:
                $month = "Aprel";
                break;
            case 5:
                $month = "May";
                break;
            case 6:
                $month = "Iyun";
                break;
            case 7:
                $month = "Iyul";
                break;
            case 8:
                $month = "Avqust";
                break;
            case 9:
                $month = "Sentyabr";
                break;
            case 10:
                $month = "Oktyabr";
                break;
            case 11:
                $month = "Noyabr";
                break;
            case 12:
                $month = "Dekabr";
                break;
            default:
                $month = "Undefined";
        }
        echo $day." ".$month.", ".$year."<br>";
    }
    
    setDate($tarix1);
    setDate($tarix2);
    
?>