<template>
  <div>
    <select v-model="selected_item">
      <slot></slot>
      <option v-for="option in options" v-bind:value="option.value" v-bind:key="option.value">{{ option.text }}</option>
    </select> 
  </div>
</template>

<script>
export default {
  props: ['options'],
  data() {
    return {
      selected_item: ''
    }
  },
}
</script>