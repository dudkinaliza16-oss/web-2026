const numbers = [2, 3, 4, 5, 10, 1];
const result = numbers.map(num => num * 3).filter(num => num > 10);
console.log(result);