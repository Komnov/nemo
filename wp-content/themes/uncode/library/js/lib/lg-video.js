/*!
 * lightgallery | 2.4.0 | January 29th 2022
 * http://www.lightgalleryjs.com/
 * Copyright (c) 2020 Sachin Neravath;
 * @license GPLv3
 */

(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
    typeof define === 'function' && define.amd ? define(factory) :
    (global = typeof globalThis !== 'undefined' ? globalThis : global || self, global.lgVideo = factory());
}(this, (function () { 'use strict';

    /*! *****************************************************************************
    Copyright (c) Microsoft Corporation.

    Permission to use, copy, modify, and/or distribute this software for any
    purpose with or without fee is hereby granted.

    THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
    REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
    AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
    INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
    LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
    OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
    PERFORMANCE OF THIS SOFTWARE.
    ***************************************************************************** */

    var __assign = function() {
        __assign = Object.assign || function __assign(t) {
            for (var s, i = 1, n = arguments.length; i < n; i++) {
                s = arguments[i];
                for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p)) t[p] = s[p];
            }
            return t;
        };
        return __assign.apply(this, arguments);
    };

    var videoSettings = {
        autoplayFirstVideo: true,
        youTubePlayerParams: false,
        vimeoPlayerParams: false,
        wistiaPlayerParams: false,
        gotoNextSlideOnVideoEnd: true,
        autoplayVideoOnSlide: false,
        videojs: false,
        videojsOptions: {},
    };

    /**
     * List of lightGallery events
     * All events should be documented here
     * Below interfaces are used to build the website documentations
     * */
    var lGEvents = {
        afterAppendSlide: 'lgAfterAppendSlide',
        init: 'lgInit',
        hasVideo: 'lgHasVideo',
        containerResize: 'lgContainerResize',
        updateSlides: 'lgUpdateSlides',
        afterAppendSubHtml: 'lgAfterAppendSubHtml',
        beforeOpen: 'lgBeforeOpen',
        afterOpen: 'lgAfterOpen',
        slideItemLoad: 'lgSlideItemLoad',
        beforeSlide: 'lgBeforeSlide',
        afterSlide: 'lgAfterSlide',
        posterClick: 'lgPosterClick',
        dragStart: 'lgDragStart',
        dragMove: 'lgDragMove',
        dragEnd: 'lgDragEnd',
        beforeNextSlide: 'lgBeforeNextSlide',
        beforePrevSlide: 'lgBeforePrevSlide',
        beforeClose: 'lgBeforeClose',
        afterClose: 'lgAfterClose',
        rotateLeft: 'lgRotateLeft',
        rotateRight: 'lgRotateRight',
        flipHorizontal: 'lgFlipHorizontal',
        flipVertical: 'lgFlipVertical',
        autoplay: 'lgAutoplay',
        autoplayStart: 'lgAutoplayStart',
        autoplayStop: 'lgAutoplayStop',
    };

    var param = function (obj) {
        return Object.keys(obj)
            .map(function (k) {
            return encodeURIComponent(k) + '=' + encodeURIComponent(obj[k]);
        })
            .join('&');
    };
    var getVimeoURLParams = function (defaultParams, videoInfo) {
        if (!videoInfo || !videoInfo.vimeo)
            return '';
        var urlParams = videoInfo.vimeo[2] || '';
        urlParams =
            urlParams[0] == '?' ? '&' + urlParams.slice(1) : urlParams || '';
        var defaultPlayerParams = defaultParams
            ? '&' + param(defaultParams)
            : '';
        // For vimeo last parms gets priority if duplicates found
        var vimeoPlayerParams = "?autoplay=0&muted=1" + defaultPlayerParams + urlParams;
        return vimeoPlayerParams;
    };

    /**
     * Video module for lightGallery
     * Supports HTML5, YouTube, Vimeo, wistia videos
     *
     *
     * @ref Wistia
     * https://wistia.com/support/integrations/wordpress(How to get url)
     * https://wistia.com/support/developers/embed-options#using-embed-options
     * https://wistia.com/support/developers/player-api
     * https://wistia.com/support/developers/construct-an-embed-code
     * http://jsfiddle.net/xvnm7xLm/
     * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video
     * https://wistia.com/support/embed-and-share/sharing-videos
     * https://private-sharing.wistia.com/medias/mwhrulrucj
     *
     * @ref Youtube
     * https://developers.google.com/youtube/player_parameters#enablejsapi
     * https://developers.google.com/youtube/iframe_api_reference
     * https://developer.chrome.com/blog/autoplay/#iframe-delegation
     *
     * @ref Vimeo
     * https://stackoverflow.com/questions/10488943/easy-way-to-get-vimeo-id-from-a-vimeo-url
     * https://vimeo.zendesk.com/hc/en-us/articles/360000121668-Starting-playback-at-a-specific-timecode
     * https://vimeo.zendesk.com/hc/en-us/articles/360001494447-Using-Player-Parameters
     */
    var Video = /** @class */ (function () {
        function Video(instance) {
            // get lightGallery core plugin instance
            this.core = instance;
            this.settings = __assign(__assign({}, videoSettings), this.core.settings);
            return this;
        }
        Video.prototype.init = function () {
            var _this = this;
            /**
             * Event triggered when video url found without poster
             * Append video HTML
             * Play if autoplayFirstVideo is true
             */
            this.core.LGel.on(lGEvents.hasVideo + ".video", this.onHasVideo.bind(this));
            this.core.LGel.on(lGEvents.posterClick + ".video", function () {
                var $el = _this.core.getSlideItem(_this.core.index);
                _this.loadVideoOnPosterClick($el);
            });
            this.core.LGel.on(lGEvents.slideItemLoad + ".video", this.onSlideItemLoad.bind(this));
            // @desc fired immediately before each slide transition.
            this.core.LGel.on(lGEvents.beforeSlide + ".video", this.onBeforeSlide.bind(this));
            // @desc fired immediately after each slide transition.
            this.core.LGel.on(lGEvents.afterSlide + ".video", this.onAfterSlide.bind(this));
        };
        /**
         * @desc Event triggered when a slide is completely loaded
         *
         * @param {Event} event - lightGalley custom event
         */
        Video.prototype.onSlideItemLoad = function (event) {
            var _this = this;
            var _a = event.detail, isFirstSlide = _a.isFirstSlide, index = _a.index;
            // Should check the active slide as well as user may have moved to different slide before the first slide is loaded
            if (this.settings.autoplayFirstVideo &&
                isFirstSlide &&
                index === this.core.index) {
                // Delay is just for the transition effect on video load
                setTimeout(function () {
                    _this.loadAndPlayVideo(index);
                }, 200);
            }
            // Should not call on first slide. should check only if the slide is active
            if (!isFirstSlide &&
                this.settings.autoplayVideoOnSlide &&
                index === this.core.index) {
                this.loadAndPlayVideo(index);
            }
        };
        /**
         * @desc Event triggered when video url or poster found
         * Append video HTML is poster is not given
         * Play if autoplayFirstVideo is true
         *
         * @param {Event} event - Javascript Event object.
         */
        Video.prototype.onHasVideo = function (event) {
            var _a = event.detail, index = _a.index, src = _a.src, html5Video = _a.html5Video, hasPoster = _a.hasPoster;
            if (!hasPoster) {
                // All functions are called separately if poster exist in loadVideoOnPosterClick function
                this.appendVideos(this.core.getSlideItem(index), {
                    src: src,
                    addClass: 'lg-object',
                    index: index,
                    html5Video: html5Video,
                });
                // Automatically navigate to next slide once video reaches the end.
                this.gotoNextSlideOnVideoEnd(src, index);
            }
        };
        /**
         * @desc fired immediately before each slide transition.
         * Pause the previous video
         * Hide the download button if the slide contains YouTube, Vimeo, or Wistia videos.
         *
         * @param {Event} event - Javascript Event object.
         * @param {number} prevIndex - Previous index of the slide.
         * @param {number} index - Current index of the slide
         */
        Video.prototype.onBeforeSlide = function (event) {
            if (this.core.lGalleryOn) {
                var prevIndex = event.detail.prevIndex;
                this.pauseVideo(prevIndex);
            }
            // Uncode edit ##START##
            var _a = event.detail, index = _a.index, src = _a.info.src;
            if ( typeof src !== 'undefined' && src.indexOf("autoplay") > -1 ) {
                this.loadAndPlayVideo(index);

	            var videoInfo = this.core.galleryItems[index].__slideVideoInfo || {},
	            	$videoElement = this.core.getSlideItem(index).find('.lg-video-object').first();
                if (videoInfo.vimeo) {
		            var vimeoPlayer = new Vimeo.Player($videoElement.get());
                    vimeoPlayer.on('play', function () {
                        vimeoPlayer.setCurrentTime(0);
                    });
                } else if ( videoInfo.youtube ) {
	                try {
			            $videoElement.get().contentWindow.postMessage("{\"event\":\"command\",\"func\":\"seekTo\",\"args\":[0, true]}", '*');
	                }
	                catch (e) {
	                    console.warn(e);
	                }
                }
            }
            // Uncode edit ##END##
        };
        /**
         * @desc fired immediately after each slide transition.
         * Play video if autoplayVideoOnSlide option is enabled.
         *
         * @param {Event} event - Javascript Event object.
         * @param {number} prevIndex - Previous index of the slide.
         * @param {number} index - Current index of the slide
         * @todo should check on onSlideLoad as well if video is not loaded on after slide
         */
        Video.prototype.onAfterSlide = function (event) {
            var _this = this;
            var _a = event.detail, index = _a.index, prevIndex = _a.prevIndex;
            // Do not call on first slide
            var $slide = this.core.getSlideItem(index);
            if (this.settings.autoplayVideoOnSlide && index !== prevIndex) {
                if ($slide.hasClass('lg-complete')) {
                    setTimeout(function () {
                        _this.loadAndPlayVideo(index);
                    }, 100);
                }
            }
        };
        Video.prototype.loadAndPlayVideo = function (index) {
            var $slide = this.core.getSlideItem(index);
            var currentGalleryItem = this.core.galleryItems[index];
            if (currentGalleryItem.poster) {
                this.loadVideoOnPosterClick($slide, true);
            }
            else {
	            //Uncode edit ##START##
                // this.playVideo(index);
	            var src = currentGalleryItem.src;
	            if ( typeof src !== 'undefined' && src.indexOf("autoplay") > -1) {
	                if ( this.core.index == index ) {
		                this.playVideo(index);
	                } else {
		                this.pauseVideo(index);
	                }
	            }
	            //Uncode edit ##END##
            }
        };
        /**
         * Play HTML5, Youtube, Vimeo or Wistia videos in a particular slide.
         * @param {number} index - Index of the slide
         */
        Video.prototype.playVideo = function (index) {
            this.controlVideo(index, 'play');
        };
        /**
         * Pause HTML5, Youtube, Vimeo or Wistia videos in a particular slide.
         * @param {number} index - Index of the slide
         */
        Video.prototype.pauseVideo = function (index) {
            this.controlVideo(index, 'pause');
        };
        Video.prototype.getVideoHtml = function (src, addClass, index, html5Video) {
            var video = '';
            var videoInfo = this.core.galleryItems[index]
                .__slideVideoInfo || {};
            var currentGalleryItem = this.core.galleryItems[index];
            var videoTitle = currentGalleryItem.title || currentGalleryItem.alt;
            videoTitle = videoTitle ? 'title="' + videoTitle + '"' : '';
            var commonIframeProps = "allowtransparency=\"true\"\n            frameborder=\"0\"\n            scrolling=\"no\"\n            allowfullscreen\n            mozallowfullscreen\n            webkitallowfullscreen\n            oallowfullscreen\n            msallowfullscreen";
            if (videoInfo.youtube) {
                var videoId = 'lg-youtube' + index;
                var slideUrlParams = videoInfo.youtube[2]
                    ? videoInfo.youtube[2] + '&'
                    : '';
                // For youtube first parms gets priority if duplicates found
                var youTubePlayerParams = "?" + slideUrlParams + "wmode=opaque&autoplay=0&mute=1&enablejsapi=1";
                var playerParams = youTubePlayerParams +
                    (this.settings.youTubePlayerParams
                        ? '&' + param(this.settings.youTubePlayerParams)
                        : '');
                video = "<iframe allow=\"autoplay\" id=" + videoId + " class=\"lg-video-object lg-youtube " + addClass + "\" " + videoTitle + " src=\"//www.youtube.com/embed/" + (videoInfo.youtube[1] + playerParams) + "\" " + commonIframeProps + "></iframe>";
            }
            else if (videoInfo.vimeo) {
                var videoId = 'lg-vimeo' + index;
                var playerParams = getVimeoURLParams(this.settings.vimeoPlayerParams, videoInfo);
                video = "<iframe allow=\"autoplay\" id=" + videoId + " class=\"lg-video-object lg-vimeo " + addClass + "\" " + videoTitle + " src=\"//player.vimeo.com/video/" + (videoInfo.vimeo[1] + playerParams) + "\" " + commonIframeProps + "></iframe>";
            }
            else if (videoInfo.wistia) {
                var wistiaId = 'lg-wistia' + index;
                var playerParams = param(this.settings.wistiaPlayerParams);
                playerParams = playerParams ? '?' + playerParams : '';
                video = "<iframe allow=\"autoplay\" id=\"" + wistiaId + "\" src=\"//fast.wistia.net/embed/iframe/" + (videoInfo.wistia[4] + playerParams) + "\" " + videoTitle + " class=\"wistia_embed lg-video-object lg-wistia " + addClass + "\" name=\"wistia_embed\" " + commonIframeProps + "></iframe>";
            }
            else if (videoInfo.html5) {
                var html5VideoMarkup = '';
                for (var i = 0; i < html5Video.source.length; i++) {
                    html5VideoMarkup += "<source src=\"" + html5Video.source[i].src + "\" type=\"" + html5Video.source[i].type + "\">";
                }
                if (html5Video.tracks) {
                    var _loop_1 = function (i) {
                        var trackAttributes = '';
                        var track = html5Video.tracks[i];
                        Object.keys(track || {}).forEach(function (key) {
                            trackAttributes += key + "=\"" + track[key] + "\" ";
                        });
                        html5VideoMarkup += "<track " + trackAttributes + ">";
                    };
                    for (var i = 0; i < html5Video.tracks.length; i++) {
                        _loop_1(i);
                    }
                }
                var html5VideoAttrs_1 = '';
                var videoAttributes_1 = html5Video.attributes || {};
                Object.keys(videoAttributes_1 || {}).forEach(function (key) {
                    html5VideoAttrs_1 += key + "=\"" + videoAttributes_1[key] + "\" ";
                });
                video = "<video class=\"lg-video-object lg-html5 " + (this.settings.videojs ? 'video-js' : '') + "\" " + html5VideoAttrs_1 + ">\n                " + html5VideoMarkup + "\n                Your browser does not support HTML5 video.\n            </video>";
            }
            return video;
        };
        /**
         * @desc - Append videos to the slide
         *
         * @param {HTMLElement} el - slide element
         * @param {Object} videoParams - Video parameters, Contains src, class, index, htmlVideo
         */
        Video.prototype.appendVideos = function (el, videoParams) {
            var _a;
            var videoHtml = this.getVideoHtml(videoParams.src, videoParams.addClass, videoParams.index, videoParams.html5Video);
            el.find('.lg-video-cont').append(videoHtml);
            var $videoElement = el.find('.lg-video-object').first();
            if (videoParams.html5Video) {
                $videoElement.on('mousedown.lg.video', function (e) {
                    e.stopPropagation();
                });
            }
            if (this.settings.videojs && ((_a = this.core.galleryItems[videoParams.index].__slideVideoInfo) === null || _a === void 0 ? void 0 : _a.html5)) {
                try {
                    return videojs($videoElement.get(), this.settings.videojsOptions);
                }
                catch (e) {
                    console.warn('lightGallery:- Make sure you have included videojs');
                }
            }
        };
        Video.prototype.gotoNextSlideOnVideoEnd = function (src, index) {
            var _this = this;
            var $videoElement = this.core
                .getSlideItem(index)
                .find('.lg-video-object')
                .first();
            var videoInfo = this.core.galleryItems[index].__slideVideoInfo || {};
            if (this.settings.gotoNextSlideOnVideoEnd) {
                if (videoInfo.html5) {
                    $videoElement.on('ended', function () {
                        _this.core.goToNextSlide();
                    });
                }
                else if (videoInfo.vimeo) {
                    try {
                        // https://github.com/vimeo/player.js/#ended
                        new Vimeo.Player($videoElement.get()).on('ended', function () {
                            _this.core.goToNextSlide();
                        });
                    }
                    catch (e) {
                        console.warn('lightGallery:- Make sure you have included //github.com/vimeo/player.js');
                    }
                }
                else if (videoInfo.wistia) {
                    try {
                        window._wq = window._wq || [];
                        // @todo Event is gettign triggered multiple times
                        window._wq.push({
                            id: $videoElement.attr('id'),
                            onReady: function (video) {
                                video.bind('end', function () {
                                    _this.core.goToNextSlide();
                                });
                            },
                        });
                    }
                    catch (e) {
                        console.warn('lightGallery:- Make sure you have included //fast.wistia.com/assets/external/E-v1.js');
                    }
                }
            }
        };
        Video.prototype.controlVideo = function (index, action) {
            var $videoElement = this.core
                .getSlideItem(index)
                .find('.lg-video-object')
                .first();
            var videoInfo = this.core.galleryItems[index].__slideVideoInfo || {};
            if (!$videoElement.get())
                return;
            if (videoInfo.youtube) {
                try {
                    $videoElement.get().contentWindow.postMessage("{\"event\":\"command\",\"func\":\"" + action + "Video\",\"args\":\"\"}", '*');
                }
                catch (e) {
                    console.warn("lightGallery:- " + e);
                }
            }
            else if (videoInfo.vimeo) {
                try {
                    new Vimeo.Player($videoElement.get())[action]();
                }
                catch (e) {
                    console.warn('lightGallery:- Make sure you have included //github.com/vimeo/player.js');
                }
            }
            else if (videoInfo.html5) {
                if (this.settings.videojs) {
                    try {
                        videojs($videoElement.get())[action]();
                    }
                    catch (e) {
                        console.warn('lightGallery:- Make sure you have included videojs');
                    }
                }
                else {
                    $videoElement.get()[action]();
                }
            }
            else if (videoInfo.wistia) {
                try {
                    window._wq = window._wq || [];
                    // @todo Find a way to destroy wistia player instance
                    window._wq.push({
                        id: $videoElement.attr('id'),
                        onReady: function (video) {
                            video[action]();
                        },
                    });
                }
                catch (e) {
                    console.warn('lightGallery:- Make sure you have included //fast.wistia.com/assets/external/E-v1.js');
                }
            }
        };
        Video.prototype.loadVideoOnPosterClick = function ($el, forcePlay) {
            var _this = this;
            // check slide has poster
            if (!$el.hasClass('lg-video-loaded')) {
                // check already video element present
                if (!$el.hasClass('lg-has-video')) {
                    $el.addClass('lg-has-video');
                    var _html = void 0;
                    var _src = this.core.galleryItems[this.core.index].src;
                    var video = this.core.galleryItems[this.core.index].video;
                    if (video) {
                        _html =
                            typeof video === 'string' ? JSON.parse(video) : video;
                    }
                    var videoJsPlayer_1 = this.appendVideos($el, {
                        src: _src,
                        addClass: '',
                        index: this.core.index,
                        html5Video: _html,
                    });
                    this.gotoNextSlideOnVideoEnd(_src, this.core.index);
                    var $tempImg = $el.find('.lg-object').first().get();
                    // @todo make sure it is working
                    $el.find('.lg-video-cont').first().append($tempImg);
                    $el.addClass('lg-video-loading');
                    videoJsPlayer_1 &&
                        videoJsPlayer_1.ready(function () {
                            videoJsPlayer_1.on('loadedmetadata', function () {
                                _this.onVideoLoadAfterPosterClick($el, _this.core.index);
                            });
                        });
                    $el.find('.lg-video-object')
                        .first()
                        .on('load.lg error.lg loadedmetadata.lg', function () {
                        setTimeout(function () {
                            _this.onVideoLoadAfterPosterClick($el, _this.core.index);
                        }, 50);
                    });
                }
                else {
                    this.playVideo(this.core.index);
                }
            }
            else if (forcePlay) {
                this.playVideo(this.core.index);
            }
        };
        Video.prototype.onVideoLoadAfterPosterClick = function ($el, index) {
            $el.addClass('lg-video-loaded');
            this.playVideo(index);
        };
        Video.prototype.destroy = function () {
            this.core.LGel.off('.lg.video');
            this.core.LGel.off('.video');
        };
        return Video;
    }());

    return Video;

})));
//# sourceMappingURL=lg-video.umd.js.map


