Vue.component('modal',{ //modal
    template:`
      <transition>
    <div class="modal is-active" >
  <div class="modal-card border border border-secondary">
    <div class="modal-card-head text-center bg-dark">
    <div class="modal-card-title text-white">
          <slot name="head"></slot>
    </div>
<button class="delete" @click="$emit('close')"></button>
    </div>
    <div class="modal-card-body">
         <slot name="body"></slot>
    </div>
    <div class="modal-card-foot" >
      <slot name="foot"></slot>
    </div>
  </div>
</div>
</transition>
    `
})
var v = new Vue({
   el:'#register',
    data:{
        url:'/',    
        users:[],
        newUser:{
            firstname:'',
            lastname:'',
            birthday:'',
            email:'',
            contact:'',
            password:'',
            usertype:''},
        chooseUser:{},
        formValidate:[],
        successMSG:'',

    },
     loginUser:{
        email:'',
        password:''
     },

    methods:{         
      formData(obj){
      var formData = new FormData();
          for ( var key in obj ) {
              formData.append(key, obj[key]);
          } 
          return formData;
    },
       
          addUser(){   
            var formData = v.formData(v.newUser);
              axios.post(this.url+"user/addUser", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.message;
                }else{
                    v.successMSG = response.data.message;
                     v.clearnewUser();
                }
               })
        },
          loginUser(){   
            var formData = v.formData(v.loginUser);
              axios.post(this.url+"user/loginUser", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.message;

                }else{
                    v.successMSG = response.data.message;
                     console.log(response.data)
                     //window.location = response.data.redirect;
                }
               })
        },
         pickUsertype(usertype){
           return v.newUser.usertype = usertype 
        },
        clearnewUser(){
            v.newUser = { 
            firstname:'',
            lastname:'',
            birthday:'',
            email:'',
            contact:'',
            address:'',
            usertype:''
            };
            
        }
       
    }
})