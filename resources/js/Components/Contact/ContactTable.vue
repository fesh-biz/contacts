<script setup="">
import {onMounted} from 'vue'
import ContactActions from '@/Components/Contact/ContactActions.vue'

defineProps({
  contacts: {
    type: Array,
    required: true
  }
})
</script>

<template>
  <div class="overflow-x-auto">
    <table class="min-w-full border-collapse border border-gray-300">
      <thead>
      <tr class="bg-gray-100">
        <th class="px-4 py-2 border-b text-left">ID</th>
        <th class="px-4 py-2 border-b text-left w-full">Name</th>
        <th class="px-4 py-2 border-b text-left">Actions</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="contact in contacts" :key="contact.id" class="hover:bg-gray-50">
        <td class="px-4 py-2 border-b">{{ contact.id }}</td>
        <td class="px-4 py-2 border-b">{{ contact.name }}</td>
        <td class="px-4 py-2 border-b">
          <ContactActions :contact="contact" />
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>