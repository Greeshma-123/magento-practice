define(
    [
        'jquery',
        'uiComponent',
        'knockout',
        'mage/translate'
    ],
    function ($, Component, ko) {
        'use strict';


        return Component.extend({
            defaults: {
                template: 'Egits_Ordercomment/checkout/order-comment-block'
            },
    
        });
    }
);
