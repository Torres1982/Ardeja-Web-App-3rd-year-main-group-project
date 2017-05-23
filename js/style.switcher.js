$(document).ready(function() {
 //Hover for Switcher buttons
  $('#switcher .button').hover(function() {
    $(this).addClass('hover');
  }, function() {
    $(this).removeClass('hover');
  });

  //Change the page look and feel
  //Edit the Style Switcher
  var setBodyClass = function(className) {
    $('body').removeClass();
    $('body').addClass(className);
    $('#switcher .button').removeClass('selected');
    $('#switcher-' + className).addClass('selected');

    if (className == 'default') {
      $('#switcher').click(toggleStyleSwitcher);
    }
    else {
      $('#switcher').unbind('click', toggleStyleSwitcher);
    }
  };

  //Two Layouts changed after the buttons have been clicked
  $('#switcher').click(function(event) {
    if ($(event.target).is('.button')) {
      if (event.target.id == 'switcher-default') {
        setBodyClass('default');
      }
      else if (event.target.id == 'switcher-large') {
        setBodyClass('large');
      }
    }
  });
});

