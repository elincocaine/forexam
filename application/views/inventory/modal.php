<!--add modal-->
<modal v-if="addModal" @close="clearAll()">

<h3 slot="head" >Add Item</h3>
<div slot="body" class="row">
    <div class="col">
          <div class="form-group">
    <label>item Name</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.itemName}" name="itemName" v-model="newItem.itemName">
            
             <div class="has-text-danger" v-html="formValidate.itemName"> </div>
            </div>
         <div class="form-group"> 
    <label>item Description</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.itemDescription}" name="itemDescription" v-model="newItem.itemDescription">
            
             <div class="has-text-danger" v-html="formValidate.itemDescription"> </div>
</div>
 <div class="form-group">
           <label>Quantity</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.quantity}" name="quantity" v-model="newItem.quantity">
                <div class="has-text-danger" v-html="formValidate.quantity"></div>
        </div>
   
    </div>
    
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="addItem">Add</button>
</div>

</modal>



<!--update modal-->

<modal v-if="editModal" @close="clearAll()">
<h3 slot="head" >Edit Item</h3>
<div slot="body" class="row">
    <div class="col">
          <div class="form-group">
    <label>item Name</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.itemName}" name="itemName" v-model="chooseItem.item_name">
            
             <div class="has-text-danger" v-html="formValidate.itemName"> </div>
            </div>
         <div class="form-group"> 
    <label>item Description</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.itemDescription}" name="itemDescription" v-model="chooseItem.item_description">
            
             <div class="has-text-danger" v-html="formValidate.itemDescription"> </div>
</div>
 <div class="form-group">
           <label>Quantity</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.quantity}" name="quantity" v-model="chooseItem.quantity">
                <div class="has-text-danger" v-html="formValidate.quantity"></div>
        </div>
   
    </div>
    
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="updateUser">Update</button>
</div>
</modal>


<!--delete modal-->
<modal v-if="deleteModal" @close="clearAll()">
    <h3 slot="head">Delete</h3>
    <div slot="body" class="text-center">
        <div class="form-group">
            <input type="hidden" class="form-control" name="status" v-model="chooseItem.status">
            </div>

    Do you want to delete this record?</div>
    <div slot="foot">
        <button class="btn btn-dark" @click="deleteModal = false; deleteUser()" >Delete</button>
        <button class="btn" @click="deleteModal = false">Cancel</button>
    </div>
</modal>