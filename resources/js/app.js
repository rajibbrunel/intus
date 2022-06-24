

var app = new Vue({
  el: '#app',
  props: {

    success: Number,
    message: String,
    isLoading: Boolean,
    short_url: String,
    full_url: String,
    safe: Boolean,
    alternative_short_url: String,
    api_response:Object,
  },
  data: {
    urls: [],
    link: "",
    baseUrl: "",

  },

  methods: {
    save(link) {
      var vm = this
      if(!this.link){
        this.message = "url field can not be empty";
        this.success=3;
        return;
      }
      
      var baseUrl = window.location.origin; // getting url of application
      var request_api_url =window.location.origin+"/api/v1/create"
      this.isLoading = true;
      axios.post(request_api_url, { "link": link, "baseUrl": baseUrl })
        .then(function (response) {
          // Success value interpretation
          //0  not safe
          //1 success
          //2 short url exist 
          // 3 not valid url
          // 4 undefined error / System error
          //5 response status issues
          vm.success = response.data.success;
          vm.message = response.data.message;
          vm.short_url = response.data.short_url;
          vm.full_url = response.data.full_url;
          vm.safe = response.data.safe;
          vm.api_response = response.data.api_response;
          vm.alternative_short_url = response.data.alternative_short_url;
          vm.isLoading = false;
          

        }).catch(function (error) {
          vm.message = "Error";
          if (error.response) {
            if(error.response.data.message)
            vm.message = error.response.data.message;
          } else if (error.request) {
            vm.message = error.request;
          } else {
            vm.message = error.message;
          }
          vm.success = 4;
          vm.isLoading = false;

        });

    }, reset() {
      var vm = this;
      vm.link = "";
      vm.message = "";
      vm.success = 10;
      vm.short_url = "";
      vm.full_url = "";
      vm.safe = 1;
      vm.api_response = null;
      vm.alternative_short_url = "";
      vm.isLoading = false;

    }
  }
})
