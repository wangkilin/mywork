
/**
 * JS图片延迟加载
 * @constructor {DataLazyLoad}
 * @param object options 对象传参
 * @time 2016-04-12
 */
/**
 * 延迟加载的原理：滚动时：待加载的资源相对于游览器顶端的距离 - threshold <= 可视区域相对于浏览器顶端的距离 true 就加载
 * 否则的话 不加载
 * 支持上下滚动，左右滚动
 */
function DataLazyLoad(options){
	this.config = {
		container      : window,    // 容器 默认为window
		threshold      : 0,         // 离多少像素渲染图片
		effect         : 'fadeIn',  // 默认为show 也可以为fadeIn, slideDown 等 jQuery 自带的效果
		effectspeed    : 1000,      // 时间  
		source         : 'data-img',// 图片路径源
		skip_invisible : true       // 如果img标签为隐藏的 那么不强制加载
	};
	this.images = null; // 未替换路径的图片对象
	this.init(options);
 }
 
DataLazyLoad.prototype = {
	init: function(options){
		this.config = $.extend(this.config, options || {});
		var self = this, _config = self.config;
		
		// 滚动时(或者其他事件) 触发事件
		$(_config.container).on('scroll resize',function(){
			self._update();
		});
		self._update();
	},
	/**
	 * 加载对应的图片
	 */
	_eachImg: function(item, index) {
		var self = this, _config = self.config;
		if($(item).attr('isload') == 'false') {
			var dataImg = $(item).attr(_config.source), src = $(item).attr('src');
			$(item).attr('isload','true');
			$(item).on('load',function(){
				$(this).hide();
				$(this)[_config.effect](_config.effectspeed);
			});
			$(item).attr('src',dataImg);
			$(item).removeAttr(_config.source);
			this.images.splice(index, 1);// 删除已经替换的img，减少下次循环次数
		} 
	},
	/**
	 * 加载图片
	 */
	_update:function(){
		var self = this, _config = self.config;
		if (!this.images){
			if(_config.container === window) {
				this.images = $('img'); 
			}else {
				this.images = $('img',$(_config.container));
			}
		}
		
		this.images.each(function(index,item){
			if (!$(item).attr('isload')){
				$(item).attr('isload', 'false');
			}
			//如果图片没有data属性，则取消
			if(!$(item).attr(_config.source)) {
				return;
			}
			// 如果图片隐藏的 那么不强制加载
			if(_config.skip_invisible && !$('img').is(":visible")) {
				return;
			}
			if (self._abovethetop(item) || self._leftofbegin(item)) {
					
			} else if (self._belowthefold(item) && self._rightoffold(item)) {
				self._eachImg(item, index);
			} 
		});
	},
	/**
	 * 往下滚动时 判断待加载的元素是否在可视区域内
	 * @return bool
	 */
	_belowthefold: function(elem){
		var self = this, _config = self.config, fold;
		if(_config.container === window) {
			fold = $(window).height() + $(window).scrollTop();
		}else {
			fold = $(_config.container).offset().top + $(_config.container).height();
		}
		return fold >= $(elem).offset().top - _config.threshold;
	},
	/**
	 * 往右滚动时 判断待加载的元素是否在可视区域内
	 * @return bool
	 */
	_rightoffold: function(elem){
		var self = this, _config = self.config, fold;
		if(_config.container === window) {
			fold = $(window).width() + $(window).scrollLeft();
		}else {
			fold = $(_config.container).offset().left + $(_config.container).width();
		}
		return fold >= $(elem).offset().left - _config.threshold;
	},
	/**
	 * 往上滚动
	 * @return bool
	 */
	_abovethetop: function(elem){
		var self = this, _config = self.config, fold;
		if(_config.container === window) {
			fold = $(window).scrollTop();
		}else {
			fold = $(_config.container).offset().top;
		}
		return fold >= $(elem).offset().top + _config.threshold  + $(elem).height();
	},
	/**
	 * 往左滚动
	 * @return bool
	 */
	_leftofbegin: function(elem) {
		var self = this, _config = self.config, fold;
        if (_config.container === window) {
            fold = $(window).scrollLeft();
        } else {
            fold = $(_config.container).offset().left;
        }
        return fold >= $(elem).offset().left + _config.threshold + $(elem).width();
	}
};