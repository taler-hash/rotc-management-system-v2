<template>
  <div v-if="visible" class="absolute top-0 right-0 w-full h-full bg-gray-400/25 z-10">
    <ProgressBar mode="indeterminate" style="height: 6px"></ProgressBar>
  </div>
</template>

<script>
import ProgressBar from 'primevue/progressbar';
import { ref } from 'vue' 
  export default {
    setup(props, context) {
      const visible = ref(false)

      function toggle() {
        visible.value = !visible.value
      }

      context.expose({
        toggle
      })

      return {
        visible
      }
    },
    components: {
      ProgressBar
    },
    props: {
      isLoading: {
        type: Boolean
      }
    }
  }
</script>

