<!DOCTYPE html>
<html lang="en">
<head>
<title>CS148 Assignment 4.0</title>
<meta charset="utf-8">
<meta name="author" content="Aaron Brunet">
<meta name="description" content="Data Dictionary for CS148 Assignment 4">


<!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
<![endif]-->
    
<style>
table, th, td {
    border: 1px solid black;
    text-align: center;
}
th.tname {
    background-color: orange;
    text-align: left;
}
</style>

</head>


<?php

$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
$path_parts = pathinfo($phpSelf);
print '<body id="' . $path_parts['filename'] . '">';

?>

<table style="width:50%">
    <tr>
        <th><i>field</i></th>
        <th><i>datatype</i></th>
        <th><i>description</i></th>
    </tr>
    
    <tr><th colspan="3" class="tname"><b>tblUser</b></th></tr>
    <tr><td>pmkUserId<td>int<td>Unique user ID</tr>
    <tr><td>fldUserName<td>varchar(20)<td>Unique user name</tr>
    <tr><td>fldPassword<td>varchar(20)<td>Valid user password</tr>
    
    <tr><th colspan="3" class="tname"><b>tblSong</b></th></tr>
    <tr><td>pmkSongId<td>int<td>Unique song ID</tr>
    <tr><td>fldSongName<td>varchar(50)<td>Song name</tr>
    <tr><td>fldSongLink<td>varchar(100)<td>Unique url path of song file</tr>
    <tr><td>fldTagList<td>varchar(50)<td>List of #tags associated with the song</tr>
    <tr><td>fldSongDescription<td>varchar(300)<td>Song description</tr>
    <tr><td>fldListenCount<td>int<td>Number of plays this song has had</tr>
    <tr><td>fldLikeCount<td>int<td>Number of likes this song has</tr>
    <tr><td>fnkArtistId<td>int<td>ID of song uploader</tr>
    
    <tr><th colspan="3" class="tname"><b>tblArtist</b></th></tr>
    <tr><td>pmkArtistId<td>int<td>Unique artist ID (distinct from User ID)</tr>
    <tr><td>fnkUserId<td>int<td>User ID of artist</tr>
    <tr><td>fldArtistName<td>varchar(30)<td>Unique name of artist</tr>
    <tr><td>fldArtistDescription<td>varchar(300)<td>Description of artist</tr>
    <tr><td>fldFollowCount<td>int<td>Count of user follows</tr>
    
    <tr><th colspan="3" class="tname"><b>tblFollows</b></th></tr>
    <tr><td>fnkUserId<td>int<td>User ID of artist</tr>
    <tr><td>fnkArtistId<td>int<td>Artist ID of user</tr>
    
    <tr><th colspan="3" class="tname"><b>tblLikes</b></th></tr>
    <tr><td>fnkSongId<td>int<td>Unique ID of song</tr>
    <tr><td>fnkUserId<td>int<td>Unique ID of user who likes song</tr>
    
    <tr><th colspan="3" class="tname"><b>tblPlaylists</b></th></tr>
    <tr><td>fnkUserId<td>int<td>Unique ID of user who creates playlist</tr>
    <tr><td>fnkSongId<td>int<td>Unique ID of song in playlist</tr>
    <tr><td>pmkPlaylistId<td>int<td>Unique ID of playlist</tr>
    <tr><td>fldPlaylistName<td>varchar(50)<td>Playlist name</tr>
    <tr><td>fldTagList<td>varchar(50)<td>List of #tags associated with the playlist</tr>
    <tr><td>fldPlaylistDescription<td>varchar(300)<td>Description of playlist</tr>
</table>
    

</body>
</html>
