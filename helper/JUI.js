'use strict'
/**
 * File: JUI.js
 * Description: Provide JQ alternative methods and Draggable
 * Author: Pradeep Yadav
 * email: pradeepdv45@gmail.com
 */

 import TagsView from './TagView';
 import tagViewCss from './css/tagViewCss';
export class API {
    constructor(options) {
        this._servers = [
            'http://localhost/pe-gold3/', 
            'https://www.ucertify.com/', 
            'https://www.jigyaasa.info/',
            'http://172.10.195.203/pe-gold3/',
        ];
        this._REMOTE_API_URL = this._servers[1] + 'pe-api/1/index.php';
        this._client = {
            email: "pradeep.yadav@ucertify.com",
            password: "786pradeep",
            isSocial: "false",
            clientId: "040MA"
        }
    }

    validateApp (checkExpired) {
        return new Promise((resolve, reject) => {
            let isExpired = checkExpired ? `&action=refresh_token&refresh_token=1` : "";
            let isSocial = this._client.isSocial ? '&social_login=1' : "";
            let url = `${this._REMOTE_API_URL}?func=cat2.authenticate&device_id=${this._client.clientId}&email=${this._client.email}&password=${this._client.password + isSocial + isExpired}`;
            let request = new XMLHttpRequest();
            request.open('POST', url, true);
            request.onreadystatechange = (event) => {
                if (request.readyState == 4 && request.status === 200) {
                    try {
                        let responseBody = request.responseText;
                        let responseObject = responseBody.match(/<jsonstring>(.*?)<\/jsonstring>/);
                        resolve(JSON.parse(responseObject[1]));
                    } catch (err) {
                        reject(err);
                    }
                } 
            };
            request.onerror = (requestError) => {
                reject(requestError);
            };
            if (checkExpired) {
                request.setRequestHeader("old-access-token", globalThis.apiAccessToken);
            }
            request.send();
        });
    }
    
    getAPIDataJ (func, where, callback = function(){}) {
        let param = "";
        let message = true;
        let _param2 = {};
        let str = '';
        let ajax_info = where.ajax_info ||{};
        where = this._assignPartial(where, {}, 'ajax_info', true);
        // if (typeof where.redis == 'undefined') {
        // 	_param2.redis = 0;
        // }
        //----------- code for acces_token based validation --------//
        _param2.device_id = this._client.clientId;
        //----------------------------------------------------------//
    
        if (typeof (where) == 'object') {
            for (let k in where) {
                if (typeof where[k] != 'object') {
                    param += "&" + k + "=" + where[k];
                }	
            }
        }
        if (typeof (func) !== "undefined" && func != "") {
            for (let k in _param2) {
                if (typeof _param2[k] != 'object') {
                    str += "&" + k + "=" + _param2[k];
                }	
            }
            str += "&func="+func;
        }
        
        this.getAPIDataJSON(this._REMOTE_API_URL + "?" + str + "&debug=0&"+param, param, ajax_info, (apidata)=> {
            if (apidata == 'Expired'){
                this.getAPIDataJ(func, where, callback);
            } else {
                callback(apidata);
            }
        }, func);
    }
    
    getAPIDataJSON (url, data, ajax_info, callback = function(){}, funcName) {
        let request = new XMLHttpRequest();
        request.open('POST', url, true);
        request.onreadystatechange = (event) => {
            if (request.readyState == 4 && request.status === 200) {
                let responseBody = request.responseText;
                let responseData = {};
                try {
                    let resStr = responseBody.match(/<jsonstring>(.*?)<\/jsonstring>/);
                    if (resStr[1] != '') {
                        let responseObject = JSON.parse(resStr[1]);
                        if (responseObject.error && ['Expired', '-9'].includes(responseObject.error.error_id)) {
                            console.log("Api Error = ", responseObject.error.error_id);
                            this.validateApp (responseObject.error.error_id != -9).then((validRes) => {
                                if (validRes.status == 'Success') {
                                    this.setAccessKey(validRes);
                                    callback("Expired");
                                }
                            }).catch((validateError)=> {
                                //UI.storeError('Validate Error####no1:1####' + JSON.stringify(validateError || {}), true)
                                console.log(validateError);
                            });
                            return;
                        } else {
                            if (responseObject['response']) {
                                responseData = responseObject['response'];
                                console.warn("Api data J reponse <-- Received -->", responseObject);
                            } else if(responseObject['response'] == undefined && responseObject.error == undefined) {
                                responseData = responseObject;
                                console.warn("Api data J reponse <-- Received II-->", responseData);
                            } else {
                                responseData = undefined;
                                console.warn({"Response_error":responseObject.error});
                            }
                        }
                    }
                } catch (error) {
                    console.warn("Please check your Internet connection.");
                    console.log("Api data error = ", responseBody);
                    if (data.includes('must_reply_override')) {
                        responseData = undefined;
                    } else {
                        return (0);
                    }
                }
                callback(responseData);
            }
        };
        if (!data.includes('no_access_token_required')) {
            request.setRequestHeader("access-token", globalThis.apiAccessToken);
        }
        request.setRequestHeader("Content-type", "application/json");
        request.setRequestHeader("Access-Control-Allow-Origin", "*");
        request.setRequestHeader("Access-Control-Allow-Headers", "*");
        request.send();
    }

    _assignPartial(iObj, oObj = {}, str, unsetOnly = false ) {
        str = str.split(',');
        if ( !unsetOnly ) {
          for ( let i in str ) {
            let index = str[i];
            if ( typeof iObj[index] != 'undefined') {
              oObj[index] = iObj[index];
            }
          }
        }
        else {
          for ( let i in iObj ) {
            let index = str.indexOf( i ); 
            if ( index === -1) {
              oObj[i] = iObj[i];
            }
          }
        }
        return oObj;
    }
    
