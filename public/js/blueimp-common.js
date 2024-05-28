!(function () {
    "use strict";
    function t(t, i) {
        var e;
        for (e in i) i.hasOwnProperty(e) && (t[e] = i[e]);
        return t;
    }
    function i(t) {
        if (!this || this.find !== i.prototype.find) return new i(t);
        if (((this.length = 0), t))
            if (
                ("string" == typeof t && (t = this.find(t)),
                t.nodeType || t === t.window)
            )
                (this.length = 1), (this[0] = t);
            else {
                var e = t.length;
                for (this.length = e; e; ) this[(e -= 1)] = t[e];
            }
    }
    (i.extend = t),
        (i.contains = function (t, i) {
            do {
                if ((i = i.parentNode) === t) return !0;
            } while (i);
            return !1;
        }),
        (i.parseJSON = function (t) {
            return window.JSON && JSON.parse(t);
        }),
        t(i.prototype, {
            find: function (t) {
                var e = this[0] || document;
                return (
                    "string" == typeof t &&
                        (t = e.querySelectorAll
                            ? e.querySelectorAll(t)
                            : "#" === t.charAt(0)
                            ? e.getElementById(t.slice(1))
                            : e.getElementsByTagName(t)),
                    new i(t)
                );
            },
            hasClass: function (t) {
                return (
                    !!this[0] &&
                    new RegExp("(^|\\s+)" + t + "(\\s+|$)").test(
                        this[0].className
                    )
                );
            },
            addClass: function (t) {
                for (var i, e = this.length; e; ) {
                    if (((e -= 1), !(i = this[e]).className))
                        return (i.className = t), this;
                    if (this.hasClass(t)) return this;
                    i.className += " " + t;
                }
                return this;
            },
            removeClass: function (t) {
                for (
                    var i,
                        e = new RegExp("(^|\\s+)" + t + "(\\s+|$)"),
                        s = this.length;
                    s;

                )
                    (i = this[(s -= 1)]).className = i.className.replace(
                        e,
                        " "
                    );
                return this;
            },
            on: function (t, i) {
                for (var e, s, n = t.split(/\s+/); n.length; )
                    for (t = n.shift(), e = this.length; e; )
                        (s = this[(e -= 1)]).addEventListener
                            ? s.addEventListener(t, i, !1)
                            : s.attachEvent && s.attachEvent("on" + t, i);
                return this;
            },
            off: function (t, i) {
                for (var e, s, n = t.split(/\s+/); n.length; )
                    for (t = n.shift(), e = this.length; e; )
                        (s = this[(e -= 1)]).removeEventListener
                            ? s.removeEventListener(t, i, !1)
                            : s.detachEvent && s.detachEvent("on" + t, i);
                return this;
            },
            empty: function () {
                for (var t, i = this.length; i; )
                    for (t = this[(i -= 1)]; t.hasChildNodes(); )
                        t.removeChild(t.lastChild);
                return this;
            },
            first: function () {
                return new i(this[0]);
            },
        }),
        "function" == typeof define && define.amd
            ? define(function () {
                  return i;
              })
            : ((window.blueimp = window.blueimp || {}),
              (window.blueimp.helper = i));
})(),
    (function (t) {
        "use strict";
        "function" == typeof define && define.amd
            ? define(["./blueimp-helper"], t)
            : ((window.blueimp = window.blueimp || {}),
              (window.blueimp.Gallery = t(
                  window.blueimp.helper || window.jQuery
              )));
    })(function (t) {
        "use strict";
        function i(t, e) {
            return void 0 === document.body.style.maxHeight
                ? null
                : this && this.options === i.prototype.options
                ? void (t && t.length
                      ? ((this.list = t),
                        (this.num = t.length),
                        this.initOptions(e),
                        this.initialize())
                      : this.console.log(
                            "blueimp Gallery: No or empty list provided as first argument.",
                            t
                        ))
                : new i(t, e);
        }
        return (
            t.extend(i.prototype, {
                options: {
                    container: "#blueimp-gallery",
                    slidesContainer: "div",
                    titleElement: "h3",
                    displayClass: "blueimp-gallery-display",
                    controlsClass: "blueimp-gallery-controls",
                    singleClass: "blueimp-gallery-single",
                    leftEdgeClass: "blueimp-gallery-left",
                    rightEdgeClass: "blueimp-gallery-right",
                    playingClass: "blueimp-gallery-playing",
                    slideClass: "slide",
                    slideLoadingClass: "slide-loading",
                    slideErrorClass: "slide-error",
                    slideContentClass: "slide-content",
                    toggleClass: "toggle",
                    prevClass: "prev",
                    nextClass: "next",
                    closeClass: "close",
                    playPauseClass: "play-pause",
                    typeProperty: "type",
                    titleProperty: "title",
                    urlProperty: "href",
                    srcsetProperty: "urlset",
                    displayTransition: !0,
                    clearSlides: !0,
                    stretchImages: !0,
                    toggleControlsOnReturn: !0,
                    toggleControlsOnSlideClick: !0,
                    toggleSlideshowOnSpace: !0,
                    enableKeyboardNavigation: !0,
                    closeOnEscape: !0,
                    closeOnSlideClick: !0,
                    closeOnSwipeUpOrDown: !0,
                    emulateTouchEvents: !0,
                    stopTouchEventsPropagation: !1,
                    hidePageScrollbars: !0,
                    disableScroll: !0,
                    carousel: !0,
                    continuous: !0,
                    unloadElements: !0,
                    startSlideshow: 0,
                    slideshowInterval: 5e3,
                    index: 0,
                    preloadRange: 2,
                    transitionSpeed: 400,
                    slideshowTransitionSpeed: void 0,
                    event: void 0,
                    onopen: void 0,
                    onopened: void 0,
                    onslide: void 0,
                    onslideend: void 0,
                    onslidecomplete: void 0,
                    onclose: void 0,
                    onclosed: void 0,
                },
                carouselOptions: {
                    hidePageScrollbars: !1,
                    toggleControlsOnReturn: !0,
                    toggleSlideshowOnSpace: !1,
                    enableKeyboardNavigation: !1,
                    closeOnEscape: !1,
                    closeOnSlideClick: !1,
                    closeOnSwipeUpOrDown: !1,
                    disableScroll: !1,
                    startSlideshow: 0,
                },
                console:
                    window.console && "function" == typeof window.console.log
                        ? window.console
                        : { log: function () {} },
                support: (function (i) {
                    function e() {
                        var t,
                            e,
                            s = n.transition;
                        document.body.appendChild(i),
                            s &&
                                ((t = s.name.slice(0, -9) + "ransform"),
                                void 0 !== i.style[t] &&
                                    ((i.style[t] = "translateZ(0)"),
                                    (e = window
                                        .getComputedStyle(i)
                                        .getPropertyValue(
                                            s.prefix + "transform"
                                        )),
                                    (n.transform = {
                                        prefix: s.prefix,
                                        name: t,
                                        translate: !0,
                                        translateZ: !!e && "none" !== e,
                                    }))),
                            void 0 !== i.style.backgroundSize &&
                                ((n.backgroundSize = {}),
                                (i.style.backgroundSize = "contain"),
                                (n.backgroundSize.contain =
                                    "contain" ===
                                    window
                                        .getComputedStyle(i)
                                        .getPropertyValue("background-size")),
                                (i.style.backgroundSize = "cover"),
                                (n.backgroundSize.cover =
                                    "cover" ===
                                    window
                                        .getComputedStyle(i)
                                        .getPropertyValue("background-size"))),
                            document.body.removeChild(i);
                    }
                    var s,
                        n = {
                            touch:
                                void 0 !== window.ontouchstart ||
                                (window.DocumentTouch &&
                                    document instanceof DocumentTouch),
                        },
                        o = {
                            webkitTransition: {
                                end: "webkitTransitionEnd",
                                prefix: "-webkit-",
                            },
                            MozTransition: {
                                end: "transitionend",
                                prefix: "-moz-",
                            },
                            OTransition: {
                                end: "otransitionend",
                                prefix: "-o-",
                            },
                            transition: { end: "transitionend", prefix: "" },
                        };
                    for (s in o)
                        if (o.hasOwnProperty(s) && void 0 !== i.style[s]) {
                            (n.transition = o[s]), (n.transition.name = s);
                            break;
                        }
                    return (
                        document.body
                            ? e()
                            : t(document).on("DOMContentLoaded", e),
                        n
                    );
                })(document.createElement("div")),
                requestAnimationFrame:
                    window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame,
                initialize: function () {
                    if ((this.initStartIndex(), !1 === this.initWidget()))
                        return !1;
                    this.initEventListeners(),
                        this.onslide(this.index),
                        this.ontransitionend(),
                        this.options.startSlideshow && this.play();
                },
                slide: function (t, i) {
                    window.clearTimeout(this.timeout);
                    var e,
                        s,
                        n,
                        o = this.index;
                    if (o !== t && 1 !== this.num) {
                        if (
                            (i || (i = this.options.transitionSpeed),
                            this.support.transform)
                        ) {
                            for (
                                this.options.continuous || (t = this.circle(t)),
                                    e = Math.abs(o - t) / (o - t),
                                    this.options.continuous &&
                                        ((s = e),
                                        (e =
                                            -this.positions[this.circle(t)] /
                                            this.slideWidth) !== s &&
                                            (t = -e * this.num + t)),
                                    n = Math.abs(o - t) - 1;
                                n;

                            )
                                (n -= 1),
                                    this.move(
                                        this.circle((t > o ? t : o) - n - 1),
                                        this.slideWidth * e,
                                        0
                                    );
                            (t = this.circle(t)),
                                this.move(o, this.slideWidth * e, i),
                                this.move(t, 0, i),
                                this.options.continuous &&
                                    this.move(
                                        this.circle(t - e),
                                        -this.slideWidth * e,
                                        0
                                    );
                        } else
                            (t = this.circle(t)),
                                this.animate(
                                    o * -this.slideWidth,
                                    t * -this.slideWidth,
                                    i
                                );
                        this.onslide(t);
                    }
                },
                getIndex: function () {
                    return this.index;
                },
                getNumber: function () {
                    return this.num;
                },
                prev: function () {
                    (this.options.continuous || this.index) &&
                        this.slide(this.index - 1);
                },
                next: function () {
                    (this.options.continuous || this.index < this.num - 1) &&
                        this.slide(this.index + 1);
                },
                play: function (t) {
                    var i = this;
                    window.clearTimeout(this.timeout),
                        (this.interval = t || this.options.slideshowInterval),
                        this.elements[this.index] > 1 &&
                            (this.timeout = this.setTimeout(
                                (!this.requestAnimationFrame && this.slide) ||
                                    function (t, e) {
                                        i.animationFrameId =
                                            i.requestAnimationFrame.call(
                                                window,
                                                function () {
                                                    i.slide(t, e);
                                                }
                                            );
                                    },
                                [
                                    this.index + 1,
                                    this.options.slideshowTransitionSpeed,
                                ],
                                this.interval
                            )),
                        this.container.addClass(this.options.playingClass);
                },
                pause: function () {
                    window.clearTimeout(this.timeout),
                        (this.interval = null),
                        this.container.removeClass(this.options.playingClass);
                },
                add: function (t) {
                    var i;
                    for (
                        t.concat || (t = Array.prototype.slice.call(t)),
                            this.list.concat ||
                                (this.list = Array.prototype.slice.call(
                                    this.list
                                )),
                            this.list = this.list.concat(t),
                            this.num = this.list.length,
                            this.num > 2 &&
                                null === this.options.continuous &&
                                ((this.options.continuous = !0),
                                this.container.removeClass(
                                    this.options.leftEdgeClass
                                )),
                            this.container
                                .removeClass(this.options.rightEdgeClass)
                                .removeClass(this.options.singleClass),
                            i = this.num - t.length;
                        i < this.num;
                        i += 1
                    )
                        this.addSlide(i), this.positionSlide(i);
                    (this.positions.length = this.num), this.initSlides(!0);
                },
                resetSlides: function () {
                    this.slidesContainer.empty(),
                        this.unloadAllSlides(),
                        (this.slides = []);
                },
                handleClose: function () {
                    var t = this.options;
                    this.destroyEventListeners(),
                        this.pause(),
                        (this.container[0].style.display = "none"),
                        this.container
                            .removeClass(t.displayClass)
                            .removeClass(t.singleClass)
                            .removeClass(t.leftEdgeClass)
                            .removeClass(t.rightEdgeClass),
                        t.hidePageScrollbars &&
                            (document.body.style.overflow =
                                this.bodyOverflowStyle),
                        this.options.clearSlides && this.resetSlides(),
                        this.options.onclosed &&
                            this.options.onclosed.call(this);
                },
                close: function () {
                    function t(e) {
                        e.target === i.container[0] &&
                            (i.container.off(i.support.transition.end, t),
                            i.handleClose());
                    }
                    var i = this;
                    this.options.onclose && this.options.onclose.call(this),
                        this.support.transition &&
                        this.options.displayTransition
                            ? (this.container.on(
                                  this.support.transition.end,
                                  t
                              ),
                              this.container.removeClass(
                                  this.options.displayClass
                              ))
                            : this.handleClose();
                },
                circle: function (t) {
                    return (this.num + (t % this.num)) % this.num;
                },
                move: function (t, i, e) {
                    this.translateX(t, i, e), (this.positions[t] = i);
                },
                translate: function (t, i, e, s) {
                    var n = this.slides[t].style,
                        o = this.support.transition,
                        l = this.support.transform;
                    (n[o.name + "Duration"] = s + "ms"),
                        (n[l.name] =
                            "translate(" +
                            i +
                            "px, " +
                            e +
                            "px)" +
                            (l.translateZ ? " translateZ(0)" : ""));
                },
                translateX: function (t, i, e) {
                    this.translate(t, i, 0, e);
                },
                translateY: function (t, i, e) {
                    this.translate(t, 0, i, e);
                },
                animate: function (t, i, e) {
                    if (e)
                        var s = this,
                            n = new Date().getTime(),
                            o = window.setInterval(function () {
                                var l = new Date().getTime() - n;
                                if (l > e)
                                    return (
                                        (s.slidesContainer[0].style.left =
                                            i + "px"),
                                        s.ontransitionend(),
                                        void window.clearInterval(o)
                                    );
                                s.slidesContainer[0].style.left =
                                    (i - t) *
                                        (Math.floor((l / e) * 100) / 100) +
                                    t +
                                    "px";
                            }, 4);
                    else this.slidesContainer[0].style.left = i + "px";
                },
                preventDefault: function (t) {
                    t.preventDefault
                        ? t.preventDefault()
                        : (t.returnValue = !1);
                },
                stopPropagation: function (t) {
                    t.stopPropagation
                        ? t.stopPropagation()
                        : (t.cancelBubble = !0);
                },
                onresize: function () {
                    this.initSlides(!0);
                },
                onmousedown: function (t) {
                    t.which &&
                        1 === t.which &&
                        "VIDEO" !== t.target.nodeName &&
                        (t.preventDefault(),
                        ((t.originalEvent || t).touches = [
                            { pageX: t.pageX, pageY: t.pageY },
                        ]),
                        this.ontouchstart(t));
                },
                onmousemove: function (t) {
                    this.touchStart &&
                        (((t.originalEvent || t).touches = [
                            { pageX: t.pageX, pageY: t.pageY },
                        ]),
                        this.ontouchmove(t));
                },
                onmouseup: function (t) {
                    this.touchStart &&
                        (this.ontouchend(t), delete this.touchStart);
                },
                onmouseout: function (i) {
                    if (this.touchStart) {
                        var e = i.target,
                            s = i.relatedTarget;
                        (s && (s === e || t.contains(e, s))) ||
                            this.onmouseup(i);
                    }
                },
                ontouchstart: function (t) {
                    this.options.stopTouchEventsPropagation &&
                        this.stopPropagation(t);
                    var i = (t.originalEvent || t).touches[0];
                    (this.touchStart = {
                        x: i.pageX,
                        y: i.pageY,
                        time: Date.now(),
                    }),
                        (this.isScrolling = void 0),
                        (this.touchDelta = {});
                },
                ontouchmove: function (t) {
                    this.options.stopTouchEventsPropagation &&
                        this.stopPropagation(t);
                    var i,
                        e,
                        s = (t.originalEvent || t).touches[0],
                        n = (t.originalEvent || t).scale,
                        o = this.index;
                    if (!(s.length > 1 || (n && 1 !== n)))
                        if (
                            (this.options.disableScroll && t.preventDefault(),
                            (this.touchDelta = {
                                x: s.pageX - this.touchStart.x,
                                y: s.pageY - this.touchStart.y,
                            }),
                            (i = this.touchDelta.x),
                            void 0 === this.isScrolling &&
                                (this.isScrolling =
                                    this.isScrolling ||
                                    Math.abs(i) < Math.abs(this.touchDelta.y)),
                            this.isScrolling)
                        )
                            this.options.closeOnSwipeUpOrDown &&
                                this.translateY(
                                    o,
                                    this.touchDelta.y + this.positions[o],
                                    0
                                );
                        else
                            for (
                                t.preventDefault(),
                                    window.clearTimeout(this.timeout),
                                    this.options.continuous
                                        ? (e = [
                                              this.circle(o + 1),
                                              o,
                                              this.circle(o - 1),
                                          ])
                                        : ((this.touchDelta.x = i /=
                                              (!o && i > 0) ||
                                              (o === this.num - 1 && i < 0)
                                                  ? Math.abs(i) /
                                                        this.slideWidth +
                                                    1
                                                  : 1),
                                          (e = [o]),
                                          o && e.push(o - 1),
                                          o < this.num - 1 && e.unshift(o + 1));
                                e.length;

                            )
                                (o = e.pop()),
                                    this.translateX(
                                        o,
                                        i + this.positions[o],
                                        0
                                    );
                },
                ontouchend: function (t) {
                    this.options.stopTouchEventsPropagation &&
                        this.stopPropagation(t);
                    var i,
                        e,
                        s,
                        n,
                        o,
                        l = this.index,
                        r = this.options.transitionSpeed,
                        a = this.slideWidth,
                        h = Number(Date.now() - this.touchStart.time) < 250,
                        d =
                            (h && Math.abs(this.touchDelta.x) > 20) ||
                            Math.abs(this.touchDelta.x) > a / 2,
                        c =
                            (!l && this.touchDelta.x > 0) ||
                            (l === this.num - 1 && this.touchDelta.x < 0),
                        u =
                            !d &&
                            this.options.closeOnSwipeUpOrDown &&
                            ((h && Math.abs(this.touchDelta.y) > 20) ||
                                Math.abs(this.touchDelta.y) >
                                    this.slideHeight / 2);
                    this.options.continuous && (c = !1),
                        (i = this.touchDelta.x < 0 ? -1 : 1),
                        this.isScrolling
                            ? u
                                ? this.close()
                                : this.translateY(l, 0, r)
                            : d && !c
                            ? ((e = l + i),
                              (s = l - i),
                              (n = a * i),
                              (o = -a * i),
                              this.options.continuous
                                  ? (this.move(this.circle(e), n, 0),
                                    this.move(this.circle(l - 2 * i), o, 0))
                                  : e >= 0 &&
                                    e < this.num &&
                                    this.move(e, n, 0),
                              this.move(l, this.positions[l] + n, r),
                              this.move(
                                  this.circle(s),
                                  this.positions[this.circle(s)] + n,
                                  r
                              ),
                              (l = this.circle(s)),
                              this.onslide(l))
                            : this.options.continuous
                            ? (this.move(this.circle(l - 1), -a, r),
                              this.move(l, 0, r),
                              this.move(this.circle(l + 1), a, r))
                            : (l && this.move(l - 1, -a, r),
                              this.move(l, 0, r),
                              l < this.num - 1 && this.move(l + 1, a, r));
                },
                ontouchcancel: function (t) {
                    this.touchStart &&
                        (this.ontouchend(t), delete this.touchStart);
                },
                ontransitionend: function (t) {
                    var i = this.slides[this.index];
                    (t && i !== t.target) ||
                        (this.interval && this.play(),
                        this.setTimeout(this.options.onslideend, [
                            this.index,
                            i,
                        ]));
                },
                oncomplete: function (i) {
                    var e,
                        s = i.target || i.srcElement,
                        n = s && s.parentNode;
                    s &&
                        n &&
                        ((e = this.getNodeIndex(n)),
                        t(n).removeClass(this.options.slideLoadingClass),
                        "error" === i.type
                            ? (t(n).addClass(this.options.slideErrorClass),
                              (this.elements[e] = 3))
                            : (this.elements[e] = 2),
                        s.clientHeight > this.container[0].clientHeight &&
                            (s.style.maxHeight =
                                this.container[0].clientHeight),
                        this.interval &&
                            this.slides[this.index] === n &&
                            this.play(),
                        this.setTimeout(this.options.onslidecomplete, [e, n]));
                },
                onload: function (t) {
                    this.oncomplete(t);
                },
                onerror: function (t) {
                    this.oncomplete(t);
                },
                onkeydown: function (t) {
                    switch (t.which || t.keyCode) {
                        case 13:
                            this.options.toggleControlsOnReturn &&
                                (this.preventDefault(t), this.toggleControls());
                            break;
                        case 27:
                            this.options.closeOnEscape &&
                                (this.close(), t.stopImmediatePropagation());
                            break;
                        case 32:
                            this.options.toggleSlideshowOnSpace &&
                                (this.preventDefault(t),
                                this.toggleSlideshow());
                            break;
                        case 37:
                            this.options.enableKeyboardNavigation &&
                                (this.preventDefault(t), this.prev());
                            break;
                        case 39:
                            this.options.enableKeyboardNavigation &&
                                (this.preventDefault(t), this.next());
                    }
                },
                handleClick: function (i) {
                    function e(i) {
                        return t(n).hasClass(i) || t(o).hasClass(i);
                    }
                    var s = this.options,
                        n = i.target || i.srcElement,
                        o = n.parentNode;
                    e(s.toggleClass)
                        ? (this.preventDefault(i), this.toggleControls())
                        : e(s.prevClass)
                        ? (this.preventDefault(i), this.prev())
                        : e(s.nextClass)
                        ? (this.preventDefault(i), this.next())
                        : e(s.closeClass)
                        ? (this.preventDefault(i), this.close())
                        : e(s.playPauseClass)
                        ? (this.preventDefault(i), this.toggleSlideshow())
                        : o === this.slidesContainer[0]
                        ? (this.preventDefault(i),
                          s.closeOnSlideClick
                              ? this.close()
                              : this.toggleControls())
                        : o.parentNode &&
                          o.parentNode === this.slidesContainer[0] &&
                          s.toggleControlsOnSlideClick &&
                          (this.preventDefault(i), this.toggleControls());
                },
                onclick: function (t) {
                    if (
                        !(
                            this.options.emulateTouchEvents &&
                            this.touchDelta &&
                            (Math.abs(this.touchDelta.x) > 20 ||
                                Math.abs(this.touchDelta.y) > 20)
                        )
                    )
                        return this.handleClick(t);
                    delete this.touchDelta;
                },
                updateEdgeClasses: function (t) {
                    t
                        ? this.container.removeClass(this.options.leftEdgeClass)
                        : this.container.addClass(this.options.leftEdgeClass),
                        t === this.num - 1
                            ? this.container.addClass(
                                  this.options.rightEdgeClass
                              )
                            : this.container.removeClass(
                                  this.options.rightEdgeClass
                              );
                },
                handleSlide: function (t) {
                    this.options.continuous || this.updateEdgeClasses(t),
                        this.loadElements(t),
                        this.options.unloadElements && this.unloadElements(t),
                        this.setTitle(t);
                },
                onslide: function (t) {
                    (this.index = t),
                        this.handleSlide(t),
                        this.setTimeout(this.options.onslide, [
                            t,
                            this.slides[t],
                        ]);
                },
                setTitle: function (t) {
                    var i = this.slides[t].firstChild.title,
                        e = this.titleElement;
                    e.length &&
                        (this.titleElement.empty(),
                        i && e[0].appendChild(document.createTextNode(i)));
                },
                setTimeout: function (t, i, e) {
                    var s = this;
                    return (
                        t &&
                        window.setTimeout(function () {
                            t.apply(s, i || []);
                        }, e || 0)
                    );
                },
                imageFactory: function (i, e) {
                    function s(i) {
                        if (!n) {
                            if (
                                ((i = { type: i.type, target: o }),
                                !o.parentNode)
                            )
                                return r.setTimeout(s, [i]);
                            (n = !0),
                                t(a).off("load error", s),
                                d &&
                                    "load" === i.type &&
                                    ((o.style.background =
                                        'url("' + h + '") center no-repeat'),
                                    (o.style.backgroundSize = d)),
                                e(i);
                        }
                    }
                    var n,
                        o,
                        l,
                        r = this,
                        a = this.imagePrototype.cloneNode(!1),
                        h = i,
                        d = this.options.stretchImages;
                    return (
                        "string" != typeof h &&
                            ((h = this.getItemProperty(
                                i,
                                this.options.urlProperty
                            )),
                            (l = this.getItemProperty(
                                i,
                                this.options.titleProperty
                            ))),
                        !0 === d && (d = "contain"),
                        (d =
                            this.support.backgroundSize &&
                            this.support.backgroundSize[d] &&
                            d),
                        d
                            ? (o = this.elementPrototype.cloneNode(!1))
                            : ((o = a), (a.draggable = !1)),
                        l && (o.title = l),
                        t(a).on("load error", s),
                        (a.src = h),
                        o
                    );
                },
                createElement: function (i, e) {
                    var s =
                            i &&
                            this.getItemProperty(i, this.options.typeProperty),
                        n =
                            (s && this[s.split("/")[0] + "Factory"]) ||
                            this.imageFactory,
                        o = i && n.call(this, i, e),
                        l = this.getItemProperty(
                            i,
                            this.options.srcsetProperty
                        );
                    return (
                        o ||
                            ((o = this.elementPrototype.cloneNode(!1)),
                            this.setTimeout(e, [{ type: "error", target: o }])),
                        l && o.setAttribute("srcset", l),
                        t(o).addClass(this.options.slideContentClass),
                        o
                    );
                },
                loadElement: function (i) {
                    this.elements[i] ||
                        (this.slides[i].firstChild
                            ? (this.elements[i] = t(this.slides[i]).hasClass(
                                  this.options.slideErrorClass
                              )
                                  ? 3
                                  : 2)
                            : ((this.elements[i] = 1),
                              t(this.slides[i]).addClass(
                                  this.options.slideLoadingClass
                              ),
                              this.slides[i].appendChild(
                                  this.createElement(
                                      this.list[i],
                                      this.proxyListener
                                  )
                              )));
                },
                loadElements: function (t) {
                    var i,
                        e = Math.min(
                            this.num,
                            2 * this.options.preloadRange + 1
                        ),
                        s = t;
                    for (i = 0; i < e; i += 1)
                        (s += i * (i % 2 == 0 ? -1 : 1)),
                            (s = this.circle(s)),
                            this.loadElement(s);
                },
                unloadElements: function (t) {
                    var i, e;
                    for (i in this.elements)
                        this.elements.hasOwnProperty(i) &&
                            (e = Math.abs(t - i)) > this.options.preloadRange &&
                            e + this.options.preloadRange < this.num &&
                            (this.unloadSlide(i), delete this.elements[i]);
                },
                addSlide: function (t) {
                    var i = this.slidePrototype.cloneNode(!1);
                    i.setAttribute("data-index", t),
                        this.slidesContainer[0].appendChild(i),
                        this.slides.push(i);
                },
                positionSlide: function (t) {
                    var i = this.slides[t];
                    (i.style.width = this.slideWidth + "px"),
                        this.support.transform &&
                            ((i.style.left = t * -this.slideWidth + "px"),
                            this.move(
                                t,
                                this.index > t
                                    ? -this.slideWidth
                                    : this.index < t
                                    ? this.slideWidth
                                    : 0,
                                0
                            ));
                },
                initSlides: function (i) {
                    var e, s;
                    for (
                        i ||
                            ((this.positions = []),
                            (this.positions.length = this.num),
                            (this.elements = {}),
                            (this.imagePrototype =
                                document.createElement("img")),
                            (this.elementPrototype =
                                document.createElement("div")),
                            (this.slidePrototype =
                                document.createElement("div")),
                            t(this.slidePrototype).addClass(
                                this.options.slideClass
                            ),
                            (this.slides = this.slidesContainer[0].children),
                            (e =
                                this.options.clearSlides ||
                                this.slides.length !== this.num)),
                            this.slideWidth = this.container[0].offsetWidth,
                            this.slideHeight = this.container[0].offsetHeight,
                            this.slidesContainer[0].style.width =
                                this.num * this.slideWidth + "px",
                            e && this.resetSlides(),
                            s = 0;
                        s < this.num;
                        s += 1
                    )
                        e && this.addSlide(s), this.positionSlide(s);
                    this.options.continuous &&
                        this.support.transform &&
                        (this.move(
                            this.circle(this.index - 1),
                            -this.slideWidth,
                            0
                        ),
                        this.move(
                            this.circle(this.index + 1),
                            this.slideWidth,
                            0
                        )),
                        this.support.transform ||
                            (this.slidesContainer[0].style.left =
                                this.index * -this.slideWidth + "px");
                },
                unloadSlide: function (t) {
                    var i, e;
                    null !== (e = (i = this.slides[t]).firstChild) &&
                        i.removeChild(e);
                },
                unloadAllSlides: function () {
                    var t, i;
                    for (t = 0, i = this.slides.length; t < i; t++)
                        this.unloadSlide(t);
                },
                toggleControls: function () {
                    var t = this.options.controlsClass;
                    this.container.hasClass(t)
                        ? this.container.removeClass(t)
                        : this.container.addClass(t);
                },
                toggleSlideshow: function () {
                    this.interval ? this.pause() : this.play();
                },
                getNodeIndex: function (t) {
                    return parseInt(t.getAttribute("data-index"), 10);
                },
                getNestedProperty: function (t, i) {
                    return (
                        i.replace(
                            /\[(?:'([^']+)'|"([^"]+)"|(\d+))\]|(?:(?:^|\.)([^\.\[]+))/g,
                            function (i, e, s, n, o) {
                                var l = o || e || s || (n && parseInt(n, 10));
                                i && t && (t = t[l]);
                            }
                        ),
                        t
                    );
                },
                getDataProperty: function (i, e) {
                    if (i.getAttribute) {
                        var s = i.getAttribute(
                            "data-" + e.replace(/([A-Z])/g, "-$1").toLowerCase()
                        );
                        if ("string" == typeof s) {
                            if (
                                /^(true|false|null|-?\d+(\.\d+)?|\{[\s\S]*\}|\[[\s\S]*\])$/.test(
                                    s
                                )
                            )
                                try {
                                    return t.parseJSON(s);
                                } catch (t) {}
                            return s;
                        }
                    }
                },
                getItemProperty: function (t, i) {
                    var e = t[i];
                    return (
                        void 0 === e &&
                            void 0 === (e = this.getDataProperty(t, i)) &&
                            (e = this.getNestedProperty(t, i)),
                        e
                    );
                },
                initStartIndex: function () {
                    var t,
                        i = this.options.index,
                        e = this.options.urlProperty;
                    if (i && "number" != typeof i)
                        for (t = 0; t < this.num; t += 1)
                            if (
                                this.list[t] === i ||
                                this.getItemProperty(this.list[t], e) ===
                                    this.getItemProperty(i, e)
                            ) {
                                i = t;
                                break;
                            }
                    this.index = this.circle(parseInt(i, 10) || 0);
                },
                initEventListeners: function () {
                    function i(t) {
                        var i =
                            e.support.transition &&
                            e.support.transition.end === t.type
                                ? "transitionend"
                                : t.type;
                        e["on" + i](t);
                    }
                    var e = this,
                        s = this.slidesContainer;
                    t(window).on("resize", i),
                        t(document.body).on("keydown", i),
                        this.container.on("click", i),
                        this.support.touch
                            ? s.on(
                                  "touchstart touchmove touchend touchcancel",
                                  i
                              )
                            : this.options.emulateTouchEvents &&
                              this.support.transition &&
                              s.on("mousedown mousemove mouseup mouseout", i),
                        this.support.transition &&
                            s.on(this.support.transition.end, i),
                        (this.proxyListener = i);
                },
                destroyEventListeners: function () {
                    var i = this.slidesContainer,
                        e = this.proxyListener;
                    t(window).off("resize", e),
                        t(document.body).off("keydown", e),
                        this.container.off("click", e),
                        this.support.touch
                            ? i.off(
                                  "touchstart touchmove touchend touchcancel",
                                  e
                              )
                            : this.options.emulateTouchEvents &&
                              this.support.transition &&
                              i.off("mousedown mousemove mouseup mouseout", e),
                        this.support.transition &&
                            i.off(this.support.transition.end, e);
                },
                handleOpen: function () {
                    this.options.onopened && this.options.onopened.call(this);
                },
                initWidget: function () {
                    function i(t) {
                        t.target === e.container[0] &&
                            (e.container.off(e.support.transition.end, i),
                            e.handleOpen());
                    }
                    var e = this;
                    return (
                        (this.container = t(this.options.container)),
                        this.container.length
                            ? ((this.slidesContainer = this.container
                                  .find(this.options.slidesContainer)
                                  .first()),
                              this.slidesContainer.length
                                  ? ((this.titleElement = this.container
                                        .find(this.options.titleElement)
                                        .first()),
                                    1 === this.num &&
                                        this.container.addClass(
                                            this.options.singleClass
                                        ),
                                    this.options.onopen &&
                                        this.options.onopen.call(this),
                                    this.support.transition &&
                                    this.options.displayTransition
                                        ? this.container.on(
                                              this.support.transition.end,
                                              i
                                          )
                                        : this.handleOpen(),
                                    this.options.hidePageScrollbars &&
                                        ((this.bodyOverflowStyle =
                                            document.body.style.overflow),
                                        (document.body.style.overflow =
                                            "hidden")),
                                    (this.container[0].style.display = "block"),
                                    this.initSlides(),
                                    void this.container.addClass(
                                        this.options.displayClass
                                    ))
                                  : (this.console.log(
                                        "blueimp Gallery: Slides container not found.",
                                        this.options.slidesContainer
                                    ),
                                    !1))
                            : (this.console.log(
                                  "blueimp Gallery: Widget container not found.",
                                  this.options.container
                              ),
                              !1)
                    );
                },
                initOptions: function (i) {
                    (this.options = t.extend({}, this.options)),
                        ((i && i.carousel) ||
                            (this.options.carousel &&
                                (!i || !1 !== i.carousel))) &&
                            t.extend(this.options, this.carouselOptions),
                        t.extend(this.options, i),
                        this.num < 3 &&
                            (this.options.continuous =
                                !!this.options.continuous && null),
                        this.support.transition ||
                            (this.options.emulateTouchEvents = !1),
                        this.options.event &&
                            this.preventDefault(this.options.event);
                },
            }),
            i
        );
    }),
    (function (t) {
        "use strict";
        "function" == typeof define && define.amd
            ? define(["./blueimp-helper", "./blueimp-gallery"], t)
            : t(window.blueimp.helper || window.jQuery, window.blueimp.Gallery);
    })(function (t, i) {
        "use strict";
        t.extend(i.prototype.options, {
            indicatorContainer: "ol",
            activeIndicatorClass: "active",
            thumbnailProperty: "thumbnail",
            thumbnailIndicators: !0,
        });
        var e = i.prototype.initSlides,
            s = i.prototype.addSlide,
            n = i.prototype.resetSlides,
            o = i.prototype.handleClick,
            l = i.prototype.handleSlide,
            r = i.prototype.handleClose;
        return (
            t.extend(i.prototype, {
                createIndicator: function (i) {
                    var e,
                        s,
                        n = this.indicatorPrototype.cloneNode(!1),
                        o = this.getItemProperty(i, this.options.titleProperty),
                        l = this.options.thumbnailProperty;
                    return (
                        this.options.thumbnailIndicators &&
                            (l && (e = this.getItemProperty(i, l)),
                            void 0 === e &&
                                (s =
                                    i.getElementsByTagName &&
                                    t(i).find("img")[0]) &&
                                (e = s.src),
                            e &&
                                (n.style.backgroundImage = 'url("' + e + '")')),
                        o && (n.title = o),
                        n
                    );
                },
                addIndicator: function (t) {
                    if (this.indicatorContainer.length) {
                        var i = this.createIndicator(this.list[t]);
                        i.setAttribute("data-index", t),
                            this.indicatorContainer[0].appendChild(i),
                            this.indicators.push(i);
                    }
                },
                setActiveIndicator: function (i) {
                    this.indicators &&
                        (this.activeIndicator &&
                            this.activeIndicator.removeClass(
                                this.options.activeIndicatorClass
                            ),
                        (this.activeIndicator = t(this.indicators[i])),
                        this.activeIndicator.addClass(
                            this.options.activeIndicatorClass
                        ));
                },
                initSlides: function (t) {
                    t ||
                        ((this.indicatorContainer = this.container.find(
                            this.options.indicatorContainer
                        )),
                        this.indicatorContainer.length &&
                            ((this.indicatorPrototype =
                                document.createElement("li")),
                            (this.indicators =
                                this.indicatorContainer[0].children))),
                        e.call(this, t);
                },
                addSlide: function (t) {
                    s.call(this, t), this.addIndicator(t);
                },
                resetSlides: function () {
                    n.call(this),
                        this.indicatorContainer.empty(),
                        (this.indicators = []);
                },
                handleClick: function (t) {
                    var i = t.target || t.srcElement,
                        e = i.parentNode;
                    if (e === this.indicatorContainer[0])
                        this.preventDefault(t),
                            this.slide(this.getNodeIndex(i));
                    else {
                        if (e.parentNode !== this.indicatorContainer[0])
                            return o.call(this, t);
                        this.preventDefault(t),
                            this.slide(this.getNodeIndex(e));
                    }
                },
                handleSlide: function (t) {
                    l.call(this, t), this.setActiveIndicator(t);
                },
                handleClose: function () {
                    this.activeIndicator &&
                        this.activeIndicator.removeClass(
                            this.options.activeIndicatorClass
                        ),
                        r.call(this);
                },
            }),
            i
        );
    }),
    (function (t) {
        "use strict";
        "function" == typeof define && define.amd
            ? define(["jquery", "./blueimp-gallery"], t)
            : t(window.jQuery, window.blueimp.Gallery);
    })(function (t, i) {
        "use strict";
        t(document).on("click", "[data-gallery]", function (e) {
            var s = t(this).data("gallery"),
                n = t(s),
                o = (n.length && n) || t(i.prototype.options.container),
                l = {
                    onopen: function () {
                        o.data("gallery", this).trigger("open");
                    },
                    onopened: function () {
                        o.trigger("opened");
                    },
                    onslide: function () {
                        o.trigger("slide", arguments);
                    },
                    onslideend: function () {
                        o.trigger("slideend", arguments);
                    },
                    onslidecomplete: function () {
                        o.trigger("slidecomplete", arguments);
                    },
                    onclose: function () {
                        o.trigger("close");
                    },
                    onclosed: function () {
                        o.trigger("closed").removeData("gallery");
                    },
                },
                r = t.extend(
                    o.data(),
                    { container: o[0], index: this, event: e },
                    l
                ),
                a = t('[data-gallery="' + s + '"]');
            return r.filter && (a = a.filter(r.filter)), new i(a, r);
        });
    });
