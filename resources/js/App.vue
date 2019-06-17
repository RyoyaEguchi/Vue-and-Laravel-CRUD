<template>
  <div>
    <Example></Example>
    <form v-on:submit.prevent="submit" action="">
      <input v-model="message.memo" type="text">
      <button type="submit">submit</button>
    </form>
    <div v-for="memo in memos" v-bind:key="memo.id">
      {{ memo.id }} : {{ memo.memo }}
      <SelectBox v-bind:options="ud">
        <option value='' disabled>plese select</option>
      </SelectBox>
      <br>
    </div>
  </div>
</template>

<script>
import Example from './components/ExampleComponent.vue'
import SelectBox from './components/selectBox.vue'

export default {
  components: {
    Example,
    SelectBox
  },
  data() {
    return {
      message: {
        'memo': ''
      },
      memos: '',
      ud: [
        { text: 'なし', value: '0' },
        { text: '前', value: '1' },
        { text: '後', value: '2' }
      ]
    }
  },
  methods: {
    async submit () {
      await axios.post('/create', this.message);
      await axios.get('/read').then(res => {
        this.memos = res.data;
      });
    }
  },
  created: async function () {
    await axios.get('/read').then(res => {
      this.memos = res.data;
    });
  }
}
</script>