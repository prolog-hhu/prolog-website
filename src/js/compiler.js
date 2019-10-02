class Compiler {

    constructor() {

        // config
        this.queryAll = true;

        // create storage objects
        this.session;
        this.queryHistory;
        this.outputHistory;

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

        // get element for output
        this.output = document.getElementById('output');

        // get utilities elements
        this.resetAll = document.getElementById('resetall');
        this.downloadProgram = document.getElementById('downloadprogram');
        this.downloadOutput = document.getElementById('downloadoutput');


        // event listener: change upload file
        this.programFile.addEventListener('change', this.getFile.bind(this));

        // event listeners: consult, query, verify buttons
        this.programConsult.addEventListener("click", this.consult.bind(this));
        this.queryRun.addEventListener("click", this.query.bind(this));
        this.verifyRun.addEventListener("click", this.verify.bind(this));

        // event listeners: enter to query
        this.queryContent.addEventListener("keypress", this.enterToQuery.bind(this));

        // event listeners: utility buttons
        this.resetAll.addEventListener("click", this.reset.bind(this));
        this.downloadProgram.addEventListener("click", this.programDownload.bind(this));
        this.downloadOutput.addEventListener("click", this.outputDownload.bind(this));

        // rewrite console log
        window.console.log = this.consoleLogged.bind(this);

        // run initial reset
        this.reset();
    }

    reset() {
        // create new prolog session
        this.session = pl.create();

        // create empty history objects
        this.queryHistory = [];
        this.outputHistory = [];

        // empty current program content
        this.programContent.value = '';
        this.syncCode();

        // empty current query content
        this.queryContent.value = ''

        // empty current output
        this.output.innerHTML = '';
    }


    syncCode() {

        // copy parsed textarea into code-editor
        this.programCode.innerHTML = Prism.highlight(this.programContent.value, Prism.languages.prolog, 'prolog');

        // sync height of textarea and code-editor
        this.programCode.parentElement.style.height = this.programContent.clientHeight + 'px';

        this.syncScroll();

        // sync Code & Scroll every drawn frame
        window.requestAnimationFrame(this.syncCode.bind(this));
    }


    syncScroll() {

        // sync vertical and horizontal scrolling directions
        this.programCode.parentElement.scrollTop = this.programContent.scrollTop;
        this.programCode.parentElement.scrollLeft = this.programContent.scrollLeft;
    }


    consult() {

        let result = this.session.consult(this.programContent.value);

        // decides which type of output it returns
        if (result === true) {
            return this.toOutput('parsing program: success.', 'succ');
        } else {
            return this.toOutput(result, 'error');
        }
    }


    query() {

        let query = this.queryContent.value;

        // decides if it should be queried or not
        if (this.queryHistory[this.queryHistory.length - 1] !== query ||
            this.outputHistory[this.outputHistory.length - 1] === 'false.') {

            // query divider, not on beginning
            if (this.queryHistory.length !== 0) {
                this.toOutput('-----');
            }

            // save the query
            let result = this.session.query(query);

            // handle error throw
            if (result.id == "throw") {

                this.outputHistory.push(result);
                return this.toOutput(result, 'error');
            };
        }

        // handle query success
        this.session.answer(this.answerCallback.bind(this));
        this.queryHistory.push(query);

        // handle auto querying
        if (this.queryAll === true &&
            this.outputHistory[this.outputHistory.length - 1] !== 'false.') {
            this.query();
        }
    }


    answerCallback(answer) {

        // callback prolog answer, save it to output & history
        let output = pl.format_answer(answer, this.session);

        if (this.outputHistory[this.outputHistory.length - 1] !== 'true.' &&
            !/=.*\./.test(this.outputHistory[this.outputHistory.length - 1])) {
            this.toOutput(output);
        }

        this.outputHistory.push(output);
    }


    verify() {

    }


    toOutput(input, type) {

        // create dom element and attach style classes
        let node = document.createElement("span");
        node.className += "d-block border-left mb-2 p-2";

        // further styling through message type
        if (type == 'error') {
            node.className += ' text-red border-red';

        } else if (type == 'succ') {
            node.className += ' text-green border-green';

        } else {
            node.className += ' border-gray-light';
        }

        // attach text to dom element
        let text = document.createTextNode(input);
        node.appendChild(text);

        // append element to output
        this.output.insertAdjacentElement('afterbegin', node);
    }

    getFile(event) {

        const input = event.target;

        // call async place content, if input !is empty
        if ('files' in input && input.files.length > 0) {
            this.placeFileContent(this.programContent, input.files[0]);
        }
    }


    placeFileContent(target, file) {

        // call async fileReader method
        this.readFileContent(file).then(content => {

            // remove white space before and after code
            let stripped = content.trim();

            target.value = stripped;

            this.syncCode();
        }).catch(error => console.log(error));
    }


    // TODO: Reduce redundant code
    programDownload() {
        let date = new Date();
        let filename = 'program-' + date.toISOString().substring(8, 19) + '.pl';

        this.download(filename, this.programContent.value);
    }


    outputDownload() {
        let date = new Date();
        let filename = 'output-' + date.toISOString().substring(8, 19) + '.txt';

        this.download(filename, this.outputHistory);
    }


    // FileReader readAsText() async issues?
    // https: //stackoverflow.com/questions/51026420/filereader-readastext-async-issues
    readFileContent(file) {

        const reader = new FileReader();

        return new Promise((resolve, reject) => {
            reader.onload = event => resolve(event.target.result)
            reader.onerror = error => reject(error)
            reader.readAsText(file)
        })
    }


    // Enter key press event in JavaScript
    // https://stackoverflow.com/questions/905222/enter-key-press-event-in-javascript
    enterToQuery(event) {

        if (event.keyCode == 13) {
            this.query();
        }

    }


    // Capturing javascript console.log? [duplicate]
    // https://stackoverflow.com/questions/11403107/capturing-javascript-console-log
    consoleLogged(msg) {
        this.toOutput(msg);
        this.outputHistory.push(msg);
    }


    // stackoverflow: How to create a file in memory for user to download, but not through server?
    // https://stackoverflow.com/questions/3665115/how-to-create-a-file-in-memory-for-user-to-download-but-not-through-server
    download(filename, text) {

        let element = document.createElement('a');

        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
        element.setAttribute('download', filename);

        element.style.display = 'none';
        document.body.appendChild(element);

        element.click();
        document.body.removeChild(element);
    }
}

// initializing
if (typeof pl !== 'undefined' && Prism !== 'undefined') {
    let myCompiler = new Compiler();

} else {
    console.log('no compiler action here, sorry bro.')
}

export default Compiler;