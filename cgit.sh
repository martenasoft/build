#!/bin/bash
declare -a dirs
COM=$@

pathToProject=~/public_html/m_site

cd "${pathToProject}"

eval $COM

cd "${pathToProject}/martenasoft"

i=1

for f in *;
do
  if [ -d "$f" ]; then
    dirs[i++]="$f"
  fi
done

for dir in "${dirs[@]}"
do
  cd "${pathToProject}/martenasoft/${dir}"
  pwd
  eval $COM
done
