$(document).ready(function() {
    var currentPage = 1;
    var numPages = $('.page').length;
  
    // hide all pages except for the first one
    $('.page').not(':first').hide();

    // hide all headers except for the first one
    $('.dialog-header h3').not('.page-1').hide();

  
    // show/hide next/prev buttons
    function toggleButtons() {
      $('#prev-page').toggle(currentPage > 1);
      $('#next-page').toggle(currentPage < numPages);
    }
    
    // show next page
    $('#next-page').click(function() {
      $('.page').eq(currentPage - 1).hide();
      $('.page').eq(currentPage).show();
      $('.dialog-header h3.page-' + currentPage).hide();
      currentPage++;
      $('.dialog-header h3.page-' + currentPage).show();
      toggleButtons();
    });
  
    // show previous page
    $('#prev-page').click(function() {
      $('.page').eq(currentPage - 1).hide();
      $('.page').eq(currentPage - 2).show();
      $('.dialog-header h3.page-' + currentPage).hide();
      currentPage--;
      $('.dialog-header h3.page-' + currentPage).show();
      toggleButtons();
    });
  
    // initialize buttons
    toggleButtons();

});