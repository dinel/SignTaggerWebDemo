<!DOCTYPE html>

<html lang="en">
    <head>
        <title>SIGN tagger demo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="container">            
            <div class="row voffset5">
                <div class="col-md-8">
                    <div style="width:100%; text-align: justify;">
                        This demo implements the machine learning method for sign 
                        tagging presented in 
                        <a href="http://rgcl.wlv.ac.uk/papers/show_paper.php?ID=459442">
                            Dornescu et al., (2013)</a>. The program classifies 
                        signs of syntactic complexity in accordance with the scheme 
                        described in <a href="http://rgcl.wlv.ac.uk/papers/show_paper.php?ID=459443">
                            Evans and Orasan (2013)</a>. In this setting, signs 
                        of syntactic complexity are a predefined set of conjunctions, 
                        relative pronouns, and punctuation marks. Class labels applied 
                        by the sign tagger indicate the specific syntactic linking and 
                        bounding functions of the different signs. There are three 
                        broad groups of class labels: coordinators, left boundaries 
                        of subordinate clauses, and right boundaries of subordinate 
                        clauses. The interface to the demo provides more details about 
                        each sub-class of the three main classes.
                    </div>
                    <form class="voffset5" method="POST" action="process.php">
                        <textarea style="width: 100%" name="input-text" rows="15"></textarea><br/>
                        <input type="submit" value="Process text">
                    </form>
                    
                    <div style="clear: both; padding-top: 2em; padding-bottom: 1em;"><small>
                        Found a problem or want to suggest a feature? Visit the
                        <a href="https://github.com/dinel/SignTaggerWebDemo">Sign Tagger Web Demo</a> and 
                        <a href="https://github.com/dinel/SignTagger">Sign Tagger</a> github repositories.<br/><br/>
                        
                        <?php
                            include_once 'local_branding.php';
                        ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
