<?php 
    require_once('connect.php'); //connect to the database
    session_start(); //start the session 
     
?>
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
        <div id="result">
         
         
<?php
 
if(isset($_SESSION['value']))
{
$word=strtolower($_POST['word']); // get the input word
$len=strlen($word);
$alpha = array(
"a" => 0,
"b" => 1,
"c" => 2,
"d" => 3,
"e" => 4,
"f" => 5,
"g" => 6,
"h" => 7,
"i" => 8,
"j" => 9,
"k" => 10,
"l" => 11,
"m" => 12,
"n" => 13,
"o" => 14,
"p" => 15,
"q" => 16,
"r" => 17,
"s" => 18,
"t" => 19,
"u" => 20,
"v" => 21,
"w" => 22,
"x" => 23,
"y" => 24,
"z" => 25
); // An array which holds the character value
 
 
function generate($input_word,$array,&$num)
{
    $len_input_word = strlen($input_word);
    for( $i=0 ; $i<$len_input_word ; $i++) //run the loop till wordlength
    {
        $array_index = $array[$input_word[$i]]; //compare with alpha array and find the index of the letter
        $num[$array_index] = $num[$array_index] + 1; // store the index value in $num array
    }
 
    return $num;
}
 
 
 
$result = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); //output array
$result=generate($word,$alpha,$result); //passing arrays to function 
$input_bin=implode("",$result); //now, $input_bin contains the input string in numbers format
$result = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); // re-initialize the array 
$init=array();
for($i=0;$i<$len;$i++)
{
    array_push($init,$alpha[$word[$i]]); //create number format for input word and store it in init array
}
 
$init_str=implode($init,','); // create a string by imploding array with comma as parameter
$extract=array();
$query= mysql_query("select id,word,bin from anagram where len<=$len and init in ($init_str) and last in ($init_str) order by len");
// query to fetch words from db which has the length less than or equal to our input word
while($row=mysql_fetch_assoc($query))
{
    $db_id=$row['id'];
    $db_title=$row['word'];
    $db_bin=$row['bin'];
    $count=0;
    for($i=0;$i<26;$i++)
    {
        if($db_bin[$i]<=$input_bin[$i])
        {
          //if the value of db word is less than or equal to value of input word increase the count
            $count++;
        }
        else
        {
          // even if one condition fails, break the loop
            break;
        }
    }
     
    if($count==26)
    {
       // if all the letters meets the condition , it is an anagram
        $extract[]=$db_title; //store the word in output array
    }
}
 
 
?>
 
 
<?php //printing array in table format if(count($extract)) { ?>
<table id="output_table">
<th><a href='index.php'>Try Again</a></th>
<?php for($i = 0; $i < count($extract); ++$i) { ?>
<?php if(!$i) { ?>
  <tr>
<?php } else if(!($i %10)) { ?>
  </tr>
  <tr>
<?php } ?>
    <td><?php echo $extract[$i]; ?></td>
<?php } ?>
  </tr>
</table>
<?php }
else
{
//if input word has no combinations
    echo '
    <table id="output_table">
    <th><a href="index.php">Try Again</a></th>
    <tr><td> No Combinations Found For The Given Input </td></tr>
    <table>
    ';
     
}
 
mysql_close($con); //close db connection
 
}
 ?>
 
</div>
                 
    </body>
</html>
 
<?php
session_destroy(); //destroy the session 
?>
 
<?php
if(!isset($_SESSION['value']))
{
//handle if session is not set
    echo '
    <table id="output_table">
    <th><a href="index.php">Go Back</a></th>
    <table>
    ';
}
 
?>
