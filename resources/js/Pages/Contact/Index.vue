<script setup="">
import PrimaryButton from '@/Components/PrimaryButton.vue'
import ContactTable from '@/Components/Contact/ContactTable.vue'
import Layout from '@/Pages/Contact/Layout.vue'

defineProps({
  contacts: {
    type: Array,
    default: []
  }
})
</script>

<template>
  <Layout title="Contacts">
    <template #headerButton>
      <PrimaryButton>Add New Contact</PrimaryButton>
    </template>

    <ContactTable :contacts="contacts" />
  </Layout>
</template>