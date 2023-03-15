<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_9b746c48ec8a19e01d8022ece2ba8fac8d0af8a9226a2643eb4103617b26b632 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                options.maxTries = options.maxTries || 0;
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 !== xhr.readyState) {
                        return null;
                    }

                    if (xhr.status == 404 && options.maxTries > 1) {
                        setTimeout(function(){
                            options.maxTries--;
                            request(url, onSuccess, onError, payload, options);
                        }, 500);

                        return null;
                    }

                    if (200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className && el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                if (el.className) {
                    el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
                }
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) {
                    el.className += \" \" + klass;
                }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        '',
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  83 => 30,  79 => 29,  75 => 28,  70 => 26,  62 => 24,  32 => 6,  30 => 5,  26 => 3,  311 => 242,  302 => 236,  297 => 233,  293 => 232,  285 => 226,  262 => 212,  244 => 202,  236 => 196,  213 => 182,  195 => 172,  183 => 162,  860 => 655,  857 => 654,  853 => 652,  799 => 600,  791 => 599,  787 => 598,  779 => 592,  776 => 591,  768 => 588,  762 => 586,  745 => 526,  735 => 521,  642 => 435,  632 => 427,  630 => 426,  616 => 414,  606 => 410,  601 => 408,  596 => 406,  569 => 395,  565 => 393,  549 => 385,  539 => 381,  529 => 377,  520 => 373,  508 => 369,  502 => 366,  498 => 364,  489 => 361,  361 => 235,  355 => 233,  353 => 232,  349 => 231,  334 => 256,  320 => 212,  288 => 187,  281 => 183,  277 => 181,  267 => 177,  259 => 174,  255 => 172,  251 => 171,  246 => 169,  234 => 160,  225 => 154,  211 => 150,  204 => 176,  199 => 173,  181 => 161,  174 => 128,  170 => 127,  166 => 126,  154 => 123,  152 => 122,  128 => 100,  122 => 98,  120 => 97,  24 => 2,  22 => 2,  1040 => 654,  1036 => 652,  1009 => 627,  996 => 619,  985 => 615,  976 => 612,  971 => 611,  967 => 610,  962 => 608,  957 => 605,  953 => 604,  941 => 595,  936 => 592,  932 => 591,  922 => 584,  910 => 575,  902 => 574,  893 => 568,  889 => 567,  872 => 553,  868 => 552,  840 => 527,  815 => 505,  797 => 490,  770 => 468,  764 => 467,  753 => 463,  749 => 461,  741 => 525,  737 => 456,  732 => 520,  728 => 454,  703 => 431,  700 => 430,  687 => 419,  684 => 418,  650 => 440,  644 => 384,  627 => 370,  612 => 358,  597 => 346,  584 => 336,  570 => 324,  559 => 318,  548 => 314,  537 => 312,  533 => 311,  528 => 309,  525 => 308,  521 => 307,  505 => 302,  501 => 301,  496 => 299,  486 => 292,  482 => 290,  478 => 289,  464 => 277,  436 => 255,  416 => 251,  412 => 250,  408 => 248,  390 => 247,  378 => 238,  374 => 237,  370 => 236,  366 => 235,  362 => 234,  358 => 233,  354 => 232,  350 => 231,  346 => 229,  335 => 221,  332 => 220,  325 => 216,  321 => 249,  317 => 214,  308 => 212,  305 => 211,  303 => 210,  276 => 192,  272 => 219,  253 => 206,  248 => 203,  238 => 169,  231 => 168,  229 => 167,  223 => 189,  212 => 161,  208 => 149,  198 => 153,  192 => 141,  186 => 151,  171 => 145,  167 => 144,  163 => 142,  19 => 1,  2335 => 1968,  2332 => 1967,  2327 => 1963,  2324 => 1962,  2319 => 1942,  2316 => 1941,  2299 => 28,  2293 => 25,  2289 => 24,  2285 => 23,  2277 => 18,  2272 => 16,  2267 => 15,  2264 => 14,  2258 => 12,  2252 => 11,  2231 => 2184,  2201 => 2157,  2181 => 2140,  2174 => 2136,  2166 => 2131,  2161 => 2129,  2016 => 1987,  1997 => 1970,  1995 => 1967,  1991 => 1965,  1989 => 1962,  1974 => 1952,  1963 => 1944,  1961 => 1941,  1957 => 1940,  1644 => 1630,  1631 => 1620,  50 => 15,  42 => 12,  40 => 11,  34 => 8,  25 => 1,  112 => 30,  107 => 32,  105 => 30,  102 => 29,  99 => 28,  87 => 23,  84 => 22,  81 => 21,  76 => 15,  71 => 18,  69 => 15,  66 => 25,  63 => 13,  48 => 14,  45 => 5,  39 => 3,  1351 => 1007,  1348 => 1006,  1343 => 1003,  1340 => 1002,  1276 => 941,  1270 => 937,  1261 => 934,  1256 => 932,  1252 => 931,  1244 => 930,  1241 => 929,  1237 => 928,  1211 => 907,  813 => 511,  802 => 502,  789 => 485,  786 => 494,  775 => 489,  771 => 488,  765 => 587,  759 => 585,  755 => 481,  750 => 479,  746 => 478,  743 => 459,  739 => 476,  734 => 474,  722 => 469,  717 => 466,  713 => 465,  699 => 454,  683 => 441,  672 => 432,  670 => 431,  664 => 427,  599 => 365,  587 => 402,  581 => 401,  575 => 398,  561 => 392,  556 => 390,  552 => 337,  538 => 329,  534 => 379,  530 => 326,  526 => 325,  518 => 322,  514 => 372,  510 => 319,  503 => 315,  499 => 313,  497 => 312,  494 => 363,  479 => 309,  476 => 308,  473 => 307,  470 => 306,  467 => 305,  450 => 304,  448 => 303,  446 => 302,  257 => 116,  243 => 171,  222 => 153,  205 => 101,  194 => 93,  189 => 91,  182 => 87,  172 => 79,  161 => 141,  157 => 124,  148 => 71,  139 => 69,  135 => 67,  131 => 66,  94 => 23,  89 => 25,  86 => 28,  67 => 14,  64 => 13,  57 => 10,  54 => 9,  46 => 14,  41 => 4,  36 => 2,  33 => 2,);
    }
}
