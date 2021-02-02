# JUI <javascript helper>
Pure javascript based package, with no dependencies

#### Intro

> The JUI package is build to provide alternative of jQuery features and dragables.
> - Intregated JQ like features.
> - JS based dragble feature.
> - API calling and integartion methods using Ajax.
> - And.. many other features :)



#### Browser Support

| <img src="http://suneditor.com/docs/chrome-64.png" alt="Chrome" width="16px" height="16px" /> Chrome | <img src="http://suneditor.com/docs/mozilla-64.png" alt="Firefox" width="16px" height="16px" /> Firefox | <img src="http://suneditor.com/docs/opera-64.png" alt="Opera" width="16px" height="16px" /> Opera | <img src="http://suneditor.com/docs/safari-64.png" alt="Safari" width="16px" height="16px" /> Safari | <img src="http://suneditor.com/docs/edge-64.png" alt="Edge" width="16px" height="16px" /> Edge | <img src="http://suneditor.com/docs/explorer-64.png" alt="Explorer" width="16px" height="16px" /> Internet Explorer |
|:---:|:---:|:---:|:---:|:---:|:---:|
| Yes | Yes | Yes | Yes | Yes | 11+ |

## Install
#### Npm
``` sh
$ npm install javscript_helper --save
or
$ npm i javscript_helper
```

## Getting Started
### 1. Create your React or any JS absed framework file.

### 2. Import JUI.js from package
```
/**
* Default Export : 'JUI'
* Dragable : 'Dragable feature'
* API : 'class for api mthods (can overwrite)'
* construtor : accpet object as default options
*/
// ID or DOM object
import JUI from 'JUI';
const JS = new JUI({});

//Syntax:
// action may be ['show', 'hide', 'toggleDisplay', 'addClass', 'removeClass' 
// 'toggleClass', 'html', 'value', 'text', 'checked', 'remove', 'removeAttr' and 'css'].
// actionData will be data which need to set on that action. It may be object or string depends upon action
// Ex: css take object to set css on elements while html need string to set.
JS.selectAll(selector, action, actionData);

// Use selector for class without anyother action.
// This will return an array of found elements
JS.selectAll('#test');
// To set multiple classes
JS.selectAll(".test", 'addClass', ['help', 'note']);
// To set single class
JS.selectAll(".test", 'addClass', 'note');
// To set innerHTML like $().html()
JS.selectAll(".test", 'html', "<p>test html</p>');
// To set multiple css on selected elements
JS.selectAll(".test", 'css', {border: "1px solid red", color: '#fff'});

// Find target node into base node and some extra selectors and 
// It also handle other action with data as {action: 'addClass',actionData: 'test'}
// action may be ['show', 'hide', 'toggleDisplay', 'addClass', 'removeClass' 
// 'toggleClass', 'html', 'value', 'text', 'checked', 'remove', 'removeAttr' and 'css'].
// data argument can carry Object as mention above or ['hidden', 'visible', 'selected', 'checked', 'enabled'] to provide extra selectors
JS.find(baseSelector, target, data );
 a) JS.find(baseSelector, targetSelector, 'all') // to return all matched.
 b) JS.find(baseSelector, targetSelector, 'checked')// to return all checked
 c) JS.find(baseSelector, targetSelector, {action:'html', actionData: 'hello user'}); // To set html in find elements.
 d) JS.find(baseSelector, targetSelector, {action:'css', actionData: {background: 'red'} }); // To set html in find elements.

// Alternative of $('baseSelector').on('eventName', 'targetSelector, function() {});
JS.listen('baseSelector', 'eventName', 'targetSelector', (_this, event) {});

// Bind listenr on all node like classname
JS.listenAll(target, eventName, func);

// bind event directly on nodes
JS.bind(selector, eventName, handler);
  
// alternative of $.select2
JS.select2  

// To set attributes
JS.setAttr('selector', {attrName: value,..});

// Alternive of $.replaceWith
JS.replaceWith('selector', 'domStr');

// To use $.wrap
JS.wrap('selector', 'domStr');

// Insert at given position like $.append()
JS.insert('selector', 'domStr', 'position like afterend');

// Use object merge like $.extend
JS.extend(obj1, obj2);

// To get aueryString from object
JS.param2Url(paramsObj);

// Provide unique in array
JS.unique(arrayData);

// To get html node from string 
JS.parseDom('string');

// To add script data or load from url
JS.addScript(data, 'url');

// To genrate css links
JS.createLink(path);

// To check target selector is present in base selector/dom
JS.hasInall(selector, target);

// remove multiple Attribute of DOM
JS.removeDomAttr(selector, attrArray);

// To trigger events
JS.trigger('eventName');

// To find in children of selected node
JS.findChild(selector, search);

// To find parent or any selector in parent like $.parent
JS.parent('baseSelector', 'targetSelector');

// To find in sibiling or return imediate
JS.siblings(selector, search);

// To find in next element or return all
JS.nextAll(selector);

// TO find in next element 
JS.nextElm(selector, search);

// find in previous element
JS.prevElm(selector, 'searchSelector');

// To create element from string and set html from string
JS.create(tagName, html);

// To clone node 
JS.clone('selector');

// To setrialize form nodes
JS.serialize(selector);

// To empty dom I.e $.empty()
JS.empty(selector);

// If bootstrap5 added then to get bootstrap5 instance accoridng to compoenent
JS.getBS(target, comp, options);

// To use ajax i.e $.ajax
JS.ajax(sendData);

// get script from url
JS.getJSON(url);

// $.offset alternative
JS.offset(container);

// To comapre two array
JS.inArray(baseArray, compareArray);

// To compare selector in base node
JS.match(baseSelector, matchStr);

// To check selector in base node
JS.contains(selector, text);

// To cahce funciton to avoid repated outputs
JS.cache(func);

// To Check data validity
JS.isValid(data, filter = false)

//To find inner child in dom
JS.innerChild(node);
```
### 2. Import dragable from JUI
```
// To enable draggable  on dom 
// Use dragable = "1" attribute where you want to enable dragging
// Use dropzone = "1" to define valid dropable doms.
 import { Draggable } from 'JUI';

 // you can use drag cycle to access your functions
 let dnd = new Draggable({
   onDrag:()=>{},
   onDragStart:()=>{},
   onDragEnter:()=>{},
   onDragEnd:()=>{},
   onDragLeave:()=>{},
   onDragExit:()=>{},
   onDrafOver:()=>{},
   onDrop:()=>{}
 })

```
### 2. Import JStore from JUI
```
// To use web storage using JUI 
// Use {session:"1"} in default option to use sessionStorage by default it will use localStorage

import {JStore} from 'JUI';
let hdd = new JStore({});
//When passed a number n, this method will return the name of the nth key in the storage.
hdd.key(n);

//When passed a key name, will return that key's value.
hdd.get(name);

//When passed a key name and value, will add that key to the storage, or update that key's value if it already exists.
hdd.set(name, value);

//When passed a key name, will remove that key from the storage.
hdd.remove(name);

// To clear all stored data from stroage
hdd.clearAll();

```

## License
javascript is opensource package.

for request feaures and suggestions please report issues.
