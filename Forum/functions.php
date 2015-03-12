<?php
/**
 * User: Hayden H
 * Date: 3/11/2015
 */

function EchoForm($pageToLoad, $idToClick, array $names, array $values){
    echo'
    <form method="post" id="'.$idToClick.'" action="'.$pageToLoad.'">';
    for($i = 0; $i < count($names); $i++) {
        echoHiddenInput($names[$i],$values[$i]);
    }
    echo'</form>   ';
}

function EchoClickPostScript($clickSelector,$formId,array $ids, array $values){
    echo'
    <script type="text/javascript">
        $(document).ready(function () {
            $("'.$clickSelector.'").click(function (event){ ';
        for($i = 0; $i < count($ids); $i++)    {
            echo '$("#'.$ids[$i].'").val('.$values[$i].'); ';
        }
          echo' document.getElementById("'.$formId.'").submit();
            });
    });
    </script>
    ';
}

function echoHiddenInput($name, $value){
    echo ' <input id="'.$name.'" type="hidden" name ="'.$name.'" value ="'.$value.'" style="display:none" >';
}

function EchoH2($str){
    echo '<h2>'. $str .'</h2>';
}