'use strict';
/**
 * IIFE
 *
 * 1. Create the module execution controller (MEC);
 * 2. Create the application controller for SmoothState and Mapping;
 * 3. Attach our app's initializer and the MEC's executor to jQuery's Ready handler (executes once);
 * 4. Replace jQuery's Ready handler with the MEC's registrar;
 * 5. Attach a module to the MEC (executes on jQuery's onReady event and all SmoothState onAfter events);
 */
 var app = {};
 ;
 (function($) {
    var $doc = $(document);
    /** [1] */
    $.readyFn = {
        list: [],
        register: function(fn) {
            console.log('Module Registered');
            $.readyFn.list.push(fn);
        },
        execute: function() {
            console.log('Modules Executing');
            for (var i = 0; i < $.readyFn.list.length; i++) {
                try {
                    $.readyFn.list[i].apply(document, [$]);
                } catch (e) {
                    throw e;
                }
            };
        }
    };
    /** [2] */
    app = {
        initSmoothState: function() {
            console.log('Module Executed: Smooth State');
            var $page = $('#page'),
            options = {
                debug: true,
                prefetch: true,
                    // cacheLength: 2,
                    anchors: 'a',
                    forms: false,
                    blacklist: 'input[type="submit"]',
                    blacklist: '.wp-link', 
                    blacklist: '.woocommerce-LoopProduct-link',
                    blacklist: ".no-smoothstate, .post-edit-link,  a[href*='.jpg'], a[href*='.png'], a[href*='.jpeg'], a[href*='.pdf']",
                    onStart: {
                        duration: 0,
                        render: function($container) {
                            // Add your CSS animation reversing class
                            $container.addClass('slide-out');
                            // Restart your animation
                            app.smoothState.restartCSSAnimations();
                            $(".edit-link").hide();
                            $('#footer').removeClass('slideInUp');
                            $('#footer').addClass('slideOutDown');
                        }
                    },
                    onReady: {
                        duration: 0,
                        render: function($container, $newContent) {
                            // Remove your CSS animation reversing class
                            $container.removeClass('slide-out');
                            // Inject the new content
                            $container.html($newContent);
                            $('html, body').animate({ scrollTop: 0 }, 0);
                        }
                    },
                    onEnd: {
                        duration: 0, // Duration of the animations, if any.
                        render: function(url, $container, $content) {
                            $body.css('cursor', 'auto');
                            $body.find('a').css('cursor', 'auto');
                            $container.html($content);
                            // Trigger document.ready and window.load
                            $(document).ready();
                            $(window).trigger('load');
                        }
                    },
                    onAfter: function($container, $newContent) {
                        $.readyFn.execute();
                        var el = document.querySelector('.ajax-load-more-wrap');
                        ajaxloadmore.start(el);
                        $('.woocommerce-product-gallery').each(function() {
                            $(this).wc_product_gallery();
                        });
                        $(window).triggerHandler('load');
                    }
                };
                this.smoothState = $page.smoothState(options).data('smoothState');
            },
        };
        /** [3] */
        $doc.ready(function() {
            console.log('Initial Document Ready');
            app.initSmoothState();
            $.readyFn.execute();
        });
        /** [4] */
        $.fn.ready = $.readyFn.register;
    })(jQuery);
    /** [5] */
    jQuery(document).ready(function($) {
    // app.initSlick();
    // app.initStoreLocator();
});
    jQuery(document).ready(function($) {
        $('.modalbtn').addClass('no-smoothstate');
        $('.product-remove a').addClass('no-smoothstate');
        $('.single_add_to_cart_button').addClass('no-smoothstate');
        $('.checkout-button').addClass('no-smoothstate');
        $('.buttons a').addClass('no-smoothstate');
        $('.woocommerce-MyAccount-navigation-link--payment-methods a').addClass('no-smoothstate');
    });
    jQuery(document).mouseup(function (e){
        var container = jQuery(".woocommerce-message");
        var containerfade = jQuery(".woocommerce-message-overlay");
        if (!container.is(e.target) && container.has(e.target).length === 0){
            containerfade.fadeOut();
        }
    }); 
    jQuery(document).ready(function($) {
        $(document).on("click",".close-button",function() {
        // alert("click bound to document listening for #test-element");
        $(this).closest(".woocommerce-message-overlay").fadeOut(300);
    });
    });
    jQuery(document).ready(function($) {
        if ($("#shipping_method_0_flat_rate1").length) {
            jQuery(".cart-collaterals #shipping_method").append('<li style="opacity: 0.5;"><input disabled type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate6" value="flat_rate:6" class="shipping_method"><label for="shipping_method_0_flat_rate6">Local Delivery: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>15.00</span></label></li>');
            setTimeout(function() {
                jQuery(".woocommerce-checkout-review-order-table #shipping_method").append('<li style="opacity: 0.5;"><input disabled type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate6" value="flat_rate:6" class="shipping_method"><label for="shipping_method_0_flat_rate6">Local Delivery: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>15.00</span></label></li>');
            }, 2000); 
        }
        else{
            jQuery(".cart-collaterals #shipping_method").append('<li style="opacity: 0.5;"><input disabled type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate1" value="flat_rate:1" class="shipping_method"><label for="shipping_method_0_flat_rate6">Shipping: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>15.00</span></label></li>');
            setTimeout(function() {
                jQuery(".woocommerce-checkout-review-order-table #shipping_method").append('<li style="opacity: 0.5;"><input disabled type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate1" value="flat_rate:1" class="shipping_method"><label for="shipping_method_0_flat_rate6">Shipping: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>15.00</span></label></li>');
            }, 2000); 
        }
    });
    jQuery(document).ready(function($) {
        if ($("#shipping_method_0_flat_rate6").length) {
        }
        else{
            // jQuery(".cart-collaterals #shipping_method").append('<li style="opacity: 0.5;"><input disabled type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate6" value="flat_rate:6" class="shipping_method"><label for="shipping_method_0_flat_rate6">Local Delivery: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>15.00</span></label></li>');
            // setTimeout(function() {
            //     jQuery(".woocommerce-checkout-review-order-table #shipping_method").append('<li style="opacity: 0.5;"><input disabled type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate6" value="flat_rate:6" class="shipping_method"><label for="shipping_method_0_flat_rate6">Local Delivery: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>15.00</span></label></li>');
            // }, 5000); 
        }
    });
    jQuery(document).ready(function($) {
        var docHeight = $(window).height();
        var footerHeight = $('#footer').height();
        var footerTop = $('#footer').position().top + footerHeight;
        if (footerTop < docHeight) {
            $('#footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
        }
    });
    jQuery(document).ready(function($) {
        $(".expand-show").click(function() {
            var target = $(this).parent().children(".expand-hide");
            $(target).slideToggle();
        });
    });
// Modals
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*!
 * Generated using the Bootstrap Customizer (http://getbootstrap.com/customize/?id=4cc52633a8e49b1aac11)
 * Config saved to config.json and https://gist.github.com/4cc52633a8e49b1aac11
 */
 if (typeof jQuery === 'undefined') {
    throw new Error('Bootstrap\'s JavaScript requires jQuery')
} +
function($) {
    'use strict';
    var version = $.fn.jquery.split(' ')[0].split('.')
    if ((version[0] < 2 && version[1] < 9) || (version[0] == 1 && version[1] == 9 && version[2] < 1)) {
        throw new Error('Bootstrap\'s JavaScript requires jQuery version 1.9.1 or higher')
    }
}(jQuery);
/* ========================================================================
 * Bootstrap: modal.js v3.3.4
 * http://getbootstrap.com/javascript/#modals
 * ========================================================================
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */
 +
 function($) {
    'use strict';
    // MODAL CLASS DEFINITION
    // ======================
    var Modal = function(element, options) {
        this.options = options
        this.$body = $(document.body)
        this.$element = $(element)
        this.$dialog = this.$element.find('.modal-dialog')
        this.$backdrop = null
        this.isShown = null
        this.originalBodyPad = null
        this.scrollbarWidth = 0
        this.ignoreBackdropClick = false
        if (this.options.remote) {
            this.$element
            .find('.modal-content')
            .load(this.options.remote, $.proxy(function() {
                this.$element.trigger('loaded.bs.modal')
            }, this))
        }
    }
    Modal.VERSION = '3.3.4'
    Modal.TRANSITION_DURATION = 300
    Modal.BACKDROP_TRANSITION_DURATION = 150
    Modal.DEFAULTS = {
        backdrop: true,
        keyboard: true,
        show: true
    }
    Modal.prototype.toggle = function(_relatedTarget) {
        return this.isShown ? this.hide() : this.show(_relatedTarget)
    }
    Modal.prototype.show = function(_relatedTarget) {
        var that = this
        var e = $.Event('show.bs.modal', { relatedTarget: _relatedTarget })
        this.$element.trigger(e)
        if (this.isShown || e.isDefaultPrevented()) return
            this.isShown = true
        this.checkScrollbar()
        this.setScrollbar()
        this.$body.addClass('modal-open')
        this.escape()
        this.resize()
        this.$element.on('click.dismiss.bs.modal', '[data-dismiss="modal"]', $.proxy(this.hide, this))
        this.$dialog.on('mousedown.dismiss.bs.modal', function() {
            that.$element.one('mouseup.dismiss.bs.modal', function(e) {
                if ($(e.target).is(that.$element)) that.ignoreBackdropClick = true
            })
        })
        this.backdrop(function() {
            var transition = $.support.transition && that.$element.hasClass('fade')
            if (!that.$element.parent().length) {
                that.$element.appendTo(that.$body) // don't move modals dom position
            }
            that.$element
            .show()
            .scrollTop(0)
            that.adjustDialog()
            if (transition) {
                that.$element[0].offsetWidth // force reflow
            }
            that.$element
            .addClass('in')
            .attr('aria-hidden', false)
            that.enforceFocus()
            var e = $.Event('shown.bs.modal', { relatedTarget: _relatedTarget })
            transition ?
                that.$dialog // wait for modal to slide in
                .one('bsTransitionEnd', function() {
                    that.$element.trigger('focus').trigger(e)
                })
                .emulateTransitionEnd(Modal.TRANSITION_DURATION) :
                that.$element.trigger('focus').trigger(e)
            })
    }
    Modal.prototype.hide = function(e) {
        if (e) e.preventDefault()
            e = $.Event('hide.bs.modal')
        this.$element.trigger(e)
        if (!this.isShown || e.isDefaultPrevented()) return
            this.isShown = false
        this.escape()
        this.resize()
        $(document).off('focusin.bs.modal')
        this.$element
        .removeClass('in')
        .attr('aria-hidden', true)
        .off('click.dismiss.bs.modal')
        .off('mouseup.dismiss.bs.modal')
        this.$dialog.off('mousedown.dismiss.bs.modal')
        $.support.transition && this.$element.hasClass('fade') ?
        this.$element
        .one('bsTransitionEnd', $.proxy(this.hideModal, this))
        .emulateTransitionEnd(Modal.TRANSITION_DURATION) :
        this.hideModal()
    }
    Modal.prototype.enforceFocus = function() {
        $(document)
            .off('focusin.bs.modal') // guard against infinite focus loop
            .on('focusin.bs.modal', $.proxy(function(e) {
                if (this.$element[0] !== e.target && !this.$element.has(e.target).length) {
                    this.$element.trigger('focus')
                }
            }, this))
        }
        Modal.prototype.escape = function() {
            if (this.isShown && this.options.keyboard) {
                this.$element.on('keydown.dismiss.bs.modal', $.proxy(function(e) {
                    e.which == 27 && this.hide()
                }, this))
            } else if (!this.isShown) {
                this.$element.off('keydown.dismiss.bs.modal')
            }
        }
        Modal.prototype.resize = function() {
            if (this.isShown) {
                $(window).on('resize.bs.modal', $.proxy(this.handleUpdate, this))
            } else {
                $(window).off('resize.bs.modal')
            }
        }
        Modal.prototype.hideModal = function() {
            var that = this
            this.$element.hide()
            this.backdrop(function() {
                that.$body.removeClass('modal-open')
                that.resetAdjustments()
                that.resetScrollbar()
                that.$element.trigger('hidden.bs.modal')
            })
        }
        Modal.prototype.removeBackdrop = function() {
            this.$backdrop && this.$backdrop.remove()
            this.$backdrop = null
        }
        Modal.prototype.backdrop = function(callback) {
            var that = this
            var animate = this.$element.hasClass('fade') ? 'fade' : ''
            if (this.isShown && this.options.backdrop) {
                var doAnimate = $.support.transition && animate
                this.$backdrop = $('<div class="modal-backdrop ' + animate + '" />')
                .appendTo(this.$body)
                this.$element.on('click.dismiss.bs.modal', $.proxy(function(e) {
                    if (this.ignoreBackdropClick) {
                        this.ignoreBackdropClick = false
                        return
                    }
                    if (e.target !== e.currentTarget) return
                        this.options.backdrop == 'static' ?
                    this.$element[0].focus() :
                    this.hide()
                }, this))
            if (doAnimate) this.$backdrop[0].offsetWidth // force reflow
                this.$backdrop.addClass('in')
            if (!callback) return
                doAnimate ?
            this.$backdrop
            .one('bsTransitionEnd', callback)
            .emulateTransitionEnd(Modal.BACKDROP_TRANSITION_DURATION) :
            callback()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass('in')
            var callbackRemove = function() {
                that.removeBackdrop()
                callback && callback()
            }
            $.support.transition && this.$element.hasClass('fade') ?
            this.$backdrop
            .one('bsTransitionEnd', callbackRemove)
            .emulateTransitionEnd(Modal.BACKDROP_TRANSITION_DURATION) :
            callbackRemove()
        } else if (callback) {
            callback()
        }
    }
    // these following methods are used to handle overflowing modals
    Modal.prototype.handleUpdate = function() {
        this.adjustDialog()
    }
    Modal.prototype.adjustDialog = function() {
        var modalIsOverflowing = this.$element[0].scrollHeight > document.documentElement.clientHeight
        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && modalIsOverflowing ? this.scrollbarWidth : '',
            paddingRight: this.bodyIsOverflowing && !modalIsOverflowing ? this.scrollbarWidth : ''
        })
    }
    Modal.prototype.resetAdjustments = function() {
        this.$element.css({
            paddingLeft: '',
            paddingRight: ''
        })
    }
    Modal.prototype.checkScrollbar = function() {
        var fullWindowWidth = window.innerWidth
        if (!fullWindowWidth) { // workaround for missing window.innerWidth in IE8
            var documentElementRect = document.documentElement.getBoundingClientRect()
            fullWindowWidth = documentElementRect.right - Math.abs(documentElementRect.left)
        }
        this.bodyIsOverflowing = document.body.clientWidth < fullWindowWidth
        this.scrollbarWidth = this.measureScrollbar()
    }
    Modal.prototype.setScrollbar = function() {
        var bodyPad = parseInt((this.$body.css('padding-right') || 0), 10)
        this.originalBodyPad = document.body.style.paddingRight || ''
        if (this.bodyIsOverflowing) this.$body.css('padding-right', bodyPad + this.scrollbarWidth)
    }
Modal.prototype.resetScrollbar = function() {
    this.$body.css('padding-right', this.originalBodyPad)
}
    Modal.prototype.measureScrollbar = function() { // thx walsh
        var scrollDiv = document.createElement('div')
        scrollDiv.className = 'modal-scrollbar-measure'
        this.$body.append(scrollDiv)
        var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth
        this.$body[0].removeChild(scrollDiv)
        return scrollbarWidth
    }
    // MODAL PLUGIN DEFINITION
    // =======================
    function Plugin(option, _relatedTarget) {
        return this.each(function() {
            var $this = $(this)
            var data = $this.data('bs.modal')
            var options = $.extend({}, Modal.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data) $this.data('bs.modal', (data = new Modal(this, options)))
                if (typeof option == 'string') data[option](_relatedTarget)
                    else if (options.show) data.show(_relatedTarget)
                })
    }
    var old = $.fn.modal
    $.fn.modal = Plugin
    $.fn.modal.Constructor = Modal
    // MODAL NO CONFLICT
    // =================
    $.fn.modal.noConflict = function() {
        $.fn.modal = old
        return this
    }
    // MODAL DATA-API
    // ==============
    $(document).on('click.bs.modal.data-api', '[data-toggle="modal"]', function(e) {
        var $this = $(this)
        var href = $this.attr('href')
        var $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))) // strip for ie7
        var option = $target.data('bs.modal') ? 'toggle' : $.extend({ remote: !/#/.test(href) && href }, $target.data(), $this.data())
        if ($this.is('a')) e.preventDefault()
            $target.one('show.bs.modal', function(showEvent) {
            if (showEvent.isDefaultPrevented()) return // only register focus restorer if modal will actually get shown
                $target.one('hidden.bs.modal', function() {
                    $this.is(':visible') && $this.trigger('focus')
                })
        })
        Plugin.call($target, option, this)
    })
}(jQuery);
jQuery(document).ready(function($) {
    $(".utilitymenu .cart").hover(function() {
        $(".hidden_cart").stop().slideToggle();
    });
});
jQuery(document).ready(function($) {
    $(".gallery-centered").css({ opacity: "1" });
    $("#fixed-size img").wrap("<div class='galleryimage'></div>");
});
jQuery(document).ready(function($) {
    $('#fixed-size').lightGallery({
        mode: 'lg-fade',
        addClass: 'fixed-size',
        counter: false,
        download: false,
        startClass: '',
        enableSwipe: true,
        enableDrag: true,
        speed: 500
    });
});
jQuery(document).ready(function($) {
    function heroSlider() {
        function slideAnimation(elem) {
            var animEndEv = 'webkitAnimationEnd animationend';
            elem.each(function() {
                var $this = $(this),
                $animationType = $this.data('animation');
                $this.css('opacity', '1').addClass($animationType).one(animEndEv, function() {
                    $this.removeClass($animationType);
                });
            });
        }
        var $heroSlider = $('.hero-slider'),
        $sliderContent = $('.hero-slider-content'),
        $firstSlideAnimation = $heroSlider.find('article:first').find("[data-animation ^= 'animated']");
        $heroSlider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            var slide = $(slick.$slides.get(currentSlide));
            var $caption = slide.find("[data-animation ^= 'animated']").css('opacity', '0');
        });
        $heroSlider.on('afterChange', function(event, slick, currentSlide, nextSlide) {
            var slide = $(slick.$slides.get(currentSlide));
            var $caption = slide.find("[data-animation ^= 'animated']");
            slideAnimation($caption);
        });
        // $('.hero-slider2').slick({
            $(".hero-slider2").not('.slick-initialized').slick({
                autoplay: true,
                autoplaySpeed: 7000,
                arrows: true,
                dots: false,
                fade: true,
            // prevArrow: $('.prev'),
            // nextArrow: $('.next')
            prevArrow: "<div class='prevArrow'><i class='fal fa-angle-left animated fadeInLeft'></i></div>",
            nextArrow: "<div class='nextArrow'><i class='fal fa-angle-right animated fadeInRight'></i></div>",
        });
            slideAnimation($firstSlideAnimation);
        }
        heroSlider();
    });
