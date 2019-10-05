//
// UserOutput (parse the raw output buffer to html items)
// 
//

class UserOutput {

    constructor(output) {

        this.output = output;
    }


    write(stack) {

        stack.forEach(item => {
            this.add(item);
        });

        this.add('', 'divider');
    }


    add(input, type) {

        // create dom element and attach style classes
        let node = document.createElement("span");

        let textBasicStyle = "d-block border-left mb-2 p-2";

        // further styling through message type
        if (type == 'error') {
            node.className += textBasicStyle + ' text-red border-red';

        } else if (type == 'succ') {
            node.className += textBasicStyle + ' text-green border-green';

        } else if (type == 'test') {
            node.className += textBasicStyle + ' text-blue border-blue';

        } else if (type == 'divider') {
            node.className += 'd-block border-top border-gray-light my-3';

        } else {
            node.className += textBasicStyle + ' border-gray-light';
        }

        // attach text to dom element
        let text = document.createTextNode(input);
        node.appendChild(text);

        // append element to output
        this.output.insertAdjacentElement('afterbegin', node);
    }

}

export default UserOutput;