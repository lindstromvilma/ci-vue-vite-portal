<script setup>
import { ref } from 'vue'
import Alert from '../Components/Alert.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

const showAlert = ref(false)

const toggleShow = () => {
	showAlert.value = !showAlert.value
}
</script>

<template>
  <div class="flex flex-col gap-10 text-black w-full max-w-screen-2xl">
    <PrimaryButton
      class="self-start"
      @click="toggleShow"
    >
      Näytä ilmoitus
    </PrimaryButton>
  </div>
  <Transition name="slide-fade">
    <Alert
      v-if="showAlert"
      :dismiss="toggleShow"
      intent="info"
      title="Ilmoitus"
    >
      <p>Tämä on ilmoituksen sisältö ja sen voi määrittää vaikka dynaamisesti. Ilmoitus voi olla info, success tai danger, riippuen sen tarkoituksesta.</p>
    </Alert>
  </Transition>
</template>