<?php
    if(isset($_POST['text'])) {

        $text = stripslashes(htmlspecialchars($_POST['text']));
        if(strlen($text) > 1000) {
            $text = substr($text, 0,1000);
        }

        $first_name = stripslashes(htmlspecialchars($_POST['first_name']));
        if(strlen($first_name) > 300)
            $first_name = substr($first_name, 0,300);

        $last_name = stripslashes(htmlspecialchars($_POST['last_name']));
        if(strlen($last_name) > 300)
            $last_name = substr($last_name, 0,300);

        $email = stripslashes(htmlspecialchars($_POST['email']));
        if(strlen($email) > 300)
            $email = substr($email, 0,300);

        $counter_name = "index_message.txt";

        // Check if a text file exists. If not create one and initialize it to zero.
        if (!file_exists($counter_name)) {
            $f = fopen($counter_name, "w");
            $json['count'] = 0;
            fwrite($f,json_encode($json, JSON_NUMERIC_CHECK));
            fclose($f);
        }

        // Read the current value of our counter file
        $f = fopen($counter_name,"r");
        $json = json_decode(fread($f, filesize($counter_name)), true);
        fclose($f);

        // Has visitor been counted in this session?
        // If not, increase counter value by one
        if(!isset($_SESSION['hasVisited'])){
            $_SESSION['hasVisited']="yes";
            $json['count'] = $json['count'] + 1;
            $json[$json['count']]['date'] = date("Y-m-d H:i:s");
            $json[$json['count']]['first_name'] = $first_name;
            $json[$json['count']]['last_name'] = $last_name;
            $json[$json['count']]['email'] = $email;
            $json[$json['count']]['text'] = $text;
            $f = fopen($counter_name, "w");
            fwrite($f, json_encode($json));
            fclose($f); 
        }
        
        //header("Location: {$_SERVER['HTTP_REFERER']}");
        echo "<script>alert('Message envoyé');window.location.href='/1418';</script>";
        exit;        
    }
?>