import {
    generateID
} from './Utils';


class LinkIDs {

    constructor() {

        this.isSingle = document.body.classList.contains('single-wiki');
        this.isTaskOverview = document.body.classList.contains('aufgaben');

        if (this.isSingle === true || this.isTaskOverview == true) {

            let items = document.querySelectorAll("h1, h2, h3");

            for (let elem of items) {
                elem.id = generateID(elem.innerHTML);
            }
        }

    }
}

let myLinkIDs = new LinkIDs();