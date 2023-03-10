$(document).ready(function() {
    var currentPage = 1;
    var numPages = $('.page').length;
  
    // hide all pages except for the first one
    $('.page').not(':first').hide();
  
    // show/hide next/prev buttons
    function toggleButtons() {
      $('#prev-page').toggle(currentPage > 1);
      $('#next-page').toggle(currentPage < numPages);
    }
  
    // show next page
    $('#next-page').click(function() {
      $('.page').eq(currentPage - 1).hide();
      $('.page').eq(currentPage).show();
      currentPage++;
      toggleButtons();
    });
  
    // show previous page
    $('#prev-page').click(function() {
      $('.page').eq(currentPage - 1).hide();
      $('.page').eq(currentPage - 2).show();
      currentPage--;
      toggleButtons();
    });
  
    // initialize buttons
    toggleButtons();
  });