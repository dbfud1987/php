$(function(){

	$("#image_centercol").find("div#image_centercol_sub").each(function(){
			$(this).css({"border":"1px solid red","padding":"3px","float":"left","margin":"5px"})
	}).mouseover(function(){
			$(this).css({"border":"1px dotted red","padding":"3px","float":"left","margin":"5px"})
	}).mouseout(function(){
			$(this).css({"border":"1px solid red","padding":"3px","float":"left","margin":"5px"})
	})

    function e(a) {

        var b = a || window.event,
            c = [].slice.call(arguments, 1),
            f = 0,
            e = 0,
            g = 0,
            a = $.event.fix(b);

        a.type = "mousewheel";
        b.wheelDelta && (f = b.wheelDelta / 120);
        b.detail && (f = -b.detail / 3);
        g = f;
        b.axis !== void 0 && b.axis === b.HORIZONTAL_AXIS && (g = 0, e = -1 * f);
        b.wheelDeltaY !== void 0 && (g = b.wheelDeltaY / 120);
        b.wheelDeltaX !== void 0 && (e = -1 * b.wheelDeltaX / 120);
        c.unshift(a, f, e, g);
        return ($.event.dispatch || $.event.handle).apply(this, c)
    }

    var c = ["DOMMouseScroll", "mousewheel"];

    if ($.event.fixHooks) 
		for (var h = c.length; h;)
			$.event.fixHooks[c[--h]] = $.event.mouseHooks;

    $.event.special.mousewheel = {
        setup: function () {
            if (this.addEventListener)
				for (var a = c.length; a;)
					this.addEventListener(c[--a], e, false);
            else
				this.onmousewheel = e
        },
        teardown: function () {

            if (this.removeEventListener)
				for (var a = c.length; a;)
					this.removeEventListener(c[--a], e, false);
            else
				this.onmousewheel = null
        }
    };
    $.fn.extend({
        mousewheel: function (a) {
            return a ? this.bind("mousewheel", a) : this.trigger("mousewheel")
        },
        unmousewheel: function (a) {
            return this.unbind("mousewheel", a)
        }
    })
})