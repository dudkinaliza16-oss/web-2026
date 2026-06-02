function mapObject(obj, callback) {
    const result = {};

    for (let key in obj) {
        result[key] = callback(obj[key]);
    }

    return result;
}