/**
 * 动态绑定事件插件
 * 功能：根据元素的class动态绑定事件 .
 * 参数：cssPrefix  class前缀,默认“js_oradt”
 *       selector   选择绑定的html选择器,默认“.js_oradt”
 * html元素的class格式：前缀，事件，调用的方法，用下划线隔开。
 *                      例：①class ="js_oradt_click_hello"
 *                          ②class = "js_oradt_click_myObj.hello"
 *                          ③class = "js_oradt_click_$.myObj1.myObj"
 *                分别回调： ① function hello(){
 *                                     alert("hello")
 *                                     }
 *                           ②var myObj = {
 *                                  hello : function (param) {
 *                                      console && console.info(param.dom);
 *                                      console && console.info(param.event);
 *                                   }
 *                              };
 *                           ③ $.extend({
 *                                       myObj1 : myObj
 *                              });
 *                默认传给回调函数的参数是对象： {dom:dom,event:event}。
 *                  dom 为绑定的元素
 *                  event 为执行的事件对象
 *             $.autoLoadEvent(); $.autoLoadEvent(cssPrefix); $.autoLoadEvent(cssPrefix, selector);
 *     或      $(selector).autoLoadEvent(); $(selector).autoLoadEvent(cssPrefix);
 *
 */

var autoLoadEvent = {
    /**
     * 自动加载样式中定义的事件
     * @param cssPrefix string 事件样式css前缀
     * @param selector string 元素选择器
     */
    autoLoadEvent:  function(cssPrefix, selector){
        selector = typeof(selector)=='string' ? selector : '.js_oradt';//选择绑定的html选择器,默认“js_oradt”
        cssPrefix = typeof(cssPrefix)=='string' ? cssPrefix : 'js_oradt';//class前缀,默认“js_oradt”
        var re=eval("/^"+cssPrefix+"_[A-Za-z]+_[A-Za-z0-9$.]+$/");//正则
        var elementAll = typeof(this)=='object' ? this : $(selector);
        if (! elementAll.length) return; //没有获取到绑定元素返回
        var eventArr=[  //事件的集合
            "blur","change","click","dblclick","error","focus","keydown","keypress","keyup","mousedown",
            "mouseenter","mouseleave","mousemove","mouseout","mouseover","mouseup","resize","scroll","select",
            "submit","toggle","unload"
        ];
        elementAll.each(function(){   // 每个元素的所有className ，去重， 判断是否符合正则格式规则且包含触发事件。
            var arr= $(this).attr('class').split(" "); //分割className到数组
            var moreClass=new Array;//符合规则的className将要push到moreClass,用于去重
            for(var i=0; i<arr.length ; i++){ //循环单个class
                if( re.test(arr[i]) //判断正则匹配
                    && $.inArray(arr[i].split("_")[2],eventArr)>=-1 //判断事件是否在事件集合中
                    && $.inArray(arr[i],moreClass)==-1 //去重复
                ){
                    moreClass.push(arr[i]); //符合规则push到moreClass
                    var _classInfo = arr[i].split("_", 4);//分割className
                    try {
                        if (typeof(eval(_classInfo[3])) != 'function') continue; //判断调用的方法
                    } catch (E) {
                        continue;
                    }
                    $(this).on(_classInfo[2], function (evt) { //组装绑定事件
                        var dom=this;
                        var event=evt;
                        eval(_classInfo[3]+'({dom:dom,event:event})');//返回dom和event
                    });

                }
            }

        });

        return;

    }
};

(function($){
    // 扩展jQuery
    $.extend(autoLoadEvent); // 扩展函数
    $.fn.extend(autoLoadEvent); // 扩展对象
} )(jQuery);






