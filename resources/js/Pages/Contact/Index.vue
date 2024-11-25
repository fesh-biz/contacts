<script setup="">
import PrimaryButton from '@/Components/PrimaryButton.vue'
import ContactTable from '@/Components/Contact/ContactTable.vue'
import Layout from '@/Pages/Contact/Layout.vue'
import {Link} from '@inertiajs/vue3'

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
      <Link :href="route('contacts.create')">
        <PrimaryButton>Add New Contact</PrimaryButton>
      </Link>
    </template>

    <!-- If No Contacts -->
    <div
      v-if="!contacts.length"
      class="text-center"
    >
      <h2>Looks like you don't have any contacts.</h2>
    </div>

    <!-- Contacts Table -->
    <ContactTable v-if="contacts.length" :contacts="contacts" />
  </Layout>
</template>