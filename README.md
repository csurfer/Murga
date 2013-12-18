# Skienopedia #

An experimental project with a goal to paraphrase and re-write entire English Wikipedia in a better and concise way.

[Software Setup](#software-setup)

[Software Execution](#software-execution)

## Software Setup ##

Install [python](http://www.python.org/), [numPy](http://www.numpy.org/), [sciPy](http://www.scipy.org/) and [nltk](http://nltk.org/) packages.


Download the software repository from [link](https://bitbucket.org/vbsharma/skienopedia) using **git clone** command as 
```
#!bash

git clone https://vbsharma@bitbucket.org/vbsharma/skienopedia.git
```


Download the resources folder needed for the software to run. You can either use the zip included in the repository or have your own repository folder structured in the following format.

![resource folder structure](http://i.imgur.com/FXF4mXt.jpg)


The **resource/lm/<language>/** folder should have the following files : One vocabfile, 2 bias vector files, 2 weight vector files, one E vector file all in pickled format and named as shown in the above image. The preKNN.txt is a text file generated using the [precompute.py](https://bitbucket.org/vbsharma/skienopedia/src/37cfa3ffbaee27250d5748c698b461bfa8286653/precompute.py?at=master) file to increase the speed of paraphrasing.

## Software Execution ##

This section explains how we can use the software to paraphrase sentences or texts at run time.

### bpython ###

With default values :

```
#!python

from paraphrase import *
paraphrase("I love the house that I live in, it has blue walls and green gates.")
```

The paraphrase function has following parameters :

```
#!python

paraphrase(text, lang, topN, error, window, model)
```

Here

* **topN** is a qualifier which tells the paraphraser that the contender for replacing a word should be chosen from topN nearest neighbors with respect to knn distance in the given vocabulary. For now topN can take any value between 2-10.

* **error** is a qualifier which tells the paraphraser the error margin acceptable in the score of replacement, i.e if the score of the current word is x then the score of the replacement word should be between x-error to x+error.

* **window** is a qualifier which tells the paraphraser the window length it should consider while replacing the words, trying to force replacement of one word in the window. 

So the paraphrase command can be used with parameters as

```
#!python

from paraphrase import *
paraphrase("I love the house that I live in.", topN=10, error=0.2, window=5)
```

### iPyton notebook ###

Open the .ipynb file from the repository on your ipython notebook server and use the paraphrase command as
```
#!python

paraphrase("I love the house that I live in, it has blue walls and green gates.")
# or with parameters as
paraphrase("I love the house that I live in.", topN=10, error=0.2, window=5)
```
