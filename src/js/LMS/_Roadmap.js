import {
    generateID
} from '../Utils';

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

        this.headline.id = generateID(this.headline.innerHTML);

    }

}

export default Roadmap;