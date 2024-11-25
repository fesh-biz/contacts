<script setup>
import Layout from '@/Pages/Contact/Layout.vue'

defineProps({
  contact: {
    type: Object,
    required: true
  }
})
</script>

<template>
  <Layout :title="`Edit ${contact.name}`">
    Contact Edit Form
  </Layout>
</template>