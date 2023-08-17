<?php

    $userid = $_COOKIE['id'];
    $id1 = $_GET['id'];
    $currentData = file_get_contents('json/pending.json');
    $arrayData = json_decode($currentData, true);
    foreach ($arrayData as $point => $inside) {
        if ($inside['ID'] == $id1) {

            $arrayData[$point]['Approved Votes']++;

            $json = json_encode($arrayData, JSON_PRETTY_PRINT);

            if($arrayData[$point]['Approved Votes']<2){

            if($userid == 3) $currentData2 = file_get_contents('json/sazid_validlist.json');
            else if($userid == 4) $currentData2 = file_get_contents('json/rian_validlist.json');
            else if($userid == 5) $currentData2 = file_get_contents('json/tamal_validlist.json');
                
            $arrayData2 = json_decode($currentData2, true);

            $data2 = array(

                'ID' => $id1,
                'To' => $arrayData[$point]['To'],
                'From' => $arrayData[$point]['From'],
                'Date' => $arrayData[$point]['Date'],
                'Amount' => $arrayData[$point]['Amount'],
                'Signature' => $arrayData[$point]['Signature'],
                'Approved Votes' => $arrayData[$point]['Approved Votes']
            
            );

            $arrayData2 [] = $data2;
            $json2 = json_encode($arrayData2, JSON_PRETTY_PRINT);

            if($userid == 3) file_put_contents('json/sazid_validlist.json', $json2);
            else if($userid == 4) file_put_contents('json/rian_validlist.json', $json2);
            else if($userid == 5) file_put_contents('json/tamal_validlist.json', $json2);

            if(file_put_contents('json/pending.json', $json)) header('location: adminhomepage.php');
        }
        else{

            $flag2 = false;
            $flag3 = false;
            $flag4 = false;

            $currentData2 = file_get_contents('json/sazid_validlist.json');
            $currentData3 = file_get_contents('json/rian_validlist.json');
            $currentData4 = file_get_contents('json/tamal_validlist.json');
                
            $arrayData2 = json_decode($currentData2, true);
            $arrayData3 = json_decode($currentData3, true);
            $arrayData4 = json_decode($currentData4, true);

            $data2 = array(

                'ID' => $id1,
                'To' => $arrayData[$point]['To'],
                'From' => $arrayData[$point]['From'],
                'Date' => $arrayData[$point]['Date'],
                'Amount' => $arrayData[$point]['Amount'],
                'Signature' => $arrayData[$point]['Signature'],
                'Approved Votes' => $arrayData[$point]['Approved Votes']
            
            );

            foreach($arrayData2 as $row2){

                if ($row2["ID"] == $id1) $flag2 = true;

            }
            foreach($arrayData3 as $row3){

                if ($row3["ID"] == $id1) $flag3 = true;

            }
            foreach($arrayData4 as $row4){

                if ($row4["ID"] == $id1) $flag4 = true;

            }


            if ($flag2 == false) $arrayData2 [] = $data2;
            if ($flag3 == false) $arrayData3 [] = $data2;
            if ($flag4 == false) $arrayData4 [] = $data2;
            

            $json2 = json_encode($arrayData2, JSON_PRETTY_PRINT);
            $json3 = json_encode($arrayData3, JSON_PRETTY_PRINT);
            $json4 = json_encode($arrayData4, JSON_PRETTY_PRINT);

            file_put_contents('json/sazid_validlist.json', $json2);
            file_put_contents('json/rian_validlist.json', $json3);
            file_put_contents('json/tamal_validlist.json', $json4);

            unset($arrayData[$point]);
            $arrayData = array_values($arrayData);
            $json = json_encode($arrayData, JSON_PRETTY_PRINT);

            if(file_put_contents('json/pending.json', $json)) header('location: adminhomepage.php');

        }
    }
    }

?>