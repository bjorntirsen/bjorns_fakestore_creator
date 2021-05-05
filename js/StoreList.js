//This class handles all our currently existing stores
class StoreList {
    constructor() {
        this.storeArray = [];
        //Check if there is any data with key "storeList" in local storage. If there is no data it will execute the initializeFiveEvents method
        if (localStorage.getItem("storeList") == null) {
            this.initializeDefaultStores();
        }
    }

    //Creates five "default" events
    initializeDefaultStores() {
        let store1 = new Store("Björn's LEGO Fakestore", "https://legofakestore-api.herokuapp.com/");
        this.storeArray.push(store1);
        let store2 = new Store("Vanilla Fakestore", "https://fakestoreapi.com/products");
        this.storeArray.push(store2);
        console.log(this.storeArray);
        this.updateToLocalStorage();
    }

    //This method translates the store array into JSON and then saves it to Local Storage
    updateToLocalStorage() {
        let dataStringForm = JSON.stringify(this.storeArray);
        localStorage.setItem("storeList", dataStringForm);
    }

    //This method takes the data from local storage and translates it from JSON into an array of store objects and then saves that array to the store array
    updateFromLocalStorage() {
        let dataObjectForm = JSON.parse(localStorage.getItem("storeList"));
        this.storeArray = dataObjectForm;
    }

    //Deletes store by using splice method and then updates local storage
    deleteStore(store) {
        this.storeArray.splice(this.storeArray.indexOf(store), 1);
        this.updateToLocalStorage();
    }
}