create table tblUser ( pmkUserId int primary key auto_increment, 
						fldUserName varchar(20), 
						fldPassword varchar(20));
create table tblSong ( pmkSongId int primary key auto_increment, 
						fldSongName varchar(50), 
						fldSongLink varchar(100), 
						fldTagList varchar(50), 
						fldSongDescription varchar(300), 
						fldListenCount int, 
						fldLikeCount int,
						fnkArtistId int references tblArtist(pmkArtistId));
create table tblArtist ( pmkArtistId int primary key auto_increment,
						  fnkUserId int references tblUser(pmkUserId),
						  fldArtistName varchar(30),
						  fldArtistDescription varchar(300),
						  fldFollowCount int); 
						  /*The syntax for the FollowCount would count the number 
						  of following users for a distinct artist on a join of 
						  tblArtist and tblUser on tblFollows*/ 
create table tblFollows ( fnkUserId int references tblUser(pmkUserId),
							fnkArtistId int references tblArtist(pmkArtistId));
create table tblLikes ( fnkUserId int references tblUser(pmkUserId),
							fnkSongId int references tblSong(pmkSongId));
create table tblPlaylists ( fnkUserId int references tblUser(pmkUserId),
							 fnkSongId int references tblSong(pmkSongId),
							 pmkPlaylistId in primary key auto_increment,
							 fldPlaylistName varchar(50),
							 fldTagList varchar(50),
							 fldPlaylistDescription varchar(300));
						 
 
						
						