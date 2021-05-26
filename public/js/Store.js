class Store {
  constructor(storeName, endpoint, attributesConfig) {
    this.name = storeName;
    this.endpoint = endpoint;
    this.attributesConfig = attributesConfig || this.defaultAttributesConfig();
  }

  defaultAttributesConfig() {
    return [
      {'id': 'id'},
      {'title': 'title'},
      {'price': 'price'},
      {'description': 'description'},
      {'category': 'category'},
      {'image': 'image'}
    ]
  }
}
