echo "Environment Variables"
export swserver="http://localhost:8888"

echo "Clear logs"
rm log/*

echo "Example API Calls"
./output/Example.sh

echo "Preparing example document"
for GROUP in server svg regex user
  do
    jq -r '.[] | if has("group") and (.group)=="'$GROUP'" then "# Group '$GROUP'\n\(.text)" else "" end' < ../Example.json | grep -v '^$' >> output/Example.md
    echo "" >> output/Example.md
    ls log/$GROUP-* -tr > output/example_$GROUP.list 2>/dev/null
    xargs cat < output/example_$GROUP.list  >> output/Example.md
  done
hiro -input="output/Example.md" -output="../Example.html" -template="input/template.html"

