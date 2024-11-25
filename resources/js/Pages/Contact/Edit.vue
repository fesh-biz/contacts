<script setup>
import Layout from '@/Pages/Contact/Layout.vue'
import ContactForm from '@/Components/Contact/ContactForm.vue'

defineProps({
  contact: {
    type: Object,
    required: true
  }
})
</script>

<template>
  <Layout :title="`Edit ${contact.name}`">
    <ContactForm :contact="contact" />
  </Layout>
</template>