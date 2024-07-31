jQuery(function() {
    'use strict';
    document['addEventListener']('touchstart', function() {}, false);
    jQuery(function() {
        jQuery('body')['wrapInner']('<div class="neumenucontainer" />');
        jQuery('<div class="overlapblackbg"></div>')['prependTo']('.neumenu');
        jQuery('#neunavtoggle')['click'](function() {
            jQuery('body')['toggleClass']('neuactive')
        });
        jQuery('.overlapblackbg')['click'](function() {
            jQuery('body')['removeClass']('neuactive')
            jQuery('.neumenu-click')['removeClass']('neu-activearrow');
            jQuery('.neumegamenu')['css']('display', 'none');
            jQuery('.neushoptabing')['css']('display', 'none');
        });
        jQuery('.neumenu-list> li')['has']('.sub-menu')['prepend']('<span class="neumenu-click"><i class="neumenu-arrow"></i></span>');
        jQuery('.neumenu-list > li')['has']('.neushoptabing')['prepend']('<span class="neumenu-click"><i class="neumenu-arrow"></i></span>');
        jQuery('.neumenu-list > li')['has']('.neumegamenu')['prepend']('<span class="neumenu-click"><i class="neumenu-arrow"></i></span>');
        jQuery('.neumenu-click')['on']('click', function() {
            jQuery(this)['toggleClass']('neu-activearrow')['parent']()['siblings']()['children']()['removeClass']('neu-activearrow');
            jQuery('.sub-menu, .neushoptabing, .neumegamenu')['not'](jQuery(this)['siblings']('.sub-menu, .neushoptabing, .neumegamenu'))['slideUp']('slow');
            jQuery(this)['siblings']('.sub-menu')['slideToggle']('slow');
            jQuery(this)['siblings']('.neushoptabing')['slideToggle']('slow');
            jQuery(this)['siblings']('.neumegamenu')['slideToggle']('slow');
            return false
        });
        jQuery('.neutabitem > li')['has']('.neutitemright')['prepend']('<span class="neumenu-click02"><i class="neumenu-arrow"></i></span>');
        jQuery('.neumenu-click02')['on']('click', function() {
            jQuery(this)['siblings']('.neutitemright')['slideToggle']('slow');
            jQuery(this)['toggleClass']('neu-activearrow02')['parent']()['siblings']()['children']()['removeClass']('neu-activearrow02');
            jQuery('.neutitemright')['not'](jQuery(this)['siblings']('.neutitemright'))['slideUp']('slow');
            return false
        });
        jQuery('.neutabitem02 > li')['has']('.neutbrandbottom')['prepend']('<span class="neumenu-click03"><i class="neumenu-arrow"></i></span>');
        jQuery('.neumenu-click03')['on']('click', function() {
            jQuery(this)['siblings']('.neutbrandbottom')['slideToggle']('slow');
            jQuery(this)['toggleClass']('neu-activearrow03')['parent']()['siblings']()['children']()['removeClass']('neu-activearrow03');
            jQuery('.neutbrandbottom')['not'](jQuery(this)['siblings']('.neutbrandbottom'))['slideUp']('slow');
            return false
        });
        jQuery(window)['ready'](function() {
            jQuery('.neushoptabing.neutsdepartmentmenu > .neushopwp > .neutabitem > li')['on']('mouseenter', function() {
                jQuery(this)['addClass']('neushoplink-active')['siblings'](this)['removeClass']('neushoplink-active');
                return false
            });
            jQuery('.neushoptabing.neutsbrandmenu > .neushoptabingwp > .neutabitem02 > li')['on']('mouseenter', function() {
                jQuery(this)['addClass']('neushoplink-active')['siblings'](this)['removeClass']('neushoplink-active');
                return false
            })
        });
        _0x291ax2();
        jQuery(window)['on']('load resize', function() {
            var _0x291ax1 = jQuery(window)['outerWidth']();
            if (_0x291ax1 <= 991) {
                jQuery('.neushopwp')['css']('height', '100%');
                jQuery('.neutitemright')['css']('height', '100%')
            } else {
                _0x291ax2()
            }
        });

        function _0x291ax2() {
            var _0x291ax3 = 1;
            jQuery('.neutabitem > li')['each'](function() {
                var _0x291ax4 = jQuery(this)['find']('.neutitemright')['innerHeight']();
                _0x291ax3 = _0x291ax4 > _0x291ax3 ? _0x291ax4 : _0x291ax3;
                jQuery(this)['find']('.neutitemright')['css']('height', 'auto')
            });
            jQuery('.neushopwp')['css']('height', 'auto')
        }
        jQuery(document)['ready'](function(_0x291ax5) {
            function _0x291ax6() {
                if (_0x291ax5(window)['outerWidth']() >= 991) {
                    _0x291ax5('.neushoptabing, .neutitemright, .neutbrandbottom, .neumegamenu, ul.sub-menu')['css']({
                        "\x64\x69\x73\x70\x6C\x61\x79": ''
                    })
                }
            }
            _0x291ax6();
            _0x291ax5(window)['resize'](_0x291ax6)
        });
        jQuery(window)['on']('resize', function() {
            if (jQuery(window)['outerWidth']() <= 991) {
                jQuery('.neumenu')['css']('height', jQuery(this)['height']() + 'px');
                jQuery('.neumenucontainer')['css']('min-width', jQuery(this)['width']() + 'px')
            } else {
                jQuery('.neumenu')['removeAttr']('style');
                jQuery('.neumenucontainer')['removeAttr']('style');
                jQuery('body')['removeClass']('neuactive');
                jQuery('.neumenu-click')['removeClass']('neu-activearrow');
                jQuery('.neumenu-click02')['removeClass']('neu-activearrow02');
                jQuery('.neumenu-click03')['removeClass']('neu-activearrow03')
            }
        });
        jQuery(window)['trigger']('resize')
    });
    jQuery(window)['on']('load', function() {
        jQuery('.neumobileheader .neusearch')['on']('click', function() {
            jQuery(this)['toggleClass']('neuopensearch')
        });
        jQuery('body, .neuopensearch .neuclosesearch')['on']('click', function() {
            jQuery('.neusearch')['removeClass']('neuopensearch')
        });
        jQuery('.neusearch, .neusearchform form')['on']('click', function(_0x291ax7) {
            _0x291ax7['stopPropagation']()
        })
    })
}())