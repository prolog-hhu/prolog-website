class Compiler {

    constructor() {

        // create new prolog session
        this.session = pl.create();

        // create history objects
        this.queryHistory = [];
        this.outputHistory = [];


        // get elements for consulting
        this.programContent = document.getElementById('programcontent');
        this.programCode = document.getElementById('programcode');
        this.programFile = document.getElementById('programfile');
        this.programConsult = document.getElementById('programconsult');

        // get elements for querying
        this.queryContent = document.getElementById('querycontent');
        this.queryRun = document.getElementById('queryrun');

        // get elements for verifying
        this.verifyFile = document.getElementById('querycontent');
        this.verifyRun = document.getElementById('queryrun');

        this.output = document.getElementById('output');


        // attach event listeners
        this.programContent.addEventListener("keyup", this.syncCode.bind(this));
        this.programContent.addEventListener("scroll", this.syncScroll.bind(this));

        this.programFile.addEventListener('change', this.getFile.bind(this));
        this.programConsult.addEventListener("click", this.consult.bind(this));
        this.queryRun.addEventListener("click", this.query.bind(this));


        // startup sync code for equal programCode and programContent height
        this.syncCode();
    }


    syncCode() {

        // copy parsed textarea into code-editor
        this.programCode.innerHTML = Prism.highlight(this.programContent.value, Prism.languages.prolog, 'prolog');

        // sync height of textarea and code-editor
        this.programCode.parentElement.style.height = this.programContent.clientHeight + 'px';

        this.syncScroll();
    }


    syncScroll() {

        // sync vertical and horizontal scrolling directions
        this.programCode.parentElement.scrollTop = this.programContent.scrollTop;
        this.programCode.parentElement.scrollLeft = this.programContent.scrollLeft;
    }


    consult() {

        console.log(this.session);

        // save consulting result
        let result = this.session.consult(this.programContent.value);

        // decides which type of output it returns
        if (result === true) {
            return this.toOutput('parsing program: success.', 'succ');
        } else {
            return this.toOutput(result, 'error');
        }
    }


    // query function
    query() {

        // get query content
        let query = this.queryContent.value;

        // decides if it should be queried or not
        if (this.queryHistory[this.queryHistory.length - 1] !== query ||
            this.outputHistory[this.outputHistory.length - 1] === 'false.') {

            // save the query
            let result = this.session.query(query);

            // output error
            if (result.id == "throw") {
                return this.toOutput(result, 'error');
            };
        }

        this.session.answer(this.answerCallback.bind(this));
        this.queryHistory.push(query);
    }


    answerCallback(answer) {

        let output = pl.format_answer(answer, this.session);

        this.toOutput(output);

        this.outputHistory.push(output);
    }


    toOutput(input, type) {

        let node = document.createElement("span");
        node.className += "d-block border-left border-gray-light mb-2 p-2";

        if (type == 'error') {
            node.className += ' text-red border-red';
        } else if (type == 'succ') {
            node.className += ' text-green border-green';
        }

        let text = document.createTextNode(input);
        node.appendChild(text);

        this.output.insertAdjacentElement('afterbegin', node);
    }


    getFile(event) {

        const input = event.target;

        if ('files' in input && input.files.length > 0) {
            this.placeFileContent(this.programContent, input.files[0]);
        }
    }


    placeFileContent(target, file) {

        this.readFileContent(file).then(content => {

            // remove white space before and after code
            let stripped = content.trim();

            target.value = stripped;

            this.syncCode();
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

if (typeof pl !== 'undefined' && Prism !== 'undefined') {
    let myCompiler = new Compiler();

} else {
    throw new Error('Either Tau-Prolog or Prism or both was not loaded.');
}

export default Compiler;