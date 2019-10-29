export default function (content) {
    let id = content;

    // lowercase & trim
    id = id.toLowerCase().trim();

    // replace umlauts
    id = id.replace(/ä/g, 'ae');
    id = id.replace(/ö/g, 'oe');
    id = id.replace(/ü/g, 'ue');
    id = id.replace(/ß/g, 'ss');

    // replace/remove special characters
    id = id.replace(/ /g, '-');
    id = id.replace(/\./g, '');
    id = id.replace(/,/g, '');
    id = id.replace(/\(/g, '');
    id = id.replace(/\)/g, '');

    return id;
}