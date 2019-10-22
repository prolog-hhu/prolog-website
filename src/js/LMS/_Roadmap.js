class Roadmap {

    constructor() {

        this.roadmap = document.getElementsByClassName('course')[0];

        if (this.roadmap === undefined) {
            console.log('No Roadmap here.')
            return;
        }

        this.modules = this.roadmap.getElementsByClassName('module');

        this.enhanceModules();
    }


    enhanceModules() {

        for (let elem of this.modules) {
            new Module(elem);
        }
    }
}

class Module {

    constructor(elem) {

        this.module = elem;

        this.headline = this.module.getElementsByTagName('H2')[0];

        this.headline.id = this.generateID();

    }

    generateID() {
        let id = this.headline.innerHTML;

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

export default Roadmap;