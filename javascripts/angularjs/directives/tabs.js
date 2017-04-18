'use strict'; 

angular.module('app').directive("tabnavs", function() {
        return {
            link: function(scope,element,attrs) {
                element.on("click", function() {
                    var tabnavs = element.attr('rel');
                    element.parent().parent().find('li').removeClass('active');
                    element.parent('li').addClass('active');
                    $('.flat-form .form-action').addClass('hide');
                    $('.flat-form .form-action').removeClass('show');
                    $('.flat-form '+tabnavs).addClass('show');
                    return false;
                });
            }
        };
    })