    setAccessKey (api) {
        if (api.access_token && api.access_token.length > 50) {
            globalThis.apiAccessToken = api.access_token;
            if (typeof(Storage) !== "undefined") {
                localStorage.setItem('apiAccessToken', api.access_token);
            }
        }
    }
}
export class JStore {
    constructor(options={}) {
        this._options = options;
        this._allowed = false;
        /**
         * session : true to enable sessionStorage
         * locastorage : by default true
         * onStore : to listen store changes
         */
        this._init()
    }

    _init() {
        if (typeof(Storage) !== "undefined") {
            this._allowed = true;
            // Code for localStorage/sessionStorage.
            window.onstorage = (e)=> {
                if (this._options.onStore) this._options.onStore(e); 
            };
        } else {
            this._allowed = false;
            console.warn("Sorry! No Web Storage support..");
        }
    }

    //When passed a number n, this method will return the name of the nth key in the storage.
    key(n) {
        if (this._allowed) {
            return this._options.session ? console.warn("Session has not key method.") : window.localStorage.key(n)
        }
    }

    //When passed a key name, will return that key's value.
    get(name) {
        if (this._allowed) {
            return this._options.session ? window.sessionStorage.getItem(name) : window.localStorage.getItem(name);
        }
    }

    //When passed a key name and value, will add that key to the storage, or update that key's value if it already exists.
    set(name, value) {
        if (this._allowed) {
            return this._options.session ? window.sessionStorage.setItem(name, value) : window.localStorage.setItem(name, value);
        }
    }

    //When passed a key name, will remove that key from the storage.
    remove(name) {
        if (this._allowed) {
            return this._options.session ? window.sessionStorage.removeItem(name) : window.localStorage.removeItem(name);
        }
    }

    //clear all stored
    clearAll() {
        if (this._allowed) {
            return this._options.session ? window.sessionStorage.clear() : window.localStorage.clear();
        }
    }
}
export default class JUI extends API{
    constructor(options) {
        super();
        this.trackInf = {};
        this.buffer = {};
        this.bsCat1 = ['Modal', 'Tooltip', 'Collapse', 'Popover', 'ScrollSpy', 'Tab', 'Alert'];
        this.extraSelectors = ['hidden', 'visible', 'selected', 'checked', 'enabled', 'children', 'childNodes'];
        this.parseHtml = this.templateHtml.bind(this);
        this.isSSDloaded = "";
        this.loadSSD();
    }

    loadSSD() {
        if (typeof globalThis == 'object') {
            globalThis.eventTracker = globalThis.eventTracker || {};
            globalThis.JUITemp = globalThis.JUITemp || {};
        } else {
            this.isSSDloaded = setInterval(()=> {
                if (typeof globalThis == 'object') {
                    globalThis.eventTracker = globalThis.eventTracker || {};
                    globalThis.JUITemp = globalThis.JUITemp || {};
                    clearInterval(this.isSSDloaded);
                }
            }, 500);
        }   
    }

    validate(isExpired) {
        return new Promise((resolve, reject) => {
            this.validateApp(isExpired).then((tokenApi) => {
                if (tokenApi.status != 'Success') {
                    reject(tokenApi);
                } else {
                    try {
                        this.setAccessKey(tokenApi);
                        resolve(tokenApi);
                    } catch (err) {
                        reject(err);
                    }
                }
            }).catch((err) => {
                reject(err);
            });
        });
    }

    param2Url(params) {
        let url = [];
        for (var i in params) {
            var uri = i + '=' + params[i];
            url.push(uri);
        }
        return url.join('&');
    }

    // Provide unique in array
    unique(myArray) {
        return myArray.filter((v, i, a) => a.indexOf(v) === i);
    }

    // handle json parse
    parseJSON(obj, showErr_data) {
        let showErr = showErr_data || false;
        try {
            return JSON.parse(obj);
        } catch (e) {
            if (showErr) {
                console.warn(e);
            }
            return {}; //Return blank object
        }
    }

    parseDom(str) {
        let parser = new DOMParser();
        let html = parser.parseFromString(str, 'text/html');
        return html;
    }

    // Add script data or url into page
    addScript(data, url, options={}) {
        let sc = document.createElement("script");
        if (url) {
            sc.src = url;
            sc.async = true;
            if (options.callback) {
                sc.onload = function() { 
                    options.callback();
                }
            }
        } else {
            sc.innerHTML = data;
        }
        let selector = options.target ? document.body : document.head;
        selector.append(sc);
        return sc;
    }

    // used to genrate css links
    createLink(path, options={}) {
        let link = document.createElement('link')
        let selector = options.target ? document.body : document.head;
        link.href = path;
        if  (options.preload) {
            link.rel = "preload";
            link.onload = function() {
                this.rel= options.type || "stylesheet";
            };
            link.as = options.as || "style";
            link.crossorigin = "anonymous";
        } else {
            link.rel = "stylesheet";
        }
        selector.append(link);
        return link;
    }

    // To enable Tag view on selected inputs
    // before use this call addTagViewCss once only
    enableTagView(options) {
        let selected = document.querySelectorAll('.tagin');
        for (const el of selected) {
            options ? TagsView(el, options) : TagsView(el);
        }
        return selected;
    }

    // Add css for tagsview inout
    addTagViewCss() {
        this.insert(document.head, `<style>${tagViewCss.style}</style>`, 'beforeend');
    }

    //check target selector is present in base selector/dom
    hasInall(selector, target) {
        let current = (typeof selector == "object") ? selector : document.querySelectorAll(selector);
        let result = [];
        if (current) {
            Array.prototype.forEach.call(current, (item)=> {
                if (item.contains(target)) {
                    result.push(item);
                }
            });
        }
        return result;
    }

    // removeAttr of jq like
    removeDomAttr(selector, attrArray) {
        let current = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (current) {
            Array.prototype.forEach.call(attrArray, (attr)=> {
                current.removeAttribute(attr);
            });
        }

        return current || {};
    }

