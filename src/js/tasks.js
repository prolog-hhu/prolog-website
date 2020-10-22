import Cookies from 'js-cookie'

class Tasks {

    constructor() {

        if (document.body.classList.contains('page-template-page-aufgaben')) {

            this.items = document.querySelectorAll(".Box-row");
            this.cookie = Cookies.get("quiz_progress");

            if(this.cookie != undefined) {
                this.progress = JSON.parse(this.cookie)["progress"]

            } else {
                console.log("No Progress here.")
                return;
            }

            this.markProgess();
        }
    }

    markProgess() {
        for (let elem of this.items) {
            let anchor = elem.querySelector("a");

            for (let link of this.progress) {

                if(anchor.href.match(link)) {
                    this.markAsDone(anchor);
                }
            }
        }   
    }

    markAsDone(anchor) {
        anchor.classList.add("text-green");
        anchor.appendChild(this.createDoneNode()); 
    }

    createDoneNode() {
        let node = document.createElement("span");
        let text = document.createTextNode("(DONE)"); 

        node.classList.add("text-green","text-bold");
        node.appendChild(text);   
        
        return node
    }
}

new Tasks();