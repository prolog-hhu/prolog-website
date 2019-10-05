//
// FileDownload (synchronously download the contents of a raw data buffers through hidden anchor element)
// 
//

class FileDownload {

    constructor(downloadProgramHandle, downloadOutputHandle, programContent, outputHistory) {

        this.downloadProgram = document.getElementById(downloadProgramHandle);
        this.downloadOutput = document.getElementById(downloadOutputHandle);

        this.downloadProgram.addEventListener("click", this.programDownload.bind(this));
        this.downloadOutput.addEventListener("click", this.outputDownload.bind(this));

        this.programContent = programContent;
        this.outputHistory = outputHistory;
    }

    getId() {

        let date = new Date();
        return date.toISOString().substring(8, 19);
    }


    programDownload() {
        let filename = 'program-' + this.getId() + '.pl';

        this.download(filename, this.programContent.value);
    }

    outputDownload() {
        let filename = 'output-' + this.getId() + '.txt';

        this.download(filename, this.outputHistory);
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

export default FileDownload;