class Wiki {

    constructor() {

        this.isSingle = document.body.classList.contains('single-wiki')

        this.modules = this.roadmap.getElementsByClassName('module');

        if (this.isSingle === true) {

            let items = document.querySelectorAll("h1, h2, h3");

            for (let elem of items) {
                elem.id = this.generateID(elem.innerHTML);
            }
        }

    }

    generateID(content) {
        let id = content;

        // lowercase & trim
        id = id.toLowerCase().trim();

        // replace umlauts
        id = id.replace(/ä/g, 'ae');
        id = id.replace(/ö/g, 'oe');
        id = id.replace(/ü/g, 'ue');
        id = id.replace(/ß/g, 'ss');

        // replace/remove special characters
        id = id.replace(/ /g, '-');
        id = id.replace(/\./g, '');
        id = id.replace(/,/g, '');
        id = id.replace(/\(/g, '');
        id = id.replace(/\)/g, '');

        return id;
    }

}