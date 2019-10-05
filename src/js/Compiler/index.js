import FileUpload from './_FileUpload';
import UserOutput from './_UserOutput';
import FileDownload from './_FileDownload';

import test01 from './tests/01';

class Compiler {

    constructor() {

        // config
        this.queryAll = true;
        this.maxStackSize = 300;

        // create storage objects
        this.session;
        this.queryHistory;
        this.outputHistory;

        // get elements for consulting
        this.programContent = document.getElementById('programcontent');
        this.programCode = document.getElementById('programcode');
        this.programConsult = document.getElementById('programconsult');

        // get elements for querying
        this.queryContent = document.getElementById('querycontent');
        this.queryRun = document.getElementById('queryrun');

        // get elements for verifying
        this.verifyFile = document.getElementById('verifyfile');
        this.verifyRun = document.getElementById('verifyrun');

        // get element for output
        this.output = document.getElementById('output');

        // get reset element
        this.resetRun = document.getElementById('reset');


        // event listeners: consult, query, verify, reset buttons
        this.programConsult.addEventListener("click", this.consult.bind(this));
        this.queryRun.addEventListener("click", this.handleQuery.bind(this));
        this.verifyRun.addEventListener("click", this.verify.bind(this));
        this.resetRun.addEventListener("click", this.reset.bind(this));

        // event listeners: enter to query
        this.queryContent.addEventListener("keypress", this.enterToQuery.bind(this));

        // rewrite console log
        window.console.log = this.consoleLogged.bind(this);

        // run initial reset
        this.reset();


        // initialize sub-modules
        this.FileUpload = new FileUpload('programfile', this.programContent);
        this.UserOutput = new UserOutput(this.output);
        this.FileDownload = new FileDownload('downloadprogram', 'downloadoutput', this.programContent, this.outputHistory);
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

        // loads defaults !!! FIXME !!!
        this.session.consult("defaults.pl");
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
            return this.UserOutput.add('parsing program: success.', 'succ');
        } else {
            return this.UserOutput.add(result, 'error');
        }
    }

    query(content) {

        // create empty stack
        let resultStack = [];


        // 1. query is send to tau prolog, errors are handled, passing on success
        if (this.outputHistory[this.outputHistory.length - 1] === "false." ||
            this.outputHistory.length === 0) {

            // let tau prolog carry out the query
            let queryAnswer = this.session.query(content);

            // handle error
            if (queryAnswer.id == "throw") {

                resultStack.push(queryAnswer);
                return resultStack;
            };

            this.queryHistory.push(content);
        }


        // 2. auto query for all possible answers, limited to maxStackSize
        while (this.queryAll === true &&
            resultStack.length <= this.maxStackSize &&
            resultStack[resultStack.length - 1] !== "false.") {

            this.session.answer((queryAnswer) => {

                // let tau prolog format answer
                let output = pl.format_answer(queryAnswer, this.session);

                // process output
                resultStack.push(output);
                this.outputHistory.push(output);
            });
        }


        if (resultStack.length > 1) {
            resultStack.pop();
        }

        return resultStack;
    }


    verify() {

        if (this.verifyFile.value !== '001') {
            return null;
        }

        let tests = test01;

        tests.forEach((elem, index) => {

            this.UserOutput.add('Test ' + index + '.: ' + elem.name, 'test');

            let results = this.query(elem.query);
            this.UserOutput.write(results);
        });

    }


    handleQuery() {

        let query = this.queryContent.value;

        if (query !== '') {
            let results = this.query(query);
            this.UserOutput.write(results);
        }
    }

    // Enter key press event in JavaScript
    // https://stackoverflow.com/questions/905222/enter-key-press-event-in-javascript
    enterToQuery(event) {

        if (event.keyCode == 13) {
            this.handleQuery();
        }

    }

    // Capturing javascript console.log? [duplicate]
    // https://stackoverflow.com/questions/11403107/capturing-javascript-console-log
    consoleLogged(msg) {
        this.toOutput(msg);
        // this.outputHistory.push(msg);
    }
}

// initializing
if (typeof pl !== 'undefined' && Prism !== 'undefined') {
    let myCompiler = new Compiler();

} else {
    console.log('no compiler action here, sorry bro.')
}

export default Compiler;