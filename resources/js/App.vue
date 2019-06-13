<template>
  <div>
    <form v-on:submit.prevent="submit" action="">
      <input v-model="message.memo" type="text">
      <button type="submit">submit</button>
    </form>
    <div v-for="memo in memos" v-bind:key="memo.id">
      {{ memo.id }} : {{ memo.memo }}<br>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: {
        'memo': ''
      },
      memos: ''
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