    // trigger events
    trigger(selector, evName, options) {
        let current = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (current) {
            options ? current.dispatchEvent(new Event(evName, options)) : current.dispatchEvent(new Event(evName));
        } else {
            console.warn("Selector not found.", selector);
        }
    }

    // Find in childrent of selected node
    findChild(selector, search, action) {
        let current = (typeof selector == "object") ? selector : document.querySelector(selector);
        let list = current.children || [];
        let found = [];
        if (search && list.length > 0) {
            let index = 0;
            while (list[index]) {
                if (list[index].matches(search)) {
                    if (action) {
                        found.push(list[index]);
                    } else {
                        found = list[index];
                        break;
                    }
                }
                index++;
            }
            return found;
        } else {
            return list;
        }
    }

    closest(selector, search) {
        let current = (typeof selector == "object") ? selector : document.querySelector(selector);
        let elm = current ? current.parentElement : null;
        let result = [];
        if (search) {
            while (elm) {
                if (this.find(elm, search)) {
                    result = this.find(elm, search);
                    break;
                }
                elm = elm.parentElement;
            }
        }
        return result;
    }

    parent(selector, search) {
        let current = (typeof selector == "object") ? selector : document.querySelector(selector);
        let elm = current ? current.parentElement : null;
        if (search) {
            while(elm) {
                if (elm.matches(search)) {
                    break;
                }
                elm = elm.parentElement;
            }
        }

        return elm;
    }

    // find in sibiling or return imediate
    siblings(selector, search) {
        let current = (typeof selector == "object") ? selector : document.querySelector(selector);
        let result = [];
        if (current) {
            var node = current.parentNode.firstChild;

            while ( node ) {
                if ( node !== current && node.nodeType === Node.ELEMENT_NODE ) {
                    if (search) {
                            node.matches(search) ? result.push( node ) : "";
                    } else {
                        result.push( node );
                    }
                }
                node = node.nextElementSibling || node.nextSibling;
            }
        } 
        return result;
    }

    // find in next element or return all
    nextAll(selector) {
        let current = (typeof selector == "object") ? selector : document.querySelector(selector);
        let nextSibling = current.nextElementSibling;
        let result = [];
        if (nextSibling) {
            while(nextSibling) {
                nextSibling = nextSibling.nextElementSibling;
                result.push(nextSibling);
            }
        }

        return result;
    }

    // find in next 
    nextElm(selector, search) {
        let current = (typeof selector == "object") ? selector : document.querySelector(selector);
        let nextSibling = current.nextElementSibling;
        if (search) {
            while(nextSibling) {
                if (nextSibling.matches(search)) {
                    break;
                }
                nextSibling = nextSibling.nextElementSibling;
            }
        }

        return nextSibling;
    }

    // find in previous element
    prevElm(selector, search) {
        let current = (typeof selector == "object") ? selector : document.querySelector(selector);
        let previousSibling = current.previousElementSibling;
        if (search) {
            while(previousSibling) {
                if (previousSibling.matches(search)) {
                    break;
                }
                previousSibling = previousSibling.previousElementSibling;
            }
        }

        return previousSibling;
    }

    // add dom loaded event
    onReady(func) {
        document.addEventListener('DOMContentLoaded', function(event) {
            func.call(event);
        })
    }

    // Create element from html string
    create(tagName, html) {
        let elem = document.createElement(tagName);
        if (html) {
            elem.innerHTML = html;
        }
        return elem;
        
    }

