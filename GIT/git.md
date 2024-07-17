# Git

## Config 

`git config --global user.name "[firstname] [lastname]"` Set author name

`git config --global user.email "[valid email]"` Set author email

## Init

`git init` Init new repository

`git clone [url]` Retrieve repository

## Stage & snapshot

`git add [file]` - Stage file \
`git reset [file]` - Unstage file, keep changes in working directory \
`git status` - See staged files in working directory

`git diff` - See what is changed but not staged \
`git diff --staged` - See what is staged but not committed

`git commit -m [message]` - Commit staged content with message \
`git commit --amend` - Change last commit's message on nano \
`git commit --amend -m [message]` - Change last commit's message \
`git reset --soft HEAD~1` - Uncommit last commit

`git mv [existing-path] [new-path]` - Move file and stage the move \
`git rm [file]` - Remove file and stage the removal

## Branch and merge

`git branch` - List branches, * next to active branch \
`git branch [name]` - Create new branch \
`git branch -m [name]` - Rename current branch \
`git branch -m [branch] [new name]` - Rename branch

`git checkout` - Switch to another branch and check out in working directory \
`git checkout -b [name]` - Create and chekout new branch

`git merge [branch]` - Merge specified branch's history into current one \
`git rebase [branch]` - Apply commits of current branch ahead of specified one

## Inspect and compare

Show current branch's commit history \
`git log` - All entries \
`git log -[n]` - N entries \
`git log --since=[date] --until=[date]` - Since and until date \
`git log --author=[author] --grep=[regex]` - By author, message matching regex (--all-match, --invert-grep) \
`git log --follow [file]` - Show commits that changed a specific file \
`git log --stat` - More detailed info \
`git log --stat -M` - More info with path change indications \
`git log --all --decorate --oneline --graph` - Useful log format
`git log branchB..branchA` - Show commits on branch A that are not on branch B 

`git diff branchB..branchA` - See the diff of what is in branch A that is not in branch B

`git reflog` - Show history of changes made to your repo's HEAD pointer

`git show [SHA]` - Show any object in human readable format