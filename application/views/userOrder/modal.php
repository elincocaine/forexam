<!--update modal-->

<modal v-if="editModal" @close="clearAll()">
<h3 slot="head" >Edit Item</h3>
<div slot="body" class="row">
    <div class="col">
          <div class="form-group">
    <label>item Name</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.itemName}" name="itemName" v-model="chooseItem.item_name" disabled>
            
             <div class="has-text-danger" v-html="formValidate.itemName"> </div>
            </div>
         <div class="form-group"> 
    <label>item Description</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.itemDescription}" name="itemDescription" v-model="chooseItem.item_description"  disabled>
            
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