    clone(selector) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (selected) {
            return selected.cloneNode(true);
        }
        return null;
    }

    // Setrialize form nodes
    serialize(selector) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (selected) {
            return new URLSearchParams(new FormData(selected)).toString();
        }
        return null;
    }

    // Empty dom I.e $.empty()
    empty(selector) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (selected) {
            while(selected.firstChild) selected.removeChild(selected.firstChild)
        }
        return selected;
    }

    // Get bootstrap5 instance accoridng to compoenent
    getBS(target, comp, options) {
        let selected = (typeof target == "object") ? target : document.querySelector(target);
        if (selected && this.bsCat1.includes(comp)) {
            let isIns = bootstrap[comp].getInstance(selected);
            if (isIns) {
                return bootstrap[comp].getInstance(selected);
            } else {
                let ref = new bootstrap[comp](selected, options);
                return ref;
            }
        } else {
            return {};
        }
    }

    // Enable all mathced node's bootstrap5 compoenent
    enableBsAll(selector, comp, options) {
        if (this.bsCat1.includes(comp)) {
            let triggerList = [].slice.call(document.querySelectorAll(selector));
            let fireList = triggerList.map(function (triggerElm) {
                if (options) {
                    return new bootstrap[comp](triggerElm, options);
                } else {
                    return new bootstrap[comp](triggerElm)
                }
            })
            return fireList;
        } else {
            console.error("Bootstrap can't enable for this component name");
            return [];
        }
    }

    // Hide enabled bootstrap5 compoenents
    hideBsAll(selector, comp) {
        let fireList = [].slice.call(document.querySelectorAll(selector));
        if (this.bsCat1.includes(comp)) {
            fireList.forEach(function (elm) {
                let ref = bootstrap[comp].getInstance(elm);
                ref?.hide?.();
            })
        } else {
            console.error("Bootstrap can't disable for this component name");
        }
    }

    // Js based ajax i.e $.ajax
    ajax(sendData) {
        let longData = "";
        if (typeof (sendData.data) == 'object') {
            if (sendData.formData) {
                longData = sendData.data;
            } else if (sendData.withUrl) {
                let param = "?";
                for (let k in sendData.data) {
                    if (typeof sendData.data[k] != 'object') {
                        param += "&" + k + "=" + sendData.data[k];
                    }	
                }
                sendData.url += param;
            } else {
                longData = new FormData();
                for (let prop in sendData.data) {
                    if (typeof sendData.data[prop] == 'object' && this.isValid(sendData.data[prop])) {
                        longData = this.jsonFormEncode(longData, prop, sendData.data[prop]);
                    } else {
                        longData.append(prop, sendData.data[prop]);
                    }	
                }
            }
        }
        return new Promise((resolve, reject)=> {
            const request = new XMLHttpRequest();
            request.open(sendData.type || 'POST', sendData.url, true);
            if (sendData.responseType) {
                request.responseType = sendData.responseType;
            }
            request.onreadystatechange = (event) => {
                if (request.readyState == 4 && request.status === 200) {
                    try {
                        resolve(request.responseText, event);
                    } catch (err) {
                        reject(err);
                    }
                } 
            };
            request.onerror = (requestError) => {
                reject(requestError);
            };
            if (sendData.onStart) request.onloadstart = sendData.onStart;
            if (sendData.onEnd) request.onloadend = sendData.onEnd;
            request.send(longData);
        });
    }

    jsonFormEncode(formData, prop, jsonArray) {
        try {
            for (let i = 0; i < jsonArray.length; i++) {
                for (let key in jsonArray[i]) {
                  formData.append(`${prop}[${i}][${key}]`, jsonArray[i][key])
                }
            }
        } catch(error) {
            console.warn("Please provide valid JSON Object in ajax data.");
        }

        return formData;
    }

    // get script from url
    getJSON(url) {
        var scr = document.createElement('script')
        scr.src = url;
        document.body.appendChild(scr);
    }

    // $.offset alternative
    offset(container) {
        let rect = (typeof container == "object") ? container : document.querySelector(container);
        let offset = {rect};
        if (rect) {
            let clientRect = rect.getBoundingClientRect();
            offset = { 
                target: rect,
                clientRect,
                top: clientRect.top + window.scrollY, 
                left: clientRect.left + window.scrollX, 
            };
        }
        
        return offset;
    }

    // find in array
    findInArray(value, baseArray) {
        let matched = [];
        if (value && baseArray) {
            return baseArray.find((item)=> item == value );
        }

        return false;
    }

    // comapre two array
    inArray(baseArray, compareArray) {
        let matched = [];
        if (baseArray && compareArray) {
            baseArray.forEach((item)=> {
                compareArray.forEach((comp)=> {
                    if (item == comp) {
                        matched.includes(comp) ? "" : matched.push(comp);
                    }
                });
            });
        }

        return matched.length > 0 ? matched.length : -1;
    }

    // serialize nodes into array
    serializeArray(nodeArr, filter) {
        let result = [];
        nodeArr.forEach((item)=> {
            if (!filter || item.matches(filter)) {
                console.log(item.attributes.length);
                if (item.attributes.length > 0) {
                    let tempData = {};
                    for (let _attr of item.attributes) {
                        tempData[_attr.name] = _attr.value;
                    }
                    result.push(tempData);
                }
            }
        })
        return result;
    }

    // Find target node into base node and some extra selectors
    find(baseSelector, target, data ) {
        let base = (typeof baseSelector == "object") ? baseSelector : document.querySelector(baseSelector);
        let typeAction = (typeof data == "object") ? "action" : data;
        if (base) {
            switch (typeAction) {
                case 'all' : return base.querySelectorAll(target);
                case 'child' : return base.querySelector(target).childNodes;
                case 'hidden': return Array.prototype.filter.call(base.querySelectorAll(target), (elm)=> elm.offsetWidth == 0 && elm.offsetHeight == 0);
                case 'visible': return Array.prototype.filter.call(base.querySelectorAll(target), (elm)=> elm.offsetWidth > 0 && elm.offsetHeight > 0);
                case 'checked': return Array.prototype.filter.call(document.querySelectorAll(selector), (elm)=> elm.checked);
                case 'selected': return Array.prototype.filter.call(base.querySelectorAll(target), (elm)=> elm.selected);
                case 'action': {
                    let found = base.querySelectorAll(target);
                    if (found && found.length > 0 && data.action) {
                        found.forEach((_elm)=> this.jsAction(_elm, {action: data.action, actionData: data.actionData}));
                    }
                    return found;
                }
                break;
                default: return base.querySelector(target);  
            }
        }
        return [];
    }

    // Select all using query selectors and perform action both
    selectAll(selector, action, actionData) {
        let selected = this.isExtraSelectors(action, actionData) ? this.selectAction(selector, action) : (typeof selector == 'object' ? selector : document.querySelectorAll(selector));
        if (selected && selected.length > 0 && action) {
            Array.prototype.forEach.call(selected, (elm)=> this.jsAction(elm, {action, actionData}));
        }
        return selected;
    }

    isExtraSelectors(action, actionData) {
        if (this.extraSelectors.includes(action)) {
            return (action == "checked" && typeof actionData != 'undefined') ? false : true;
        }
        return false;
    }

    // Select and enhance selector like jquery
    select(selector, action, actionData) {
        if (this.isExtraSelectors(action, actionData)) {
            return this.selectAction(selector, action);
        } else {
            selector = (typeof selector == 'object') ? selector : document.querySelector(selector);
            if (selector) {
                this.jsAction(selector, {action, actionData});
            }
            return  selector || {};
        }
    }

    getElm(selector, type) {
        return document.getElementById(selector) || {};
    }

    // Listen all node with events
    listenAll(target, eventName, func) {
        let selected = (typeof target == "object") ? target : document.querySelectorAll(target);
        if (selected && selected.length > 0) {
            for (let i = 0; i < selected.length; i++) {
                selected[i].addEventListener(eventName, func, false);
            }
        }
    }

    // bind event directly on nodes
    bind(selector, eventName, handler) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (selected) {
            selected.addEventListener(eventName, handler);
        }
    }

    // Listen target with in base node listner
    listen(baseSelector, eventName, selector, handler) {
        let base = (typeof baseSelector == "object") ? baseSelector : document.querySelector(baseSelector);
        if (!base) return false;
        if (globalThis.eventTracker[selector]) {
            base.removeEventListener(eventName, globalThis.eventTracker[selector]);
        }
        globalThis.eventTracker[selector] = this.onListen.bind(this, selector, handler, base);
        base.addEventListener(eventName, globalThis.eventTracker[selector]);
    }

    // remove node classes
    removeClass(selector, name) {
        let selected = (typeof selector == "object") ? selector : document.querySelectorAll(selector);
        if (selected && selected.length > 0) {
            Array.prototype.forEach.call(selected, (elm)=> this.jsAction(elm, {action: 'removeClass', actionData: name}));
        }
        return selected || {};
    }
    // add class for node
    addClass(selector, name) {
        let selected = (typeof selector == "object") ? selector : document.querySelectorAll(selector);
        if (selected && selected.length > 0) {
            Array.prototype.forEach.call(selected, (elm)=> this.jsAction(elm, {action: 'addClass', actionData: name}));
        }
        return selected || {};
    }

    // dom visibility handle
    toggleDom(dom, action="toggleDisplay") {
        let selected =  typeof dom == "object" ? dom : document.querySelectorAll(dom);
        if (selected && selected.length > 0) {
            Array.prototype.forEach.call(selected, (elm)=> this.jsAction(elm, {action}) );
        }
        return selected || {};
    }

    // alterntive of $.select2
    select2(selecor) {
        let found = document.querySelector(`${selecor} + span > .selection > span`);
        if (found) {
            found.click();
        }
    }

    // Set dataset on element
    setData(selector, attrs) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (selected) {
            for (let property in attrs) {
                selected.dataset[property] = attrs[property];
            }
        }
        return selected || {};
    }

    // Set dataset on element
    getData(selector, attr) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        return selected?.dataset[attr] || {};
    }

    // manage attr using object
    setAttr(selector, attrs) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (selected) {
            for (let property in attrs) {
                selected.setAttribute(property, attrs[property]);
            }
        }
        return selected || {};
    }

    // add css using object
    setCss(selector, cssList) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (selected) {
            for (let property in cssList) {
                selected.style && (selected.style[property] = cssList[property]);
            }
        }
        return selected || {};
    }

    //alternative of $.remove
    remove(dom) {
        let selected =  document.querySelectorAll(dom);
        if (selected.length > 0) {
            Array.prototype.forEach.call(selected, (elm)=> elm.remove() );
        }
    }

    // alternive of $.replaceWith
    replaceWith(selector, domStr) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (selected) {
            let createdNode = this.templateHtml(domStr);
            selected.replaceWith(createdNode);
            return createdNode;
        }
        return selected;

    }

    wrap(selector, domStr) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (selected) {
            let createdNode = this.templateHtml(domStr);
            let innerNode = this.innerChild(createdNode);
            innerNode.innerHTML = selected.outerHTML;
            selected.parentNode.replaceChild(createdNode, selected);
            return innerNode.firstChild;
        }
        return selected;
    }

    unwrap(selector) {
        let nodeToRemove = (typeof selector == "object") ? selector : document.querySelectorAll(selector);
        if (nodeToRemove && nodeToRemove.length > 0) {
            nodeToRemove.forEach((item)=> {
                item.outerHTML = item.innerHTML;
            })
        }
    }

    insertAfter(newNode, existingNode) {
        newNode = (typeof newNode == "object") ? newNode : document.querySelector(newNode);
        existingNode = (typeof existingNode == "object") ? existingNode : document.querySelector(existingNode);
        if (newNode && existingNode) {
            existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
        }
        return newNode;
    }

    // Insert using html string, need to provide position also
    insert(selector, domStr, position) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (selected) {
            switch (position) {
                case 'beforebegin': selected.insertAdjacentHTML('beforebegin', domStr);
                break;
                case 'afterbegin': selected.insertAdjacentHTML('afterbegin', domStr);
                break;
                case 'beforeend': selected.insertAdjacentHTML('beforeend', domStr);
                break;
                case 'afterend': selected.insertAdjacentHTML('afterend', domStr);
                break;
            }
        }
        return selected || {};
    }

    // provide dom index like $.index
    domIndex(selector) {
        let selected = (typeof selector == "object") ? selector : document.querySelector(selector);
        if (selected) {
            return Array.from( selected.parentNode.children ).indexOf( selected );
        } else {
            return -1;
        }
    }

    // compare selector in base node
    match(baseSelector, mathStr) {
        let base = (typeof baseSelector == "object") ? baseSelector : document.querySelector(baseSelector);
        let matched = [];
        if (base && base.length > 0 ) {
            Array.prototype.forEach.call(base, (elm)=> {
                if (elm.matches(mathStr)) matched.push(elm);
            });
        } else {
            return base && base.matches(mathStr);
        }
        return matched;
    }

    // check selector in base node
    contains(selector, text) {
        let elements = (typeof selector == "object") ? selector : document.querySelectorAll(selector);
        if (elements && elements.length > 0) {
            return [].filter.call(elements, function(element) {
                return RegExp(text).test(element.textContent);
                });
        } else {
            return [];
        }
    }

    // merge two object like $.extend
    extend() {
        //This function are alternative of $.extend which merge content of objects into first one
        // To create deep copy pass true as first argument
        let extended = {};
        let deep = false;
        let i = 0;
        let length = arguments.length;
        // Check if a deep merge
        if ( Object.prototype.toString.call( arguments[0] ) === '[object Boolean]' ) {
            deep = arguments[0];
            i++;
        }
        // Merge the object into the extended object
        const merge = function (obj) {
            for ( let prop in obj ) {
                if ( Object.prototype.hasOwnProperty.call( obj, prop ) ) {
                    // If deep merge and property is an object, merge properties
                    if ( deep && Object.prototype.toString.call(obj[prop]) === '[object Object]' ) {
                        extended[prop] = extend( true, extended[prop], obj[prop] );
                    } else {
                        extended[prop] = obj[prop];
                    }
                }
            }
        };
        // Loop through each object and conduct a merge
        for ( ; i < length; i++ ) {
            let obj = arguments[i];
            merge(obj);
        }
        return extended;
    }

    // return querystring as object
    url (url) {
        url = url || (typeof window == 'object' ? window.location.href : "")
        return new URLSearchParams(url);
    }

    updateEditorUrl(data) {
        let newUrl = `?action=new&content_subtype=${data.subtype}&content_type=${data.type}&content_icon=${data.content_icon}&react_content=1`;
        window.history.replaceState(null, '', newUrl);
    }

    getUrlVars() {
        let vars = [], hash;
        let hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (let i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }

    setApiKey(token) {
        globalThis.apiAccessToken = token;
    }

    validateAjaxData(ajaxData, subtype) {
        if (subtype == 0 || subtype == 8) {
            if (ajaxData && !this.get('is_proposed')) {
                if (ajaxData.content_text) {
                    try {
                        ajaxData.content_text.answers.forEach((item,index)=> {
                            ajaxData.content_text.answers[index].answer =  item.answer.replace(/\n/g, "");
                        });
                    } catch(e) {
                        console.log(e);
                        let tempAjaxData = {
                            answers: [
                                {
                                    is_correct: "0",
                                    answer: "Option A.",
                                    id: "01"
                                },
                                {
                                    is_correct: "0",
                                    answer: "Option B.",
                                    id: "02"
                                },
                                {
                                    is_correct: "0",
                                    answer: "Option C.",
                                    id: "03"
                                },
                                {
                                    is_correct: "0",
                                    answer: "Option D.",
                                    id: "04"
                                },
                            ],
                            correct_ans_str: "D",
                            total_answers: 4,
                            correct_answers: 1
                        };
                        return tempAjaxData;
                    }
                    //console.log(ajaxData.content_text.answers);
                    return ajaxData.content_text;
                }
                return ajaxData;
            } else {
                let tempAjaxData = {
                    answers: [
                        {
                            is_correct: "0",
                            answer: "Option A.",
                            id: "01"
                        },
                        {
                            is_correct: "0",
                            answer: "Option B.",
                            id: "02"
                        },
                        {
                            is_correct: "0",
                            answer: "Option C.",
                            id: "03"
                        },
                        {
                            is_correct: "0",
                            answer: "Option D.",
                            id: "04"
                        },
                    ],
                    correct_ans_str: "D",
                    total_answers: 4,
                    correct_answers: 1
                };
                return tempAjaxData;
            }
        }
        return ajaxData;
        
    }
    
    // watch if dom changes
    watchDom(target, func, options={childList: true}) {
        let observer = new MutationObserver(function (mutationRecords) {
                //if (mutationRecords[0].addedNodes[0].nodeName === "SPAN")
                func && func(mutationRecords);
            });
        observer.observe(target, options);
        return observer;
    }

    // revert if enity blocked by html
    ignoreEnity(html) {
        return html.replace(/&amp;/g,'&');
    }

    // cahce funciton to avoid repated outputs
    cache(func) {
        var chacheData = new Map();
        return function(input) {
            if(chacheData.has(input)) {
                return chacheData.get(input);
            }

            var newResult = func(input);
            chacheData.set(input,newResult);

            return newResult;
        }
    }

    // store data
    set(key, value) {
        if (typeof globalThis == 'object') globalThis.JUITemp[key] = value;
    }

    // get data from store
    get(key) {
        return globalThis.JUITemp[key];
    }

    // find caller
    caller() {
        console.log("called from " + arguments.callee.caller.toString());
    }

    // show warnign messages
    showmsg(msg, time = 10000) {
        let errorAlert = document.querySelector("#showMsgAlert");
        if (this.buffer['showmsg']) clearTimeout(this.buffer['showmsg']);
        if (errorAlert) {
            errorAlert.classList.add('show');
            this.select("#showMsgBody").innerHTML = msg;
        } else {
            this.insert(document.body, this.getModalHtml(msg, 'Alert'), 'beforeend');
        }
        setTimeout(()=> {
            let alterRef= this.getBS(document.querySelector("#showMsgAlert"), 'Alert');
            alterRef.close && alterRef.close();
        }, time)
    }

    alert(msgData) {
        if (document.getElementById('showBSModal')) {
            this.getBS("#showBSModal", 'Modal').show();
            this.select("#showBSBody").innerHTML = msgData|| "No msg provided...";
        } else {
            this.insert(document.body, this.getModalHtml(msgData, 'showBSModal'), 'beforeend');
            this.getBS("#showBSModal", 'Modal').show();
        }
    }

    formatXml(xml, cdata_format) {
        let cdata = cdata_format || false;
        let reg = /(>)(<)(\/*)/g;
        let wsexp = / *(.*) +\n/g;
        let contexp = /(<.+>)(.+\n)/g;
        let old_cdata = cdata ? xml.match(/<!--\[CDATA\[[\s\S]*?\]\]-->/gim) : "";
        xml = xml.replace(/\t/g, '').replace(reg, '$1\n$2$3').replace(wsexp, '$1\n').replace(contexp, '$1\n$2');
        if (cdata) {
            let new_cdata = xml.match(/<!--\[CDATA\[[\s\S]*?\]\]-->/gim);
            xml = xml.replace(new_cdata, old_cdata);
        }
        let formatted = '';
        let lines = xml.split('\n');
        let indent = 0;
        let lastType = 'other';
        // 4 types of tags - single, closing, opening, other (text, doctype, comment) - 4*4 = 16 transitions
        let transitions = {
            'single->single': 0,
            'single->closing': -1,
            'single->opening': 0,
            'single->other': 0,
            'closing->single': 0,
            'closing->closing': -1,
            'closing->opening': 0,
            'closing->other': 0,
            'opening->single': 1,
            'opening->closing': 0,
            'opening->opening': 1,
            'opening->other': 1,
            'other->single': 0,
            'other->closing': -1,
            'other->opening': 0,
            'other->other': 0
        };
    
        for (let i = 0; i < lines.length; i++) {
            let ln = lines[i];
            if (ln != '') {
                let single = Boolean(ln.match(/<.+\/>/)); // is this line a single tag? ex. <br />
                let closing = Boolean(ln.match(/<\/.+>/)); // is this a closing tag? ex. </a>
                let opening = Boolean(ln.match(/<[^!].*>/)); // is this even a tag (that's not <!something>)
                let type = single ? 'single' : closing ? 'closing' : opening ? 'opening' : 'other';
                let fromTo = lastType + '->' + type;
                lastType = type;
                let padding = '';
    
                indent += transitions[fromTo];
                for (let j = 0; j < indent; j++) {
                    padding += '\t';
                }
                if (fromTo == 'opening->closing')
                    formatted = formatted.substr(0, formatted.length - 1) + ln + '\n'; // substr removes line break (\n) from prev loop
                else
                    formatted += padding + ln + '\n';
            }
        }
        return formatted;
    }

    getModalHtml(data, type) {
        switch(type) {
            case 'Alert' : 
                return (`
                    <div id="showMsgAlert" class="alert alert-warning alert-dismissible text-center fade show" role="alert" style="z-index:9999;min-height:50px;position:fixed;width:100%;">
                        <span id="showMsgBody">${data}</span>
                        <button type="button" class="btn-close" style="margin-top: -3px;" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `)
            case 'showBSModal':
              return(`
                    <div class="modal fade" id="showBSModal" tabindex="-1" aria-labelledby="Alert" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" id="showBSDialog">
                            <div class="modal-content">
                                <div class="modal-body text-center fs-5 pt-4" id="showBSBody">
                                    ${data}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-light m-auto text-dark" data-bs-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>`
                );
            default : return "<div>Nothing</div>";
        }

    }

    // check data validity
    isValid(data, filter = false) {
        if (data && data != undefined && data != "" && data != "undefined" && data != null) {
            return true;
        } else {
            if (filter && data != filter) return true;
            return false;
        }
    }

    // store algo
    store(target,data) {
    }

    // convert query from objects
    query(data) {
        var inf = 'item_error_log=1';
            if (typeof (data) == 'object') {
                for (let key in data) {
                if (typeof data[key] != 'object') {
                    inf += "&" + key + "=" + data[key];
                }	
            }
        }
        return inf;
    }
    
    // show activator
    activate(loader) {
        document.querySelector('#activateLoaderContainer') && document.querySelector('#activateLoaderContainer').remove(); 
        if (loader > 0) {
            this.insert(document.body, `<div id="activateLoaderContainer" class="activateOverlay" style="z-index:9999999;"><center><div class="activator" style="height:100px; width: 100px;"></div></center></div>`, 'afterend');
        }
    }
    
    // listner callback
    onListen(selector, handler, base, event) {
        let target = event.target; //|| event.relatedTarget || event.toElement;
        let closest = target.closest && target.closest(selector);
        if (closest && base.contains(closest)) {
            // passes the event to the handler and sets `this`
            // in the handler as the closest parent matching the
            // selector from the target element of the event
            handler.call(this, closest, event);
        }
    }

    isFocus(target) {
        let selected = typeof target == 'object' ? target : document.querySelector(target);
        if (selected == document.activeElement) {
            return true;
        }
        return false;
    }
    
    // find inner child in dom
    innerChild(node) {
        let currentNode = (typeof node == "object") ? node : document.querySelector(node);
        let result = currentNode;
        if (currentNode && currentNode.lastChild) {
            currentNode = currentNode.lastChild;
            while ( currentNode ) {
                result = currentNode;
                currentNode = currentNode.lastChild;
            }
        }
        
        return result;
    }
    
    // parse html into template and reurn nodes
    templateHtml(html) {
        let t = document.createElement('template');
        t.innerHTML = html;
        return t.content.firstElementChild.cloneNode(true);
    }
    
    // action of selector
    selectAction(selector, type) {
        switch (type) {
            case 'hidden': return Array.prototype.filter.call(document.querySelectorAll(selector), (elm)=> elm.offsetWidth == 0 && elm.offsetHeight == 0);
            case 'visible': return Array.prototype.filter.call(document.querySelectorAll(selector), (elm)=> elm.offsetWidth > 0 && elm.offsetHeight > 0);
            case 'selected': return Array.prototype.filter.call(document.querySelectorAll(selector), (elm)=> elm.selected);
            case 'checked': return Array.prototype.filter.call(document.querySelectorAll(selector), (elm)=> elm.checked);
            case 'enabled': return document.querySelectorAll(selector + ':not([disabled]');
            case 'children': return document.querySelector(selector).children;
            case 'childNodes': return document.querySelector(selector).childNodes;
            default: return document.querySelector(selector);  
        }
    }
    
    // handle inline actions of js
    jsAction(selected, data) {
        switch(data.action) {
            case 'show': selected.style.display = data.actionData || "";
            break;
            case 'hide': selected.style.display = "none";
            break;
            case 'toggleDisplay': selected.style.display = (selected.style.display == "none") ? "block" : "none";
            break;
            case 'addClass': typeof data.actionData == "object" ? selected.classList.add(...data.actionData) : selected.classList.add(data.actionData);
            break;
            case 'removeClass': typeof data.actionData == "object" ? selected.classList.remove(...data.actionData) : selected.classList.remove(data.actionData);
            break;
            case 'toggleClass': selected.classList.toggle(data.actionData);
            break;
            case 'html' : selected.innerHTML = data.actionData;
            break;
            case 'value': selected.value = data.actionData;
            break;
            case 'text': selected.textContent = data.actionData;
            break;
            case 'checked':  selected.checked = data.actionData;
            break;
            case 'remove': selected.remove();
            break;
            case 'removeAttr': selected.removeAttribute(data.actionData);
            break;
            case 'css' : this.setCss(selected, data.actionData);
            break;
            case 'attr': this.setAttr(selected, data.actionData);
            break;
            case 'data': this.setData(selected, data.actionData);
            break;
            case 'getData': this.getData(selected, data.actionData);
            break;
        }
    }
} 
export class Draggable extends JUI {
    constructor(options) {
        super();
        this.options = options || {};
        this.events = {
            "drag" : this.onDrag.bind(this), 
            "dragend": this.onDragEnd.bind(this), 
            "dragenter": this.onDragEnter.bind(this), 
            "dragexit": this.onDragExit.bind(this), 
            "dragleave": this.onDragLeave.bind(this), 
            "dragover": this.onDragOver.bind(this), 
            "dragstart": this.onDragStart.bind(this), 
            "drop": this.onDrop.bind(this),
        };
        this.init();
        this.currentDrag = "";
        this.dragState = true;
    }

    init() {
       for (let name in this.events) {
           if (this.events[name]) {
                document.removeEventListener(name, this.events[name], true);
                document.addEventListener(name, this.events[name], true);
           }
       }
    }

    setDrag(target) {
        let selected = (typeof target == 'object') ? target : document.querySelector(target);
        //selected.setAttribute('dragable', 1);
        selected.setAttribute('draggable', true);
    }

    setDrop(target) {
        let selected = (typeof target == 'object') ? target : document.querySelector(target);
        selected.setAttribute('dropzone', 1);
    }

    disableDrag(target) {
        let selected = (typeof target == 'object') ? target : document.querySelector(target);
        if (selected) {
            selected.removeAttribute(['dragable','draggable']);
            selected.classList.remove('dragable')
        }
    }

    enableDrag(target) {
        let selected = (typeof target == 'object') ? target : document.querySelector(target);
        if (selected) {
            selected.setAttribute('dragable', 1);
            selected.setAttribute('draggable', true);
            selected.classList.add('dragable')
        }
    }

    //This event is fired when an element or text selection is being dragged.
    onDrag(event) {
        // calling user defined function
        if (this.options.onDrag) this.options.onDrag(event);
    }
        
    //This event is fired when an element is no longer the drag operation's immediate selection target
    onDragExit(event) {
        if (this.dragState) {
            // calling user defined function
            if (this.options.onDragExit) this.options.onDragExit(event);
        }
    }

    //This event is fired when a dragged element or text selection enters a valid drop target.
    onDragEnter(event) {
        // highlight potential drop target when the draggable element enters it
        if ( this.dragState && this.isValidDrop(event) ) {
            // calling user defined function
            if (this.options.onDragEnter) this.options.onDragEnter(event);
        }

    }

    //This event is fired when the user starts dragging an element or text selection.
    onDragStart(event) {
        if (this.isValidDrag(event)) {
            this.dragState = true;
            // store a ref. on the dragged elem
            this.currentDrag = event.target;
            
            // make it half transparent
            event.target.style.opacity = .2;

            // calling user defined function
            if (this.options.onDragStart) this.options.onDragStart(event);
        } else {
            this.dragState = false;
            //event.dataTrasfer.dropEffect = 'none'
        }
    }

    //This event is fired when a dragged element or text selection leaves a valid drop target.
    onDragLeave(event) {
        // reset background of potential drop target when the draggable element leaves it
        if ( this.dragState && this.isValidDrop(event) ) {
            // calling user defined function
            if (this.options.onDragLeave) this.options.onDragLeave(event, this.currentDrag);
        }
    }

    //This event is fired continuously when an element or text selection is being dragged and 
    //the mouse pointer is over a valid drop target (every 50 ms WHEN mouse is not moving 
    //ELSE much faster between 5 ms (slow movement) and 1ms (fast movement) approximately
    onDragOver(event) {
        // prevent default to allow drop
        event.preventDefault();

        // calling user defined function
        if (this.options.onDragOver) this.options.onDragOver(event, this.currentDrag);
    }

    //This event is fired when a drag operation is being ended (by releasing a mouse button or hitting the escape key)
    onDragEnd(event) {
        // reset the transparency
        event.target.style.opacity = "";

        // calling user defined function
        if (this.options.onDragEnd) this.options.onDragEnd(event, this.currentDrag);
    }

    //This event is fired when an element or text selection is dropped on a valid drop target.
    onDrop(event) {
        // prevent default action (open as link for some elements)
        event.preventDefault();
        // move dragged elem to the selected drop target
        if (this.dragState && this.isValidDrop(event) ) {
            //event.target.style.background = "";
            if (this.options.remove) this.currentDrag.parentNode.removeChild( this.currentDrag );
            if (this.options.copy) event.target.appendChild( this.currentDrag.cloneNode(true) );
            // calling user defined function
            if (this.options.onDrop) this.options.onDrop(event, this.currentDrag);
            //.draggable('destroy');
        }
    }

    isValidDrop(event) {
        if (event.target.getAttribute('dropzone') || event.target.classList.contains('dropable') || this.parent(event.target, "[dropzone]") || this.parent(event.target, ".dropable") ) {
            return true;
        } else {
            return false;
        }
    }

    isValidDrag(event) {
        if (event.target.getAttribute('dragable') || event.target.getAttribute('draggable') || this.parent(event.target, "[dragable]")) {
            return true;
        } else {
            return false;
        }
    }

}

export const JS = new JUI();