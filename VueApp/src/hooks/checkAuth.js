export default {
  addUser(User) {
    localStorage.setItem("User", User.reference);
  },

  async checkAuth() {
    let ref = localStorage.getItem("User");
    return ref;
  },
};
