<?php
    function drawChess() {
        $lightStyle = 'style="width:70px; height:70px; background-color: #e3cb7b"'; // light dama style
        $darkStyle  = 'style="width:70px; height:70px; background-color: #c49152"'; // dark dama style
        $alphaCol   = ['','a','b','c','d','e','f','g','h'];                         // array for alphabetic sorting

        echo '<table style="border-spacing: 0;background-color:#6b5f4a; border-top: 5px solid #6b5f4a; border-right: 5px solid #6b5f4a">';

        for($i=8; $i>0; $i--) {
            echo '<tr>
                    <th style="padding: .5em;">'.$i.'</th>';    // board sidebar numeral section

            if($i%2==0){
                for($j=0;$j<4;$j++){
                    echo '<td '.$lightStyle.'></td>
                          <td '.$darkStyle.'></td>';
                }
            } else {
                for($j=0;$j<4;$j++){
                    echo '<td '.$darkStyle.'></td>
                        <td '.$lightStyle.'></td>';
                }
            }
        }
        // print down section => alphabetic sorting
        echo '<tr>';
        for($i=0; $i<count($alphaCol); $i++) {
            echo '<th style="padding: .2em">'.$alphaCol[$i].'</th>';
        }
        echo '</tr>
            </table>';
    }

    drawChess();

?>