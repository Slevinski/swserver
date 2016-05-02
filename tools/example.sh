# create example doc through go iglo stand alone server
# modify formatter.go to update Tmpl variable
# 
go run example.go -out "../Example.html" &
sleep 3
wget http://localhost:8080 -O "../Example.html"
trap "exit" INT TERM
trap "kill 0" EXIT
