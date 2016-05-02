package main

import (
	"github.com/subosito/iglo"
	"log"
	"net/http"
	"os"
)

func httpError(w http.ResponseWriter, err error) {
	http.Error(w, err.Error(), http.StatusInternalServerError)
}

func main() {
	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		f, err := os.Open("output/Example.md")
		if err != nil {
			httpError(w, err)
			return
		}
		defer f.Close()
		err = iglo.MarkdownToHTML(w, f)
		if err != nil {
			httpError(w, err)
			return
		}
	})
	err := http.ListenAndServe(":8080", nil)
	if err != nil {
		log.Fatal(err)
	}
}
