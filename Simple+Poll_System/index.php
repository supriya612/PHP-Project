<?php

session_start();


$poll_options=[
    "GulabJamun" => 0,
    "RasMalai" => 0,
    "Jalebi" => 0,
    "KajuKatli" => 0
];

$vote_file='votes.txt';

if(file_exists($vote_file))
{
    $votes=json_decode(file_get_contents($vote_file),true);

    if($votes)
    {
        $poll_options=array_merge($poll_options,$votes);
    }
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['vote']))
    {
        $vote=$_POST['vote'];

        if(array_key_exists($vote,$poll_options))
        {
            $poll_options[$vote]++;

            file_put_contents($vote_file,json_encode($poll_options));
        }
    }
}

include 'poll_form.php'; 
include 'poll_results.php';
?>

