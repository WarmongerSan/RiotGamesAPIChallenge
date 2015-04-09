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
                //$_POST['summoner'] = str_replace(" ", "", $_POST['summoner']);
                $summoner = get_object_vars(json_decode(file_get_contents("https://".$_POST['server'].".api.pvp.net/api/lol/".$_POST['server']."/v1.4/summoner/by-name/".$_POST['summoner']."?api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
                foreach($summoner as $user){
                    $user = get_object_vars($user);
                    $_SESSION['userid'] = $user['id'];
                }
                $allmatches = get_object_vars(json_decode(file_get_contents("https://".$_POST['server'].".api.pvp.net/api/lol/".$_POST['server']."/v2.2/matchhistory/".$_SESSION['userid']."?api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
                foreach($allmatches as $matches){
                    foreach($matches as $match){
                        $match = get_object_vars($match);
                        //if($match['queueType'] === "URF_5x5"){
                            echo "<br /><br />" . $match['queueType'] . "<br />";
                            print_r(array_values($match));

                        //}
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