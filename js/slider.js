// JavaScript Document
$(document).ready(function() {
    var SliderModule = function () {
        var pb = {};
        pb.el = $('#slider');
        pb.items = {
            panel: pb.el.find('li')
        }
        var SliderInternal,
                currentSlider = 0,
                nextSlider = 1,
                legthSlider = pb.items.panel.length;

        pb.init = function (settings) {
            SliderInit();
        }
        var SliderInit = function () {
            SliderInternal = setInterval(pb.startSlider, 5000);
        }
        pb.startSlider = function () {
            var panels = pb.items.panel;

            if (nextSlider >= legthSlider) {
                nextSlider = 0;
                currentSlider = legthSlider - 1;
            }

            panels.eq(currentSlider).fadeOut('slow');
            panels.eq(nextSlider).fadeIn('slow');

            currentSlider = nextSlider;
            nextSlider += 1;


        }
        return pb;
    }();
    SliderModule.init();
});