<!----------------------------------------------------------------------------
Author			: Vishwas B Sharma
Website			: http://www.csurfer.in 
Script name		: "Mu"sical "Orga"niser in short Murga
Description		: Organises the mp3 files by separating originals with copies
Licence			: Released under GNU General Public License 2
Copyright Vishwas B Sharma
------------------------------------------------------------------------------>

<?php
	/* Things to know for path names for source and destination : 
	1) Replace \ in the path with \\.
	2) Path should end with a folder name and not \\.
	3) Example : C:\\Users\\xyz\\Desktop\\Music    or    D: */
	
	/* The path of the root folder from where you want to start the search for mp3 files from. */
	$source = ""; 
	
	/* The destination path where you want the organised music folder to appear.*/
	$dest = ""; 
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	/* Working code begins here */

	/* Enable or Disable Logs */
	$log = false;
	
	if($source == '' || $dest == '')
	{
		echo "Please fill in Source and Destination folders";
		die;
	}
	
	$list[] = $source;
	$cut = strlen($list[0]);
	$keys[] = "";
	$os = 0; /* Original file count */
	$cs = 0; /* Copy file count */
	$ind = 0;
	$lim = 0;

	/* Destination folders into which the files are copied */
	$base = $dest."\\MusicOrganisor"; /* Place where all the files are organised */
	$orig = $base."\\Originals"; /* All the originals are placed here */
	$copy = $base."\\Copies"; /* All the copies are placed here */

	/* Create the folders */
	if(!file_exists($base))
	{
		if(!mkdir($base))
		{
			if($log) echo "Error : Directory not created";
		}
		else
		{
			if($log) echo "Success : Directory created";
		}
	}

	if(!file_exists($orig))
	{
		if(!mkdir($orig))
		{
			if($log) echo "Error : Directory not created";
		}
		else
		{
			if($log) echo "Success : Directory created";
		}
	}

	if(!file_exists($copy))
	{
		if(!mkdir($copy))
		{
			if($log) echo "Error : Directory not created";
		}
		else
		{
			if($log) echo "Success : Directory created";
		}
	}

	/* Classes to read Id3  version tags in mp3 files */
	include 'Id3.php';
	include 'Id3v2.php';
	$i1 = new Id3;

	/* Code to read the folders recursively */
	while($ind <= $lim)
	{
		$main_dir = $list[$ind];
		$ind++;
		
		$dirs = scandir($main_dir);
		if($log) echo "<br/>Traversing $main_dir: <br/><br/>";
		foreach($dirs as $file)
		{
			if($file === "." || $file === "..") continue;
			else if(is_dir($main_dir."\\".$file))
			{
				if($log) echo $main_dir."\\".$file." is a directory.<br/>";
				$list[] = $main_dir."\\".$file;
				$lim++;
			}
			else if(preg_match("/.mp3/",$file)) /* To search for Mp3 files */
			{
				if($log) echo $main_dir."\\".$file." is a file.<br/>";
				
				$res = $i1->read($main_dir."\\".$file);
				$hash = md5($res["title"].$res["artist"].$res["album"].$res["year"]);
				if($log) echo "File : $main_dir\\$file Hash : $hash<br/>";
				
				/* Copy the files into their proper places */
				if(in_array($hash,$keys))
				{
					$cs++;
					if(substr($main_dir,$cut) != false)
					{
						$way = substr($main_dir,$cut);
						$path = $copy.$way;
						$temp = $copy;
						$pieces = explode("\\",substr($way,1));
						foreach($pieces as $pie)
						{
							$temp = $temp."\\".$pie;
							if(!file_exists($temp))
							{
								if(!mkdir($temp))
									echo "Error : Couldnt create directory.<br/>";
							}
						}
					}
					else
					{
						$path = $copy;
					}
					if($log) echo "Copied : Copy ".$main_dir."\\".$file." to ".$path."\\".$file."<br/>";
				}
				else
				{
					$os++;
					$keys[] = $hash;
					if(substr($main_dir,$cut) != false)
					{
						$way = substr($main_dir,$cut);
						$path = $orig.$way;
						$temp = $orig;
						$pieces = explode("\\",substr($way,1));
						foreach($pieces as $pie)
						{
							$temp = $temp."\\".$pie;
							if(!file_exists($temp))
							{
								if(!mkdir($temp))
									echo "Error : Couldnt create directory.<br/>";
							}
						}
					}
					else
					{
						$path = $orig;
					}
					if($log) echo "Original : Copy ".$main_dir."\\".$file." to ".$path."\\".$file."<br/>";
				}
				copy($main_dir."\\".$file,$path."\\".$file);
			}
		}
	}
	$tot = $os + $cs;
	echo "<br/><br/><table style='border:2px solid'><tr><td>Process Overview</td></tr><tr><td>Number of files parsed &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$tot</td></tr><tr><td>Number of Originals</td><td>$os</td></tr><tr><td>Number of Copies</td><td>$cs</td></tr></table>";
	/* Working code ends here */
?>