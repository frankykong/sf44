# Git 知识

-------------------------------------安装---------------------------------------------\
the requested url returned error: 401 unauthorized while accessing https:

https://git.oschina.net/frankykong/kdek.com.git

wget -O /etc/yum.repos.d/PUIAS_6_computational.repo https://gitlab.com/gitlab-org/gitlab-recipes/raw/master/install/centos/PUIAS_6_computational.repo
wget -O /etc/pki/rpm-gpg/RPM-GPG-KEY-puias http://springdale.math.ias.edu/data/puias/6/x86_64/os/RPM-GPG-KEY-puias && rpm --import /etc/pki/rpm-gpg/RPM-GPG-KEY-puias
rpm -qa gpg*
yum repolist
yum --enablerepo=PUIAS_6_computational install git

out of menory, malloc failed (tried to allocate bpytes) fatal: index-oack failed


##全局参数设置
git config --global --list
git config --global pack.windowMemory "15m"
git config --global pack.SizeLimit "3m"
git config --global pack.threads "1"
git config --global --unset http.postbuffer
git config --global pack.deltaCacheSize "128m"
git config --global pack.packSizeLimit "128m"
git config --global pack.windowMemory "128m"
git config --global pack.packedGitLimit "128m"
git config --global pack.packedGitWindowSize "128m"


------------------------------------初始化----------------------------------------------

##初始化工程，生成.git文件夹
git init
git remote add origin https://gitee.com/frankykong/cocoedu.git
git add --all
##先pull 下来 再push 上去，推送工程到master分支下
git pull origin master
git push origin master


##指定所需的文件来进行追踪
git add *
git commit -m 'initial project version'

##克隆现有的仓库 <自定义本地仓库的名字>
git clone [url] <direct-name>
git clone https://gitee.com/frankykong/cocoedu.git cocoedu

##添加一个新的远程 Git 仓库
git remote add [remote-name] [url]
git remote add origin https://git.oschina.net/frankykong/kdek.com.git
##查看某个远程仓库
git remote show [remote-name]
git remote show origin
##重命名远程仓库的名字
git remote rename [remote-name] [new-remote-name]
git remote rename origin tingkt
##移除一个远程仓库
git remote rm [remote-name]
git remote rm origin
##重设远程仓库链接
git remote set-url [remote-name] [url]
##添加/删除远程仓库链接
git remote set-url <--add/delete> [remote-name] [url]

##检查当前文件状态
git status <-s>紧凑型
##查看尚未暂存的文件更新了哪些部分
git diff
##查看日志——显示最近两次提交所引入的差异（常用）
git log <FETCH_HEAD>特定 <-p>差异 <-2>次数 <--stat>总结 <--pretty=oneline>一行显示 <--graph>地图显示
##--pretty 其他参数 ：short，full，fuller，format
--pretty=format:"%h - %an, %ar : %s"

## 简化显示
git log --pretty="%cn committed %h on %cd"

git log --no-merges origin/master
git log --no-merges origin/master ^Frank
##查看各个分支当前所指的对象
git log --oneline --decorate

## 查看回滚前的版本
git reflog


##从远程仓库中获得数据——它并不会自动合并或修改你当前的工作
git fetch [remote-name] <branch-name>
git fetch origin master
git merge origin/master
git push origin master
##在本地新建一个pu分支并从远程仓库中获得pu分支的数据
git fetch origin +pu:pu

##从远程仓库中获得数据并合并到本地分支
git pull [remote-name] [branch-name]
git pull origin master

##推送项目时
git push [remote-name] [branch-name]
git push origin master



##跳过使用暂存区域提交更新, 这个方法有时候会把不想提交的文件都一起添加了，但是问题不大操作还比较方便。如果不加 -a 就要在弹出的编辑器里面一个个文件进行设置；
git commit -am 'added a new footer [issue 53]'

##重新提交，第二次提交将代替第一次提交的结果
git commit --amend

##取消暂存的文件
git reset HEAD <file>...

##从工作目录中手工删除文件
git rm readme.txt

##把文件从 Git 仓库中删除（亦即从暂存区域移除），但仍然希望保留在当前工作目录中。
git rm --cached readme.txt

##此命令删除 log/ 目录下扩展名为 .log 的所有文件
git rm log/\*.log

##对文件改名
git mv file_from file_to

# ---------------------分支操作-----------------------

### 在 Git 中整合来自不同分支的修改主要有两种方法：merge 以及 rebase。

#### 在远程版本库创建了一个分支后，在本地可以使用
git remote update
## 删除本地版本库上那些失效的远程追踪分支
git remote prune origin

## 新建一个 testing 分支:
git branch testing
## 换到新建的 testing 分支:
git checkout testing
## 要新建并切换到该分支:
git checkout -b frank

## 切换到master分支:
git checkout master
## 如果想要一份自己的 rextest 来开发，可以在远程分支的基础上分化出一个新的分支来：
git checkout -b rextest origin/rextest

## 删除本地分支:
git branch -d [branch-name]
## 删除远程分支，删除后还需推送到服务器
git branch -d -r [branch-name]
## 删除后推送至服务器
git push origin:[branchname]
## 重命名本地分支
git branch -m [oldbranch] [newbranch]
## 重命名远程分支：1、删除远程待修改分支 2、push本地新分支到远程服务器

## 查看所有分支，本地和远程
git branch -a
## 查看远程所有分支
git branch -r
## 查看本地分支
git branch
## 查看各个分支最后一个提交对象的信息:
git branch -v
## 更详细信息:
git branch -vv
## 查看哪些分支已被并入当前分支:
git branch --merged
## 查看尚未合并的工作：
git branch --no-merged

## 覆盖分支:假如现在处在master分支，然后直接用远程的代码覆盖掉本地的master
git reset --hard origin/frank
## 覆盖本地分支
git reset --hard frank
## 合并分支
git merge [branch-name]

## 变基! 你可以使用rebase命令将提交到某一分支上的所有修改都移至另一分支上，就好像“重新播放”一样。
## 好处是分支程一条线，比直接用merge少了一个多余版本，更加简洁。
git rebase [branch-name]
git checkout dev
git rebase master
git checkout master
git merge dev

## 发布到生产服务器 git push (远程仓库名) (分支名)：
git push origin frank


#### 强制合并，前提是，被合并的分支代码不再需要，且不是最新
## 方法一
git push origin dev:master -f //将 develop分支强制推送合并至master

## 方法二
git checkout master //切换分支至master分支
git reset --hard dev //并将master分支重置为dev
git push origin master -force //将重置后的master分支强制推送更新

## 如果想在服务器上删除 serverfix 分支:
git push origin :serverfix

##将本地的状态回退到和远程的一样
git reset --hard origin/master

##列出标签
git tag
##创建标签
$ git tag -a v1.4 -m "my version 1.4"
##共享标签像共享远程分支一样运行
git push origin [tagname]。

## git 回滚代码版本的几种方式
git reset --hard resetVersionHash 退到/进到，指定commit的哈希码（这次提交之前或之后的提交都会回滚）

## 使用 “ ^ ” ，“ ~ ”符号，缺点：只能实现版本的后退操作
## 由当前版本向后退一个版本
git reset --hard HEAD^
## 由当前版本向后退三个版本
git reset --hard HEAD^^^

## 由当前版本向后退一个版本
git reset --hard HEAD~

## 由当前版本向后退三个版本
git reset --hard HEAD~3

## 删除 untracked files
git clean -f

## 连 untracked 的目录也一起删掉
git clean -fd

## merge 后发现冲突 回滚特定的文件
git checkout [hash] [filePath]

