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
            #time{
                border-right: 2px solid #000;
                border-bottom: 2px solid #000;
                width: auto;
            }
            .event{
                width: 50%;
                margin-left: 25%;
                border: 2px solid #000;
            }
            #item{
                padding: 5px;
                width: 50%;
                float: left;
            }
            .endscreen{
                width: 75% !important;
                margin-left: 12.5% !important;
            }
            .event > img:not(.endscreen){
               float: right;
               display: inline-block;
            }
            .clear { clear: both; }
        </style>
    </head>
    <body>
        <?php
            /*$allmatches = get_object_vars(json_decode(file_get_contents("https://na.api.pvp.net/api/lol/na/v2.2/matchhistory/382991?api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
            foreach($allmatches as $matches){
                foreach($matches as $match){
                    $match = get_object_vars($match);
                    //if($match['queueType'] === "URF_5x5"){
                        echo "<br /><br />" . $match['queueType'] . "<br />";
                        echo "<br /><br />" . $match['queueType'] . "<br />";
                        print_r(array_values($match));
                        
                    //}
                }
                print_r($matches . "<br />");
            }*/
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
            /***
             * 
             * MATCH DATA WITH THE SELECTED MATCHID IN MATCH HISTORY OVERVIEW
             * 
             */
            $thismatch = get_object_vars(json_decode(file_get_contents("https://na.api.pvp.net/api/lol/na/v2.2/match/1774522443?includeTimeline=true&api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
            //TIME LINE
            $match_timeline = get_object_vars($thismatch['timeline']);
            /***
             * 
             * GET PARTICIPANT'S CHAMPION AND TEAM ID
             * 
             */
            foreach($thismatch['participants'] as $participants){
                $participants = get_object_vars($participants);
                $summoners[$participants['participantId']]['championId'] = $participants['championId'];
                $summoners[$participants['participantId']]['teamId'] = $participants['teamId'];
            }
            /***
             * 
             * GEYT PANTICIPANT'S NAME
             * 
             */
            foreach($thismatch['participantIdentities'] as $participantIdentity){
                $participantIdentity = get_object_vars($participantIdentity);
                //var_dump($participantIdentity);
                $ParticipantId = $participantIdentity['participantId'];
                //echo $ParticipantId;
                foreach($participantIdentity as $summonerInfo){
                    if(is_object($summonerInfo)){
                        $summonerInfo = get_object_vars($summonerInfo);
                    }
                    //var_dump($summonerInfo);
                    $summoners[$ParticipantId]['summonerName'] = $summonerInfo['summonerName'];
                }
            }
            foreach($thismatch['teams'] as $team){
                $team = get_object_vars($team);
                //var_dump($participantIdentity);
                $teamid = $team['teamId'];
                if ($summoners[9]['teamId'] === $teamid){
                    if($team['winner'] === true){
                        $summoners[9]['win'] = "<img class=\'endscreen\' src=\'images/Victory.png\' />";
                    } elseif($team['winner'] === false){
                        $summoners[9]['win'] = "<img class=\'endscreen\' src=\'images/Defeat.png\' />";
                    }
                }
            }
            ?>
        <div style="width: 50%; margin-left: 25%; text-align: center;">
            <h2>Events of <?php echo $summoners[9]['summonerName'] . " as " . $champion[$summoners[9]['championId']]['name'] . " <img src='images/".str_replace(" ", "", $champion[$summoners[9]['championId']]['name'])."Square.png'" ?></h2>
        </div><br />
        <div style="width: 50%; margin-left: 25%; text-align: center;">
            <button>Back to the beginning</button>
            <button id="Pause" style="display:none;">Pause</button>
            <button id="Play" onclick="javascript: listTicker({list: eventList ,startIndex:0,trickerPanel: $('#events'),interval: 3 * 50,});">Play</button>
            <button id="Play2" style="display:none;">Play</button>
            <button>Next Player</button>
        </div>

        <div id="events"></div>
            <?php
            /***
             * 
             * GET ALL FRAMES WHICH CONTAIN THE EVENTS
             * 
             */
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
                                if($timestamp['participantId'] === 9){
                                $events[$timestamp['participantId']][] = $timestamp;
                                }
                            } elseif(isset($timestamp['killerId'])){
                                if($timestamp['killerId'] === 9){
                                $events[$timestamp['killerId']][] = $timestamp;
                                }
                            } 
                        }
                    }
                }
            }
            $endgametime = gmdate('i:s',$thismatch['matchDuration']);
            $win = $summoners[9]['win'];
            //print_r($championsSpells);
            //echo "<br /><br />";
            //print_r($summoners);
            //echo "<br /><br />";
            //print_r($items);
            //echo "<br /><br />";
            
            /***
             * 
             * USER EVENTLIST FROM OBJECT TO ARRAY
             * 
             */
            $removeLast = false;
            foreach($events as $userEvents){
                //print_r($userEvents);
                //echo "<br /><br />";
                echo "<script>
                        var eventList = [];
                     ";
                
                /***
                 * 
                 * AGAIN FROM OBJECT TO ARRAY
                 * 
                 */
                foreach($userEvents as $userEvent){
                    
                    /***
                     * 
                     * EDIT CONTENT FOR OVERVIEW EVENT
                     * 
                     */
                    $time = gmdate('i:s', ($userEvent['timestamp'] / 1000));
                    //echo "Time ingame: " . $time . "<br />";
                    //echo $userEvent['eventType'];
                    if($userEvent['eventType'] === "ITEM_PURCHASED"){
                        $itemimagename = str_replace("'", "", $items[$userEvent['itemId']]['name']);
                        if(strpos($itemimagename, " (Trinket)") !== false){
                            $itemimagename = str_replace(" (Trinket)", "", $itemimagename);
                            $itemimage = str_replace(" ", "_", $itemimagename).".jpg";
                        } elseif(strpos($itemimagename, "Enchantment: ") !== false){
                            $itemimagename = str_replace("Enchantment: ", "", $itemimagename);
                            $itemimage = str_replace(" ", "_", $itemimagename).".png";
                        } elseif ($itemimagename === "Targons Brace" || $itemimagename === "Frostfang"){
                            $itemimage = str_replace(" ", "_", $itemimagename).".jpg";
                        } else {
                            $itemimage = str_replace(" ", "_", $itemimagename).".png";
                        }
                        $e =  "Purchased " . $items[$userEvent['itemId']]['name'] . " | <img src='images/".$itemimage."' />";
                        $lastitem[$userEvent['timestamp']] = $items[$userEvent['itemId']]['name'] . " | <img src='images/".$itemimage."' />";
                    }
                    if($userEvent['eventType'] === "ITEM_DESTROYED"){
                        $ditemimagename = str_replace("'", "", $items[$userEvent['itemId']]['name']);
                        if(strpos($ditemimagename, " (Trinket)") !== false){
                            $ditemimagename = str_replace(" (Trinket)", "", $ditemimagename);
                            $ditemimage = str_replace(" ", "_", $ditemimagename).".jpg";
                        } elseif(strpos($ditemimagename, "Enchantment: ") !== false){
                            $ditemimagename = str_replace("Enchantment: ", "", $ditemimagename);
                            $ditemimage = str_replace(" ", "_", $ditemimagename).".png";
                        } else {
                            $ditemimage = str_replace(" ", "_", $ditemimagename).".png";
                        }
                        if(strpos($items[$userEvent['itemId']]['name'], "Potion") !== false || strpos($items[$userEvent['itemId']]['name'], "Biscuit of Rejuvenation") !== false){
                            $e =  "Used " . $items[$userEvent['itemId']]['name'] . " | <img src='images/".$ditemimage."' />";
                        } elseif(strpos($items[$userEvent['itemId']]['name'], "Ward") !== false){
                            $e =  "Placed " . $items[$userEvent['itemId']]['name'] . " | <img src='images/".$ditemimage."' />";
                        } else {
                            if(!isset($lastitem[$userEvent['timestamp']])){
                                $e =  "Destroyed " . $items[$userEvent['itemId']]['name'] . " | <img src='images/".$ditemimage."' />";
                            } else{
                                $e =  "Upgraded " . $items[$userEvent['itemId']]['name'] . " | <img src='images/".$ditemimage."' />";
                                if(isset($lastDeleted[$userEvent['timestamp']])){
                                    foreach($lastDeleted[$userEvent['timestamp']] as $deleted){
                                        if($deleted === end($lastDeleted[$userEvent['timestamp']])){
                                            $e .=  " | and " . $deleted;
                                        } else {
                                            $e .=  " | , " . $deleted;
                                        }
                                    }
                                }
                                $e .=  " | into " . $lastitem[$userEvent['timestamp']] . "<img src='images/Into.png' width='64px' height='64px' />";
                                $lastDeleted[$userEvent['timestamp']][] = $items[$userEvent['itemId']]['name'] . " | <img src='images/".$ditemimage."' /><img src='images/Plus.png' width='64px' height='64px' />";
                                $removeLast = true;
                            }
                        }
                    }
                    if($userEvent['eventType'] === "CHAMPION_KILL"){
                        $victimChampImage = str_replace(" ", "", $champion[$summoners[$userEvent['victimId']]['championId']]['name']) . "Square.png";
                        $e = "Killed " . $summoners[$userEvent['victimId']]['summonerName'] . " as " . $champion[$summoners[$userEvent['victimId']]['championId']]['name'] . " | <img src='images/".$victimChampImage."'/>";
                    }
                    if($userEvent['eventType'] === "WARD_KILL"){
                        if($userEvent['wardType'] === "YELLOW_TRINKET" || $userEvent['wardType'] === "YELLOW_TRINKET_UPGRADE"){
                            $wardkilled = "Yellow Trinket";
                            $wardkillimage = "Warding_Totem.jpg";
                        }
                        if($userEvent['wardType'] === "SIGHT_WARD"){
                            $wardkilled = "Sight ward";
                            $wardkillimage = "Sight_Ward.png";
                        }
                        if($userEvent['wardType'] === "VISION_WARD"){
                            $wardkilled = "Vision ward";
                            $wardkillimage = "Vision_Ward.png";
                        }
                        $e = "Destroyed an enemy " . $wardkilled . " | <img src='images/".$wardkillimage."'/>";
                    }
                    if($userEvent['eventType'] === "SKILL_LEVEL_UP"){
                        $skillname = $championsSpells[$summoners[9]['championId']][$userEvent['skillSlot']]['name'];
                        $skillimage = str_replace(" ", "_", $skillname).".png";
                        if($skillname === "Zephyr" || $skillname === "Distortion"){
                            $skillimage = str_replace(" ", "_", $skillname)."_skill.png";
                        }
                        $e = "Upgraded the skill " . $skillname  . " | <img src='images/".$skillimage."' />";
                    }
                    if($userEvent['eventType'] === "WARD_PLACED"){
                        if($userEvent['wardType'] === "YELLOW_TRINKET"){
                            $wardplaced = "Yellow Trinket";
                            $wardplacedimage = "Warding_Totem.jpg";
                        }
                        if($userEvent['wardType'] === "SIGHT_WARD"){
                            $wardplaced = "Sight ward";
                            $wardplacedimage = "Sight_Ward.png";
                        }
                        if($userEvent['wardType'] === "VISION_WARD"){
                            $wardplaced = "Vision ward";
                            $wardplacedimage = "Vision_Ward.png";
                        }
                        $e =  "Placed " . $wardplaced . " | <img src='images/".$wardplacedimage."' />";
                    }
                    if($userEvent['eventType'] === "BUILDING_KILL"){
                        $e = "Destroyed the " . $userEvent['towerType'] . " | <img src='images/Turret.png' />";
                    }
                    if($userEvent['eventType'] === "ELITE_MONSTER_KILL"){
                        if($userEvent['monsterType'] === "BARON_NASHOR"){
                            $monsterimage = "baron.png";
                        }
                        if($userEvent['monsterType'] === "DRAGON"){
                            $monsterimage = "dragon.png";
                        }
                        if($userEvent['monsterType'] === "BLUE_GOLEM"){
                            $monsterimage = "blue.png";
                        }
                        if($userEvent['monsterType'] === "RED_LIZARD"){
                            $monsterimage = "red.png";
                        }
                        if($userEvent['monsterType'] === "VILEMAW"){
                            $monsterimage = "vilemaw.png";
                        }
                        $e = "Killed " . $userEvent['monsterType'] . " | <img src='images/".$monsterimage."' />";
                    }
                    if($removeLast === true){
                        echo 'eventList.pop();';
                        $removeLast = false;
                    }
                    echo 'var obj = {"'.$time.'":"'.$e.'"};';
                    echo 'eventList.push(JSON.stringify(obj));';
                    //echo '$("body").append(JSON.stringify(obj));';
                }
                /***
                 * 
                 * SCRIPT FOR ANIMATION EVENTLIST
                 * 
                 */
                
                echo "
                    var listTicker = function(options) {
                        var is_pause = false;
                        var defaults = {
                            list: [],
                            startIndex:0,
                            interval: 3 * 1000,
                        }
                        var options = $.extend(defaults, options);

                        var listTickerInner = function(index) {
                            if(is_pause == false){
                            $('#Pause').fadeIn();
                            $('#Play').fadeOut();
                            $('#Play2').fadeOut();
                            if (options.list.length == 0) return;
                            if (!index || index < 0) index = 0;
                            if (index >= options.list.length){return;}

                            var value = options.list[index];
                            value = value.replace('{\"', '');
                            value = value.replace('\"}', '');
                            parts = value.split('\":\"');
                            value = '<div id=\"event'+index+'\" class=\"event\" style=\"display: none;\"><div id=\"time\">'+parts[0]+'</div>';
                            parts[1] = parts[1].split('|');
                            var number = parts[1].length;
                            alert(number);
                            if(number == 1){
                                value += parts[1];
                            }
                            if(number == 2){
                                value += '<div id=\"item\">'+parts[1][0]+'</div>'+parts[1][1];
                            }
                            if(number == 4){
                                value += '<div id=\"item\">'+parts[1][0]+parts[1][2]+'</div>'+parts[1][3]+parts[1][1];
                            }
                            if(number == 6){
                                value += '<div id=\"item\">'+parts[1][0]+parts[1][2]+parts[1][4]+'</div>'+parts[1][5]+parts[1][3]+parts[1][1];
                            }
                            value += '<div class=\"clear\"></div></div>'
                            console.log(value);
                            console.log(index + \" \" + options.list.length);

                            //options.trickerPanel.fadeOut(function() {
                            $('#events').prepend(value);
                            $('#event'+index).fadeIn();
                            //});
                            
                            var nextIndex = (index + 1);// % options.list.length;
                        } else {
                            $('#Play2').fadeIn();
                            $('#Pause').fadeOut();
                            
                            //alert('Well' + index);
                        }
                        $('#Play2').click( function(){
                            is_pause = false;
                            nextIndex = (index + 1);
                        });
                        $('#Pause').click( function() {
                            is_pause = true;
                        });
                            setTimeout(function() {
                                if(is_pause === false){
                                    listTickerInner(nextIndex);
                                    //alert();
                                } else {
                                    listTickerInner(index);
                                }
                            }, options.interval);
                        };
                        listTickerInner(options.startIndex);
                    }
                      var obj = {'".$endgametime."':'".$win."'};
                      eventList.push(JSON.stringify(obj));  
                      console.log(eventList);
                      </script>";
            }
         ?>
    </body>
</html>
<?php session_destroy(); ?>