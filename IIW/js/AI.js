/**
 *  File Name   : ReactItem.js
 *  Author      : Pradeep Yadav
 *  Function    : ReactItem
 *  Version     : 1.0
 *  Packege     : pe-items.lib
 *  Last update : 28 May 2019
 *  Dependency  : No any dependency ( Core javascript library )
 */
var trackInf = {};
var logInf = [];
var filterData = false;
var isTrack = false;
var temp = 0;
var itemTime = "";
var isTrace = false;
var _this = null;
var router = {};
function ReactItem() {
    window.AI = {};
    var local = this;
    return({
        test:function(status) {
            isTrack = status;
        },
        ignoreEnity: function(html) {
            return html.replace(/&amp;/g,'&');
        },
        find: function(target, type) {
            var res = "Target Not Found.";
            if (type) {
                switch (type) {
                    case 'all' : res = document.querySelectorAll(target);
                    break;
                    case 'child' : res = document.querySelector(target).childNodes;
                    break;
                }
            } else {
                res = document.querySelector(target);
            }
            return res;
        },
        cache: function(func) {
            var chacheData = new Map();
            return function(input) {
                if(chacheData.has(input)) {
                    return chacheData.get(input);
                }

                var newResult = func(input);
                chacheData.set(input,newResult);

                return newResult;
            }
        },
        set:function(key, value) {
            window.AI[key] = value;
        },
        get: function(key) {
            return window.AI[key];
        },
        isValid: function(data, filter = false) {
            if (data && data != undefined && data != "" && data != "undefined" && data != null) {
                return true;
            } else {
                if (filter && data != filter) return true;
                return false;
            }
        },
        get_card: function(data) {
            var html = "<div class='row'>";
            for(var item of data) {
                html += `
                    <div class="card p-3 col-12 col-md-6 col-lg-4">
                        <div class="card-wrapper">
                            <div class="card-img">
                                <img src="${item.post_image}" alt="card ${item.post_image}" media-simple="true">
                            </div>
                            <div class="card-box">
                                <h4 class="card-title mbr-fonts-style display-7">
                                    ${item.post_title}
                                </h4>
                                <p class="mbr-text mbr-fonts-style display-7">
                                    ${item.post_content}                 
                                </p>
                            </div>
                            <div class="mbr-section-btn text-center">
                                <a href="post.php?post_id=${item.id}" class="btn btn-primary display-4">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                `;
            }
            html += "</div>";

            return html;
        },
    });
}
