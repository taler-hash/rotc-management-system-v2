<template>
  <div v-if="!show.congratulation" class="w-full h-full grid place-items-start sm:place-content-center overflow-y-auto">
    <!-- Registration Form -->
    <div class="relative w-full overflow-hidden rounded-lg">
      <!-- Loading Screen -->
      <LoadingScreen ref="load" />
      <!-- Inputs -->
      <Card class="w-full border  bg-white  shadow sm:max-w-[900px]" :breakpoints="{ '1199px': '75vw', '575px': '90vw' }">
        <template #header>
        </template>
        <template #title>Enrollment Form</template>
        <template #subtitle>CCC-ROTCU</template>
        <template #content>
          <div class="py-4 space-y-2 capitalize">
            <div class="md:grid md:grid-cols-6 md:gap-2 md:space-y-0 space-y-4">
              <div class="col-span-2">
                <label for="last_name">Last Name</label>
                <InputText 
                  v-model="register.last_name" 
                  :invalid="!!errors?.last_name" 
                  id="last_name" 
                  placeholder="Dela Cruz" 
                  class="w-full" />
                  <ErrorMessage :errors="errors?.last_name"/>
              </div>
              <div class="col-span-2">
                <label for="first_name">First Name</label>
                <InputText 
                  id="first_name" 
                  v-model="register.first_name" 
                  placeholder="Juan" 
                  class="w-full" 
                  :invalid="!!errors?.first_name"/>
                <ErrorMessage :errors="errors?.first_name"/>
              </div>
              <div class="col-span-1">
                <label for="middle_name">Middle Name</label>
                <InputText 
                  id="middle_name" 
                  v-model="register.middle_name" 
                  placeholder="Gonzaga"
                  class="w-full" />
              </div>
              <div class="col-span-1">
                <label for="suffix">Suffix</label>
                <InputText 
                  id="suffix" 
                  v-model="register.suffix" 
                  placeholder="II"
                  class="w-full" />
              </div>
            </div>
            <div class="grid md:grid-cols-5 grid-cols-1 md:gap-2 md:space-y-0 gap-y-4">
              <div class="col-span-1">
                <label for="age">Age</label>
                <div class="rounded-md p-2 border-gray-300 border bg-gray-100">{{ calculateAge }}</div>
              </div>
              <div class="col-span-2">
                <label for="birthdate">Birthdate</label>
                <Calendar 
                  id="birthdate" 
                  :maxDate="new Date(Date.now())" 
                  v-model="register.birthdate" 
                  placeholder="12/01/1999" 
                  class="w-full" 
                  :invalid="!!errors?.birthdate"
                  />
                  <ErrorMessage :errors="errors?.birthdate"/>
              </div>
              <div class="col-span-2">
                <label for="religion">Religion</label>
                <InputText 
                  id="religion" 
                  v-model="register.religion" 
                  placeholder="Roman Catholic" 
                  class="w-full" 
                  :invalid="!!errors?.religion"/>
                  <ErrorMessage :errors="errors?.religion"/>
              </div>
            </div>
          </div>
        </template>
        <template #footer>
          <div class="flex gap-3 mt-1 justify-center">
            <Button @click="handleRegister()" label="Enroll" />
          </div>
        </template>
      </Card>
      
    </div>

    <!-- Voucher Dialog -->
    <Dialog v-model:visible="show.voucher" modal :style="{ width: '25rem' }">
      <template #container="{ closeCallback }">
        <div class="p-4">
          <!-- Header -->
          <div class="font-bold pb-8">
            Voucher
          </div>
          <!-- Body -->
          <div class="pb-6">
            <FloatLabel>
              <InputText id="username" v-model="voucher.input" class="w-full" />
              <label for="username">Input Voucher Code</label>
            </FloatLabel>
          </div>
          <!-- Footer -->
          <div @click="show.voucher = false" class="flex justify-center">
            <Button class="">Vouch</Button>
          </div>
        </div>

      </template>
    </Dialog>

    <!-- Republic Act Dialog -->
    <Dialog v-model:visible="show.ra" :style="{ width: '20vw' }" :breakpoints="{ '1199px': '75vw', '575px': '90vw' }"
      modal>
      <template #container="{ closeCallback }">
        <div class="p-4 space-y-5">
          <!-- Header -->
          <div class="">
            <p class="font-bold text-lg">Data Privacy Act of 2012</p>
            <p class="font-medium text-sm text-gray-500">Republic Act No. 10173 (DPA)</p>
          </div>
          <!-- Body -->
          <div class="px-8">
            <p>
              The Data Privacy Act of 2012, also known as Republic Act No. 10173 (DPA), is the Philippine's data privacy
              law.
              It aims to protect personal data in both the private and government sectors, and covers the processing of
              sensitive and personal information.
              The DPA also establishes the National Privacy Commission (NPC) to monitor its implementation.
            </p>
          </div>
          <!-- Footer -->
          <div class="grid place-items-center pt-4">
            <Button label="Cancel" @click="closeCallback">I Agree</Button>
          </div>
        </div>

      </template>
    </Dialog>

    <!-- Confirmation Dialog -->
    <Dialog v-model:visible="show.confirmation" modal class="relative overflow-hidden" header="Confirmation" :style="{ width: '25rem' }">
      <div class=" pb-6 px-2">
        <p class="indent-8 leading-7">
          I, 
          <span class="underline underline-offset-4 font-bold uppercase"> 
            {{ `${register?.first_name}, ${register?.last_name} ${register?.middle_name?.[0] ? register?.middle_name?.[0]+'.' : ''}` }} 
          </span> will enroll as an ROTC cadet of CTU-CONSOLACION voluntarily
          and undergo training of rotc and will not transfer any components 
          of the nstp program, despite any reason unless i am medically incapacitated
          to do such activity.
        </p>
      </div>
      <div class="flex justify-end gap-2">
        <Button type="button" label="Cancel" severity="secondary" @click="show.confirmation = false"></Button>
        <Button @click="handleRegister('confirm')" type="button" label="Confirm"></Button>  
      </div>
    </Dialog>
  </div>
  <div v-else class="w-full h-full grid place-content-center p-4">
    <div class="">
      <p class="font-bold text-lg">
        Congrats! you are now an official ROTC-Cadet Goodluck and Enjoy with your experience
      </p>        
      <p class="font-medium italic text-sm text-gray-500">
        This screen will refresh after 10 seconds.
      </p>
      </div>
  </div>
