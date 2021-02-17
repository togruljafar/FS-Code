<?php
    $submitValue  = '';      // Submited value
    $integerLow   = '';      // Low Integer
    $integerHigh  = '';      // High Integer
    $decimalLow   = '';      // Low Decimal of submited value
    $decimalHigh  = '';      // High Decimal of submited value

    if(isset($_POST['submit']) && !empty($_POST['number'])) {
        $submitValue = $_POST['number'];    // get submited value
        // take integer pierce of submited value
        for($i=0;isset($submitValue[$i]);$i++) {
            if($submitValue[$i] === ".") {
                break;
            } else {
                if($submitValue >= 0) {
                    // 0 and plus number
                    $integerLow .= $submitValue[$i];
                } else {
                    // minus number
                    $integerHigh .= $submitValue[$i];
                }
            }
        }

        if($submitValue < 0) {
            // minus number
            $decimalHigh = $integerHigh - $submitValue;
            $integerLow  = $integerHigh - 1;
            $decimalLow  = $submitValue - $integerLow;
        } else {
            // plus number
            $decimalLow  = $submitValue - $integerLow;
            $integerHigh = $integerLow  + 1;
            $decimalHigh = $integerHigh - $submitValue;
        }
    }
    

    echo '<tr>
            <td>'.$submitValue.'</td>
            <td>'.$integerLow.' ('.$decimalLow.')</td>
            <td>'.$integerHigh.' ('.$decimalHigh.')</td>
          </tr>';

?>