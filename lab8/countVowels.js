function countVowels(string) {
    if (typeof (string) == "string"){
        const arrVowels = ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я'];
        const answerArray = [];
        let count = 0;
        for (let i = 0; i < string.length; i++) {
            if (arrVowels.includes(string[i].toLowerCase())) {
                count++;
                answerArray.push(string[i]);
            }
        }
        console.log(count, answerArray);
    } else {
        console.log('incorrect input');
    }

}