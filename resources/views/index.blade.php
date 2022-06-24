<!DOCTYPE html>
<html lang="en">
<head>
	<title>Link Shortner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.2/vue.js"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
       
    
</head>
<body>
<div id="app">
 <div class="container"> 
    <div class="row">
        <label class="form-label">Your URL</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="link" size="70" v-model="link" placeholder="Enter Your Url">
        </div>
    </div>
    <p class="text-break">
    </p>
    <div class="row">
        <div class="col-md-1">
              <button type="button" class="btn btn-info" v-on:click="save(link)" :disabled='isLoading'> Save</button>
        </div>    
        <div class="col-md-1">
            <button type="button" class="btn btn-success" v-on:click="reset()" > Reset</button>
      </div> 
    </div>@{{success}}
    <div class="row">
        <div class="col-sm-10">
            <div v-if="success == 0">
                <div class="alert alert-danger">
                    <div class="col-sm-11 alert alert-danger">   @{{ message }}  </div>
                    <table class="table-sm table-hover">
                        <tr><th>Threat Type</th><th>Platform</th><th>Threat Entry Type</th></tr>
                        <tr v-for="danger in api_response.matches">
                            <td>@{{danger["threatType"]}} </td>
                            <td>@{{danger["platformType"]}}</td>
                            <td>@{{danger["threatEntryType"]}}</td>
                        </tr>
                    </table>
                </div>   
            </div>
            <div v-else-if="success == 1">
                <div class="alert-success">
                    <div class="col-sm-11 alert-success">   @{{ message }}  </div>
                    <div class="col-sm-3 alert-success">Short Url</div> <div class="col-sm-8 alert-success">   <a v-bind:href="short_url">@{{short_url}}</a></div>
                    <div class="col-sm-3 alert-success">Alternative Short Url</div> <div class="col-sm-9 alert-success"> <a v-bind:href="alternative_short_url">@{{alternative_short_url}}</a></div>
                    <div class="col-sm-3 alert-success">Original Url</div> <div class="col-sm-8"> <a v-bind:href="full_url">@{{full_url}}</a></div>
                    <div class="col-sm-11 alert-success">  
                        <div v-if="safe">
                            <span class="alert-success">It is a safe url</span>
                        </div>
                        <div v-else>
                            <span class="alert-danger">It is a unsafe url</span>
                            <table class="table-sm table-hover alert-danger">
                                <tr><th>Threat Type</th><th>Platform</th><th>Threat Entry Type</th></tr>
                                <tr v-for="danger in api_response.matches">
                                    <td>@{{danger["threatType"]}} </td>
                                    <td>@{{danger["platformType"]}}</td>
                                    <td>@{{danger["threatEntryType"]}}</td>
                                
                                                  
                                </tr>
                            </table>
                        
                        </div>    
                    </div>    
            
                </div>
            </div>
            <div v-else-if="success == 2">
                <div class="alert-success">
                    <div class="col-sm-11 alert-success">   @{{ message }}  </div>
                    <div class="col-sm-3 alert-success">Short Url</div> <div class="col-sm-8 alert-success"> <a v-bind:href="short_url">@{{short_url}}</a></div>
                    <div class="col-sm-3 alert-success">Alternative Short Url</div> <div class="col-sm-8 alert-success"> <a v-bind:href="alternative_short_url">@{{alternative_short_url}}</a></div>

                    <div class="col-sm-3 alert-success">Original Url</div> <div class="col-sm-8"> <a v-bind:href="full_url">@{{full_url}}</a></div>
                    <div class="col-sm-11 alert-success">
                        <div v-if="safe">
                            <span class="alert-success">It is a safe url</span>
                        </div>
                        <div v-else>
                            <span class="alert-danger">It is a unsafe url</span>
                            <table class="table-sm table-hover alert-danger">
                                <tr><th>Threat Type</th><th>Platform</th><th>Threat Entry Type</th></tr>
                                <tr v-for="danger in api_response.matches">
                                    <td>@{{danger["threatType"]}} </td>
                                    <td>@{{danger["platformType"]}}</td>
                                    <td>@{{danger["threatEntryType"]}}</td>
                                </tr>
                            </table>
                        
                        </div> 
                    </div>
                </div>
            </div>
            <div v-else-if="success == 3">
                <div class="alert-warning">
                    <div class="col-sm-11 alert-warning">   @{{ message }}  </div>
                </div>
            </div>
            <div v-else-if="success == 4">
                <div class="alert-danger">
                    <div class="col-sm-11 alert-danger">   @{{ message }}  </div>
                </div>
            </div>
            <div v-else-if="success == 5">
                <div class="alert-danger">
                    <div class="col-sm-11 alert-danger">   @{{ message }}  </div>
                    <div v-if="safe">
                        <span>It is a safe url</span>
                    </div>
                    <div v-else>
                        <span class="alert-danger">It is a unsafe url</span>
                        <table class="table-sm table-hover alert-danger">
                            <tr><th>Threat Type</th><th>Platform</th><th>Threat Entry Type</th></tr>
                            <tr v-for="danger in api_response.matches">
                                <td>@{{danger["threatType"]}} </td>
                                <td>@{{danger["platformType"]}}</td>
                                <td>@{{danger["threatEntryType"]}}</td>
                            </tr>
                        </table>
                    
                    </div> 
                </div>
            </div>
            <div v-else>
                <div class="col-sm-11">   @{{ message }}  </div>
            </div>    
        </div>   
    </div> 
</div>
</div>


<script src="{{ asset('js/app.js') }}"></script>





</body>
</html>