function uniqueElements(inputArray){
    if (Array.isArray(inputArray)){
        let answerArray = {}
        for (let i = 0; i < inputArray.length; i++) {
            if (String(inputArray[i]) in answerArray){
                answerArray[String(inputArray[i])] += 1;
            } else {
                answerArray[String(inputArray[i])] = 1;
            }
        }
        console.log(answerArray);
    } else{
        console.log("Не массив")
    }
}