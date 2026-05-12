function getUserNames(users) {
    if (Array.isArray(users) !== true) {
        console.log("users must be in  []");
        return;
    }
    for (let i = 0; i < users.length; i++) {
        if (typeof(users[i]) !== "object" ||
            users[i] === null ||
            typeof(users[i].name) !== "string")
        {
            console.log("invalid user");
            return;
        }
    }
    return users.map(user => user.name);
}


