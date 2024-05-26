<template>
  <div class="space-y-0.5 !text-xs" v-for="error in errors">
    <Message 
      severity="error" 
      :closable="false"
      :pt="{
        wrapper:{ class: 'flex items-center py-2 px-3 space-x-2'},
        text: { class:'text-sm'},
        icon: { class: 'w-4 h-4 '}
      }">
      {{ error }}
    </Message>
  </div> 
</template>

<script>
import Message from 'primevue/message';

export default {
  components: {
    Message
  },

  props: {
    errors: {
      type: Array
    }
  }
}
</script>