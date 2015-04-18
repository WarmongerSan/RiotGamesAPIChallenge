<html>
    <head>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
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
            #container{
                width: 100%;
            }
            #container div{
                vertical-align: top;
            }
            #statscontainer{
                float: left;
                width: 50%;
                min-width: 250px;
                height: 350px;
                overflow-y: scroll;
                margin-left: 25px;
                margin-top: 25px;
            }
            #statscontainer div:not(#timeDateType){
                float: left;
                padding: 10px;
            }
            #timeDateType{
                margin-top: 110px;
            }
            #champOthers{
                margin-top: -20px;
            }
            #pagerContainer{
                width: 80%;
                margin-left: 10%;
                margin-top: 10px;
            }
            .defeat{
                color: red;
            }
            .victory{
                color: green;
            }
            #endStatus{
                float: left;
                width: 100%;
                min-width: 250px;
                font-size: 5em;
                margin-top: 25px;
                text-align: center;
            }
            body{
                background-color: white !important;
            }
            #extraStats{
                float: right;
                width: 45%;
                margin-right: 25px;
                margin-top: 25px;
                padding: 10px;
            }
            #mvpimage{
                position: absolute;
                width: 50px;
                margin-left: -50px;
            }
        </style>
        <script>
            function Next(){
                $("body").find("#container:visible").addClass('prev').fadeOut( function() {
                    if($("body").find(".prev").next('#container').length >= 1){
                        $("body").find(".prev").next('#container').fadeIn();
                        $("body").find(".prev").removeClass('prev');
                    } else {
                        $("body").find("#container:first").fadeIn();
                        $("body").find(".prev").removeClass('prev');
                    }
                    var value = document.getElementById('summonerId').value;
                    document.getElementById('summonerId').value = value+1;
                    
                    if($("body").find("#container:visible") == $("body #container:nth-child(7)")){
                        $(".eventAnimation").fadeOut( function(){ $(".eventAnimation").css("display", "none"); });
                    } else {
                        if($(".eventAnimation").css("display", "none")){
                            $(".eventAnimation").css("display", "inline-block").fadeIn();
                        }
                    }
                });
                //if($("body").find("#container:visible").length > 1){
                //    $("body").find("#container:visible:first").css("display", "none");
                //}
            }
            function Previous(){
                $("body").find("#container:visible").addClass('prev').fadeOut( function() {
                    if($("body").find(".prev").prev('#container').length >= 1){
                        $("body").find(".prev").prev('#container').fadeIn();
                        $("body").find(".prev").removeClass('prev');
                    } else {
                        $("body").find("#container:hidden:last").fadeIn();
                        $("body").find(".prev").removeClass('prev');
                    }
                    var value = document.getElementById('summonerId').value;
                    document.getElementById('summonerId').value = value-1;
                    
                    if($("body").find("#container:visible") == $("body #container:nth-child(7)")){
                        $(".eventAnimation").fadeOut( function(){ $(".eventAnimation").css("display", "none"); });
                    } else {
                        if($(".eventAnimation").css("display", "none")){
                            $(".eventAnimation").css("display", "inline-block").fadeIn();
                        }
                    }
                });
            }
            
            function Team100(){
                $("body").find("#container:visible").fadeOut( function() {
                    $("body #container:nth-child(7)").fadeIn();
                    $(".eventAnimation").fadeOut( function(){ $(".eventAnimation").css("display", "none"); });
                });
            }
            
            function Team200(){
                $("body").find("#container:visible").fadeOut( function() {
                    $("body #container:nth-child(14)").fadeIn();
                    $(".eventAnimation").fadeOut( function(){ $(".eventAnimation").css("display", "none"); });
                });
            }
            
            function eventAnimation(){
                $("#eventAnimation").submit();
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
    <div id='pagerContainer'> 
        <form action="eventAnimation.php" id="eventAnimation" method="post">
            <ul class="pager">
                <li class="previous"><a href="#" onclick="javascript: Previous();">Previous</a></li>
                <li class="team100"><a href="#" onclick="javascript: Team100();">Blue Team</a></li>
                <li class="eventAnimation"><a href="#" onclick="javascript: eventAnimation();">Event Overview</a></li>
                <li class="team200"><a href="#" onclick="javascript: Team200();">Purple Team</a></li>
                <li class="next"><a href="#" onclick="javascript: Next();">Next</a></li>
            </ul>
            <input type='hidden' name='server' value='<?php echo $_POST['server'] ?>' />
            <input type='hidden' name='gameId' value='<?php echo $_POST['gameId'] ?>' />
            <input type='hidden' name='championId' value='<?php echo $_POST['championId'] ?>' />
            <input type='hidden' name='ipEarned' value='<?php echo $_POST['ipEarned'] ?>' />
            <input type='hidden' id='summonerId' name='summonerId' value='' />
        </form>
    </div>
<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    //echo $_POST['summonerId'];
    $staticchampdata = get_object_vars(json_decode(file_get_contents("https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=spells&api_key=insert_api_key_here")));
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
                
    $allitems = get_object_vars(json_decode(file_get_contents("https://global.api.pvp.net/api/lol/static-data/na/v1.2/item?itemListData=image&api_key=insert_api_key_here")));
    foreach($allitems as $itemdata){
        //var_dump($itemdata);
        if(is_object($itemdata)){
        foreach($itemdata as $id => $item){
            if(is_numeric($id)){
            $item = get_object_vars($item);
            $items[$id] = $item;
            }
        }
        }
    }
    $summonerspells = get_object_vars(json_decode(file_get_contents("https://global.api.pvp.net/api/lol/static-data/euw/v1.2/summoner-spell?api_key=insert_api_key_here")));
    foreach($summonerspells['data'] as $s_spells){
        if(is_object($s_spells)){
            $s_spells = get_object_vars($s_spells);
        }
        $summonerSpells[$s_spells['id']]['name'] = $s_spells['name'];
    }
                
    
    $matchdetails = get_object_vars(json_decode(file_get_contents("https://".$_POST['server'].".api.pvp.net/api/lol/".$_POST['server']."/v2.2/match/".$_POST['gameId']."?includeTimeline=true&api_key=insert_api_key_here")));
    //var_dump($matchdetails);
    foreach($matchdetails['teams'] as $teams){
        $teams = get_object_vars($teams);
        $team[] = $teams;
    }
    
    $blueDeaths = 0;
    $blueKills = 0;
    $blueAssists = 0;
    $blueDragons = 0;
    $blueBarons = 0;
    $blueMinions = 0;
    $blueTowers = 0;
    $blueInhibs = 0;
    $bluePhysicDmgDealt = 0;
    $blueMagicDmgDealt = 0;
    $blueTrueDmgDealt = 0;
    $blueTotalDmgDealt = 0;
    $bluePhysicDmgTaken = 0;
    $blueMagicDmgTaken = 0;
    $blueTrueDmgTaken = 0;
    $blueTotalDmgTaken = 0;
    $blueWardsPlaced = 0;
    $blueWardsKilled = 0;
    $blueSightWards = 0;
    $blueVisionWards = 0;
    
    $purpleDeaths = 0;
    $purpleKills = 0;
    $purpleAssists = 0;
    $purpleDragons = 0;
    $purpleBarons = 0;
    $purpleMinions = 0;
    $purpleTowers = 0;
    $purpleInhibs = 0;
    $purplePhysicDmgDealt = 0;
    $purpleMagicDmgDealt = 0;
    $purpleTrueDmgDealt = 0;
    $purpleTotalDmgDealt = 0;
    $purplePhysicDmgTaken = 0;
    $purpleMagicDmgTaken = 0;
    $purpleTrueDmgTaken = 0;
    $purpleTotalDmgTaken = 0;
    $purpleWardsPlaced = 0;
    $purpleWardsKilled = 0;
    $purpleSightWards = 0;
    $purpleVisionWards = 0;
    
    foreach($matchdetails['participants'] AS $eachParticipant){
        if(is_object($eachParticipant)){
            $eachParticipant = get_object_vars($eachParticipant);
        }
        if($eachParticipant['championId'] == $_POST['championId']){
            $SearchedParticipantId = $eachParticipant['participantId'];
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
                            if($timestamp['participantId'] === $eachParticipant['participantId']){
                            $events[$timestamp['participantId']][] = $timestamp;
                            }
                        } elseif(isset($timestamp['killerId'])){
                            if($timestamp['killerId'] === $eachParticipant['participantId']){
                            $events[$timestamp['killerId']][] = $timestamp;
                            }
                        }
                    }
                }
            }
        }
        $dragon = 0;
        $baron = 0;
        foreach($events as $userEvents){
            foreach($userEvents as $userEvent){
                if($userEvent['participantId'] == $eachParticipant['participantId'] || $userEvent['killerId'] == $eachParticipant['participantId']){    
                    if($userEvent['eventType'] === "ITEM_PURCHASED"){
                       //$itemimagename = str_replace("'", "", $items[$userEvent['itemId']]['name']);
                       if($items[$userEvent['itemId']]['name'] == "Boots of Swiftness" || $items[$userEvent['itemId']]['name'] == "Boots of Mobility" || $items[$userEvent['itemId']]['name'] == "Berserker's Greaves" || $items[$userEvent['itemId']]['name'] == "Ionian Boots of Lucidity" || $items[$userEvent['itemId']]['name'] == "Mercury's Treads" || $items[$userEvent['itemId']]['name'] == "Ninja Tabi" || $items[$userEvent['itemId']]['name'] == "Sorcerer's Shoes"){
                           $LastBootsBought = $items[$userEvent['itemId']]['name'];
                       }
                       if($items[$userEvent['itemId']]['name'] == "Poacher's Knife" || $items[$userEvent['itemId']]['name'] == "Skirmisher's Sabre" || $items[$userEvent['itemId']]['name'] == "Stalker's Blade" || $items[$userEvent['itemId']]['name'] == "Ranger's Trailblazer"){
                           $LastJungleItemBought = $items[$userEvent['itemId']]['name'];
                       }
                    }
                    if($userEvent['eventType'] === "ELITE_MONSTER_KILL"){
                        if($userEvent['monsterType'] == "DRAGON"){
                            $dragon += 1;
                        } elseif($userEvent['monsterType'] == "BARON_NASHOR"){
                            $baron += 1;
                        }
                    }
                }
            }
        }
        $stats = get_object_vars($eachParticipant['stats']);
        $matchItems[$eachParticipant['participantId']][0] = $stats['item0'];
        $matchItems[$eachParticipant['participantId']][1] = $stats['item1'];
        $matchItems[$eachParticipant['participantId']][2] = $stats['item2'];
        $matchItems[$eachParticipant['participantId']][3] = $stats['item3'];
        $matchItems[$eachParticipant['participantId']][4] = $stats['item4'];
        $matchItems[$eachParticipant['participantId']][5] = $stats['item5'];
        $matchItems[$eachParticipant['participantId']][6] = $stats['item6'];
        for($i = 0; $i < 7; $i ++){
            $itemimagename = str_replace("'", "", $items[$matchItems[$eachParticipant['participantId']][$i]]['name']);
            //if(!array_key_exists('item0', $stats)) { $matchItem[$eachParticipant['participantId']][$i] = 'DefaultItem.gif'; }
            //if(!array_key_exists('item1', $stats)) { $matchItem[$eachParticipant['participantId']][$i] = 'DefaultItem.gif'; }
            //if(!array_key_exists('item2', $stats)) { $matchItem[$eachParticipant['participantId']][$i] = 'DefaultItem.gif'; }
            //if(!array_key_exists('item3', $stats)) { $matchItem[$eachParticipant['participantId']][$i] = 'DefaultItem.gif'; }
            //if(!array_key_exists('item4', $stats)) { $matchItem[$eachParticipant['participantId']][$i] = 'DefaultItem.gif'; }
            //if(!array_key_exists('item5', $stats)) { $matchItem[$eachParticipant['participantId']][$i] = 'DefaultItem.gif'; }
            if($matchItems[$eachParticipant['participantId']][$i] == 0) { $matchItem[$eachParticipant['participantId']][$i] = 'DefaultItem.gif'; }
            if(strpos($itemimagename, " (Trinket)") !== false){
                $itemimagename = str_replace(" (Trinket)", "", $itemimagename);
                $matchItem[$eachParticipant['participantId']][$i]  = str_replace(" ", "_", $itemimagename).".jpg";
            } elseif(strpos($itemimagename, "Enchantment: ") !== false){
                $itemimagename = str_replace(")", "", str_replace("(", "", str_replace("Enchantment: ", "", $itemimagename)));
                if($itemimagename == "Devourer" || $itemimagename == "Warrior" || $itemimagename == "Cinderhulk" || $itemimagename == "Magus"){
                    $matchItem[$eachParticipant['participantId']][$i]  = str_replace(" ", "_", str_replace("'", "", $LastJungleItemBought)).'_'.str_replace(" ", "_", $itemimagename).".png";
                } elseif($itemimagename == "Alacrity" || $itemimagename == "Homeguard" || $itemimagename == "Furor" || $itemimagename == "Captain" || $itemimagename == "Distortion"){
                    $matchItem[$eachParticipant['participantId']][$i] = str_replace(" ", "_", str_replace("'", "", $LastBootsBought)).'_'.str_replace(" ", "_", $itemimagename).".png";
                }
            } elseif ($itemimagename === "Targons Brace" || $itemimagename === "Frostfang"){
                $matchItem[$eachParticipant['participantId']][$i]  = str_replace(" ", "_", $itemimagename).".jpg";
            } elseif ($itemimagename != "") {
                $matchItem[$eachParticipant['participantId']][$i]  = str_replace(" ", "_", $itemimagename).".png";
            }
        }
        if(!array_key_exists('assists', $stats)) { $stats['assists'] = 0; }
        if(!array_key_exists('kills', $stats)) { $stats['kills'] = 0; }
        if(!array_key_exists('deaths', $stats)) { $stats['deaths'] = 0; }
        if($eachParticipant['participantId'] <= 6){
            $blueDeaths += $stats['deaths'];
            $blueKills += $stats['kills'];
            $blueAssists += $stats['assists'];
            $blueDragons += $dragon;
            $blueBarons += $baron;
            $blueMinions += get_object_vars($eachParticipant['stats'])['minionsKilled'];
            $blueTowers += get_object_vars($eachParticipant['stats'])['towerKills'];
            $bluePhysicDmgDealt += get_object_vars($eachParticipant['stats'])['physicalDamageDealt'];
            $blueMagicDmgDealt += get_object_vars($eachParticipant['stats'])['magicDamageDealt'];
            $blueTrueDmgDealt += get_object_vars($eachParticipant['stats'])['trueDamageDealt'];
            $blueTotalDmgDealt += get_object_vars($eachParticipant['stats'])['totalDamageDealt'];
            $bluePhysicDmgTaken += get_object_vars($eachParticipant['stats'])['physicalDamageTaken'];
            $blueMagicDmgTaken += get_object_vars($eachParticipant['stats'])['magicalDamageTaken'];
            $blueTrueDmgTaken += get_object_vars($eachParticipant['stats'])['trueDamageTaken'];
            $blueTotalDmgTaken += get_object_vars($eachParticipant['stats'])['totalDamageTaken'];
            $blueWardsPlaced += get_object_vars($eachParticipant['stats'])['wardsPlaced'];
            $blueWardsKilled += get_object_vars($eachParticipant['stats'])['wardsKilled'];
            $blueSightWards += get_object_vars($eachParticipant['stats'])['sightWardsBoughtInGame'];
            $blueVisionWards += get_object_vars($eachParticipant['stats'])['visionWardsBoughtInGame'];
        } elseif($eachParticipant['participantId'] <= 10) {
            $purpleDeaths += $stats['deaths'];
            $purpleKills += $stats['kills'];
            $purpleAssists += $stats['assists'];
            $purpleDragons += $dragon;
            $purpleBarons += $baron;
            $purpleMinions += get_object_vars($eachParticipant['stats'])['minionsKilled'];
            $purpleTowers += get_object_vars($eachParticipant['stats'])['towerKills'];
            $purplePhysicDmgDealt += get_object_vars($eachParticipant['stats'])['physicalDamageDealt'];
            $purpleMagicDmgDealt += get_object_vars($eachParticipant['stats'])['magicDamageDealt'];
            $purpleTrueDmgDealt += get_object_vars($eachParticipant['stats'])['trueDamageDealt'];
            $purpleTotalDmgDealt += get_object_vars($eachParticipant['stats'])['totalDamageDealt'];
            $purplePhysicDmgTaken += get_object_vars($eachParticipant['stats'])['physicalDamageTaken'];
            $purpleMagicDmgTaken += get_object_vars($eachParticipant['stats'])['magicalDamageTaken'];
            $purpleTrueDmgTaken += get_object_vars($eachParticipant['stats'])['trueDamageTaken'];
            $purpleTotalDmgTaken += get_object_vars($eachParticipant['stats'])['totalDamageTaken'];
            $purpleWardsPlaced += get_object_vars($eachParticipant['stats'])['wardsPlaced'];
            $purpleWardsKilled += get_object_vars($eachParticipant['stats'])['wardsKilled'];
            $purpleSightWards += get_object_vars($eachParticipant['stats'])['sightWardsBoughtInGame'];
            $purpleVisionWards += get_object_vars($eachParticipant['stats'])['visionWardsBoughtInGame'];
        }
        $bluekda = "<h2>" . $blueKills . " / " . $blueDeaths . " / " . $blueAssists . "</h2>";
        $purplekda = "<h2>" . $purpleKills . " / " . $purpleDeaths . " / " . $purpleAssists . "</h2>";
        $kda[$eachParticipant['participantId']] = "<h2>" . $stats['kills'] . " / " . $stats['deaths'] . " / " . $stats['assists'] . "</h2>";
        if($eachParticipant['participantId'] == 5){
            echo "
                <div id='container' style='display:none;'>
                    <div id='endStatus' class='jumbotron'>
                 ";
                   if($team[0]['winner'] == 1){
                        echo "<span class='victory'>Victory</span>";
                    } else {
                        echo "<span class='defeat'>Defeat</span>";
                    } 
            echo "
                    </div>
                    <div id='statsContainer' class='jumbotron'>
                        <div id='champIntro'><h1>Blue team</h1>&nbsp;&nbsp;" . $bluekda . "</div>
                        <div id='timeDateType'>".date('i', $matchdetails['matchDuration'])."m , ".date("M, d-Y H:i", $matchdetails['matchCreation']/1000)." | ".str_replace("_", " ", $matchdetails['queueType'])."</div>
                        <div style='clear: both;'></div>
                    </div>
                    <div id='extraStats' class='jumbotron'>
                        <table class='table table-striped'>
                            <tr><th colspan='2'>Kills</th></tr>
                            <tr><td>Champions</td><td>".$blueKills."</td></tr>
                            <tr><td>Minions</td><td>".$blueMinions."</td></tr>
                            <tr><td>Turrets</td><td>".$blueTowers."</td></tr>
                            <tr><td>Dragons</td><td>".$blueDragons."</td></tr>
                            <tr><td>Barons</td><td>".$blueBarons."</td></tr>
                            <tr><th colspan='2'>Damage</th></tr>
                            <tr><td>Physical damage dealt</td><td>".$bluePhysicDmgDealt."</td></tr>
                            <tr><td>Magical damage dealt</td><td>".$blueMagicDmgDealt."</td></tr>
                            <tr><td>True damage dealt</td><td>".$blueTrueDmgDealt."</td></tr>
                            <tr><td>Total damage dealt</td><td>".$blueTotalDmgDealt."</td></tr>
                            <tr><td>Physical damage taken</td><td>".$bluePhysicDmgTaken."</td></tr>
                            <tr><td>Magical damage taken</td><td>".$blueMagicDmgTaken."</td></tr>
                            <tr><td>True damage taken</td><td>".$blueTrueDmgTaken."</td></tr>
                            <tr><td>Total damage taken</td><td>".$blueTotalDmgTaken."</td></tr>
                            <tr><th colspan='2'>Wards</th></tr>
                            <tr><td>Wards placed</td><td>".$blueWardsPlaced."</td></tr>
                            <tr><td>Wards killed</td><td>".$blueWardsKilled."</td></tr>
                            <tr><td>Sight Wards bought</td><td>".$blueSightWards."</td></tr>
                            <tr><td>Vision Wards bought</td><td>".$blueVisionWards."</td></tr>
                        </table>
                    </div>
                </div>
                 ";
        }
        if($eachParticipant['participantId'] == $_POST['summonerId']){
            echo "  <div id='container'>";
            $DISPLAYEDID = $eachParticipant['participantId'];
        } else {
            echo "  <div id='container'style='display: none;'>";
        }
        echo "<div style='opacity: 0;' id='ID'>".$eachParticipant['participantId']."</div><div id='endStatus' class='jumbotron'>";
        if($eachParticipant['participantId'] < 6){
            $pTeam = '100';
            if($team[0]['winner'] == 1){
                echo "<span class='victory'>Victory</span>";
            } else {
                echo "<span class='defeat'>Defeat</span>";
            }
        }
        if($eachParticipant['participantId'] >= 6){
            $pTeam = '200';
            if($team[1]['winner'] == 1){
                echo "<span class='victory'>Victory</span>";
            } else {
                echo "<span class='defeat'>Defeat</span>";
            }
        }
        echo "</div>
                <div id='statsContainer' class='jumbotron'>
                    <div id='champimage'><img  style='border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px;' src='images/".str_replace(" ", "", str_replace("'", "", $champion[$eachParticipant['championId']]['name']))."Square.png' /></div>
                    <div id='champInfo'>";
                  if(str_replace(" ", "", str_replace("'", "", $champion[$eachParticipant['championId']]['name'])) == $_POST['mvp']){
                      echo "<img id='mvpimage' src='images/mvpbadge.png' />";
                  }
                  echo "<div id='champIntro'><h1>".$champion[$eachParticipant['championId']]['name']. "</h1>&nbsp;&nbsp;" . $kda[$eachParticipant['participantId']] . "</div>
                        <div id='timeDateType'>".date('i', $matchdetails['matchDuration'])."m , ".date("M, d-Y H:i", $matchdetails['matchCreation']/1000)." | ".str_replace("_", " ", $matchdetails['queueType'])."</div>
                        <div style='clear: both;'></div>
                    </div>
                    <div id='champOthers'>
                        <div id='itemImages'>".
                          "<img src='images/" . $matchItem[$eachParticipant['participantId']][0] . "' />" .
                          "<img src='images/" . $matchItem[$eachParticipant['participantId']][1] . "' />" .
                          "<img src='images/" . $matchItem[$eachParticipant['participantId']][2] . "' />" .
                          "<img src='images/" . $matchItem[$eachParticipant['participantId']][3] . "' />" .
                          "<img src='images/" . $matchItem[$eachParticipant['participantId']][4] . "' />" .
                          "<img src='images/" . $matchItem[$eachParticipant['participantId']][5] . "' />" .
                          "<img src='images/" . $matchItem[$eachParticipant['participantId']][6] . "' />"
                        ."</div>
                        <div id='sumSpells'>
                            <img src='images/".str_replace(" ", "", $summonerSpells[$eachParticipant['spell1Id']]['name'])."_sp.png' />
                            <img src='images/".str_replace(" ", "", $summonerSpells[$eachParticipant['spell2Id']]['name'])."_sp.png' />
                        </div>
                    </div>
                    </div>
                    <div id='extraStats' class='jumbotron'>
                        <table class='table table-striped'>
                        <tr><th colspan='2'>Kills</th></tr>
                        <tr><td>Champions</td><td>".get_object_vars($eachParticipant['stats'])['kills']."</td></tr>
                        <tr><td>Minions</td><td>".get_object_vars($eachParticipant['stats'])['minionsKilled']."</td></tr>
                        <tr><td>Turrets</td><td>".get_object_vars($eachParticipant['stats'])['towerKills']."</td></tr>
                        <tr><td>Dragons</td><td>".$dragon."</td></tr>
                        <tr><td>Barons</td><td>".$baron."</td></tr>
                        <tr><th colspan='2'>Damage</th></tr>
                        <tr><td>Physical damage dealt</td><td>".get_object_vars($eachParticipant['stats'])['physicalDamageDealt']."</td></tr>
                        <tr><td>Magical damage dealt</td><td>".get_object_vars($eachParticipant['stats'])['magicDamageDealt']."</td></tr>
                        <tr><td>True damage dealt</td><td>".get_object_vars($eachParticipant['stats'])['trueDamageDealt']."</td></tr>
                        <tr><td>Total damage dealt</td><td>".get_object_vars($eachParticipant['stats'])['totalDamageDealt']."</td></tr>
                        <tr><td>Physical damage taken</td><td>".get_object_vars($eachParticipant['stats'])['physicalDamageTaken']."</td></tr>
                        <tr><td>Magical damage taken</td><td>".get_object_vars($eachParticipant['stats'])['magicDamageTaken']."</td></tr>
                        <tr><td>True damage taken</td><td>".get_object_vars($eachParticipant['stats'])['trueDamageTaken']."</td></tr>
                        <tr><td>Total damage taken</td><td>".get_object_vars($eachParticipant['stats'])['totalDamageTaken']."</td></tr>
                        <tr><th colspan='2'>Wards</th></tr>
                        <tr><td>Wards placed</td><td>".get_object_vars($eachParticipant['stats'])['wardsPlaced']."</td></tr>
                        <tr><td>Wards killed</td><td>".get_object_vars($eachParticipant['stats'])['wardsKilled']."</td></tr>
                        <tr><td>Sight Wards bought</td><td>".get_object_vars($eachParticipant['stats'])['sightWardsBoughtInGame']."</td></tr>
                        <tr><td>Vision Wards bought</td><td>".get_object_vars($eachParticipant['stats'])['visionWardsBoughtInGame']."</td></tr>
                    </table>
                    </div>
                </div>
            ";
                  
      if($eachParticipant['participantId'] == 10){
            echo "
                <div id='container' style='display:none;'>
                    <div id='endStatus' class='jumbotron'>
                 ";
                   if($team[0]['winner'] == 1){
                        echo "<span class='victory'>Victory</span>";
                    } else {
                        echo "<span class='defeat'>Defeat</span>";
                    } 
            echo "
                    </div>
                    <div id='statsContainer' class='jumbotron'>
                        <div id='champIntro'><h1>Purple team</h1>&nbsp;&nbsp;" . $purplekda . "</div>
                        <div id='timeDateType'>".date('i', $matchdetails['matchDuration'])."m , ".date("M, d-Y H:i", $matchdetails['matchCreation']/1000)." | ".str_replace("_", " ", $matchdetails['queueType'])."</div>
                        <div style='clear: both;'></div>
                    </div>
                    <div id='extraStats' class='jumbotron'>
                        <table class='table table-striped'>
                            <tr><th colspan='2'>Kills</th></tr>
                            <tr><td>Champions</td><td>".$purpleKills."</td></tr>
                            <tr><td>Minions</td><td>".$purpleMinions."</td></tr>
                            <tr><td>Turrets</td><td>".$purpleTowers."</td></tr>
                            <tr><td>Dragons</td><td>".$purpleDragons."</td></tr>
                            <tr><td>Barons</td><td>".$purpleBarons."</td></tr>
                            <tr><th colspan='2'>Damage</th></tr>
                            <tr><td>Physical damage dealt</td><td>".$purplePhysicDmgDealt."</td></tr>
                            <tr><td>Magical damage dealt</td><td>".$purpleMagicDmgDealt."</td></tr>
                            <tr><td>True damage dealt</td><td>".$purpleTrueDmgDealt."</td></tr>
                            <tr><td>Total damage dealt</td><td>".$purpleTotalDmgDealt."</td></tr>
                            <tr><td>Physical damage taken</td><td>".$purplePhysicDmgTaken."</td></tr>
                            <tr><td>Magical damage taken</td><td>".$purpleMagicDmgTaken."</td></tr>
                            <tr><td>True damage taken</td><td>".$purpleTrueDmgTaken."</td></tr>
                            <tr><td>Total damage taken</td><td>".$purpleTotalDmgTaken."</td></tr>
                            <tr><th colspan='2'>Wards</th></tr>
                            <tr><td>Wards placed</td><td>".$purpleWardsPlaced."</td></tr>
                            <tr><td>Wards killed</td><td>".$purpleWardsKilled."</td></tr>
                            <tr><td>Sight Wards bought</td><td>".$purpleSightWards."</td></tr>
                            <tr><td>Vision Wards bought</td><td>".$purpleVisionWards."</td></tr>
                        </table>
                    </div>
                </div>
                 ";
        }
    }
    if(isset($DISPLAYEDID)){
        echo "
                    <script>
                        $('#summonerId').val(".$DISPLAYEDID.");
                    </script>
             ";
    }
    ?>
    <form id="nextForm">
        <input type='hidden' name='server' value='<?php echo $_POST['server'] ?>' />
        <input type='hidden' name='gameId' value='<?php echo $_POST['gameId'] ?>' />
        <input type='hidden' name='championId' value='<?php echo $_POST['championId'] ?>' />
        <input type='hidden' name='ipEarned' value='<?php echo $_POST['ipEarned'] ?>' />
        <input type='hidden' name='summonerId' value='<?php echo ($_POST['summonerId']+1) ?>' />                    
    </form>
    <form id="previousForm">
        <input type='hidden' name='server' value='<?php echo $_POST['server'] ?>' />
        <input type='hidden' name='gameId' value='<?php echo $_POST['gameId'] ?>' />
        <input type='hidden' name='championId' value='<?php echo $_POST['championId'] ?>' />
        <input type='hidden' name='ipEarned' value='<?php echo $_POST['ipEarned'] ?>' />
        <input type='hidden' name='summonerId' value='<?php echo ($_POST['summonerId']+1) ?>' />                    
    </form>
    </body>
</html>