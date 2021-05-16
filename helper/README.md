# JUI <javascript helper>
Pure javascript based package, with no dependencies

#### Intro

> The JUI package is build to provide alternative of jQuery features and dragables.
> - Intregated JQ like features.
> - JS based dragble feature.
> - API calling and integartion methods using Ajax (can overided servers).
> - Tag view feature for input type text boxes



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
To Update:
npm i javscript_helper@latest
```

## Getting Started
### 1. Create your React or any JS absed framework file.

### 2. Import JUI.js from package
```
/**
* Modules : JUI (Default export), Dragable, JStore, API (need to overide servers inside)
* construtor : accpet object as default options
*/

// ID or DOM object
import JUI from 'JUI';
const JS = new JUI();

//Syntax:- JS.select and JS.selectAll
// action may be ['show', 'hide', 'toggleDisplay', 'addClass', 'removeClass' 
// 'toggleClass', 'html', 'value', 'text', 'checked', 'remove', 'removeAttr', 'attr' and 'css'].
// actionData will be data which need to set on that action. It may be object or string depends upon action
// Ex: css take object to set css on elements while html need string to set.
JS.selectAll(selector, action, actionData);

// Use selector for class without anyother action.
// This will return an array of found elements
JS.selectAll('#test');
// To get all selected visible elements
JS.selectAll(".test", 'visible');
// To get all selected hidden elements
JS.selectAll(".test", 'hidden');
// To set multiple classes
JS.selectAll(".test", 'addClass', ['help', 'note']);
// To remove multiple attributes
JS.selectAll(".test", 'removeClass', ['help', 'note']);
// To set single class
JS.selectAll(".test", 'addClass', 'note');
// To remove single class
JS.selectAll(".test", 'removeClass', 'note');
// To remove elements
JS.selectAll(".test", 'remove');
// To set innerHTML like $().html()
JS.selectAll(".test", 'html', "<p>test html</p>');
// To set multiple css on selected elements
JS.selectAll(".test", 'css', {border: "1px solid red", color: '#fff'});
// To set multiple Attribute on selected elements
JS.selectAll(".test", 'attr', {zoom: 1, title: 'testing'});

Note: JS.select do samething also but it only select first matched elements only

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
 e) JS.find(baseSelector, targetSelector, 'visible') // to return all matched visible elements.

// To get all attributes of array of selected node and use second argument to return filter by this tag only.
JS.serializeArray(JS.find('body','span,p', 'visible'),'span');

// To show alert
JS.alert("Hello User");             

// To eneable Tag view in input type text box
a) add 'tagin' class in input type text
b) call JS.addTagViewCss() to append css of tagView
c) call to init tagView events JS.enableTagView({seprator: " "}) // 
   - Default options are {separator|duplicate|transform|placeholder}

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
// options:
a) withUrl : true // To send queryStirng with url
b) formData: true // To send formData directly in data ex: image upload
c) by default : It take object in data and create formData inside
JS.ajax(sendData);
// Example:
AH.ajax({
        url: baseUrl + "forms.php?func=upload_screen_shots&ajax=1&source=paste&index=0", 
        data: {
            type: "data",
            image: image
        },
    }).then((data)=> {
        let parsedData = JSON.parse(data);
        AH.select('[data-thumbnail ="'+ index +'"]').value = parsedData.url[0]['server'];
    }).catch((e)=> {
        JS.activate(0);
        JS.alert('File is not processed successfully, Please upload all the files again!');
    });

// get script from url
JS.getJSON(url);

// $.offset alternative
JS.offset(container);

//To find any value in an Array
JS.findInArray(value, baseArray);

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
// Use dragable = "1" or draggable = "true" attribute where you want to enable dragging
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

 // To enable dragable on custom DOMS
 dnd.enableDrag('selector');

 // To disable dragable on Custom DOMS
 dnd.disableDrag('selector');

 // To set Drag area for newly appended DOMS
 dnd.setDrag(target)

 // To set Drop area for newly appended DOMS
 dnd.setDrop(target)


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
javscript_helper is opensource package.

for request feaures and suggestions please report issues.
