<?php
    $datas = [
        [
            'name' => 'Nermin',
            'surname' => 'Eliyev',
            'age' => 12,
            'gender' => 'q'
        ],
        [
            'name' => 'Kamil',
            'surname' => 'Rahimli',
            'age' => 13,
            'gender' => 'k'
        ],
        [
            'name' => 'Zaur',
            'surname' => 'Qurbaneliyev',
            'age' => 12,
            'gender' => 'k'
        ],
        [
            'name' => 'Melahet',
            'surname' => 'Isgenderli',
            'age' => 12,
            'gender' => 'q'
        ],
        [
            'name' => 'Ali',
            'surname' => 'Rzayev',
            'age' => 11,
            'gender' => 'k'
        ],
        [
            'name' => 'Ramin',
            'surname' => 'Orucov',
            'age' => 10,
            'gender' => 'k'
        ],
        [
            'name' => 'Veli',
            'surname' => 'Kerimli',
            'age' => 13,
            'gender' => 'k'
        ],
        [
            'name' => 'Zamiq',
            'surname' => 'Aliyev',
            'age' => 14,
            'gender' => 'k'
        ],
        [
            'name' => 'Esmaye',
            'surname' => 'Mustafayeva',
            'age' => 12,
            'gender' => 'q'
        ],
        [
            'name' => 'Veli',
            'surname' => 'Kerimli',
            'age' => 15,
            'gender' => 'k'
        ]
    ];

    function ClassEvent($datas) {
        $girlsCount     = 0;            // all of the girls count in Class
        $boysCount      = 0;            // all of the boys count in Class
        $agesSum        = 0;            // total age of all students in class
        $n              = 1;            // student numbers for table
        $olderStudent   = $datas[0];    // the oldest student in class and I set the default value
        $youngerStudent = $datas[0];    // the youngest student in class and I set the default value
        
        echo '<table>
                <tr>
                    <th style="width:20px;">№</th>
                    <th>Ad, Soyad</th>
                    <th>Yaş</th>
                    <th>Cins</th>
                </tr>';
        
        foreach ($datas as $key => $value) {
            // students table print to screen
            echo '<tr>
                    <td>'.$n++.'</td>
                    <td>'.$value['name']." ".$value['surname'].'</td>
                    <td>'.$value['age'].'</td>
                    <td>'.$value['gender'].'</td>
                  </tr>';

            // general count both of genders
            if ($value['gender'] === 'q') {
                $girlsCount++;
            } else if($value['gender'] === 'k') {
                $boysCount++;
            }
            
            $agesSum += $value['age'];    // sum all students age

            // finding student which is older of class
            if($olderStudent>=$value['age']) {
                $olderStudent = $value;
            }
            
            // finding student which is younger of class
            if($youngerStudent['age'] >= $value['age']) {
                $youngerStudent = $value;
            }
        }
        echo '</table>';

        $studentCount = $n-1;   // $n => students number for table but it is *ONE* count higher its in last loop
        // To find the average age, we divide the sum of the total ages by the number of children in the class in line 117
        
        // print result
        echo '<p>Oğlanların sayı: '.$boysCount.'</p>
              <p>Qızların sayı: '.$girlsCount.'</p>
              <p>Sinifdəki uşaqların ümumi yaş ortalaması: '.$agesSum/$studentCount.'</p>
              <p>Sinifdəki ən kiçik tələbənin adı: '.$youngerStudent['name']." ".$youngerStudent['surname'].'</p>
              <p>Sinifdəki ən böyük tələbənin adı: '.$olderStudent['name']." ".$olderStudent['surname'].'</p>
              <p>Sinifdəki uşaqların ümumi sayı: '.$studentCount.'</p>';

    }

    ClassEvent($datas);
    
?>
