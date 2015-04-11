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
    </head>
    <body>
        <?php
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
                            //if($match['queueType'] === "URF_5x5"){
                                //echo "<br /><br />" . $match['subType'] . "<br />";
                                var_dump($match);
                                echo "<br /><br />";
                                $stats = get_object_vars($match['stats']);
                                if(!array_key_exists('assists', $stats)) { $stats['assists'] = 0; }
                                if(!array_key_exists('championsKilled', $stats)) { $stats['championsKilled'] = 0; }
                                if(!array_key_exists('numDeaths', $stats)) { $stats['numDeaths'] = 0; }
                                $kda = "<h2>" . $stats['championsKilled'] . " / " . $stats['numDeaths'] . " / " . $stats['assists'] . "</h2>";
                                echo "
                                    <div id='statscontainer'>
                                        <div id='champimage'><img  style='border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px;' src='images/".$champion[$match['championId']]['name']."Square.png' /></div>
                                        <div id='kda'>".$kda."</div>
                                        <div id='sumSpells'><img src='images/".str_replace(" ", "", $summonerSpells[$match['spell1']]['name'])."_sp.png' /><img src='images/".str_replace(" ", "", $summonerSpells[$match['spell2']]['name'])."_sp.png' /></div>
                                        <div id='timeDateType'>".date("M, d-Y H:i", $match['createDate']/1000)." | ".str_replace("_", " ", $match['subType'])."</div>
                                        <div id='íd'><img width='14px' src='images/IP.png' /> ".$match['ipEarned']."</div>
                                    </div>
                                ";
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