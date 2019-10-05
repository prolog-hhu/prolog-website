const test01 = [{
        name: 'Hermine ist Roses Mutter (should be true)',
        query: 'mutter(hermione,rose).'
    },
    {
        name: 'Hermine ist Hugos Mutter (should be true)',
        query: 'mutter(hermione,hugo).'
    },
    {
        name: 'Ginny ist James Sirius Mutter (should be true)',
        query: 'mutter(ginny,james_sirius).'
    },
    {
        name: 'Ginny ist Lilly Lunas Mutter (should be true)',
        query: 'mutter(ginny,lilly_luna).'
    },
    {
        name: 'Molly ist Rons Mutter (should be true)',
        query: 'mutter(molly,ron).'
    },
    {
        name: 'Molly ist Ginnys Mutter (should be true)',
        query: 'mutter(molly,ginny).'
    },
    {
        name: 'Die Mutter darf nicht männlich sein (should be false)',
        query: 'mutter(arthur,ron).'
    },
    {
        name: 'Erstes Argument muss die Mutter sein - Bedenke die Argumentreihenfolge (should be false)',
        query: 'mutter(ginny,molly).'
    },
    {
        name: 'Oma ist nicht Mama (should be false)',
        query: 'mutter(molly,lilly_luna).'
    },
    {
        name: 'Ginny Tochter von Arthur und Molly (should be true)',
        query: 'tochter(ginny,arthur), tochter(ginny, molly).'
    },
    {
        name: 'Rose Tochter von Ron und Hermine (should be true)',
        query: 'tochter(rose,ron), tochter(rose,hermione).'
    },
    {
        name: 'Lilly Luna Tochter von Harry und Ginny (should be true)',
        query: 'tochter(lilly_luna,harry), tochter(lilly_luna, ginny).'
    },
    {
        name: 'Tochter darf nicht maennlich sein (should be false)',
        query: 'tochter(ron,molly).'
    },
    {
        name: 'Tochter darf nicht das zweite Argument sein (should be false)',
        query: 'tochter(hermione,rose).'
    },
    {
        name: 'Ron Sohn von Arthur und Molly (should be true)',
        query: 'sohn(ron,arthur), sohn(ron, molly).'
    },
    {
        name: 'Hugo Sohn von Ron (should be true)',
        query: 'sohn(hugo,ron).'
    },
    {
        name: 'Hugo Sohn von Hermine (should be true)',
        query: 'sohn(hugo,hermione).'
    },
    {
        name: 'Sohn darf nicht das zweite Argument sein (should be false)',
        query: 'sohn(hermione,hugo).'
    },
    {
        name: 'Sohn darf nicht weiblich sein (should be false)',
        query: 'sohn(ginny,arthur).'
    },
    {
        name: 'Lilli Luna ist Schwester von James Sirius (should be true)',
        query: 'schwester(lilly_luna,james_sirius).'
    },
    {
        name: 'Ginny ist Schwester von Ron (should be true)',
        query: 'schwester(ginny,ron).'
    },
    {
        name: 'Schwester darf nicht maennlich sein (should be false)',
        query: 'schwester(james_sirius,albus_severus).'
    },
    {
        name: 'Ron ist Bruder von Ginny (should be true)',
        query: 'bruder(ron,ginny).'
    },
    {
        name: 'James Sirius ist Bruder von Albus Serverus (should be true)',
        query: 'bruder(james_sirius,albus_severus).'
    },
    {
        name: 'Bruder darf nicht weiblich sein (should be false)',
        query: 'bruder(ginny,ron).'
    },
    {
        name: 'Arthur ist Roses Opa (should be true)',
        query: 'grossvater(arthur,rose).'
    },
    {
        name: 'Opa darf nicht weiblich sein (should be false)',
        query: 'grossvater(molly,rose).'
    },
    {
        name: 'Papa ist nicht Opa (should be false)',
        query: 'grossvater(ron,rose).'
    }
]

export default test01;