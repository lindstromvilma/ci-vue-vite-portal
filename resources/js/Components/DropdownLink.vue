<script setup>
import { ref, onMounted } from 'vue'
import SidebarLink from '@/components/SidebarLink.vue'

const props = defineProps({
	text: {
		type: String,
		required: true,
	},
	href: {
		type: String,
		required: false,
		default: '',
	},
	subLinks: {
		type: Array,
		required: false,
		default: () => [],
	},
})

const isOpen = ref(false)
const pathname = window.location.pathname
const isActive = ref(false)

const checkActiveState = () => {
	isActive.value = props.href === pathname || props.subLinks.some(subLink => subLink.href === pathname)
	if (isActive.value) {
		isOpen.value = true
	}
}

onMounted(() => {
	checkActiveState()
})

const toggleDropdown = () => {
	if (!isActive.value) {
		isOpen.value = !isOpen.value
	}
}

const beforeEnter = (el) => {
	el.style.maxHeight = '0px'
}

const enter = (el) => {
	el.style.transition = 'max-height 0.2s ease-in-out'
	el.style.maxHeight = el.scrollHeight + 'px'
}

const leave = (el) => {
	el.style.transition = 'max-height 0.2s ease-in-out'
	el.style.maxHeight = el.scrollHeight + 'px'
	requestAnimationFrame(() => {
		el.style.maxHeight = '0px'
	})
}
</script>

<template>
  <div>
    <a
      :href="href"
      class="cursor-pointer hover:bg-primary-50 w-full py-1 px-4 transition-all ease-in-out duration-200 flex justify-between items-center"
      @click.prevent="toggleDropdown"
    >
      {{ text }}
    </a>
    <transition
      @before-enter="beforeEnter"
      @enter="enter"
      @leave="leave"
    >
      <div
        v-show="isOpen"
        class="flex flex-col bg-primary-100 overflow-hidden"
      >
        <SidebarLink
          v-for="(subLink, index) in subLinks"
          :key="index"
          :text="subLink.text"
          :href="subLink.href"
          :active="subLink.href === pathname"
        />
      </div>
    </transition>
  </div>
</template>
