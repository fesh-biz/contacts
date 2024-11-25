<script setup="">
import {onBeforeMount, onBeforeUnmount, onMounted, ref} from 'vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import {Link, router} from '@inertiajs/vue3'
import {useToast} from 'vue-toastification'

const props = defineProps({
  contact: {
    type: Object,
    required: true
  }
})

// Display actions depending on screen width
const isMobile = ref(false)
onBeforeMount(() => {
  isMobile.value = screen.width <= 760
})

// Mobile Actions
const isOpen = ref(false)
const handleGlobalClick = () => {
  if (isOpen.value) {
    isOpen.value = false
  }
}

onMounted(() => {
  document.addEventListener('click', handleGlobalClick)
})

onBeforeUnmount(() => {
  document.removeEventListener('click', handleGlobalClick)
})

// Delete contact
const toast = useToast()
const deleteContact = () => {
  const confirmed = window.confirm("Are you sure you want to delete this contact?")

  if (!confirmed) return

  router.delete(route('contacts.destroy', {contact: props.contact.id}), {
    onSuccess: () => {
      toast.success('Contact deleted successfully!');
    }
  })
}
</script>

<template>
  <!-- Desktop Actions -->
  <div v-if="!isMobile" class="flex flex-row gap-4">
    <!-- Show -->
    <Link :href="route('contacts.show', {contact: contact.id})">
      <SecondaryButton>View</SecondaryButton>
    </Link>

    <!-- Edit -->
    <Link :href="route('contacts.edit', {contact: contact.id})">
      <SecondaryButton>Edit</SecondaryButton>
    </Link>

    <!-- Delete -->
    <SecondaryButton @click="deleteContact">Delete</SecondaryButton>
  </div>

  <!-- Mobile Actions -->
  <div v-if="isMobile">
    <!-- Button -->
    <button ref="dropdownBtn" class="bg-gray-400 text-white px-3 pb-2 rounded focus:outline-none"
            @click.stop="isOpen = !isOpen"
    >
      ...
    </button>

    <!-- Menu -->
    <Transition
      enter-active-class="transition ease-out duration-200"
      enter-from-class="opacity-0 scale-95"
      enter-to-class="opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-from-class="opacity-100 scale-100"
      leave-to-class="opacity-0 scale-95"
    >
      <div
        class="absolute right-11 -mt-8 w-40 bg-white border border-gray-300 rounded-lg shadow-lg"
        v-if="isOpen"
      >
        <!-- Show -->
        <Link
          :href="route('contacts.show', {contact: contact.id})"
          class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
        >
          View
        </Link>

        <!-- Edit -->
        <Link
          :href="route('contacts.edit', {contact: contact.id})"
          class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
        >
          Edit
        </Link>

        <!-- Delete -->
        <a
          @click="deleteContact"
          href="#"
          class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
        >
          Delete
        </a>
      </div>
    </Transition>
  </div>
</template>