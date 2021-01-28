# JUI <javascript helper>
Pure javscript based package, with no dependencies

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
$ npm i javscript_helper
```

## Getting Started
### 1. Create your React or any JS absed framework file.

### 2. Import JUI.js from package
```
/**
* default Export : 'JUI'
* Dragable : 'Dragable feature'
* API : 'class for api mthods (can overwrite)'
* construtor : accpet object as default options
*/
// ID or DOM object
import JUI from 'JUI';
const JS = new JUI({});

// Use selector for class like
JS.selectAll('#test');

// To set js action like add multiple classes
JS.selectAll(".test",{action:'addClassl', actionData:['help', 'note']);

// alternative of $('baseSelector').on('eventName', 'targetSelector, function() {});
JS.listen('baseSelector', 'eventName', 'targetSelector', (_this, event) {});

// alternative of $.select2
JS.select2  

// To set attributes
JS.setAttr('selector', {attrName: value,..});

// alternive of $.replaceWith
JS.replaceWith('selector', 'domStr');

// To use $.wrap
JS.wrap('selector', 'domStr');

// Insert at given position like $.append()
JS.insert('selector', 'domStr', 'position like afterend');

// Use object merge like $.extend
JS.extend(obj1, obj2);

// Provide unique in array
JS.unique(arrayData);

// To get html node from string 
JS.parseDom('string');

// To add script data or load from url
JS.addScript(data, 'url');

// To check target selector is present in base selector/dom
JS.hasInall(selector, target)

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

// Find target node into base node and some extra selectors and 
// It also handle other action with data as {action: 'addClass',actionData: 'test'}
JS.find(baseSelector, target, data );

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
### 2. Import dragble from JUI
```
// To enable dragble on dom 
// Use drable="1" attribute where your want to denable dragging
// Use dropzone="1" to define valid dropable doms.
 import {Dragable} from 'JUI';

 // you can use drag cycle to access your functions
 let dnd = new Dragable({
   onDrag:()=>{},
   onDragStart:()=>{},
   onDragEnter:()=>{},
   onDragEnd:()=>{},
   onDragLeave:()=>{},
   onDragExit:()=>{},
   onDrafOver:()=>{},
   onDrop:()=>{}
 })

many other functions like that...
```
### 2. Import JStore from JUI
```
// To web storage using JUI 
// Use {session:"1"} in default option to use sessionStorage by default it will localStorage

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
