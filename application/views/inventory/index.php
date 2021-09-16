  <div id="inventory">
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
                   <td> <button class="btn btn-default btn-block" @click="addModal= true">Add Items</button></td>
                    <td> <div v-for="(store, index) in stores" :key="index">
                     <a :href="store.link"><button class="btn btn-default btn-block" >{{ store.title }}</button></a>
                   </div></td>
               </tr>
           </table>
            <table class="table is-bordered is-hoverable">
               <thead class="text-white bg-dark" >
                
                <th class="text-white">item ID</th>
                <th class="text-white">itemName</th>
                <th class="text-white">itemDescription</th>
                <th class="text-white">Quantity</th>
                <th class="text-white">status</th>
             
               
                <th colspan="2" class="text-center text-white">Action</th>
                </thead>
                <tbody class="table-light">
                    <tr v-for="user in users" class="table-default">
                        <td>{{user.id}}</td>
                        <td>{{user.item_name}}</td>
                        <td>{{user.item_description}}</td>
                        <td>{{user.quantity}}</td>
                        <td>{{user.status}}</td> 
       
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
<script src="../assets/js/inventoryAdmin.js"></script>
