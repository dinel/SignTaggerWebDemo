<?php
/* 
 * Copyright 2016 dinel.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
?>

<!DOCTYPE html>

<?php

function processText() {
    $input_text = "";
    if(isset($_POST["input-text"])) {
        $input_text = $_POST["input-text"];
        $fileName = tempnam("/tmp", "SIGNTAGGER");
        $handle = fopen($fileName, "w");
        fwrite($handle, $input_text);
        fclose($handle);
        
        $command = "sh /var/www/html/sign/run.sh " . $fileName;
        
        #$command = "cat out.html";
    
        system($command);    
        unlink($fileName);
    }        
}
?>

<html lang="en">
    <head>
        <title>SIGN tagger demo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        
        <script src="display.js"></script>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="container">
            <div class="row voffset5">
                <div class="col-md-8">
                    <?php
                    processText();
                    ?>
                </div><!-- end text box -->
                
                <div id="selectors" class="col-md-2">
                    <div data-spy="affix">                        
                    <div style="margin-bottom: 0.5em; margin-top: 1em;">Show help <input id="show-help" type="checkbox" data-toggle="toggle"></div>
                    
                    <div id="help-info"><small>
                        To learn more about each class move the mouse on the class label
                        and click the <button type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-question-sign"></span> More info
                        </button> button. Alternatively you can check our annotation guidelines.</small>
                    </div>
                    
                    <div style="clear: both; margin-bottom: 0.5em; margin-top: 1em;">                        
                        <a id="select-all">Select all</a>
                        <a id="select-none" style="margin-left: 5em;">Select none</a>
                    </div>
                        
                    <div style="float:left; width: 32%">
                        <h3>Nominal</h3>
                        <div><input class="filter" type="checkbox" id="chk-CIN" checked="true"> CIN
                            <span id="count-CIN">(0)</span></div>                                        
                        <div><input class="filter" type="checkbox" id="chk-CLN" checked="true"> CLN
                            <span id="count-CLN">(0)</span></div>                                        
                        <div><input class="filter" type="checkbox" id="chk-CMN1" checked="true"> CMN1
                            <span id="count-CMN1">(0)</span></div>                                        
                        <div><input class="filter" type="checkbox" id="chk-CMN2" checked="true"> CMN2
                            <span id="count-CMN2">(0)</span></div>                                        
                        <div><input class="filter" type="checkbox" id="chk-CMN4" checked="true"> CMN4
                            <span id="count-CMN4">(0)</span></div>                                        
                        <div><input class="filter" type="checkbox" id="chk-ESMN" checked="true"> ESMN
                            <span id="count-ESMN">(0)</span></div>                               
                        <div><input class="filter" type="checkbox" id="chk-SSMN" checked="true"> SSMN
                            <span id="count-SSMN">(0)</span></div>                                        
                                                    
                        <h3>Adjectival</h3>                                                                                
                        <div><input class="filter" type="checkbox" id="chk-CLA" checked="true"> CLA
                            <span id="count-CLA">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-CMA1" checked="true"> CMA1
                            <span id="count-CMA1">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-CPA" checked="true"> CPA
                            <span id="count-CPA">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-ESMA" checked="true"> ESMA
                            <span id="count-ESMA">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-SSMA" checked="true"> SSMA
                            <span id="count-SSMA">(0)</span></div>                                                                                
                        <br>
                    </div>                                            
                
                    <div style="float:left; width: 32%;">
                        <h3>Verbal</h3>
                        <div><input class="filter" type="checkbox" id="chk-CCV" checked="true"> CCV
                            <span id="count-CCV">(0)</span></div>                                        
                        <div><input class="filter" type="checkbox" id="chk-CLV" checked="true"> CLV
                            <span id="count-CLV">(0)</span></div>                                        
                        <div><input class="filter" type="checkbox" id="chk-CMV1" checked="true"> CMV1
                            <span id="count-CMV1">(0)</span></div>                                        
                        <div><input class="filter" type="checkbox" id="chk-CMV2" checked="true"> CMV2
                            <span id="count-CMV2">(0)</span></div>                                                                               
                        <div><input class="filter" type="checkbox" id="chk-ESCCV" checked="true"> ESCCV
                            <span id="count-ESCCV">(0)</span></div>                                        
                        <div><input class="filter" type="checkbox" id="chk-ESMV" checked="true"> ESMV
                            <span id="count-ESMV">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-SSCCV" checked="true"> SSCCV
                            <span id="count-SSCCV">(0)</span></div>                            
                        <div><input class="filter" type="checkbox" id="chk-SSMV" checked="true"> SSMV
                            <span id="count-SSMV">(0)</span></div>
                            
                        <h3>Adverbial</h3>
                        <div><input class="filter" type="checkbox" id="chk-CLAdv" checked="true"> CLAdv
                            <span id="count-CLAdv">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-CMAdv" checked="true"> CMAdv
                            <span id="count-CMAdv">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-ESMAdvP" checked="true"> ESMAdvP
                            <span id="count-ESMAdvP">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-SSMAdvP" checked="true"> SSMAdvP
                            <span id="count-SSMAdvP">(0)</span></div>                                                                                
                        <br>
                    </div>
                        
                    <div style="float:left; width: 32%">
                        <h3>Prepositional</h3>
                        <div><input class="filter" type="checkbox" id="chk-CLP" checked="true"> CLP
                            <span id="count-CLP">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-CMP" checked="true"> CMP
                            <span id="count-CMP">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-ESMP" checked="true"> ESMP
                            <span id="count-ESMP">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-SSMP" checked="true"> SSMP
                            <span id="count-SSMP">(0)</span></div>
                            
                        <h3>Other</h3>
                        <div><input class="filter" type="checkbox" id="chk-CLQ" checked="true"> CLQ
                            <span id="count-CLQ">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-COMB" checked="true"> COMB
                            <span id="count-COMB">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-ESCM" checked="true"> ESCM
                            <span id="count-ESCM">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-ESMI" checked="true"> ESMI
                            <span id="count-ESMI">(0)</span></div>


                        <div><input class="filter" type="checkbox" id="chk-SPECIAL" checked="true"> SPECIAL
                            <span id="count-SPECIAL">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-SSCM" checked="true"> SSCM
                            <span id="count-SSCM">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-SSMI" checked="true"> SSMI
                            <span id="count-SSMI">(0)</span></div>
                        <div><input class="filter" type="checkbox" id="chk-STQ" checked="true"> STQ
                            <span id="count-STQ">(0)</span></div>                                                        
                        <br/>
                    </div>    
                                                                        
                    </div>
                </div>
            </div>
        </div>
        <div id="help-messages" class="navbar navbar-fixed-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <button id="close-help-area" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div id="context-help">
                            <?php
                                include_once 'help-signs.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

