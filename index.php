<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <title></title>
        <style>
            h1, h2{
                margin-bottom: 0;
                display: inline-block;
            }
            #championsContainer{
                width: 75%;
                margin-left: 12.5%;
            }
            #statsContainer{
                width: 50%;
                margin-left: 35%;
            }
            #team100{
                margin-left: 10%;
                margin-top: 10%;
            }
            #team200{
                margin-left: 10%;
                margin-bottom: 10%;
            }
            #player{
                float: left;
                margin-left: 6%;
                text-align: center;
            }
            #player img{
                width: 100%;
            }
            #vs{
                width: 100%;
                text-align: center;
            }
            #champInfo{
                margin-top: -140px;
                margin-left: 140px;
            }
            #ip{
                right: 0px;
                top: 0px;
            }
            #champOthers{
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            if(isset($_POST['summoner'])){
                
                $staticchampdata = get_object_vars(json_decode(file_get_contents("https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=spells&api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
                foreach($staticchampdata as $champdata){
                    if(is_object($champdata)){
                        $champdata = get_object_vars($champdata);
                        foreach($champdata as $champvalue){
                            $champvalue = get_object_vars($champvalue);
                            $champion[$champvalue['id']] = $champvalue;
                            //var_dump($champvalue);
                            foreach($champvalue as $championSpells){
                                if(is_array($championSpells)){
                                //print_r($championSpells[0]);
                                //echo "<br /><br />";
                                $championsSpells[$champvalue['id']][1]['name'] = get_object_vars($championSpells[0])['name'];
                                $championsSpells[$champvalue['id']][2]['name'] = get_object_vars($championSpells[1])['name'];
                                $championsSpells[$champvalue['id']][3]['name'] = get_object_vars($championSpells[2])['name'];
                                $championsSpells[$champvalue['id']][4]['name'] = get_object_vars($championSpells[3])['name'];
                                }
                            }
                        }
                    }
                }
                
                $allitems = get_object_vars(json_decode(file_get_contents("https://global.api.pvp.net/api/lol/static-data/na/v1.2/item?itemListData=image&api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
                foreach($allitems as $itemdata){
                    //var_dump($itemdata);
                    if(is_object($itemdata)){
                    foreach($itemdata as $id => $item){
                        if(is_numeric($id)){
                        $item = get_object_vars($item);
                        //var_dump($item);
                        $items[$id] = $item;
                        }
                    }
                    }
                }
                
                $summonerspells = get_object_vars(json_decode(file_get_contents("https://global.api.pvp.net/api/lol/static-data/euw/v1.2/summoner-spell?api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
                foreach($summonerspells['data'] as $s_spells){
                    if(is_object($s_spells)){
                        $s_spells = get_object_vars($s_spells);
                    }
                    $summonerSpells[$s_spells['id']]['name'] = $s_spells['name'];
                }
                //$_POST['summoner'] = str_replace(" ", "", $_POST['summoner']);
                $summoner = get_object_vars(json_decode(file_get_contents("https://".$_POST['server'].".api.pvp.net/api/lol/".$_POST['server']."/v1.4/summoner/by-name/".$_POST['summoner']."?api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
                foreach($summoner as $user){
                    $user = get_object_vars($user);
                    $_SESSION['userid'] = $user['id'];
                }
                $allmatches = get_object_vars(json_decode(file_get_contents("https://".$_POST['server'].".api.pvp.net/api/lol/".$_POST['server']."/v1.3/game/by-summoner/".$_SESSION['userid']."/recent?api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
                //print_r($allmatches);
                foreach($allmatches as $matches){
                    if(is_array($matches)){
                        foreach($matches as $match){
                            $match = get_object_vars($match);
                            $stats = get_object_vars($match['stats']);
                            //if($match['queueType'] === "URF_5x5"){
                            $matchItems = "";
                            $matchItems[] = $stats['item0'];
                            $matchItems[] = $stats['item1'];
                            $matchItems[] = $stats['item2'];
                            $matchItems[] = $stats['item3'];
                            $matchItems[] = $stats['item4'];
                            $matchItems[] = $stats['item5'];
                            $matchItems[] = $stats['item6'];
                            for($i = 0; $i < 7; $i ++){
                                $itemimagename[$i] = str_replace("'", "", $items[$matchItems[$i]]['name']);
                                if(!array_key_exists('item0', $stats)) { $matchItem[0] = 'DefaultItem.gif'; }
                                if(!array_key_exists('item1', $stats)) { $matchItem[1] = 'DefaultItem.gif'; }
                                if(!array_key_exists('item2', $stats)) { $matchItem[2] = 'DefaultItem.gif'; }
                                if(!array_key_exists('item3', $stats)) { $matchItem[3] = 'DefaultItem.gif'; }
                                if(!array_key_exists('item4', $stats)) { $matchItem[4] = 'DefaultItem.gif'; }
                                if(!array_key_exists('item5', $stats)) { $matchItem[5] = 'DefaultItem.gif'; }
                                if(!array_key_exists('item6', $stats)) { $matchItem[6] = 'DefaultItem.gif'; }
                                if(strpos($itemimagename[$i], " (Trinket)") !== false){
                                    $itemimagename[$i] = str_replace(" (Trinket)", "", $itemimagename[$i]);
                                    $matchItem[$i] = str_replace(" ", "_", $itemimagename[$i]).".jpg";
                                } elseif(strpos($itemimagename[$i], "Enchantment: ") !== false){
                                    $itemimagename[$i] = str_replace("Enchantment: ", "", $itemimagename[$i]);
                                    $matchItem[$i] = str_replace(" ", "_", $itemimagename[$i]).".png";
                                } elseif ($itemimagename[$i] === "Targons Brace" || $itemimagename[$i] === "Frostfang"){
                                    $matchItem[$i] = str_replace(" ", "_", $itemimagename[$i]).".jpg";
                                } else {
                                    $matchItem[$i] = str_replace(" ", "_", $itemimagename[$i]).".png";
                                }
                            }
                            //print_r($matchItem);
                            //echo "<br /><br />" . $match['subType'] . "<br />";
                            //var_dump($match);
                            echo "<br /><br />";
                            if(!array_key_exists('assists', $stats)) { $stats['assists'] = 0; }
                            if(!array_key_exists('championsKilled', $stats)) { $stats['championsKilled'] = 0; }
                            if(!array_key_exists('numDeaths', $stats)) { $stats['numDeaths'] = 0; }
                            $kda = "<h2>" . $stats['championsKilled'] . " / " . $stats['numDeaths'] . " / " . $stats['assists'] . "</h2>";
                            echo "
                                <div id='statsContainer'>
                                    <div id='champimage'><img  style='border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px;' src='images/".$champion[$match['championId']]['name']."Square.png' /></div>
                                    <div id='champInfo'>
                                        <div id='champIntro'><h1>".$champion[$match['championId']]['name']. "</h1>&nbsp;&nbsp;" . $kda . "</div>
                                        <div id='ip'><img width='14px' src='images/IP.png' /> ".$match['ipEarned']."</div>
                                        <div id='timeDateType'>".date("M, d-Y H:i", $match['createDate']/1000)." | ".str_replace("_", " ", $match['subType'])."</div>
                                        <div style='clear: both;'></div>
                                    </div>
                                    <div id='champOthers'>
                                        <div id='itemImages'>".
                                          "<img src='images/" . $matchItem[0] . "' />" .
                                          "<img src='images/" . $matchItem[1] . "' />" .
                                          "<img src='images/" . $matchItem[2] . "' />" .
                                          "<img src='images/" . $matchItem[3] . "' />" .
                                          "<img src='images/" . $matchItem[4] . "' />" .
                                          "<img src='images/" . $matchItem[5] . "' />" .
                                          "<img src='images/" . $matchItem[6] . "' />"
                                        ."</div>
                                        <div id='sumSpells'>
                                            <img src='images/".str_replace(" ", "", $summonerSpells[$match['spell1']]['name'])."_sp.png' />
                                            <img src='images/".str_replace(" ", "", $summonerSpells[$match['spell2']]['name'])."_sp.png' />
                                        </div>
                                    </div>
                                </div>
                            ";
                            $MVP = "";
                            $matchdetails = get_object_vars(json_decode(file_get_contents("https://".$_POST['server'].".api.pvp.net/api/lol/".$_POST['server']."/v2.2/match/".$match['gameId']."?api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
                            //var_dump($matchdetails['participants']);
                            echo "<div id='championsContainer'>";
                            $i = 1;
                            foreach($matchdetails['participants'] as $pDetails){
                                if($i == 1){
                                    echo "<div id='team100'>";
                                }
                                $pDetails = get_object_vars($pDetails);
                                $pStats = get_object_vars($pDetails['stats']);
                                $eachKda = "<h3>" . $pStats['kills'] . " / " . $pStats['deaths'] . " / " . $pStats['assists'] . "</h2>";
                                echo "<div id='player'>
                                    <div id='champImage'><img src='images/".str_replace(" ", "", $champion[$pDetails['championId']]['name'])."Square.png' /></div>
                                    <div id='champKda'>".$eachKda."</div>
                                    </div>";
                                $MVPPoints = 0;
                                $MVPPoints += $pStats['totalDamageDealtToChampions'] / 10000;
                                $MVPPoints += (($pStats['kills'] + $pStats['assists']) - $pStats['deaths']);
                                $MVPPoints += $pStats['totalHeal'] / 500;
                                if($pStats['firstBloodKill'] == true){
                                $MVPPoints += 15;
                                }
                                if($pStats['firstBloodAssist'] == true){
                                $MVPPoints += 10;
                                }
                                $MVPPoints += $pStats['wardsPlaced'] / 5;
                                $MVPPoints += $pStats['goldEarned'] / 1000;
                                $MVP[$pDetails['championId']] = $MVPPoints;
                                if($i == 5){
                                    echo "<div style='clear: both;'></div></div><div id='vs'><h1>VS</h1><br /></div><div id='team200'>";
                                }
                                if($i == 10){
                                    echo "<div style='clear: both;'></div></div>";
                                }
                                $i ++;
                            }
                            arsort($MVP);
                            //print_r($MVP);
                            $championMVP = $champion[array_shift(array_keys($MVP))]['name'];
                            echo "<div id='mvp'>
                                        MVP of the match: ".$championMVP."
                                  </div></div>";
                            echo "<br /><br />";
                            //}
                        }
                    }
                    //print_r($matches . "<br />");
                }
                /***
                 * 
                 * GET CHAMPION ID, NAME, SPELLS 
                 * 
                 */
                $staticchampdata = get_object_vars(json_decode(file_get_contents("https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=spells&api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
                foreach($staticchampdata as $champdata){
                    if(is_object($champdata)){
                        $champdata = get_object_vars($champdata);
                        foreach($champdata as $champvalue){
                            $champvalue = get_object_vars($champvalue);
                            $champion[$champvalue['id']] = $champvalue;
                            //var_dump($champvalue);
                            foreach($champvalue as $championSpells){
                                if(is_array($championSpells)){
                                //print_r($championSpells[0]);
                                //echo "<br /><br />";
                                $championsSpells[$champvalue['id']][1]['name'] = get_object_vars($championSpells[0])['name'];
                                $championsSpells[$champvalue['id']][2]['name'] = get_object_vars($championSpells[1])['name'];
                                $championsSpells[$champvalue['id']][3]['name'] = get_object_vars($championSpells[2])['name'];
                                $championsSpells[$champvalue['id']][4]['name'] = get_object_vars($championSpells[3])['name'];
                                }
                            }
                        }
                    }
                }
                /***
                 * 
                 * GET ALL ITEMS AND ITEM DATA
                 * 
                 */
                $allitems = get_object_vars(json_decode(file_get_contents("https://global.api.pvp.net/api/lol/static-data/na/v1.2/item?itemListData=image&api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
                foreach($allitems as $itemdata){
                    //var_dump($itemdata);
                    if(is_object($itemdata)){
                    foreach($itemdata as $id => $item){
                        if(is_numeric($id)){
                        $item = get_object_vars($item);
                        //var_dump($item);
                        $items[$id] = $item;
                        }
                    }
                    }
                }
            } else {
         ?>
        <form action=" " method="post">
            <input type="text" name="summoner" placeholder="Summoner Name" />
            <select name="server">
                <option value="na">North America</option>
                <option value="euw">Europa West</option>
                <option value="eune">Europa North-Eastern</option>
            </select>
            <input type="submit" value="Submit" />
        </form>
        <?php } ?>
    </body>
</html>
<?php session_destroy(); ?>