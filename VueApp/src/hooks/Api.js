export default {
  async get(url) {
    url = `${process.env.VUE_APP_BACKEND_URL}${url}`;
    const response = await fetch(url, {
      method: "GET",
      headers: {
        accept: "application/json",
      },
    });
    return await response.json();
  },

  async post(url, body) {
    url = `${process.env.VUE_APP_BACKEND_URL}${url}`;
    const response = await fetch(url, {
      method: "POST",
      headers: {
        accept: "application/json",
      },
      body: JSON.stringify(body),
    });
    return await response.json();
  },
};
