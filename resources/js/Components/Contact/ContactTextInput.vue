<script setup="">
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'
import {watch} from 'vue'

const props = defineProps({
  label: {
    type: String,
    required: true
  },
  name: {
    type: String,
    required: true
  },
  type: {
    type: String,
    default: 'text'
  },
  errorMessage: {
    type: String,
    required: false
  }
})

const model = defineModel({
  type: String,
  required: true
})

watch(() => props.errorMessage, (errorMessage) => {
  console.log(errorMessage)
})
</script>

<template>
  <InputLabel class="pt-4" :for="name" :value="label" />

  <TextInput
    :id="name"
    v-model="model"
    :type="type"
  />

  <InputError class="mt-2" :message="errorMessage" />
</template>
