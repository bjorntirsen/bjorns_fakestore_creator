//This class is mainly for handling what is displayed to the user
class Interface {
  constructor() {
    //We are sending a reference to this object on to the StoreList class
    this.storeList = new StoreList();
    //Temporary array to include the events the user wants to display
    this.displayebleEvents = [];
  }

  //This method puts the data from local storage into the event array. Then it takes the objects in the event array and translates them to HTML divs and then displayes them on the Event page
  displayStoresOnStoreList() {
    this.storeList.updateFromLocalStorage();
    for (let i = 0; i < this.storeList.storeArray.length; i++) {
      this.storeDiv(this.storeList.storeArray[i], i);
    }
  }

  //This method takes an object from the event array and translates it to an HTML div and adds it to the DOM
  storeDiv(event, i) {
    //First we make a refence to the div which will contain all our event divs
    let div = document.getElementById('mainContainer');
    //Create new event div
    let storeDiv = document.createElement('div');
    storeDiv.setAttribute('id', i);
    //Give it a class
    storeDiv.classList.add('storeDiv');
    //Create img element, giving it the adress to the image of the object, then appending that to event div
    /* let img = document.createElement('img');
    img.setAttribute('src', event.img);
    storeDiv.appendChild(img);
    //We create another div that will contain all the text info
    let eventInfoDiv = document.createElement('div');
    eventInfoDiv.classList.add('eventInfoDiv'); */
    //Create and add all p tags to text div
    let nameButton = document.createElement('a');
    nameButton.textContent = event.name;
    nameButton.classList.add('btn');
    nameButton.classList.add('btn-secondary');
    nameButton.classList.add('m-1');
    nameButton.setAttribute('href', `store/?endpoint=${event.endpoint}`);
    storeDiv.appendChild(nameButton);
    //We add the event div to the container
    div.appendChild(storeDiv);
  }

  //Add eventlistener to filter button
  filterButtonEventListener() {
    //We create a refence to main object so we can reach the object inside the eventlistener
    let self = this;
    let filterBtn = document.getElementById('filterBtn');
    filterBtn.addEventListener('click', function (e) {
      //Fist we add all the events from the eventlist to the displayebleEvents array
      self.displayebleEvents = self.eventList.eventArray;
      //Creates references to the two dropdown menus
      let genre = document.getElementById('genre');
      let year = document.getElementById('year');
      //Executes different methods depending on what the user selected in the dropdown menus
      if (genre.value == 'concert') {
        self.filterConcert();
      } else if (genre.value == 'theater') {
        self.filterTheater();
      }
      if (year.value == '2020') {
        self.filter2020();
      } else if (year.value == '2021') {
        self.filter2021();
      }
      //call sorting method here
      self.sortByDate();
      //Always end by calling this method which displays the filtered events
      //Here we should have a sort by date method
      self.displayFilteredEvents();
    });
  }

  //Filter methods to be used on the events
  filterConcert() {
    this.displayebleEvents = this.displayebleEvents.filter(
      (element) => element.genre == 'Concert'
    );
  }
  filterTheater() {
    this.displayebleEvents = this.displayebleEvents.filter(
      (element) => element.genre == 'Arts & Theater'
    );
  }
  filter2020() {
    this.displayebleEvents = this.displayebleEvents.filter(
      (element) => Number(element.date) < 209999
    );
  }
  filter2021() {
    this.displayebleEvents = this.displayebleEvents.filter(
      (element) => Number(element.date) > 209999
    );
  }

  //Method very similar to "displayEventsOnEventList", but uses the filtered event array instead of the full events array
  displayFilteredEvents() {
    document.getElementById('mainContainer').innerHTML = '';
    for (let i = 0; i < this.displayebleEvents.length; i++) {
      this.eventDiv(this.displayebleEvents[i], i);
    }
  }

  //Sorting method by date from olders to newest
  sortByDate() {
    this.displayebleEvents.sort((a, b) => a.date - b.date);
  }

