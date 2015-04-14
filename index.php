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
            #championimage{
                width: 100%;
            }
            #mvpimage{
                position: absolute;
                width: 50px;
                margin-left: -25px;
            }
            #mvp{
                width: 75%;
                margin-left: 12.5%;
                text-align: center;
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
            //krsort($items);
            //var_dump($items);
            //echo "<br /><br />";
                
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
                            $matchdetails = get_object_vars(json_decode(file_get_contents("https://".$_POST['server'].".api.pvp.net/api/lol/".$_POST['server']."/v2.2/match/".$match['gameId']."?includeTimeline=true&api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
                            //var_dump($matchdetails);
                            foreach($matchdetails['participants'] AS $eachParticipant){
                                if(get_object_vars($eachParticipant)['championId'] == $match['championId']){
                                    $SearchedParticipantId = get_object_vars($eachParticipant)['participantId'];
                                }
                            }
                            $match_timeline = get_object_vars($matchdetails['timeline']);
                            foreach($match_timeline['frames'] as $frames){
                                //FRAMES
                                foreach(get_object_vars($frames) as $timestamps => $name){
                                    if(is_object($name)){
                                        //TIMESTAMPS
                                        $name = get_object_vars($name);
                                    }
                                    if($timestamps === 'events'){
                                        foreach($name as $timestamp){
                                            //EACH TIMESTAMP
                                            $timestamp = get_object_vars($timestamp);
                                            if(isset($timestamp['participantId'])){
                                                if($timestamp['participantId'] === $SearchedParticipantId){
                                                $events[$timestamp['participantId']][] = $timestamp;
                                                }
                                            } elseif(isset($timestamp['killerId'])){
                                                if($timestamp['killerId'] === $SearchedParticipantId){
                                                $events[$timestamp['killerId']][] = $timestamp;
                                                }
                                            } 
                                        }
                                    }
                                }
                            }
                            foreach($events as $userEvents){
                                foreach($userEvents as $userEvent){
                                    if($userEvent['eventType'] === "ITEM_PURCHASED"){
                                       //$itemimagename = str_replace("'", "", $items[$userEvent['itemId']]['name']);
                                       if($items[$userEvent['itemId']]['name'] == "Boots of Swiftness" || $items[$userEvent['itemId']]['name'] == "Boots of Mobility" || $items[$userEvent['itemId']]['name'] == "Berserker's Greaves" || $items[$userEvent['itemId']]['name'] == "Ionian Boots of Lucidity" || $items[$userEvent['itemId']]['name'] == "Mercury's Treads" || $items[$userEvent['itemId']]['name'] == "Ninja Tabi" || $items[$userEvent['itemId']]['name'] == "Sorcerer's Shoes"){
                                           $LastBootsBought = $items[$userEvent['itemId']]['name'];
                                       }
                                       if($items[$userEvent['itemId']]['name'] == "Poacher's Knife" || $items[$userEvent['itemId']]['name'] == "Skirmisher's Sabre" || $items[$userEvent['itemId']]['name'] == "Stalker's Blade" || $items[$userEvent['itemId']]['name'] == "Ranger's Trailblazer"){
                                           $LastJungleItemBought = $items[$userEvent['itemId']]['name'];
                                       }
                                    }
                                }
                            }
                            //echo $LastBootsBought;
                            echo $LastJungleItemBought;
                            //if($match['queueType'] === "URF_5x5"){
                            $matchItems = "";
                            $matchItems[] = $stats['item0'];
                            $matchItems[] = $stats['item1'];
                            $matchItems[] = $stats['item2'];
                            $matchItems[] = $stats['item3'];
                            $matchItems[] = $stats['item4'];
                            $matchItems[] = $stats['item5'];
                            $matchItems[] = $stats['item6'];
                            //var_dump($matchItems);
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
                                    $itemimagename[$i] = str_replace(")", "", str_replace("(", "", str_replace("Enchantment: ", "", $itemimagename[$i])));
                                    if($itemimagename[$i] == "Devourer" || $itemimagename[$i] == "Warrior" || $itemimagename[$i] == "Cinderhulk" || $itemimagename[$i] == "Magus"){
                                        $matchItem[$i] = str_replace(" ", "_", str_replace("'", "", $LastJungleItemBought)).'_'.str_replace(" ", "_", $itemimagename[$i]).".png";
                                    } elseif($itemimagename[$i] == "Alacrity" || $itemimagename[$i] == "Homeguard" || $itemimagename[$i] == "Furor" || $itemimagename[$i] == "Captain" || $itemimagename[$i] == "Distortion"){
                                        $matchItem[$i] = str_replace(" ", "_", str_replace("'", "", $LastBootsBought)).'_'.str_replace(" ", "_", $itemimagename[$i]).".png";
                                    }
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
                                    <div id='champimage'><img  style='border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px;' src='images/".str_replace("'", "", $champion[$match['championId']]['name'])."Square.png' /></div>
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
                            //var_dump($matchdetails['participants']);
                            $MostKills = "";
                            $MostAssists = "";
                            $MostGold = "";
                            $MostDamage = "";
                            $MostWards = "";
                            $i = 1;
                            foreach($matchdetails['participants'] as $extraPDetails){
                                $extraPDetails = get_object_vars($extraPDetails);
                                $extraPStats = get_object_vars($extraPDetails['stats']);
                                if($i < 6){
                                    $currentChampion = "'100-".$extraPDetails['championId']."'";
                                } elseif($i >= 6){
                                    $currentChampion = "'200-".$extraPDetails['championId']."'";
                                }
                                
                                $MVPPoints = 0;
                                $MVPPoints += $extraPStats['totalDamageDealtToChampions'] / 10000;
                                $MVPPoints += (($extraPStats['kills'] + $extraPStats['assists']) - $extraPStats['deaths']);
                                $MVPPoints += $extraPStats['totalHeal'] / 500;
                                $TotalHeal[$currentChampion] = $extraPStats['totalHeal'];
                                $MostAssists[$currentChampion] = $extraPStats['assists'];
                                $MostKills[$currentChampion] = $extraPStats['kills'];
                                $MostDamage[$currentChampion] = $extraPStats['totalDamageDealtToChampions'];

                                if($extraPStats['firstBloodKill'] == true){
                                $FirstBlood[$currentChampion] = true;
                                $MVPPoints += 15;
                                }
                                if($pStats['firstBloodAssist'] == true){
                                $FirstBloodAssist[$currentChampion] = true;
                                $MVPPoints += 10;
                                }
                                $MVPPoints += $extraPStats['wardsPlaced'] / 5;
                                $MVPPoints += $extraPStats['goldEarned'] / 1000;
                                $MostWards[$currentChampion] = $extraPStats['wardsPlaced'];
                                $MostGold[$currentChampion] = $extraPStats['goldEarned'];
                                $MVP[$currentChampion] = $MVPPoints;
                                $i ++;
                            }
                            arsort($MostWards);
                            arsort($MostWards);
                            arsort($MostKills);
                            arsort($MostAssists);
                            arsort($MostDamage);
                            //print_r($MostWards);
                            /*echo "<br />";
                            print_r($MostGold);
                            echo "<br />";
                            print_r($MostKills);
                            echo "<br />";
                            print_r($MostAssists);
                            echo "<br />";
                            print_r($MostDamage);
                            echo "<br />";*/
                            //echo array_shift(array_keys($MostWards)) . " " . array_shift($MostWards) . "<br />";
                            //echo array_shift(array_keys($MostGold)) . " " . array_shift($MostGold) . "<br />";
                            //echo array_shift(array_keys($MostKills)) . " " . array_shift($MostKills) . "<br />";
                            //echo array_shift(array_keys($MostAssists)) . " " . array_shift($MostAssists) . "<br />";
                            //echo array_shift(array_keys($MostDamage)) . " " . array_shift($MostDamage) . "<br />";
                            arsort($MVP);
                            //print_r($MVP);
                            $championMVP = array_shift(array_keys($MVP));
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
                                    <div id='champImage'>
                                        <img id='championImage' src='images/".str_replace("'", "", str_replace(" ", "", $champion[$pDetails['championId']]['name']))."Square.png' />";
                                        if($i < 6){
                                            if("'".$pDetails['teamId']."-".$pDetails['championId']."'" == $championMVP){
                                                echo "<img id='mvpimage' src='images/mvpbadge.png'/>";
                                            }
                                        } else{
                                            if("'".$pDetails['teamId']."-".$pDetails['championId']."'" == $championMVP){
                                                echo "<img id='mvpimage' src='images/mvpbadge.png'/>";
                                            }
                                        } 
                                echo "</div>
                                    <div id='champKda'>".$eachKda."</div>
                                    </div>";
                               
                                if($i == 5){
                                    echo "<div style='clear: both;'></div></div><div id='vs'><h1>VS</h1><br /></div><div id='team200'>";
                                }
                                if($i == 10){
                                    echo "<div style='clear: both;'></div></div>";
                                }
                                $i ++;
                            }
                            echo "<div id='mvp'>
                                        <h1>MVP of the match</h1><br />
                                        <img src='images/".$champion[str_replace("'", "", str_replace("200-", "", str_replace("100-", "", $championMVP)))]['name']."Square.png' />";
                                        if(array_shift(array_keys($MostKills)) == $championMVP){
                                            echo "<br />Most kills:" . array_shift($MostKills);
                                        }
                                        if(array_shift(array_keys($MostAssists)) == $championMVP){
                                            echo "<br />Most assists:" . array_shift($MostAssists);
                                        }
                                        if(array_shift(array_keys($MostDamage)) == $championMVP){
                                            echo "<br />Most damage:" . array_shift($MostDamage);
                                        }
                                        if(array_shift(array_keys($MostWards)) == $championMVP){
                                            echo "<br />Most wards placed:" . array_shift($MostWards);
                                        }
                                        if(array_shift(array_keys($MostGold)) == $championMVP){
                                            echo "<br />Most gold:" . array_shift($MostGold);
                                        }
                            echo "</div>
                                  </div>";
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