</template>
<script>
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import Calendar from 'primevue/calendar';
import Card from 'primevue/card';
import Button from 'primevue/button';
import ConfirmDialog from 'primevue/confirmdialog';
import Dialog from 'primevue/dialog';
import FloatLabel from 'primevue/floatlabel';
import ROTCLogo from '../assets/rotcLogo.jpg'
import axios from '../axios/axios'
import ErrorMessage from '../components/ErrorMessage.vue';
import LoadingScreen from '../components/LoadingScreen.vue';

export default {
  components: {
    InputText,
    Calendar,
    Card,
    Button,
    ConfirmDialog,
    Dialog,
    FloatLabel, 
    InputNumber,
    ErrorMessage,
    LoadingScreen,
},

  data() {
    return {
      ROTCLogo: ROTCLogo,
      show: {
        voucher: false,
        ra: false,
        confirmation: false,
        congratulation: false
      },
      voucher: {
        input: ''
      },
      register: {},
      errors: {},
    }
  },

  computed: {
    calculateAge() {
      if(this.register?.birthdate) {
        const now = Date.now()
        const dob = new Date(this.register.birthdate)
        const diff = new Date(now - dob.getTime())
        const age = Math.abs(diff.getUTCFullYear() - 1970)
        
        this.register.age =  age

        return age
      }

      return 0
    }
  },

  methods: {
    handleRegister(type) {
      this.$refs.load.toggle()
      this.errors = {}
      this.register.type = type

      axios.post('user/create', this.register)
      .then((res) => {

        if(!this.show.confirmation) {
          this.show.confirmation = true
          return
        } else {
          this.show.congratulation = true

          setTimeout(() => {
            window.location.reload()
          }, 10000)
          return
        }
      })
      .catch((err) => {
        this.errors = err.response.data.errors
      })
      .finally(() => {
        this.$refs.load.toggle()
      })
    }
  }
}

</script>