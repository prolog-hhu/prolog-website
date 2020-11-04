
// src: https://stackoverflow.com/questions/11688692/how-to-create-a-list-of-unique-items-in-javascript
export default function (arr) {

    let u = {};
    let a = [];

    for(var i = 0, l = arr.length; i < l; ++i){

        if(!u.hasOwnProperty(arr[i])) {
            a.push(arr[i]);
            u[arr[i]] = 1;
        }
    }

    return a;
}