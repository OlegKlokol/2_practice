<?php
$apiKey = "AIzaSyDzwySvKRx5a9SVZGHO91ag7k7o-JQaWqE";
$cx = "53ad2738ccbb1402b";
$search = "Translator" ;
if (isset($_GET['search'])){
    $search = $_GET['search'];
}
$url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$cx}&q={$search}";
$ch = curl_init ( ) ;
curl_setopt ($ch , CURLOPT_URL , $url );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resultJson = curl_exec ($ch );
curl_close ($ch );
$arr = json_decode($resultJson, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>My Browser</h2>
<form method="GET" action="/index.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
</form >
<?php
foreach ($arr ['items'] as $item) {
    echo '<p>'.$item['title'] . '</p>' ;
    echo "<a href='{$item['link']}'>".$item['link'] . '</a>';
}
?>
</body>
</html>