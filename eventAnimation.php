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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel='stylesheet' id='cntctfrm_form_style-css'  href='http://www.lolhistoryapp.com/wp-content/plugins/contact-form-plugin/css/form_style.css?ver=4.1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='db_twitter_feed-default-css'  href='http://www.lolhistoryapp.com/wp-content/plugins/devbuddy-twitter-feed/assets/feed.css?ver=2.2' type='text/css' media='all' />
        <link rel='stylesheet' id='wspsc-style-css'  href='http://www.lolhistoryapp.com/wp-content/plugins/wordpress-simple-paypal-shopping-cart/wp_shopping_cart_style.css?ver=4.0.7' type='text/css' media='all' />
        <link rel='stylesheet' id='interface_style-css'  href='http://www.lolhistoryapp.com/wp-content/themes/interface/style.css?ver=4.1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='interface-responsive-css'  href='http://www.lolhistoryapp.com/wp-content/themes/interface/css/responsive.css?ver=4.1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='google_fonts-css'  href='//fonts.googleapis.com/css?family=PT+Sans%3A400%2C700italic%2C700%2C400italic&#038;ver=4.1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='wptt_front-css'  href='http://www.lolhistoryapp.com/wp-content/plugins/wp-twitter-feeds/css/admin_style.min.css?ver=4.1.1' type='text/css' media='all' />
        <link rel='stylesheet' id='jetpack_css-css'  href='http://www.lolhistoryapp.com/wp-content/plugins/jetpack/css/jetpack.css?ver=3.4.1' type='text/css' media='all' />
        <style>
            body{
                background-color: white;
            }
            .jumbotron{
                padding: 5px !important;
            }
            @media all and (min-width: 1000px) { 
                #events{
                    width: 65%;
                    margin-left: 17.5%;
                    //border-top: 2px solid #000;
                    //border-right: 2px solid #000;
                    //border-left: 2px solid #000;
                }
            }
            @media all and (min-width: 1400px) { 
                #events{
                    width: 50%;
                    margin-left: 25%;
                    //border-top: 2px solid #000;
                    //border-right: 2px solid #000;
                    //border-left: 2px solid #000;
                }
            }
            @media all and (min-width: 800px) { 
                #events{
                    width: 75%;
                    margin-left: 12.5%;
                    //border-top: 2px solid #000;
                    //border-right: 2px solid #000;
                    //border-left: 2px solid #000;
                }
            }
            @media all and (max-width: 799px) { 
                #events{
                    width: 95%;
                    margin-left: 2.5%;
                    //border-top: 2px solid #000;
                    //border-right: 2px solid #000;
                    //border-left: 2px solid #000;
                }
            }
            #time{
                font-size: 18px;
                //border-bottom: 2px solid #000;
                width: auto;
            }
            .event{
                width: 100%;
                //border-bottom: 2px solid #000;
            }
            #item{
                padding: 5px;
                width: 40%;
                float: left;
                vertical-align: middle;
            }
            .endscreen{
                width: 50% !important;
                margin-left: 25% !important;
            }
            .event > img:not(.endscreen){
               float: right;
               display: inline-block;
            }
            .clear { clear: both; }
        </style>
        <script>
            function Next(){
                var value = <?php echo $_POST['summonerId']; ?>+1;
                if(value == 11){
                    value = 1;
                }
                document.getElementById('nextSummoner').value = value;
                $("#prevSummoner").removeProp("name");
                $("#summonerForm").submit();
            } 
            function Prev(){
                var value = <?php echo $_POST['summonerId']; ?>-1;
                if(value == 0){
                    value = 10;
                }
                document.getElementById('prevSummoner').value = value;
                $("#nextSummoner").removeProp("name");
                $("#summonerForm").submit();
            } 
        </script>
    </head>
    <body>
        <header id="branding" >
            <div class="social-profiles clearfix">
                                                  <ul>
                                          </ul>
                                          </div><!-- .social-profiles --><div class="hgroup-wrap">
            <div class="container clearfix">
              <section id="site-logo" class="clearfix">
                      <h1 id="site-title"> <a href="http://www.lolhistoryapp.com/" title="lolhistory app" rel="home">
                  lolhistory app        </a> </h1>
                       <h2 id="site-description">
                  league of legends summoner lookup app              </h2>
                    </section>
              <!-- #site-logo -->
              <button class="menu-toggle">Responsive Menu</button>
              <section class="hgroup-right">
                <nav id="access" class="clearfix"><ul class="nav-menu"><li id="menu-item-55" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-5 current_page_item menu-item-55"><a href="http://www.lolhistoryapp.com/">Home</a></li>
          <li id="menu-item-82" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-82"><a href="http://www.lolhistoryapp.com/ios-patch-notes/">iOS Patch Notes</a></li>
          <li id="menu-item-58" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-58"><a href="http://www.lolhistoryapp.com/android-patch-notes/">Android Patch Notes</a></li>
          <li id="menu-item-157" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-157"><a href="http://www.lolhistoryapp.com/twitter-feed/">Twitter Feed</a></li>
          <li id="menu-item-118" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-118"><a href="http://www.lolhistoryapp.com/affiliates/">Affiliates</a></li>
          <li id="menu-item-189" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-189"><a href="http://www.lolhistoryapp.com/media-kit/">Media kit</a></li>
          <li id="menu-item-56" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-56"><a href="http://www.lolhistoryapp.com/contact/">Contact</a></li>
          </ul></nav><!-- #access -->      <div class="search-toggle"></div>
                <!-- .search-toggle -->
                <div id="search-box" class="hide">

          <form action="http://www.lolhistoryapp.com/" method="get" class="searchform clearfix">
            <label class="assistive-text">
              Search  </label>
            <input type="search" placeholder="Search" class="s field" name="s">
            <input type="submit" value="Search" class="search-submit">
          </form>
          <!-- .search-form -->
                  <span class="arrow"></span> </div>
                <!-- #search-box --> 
              </section>
              <!-- .hgroup-right --> 
            </div>
            <!-- .container --> 
          </div>
          <!-- .hgroup-wrap -->

          </header>
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
        
            $participant = $_POST['summonerId'];
            $participant = intval($participant);
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
            $thismatch = get_object_vars(json_decode(file_get_contents("https://".$_POST['server'].".api.pvp.net/api/lol/".$_POST['server']."/v2.2/match/".$_POST['gameId']."?includeTimeline=true&api_key=79de72ae-b73d-4f43-ad31-4267915265ea")));
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
            //var_dump($summoners);
            foreach($thismatch['teams'] as $team){
                $team = get_object_vars($team);
                //var_dump($participantIdentity);
                $teamid = $team['teamId'];
                if ($summoners[$participant]['teamId'] === $teamid){
                    if($team['winner'] === true){
                        $summoners[$participant]['win'] = "<img class=\'endscreen\' src=\'images/Victory.png\' />";
                    } elseif($team['winner'] === false){
                        $summoners[$participant]['win'] = "<img class=\'endscreen\' src=\'images/Defeat.png\' />";
                    }
                }
            }
            ?>
        <div class='jumbotron'>
            <div style="width: 50%; margin-left: 25%; text-align: center;">
                <h2>Events of <?php echo $summoners[$participant]['summonerName'] . " as " . $champion[$summoners[$participant]['championId']]['name'] . " <img src='images/".str_replace(" ", "", str_replace("'", "", $champion[$summoners[$participant]['championId']]['name']))."Square.png'"; ?></h2>
            </div><br />
            <div style="width: 50%; margin-left: 25%; text-align: center;">
                <form id="summonerForm" action="" method="post">
                    <ul class="pager">
                        <li onclick="Prev()"><a>Previous Player</a></li>
                        <li id="Pause" style="display:none;"><a>Pause</a></li>
                        <li id="Play"><a onclick="javascript: listTicker({list: eventList ,startIndex:0,trickerPanel: $('#events'),interval: 3 * 500,});">Play</a></li>
                        <li id="Play2" style="display:none;"><a>Play</a></li>
                        <li onclick="Next()"><a>Next Player</a></li>
                    </ul>
                    <input type="hidden" name="summonerId" id="nextSummoner" />
                    <input type="hidden" name="summonerId" id="prevSummoner" />
                    <input type="hidden" name="server" value="<?php echo $_POST['server']; ?>"/>
                    <input type="hidden" name="gameId" value="<?php echo $_POST['gameId']; ?>" />
                    <input type="hidden" name="championId" value="<?php echo $_POST['championId']; ?>" />
                    <input type="hidden" name="ipEarned" value="<?php echo $_POST['ipEarned']; ?>" />
                </form>
            </div>
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
                                if($timestamp['participantId'] === $participant){
                                $events[$timestamp['participantId']][] = $timestamp;
                                }
                            } elseif(isset($timestamp['killerId'])){
                                if($timestamp['killerId'] === $participant){
                                $events[$timestamp['killerId']][] = $timestamp;
                                }
                            } elseif(isset($timestamp['creatorId'])){
                                if($timestamp['creatorId'] === $participant){
                                $events[$timestamp['creatorId']][] = $timestamp;
                                }
                            } 
                        }
                    }
                }
            }
            $endgametime = gmdate('i:s',$thismatch['matchDuration']);
            $win = $summoners[$participant]['win'];
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
                $LastBootsBought = "";
                $LastJungleItemBought = "";
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
                        if($items[$userEvent['itemId']]['name'] == "Boots of Swiftness" || $items[$userEvent['itemId']]['name'] == "Boots of Mobility" || $items[$userEvent['itemId']]['name'] == "Berserker's Greaves" || $items[$userEvent['itemId']]['name'] == "Ionian Boots of Lucidity" || $items[$userEvent['itemId']]['name'] == "Mercury's Treads" || $items[$userEvent['itemId']]['name'] == "Ninja Tabi" || $items[$userEvent['itemId']]['name'] == "Sorcerer's Shoes"){
                            $LastBootsBought = $items[$userEvent['itemId']]['name'];
                        }
                        if($items[$userEvent['itemId']]['name'] == "Poacher's Knife" || $items[$userEvent['itemId']]['name'] == "Skirmisher's Sabre" || $items[$userEvent['itemId']]['name'] == "Stalker's Blade" || $items[$userEvent['itemId']]['name'] == "Ranger's Trailblazer"){
                            $LastJungleItemBought = $items[$userEvent['itemId']]['name'];
                        }
                        $itemimagename = str_replace("'", "", $items[$userEvent['itemId']]['name']);
                        if(strpos($itemimagename, " (Trinket)") !== false){
                            $itemimagename = str_replace(" (Trinket)", "", $itemimagename);
                            $itemimage = str_replace(" ", "_", $itemimagename).".jpg";
                        } elseif(strpos($itemimagename, "Enchantment: ") !== false){
                            $itemimagename = str_replace(")", "", str_replace("(", "", str_replace("Enchantment: ", "", $itemimagename)));
                            if($LastBootsBought == "Boots of Swiftness" || $LastBootsBought == "Boots of Mobility" || $LastBootsBought == "Berserker's Greaves" || $LastBootsBought == "Ionian Boots of Lucidity" || $LastBootsBought == "Mercury's Treads" || $LastBootsBought == "Ninja Tabi" || $LastBootsBought == "Sorcerer's Shoes"){
                                $itemimage = str_replace(" ", "_", str_replace("'", "", $LastBootsBought)).'_'.str_replace(" ", "_", $itemimagename).".png";
                            } elseif($LastJungleItemBought == "Poacher's Knife" || $LastJungleItemBought == "Skirmisher's Sabre" || $LastJungleItemBought == "Stalker's Blade" || $LastJungleItemBought == "Ranger's Trailblazer"){
                                $itemimage = str_replace(" ", "_", str_replace("'", "", $LastJungleItemBought)).'_'.str_replace(" ", "_", $itemimagename).".png";
                            } else {
                                $itemimage = str_replace(" ", "_", $itemimagename).".png";
                            }
                        } elseif ($itemimagename === "Targons Brace" || $itemimagename === "Frostfang"){
                            $itemimage = str_replace(" ", "_", $itemimagename).".jpg";
                        } else {
                            $itemimage = str_replace(" ", "_", $itemimagename).".png";
                        }
                        $e =  "Purchased " . $items[$userEvent['itemId']]['name'] . " | <img src='images/".$itemimage."' />";
                        $lastitem[$userEvent['timestamp']] = $items[$userEvent['itemId']]['name'] . " | <img src='images/".$itemimage."' />";
                    }
                    if($userEvent['eventType'] === "ITEM_UNDO"){
                        $itemimagename = str_replace("'", "", $items[$userEvent['itemBefore']]['name']);
                        if(strpos($itemimagename, " (Trinket)") !== false){
                            $itemimagename = str_replace(" (Trinket)", "", $itemimagename);
                            $itemimage = str_replace(" ", "_", $itemimagename).".jpg";
                        } elseif(strpos($itemimagename, "Enchantment: ") !== false){
                            $itemimagename = str_replace(")", "", str_replace("(", "", str_replace("Enchantment: ", "", $itemimagename)));
                            if($items[$userEvent['itemBefore']]['name'] == "Boots of Swiftness" || $items[$userEvent['itemBefore']]['name'] == "Boots of Mobility" || $items[$userEvent['itemBefore']]['name'] == "Berserker's Greaves" || $items[$userEvent['itemBefore']]['name'] == "Ionian Boots of Lucidity" || $items[$userEvent['itemBefore']]['name'] == "Mercury's Treads" || $items[$userEvent['itemBefore']]['name'] == "Ninja Tabi" || $items[$userEvent['itemBefore']]['name'] == "Sorcerer's Shoes"){
                                $itemimage = str_replace(" ", "_", str_replace("'", "", $LastBootsBought)).'_'.str_replace(" ", "_", $itemimagename).".png";
                            } elseif($items[$userEvent['itemBefore']]['name'] == "Poacher's Knife" || $items[$userEvent['itemBefore']]['name'] == "Skirmisher's Sabre" || $items[$userEvent['itemBefore']]['name'] == "Stalker's Blade" || $items[$userEvent['itemBefore']]['name'] == "Ranger's Trailblazer"){
                                $itemimage = str_replace(" ", "_", str_replace("'", "", $LastJungleItemBought)).'_'.str_replace(" ", "_", $itemimagename).".png";
                            } else {
                                $itemimage = str_replace(" ", "_", $itemimagename).".png";
                            }
                        } elseif ($itemimagename === "Targons Brace" || $itemimagename === "Frostfang"){
                            $itemimage = str_replace(" ", "_", $itemimagename).".jpg";
                        } else {
                            $itemimage = str_replace(" ", "_", $itemimagename).".png";
                        }
                        $e =  "Undid buying " . $items[$userEvent['itemBefore']]['name'] . " | <img src='images/".$itemimage."' />";
                    }
                    
                    if($userEvent['eventType'] === "ITEM_SOLD"){
                        $itemimagename = str_replace("'", "", $items[$userEvent['itemId']]['name']);
                        if(strpos($itemimagename, " (Trinket)") !== false){
                            $itemimagename = str_replace(" (Trinket)", "", $itemimagename);
                            $itemimage = str_replace(" ", "_", $itemimagename).".jpg";
                        } elseif(strpos($itemimagename, "Enchantment: ") !== false){
                            $itemimagename = str_replace(")", "", str_replace("(", "", str_replace("Enchantment: ", "", $itemimagename)));
                            if($items[$userEvent['itemId']]['name'] == "Boots of Swiftness" || $items[$userEvent['itemId']]['name'] == "Boots of Mobility" || $items[$userEvent['itemId']]['name'] == "Berserker's Greaves" || $items[$userEvent['itemId']]['name'] == "Ionian Boots of Lucidity" || $items[$userEvent['itemId']]['name'] == "Mercury's Treads" || $items[$userEvent['itemId']]['name'] == "Ninja Tabi" || $items[$userEvent['itemId']]['name'] == "Sorcerer's Shoes"){
                                $itemimage = str_replace(" ", "_", str_replace("'", "", $LastBootsBought)).'_'.str_replace(" ", "_", $itemimagename).".png";
                            } elseif($items[$userEvent['itemId']]['name'] == "Poacher's Knife" || $items[$userEvent['itemId']]['name'] == "Skirmisher's Sabre" || $items[$userEvent['itemId']]['name'] == "Stalker's Blade" || $items[$userEvent['itemId']]['name'] == "Ranger's Trailblazer"){
                                $itemimage = str_replace(" ", "_", str_replace("'", "", $LastJungleItemBought)).'_'.str_replace(" ", "_", $itemimagename).".png";
                            } else {
                                $itemimage = str_replace(" ", "_", $itemimagename).".png";
                            }
                        } elseif ($itemimagename === "Targons Brace" || $itemimagename === "Frostfang"){
                            $itemimage = str_replace(" ", "_", $itemimagename).".jpg";
                        } else {
                            $itemimage = str_replace(" ", "_", $itemimagename).".png";
                        }
                        $e =  "Sold " . $items[$userEvent['itemId']]['name'] . " | <img src='images/".$itemimage."' />";
                    }/*
                    if($userEvent['eventType'] === "WARD_PLACED"){
                        if($userEvent['wardType'] == "SIGHT_WARD"){
                            $ward = "Sight_Ward";
                        }
                        if($userEvent['wardType'] == "VISION_WARD"){
                            $ward = "Vision_Ward";
                        }
                        if($userEvent['wardType'] == "TEEMO_MUSHROOM"){
                            $ward = "Noxious_Trap";
                        }
                        if($userEvent['wardType'] == "YELLOW_TRINKET"){
                            $ward = "Warding_Totem";
                        }
                        if($userEvent['wardType'] == "YELLOW_TRINKET_UPGRADE"){
                            $ward = "Greater_Totem";
                        }
                        $ditemimagename = str_replace(" (Trinket)", "", $ditemimagename);
                        $ditemimage = $ward.".jpg";
                        $e = "Placed ".str_replace("_", " ", $ward);
                    }*/
                    if($userEvent['eventType'] === "ITEM_DESTROYED"){
                        $ditemimagename = str_replace("'", "", $items[$userEvent['itemId']]['name']);
                        if(strpos($ditemimagename, " (Trinket)") !== false){
                            $ditemimagename = str_replace(" (Trinket)", "", $ditemimagename);
                            $ditemimage = str_replace(" ", "_", $ditemimagename).".jpg";
                        } elseif(strpos($ditemimagename, "Enchantment: ") !== false){
                            $itemimagename = str_replace(")", "", str_replace("(", "", str_replace("Enchantment: ", "", $itemimagename)));
                            if($itemimagename == "Devourer" || $itemimagename == "Warrior" || $itemimagename == "Cinderhulk" || $itemimagename == "Magus"){
                                $ditemimage = str_replace(" ", "_", str_replace("'", "", $LastJungleItemBought)).'_'.str_replace(" ", "_", $itemimagename).".png";
                            } elseif($itemimagename == "Alacrity" || $itemimagename == "Homeguard" || $itemimagename == "Furor" || $itemimagename == "Captain" || $itemimagename == "Distortion"){
                                $ditemimage = str_replace(" ", "_", str_replace("'", "", $LastBootsBought)).'_'.str_replace(" ", "_", $itemimagename).".png";
                            } else {
                                $ditemimage = str_replace(" ", "_", $itemimagename).".png";
                            }
                        } else {
                            $ditemimage = str_replace(" ", "_", $ditemimagename).".png";
                        }
                        if(strpos($items[$userEvent['itemId']]['name'], "Potion") !== false || strpos($items[$userEvent['itemId']]['name'], "Biscuit of Rejuvenation") !== false){
                            $e =  "Used " . $items[$userEvent['itemId']]['name'] . " | <img src='images/".$ditemimage."' />";
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
                        $skillname = $championsSpells[$summoners[$participant]['championId']][$userEvent['skillSlot']]['name'];
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
                        if($userEvent['towerType'] == "OUTER_TURRET"){
                            $building = "Outer Turret";
                        }
                        if($userEvent['towerType'] == "INNER_TURRET"){
                            $building = "Inner Turret";
                        }
                        if($userEvent['towerType'] == "BASE_TURRET"){
                            $building = "Base Turret";
                        }
                        if($userEvent['towerType'] == "NEXUS_TURRET"){
                            $building = "Nexus Turret";
                        }
                        if($userEvent['towerType'] == "UNDEFINED_TURRET"){
                            $building = "Undefined Turret";
                        }
                        if($userEvent['towerType'] == "INHIBITOR"){
                            $building = "Inhibitor";
                        }
                        $e = "Destroyed the " . $building . " | <img src='images/Turret.png' />";
                    }
                    if($userEvent['eventType'] === "ELITE_MONSTER_KILL"){
                        if($userEvent['monsterType'] === "BARON_NASHOR"){
                            $monsterimage = "baron.png";
                            $monster = 'Baron Nashor';
                        }
                        if($userEvent['monsterType'] === "DRAGON"){
                            $monsterimage = "dragon.png";
                            $monster = 'Dragon';
                        }
                        if($userEvent['monsterType'] === "BLUE_GOLEM"){
                            $monsterimage = "blue.png";
                            $monster = 'Blue Golem';
                        }
                        if($userEvent['monsterType'] === "RED_LIZARD"){
                            $monsterimage = "red.png";
                            $monster = 'Red Lizard';
                        }
                        if($userEvent['monsterType'] === "VILEMAW"){
                            $monsterimage = "vilemaw.png";
                            $monster = 'Vilemaw';
                        }
                        $e = "Killed " . $monster . " | <img src='images/".$monsterimage."' />";
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
                            value = '<div id=\"event'+index+'\" class=\"event jumbotron\" style=\"display: none;\"><div id=\"time\">'+parts[0]+'</div>';
                            parts[1] = parts[1].split('|');
                            var number = parts[1].length;
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