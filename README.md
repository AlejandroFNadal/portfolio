# Personal Website
Basic webpage for my personal portfolio, just HTML, CSS, JS, PHP in a traditional environment. Modified from an existing template called Kards. It can be found here: https://www.styleshout.com/free-templates/kards/

## Continous delivery pipeline

This website is hosted in a cheap website hosting provider. I cannot SSH into the Linux machine that is hosting this webpage. The only means to upload stuff to it is using FTPS (FTP + TLS). I have setup a continous delivery pipeline in CircleCi that uploads the content of the repository to the hosting provider. 

To do this, I have set up my own script that generates another script listing all the contents of the repository and then runs this script. The script generator code can be found here: https://github.com/AlejandroFNadal/portfolio/blob/main/deploy_commands/deploy.sh . The following image shows a very simple diagram of the CD pipeline. 

<p align="center">
  <img alt="CD pipeline diagram" src="https://user-images.githubusercontent.com/32724827/194753004-888e0bb1-e0e5-4823-b1ad-daa6a28f1d85.png"</img>
</p>

Pipeline status: [![CircleCI](https://circleci.com/gh/circleci/circleci-docs.svg?style=shield)](https://circleci.com/gh/AlejandroFNadal/portfolio)


### Possible improvements
Right now the software is reuploading everything. I don't mind the internet transfer amounts because the website itself is small. But if in the future it increases in size, I will need to make sure only the changed files are updated. I could use git itself to do this, to get the files that have changed since the last commit to main. There are a few alternatives as well, such as git-ftp, that do it in this way too.


