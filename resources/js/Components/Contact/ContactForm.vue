<script setup="">
import {useForm} from '@inertiajs/vue3'
import ContactTextInput from '@/Components/Contact/ContactTextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import {Link} from '@inertiajs/vue3'
import {ref} from 'vue'

const form = useForm({
  name: '',
  email: '',
  phone: ''
})

let formErrors = ref({})
const submitForm = () => {
  form.post(route('contacts.store'), {
    onFinish: () => {
      console.log('onFinish')
    },
    onError: (errors) => {
      formErrors = errors
    },
  })
}
</script>

<template>
  <div class="w-full sm:w-1/2 md:w-1/3 mx-auto p-4">
    <!-- Contact Form -->
    <form @submit.prevent="submitForm">
      <div>
        <!-- Contact Name -->
        <ContactTextInput
          v-model="form.name"
          name="name"
          label="Name"
          :errorMessage="formErrors.name"
        />

        <!-- Contact Email -->
        <ContactTextInput
          v-model="form.email"
          name="email"
          label="Email"
          type="email"
          :errorMessage="formErrors.email"
        />

        <!-- Contact Phone -->
        <ContactTextInput
          v-model="form.phone"
          name="phone"
          label="Phone"
          :errorMessage="formErrors.phone"
        />
      </div>
    </form>

    <!-- Form Controls -->
    <div class="flex justify-end space-x-2 pt-5">
      <!-- Cancel -->
      <Link :href="route('contacts.index')">
        <SecondaryButton>Cancel</SecondaryButton>
      </Link>
      <PrimaryButton
        class="ms-4"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
        @click="submitForm"
      >
        Save
      </PrimaryButton>
    </div>
  </div>
</template>
