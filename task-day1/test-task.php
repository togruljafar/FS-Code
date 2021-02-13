<?php 

$text = "suretli kod yazmaq her zaman daha yaxsi kod yazmaq demek deyil. seliqeye ve hellin optimalligina da fikir verilmelidir.";
$sentences = explode('.', $text);
foreach($sentences as $i => $sentence){
    $sentences[$i] = ucfirst(trim($sentence));
}
$text = implode('.', $sentences);
echo $text;