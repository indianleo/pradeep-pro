export const ssd = {
    set: setData,
    get: getData
}

function setData (key, value) {
    if (typeof value === 'string') {
        localStorage.setItem(key, value);
    } else {
        localStorage.setItem(key, JSON.stringify(value));
    }
}

function getData (key) {
    const res = localStorage.getItem(key);
    if (res.startsWith('{')) {
        return JSON.parse(res);
    }
    return res;
}