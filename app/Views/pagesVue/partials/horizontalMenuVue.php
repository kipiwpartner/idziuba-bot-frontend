<script type="text/x-template" id="menu-horizontal-template">
    <div class="px-8 menu-horizontal-template">
        <el-menu
                :default-active="'1'"
                class="el-menu-demo"
                mode="horizontal"
                :ellipsis="false"
                @select="handleSelect"
        >
            <el-menu-item index="0">IvanDziubaBot</el-menu-item>
            <div class="flex-grow" />
            <el-menu-item index="1">Processing Center</el-menu-item>
            <el-sub-menu index="2">
                <template #title>Workspace</template>
                <el-menu-item index="2-1">item one</el-menu-item>
                <el-menu-item index="2-2">item two</el-menu-item>
                <el-menu-item index="2-3">item three</el-menu-item>
                <el-sub-menu index="2-4">
                    <template #title>item four</template>
                    <el-menu-item index="2-4-1">item one</el-menu-item>
                    <el-menu-item index="2-4-2">item two</el-menu-item>
                    <el-menu-item index="2-4-3">item three</el-menu-item>
                </el-sub-menu>
            </el-sub-menu>
        </el-menu>
    </div>
</script>

<script>
    const horizontalMenuTplVue = Vue.createApp({})
    for ([name, comp] of Object.entries(ElementPlusIconsVue)) {
        horizontalMenuTplVue.component(name, comp);
    }
    horizontalMenuTplVue.use(ElementPlus);
    horizontalMenuTplVue.component("menu-horizontal", {
        template: "#menu-horizontal-template",
        // handleSelect = (key: string, keyPath: string[]) => {
        //     console.log(key, keyPath)
        // }
        methods: {
            handleSelect: function (key, keyPath) {
                console.log(key, keyPath)
            }
        },
        mounted() {
        },
        data(){
            return {
                data: <?= json_encode($data) ?>
            }
        } });
</script>

<style scoped>
    .flex-grow {
        flex-grow: 1;
    }
</style>