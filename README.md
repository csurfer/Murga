Musical Organiser or in short Murga is a php script which sorts out the mp3 files as originals and copies depending upon their Id3v1 tags. This file was created in times when people used to have a lot of downloaded music content as `.mp3` files on their disks and needed some sort of organization.

### How to use with WindowsPC ?

* Download `Id3.php` and `fileOrg.php` files from the repository.
* Open the `fileOrg.php` using a text editor of your choice and go to line `$source = "";`.
* Fill the path to your root directory in these quotes.
** Root directory is a folder from which the script should start searching for mp3 files recursively in its subfolders. If you store your songs in `D:/Entertainment/Music` folder give the source path as `D://Entertainment//Music`
* Follow these rules while specifying the root folder 
** Replace / in the path with //.
** Path should end with a folder name and not //.
* Go to line `$dest = "";`
* Fill the path where you want to sort it and back it up to within these quotes. If you want to store the sorted backup in `E:/Sorted` folder give the dest path as `E://Sorted`. Follow the same rules that you followed for source folder.
* Save and run this php script in your localhost.

### What to expect ?

You will have a sorted copy of the entire contents of the source folder that you gave in the destination path with the directory structure maintained exactly the same.

```
Sorted contents will be in folder : MusicOrganiser
Originals will be in : MusicOrganiser/Originals
Copies will be in : MusicOrganiser/Copies
```

Apart from all this you will also get a statistics on how many files were checked for and how many are originals and copies.

### Why use it ?

* It saves your time of organising your mp3 files.
* As it copies and creates a backup of your data else where (Destination path) you dont have to worry about loosing any data due to the script.

### Bugs and other queries 
For reporting any bugs or other related queries please visit www.csurfer.in
