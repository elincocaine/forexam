  
  <a href = "/logout" >LOGOUT</a>
  <div id="app">
   <div class="container">
    <div class="row">
        <transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification is-success text-center px-5 top-middle" v-if="successMSG" @click="successMSG = false">{{successMSG}}</div>
            </transition>
        <div class="col-md-12">
           <table class="table bg-dark my-3">
               <tr>
                   <td> <button class="btn btn-default btn-block" @click="addModal= true">Add USER MANUALLY</button></td>
                    <td> <div v-for="(store, index) in stores" :key="index">
                     <a :href="store.link"><button class="btn btn-default btn-block" >{{ store.title }}</button></a>
                   </div></td>
                   <td> <div v-for="(store, index) in stores" :key="index">
                     <a :href="store.link1"><button class="btn btn-default btn-block" >{{ store.title1 }}</button></a>
                   </div></td>
               </tr>
           </table>
            <table class="table is-bordered is-hoverable">
               <thead class="text-white bg-dark" >
                
                <th class="text-white">ID</th>
                <th class="text-white">Firstname</th>
                <th class="text-white">Lastname</th>
                <th class="text-white">Email</th>
                <th class="text-white">Mobile</th>
             
                <th class="text-white">UserType</th>
                <th colspan="2" class="text-center text-white">Action</th>
                </thead>
                <tbody class="table-light">
                    <tr v-for="user in users" class="table-default">
                        <td>{{user.id}}</td>
                        <td>{{user.firstname}}</td>
                        <td>{{user.lastname}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.contact}}</td> 
                        <td>{{user.usertype}}</td>
                        <td><button class="btn btn-info fa fa-edit" @click="editModal = true; selectUser(user)"></button></td>
                        <td><button class="btn btn-danger fa fa-trash" @click="deleteModal = true; selectUser(user)"></button></td>
                    </tr>
                    <tr v-if="emptyResult">
                      <td colspan="9" rowspan="4" class="text-center h1">No Record Found</td>
                  </tr>
                </tbody>
                
            </table>
            
        </div>
  
    </div>
     <pagination
        :current_page="currentPage"
        :row_count_page="rowCountPage"
         @page-update="pageUpdate"
         :total_users="totalUsers"
         :page_range="pageRange"
         >
      </pagination>
</div>
<?php include 'modal.php';?>

</div>

<script src="../assets/js/pagination.js"></script>
<script src="../assets/js/app.js"></script>
