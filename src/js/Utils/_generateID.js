export default function (content) {
    let id = content;

    // html stripping
    id = id.replace(/\<[^\>]*\>/g, '');

    // lowercase & trim
    id = id.toLowerCase().trim();

    // replace umlauts
    id = id.replace(/ä/g, 'ae');
    id = id.replace(/ö/g, 'oe');
    id = id.replace(/ü/g, 'ue');
    id = id.replace(/ß/g, 'ss');

    // replace/remove special characters
    id = id.replace(/ /g, '-'); // space

    id = id.replace(/\./g, ''); // .   
    id = id.replace(/\:/g, ''); // :

    id = id.replace(/\,/g, ''); // ,
    id = id.replace(/\;/g, ''); // ;

    id = id.replace(/\\/g, ''); // \
    id = id.replace(/\//g, ''); // /
    id = id.replace(/\|/g, ''); // |

    id = id.replace(/\(/g, ''); // (
    id = id.replace(/\)/g, ''); // )

    id = id.replace(/\[/g, ''); // [
    id = id.replace(/\]/g, ''); // ]

    id = id.replace(/\{/g, ''); // {
    id = id.replace(/\}/g, ''); // }

    id = id.replace(/\’/g, ''); // ’

    console.log(id);

    return id;
}