jQuery(document).ready(function($) {
    new WOW().init();
});
jQuery(document).ready(function($) {
    //iterate over the collection
    $('.site-header .mobilemenu ul.sub-menu').each(function() {
        var $this = $(this);
        //does the current element have children?
        if ($this.children().length > 0) {
            //yes, add the class "arrow"
            $this.parent().addClass('arrow');
            $this.parent().prepend('<span class="caret center"><i class="fa fa-chevron-right"></i></span>');
        }
    });
});
jQuery(document).ready(function($) {
    $('.site-header .fa-chevron-right').on('click', function() {
        $(this).toggleClass('transform');
    });
    $('.fa-chevron-right').on('click', function() {
        // let a common class(disable-btn) for each button which should be disabled for on second
        $('.fa-chevron-right').prop('disabled', true);
        setTimeout(function() {
            // enable click after 1 second
            $('.fa-chevron-right').prop('disabled', false);
        }, 1000); // 1 second delay
    });
});
jQuery(document).ready(function($) {
    $('.site-header .mobilemenu li > .sub-menu').parent().click(function() {
        var submenu = $(this).children('.sub-menu');
        if ($(submenu).is(':hidden')) {
            $(submenu).stop().slideToggle();
        } else {
            $(submenu).slideUp(500);
        }
    });
});
jQuery(document).ready(function($) {
    var $menu_item = $('.v2_site-header .menu-item-has-children');
    $menu_item.append('<span class="caret"></span>');
    $('.caret').click(function() {
      $(this).parent().toggleClass('menu-open');
  });
});
jQuery(document).ready(function($) {
    $(".single_variation_wrap").on("show_variation", function(event, variation) {
        $(".tm-final-price-total").css({ display: "block" });
        $(".singleproductprice").css({ display: "none" });
    });
});
jQuery(document).ready(function($) {
    // Ajax add to cart on the product page
    var $warp_fragment_refresh = {
        url: wc_cart_fragments_params.wc_ajax_url.toString().replace('%%endpoint%%', 'get_refreshed_fragments'),
        type: 'POST',
        success: function(data) {
            if (data && data.fragments) {
                $.each(data.fragments, function(key, value) {
                    $(key).replaceWith(value);
                });
                $(document.body).trigger('wc_fragments_refreshed');
            }
        }
    };
    $('.entry-summary form.cart').on('submit', function(e) {
        e.preventDefault();
        $('.single_add_to_cart_button').block({
            message: null,
            // message: 'Adding item to cart...',
            overlayCSS: {
                cursor: 'none'
            }
        });
        var product_url = window.location,
        form = $(this);
        $.post(product_url, form.serialize() + '&_wp_http_referer=' + product_url, function(result) {
            var cart_dropdown = $('.widget_shopping_cart', result),
            woocommerce_message = $('.woocommerce-message-overlay', result);
            // update dropdown cart
            $('.widget_shopping_cart').replaceWith(cart_dropdown);
            // Show message
            $('.type-product').eq(0).before(woocommerce_message);
            // update fragments
            $.ajax($warp_fragment_refresh);
            $('.single_add_to_cart_button').unblock();
        });
    });
});
jQuery(document).ready(function($) {
    $(".utilitymenu .shopping_cart").hover(function() {
        $(".cart_dropdown").stop().slideToggle();
    });
});
jQuery(document).ready(function($) {
    if ($(".woocommerce .wrap .product-type-variable .entry-summary").length) {
        jQuery(".short_description").detach().prependTo('.woocommerce-variation-add-to-cart')
        jQuery(".variations").detach().prependTo('.quantity')
        jQuery(".single-product-modal").detach().prependTo('.woocommerce-variation-add-to-cart')
        jQuery(".variations_form .gform_wrapper").detach().appendTo('.variations')
        // let imageStyle = ".webp";
        // jQuery('.n2-ss-slide-background-image').attr('data-desktop').append('.webp');
// jQuery('.n2-ss-slide-background-image').attr('src') = jQuery('div').attr('data-desktop') + '.webp' ;

    // jQuery(".n2-ss-slide-background-image").attr("data-desktop", function(i, origValue){
    //   return origValue + ".webp"; 
    // });

    } else {
      jQuery(".short_description").detach().prependTo('.quantity')
      jQuery(".single-product-modal").detach().prependTo('.quantity')
      jQuery(".variations_form .gform_wrapper").detach().appendTo('.variations')
      jQuery(".gform_variation_wrapper").detach().appendTo('.short_description')
  }
});
jQuery(document).ready(function($) {
    jQuery(".col-3").detach().prependTo('#jckwds-fields')
});
jQuery(document).ready(function($) {
    $('.quantity').on('click', '.minus', function(e) {
        var $inputQty = $(this).parent().find('input.qty');
        var val = parseInt($inputQty.val());
        var step = $inputQty.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        if (val > 0) {
            $inputQty.val(val - step).change();
        }
    });
    $('.quantity').on('click', '.plus', function(e) {
        var $inputQty = $(this).parent().find('input.qty');
        var val = parseInt($inputQty.val());
        var step = $inputQty.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        $inputQty.val(val + step).change();
    });
});
jQuery(document).ready(function($){
    if ($("#dropdown_change").length) {
      $('#dropdown_change').bind('change', function (e) { 
        if( $('#dropdown_change').val() == '1') {
          $('.singleproductprice').show();
          $(".singleproductprice").css({ display: "inline-block" });
          $('#product_total_price').hide();
          $('#tm-final-price-total').hide();
      }
      else if( $('#dropdown_change').val() > '1') {
          $('.singleproductprice').hide();
          $('#product_total_price').hide();
          $('#tm-final-price-total').show();
      }         
  }).trigger('change');
  } else {
      $('.singleproductprice').hide();
  }
});
jQuery(document).ready(function($) {
  $(window).scroll(function(e){
    if ($(this).scrollTop() > 30) { // choose the value you want.
        $('.v2_site-header').addClass( 'white_background' );
    } else {
        $('.v2_site-header').removeClass( 'white_background' );
    }
});
});
// jQuery(document).ready(function($) {
//  // When the window has finished loading create our google map below
//  google.maps.event.addDomListener(window, 'load', init);
//  function init() {
//    // Basic options for a simple Google Map
//    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
//    var mapOptions = {
//      // How zoomed in you want the map to start at (always required)
//      zoom: 11,
//      // The latitude and longitude to center the map (always required)
//      center: new google.maps.LatLng(34.204294, -118.423223), // New York
//      panControl: false,
//      zoomControl: true,
//      mapTypeControl: false,
//      scaleControl: false,
//      streetViewControl: false,
//      overviewMapControl: false,
//      rotateControl: false,
//      fullscreenControl: false,
//      // How you would like to style the map. 
//      // This is where you would paste any style found on Snazzy Maps.
//  };
//    // Get the HTML DOM element that will contain your map 
//    // We are using a div with id="map" seen below in the <body>
//    var mapElement = document.getElementById('map');
//    // Create the Google Map using our element and options defined above
//    var map = new google.maps.Map(mapElement, mapOptions);
//    // Let's also add a marker while we're at it
//    var marker = new google.maps.Marker({
//        position: new google.maps.LatLng(34.204294, -118.423223),
//        map: map,
//        title: 'Pickup Location'
//    });
// }
// });

jQuery(document).ready(function($) {
            setTimeout(function() {

    if ($(window).width() < 1100) {


$(window).resize(function(){



var height = $('.v2_site-header').height();//take the header height
$('.content-area').css({'margin-top':height});//alter the margin of the wrapped content
}).trigger('resize');//trigger the margin resize when page is loaded

}

            }, 600); 


});



jQuery(document).ready(function($) {


    $(".n2-section-smartslider").delay(5000).fadeIn(100);


    



});




