<?php // creation of session 
session_start();
$_SESSION['value']=1;
?>
<!-- Designing of the index page --!>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
        <title>Anagram Finder</title>
    </head>
    <body>
        <div id="header">
            ANAGRAM FINDER
        </div>
        <br>
        <hr />
        <br>
        <br>
        <div id="main_container">
        <table id="table1" width="100%" border="1">
            <tr>
                <td width="30%">
                            <div id="leftpane">
            <P id="ul_head">Rules for Giving Input</p>
             
             
                 
                    The input must only be alphabets<br>
                 
                 
                    The input must atleast by 3 characters long<br>
                 
                 
                 
                    The input can be maximum of 15 characters<br>
                 
                     
                 
                    The input must contain atleast one vowel<br>
                 
                 
                    The input may contain repetition of letters<br>
                     
        </div>                    
                </td>
                <td>
                    <div id="content">
                        <P id="ul_head">Enter the input word and hit generate</p>
                        <form action="result.php" method="post">
                        <input type="text" name="word" maxlength="15" class="tbox">
                        <p class="error"></p>
                        <br><br>
                        <input type="submit" name="submit" value="Generate Now" id="submit">
                         
                        </form>           
                        <br><br>
                    </div>        
                </td>
            </tr>
        </table>
        </div>
        <script type="text/javascript" src="jquery.js"></script>  <!-- Inclusion of JQuery Library --!>
        <script type="text/javascript" src="validate.js"></script>  <!-- Validating user input using jquery --!>
    </body>
</html>
