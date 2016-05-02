echo "Clear output"
rm output/*

echo "README conversion"
hiro -input="..//README.md" -output="../index.html" -template="input/template.html"

echo "API Blueprint Documents"
more ../index.php | grep "^\/\/ " | cut -c 4- > output/Guide.md
hiro -input="output/Guide.md" -output="../Guide.html" -template="input/template.html"

# curl-trace-parser mangles charset, use iconv to fix
jq -r '.[] | if has("headers") then "curl --trace - \(.headers | to_entries | map("-H \"",.key, ":", .value, "\" ") | add) --request \(.method) $swserver\"\(.headers.Location)\" | curl-trace-parser --blueprint | iconv -t iso-8859-1 -f utf-8 | awk 'BEGIN{print""}1' > log/\(.id).log" else "" end' < ../Example.json > output/Example.sh
chmod 755 output/Example.sh

jq -r '.[] | if has("headers") then "swserverRegister(\(@json));" else "" end' < ../Example.json > ../Run.js

jq -r '.[] | if has("top") then "\(.lines[])" else "" end' < ../Example.json | grep -v '^$' > output/Example.md
echo "" >> output/Example.md


