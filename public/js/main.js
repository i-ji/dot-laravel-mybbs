const app = Vue.createApp({
    data: function () {
        return {};
    },
    methods: {
        deletePost: function (e) {
            if (!confirm("Sure to delete?")) {
                return;
            }
            console.log(e.target);
            e.target.submit();
        },
    },
});
app.mount("#delete_post");
