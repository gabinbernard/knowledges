# Add date and time to bash history
HISTTIMEFORMAT="%F %T "

# Ignore duplicates in history
HISTCONTROL=ignoredups

# Set active history number of lines and bash history size
HISTSIZE=1000
HISTFILESIZE=5000

# Causes bash to append to history instead of overwriting it so if you start a new terminal, you have old session history
shopt -s histappend
PROMPT_COMMAND='history -a'

# Ignore case on auto-completion
# Note: bind used instead of sticking these in .inputrc
if [[ $iatest > 0 ]]; then bind "set completion-ignore-case on"; fi

# Show auto-completion list automatically, without double tab
if [[ $iatest > 0 ]]; then bind "set show-all-if-ambiguous On"; fi

# Use vim commands in cli
set -o vi

# Useful aliases
alias mkdir='mkdir -p'
alias home='cd ~'
alias bd='cd "$OLDPWD"'
alias ..='cd ..'
alias ...='cd ../..'
alias ....='cd ../../..'
alias .....='cd ../../../..'
alias ls='ls -XBhF --color=auto'
alias ll='ls -lXBhF --color=auto'
alias tree='tree --dirsfirst -F'
alias treed='tree -CAFd'

# Colors
blk='\[\033[01;30m\]'   # Black
red='\[\033[01;31m\]'   # Red
grn='\[\033[01;32m\]'   # Green
ylw='\[\033[01;33m\]'   # Yellow
blu='\[\033[01;34m\]'   # Blue
pur='\[\033[01;35m\]'   # Purple
cyn='\[\033[01;36m\]'   # Cyan
wht='\[\033[01;37m\]'   # White
clr='\[\033[00m\]'      # Reset

# ls and tree colors
export LS_COLORS="di=1;31:*=1;33"

# Display the current Git branch in the Bash prompt.
function git_branch() {
    if [ -d .git ] ; then
        printf "\033[01;30m(\033[01;31m%s\033[01;30m) " "$(git branch 2> /dev/null | awk '/\*/{print $2}')";
    fi
}

# Prompt format
PS1=${blk}'-------------------------------------------------
${debian_chroot:+($debian_chroot)}'${blk}'>>> '${blk}'@'${red}'\u '${ylw}'\w '${red}'$(git_branch)'${blk}"$ "${clr}