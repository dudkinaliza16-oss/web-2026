function mergeObjects(FirstObj, SecondObj){
    if (typeof FirstObj === 'object' && typeof SecondObj === 'object'){
        if (Array.isArray(FirstObj) === false && Array.isArray(SecondObj) === false){
            let answerObject = {}
            for (let key of Object.keys(FirstObj)){
                answerObject[key] = FirstObj[key];
            }
            for (let key of Object.keys(SecondObj)){
                answerObject[key] = SecondObj[key];
            }
            return answerObject;
        }

    }

}