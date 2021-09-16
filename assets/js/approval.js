
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
   el:'#approval',
    data:{
        url:'http://localhost/civuejs/',
        addModal: false,
        editModal:false,
        deleteModal:false,
        users:[],
        search: {text: ''},
        emptyResult:false,
        newItem:{
            itemName:'',
            itemDescription:'',
            quantity:''
          },
      stores: [
              { link: '../civuejs/approval', 
                title: 'Go to Approval' 
              }
              ],
        chooseItem:{},
        formValidate:[],
        successMSG:'',
        
        //pagination
        currentPage: 0,
        rowCountPage:5,
        totalUsers:0,
        pageRange:2
    },
     created(){
      this.showAll(); 
    },
    methods:{
         showAll(){ axios.get(this.url+"order/fetchAllPending").then(function(response){
                 if(response.data.inventory == null){
                     v.noResult()
                    }else{
                        v.getData(response.data.inventory);
                    }
                    console.log(response.data.inventory);
            })
        },
          addItem(){   
            var formData = v.formData(v.newItem);
              axios.post(this.url+"inventory/addItem", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.message;
                }else{
                    v.successMSG = response.data.message;
                    v.clearAll();
                    v.clearMSG();
                }
               })
        },
        updateUser(){
            var formData = v.formData(v.chooseItem); axios.post(this.url+"inventory/updateItem", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.message;
                }else{
                      v.successMSG = response.data.message;
                    v.clearAll();
                    v.clearMSG();
                
                }
            })
        },
         deleteUser(){
             var formData = v.formData(v.chooseItem);
              axios.post(this.url+"order/updateItemStatus", formData).then(function(response){
                if(!response.data.error){
                     v.successMSG = response.data.message;
                    v.clearAll();
                    v.clearMSG();
                }
            })
        },

         formData(obj){
			var formData = new FormData();
		      for ( var key in obj ) {
		          formData.append(key, obj[key]);
		      } 
		      return formData;
		},
        getData(users){
            v.emptyResult = false; // become false if has a record
            v.totalUsers = users.length //get total of user
            v.users = users.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.users.length == 0 && v.currentPage > 0){ 
            v.pageUpdate(v.currentPage - 1)
            v.clearAll();  
            }
        },
            
        selectUser(user){
            v.chooseItem = user; 
        },
        clearMSG(){
            setTimeout(function(){
			 v.successMSG=''
			 },3000); // disappearing message success in 2 sec
        },
        clearAll(){
            v.newItem = { 
            itemName:'',
            itemDescription:'',
            quantity:''
            };
            v.formValidate = false;
            v.addModal= false;
            v.editModal=false;
            v.deleteModal=false;
            v.refresh()
            
        },
        noResult(){
          
               v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
                      v.users = null 
                     v.totalUsers = 0 //remove current page if is empty
            
        },

        pickUsertype(usertype){
           return v.newUser.usertype = usertype 
        },
        changeUsertype(usertype){
             return v.chooseItem.usertype = usertype 
         },    
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        refresh(){
             v.search.text ? v.searchUser() : v.showAll(); //for preventing
            
        }
    }
})