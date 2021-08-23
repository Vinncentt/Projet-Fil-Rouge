<template>
  <div class="container center">
    <div class="row">
      <form class="col s12" @submit.prevent>
        <div class="row">
          <h1 class="col s12">CONTACT US</h1>
          <div class="input-field col s6">
            <input
              v-model="contactData.name"
              id="first_name"
              type="text"
              class="validate"
            />
            <label for="first_name">First Name</label>
          </div>
          <div class="input-field col s6">
            <input
              v-model="contactData.last_name"
              id="last_name"
              type="text"
              class="validate"
            />
            <label for="last_name">Last Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input
              v-model="contactData.email"
              id="email"
              type="email"
              class="validate"
            />
            <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input
              v-model="contactData.message"
              id="message"
              type="text"
              class="validate"
            />
            <label for="message">message</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input
              v-model="contactData.subject"
              id="subject"
              type="text"
              class="validate"
            />
            <label for="subject">Additional Details</label>
          </div>
        </div>
        <div class="row">
          <button
            @click="addForm()"
            class="btn waves-effect light-blue accent-4"
            type="submit"
            name="action"
          >
            Send
            <i class="material-icons right">send</i>
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Api from "@/hooks/Api.js";
import { ref } from "vue";

export default {
  components: {},
  setup() {
    const contactData = ref({
      name: "",
      last_name: "",
      email: "",
      message: "",
      subject: "",
    });
    const addForm = async () => {
      console.log(contactData.value);

      let result = await Api.post("contact/add", contactData.value);
      alert(result.message);
    };
    return {
      contactData,
      addForm,
    };
  },
};
</script>
<style lang="css" scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}
</style>
