import {
    generateID
} from './Utils';


class Wiki {

    constructor() {

        this.isSingle = document.body.classList.contains('single-wiki');

        if (this.isSingle === true) {

            let items = document.querySelectorAll("h1, h2, h3");

            for (let elem of items) {
                elem.id = generateID(elem.innerHTML);
            }
        }

    }
}

let myWiki = new Wiki();