  //Admin methods
  displayEventsOnAdminPage() {
    document.getElementById('mainContainer').innerHTML = '';
    this.eventList.updateFromLocalStorage();
    for (let i = 0; i < this.eventList.eventArray.length; i++) {
      this.eventDiv(this.eventList.eventArray[i], i);
      this.addButtonsToEachEvent(this.eventList.eventArray[i], i);
    }
  }

  //Add update + delete buttons for each event
  addButtonsToEachEvent(event, i) {
    let self = this;
    let eventDiv = document.getElementById(i);
    let updateButton = document.createElement('button');
    updateButton.setAttribute('id', 'updateBtn' + i);
    updateButton.innerHTML = 'Uppdatera';
    updateButton.addEventListener('click', function (e) {
      self.updateEvent(event);
    });
    let deleteButton = document.createElement('button');
    deleteButton.setAttribute('id', 'deleteBtn' + i);
    deleteButton.innerHTML = 'Ta bort';
    deleteButton.addEventListener('click', function (e) {
      self.eventList.deleteEvent(event);
      self.displayEventsOnAdminPage();
    });
    eventDiv.appendChild(updateButton);
    eventDiv.appendChild(deleteButton);
  }

  //This method displays an event object in the input fields
  updateEvent(event) {
    document.getElementById('inputName').value = event.name;
    document.getElementById('inputDate').value = event.date;
    document.getElementById('genreInput').value = event.genre;
    document.getElementById('locationInput').value = event.location;
    document.getElementById('imgInput').value = event.img;
    document.getElementById('timeInput').value = event.time;
    document.getElementById('priceInput').value = event.price;
    document.getElementById('infoInput').value = event.info;
    this.eventList.deleteEvent(event);
    this.displayEventsOnAdminPage();
  }

  //Adds event listener to the create/update button
  cUButtonEventListener() {
    let self = this;
    let cUButton = document.getElementById('cuBtn');
    cUButton.addEventListener('click', function (e) {
      self.createEvent();
      self.displayEventsOnAdminPage();
    });
  }

  //Creates/updates an event based on the values of the input fields
  //Has default values if input fields are empty
  createEvent() {
    let name = document.getElementById('inputName').value;
    if (name == '') name = 'No name set';
    let date = document.getElementById('inputDate').value;
    if (date == '') date = 'No date set';
    let genre = document.getElementById('genreInput').value;
    if (genre == '') genre = 'No genre set';
    let location = document.getElementById('locationInput').value;
    if (location == '') location = 'No location set';
    let img = document.getElementById('imgInput').value;
    if (img == '') img = 'pictures/default.jpg';
    let time = document.getElementById('timeInput').value;
    if (time == '') time = 'No time set';
    let price = document.getElementById('priceInput').value;
    if (price == '') price = 'No price set';
    let info = document.getElementById('infoInput').value;
    if (info == '') info = 'No info set';
    let newEvent = new Event(
      name,
      date,
      genre,
      location,
      img,
      time,
      price,
      info
    );
    this.eventList.eventArray.push(newEvent);
    this.eventList.updateToLocalStorage();
    document.getElementById('eventForm').reset();
  }

  //Method to be used on eventlist-page. When user clicks on any event, user is redirected to page details.html.
  eventListenerTakeToEventDetails() {
    let eventDivs = document.getElementsByClassName('eventDiv');

    for (var i = 0; i < eventDivs.length; i++) {
      eventDivs[i].addEventListener('click', function () {
        location.href = 'details.html';
      });
    }
  }

  postToGuestbook() {
    //Refence to the div which will contain the entryDivs
    let div = document.getElementById('guestbookContainer');
    //Create new entry div
    let entryDiv = document.createElement('div');
    //Give it a class
    entryDiv.classList.add('entryDiv');
    //Add the text to the div
    entryDiv.innerHTML = document.getElementById('guestBook').value;
    //We add the entry div to the container
    div.appendChild(entryDiv);
    //Clear the textarea
    document.getElementById('guestBook').value = '';
  }
}
