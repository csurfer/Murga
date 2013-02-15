<!----------------------------------------------------------------------------
Author			: Vishwas B Sharma
Website			: http://www.csurfer.in 
Script name		: "Mu"sical "Orga"niser in short Murga
Description		: Organises the mp3 files by separating originals with copies
Licence			: Released under GNU General Public License 2
Copyright Vishwas B Sharma
------------------------------------------------------------------------------>

	Musical Organiser or in short Murga is a php script which sorts out the mp3 files
as originals and copies depending upon their Id3v1 tags.

How to use ?

1) Download Id3.php and fileOrg.php files.
2) Open the fileOrg.php using a text editor of your choice.
3) Go to line $source = "";
4) Fill the path to your root directory in these quotes.
	* Root directory is a folder from which the script should start searching for mp3 files
	recursively in its subfolders.
	* If you store your songs in "D:/Entertainment/Music" folder give the source path as
	  "D://Entertainment//Music"
	*Follow these rules :
		->Replace \ in the path with \\.
		->Path should end with a folder name and not \\.
5) Go to line $dest = "";
6) Fill the path where you want to sort it and back it up to within these quotes.
	* If you want to store the sorted backup in "E:/Sorted" folder give the dest path as
	  "E://Sorted"
	*Follow these rules :
		->Replace \ in the path with \\.
		->Path should end with a folder name and not \\.
7) Save and run this php script in your localhost.

Outcome :

You will have a sorted copy of the entire contents of the source folder that you gave in 
the destination path with the directory structure maintained ecaxtly the same.
Sorted contents will be in folder : MusicOrganiser
Originals will be in : MusicOrganiser/Originals
Copies will be in : MusicOrganiser/Copies

Apart from all this you will also get a statistics on how many files were checked for and 
how many are originals and copies.

Benefit :

1) It saves your time of organising your mp3 files.
2) As it copies and creates a backup of your data else where (Destination path) you dont have 
to worry about loosing any data due to the script.

Bugs and other queries : 
For reporting any bugs or other related queries please visit www.csurfer.in
