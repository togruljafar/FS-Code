<?php
    $url = "https://www.havaproqnozu.com/baki-15-gunluk-hava-veziyyeti-taxmini.html";
    $page = file_get_contents($url);
    // Əldə etdiyim indexə görə həmin indexdəki məlumatları çəkib ekrana yazdırıram
    function writeWeather($page,$j) {
        // Çəkəcəyim məlumatları arrayə yığıram
        $items = [
            'minTemp' => '<td align="center" data-title="Alçaq">',
            'maxTemp' => '<td align="center" data-title="Yüksək">',
            'hissEdilen' => '<td align="center" data-title="Hiss edilir">',
            'rutubet' => '<td align="center" data-title="Rütubət">',
            'kulek' => '<td align="center" data-title="Külək">',
            'gunCixmasi' => '<td align="center" data-title="Günün çıxması">',
            'qurub' => '<td align="center" data-title="Qürub">'
        ];
        // 
        function getinfo($page,$items,$key,$j) {
            // göndərilən key-ə görə items arrayimdəki tag-ı secirəm
            preg_match_all('@'.$items[$key].'(.*?)</td>@si', $page, $result);
            // buradaki $j => bugünün tarixində aid olan məlumatların indexsini göstərir
            $result = $result[1][$j];
            return $result;
        }
    
        echo "<tr>";
        // items arrayinin uzunlugu qeder 
        foreach ($items as $index => $item) {
            //arrayimdəki key dəyərlərinə görə saytdan hemin məlumatları alıram və table-a yazdırıram
            $item = getinfo($page,$items,$index,$j);
            echo "<td>".$item."</td>";
        }
        echo "</tr>";
    }

    function check_Date($page) {
        preg_match_all('@<td align="left" data-title="Tarix" class="text-nowrap">(.*?)</td>@si', $page, $dates);
        $dates = $dates[1];
        $todayDate = date("d/m/Y");

        function get_date($date) {
            // saytdan çəkilən tarixlər Az olduğu üçün strtotime() funksiyasını -
            // istifadə edə bilmək üçün months arrayı yaradıram
            $months = [
                'yanvar' => "January",
                'fevral' => "February",
                'mart' => "March",
                'aprel' => "April",
                'may' => "May",
                'iyun' => "June",
                'iyul' => "July",
                'avqust' => "August",
                'sentyabr' => "September",
                'oktyabr' => "October",
                'noyabr' => "November",
                'dekabr' => "December"
            ];
            $pierce = '';   
            $mydate = [];   
            $count = 0;     // mydate arrayime ötürdüyüm dəyərlərin yəni arrayimin lengthini bilmək üçün
            for($i=0;isset($date[$i]);$i++) {
                $pierce .= $date[$i];
                if($date[$i] === " ") {
                    if($count === 1) {
                        // count 1-ə bərabər olarsa datedəki ayı seçməyə başlayır
                        foreach($months as $key => $month) {
                            if(trim($pierce) === $key) {
                                $mydate[] = $month;     // ayı ingilis dilinə çevirmək üçün
                            }
                        }
                    } else { 
                        $mydate[] = $pierce; 
                    }
                    $pierce = '';
                    $count++;   // hər arrayə ötürülən dəyər üçün bir vahid artır
                    if($count === 3) {
                        // date arrayimizdeki tarixin yalniz gün/ay/il dəyərini seçmək üçün 
                        // count=3 dən sonra loop dayandırılır
                        break;
                    }
                }
            }
            $mydate = implode(" ", $mydate);
            $d=strtotime($mydate);
            $d=date("d/m/Y", $d);   // əldə etdiyimiz tarixi formatını düzəldirik
            return $d;
        }
        // saytdan çəkdiyim arraydəki tarixləri loopa salıram
        foreach($dates as $j => $value) {
            // tarixi oxunaqlı olmağı üçün render edirəm
            $gettedDate = get_date($value);
            // saytdan çəkdiyim tarix ilə bugünkü tarix bərabər olarsa index -> j-nı writeWeather() funksiyama ötürürəm
            if($gettedDate === $todayDate) {
                writeWeather($page,$j);
            }

        }
    }

    check_Date($page);

?>