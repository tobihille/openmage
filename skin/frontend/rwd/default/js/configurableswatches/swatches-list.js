/**
 * OpenMage
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * @category    design
 * @package     rwd_default
 * @copyright   Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

var ConfigurableSwatchesList = {
    swatchesByProduct: {},

    init: function()
    {
        var that = this;
        $j('.configurable-swatch-list li').each(function() {
            that.initSwatch(this);
            var $swatch = $j(this);
            if ($swatch.hasClass('filter-match')) {
                that.handleSwatchSelect($swatch);
            }
        });
    },

    initSwatch: function(swatch)
    {
        var that = this;
        var $swatch = $j(swatch);
        var productId;
        $j($swatch).hover(function() {
            /**
             *
             * - Preview the stock status
             **/
            var swatchUl = $swatch.parent();
            swatchUl.find('.x').each(function(){
                $j(this).show();
                $j(this).closest('li').addClass('not-available');
            });
        });
        if (productId = $swatch.data('product-id')) {
            if (typeof(this.swatchesByProduct[productId]) == 'undefined') {
                this.swatchesByProduct[productId] = [];
            }
            this.swatchesByProduct[productId].push($swatch);

            $swatch.find('a').on('click', function(e) {
                e.preventDefault();
                that.handleSwatchSelect($swatch);
            });
        }
    },

    handleSwatchSelect: function($swatch)
    {
        var productId = $swatch.data('product-id');
        var label;
        if (label = $swatch.data('option-label')) {
            ConfigurableMediaImages.swapListImageByOption(productId, label);
        }

        $j.each(this.swatchesByProduct[productId], function(key, $productSwatch) {
            $productSwatch.removeClass('selected');
        });

        $swatch.addClass('selected');
    }
};

$j(document).on('configurable-media-images-init', function(){
    ConfigurableSwatchesList.init();
});
