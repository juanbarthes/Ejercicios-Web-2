<?php
    function listGenerate($elements, $limit){    
        if ($limit > count($elements)) {
            $limit = count($elements);
        }
        $listOfElements = "";
        for($i = 0; $i < $limit; $i++){
                $listOfElements = $listOfElements . itemGenerate($elements[$i]);
            }
            return "<ol>" . $listOfElements . "</ol>";
        }

    function itemGenerate($element){
        return "<li>". $element ."</li>";
    }
    $elements = ["e0", "e1", "e2", "e3", "e4", "e5", "e6", "e7", "e8"];
    $listOfElements = "";
    if (isset($_GET["valor"]) && ($_GET["valor"] != "")) {
        $limit = $_GET["valor"];
        echo listGenerate($elements, $limit);
    }
?>