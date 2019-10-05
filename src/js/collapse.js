class Collapse {

    constructor() {

        this.page = document.getElementById("page");
        this.collapsibles = this.page.getElementsByClassName("collapse");

        for (let item of this.collapsibles) {
            new Collapsible(item);
        }
    }


    handleOpen() {

    }


    handleClose() {

    }


    createFader() {

    }
}

class Collapsible {

    constructor(elem) {

        this.elem = elem;
        this.header = this.elem.getElementsByClassName('header')[0];
        this.content = this.elem.getElementsByClassName('content')[0];
        console.log(this.content);

        this.content.classList.add('sr-only');
        this.addHandle();
        this.prepareHeader();
    }

    prepareHeader() {
        this.header.className += " d-flex flex-wrap flex-justify-between flex-items-center";
    }

    addHandle() {
        let button = document.createElement('button');
        let text = document.createTextNode('open');
        button.appendChild(text);

        button.addEventListener('click', this.handleToggle.bind(this));

        this.header.appendChild(button);
    }

    handleToggle() {
        this.content.classList.toggle('sr-only');
    }
}

let myCollapse = new Collapse();