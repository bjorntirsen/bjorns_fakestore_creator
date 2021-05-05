document.addEventListener('DOMContentLoaded', function (e) {
  //Creates obj of class interface
  let my_interface = new Interface();
  //This only happens on the Stores page
  if (document.URL.includes('stores')) {
    my_interface.displayStoresOnStoreList();
    //my_interface.filterButtonEventListener();
    my_interface.eventListenerTakeToEventDetails();
  } else {
    my_interface.displayStoresOnStoreList();
  }
  /* //Only on admin page
  if (document.URL.includes('admin.html')) {
    my_interface.displayEventsOnAdminPage();
    my_interface.cUButtonEventListener();
  }
  //This only happens on the Details page
  if (document.URL.includes('details.html')) {
    let gBBtn = document.getElementById('submitGuestbookBtn');
    gBBtn.addEventListener('click', function (e) {
      //This if statement is to avoid that empty entries are made to the guestbook
      if (document.getElementById('guestBook').value.trim() != '') {
        my_interface.postToGuestbook();
      }
    });
  } */
});
