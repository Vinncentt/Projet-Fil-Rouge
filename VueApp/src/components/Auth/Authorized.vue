<template lang="">
  <div></div>
</template>
<script>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import Api from "../../hooks/Api.js";
export default {
  setup() {
    const isAuthed = ref({});
    const router = useRouter();
    const store = useStore();

    let auth = async () => {
      if (localStorage.getItem("User")) {
        let response = await Api.get(`user/me/${localStorage.getItem("User")}`);
        store.state.username = response.name;
      } else {
        router.push("/Auth");
      }
    };
    onMounted(auth());
    return {
      isAuthed,
    };
  },
};
</script>
<style lang=""></style>
