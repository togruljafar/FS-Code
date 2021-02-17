<?php include('includes/header.php'); ?>

<?php
    function createColorGame() {
        $colorsArr = [];
        //create rgb color parametr
        function createRGB($rgbColor = ''){
            for($i=0;$i<3;$i++) {
                $x = rand(0,255);
                $rgbColor === '' ? $rgbColor .= $x : $rgbColor .= ",".$x;
            }
            $rgbColor = 'rgb('.$rgbColor.')';
            return $rgbColor;
        }

        // CorrectColor is answer of my game
        $correctColor = createRGB();
        $colorsArr[]  = $correctColor;

        echo '<p>'.$correctColor.'</p>';

        // the others colors / wrong answer
        for($i=0;$i<3;$i++) {
            $otherColor  = createRGB();
            $colorsArr[] = $otherColor;
        }
        // function for change place colors in array
        function changeColorPlace($arr) {
            $index       = rand(0,count($arr)-1);
            $x           = $arr[$index];
            $arr[$index] = $arr[0];
            $arr[0]      = $x;
            return $arr;
        }
        // colorsArr = changed colors array
        $colorsArr = changeColorPlace($colorsArr);
        // print color sphere
        foreach($colorsArr as $color) {
            echo '<a href="index.php?color='.$color.'&correct='.$correctColor.'" class="cubic" style="background-color:'.$color.'"></a>';
        }
        //chech my answer
        if(isset($_GET['color']) && isset($_GET['correct'])) {
            $selected = $_GET['color'];
            $correct  = $_GET['correct'];
            if($selected === $correct) {
                header('Location: index.php?answer=true');
            } else {
                header('Location: index.php?answer=false');
            }
        }
        // In order not to show the answers in the header and to shorten the length, in the previous condition
        // I returned true false with location
        if(isset($_GET['answer'])) {
            if($_GET['answer'] === 'true') {
                echo "<p style='color:green'>Təbriklər! Doğru cavab..</p>";
            } else {
                echo "<p style='color:red'>Cavabınız Yanlışdır!</p>";
            }
        }
    }
    createColorGame();

?>
    
<?php include('includes/footer.php'); ?>