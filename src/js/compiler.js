class Compiler {

    constructor() {

        // create new prolog session
        this.session = pl.create();

        // create history objects
        this.queryHistory = [];
        this.outputHistory = [];

        // get elements for consulting
        this.programContent = document.getElementById('programcontent');
        this.programFile = document.getElementById('programfile');
        this.programConsult = document.getElementById('programconsult');

        // get elements for querying
        this.queryContent = document.getElementById('querycontent');
        this.queryRun = document.getElementById('queryrun');

        this.output = document.getElementById('output');

        // attach event listeners
        this.programFile.addEventListener('change', this.getFile.bind(this));
        this.programConsult.addEventListener("click", this.consult.bind(this));
        this.queryRun.addEventListener("click", this.query.bind(this));
    }


    // consult function
    consult() {

        console.log(this.programContent.value);
        let result = this.session.consult(this.programContent.value);

        console.log(result);

        if (result === true) {
            return this.toOutput('parsing program: success.', 'succ');
        } else {
            return this.toOutput(result, 'error');
        }
    }


    // query function
    query() {

        let query = this.queryContent.value;
        console.log(this.queryHistory);
        console.log(this.outputHistory);

        if (this.queryHistory[this.queryHistory.length - 1] !== query ||
            this.outputHistory[this.outputHistory.length - 1] === 'false.') {

            let result = this.session.query(query);

            if (result.id == "throw") {
                return this.toOutput(result, 'error');
            };
        }

        let callback = (answer) => {

            let output = pl.format_answer(answer, this.session, )

            this.toOutput(output);
            this.outputHistory.push(output);
        };

        this.session.answer(callback);
        this.queryHistory.push(query);
    }


    // helper: create output
    toOutput(input, type) {

        let node = document.createElement("span");
        node.className += "d-block mb-2";

        if (type == 'error') {
            node.className += ' text-red border border-red p-2';
        } else if (type == 'succ') {
            node.className += ' text-green border border-green p-2';
        }

        let text = document.createTextNode(input);
        node.appendChild(text);

        this.output.insertAdjacentElement('afterbegin', node);
    }


    getFile(event) {

        const input = event.target;

        if ('files' in input && input.files.length > 0) {
            this.placeFileContent(this.programContent, input.files[0])
        }
    }


    placeFileContent(target, file) {

        this.readFileContent(file).then(content => {
            target.value = content
        }).catch(error => console.log(error));
    }

    readFileContent(file) {

        const reader = new FileReader();

        return new Promise((resolve, reject) => {
            reader.onload = event => resolve(event.target.result)
            reader.onerror = error => reject(error)
            reader.readAsText(file)
        })
    }
}

if (typeof pl !== 'undefined') {
    let myCompiler = new Compiler();
}

export default Compiler;