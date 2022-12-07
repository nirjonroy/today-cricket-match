
<?php 
// $ary_result = json_decode(file_get_contents(""));
$url = "https://api.cricapi.com/v1/match_info?apikey=d1a4111b-7ede-41ab-bcec-fb93bc9fa48c&id=e2b15b2c-d04e-4b18-9ce8-be981469aecc";
$result = file_get_contents($url);
// $result = orderBy($result[data] [dateTimeGMT] , DESC);
$result = json_decode($result, true);
// print_r($result);     

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ScoreBoard</title>

    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/index.css"/>

  </head>
  <body>
    <!--Whole Container -->
    <div class="rca-container rca-margin">
      
      <!--Live ScoreBoard -->
      <div class="rca-row">
        <?php
            if(isset($result['error'])){
            echo "<h2>" . $result['error'] . "</h2>";
            }else{
        ?>
        <!--Widget Inner -->
        <div class="rca-column-6">
          <!--Match Series-->
          <div class="rca-medium-widget rca-padding rca-live-season rca-top-border">
            <div class="rca-live-label rca-right">
                <?php echo $result['data']['teamInfo'][0]['shortname'];?>
            VS
            <?php echo $result['data']['teamInfo'][1]['shortname'];?>
             </div>
            <div class="rca-clear"></div>
            <div class="rca-padding">       
              <h3 class="rca-match-title">
                <a href="/main.html">
                
                <img src="<?php echo $result['data']['teamInfo'][0]['img']; ?>" alt="no flag found" width="50px" height="50px">
                <?php echo $result['data']['score'][0]['r'];?> / <?php echo $result['data']['score'][0]['w'];?> (<?php echo $result['data']['score'][0]['o'];?>)   

                <img src="<?php echo $result['data']['teamInfo'][1]['img']; ?>" alt="no flag found" width="50px" height="50px">
                <?php echo $result['data']['score'][1]['r'];?> / <?php echo $result['data']['score'][1]['w'];?> (<?php echo $result['data']['score'][1]['o'];?>)
            </a>
              </h3>
            </div>
          </div>
          <!--Match Schedule Info-->
          <div class="rca-mini-widget rca-history-info">
            <div class="rca-row">
              <span class="rca-col rca-history-title">Match:</span>
              <span class="rca-col"> <?php echo $result['data']['name'];?></span>
            </div>
            <div class="rca-row">
              <span class="rca-col rca-history-title">Series:</span>
              <span class="rca-col"> <?php echo $result['data']['matchType'];?></span>
            </div>
            <div class="rca-row">
              <span class="rca-col rca-history-title">Date (GMT):</span>
              <span class="rca-col"> 
                    <?php echo date('d-m-y', strtotime($result['data']['dateTimeGMT'])); ?>
            </span>
            </div>
            <div class="rca-row">
              <span class="rca-col rca-history-title">Venue:</span>
              <span class="rca-col"> <?php echo $result['data']['venue'];?></span>
            </div>
            <div class="rca-row">
              <span class="rca-col rca-history-title">Match Type:</span>
              <span class="rca-col"> <?php echo $result['data']['matchType'];?></span>
            </div>
            <div class="rca-row">
              <span class="rca-col rca-history-title">Toss:</span>
              <span class="rca-col"> Team <?php echo $result['data']['tossWinner'];?> won the toss and chose to <?php echo $result['data']['tossChoice'];?> first</span>
            </div>
          </div>
		</div>

        <?php 
            if(isset($result['data']['matchStarted']['true'])){

            
        ?>
        <div class="rca-column-6">
          <!--Match Series-->
          <div class="rca-medium-widget rca-top-border ">
            <ul class="rca-tab-list">
              <li class="rca-tab-link active" data-tab="tab-41" onclick="showTab(this);">Team1</li>
              <li class="rca-tab-link" data-tab="tab-42" onclick="showTab(this);">Team2</li>
            </ul>
            <div id="tab-41" class="rca-tab-content rca-padding active">
              <div class="rca-batting-score rca-padding">
                <h3>Team X Batting: <strong> 92/2 in 8.5</strong></h3>
                <div class="rca-row">
                  <div class="rca-header rca-table">
                    <div class="rca-col rca-player">
                      Batsmen
                    </div>
                    <div class="rca-col">
                      R
                    </div>
                    <div class="rca-col">
                      4s
                    </div>
                    <div class="rca-col">
                      6s
                    </div>
                    <div class="rca-col">
                      SR
                    </div>
                  </div>
                </div>
                <div class="rca-row">
                  <div class="rca-table">
                    <div class="rca-col rca-player">
                      Player x1*
                    </div>
                    <div class="rca-col">
                      8 (7)
                    </div>
                    <div class="rca-col">
                      0
                    </div>
                    <div class="rca-col">
                      1
                    </div>
                    <div class="rca-col">
                      114.29
                    </div>
                  </div>
                </div>
                <div class="rca-row">
                  <div class="rca-table">
                    <div class="rca-col rca-player">
                      Player x2
                    </div>
                    <div class="rca-col">
                      8 (7)
                    </div>
                    <div class="rca-col">
                      0
                    </div>
                    <div class="rca-col">
                      1
                    </div>
                    <div class="rca-col">
                      114.29
                    </div>
                  </div>
                </div>
                <div class="rca-clear"></div>
              </div>
              <div class="rca-bowling-score rca-padding">
                <h3>Team X Bowling:</h3>
                <div class="rca-row">
                  <div class="rca-header rca-table">
                    <div class="rca-col rca-player">
                      Bowler
                    </div>
                    <div class="rca-col small">
                      O
                    </div>
                    <div class="rca-col small">
                      M
                    </div>
                    <div class="rca-col small">
                      R
                    </div>
                    <div class="rca-col small">
                      W
                    </div>
                    <div class="rca-col small">
                      Econ
                    </div>
                    <div class="rca-col small">
                      Extras
                    </div>
                  </div>
                </div>
                <div class="rca-row">
                  <div class="rca-table">
                    <div class="rca-col rca-player">
                      Player Y
                    </div>
                    <div class="rca-col small">
                      6
                    </div>
                    <div class="rca-col small">
                      2
                    </div>
                    <div class="rca-col small">
                      38
                    </div>
                    <div class="rca-col small">
                      2
                    </div>
                    <div class="rca-col small">
                      7.00
                    </div>
                    <div class="rca-col small">
                      3
                    </div>
                  </div>
                </div>
                <div class="rca-row">
                  <div class="rca-table">
                    <div class="rca-col rca-player">
                      Player Y
                    </div>
                    <div class="rca-col small">
                      6
                    </div>
                    <div class="rca-col small">
                      2
                    </div>
                    <div class="rca-col small">
                      38
                    </div>
                    <div class="rca-col small">
                      2
                    </div>
                    <div class="rca-col small">
                      7.00
                    </div>
                    <div class="rca-col small">
                      3
                    </div>
                  </div>
                </div>
                <div class="rca-clear"></div>
              </div>
            </div>
            <div id="tab-42" class="rca-tab-content rca-padding">
            </div>
          </div>

        </div>

        <?php } ?>
        <?php } ?>
    </div>
    </div>
  <script>
    function showTab(event) {
      var sourceParent = event.parentElement.parentElement;
      var sourceChilds = sourceParent.getElementsByClassName("rca-tab-content");
      var sourceLinkParent = sourceParent.getElementsByClassName("rca-tab-link");
      for (var i=0; i < sourceChilds.length; i++) {
        sourceChilds.item(i).classList.remove("active");
      }
      for (var i=0; i < sourceLinkParent.length; i++) {
        sourceLinkParent.item(i).classList.remove("active");
      }
      var dataTab= event.getAttribute("data-tab");

      event.classList.add("active");
      document.getElementById(dataTab).className += ' active';
    }
  </script>
    
  </body>
</html>