<template>
  <div class="h-full grid place-items-center">
    <div class="relative">
      <LoadingScreen ref="load"/>
      <Card :breakpoints="{ '1199px': '75vw', '575px': '90vw' }" style="width:25rem">
        <template #content>
          <div class="grid gap-y-4 ">
            <!-- Header -->
            <div class="pb-4">
              <p class="text-3xl font-black">Login</p>
              <p>ROTC Management System</p>
            </div>
            <!-- Body -->
            <div class="space-y-2">
              <div class="flex flex-col gap-2">
                <label for="username">Username</label>
                <div class="w-full">
                  <InputText 
                    @keyup.enter="handleSubmit"
                    type="text" 
                    id="username" 
                    v-model="inputs.username" 
                    aria-describedby="username-help" 
                    class="w-full"
                    :invalid="!!errors?.username" />
                  <ErrorMessage :errors="errors?.username"/>
                </div>
              </div>
              <div class="flex flex-col gap-2">
                <label for="password">Password</label>
                <div class="w-full">
                <Password 
                  @keyup.enter="handleSubmit"
                  :feedback="false" toggleMask 
                  id="password" 
                  v-model="inputs.password"
                  aria-describedby="username-help" class="w-full"
                  :invalid="!!errors?.password" />
                <ErrorMessage :errors="errors?.password"/>
                </div> 
              </div>
            </div>
            <!-- Footer -->
            <div class="flex justify-center pt-4">
              <Button @click="handleSubmit" class="font-bold">Login</Button>
            </div>
          </div>
        </template>
      </Card>
      <p class="text-center pt-2 italic text-gray-500">Created By Jurie Tylier Pedrogas</p>
    </div>
  </div>
</template>;

<script>
import Card from 'primevue/card'
import InputText from 'primevue/inputtext'
import Password from 'primevue/password'
import Button from 'primevue/button'
import axios from '@/axios/axios.js'
import ErrorMessage from '../components/ErrorMessage.vue';
import LoadingScreen from '../components/LoadingScreen.vue'

export default {

  components: {
    Card,
    InputText,
    Password,
    Button,
    ErrorMessage,
    LoadingScreen
  },

  data() {
    return {
      inputs: {
        username: '',
        password: ''
      },
      errors: {}
    }
  },

  methods: {
    handleSubmit() {
      this.$refs.load.toggle()
      axios.post('login', this.inputs)
      .then((res) => {
        
        this.$cookies.set('ROTCToken', res.data)
      })
      .catch((err) => {
        console.log(err)
        this.errors = err.response.data.errors
      })
      .finally(() => {
        this.$refs.load.toggle()
      })
    }
  }
}
</script>