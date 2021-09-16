<link rel="stylesheet" href="<?php echo base_url()?>assets/css/register.css">

<div id="register" class="container-contact100">
	<div class="container">
		<transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification is-success text-center px-5 top-middle" v-if="successMSG" @click="successMSG = false">{{successMSG}}</div>
            </transition>
  <div class="row">
    <div class="col">
    <div class="wrap-contact100">
    	<div class="contact100-form validate-form">
    		<span class="contact100-form-title">
					Sign up
				</span>
        <div slot="body">
        	            <div class="form-group">
     <label for="">Usertype</label><br>
    <div class="btn-group">
        <button class="btn btn-outline-dark fa fa-user" :class="{'active':(newUser.usertype == '1')}" @click.prevent="pickUsertype('1')"> ADMIN</button>
  <button class="btn btn-outline-dark fa fa-users" :class="{'active': (newUser.usertype == '2')}" @click.prevent="pickUsertype('2')"> USER</button>
    </div>
   <div  class="has-text-danger"v-html="formValidate.usertype"></div>
    </div>
        	
            <div class="form-group">
                <div class="wrap-input100 validate-input" >
                    <label>Firstname</label>
                    <input type="text" class="input100" :class="{'is-invalid': formValidate.firstname}" name="firstname" v-model="newUser.firstname">
                    <span class="focus-input100"></span>
                    <div class="has-text-danger" v-html="formValidate.firstname"> </div>
                </div>
            </div>
            <div class="form-group">
            	<div class="wrap-input100 validate-input">
                <label>Lastname</label>
                <input type="text" class="input100 " :class="{'is-invalid': formValidate.lastname}" name="lastname" v-model="newUser.lastname">
                <span class="focus-input100"></span>
                <div class="has-text-danger" v-html="formValidate.lastname"> </div>
            </div>
            </div>
            <div class="form-group">
            	<div class="wrap-input100 validate-input">
                <label>Birthday</label>
                <input type="date" class="input100" :class="{'is-invalid': formValidate.birthday}" name="birthday" v-model="newUser.birthday">
                <span class="focus-input100"></span>
                <div class="has-text-danger" v-html="formValidate.birthday"> </div>
            </div>
            </div>

            <div class="form-group">
            	<div class="wrap-input100 validate-input">
                <label>Email</label>
                <input type="text" class="input100" :class="{'is-invalid': formValidate.email}" name="email" v-model="newUser.email">
                <span class="focus-input100"></span>
                <div class="has-text-danger" v-html="formValidate.email"></div>
            </div>
            </div>
            <div class="form-group">
            	<div class="wrap-input100 validate-input">
                <label>Contact</label>
                <input type="text" class="input100" :class="{'is-invalid': formValidate.contact}" name="contact" v-model="newUser.contact">
                <span class="focus-input100"></span>
                <div class="has-text-danger" v-html="formValidate.contact"> </div>
            </div>
            </div>
            <div class="form-group">
            	<div class="wrap-input100 validate-input">
                <label>Password</label>
                <input type="password" class="input100" :class="{'is-invalid': formValidate.contact}" name="password" v-model="newUser.password">
                <span class="focus-input100"></span>
                <div class="has-text-danger" v-html="formValidate.address"> </div>
            </div>
            </div>
            <div class="form-group" hidden>
            <input type="hidden" name="usertype" >
        	</div>
        </div>
        <div slot="foot">

            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button class="contact100-form-btn" @click="addUser">
                        <span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
                    </button>
                </div>
            </div>

        </div>

    </div>
    </div>
     </div>
     <div class="col">
     	<div class="wrap-contact100">
    	<div class="contact100-form validate-form">
    		<span class="contact100-form-title">
					Already have an account? Sign in here.
				</span>
        <div slot="body">
            <div class="form-group">
            	<div class="wrap-input100 validate-input">
                <label>Email</label>
                <input type="text" class="input100" :class="{'is-invalid': formValidate.email}" name="email" v-model="loginUser.email">
                <span class="focus-input100"></span>
                <div class="has-text-danger" v-html="formValidate.email"></div>
            </div>
            </div>
            <div class="form-group">
            	<div class="wrap-input100 validate-input">
                <label>Password</label>
                <input type="password" class="input100" :class="{'is-invalid': formValidate.password}" name="password" v-model="loginUser.password">
                <span class="focus-input100"></span>
                <div class="has-text-danger" v-html="formValidate.password"> </div>
            </div>
            </div>
            
            <div class="form-group" hidden>
            <input type="hidden" name="usertype" >
        	</div>
        </div>
        <div slot="foot">

            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button class="contact100-form-btn" @click="loginUser">
                        <span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
                    </button>
                </div>
            </div>

        </div>

    </div>
    </div>
   	</div>

    </div>
    </div>
</div>

<script src="<?php echo base_url();?> /assets/js/register.js"></script>