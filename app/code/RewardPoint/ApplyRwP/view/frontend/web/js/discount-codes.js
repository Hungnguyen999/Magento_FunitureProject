/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
    'jquery-ui-modules/widget'
], function ($) {
    'use strict';

    $.widget('mage.rewardCode', { // Change here 
        options: {
        },

        /** @inheritdoc */
        _create: function () {
            this.rewardCode = $(this.options.rewardCodeSelector);  // Change here
            this.removeRewardCoupon = $(this.options.removeRewardCouponSelector); // Change here

            $(this.options.applyButton).on('click', $.proxy(function () {
                this.rewardCode.attr('data-validate', '{required:true}'); // Change here
                this.removeRewardCoupon.attr('value', '0'); // Change here
                $(this.element).validation().submit();
            }, this));

            $(this.options.cancelButton).on('click', $.proxy(function () {
                this.rewardCode.removeAttr('data-validate'); // Change here
                this.removeRewardCoupon.attr('value', '1'); // Change here
                this.element.submit();
            }, this));
        }
    });

    return $.mage.rewardCode;  // Change here
});