/*! @vimeo/player v2.16.3 | (c) 2022 Vimeo | MIT License | https://github.com/vimeo/player.js */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):((e="undefined"!=typeof globalThis?globalThis:e||self).Vimeo=e.Vimeo||{},e.Vimeo.Player=t())}(this,function(){"use strict";function r(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var e="undefined"!=typeof global&&"[object global]"==={}.toString.call(global);function i(e,t){return 0===e.indexOf(t.toLowerCase())?e:"".concat(t.toLowerCase()).concat(e.substr(0,1).toUpperCase()).concat(e.substr(1))}function l(e){return/^(https?:)?\/\/((player|www)\.)?vimeo\.com(?=$|\/)/.test(e)}function u(e){var t=0<arguments.length&&void 0!==e?e:{},n=t.id,e=t.url,t=n||e;if(!t)throw new Error("An id or url must be passed, either in an options object or as a data-vimeo-id or data-vimeo-url attribute.");if(e=t,!isNaN(parseFloat(e))&&isFinite(e)&&Math.floor(e)==e)return"https://vimeo.com/".concat(t);if(l(t))return t.replace("http:","https:");if(n)throw new TypeError("???".concat(n,"??? is not a valid video id."));throw new TypeError("???".concat(t,"??? is not a vimeo.com url."))}var t=void 0!==Array.prototype.indexOf,Player="undefined"!=typeof window&&void 0!==window.postMessage;if(!(e||t&&Player))throw new Error("Sorry, the Vimeo Player API is not available in this browser.");var n,o,a="undefined"!=typeof globalThis?globalThis:"undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:{};function c(){if(void 0===this)throw new TypeError("Constructor WeakMap requires 'new'");if(o(this,"_id","_WeakMap_"+f()+"."+f()),0<arguments.length)throw new TypeError("WeakMap iterable is not supported")}function s(e,t){if(!d(e)||!n.call(e,"_id"))throw new TypeError(t+" method called on incompatible receiver "+typeof e)}function f(){return Math.random().toString().substring(2)}function d(e){return Object(e)===e}(Player="undefined"!=typeof self?self:"undefined"!=typeof window?window:a).WeakMap||(n=Object.prototype.hasOwnProperty,Player.WeakMap=((o=function(e,t,n){Object.defineProperty?Object.defineProperty(e,t,{configurable:!0,writable:!0,value:n}):e[t]=n})(c.prototype,"delete",function(e){if(s(this,"delete"),!d(e))return!1;var t=e[this._id];return!(!t||t[0]!==e)&&(delete e[this._id],!0)}),o(c.prototype,"get",function(e){if(s(this,"get"),d(e)){var t=e[this._id];return t&&t[0]===e?t[1]:void 0}}),o(c.prototype,"has",function(e){if(s(this,"has"),!d(e))return!1;var t=e[this._id];return!(!t||t[0]!==e)}),o(c.prototype,"set",function(e,t){if(s(this,"set"),!d(e))throw new TypeError("Invalid value used as weak map key");var n=e[this._id];return n&&n[0]===e?n[1]=t:o(e,this._id,[e,t]),this}),o(c,"_polyfill",!0),c));var h,m=(function(e){var t,n,r;r=function(){var t,n,r,o,i,e=Object.prototype.toString,a="undefined"!=typeof setImmediate?function(e){return setImmediate(e)}:setTimeout;try{Object.defineProperty({},"x",{}),t=function(e,t,n,r){return Object.defineProperty(e,t,{value:n,writable:!0,configurable:!1!==r})}}catch(e){t=function(e,t,n){return e[t]=n,e}}function u(e,t){this.fn=e,this.self=t,this.next=void 0}function l(e,t){y.add(e,t),n=n||a(y.drain)}function c(e){var t,n=typeof e;return"function"==typeof(t=null!=e&&("object"==n||"function"==n)?e.then:t)&&t}function s(){for(var e=0;e<this.chain.length;e++)!function(e,t,n){var r,o;try{!1===t?n.reject(e.msg):(r=!0===t?e.msg:t.call(void 0,e.msg))===n.promise?n.reject(TypeError("Promise-chain cycle")):(o=c(r))?o.call(r,n.resolve,n.reject):n.resolve(r)}catch(e){n.reject(e)}}(this,1===this.state?this.chain[e].success:this.chain[e].failure,this.chain[e]);this.chain.length=0}function f(e){var n,r=this;if(!r.triggered){r.triggered=!0,r.def&&(r=r.def);try{(n=c(e))?l(function(){var t=new m(r);try{n.call(e,function(){f.apply(t,arguments)},function(){d.apply(t,arguments)})}catch(e){d.call(t,e)}}):(r.msg=e,r.state=1,0<r.chain.length&&l(s,r))}catch(e){d.call(new m(r),e)}}}function d(e){var t=this;t.triggered||(t.triggered=!0,(t=t.def?t.def:t).msg=e,t.state=2,0<t.chain.length&&l(s,t))}function h(e,n,r,o){for(var t=0;t<n.length;t++)!function(t){e.resolve(n[t]).then(function(e){r(t,e)},o)}(t)}function m(e){this.def=e,this.triggered=!1}function v(e){this.promise=e,this.state=0,this.triggered=!1,this.chain=[],this.msg=void 0}function p(e){if("function"!=typeof e)throw TypeError("Not a function");if(0!==this.__NPO__)throw TypeError("Not a promise");this.__NPO__=1;var r=new v(this);this.then=function(e,t){var n={success:"function"!=typeof e||e,failure:"function"==typeof t&&t};return n.promise=new this.constructor(function(e,t){if("function"!=typeof e||"function"!=typeof t)throw TypeError("Not a function");n.resolve=e,n.reject=t}),r.chain.push(n),0!==r.state&&l(s,r),n.promise},this.catch=function(e){return this.then(void 0,e)};try{e.call(void 0,function(e){f.call(r,e)},function(e){d.call(r,e)})}catch(e){d.call(r,e)}}var y={add:function(e,t){i=new u(e,t),o?o.next=i:r=i,o=i,i=void 0},drain:function(){var e=r;for(r=o=n=void 0;e;)e.fn.call(e.self),e=e.next}},g=t({},"constructor",p,!1);return t(p.prototype=g,"__NPO__",0,!1),t(p,"resolve",function(n){return n&&"object"==typeof n&&1===n.__NPO__?n:new this(function(e,t){if("function"!=typeof e||"function"!=typeof t)throw TypeError("Not a function");e(n)})}),t(p,"reject",function(n){return new this(function(e,t){if("function"!=typeof e||"function"!=typeof t)throw TypeError("Not a function");t(n)})}),t(p,"all",function(t){var a=this;return"[object Array]"!=e.call(t)?a.reject(TypeError("Not an array")):0===t.length?a.resolve([]):new a(function(n,e){if("function"!=typeof n||"function"!=typeof e)throw TypeError("Not a function");var r=t.length,o=Array(r),i=0;h(a,t,function(e,t){o[e]=t,++i===r&&n(o)},e)})}),t(p,"race",function(t){var r=this;return"[object Array]"!=e.call(t)?r.reject(TypeError("Not an array")):new r(function(n,e){if("function"!=typeof n||"function"!=typeof e)throw TypeError("Not a function");h(r,t,function(e,t){n(t)},e)})}),p},(n=a)[t="Promise"]=n[t]||r(),e.exports&&(e.exports=n[t])}(h={exports:{}}),h.exports),v=new WeakMap;function p(e,t,n){var r=v.get(e.element)||{};t in r||(r[t]=[]),r[t].push(n),v.set(e.element,r)}function y(e,t){return(v.get(e.element)||{})[t]||[]}function g(e,t,n){var r=v.get(e.element)||{};if(!r[t])return!0;if(!n)return r[t]=[],v.set(e.element,r),!0;n=r[t].indexOf(n);return-1!==n&&r[t].splice(n,1),v.set(e.element,r),r[t]&&0===r[t].length}var w=["autopause","autoplay","background","byline","color","controls","dnt","height","id","interactiveparams","keyboard","loop","maxheight","maxwidth","muted","playsinline","portrait","responsive","speed","texttrack","title","transparent","url","width"];function b(r,e){return w.reduce(function(e,t){var n=r.getAttribute("data-vimeo-".concat(t));return!n&&""!==n||(e[t]=""===n?1:n),e},1<arguments.length&&void 0!==e?e:{})}function k(e,t){var n=e.html;if(!t)throw new TypeError("An element must be provided");if(null!==t.getAttribute("data-vimeo-initialized"))return t.querySelector("iframe");e=document.createElement("div");return e.innerHTML=n,t.appendChild(e.firstChild),t.setAttribute("data-vimeo-initialized","true"),t.querySelector("iframe")}function E(i,e,t){var a=1<arguments.length&&void 0!==e?e:{},u=2<arguments.length?t:void 0;return new Promise(function(t,n){if(!l(i))throw new TypeError("???".concat(i,"??? is not a vimeo.com url."));var e,r="https://vimeo.com/api/oembed.json?url=".concat(encodeURIComponent(i));for(e in a)a.hasOwnProperty(e)&&(r+="&".concat(e,"=").concat(encodeURIComponent(a[e])));var o=new("XDomainRequest"in window?XDomainRequest:XMLHttpRequest);o.open("GET",r,!0),o.onload=function(){if(404!==o.status)if(403!==o.status)try{var e=JSON.parse(o.responseText);if(403===e.domain_status_code)return k(e,u),void n(new Error("???".concat(i,"??? is not embeddable.")));t(e)}catch(e){n(e)}else n(new Error("???".concat(i,"??? is not embeddable.")));else n(new Error("???".concat(i,"??? was not found.")))},o.onerror=function(){var e=o.status?" (".concat(o.status,")"):"";n(new Error("There was an error fetching the embed code from Vimeo".concat(e,".")))},o.send()})}function T(e){function n(e){"console"in window&&console.warn&&console.warn("There was an error creating an embed: ".concat(e))}e=0<arguments.length&&void 0!==e?e:document,e=[].slice.call(e.querySelectorAll("[data-vimeo-id], [data-vimeo-url]"));e.forEach(function(t){try{if(null!==t.getAttribute("data-vimeo-defer"))return;var e=b(t);E(u(e),e,t).then(function(e){return k(e,t)}).catch(n)}catch(e){n(e)}})}function P(e){if("string"==typeof e)try{e=JSON.parse(e)}catch(e){return console.warn(e),{}}return e}function _(e,t,n){e.element.contentWindow&&e.element.contentWindow.postMessage&&(t={method:t},void 0!==n&&(t.value=n),8<=(n=parseFloat(navigator.userAgent.toLowerCase().replace(/^.*msie (\d+).*$/,"$1")))&&n<10&&(t=JSON.stringify(t)),e.element.contentWindow.postMessage(t,e.origin))}function M(n,r){var t,e,o,i,a=[];(r=P(r)).event?("error"===r.event&&y(n,r.data.method).forEach(function(e){var t=new Error(r.data.message);t.name=r.data.name,e.reject(t),g(n,r.data.method,e)}),a=y(n,"event:".concat(r.event)),t=r.data):r.method&&(e=n,o=r.method,(i=!((i=y(e,o)).length<1)&&(i=i.shift(),g(e,o,i),i))&&(a.push(i),t=r.value)),a.forEach(function(e){try{if("function"==typeof e)return void e.call(n,t);e.resolve(t)}catch(e){}})}var N,F,x,C=new WeakMap,j=new WeakMap,A={},Player=function(){function Player(i){var e,a=this,t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:{};if(!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,Player),window.jQuery&&i instanceof jQuery&&(1<i.length&&window.console&&console.warn&&console.warn("A jQuery object with multiple elements was passed, using the first element."),i=i[0]),"undefined"!=typeof document&&"string"==typeof i&&(i=document.getElementById(i)),e=i,!Boolean(e&&1===e.nodeType&&"nodeName"in e&&e.ownerDocument&&e.ownerDocument.defaultView))throw new TypeError("You must pass either a valid element or a valid id.");if("IFRAME"===i.nodeName||(r=i.querySelector("iframe"))&&(i=r),"IFRAME"===i.nodeName&&!l(i.getAttribute("src")||""))throw new Error("The player element passed isn???t a Vimeo embed.");if(C.has(i))return C.get(i);this._window=i.ownerDocument.defaultView,this.element=i,this.origin="*";var n,r=new m(function(r,o){var e;a._onMessage=function(e){if(l(e.origin)&&a.element.contentWindow===e.source){"*"===a.origin&&(a.origin=e.origin);var t=P(e.data);if(t&&"error"===t.event&&t.data&&"ready"===t.data.method){var n=new Error(t.data.message);return n.name=t.data.name,void o(n)}e=t&&"ready"===t.event,n=t&&"ping"===t.method;if(e||n)return a.element.setAttribute("data-ready","true"),void r();M(a,t)}},a._window.addEventListener("message",a._onMessage),"IFRAME"!==a.element.nodeName&&E(u(e=b(i,t)),e,i).then(function(e){var t,n,r=k(e,i);return a.element=r,a._originalElement=i,t=i,n=r,r=v.get(t),v.set(n,r),v.delete(t),C.set(a.element,a),e}).catch(o)});return j.set(this,r),C.set(this.element,this),"IFRAME"===this.element.nodeName&&_(this,"ping"),A.isEnabled&&(n=function(){return A.exit()},this.fullscreenchangeHandler=function(){(A.isFullscreen?p:g)(a,"event:exitFullscreen",n),a.ready().then(function(){_(a,"fullscreenchange",A.isFullscreen)})},A.on("fullscreenchange",this.fullscreenchangeHandler)),this}var e,t,n;return e=Player,(t=[{key:"callMethod",value:function(n){var r=this,o=1<arguments.length&&void 0!==arguments[1]?arguments[1]:{};return new m(function(e,t){return r.ready().then(function(){p(r,n,{resolve:e,reject:t}),_(r,n,o)}).catch(t)})}},{key:"get",value:function(n){var r=this;return new m(function(e,t){return n=i(n,"get"),r.ready().then(function(){p(r,n,{resolve:e,reject:t}),_(r,n)}).catch(t)})}},{key:"set",value:function(n,r){var o=this;return new m(function(e,t){if(n=i(n,"set"),null==r)throw new TypeError("There must be a value to set.");return o.ready().then(function(){p(o,n,{resolve:e,reject:t}),_(o,n,r)}).catch(t)})}},{key:"on",value:function(e,t){if(!e)throw new TypeError("You must pass an event name.");if(!t)throw new TypeError("You must pass a callback function.");if("function"!=typeof t)throw new TypeError("The callback must be a function.");0===y(this,"event:".concat(e)).length&&this.callMethod("addEventListener",e).catch(function(){}),p(this,"event:".concat(e),t)}},{key:"off",value:function(e,t){if(!e)throw new TypeError("You must pass an event name.");if(t&&"function"!=typeof t)throw new TypeError("The callback must be a function.");g(this,"event:".concat(e),t)&&this.callMethod("removeEventListener",e).catch(function(e){})}},{key:"loadVideo",value:function(e){return this.callMethod("loadVideo",e)}},{key:"ready",value:function(){var e=j.get(this)||new m(function(e,t){t(new Error("Unknown player. Probably unloaded."))});return m.resolve(e)}},{key:"addCuePoint",value:function(e){return this.callMethod("addCuePoint",{time:e,data:1<arguments.length&&void 0!==arguments[1]?arguments[1]:{}})}},{key:"removeCuePoint",value:function(e){return this.callMethod("removeCuePoint",e)}},{key:"enableTextTrack",value:function(e,t){if(!e)throw new TypeError("You must pass a language.");return this.callMethod("enableTextTrack",{language:e,kind:t})}},{key:"disableTextTrack",value:function(){return this.callMethod("disableTextTrack")}},{key:"pause",value:function(){return this.callMethod("pause")}},{key:"play",value:function(){return this.callMethod("play")}},{key:"requestFullscreen",value:function(){return A.isEnabled?A.request(this.element):this.callMethod("requestFullscreen")}},{key:"exitFullscreen",value:function(){return A.isEnabled?A.exit():this.callMethod("exitFullscreen")}},{key:"getFullscreen",value:function(){return A.isEnabled?m.resolve(A.isFullscreen):this.get("fullscreen")}},{key:"requestPictureInPicture",value:function(){return this.callMethod("requestPictureInPicture")}},{key:"exitPictureInPicture",value:function(){return this.callMethod("exitPictureInPicture")}},{key:"getPictureInPicture",value:function(){return this.get("pictureInPicture")}},{key:"unload",value:function(){return this.callMethod("unload")}},{key:"destroy",value:function(){var n=this;return new m(function(e){var t;j.delete(n),C.delete(n.element),n._originalElement&&(C.delete(n._originalElement),n._originalElement.removeAttribute("data-vimeo-initialized")),n.element&&"IFRAME"===n.element.nodeName&&n.element.parentNode&&(n.element.parentNode.parentNode&&n._originalElement&&n._originalElement!==n.element.parentNode?n.element.parentNode.parentNode.removeChild(n.element.parentNode):n.element.parentNode.removeChild(n.element)),n.element&&"DIV"===n.element.nodeName&&n.element.parentNode&&(n.element.removeAttribute("data-vimeo-initialized"),(t=n.element.querySelector("iframe"))&&t.parentNode&&(t.parentNode.parentNode&&n._originalElement&&n._originalElement!==t.parentNode?t.parentNode.parentNode.removeChild(t.parentNode):t.parentNode.removeChild(t))),n._window.removeEventListener("message",n._onMessage),A.isEnabled&&A.off("fullscreenchange",n.fullscreenchangeHandler),e()})}},{key:"getAutopause",value:function(){return this.get("autopause")}},{key:"setAutopause",value:function(e){return this.set("autopause",e)}},{key:"getBuffered",value:function(){return this.get("buffered")}},{key:"getCameraProps",value:function(){return this.get("cameraProps")}},{key:"setCameraProps",value:function(e){return this.set("cameraProps",e)}},{key:"getChapters",value:function(){return this.get("chapters")}},{key:"getCurrentChapter",value:function(){return this.get("currentChapter")}},{key:"getColor",value:function(){return this.get("color")}},{key:"setColor",value:function(e){return this.set("color",e)}},{key:"getCuePoints",value:function(){return this.get("cuePoints")}},{key:"getCurrentTime",value:function(){return this.get("currentTime")}},{key:"setCurrentTime",value:function(e){return this.set("currentTime",e)}},{key:"getDuration",value:function(){return this.get("duration")}},{key:"getEnded",value:function(){return this.get("ended")}},{key:"getLoop",value:function(){return this.get("loop")}},{key:"setLoop",value:function(e){return this.set("loop",e)}},{key:"setMuted",value:function(e){return this.set("muted",e)}},{key:"getMuted",value:function(){return this.get("muted")}},{key:"getPaused",value:function(){return this.get("paused")}},{key:"getPlaybackRate",value:function(){return this.get("playbackRate")}},{key:"setPlaybackRate",value:function(e){return this.set("playbackRate",e)}},{key:"getPlayed",value:function(){return this.get("played")}},{key:"getQualities",value:function(){return this.get("qualities")}},{key:"getQuality",value:function(){return this.get("quality")}},{key:"setQuality",value:function(e){return this.set("quality",e)}},{key:"getSeekable",value:function(){return this.get("seekable")}},{key:"getSeeking",value:function(){return this.get("seeking")}},{key:"getTextTracks",value:function(){return this.get("textTracks")}},{key:"getVideoEmbedCode",value:function(){return this.get("videoEmbedCode")}},{key:"getVideoId",value:function(){return this.get("videoId")}},{key:"getVideoTitle",value:function(){return this.get("videoTitle")}},{key:"getVideoWidth",value:function(){return this.get("videoWidth")}},{key:"getVideoHeight",value:function(){return this.get("videoHeight")}},{key:"getVideoUrl",value:function(){return this.get("videoUrl")}},{key:"getVolume",value:function(){return this.get("volume")}},{key:"setVolume",value:function(e){return this.set("volume",e)}}])&&r(e.prototype,t),n&&r(e,n),Player}();return e||(N=function(){for(var e,t=[["requestFullscreen","exitFullscreen","fullscreenElement","fullscreenEnabled","fullscreenchange","fullscreenerror"],["webkitRequestFullscreen","webkitExitFullscreen","webkitFullscreenElement","webkitFullscreenEnabled","webkitfullscreenchange","webkitfullscreenerror"],["webkitRequestFullScreen","webkitCancelFullScreen","webkitCurrentFullScreenElement","webkitCancelFullScreen","webkitfullscreenchange","webkitfullscreenerror"],["mozRequestFullScreen","mozCancelFullScreen","mozFullScreenElement","mozFullScreenEnabled","mozfullscreenchange","mozfullscreenerror"],["msRequestFullscreen","msExitFullscreen","msFullscreenElement","msFullscreenEnabled","MSFullscreenChange","MSFullscreenError"]],n=0,r=t.length,o={};n<r;n++)if((e=t[n])&&e[1]in document){for(n=0;n<e.length;n++)o[t[0][n]]=e[n];return o}return!1}(),F={fullscreenchange:N.fullscreenchange,fullscreenerror:N.fullscreenerror},x={request:function(o){return new Promise(function(e,t){function n(){x.off("fullscreenchange",n),e()}x.on("fullscreenchange",n);var r=(o=o||document.documentElement)[N.requestFullscreen]();r instanceof Promise&&r.then(n).catch(t)})},exit:function(){return new Promise(function(t,e){var n,r;x.isFullscreen?(n=function e(){x.off("fullscreenchange",e),t()},x.on("fullscreenchange",n),(r=document[N.exitFullscreen]())instanceof Promise&&r.then(n).catch(e)):t()})},on:function(e,t){e=F[e];e&&document.addEventListener(e,t)},off:function(e,t){e=F[e];e&&document.removeEventListener(e,t)}},Object.defineProperties(x,{isFullscreen:{get:function(){return Boolean(document[N.fullscreenElement])}},element:{enumerable:!0,get:function(){return document[N.fullscreenElement]}},isEnabled:{enumerable:!0,get:function(){return Boolean(document[N.fullscreenEnabled])}}}),A=x,T(),function(e){var r=0<arguments.length&&void 0!==e?e:document;window.VimeoPlayerResizeEmbeds_||(window.VimeoPlayerResizeEmbeds_=!0,window.addEventListener("message",function(e){if(l(e.origin)&&e.data&&"spacechange"===e.data.event)for(var t=r.querySelectorAll("iframe"),n=0;n<t.length;n++)if(t[n].contentWindow===e.source){t[n].parentElement.style.paddingBottom="".concat(e.data.data[0].bottom,"px");break}}))}()),Player});
