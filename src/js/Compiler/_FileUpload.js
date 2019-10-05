//
// FileReader (asynchronously read the contents of files or raw data buffers)
// https://developer.mozilla.org/en-US/docs/Web/API/FileReader
//

class FileUpload {

    constructor(fileInput, fileOutput) {

        this.fileInput = document.getElementById(fileInput);
        this.fileInput.addEventListener('change', this.getFile.bind(this));

        this.fileOutput = fileOutput;
    }


    getFile(event) {

        const input = event.target;

        // call async place content, if input !is empty
        if ('files' in input && input.files.length > 0) {
            this.placeFileContent(this.fileOutput, input.files[0]);
        }
    }


    placeFileContent(target, file) {

        // call async fileReader method
        this.readFileContent(file).then(content => {

            // remove white space before and after code
            let stripped = content.trim();

            target.value = stripped;

        }).catch(error => console.log(error));
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

}

export default FileUpload;