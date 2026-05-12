function IsPrimeNumber(n) {
    if (typeof (n) == "number") {
        if (isPrime(n)) {
            console.log(`Результат: ${n} простое число`);
        } else {
            console.log(`Результат: ${n} не простое число`);
        }
    }
    else if (Array.isArray(n)) {
        let notPrimeArray = [];
        let primeArray = [];
        for (let i = 0; i < n.length; i++) {
            if (typeof (n[i]) == "number") {
                if (isPrime(n[i])){
                    primeArray.push(n[i]);
                } else {
                    notPrimeArray.push(n[i]);
                }
            } else {
                console.log("В массиве не число");
                //return;
            }
        }
        console.log("Простые числа " + primeArray.join(', ') + " не простые числа: " + notPrimeArray.join(', '));
    } else {
        console.log("Введенно не число и не массив");
    }

    function isPrime(n) {
        if (n < 2) {
            return false;
        }
        let isPrime = true;
        for (let j = 2; j < n; j++) {
            if (n % j === 0) {
                isPrime = false;
                break;
            }
        }
        return isPrime;
    }
}

