<script type="text/x-template" id="menu-partial-default-template">
    <div class="menu-partial-default">
        <el-menu
                default-active="2"
                class="el-menu-vertical-demo"
                :collapse="false"
        >
            <el-sub-menu index="1">
                <template #title>
                    <el-icon><location /></el-icon>
                    <span>Navigator One</span>
                </template>
                <el-menu-item-group>
                    <template #title><span>Group One</span></template>
                    <el-menu-item index="1-1">item one</el-menu-item>
                    <el-menu-item index="1-2">item two</el-menu-item>
                </el-menu-item-group>
                <el-menu-item-group title="Group Two">
                    <el-menu-item index="1-3">item three</el-menu-item>
                </el-menu-item-group>
                <el-sub-menu index="1-4">
                    <template #title><span>item four</span></template>
                    <el-menu-item index="1-4-1">item one</el-menu-item>
                </el-sub-menu>
            </el-sub-menu>
            <el-menu-item index="2">
                <el-icon><Menu /></el-icon>
                <template #title>Navigator Two</template>
            </el-menu-item>
            <el-menu-item index="3" disabled>
                <el-icon><document /></el-icon>
                <template #title>Navigator Three</template>
            </el-menu-item>
            <el-menu-item index="4">
                <el-icon><setting /></el-icon>
                <template #title>Navigator Four</template>
            </el-menu-item>
        </el-menu>

    </div>

</script>

<script>
    const partialMenuTplVue = Vue.createApp({})
    for ([name, comp] of Object.entries(ElementPlusIconsVue)) {
        partialMenuTplVue.component(name, comp);
    }
    partialMenuTplVue.use(ElementPlus);
    partialMenuTplVue.component("menu-partial-default", {
        template: "#menu-partial-default-template",
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