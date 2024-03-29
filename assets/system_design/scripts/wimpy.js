//
//            WW  WW  WW
//            WW  WW  WW
//            WW  WW  WW
//             WWWWWWWW
//     __ __ _ _ _ __  _ __ _  _ 
//     \ V  V / | , , | __ \  V |
//      \_/\_/|_|_|_|_| .__/\_, |
//                    |_|   |___|
//
// ----------------------------------
//
//     Wimpy Player
//     7.7.107 2017-01-12
//     www.wimpyplayer.com
//     Copyright Plaino LLC
//
// ----------------------------------

if (typeof this.wimpyPlayer == 'undefined') {
    this.wimpyPlayer = {};
    this.jbeeb = this.jbeeb || {};
    this.jbeeb = this.jbeeb || {}, this.jbeeb.mimes = {
            audio: {
                mp3: "audio/mpeg",
                wav: "audio/wav",
                aac: "audio/mp4",
                m4a: "audio/mp4",
                mpa: "audio/mpeg",
                oga: "audio/ogg",
                ogg: "audio/ogg",
                flac: "audio/flac"
            },
            video: {
                m4v: "video/mp4",
                m4p: "video/mp4",
                mp4: "video/mp4",
                webm: "video/webm",
                ogx: "video/ogg",
                ogv: "video/ogg",
                youtube: "video/youtube"
            },
            image: {
                jpg: "image/jpeg",
                png: "image/png",
                gif: "image/gif",
                tif: "image/tiff",
                bmp: "image/bmp"
            },
            playlist: {
                xml: "application/xml",
                php: "application/xml",
                asp: "application/xml",
                rss: "application/xml",
                opml: "application/xml",
                txt: "text/plain",
                js: "application/javascript",
                json: "application/json",
                jsonp: "application/javascript",
                m3u: "audio/x-mpegurl",
                pls: "text/plain",
                s3: "application/xml"
            }
        }, Array.prototype.indexOf || (Array.prototype.indexOf = function(t, e) {
            if (void 0 === this || null === this) throw new TypeError('"this" is null or not defined');
            var i = this.length >>> 0;
            for (e = +e || 0, Math.abs(e) === 1 / 0 && (e = 0), 0 > e && (e += i, 0 > e && (e = 0)); i > e; e++)
                if (this[e] === t) return e;
            return -1
        }), "b" != "ab".substr(-1) && (String.prototype.substr = function(t) {
            return function(e, i) {
                return t.call(this, 0 > e ? this.length + e : e, i)
            }
        }(String.prototype.substr)), Function.prototype.bind || (Function.prototype.bind = function(t) {
            if ("function" != typeof this) throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
            var e = Array.prototype.slice.call(arguments, 1),
                i = this,
                s = function() {},
                n = function() {
                    return i.apply(this instanceof s && t ? this : t, e.concat(Array.prototype.slice.call(arguments)))
                };
            return s.prototype = this.prototype, n.prototype = new s, n
        }), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";

            function t(e, s) {
                if ("object" !== i.typeOf(e)) return s;
                for (var n in s) "object" === i.typeOf(e[n]) && "object" === i.typeOf(s[n]) ? e[n] = t(e[n], s[n]) : e[n] = s[n];
                return e
            }

            function e(e, s) {
                var n, l, h, a, r, o = s[0],
                    u = s.length;
                for ((e || "object" !== i.typeOf(o)) && (o = {}), n = 0; u > n; ++n)
                    if (l = s[n], h = i.typeOf(l), "object" === h)
                        for (a in l) r = e ? i.clone(l[a]) : l[a], o[a] = t(o[a], r);
                return o
            }
            var i = function() {},
                s = (Array.prototype.indexOf, Object.prototype.toString),
                n = String.prototype.trim;
            i.randomNumber = function(t, e) {
                return t + Math.random() * (e - t)
            }, i.randomInt = function(t, e) {
                return Math.round(i.randomNumber(t, e))
            }, i.link = function(t, e, i) {
                var s, n, l, h;
                i = i || {}, s = e || "_blank", n = [];
                for (l in i) l = l.toLowerCase(), "width" == l || "height" == l || "left" == l ? n.push(l + "=" + i[l]) : "location" != l && "menubar" != l && "resizable" != l && "scrollbars" != l && "status" != l && "titlebar" != l && "toolbar" != l || n.push(l + "=1");
                h = null, n.length > 0 && (h = n.join(",")), window.open(t, s, h)
            }, i.isArray = function(t) {
                return Array.isArray ? Array.isArray(t) : "[object Array]" === s.call(t)
            }, i.empty = function(t) {
                for (; t.firstChild;) t.removeChild(t.firstChild)
            }, i.isEmpty = function(t) {
                var e, s, n = typeof t;
                if ("undefined" == n) return !0;
                if (null === t) return !0;
                if ("object" == n) {
                    e = !0;
                    for (s in t)
                        if (!i.isEmpty(t[s])) {
                            e = !1;
                            break
                        }
                    return e
                }
                return "string" == n && "" == t
            }, i.typeOf = function(t) {
                var e = {}.toString.call(t);
                return "[object Object]" === e ? "object" : "[object Array]" === e ? "array" : "[object String]" === e ? "string" : "[object Number]" === e ? "number" : "[object Function]" === e ? "function" : "[object Null]" === e ? "null" : "undefined"
            }, i.isNumber = function(t) {
                return "[object Number]" === s.call(t) && isFinite(t)
            }, i.isInteger = function(t) {
                return parseFloat(t) == parseInt(t) && !isNaN(t) && isFinite(t)
            }, i.isString = function(t) {
                return "[object String]" === s.call(t)
            }, i.isNull = function(t) {
                return "" === t || null === t || void 0 === t || "undefined" == t || "null" == t
            }, i.isFalse = function(t) {
                return t === !1 || 0 === t || "0" === t || "string" == typeof t && "false" === t.toLowerCase()
            }, i.isTrue = function(t) {
                return t === !0 || 1 === t || "1" === t || "string" == typeof t && "true" === t.toLowerCase()
            }, i.isDomElement = function(t) {
                return !(!t.nodeName || !t.nodeType)
            }, i.clone = function(t) {
                var e, s, n = t,
                    l = i.typeOf(t);
                if ("array" === l)
                    for (n = [], s = t.length, e = 0; s > e; ++e) n[e] = i.clone(t[e]);
                else if ("object" === l) {
                    n = {};
                    for (e in t) n[e] = i.clone(t[e])
                }
                return n
            }, i.merge = function(t) {
                return e(t === !0, arguments)
            }, i.sortOn = function(t, e, i, s) {
                if (!e || !t) return t;
                var n = function(t, e, i) {
                    var s = i ? function(t) {
                            return parseFloat((t + "").replace(/[^0-9.\-]+/g, ""))
                        } : function(t) {
                            return (t + "").toLowerCase()
                        },
                        n = e ? -1 : 1;
                    return function(e, l) {
                        return e = s(e[t]), l = s(l[t]), i ? (e - l) * n : (l > e ? -1 : e > l ? 1 : 0) * n
                    }
                };
                t.sort(n(e, i, s))
            }, i.arrayShuffle = function(t) {
                var e, i, s, n, l;
                if (t) {
                    for (e = t.length, n = Math.floor, l = Math.random; e;) s = n(l() * e--), i = t[e], t[e] = t[s], t[s] = i;
                    return t
                }
                return []
            }, i.arrayMove = function(t, e, i) {
                t.splice(i, 0, t.splice(e, 1)[0])
            }, i.arrayInsertArrayAt = function(t, e, i) {
                return Array.prototype.splice.apply(t, [e, 0].concat(i)), t
            }, i.arrayInsertAt = function(t, e) {
                var s = Array.prototype.splice.apply(arguments, [2]);
                return i.arrayInsertArrayAt(t, e, s)
            }, i.rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, i.trim = n && !n.call("\ufeff ") ? function(t) {
                return null == t ? "" : n.call(t)
            } : function(t) {
                return null == t ? "" : (t + "").replace(i.rtrim, "")
            }, i.initialCaps = function(t) {
                var e, i, s = t.split(" ");
                for (e = 0; e < s.length; e++) i = s[e].charAt(0).toUpperCase(), s[e] = i + s[e].substr(1);
                return s.join(" ")
            }, i.alphanumeric = function(t, e) {
                return e ? t.replace(/[^A-Za-z0-9]/g, "") : t.replace(/[^A-Za-z0-9_\-\.]/g, "")
            }, i.numeric = function(t, e) {
                return t.replace(/[^0-9\-\.]/g, "")
            }, i.parseJSON = function(t) {
                if ("string" != typeof t) return null;
                var e = null;
                try {
                    e = JSON.parse(t.replace(/[\t\r\n]/g, ""))
                } catch (t) {
                    e = null
                }
                return e
            }, i.utf8_encode = function(t) {
                return unescape(encodeURIComponent(t))
            }, i.utf8_decode = function(t) {
                return decodeURIComponent(escape(t))
            }, i.hexToRgb = function(t) {
                if (!t) return "";
                var e = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(t);
                return e ? [parseInt(e[1], 16), parseInt(e[2], 16), parseInt(e[3], 16)] : [0, 0, 0]
            }, i.makeColor = function(t, e) {
                if (!t) return "";
                var s = i.hexToRgb(t);
                return i.isNumber(e) ? (e > 1 && (e /= 100), e = "," + e, "rgba(" + s.join(",") + e + ")") : t
            }, i.getXYWH = function(t) {
                var e, i, s, n, l = 0,
                    h = 0,
                    a = 0,
                    r = 0;
                if (t) {
                    for (e = document.body.getBoundingClientRect(), l -= e.left, h -= e.top, a = t.offsetWidth, r = t.offsetHeight, i = !1, jbeeb.Browser && (i = jbeeb.Browser.touch); t && !isNaN(t.offsetLeft) && !isNaN(t.offsetTop);) i ? (l += (t.offsetLeft || 0) - (t.scrollLeft || 0), h += (t.offsetTop || 0) - (t.scrollTop || 0)) : (l += t.offsetLeft || 0, h += t.offsetTop || 0), t = t.offsetParent;
                    i && (s = null != window.scrollX ? window.scrollX : window.pageXOffset, n = null != window.scrollY ? window.scrollY : window.pageYOffset, l += s, h += n)
                }
                return {
                    x: l,
                    y: h,
                    w: a,
                    h: r,
                    xMax: l + a,
                    yMax: h + r
                }
            }, i.getWindowSize = function() {
                var t = window,
                    e = document,
                    i = (e.body, e.documentElement),
                    s = e.getElementsByTagName("body")[0];
                return {
                    x: (t.pageXOffset || i.scrollLeft) - (i.clientLeft || 0),
                    y: (t.pageYOffset || i.scrollTop) - (i.clientTop || 0),
                    w: t.innerWidth || i.clientWidth || s.clientWidth,
                    h: t.innerHeight || i.clientHeight || s.clientHeight
                }
            }, i.getMousePos = function(t) {
                var e = document.documentElement,
                    i = document.body;
                return null == t.pageX && null != t.clientX && (t.pageX = t.clientX + (e && e.scrollLeft || i && i.scrollLeft || 0) - (e && e.clientLeft || i && i.clientLeft || 0), t.pageY = t.clientY + (e && e.scrollTop || i && i.scrollTop || 0) - (e && e.clientTop || i && i.clientTop || 0)), {
                    x: t.pageX,
                    y: t.pageY
                }
            }, i.contains = function(t, e) {
                var i, s, n, l, h;
                if (!t || !e) return !1;
                i = {}, s = {
                    x: t.x,
                    y: t.y,
                    w: t.width,
                    h: t.height
                }, n = {
                    x: e.x,
                    y: e.y,
                    w: e.width,
                    h: e.height
                }, s.xMax = s.x + s.w, s.yMax = s.y + s.h, n.xMax = n.x + n.w, n.yMax = n.y + n.h;
                for (l in s) i[l] = s[l] >= n[l];
                return h = !(i.x || i.y || !i.xMax || !i.yMax)
            }, i.getTimestamp = function() {
                return (new Date).getTime()
            }, i.bindEvent = function(t, e, i) {
                return t && (t.attachEvent ? t.attachEvent("on" + e, i) : t.addEventListener && t.addEventListener(e, i, !1)), i
            }, i.unbindEvent = function(t, e, i) {
                return t && (t.attachEvent ? t.detachEvent("on" + e, i) : t.addEventListener && t.removeEventListener(e, i, !1)), i
            }, i.getAttributes = function(t) {
                var e, i, s, n, l, h, a, r, o = {};
                if (t && t.attributes)
                    for (e = 0, t.getAttribute && (e = 1), i = t.attributes, s = i.length, n = !1, jbeeb.Browser && (n = jbeeb.Browser.ie), l = 0; s > l; l++) h = i[l], a = h.nodeName + "", e ? r = t.getAttribute(a) : n ? h.specified && (r = h.nodeValue) : r = h.value || h.nodeValue, "class" == a && (a = "className"), o[a] = r;
                return o
            }, i.decodeURL = function(t) {
                var e, s = i.trim;
                return t = s(t), "__1" == t.substr(0, 3) ? t.indexOf("|") > -1 ? t : jbeeb.Base64 ? (e = t.substr(3, t.length), s(unescape(jbeeb.Base64.decode(e)))) : t : t
            }, i.escapeHTML = function(t) {
                return ("" + t).split("&").join("&amp;").split("<").join("&lt;").split('"').join("&quot;")
            }, i.unescapeHTML = function(t) {
                return i.fromHtmlEntities(unescape("" + t)).split("&quot;").join('"').split("&lt;").join("<").split("&amp;").join("&")
            }, i.makeTagString = function(t, e, i) {
                var s, n, l, h, a;
                if (e = e || "", s = [], i && "object" == typeof i) {
                    s.push("");
                    for (n in i) l = i[n], h = "klass" == n ? "class" : n, null === l ? s.push(h) : (l += "", a = l.indexOf('"') > -1 ? "'" : '"', s.push(h + "=" + a + l + a))
                }
                return "<" + t + s.join(" ") + ">" + e + "</" + t + ">"
            }, i.toHtmlEntities = function(t) {
                var e, i = document.createElement("p");
                return i.textContent = t, e = i.innerHTML, i = null, e
            }, i.fromHtmlEntities = function(t) {
                return (t + "").replace(/&#\d+;/gm, function(t) {
                    return String.fromCharCode(t.match(/\d+/gm)[0])
                })
            }, i.absoluteURL = function(t) {
                var e = document.createElement("div");
                return e.innerHTML = i.makeTagString("a", "u", {
                    href: t
                }), t = e.firstChild.href, e = null, t
            }, i.cssClassOps = function(t, e, i, s) {
                var n, l, h, a, r, o = e.className;
                if (o = o.split(" "), n = o.indexOf(i) > -1, i && "add" == t && !n) {
                    for (l = !1, h = 0; h < o.length; h++) a = o[h], a == i && (o[h] = "");
                    o.push(i)
                } else if (i && "remove" == t)
                    for (h = 0; h < o.length; h++) a = o[h], a == i && (o[h] = "");
                else if ("replace" == t) {
                    for (r = !1, h = 0; h < o.length; h++) a = o[h], a == i && (r ? o[h] = "" : (s ? o[h] = s : o[h] = "", r = !0));
                    n = o.indexOf(s) > -1, r || n || o.push(s)
                }
                e.className = o.join(" ")
            }, jbeeb.Utils = i
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function() {
                function t() {
                    var t, e, i;
                    if (n = 1, t = l)
                        for (; t.length;) e = t.shift(), e && (i = e.fn, i && i.apply(null, e.args))
                }

                function e() {
                    var t = [].slice.call(arguments),
                        e = t.splice(0, 1)[0];
                    n ? e.apply(null, t) : l.push({
                        fn: e,
                        args: t
                    })
                }

                function i() {
                    var t, e;
                    if (n = 0, t = l)
                        for (e = t.length; e--;) delete t[e]
                }

                function s() {
                    i(), l = null, n = null
                }
                var n = 0,
                    l = [];
                return {
                    ready: n,
                    fire: t,
                    add: e,
                    cancel: i,
                    destroy: s
                }
            };
            jbeeb.ReadyBoss = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t, e, i) {
                function s(t, e) {
                    var n, l, h, a, r, o, d, f, b, p, m, g, y, v, j, w, x, k, S, E, T, C, L, P, F, M, A, B, U, O, D, _, I, z, R, N, X, Y, H, V, W, q, Z, G, J = t.substr(0, 4);
                    if ("blob" == J) return x = t.split(":"), l = x.shift(), k = s(unescape(x.join(":"))), k.protocol = l, k.source = t, k.url = t, k;
                    if ("data" == J) return x = t.split(":"), l = x.shift(), S = x.join(":").split(","), E = S.shift(), T = S.join(","), L = "", /\;/.test(E) ? (P = E.split(";"), C = P[0], L = P[1]) : C = E, {
                        source: t || null,
                        url: t || null,
                        protocol: l,
                        mime: C || "test/plain",
                        data: T,
                        encoder: L,
                        basename: "",
                        filename: "",
                        path: "",
                        pathurl: ""
                    };
                    if (t = t || "", F = t.replace(/\\/g, "/"), F.indexOf("#") != -1 && (w = F.split("#"), g = w[1], F = w[0]), F.indexOf("?") != -1) {
                        for (w = F.split("?"), p = w[1], M = p.replace("&amp;", "&").split("&"), m = {}, A = 0; A < M.length; A++) B = M[A].split("="), m[B[0]] = B[1] || null;
                        F = w[0]
                    }
                    if (F.match(/:\//) || (U = "", U = e ? u : c, O = s(U, !1), "/" == F.substr(0, 1) ? F = O.host + F : (D = O.pathurl, D.length > 1 && "/" != D.substr(-1) && (D += "/"), F = D + F)), F.indexOf("..") > -1) {
                        for (_ = F.split("/"), I = [], z = 0; z < _.length; z++) R = _[z], ".." == R ? I.pop() : I.push(R);
                        F = I.join("/")
                    }
                    return N = !1, "/" == F.substr(-1) && (N = !0), w = F.split("://"), l = w.shift(), f = (w.shift() || "").replace("//", "/"), f = f.split("/"), h = f.shift() || "", h.indexOf("@") > -1 && (w = h.split("@"), X = w[0].split(":"), y = X[0], v = X[1], h = w[1]), h.indexOf(":") > -1 && (w = h.split(":"), a = w[1], h = w[0]), f = f.join("/"), w = f.split("/"), d = w.pop(), f = w.join("/"), ".." == d && (d = ""), Y = d.split("."), Y.length > 1 ? (o = Y.pop().toLowerCase(), r = Y.join(".")) : (o = "", r = d), j = l + "://" + h + (a ? ":" + a : ""), f = "/" + f + (f.length > 0 ? "/" : ""), b = j + f, n = j + f + d + (p ? "?" + p : "") + (g ? "#" + g : ""), H = f, V = b, o ? (f += d, b += d) : (r = d, N ? (f += d + ("" != d ? "/" : ""), b += d + ("" != d ? "/" : ""), p || g || "/" == n.substr(-1) || (n += "/")) : (f += d, b += d)), i === !1 && ("/" == H.substr(-1) && (H = H.substr(0, H.length - 1)), "/" == V.substr(-1) && (V = V.substr(0, V.length - 1)), o || ("/" == f.substr(-1) && (f = f.substr(0, f.length - 1)), "/" == b.substr(-1) && (b = b.substr(0, b.length - 1)), "/" == n.substr(-1) && (n = n.substr(0, n.length - 1)))), o || !p && !g || (W = ((p ? p : "") + (g ? g : "")).split("/").pop(), q = W.split("."), q.length && (Z = q.pop(), Z.length < 4 && (o = Z.toLowerCase()), q.length && (G = q.pop(), "" == d && (d = G), "" == r && (r = G)))), {
                        source: t || null,
                        url: n || null,
                        protocol: l || null,
                        domain: h || null,
                        port: a || null,
                        basename: r || "",
                        extension: o || null,
                        ext: o || null,
                        filename: d || "",
                        path: f || null,
                        pathurl: b || null,
                        parent: H || null,
                        parenturl: V || null,
                        query: p || null,
                        queryObj: m || null,
                        fragment: g || null,
                        username: y || null,
                        password: v || null,
                        host: j || null
                    }
                }

                function n(t) {
                    return t = t || "", a(t).split("/").pop()
                }

                function l(t) {
                    var e = n(t),
                        i = e.split(".");
                    return i.pop(), i.join(".")
                }

                function h(t) {
                    var e, i;
                    return t = t || "", e = a(t).split("/").pop(), i = e.split("."), i.pop().toLowerCase()
                }

                function a(t) {
                    t = t || "";
                    var e = t.split("?")[0];
                    return e = e.split("#")[0]
                }

                function r(t) {
                    var e = a(t).split("/");
                    return e.pop(), "" + e.join("/") + (e.length > 0 ? "/" : "")
                }

                function o(t) {
                    var e, i = document.getElementsByTagName("script"),
                        s = i[i.length - 1],
                        n = s.getAttribute("src");
                    return e = n ? t ? a(n) : r(n) : ""
                }
                var u, c;
                return i = void 0 === i || i, u = o(), c = r(window.location.href), {
                    parse: s,
                    filename: n,
                    basename: l,
                    basepath: r,
                    scriptPath: u,
                    getScriptPath: o,
                    pagePath: c,
                    ext: h
                }
            };
            jbeeb.PathInfo = t()
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function() {
                    this.initialize()
                },
                e = t.prototype;
            t.initialize = function(t) {
                t.addEventListener = e.addEventListener, t.removeEventListener = e.removeEventListener, t.removeAllEventListeners = e.removeAllEventListeners, t.hasEventListener = e.hasEventListener, t.dispatchEvent = e.dispatchEvent
            }, e.b = null, e.initialize = function() {}, e.addEventListener = function(t, e, i, s) {
                var n, l = this.b;
                return l ? this.removeEventListener(t, e, i) : l = this.b = {}, n = l[t], n || (n = l[t] = []), n.push({
                    fn: e,
                    arg: s,
                    scope: i
                }), e
            }, e.removeEventListener = function(t, e, i) {
                var s, n, l, h = this.b;
                if (h && (s = h[t]))
                    for (n = s.length; n--;) l = s[n], l.scope == i && l.fn == e && s.splice(n, 1)
            }, e.removeAllEventListeners = function(t) {
                t ? this.b && delete this.b[t] : this.b = null
            }, e.dispatchEvent = function(t) {
                var e, i, s, n, l, h, a = this.b;
                if (t && a && (e = a[t]))
                    for (i = [].slice.call(arguments), i.splice(0, 1), s = 0; s < e.length; s++) n = e[s], n.fn && (l = i.slice(), h = n.arg, void 0 !== h && l.push(h), l.length ? n.scope ? n.fn.apply(n.scope, l) : n.fn.apply(null, l) : n.scope ? n.fn.call(n.scope) : n.fn())
            }, e.hasEventListener = function(t) {
                var e = this.b;
                return !(!e || !e[t])
            }, e.toString = function() {
                return "[EventDispatcher]"
            }, jbeeb.EventDispatcher || (jbeeb.EventDispatcher = t)
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            var t = function() {
                var t, e = [],
                    i = document,
                    s = i.documentElement.doScroll,
                    n = "DOMContentLoaded",
                    l = (s ? /^loaded|^c/ : /^loaded|^i|^c/).test(i.readyState);
                return l || i.addEventListener(n, t = function() {
                        for (i.removeEventListener(n, t), l = 1; t = e.shift();) t()
                    }),
                    function(t) {
                        l ? t() : e.push(t)
                    }
            };
            jbeeb.ready || (jbeeb.ready = t())
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            function t() {
                return i && i.call(performance) || (new Date).getTime()
            }
            var e = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame,
                i = window.performance && (performance.now || performance.mozNow || performance.msNow || performance.oNow || performance.webkitNow),
                s = function(t) {
                    return this.init(t), this
                },
                n = s.prototype;
            n.addEventListener = null, n.removeEventListener = null, n.removeAllEventListeners = null, n.dispatchEvent = null, n.hasEventListener = null, jbeeb.EventDispatcher.initialize(n), n.g = 50, n.j = 0, n.k = null, n.l = null, n.m = !1, n.state = 0, n.init = function(t) {
                this.m = !!e;
                var i = t.fps || t.FPS;
                i ? this.g = 1e3 / i : this.g = t.interval || 50, t.startNow && this.start()
            }, n.stop = function() {
                this.state = 0, this.n(this.o)
            }, n.getInterval = function() {
                return this.g
            }, n.setInterval = function(t) {
                this.g = t
            }, n.getFPS = function() {
                return Math.round(1e3 / this.g)
            }, n.setFPS = function(t) {
                this.g = 1e3 / t
            }, n.start = function() {
                this.state || (this.state = 1, this.m ? this.n(this.q) : this.n(this.r), this.t())
            }, n.q = function() {
                this.k = null, this.t(), t() - this.j < .97 * (this.g - 1) || this.u()
            }, n.r = function() {
                this.k = null, this.t(), this.u()
            }, n.o = function() {
                this.k = null
            }, n.t = function() {
                if (null == this.k) {
                    if (this.m) return e(this.l), void(this.k = !0);
                    this.k && clearTimeout(this.k), this.k = setTimeout(this.l, this.g)
                }
            }, n.n = function(t) {
                this.l = t.bind(this)
            }, n.u = function() {
                var e = t(),
                    i = e - this.j;
                this.j = e, this.dispatchEvent("tick", {
                    delta: i,
                    time: e
                })
            }, n.getTime = function() {
                return t()
            }, n.destroy = function() {
                this.j = 99999999, this.k && clearTimeout(this.k), this.k = !1, this.m = !1, this.removeAllEventListeners(), this.addEventListener = null, this.removeEventListener = null, this.removeAllEventListeners = null, this.dispatchEvent = null, this.hasEventListener = null, this.l = null
            }, n.toString = function() {
                return "[Ticker]"
            }, jbeeb.Ticker || (jbeeb.Ticker = s)
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t, e, i, s, n, l, h, a, r, o, u, c, d, f, b, p, m, g, y, v, j, w, x, k, S, E, T, C, L, P, F, M, A, B, U, O, D, _, I, z, R, N, X, Y, H, V, W, q, Z, G, J;
            jbeeb.Browser || (t = {}, T = ("undefined" != typeof navigator ? navigator.userAgent : "").toLowerCase(), C = function(t) {
                var e = T.match(t);
                return e && e.length > 1 && e[1] || ""
            }, j = C(/(ipod|iphone|ipad)/i).toLowerCase(), L = /like android/i.test(T), i = !L && /android/i.test(T), o = /CrOS/.test(T), f = /silk/i.test(T), P = /sailfish/i.test(T), x = /tizen/i.test(T), y = /(web|hpw)os/i.test(T), F = /windows phone/i.test(T), M = !F && /windows/i.test(T), A = !j && !f && /macintosh/i.test(T), B = !i && !P && !x && !y && /linux/i.test(T), U = C(/edge\/(\d+(\.\d+)?)/i), O = C(/version\/(\d+(\.\d+)?)/i), D = /tablet/i.test(T), E = !D && /[^-]mobi/i.test(T), _ = !0, I = O || 0, /opera|opr/i.test(T) ? (e = _, I = O || C(/(?:opera|opr)[\s\/](\d+(\.\d+)?)/i)) : F ? (F = _, U ? (h = _, I = U) : (a = _, I = C(/iemobile\/(\d+(\.\d+)?)/i))) : /msie|trident/i.test(T) ? (a = _, I = C(/(?:msie |rv:)(\d+(\.\d+)?)/i)) : o ? (o = _, u = _, r = _, I = C(/(?:chrome|crios|crmo)\/(\d+(\.\d+)?)/i)) : /chrome.+? edge/i.test(T) ? (h = _, I = U) : /chrome|crios|crmo/i.test(T) ? (r = _, I = C(/(?:chrome|crios|crmo)\/(\d+(\.\d+)?)/i)) : j ? (j = _, O && (I = O), /safari/i.test(T) && (p = _)) : /firefox|iceweasel/i.test(T) ? (k = _, I = C(/(?:firefox|iceweasel)[ \/](\d+(\.\d+)?)/i)) : f ? (f = _, I = C(/silk\/(\d+(\.\d+)?)/i)) : i ? (i = _, I = O) : /blackberry|\bbb\d+/i.test(T) || /rim\stablet/i.test(T) ? (b = _, I = O || C(/blackberry[\d]+\/(\d+(\.\d+)?)/i)) : /bada/i.test(T) ? (v = _, I = C(/dolfin\/(\d+(\.\d+)?)/i)) : x ? (x = _, I = C(/(?:tizen\s?)?browser\/(\d+(\.\d+)?)/i) || O) : /safari/i.test(T) && (p = _, I = O), !h && /(apple)?webkit/i.test(T) ? (m = _, !I && O && (I = O)) : !e && /gecko\//i.test(T) && (S = _, I = I || C(/gecko\/(\d+(\.\d+)?)/i)), h || !i && !f ? j && (w = _) : i = _, z = "", F ? z = C(/windows phone (?:os)?\s?(\d+(\.\d+)*)/i) : j ? (z = C(/os (\d+([_\s]\d+)*) like mac os x/i), z = z.replace(/[_\s]/g, ".")) : i ? z = C(/android[ \/-](\d+(\.\d+)*)/i) : b ? z = C(/rim\stablet\sos\s(\d+(\.\d+)*)/i) : v ? z = C(/bada\/(\d+(\.\d+)*)/i) : x && (z = C(/tizen[\/\s](\d+(\.\d+)*)/i)), R = z.split(".")[0], (D || j || i && (3 == R || 4 == R && !E) || f || E || j || i || b || v) && (E = _), I = parseFloat(I) || 100, l = h || a, l && "CSS1Compat" != document.compatMode && (I = 8), (M || F) && (N = "win"), m && (r && 10 > I || i && 5 > I ? g = _ : p && 5.1 > I && (g = _)), k && (d = _), i && (r != _ && (X = T.match(/applewebkit\/([\d.]+)/), X && X[1] < 537 && (s = _)), n = null !== T.match(/android 2\.[12]/)), m ? V = "webkit" : e ? V = "o" : k ? V = "moz" : l && I > 8 && (V = "ms"), G = document.createElement("div"), J = G.style, J.cssText = "linear-gradient(to bottom, #000 0%, #FFF 100%);", Y = ("" + J.backgroundImage).indexOf("gradient") > -1, J = null, G = null, (d && I >= 21 || r && I >= 21 || e && I >= 22 || b && I >= 10) && (H = _), W = "ontouchstart" in window || E ? _ : void 0 !== window.ontouchstart && _, (d && I > 3 || e && I > 9 || l && I > 9 || E || W || Y || H) && (q = _), (l && I >= 11 || d && I >= 10 || r && I >= 15 || p && I >= 5.1 || e && I >= 12.1 || b && I >= 10) && (Z = _), p && M && (Z = !1), t.ua = T, t.version = I, t.ios = w, t.android = i, t.mobile = E, t.win = M, t.opera = e, t.winphone = F, t.ie = l, t.chromium = c, t.chrome = r, t.moz = d, t.blackberry = b, t.safari = p, t.webkit = m, t.oldWebkit = g, t.w3c_gradient = Y, t.w3c_download = H, t.touch = W, t.cssPrefix = V, t.modern = q, t.stockAndroid = s, t.brokenAndroid = n, t.fullscreen = Z, jbeeb.Browser = t)
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t, e = function(t) {
                this.ready = 0, this.A = new jbeeb.Ticker({
                    interval: 50,
                    startNow: 1
                });
                var e = new jbeeb.ReadyBoss;
                t.onReady && (e.add(t.onReady), t.onReady = null), this.B = e, this.C = t, this.init()
            };
            e.D = [], t = e.prototype, t.F = null, t.G = null, t.H = null, t.I = null, t.J = null, t.B = null, t.ready = 0, t.C = null, t.K = !1, t.A = null, t.L = function() {
                var t, i, s, n = this.C;
                e.D.push(n.family), this.F = n.family, this.G = n.testString || "giItT1WQy@!-/#", t = document.createElement("link"), t.type = "text/css", t.rel = "stylesheet", t.href = n.cssUrl, i = document.getElementsByTagName("head")[0], i.appendChild(t), s = document.createElement("span"), s.innerHTML = this.G, s.style.position = "absolute", s.style.left = "-10000px", s.style.top = "-10000px", s.style.fontSize = "300px", s.style.fontFamily = "sans-serif", s.style.fontVariant = "normal", s.style.fontStyle = "normal", s.style.fontWeight = "normal", s.style.letterSpacing = "0", this.H = s, document.body.appendChild(s), this.I = s.offsetWidth, s.style.fontFamily = this.F, this.A.removeEventListener("tick", this.init, this), this.A.addEventListener("tick", this.tick, this)
            }, t.M = !1, t.init = function() {
                var t, i;
                this.M || (t = this.C, e.D.indexOf(t.family) > -1 ? (this.M = !0, this.N()) : (i = 0, document.body && document.body.appendChild && (i = 1), i ? (this.M = !0, this.A.removeEventListener("tick", this.init, this), this.L()) : this.K || (this.K = !0, this.A.addEventListener("tick", this.init, this))))
            }, t.tick = function(t) {
                var e = 0;
                this.H && this.H.offsetWidth != this.I && (e = 1), this.A.getTime() > 3e3 && (e = 1), e && this.N()
            }, t.N = function() {
                this.ready = 1, this.O(), this.B.fire(), this.A.destroy()
            }, t.O = function() {
                this.A.removeEventListener("tick", this.init, this), this.A.removeEventListener("tick", this.tick, this), this.H && (this.H.parentNode.removeChild(this.H), this.H = null)
            }, t.onReady = function(t) {
                var e = [].slice.call(arguments);
                this.ready ? (t.apply(null, e), this.B.fire()) : this.B.add.apply(null, e)
            }, t.destroy = function() {
                this.O(), this.B.destroy()
            }, t.type = "FontFaceLoader", jbeeb.FontFaceLoader || (jbeeb.FontFaceLoader = e)
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            jbeeb.Base || (jbeeb.ticker = null, jbeeb.tickerInterval = 200, jbeeb.scriptPath = null, jbeeb.pagePath = "", jbeeb.assetsBasePath = "", jbeeb.focus = null, jbeeb.binit = 0), jbeeb.unfocus = function() {
                if (jbeeb.focus) {
                    var t = jbeeb.focus;
                    t.element && t.element.blur(), jbeeb.focus = null
                }
            };
            var t = function() {};
            t.P = 0, t.B = new jbeeb.ReadyBoss, t.Q = function(e) {
                return "JBEEB_" + t.P++
            }, t.R = function(e) {
                t.B.add(e.init.bind(e))
            }, t.init = function() {
                jbeeb.Ticker && (jbeeb.ticker = new jbeeb.Ticker({
                    interval: jbeeb.tickerInterval,
                    startNow: 1
                })), jbeeb.assetsBasePath || (jbeeb.assetsBasePath = ""), "http" != window.location.href.substr(0, 4) ? (jbeeb.pagePath || (jbeeb.pagePath = ""), jbeeb.scriptPath || (jbeeb.scriptPath = "")) : (jbeeb.pagePath || (jbeeb.pagePath = jbeeb.PathInfo.pagePath), jbeeb.scriptPath || (jbeeb.scriptPath = jbeeb.PathInfo.scriptPath)), t.B.fire()
            }, jbeeb.Base || (jbeeb.Base = t, jbeeb.register = t.R, jbeeb.getUID = t.Q)
        }(), jbeeb.binit || (jbeeb.binit = 1, jbeeb.ready(function() {
            setTimeout(jbeeb.Base.init, 10)
        })), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t, e, i, s, n) {
                function l(t, i) {
                    e && e(t, i, s, n)
                }

                function h() {
                    o = !0;
                    try {
                        a.abort()
                    } catch (t) {}
                }
                var a, r, o, u, c, d, f;
                i = i || "text", a = null, r = !1, o = !1, u = !1;
                try {
                    a = new XMLHttpRequest
                } catch (t) {
                    if (u = !0, "undefined" != typeof XDomainRequest) a = new XDomainRequest;
                    else try {
                        a = new ActiveXObject("Msxml2.XMLHTTP")
                    } catch (t) {
                        try {
                            a = new ActiveXObject("Microsoft.XMLHTTP")
                        } catch (t) {
                            a = !1
                        }
                    }
                }
                a || l(null, null, s, n), "xml" != i && a.overrideMimeType && (c = "text/plain", "json" == i && (c = "application/json"), a.overrideMimeType(c));
                try {
                    d = t.replace("&amp;", "&"), u ? a.open("get", d) : a.open("get", d, !0), a.onreadystatechange = function() {
                        if (4 == a.readyState && !r) {
                            if (r = !0, !o) {
                                var t;
                                try {
                                    t = "xml" == i ? a.responseXML || a.responseText : a.responseText || a.responseXML
                                } catch (e) {
                                    t = "xml" == i ? a.responseXML || a.responseText : a.responseText || a.responseXML
                                }
                                l(t, a.status)
                            }
                            a = null
                        }
                    }, a.send(null)
                } catch (t) {
                    "xml" == i ? (f = "?", l("<" + f + 'xml version="1.0"' + f + ">", 500)) : (f = "", l(f, 500))
                }
                return {
                    cancel: h
                }
            };
            jbeeb.TextLoader || (jbeeb.TextLoader = t)
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = 0,
                e = function(e, i) {
                    function s() {
                        n = !0
                    }
                    var n, l, h, a, r, o, u, c = [].slice.call(arguments);
                    return c.splice(0, 2), n = !1, i && e && (l = "JBEEB_JSONP_" + t++, h = e + ((e.indexOf("?") < 0 ? "?" : "&") + "callback=" + l), a = document, r = window, r[l] = function(t) {
                        var e = a.getElementById(l);
                        e.parentNode.removeChild(e), e = null, n || (c.unshift(t), i.apply(null, c)), delete r[l]
                    }, o = a.createElement("script"), o.id = l, o.src = h, u = a.getElementsByTagName("head")[0], u.appendChild(o)), {
                        cancel: s
                    }
                };
            jbeeb.JSON_P || (jbeeb.JSON_P = e)
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";

            function t(t) {
                this.S = t, this.T = -1, this.U = []
            }

            function e(t) {
                this.S = t, this.T = -1, this.U = []
            }
            var i = {
                V: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
                encode: function(e) {
                    var i, s, n, l, h, a, r, o, u;
                    if (window.btoa) return window.btoa(e);
                    for (i = [], s = new t(e); s.W();) n = s.X, s.W(), l = s.X, s.W(), h = s.X, a = n >> 2, r = (3 & n) << 4 | l >> 4, o = (15 & l) << 2 | h >> 6, u = 63 & h, isNaN(l) ? o = u = 64 : isNaN(h) && (u = 64), i.push(this.V.charAt(a) + this.V.charAt(r) + this.V.charAt(o) + this.V.charAt(u));
                    return i.join("")
                },
                decode: function(t) {
                    var i, s, n, l, h;
                    if (window.atob) return window.atob(t);
                    for (i = [], s = new e(t); s.W();) n = s.X, 128 > n ? i.push(String.fromCharCode(n)) : n > 191 && 224 > n ? (s.W(), l = s.X, i.push(String.fromCharCode((31 & n) << 6 | 63 & l))) : (s.W(), l = s.X, s.W(), h = s.X, i.push(String.fromCharCode((15 & n) << 12 | (63 & l) << 6 | 63 & h)));
                    return i.join("")
                }
            };
            t.prototype = {
                X: Number.NaN,
                W: function() {
                    if (this.U.length > 0) return this.X = this.U.shift(), !0;
                    if (this.T < this.S.length - 1) {
                        var t = this.S.charCodeAt(++this.T);
                        return 13 == t && 10 == this.S.charCodeAt(this.T + 1) && (t = 10, this.T += 2), 128 > t ? this.X = t : t > 127 && 2048 > t ? (this.X = t >> 6 | 192, this.U.push(63 & t | 128)) : (this.X = t >> 12 | 224, this.U.push(t >> 6 & 63 | 128), this.U.push(63 & t | 128)), !0
                    }
                    return this.X = Number.NaN, !1
                }
            }, e.prototype = {
                X: 64,
                W: function() {
                    var t, e, s, n, l, h, a, r;
                    return this.U.length > 0 ? (this.X = this.U.shift(), !0) : this.T < this.S.length - 1 ? (t = i.V, e = t.indexOf(this.S.charAt(++this.T)), s = t.indexOf(this.S.charAt(++this.T)), n = t.indexOf(this.S.charAt(++this.T)), l = t.indexOf(this.S.charAt(++this.T)), h = e << 2 | s >> 4, a = (15 & s) << 4 | n >> 2, r = (3 & n) << 6 | l, this.X = h, 64 != n && this.U.push(a), 64 != l && this.U.push(r), !0) : (this.X = 64, !1)
                }
            }, jbeeb.Base64 = i
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                var e, i, s, n, l, h, a, r, o, u, c, d, f, b, p, m, g, y, v, j, w, x, k, S, E, T, C, L, P, F, M, A, B, U, O, D, _, I, z, R, N, X, Y, H, V, W, q, Z, G = t,
                    J = !1;
                return jbeeb.Browser && (J = jbeeb.Browser.touch), e = jbeeb.Utils.getXYWH, i = document.documentElement, s = document.defaultView, n = document.body, l = 0, h = 0, a = 300, r = 0, o = 2, u = !1, c = null, d = "mousedown", f = "mouseup", b = "mousemove", p = "mouseover", m = "mouseout", g = "dblclick", y = 0, v = 0, j = 0, w = 0, x = {}, k = !1, S = !1, E = !0, T = function(t) {
                    E = t
                }, C = {
                    mousedown: "touchstart",
                    mouseup: "touchend",
                    mousemove: "touchmove",
                    mouseover: null,
                    mouseout: null,
                    dblclick: "dblclick"
                }, L = jbeeb.Utils.bindEvent, P = jbeeb.Utils.unbindEvent, F = function(t, e, i) {
                    if (J) {
                        var s = C[e];
                        s && t.addEventListener(s, A, !0)
                    }
                    L(t, e, i)
                }, M = function(t, e, i) {
                    if (J) {
                        var s = C[e];
                        s && t.removeEventListener(s, A, !0)
                    }
                    P(t, e, i)
                }, A = function(t) {
                    var e, i, s = t.changedTouches[0];
                    switch (t.type) {
                        case "touchstart":
                            e = "mousedown";
                            break;
                        case "touchmove":
                            e = "mousemove";
                            break;
                        case "touchend":
                            e = "mouseup";
                            break;
                        default:
                            return
                    }
                    t.preventDefault(), e && (i = document.createEvent("MouseEvent"), i.initMouseEvent(e, !0, !0, window, 1, s.screenX, s.screenY, s.clientX, s.clientY, !1, !1, !1, !1, 0, null), i.metouch = 1, s.target.dispatchEvent(i))
                }, B = function(t) {
                    0 == l && (r = 0, h = t.time), l = t.time - h + 1, l > 300 && (r++, r > o && (r = 0, G.dispatchEvent("mouseRepeat", G, x)))
                }, U = function() {
                    for (var t = null, e = G, i = 0; !t;) {
                        if (e.amStage) t = e;
                        else {
                            if (!e.parent) break;
                            e = e.parent
                        }
                        if (i > 100) break;
                        i++
                    }
                    t ? G.stage = t : G.stage = G
                }, O = 0, D = 0, _ = function(t, l, h, a) {
                    var r, o, u, d, f, b, p, m, g, y, v, j, w, x, k, S;
                    for (null == t.pageX && null != t.clientX && (t.pageX = t.clientX + (i && i.scrollLeft || n && n.scrollLeft || 0) - (i && i.clientLeft || n && n.clientLeft || 0), t.pageY = t.clientY + (i && i.scrollTop || n && n.scrollTop || 0) - (i && i.clientTop || n && n.clientTop || 0)), u = G.stage, c || (c = e(u.element)), d = t.pageX, f = t.pageY, b = 0, p = 0, m = u.element, O = 0, D = 0; m;) O += m.scrollLeft || 0, D += m.scrollTop || 0, m = m.parentNode || null;
                    if (d += O, f += D, r = d - c.x, o = f - c.y, u.mouseX = r, u.mouseY = o, g = r, y = o, v = l.parent) {
                        for (; !v.amStage;) b += v.element.scrollLeft, p += v.element.scrollTop, r -= v.x, o -= v.y, v = v.parent;
                        g = r, y = o
                    }
                    return j = s.getComputedStyle(n, ""), w = parseFloat(j.marginTop), x = parseFloat(j.marginLeft), k = r - l.x - w, S = o - l.y - x, {
                        mouseX: k,
                        mouseY: S,
                        parentX: g,
                        parentY: y,
                        pageX: d,
                        pageY: f,
                        scrollX: b,
                        scrollY: p,
                        event: t
                    }
                }, I = function(t) {
                    return M(document, b, z), x.event = t, G.hasEventListener("mouseRepeat") && jbeeb.ticker.removeEventListener("tick", B), M(document, f, I), l = 0, (!t.metouch && R ? 1 : 0) || G.dispatchEvent("mouseUp", G, x), !1
                }, z = function(t) {
                    return (!t.metouch && R ? 1 : 0) || (x = _(t, G, J), x.startX = y, x.startY = v, x.dragX = x.parentX - y + x.scrollX, x.dragY = x.parentY - v + x.scrollY, x.deltaX = x.dragX - j, x.deltaY = x.dragY - w, x.event = t, G.dispatchEvent("mouseDrag", G, x)), !1
                }, R = 0, N = function(t) {
                    return !!E && (t.metouch && (R = 1), (!t.metouch && R ? 1 : 0) || (G.stage || U(), c = null, x = _(t, G, J, !0), y = x.startX = x.mouseX + x.scrollX, v = x.startY = x.mouseY + x.scrollY, j = x.dragX = x.parentX - y, w = x.dragY = x.parentY - v, x.deltaX = 0, x.deltaY = 0, x.event = t, G.MELbubble || (t.stopPropagation && t.stopPropagation(), t.preventDefault && !G.editable && t.preventDefault()), G.dispatchEvent("mouseDown", G, x), G.dispatchEvent("mouseClick", G, x), M(document, f, I), F(document, f, I), G.hasEventListener("mouseDrag") && (M(document, b, z), F(document, b, z)), G.hasEventListener("mouseRepeat") && jbeeb.ticker.addEventListener("tick", B)), !1)
                }, X = function(t) {
                    return Y(t, "in") ? (S || (G.dispatchEvent("mouseOver", G, x), S = !0), G.dispatchEvent("mouseMove", G, x), !1) : (S && (M(document, b, X), G.dispatchEvent("mouseOut", G, x), k = !1, S = !1), !1)
                }, Y = function(t, e) {
                    x = _(t, G, J), y = x.startX = x.mouseX + x.scrollX, v = x.startY = x.mouseY + x.scrollY, j = x.dragX = x.parentX - y, w = x.dragY = x.parentY - v, x.deltaX = 0, x.deltaY = 0, x.event = t;
                    var i, s, n, l;
                    if (i = x.mouseX, s = x.mouseY, n = G.width, l = G.height, "in" == e) {
                        if (i > 0 && s > 0 && n > i && l > s) return !0
                    } else if (0 > i || 0 > s || i > n || s > l) return !0;
                    return !1
                }, H = function(t) {
                    return G.stage || U(), k || (M(document, b, X), F(document, b, X), k = !0), !1
                }, M(G.element, d, N), F(G.element, d, N), V = function(t) {
                    J || (u = !0, G.stage || U(), 1 == t ? (M(G.element, p, H), F(G.element, p, H)) : M(G.element, p, H))
                }, W = function(t) {
                    return G.stage || U(), x = _(t, G, J, !0), G.dispatchEvent("doubleClick", G, x), !1
                }, q = function(t) {
                    1 == t ? (M(G.element, g, W), F(G.element, g, W)) : M(G.element, g, W)
                }, Z = function() {
                    jbeeb.ticker && jbeeb.ticker.removeEventListener("tick", B), M(document, f, I), M(document, b, z), M(document, b, X), M(G.element, d, N), M(G.element, p, H), M(G.element, g, W), V = null, H = null, Y = null, X = null, N = null, z = null, I = null, _ = null, U = null, B = null, F = null, M = null, J = null, e = null, i = null, n = null, l = null, h = null, a = null, r = null, o = null, u = null, c = null, d = null, f = null, b = null, p = null, m = null, y = null, v = null, j = null, w = null, x = null, k = null, S = null, G = null
                }, {
                    enableMouseOver: V,
                    enableDoubleClick: q,
                    tick: B,
                    type: "MouseEventListener",
                    destroy: Z,
                    setEnabled: T
                }
            };
            jbeeb.MouseEventListener = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";

            function t(t) {
                return t.charAt(0).toUpperCase() + t.slice(1)
            }
            var e = function(t) {
                    this.init(t)
                },
                i = e.prototype;
            i.addEventListener = null, i.removeEventListener = null, i.removeAllEventListeners = null, i.dispatchEvent = null, i.hasEventListener = null, jbeeb.EventDispatcher.initialize(i), i.amStage = null, i.element = null, i.stage = null, i.parent = null, i.MELbubble = null, i.Y = null, i.Z = null, i.$ = null, i._ = null, Object.defineProperty(i, "x", {
                get: function() {
                    var t = jbeeb.Utils.getXYWH(this.element),
                        e = t.x;
                    return this.Y = e, e
                },
                set: function(t) {
                    this.element.style.left = t + "px", this.Y = t
                }
            }), Object.defineProperty(i, "y", {
                get: function() {
                    var t = jbeeb.Utils.getXYWH(this.element),
                        e = t.y;
                    return this.Z = e, e
                },
                set: function(t) {
                    this.element.style.top = t + "px", this.Z = t
                }
            }), Object.defineProperty(i, "width", {
                get: function() {
                    var t = jbeeb.Utils.getXYWH(this.element),
                        e = t.width;
                    return this.$ = e, e
                },
                set: function(t) {
                    this.element.style.width = t + "px", this.$ = t
                }
            }), Object.defineProperty(i, "height", {
                get: function() {
                    var t = jbeeb.Utils.getXYWH(this.element),
                        e = t.height;
                    return this._ = e, height
                },
                set: function(t) {
                    this.element.style.height = t + "px", this._ = t
                }
            }), i.init = function(t) {
                var e, i, s, n, l = t.element;
                for ("string" == typeof l && (l = document.getElementById(l)), this.element = l, this.amStage = !0, this.stage = null, this.parent = {
                        element: l.parentNode,
                        amStage: !0
                    }, e = ["down", "up", "click", "over", "move", "drag", "out", "doubleClick"], i = 0; i < e.length; i++) s = e[i], n = t[s], n && this.addListener(s, n.fn, n.scope, n.arg)
            }, i.setMouseEnabled = function(t) {
                var e = this.element.style,
                    i = 0 === t || t === !1,
                    s = i ? "none" : "auto";
                e.pointerEvents = s, this.aa && this.aa.setEnabled(!i)
            }, i.aa = null, i.MELbubble = !1, i.MELpreventDefault = !0, i.MELpropagate = !1, i.addListener = function(e, i, s, n, l) {
                e = "doubleClick" == e ? e : "mouse" + t(e), this.MELbubble = n, this.MELpreventDefault = !1, this.MELpropagate = !1, this.aa || (this.aa = new jbeeb.MouseEventListener(this)), "mouseOver" == e || "mouseOut" == e || "mouseMove" == e ? this.aa.enableMouseOver(1) : "doubleClick" == e && this.aa.enableDoubleClick(1), this.addEventListener(e, i, s, l)
            }, i.removeListener = function(e, i) {
                e = "mouse" + t(e), this.removeEventListener(e, i, this), "mouseOver" == e ? this.aa && this.aa.enableMouseOver(0) : "doubleClick" == e && this.aa && this.aa.enableDoubleClick(0);
            }, i.removeAllListeners = function() {
                this.removeAllEventListeners(null), this.aa && (this.aa.destroy(), this.aa = null)
            }, i.toString = function() {
                return "[Pointer (name=" + this.name + ")]"
            }, i.type = "Pointer", jbeeb.Pointer = e
        }(), "object" != typeof JSON && (JSON = {}),
        function() {
            "use strict";

            function f(t) {
                return 10 > t ? "0" + t : t
            }

            function quote(t) {
                return escapable.lastIndex = 0, escapable.test(t) ? '"' + t.replace(escapable, function(t) {
                    var e = meta[t];
                    return "string" == typeof e ? e : "\\u" + ("0000" + t.charCodeAt(0).toString(16)).slice(-4)
                }) + '"' : '"' + t + '"'
            }

            function str(t, e) {
                var i, s, n, l, h, a = gap,
                    r = e[t];
                switch (r && "object" == typeof r && "function" == typeof r.toJSON && (r = r.toJSON(t)), "function" == typeof rep && (r = rep.call(e, t, r)), typeof r) {
                    case "string":
                        return quote(r);
                    case "number":
                        return isFinite(r) ? r + "" : "null";
                    case "boolean":
                    case "null":
                        return r + "";
                    case "object":
                        if (!r) return "null";
                        if (gap += indent, h = [], "[object Array]" === Object.prototype.toString.apply(r)) {
                            for (l = r.length, i = 0; l > i; i += 1) h[i] = str(i, r) || "null";
                            return n = 0 === h.length ? "[]" : gap ? "[\n" + gap + h.join(",\n" + gap) + "\n" + a + "]" : "[" + h.join(",") + "]", gap = a, n
                        }
                        if (rep && "object" == typeof rep)
                            for (l = rep.length, i = 0; l > i; i += 1) "string" == typeof rep[i] && (s = rep[i], n = str(s, r), n && h.push(quote(s) + (gap ? ": " : ":") + n));
                        else
                            for (s in r) Object.prototype.hasOwnProperty.call(r, s) && (n = str(s, r), n && h.push(quote(s) + (gap ? ": " : ":") + n));
                        return n = 0 === h.length ? "{}" : gap ? "{\n" + gap + h.join(",\n" + gap) + "\n" + a + "}" : "{" + h.join(",") + "}", gap = a, n
                }
            }
            "function" != typeof Date.prototype.toJSON && (Date.prototype.toJSON = function() {
                return isFinite(this.valueOf()) ? this.getUTCFullYear() + "-" + f(this.getUTCMonth() + 1) + "-" + f(this.getUTCDate()) + "T" + f(this.getUTCHours()) + ":" + f(this.getUTCMinutes()) + ":" + f(this.getUTCSeconds()) + "Z" : null
            }, String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function() {
                return this.valueOf()
            });
            var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
                escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
                gap, indent, meta = {
                    "\b": "\\b",
                    "\t": "\\t",
                    "\n": "\\n",
                    "\f": "\\f",
                    "\r": "\\r",
                    '"': '\\"',
                    "\\": "\\\\"
                },
                rep;
            "function" != typeof JSON.stringify && (JSON.stringify = function(t, e, i) {
                var s;
                if (gap = "", indent = "", "number" == typeof i)
                    for (s = 0; i > s; s += 1) indent += " ";
                else "string" == typeof i && (indent = i);
                if (rep = e, e && "function" != typeof e && ("object" != typeof e || "number" != typeof e.length)) throw Error("JSON.stringify");
                return str("", {
                    "": t
                })
            }), "function" != typeof JSON.parse && (JSON.parse = function(text, reviver) {
                function walk(t, e) {
                    var i, s, n = t[e];
                    if (n && "object" == typeof n)
                        for (i in n) Object.prototype.hasOwnProperty.call(n, i) && (s = walk(n, i), void 0 !== s ? n[i] = s : delete n[i]);
                    return reviver.call(t, e, n)
                }
                var j;
                if (text += "", cx.lastIndex = 0, cx.test(text) && (text = text.replace(cx, function(t) {
                        return "\\u" + ("0000" + t.charCodeAt(0).toString(16)).slice(-4)
                    })), /^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:\s*\[)+/g, ""))) return j = eval("(" + text + ")"), "function" == typeof reviver ? walk({
                    "": j
                }, "") : j;
                throw new SyntaxError("JSON.parse")
            })
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t, e, i) {
                    this.ba(t, e, i)
                },
                e = t.prototype;
            e.ca = !1, e.da = !1, e.ea = "2147480000", e.fa = null, e.ga = null, e.ha = null, e.ia = null, e.ja = null, e.ka = null, e.la = null, e.ma = null, e.na = null, e.oa = null, e.pa = null, e.qa = null, e.ra = null, e.sa = null, e.ta = null, e.ba = function(t, e, i) {
                var s, n, l, h, a, r, o, u, c, d, f, b, p, m, g = jbeeb.Browser;
                this.ca = !1, this.va = {}, this.da = g.fullscreen, this.ha = g, this.na = i, this.da && (s = g.chrome, n = g.ie, l = g.moz, h = g.webkit, a = g.oldWebkit, r = g.ios, o = g.opera, u = "undefined", c = document, d = "requestFullscreen", f = "exitFullscreen", b = "fullscreenchange", p = "fullscreen", m = "fullscreenElement", h ? (a ? (d = "webkitRequestFullScreen", f = "webkitCancelFullScreen") : (d = "webkitRequestFullscreen", f = "webkitExitFullscreen"), b = "webkitfullscreenchange", p = "webkitFullscreen", m = "webkitFullscreenElement") : l ? (d = "mozRequestFullScreen", f = "mozCancelFullScreen", b = "mozfullscreenchange", p = "mozFullscreen", m = "mozFullScreenElement") : o ? (d = "oRequestFullScreen", f = "oExitFullScreen", b = "ofullscreenchange", p = "oFullscreen", m = "oFullscreenElement") : n && (d = "msRequestFullscreen", f = "msExitFullscreen", b = "MSFullscreenChange", p = "msFullscreen", m = "msFullscreenElement"), this.ia = d, this.ja = f, this.ka = b, this.la = p, this.ma = m, this.ra = this.wa.bind(this)), this.ga = e, this.setFullscreenObject(t)
            }, e.xa = null, e.setFullscreenObject = function(t, e) {
                var i, s;
                t ? (i = t.element, this.fa = i, this.pa = t, this.xa = 0, this.da && "MediaController" == t.type && e && (s = (e.nodeName + "").toLowerCase(), "video" == s && (this.fa = e, this.xa = 1, this.ha.ios && this.ha.safari && (this.ia = "webkitEnterFullScreen")))) : (this.ha.ios && this.ha.safari && (this.fa.removeEventListener("webkitbeginfullscreen", this.ra), this.fa.removeEventListener("webkitendfullscreen", this.ra)), this.fa = null, this.pa = null, this.xa = 0)
            }, e.enter = function(t) {
                this.fa && (this.ca = 1, this.da ? (this.qa = -1, document.removeEventListener(this.ka, this.ra), document.addEventListener(this.ka, this.ra), this.ha.webkit ? this.ha.oldWebkit ? this.fa[this.ia]() : void 0 !== Element.ALLOW_KEYBOARD_INPUT ? this.fa[this.ia](Element.ALLOW_KEYBOARD_INPUT) : this.fa[this.ia]() : this.fa[this.ia](), this.ha.ios && this.ha.safari && (this.fa.removeEventListener("webkitbeginfullscreen", this.ra), this.fa.removeEventListener("webkitendfullscreen", this.ra), this.fa.addEventListener("webkitbeginfullscreen", this.ra, !1), this.fa.addEventListener("webkitendfullscreen", this.ra, !1)), this.xa || this.ya()) : this.ya(), this.za(1))
            }, e.wa = function(t) {
                this.qa++, this.qa > 0 && this.exit()
            }, e.za = function(t) {
                this.ga && this.ga(t)
            }, e.exit = function(t) {
                this.ca = 0, this.qa = -1, this.za(0), this.da ? (document[this.ja] && document[this.ja](), document.removeEventListener(this.ka, this.ra), this.ha.ios && this.ha.safari && (this.fa.removeEventListener("webkitbeginfullscreen", this.ra), this.fa.removeEventListener("webkitendfullscreen", this.ra)), this.xa || this.Aa()) : this.Aa()
            }, e.Ba = function(t) {
                27 == (t.which || t.keyCode) && this.exit()
            }, e.Ca = function(t, e) {
                27 == e && this.exit()
            }, e.Da = null, e.ya = function() {
                var t, e, i, s = window.getComputedStyle(this.fa);
                this.ta = {
                    p: s.getPropertyValue("position"),
                    x: parseInt(s.getPropertyValue("left")),
                    y: parseInt(s.getPropertyValue("top")),
                    w: parseInt(s.getPropertyValue("width")),
                    h: parseInt(s.getPropertyValue("height")),
                    z: parseInt(s.getPropertyValue("z-index")) || 0
                }, t = this.fa.style, t.top = "0px", t.left = "0px", t.width = "100%", t.height = "100%", this.da || (e = new jbeeb.Rube({
                    w: 24,
                    h: 24,
                    fill: [{
                        color: "#000000",
                        alpha: .45183
                    }, {
                        color: "#797979",
                        alpha: .76151
                    }],
                    stroke: [{
                        weight: 2,
                        color: "#e0e0e0",
                        alpha: 1
                    }, {
                        weight: 2,
                        color: "#ffffff",
                        alpha: 1
                    }],
                    rounded: .31947,
                    text: "x",
                    font: "WimpyPlayerGlyphs",
                    align: "center",
                    textColor: [{
                        color: "#ffffff",
                        alpha: 1
                    }, {
                        color: "#ffffff",
                        alpha: 1
                    }]
                }), i = e.style, i.position = "fixed", i.left = "", i.right = "10px", i.top = "10px", i.zIndex = this.ea + 1, e.addMEL("mouseDown", this.Ea, this), e.addMEL("mouseUp", this.Fa, this), this.Da = e, document.body.appendChild(e.element), t.zIndex = this.ea - 1, t.position = "fixed"), this.sa || (this.sa = this.Ba.bind(this)), jbeeb.Utils.bindEvent(window, "keydown", this.sa)
            }, e.Ea = function(t, e, i) {
                t.setState(1)
            }, e.Fa = function(t, e, i) {
                t.setState(2), this.exit()
            }, e.Aa = function() {
                var t, e, i;
                jbeeb.Utils.unbindEvent(window, "keydown", this.sa), this.da || (t = this.ta, e = this.fa.style, e.position = "relative", e.left = t.x + "px", e.top = t.y + "px", e.width = t.w + "px", e.height = t.h + "px", e.zIndex = t.z, i = this.Da, i.removeAllMEL(), i.destroy()), this.pa.setXYWH(this.pa.x, this.pa.y, this.pa.width, this.pa.height)
            }, e.destroy = function() {
                this.ga = null, this.ra = null, (0, jbeeb.Utils.unbindEvent)(window, "keydown", this.sa), this.sa = null
            }, jbeeb.Fullscreen = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                var e, i, s, n, l, h, a, r, o, u, c, d, f, b, p = function(t) {
                        return "string" == typeof t && (t = t.toLowerCase()), t === !0 || 1 === t || "1" === t || "true" === t
                    },
                    m = function(t) {
                        return void 0 !== t && null !== t
                    },
                    g = function() {
                        return (new Date).getTime()
                    },
                    y = ("undefined" != typeof navigator ? navigator.userAgent : "").toLowerCase(),
                    v = function(t) {
                        var e = y.match(t);
                        return e && e.length > 1 && e[1] || ""
                    },
                    j = !1,
                    w = 0;
                if (/msie|trident/i.test(y) && (j = !0, w = parseInt(v(/(?:msie |rv:)(\d+(\.\d+)?)/i) || v(/version\/(\d+(\.\d+)?)/i))), j && "CSS1Compat" != document.compatMode && (w = 8), e = {}, e.bgcolor = t.bgcolor || "#000000", t.scale && (e.scale = t.scale), t.salign && (e.salign = t.salign), t.allowScriptAccess && (p(t.allowScriptAccess) ? e.allowScriptAccess = "always" : e.allowScriptAccess = t.allowScriptAccess), t.allowFullScreen && (e.allowFullScreen = p(t.allowFullScreen) ? "true" : "false"), t.menu && (e.menu = p(t.menu) ? "true" : "false"), t.wmode && (e.wmode = t.wmode || "opaque"), t.flashvars) {
                    i = t.flashvars, s = [];
                    for (n in i) s.push(n + "=" + escape(i[n]));
                    e.flashVars = s.join("&")
                }
                if (e.allowScriptAccess = e.allowScriptAccess ? e.allowScriptAccess : "always", l = t.swf, h = j ? "cb=" + g() : "", l += e.flashVars ? "?" + encodeURIComponent(e.flashVars) + "&" + h : "?" + h, j && 10 > w) {
                    o = "", 9 > w ? (u = "jbeebFlashElementReplacing" + g(), t.element.innerHTML = '<div id="' + u + '"></div>', r = document.getElementById(u), i = "8,0,0,0", c = t.flashVersion, c && (d = parseInt(i), d > 4 && (i = d + ",0,0,0")), o += '<object codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=' + i + '"') : (r = document.createElement("DIV"), t.element.appendChild(r), o += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'), o += ' style="outline:0px;', m(t.x) && (o += "left:" + (t.x || "0") + "px;"), m(t.y) && (o += "top:" + (t.y || "0") + "px;"), o += '"', o += ' id="' + t.id + '"', o += ' width="' + t.w + '"', o += ' height="' + t.h + '"', o += ">", o += '<param name="movie" value="' + l + '" />', f = "", f += 'src="' + l + '" ', f += 'name="' + t.id + '" id="' + t.id + '" ';
                    for (n in e) o += '<param name="' + n + '" value="' + e[n] + '" />', f += n + '="' + e[n] + '" ';
                    9 > w ? o = "<embed " + f + "/>" : o += "</object>", r.outerHTML = o, a = document.getElementById(t.id)
                } else {
                    a = document.createElement("object"), a.id = t.id, a.width = t.w, a.height = t.h, a.style.outline = 0, m(t.x) && (a.style.left = t.x || "0px"), m(t.y) && (a.style.top = t.y || "0px"), a.type = "application/x-shockwave-flash", a.data = l;
                    for (n in e) b = document.createElement("param"), b.setAttribute("name", n), b.setAttribute("value", e[n]), a.appendChild(b);
                    t.element.appendChild(a)
                }
                return a
            };
            jbeeb.FlashElement = t
        }(),
        function() {
            "use strict";
            var t = function(t) {
                function e(t) {
                    var e, i;
                    if (e = "string" == typeof t ? document.getElementById(t) : t) {
                        for (i in e) "function" == typeof e[i] && (e[i] = null);
                        e.parentNode.removeChild(e)
                    }
                }
                var i;
                i = "string" == typeof t ? document.getElementById(t) : t, i && /object|embed/i.test(i.nodeName) && (jbeeb.Browser.ie ? (i.style.display = "none", function() {
                    4 == i.readyState ? e(id) : setTimeout(arguments.callee, 10)
                }()) : i.parentNode.removeChild(i))
            };
            jbeeb.FlashElementRemove = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function() {
                function t(t) {
                    return t ? a : a[0] + "." + a[1]
                }

                function e(t) {
                    return "string" == typeof t && (t = t.replace(/\,/gi, ".")), t = ("" + t).split("."), t[1] = t[1] || 0, t[2] = t[2] || 0, a[0] > t[0] || a[0] == t[0] && a[1] > t[1] || a[0] == t[0] && a[1] == t[1] && a[2] >= t[2]
                }
                var i, s, n, l, h = window.navigator,
                    a = (window.navigator.userAgent.toLowerCase(), [0, 0, 0]),
                    r = "Shockwave Flash",
                    o = "application/x-shockwave-flash",
                    u = h.plugins;
                if (void 0 !== u && "object" == typeof u[r]) {
                    if (i = u[r].description, s = h.mimeTypes, i && (void 0 === s || !s[o] || s[o].enabledPlugin))
                        for (a = i.replace(r, "").replace(/^\s+/, "").replace(/\sr/gi, ".").split("."), n = 0; n < a.length; n++) a[n] = parseInt(a[n].match(/\d+/), 10)
                } else if (void 0 !== window.ActiveXObject) try {
                    l = new ActiveXObject("ShockwaveFlash.ShockwaveFlash"), l && (i = l.GetVariable("$version"), i && (i = i.split(" ")[1].split(","), a = [parseInt(i[0], 10), parseInt(i[1], 10), parseInt(i[2], 10)]))
                } catch (t) {}
                return {
                    hasVersion: e,
                    getVersion: t
                }
            };
            jbeeb.FlashDetect || (jbeeb.FlashDetect = t())
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t, e = function(t) {
                return this.init(t), this
            };
            e.D = [], t = e.prototype, t.w = null, t.h = null, t.controls = null, t.controlsList = null, t.url = "", t.onComplete = null, t.target = null, t.amSM = !1, t.rawData = null, t.sourceX = null, t.sourceY = null, t.sourceW = null, t.sourceH = null, t.width = null, t.height = null, t.styles = null, t.bkgdColor = null, t.Ga = null, t.Ha = null, t.Ia = null, t.Ja = null, t.Ka = null, t.La = null, t.init = function(t) {
                this.target = t.target, this.amSM = t.amSM, this.onComplete = t.onComplete, this.Ka = t.preSort, this.Ia = t.preProcess, this.Ja = t.postProcess, t.url && this.load(t.url)
            }, t.clear = function() {
                var t, e;
                if (this.controls) {
                    for (t in this.controls) e = this.controls[t], e && (e.removeAllMEL && e.removeAllMEL(), e.removeAllEventListeners && e.removeAllEventListeners(), e.element && e.element.parentNode && e.element.parentNode.removeChild(e.element), this.target && e && this.target.removeChild(e), e.destroy && e.destroy(), e = null), this.controls[t] = null, this.styles[t] = null;
                    this.controls = null, this.controlsList = null
                }
            }, t.destroy = function() {
                this.Ia = null, this.Ja = null, this.Ga && this.Ga.cancel(), this.Ga = null, this.Ha && this.Ha.cancel(), this.Ha = null, this.clear(), this.onComplete = null, this.controls = null, this.controlsList = null, this.styles = null
            }, t.load = function(t, i) {
                var s, n, l, h;
                if (this.clear(), this.Ga && this.Ga.cancel(), this.La = 0, t)
                    if (this.url = t, i && (this.onComplete = i), "string" == typeof t)
                        if ("{" == t.substr(0, 1)) this.Ha = new jbeeb.DelayCall(this.setup.bind(this), 1, t);
                        else {
                            for (s = e.D, n = 0, l = 0; l < s.length; l++) h = s[l], t == h.url && (n = h.raw);
                            n ? this.Ha = new jbeeb.DelayCall(this.setup.bind(this), 1, n) : (this.La = 1, this.Ga = new jbeeb.TextLoader(t, this.setup.bind(this)))
                        } else this.Ha = new jbeeb.DelayCall(this.setup.bind(this), 1, t)
            }, t.setup = function(t) {
                var i, s, n, l, h, a, r, o, u, c, d, f, b;
                if (this.clear(), this.Ga = null, this.controls = {}, this.controlsList = [], this.styles = {}, t = t || null, this.La && e.D.push({
                        url: this.url,
                        raw: t
                    }), i = "string" == typeof t ? jbeeb.Utils.parseJSON(t) || {} : t || {}, i.thumbnail = null, this.rawData = jbeeb.Utils.clone(i), s = this.target, this.bkgdColor = i.bkgdColor || "#FFFFFF", n = jbeeb.Utils.sortOn, l = i.layout, h = null, l) {
                    for (n(l, "z", !1, !0), this.Ka && this.Ka(l), a = 0, r = 0, o = jbeeb.Utils.isNumber(i.x) ? i.x : 100, u = jbeeb.Utils.isNumber(i.y) ? i.y : 100, this.amSM && (c = jbeeb.Utils.getWindowSize(), o + i.width > c.w && (o = 10), u + i.height > c.h && (u = 10)), this.sourceX = o, this.sourceY = u, this.sourceW = this.width = i.width, this.sourceH = this.height = i.height, d = 0; d < l.length; d++) f = l[d], f.children && n(f.children, "z", !1, !0), this.Ma(f, i), this.amSM && (f.x += o, f.y += u), b = f.x + f.w, b > a && (a = b), b = f.y + f.h, b > r && (r = b), this.addObject(f);
                    this.amSM && (a -= o || 0, r -= u || 0), this.sourceW = a, this.sourceH = r, s.amStage && s.setSize(a, r), h = 1
                }
                this.onComplete && this.onComplete(h)
            }, t.Ma = function(t, e) {
                var i, s;
                if (this.Na(t.image, e), t.children)
                    for (i = t.children, s = 0; s < i.length; s++) this.Ma(i[s], e)
            }, t.Na = function(t, e) {
                var i, s;
                if (t && e.images)
                    if (jbeeb.Utils.isArray(t))
                        for (i = 0; i < t.length; i++) s = t[i], this.Oa(s, e);
                    else s = t, this.Oa(s, e)
            }, t.Oa = function(t, e) {
                if (t && t.url && "JBEEBIMAGE_" == t.url.substr(0, 11)) {
                    var i = e.images[t.url];
                    i && "JBEEBIMAGE_" == i.substr(0, 11) && (i = e.images[i]), t.url = i
                }
            }, t.removeObject = function(t) {
                var e, i, s, n, l = t.name;
                for (e in this.controls)
                    if (i = this.controls[e], t == i) {
                        s = i.name, this.target.removeChild(i), i.destroy(), i = null, this.controls[s] = null, this.styles[s] = null;
                        break
                    }
                for (n = 0; n < this.controlsList.length; n++) this.controlsList[n] == l && this.controlsList.splice(n, 1)
            }, t.addObject = function(t, e) {
                var i, s, n, l, h, a = e || this.target;
                for (this.Ia && (t = this.Ia(t)), i = t.name || jbeeb.getUID(), s = 1, n = i; this.controlsList.indexOf(n) > -1;) n = i + "_" + s++;
                return n != i && (i = n), l = t.type, h = this.Pa(t), h ? (h.name = i, e ? e.addChild(h) : (this.controls[i] = h, this.controlsList.push(i), a.addChild(h)), this.styles[i] = jbeeb.Utils.clone(t), this.Ja && this.Ja(h), h) : null
            }, t.Pa = function(t) {
                var e, i = null;
                return t && (t.amSM = this.amSM, e = t.type, e && ("Box" == e ? (i = this.amSM ? new jbeeb.Container(t) : new jbeeb.Box(t), i.temp.originalType = "Box") : "TextBox" == e ? (i = this.amSM ? new jbeeb.TextContainer(t) : new jbeeb.TextBox(t), i.temp.originalType = "TextBox") : "TextScroller" == e ? (i = this.amSM ? new jbeeb.TextContainer(t) : new jbeeb.TextScroller(t), i.temp.originalType = "TextScroller") : "Thinker" == e ? (i = this.amSM ? new jbeeb.TextContainer(t) : new jbeeb.Thinker(t), i.temp.originalType = "Thinker") : void 0 !== jbeeb[e] && (i = new jbeeb[e](t)), this.Qa(i, t))), i
            }, t.Qa = function(t, e) {
                var i, s, n;
                if (("Container" == e.type || "TextContainer" == e.type) && e.children)
                    for (i = e.children, s = 0; s < i.length; s++) n = this.Pa(i[s]), n && t.addChild(n)
            }, t.toString = function() {
                return "[Skin (url=" + this.url + ")]"
            }, t.type = "Skin", jbeeb.Skin = e
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function() {
                function t(t) {
                    var e, i, s, l, h;
                    if (n = !1, e = t.obj)
                        for (i = e.style, i.mozTransition = i.oTransition = i.msTransition = i.webkitTransition = i.transition = t.css, s = t.funcs, l = 0; l < s.length; l++) h = s[l], h.f.call(e, h.e)
                }

                function e(e) {
                    t(e)
                }
                var i = {},
                    s = !1,
                    n = !1,
                    l = null,
                    h = new jbeeb.Ticker({
                        interval: 500
                    }),
                    a = { in : "ease-in", out: "ease-out", "in-out": "ease-in-out", snap: "cubic-bezier(0,1,.5,1)", linear: "cubic-bezier(0.250, 0.250, 0.750, 0.750)", "ease-in-quad": "cubic-bezier(0.550, 0.085, 0.680, 0.530)", "ease-in-cubic": "cubic-bezier(0.550, 0.055, 0.675, 0.190)", "ease-in-quart": "cubic-bezier(0.895, 0.030, 0.685, 0.220)", "ease-in-quint": "cubic-bezier(0.755, 0.050, 0.855, 0.060)", "ease-in-sine": "cubic-bezier(0.470, 0.000, 0.745, 0.715)", "ease-in-expo": "cubic-bezier(0.950, 0.050, 0.795, 0.035)", "ease-in-circ": "cubic-bezier(0.600, 0.040, 0.980, 0.335)", "ease-in-back": "cubic-bezier(0.600, -0.280, 0.735, 0.045)", "ease-out-quad": "cubic-bezier(0.250, 0.460, 0.450, 0.940)", "ease-out-cubic": "cubic-bezier(0.215, 0.610, 0.355, 1.000)", "ease-out-quart": "cubic-bezier(0.165, 0.840, 0.440, 1.000)", "ease-out-quint": "cubic-bezier(0.230, 1.000, 0.320, 1.000)", "ease-out-sine": "cubic-bezier(0.390, 0.575, 0.565, 1.000)", "ease-out-expo": "cubic-bezier(0.190, 1.000, 0.220, 1.000)", "ease-out-circ": "cubic-bezier(0.075, 0.820, 0.165, 1.000)", "ease-in-out-quart": "cubic-bezier(0.770, 0.000, 0.175, 1.000)", "ease-in-out-quint": "cubic-bezier(0.860, 0.000, 0.070, 1.000)", "ease-in-out-sine": "cubic-bezier(0.445, 0.050, 0.550, 0.950)", "ease-in-out-expo": "cubic-bezier(1.000, 0.000, 0.000, 1.000)", "ease-in-out-circ": "cubic-bezier(0.785, 0.135, 0.150, 0.860)", "ease-in-out-back": "cubic-bezier(0.680, -0.550, 0.265, 1.550)", "ease-in-bounce": "cubic-bezier(0.7,0.28,0.67,1.53)", "whip-in": "cubic-bezier(0.7,0.28,0.67,1.53)"
                    },
                    r = function(l, h, r, u, c, d) {
                        var f, b, p, m, g, y, v, j, w, x, k, S, E;
                        s || (n = !0, o()), f = "string" == typeof u ? a[u] : 1 === u ? "ease-out" : u === -1 ? "ease-in" : "linear", b = [], p = [], m = [];
                        for (g in h) y = h[g], v = l[g], j = y - v, w = {
                            v: g,
                            f: l.setAlpha,
                            s: v,
                            e: y,
                            d: j
                        }, "alpha" == g ? w.f = l.setAlpha : "x" == g ? w.f = l.setX : "y" == g ? w.f = l.setY : "width" == g ? w.f = l.setWidth : "height" == g ? w.f = l.setHeight : "scale" == g && (w.f = l.setScale), b.push(g), p.push(w);
                        return m = "all " + r + "ms " + f, x = l.id + b.sort().join(""), k = {
                            elapsed: 0,
                            duration: r,
                            delayElapsed: 0,
                            delay: c || 0,
                            obj: l,
                            funcs: p,
                            complete: d,
                            id: x,
                            css: m
                        }, S = i[x], S && (E = S.elapsed, k.duration = r > E ? r - E : r), i[x] = k, c = c || 0, c > 0 ? new jbeeb.DelayCall(e, c, k) : t(k), k
                    },
                    o = function() {
                        l && l.cancel(), h.state || (h.start(), h.addEventListener("tick", d, this))
                    },
                    u = function() {
                        n || (l = new jbeeb.DelayCall(c, 3e3))
                    },
                    c = function() {
                        h.removeAllEventListeners(), h.stop(), l = null
                    },
                    d = function(t) {
                        var e, s, n, l = 0,
                            h = t.delta;
                        for (e in i)
                            if (s = i[e])
                                if (l++, s.delayElapsed < s.delay) s.delayElapsed += h;
                                else if (s.elapsed > s.duration) s.complete && s.complete(), f(s);
                        else
                            for (n = 0; n < s.funcs.length; n++) s.elapsed += h;
                        else f(s);
                        1 > l && u()
                    },
                    f = function(t) {
                        var e, s, n = t.id;
                        t.obj && (e = t.obj.style, e.mozTransition = e.oTransition = e.msTransition = e.webkitTransition = e.transition = "none");
                        for (s in t) t[s] = null;
                        delete i[n]
                    };
                return {
                    to: r,
                    tick: d,
                    type: "Animate",
                    cancel: f,
                    start: o,
                    stop: u,
                    runDelayed: e
                }
            };
            jbeeb.Animate = t()
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t, e) {
                    this.Ra = t, this.Sa = !1;
                    var i = [].slice.call(arguments);
                    i.splice(0, 2), this.Ta = i, this.Ua = setTimeout(this.Va.bind(this), e || 1)
                },
                e = t.prototype;
            e.Ra = null, e.Wa = null, e.Ua = null, e.Sa = null, e.Ta = null, e.Va = function() {
                var t, e;
                this.Sa || (t = this.Ra, e = this.Ta, t && e && e.length > 0 ? t.apply(null, e) : t()), this.cancel()
            }, e.cancel = function() {
                this.Sa = !0;
                var t = this.Ua;
                t && clearTimeout(t), this.Ra = null, this.Wa = null, this.Ua = null, this.Ta = null
            }, jbeeb.DelayCall = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = new jbeeb.Ticker({
                    fps: 60
                }),
                e = function(e, i, s, n, l) {
                    var h, a;
                    for (this.Ra = i, this.Xa = e, this.Ya = this.Za.bind(this), h = [], a = 0; a < s.length; a++) h.push({
                        prop: s[a],
                        last: null
                    });
                    this.$a = h, l && (t.start(), this.start())
                },
                i = e.prototype;
            i.Ra = null, i.Xa = null, i.Ya = null, i._a = null, i.ab = null, i.$a = null, i.Za = function() {
                var t, e, i, s, n = window.getComputedStyle(this.Xa),
                    l = this.$a,
                    h = l.length,
                    a = (n.getPropertyValue, 0);
                for (t = 0; h > t; t++)
                    if (e = l[t], i = n.getPropertyValue(e.prop), s = e.last, i != e.last) {
                        a = 1, e.last = i;
                        break
                    }
                a && this.Ra()
            }, i.stop = function() {
                t.removeEventListener("tick", this.Ya)
            }, i.start = function(e) {
                t.addEventListener("tick", this.Ya)
            }, i.destroy = function() {
                this.stop(), this.Ra = null, this.Xa = null, this.Ya = null, this._a = null, this.ab = null, this.$a = null
            }, jbeeb.Observer = e
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                    this.init(t)
                },
                e = t.prototype;
            e.name = null, e.bb = null, e.cb = null, e.db = e.init, e.init = function(t) {
                var e, i, s, n, l, h, a, r, o = jbeeb.Utils.absoluteURL(t.url),
                    u = o.substring(o.lastIndexOf("/") + 1, o.length),
                    c = t.server;
                c && (c = jbeeb.Utils.absoluteURL(c), e = jbeeb.PathInfo.parse(o), i = jbeeb.PathInfo.parse(c), e.domain != i.domain && (c = null)), c ? (s = document.createElement("form"), s.method = t.method || "GET", s.action = c, s.target = "_blank", n = document.createElement("input"), n.setAttribute("type", "hidden"), n.setAttribute("name", "f"), n.setAttribute("value", o), s.appendChild(n), document.body.appendChild(s), s.submit()) : (window.MouseEvent || document.createEvent) && jbeeb.Browser.w3c_download ? (l = document.createElement("a"), l.href = o, l.target = "_blank", l.type = "application/octet-stream", l.download = u, window.MouseEvent ? (h = new MouseEvent("click", {
                    bubbles: !1,
                    cancelable: !1,
                    view: window
                }), a = !l.dispatchEvent(h), a && window.open(o, "Download")) : (r = document.createEvent("MouseEvents"), r.initEvent("click", !1, !1, window, null, 0, 0, 0, 0, !1, !1, !1, !1, 0, null), l.dispatchEvent(r))) : window.open(o, "Download")
            }, e.toString = function() {
                return "[Downloader (name=" + this.name + ")]"
            }, e.type = "Downloader", jbeeb.Downloader = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                var e, i, s, n, l, h, a, r, o, u, c, d, f = function(t) {
                        if (!t) return "";
                        var e = null;
                        return e = void 0 === t.xml ? (new XMLSerializer).serializeToString(t) : t.xml
                    },
                    b = function(e) {
                        var i, s, n, l;
                        if (window.DOMParser) {
                            try {
                                s = new DOMParser, i = s.parseFromString(e, "text/xml")
                            } catch (t) {
                                i = null
                            }
                            return i
                        }
                        for (n = [, "Microsoft.XMLDOM", "MSXML2.DOMDocument.6.0", "MSXML2.DOMDocument.3.0", "MSXML2.DOMDocument"], l = 0; 3 > l; l++) try {
                            if (t = new ActiveXObject(n[l])) break
                        } catch (e) {
                            t = null
                        }
                        return t ? (t.async = !1, t.loadXML(e), t) : null
                    };
                if ("string" == typeof t && (e = jbeeb.Utils.trim(t).substr(0, 1), "<" == e && (t = b(t))), !t) return [];
                i = [];
                try {
                    s = t.firstChild
                } catch (t) {
                    return [{
                        file: "ERROR: Invalid XML"
                    }]
                }
                for (n = null, l = jbeeb.Utils.getAttributes(s), l.image && (n = l.image), !n && l.visual && (n = l.visual), h = t.getElementsByTagName("item"), a = 0; a < h.length; a++) {
                    for (r = {}, o = h[a].firstChild; null != o; o = o.nextSibling)
                        if (1 == o.nodeType && (u = o.nodeName, "filename" == u && (u = "file"), "visual" == u && (u = "image"), "filetype" == u && (u = "kind"), o.firstChild)) {
                            for (c = "", d = o.firstChild; null != d; d = d.nextSibling) c += f(d);
                            r[u] = c
                        }
                    i.push(r)
                }
                return {
                    cover: n,
                    list: i
                }
            };
            jbeeb.PlaylistParserXML = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t, e) {
                var i, s, n, l, h, a, r, o, u, c, d, f, b, p, m = jbeeb.Utils.trim,
                    g = jbeeb.PathInfo.parse(e);
                for (g = g.parent ? g.parent : "", i = [], s = m(t).split("\n"), n = s[0].toLowerCase(), "[playlist]" == n && s.shift(), l = 0, h = null, a = 0; a < s.length; a++) r = m(s[a]), r && (o = {}, u = r.split("="), c = u.shift().toLowerCase(), d = m(u.join("=")), f = c.split(/(\d)/), f.length > 1 && (b = f.shift(), p = f.join(""), p != l && (h && i.push(h), h = {}, l = p), "length" == b && (b = "seconds"), "file" == b && "http" != d.substr(0, 4) && "/" != d.substr(0, 1) && (d = g + d), h[b] = d));
                return {
                    cover: null,
                    list: i
                }
            };
            jbeeb.PlaylistParserPLS = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t, e) {
                var i, s, n, l, h, a, r, o, u, c, d, f = jbeeb.PathInfo.parse(e);
                for (f = f.parent ? f.parent : "", i = [], s = jbeeb.Utils.trim, n = s(t).split("#EXTINF"), n.shift(), l = 0; l < n.length; l++) h = {}, a = s(n[l]).split("\n"), r = a[0].split(","), h.seconds = s(r.shift().replace(":", "")), o = r.join(","), u = o.split(" - "), u.length > 1 ? (h.artist = s(u[0]), u.shift(), c = u.join(" - "), h.title = s(c)) : h.title = part1, d = s(a[1]), "http" != d.substr(0, 4) && "/" != d.substr(0, 1) && (d = f + d), h.file = d, i.push(h);
                return {
                    cover: null,
                    list: i
                }
            };
            jbeeb.PlaylistParserM3U = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t, e) {
                function i(t, e, i, s) {
                    i && (s && (i = s ? s(i) : i), t[e] = i)
                }

                function s(t) {
                    return t ? /[A-Za-z]/.test(t) ? Date.parse(t) : parseInt(t) : t
                }

                function n(t) {
                    var e = ["mp3", "wav", "aac", "m4a", "mpa", "oga", "ogg", "m4v", "m4p", "mp4", "webm", "ogx", "ogv"],
                        i = t.split("."),
                        s = i.pop();
                    return e.indexOf(s) > -1
                }
                var l, h, a, r, o, u, c, d, f, b, p, m, g, y = [],
                    v = null;
                if ("string" == typeof t && (t = jbeeb.Utils.parseJSON(t.replace("!", "%3F"))), t.responseData && t.responseData.feed && (l = t.responseData.feed.entries, h = t.responseData.feed.link, l))
                    for (a = 0; a < l.length; a++) {
                        if (r = l[a], o = {}, r.mediaGroups)
                            for (u = r.mediaGroups, c = 0; c < u.length; c++) d = u[c], f = d.contents, f && f.length && (f = f[0], b = f.url, b && (o.file = b), f = f.thumbnails, f && f.length && (f = f[0], b = f.url, b && (o.image = b)));
                        b = r.enclosure, b && (p = b.href, p && (o.file = p)), m = r.link, o.file || m && n(m) && (o.file = m, m = null), o.file && (g = {}, i(o, "title", r.title), i(o, "artist", r.author), i(o, "date", r.publishedDate, s), i(o, "link", m || h), y.push(o))
                    }
                return {
                    cover: v,
                    list: y
                }
            };
            jbeeb.PlaylistParserFEED = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                var e, i, s, n, l, h, a, r, o, u, c, d = function(e) {
                    var i, s, n, l;
                    if (window.DOMParser) {
                        try {
                            s = new DOMParser, i = s.parseFromString(e, "text/xml")
                        } catch (t) {
                            i = null
                        }
                        return i
                    }
                    for (n = [, "Microsoft.XMLDOM", "MSXML2.DOMDocument.6.0", "MSXML2.DOMDocument.3.0", "MSXML2.DOMDocument"], l = 0; 3 > l; l++) try {
                        if (t = new ActiveXObject(n[l])) break
                    } catch (e) {
                        t = null
                    }
                    return t ? (t.async = !1, t.loadXML(e), t) : null
                };
                if ("string" == typeof t && (e = jbeeb.Utils.trim(t).substr(0, 1), "<" == e && (t = d(t))), !t) return [];
                i = [];
                try {
                    s = t.firstChild
                } catch (t) {
                    return [{
                        file: "ERROR: Invalid XML"
                    }]
                }
                for (n = jbeeb.Utils.getAttributes, l = null, h = n(s), h.image && (l = h.image), !l && h.visual && (l = h.visual), a = t.getElementsByTagName("outline"), r = 0; r < a.length; r++) o = {}, u = a[r], h = n(u), c = h.url, c && (o.file = c, c = h.text, c && (o.title = c), o.kind = "rss"), i.push(o);
                return {
                    cover: l,
                    list: i
                }
            };
            jbeeb.PlaylistParserOPML = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";

            function t(t) {
                var e = null;
                return t ? e = void 0 === t.xml ? (new XMLSerializer).serializeToString(t) : t.xml : ""
            }

            function e(e, i) {
                var s, h, a, r, o, u, c, d, f, b, p, m, g, y, v, j, w, x, k, S, E, T, C, L, P = [{
                    file: "ERROR: Invalid XML"
                }];
                if (!e) return P;
                s = [];
                try {
                    h = e.firstChild
                } catch (t) {
                    return P
                }
                for (a = e.getElementsByTagName("Prefix"), a = t(a[0].firstChild), r = a.length, o = e.getElementsByTagName("CommonPrefixes"), u = 0; u < o.length; u++) {
                    for (d = o[u].firstChild; null != d; d = d.nextSibling)
                        if (1 == d.nodeType && "Prefix" == d.nodeName && d.firstChild) {
                            for (f = "", b = d.firstChild; null != b; b = b.nextSibling) f += t(b);
                            c = {
                                file: i + "/" + f,
                                kind: "s3",
                                title: f.substr(r, f.length - r - 1)
                            }
                        }
                    c && s.push(c)
                }
                for (o = e.getElementsByTagName("Contents"), p = [], m = [], u = 0; u < o.length; u++) {
                    for (c = {}, g = !1, d = o[u].firstChild; null != d; d = d.nextSibling)
                        if (k = d.nodeName, ("Key" == k || "LastModified" == k || "Size" == k) && 1 == d.nodeType && d.firstChild) {
                            for (f = "", b = d.firstChild; null != b; b = b.nextSibling) f += t(b);
                            "Key" == k ? (y = f, S = y.split("."), w = S.pop(), n.indexOf(w) > -1 ? (g = !0, x = S.join(".")) : l.indexOf(w) > -1 && p.push(y)) : "Size" == k ? j = f : "LastModified" == k && (v = Date.parse(f))
                        }
                    g && m.push({
                        file: y,
                        basepath: x,
                        date: v,
                        size: j,
                        kind: w
                    })
                }
                for (u = 0; u < m.length; u++) {
                    for (E = m[u], T = E.basepath, C = 0; C < l.length; C++)
                        if (L = T + "." + l[C], p.indexOf(L) > -1) {
                            E.image = i + "/" + L;
                            break
                        }
                    E.file = i + "/" + E.file, delete E.basepath, s.push(E)
                }
                return s
            }

            function i(t) {
                var e, i, s;
                return "/" == t.substr(-1) && (t = t.substr(0, t.length - 1)), e = "http://", t = t.replace(e, ""), i = t.split("/"), s = e + i.shift(), {
                    base: s,
                    path: i.join("/") + "/"
                }
            }

            function s(t) {
                var e, s = i(t),
                    n = s.base;
                return t = n, t += "?delimiter=/", e = s.path, e && "/" != e ? t += "&prefix=" + e : e = "", {
                    url: t,
                    base_bucket: n,
                    base_prefix: e
                }
            }
            var n = ["mp3", "mp4"],
                l = ["png", "jpg"],
                h = function(t, e, i) {
                    var n, l;
                    this.eb = e, n = t.indexOf("?"), n > 0 && (t = t.substring(0, n)), l = s(t), this.fb = i, this.gb = l.base_bucket, this.hb = l.base_prefix, this.ib = new jbeeb.TextLoader(l.url, this.jb.bind(this), "xml")
                },
                a = h.prototype;
            a.gb = null, a.hb = null, a.eb = null, a.ib = null, a.fb = null, a.jb = function(t) {
                if (!this.Sa) {
                    var i = e(t, this.gb);
                    this.Sa || this.eb(i, this.fb)
                }
            }, a.cancel = function(t) {
                this.Sa = !0, this.ib.cancel()
            }, jbeeb.AWSS3List = h
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t, e, i, s = function() {
                    this.kb = [], this.lb = []
                },
                n = [],
                l = jbeeb.mimes.playlist;
            for (t in l) n.push(t);
            s.mb = n, e = [], l = jbeeb.mimes.audio;
            for (t in l) e.push(t);
            l = jbeeb.mimes.video;
            for (t in l) e.push(t);
            s.nb = e, i = s.prototype, i.addEventListener = null, i.removeEventListener = null, i.removeAllEventListeners = null, i.dispatchEvent = null, i.hasEventListener = null, jbeeb.EventDispatcher.initialize(i), i.ob = null, i.pb = null, i.qb = 0, i.rb = 0, i.lb = null, i.kb = null, i.sb = null, i.tb = null, i.load = function(t, e, i) {
                var n, l, h, a;
                if (this.ub(), t) {
                    for (h in this.kb)
                        if (a = this.kb[h], a.source == t) {
                            l = a;
                            break
                        }
                    l || (n = jbeeb.getUID(), l = {
                        source: t,
                        kind: s.findkind(t, e),
                        list: null,
                        id: n,
                        cover: i || null
                    }, this.kb[n] = l), n = l.id, this.lb.push(n), this.tb = n, this.sb || (this.sb = l), l.list ? this.vb(l) : this.Ia(l)
                } else this.dispatchEvent("playlistReady", [])
            }, i.isPlaylist = function(t, e) {
                var i, n, l, h, a = typeof t,
                    r = s.mb;
                return e ? (n = r.indexOf(e), n > -1 && (i = !0)) : jbeeb.Utils.isArray(t) ? i = !0 : "object" == a ? t.amPlaylist ? i = !0 : t.kind ? (n = r.indexOf(t.kind), n > -1 && (i = !0)) : t.file && (l = t.file.substr(-3), r.indexOf(l) > -1 && (i = !0)) : "string" == a && (h = s.findkind(t, e), i = r.indexOf(h) > -1), i
            }, i.Ia = function(t) {
                var e, i, s = t.kind,
                    n = t.source,
                    l = "string" == typeof n ? 1 : 0,
                    h = l ? this.wb(n) : n,
                    a = l ? h.substr(0, 1) : "";
                "js" == s || "dtxt" == s || "[" == a || "{" == a ? this.xb(h, t) : "jsonp" == s ? this.pb = new jbeeb.JSON_P(h, this.xb.bind(this), t) : "rss" == s ? (e = "http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=" + wimpy.maxGoogleFeedItems + "&output=json&q=", e += encodeURIComponent(h), this.pb = new jbeeb.JSON_P(e, this.xb.bind(this), t)) : "s3" == s ? (this.ob && this.ob.cancel(), this.ob = new jbeeb.AWSS3List(h, this.xb.bind(this), t)) : "xml" == s && "<" == a ? this.xb(h, t) : (this.qb && (i = "?", h.indexOf("?") > -1 && (i = "&"), h = h + i + "i", this.rb && (h += "&j")), h = h.replace("&amp;", "&"), s = "php" == s || "xml" == s || "asp" == s ? "xml" : "txt", this.ob && this.ub(), this.ob = new jbeeb.TextLoader(h, this.yb.bind(this), s, t))
            }, i.zb = function(t, e, i) {
                var s, n, l, h, a, r;
                if ("json" == e || "jsonp" == e ? n = jbeeb.Utils.parseJSON(t) : "js" == e ? n = t : "opml" == e ? s = jbeeb.PlaylistParserOPML(t, i) : "m3u" == e ? s = jbeeb.PlaylistParserM3U(t, i) : "pls" == e ? s = jbeeb.PlaylistParserPLS(t, i) : "rss" == e ? s = jbeeb.PlaylistParserFEED(t) : "xml" == e || "php" == e ? s = jbeeb.PlaylistParserXML(t) : "dtxt" == e ? n = this.Ab(t) : "s3" == e ? n = t : (l = t.substr(0, 1), "[" == l || "{" == l ? "[playlist]" == t.substr(0, 10) ? s = jbeeb.PlaylistParserPLS(t, i) : n = jbeeb.Utils.parseJSON(t) : "<" == l ? s = jbeeb.PlaylistParserXML(t) : n = this.Ab(t)), h = null, s && (n = s.list, h = s.cover), a = [], n)
                    for (r = 0; r < n.length; r++) a.push(this.normalizeTrackData(n[r]));
                return {
                    list: a,
                    cover: h
                }
            }, s.findkind = function(t, e) {
                var i, n, l, h;
                return e = jbeeb.Utils.trim(e || ""), e && s.mb.indexOf(e) > -1 ? e : (i = null, "string" == typeof t ? (t = jbeeb.Utils.trim(t), n = t.substr(0, 1), l = 0, "[" == n || "{" == n ? "[playlist]" == t.substr(0, 10) ? (i = "pls", l = 1) : (i = "json", l = 1) : "<" == n ? (i = "xml", l = 1) : /\n/.exec(t) || /\|/.exec(t) ? i = "dtxt" : t.indexOf("?d=") > 0 || t.indexOf("&d=") > 0 ? i = "xml" : (h = t.split("."), i = h.pop(), s.nb.indexOf(i) > -1 && (i = "dtxt")), i) : "js")
            }, i.validate = function(t) {
                var e = s.findkind(t);
                return this.zb(t, e).list
            }, i.Ab = function(t) {
                var e, i, s, n, l;
                for (t = jbeeb.Utils.trim((t || "") + ""), e = [], i = null, /\|/.exec(t) ? i = "|" : /\n/.exec(t) && (i = "\n"), s = null, s = i ? t.split(i) : [t], n = 0; n < s.length; n++) l = this.wb(s[n]), "" != l && e.push({
                    file: l
                });
                return e
            }, i.wb = function(t) {
                return jbeeb.Utils.trim(jbeeb.Utils.decodeURL(jbeeb.Utils.trim(t)))
            }, i.any = function() {
                return this.lb.length > 0
            }, i.loadPrevious = function() {
                this.lb.pop(), this.refresh()
            }, i.refresh = function() {
                var t, e, i = this.lb.length;
                1 > i ? t = this.sb : (e = this.lb[i - 1], t = this.kb[e]), this.tb = t.id, this.vb(t)
            }, i.normalizeTrackData = function(t) {
                var e, i, s;
                return t && "object" == typeof t ? e = jbeeb.Utils.clone(t) : "string" == typeof t && (e = {
                    file: t
                }), e.file = this.wb(e.file), i = jbeeb.PathInfo.parse(e.file), e.title || (s = i.basename || e.file, e.title = s.replace(/_/g, " ")), e.amPlaylist = this.isPlaylist(e) ? 1 : 0, e
            }, i.xb = function(t, e) {
                var i, s;
                t && e && (i = this.wb(e.source), s = this.zb(t, e.kind, i), this.dispatchEvent("pathChange", i), e.list = s.list, e.cover = e.cover || s.cover, this.vb(e))
            }, i.vb = function(t) {
                t.cover && this.dispatchEvent("coverart", t.cover), this.dispatchEvent("playlistReady", t.list), this.ub();
            }, i.setPlaylistCoverArt = function(t, e) {
                if (this.kb) {
                    var i = this.kb[t];
                    i && (i.cover = e)
                }
            }, i.getCurrentPath = function() {
                return this.kb[this.tb].source || ""
            }, i.setID3 = function(t, e) {
                this.qb = t || 0, this.rb = e || 0
            }, i.yb = function(t, e, i) {
                this.xb(t, i)
            }, i.ub = function() {
                this.ob && (this.ob.cancel(), this.ob = null), this.pb && (this.pb.cancel(), this.pb = null)
            }, i.reset = function(t, e) {
                this.ub(), this.sb = null, this.lb = [], this.kb = [], t && this.load(t, e)
            }, i.destroy = function() {
                this.removeAllEventListeners(), this.ub(), this.sb = null, this.lb = null
            }, i.toString = function() {
                return "[PlaylistManager (name=" + this.name + ")]"
            }, i.type = "PlaylistManager", jbeeb.PlaylistManager || (jbeeb.PlaylistManager = s)
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                    this.init(t)
                },
                e = t.prototype;
            e.addEventListener = null, e.removeEventListener = null, e.removeAllEventListeners = null, e.dispatchEvent = null, e.hasEventListener = null, jbeeb.EventDispatcher.initialize(e), e.amStage = null, e.element = null, e.style = null, e.Bb = null, e.alpha = 1, e.id = null, e.name = null, e.parent = null, e.stage = null, e.rotation = 0, e.scale = 1, e.scaleX = 1, e.scaleY = 1, e.stretchX = 1, e.stretchY = 1, e.skewX = 0, e.skewY = 0, e.origin = null, e.originX = 0, e.originY = 0, e.originType = "px", e.shadow = null, e.bevel = null, e.outline = null, e.inset = null, e.visible = !0, e.overflow = "visible", e.autoCenter = null, e.x = 0, e.y = 0, e.width = 0, e.height = 0, e.flex = "wh", e.Cb = 1, e.Db = 1, e.pin = null, e.Eb = null, e.Fb = null, e.z = 0, e.temp = null, e.rounded = null, e.fill = null, e.stroke = null, e.image = null, e.gradient = null, e.Gb = null, e.tooltip = null, e.init = function(t) {
                var e, i, s, n;
                this.temp = {}, this.style = null, this.alpha = 1, this.id = null, this.name = null, this.parent = null, this.rotation = 0, this.scale = 1, this.scaleX = 1, this.scaleY = 1, this.skewX = 0, this.skewY = 0, this.visible = !0, this.overflow = "visible", this.x = 0, this.y = 0, this.width = 0, this.height = 0, this.flex = "wh", this.Cb = 1, this.Db = 1, this.pin = null, this.Eb = null, this.Fb = null, this.z = 0, this.autoCenter = null, this.stroke = {}, this.fill = {}, this.shadow = null, this.inset = null, this.gradient = {}, this.rounded = null, this.tooltip = "", jbeeb.storeCSS ? this.Bb = {} : this.Bb = null, t = t || {}, e = jbeeb.getUID(), this.id = e, t.element ? this.element = t.element : (this.element = document.createElement("div"), this.element.id = e, this.element.style.position = "absolute", this.element.style.overflow = "visible", this.Bb && (this.Bb.position = "absolute", this.Bb.overflow = "visible")), t.standalone && (this.amStage = 1), t.inline ? this.Gb = "inline-block" : this.Gb = "block", t.name && (this.name = t.name), this.element.id = this.type + "_" + this.element.id, i = this.style = this.element.style, i.padding = "0px", i.margin = "0px", i.border = "0px", i.fontSize = "100%", i.outline = "0px", i.background = "transparent", i.WebkitTextSizeAdjust = "100%", i.msTextSizeAdjust = "100%", i.WebkitBoxSizing = i.MozBoxSizing = i.boxSizing = "padding-box", i.OBackgroundClip = i.WebkitBackgroundClip = i.backgroundClip = "padding-box", this.Bb && (s = this.Bb, s.padding = "0px", s.margin = "0px", s.border = "0px", s.fontSize = "100%", s.outline = "0px", s.background = "transparent", s.WebkitTextSizeAdjust = "100%", s.msTextSizeAdjust = "100%", s.boxSizing = "padding-box", s.backgroundClip = "padding-box"), t.editable || this.setSelectable(!1), n = "inherit", t.cursor && (n = t.cursor), this.setCursor(n), t && (this.autoCenter = t.center, void 0 !== t.flex && this.setFlex(t.flex), void 0 !== t.pin && this.setPin(t.pin), void 0 !== t.overflow && this.setOverflow(t.pin), t.tooltip && this.setTooltip(t.tooltip)), this.setOrigin(0, 0, "px"), this.applySkin(t, !1)
            }, e.setSelectable = function(t) {
                var e = this.style,
                    i = "none",
                    s = "-moz-none";
                t && (i = "text", s = "text"), e.userSelect = e.WebkitUserSelect = e.MozUserSelect = e.OUserSelect = i, e.MozUserSelect = s, this.Bb && (this.Bb.userSelect = i, this.Bb.MozUserSelect = s)
            }, e.setBorderRender = function(t) {
                var e, i = this.style;
                e = "outside" == t ? "content-box" : "padding-box", i.WebkitBoxSizing = i.MozBoxSizing = i.boxSizing = e, this.Bb && (this.Bb.boxSizing = e)
            }, e.applySkin = function(t, e) {
                var i, s, n, l, h, a, r, o, u;
                this.stroke = {}, this.fill = {}, this.gradient = null, this.rounded = 0, this.image = null, this.shadow = null, this.bevel = null, this.outline = null, this.inset = null, e = 1 == e && e, e || (i = jbeeb.Utils.isNumber(t.x) ? t.x : 0, s = jbeeb.Utils.isNumber(t.y) ? t.y : 0, this.setXY(i, s), t.height && this.setHeight(t.height), t.width && this.setWidth(t.width), t.h && this.setHeight(t.h), t.w && this.setWidth(t.w)), this.setRounded(t.rounded), n = t.fill, n && (n = n, "string" == typeof n ? (l = n, h = 1) : (l = n.color, h = n.alpha)), this.setFill(l, h), n = t.stroke, l = null, h = null, a = null, r = null, n && ("string" == typeof n ? (l = n, h = 1, a = 1, r = "solid") : null != n.color && (l = n.color || "#000000", h = jbeeb.Utils.isNumber(n.alpha) ? n.alpha : 1, a = n.weight || 1, r = n.style || "solid")), this.setStroke(a, l, h, r), this.setStrokeStyle(r), n = t.image, t.image && ("string" == typeof n ? (o = n, u = null) : (o = n.url, u = n.mode)), this.setImage(o, u), this.setShadow(t.shadow), this.setBevel(t.bevel), this.setOutline(t.outline), this.setInset(t.inset)
            }, e.Hb = function() {
                var t, e, i, s, n, l, h, a, r, o, u, c, d, f, b, p, m, g, y, v, j, w, x, k, S, E, T, C, L, P, F, M, A, B, U, O, D = this.style;
                if (D) {
                    if (t = [], e = "", i = "", s = "", n = "", l = "", h = "", a = "", r = "", o = 0, u = this.fill, u && (jbeeb.Utils.isArray(u.color) ? o = 1 : u.color && (i = jbeeb.Utils.makeColor(u.color, u.alpha))), this.image && this.image.url && (e = 'url("' + this.image.url + '")', c = this.image.mode || "center", "pattern" == c || ("fit" == c ? h = "100% 100%" : "contain" != c && "cover" != c || (h = "contain"), a = "no-repeat", r = "center center"), o = 0), o) {
                        for (d = u.color, this.Bb && (this.Bb.gradient = 1), f = u.alpha || "v", b = [], p = [], m = d.length, jbeeb.Browser ? (g = jbeeb.Browser, y = g.oldWebkit, v = g.modern, j = g.cssPrefix, w = g.w3c_gradient) : (y = !1, v = !0, j = "", w = !0), x = 0; m > x; x += 3) k = jbeeb.Utils.makeColor(d[x], d[x + 1]), S = d[x + 2], S > 100 ? S = 100 : 0 > S && (S = 0), y ? p.push("color-stop(" + S + "%, " + k + ")") : b.push(k + " " + S + "%");
                        if (v) w ? (E = "linear-", T = ("v" == f ? "to bottom, " : "to right, ") + b.join(",")) : y ? (C = p.join(","), E = "-webkit-", T = "v" == f ? "linear, left top, left bottom, " + C : "linear, left top, right top, " + C) : (E = "-" + j + "-linear-", T = ("v" == f ? "top, " : "left, ") + b.join(",")), e = E + "gradient(" + T + ")";
                        else if (g.ie && g.version < 9) L = "v" == f ? "0" : "1", P = "progid:DXImageTransform.Microsoft.gradient( gradientType=" + L + ", startColorstr='" + d[0] + "', endColorstr='" + d[d.length - 3] + "')", this.style.filter = P, this.style.msFilter = '"' + P + '"', this.Bb && (F = this.Bb, F.filter = P, F.msFilter = '"' + P + '"');
                        else {
                            for (M = "", x = 0; m > x; x += 3) k = jbeeb.Utils.makeColor(d[x], d[x + 1]), M += '<stop offset="' + d[x + 2] + '%" stop-color="' + d[x] + '" stop-opacity="' + d[x + 1] + '"/>';
                            A = "0", B = "100", "h" == f && (A = "100", B = "0"), U = "jbeeb-grad-" + this.id, O = "", O += '<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1 1" preserveAspectRatio="none">', O += '  <linearGradient id="' + U + '" gradientUnits="userSpaceOnUse" x1="0%" y1="0%" x2="' + A + '%" y2="' + B + '%">', O += M, O += "  </linearGradient>", O += '  <rect x="0" y="0" width="1" height="1" fill="url(#' + U + ')" />', O += "</svg>", e = 'url("data:image/svg+xml;base64,' + jbeeb.Base64.encode(O) + '")'
                        }
                    } else this.Bb && (this.Bb.gradient = 0);
                    D.backgroundColor = i || "", D.backgroundImage = e || "none", D.backgroundSize = h || "", D.backgroundRepeat = a || "", D.backgroundPosition = r || "", this.Bb && (F = this.Bb, F.backgroundColor = i || "", F.backgroundImage = e || "none", F.backgroundSize = h || "", F.backgroundRepeat = a || "", F.backgroundPosition = r || "")
                }
            }, e.setFill = function(t, e) {
                this.fill || (this.fill = {}), this.fill.color = t, this.fill.alpha = e, this.Hb()
            }, e.setImage = function(t, e) {
                t ? (this.image || (this.image = {}), this.image.url = t, this.image.mode = e) : this.image = null, this.Hb()
            }, e.setImageSizing = function(t) {
                this.image && (this.image.mode = t, this.Hb())
            }, e.setStroke = function(t, e, i, s) {
                var n, l, h, a, r, o, u, c, d;
                this.stroke || (this.stroke = {}), "string" == typeof t && (e = t, t = 1), t > 0 && (t = Math.round(t)), n = i || 1, l = s || "solid", null != e && t && t >= 1 || (t = 0, n = null, l = null), h = this.stroke, h.weight = t, h.color = e, h.alpha = n, h.style = l, a = this.style, t ? (l = l, r = t + "px", o = jbeeb.Utils.makeColor(e, n), u = -t + "px", c = -t + "px") : (l = "", r = "", o = "", u = "", c = ""), a.borderStyle = l, a.borderWidth = r || 0, a.borderColor = o, a.marginLeft = u, a.marginTop = c, this.Bb && (d = this.Bb, d.borderStyle = l, d.borderWidth = r, d.borderColor = o, d.marginLeft = u, d.marginTop = c), this.Ib()
            }, e.setStrokeStyle = function(t) {
                var e = t || "";
                this.style.borderStyle = e, this.Bb && (this.Bb.borderStyle = e)
            }, e.setCursor = function(t) {
                this.style.cursor = t, this.Bb && (this.Bb.cursor = t)
            }, e.setWidth = function(t) {
                var e = this.style;
                e && t > 0 && (this.width = t, e.width = t + "px", this.autoCenter && this.center(this.autoCenter), this.rounded && this.Ib(), this.Bb && (this.Bb.width = t + "px"))
            }, e.setHeight = function(t) {
                var e = this.style;
                e && t > 0 && (this.height = t, e.height = t + "px", this.autoCenter && this.center(this.autoCenter), this.rounded && this.Ib(), this.Bb && (this.Bb.height = t + "px"))
            }, e.measure = function() {
                var t = this.element,
                    e = t.clientWidth,
                    i = t.clientHeight;
                return this.width = e, this.height = i, [e, i]
            }, e.setSize = function(t, e) {
                var i = this.style;
                i && t > 0 && e > 0 && (this.width = t, this.height = e, i.width = t + "px", i.height = e + "px", this.autoCenter && this.center(this.autoCenter), this.rounded && this.Ib(), this.Bb && (this.Bb.width = t + "px", this.Bb.height = e + "px"))
            }, e.setXY = function(t, e) {
                this.x = t, this.y = e;
                var i = this.style;
                i.left = t + "px", i.top = e + "px", this.Bb && (this.Bb.left = t + "px", this.Bb.top = e + "px")
            }, e.setBaseXY = function(t, e) {
                this.setXY(t, e), this.Jb = t, this.Kb = e
            }, e.setXYWH = function(t, e, i, s) {
                var n, l;
                this.width = i, this.height = s, this.x = t, this.y = e, n = this.style, n.width = (i || 0) + "px", n.height = (s || 0) + "px", n.left = (t || 0) + "px", n.top = (e || 0) + "px", this.Bb && (l = this.Bb, l.width = (i || 0) + "px", l.height = (s || 0) + "px", l.left = (t || 0) + "px", l.top = (e || 0) + "px")
            }, e.setX = function(t) {
                this.x = t, this.style.left = (t || 0) + "px", this.Bb && (this.Bb.left = (t || 0) + "px")
            }, e.setY = function(t) {
                this.y = t, this.style.top = (t || 0) + "px", this.Bb && (this.Bb.top = (t || 0) + "px")
            }, e.setTop = function(t) {
                this.y = t, this.style.top = t + "px", this.Bb && (this.Bb.top = (t || 0) + "px")
            }, e.setBottom = function(t) {
                this.y = t - this.height, this.style.bottom = t + "px", this.Bb && (this.Bb.bottom = (t || 0) + "px")
            }, e.setLeft = function(t) {
                this.x = t, this.style.left = (t || 0) + "px", this.Bb && (this.Bb.left = (t || 0) + "px")
            }, e.setRight = function(t) {
                var e = (t || 0) - this.width;
                this.x = e, this.style.right = e + "px", this.Bb && (this.Bb.right = e + "px")
            }, e.setZ = function(t) {
                0 > t && (t = 0), this.z = t;
                var e = this.style;
                e || (this.style = e = this.element.style), e.zIndex = t, this.Bb && (this.Bb.zIndex = t)
            }, e.setScale = function(t) {
                this.scale = t, this.scaleX = t, this.scaleY = t;
                var e = "scale(" + t + "," + t + ")";
                this.Lb(e)
            }, e.setScaleX = function(t) {
                this.scaleX = t;
                var e = "scale(" + this.scaleX + "," + t + ")";
                this.Lb(e)
            }, e.setScaleY = function(t) {
                this.scaleY = t;
                var e = "scale(" + t + "," + this.scaleY + ")";
                this.Lb(e)
            }, e.stretch = function(t, e, i) {
                var s, n, l, h, a, r;
                t > 0 && e > 0 && (s = this.originX, n = this.originY, l = this.originType, i || (s || n) && this.setOrigin(0, 0, "px"), this.stretchX = t, this.stretchY = e, this.Cb && this.setWidth(this.width * t), this.Db && this.setHeight(this.height * e), h = this.x, a = this.y, this.Eb ? "r" == this.Eb && this.parent && (null == this.Mb && (this.Mb = this.parent.width - this.x), r = this.parent.width - this.Mb, this.setX(r)) : s ? this.setX(s + (h - s) * t) : this.setX(h * t), this.Fb ? "b" == this.Fb && this.parent && (null == this.Nb && (this.Nb = this.parent.height - this.y), r = this.parent.height - this.Nb, this.setY(r)) : n ? this.setY(n + (a - n) * e) : this.setY(a * e), this.dispatchEvent("stretch", this.width, this.height), i || (s || n) && this.setOrigin(s * t, n * e, l))
            }, e.Mb = null, e.Nb = null, e.setPin = function(t) {
                this.pin = t, this.Eb = 0, this.Fb = 0, t && (t = t.toLowerCase(), t.match(/r/) && (this.Eb = "r"), t.match(/l/) && (this.Eb = "l"), t.match(/t/) && (this.Fb = "t"), t.match(/b/) && (this.Fb = "b"), t.match(/s/) && (this.Eb = "s", this.Fb = "s"))
            }, e.setFlex = function(t) {
                this.Cb = 0, this.Db = 0, t && (t.toLowerCase(), t.match(/w/) ? this.Cb = 1 : this.Cb = 0, t.match(/h/) ? this.Db = 1 : this.Db = 0), this.flex = t
            }, e.setRotation = function(t) {
                this.rotation = t;
                var e = "rotate(" + t + "deg)";
                this.Lb(e)
            }, e.setSkew = function(t, e) {
                this.skewX = t, this.skewY = e;
                var i = "skew(" + t + "deg," + e + "deg)";
                this.Lb(i)
            }, e.setOrigin = function(t, e, i) {
                var s, n, l;
                this.originX = t, this.originY = e, this.originType = i, s = i ? i : "px", n = t + s + " " + e + s, l = this.style, l.WebkitTransformOrigin = l.msTransformOrigin = l.MozTransformOrigin = l.OTransformOrigin = l.transformOrigin = n, this.Bb && (this.Bb.transformOrigin = n)
            }, e.Lb = function(t) {
                var e = this.style;
                e.WebkitTransform = e.msTransform = e.MozTransform = e.OTransformOrigin = e.transform = t, this.Bb && (this.Bb.transform = t)
            }, e.center = function(t, e) {
                var i, s, n, l, h, a, r;
                (this.parent || this.amStage) && this.width && this.height && (i = this.x, s = this.y, this.amStage ? (n = jbeeb.Utils.getXYWH(this.element.parentNode), l = .5 * n.w, h = .5 * n.h) : (n = this.parent, n.width || n.measure(), l = .5 * n.width, h = .5 * n.height), a = .5 * this.width, r = .5 * this.height, "v" == t ? s = h - r : "h" == t ? i = l - a : (i = l - a, s = h - r), this.setXY(i, s), n = null)
            }, e.setOverflow = function(t) {
                var e, i, s, n;
                //this.overflow = t, e = "", i = "", s = this.style, "x" != t && "y" != t && t || ("x" == t ? (e = "auto", i = "hidden") : "y" == t && (e = "hidden", i = "auto", jbeeb.Browser && jbeeb.Browser.ie && this.setWidth(this.width + 20)), s.overflowX = e, s.overflowY = i), s.overflow = t, this.Bb && (n = this.Bb, n.overflow = t, n.overflowX = e, n.overflowY = i)
            }, e.setVisible = function(t) {
                var e, i;
                this.visible = t, e = this.style, i = t ? this.Gb : "none", e.display = i, this.Bb && (this.Bb.display = i)
            }, e.show = function() {
                this.setVisible(!0)
            }, e.hide = function() {
                this.setVisible(!1)
            }, e.setAlpha = function(t) {
                this.alpha = t, null !== t && (this.style.opacity = "" + t), this.Bb && (this.Bb.opacity = "" + t)
            }, e.setRounded = function(t) {
                this.rounded = t, this.Ib()
            }, e.Ib = function() {
                var t, e, i, s, n, l, h, a = "",
                    r = this.rounded;
                r && (t = this.width, e = this.height, i = 0, s = this.stroke, s && (n = s.weight, jbeeb.Utils.isNumber(n) && (i = 2 * n)), l = .5 * ((e > t ? t : e) + i), jbeeb.Utils.isNumber(r) ? a = l * r + "px" : r && "object" == typeof r && (a += (l * r.tl || 0) + "px " + (l * r.tr || 0) + "px " + (l * r.br || 0) + "px " + (l * r.bl || 0) + "px")), h = this.style, h.MozBorderRadius = h.WebkitBorderRadius = h.OBorderRadius = h.msBorderRadius = h.borderRadius = a, this.Bb && (this.Bb.borderRadius = a)
            }, e.onAdded = function() {
                this.autoCenter && this.center(this.autoCenter), this.dispatchEvent("added", this)
            }, e.toFront = function() {
                this.parent && this.parent.toFront(this)
            }, e.toBack = function() {
                this.parent && this.parent.toBack(this)
            }, e.Ob = function() {
                var t, e, i, s, n, l, h = this.style,
                    a = this.Pb(),
                    r = this.Qb(),
                    o = this.Rb(),
                    u = this.Sb(),
                    c = "none";
                if (a == [] && r == [] && o == [] && u == []);
                else {
                    for (t = r.concat(o, u, a), e = t.length, i = [], s = [], n = 0, l = 0; e > l; l++) 0 == n ? 1 == t[l] && s.push("inset") : 4 > n ? s.push(t[l] + "px") : (s.push(jbeeb.Utils.makeColor(t[l], t[l + 1])), i.push(s.join(" ")), s = [], ++l, n = -1), n++;
                    i.length > 0 && (c = i.join(","))
                }
                h.boxShadow = h.MozBoxShadow = h.WebkitBoxShadow = h.OBoxShadow = h.MsBoxShadow = c, this.Bb && (this.Bb.boxShadow = c)
            }, e.Pb = function() {
                var t = this.shadow;
                return t ? [0, t.x || 0, t.y || 0, t.s, t.c || "#000000", t.a || .4] : []
            }, e.setShadow = function(t) {
                this.shadow = t, this.Ob()
            }, e.Sb = function() {
                var t = this.inset;
                return t ? [1, t.x || 0, t.y || 0, t.s, t.c || "#000000", t.a || .4] : []
            }, e.setInset = function(t) {
                this.inset = t, this.Ob()
            }, e.Qb = function() {
                var t = this.bevel;
                return t ? [1, -t.x, -t.y, t.s1, t.c1 || "#FFFFFF", t.a1, 1, t.x, t.y, t.s2, t.c2 || "#000000", t.a2] : []
            }, e.setBevel = function(t) {
                t && (jbeeb.Utils.isNumber(t) ? t = {
                    x: -t,
                    y: -t,
                    s1: 0,
                    s2: 0,
                    c1: "#FFFFFF",
                    c2: "#000000",
                    a1: 1,
                    a2: 1
                } : (t.c1 = t.c1 || "#FFFFFF", t.c2 = t.c2 || "#000000")), this.bevel = t, this.Ob()
            }, e.Rb = function() {
                if (this.outline) {
                    var t = this.outline;
                    return [0, -t.weight, -t.weight, t.spread || 0, t.color || "#000000", t.alpha || 1, 0, t.weight, -t.weight, t.spread || 0, t.color || "#000000", t.alpha || 1, 0, -t.weight, t.weight, t.spread || 0, t.color || "#000000", t.alpha || 1, 0, t.weight, t.weight, t.spread || 0, t.color || "#000000", t.alpha || 1]
                }
                return []
            }, e.setOutline = function(t) {
                this.outline = t, this.Ob()
            }, e.setMouseEnabled = function(t) {
                var e = this.style,
                    i = 0 === t || t === !1,
                    s = i ? "none" : "auto";
                e.pointerEvents = s, this.aa && this.aa.setEnabled(!i), this.Bb && (this.Bb.pointerEvents = s)
            }, e.aa = null, e.MELbubble = !1, e.MELpreventDefault = !0, e.MELpropagate = !1, e.addMEL = function(t, e, i, s, n) {
                this.MELbubble = s, this.MELpreventDefault = !1, this.MELpropagate = !1, this.aa || (this.aa = new jbeeb.MouseEventListener(this)), "mouseOver" == t || "mouseOut" == t || "mouseMove" == t ? this.aa.enableMouseOver(1) : "doubleClick" == t && this.aa.enableDoubleClick(1), this.addEventListener(t, e, i, n)
            }, e.removeMEL = function(t, e) {
                this.removeEventListener(t, e, this), "mouseOver" == t ? this.aa && this.aa.enableMouseOver(0) : "doubleClick" == t && this.aa && this.aa.enableDoubleClick(0)
            }, e.removeAllMEL = function() {
                this.aa && (this.aa.destroy(), this.aa = null)
            }, e.setFloat = function(t) {
                this.style.position = "relative", this.style.left = "", this.style.top = "", this.style.cssFloat = t, this.style.display = "inline-block", this.Bb && (this.Bb.position = "relative", this.Bb.left = null, this.Bb.top = null, this.Bb.cssFloat = t, this.Bb.display = "inline-block")
            }, e.setTooltip = function(t) {
                this.tooltip = t, this.element.title = jbeeb.Utils.unescapeHTML(t)
            }, e.destroy = function() {
                this.removeAllEventListeners(), this.aa && (this.aa.destroy(), this.aa = null), this.element && this.element.parentNode && (this.element.parentNode.removeChild(this.element), this.element = null), this.parent && (this.parent.removeChild(this), this.parent = null), this.temp = null, this.stroke = null, this.fill = null, this.gradient = null, this.bevel = null, this.outline = null, this.shadow = null, this.inset = null, this.image = null, this.element = null, this.Bb = null
            }, e.getCSS = function() {
                return this.Bb
            }, e.animateAll = function(t, e) {
                if (e = e || "linear", t) {
                    var i = this.style;
                    i.mozTransition = i.oTransition = i.msTransition = i.webkitTransition = i.transition = "all " + t + "ms " + e
                }
            }, e.cancelAnimation = function() {
                var t = this.style;
                t.mozTransition = t.oTransition = t.msTransition = t.webkitTransition = t.transition = "none"
            }, e.toString = function() {
                return "[Box (name=" + this.name + ")]"
            }, e.type = "Box", jbeeb.Box = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                    this.init(t)
                },
                e = t.prototype = new jbeeb.Box(null);
            e.textFit = null, e.text = "", e.Tb = "", e.textSize = null, e.textColor = null, e.shadowText = null, e.bevelText = null, e.outlineText = null, e.insetText = null, e.font = null, e.align = null, e.textScale = null, e.selectable = null, e.bold = null, e.padding = null, e.editable = null, e.Ub = null, e.multiline = null, e.baselineShift = null, e.Vb = null, e.Wb = null, e.Xb = !1, e.Yb = !1, e.Zb = e.init, e.init = function(t) {
                var e, i, s;
                t && (t.editable && (e = t.multiline ? document.createElement("textarea") : document.createElement("input"), this.Ub = 1, e.id = jbeeb.getUID(), e.style.position = "absolute", e.style.overflow = "visible", t.multiline && (e.style.verticalAlign = "top"), this.Bb && (this.Bb.position = "absolute", this.Bb.overflow = "visible"), t.multiline || (e.type = "text"), t.element = e), this.Yb = t.wrap || 0, this.Zb(t), t.element = null, i = this.style, i.textDecoration = "none", i.zoom = 1, i.size = t.h, this.text = t.text || "", this.Bb && (s = this.Bb, s.textDecoration = "none", s.zoom = 1, s.size = t.h), this.applySkin(t, !0))
            }, e.$b = e.applySkin, e.applySkin = function(t, e) {
                var i, s, n, l, h;
                this.Xb = !0, t.editable && (i = null, t.fill && (i = "object" == typeof t.fill ? t.fill.color : t.fill), t.stroke = t.stroke || i || {
                    weight: 1,
                    color: "#000000",
                    alpha: 1
                }), this.$b(t, e), s = this.style, this.textFit = t.textFit || null, this.font = t.font || "Arial, Helvetica, sans-serif", this.align = t.align || "left", this.textScale = t.textScale || 1, this.bold = t.bold || 0, this.selectable = t.selectable || 0, this.editable = t.editable || 0, this.multiline = t.multiline || 0, n = t.baselineShift, n = t.multiline ? n || 1 : n || 0, this.baselineShift = n, e || (this.text = t.text || ""), this.Tb = "", this.textColor = {}, t.textSize && (this.textSize = t.textSize), 1 == t.editable && this.setEditable(1), this.setMultiline(this.multiline, !0), this.setText(this.text), t.textColor && (l = t.textColor, h = {}, "string" == typeof l ? h = {
                    color: l,
                    alpha: 1
                } : (h = l, h.color || (h.color = null, h.alpha = null)), this.setTextColor(h.color || "#000000", h.alpha || 1)), t.shadowText && (this.shadowText = t.shadowText), t.insetText && (this.insetText = t.insetText), t.bevelText && (this.bevelText = t.bevelText), t.outlineText && (this.outlineText = t.outlineText), t.shadow && (this.shadow = t.shadow), t.inset && (this.insetText = t.inset), t.bevel && (this.bevel = t.bevel), t.outline && (this.outline = t.outline), t.padding && this.setPadding(t.padding), t.alphaNumeric && (this.alphaNumeric = 1), t.numeric && (this.numeric = 1), this.setBaselineShift(this.baselineShift), this.Xb = !1, this._b(), this.ac()
            }, e.setMultiline = function(t, e) {
                var i, s;
                this.multiline = t, s = this.style, t ? (this.textSize || (this.textSize = 12), i = "normal") : i = "nowrap", this.Yb && (i = "normal"), s.whiteSpace = i, this.Bb && (this.Bb.whiteSpace = i), this.bc()
            }, e.Ub = 0, e.cc = null, e.dc = null, e.setEditable = function(t) {
                if (1 === t && jbeeb.Keyboard) {
                    this.setMouseEnabled(1), this.amSM || this.setCursor("text"), this.Wb ? this.Wb.removeAllEventListeners() : this.Wb = new jbeeb.Keyboard(this.element), this.Wb.addEventListener("keydown", this.keyHandler, this), this.Wb.addEventListener("keyup", this.keyHandler, this), this.setOverflow("hidden");
                    var e = jbeeb.Utils.bindEvent;
                    this.cc = e(this.element, "focus", this.setFocus.bind(this)), this.dc = e(this.element, "blur", this.ec.bind(this)), this.addMEL("mouseUp", this.setFocus, this)
                } else this.amSM || this.setCursor("default"), this.Wb && this.Wb.removeAllEventListeners(), jbeeb.Utils.unbindEvent(this.element, "focus", this.cc);
                this.editable = t
            }, e.numeric = null, e.alphaNumeric = null, e.keyHandler = function(t, e, i) {
                var s = !0;
                this.alphaNumeric ? s = this.Wb.alphaNumeric(e) : this.numeric && (s = this.Wb.numeric(e)), 0 == this.multiline && (108 != e && 13 != e || (s = !1, "keyup" == i && this.dispatchEvent("enter", this, this.text))), 9 == e && (s = !1, "keyup" == i && this.dispatchEvent("tab", this, this.text)), s ? (this.Ub && !this.multiline ? this.text = this.element.value : this.fc ? this.text = this.fc.innerHTML : this.text = this.element.innerHTML, "keyup" == i && this.dispatchEvent("change", this, this.text)) : this.Wb.block(t)
            }, e.ec = function() {
                this.dispatchEvent("change", this, this.text)
            }, e.setPadding = function(t) {
                var e, i, s, n, l, h;
                this.padding = t, e = this.fc ? this.fc.style : this.style, i = "", s = "", n = "", l = "", this.multiline ? (i = t + "px", s = t + "px", n = t + "px", l = t + "px") : "left" == this.align ? t && (i = t + "px") : "right" == this.align && t && (s = t + "px"), e.paddingLeft = i, e.paddingRight = s, e.paddingTop = n, e.paddingBottom = l, this.Bb && (h = this.Bb, h.paddingLeft = i, h.paddingRight = s, h.paddingTop = n, h.paddingBottom = l)
            }, e.gc = function() {
                var t, e = "normal",
                    i = this.font,
                    s = this.textColor || {},
                    n = jbeeb.Utils.makeColor(s.color, s.alpha),
                    l = this.bold ? "bold" : e,
                    h = this.style;
                h.fontFamily = i, h.color = n, h.textAlign = this.align, h.fontWeight = l, h.fontStyle = e, this.Bb && (t = this.Bb, t.fontFamily = i, t.color = n, t.textAlign = this.align, t.fontWeight = l, t.fontStyle = "normal")
            }, e.setFont = function(t) {
                this.font = t, this.style.fontFamily = t, this.fc && this.hc && (this.fc.style.fontFamily = this.font), this.Bb && (this.Bb.fontFamily = t), this._b()
            }, e.setAlign = function(t) {
                this.align = t, this.style.textAlign = t, "center" == t && this.setPadding(0), this.Bb && (this.Bb.textAlign = t)
            }, e.setBold = function(t) {
                this.bold = t ? "bold" : "", this.style.fontWeight = this.bold, this.Bb && (this.Bb.fontWeight = this.bold), this._b()
            }, e.setBaselineShift = function(t) {
                this.baselineShift = t, t ? t > 2 ? t = 2 : -2 > t && (t = -2) : t = 0, t *= -1, this.Vb = 1 + t, this._b()
            }, e.measureText = function(t) {
                var e, i, s, n, l;
                return this.text || t ? (e = document.createElement("div"), document.body.appendChild(e), i = e.style, i.fontSize = this.height * this.textScale + "px", i.fontFamily = this.font, i.fontWeight = this.bold ? "bold" : "normal", i.position = "absolute", i.left = -1e3, i.top = -1e3, e.innerHTML = t || this.text, s = e.clientWidth, n = e.clientHeight, l = {
                    w: s,
                    h: n
                }, document.body.removeChild(e), e = null, l) : 0
            }, e.setTextColor = function(t, e) {
                this.textColor || (this.textColor = {}), this.textColor.color = t, this.textColor.alpha = e;
                var i = jbeeb.Utils.makeColor(t, e);
                this.style.color = i, this.Bb && (this.Bb.color = i), this.gc()
            }, e.hc = null, e.setText = function(t, e) {
                var i, s, n, l;
                this.element && (t += "", t = "0" !== t && "" == t || !t ? "" : t, e && (t = this.Tb + t), this.text = t, this.Ub && !this.multiline ? (this.element.value = t, this.element.alt = t) : (i = 0, jbeeb.Browser && (s = jbeeb.Browser, s.ie && s.version < 10 && (i = 1)), this.fc || (n = document.createElement("span"), l = "inherit", i && (l = this.font), n.style.fontFamily = l, this.element.appendChild(n), this.fc = n), this.fc.innerHTML = t, this.fc.alt = t, this.hc = i), this.Tb != t && this._b(), this.Tb = t)
            }, e.selectAll = function() {
                this.Ub && (jbeeb.focus = this, this.element.focus(), this.element.select())
            }, e.ic = e.setWidth, e.setWidth = function(t) {
                t != this.width && (this.ic(t), this.bc())
            }, e.jc = e.setHeight, e.setHeight = function(t) {
                t != this.height && (this.jc(t), this.bc())
            }, e.kc = e.setSize, e.setSize = function(t, e) {
                t == this.width && e == this.height || (this.kc(t, e), this.bc())
            }, e.setTextScale = function(t) {
                this.textScale = t || 1, this.bc()
            }, e.setTextSize = function(t) {
                this.textSize = t, this.bc()
            }, e.setTextFit = function(t) {
                this.textFit = t, this.bc()
            }, e.lc = e.onAdded, e.onAdded = function() {
                this.lc(), this._b()
            }, e.setFocus = function(t) {
                jbeeb.focus = this, this.element.focus()
            }, e.hiddenText = 0, e.bc = function() {
                var t, e, i, s, n, l, h, a, r;
                ("" != this.text || this.hiddenText) && (t = null, e = null, i = null, this.textSize ? (t = this.textSize, e = "1em", i = t + "px") : (s = this.width, n = this.height, s > 0 && n > 0 ? "wh" == this.textFit ? (l = n > s ? s : n, t = this.textScale > 0 ? l * this.textScale : l, (t > s || t > n) && (l = s > n ? s : n, t = this.textScale > 0 ? l * this.textScale : l)) : "w" == this.textFit ? (h = this.measureText(), a = this.width / h.w / 2, jbeeb.Utils.isNumber(a) && a > 0 && (this.textScale = a, t = n * a)) : t = n * this.textScale : t = 0), t && (e = this.multiline ? 1.2 * this.baselineShift + "em" : this.height * this.Vb / t + "em", i = t + "px"), r = this.style, r.lineHeight = e, r.fontSize = i, this.Bb && (this.Bb.lineHeight = e, this.Bb.fontSize = i))
            }, e.getTextSize = function() {
                return this.style.fontSize || null
            }, e._b = function() {
                this.Xb || (this.bc(), this.gc())
            }, e.ac = function() {
                var t, e, i, s, n, l, h, a = this.mc(),
                    r = this.nc(),
                    o = this.oc(),
                    u = this.pc(),
                    c = "none";
                if (a == [] && r == [] && o == [] && u == []);
                else {
                    for (t = r.concat(o, a, u), e = t.length, i = [], s = [], n = 0, l = 0; e > l; l++) 0 == n ? 1 == t[l] && s.push("inset") : 4 > n ? s.push(t[l] + "px") : (s.push(jbeeb.Utils.makeColor(t[l], t[l + 1])), i.push(s.join(" ")), s = [], ++l, n = -1), n++;
                    i.length > 0 && (c = i.join(","))
                }
                h = this.style, h.textShadow = h.MozTextShadow = h.WebkitTextShadow = h.OTextShadow = h.msTextShadow = c, this.Bb && (this.Bb.textShadow = c)
            }, e.mc = function() {
                var t = this.shadowText;
                return t ? [0, t.x, t.y, t.s, t.c, t.a] : []
            }, e.setShadowText = function(t) {
                this.shadowText = t, this.ac()
            }, e.pc = function() {
                var t = this.insetText;
                return t ? [1, t.x, t.y, t.s, t.c, t.a] : []
            }, e.setInsetText = function(t) {
                this.insetText = t, this.ac()
            }, e.nc = function() {
                var t, e;
                return this.bevelText ? (t = this.bevelText, e = [], t.c1 && t.a1 > 0 && (e = [0, -t.x, -t.y, t.s1, t.c1 || "#000000", t.a1]), t.c2 && t.a2 > 0 && (e = e.concat([0, t.x, t.y, t.s2, t.c2 || "#FFFFFF", t.a2])), e) : []
            }, e.setBevelText = function(t) {
                this.bevelText = t, this.ac()
            }, e.oc = function() {
                if (this.outlineText) {
                    var t = this.outlineText;
                    return [0, -t.weight, -t.weight, t.spread || 0, t.color || "#000000", t.alpha, 0, t.weight, -t.weight, t.spread || 0, t.color || "#000000", t.alpha, 0, -t.weight, t.weight, t.spread || 0, t.color || "#000000", t.alpha, 0, t.weight, t.weight, t.spread || 0, t.color || "#000000", t.alpha]
                }
                return []
            }, e.setOutlineText = function(t) {
                this.outlineText = t, this.ac()
            }, e.toString = function() {
                return "[TextBox (name=" + this.name + ")]"
            }, e.qc = e.destroy, e.destroy = function() {
                this.Wb && (this.Wb.destroy(), this.Wb = null), jbeeb.focus == this && (jbeeb.focus = null), this.cc = null, this.dc = null, this.qc()
            }, e.type = "TextBox", jbeeb.TextBox = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                    this.likeContainer = 1, this.init(t)
                },
                e = t.prototype = new jbeeb.Box(null);
            e.likeContainer = 1, e.rc = [], e.addChild = function(t) {
                var e, i, s;
                if (null == t) return t;
                if (e = arguments.length, e > 0)
                    for (i = 0; e > i; i++) s = arguments[i], s.parent && s.parent.removeChild(s), s.parent = this, s.stage = 1 == this.amStage ? this : this.stage, s.setZ(this.rc.length), this.element.appendChild(s.element), "function" == typeof s.onAdded && s.onAdded.call(s), this.rc.push(s)
            }, e.removeChild = function(t) {
                var e, i, s = arguments.length;
                if (s > 1) {
                    for (e = !0, i = s; i--;) e = e && this.removeChild(arguments[i]);
                    return e
                }
                return this.removeChildAt(this.rc.indexOf(t))
            }, e.removeChildAt = function(t) {
                var e, i, s, n, l = arguments.length;
                if (l > 1) {
                    for (e = [], i = 0; l > i; i++) e[i] = arguments[i];
                    for (e.sort(function(t, e) {
                            return e - t
                        }), s = !0, i = 0; l > i; i++) s = s && this.removeChildAt(e[i]);
                    return s
                }
                return t >= 0 && t <= this.rc.length - 1 && (n = this.rc[t], n && (n.element && n.element.parentNode && n.element.parentNode.removeChild(n.element), n.parent = null), this.rc.splice(t, 1), this.sc(), !0)
            }, e.removeAllChildren = function() {
                for (var t = this.rc; t.length;) this.removeChildAt(0)
            }, e.sc = function() {
                var t, e, i = this.rc.length;
                for (t = 0; i > t; t++) e = this.rc[t], e && e.setZ(t + 1)
            }, e.toZ = function(t, e) {
                var i, s, n;
                if (t) {
                    for (i = this.rc.length, s = 0, n = i; n--;)
                        if (this.rc[n] == t) {
                            s = n;
                            break
                        }
                    s > e && e--, 0 > e ? e = 0 : e > i - 1 && (e = i - 1), jbeeb.Utils.arrayMove(this.rc, s, e), this.sc()
                }
            }, e.toFront = function(t) {
                var e, i, s;
                if (t) {
                    for (e = this.rc.length, i = 0, s = e; s--;)
                        if (this.rc[s] == t) {
                            i = s;
                            break
                        }
                    jbeeb.Utils.arrayMove(this.rc, i, e - 1), this.sc()
                } else this.parent && this.parent.toFront(this)
            }, e.toBack = function(t) {
                var e, i, s;
                if (t) {
                    for (e = this.rc.length, i = 0, s = e; s--;)
                        if (this.rc[s] == t) {
                            i = s;
                            break
                        }
                    jbeeb.Utils.arrayMove(this.rc, i, 0), this.sc()
                } else this.parent && this.parent.toBack(this)
            }, e.tc = e.init, e.init = function(t) {
                this.tc(t), t && (this.stage = 1 == this.amStage ? this : this.stage, this.rc = [])
            }, e.uc = e.stretch, e.stretch = function(t, e, i) {
                var s, n, l = t,
                    h = e,
                    a = this.flex;
                for (a && (a.match(/w/) || (l = 1), a.match(/h/) || (h = 1)), s = this.rc.length; s--;) n = this.rc[s], n && n.stretch(l, h, i);
                this.uc(t, e, i)
            }, e.vc = e.setFlex, e.setFlex = function(t) {
                for (var e = this.rc.length; e--;) this.rc[e].setFlex(t);
                this.vc(t)
            }, e.wc = e.animateAll, e.animateAll = function(t, e) {
                for (var i = this.rc.length; i--;) this.rc[i].animateAll(t, e);
                this.wc(t, e)
            }, e.xc = e.cancelAnimation, e.cancelAnimation = function(t) {
                for (var e = this.rc.length; e--;) this.rc[e].cancelAnimation(t);
                this.xc(t)
            }, e.yc = e.setMouseEnabled, e.setMouseEnabled = function(t) {
                for (var e = this.rc.length; e--;) this.rc[e].setMouseEnabled(t);
                this.yc(t)
            }, e.zc = e.destroy, e.destroy = function() {
                if (this.rc)
                    for (var t = this.rc.length; t--;) this.rc[t] && (this.rc[t].destroy(), this.rc[t] && (this.removeChild(this.rc[t]), this.rc[t] = null));
                this.rc = null, this.zc()
            }, e.destroyChildren = function() {
                if (this.rc)
                    for (var t = this.rc.length; t--;) this.rc[t] && (this.rc[t].destroy(), this.removeChild(this.rc[t]), this.rc[t] = null);
                this.rc.length = 0, this.rc = null, this.rc = []
            }, e.getChildren = function() {
                return this.rc
            }, e.getChildByName = function(t) {
                var e, i, s = this.rc.length;
                for (e = 0; s > e; e++)
                    if (i = this.rc[e], i.name == t) return i
            }, e.toString = function() {
                return "[Container (name=" + this.name + ")]"
            }, e.type = "Container", jbeeb.Container = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                    this.init(t)
                },
                e = t.prototype = new jbeeb.TextBox;
            e.rc = [], e.addChild = function(t) {
                var e, i, s;
                if (null == t) return t;
                if (e = arguments.length, e > 0)
                    for (i = 0; e > i; i++) s = arguments[i], s.parent && s.parent.removeChild(s), s.parent = this, s.stage = 1 == this.amStage ? this : this.stage, s.setZ(this.rc.length), this.element.appendChild(s.element), s.onAdded && s.onAdded.call(s), this.rc.push(s)
            }, e.removeChild = function(t) {
                var e, i, s = arguments.length;
                if (s > 1) {
                    for (e = !0, i = s; i--;) e = e && this.removeChild(arguments[i]);
                    return e
                }
                return this.removeChildAt(this.rc.indexOf(t))
            }, e.removeChildAt = function(t) {
                var e, i, s, n, l = arguments.length;
                if (l > 1) {
                    for (e = [], i = 0; l > i; i++) e[i] = arguments[i];
                    for (e.sort(function(t, e) {
                            return e - t
                        }), s = !0, i = 0; l > i; i++) s = s && this.removeChildAt(e[i]);
                    return s
                }
                return t >= 0 && t <= this.rc.length - 1 && (n = this.rc[t], n && (n.element && n.element.parentNode && n.element.parentNode.removeChild(n.element), n.parent = null), this.rc.splice(t, 1), this.sc(), !0)
            }, e.removeAllChildren = function() {
                for (var t = this.rc; t.length;) this.removeChildAt(0)
            }, e.sc = function() {
                var t, e, i = this.rc.length;
                for (t = 0; i > t; t++) e = this.rc[t], e && e.setZ(t + 1)
            }, e.toFront = function(t) {
                var e, i, s;
                if (t) {
                    for (e = this.rc.length, i = 0, s = e; s--;)
                        if (this.rc[s] == t) {
                            i = s;
                            break
                        }
                    jbeeb.Utils.arrayMove(this.rc, i, e - 1), this.sc()
                } else this.parent && this.parent.toFront(this)
            }, e.toBack = function(t) {
                var e, i, s;
                if (t) {
                    for (e = this.rc.length, i = 0, s = e; s--;)
                        if (this.rc[s] == t) {
                            i = s;
                            break
                        }
                    jbeeb.Utils.arrayMove(this.rc, i, 0), this.sc()
                } else this.parent && this.parent.toBack(this)
            }, e.Ac = e.init, e.init = function(t) {
                this.Ac(t), t && (this.stage = 1 == this.amStage ? this : this.stage, this.rc = []), this.setOverflow("hidden")
            }, e.Bc = e.stretch, e.stretch = function(t, e, i) {
                var s, n, l = t,
                    h = e,
                    a = this.flex;
                for (a && (a.match(/w/) || (l = 1), a.match(/h/) || (h = 1)), s = this.rc.length; s--;) n = this.rc[s], n && n.stretch(l, h, i);
                this.Bc(t, e, i)
            }, e.Cc = e.setFlex, e.setFlex = function(t) {
                for (var e = this.rc.length; e--;) this.rc[e].setFlex(t);
                this.Cc(t)
            }, e.Dc = e.setMouseEnabled, e.setMouseEnabled = function(t) {
                for (var e = this.rc.length; e--;) this.rc[e].setMouseEnabled(t);
                this.Dc(t)
            }, e.Ec = e.destroy, e.destroy = function() {
                if (this.rc)
                    for (var t = this.rc.length; t--;) this.rc[t] && (this.rc[t].destroy(), this.removeChild(this.rc[t]), this.rc[t] = null);
                this.rc = null, this.Ec()
            }, e.destroyChildren = function() {
                if (this.rc)
                    for (var t = this.rc.length; t--;) this.rc[t] && (this.rc[t].destroy(), this.removeChild(this.rc[t]), this.rc[t] = null);
                this.rc.length = 0, this.rc = null, this.rc = []
            }, e.getChildren = function() {
                return this.rc
            }, e.toString = function() {
                return "[TextContainer (name=" + this.name + ")]"
            }, e.type = "TextContainer", jbeeb.TextContainer = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                    this.init(t)
                },
                e = t.prototype = new jbeeb.TextContainer;
            e.state = null, e.skinData = null, e.amSM = null,
                e.maxStates = 1, e.Fc = null, e.Gc = e.init, e.init = function(t) {
                    t && (this.skinData = {}, this.amSM = t.amSM, this.Gc(t), this.maxStates = 0, this.Fc = 1, this.applySkin(t, !1, !0), this.setState(0), this.amSM || this.setCursor("pointer"))
                }, e.Hc = e.applySkin, e.Ic = function() {
                    this.skinData && (this.skinData.fill = null, this.skinData.stroke = null, this.skinData.image = null, this.skinData.bevel = null, this.skinData.shadow = null, this.skinData.outline = null, this.skinData.inset = null, this.skinData.textColor = null, this.skinData.shadowText = null, this.skinData.bevelText = null, this.skinData.outlineText = null, this.skinData.insetText = null), this.fill = null, this.stroke = null, this.image = null, this.shadow = null, this.bevel = null, this.outline = null, this.inset = null, this.textColor = null, this.shadowText = null, this.bevelText = null, this.outlineText = null, this.insetText = null
                }, e.applySkin = function(t, e, i) {
                    i = 1 == i && i, e = 1 == e && e, this.Ic(), i || this.Hc(t), e || (jbeeb.Utils.isNumber(t.x) && this.setXY(t.x, jbeeb.Utils.isNumber(t.y) ? t.y : 0), t.width && this.setSize(t.width, t.height), t.w && this.setSize(t.w, t.h)), this.setRounded(t.rounded), this.setSkinPart("fill", t.fill), this.setSkinPart("stroke", t.stroke), this.setSkinPart("image", t.image), this.setSkinPart("bevel", t.bevel), this.setSkinPart("shadow", t.shadow), this.setSkinPart("outline", t.outline), this.setSkinPart("inset", t.inset), this.setSkinPart("textColor", t.textColor), this.setSkinPart("bevelText", t.bevelText), this.setSkinPart("shadowText", t.shadowText), this.setSkinPart("outlineText", t.outlineText), this.setSkinPart("insetText", t.insetText), t.font && this.setFont(t.font), this.setTextScale(t.textScale), this.setAlign(t.align || "center"), this.setPadding(t.padding), this.setBaselineShift(t.baselineShift), this.Fc = 0
                }, e.Jc = function(t, e) {
                    var i, s = null;
                    if (t) {
                        if ("fill" == e || "stroke" == e || "textColor" == e)
                            if ("string" == typeof t) s = "stroke" == e ? [{
                                color: t,
                                alpha: 1,
                                weight: 1
                            }] : [{
                                color: t,
                                alpha: 1
                            }];
                            else if (jbeeb.Utils.isArray(t)) {
                            for (i = 0; i < t.length; i++) "string" == typeof t[i] && ("stroke" == e ? t[i] = {
                                color: t[i],
                                alpha: 1,
                                weight: 1
                            } : t[i] = {
                                color: t[i],
                                alpha: 1
                            });
                            s = t
                        } else s = [t];
                        else if ("image" == e)
                            if ("string" == typeof t) s = [{
                                url: t,
                                mode: "center"
                            }];
                            else if (jbeeb.Utils.isArray(t)) {
                            for (i = 0; i < t.length; i++) "string" == typeof t[i] && (t[i] = {
                                url: t[i],
                                mode: 1
                            });
                            s = t
                        } else s = [t];
                        else s = jbeeb.Utils.isArray(t) ? t : [t];
                        this.Fc && s && 1 == s.length && s.push(s[0])
                    }
                    return s
                }, e.setSkinPart = function(t, e) {
                    var i, s = this.Jc(jbeeb.Utils.clone(e), t);
                    this.skinData[t] = s, i = 1, jbeeb.Utils.isArray(s) && (i = s.length), i > this.maxStates && (this.maxStates = i)
                }, e.setSkinState = function(t, e, i) {
                    this.skinData[t] || (this.skinData[t] = [null, null]);
                    var s = e + 1;
                    s > this.maxStates && (this.maxStates = s), i ? this.skinData[t][e] = jbeeb.Utils.clone(i) : this.skinData[t][e] = null
                }, e.setState = function(t, e, i) {
                    var s, n, l;
                    this.state == t && e == this.text || (this.state = t || 0, e && this.setText(e), s = null, n = null, l = i || this.skinData, l && (n = l.fill, n && (s = n[t], s ? this.setFill(s.color, s.alpha) : this.setFill(null)), n = l.stroke, n && (s = n[t], s ? this.setStroke(s.weight, s.color, s.alpha) : this.setStroke(null, null)), n = l.image, n && (s = n[t], s ? this.setImage(s.url, s.mode) : this.setImage(null)), n = l.shadow, n && (s = n[t], s ? this.setShadow(s) : this.setShadow(null)), n = l.inset, n && (s = n[t], s ? this.setInset(s) : this.setInset(null)), n = l.bevel, n && (s = n[t], s ? this.setBevel(s) : this.setBevel(null)), n = l.outline, n && (s = n[t], s ? this.setOutline(s) : this.setOutline(null)), n = l.textColor, n && (s = n[t], s ? this.setTextColor(s.color, s.alpha) : this.setTextColor(null)), n = l.shadowText, n && (s = n[t], s ? this.setShadowText(s) : this.setShadowText(null)), n = l.insetText, n && (s = n[t], s ? this.setInsetText(s) : this.setInsetText(null)), n = l.bevelText, n && (s = n[t], s ? this.setBevelText(s) : this.setBevelText(null)), n = l.outlineText, n && (s = n[t], s ? this.setOutlineText(s) : this.setOutlineText(null))))
                }, e.Kc = e.destroy, e.destroy = function() {
                    this.Ic(), this.Kc()
                }, e.toString = function() {
                    return "[Rube (name=" + this.name + ")]"
                }, e.type = "Rube", jbeeb.Rube = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                    var e = new jbeeb.ReadyBoss;
                    return this.B = e, this.onReady = e.add.bind(e), this.Lc(t), this
                },
                e = t.prototype = new jbeeb.Container;
            e.ready = null, e.Lc = function(t) {
                var e, i, s, n, l, h;
                t && (this.ready = 0, e = t.onReady, e && this.B.add(e, this), this.id = jbeeb.getUID(), t.stage ? (this.amStage = 0, this.Mc(t), jbeeb.register(this)) : (this.amStage = 1, this.parent = this, this.stage = this, i = t.target, s = null, n = 0, i && (s = "string" == typeof i ? document.getElementById(i) : i, s && 1 === s.nodeType ? (this.element = document.createElement("div"), this.element.id = this.id, s.appendChild(this.element)) : n = 1), i && !n || (document.write('<div id="' + this.id + '"></div>'), this.element = document.getElementById(this.id)), t.element = this.element, this.Mc(t), this.style = this.element.style, this.style.position = "relative", jbeeb.Utils.isTrue(t.inline) ? (this.style.cssFloat = "left", this.style.display = "inline-block", this.style.verticalAlign = "top") : (this.style.display = "block", this.style.verticalAlign = "middle", this.style.marginLeft = "auto", this.style.marginRight = "auto"), this.style.zoom = 1, l = this.width || t.w || 1, h = this.height || t.h || 1, this.setSize(l, h), this.setOverflow(t.overflow || "visible"), this.setCursor("default"), jbeeb.register(this)))
            }, e.Mc = e.init, e.init = function() {
                var t = jbeeb.Utils.getXYWH(this.element);
                this.x = t.x, this.y = t.y, this.width = t.width, this.height = t.height, setTimeout(this.N.bind(this), 5)
            }, e.N = function() {
                this.ready = 1, this.B.fire()
            }, e.onReady = null, e.toString = function() {
                return "[Stage (name=" + this.name + ")]"
            }, e.type = "Stage", jbeeb.Stage = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                    this.init(t)
                },
                e = t.prototype = new jbeeb.Container;
            e.Nc = null, e.Oc = 0, e.Pc = 12, e.Qc = 0, e.Rc = 0, e.k = null, e.g = null, e.TextScroller_init = e.init, e.init = function(t) {
                this.Rc = 0, this.TextScroller_init({
                    x: t.x,
                    y: t.y,
                    w: t.w,
                    h: t.h
                }), this.setOverflow("hidden");
                var e = jbeeb.Utils.clone(t);
                e.x = 0, e.y = 0, this.Nc = new jbeeb.TextBox(e), this.Nc.Cb = 0, this.addChild(this.Nc), this.Sc = this.t.bind(this), t.speed && this.setSpeed(t.speed)
            }, e.Tc = e.setSize, e.setSize = function(t, e) {
                this.Tc(t, e), this.Nc && this.Nc.setHeight(e), this.Uc()
            }, e.setText = function(t) {
                this.Nc.setX(0), this.Nc.setText(jbeeb.Utils.unescapeHTML(t)), this.Uc()
            }, e.Uc = function() {
                this.Nc && (this.Vc(), this.Qc = this.Nc.measureText().w, this.Oc = this.Qc - this.width, this.Rc && (this.g = this.Oc / this.Pc * 1e3, this.Wc(), this.Xc && this.Xc.cancel(), this.Xc = new jbeeb.DelayCall(this.t.bind(this), 1e3)))
            }, e.Vc = function() {
                this.k && clearTimeout(this.k), this.Yc(), this.Nc.setX(0)
            }, e.Xc = null, e.t = function() {
                var t, e, i = this.Oc;
                i > 0 && (this.k && clearTimeout(this.k), this.k = setTimeout(this.Sc, this.g + 500), t = this.Nc.x, t > -i || (e = 0), 0 > t || (e = -i), this.Nc.setX(e))
            }, e.Yc = function() {
                this.Nc.cancelAnimation()
            }, e.Wc = function() {
                this.Nc.animateAll(this.g, "linear")
            }, e.setSpeed = function(t) {
                this.Pc = t
            }, e.Zc = e.onAdded, e.onAdded = function() {
                this.Zc(), this.Uc()
            }, e.start = function(t) {
                t && (this.Pc = t), this.Rc = 1, this.Vc(), this.Uc()
            }, e.stop = function() {
                this.Rc = 0, this.Vc()
            }, e.toString = function() {
                return "[TextScroller (name=" + this.name + ")]"
            }, e.type = "TextScroller", jbeeb.TextScroller = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            var t, e = function(t) {
                this.$c = "cubic-bezier(0.075, 0.820, 0.165, 1.000)", this.likeContainer = 0, this.init(t)
            };
            e.options = {
                bars: {
                    kind: "range",
                    min: "1",
                    max: "100",
                    step: 1,
                    defaultValue: 20,
                    optional: !1,
                    getter: "getBars",
                    setter: "setBars",
                    label: "Number of Bars",
                    description: "The number of pixels between each item."
                },
                barMargin: {
                    kind: "range",
                    min: "0",
                    max: "100",
                    step: 1,
                    defaultValue: 0,
                    optional: !1,
                    getter: "getBarMargin",
                    setter: "setBarMargin",
                    label: "Bar Spacing",
                    description: "The height of each line item in pixels."
                }
            }, t = e.prototype = new jbeeb.Container, e.randomNumber = function(t, e) {
                return t + Math.random() * (e - t)
            }, e.randomInt = function(t, e) {
                return Math.round(t + Math.random() * (e - t))
            }, t._c = 0, t.ad = null, t.bd = null, t.cd = -1, t.dd = 1, t.ed = 10, t.fd = 40, t.gd = !1, t.hd = !1, t.A = 0, t.jd = [], t.kd = null, t.g = null, t.Sc = null, t.k = null, t.$c = null, t.t = function() {
                1 == this._c && (this.k && clearTimeout(this.k), this.k = setTimeout(this.Sc, this.g), this.u())
            }, t.ld = function() {
                this.A = 0, this.gd = !0, this.hd = !1, this.dd = 2, this.g = 50, this.Sc = this.t.bind(this), this._c = 1, this.t()
            }, t.md = function() {
                this.A = 0, this.hd = !0, this.gd = !1, this._c = 0
            }, t.nd = function() {
                var t, e, i, s, n, l, h;
                for (this.k && clearTimeout(this.k), this.A = 0, this.hd = !0, this.gd = !1, this._c = 0, t = this.height, e = .1 * t, i = e > 2 ? 2 : e, s = i, n = t - i, l = 0; l < this.ad; l++) h = this.jd[l], h.setTop(n), h.setHeight(s)
            }, t.od = t.init, t.init = function(t) {
                this.od({
                    x: t.x,
                    y: t.y,
                    w: t.w,
                    h: t.h
                }), this.setOverflow("visible"), this.cd = -1, this.dd = 1, this.fd = 40, this.gd = !1, this.hd = !1, this.A = 0, this._c = 0, this.kd = t.amSM, this.fill = t.fill, this.pd(t.bars, t.barMargin), this.kd && this.screenshot()
            }, t.pd = function(t, e) {
                var i, s, n, l, h, a, r, o;
                for (this.ad = t || 1, this.bd = e || 0, i = this.jd.length; i--;) s = this.jd[i], this.removeChild(s), s.destroy();
                for (this.jd = [], n = this.width, l = this.height, h = (n - e * t) / t, a = .1 * l, this.kd && (a = l), 1 > h && (h = 1, e = (n - h * t) / t, this.ad = t, this.bd = e), i = 0; t > i; i++) r = (h + e) * i, o = new jbeeb.Box({
                    x: r,
                    y: l - a,
                    w: h,
                    h: a,
                    fill: this.fill
                }), o.animateAll(100, this.$c), this.addChild(o), this.jd.push(o)
            }, t.u = function() {
                var t, i, s, n, l, h, a, r, o, u, c = this.height,
                    d = e.randomInt;
                for (t = 0; t < d(0, this.ad - 1); t++) i = d(0, this.ad - 1), s = 1 >= i || i > this.ad - this.ad / 2 ? this.fd / 2 : this.fd, i > this.ad - this.ad / 4 ? s /= 2 : s = s, n = this.jd[i], this.dd > 1 ? (l = this.dd / this.ed * e.randomNumber(1, s) / this.fd, h = c * l, n.setY(-h + c), n.setHeight(h)) : (a = .1 * c, r = a > 2 ? 2 : a, o = r, u = c - r, n.setTop(u), n.setHeight(o));
                (this.fd > this.ed || this.fd < 1) && (this.cd *= -1), this.fd += 1 / e.randomNumber(2, this.dd) * this.cd, this.fd > this.dd && (this.fd = this.dd, this.cd = -1), this.fd < 1 && (this.fd = 1, this.cd = 1), 1 == this.hd && (this.A++, this.A % 2 && this.dd--, this.dd < 2 && this.nd()), 1 == this.gd && (this.A++, this.A % 2 && this.dd++, this.dd > 9 && (this.gd = !1))
            }, t.setState = function(t) {
                this.kd || (1 == t ? 0 == this._c && this.ld() : t == -1 ? this.nd() : 1 == this._c && this.md())
            }, t.setFill = function(t, e) {
                this.fill.color = t, this.fill.alpha = e;
                for (var i = 0; i < this.jd.length; i++) this.jd[i].setFill(t, e)
            }, t.setStroke = function(t, e, i, s) {
                var n, l = {
                    weight: t,
                    color: e,
                    alpha: i,
                    style: s || "solid"
                };
                for (this.stroke = l, n = 0; n < this.jd.length; n++) this.jd[n].setStroke(t, e, i, s)
            }, t.toString = function() {
                return "[FakeEQ (name=" + this.name + ")]"
            }, t.setBars = function(t) {
                this.ad = +t || 3, this.pd(this.ad, this.bd), this.screenshot()
            }, t.getBars = function(t) {
                return this.ad
            }, t.setBarMargin = function(t) {
                this.bd = +t || 0, this.pd(this.ad, this.bd), this.screenshot()
            }, t.getBarMargin = function(t) {
                return this.bd
            }, t.screenshot = function() {
                var t, i, s, n = this.jd,
                    l = n.length,
                    h = this.height;
                for (t = 0; l > t; t++) i = .2 * l > t ? h / 2 - h * Math.cos(Math.PI * (.4 * l / t)) : h - h * Math.cos(Math.PI * (t / (.4 * l))), i *= e.randomNumber(0, 2), 1 > i ? i = 1 : i > h && (i = h), s = n[t], s.setY(-i + h), s.setHeight(i)
            }, t.type = "FakeEQ", jbeeb.FakeEQ = e
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            var t, e = function(t) {
                this.init(t)
            };
            e.defaultSkin = {
                type: "Thinker",
                x: 0,
                y: 0,
                w: 30,
                h: 30,
                textColor: "#000000",
                textScale: 1,
                font: "WimpyPlayerGlyphs",
                align: "center",
                text: "t"
            }, t = e.prototype = new jbeeb.Container, t.kd = !1, t.state = 0, t.qd = null, t.rd = t.init, t.init = function(t) {
                var e, i;
                this.kd = t.amSM, this.rd(t), e = {
                    x: 0,
                    y: 0,
                    w: t.w,
                    h: t.h,
                    textColor: t.textColor,
                    textScale: t.textScale,
                    font: "WimpyPlayerGlyphs",
                    align: "center",
                    text: "t"
                }, i = new jbeeb.TextBox(e), this.addChild(i), this.qd = i, this.qd.center(), this.kd ? (this.qd.setOrigin(0, 0, "px"), this.show()) : (this.qd.setOrigin(50, 50, "%"), this.hide())
            }, t.show = function() {
                this.state = 1, this.setVisible(1), this.kd || jbeeb.ticker && jbeeb.ticker.addEventListener("tick", this.tick, this)
            }, t.hide = function() {
                this.setVisible(0), this.kd || jbeeb.ticker && jbeeb.ticker.removeEventListener("tick", this.tick, this), this.state = 0
            }, t.tick = function() {
                var t = this.qd.rotation;
                this.qd.setRotation(t + 12)
            }, t.setState = function(t) {
                this.kd || (1 == t ? 0 == this.state && this.show() : this.hide())
            }, t.sd = t.stretch, t.stretch = function(t, e, i) {
                this.qd.setOrigin(0, 0, "px"), this.sd(t, e, i), this.qd.setOrigin(50, 50, "%")
            }, t.toString = function() {
                return "[Thinker (name=" + this.name + ")]"
            }, t.type = "Thinker", jbeeb.Thinker = e
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t, e, i, s, n, l, h, a, r, o, u) {
                    this.init(t, e, i, s, n, l, h, a, r, o, u)
                },
                e = t.prototype = new jbeeb.Rube;
            e.home = null, e.file = null, e.title = null, e.link = null, e.dl = null, e.td = null, e.ud = null, e.data = null, e.vd = null, e.wd = null, e.xd = null, e.yd = null, e.zd = e.init, e.init = function(t, e, i, s, n, l, h, a, r, o, u) {
                var c, d, f, b, p, m, g, y, v, j, w, x, k;
                h && (n = 1, l = 1), this.home = t, this.wd = e, c = jbeeb.Utils.clone(i), i.font = i.font || "Arial, Helvetica, sans-serif", i.align = i.align || "left", i.textScale = i.textScale || .7, this.vd = c, this.zd(i), this.hiddenText = 1, this.name = "listItem", d = c.x, f = c.y, b = c.w, p = c.h, m = "WimpyPlayerGlyphs", y = r, y || (y = {
                    file: "f",
                    list: "F",
                    download: "D",
                    link: "i",
                    linkTip: "link",
                    downloadTip: "download"
                }), this.ud = l ? 1 : 0, this.td = n ? 1 : 0, v = p * (1 / (this.textScale || 1)) * .15 + "px", this.Ad = [this.file, this.dl, this.link], j = document.createElement("span"), w = j.style, w.position = "absolute", w.left = "0", w.right = p + "px", this.xd = j, g = document.createElement("span"), w = g.style, w.marginRight = "0.5em", w.marginLeft = v, w.pointerEvents = "none", w.fontFamily = a ? "sans-serif" : m, g.innerHTML = a ? e + 1 : s ? y.list : y.file, this.file = g, j.appendChild(g), g = document.createElement("span"), w = g.style, w.pointerEvents = "none", g.innerHTML = "My Title", this.title = g, j.appendChild(g), this.element.appendChild(j), (l || n) && (x = document.createElement("div"), w = x.style, w.position = "absolute", w.right = "0px", w.marginRight = v, w.whiteSpace = "nowrap", w.textAlign = "right", this.yd = x, this.Bd = this.Cd.bind(this), k = 1.5, l && (g = document.createElement("span"), w = g.style, w.fontFamily = m, w.marginLeft = "0.6em", g.innerHTML = y.download || "D", this.Dd = this.Ed.bind(this), jbeeb.Utils.bindEvent(g, "mousedown", this.Dd), jbeeb.Utils.bindEvent(g, "mouseup", this.Bd), g.title = g.alt = o || y.downloadTip || "downlaod", this.dl = g, x.appendChild(g), k++), n && (g = document.createElement("span"), w = g.style, w.fontFamily = m, w.marginLeft = "0.6em", g.innerHTML = y.link || "i", this.Fd = this.Gd.bind(this), jbeeb.Utils.bindEvent(g, "mousedown", this.Fd), jbeeb.Utils.bindEvent(g, "mouseup", this.Bd), this.link = g, x.appendChild(g), k++, g.title = g.alt = u || y.linkTip || "link"), this.element.appendChild(x), j.style.overflow = "hidden", j.style.right = k + "em"), this.Hd = this.Id.bind(this), jbeeb.Utils.bindEvent(j, "mousedown", this.Hd), this.Jd = this.Kd.bind(this), jbeeb.Utils.bindEvent(j, "mouseup", this.Jd), this.setPadding(this.padding), this.stretch(1, 1)
            }, e.setIcon = function(t) {
                this.file && (this.file.innerHTML = t)
            }, e.setText = function(t) {
                this.Ld(jbeeb.Utils.unescapeHTML(t))
            }, e.clearText = function() {
                this.Ld("")
            }, e.Ld = function(t) {
                var e, i = this.title;
                i && (e = jbeeb.Utils.unescapeHTML(t), i.innerHTML = t, i = this.xd, i.title = i.alt = e)
            }, e.Md = e.setAlign, e.setAlign = function(t) {
                this.Md("left")
            }, e.Nd = e.setPadding, e.setPadding = function(t) {
                if (t && (this.Nd(t), this.yd)) {
                    var e = this.height * (1 / (this.textScale || 1)) * .15;
                    e = this.padding + e + "px", this.yd.style.marginRight = e, this.file.style.marginLeft = e
                }
            }, e.Hd = null, e.Jd = null, e.Bd = null, e.Dd = null, e.Fd = null, e.Id = function(t) {
                return !1
            }, e.Kd = function(t) {
                this.home.listItemMouse("up", this.wd, this)
            }, e.Cd = function(t) {
                t.preventDefault && t.preventDefault()
            }, e.Od = null, e.Ed = function(t) {
                t.preventDefault && t.preventDefault(), this.Od = "down", setTimeout(this.Pd.bind(this), 300)
            }, e.Gd = function(t) {
                t.preventDefault && t.preventDefault(), this.Od = "link", setTimeout(this.Pd.bind(this), 300)
            }, e.Pd = function() {
                this.home.specialClick(this.Od, this.wd, this)
            }, e.Qd = e.destroy, e.destroy = function() {
                e.home = null, jbeeb.Utils.empty(this.element), jbeeb.Utils.unbindEvent(this.dl, "mouseUp", this.Dd), jbeeb.Utils.unbindEvent(this.link, "mouseUp", this.Fd), jbeeb.Utils.unbindEvent(this.xd, "mouseup", this.Bd), e.file = null, e.title = null, e.link = null, e.dl = null, e.data = null, e.Qd()
            }, e.Rd = e.onAdded, e.onAdded = function() {
                this.Rd(), this.setState(1), this.setState(0)
            }, e.toString = function() {
                return "[ListItem (name=" + this.name + ")]"
            }, e.type = "ListItem", jbeeb.ListItem = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t, e, i, s = function(t) {
                    this.init(t), this.likeContainer = 0
                },
                n = [];
            if (jbeeb.mimes && jbeeb.mimes.playlist) {
                t = jbeeb.mimes.playlist;
                for (e in t) n.push(e);
                s.Sd = n
            }
            s.Td = {
                file: "f",
                list: "F",
                download: "D",
                link: "i",
                downloadTip: "download",
                linkTip: "link"
            }, s.defaultSkin = {
                x: 0,
                y: 0,
                w: 150,
                h: 120,
                type: "List",
                item: {
                    x: 0,
                    y: 0,
                    w: 156,
                    h: 19.322,
                    type: "ListItem",
                    name: "listItem",
                    text: "",
                    font: "Arial, Helvetica, sans-serif",
                    textColor: ["#000000", "#FFFFFF"],
                    textScale: .7,
                    textFit: "wh",
                    fill: [null, "#266FC2"],
                    stroke: 1,
                    spacing: 0
                }
            }, s.options = {
                spacing: {
                    kind: "range",
                    min: "0",
                    max: "50",
                    step: 1,
                    defaultValue: 0,
                    optional: !1,
                    setter: "setSpacing",
                    label: "Spacing",
                    description: "The number of pixels between each item."
                },
                lineHeight: {
                    kind: "range",
                    min: "5",
                    max: "100",
                    step: 1,
                    defaultValue: 24,
                    optional: !1,
                    getter: "getLineHeight",
                    setter: "setLineHeight",
                    label: "Line Height",
                    description: "The height of each line item in pixels."
                }
            }, i = s.prototype = new jbeeb.Container, i.Ud = "title", i.Vd = null, i.Wd = null, i.Xd = 0, i.Yd = 0, i.Zd = [], i.$d = [], i.ga = null, i._d = null, i.ae = null, i.be = 0, i.selectedIndex = -1, i.selectedItem = {}, i.state = 0, i.ce = {}, i.spacing = 0, i.td = null, i.ud = null, i.amSM = !1, i.SMtarget = null, i.de = null, i.ee = null, i.fe = null, i.ge = null, i.he = i.init, i.init = function(t) {
                var e, i, s, n, l;
                this.je = 1, e = t.glyphs, e && this.setGlyphs(t.glyphs), e = t.labels, e && this.setLabels(t.labels), e = t.displayField, e && this.setDisplayField(t.displayField), this.amSM = t.amSM, this.Zd = [], this.$d = [], this.selectedItem = {}, this.ce = {}, this.de = jbeeb.Utils.isTrue(t.numberTracks) ? 1 : 0, t.callback && (this.ga = t.callback), t.callbackMore && (this._d = t.callbackMore), t.callbackDownload && (this.ae = t.callbackDownload), this.td = t.useLink, this.ud = t.useDown, this.he(t), i = {
                    x: 0,
                    y: 0,
                    w: t.w,
                    h: 20,
                    fill: ["#FFFFFF", "#266FC2"],
                    textColor: ["#000000", "#FFFFFF"],
                    textScale: .7
                }, s = jbeeb.Utils.clone(t.item || i), this.ce = s, t.spacing ? this.spacing = t.spacing : this.spacing = s.spacing || 0, t.lineHeight && (this.ce.h = t.lineHeight), this.Yd = this.ce.h + this.spacing, this.setOverflow("hidden"), this.Wd = new jbeeb.Container({
                    x: 0,
                    y: 0,
                    w: t.w,
                    h: t.h
                }), this.addChild(this.Wd), this.ke(), t.scrollbar ? this.setScrollbar(t.scrollbar) : t.autoScrollbar && (n = new jbeeb.Slider({
                    x: t.w + (t.autoScrollbarOffset || 5),
                    y: 0,
                    w: 12,
                    h: t.h,
                    invertVal: 1
                }), this.addChild(n), this.setScrollbar(n), this.setWidth(t.w + 17)), t.list ? this.setList(t.list) : this.le(), this.amSM || (this.addMEL("mouseDown", this.me, this, !1), this.addMEL("mouseUp", this.ne, this, !1), this.MELpreventDefault = !0, jbeeb.Browser.touch || (l = jbeeb.Browser.moz ? "DOMMouseScroll" : "mousewheel", this.oe = this.pe.bind(this), jbeeb.Utils.bindEvent(this.element, l, this.oe)))
            }, i.setDisplayField = function(t) {
                this.Ud = t
            }, i.setGlyphs = function(t) {
                var e, i = s.Td;
                if (t)
                    for (e in t) i[e] && t[e] && (i[e] = t[e]);
                this.ge = i
            }, i.enableLink = function(t, e, i) {
                this.td = t, this.qe = e, i || this.redrawList()
            }, i.enableDownload = function(t, e, i) {
                this.ud = t, this.re = e, i || this.redrawList()
            }, i.re = null, i.qe = null, i.setCallback = function(t) {
                this.ga = t
            }, i.setCallbackMore = function(t) {
                this._d = t
            }, i.setCallbackDownload = function(t) {
                this.ae = t
            }, i.specialClick = function(t, e, i) {
                var s = this.$d[e];
                "down" == t ? "function" == typeof this.ae && this.ae(s, e, i) : "link" == t && "function" == typeof this._d && this._d(s, e, i)
            }, i.le = function() {
                this.Xd = this.Yd * this.$d.length - this.height + 1, this.Xd < 0 && (this.be = 0), this.se(this.be), this.te(this.be)
            }, i.te = function(t, e) {
                (e && "start" == e || "end" == e) && this.ue(), this.be = t, this.Rc()
            }, i.Rc = function() {
                var t, e, i, s, n, l, h, a = -this.Xd * this.be,
                    r = this.$d,
                    o = r.length;
                if (o > 80)
                    for (t = this.Yd, e = this.Zd, i = this.height / t, s = -a / t - 1, n = s + i + 1, l = o; l--;) h = e[l], l > s - 10 && n + 10 > l ? h.setVisible(!0) : h.setVisible(!1);
                this.ee ? this.fe = jbeeb.Animate.to(this.Wd, {
                    y: a
                }, 300, "out") : (this.ue(), this.Wd.setY(a))
            }, i.getEditObj = function() {
                return this.amSM ? this.SMtarget : null
            }, i.ke = function() {
                var t, e, i, s;
                for (t = 0; t < this.$d.length; ++t) this.ve(this.$d[t], t);
                this.amSM && (this.SMtarget = new jbeeb.ListItem(this, 1e3, this.ce, 0, 1, 1, this.amSM), this.addChild(this.SMtarget), this.SMtarget.setXY(0, 3 * -this.Yd), this.SMtarget.name = this.name), this.Vd && (e = !0, this.Zd.length > 0 && (i = this.Zd[this.Zd.length - 1], s = i.y + this.Yd, s > this.height || (e = !1)), e ? this.Vd.enable() : this.Vd.disable())
            }, i.setNumberTracks = function(t) {
                this.de = t
            }, i.ve = function(t, e) {
                var i, s, n, l = t.amPlaylist,
                    h = 0,
                    a = 0;
                l ? (a = 0, h = 0) : (i = jbeeb.Utils.isTrue, s = jbeeb.Utils.isFalse, h = i(this.ud) ? 1 : 0, void 0 !== t.downloadable && (i(t.downloadable) ? h = 1 : s(t.downloadable) && (h = 0)), a = i(this.td) ? 1 : 0, void 0 !== t.link && (a = s(t.link) ? 0 : 1)), n = new jbeeb.ListItem(this, e, this.ce, l, a, h, this.amSM, this.de, this.ge, t.downloadtip, t.linktip), n.setXY(0, this.Yd * e), n.setText(t[this.Ud] || t.title), t.icon && n.setIcon(t.icon), n.setState(0), n.setMouseEnabled(this.je), this.Wd.addChild(n), this.Zd.push(n), this.we()
            }, i.redrawList = function(t) {
                this.ce = t || this.ce, this.Yd = this.ce.h + this.spacing, this.Zd.length = 0, this.Zd = null, this.Zd = [], this.Wd.destroyChildren(), this.amSM && this.SMtarget && (this.removeChild(this.SMtarget), this.SMtarget.destroy()), this.ke(), this.le()
            }, i.xe = i.stretch, i.stretch = function(t, e, i) {
                var s, n;
                t > 0 && e > 0 && (this.xe(t, e, i), s = this.spacing * e, n = this.ce.h * e, this.ce.w = this.ce.w * t, this.ce.h = n, this.spacing = s, this.Yd = n + s, this.we())
            }, i.setList = function(t, e, i) {
                var s, n, l;
                if (0 !== e && 1 !== e && e !== !0 && e !== !1 || enableLink(e, this.qe, !0), 0 !== i && 1 !== i && i !== !0 && i !== !1 || enableDownload(i, this.re, !0), this.ye(-1), this.be = 0, this.ze(), s = 0, t && t.length)
                    for (s = t.length, n = 0; s > n; n++) l = jbeeb.Utils.clone(t[n]), this.$d.push(l);
                this.redrawList(), this.te(0), this.Vd && this.Vd.setPageSizePercent(this.height / this.Yd / this.$d.length)
            }, i.addItem = function(t) {
                var e, i = jbeeb.Utils.clone(t);
                this.$d.push(i), e = this.$d.length, this.ve(i, e - 1), this.Vd && this.Vd.setPageSizePercent(this.height / this.Yd / e)
            }, i.ze = function() {
                var t, e, i, s = this.$d.length;
                for (t = 0; s > t; t++)
                    for (e in this.$d[t]) this.$d[t][e] = null;
                for (this.$d = null, this.$d = [], t = 0; t < this.Zd.length; t++) i = this.Zd[t], i.clearText(), i.setState(0);
                this.le(), this.we()
            }, i.Ae = null, i.Be = null, i.Ce = null, i.De = null, i.Ee = 0, i.Fe = null, i.Ge = null, i.He = 0, i.Ie = 0, i.we = function() {
                var t = this.$d.length;
                t ? this.Ee = this.Yd / (t * this.Yd - this.height) : this.Ee = 0
            }, i.Je = function(t, e, i) {
                this.De = 1;
                var s = e.mouseY;
                this.Ke(s, !0), this.Le = s
            }, i.Le = 0, i.Ke = function(t, e) {
                var i, s, n = this.Ee * ((t - this.Ce) / this.Yd),
                    l = this.Be;
                e && this.se(l - n), i = (new Date).getTime(), s = i - this.Ge, this.Ge = i, this.He = l - n * (s / (this.Yd / 2))
            }, i.ne = function(t, e, i) {
                var s, n;
                this.ee = 1, this.removeMEL("mouseDrag", this.Je, this), s = this.He, n = Math.abs(this.Ce - e.mouseY), s && s > .1 && .9 > s && this.Ge - this.Fe < 500 && n > 5 ? (this.se(s), this.He = 0) : n > 0 && 5 > n && (this.De = 0, null != this.Me && this.Ne(this.Me))
            }, i.me = function(t, e, i) {
                this.Me = null, this.ee = 0, this.De = 0, this.Fe = (new Date).getTime(), this.Be = this.be, this.Ce = e.mouseY, this.addMEL("mouseDrag", this.Je, this)
            }, i.oe = null, i.pe = function(t) {
                var e, i;
                t.preventDefault && t.preventDefault(), this.ee = 1, e = t || window.event, i = this.Ee * ((e.detail ? e.detail * -120 : e.wheelDelta) / 240), this.se(this.Oe() - i)
            }, i.Me = null, i.listItemMouse = function(t, e, i) {
                this.Me = e, "up" == t && (this.removeMEL("mouseDrag", this.Je, this), !this.De && this.je && this.Ne(e))
            }, i.refresh = function(t) {
                var e, i, s = this.Zd;
                for (e = 0; e < s.length; e++) i = s[e], i.setState(0);
                this.highlightItem(t)
            }, i.highlightItem = function(t) {
                this.Ae && this.Ae.setState(0);
                var e = this.Zd[t];
                return e && e.setState(1), this.ye(t), e
            }, i.ye = function(t) {
                this.selectedIndex = t, this.selectedItem = t > -1 ? this.$d[t] : null
            }, i.Ne = function(t, e, i) {
                if (null !== t && t > -1 && t < this.$d.length) {
                    var s = this.highlightItem(t);
                    i = i || !1, this.ye(t), this.Rc(), i || this.ga && this.ga("click", this.selectedIndex), this.Ae = s
                }
            }, i.scrollTo = function(t, e) {
                var i, s, n = this.getGitem(t);
                n && (i = {
                    x: 0,
                    y: n.y + this.Wd.y,
                    width: this.width,
                    height: this.Yd
                }, s = {
                    x: -1,
                    y: -1,
                    width: this.width + 1,
                    height: this.height
                }, jbeeb.Utils.contains(s, i) || this.se(t / (this.$d.length - 1)), this.Ne(t, null, e))
            }, i.se = function(t) {
                0 > t ? t = 0 : t > 1 && (t = 1), this.Vd ? this.Vd.setValue(t) : (this.be = t, this.te(t))
            }, i.Oe = function() {
                var t;
                return t = this.Vd ? this.Vd.getValue() : this.be
            }, i.scrollOne = function(t) {
                var e = this.$d.length,
                    i = Math.round(e * this.Oe()) + t;
                this.se(i / e)
            }, i.setScrollbar = function(t) {
                this.Vd = t, this.Vd.setInverted(1), this.Vd.addEventListener("change", this.te, this), this.Vd.setStretchThumb(1)
            }, i.ue = function() {
                this.ee = 0, this.fe && jbeeb.Animate.cancel(this.fe)
            }, i.getGitem = function(t) {
                return this.Zd[t] || null
            }, i.getGlist = function() {
                return this.Zd
            }, i.toString = function() {
                return "[List (name=" + this.name + ")]"
            }, i.setRounded = function() {}, i.setStroke = function() {}, i.setFill = function() {}, i.setImage = function() {}, i.setBevel = function() {}, i.setOutline = function() {}, i.setShadow = function() {}, i.setInset = function() {}, i.setAlpha = function() {}, i.setState = function(t) {}, i.smGatherExtra = function(t, e) {
                var i = t.getObjData(this.getGitem(0));
                i.spacing = this.spacing, e.item = i, e.spacing = this.spacing
            }, i.smPrep = function() {
                var t, e = [];
                for (t = 1; 25 > t; t++) e.push({
                    title: "This is Track " + t
                });
                this.enableLink(1), this.enableDownload(1), this.setList(e)
            }, i.je = 1, i.setMouseEnabled = function(t) {
                var e, i;
                for (this.je = t, e = 0; e < this.Zd.length; e++) i = this.Zd[e], i.setMouseEnabled(t)
            }, i.setSpacing = function(t) {
                this.spacing = +t || 0, this.dispatchEvent("listSmUpdate", this, this.ce.h)
            }, i.setLineHeight = function(t) {
                this.ce.h = +t || 10, this.dispatchEvent("listSmUpdate", this, this.ce.h)
            }, i.getLineHeight = function() {
                return this.ce.h
            }, i.Pe = i.destroy, i.destroy = function() {
                this.oe && jbeeb.Utils.unbindEvent(this.element, "mousewheel", this.oe), this.Pe()
            }, i.type = "List", jbeeb.List = s
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t, e = function(t) {
                this.init(t), this.likeContainer = 1
            };
            e.defaultSkin = {
                x: 0,
                y: 0,
                w: 100,
                h: 10,
                type: "Slider",
                name: "myslider",
                children: [{
                    x: 0,
                    y: 0,
                    type: "Rube",
                    name: "track",
                    w: 100,
                    h: 10,
                    rounded: 1,
                    stroke: {
                        weight: 1,
                        color: "#979B99"
                    },
                    fill: {
                        color: ["#cecece", 1, 0, "#ececec", 1, 30, "#fafafa", 1, 50, "#fdfdfd", 1, 70, "#fafafa", 1, 80, "#ececec", 1, 100],
                        alpha: "v"
                    }
                }, {
                    x: 0,
                    y: 0,
                    type: "Rube",
                    name: "thumb",
                    w: 10,
                    h: 10,
                    rounded: 1,
                    fill: {
                        color: ["#F3F2F8", 1, 0, "#C0C0C4", 1, 100],
                        alpha: "v"
                    },
                    shadow: {
                        x: 0,
                        y: 1,
                        s: 2,
                        a: .3
                    },
                    stroke: {
                        weight: 1,
                        color: "#979B99"
                    }
                }]
            }, e.setDefaultSkin = function(t) {
                t.track && (e.Qe = t.track, e.Qe.x = 0, e.Qe.y = 0), t.thumb && (e.Re = t.thumb, e.Re.x = 0, e.Re.y = 0), t.labelColor && (e.defaultLabelColor = t.labelColor)
            }, e.Qe = e.defaultSkin.children[0], e.Re = e.defaultSkin.children[1], t = e.prototype = new jbeeb.Container, t.defaultLabelColor = "#000000", t.value = 0, t.Se = !1, t.Te = 0, t.track = null, t.thumb = null, t.Ue = null, t.Ve = null, t.We = null, t.Xe = null, t.Ye = null, t.Ze = null, t.$e = null, t._e = 0, t.af = 0, t.bf = 0, t.cf = 0, t.df = !1, t.ef = !1, t.ff = !1, t.label = null, t.icon = null, t.gf = 0, t.dragging = !1, t.hf = 0, t.if = null, t.jf = null, t.kf = null, t.lf = t.init, t.init = function(t) {
                var i, s, n, l, h, a, r, o, u, c, d, f, b, p, m, g, y, v, j, w, x, k, S;
                if (t) {
                    if (this.lf(t), 1 == t.usePaging ? this.gf = 1 : this.gf = 0, 1 == t.stretchThumb ? this.if = 1 : this.if = 0, n = t.w > t.h ? t.h : t.w, l = t.children)
                        for (h = 0; h < l.length; h++) a = l[h], a && ("track" == a.name ? i = jbeeb.Utils.clone(a) : "thumb" == a.name && (s = jbeeb.Utils.clone(a)));
                    r = t.w > t.h ? 1 : 0, i || (o = jbeeb.Utils.clone(e.Qe), o.w = t.w, o.h = t.h, o.fill.alpha = r ? "v" : "h", i = o), s || (n = t.w > t.h ? t.h : t.w, u = 1, c = 1, r ? u = 1.8 : c = 1.8, o = jbeeb.Utils.clone(e.Re), o.w = n * u, o.h = n * c, o.fill.alpha = r ? "v" : "h", s = o), s.fill || s.stroke || (s.w = 1, s.h = 1), d = i.x < s.x ? i.x : s.x, f = i.y < s.y ? i.y : s.y, b = i.w > s.w ? i.w : s.w, p = i.h > s.h ? i.h : s.h, this.ff = i.w <= i.h, this.track = new jbeeb.Rube(i), this.track.name = "track", this.thumb = new jbeeb.Rube(s), this.thumb.name = "thumb", t.amSM || (this.track.setMouseEnabled(0), this.thumb.setMouseEnabled(0)), this.addChild(this.track, this.thumb), m = "translate3d(0,0,0)", g = this.thumb.style, g.WebkitTransform = m, g.MozTransform = m, g.msTransform = m, g.OTransform = m, g.transform = m, this.Xe = this.thumb.width, this.Ye = this.thumb.height, this.centerThumb(), t.label && (this.label = new jbeeb.ControlLabel({
                        h: 12,
                        relative: this.track,
                        offsetX: t.labelOffsetX,
                        offsetY: t.labelOffsetY,
                        position: t.labelPos,
                        text: t.label,
                        font: t.font,
                        align: t.align,
                        textColor: t.labelColor || e.defaultLabelColor
                    }), this.addChild(this.label)), t.toggler && (j = t.togglerPos, this.label && t.lablePos == j ? (y = this.label.x, v = this.label.y, this.label.setX(y + 20)) : "tl" == j ? (y = 0, v = -20) : "tr" == j ? (y = this.width + 4, v = -20) : "l" == j ? (y = -20, v = this.height - 8) : "r" == j && (y = this.width + 4, v = this.height - 8), w = new jbeeb.Checkbox({
                        x: y,
                        y: v,
                        w: 16,
                        h: 16
                    }), this.addChild(w), w.addEventListener("change", this.mf, this, !1), this.nf = w), t.icon && (this.icon = new jbeeb.Box({
                        x: t.icon.x,
                        y: t.icon.y,
                        w: t.icon.w,
                        h: t.icon.w,
                        image: {
                            url: t.icon.image,
                            mode: "fit"
                        },
                        center: t.icon.center
                    }), this.addChild(this.icon)), t.print && (t.print.editable && (this.pf = 1), t.print.numeric = 1, w = new jbeeb.TextBox(t.print), this.qf = w, this.addChild(w), x = t.print.pos, k = 0, S = 0, x.match(/t/i) ? S = -w.height : x.match(/b/i) && (S = this.track.height), x.match(/r/i) && (k = this.track.width - w.width), w.setXY(k + (t.printOffsetX || 0), S + (t.printOffsetY || 0)), this.rf = t.printFixed || 1, this.pf && this.qf.addEventListener("enter", this.sf, this), this.valueTextbox = this.qf, this.tf = t.printHandler), this.df = !1, t.amSM || (this.addMEL("mouseDown", this.uf, this), this.addMEL("mouseUp", this.vf, this), this.addMEL("mouseDrag", this.wf, this), this.addMEL("mouseOver", this.xf, this), this.addMEL("mouseOut", this.yf, this)), t.invertVal && (this.Se = t.invertVal), t.logVal && (this.Te = t.logVal), jbeeb.Utils.isNumber(t.value) ? (this.setValue(t.value, !0, "init"), this.zf = t.value) : this.zf = 0, this.Af = 0, this.Af && this.setSmoothMove(1)
                }
            }, t.Af = 0, t.valueTextbox = null, t.qf = null, t.pf = 0, t.sf = function(t, e) {
                var i;
                i = this.tf ? this.tf("set", e) : parseFloat(e), this.setValue(i, !0)
            }, t.Bf = function() {
                var t, e;
                this.qf && (t = this.tf ? this.tf("get", this.value) : parseFloat(this.value), e = t.toFixed(this.rf), this.qf.setText(e))
            }, t.setPrintText = function(t, e) {
                this.qf.setText(t), e || this.setValue(parseFloat(newText), e)
            }, t.xf = function(t, e, i) {
                this.thumb.setState(1)
            }, t.yf = function(t, e, i) {
                this.dragging || this.thumb.setState(0)
            }, t.zf = 0, t.nf = null, t.mf = function(t, e, i) {
                1 == t ? (this.state = 1, this.setValue(i || this.zf, !0)) : (this.state = 0, this.setValue(i || 0, !0)), e || this.dispatchEvent("toggle", this, t, !1, "manual")
            }, t.state = 0, t.setState = function(t, e) {
                this.nf && this.mf(t, !0, e)
            }, t.setLabelText = function(t, e) {
                this.label && (this.label.setText(t), this.label.setTextColor(e))
            }, t.centerThumb = function() {
                var t, e, i = this.track.x,
                    s = this.track.y;
                this.Xe = this.thumb.width, this.Ye = this.thumb.height, t = this.track.x + this.track.width - this.Xe, e = this.track.y + this.track.height - this.Ye, this.ff ? (this.Ue = s, this.Ve = e, this.We = e - s, this.Ze = this.Ye, this.thumb.setX(this.track.x + this.track.width / 2 - this.Xe / 2)) : (this.Ue = i, this.Ve = t, this.We = t - i, this.Ze = this.Xe, this.thumb.setY(this.track.y + this.track.height / 2 - this.Ye / 2))
            }, t.Cf = t.show(), t.show = function() {
                this.Cf(), this.centerThumb()
            }, t.getPageSizePercent = function() {
                return this.$e
            }, t.setPageSizePercent = function(t) {
                if (this.$e = t, 1 > t ? this.Ze = this.We * this.$e : this.$e = 1, this.if) {
                    this.$e < 1 ? this.enable() : this.disable();
                    var e;
                    this.ff ? (e = this.height * this.$e, e < this.width && (e = this.width), this.thumb.setHeight(e), this.centerThumb()) : (e = this.width * this.$e, e < this.height && (e = this.height), this.thumb.setWidth(e), this.centerThumb())
                }
            }, t.setStretchThumb = function(t) {
                this.if = t, this.setPageSizePercent(this.$e)
            }, t.vf = function(t, e, i) {
                this.ef ? this.dispatchEvent("change", this.value, "end") : this.Df(t, e, "clickUp"), this.dragging = !1, this.df = !1, this.ef = !1, this.Af && this.setSmoothMove(1)
            }, t.uf = function(t, e, i) {
                this.gf || this.Df(t, e, "clickDown"), this.Af && this.setSmoothMove(0), this.dispatchEvent("change", this.value, "start"), this._e = e.mouseX, this.af = e.mouseY, this.bf = this.thumb.x, this.cf = this.thumb.y, this.df = !0, this.ef = !1, this.thumb.setState(1)
            }, t.setSmoothMove = function(t) {
                var e, i, s, n;
                this.jf = t, e = "", t ? (i = this.ff ? "top" : "left", s = jbeeb.tickerInterval, e = i + " " + s + "ms linear") : e = "none", n = this.thumb.style, n.mozTransition = n.oTransition = n.msTransition = n.webkitTransition = n.transition = e
            }, t.wf = function(t, e, i) {
                0 == this.df && this.uf(t, e), this.dragging = !0, this.ef = !0;
                var s;
                this.ff ? (s = e.mouseY - this.af, this.Ef(this.cf + s, !1, "move")) : (s = e.mouseX - this._e, this.Ef(this.bf + s, !1, "move")), this.Ff = e.mouseX
            }, t.Ef = function(t, e, i) {
                var s, n, l;
                1 != this.hf && (e = e || !1, i = i || "none", t = t || 0, s = t, s < this.Ue ? (s = this.Ue, n = 0) : s > this.Ve ? (s = this.Ve, n = 1) : n = (s - this.Ue) / this.We, this.ff ? this.thumb.setY(s) : this.thumb.setX(s), this.ff && (n = 1 - n), this.Se && (n = 1 - n), this.Te && (n = this.Gf(n)), this.value = n, this.Bf(), e || this.dispatchEvent("change", n, i), this.nf && (l = this.nf.checked, n > 0 ? l || (this.state = 1, this.nf.setChecked(1, !0), e || this.dispatchEvent("toggle", this, 1, !0, i)) : "move" != i && l && (this.state = 0, this.nf.setChecked(0, !0), e || this.dispatchEvent("toggle", this, 0, !0, i))))
            }, t.Gf = function(t, e) {
                var i = this.Te;
                return Math.pow(t / 1, e ? 1 / i : i)
            }, t.setUsePaging = function(t) {
                this.gf = t || 0
            }, t.Ff = 0, t.Df = function(t, e, i) {
                var s;
                1 == this.gf ? this.ff ? (s = e.mouseY, s = s < this.thumb.y ? this.thumb.y - this.Ze : this.thumb.y + this.Ze) : (s = e.mouseX, s = s < this.thumb.x ? this.thumb.x - this.Ze : this.thumb.x + this.Ze) : s = this.ff ? e.mouseY - this.Ye / 2 : e.mouseX - this.Xe / 2, "clickUp" == i ? (this.Ef(s, !0, "move"), this.Ef(s, !1, "end")) : this.Ef(s, !0, "start")
            }, t.getValue = function() {
                return this.value;
            }, t.setValue = function(t, e) {
                t || (t = 0), 0 > t && (t = 0), t > 1 && (t = 1), this.ff && (t = 1 - t), this.Se && (t = 1 - t), this.Te && (t = this.Gf(t, !0)), this.Ef(this.Ue + t * this.We, e, "none"), this.amSM && (this.ff = this.track.width <= this.track.height, this.ff ? this.track.center("h") : this.track.center("v"))
            }, t.setInverted = function(t, e) {
                this.Se = t, this.setValue(this.value, e)
            }, t.disable = function() {
                this.hf = 1, this.Ef(0, !0, "none"), this.thumb && this.thumb.hide()
            }, t.enable = function() {
                this.hf = 0, this.value = this.value || 0, this.Ef(this.value, !0, "none"), this.thumb && this.thumb.show()
            }, t.nudge = function(t) {
                var e, i = this.Ze / 10 * t;
                e = this.ff ? this.thumb.y + i : this.thumb.x + i, this.Ef(e, !1, "start")
            }, t.Hf = t.stretch, t.stretch = function(t, e, i) {
                var s, n;
                this.Hf(t, e, i), s = this.getPageSizePercent(), n = this.value, this.setPageSizePercent(s), this.Xe = this.thumb.width, this.Ye = this.thumb.height, this.centerThumb(), this.setValue(n, !0)
            }, t.smPrep = function() {
                this.setValue(.25, !0)
            }, t.toString = function() {
                return "[Slider (name=" + this.name + ")]"
            }, t.type = "Slider", jbeeb.Slider = e
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            var t = function(t) {
                    this.init(t)
                },
                e = t.prototype = new jbeeb.Container;
            e._c = 0, e.percent = 0, e.If = null, e.Jf = !1, e.Kf = e.init, e.init = function(t) {
                this.percent = 0, t.reverse && (this.Jf = !0, t.pin = "tr"), this.Kf(t), this._c = 0
            }, e.Lf = function(t) {
                return 0 > t && (t = 0), t > 1 && (t = 1), t
            }, e.update = function(t) {
                var e, i, s;
                0 > t ? (this.percent = -1, 1 === this._c && this.setState(0)) : (0 === this._c && this.setState(1), e = this.Lf(t), this.percent = e, this.Jf ? (s = this.parent.width * (1 - e), i = this.parent.width - s) : (s = this.parent.width * e, i = 0), 0 > s ? s = 0 : s > this.parent.width && (s = this.parent.width), this.setXYWH(i, 0, s, this.parent.height))
            }, e.getValue = function() {
                return this.percent
            }, e.setValue = function(t) {
                this.update(t)
            }, e.setState = function(t) {
                this._c = t, 1 === t ? this.show() : this.hide()
            }, e.Mf = e.stretch, e.stretch = function(t, e, i) {
                this.Mf(t, e, i), this.update(this.percent, -1)
            }, e.toString = function() {
                return "[ScrubberProgress (name=" + this.name + ")]"
            }, e.type = "ScrubberProgress", jbeeb.ScrubberProgress = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            var t = function(t) {
                    this.init(t), this.likeContainer = 1
                },
                e = t.prototype = new jbeeb.Slider;
            e.loader = null, e.progress = null, e.Nf = null, e.Of = e.init, e.thumb = null, e.track = null, e.progress = null, e.loader = null, e.init = function(t) {
                var e, i, s, n, l = {},
                    h = {},
                    a = t.children;
                if (a)
                    for (s = 0; s < a.length; s++) n = a[s], "track" == n.name ? e = jbeeb.Utils.clone(n) : "thumb" == n.name ? i = jbeeb.Utils.clone(n) : "loader" == n.name ? (l = jbeeb.Utils.clone(n), a[s] = null) : "progress" == n.name && (h = jbeeb.Utils.clone(n), a[s] = null);
                t.usePaging = 0, t.smoothMove = 0, this.Of(t), l.reverse = !0, l.x = 0, l.y = 0, l.w = e.w, l.h = e.h, l.name = "loaderControl", this.loader = new jbeeb.ScrubberProgress(l), h.x = 0, h.y = 0, h.w = e.w, h.h = e.h, h.name = "progressControl", this.progress = new jbeeb.ScrubberProgress(h), this.track.addChild(this.progress, this.loader), this.amSM || (this.progress.setMouseEnabled(0), this.loader.setMouseEnabled(0), this.track.setOverflow("hidden")), this.track.likeContainer = 1, this.thumb && this.toFront(this.thumb), this.progress.update(0), this.progress.setState(1), this.loader.update(0), this.loader.setState(0), this.addEventListener("change", this.Pf, this), this.setValue(0, !0)
            }, e.Pf = function(t, e) {
                this.progress.update(t)
            }, e.Qf = e.setValue, e.setValue = function(t, e) {
                this.Qf(t, e), this.progress && this.progress.update(t)
            }, e.Rf = e.onAdded, e.onAdded = function() {
                this.progress.toFront(), this.loader.toFront(), this.Rf()
            }, e.Sf = e.destroy, e.destroy = function() {
                this.progress && this.progress.destroy(), this.progress = null, this.loader && this.loader.destroy(), this.loader = null, this.Nf = null, this.Sf()
            }, e.smPrep = function() {
                this.setValue(.25, !0), this.loader.setState(1), this.loader.update(.75, 1), this.progress.setState(1), this.progress.update(.25, 1)
            }, e.toString = function() {
                return "[Scrubber (name=" + this.name + ")]"
            }, e.type = "Scrubber", jbeeb.Scrubber = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";
            var t = function(t) {
                    this.init(t), this.likeContainer = 1
                },
                e = t.prototype = new jbeeb.Container;
            e.face = null, e.mark = null, e.Tf = null, e.Uf = null, e.Nf = null, e.amSM = 0, e.Vf = e.init, e.init = function(t) {
                var e, i, s, n, l, h, a, r, o, u, c, d = t.w,
                    f = t.h,
                    b = d > f ? d : f;
                if (t.w = b, t.h = b, e = 0, i = 0, l = t.children)
                    for (h = 0; h < l.length; h++) a = l[h], "face" == a.name && (s = jbeeb.Utils.clone(a));
                if (s || (s = {
                        w: b,
                        h: b,
                        stroke: "#000000",
                        fill: "#cccccc",
                        rounded: 1
                    }), l = s.children)
                    for (h = 0; h < l.length; h++) a = l[h], "mark" == a.name && (n = jbeeb.Utils.clone(a));
                s.children = null, this.Vf(t), e = new jbeeb.Container(s), r = e.width + 2 * e.stroke.weight, o = e.height + 2 * e.stroke.weight, n ? (n.x = (r - n.w) / 2, n.y = n.y || 0) : (u = 2, n = {
                    x: (b + u) / 2,
                    y: 0,
                    w: u,
                    h: .2 * b,
                    fill: "#000000"
                }), i = new jbeeb.TextBox(n), this.addChild(e), e.addChild(i), this.amSM = t.amSM, this.amSM || (this.addMEL("mouseDown", this.Wf, this), this.addMEL("mouseDrag", this.Xf, this), e.setMouseEnabled(0), i.setMouseEnabled(0)), this.Tf = e, this.Uf = i, this.face = e, this.mark = i, this.centerFace(), c = t.minMaxDegrees || 60, 1 > c && (c = 1), this.Yf = c / 2
            }, e.Zf = 0, e.Yf = 0, e.$f = 0, e._f = 0, e.ag = 0, e.Wf = function(t, e, i) {
                this._f = e.mouseX, this.ag = e.mouseY, this.bg = this.Tf.rotation, this.$f = this.cg(e)
            }, e.Xf = function(t, e, i) {
                var s, n, l = this.cg(e),
                    h = this.bg + (this.$f - l);
                h > 180 ? h -= 360 : -180 > h && (h += 360), s = this.Yf, n = 0, 180 - s > h && h > -180 + s ? (n = (h + 180 - s) / (360 - 2 * s), this.Tf.setRotation(h)) : (h > 0 && (n = 1), this.Wf(t, e, i)), this.dg(n)
            }, e.cg = function(t) {
                var e = this.Zf;
                return 180 * Math.atan2(e - t.mouseY, e - t.mouseX) / Math.PI * -1
            }, e.dg = function(t, e) {
                this.value = t, e || this.dispatchEvent("change", t)
            }, e.setValue = function(t, e) {
                var i, s;
                this.dg(t, e || !1), i = this.Yf, 0 > t ? t = 0 : t > 1 && (t = 1), s = t * (360 - 2 * i) - (180 - i), this.Tf.setRotation(s)
            }, e.centerFace = function() {
                var t, e, i, s, n, l, h, a, r, o, u;
                this.Uf.center("h"), t = this.width, e = this.height, i = Math.floor(t > e ? t : e), s = 2 * this.Tf.stroke.weight || 0, n = this.Tf.width + s, l = this.Tf.height + s, h = 0, n > i && (i = n, h = 1), l > i && (i = l, h = 1), a = i / 2 - n / 2, r = i / 2 - l / 2, this.Tf.setXY(a, r), this.Tf.center(), this.Uf.center("h"), o = n / 2, u = l / 2, this.Tf.setOrigin(o, u), this.Zf = (i + s) / 2
            }, e.eg = e.stretch, e.stretch = function(t, e, i) {
                this.eg(t, e, i), this.centerFace()
            }, e.toString = function() {
                return "[Knob (name=" + this.name + ")]"
            }, e.type = "Knob", jbeeb.Knob = t
        }(), this.jbeeb = this.jbeeb || {},
        function() {
            "use strict";

            function t(t) {
                var e = document.createElement(t);
                return o.brokenAndroid && (e.canPlayType = function(t) {
                    return /audio/i.test(t) ? null !== t.match(/audio\/(mpeg|mp3|ogg|oga|webm|wav)/gi) ? "maybe" : "" : null !== t.match(/video\/(mp4|m4v|mpeg|mp3|ogg|oga|webm|wav)/gi) ? "maybe" : ""
                }), o.chromium && (e.canPlayType = function(t) {
                    return /audio/i.test(t) ? null !== t.match(/audio\/(ogg|oga|webm|wav)/gi) ? "maybe" : "" : null !== t.match(/video\/(ogg|ogv|oga|webm|wav)/gi) ? "maybe" : ""
                }), e
            }

            function e(t) {
                if (t && t.hasChildNodes)
                    for (var e = t.firstChild; t.hasChildNodes();) t.removeChild(e), e = t.firstChild
            }

            function i(t) {
                return unescape(encodeURIComponent(t))
            }

            function s(t, e) {
                try {
                    if (!t.canPlayType) return !1;
                    if ("" !== t.canPlayType(e).replace(/no/) || "" !== t.canPlayType(e.replace(/m4a/, "mp4")).replace(/no/, "")) return !0;
                    if ("audio/mpeg" == e && "" !== t.canPlayType('audio/mpeg; codecs="mp3"').replace(/no/)) return !0
                } catch (t) {
                    return !1
                }
                return !1
            }

            function n(t, e) {
                switch (e = e || "", t) {
                    case "mp3":
                        return e + "/mpeg";
                    case "aac":
                    case "mpe":
                    case "mpg":
                    case "mpv":
                    case "mp4":
                    case "mpg4":
                    case "m4a":
                    case "m4b":
                    case "m4p":
                    case "m4r":
                    case "m4v":
                    case "mov":
                    case "f4v":
                    case "f4a":
                        return e + "/mp4";
                    case "flv":
                        return e + "/x-flv";
                    case "webm":
                    case "webma":
                    case "webmv":
                        return e + "/webm";
                    case "ogg":
                    case "oga":
                    case "ogv":
                        return e + "/ogg";
                    default:
                        return e + "/" + t
                }
            }

            function l(t, e) {
                var i = jbeeb.Utils.decodeURL(t),
                    s = jbeeb.PathInfo.parse(i),
                    l = ("" + (e || s.ext)).toLowerCase(),
                    h = /(mp4|m4v|ogg|ogv|m3u8|webm|webmv|flv|wmv|mpeg|mov)/gi.test(l) ? "video" : "audio";
                return s.av = h, s.mime = n(l, h), s.kind = e, s.ext = e || s.ext, s
            }
            var h, a, r, o, u, c, d, f, b = function(t) {
                this.init(t)
            };
            jbeeb.MediaController || (b.fg = {}), h = {}, a = jbeeb.mimes.audio;
            for (r in a) h[r] = ["audio", a[r]];
            a = jbeeb.mimes.video;
            for (r in a) h[r] = ["video", a[r]];
            b.gg = h, b.swf = "wimpy.swf", b.swfVersion = 10, b.fallbackExtensions = {
                audio: "ogg,wav",
                video: "webm"
            }, b.disableFlash = !1, b.configure = function(t) {
                var e = "undefined";
                typeof t.swf != e && (b.swf = t.swf), typeof t.swfVersion != e && (b.swfVersion = t.swfVersion), typeof t.fallbackExtensions != e && (b.fallbackExtensions = t.fallbackExtensions), typeof t.disableFlash != e && (b.disableFlash = t.disableFlash)
            }, o = jbeeb.Browser, u = t("video"), c = void 0 !== u.canPlayType || o.brokenAndroid;
            try {
                u.canPlayType("video/mp4")
            } catch (t) {
                c = !1
            }
            d = b.prototype = new jbeeb.Container, d.hg = "1", d.ig = null, d.jg = null, d.meid = null, d.kg = "0", d.lg = "0", d.mg = "100%", d.ng = "100%", d.og = null, d.pg = !1, d.na = !1, d.qg = !1, d.rg = !1, d.JesusIsLord = !0, d.file = "", d.fileInfo = "", d.ready = !1, d.sg = 0, d.tg = 0, d.ug = .99999999, d.vg = 1e-8, d.wg = {}, d.xg = {}, d.yg = 0, d.zg = !1, d.Ag = 1, d.Bg = null, d.amFullscreen = 0, d.Cg = null, d.Dg = null, d.Eg = null, d.Fg = null, d.Gg = null, d.Hg = null, d.Ig = null, d.Jg = !1, d.Kg = !1, d.Lg = null, d.Mg = 0, d.Ng = 0, d.Og = !0, d.Pg = !1, d.Qg = 0, d.Rg = null, d.Sg = !1, d.Tg = null, d.Ug = null, d.Vg = null, d.Wg = null, d.Xg = null, d.Yg = null, d.Zg = 0, d.$g = 1, d.amMuted = 0, d.amPrepped = !1, d.tg = null, d._g = 0, d.ah = d.init, d.init = function(t) {
                var e, i, s, n, l;
                t && (this._g = 0, e = t.onReady, e && (delete t.onReady, this.Lg = e), this.Og = !t.allowOthers, this.ready = !1, this.sg = 0, this.ah(t), o.stockAndroid && (this.Mg = 1, this.Ng = 1), i = jbeeb.getUID(), this.ig = b.fg, this.ig[i] = this, this.meid = i, this.og = "audio", !t.noFullscreen && jbeeb.Fullscreen && (this.Pg = !0), s = jbeeb.Utils.isTrue, n = !!s(b.disableFlash), l = !!s(t.disableFlash), l && (n = !0), this.qg = !!n || c, this.rg = !n && jbeeb.FlashDetect.hasVersion(b.swfVersion), this.pg = !1, this.Dg = this.bh.bind(this), this.Eg = this.ch.bind(this), this.Fg = this.dh.bind(this), this.Gg = this.eh.bind(this), this.Hg = this.fh.bind(this), this.Ig = this.gh.bind(this), this.hh())
            }, d.hh = function() {
                this.Pg && (this.Bg = new jbeeb.Fullscreen(this, this.ih.bind(this), this.na)), this.ready = !0, this.Lg && this.Lg()
            }, d.jh = function(t) {
                this.na = t, this.hh()
            }, d.getMediaControllers = function() {
                return this.ig
            }, d.getMediaElement = function() {
                return this.jg
            }, d.setFullscreen = function() {
                0 === this.amFullscreen ? this.kh() : this.lh()
            }, d.kh = function() {
                0 == this.amFullscreen && (this.amFullscreen = 1, this.mh(), this.Bg.enter(), setTimeout(this.nh.bind(this), 1e3))
            }, d.lh = function() {
                1 == this.amFullscreen && (this.amFullscreen = 0, this.mh(), this.Bg.exit(), setTimeout(this.nh.bind(this), 1e3))
            }, d.ih = function(t) {
                this.amFullscreen = t, this.mh(), setTimeout(this.nh.bind(this), 1e3)
            }, d.nh = function() {
                if (this.na && this.pg) {
                    var t = this.jg;
                    t.js_getVersion || (t = document.getElementById(this.meid), this.jg = t), t.js_FSsetState && t.js_FSsetState(this.amFullscreen)
                }
            }, d.mh = function() {
                var t;
                t = this.Jg || this.amFullscreen ? 1 : 0, this.oh(t)
            }, d.setControls = function(t) {
                var e = jbeeb.Utils.isTrue(t);
                this.oh(e ? 1 : 0), this.Jg = e
            }, d.oh = function(t) {
                var e = this.jg,
                    i = this.na,
                    s = this.pg;
                t ? i && s ? e.js_setControls && e.js_setControls(t) : e.setAttribute("controls", "true") : (i && s && e.js_setControls && e.js_setControls(0), setTimeout(this.ph.bind(this), 1e3))
            }, d.ph = function() {
                var t = this.jg;
                this.na && this.pg ? t.js_setControls && t.js_setControls(0) : t.removeAttribute && t.removeAttribute("controls")
            }, d.qh = function() {
                var t, i, s, n;
                if (this.Tg && (clearTimeout(this.Tg), this.Tg = null), this.rh && (this.rh = null), this.Vg && (clearInterval(this.Vg), this.Vg = null), this.Wg && (this.Wg = null), t = this.jg, t && t) {
                    if (i = t.nodeName, i && "object" == i.toLowerCase()) {
                        if (o.ie) {
                            t.style.display = "none";
                            for (s in t) "function" == typeof t[s] && (t[s] = null)
                        }
                    } else n = b.unbindEvent, n(t, "timeupdate", this.Dg), n(t, "ended", this.Eg), n(t, "pause", this.Fg), n(t, "play", this.Gg), n(t, "loadstart", this.Ig);
                    if (t.parentNode) try {
                        t.parentNode.removeChild(t)
                    } catch (t) {}
                }
                this.jg = null, this.jg = {}, e(this.element)
            }, d.sh = function(e) {
                var i, s;
                return this.qh(), i = t(e), i.setAttribute("id", this.meid), i.setAttribute("webkit-playsinline", ""), "audio" == e ? (i.setAttribute("width", "1"), i.setAttribute("height", "1")) : (i.setAttribute("width", "100%"), i.setAttribute("height", "100%")), i.style.cssText = "zoom:1;position:absolute;top:" + this.lg + "px;left:" + this.kg + "px;width:" + this.mg + ";height:" + this.ng + ";", this.element.appendChild(i), s = b.bindEvent, s(i, "timeupdate", this.Dg), s(i, "ended", this.Eg), s(i, "pause", this.Fg), s(i, "play", this.Gg), s(i, "loadstart", this.Ig), i
            }, b.bindEvent = function(t, e, i, s) {
                return t && (t.attachEvent ? t.attachEvent("on" + e, i) : t.addEventListener && t.addEventListener(e, i, !!s)), i
            }, b.unbindEvent = function(t, e, i, s) {
                return t && (t.attachEvent ? t.detachEvent("on" + e, i) : t.addEventListener && t.removeEventListener(e, i, !!s)), i
            }, d.th = function() {
                var t, i, l, h, a, r, o, u, c, d, f, p, m, g = this.fileInfo,
                    y = this.jg,
                    v = this.og,
                    j = g.av,
                    w = this.Ng ? "video" : j;
                if (y && y.pause ? (y.pause(), y.currentTime && (y.currentTime = 0)) : y = null, y && w == v || (y = this.sh(w), this.Bg && this.Bg.setFullscreenObject(this, y)), this.og = w, s(y, g.mime)) t = g.url, i = g.mime, l = g.ext;
                else
                    for (h = jbeeb.Utils.trim, a = b.fallbackExtensions[j].split(","), r = a.length, o = g.parenturl, u = g.basename ? g.basename : "", c = /\?/.test(g.url), d = g.url.split(".").pop(), !d || d.length > 4 || c ? (o = g.url, u = c ? "&ext=" : "#") : u += ".", f = 0; r > f; f++)
                        if (p = h(a[f]), i = n(p, j), s(y, i)) {
                            t = o + u + p, i = i, l = p;
                            break
                        }
                t || (t = g.url), t = jbeeb.Utils.absoluteURL(t), e(y), y.src = t, y.autoplay = !0, m = document.createElement("source"), m.type = i, m.src = t, y.appendChild(m), this.jg = y, this.Qg && y && (y.load && (y.load(), y.play()), this.uh())
            }, d.vh = function() {
                this.Qg && this.jg && (this.jg.load && (this.jg.load(), this.jg.play()), this.uh())
            }, d.uh = function() {
                this.zg = !0, this.setVolume(this.Ag), this.wh(1), this.mh()
            }, d.xh = function() {
                this.pg ? this.yh() : (this.Rg = 1, this.qh(), this.jg = null, this.rh || (this.rh = this.Ug.bind(this)), this.Tg = setTimeout(this.rh, 3e3), this.jg = this.zh(), this.Bg && this.Bg.setFullscreenObject(this, this.jg))
            }, d.zh = function() {
                return new jbeeb.FlashElement({
                    element: this.element,
                    id: this.meid,
                    w: this.mg,
                    h: this.ng,
                    swf: b.swf,
                    scale: "noscale",
                    salign: "lt",
                    wmode: "opaque",
                    bgcolor: this.fill.color,
                    flashvars: {
                        meid: this.meid,
                        s: 0,
                        a: this.hg,
                        baseClass: "jbeeb"
                    }
                })
            }, d.wh = function(t) {
                this.rg && (this.Vg && (clearInterval(this.Vg), this.Vg = null), t && this.na && (this.Wg || (this.Wg = this.Ah.bind(this)), this.Vg = setInterval(this.Wg, 500)))
            }, d.Ug = function() {
                clearTimeout(this.Tg);
                var t = !1;
                this.jg ? this.jg.js_getVersion || (t = !0) : t = !0, t && (this._g = 1e3, this.Sg = !0, this.Bh())
            }, d.Ch = function() {
                if (clearTimeout(this.Yg), !this.Sg) {
                    var t = document.getElementById(this.meid);
                    t && t.js_getVersion ? (this.jg = t, this.pg = !0, this.yh()) : this.Bh()
                }
            }, d.Dh = function() {
                clearTimeout(this.Yg), clearTimeout(this.Tg)
            }, d.yh = function() {
                var t, e = this.fileInfo;
                e && !this.Sg && (this.jg.js_getVersion ? (this.Dh(), t = e.url, o.moz && (t = i(t)), t = jbeeb.Utils.absoluteURL(t), this.jg.js_load(t, e.kind), this.uh()) : (this.pg = !1, this.Xg || (this.Xg = this.Ch.bind(this)), this.Yg = setTimeout(this.Xg, 500)))
            }, d.reset = function(t) {
                this.pause(), this.rewind(), this.disableOthers(), this.Zg = 0, this.fileInfo = null, this.file = null, this.yg = 100, this.zg = !1, this.amMuted ? this.setVolume(this.$g || 1) : this.setVolume(this.Ag), this.wh(0), t && this.qh()
            }, d.play = function(t, e) {
                this.Zg = 0, this.Eh(0), this.disableOthers();
                var i = !1;
                t && t != this.file && (this.loadAndPlay(t, e), i = !0), i || (this.na ? this.pg && this.jg.js_play && this.jg.js_play() : this.jg.play()), this.wh(1)
            }, d.stop = function(t) {
                this.reset(t)
            }, d.pause = function(t) {
                this.jg && (this.na ? this.pg && this.jg.js_pause && this.jg.js_pause() : this.jg.pause()), t ? this.Zg = 1 : this.wh(0)
            }, d.Fh = function() {
                1 === this.sg && (this.sg = 0, this.pause(), this.dispatchEvent("disable"))
            }, d.Gh = function(t) {
                0 === this.sg && (this.sg = 1, t || this.dispatchEvent("enable"))
            }, d.disableOthers = function() {
                var t, e, i, s;
                if (this.Og) {
                    t = this.ig, e = this.meid;
                    for (i in t) s = t[i], i != e && s.Fh();
                    this.Gh()
                }
            }, d.loadAndPlay = function(t, e) {
                this.wh(0), e = e || null, this.dispatchEvent("playpause", 1), this.disableOthers(), this.Qg = !0, this.Hh(t, e), this.fh(null)
            }, d.prepare = function(t, e) {
                this.amPrepped || this.Mg && t && (this.wh(0), this.Qg = !1, this.Hh(t, e)), this.amPrepped = !0
            }, d.Ih = function(t) {
                var e = t.av,
                    i = t.ext,
                    s = 0,
                    n = !!jbeeb.Utils.isTrue(b.disableFlash);
                return o && !n && (s = "audio" != e || this.Ng ? !this.Jh(t) : o.win && o.ie && o.version < 10 || o.opera ? this.rg && f.indexOf(i) > -1 : o.chrome || o.safari || o.ios || o.adroid || o.chromium ? 0 : this.rg && f.indexOf(i) > -1 && !this.Jh(t)), s
            }, d.Hh = function(t, e) {
                var i, s, n, h;
                e = e || null, i = l(t, e), this.fileInfo = i, this.file = t, s = this.mg, n = "audio" == i.av ? "1px" : "100%", this.mg = this.ng = n, this.jg && s != n && (h = this.jg.style, h.width = n, h.height = n), this.yg = 100, this.zg = !1, this.Zg = 0, this.na = this.Ih(i), this.na ? (this.xh(), this.wh(1)) : this.th(), this.fh(null)
            }, d.amHtml = function() {
                return !this.na
            }, d.Jh = function(t) {
                return this.qg && s(u, t.mime) ? !("video" == t.av && o.ie && o.version < 11 && /mp4/gi.test(t.mime)) : !this.rg || f.indexOf(t.ext) <= -1
            }, f = ["mp3", "m4a", "aac", "mp4", "m4v", "m4p", "m4p", "mpg4", "mpeg", "mpg", "mpe", "mpv", "flv", "f4v", "f4p", "webm", "3gp", "3gp", "3g2"], b.getMediaInfo = l, d.mute = function(t) {
                var e = this.jg,
                    i = 0;
                1 == t ? (this.$g = this.Ag || 1, i = 0, this.na || (e && (e.volume = i), this.Ag = i), this.amMuted = 1) : (i = this.$g || 1, this.amMuted = 0), this.na ? this.pg && (e && e.js_setMuteState(t), this.setVolume(i)) : (e && (e.volume = i), this.Ag = i, o.ios && (1 == t ? this.pause() : this.play()))
            }, d.setVolume = function(t) {
                this.Ag = t;
                var e = this.jg;
                e && (this.na ? this.pg && e.js_setVolume && e.js_setVolume(t) : e.volume = t)
            }, d.niceTime = function(t) {
                function e(t, e) {
                    return 1 > t ? e ? "00" : "0" : 10 > t ? (e ? "0" : "") + t : "" + t
                }
                var i, s, n, l;
                return t ? (i = new Date(1e3 * t), s = i.getUTCHours(), n = i.getUTCMinutes(), l = [], s > 0 ? (l.push(e(s)), l.push(e(n, !0))) : l.push(e(n)), l.push(e(i.getUTCSeconds(), !0)), l.join(":")) : "0:00"
            }, d.rewind = function() {
                this.na && this.pg && this.jg.js_rewindPlayerState && this.jg.js_rewindPlayerState(), this.setPlayheadPercent(0)
            }, d.Eh = function(t) {
                this.tg = t, this.na && this.pg && this.jg.js_setScrubState && this.jg.js_setScrubState(t)
            }, d.setPlayheadPercent = function(t) {
                var e, i, s;
                this.tg || this.Eh(1), t > this.ug && (t = this.ug), t < this.vg && (t = this.vg), e = t, 0 > t ? t = 0 : t > 1 && (t = 1), this.jg && (this.na ? this.pg && this.jg.js_setPlayheadPercent && this.jg.js_setPlayheadPercent(t) : (i = this.jg.duration, i && (i === 1 / 0 && (i = 0), s = i * t, s > 0 ? i > s || (s = i) : s = 0, this.jg.currentTime = s))), this.Eh(0)
            }, d.getPlayerState = function() {
                return this.wg || {}
            }, d.setPlayerState = function(t) {
                this.wg = t || {}
            }, d.Kh = function() {
                var t, e, i = 0,
                    s = 0,
                    n = 0,
                    l = .02,
                    h = "00:00",
                    a = 0,
                    r = "00:00",
                    o = 0,
                    u = "00:00",
                    c = !1,
                    d = this.jg;
                return d.readyState > 0 && (i = 1, d.paused || (s = 1), t = void 0 !== d.duration ? parseFloat(d.duration) : .02, e = void 0 !== d.currentTime ? parseFloat(d.currentTime) : 0, NaN != t && t != 1 / 0 || (t = e), e > t && (t = e + 1), t = Math.floor(100 * t) / 100, e = Math.ceil(100 * e) / 100, .01 > t && (t = .01), n = e / t, t > 2 && e > 2 && (1 > n || (clearTimeout(this.Lh), this.Lh = setTimeout(this.Eg, 1e3))), l = t, h = this.niceTime(t || 0), a = t - e, r = this.niceTime(a || 0), o = e, u = this.niceTime(e || 0)), 4 != d.readyState && (c = !0), {
                    init: i,
                    status: s,
                    percent: n,
                    duration: l,
                    duration_nice: h,
                    remaining: a,
                    remaining_nice: r,
                    current: o,
                    current_nice: u,
                    buffering: c
                }
            }, d.Lh = null, d.getLoadState = function() {
                return this.xg || {
                    loaded: 0,
                    percent: 0,
                    total: 1,
                    status: 0
                }
            }, d.setLoadState = function(t) {
                this.xg = t || {}
            }, d.Mh = function(t) {
                var e = 0,
                    i = 0,
                    s = 1,
                    n = this.jg;
                return parseInt(n.readyState) < 0 || (300 == this.yg ? (i = 1, s = 1, e = 1) : (n && n.buffered && n.buffered.length > 0 && n.buffered.end && n.duration ? (s = parseFloat(n.duration), e = parseFloat(n.buffered.end(n.buffered.length - 1))) : n && void 0 != n.bytesTotal && n.bytesTotal > 0 && void 0 != n.bufferedBytes && (s = parseFloat(n.bytesTotal), e = parseFloat(n.bufferedBytes)), i = (e || 0) / (s || 1), s > 1 && e > 1 && i > .9 && (i = 1, this.Nh()), 0 > i ? i = 0 : i > 1 && (i = 1))), {
                    total: s,
                    percent: i,
                    loaded: e
                }
            }, d.Nh = function(t) {
                this.yg = 300, this.Oh(t)
            }, d.bh = function(t) {
                if (!this.Zg) {
                    var e = this.Kh();
                    this.wg = e, this.tg || this.dispatchEvent("update", e)
                }
                this.yg < 300 && this.Oh()
            }, d.Oh = function(t) {
                var e = this.Mh(t);
                this.Ph(e), this.xg = e, this.dispatchEvent("loading", e)
            }, d.Ah = function() {
                var t, e, i;
                this.Zg || this.pg && this.jg && this.jg.js_getStatus && (t = this.jg.js_getStatus(), e = t.playerState, this.wg = e, this.dispatchEvent("update", e), this.yg < 300 && (i = t.loadState, this.Ph(i), this.xg = i, this.dispatchEvent("loading", i)))
            }, d.Ph = function(t) {
                t.status = this.yg, 200 == this.yg && (t.percent < .999 || (this.yg = 300)), 100 == this.yg && t.percent > 0 && t.total > 1 && (this.yg = 200), this.wg.thinking = this.yg < 300 ? 1 : 0
            }, d.fh = function(t) {
                clearTimeout(this.Lh), this.dispatchEvent("launch", this.file)
            }, d.gh = function(t) {
                clearTimeout(this.Lh), this.dispatchEvent("loadStart", this.file)
            }, d.eh = function(t) {
                clearTimeout(this.Lh), this.dispatchEvent("start", this.file)
            }, d.dh = function(t) {
                clearTimeout(this.Lh), this.dispatchEvent("stop", this.file)
            }, d.ch = function(t) {
                clearTimeout(this.Lh), this.file && (this.pause(), this.rewind(), this.dispatchEvent("done", this.file))
            }, d.SWFisReady = function(t) {
                this.pg = !0, this.Rg && this.yh()
            }, d.Bh = function() {
                var t, e, i;
                this.wh(0), this.Bg && this.Bg.setFullscreenObject(null), this.qh(), this.jg = null, this.pg = !1, t = jbeeb.Utils.clone(this.fileInfo), e = this.file, this.reset(), this.fileInfo = t, this.file = e, this.Qg = !0, i = this._g++, i > 2 ? (b.disableFlash = !0, this.na = !1, this.rg = !1, this.th()) : this.xh(), this.mh()
            }, d.SWFexitFS = function() {
                this.lh()
            }, d.SWFenterFS = function() {
                this.kh()
            }, d.SWFvolume = function(t) {
                this.Ag = t, this.dispatchEvent("extVolumeChange", t)
            }, d.Qh = d.destroy, d.destroy = function() {
                this.removeAllEventListeners(), this.Bg.destroy(), this.Bg = null, this.jg && this.qh(), this.ig = b.fg, this.ig[this.meid] = null, delete this.ig[this.meid], this.jg = null, this.Qh()
            }, d.Rh = d.setX, d.setX = function(t) {
                this.amFullscreen ? this.x = t : this.Rh(t)
            }, d.Sh = d.setY, d.setY = function(t) {
                this.amFullscreen ? this.y = t : this.Sh(t)
            }, d.Th = d.setXY, d.setXY = function(t, e) {
                this.amFullscreen ? (this.x = t, this.y = e) : this.Th(t, e)
            }, d.Uh = d.setXYWH, d.setXYWH = function(t, e, i, s) {
                this.amFullscreen ? (this.x = t, this.y = e, this.width = i, this.height = s) : this.Uh(t, e, i, s)
            }, d.Vh = d.setSize, d.setSize = function(t, e) {
                this.amFullscreen ? (this.width = t, this.height = e) : this.Vh(t, e)
            }, d.Wh = d.setWidth, d.setWidth = function(t) {
                this.amFullscreen ? this.width = t : this.Wh(t)
            }, d.Xh = d.setHeight, d.setHeight = function(t) {
                this.amFullscreen ? this.height = t : this.Xh(t)
            }, d.toString = function() {
                return "[MediaController (name=" + this.name + ")]"
            }, d.type = "MediaController", jbeeb.MediaController || (jbeeb.SWFcall = function(t, e, i) {
                var s = jbeeb.MediaController.fg[t];
                "ended" == e ? s.ch(i) : "pause" == e ? s.dh(i) : "play" == e ? s.eh(i) : "loadstart" == e ? s.gh(i) : "SWFexitFS" != e && "SWFisReady" != e && "SWFenterFS" != e && "SWFvolume" != e || s[e](i)
            }, jbeeb.MediaController = b)
        }(), this.USERCONF_START = "UC_START", this.wimpyConfigs = this.wimpyConfigs || {}, this.USERCONF_END = "UC_END", this.jbeeb = this.jbeeb || {}, this.wimpy = this.wimpy || {}, this.wimpy.version = "7.7.107",
        function() {
            "use strict";
            var t, e, i, s, n, l, h, a, r, o, u, c;
            if (wimpy.Yh = {
                    disableFlash: !1,
                    defaultPlayer: {
                        target: null,
                        name: null,
                        skin: null,
                        media: null,
                        startUpText: "Click to Play",
                        coverArt: "coverart.jpg",
                        coverArtFit: 1,
                        width: null,
                        height: null,
                        autoPlay: 0,
                        random: 0,
                        sort: null,
                        sortReverse: 0,
                        loop: 0,
                        volume: 1,
                        infoSpeed: 10,
                        infoScroll: 2,
                        limitPlayTime: null,
                        startOnTrack: null,
                        autoAdvance: 1,
                        downloadEnable: 0,
                        downloadWindow: null,
                        linkEnable: 0,
                        linkWindow: null,
                        inline: 0,
                        timeFormat: "1 / 3",
                        infoFormat: "1 - 2 - 3",
                        getid3: 0,
                        getid3image: 0,
                        plugPlaylist: null,
                        plugEvery: 5,
                        plugFirst: 0,
                        plugDisables: 0,
                        disableControls: null,
                        numberTracks: 0,
                        glyphFile: "f",
                        glyphList: "F",
                        glyphDownload: "D",
                        glyphLink: "i",
                        downloadTip: "download",
                        linkTip: "link",
                        disableFlash: 0,
                        responsive: 0,
                        size: 0
                    },
                    server: "wimpy.php",
                    mainPlayControls: "play,stop,pause,rewind,next,playlist,scrubber,coverPlayPause",
                    glyphFamily: "WimpyPlayerGlyphs",
                    glyphCssFile: "wimpy.css",
                    flashFallbackFile: "wimpy.swf",
                    fallbackExtensions: {
                        audio: "mp3,ogg,wav",
                        video: "mp4,webm"
                    },
                    fallbackSkin: '{"version":"1.0","title":"My Skin","created":1396636820012,"x":119,"y":79,"width":300,"height":160,"images":{},"bkgdColor":"#dbdbdb","layout":[{"x":0,"y":0,"w":300,"h":160,"z":0,"type":"Box","name":"Box_2488","stroke":{"weight":1,"color":"#b8b8b8","alpha":1,"style":"solid"},"rounded":0.04595},{"x":126,"y":31,"w":157.363,"h":4.9277,"z":1,"type":"Scrubber","name":"cmp_scrubber","children":[{"x":0,"y":0,"w":157.363,"h":4.9277,"z":1,"type":"Rube","name":"track","fill":[{"color":"#9E9B97","alpha":1},{"color":"#9E9B97","alpha":1}],"stroke":[{"weight":1,"color":"#000000","alpha":0.48625,"style":"solid"},{"weight":1,"color":"#000000","alpha":0.48625,"style":"solid"}],"rounded":1,"text":"","font":"Arial, Helvetica, sans-serif","align":"center","textScale":0.7,"textFit":"wh","bevel":[null,null]},{"w":1,"h":1,"type":"Rube","name":"thumb"},{"x":118.022,"y":0,"w":39.341,"h":4.9277,"z":2,"type":"ScrubberProgress","name":"loader","fill":{"color":"#121212","alpha":0.39456}},{"x":0,"y":0,"w":39.341,"h":4.9277,"z":1,"type":"ScrubberProgress","name":"progress","fill":{"color":"#f0f0f0","alpha":0.74986}}]},{"x":87,"y":12,"w":22,"h":25,"z":2,"type":"Rube","name":"cmp_next","fill":[{"color":"#e5e5e5","alpha":1},{"color":"#bebebe","alpha":1}],"stroke":[{"weight":1,"color":"#b2b2b2","alpha":1,"style":"solid"},{"weight":1,"color":"#666666","alpha":1}],"rounded":0.17724,"text":">","font":"Arial, Helvetica, sans-serif","align":"center","textColor":[{"color":"#555555","alpha":1},{"color":"#ffffff","alpha":1}],"baselineShift":-0.03487,"textScale":0.54533,"textFit":"wh","bevel":[null,null]},{"x":13,"y":12,"w":22,"h":25,"z":3,"type":"Rube","name":"cmp_rewind","fill":[{"color":"#e5e5e5","alpha":1},{"color":"#bebebe","alpha":1}],"stroke":[{"weight":1,"color":"#b2b2b2","alpha":1,"style":"solid"},{"weight":1,"color":"#666666","alpha":1}],"rounded":0.17724,"text":"<","font":"Arial, Helvetica, sans-serif","align":"center","textColor":[{"color":"#555555","alpha":1},{"color":"#ffffff","alpha":1}],"baselineShift":-0.04881,"textScale":0.54533,"textFit":"wh","bevel":[null,null]},{"x":62,"y":12,"w":22,"h":25,"z":4,"type":"Rube","name":"cmp_play","fill":[{"color":"#e5e5e5","alpha":1},{"color":"#bebebe","alpha":1}],"stroke":[{"weight":1,"color":"#b2b2b2","alpha":1,"style":"solid"},{"weight":1,"color":"#666666","alpha":1}],"rounded":0.17724,"text":">","font":"Arial, Helvetica, sans-serif","align":"center","textColor":[{"color":"#555555","alpha":1},{"color":"#ffffff","alpha":1}],"baselineShift":-0.06276,"textScale":1,"textFit":"wh","bevel":[null,null]},{"x":12,"y":47,"w":100,"h":100,"z":5,"type":"Container","name":"cmp_cover","fill":{"color":"#000000","alpha":1}},{"x":125,"y":13,"w":159,"h":12,"z":6,"type":"TextScroller","name":"cmp_info","text":"Click Item to Play *** Click Item to Play","font":"Arial, Helvetica, sans-serif","align":"left","textColor":{"color":"#000000","alpha":1},"textScale":1},{"x":125,"y":52,"w":141,"h":94,"z":7,"type":"List","name":"cmp_playlist","item":{"x":0,"y":0,"w":141,"h":16.8,"z":0,"type":"ListItem","name":"listItem","text":"","font":"Arial, Helvetica, sans-serif","align":"center","textColor":[{"color":"#000000","alpha":1},{"color":"#FFFFFF","alpha":1}],"textScale":0.7,"textFit":"wh","fill":[{"color":null,"alpha":null},{"color":"#266FC2","alpha":1}],"stroke":[{"weight":1,"color":null,"alpha":null},{"weight":1,"color":null,"alpha":null}],"spacing":2}},{"x":276,"y":73,"w":9,"h":72,"z":8,"type":"Slider","name":"cmp_plScroll","fill":{"color":"#e0e0e0","alpha":1},"stroke":{"weight":1,"color":"#8d8d8d","alpha":0.48625,"style":"solid"},"rounded":1,"children":[{"x":0,"y":0,"w":9,"h":72,"z":0,"type":"Rube","name":"track","fill":[{"color":"#e0e0e0","alpha":1},{"color":"#e0e0e0","alpha":1}],"stroke":[{"weight":1,"color":"#8d8d8d","alpha":0.48625,"style":"solid"},{"weight":1,"color":"#8d8d8d","alpha":0.48625,"style":"solid"}],"rounded":1,"text":"","font":"Arial, Helvetica, sans-serif","align":"center","textScale":0.7,"textFit":"wh","bevel":[null,null]},{"x":-0.745,"y":55.301,"w":10.49,"h":16.699,"z":1,"type":"Rube","name":"thumb","fill":[{"color":"#a8a8a8","alpha":1},{"color":"#9E9B97","alpha":1}],"rounded":1,"text":"","font":"Arial, Helvetica, sans-serif","align":"center","textScale":0.7,"textFit":"wh","bevel":[null,null]}]},{"x":274,"y":49,"w":14,"h":17,"z":9,"type":"Rube","name":"cmp_plBack","fill":[{"color":"#e5e5e5","alpha":1},{"color":"#bebebe","alpha":1}],"stroke":[{"weight":1,"color":"#b2b2b2","alpha":1,"style":"solid"},{"weight":1,"color":"#666666","alpha":1}],"rounded":0.17724,"text":"<","font":"Arial, Helvetica, sans-serif","align":"center","bold":"bold","textColor":[{"color":"#555555","alpha":1},{"color":"#ffffff","alpha":1}],"baselineShift":-0.04881,"textScale":0.81032,"textFit":"wh","bevel":[null,null]},{"x":37,"y":12,"w":22,"h":25,"z":10,"type":"Rube","name":"cmp_pause","fill":[{"color":"#e5e5e5","alpha":1},{"color":"#bebebe","alpha":1}],"stroke":[{"weight":1,"color":"#b2b2b2","alpha":1,"style":"solid"},{"weight":1,"color":"#666666","alpha":1}],"rounded":0.17724,"text":"l l","font":"Arial, Helvetica, sans-serif","align":"center","bold":"bold","textColor":[{"color":"#555555","alpha":1},{"color":"#ffffff","alpha":1}],"baselineShift":-0.06276,"textScale":0.64993,"textFit":"wh","bevel":[null,null]}]}',
                    assetsPath: null,
                    maxGoogleFeedItems: -1
                }, wimpy.defaultPlayer = wimpy.Yh.defaultPlayer, wimpy.addEventListener = null, wimpy.removeEventListener = null, wimpy.removeAllEventListeners = null, wimpy.dispatchEvent = null, wimpy.hasEventListener = null, jbeeb.EventDispatcher.initialize(wimpy), wimpy.inited, wimpy.Zh = null, wimpy.$h = null, wimpy._h = function(t) {
                    "ok" == t ? wimpy.serverOK = 1 : wimpy.serverOK = 0
                }, wimpy.init = function() {
                    var i = wimpy.ai.bind(wimpy);
                    wimpy.glyphLoader && 0 != e ? wimpy.glyphLoader.onReady(i) : wimpy.glyphLoader = new jbeeb.FontFaceLoader({
                        family: wimpy.glyphFamily,
                        cssUrl: u + wimpy.glyphCssFile,
                        onReady: i
                    }), t = 1
                }, t = 0, e = 0, i = 0, s = 0, wimpy.ai = function() {
                    e = 1, wimpyButton = new wimpy.WButton, wimpy.Zh = new wimpy.PlayerQuery(wimpy.bi.bind(wimpy)), wimpy.Zh.init()
                }, wimpy.bi = function() {
                    i = 1, wimpy.N()
                }, wimpy.N = function() {
                    t && e && i && s && (wimpy.B.ready || (wimpy.dispatchEvent("init"), wimpy.B.fire()))
                }, wimpy.cReady = function() {
                    s = 1, wimpy.N()
                }, wimpy.parseAttributes = function(t) {
                    return wimpy.PlayerQuery.parseAttributes(t)
                }, wimpy.getPlayer = function(t) {
                    return wimpy.playerList[t] || null
                }, wimpy.getPlayerList = function() {
                    var t, e = [];
                    for (t in wimpy.playerList) e.push(wimpy.playerList[t]);
                    return e
                }, wimpy.getPlayerByName = function(t) {
                    var e, i;
                    for (e in wimpy.playerList)
                        if (i = wimpy.playerList[e], i.name && i.name.toLowerCase() == t.toLowerCase()) return i
                }, wimpy.playersReady = function() {
                    wimpy.dispatchEvent("ready"), wimpy.ci.fire()
                }, !wimpy.inited) {
                wimpy.inited = 1, n = new jbeeb.ReadyBoss, wimpy.B = n, wimpy.onInit = wimpy.B.add.bind(n), l = new jbeeb.ReadyBoss, wimpy.ci = l, wimpy.onReady = wimpy.ci.add.bind(l), wimpy.playerList = {}, h = wimpy.Yh, a = wimpyConfigs;
                for (r in h) o = a[r], o || (o = h[r]), "object" == typeof o && (o = jbeeb.Utils.clone(o)), wimpy[r] = o;
                u = wimpy.assetsPath ? wimpy.assetsPath : wimpy.development ? jbeeb.PathInfo.pagePath : jbeeb.PathInfo.scriptPath, c = wimpy.defaultPlayer.skin, c || (wimpy.defaultPlayer.skin = u + "wimpy.skins/_defaultskin.tsv"), c = wimpy.defaultPlayer.coverArt || "coverart.jpg", "coverart" == c.substr(0, 8) && (c = u + c), wimpy.defaultPlayer.coverArt = c, wimpy.server = "wimpy.php" == wimpy.server ? u + wimpy.server : wimpy.server, new jbeeb.TextLoader(wimpy.server + "?o", wimpy._h.bind(wimpy)), jbeeb.MediaController && jbeeb.MediaController.configure({
                    swf: u + wimpy.flashFallbackFile,
                    swfVersion: 10,
                    fallbackExtensions: wimpy.fallbackExtensions,
                    disableFlash: wimpy.disableFlash,
                    assetsPath: u
                }), jbeeb.assetsBasePath = u, jbeeb.glyphFamily = wimpy.glyphFamily, jbeeb.glyphCssFile = wimpy.glyphCssFile, jbeeb.flashFallbackFile = wimpy.flashFallbackFile, jbeeb.fallbackExtensions = wimpy.fallbackExtensions, jbeeb.register(wimpy)
            }
        }(),
        function() {
            function t(t) {
                return unescape(encodeURIComponent(t))
            }

            function e(t) {
                for (var e = {}, i = !0, s = t, l = 0; i;) s == t && l > 1 ? i = !1 : s == n.length ? s = -1 : (e[n[s]] = n[l], l++), s++;
                return e
            }

            function i(e) {
                return t(e.toLowerCase().replace(/[^A-Za-z0-9\.\-]/g, ""))
            }
            var s, n, l, h, a, r = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/".split(""),
                o = [];
            for (s = 0; s < r.length; s++) o[r[s]] = s;
            for (n = r.slice(0, 62).concat(" -./~^?#&:<>=_%()".split("")), l = {}, h = 0; h < n.length; h++) l[n[h]] = e(h);
            a = function(e, s) {
                function n(t) {
                    d = t, f = 0
                }

                function h() {
                    var t, e, i;
                    if (!d) return p;
                    for (t = p, e = !0; e;) {
                        if (f >= d.length) {
                            e = !1;
                            break
                        }
                        if (i = d.charAt(f), f++, o[i]) {
                            t = o[i], e = !1;
                            break
                        }
                        if ("A" == i) {
                            t = 0, e = !1;
                            break
                        }
                    }
                    return t
                }

                function a(t) {
                    return t = t.toString(16), 1 == t.length && (t = "0" + t), t = "%" + t, unescape(t)
                }

                function r(t) {
                    var e, i, s, l;
                    for (n(t), e = "", i = Array(4), s = !1; !s && (i[0] = h()) != p && (i[1] = h()) != p;) i[2] = h(), i[3] = h(), e += a(i[0] << 2 & 255 | i[1] >> 4), i[2] != p ? (e += a(i[1] << 4 & 255 | i[2] >> 2), i[3] != p ? e += a(i[2] << 6 & 255 | i[3]) : s = !0) : s = !0;
                    l = "";
                    try {
                        l = decodeURIComponent(e)
                    } catch (t) {
                        l = unescape(e)
                    }
                    return c(u(l, !0))
                }

                function u(t, e) {
                    var i, s, n = t,
                        l = n.substr(0, 1),
                        h = Math.ceil(l / 2),
                        a = n.substr(1, n.length),
                        r = "";
                    for (i = 0; i < a.length; i++) s = e && i % 3 ? +a.charCodeAt(i) - h : +a.charCodeAt(i) - l, r += String.fromCharCode(s);
                    return unpackSee = r, r
                }

                function c(t) {
                    var e, i, s, n, h, a = t.split("|"),
                        r = a[0].split("");
                    if (!a[1]) return "";
                    for (e = a[1].split(""), i = "", s = 0, n = 0; n < e.length; n++) h = r[s], l[h] && (i += l[h][e[n]]), s++, s > r.length - 1 && (s = 0);
                    return i
                }
                var d, f, b, p = -1;
                return (e = t(e)) ? (d = null, f = 0, b = r(e), s && (b += i(s)),
                    b) : e
            }, wimpy.di = a
        }(),
        function() {
            "use strict";

            function t() {
                o ? (l = jbeeb[e([8, 9.7, 11.6, 10.4, 7.3, 11, 10.2, 11.1])][e([11.2, 9.7, 11.4, 11.5, 10.1])](o), h = (l[e([11.2, 9.7, 11.4, 10.1, 11, 11.6, 11.7, 11.4, 10.8])] || "") + e([11.9, 10.5, 10.9, 11.2, 12.1, 9.5, 11.4, 10.1, 10.3, 4.6, 11.6, 12, 11.6]), a = new(jbeeb[e([8.4, 10.1, 12, 11.6, 7.6, 11.1, 9.7, 10, 10.1, 11.4])])(h, i)) : wimpy.ei = 0
            }

            function e(t) {
                var e, i = "";
                for (e = 0; e < t.length; e++) i += String.fromCharCode(parseInt(10 * t[e]));
                return i
            }

            function i(t) {
                var i, h, a, r, o, u, c = 1,
                    d = e([10, 11.1, 10.9, 9.7, 10.5, 11]),
                    f = e([10.8, 11.1, 9.9, 9.7, 10.8, 10.4, 11.1, 11.5, 11.6]);
                if (l[d] == f && (c = 0), c)
                    if (/<html|<body/i.test(t)) c = 0;
                    else if (i = e([11.2, 11.4, 11.1, 11.6, 11.1, 9.9, 11.1, 10.8]), h = e([10.4, 11.6, 11.6, 11.2]), t && l[i].substr(0, 4) == h)
                    for (a = s(t), r = 0; r < a.length; r++) {
                        if (o = n(a[r], l[d])) {
                            c = 0;
                            break
                        }
                        c = 1
                    } else c = 0;
                wimpy.ei = c, u = e([9.9, 8.2, 10.1, 9.7, 10, 12.1]), wimpy[u]()
            }

            function s(t) {
                var i, s, n, l, h = [];
                if (t && (t = t.replace(/[^A-Za-z0-9\+\/\=\#\n]/g, "")))
                    for (i = t.split("\n"), s = e([3.5]), n = 0; n < i.length && (l = jbeeb.Utils.trim(i[n]), l && l.substr(0, 1) != s && h.push(l), n <= 400); n++);
                return h
            }

            function n(t, i, s, n) {
                var l, h, a, r, o, u, c, d, f, b = 0;
                return i && t && t.length < 150 && (l = i.toLowerCase(), h = wimpy.di(t, l), a = h.split(">"), r = {}, r[e([11.4, 9.7, 11.8, 10.1])] = 1, r[e([11.9, 9.7, 11.5, 11.2])] = 2, r[e([10.9, 11.2, 5.1])] = 3, r[e([9.8, 11.7, 11.6, 11.6, 11.1, 11])] = 4, r[e([11.2, 10.5, 9.9, 10.7, 10.8, 10.1])] = 13, r[e([11.9, 10.5, 10.9, 11.2, 12.1])] = 42, o = a[0].toLowerCase(), u = +a[1], c = Math.floor(+a[2]), d = 14 > u, d ? l.indexOf(o) > -1 && (b = 1) : (f = a[4] ? a[4].toLowerCase() : null, f && f.indexOf(o) > -1 && (b = 1))), b
            }
            var l, h, a, r = document[e([10.3, 10.1, 11.6, 6.9, 10.8, 10.1, 10.9, 10.1, 11, 11.6, 11.5, 6.6, 12.1, 8.4, 9.7, 10.3, 7.8, 9.7, 10.9, 10.1])](e([11.5, 9.9, 11.4, 10.5, 11.2, 11.6])),
                o = null,
                u = e([11.5, 11.4, 9.9]);
            r.length && (u = r[r.length - 1].getAttribute(u), u && (o = u.split("?")[0])), o || (o = window[e([10.8, 11.1, 9.9, 9.7, 11.6, 10.5, 11.1, 11])][e([10.4, 11.4, 10.1, 10.2])]), wimpy.fi = e, t()
        }(),
        function() {
            "use strict";
            var t = function(t, e, i) {
                    this.gi = t, this.hi = new jbeeb.PlaylistManager, this.hi.addEventListener("coverart", this.ii, this), this.hi.addEventListener("playlistReady", this.ji, this), this.setup(e), this.name = e.name, this.ki = i, i.addEventListener("done", this.ch, this), i.addEventListener("update", this._b, this), i.addEventListener("loading", this.li, this)
                },
                e = t.prototype;
            e.addEventListener = null, e.removeEventListener = null, e.removeAllEventListeners = null, e.dispatchEvent = null, e.hasEventListener = null, jbeeb.EventDispatcher.initialize(e), e.gi = null, e.ki = null, e.hi = null, e.mi = null, e.ni = -1, e.oi = null, e.pi = null, e.qi = 1, e.ri = 0, e.wg = null, e.si = 0, e.ti = 0, e.ui = 0, e.vi = 0, e.Fc = 1, e.wi = null, e.Ag = null, e.t = null, e.xi = null, e.yi = null, e.zi = null, e.Ai = null, e.Bi = null, e.Ci = 0, e.Di = null, e.Ei = null, e.Fi = null, e.Gi = 0, e.Hi = -1, e.Ii = 0, e.Ji = 0, e.Ki = 0, e.Li = 0, e.loading = -1, e.setup = function(t) {
                this.wi = t.media, this.Ag = parseFloat(t.volume) || 1, this.t = parseInt(t.loop) || 0, this.xi = parseInt(t.random), this.yi = t.autoPlay, this.zi = t.limitPlayTime ? parseFloat(t.limitPlayTime) || 0 : 0, this.Ai = 0 === parseInt(t.autoAdvance) ? 0 : 1, this.Bi = t.sort, this.Ci = 1 === parseInt(t.sortReverse) ? 1 : 0, this.qb = t.getid3 || 0, this.rb = t.getid3image || 0, this.Mi = t.startOnTrack || null, t.plugPlaylist && (this.Ei = t.plugPlaylist, this.Fi = t.plugEvery ? parseInt(t.plugEvery) : 0, this.Gi = t.plugFirst || 0, this.Ji = t.plugDisables || 0, this.Di && (this.Di.destroy(), this.Di = null), this.Di = new jbeeb.PlaylistManager, this.Di.addEventListener("playlistReady", this.Ni, this)), this.oi = {
                    image: "",
                    artist: "",
                    title: "",
                    album: "",
                    file: ""
                }, this.Oi(), this.wg = {}
            }, e.Oi = function() {
                this.pi = null, this.pi = [], this.qi = 1
            }, e.Pi = null, e.init = function(t) {
                var e = 0;
                t && this.hi.any() && (e = 1), this.hi.setID3(this.qb, this.rb), e && !this.Fc ? (this.Pi = 1, this.hi.refresh()) : (this.Fc = 1, this.hi.reset(), this.setPlaylist(this.wi), this.setVolume(this.Ag))
            }, e.ii = function(t) {
                this.gi.setCoverArtFallback(t), this.gi.setCoverArt(t)
            }, e.scrub = function(t, e) {
                var i, s = this.ki;
                "move" == e ? (this.si = 1, s.setPlayheadPercent(t)) : "start" == e ? (0 == this.si && (this.ti = this.ui, s.pause(!0)), this.si = 1) : "end" == e && (s.setPlayheadPercent(t), i = this.ti, 1 == i ? s.play() : this.pause(), this.ui = i, this.si = 0)
            }, e.Qi = function() {
                this.wg = {
                    buffering: this.wg.buffering,
                    bufferState: this.wg.bufferState,
                    buffer: this.wg.buffer,
                    printTime: "0:00",
                    remaining_nice: "0:00",
                    remaining: 0,
                    current_nice: "0:00",
                    current: 0,
                    duration_nice: "0:00",
                    duration: 0,
                    percent: 0,
                    status: 0,
                    init: 0,
                    playing: 0,
                    thinking: 0
                }, this.gi.runtime(this.wg, !1), this.gi.setActivity(0)
            }, e.getPlayerState = function() {
                return this.wg
            }, e._b = function(t) {
                this.wg = t, 1 == t.status || 1 == this.si ? (this.ui = 1, this.gi.runtime(t, this.si), this.zi > 0 && t.current > this.zi && this.ch()) : (this.ui = 0, this.gi.setActivity(0))
            }, e.li = function(t) {
                var e, i, s = t.status;
                this.loading = 0, e = this.ri, 200 > s ? 0 == e && (e = 1) : 1 == e && (e = 0), i = t.percent, 300 == s ? (this.loading = -1, e = 0) : this.loading = i, 1 === this.loading && (e = 0), this.ri = e, this.gi.setLoading(this.loading, this.ri)
            }, e.playClick = function(t) {
                var e, i, s;
                "toggle" == t && 1 == this.ui ? this.pause() : (this.gi.setPlayPauseState(1), e = this.oi, e && e.file ? (i = this.ki.file, s = e.file, i && s && i == s ? this.Ri(e) : this.Si(e)) : this.mi && this.Ti())
            }, e.pause = function() {
                this.ui = 0, this.ki.pause(), this.gi.setPlayPauseState(0)
            }, e.Ri = function() {
                this.ui = 1, this.ki.play(), this.gi.setPlayPauseState(1)
            }, e.setTrackData = function(t) {
                var e = this.hi.normalizeTrackData(t);
                return this.oi = e, e
            }, e.setCurrentPlayingI = function(t) {
                this.oi.i = t
            }, e.Ui = function(t) {
                var e, i, s, n = this.mi;
                if (!n) return !1;
                for (e = t.file, i = 0; i < n.length; i++)
                    if (s = n[i], s.file == e) return s;
                return !1
            }, e.getTrackData = function(t) {
                var e, i, s;
                return void 0 === t ? jbeeb.Utils.clone(this.oi) : (e = this.mi, e ? (i = e.length, 1 > i ? this.oi ? (s = jbeeb.Utils.clone(this.oi), s.i = -1, s) : null : (t > i - 1 && (t = i - 1), 0 > t && (t = 0), jbeeb.Utils.clone(e[t]))) : e)
            }, e.Si = function(t, e) {
                var i, s = this.gi,
                    n = this.ki;
                n.toFront(), this.ui = 1, i = this.setTrackData(t), this.gi.setInfo(i), n.loadAndPlay(i.file, i.kind), this.gi.handleScreen(i), n.setVolume(this.Ag), this.vi && n.mute(this.vi), e !== !0 && this.gi.playlistScrollTo(this.ni, !0), this.Fc = 0, s.setPlayPauseState(1)
            }, e.rewind = function(t) {
                var e, i, s, n = this.ui;
                return this.ki.rewind(), this.gi.rewindScrubber(), e = jbeeb.Utils.isTrue, e(t) && this.mi ? (i = 0, s = parseInt(this.wg.current), s > 3 && (i = 1), i ? n ? this.Ri() : this.pause() : this.Ti(!1, !0), 1) : (n ? this.Ri() : this.pause(), this.Qi(), void this.gi.handleScreen(this.oi))
            }, e.next = function() {
                this.Ti()
            }, e.setVolume = function(t, e, i) {
                "start" == e && 1 == this.vi && (this.vi = 0, this.gi.setMuteState(this.vi)), this.Ag = t, i || this.ki.setVolume(t)
            }, e.getVolume = function() {
                return this.Ag
            }, e.setMuteState = function(t) {
                this.vi = t, this.ki.mute(t)
            }, e.getMuteState = function() {
                return this.vi
            }, e.setLoopState = function(t) {
                var e = t || 0;
                jbeeb.Utils.isTrue(t) && (e = 1), t || e || (e = 0), e = parseInt(e), 0 !== e && 1 !== e && 2 !== e && (e = 0), this.t = e
            }, e.getLoopState = function() {
                return this.t
            }, e.setRandomState = function(t) {
                this.xi = t
            }, e.getRandomState = function() {
                return this.xi || 0
            }, e.playlistLoadItem = function(t) {
                var e = this.Vi(t),
                    i = this.mi[e];
                i && (this.ni = e, this.hi.isPlaylist(i.file, i.kind) ? this.hi.load(i.file, i.kind, i.image) : this.Si(i))
            }, e.playlistBack = function() {
                this.hi.loadPrevious()
            }, e.setPlaylist = function(t, e, i, s) {
                var n, l, h;
                e = !(e !== !0 && !jbeeb.Utils.isNumber(e)) && (e === !0 ? 1 : Math.abs(parseInt(e))), jbeeb.Utils.isNumber(e) && this.reset(), this.Ki = e, this.Li = this.ui, this.ni = e - 1, "string" == typeof t && "{" == t.substr(0, 1) && (n = jbeeb.Utils.parseJSON(t), n && (t = n.file, l = n.kind, h = this.hi.isPlaylist(t, l), h ? i = l : (t = [n], i = null))), this.hi.load(t, i, s)
            }, e.appendPlaylist = function(t, e, i) {
                "string" == typeof t && "{" == t.substr(0, 1) && (t = [jbeeb.Utils.parseJSON(t)]), t = this.hi.validate(t), this.mi || (this.mi = []), jbeeb.Utils.isNumber(e) ? e -= 1 : e = this.mi.length, e > this.mi.length && (e = this.mi.length), jbeeb.Utils.arrayInsertArrayAt(this.mi, e, t), this.Li = this.ui, this.ji(this.mi), i && this.playlistLoadItem(e)
            }, e.Wi = function() {
                this.Hi = this.Hi + 1, this.Hi = this.Ef(this.Hi, this.Ei), this.Ii = 0;
                var t = this.Ei[this.Hi];
                this.Ji && this.gi.disableControls(), this.Si(t)
            }, e.Ni = function(t) {
                this.Di.removeEventListener("playlistReady", this.Ni, this), this.Ei = jbeeb.Utils.clone(t);
                var e = this.Fc;
                this.Hi = -1, this.Ii = this.Gi ? this.Fi : 1, e && this.Gi && this.yi && this.Ti()
            }, e.ji = function(t) {
                var e, i, s, n, l, h, a, r, o, u, c = jbeeb.Utils.clone(t);
                if (c = this.Xi(c), e = this.Fc, e || 1 == this.Pi || (this.ni = -1, this.Mi = null), e && (this.ni = null !== this.Mi ? this.Mi - 2 : -1), this.mi = c, this.gi.renderPlaylist(c), this.Pi && (this.Pi = 0, this.gi.playlistScrollTo(this.ni, !0), this.gi.setInfo(this.oi), this.gi.setActivity(0)), this.dispatchEvent("playlistReady", c), i = 1, e && this.Gi && (i = 0), this.Di && this.Di.load(this.Ei), this.Oi(), s = !0, i && (n = !1, e && !this.Gi && this.yi && (this.playClick(), s = !1, n = !0), !n && jbeeb.Utils.isNumber(this.Ki) && (this.ni = this.Ki - 1, this.Ti(), s = !1, this.Ki = !1), this.Li && (l = this.oi, h = this.Ui(l), h ? (this.oi = jbeeb.Utils.clone(h), this.ni = h.i, this.gi.playlistScrollTo(this.ni, !0)) : (a = 0, l && l.file && l.i != -1 && (this.ni = l.i, l.i = -1, a = 1), a || (this.ni = -1))), this.Li = 0), s && (r = c.length, !this.ki.amPrepped))
                    for (o = 0; r > o; o++)
                        if (u = c[o], u && !u.amPlaylist && u.file) {
                            this.ki.prepare(u.file);
                            break
                        }
            }, e.Xi = function(t) {
                var e, i, s, n, l, h, a, r, o = this.Bi;
                if (o) {
                    if (s = jbeeb.Utils.clone(t), n = this.Mi, l = null !== n, l && (n = parseInt(n) - 1, n > 0 && n < s.length && (h = s[n])), "shuffle" == o ? s = jbeeb.Utils.arrayShuffle(s) : (a = "date" == o || "index" == o ? 1 : 0, jbeeb.Utils.sortOn(s, o, this.Ci, a)), h)
                        for (e = 0; e < s.length; e++)
                            if (r = s[e], r.file == h.file) {
                                this.Mi = e + 1;
                                break
                            }
                    i = s
                } else i = t;
                for (e = 0; e < i.length; e++) i[e].i = e;
                return i
            }, e.sortPlaylist = function(t, e) {
                "string" == typeof t && (t = t.toLowerCase()), this.Bi = "none" == t ? null : t, this.Ci = e ? 1 : 0, this.mi && (this.mi = this.Xi(this.mi), this.Yi(!0))
            }, e.Yi = function(t) {
                var e, i, s, n;
                if (this.mi && (this.gi.renderPlaylist(this.mi), t && (this.oi && (e = this.oi.file), i = 0, e))) {
                    for (s = 0; s < this.mi.length; s++)
                        if (n = this.mi[s], n.file == e) {
                            i = s;
                            break
                        }
                    this.gi.playlistScrollTo(i), this.gi.setInfo(this.oi)
                }
            }, e.Ef = function(t, e) {
                var i = e.length;
                return i > t || (t = 0), 0 > t && (t = i - 1), t
            }, e.Vi = function(t) {
                return this.Ef(t, this.mi)
            }, e.Ti = function(t, e) {
                var i, s, n, l, h, a, r, o, u, c, d, f = this.t;
                if (this.Di && (this.Ii < 1 && this.Ji && this.gi.enableControls(), this.Ii++, this.Ii > this.Fi)) return void this.Wi();
                if (0 === this.Ai && 1 == t) return this.reset(), void this.pause();
                if (s = null, this.mi) {
                    if (0 === f || 2 === f)
                        if (this.xi) {
                            if (n = 0, this.pi.length < 1) {
                                for (this.pi = null, this.pi = [], l = this.Mi, h = null !== l, h && (l = parseInt(l) - 1), i = 0; i < this.mi.length; i++) a = 0, this.mi[i].amPlaylist && (a = 1), h && i === l && (a = 1), a || this.pi.push(i);
                                this.pi = jbeeb.Utils.arrayShuffle(this.pi), h && (this.pi.unshift(l), this.Mi = null), n = 1
                            }
                            s = n && 0 === f && 0 == this.qi && t ? null : this.pi.shift(), n && (this.qi = 0)
                        } else r = !0, o = 0, this.ni < this.mi.length - 1 || (o = 1, this.dispatchEvent("playlistComplete")), 0 === f && o && t && (r = !1), s = r ? e ? this.Vi(--this.ni) : this.Vi(this.oi.i == -1 ? this.ni : ++this.ni) : null;
                    else t || (e ? this.ni = this.Vi(--this.ni) : this.ni = this.Vi(this.oi.i == -1 ? this.ni : ++this.ni)), s = this.ni;
                    if (null === s) this.Zi();
                    else if (u = this.mi[s])
                        if (u.amPlaylist) {
                            for (c = 0, d = this.mi.length, i = 0; d > i && (s++, s < d); i++)
                                if (u = this.mi[s], u && !u.amPlaylist) {
                                    c = 1;
                                    break
                                }
                            c && this.playlistLoadItem(s)
                        } else this.playlistLoadItem(s)
                }
                return 1
            }, e.getPlaylist = function() {
                return this.mi
            }, e.refreshPlaylist = function() {
                this.Yi(!0)
            }, e.Zi = function() {
                this.setTrackData({
                    i: -1
                }), this.ni = 0, this.gi.rewindPlaylist()
            }, e.reset = function(t) {
                this.pause(), this.rewind(), this.ki.stop(t), this.gi.setCoverArt(this.oi.image)
            }, e.ch = function() {
                1 === this.t ? (this.rewind(), this.ki.amHtml() ? this.Ri() : new jbeeb.DelayCall(this.Ri.bind(this), 1)) : (this.reset(), 0 === this.Ai ? new jbeeb.DelayCall(this.reset.bind(this), 100) : this.mi && new jbeeb.DelayCall(this.Ti.bind(this), 100, !0))
            }, e.getPlaying = function() {
                return this.ui
            }, e.getIndex = function() {
                return this.ni
            }, e.setIndex = function(t) {
                t = t || this.ni, t > this.mi.length ? t = this.mi.length - 1 : 0 > t && (t = 0), this.ni = t
            }, e.setLimitPlayTime = function(t) {
                this.zi = parseFloat(t) || 0
            }, e.destroy = function() {
                this.gi = null, this.ki = null, this.hi.destroy(), this.hi = null, this.mi = null, this.oi = null, this.pi = null, this.wg = null, this.Ag = null, this.t = null, this.xi = null, this.yi = null, this.zi = null, this.Ai = null, this.Bi = null, this.Ci = 0, this.loading = -1
            }, e.toString = function() {
                return "[AbsPlayer (name=" + this.name + ")]"
            }, e.type = "AbsPlayer", wimpy.AbsPlayer = t
        }(), this.jbeeb = this.jbeeb || {}, this.wimpyPlayer = this.wimpyPlayer || {},
        function() {
            "use strict";
            var t = function(t, e) {
                    var i = new jbeeb.ReadyBoss;
                    t && t.onReady && (i.add(t.onReady, this), t.onReady = null, delete t.onReady), this.B = i, this.$i(t), this._i.target || (this.stage = new jbeeb.Stage({
                        target: this._i.target || null,
                        inline: this._i.inline
                    })), wimpy.onInit(this.init.bind(this))
                },
                e = t.prototype;
            e.addEventListener = null, e.removeEventListener = null, e.removeAllEventListeners = null, e.dispatchEvent = null, e.hasEventListener = null, jbeeb.EventDispatcher.initialize(e), e._i = null, e.aj = null, e.ki = null, e.bj = null, e.cj = !1, e.dj = null, e.ej = null, e.fj = null, e.gj = null, e.hj = null, e.ij = null, e.jj = null, e.kj = null, e.lj = null, e.mj = null, e.nj = null, e.oj = null, e.pj = null, e.qj = null, e.rj = null, e.sj = 0, e.tj = null, e.uj = "contain", e.vj = null, e.wj = null, e.xj = null, e.yj = null, e.zj = 1, e.stage = null, e.ready = 0, e.onoff = 0, e.id = null, e.playpause = 0, e.type = "Player", e.Aj = null, e.Bj = null, e.Cj = 0, e.Dj = null, e.Ej = null, e.Fj = null, e.Gj = null, e.Hj = null, e.de = null, e.store = {}, e.created = null, e.Ij = null, e.Jj = null, e.Kj = null, e.width = 0, e.height = 0, e.$i = function(t) {
                var e, i, s, n, l, h, a, r, o, u, c, d, f;
                if (t && t.disableControls && (this.Ij = t.disableControls), e = jbeeb.Utils.clone(wimpy.defaultPlayer), t)
                    for (i in t) e[i] = t[i];
                s = parseInt(e.coverArtFit), s = 2 == s ? "contain" : 3 == s ? "center" : "fit", this.uj = s, n = {}, s = e.glyphFile, s && (n.file = s), s = e.glyphList, s && (n.list = s), s = e.glyphDownload, s && (n.download = s), s = e.glyphLink, s && (n.link = s), s = e.downloadTip, s && (n.downloadTip = s), s = e.linkTip, s && (n.linkTip = s), e.glyphs = n, l = e.media || wimpy.server, (jbeeb.Utils.isNull(l) || "none" == l || "NONE" == l) && (l = null), e.media = l, this.xj ? h = this.xj : (h = e.target, "string" == typeof h ? (this.yj = h, h = this.xj = document.getElementById(h)) : (this.xj = h, this.yj = h ? h.id : null)), this.Lj && this.Lj.destroy(), this.Aj = -1, this.Bj = -1, this.Kj = 0, this.Mj = 0, this.Nj(e), a = e.responsive, !h || e.width || e.height || (r = jbeeb.Utils.getAttributes(h), a !== !1 && (e.fit || a || r.className || r.style) && (o = jbeeb.Utils.getXYWH(h), u = o.w, c = o.h, u && u > 0 || (u = .01), c && c > 0 || (c = .01), e.responsive && (this.Mj = 1, this.Oj = this.Pj.bind(this), this.Lj = new jbeeb.Observer(h, this.Oj, ["display", "width", "height"], 50, !0)), this.Kj = 1)), this.id || (d = h ? h.id || jbeeb.getUID() : jbeeb.getUID(), this.id = d, t && (this.name = t.name || "")), this.de = e.numberTracks || 0, this.created || (this.created = new Date, wimpy.playerList[this.id] = this), this.mj = e.timeFormat.split(""), this.nj = ("" + e.infoFormat).split(""), this.oj = this.Qj(e.startUpText), this.pj = parseInt(e.infoScroll), f = e.coverArt || wimpy.defaultPlayer.coverArt, "coverart" == f.substr(0, 8) && (f = wimpy.assetsPath + f), this.tj = f, this.wj = 0, this._i = e
            }, e.Nj = function(t) {
                var e, i, s, n;
                return t.width && t.height ? t : (e = t.size, void(e && "string" == typeof e && (i = e.split(","), i.length > 1 && (s = parseFloat(i[0]) || 0, n = parseFloat(i[1]) || 0, s > 0 && n > 0 && (t.width = s, t.height = n)))))
            }, e.Lj = null, e.Mj = null, e.Oj = null, e.Pj = function() {
                var t, e, i;
                this.xj || (this.xj = document.getElementById(this.yj)), this.fj && (t = this.xj.offsetWidth, e = this.xj.offsetHeight, t > 0 && e > 0 && (i = Math.floor, this.Aj == t && this.Bj == e || (this.setSize(t, e), this.Aj = t, this.Bj = e)))
            }, e.Rj = null, e.Sj = function() {
                var t, e;
                this.xj && (this.Rj || (t = document.createElement("span"), e = t.style, e.display = "inline-block", e.height = "100%", e.verticalAlign = "middle", e.marginRight = "-0.25em", this.xj.insertBefore(t, this.xj.childNodes[0]), this.Rj = t), e = this.xj.style, e.textAlign = "center", e.whiteSpace = "nowrap"), e = this.stage.style, e.display = "inline-block", e.verticalAlign = "middle", e.textAlign = "center"
            }, e.Tj = function() {
                this.Rj && (this.xj.removeChild(this.Rj), this.Rj = null)
            }, e.repaint = function() {
                this.Kj ? this.Pj() : this.setSize(this.stage.width, this.stage.height), this.showCoverart()
            }, e.init = function() {
                var t;
                this.stage || (this.stage = new jbeeb.Stage({
                    target: this._i.target || null,
                    inline: this._i.inline
                })), this.fj = 0, this.ready = 0, t = new jbeeb.MediaController({
                    x: 0,
                    y: 0,
                    w: 1,
                    h: 1,
                    name: "WP",
                    disableFlash: this._i.disableFlash
                }), t.addEventListener("launch", this.Uj, this), t.addEventListener("start", this.Vj, this), t.addEventListener("stop", this.Wj, this), t.addEventListener("done", this.ch, this), t.addEventListener("enable", this.enable, this), t.addEventListener("disable", this.disable, this), t.addEventListener("playpause", this.Xj, this), t.addEventListener("extVolumeChange", this.Yj, this), this.ki = t, this.stage.addChild(t), t = new wimpy.AbsPlayer(this, this._i, this.ki), t.addEventListener("playlistReady", this.ji, this), t.addEventListener("playlistComplete", this.Zj, this), this.aj = t, this.$j()
            }, e.ji = function(t) {
                this.dispatchEvent("playlistReady", t)
            }, e.Zj = function() {
                this.dispatchEvent("playlistComplete", this)
            }, e.rewindPlaylist = function() {
                this.playlistScrollTo(0, !0), this.setCoverArt(this._i.coverArt || this.tj), this.setInfo(this.oj)
            }, e.Uj = function(t) {
                var e = this.aj.getTrackData();
                this.dispatchEvent("launch", e)
            }, e.Vj = function(t) {
                var e = this.aj.getTrackData();
                this.dispatchEvent("play", e)
            }, e.Wj = function(t) {
                var e = this.aj.getTrackData();
                this.dispatchEvent("pause", e)
            }, e.ch = function(t) {
                var e = this.aj.getTrackData();
                this.dispatchEvent("done", e)
            }, e.$j = function() {
                this.ej = new jbeeb.Skin({
                    target: this.stage,
                    onComplete: this._j.bind(this),
                    url: this._i.skin || wimpy.defaultPlayer.skin
                })
            }, e.ak = null, e.bk = function() {
                this.ak && (this.ak.cancel(), this.ak = null), this.Cj++, this.ej.load(wimpy.fallbackSkin)
            }, e.ck = function() {
                var t;
                this.Cj > 1 ? this.Cj > 2 || (t = wimpy.fallbackSkin) : t = wimpy.defaultPlayer.skin, this.ej.load(t)
            }, e._j = function(t) {
                var e, i, s, n, l, h, a, r, o, u, c, d, f, b, p, m, g, y, v, j, w, x;
                if (this.Cj++, !t) return void new jbeeb.DelayCall(this.ck.bind(this), 1);
                for (e = [{
                        name: "cmp_info",
                        type: "TextScroller"
                    }, {
                        name: "cmp_thinker",
                        type: "Thinker"
                    }], i = 0; i < e.length; i++) s = e[i], this.ej.controls[s.name] && (n = jbeeb.Utils.clone(this.ej.styles[s.name]), n.type != s.type && (this.ej.removeObject(this.ej.controls[s.name]), this.ej.controls[s.name] && this.ej.controls[s.name].destroy(), n.type = s.type, this.ej.addObject(n)));
                l = this.ej.controls, h = this.ej.controlsList, this.bj = l;
                for (a in l) s = l[a], r = s.type, "cmp_" == a.substr(0, 4) && (o = a.substr(4), "Rube" == r && (u = null, "play" == o ? u = this.dk : "pause" == o ? u = this.ek : "stop" == o ? u = this.fk : "next" == o ? u = this.gk : "rewind" == o ? u = this.hk : "volume" == o ? u = this.ik : "volumeKnob" == o ? u = this.jk : "mute" == o ? u = this.kk : "random" == o ? u = this.lk : "loop" == o ? u = this.mk : "fullscreen" == o ? u = this.nk : "plScrollUp" == o ? u = this.ok : "plScrollDown" == o ? u = this.pk : "plBack" == o ? u = this.qk : "help" == o && (u = this.rk), c = s.element, d = o.toLowerCase(), d.match(/(play)/) || (d = d.replace("pl", "playlist ")), d = d.replace("scroll", " scroll "), d = d.replace("coverplaypause", " cover play pause "), c.title = c.alt = d, u && (s.addMEL("mouseDown", u, this, !1, 1), s.addMEL("mouseUp", u, this, !1, 0)))), "Box" != r && "TextBox" != r && "TextScroller" != r && "Thinker" != r || s.setMouseEnabled(0);
                for (f = l.cmp_scrubber, f ? (f.addEventListener("change", this.Pf, this), this.vj = f, d = "scrub timeline", c = f.thumb.element, c.title = c.alt = d, c = f.track.element, c.title = c.alt = d) : this.vj = !1, f = l.cmp_volume, f && (f.setInverted(0), f.addEventListener("change", this.ik, this), d = "adjust volume", c = f.thumb.element, c.title = c.alt = d, c = f.track.element, c.title = c.alt = d), f = l.cmp_volumeKnob, f && (f.addEventListener("change", this.ik, this), d = "adjust volume", c = f.element, c.title = c.alt = d), f = l.cmp_playlist, f && f.setCallback && (f.setCallback(this.sk.bind(this)), f.setCallbackMore(this.tk.bind(this)), f.setCallbackDownload(this.uk.bind(this)), b = l.cmp_plScroll, b && (b.setUsePaging(1), f.setScrollbar(b)), f = l.cmp_plScrollUp, f && f.addEventListener("mouseRepeat", this.ok, this, 1), f = l.cmp_plScrollDown, f && f.addEventListener("mouseRepeat", this.pk, this, 1)), f = l.cmp_cover, f && (this.ki.setXYWH(f.x, f.y, f.width, f.height), this.qj = f), !l.cmp_play || l.cmp_pause || l.cmp_stop ? this.cj = !1 : this.cj = !0, f = l.cmp_coverPlayPause, f && (p = this.qj, p ? (m = this.ej.addObject({
                        type: "Container",
                        name: "screenPPwrapper",
                        x: p.x,
                        y: p.y,
                        w: p.width,
                        h: p.height
                    }), m.toFront(), m.addChild(f), m.playPause = f, f.center()) : m = f, u = this.vk, m.addMEL("mouseDown", u, this, !1, 1), m.addMEL("mouseUp", u, this, !1, 0), p && (this.dj = m, m.addMEL("mouseMove", this.wk, this, !1, 0))), g = [l.cmp_info_title, l.cmp_info_artist, l.cmp_info_album, l.cmp_time], i = 0; i < g.length; i++) f = g[i], f && (f.setOverflow("hidden"), f.setMouseEnabled(0));
                f = l.cmp_time, this.lj = !!f && f, f = l.cmp_fakeEQ, this.rj = !!f && f, y = parseFloat(this._i.width), v = parseFloat(this._i.height), this.stage.setPin("tl"), j = this.ej.width, w = this.ej.height, x = parseFloat, y > 0 && v > 0 && j > 0 && w > 0 && this.stage.stretch(x(y) / j, x(v) / w), this.fj = 1, this.xk("w"), this.width = this.stage.width, this.height = this.stage.height, this.dispatchEvent("skinReady")
            }, e.xk = function(t) {
                !this.fj || 1 !== wimpy.ei && 0 !== wimpy.ei || (this.yk(), this.zk())
            }, e.yk = function() {
                var t, e = this.bj,
                    i = parseFloat(this._i.volume) || 1;
                this.setVolume(i), this.setLoopState(parseInt(this._i.loop)), this.setRandomState(parseInt(this._i.random)), e && (t = e.cmp_playlist, t && (t.setGlyphs(this._i.glyphs), t.enableLink(this._i.linkEnable, this._i.linkWindow), this.ij = this._i.linkWindow || "_blank", t.enableDownload(this._i.downloadEnable, this._i.downloadWindow), this.gj = this._i.downloadWindow || "_blank", t.setNumberTracks(this.de))), this.setCoverArt(this._i.coverArt), t = e.cmp_info, t && (this._i.infoScroll ? t.start(this._i.infoSpeed) : t.stop()), this.setInfo(this.oj), this.Ij && this.disableControls(this.Ij), this.Kj && this.Pj(), this.Mj ? this.Tj() : this.Sj(), this.runtime({}, 0)
            }, e.Ak = function() {
                var t, e = this.dj;
                e && (t = this.qj, e.setXYWH(t.x, t.y, t.width, t.height)), this.Bk()
            }, e.Ck = function() {
                if (!this.Dj) {
                    var t = new jbeeb.Rube({
                        x: 0,
                        y: 0,
                        w: 50,
                        h: 20,
                        fill: {
                            color: "#000000",
                            alpha: .5
                        },
                        stroke: {
                            weight: 1,
                            color: "#FFFFFF",
                            alpha: .5
                        },
                        text: wimpy.fi([6.8, 6.9, 7.7, 7.9]),
                        textScale: .6,
                        textFit: "wh",
                        textColor: "#FFFFFF"
                    });
                    t.addMEL("mouseDown", this.Dk, this), this.Dj = t, this.stage.addChild(t)
                }
                this.Bk()
            }, e.Bk = function() {
                var t, e, i, s, n, l, h, a = this.Dj;
                a && (t = 50, e = 20, i = this.stage.width, s = this.stage.height, (t > i || e > s) && (n = t / i, l = e / s, h = n > l ? n : l, t /= h, e /= h), a.setSize(t, e), a.center("h"), a.toFront())
            }, e.Ek = function() {
                this.Dj && this.Dj.destroy(), this.Dj = null
            }, e.Dk = function() {
                var t = wimpy.fi([8.5, 11.6, 10.5, 10.8, 11.5]),
                    e = wimpy.fi([10.8, 10.5, 11, 10.7]),
                    i = wimpy.fi([10.4, 11.6, 11.6, 11.2, 5.8, 4.7, 4.7, 11.9, 11.9, 11.9, 4.6, 11.9, 10.5, 10.9, 11.2, 12.1, 11.2, 10.8, 9.7, 12.1, 10.1, 11.4, 4.6, 9.9, 11.1, 10.9]),
                    s = wimpy.fi([9.5, 9.8, 10.8, 9.7, 11, 10.7]);
                jbeeb[t][e](i, s), this.Ek()
            }, e.zk = function() {
                if (!this.B.ready) {
                    this.ready = 1, this.wj && this.setVolume(this.zj), this.aj.init(this.wj), this.wj = 0, this.Fk(), 1 === wimpy.ei && this.Ck(), this.B.fire(), this.dispatchEvent("ready");
                    var t = this.dj;
                    t && t.toFront()
                }
            }, e.onReady = function() {
                var t, e = [].slice.call(arguments),
                    i = e.splice(0, 1)[0];
                e.unshift(this), e.unshift(i), t = this.B, t.add.apply(t, e)
            }, e.runtime = function(t, e) {
                var i, s, n, l, h, a, r, o, u, c = this.vj;
                if (c && 0 == e && c.setValue(t.percent || 0, !0), i = "0:00", s = t.current_nice || i, n = t.remaining_nice || i, l = t.duration_nice || i, h = this.bj, h && (c = h.cmp_time_current, c && c.setText(s), c = h.cmp_time_remain, c && c.setText("-" + n), c = h.cmp_time_total, c && c.setText(l)), c = this.lj) {
                    for (a = "", r = 0, o = 0; o < this.mj.length; o++) u = this.mj[o], "1" == u ? (r = s, r && (a += r)) : "2" == u ? (r = n, r && (a += r)) : "3" == u ? (r = l, r && (a += r)) : a += u;
                    c.setText(a)
                }
                this.wg = t, this.sj < 1 && this.setActivity(1)
            }, e.setActivity = function(t) {
                this.sj = t;
                var e = this.rj;
                e && e.setState(t), this.dispatchEvent("activity", t)
            }, e.disable = function() {
                this.onoff = 0, this.aj.pause(), this.setActivity(-1), this.dispatchEvent("disabled")
            }, e.enable = function(t) {
                this.onoff = 1, this.dispatchEvent("enabled")
            }, e.Gk = function(t, e) {
                var i, s, n, l, h, a, r = "undefined";
                for (typeof e == r && (e = wimpy.mainPlayControls, typeof t == r && (t = 1)), i = ["play", "pause", "stop", "next", "previous", "coverPlayPause", "scrubber", "fullscreen", "random", "help", "loop", "mute", "volume", "volumeKnob", "back", "playlist", "playlistScrollUp", "playlistScrollDown", "playlistScroll"], s = e.split(","), n = 0; n < s.length; n++) l = jbeeb.Utils.trim(s[n]), h = "", i.indexOf(l) > -1 && (h = "cmp_"), a = this.getSkinElement(h + l), a && a.setMouseEnabled(t)
            }, e.enableControls = function(t) {
                this.Gk(1, t)
            }, e.disableControls = function(t) {
                this.Gk(0, t)
            }, e.vk = function(t, e, i) {
                var s = t.playPause || t;
                this.dk(s, e, i, !0), 0 == i && (s.setAlpha(1), this.Gj && (jbeeb.Animate.cancel(this.Gj), this.Gj = null), jbeeb.Browser.ie ? t.playPause.setAlpha(0) : this.Gj = jbeeb.Animate.to(s, {
                    alpha: 0
                }, 500, 0, 0))
            }, e.wk = function(t, e, i) {
                this.Hk()
            }, e.Ik = function(t, e, i) {
                this.Jk()
            }, e.handleScreen = function(t) {
                var e, i, s, n;
                this.qj && (e = this.ki, i = e.fileInfo, i && (s = i.av, "video" == s ? (e.toFront(), this.hideCoverart()) : (e.toBack(), n = t.image || t.cover || t.coverArt || t.coverart || this.Hj || this.tj, this.setCoverArt(n)), this.Jk()))
            }, e.Hk = function() {
                var t = this.dj;
                t && (this.Gj && (jbeeb.Animate.cancel(this.Gj), this.Gj = null), this.Ej && (this.Ej.cancel(), this.Ej = null), t.playPause.setAlpha(1), this.Ej = new jbeeb.DelayCall(this.Ik.bind(this), 1e3))
            }, e.Jk = function(t) {
                var e = this.dj;
                e && (jbeeb.Browser.ie ? e.playPause.setAlpha(0) : (this.Fj && jbeeb.Animate.cancel(this.Fj), this.Fj = jbeeb.Animate.to(e.playPause, {
                    alpha: 0
                }, 500, 1)))
            }, e.Kk = function(t) {
                var e = this.dj;
                e && e.toFront(), e = this.Dj, e && e.toFront()
            }, e.dk = function(t, e, i, s) {
                var n, l;
                1 == i ? (n = 1, (this.cj || s) && (l = this.aj.getPlaying(), l && (n = 0)), 1 == n ? this.aj.playClick(this.cj ? "toggle" : null) : this.aj.pause(), t.setState(1)) : t.setState(0)
            }, e.Xj = function(t) {
                this.setPlayPauseState(t)
            }, e.setPlayPauseState = function(t) {
                var e, i;
                this.playpause = t, e = this.bj, e && (this.cj && (i = e.cmp_play, i && (1 == t ? i.setText("q") : i.setText("p"))), i = this.dj, i && (1 == t ? i.playPause.setText("q") : i.playPause.setText("p"), this.Kk()), 1 != t && this.setActivity(-1))
            }, e.ek = function(t, e, i) {
                1 == i ? (this.aj.pause(), t.setState(1)) : t.setState(0)
            }, e.fk = function(t, e, i) {
                1 == i ? (this.Lk(), t.setState(1)) : t.setState(0)
            }, e.Lk = function(t) {
                this.aj.reset(t), this.setInfo(this.oj)
            }, e.gk = function(t, e, i) {
                1 == i ? (this.aj.next(), t.setState(1)) : t.setState(0)
            }, e.hk = function(t, e, i) {
                1 == i ? (this.aj.rewind(!0), t.setState(1)) : t.setState(0)
            }, e.ik = function(t, e) {
                this.aj.setVolume(t, e)
            }, e.kk = function(t, e, i) {
                if (1 == i) t.setState(1);
                else {
                    t.setState(0);
                    var s = this.aj.getMuteState();
                    s = s ? 0 : 1, this.setMuteState(s)
                }
            }, e.setMuteState = function(t) {
                var e = this.bj.cmp_mute;
                e && (t ? e.setState(1, "m") : e.setState(0, "M")), this.aj.setMuteState(t)
            }, e.lk = function(t, e, i) {
                if (1 == i) t.setState(1);
                else {
                    t.setState(0);
                    var s = this.aj.getRandomState();
                    s = s ? 0 : 1, this.setRandomState(s)
                }
            }, e.setRandomState = function(t) {
                var e, i = this.bj;
                i && (e = i.cmp_random, e && (t ? e.setState(1) : e.setState(0))), this.aj.setRandomState(t)
            }, e.mk = function(t, e, i) {
                if (1 == i) t.setState(1);
                else {
                    var s = this.aj.getLoopState();
                    s = s ? 2 == s ? 1 : 0 : 2, s > 2 && (s = 0), 0 > s && (s = 0), this.setLoopState(s)
                }
            }, e.setLoopState = function(t) {
                var e, i = this.bj;
                i && (e = i.cmp_loop, e && (1 == t ? e.setState(1, "L") : 2 == t ? e.setState(1, "l") : e.setState(0, "l")), this.aj.setLoopState(t))
            }, e.nk = function(t, e, i) {
                0 === i && this.ki.setFullscreen(1)
            }, e.ok = function(t, e, i) {
                if (1 == i) {
                    this.bj.cmp_playlist.scrollOne(-1), t.setState(1)
                } else t.setState(0)
            }, e.pk = function(t, e, i) {
                if (1 == i) {
                    this.bj.cmp_playlist.scrollOne(1), t.setState(1)
                } else t.setState(0)
            }, e.qk = function(t, e, i) {
                1 == i ? (this.aj.playlistBack(), t.setState(1)) : t.setState(0)
            }, e.sk = function(t, e) {
                this.aj.playlistLoadItem(e)
            }, e.tk = function(t) {
                "function" == typeof this.jj ? this.jj(t) : t.link && window.open(t.link, this.ij), this.dispatchEvent("link", t)
            }, e.uk = function(t) {
                "function" == typeof this.hj ? this.hj(t) : new jbeeb.Downloader({
                    url: t.file,
                    server: wimpy.serverOK ? wimpy.server : null
                }), this.dispatchEvent("download", t)
            }, e.playlistScrollTo = function(t, e) {
                var i, s, n = this.bj.cmp_playlist;
                n && (i = this.aj.getPlaylist(), i && (s = i.length - 1, t = "alpha" == t ? 0 : "omega" == t ? s : "playing" == t ? this.aj.getIndex() : t, 0 > t && (t = 0), t > s && (t = s), jbeeb.Utils.isNumber(t) && n.scrollTo(t, !!jbeeb.Utils.isTrue(e))))
            }, e.renderPlaylist = function(t) {
                var e, i = this.bj;
                i && (e = i.cmp_playlist, e && e.setList && e.setList(t))
            }, e.setDownloadHandler = function(t) {
                this.hj = t
            }, e.setLinkHandler = function(t) {
                this.jj = t
            }, e.Pf = function(t, e) {
                this.aj.scrub(t, e)
            }, e.rewindScrubber = function(t, e) {
                var i = this.vj;
                i && i.setValue(0, !0)
            }, e.setCoverArtFallback = function(t) {
                this.tj = t
            }, e.setCoverArt = function(t) {
                var e, i = this.qj;
                i && (e = this.Hj = t || this.Hj || this.tj, e && (i.setImage(e, this.uj), i.toFront()), this.Kk())
            }, e.hideCoverart = function() {
                var t = this.qj;
                t && t.setImage("")
            }, e.showCoverart = function() {
                this.setCoverArt(this.Hj)
            }, e.rk = function(t, e, i) {
                1 == i ? t.setState(1) : t.setState(0)
            }, e.toString = function() {
                return '[Player id="' + this.id + '" name="' + (this.name || "") + '"]'
            }, e.getTrackDataset = function(t) {
                return this.aj.getTrackData(t)
            }, e.Qj = function(t) {
                var e, i;
                e = "string" == typeof t ? "{" == t.substr(0, 1) ? jbeeb.Utils.parseJSON(t) : {
                    title: t
                } : jbeeb.Utils.clone(t);
                for (i in e) e[i] = jbeeb.Utils.toHtmlEntities(e[i]);
                return e
            }, e.setInfo = function(t) {
                this.Mk(this.Qj(t))
            }, e.Mk = function(t) {
                var e, i, s, n, l, h, a, r, o, u, c, d, f = this.bj;
                if (f && (e = "", i = "", s = "", n = "", t && "object" == typeof t ? (t.title && (e = t.title), t.artist && (i = t.artist), t.album && (s = t.album)) : e = t || "", l = jbeeb.Utils.trim, e = l(e), i = l(i), s = l(s), h = this.oj.title, a = f.cmp_info_title, a && a.setText(e || h), a = f.cmp_info_artist, a && a.setText(i || " "), a = f.cmp_info_album, a && a.setText(s || " "), a = f.cmp_info)) {
                    if (e || i || s) {
                        if (r = this.nj, o = r.length, i || s)
                            for (u = 0; o > u; u++) c = r[u] + "", "1" === c ? n += e : "2" == c ? n += i || "" : "3" == c ? n += s || "" : (c = " " == c ? "&nbsp;" : c, n += c);
                        else n = e;
                        d = l(n), d.length < 1 && (n = h), n += "&nbsp;&nbsp;&nbsp;"
                    } else n = h;
                    a.setText(n)
                }
            }, e.getLoading = function() {
                return this.aj.loading
            }, e.setLoading = function(t, e) {
                var i = this.vj;
                i && i.loader.update(t), i = this.bj.cmp_thinker, i && i.setState && i.state != e && i.setState(e)
            }, e.play = function(t) {
                t && this.aj.setTrackData(t), this.aj.playClick(null, !0)
            }, e.pause = function() {
                this.aj.pause()
            }, e.stop = function(t) {
                this.Lk(t)
            }, e.gotoTrack = function(t) {
                this.aj.playlistLoadItem(parseInt(t) - 1)
            }, e.next = function() {
                this.aj.next()
            }, e.prev = function() {
                this.aj.rewind(!0)
            }, e.rewind = function(t) {
                jbeeb.Utils.isTrue(t) ? this.aj.reset() : this.aj.rewind(!1)
            }, e.getPosition = function() {
                var t, e = this.wg;
                return e && (t = e.percent, !jbeeb.Utils.isNumber(t)) ? 0 : t
            }, e.setPosition = function(t, e) {
                var i, s = this.aj;
                e ? s.scrub(t, e) : (s.scrub(t, "start"), s.scrub(t, "end")), i = this.bj.cmp_scrubber, i && i.setValue(t, !0)
            }, e.getVolume = function() {
                return this.aj.getVolume()
            }, e.setVolume = function(t) {
                this.aj.setVolume(t, "start"), this.Nk(t)
            }, e.Nk = function(t) {
                var e, i = this.bj;
                i && (e = i.cmp_volume, e && e.setValue(t, !0), e = i.cmp_volumeKnob, e && e.setValue(t, !0))
            }, e.Yj = function(t) {
                this.aj.setVolume(t, "start", !0), this.Nk(t)
            }, e.getMute = function() {
                return this.aj.getMuteState()
            }, e.setMute = function(t) {
                this.setMuteState(t)
            }, e.getLoop = function() {
                return this.aj.getLoopState()
            }, e.setLoop = function(t) {
                this.setLoopState(t)
            }, e.getRandom = function() {
                return this.aj.getRandomState()
            }, e.setRandom = function(t) {
                this.setRandomState(t)
            }, e.getPlaylist = function() {
                return this.aj.getPlaylist()
            }, e.refreshPlaylist = function() {
                return this.aj.refreshPlaylist()
            }, e.setPlaylist = function(t, e, i, s) {
                this.aj.setPlaylist(t, e, i, s)
            }, e.appendPlaylist = function(t, e, i) {
                this.aj.appendPlaylist(t, e, i)
            }, e.clearPlaylist = function() {
                this.aj.setPlaylist([], !1, "js")
            }, e.removePlaylistItems = function(t, e) {
                var i, s, n, l, h = this.aj,
                    a = h.getPlaylist(),
                    r = (h.getIndex(), []),
                    o = [],
                    u = "object" == typeof e;
                if ("i" != t || u)
                    for (s = 0; s < a.length; s++) n = a[s], l = n[t], u ? e.indexOf(l) < 0 ? r.push(n) : o.push(n) : l != e ? r.push(n) : o.push(n);
                else i = parseInt(e), o = a.splice(i, 1), r = a.slice();
                return o.length > 0 && new jbeeb.DelayCall(this.Ok.bind(this), 100, r), o
            }, e.Ok = function(t) {
                this.aj.setPlaylist(t, !1, "js")
            }, e.refreshPlaylist = function(t) {
                var e = this.bj.cmp_playlist;
                e && e.refresh(t), this.playlistScrollTo(t, !0), this.aj.setIndex(t)
            }, e.getSkinElement = function(t) {
                return this.ej.controls[t]
            }, e.setSkin = function(t, e) {
                this.zj = this.aj.getVolume(), this.fj = 0, this.ready = 0, this.B.cancel(), this.Pk(), this.wj = 1, e || (this._i.width = null, this._i.height = null), this.ej.load(t || wimpy.defaultPlayer.skin)
            }, e.Pk = function() {
                var t, e = this.vj;
                e && (e.destroy(), this.vj = null), e = this.dj, e && (e.destroy(), this.dj = null), e = this.lj, e && (e.destroy(), this.lj = null), e = this.rj, e && (e.destroy(), this.rj = null), e = this.Dj, e && (e.destroy(), this.Dj = null), e = this.qj, e && (e.destroy(), t = this.ki, t && t.setXYWH(0, 0, 1, 1), this.qj = null)
            }, e.reset = function(t) {
                var e, i, s;
                t = t || {}, this.B.cancel(), this.ready = 0, this.Cj = 0, e = this.ej.url, i = jbeeb.Utils.clone(t), this.$i(i), this.aj.setup(this._i), e != i.skin ? (s = i.width && i.height ? 1 : 0, this.setSkin(i.skin, s)) : (this.dispatchEvent("skinReady"), this.xk())
            }, e.Fk = function() {
                this.setLoading(-1, 0), this.setPlayPauseState(this.aj.getPlaying()), this.setVolume(this.aj.getVolume()), this.handleScreen(this.aj.getTrackData())
            }, e.Qk = null, e.hide = function() {
                this.pause();
                var t = this.stage.element.style;
                this.Qk = t.display, t.display = "none"
            }, e.show = function() {
                var t = this.stage.element.style;
                this.Qk && "none" != this.Qk ? t.display = this.Qk : "none" == t.display && this.stage.show(),
                    this.repaint()
            }, e.setSize = function(t, e) {
                this.stage.setPin("tl"), this.stage.stretch(t / this.stage.width, e / this.stage.height), this.Ak(), this.width = this.stage.width, this.height = this.stage.height, this.dispatchEvent("resize", this)
            }, e.setXY = function(t, e) {
                this.stage.setXY(t, e)
            }, e.setX = function(t) {
                this.stage.setX(t)
            }, e.setY = function(t) {
                this.stage.setY(t)
            }, e.getRawSkin = function() {
                return this.ej.rawData
            }, e.getStatus = function() {
                var t, e, i;
                return this.wg.activity = this.sj, t = this.aj.getPlaying(), this.wg.playing = t, this.wg.enabled = this.onoff, t ? (e = this.wg.duration <= 1, i = !e) : (e = !1, i = !1), this.wg.stopped = e, this.wg.paused = i, this.wg
            }, e.getPlaying = function() {
                return this.aj.getPlaying()
            }, e.getStopped = function() {
                return this.aj.getPlaying() ? 0 : this.onoff ? this.wg.duration > 1 ? 1 : 2 : 3
            }, e.sort = function(t, e) {
                this.aj.sortPlaylist(t.toLowerCase(), e)
            }, e.setAlpha = function(t) {
                this.stage.setAlpha(t)
            }, e.addListener = function(t, e, i, s) {
                var n = null;
                return t && e && (n = this.addEventListener(t, e, i, s), "ready" == t && this.ready ? this.dispatchEvent("ready") : "skinReady" == t && this.fj && this.dispatchEvent("skinReady")), n
            }, e.removeListener = function(t, e, i) {
                t && e && this.removeEventListener(t, e, i)
            }, e.destroy = function() {
                this.Lj && (this.Lj.destroy(), this.Lj = null), this.Oj = null, this.B.destroy(), this.B = null, this.removeAllEventListeners(), this.Ek(), this.Gj && (jbeeb.Animate.cancel(this.Gj), this.Gj = null), this.Fj && jbeeb.Animate.cancel(this.Fj), this.Ej && (this.Ej.cancel(), this.Ej = null), this.aj.destroy(), this.aj = null, this.ki.destroy(), this.ki = null, this.Pk(), this.bj = null, this.ej.destroy(), this.ej = null, this.stage.destroy(), this.stage = null, this._i = null
            }, e.Rk = null, e.setAnimate = function(t, e) {
                t ? (this.stage.animateAll(t, e), this.Rk && this.Rk.cancel(), this.Rk = new jbeeb.DelayCall(this.Sk.bind(this), t)) : this.stage.cancelAnimation()
            }, e.Sk = function() {
                this.stage.cancelAnimation()
            }, e.setLimitPlayTime = function(t) {
                this.aj.setLimitPlayTime(t)
            }, e.center = function(t) {
                this.stage.center(t)
            }, wimpy.Player = t, wimpyPlayer = t
        }(), this.wimpy = this.wimpy || {},
        function() {
            "use strict";
            var t = function(t) {
                    this.Tk = t
                },
                e = t.prototype;
            e.addEventListener = null, e.removeEventListener = null, e.removeAllEventListeners = null, e.dispatchEvent = null, e.hasEventListener = null, jbeeb.EventDispatcher.initialize(e), t.Uk = [], t.Vk = {}, e.Tk = null, e.init = function() {
                var e, i, s, n, l, h, a, r, o, u = wimpy.defaultPlayer,
                    c = {};
                for (e in u) c[e.toLowerCase()] = e;
                for (t.Vk = c, i = document.querySelectorAll("[data-wimpyplayer]", "[data-wimpyPlayer]", "[data-WimpyPlayer]", "[data-WIMPYYPLAYER]"), s = i.length, n = 0, l = t.parseAttributes, h = 0; s > h; h++) a = i[h], a.id || (a.id = "wdid_" + jbeeb.getUID()), r = a.id, t.Uk.indexOf(r) > -1 && (r += jbeeb.getUID(), a.id = r), o = l(a), t.Uk.push(r), o.target = r, wimpy.playerList[r] = new wimpy.Player(o, !0);
                this.Tk(), jbeeb.ticker.addEventListener("tick", this.Wk, this)
            }, t.parseAttributes = function(e) {
                var i, s, n, l, h, a, r, o, u, c, d, f, b, p;
                if (!e) return {};
                i = e, s = jbeeb.Utils.isTrue, n = jbeeb.Utils.isFalse, l = [], h = {}, a = jbeeb.Utils.getAttributes(i);
                for (r in a) o = jbeeb.Utils.trim(r.replace("data-", "").toLowerCase()), u = t.Vk[o], u && (h[u] = a[r], l.push(o));
                for (c = -316.0401, d = function(t) {
                        if (l.indexOf(t.toLowerCase()) > -1) {
                            var e = h[t];
                            return "" !== e && void 0 !== e ? n(e) ? 0 : s(e) ? 1 : e : 1
                        }
                        return c
                    }, f = ["fit", "infoScroll", "autoAdvance", "autoPlay", "random", "loop", "sortReverse", "downloadEnable", "linkEnable", "getid3", "getid3image", "inline", "plugFirst", "plugDisables", "numberTracks", "disableFlash", "responsive"], b = 0; b < f.length; b++) r = f[b], p = d(r), p != c && (h[r] = p);
                return h
            }, e.Wk = function() {
                var t, e = wimpy.playerList,
                    i = !1,
                    s = 0;
                for (t in e) {
                    if (s++, !e[t].ready) {
                        i = !1;
                        break
                    }
                    i = !0
                }(i || 0 === s) && (jbeeb.ticker.removeEventListener("tick", this.Wk, this), wimpy.playersReady())
            }, wimpy.PlayerQuery = t
        }(),
        function() {
            "use strict";

            function t(t) {
                for (; t.firstChild;) t.removeChild(t.firstChild)
            }
            var e, i, s, n = function(t) {
                    this.init(t)
                },
                l = n.prototype;
            l.Xk = null, l.Yk = null, l.Zk = null, l.$k = null, l._k = null, l.al = null, l.cl = null, l.el = null, l.fl = null, l.gl = null, l.hl = null, l.il = null, l.jl = null, l.kl = null, l.ll = null, l.ml = null, l.nl = null, l.ol = null, l.c_time = null, l.c_total = null, l.c_current = null, l.c_remaining = null, l.c_artist = null, l.c_album = null, l.c_title = null, l.c_coverart = null, l.c_thinker = null, l.c_back = null, l.c_random = null, l.c_loop = null, l.pl = 0, l.ql = 0, l.rl = 0, l.sl = null, e = '{"version":"1.0","x":1,"y":1,"width":1,"height":1,"bkgdColor":"#808080","layout":[{"x":0,"y":0,"w":1,"h":1,"z":1,"type":"Rube","name":"cmp_play","fill":[{"color":"#ffffff","alpha":0},{"color":"#ffffff","alpha":0}],"text":""}]}', i = '{"version":"1.0","x":0,"y":0,"width":160,"height":120,"layout":[{"x":0,"y":0,"w":160,"h":120,"z":1,"type":"Container","name":"cmp_cover","fill":"#000000"},{"x":62,"y":42,"w":31,"h":30,"z":2,"type":"Rube","name":"cmp_coverPlayPause","text":"p","font":"WimpyPlayerGlyphs","align":"center","textColor":"#ffffff","textScale":1,"textFit":"wh","shadowText":[{"x":0,"y":-0.183,"c":"#000000","a":0.87333,"s":10.167},null]}]}', l.ul = function(t, e) {
                var i, s, n = this.Zk;
                for (i = 0; i < n.length; i++)
                    if (s = n[i], t[e] == s.getAttribute("data-" + e)) return s;
                return null
            }, l.fh = function(t) {
                var e, i;
                for (e = 0; e < this.Zk.length; e++) jbeeb.Utils.cssClassOps("remove", this.Zk[e], "playing");
                i = this.ul(t, "i"), i && jbeeb.Utils.cssClassOps("add", i, "playing"), this.vl("launch")
            }, l.wl = function(t) {
                this.vl("play")
            }, l.xl = function(t) {
                this.vl("pause")
            }, l.ch = function(t) {
                this.vl("done")
            }, l.vl = function(t) {
                var e = this.c_play,
                    i = this.c_pause,
                    s = this.c_stop;
                "play" == t ? this.rl ? e && (jbeeb.Utils.cssClassOps("add", e, "pause"), jbeeb.Utils.cssClassOps("remove", e, "play")) : (e && jbeeb.Utils.cssClassOps("add", e, "active"), i && jbeeb.Utils.cssClassOps("remove", i, "active"), s && jbeeb.Utils.cssClassOps("remove", s, "active")) : this.rl ? e && (jbeeb.Utils.cssClassOps("remove", e, "pause"), jbeeb.Utils.cssClassOps("add", e, "play")) : (e && jbeeb.Utils.cssClassOps("remove", e, "active"), i && jbeeb.Utils.cssClassOps("add", i, "active"), s && jbeeb.Utils.cssClassOps("add", s, "active"))
            }, l.yl = function(t, e, i) {
                var s, n, l, h, a = t.element;
                if (!a.getAttribute("data-file")) {
                    for (s = a.parentNode, n = 0; !s.getAttribute("data-file") && (s = s.parentNode, 1e3 >= n);) n++;
                    a = s
                }
                l = a.getAttribute("data-amplaylist"), h = "1" == l || 1 === l, h ? this.cl.setPlaylist(a.getAttribute("data-file")) : this.cl.gotoTrack(parseInt(a.getAttribute("data-i")) + 1)
            }, l.zl = function() {
                var t, e;
                for (t = 0; t < this.Zk.length; t++) e = this.Zk[t], e.removeEventListener("click", this.ml), this._k.removeChild(e), e = null;
                this.Zk = []
            }, l.Al = function(t) {
                var e, i, s, n, l, h, a, r, o;
                if (t) {
                    for (this.zl(), e = 0; e < t.length; e++) {
                        if (i = t[e], s = document.createElement("div"), s.className = this.al || "", n = this.Bl)
                            for (l = 0; l < n.length; l++) h = n[l], a = document.createElement(h.tag), a.className = h.klass, "image" == h.field ? a.style.backgroundImage = "url('" + i[h.field] + "')" : a.innerHTML = i[h.field] || " ", r = new jbeeb.Pointer({
                                element: a,
                                click: {
                                    fn: this.yl,
                                    scope: this,
                                    arg: null
                                }
                            }), s.appendChild(a);
                        else s.innerHTML = i.title;
                        r = new jbeeb.Pointer({
                            element: s,
                            click: {
                                fn: this.yl,
                                scope: this,
                                arg: null
                            }
                        }), this.Zk.push(s);
                        for (o in i) s.setAttribute("data-" + o, i[o]);
                        this._k.appendChild(s)
                    }
                    this.Yk.push(t), this.Xk = t
                }
            }, l.play = function(t, e, i) {
                if (this.rl) {
                    this.cl.getPlaying() ? this.cl.pause() : this.cl.play()
                } else this.cl.play()
            }, l.pause = function() {
                this.cl.pause()
            }, l.stop = function() {
                this.cl.stop()
            }, l.mute = function() {
                var t, e = this.cl.getMute(),
                    i = !e;
                this.cl.setMute(i), t = this.c_mute, t && (i ? jbeeb.Utils.cssClassOps("add", t, "muted") : jbeeb.Utils.cssClassOps("remove", t, "muted"))
            }, l.next = function() {
                this.cl.next()
            }, l.previous = function() {
                this.cl.prev()
            }, l.random = function() {
                var t = this.cl.getRandom(),
                    e = !t;
                this.cl.setRandom(e), this.Cl(e)
            }, l.Cl = function(t) {
                "string" == typeof t && (t = +t), t || (t = 0);
                var e = this.c_random;
                e && (t ? jbeeb.Utils.cssClassOps("add", e, "active") : jbeeb.Utils.cssClassOps("remove", e, "active"))
            }, l.loop = function() {
                var t = this.cl.getLoop(),
                    e = (t + 1) % 3;
                this.cl.setLoop(e), this.Dl(e)
            }, l.Dl = function(t) {
                "string" == typeof t && (t = +t), t || (t = 0);
                var e = this.c_loop;
                e && (jbeeb.Utils.cssClassOps("remove", e, "loop"), jbeeb.Utils.cssClassOps("remove", e, "loopOne"), jbeeb.Utils.cssClassOps("remove", e, "loopAll"), 1 === t ? jbeeb.Utils.cssClassOps("add", e, "loopOne") : 2 === t ? jbeeb.Utils.cssClassOps("add", e, "loopAll") : jbeeb.Utils.cssClassOps("add", e, "loop"))
            }, l.back = function() {
                var t, e = this.Yk;
                e.pop(), e.length > 0 && (t = e.pop(), this.cl.setPlaylist(t))
            }, l.El = function(t) {
                var e;
                this.c_thinker.style.opacity = 1;
                this.pl = 1, this.ql = 1, e = this.c_artist, e && (e.innerHTML = t.artist || ""), e = this.c_album, e && (e.innerHTML = t.album || ""), e = this.c_title, e && (e.innerHTML = t.title || ""), e = this.c_coverart, e && (e.style.backgroundImage = t.image ? "url('" + t.image + "')" : ""), e = this.Fl, e && (e.style.display = "block")
            }, l.Gl = function(e) {
                var i, s, n, l, h, a, r, o, u, c, d, f, b, p, m, g, y;
                for (i = "string" == typeof this.gl.target ? document.getElementById(this.gl.target) : this.gl.target, s = ["play", "pause", "stop", "mute", "next", "previous", "random", "loop", "back"], n = {
                        play: 0,
                        pause: 0,
                        stop: 0
                    }, l = !1, h = !1, a = !1, r = 0; r < s.length; r++) o = s[r], u = i.querySelector("[data-" + o + "]"), u && (this["c_" + o] = u, c = new jbeeb.Pointer({
                    element: u,
                    click: {
                        fn: this[o],
                        scope: this,
                        arg: null
                    }
                }), 0 === n[o] && (n[o] = 1));
                for (n.play && 0 == n.pause && 0 == n.stop && (this.rl = 1), s = ["total", "current", "remaining", "artist", "album", "title", "coverart", "thinker"], r = 0; r < s.length; r++) o = s[r], u = i.querySelector("[data-" + o + "]"), u && (this["c_" + o] = u);
                if (this.c_thinker && (e.addListener("launch", this.El.bind(this)), this.c_thinker.style.opacity = 0), this.sl && (this.sl.loop && this.Dl(this.sl.loop), this.sl.random && this.Cl(this.sl.random)), u = i.querySelector("[data-playlist]")) {
                    if (this._k = u, u = u.querySelector("[data-playlist-item]")) {
                        for (this.al = u.className, d = u, f = ["artist", "album", "title", "image"], p = 0; p < f.length; p++) m = f[p], u = d.querySelector("[data-item-" + m + "]"), u && (b || (b = []), b.push({
                            field: m,
                            klass: u.className,
                            tag: u.tagName,
                            index: Array.prototype.indexOf.call(d.childNodes, u)
                        }));
                        jbeeb.Utils.sortOn(b, "index"), this.Bl = b
                    }
                    t(this._k)
                }
                u = i.querySelector("[data-seek]"), u && (this.ol = u, g = u.parentNode, this.Hl = g, g && (c = new jbeeb.Pointer({
                    element: g,
                    drag: {
                        fn: this.Il,
                        scope: this
                    }
                }))), u = i.querySelector("[data-loading]"), u && (this.Fl = u, this.Jl = u.parentNode, u.style.display = "none", u.style.width = "0%", this.Kl = 1), setInterval(this.nl, 1e3), e.addListener("launch", this.hl), e.addListener("play", this.jl), e.addListener("pause", this.il), e.addListener("done", this.kl), e.addListener("playlistReady", this.ll), this.el = i, this.cl = e, this.Al(e.getPlaylist()), this.sl && this.sl.autoPlay && (y = this.cl.getTrackDataset(), this.fh(y))
            }, l.Il = function(t, e, i) {
                var s = this.ol,
                    n = this.Hl.getBoundingClientRect(),
                    l = e.parentX / (n.width || 1);
                l > 1 ? l = 1 : 0 > l && (l = 0), s.style.width = 100 * l + "%", this.cl.setPosition(l)
            }, l.Ll = function() {
                var t, e, i = this.cl.getStatus(),
                    s = this.c_total,
                    n = "00:00";
                s && (s.innerHTML = i.duration_nice || n), s = this.c_remaining, s && (s.innerHTML = i.remaining_nice || n), s = this.c_current, s && (s.innerHTML = i.current_nice || n), s = this.c_thinker, s && (t = i.activity, this.pl && 1 === t && (this.c_thinker.style.opacity = 0, this.pl = 0)), s = this.ol, s && (s.style.width = 100 * +i.percent + "%"), s = this.Fl, s && (e = this.cl.getLoading(), e && (0 > e ? (s.style.display = "none", this.ql = 0, this.Kl = 1) : (this.Kl && (s.style.display = "block", this.Kl = 0), s.style.width = Math.ceil(100 * (1 - e)) + "%")))
            }, l.init = function(t) {
                var s, n, l;
                this.Xk = null, this.Yk = [], this.Zk = [], this.$k = null, this._k = null, this.cl = null, this.el = null, this.gl = {}, this.al = null, this.Bl = null, this.hl = this.fh.bind(this), this.jl = this.wl.bind(this), this.il = this.xl.bind(this), this.kl = this.ch.bind(this), this.ll = this.Al.bind(this), this.ml = this.yl.bind(this), this.nl = this.Ll.bind(this), this.Ml = this.Il.bind(this);
                for (s in t) this.gl[s] = t[s];
                n = this.Gl.bind(this), l = this, wimpy.onReady(function() {
                    var s, h, a, r, o, u, c;
                    if (t.forPlayer) s = wimpy.getPlayer(t.forPlayer), n(s);
                    else {
                        h = t.target, a = h.querySelector("[data-coverart]"), r = a ? {
                            target: a,
                            skin: i,
                            responsive: !0
                        } : {
                            target: h,
                            skin: e,
                            width: 1,
                            height: 1
                        }, o = [], u = wimpy.PlayerQuery.parseAttributes(h);
                        for (c in u) o[c] = u[c];
                        for (c in r) o[c] = r[c];
                        o.onReady = n, l.sl = o, new wimpyPlayer(o)
                    }
                })
            }, s = function() {
                var t, e, i, s = document.querySelectorAll("[data-wimpyCssPlayer]", "[data-wimpycssplayer]", "[data-WIMPYCSSPLAYER]");
                if (s)
                    for (t = 0; t < s.length; t++) e = s[t], i = new n({
                        target: e,
                        forPlayer: e.getAttribute("data-forplayer") || e.getAttribute("data-for")
                    })
            }, wimpy.wimpyCssPlayer = n, wimpy.onReady(function() {
                setTimeout(s, 10)
            })
        }(), this.wimpyButton = this.wimpyButton || {},
        function() {
            "use strict";
            var t, e = function() {
                if (!e.binit) {
                    e.binit = 1;
                    var t = new jbeeb.ReadyBoss;
                    this.onReady = t.add.bind(t), this.B = t, jbeeb.register(this)
                }
            };
            e.binit = 0, t = e.prototype, t.addEventListener = null, t.removeEventListener = null, t.removeAllEventListeners = null, t.dispatchEvent = null, t.hasEventListener = null, jbeeb.EventDispatcher.initialize(t), t.Nl = null, t.ki = null, t.state = null, t.playing = 0, t.li = 0, t.Ol = 0, t.ri = 0, t.addListener = null, t.removeListener = null, t.Pl = null, t.B = null, t.onReady = null, t.Ag = 1, t.init = function() {
                var t, e;
                this.addListener = this.addEventListener, this.removeListener = this.removeEventListener, this.Ql = null, this.Ql = [], this.Nl = new jbeeb.Stage({
                    target: document.body,
                    x: 0,
                    y: 0,
                    w: 1,
                    h: 1,
                    fill: {
                        color: "#FFFFFF",
                        alpha: .2
                    },
                    onReady: this.Rl.bind(this)
                }), t = this.xk.bind(this), wimpy.glyphLoader.onReady(t), e = new jbeeb.MediaController({
                    x: 0,
                    y: 0,
                    w: 1,
                    h: 1,
                    name: "WB",
                    noFullscreen: 1,
                    onReady: this.Sl.bind(this)
                }), e.addEventListener("launch", this.Uj, this), e.addEventListener("start", this.Vj, this), e.addEventListener("stop", this.Wj, this), e.addEventListener("done", this.ch, this), e.addEventListener("update", this._b, this), e.addEventListener("loading", this.Tl, this), e.addEventListener("disable", this.disable, this), this.ki = e, e.setVolume(1)
            }, t.Ul = 0, t.Sl = function() {
                this.Ul = 1, this.xk()
            }, t.xk = function() {
                this.Vl || this.Nl.ready && this.Ul && wimpy.glyphLoader.ready && (this.Vl = 1, this.Wl(), this.B.fire())
            }, t.Rl = function() {
                this.Nl.style.position = "fixed", this.Nl.addChild(this.ki), this.xk()
            }, t.Uj = function(t) {
                this.dispatchEvent("launch", t)
            }, t.Vj = function(t) {
                this.dispatchEvent("play", t), this.Xl(1)
            }, t.Wj = function(t) {
                this.dispatchEvent("pause", t), this.Xl(0)
            }, t.ch = function(t) {
                this.Pl.loop ? (this.Vc(), this.play()) : (this.dispatchEvent("done", t), this.rewind(!0))
            }, t._b = function(t) {
                var e, i, s;
                this.state = t, e = t.current, i = "", this.Ol > 100 && e > 0 && (s = this.Pl, s && (i = s.limit, i && e > i && this.stop())), this.dispatchEvent("runtime", t)
            }, t.Tl = function(t) {
                var e = t.status,
                    i = this.ri;
                200 > e && t.percent < .9 ? 0 == i && (i = 1, this.Yl(this.Pl, "thinking")) : 1 == i && (i = 0, this.Yl(this.Pl, "doneThinking")), this.ri = i, this.Ol = e, 300 == e ? this.li = -1 : this.li = t.percent || 0, this.dispatchEvent("thinking", this.ri), this.dispatchEvent("loading", t)
            }, t.Xl = function(t, e) {
                this.playing = t;
                var i = e || this.Pl;
                i && (i.playing = t)
            }, t.Zl = function(t) {
                t ? (this.Pl = t, this.Yl(t, "playing"), this.ki.play(t.file), this.setVolume(t.volume || this.Ag)) : (this.ki.play(), this.setVolume(this.Ag))
            }, t.play = function(t) {
                if (t) this.$l(), this.Pl = null, this.ki.play(t), this.Xl(1);
                else {
                    var e = this.Pl;
                    e && (this.Zl(e), this.Xl(1))
                }
            }, t._l = function(t) {
                this.Xl(1, t), this.Yl(t, "playing"), this.ki.play()
            }, t.am = function(t) {
                this.Xl(0, t), this.Yl(t, "paused"), this.ki.pause(!0)
            }, t.pause = function() {
                this.ki.pause(!0);
                var t = this.Pl;
                t && this.Yl(t, "paused"), this.Xl(0)
            }, t.rewind = function(t) {
                t ? this.am(this.Pl) : this.Zl(this.Pl), this.ki.setPlayheadPercent(0)
            }, t.Vc = function() {
                var t, e;
                for (this.am(), t = this.Ql, e = t.length; e--;) t[e].playing = -1;
                this.ki.reset(), this.$l(null), this.Xl(0)
            }, t.stop = function() {
                this.am(), this.rewind(!0)
            }, t.setVolume = function(t) {
                t = parseFloat(t), t > 1 ? t = 1 : 0 > t && (t = 0), this.Ag = t, this.ki.setVolume(t)
            }, t.getVolume = function(t) {
                return this.Ag
            }, t.Ql = null, t.Wl = function() {
                var t, e, i = document.querySelectorAll("[data-wimpybutton]", "[data-wimpyButton]");
                for (t = i.length; t--;) e = i[t], this.bm(e, jbeeb.Utils.getAttributes(e))
            }, t.deactivate = function(t) {
                var e, i, s, n;
                if (t && (e = this.cm(t)))
                    for (i = 0; i < this.Ql.length; i++)
                        if (s = this.Ql[i], s.element == e) {
                            this.Ql.splice(i, 1), n = e.style, n.userSelect = n.WebkitUserSelect = n.MozUserSelect = n.OUserSelect = "", n.MozUserSelect = "", n.cursor = "", jbeeb.Utils.unbindEvent(e, "mousedown", s.dm), jbeeb.Utils.unbindEvent(e, "mouseup", s.em);
                            break
                        }
            }, t.activate = function(t) {
                if (t) {
                    var e;
                    t.element ? e = t.element : t.id && "string" == typeof t.id && (e = document.getElementById(t.id)), e && this.bm(e, t)
                }
            }, t.bm = function(t, e) {
                var i, s, n, l, h, a, r, o, u, c, d, f, b, p, m = ((t.tagName + "").toLowerCase(), t.style);
                m.userSelect = m.WebkitUserSelect = m.MozUserSelect = m.OUserSelect = "none", m.MozUserSelect = "-moz-none", m.cursor = "pointer", i = ["media", "wimpybutton", "playtext", "pausetext", "loadingtext", "width", "height", "textsize", "loop", "volume", "limit"], s = ["loop"], n = {};
                for (l in e) h = l.replace("data-", "").toLowerCase(), i.indexOf(h) > -1 && (a = e[l], s.indexOf(h) > -1 && (a = jbeeb.Utils.isFalse(a) ? 0 : 1), n[h] = a);
                for (r = n.width, o = n.height, r && o ? this.setSize(t, r, o, n.textsize) : this.fm(t), u = {
                        id: t.id || jbeeb.getUID(),
                        element: t,
                        file: n.media || n.wimpybutton,
                        textPlay: n.playtext || null,
                        textPause: n.pausetext || null,
                        textLoading: n.loadingtext || null,
                        loop: n.loop || null,
                        volume: n.volume ? parseFloat(n.volume) || null : null,
                        limit: n.limit ? parseInt(n.limit) : null,
                        playing: -1
                    }, c = 0, d = 0; d < this.Ql.length; d++)
                    if (f = this.Ql[d], f.element == t) {
                        this.Ql[d] = u, c = 1;
                        break
                    }
                return c || (b = this.gm.bind(this), p = this.hm.bind(this), jbeeb.Utils.bindEvent(t, "mousedown", b), jbeeb.Utils.bindEvent(t, "mouseup", p), u.dm = b, u.em = p, this.Ql.push(u)), this.Yl(u, "reset"), t
            }, t.setSize = function(t, e, i, s) {
                var n, l, h, a, r = this.cm(t),
                    o = r.style,
                    u = 32,
                    c = 1.9;
                e ? (n = parseFloat(e) || u, o.width = n + "px") : o.width = null, i ? (l = parseFloat(i) || u, o.height = l + "px", s ? (h = parseFloat(s) || u / c, a = l / h, o.fontSize = h + "px", o.lineHeight = a + "em") : (h = l / c, a = l / h, o.fontSize = h + "px", o.lineHeight = a + "em")) : (o.height = null, o.fontSize = null, o.lineHeight = null)
            }, t.fm = function(t) {
                var e, i = this.cm(t);
                i && (e = i.style, e && (e.width && (e.width = null), e.height && (e.height = null), e.fontSize && (e.fontSize = null), e.lineHeight && (e.lineHeight = null)))
            }, t.Yl = function(t, e) {
                var i, s, n, l;
                t && ("paused" == e || "reset" == e ? (n = "reset" == e ? -1 : 0, i = "pause", s = "play", l = t.textPlay) : "thinking" == e ? (n = 1, i = "", s = "loading", l = t.textLoading) : "doneThinking" == e ? (n = 1, i = "loading", s = "", l = t.textPause) : (n = 1, i = "play", s = "pause", l = t.textPause), jbeeb.Utils.cssClassOps("replace", t.element, i, s), t.playing = n, l && (t.element.innerHTML = l))
            }, t.$l = function(t) {
                var e, i, s, n = null,
                    l = this.Ql;
                for (e = l.length; e--;) i = l[e], s = i.element, t == s ? n = i : (this.Yl(i, "reset"), i.playing = -1);
                return n
            }, t.im = function(t) {
                var e, i, s = null,
                    n = this.Ql;
                for (e = n.length; e--;) i = n[e], t == i.element && (s = i);
                return s
            }, t.setMedia = function(t, e, i) {
                var s = this.cm(t),
                    n = this.im(s);
                n && (n.file = e, i && ((this.playing || n.playing) && this.am(), this.Yl(n, "reset"), this.Zl(n)))
            }, t.cm = function(t) {
                var e;
                return "string" == typeof t ? e = document.getElementById(t) : jbeeb.Utils.isDomElement(t) ? e = t : t.element && (e = t.element), e
            }, t.gm = function(t) {
                var e = this.$l(t.target || t.srcElement);
                this.nf = e
            }, t.nf = null, t.hm = function(t) {
                this.nf = this.im(t.target || t.srcElement), new jbeeb.DelayCall(this.jm.bind(this), 50)
            }, t.jm = function() {
                var t = this.nf;
                t && (1 == t.playing ? this.am(t) : this.Zl(t))
            }, t.disable = function() {
                this.pause(), this.$l()
            }, wimpy.getButton = function(t) {
                return wimpy.getButtonBy("id", t)
            }, wimpy.getButtonBy = function(t, e) {
                var i, s, n;
                if (wimpyButton)
                    for (i = wimpyButton.Ql, s = 0; s < i.length; s++)
                        if (n = i[s], n[t] == e) return n;
                return null
            }, wimpy.getButtonList = function() {
                return wimpyButton ? wimpyButton.Ql : null
            }, wimpy.WButton = e
        }();
};