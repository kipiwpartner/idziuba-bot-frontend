<script type="text/x-template" id="menu-default-template">
    <div>
        <h2>Menu!</h2>
    </div>

</script>

<script>
    const partialMenuTplVue = Vue.createApp({})
    partialMenuTplVue.component("menu-default", {
        template: "#menu-default-template",
        methods: {

        },
        mounted() {

        },
        data(){
            return {
                input:{},
                data: <?= json_encode($data) ?>
            }
        } });

</script>