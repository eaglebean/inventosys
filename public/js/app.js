/*
 |--------------------------------------------------------------------------
 | Main application utilities
 |--------------------------------------------------------------------------
 |
 | Only classes and methods that can be used across the app
 |
 | http://addyosmani.com/resources/essentialjsdesignpatterns/book/#revealingmodulepatternjavascript
 */

/**
 * Notifications - splash
 *
 * This class is used to display splash notifications.
 * It is using PNotify and animate.css
 */
var Splash = (function ($) {
    
    /*
     * Popup Notification
     *  type: string 'info', 'success', 'error'  
     *  title: string
     *  message: string
     */
    var show = function (type, title, message) {
        PNotify.prototype.options.styling = "bootstrap3";
        PNotify.prototype.options.styling = "fontawesome";

        new PNotify({
            title: title,
            text: message,
            type: type,
            // icon: 'glyphicon glyphicon-envelope',
            // width: '500px',
            // min_height: '400px',
            animate: {
                animate: true,
                in_class: 'flipInX',
                out_class: 'hinge'
            }
        });
    };

    
    //The public API for this object
    return {
        show: show
    };
}(jQuery));
