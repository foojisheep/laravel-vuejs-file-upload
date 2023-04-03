<template>
    <div id="main" class="container">
        <UploadFile />
        <Display />
    </div>
</template>
  
  <script>
  import Display from '@/components/Display.vue'
  import UploadFile from '@/components/UploadFile.vue'

export default {
    name: 'app',
    components: {
        Display,
        UploadFile
    },
    mounted() {
        console.log('Example component mounted.')
    }
}
  </script>