/*(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();

  }); // end of document ready
})(jQuery); // end of jQuery name space*/
'use strict';

var component = function(name) {
    return window.widgets[name];
}



var navlinks = [{ref:'#',desc:'Navbar Link'}];


var Nav = component('Nav');
var IndexBanner  = component('IndexBanner');
ReactDOM.render(
    <div>
        <Nav links={navlinks} />
        <IndexBanner />
    </div>,
    document.getElementById('app')
);