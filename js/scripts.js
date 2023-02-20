(function() { 
  
  const eventDatesList = document.querySelector('.event-dates-list');

  if (eventDatesList.children.length > 4) {
    eventDatesList.classList.add('small');
  }
  
})();