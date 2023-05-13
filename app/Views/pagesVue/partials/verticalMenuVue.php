<script type="text/x-template" id="menu-vertical-template">
    <div class="menu-vertical">
        <el-menu
                default-active="2"
                class="el-menu-vertical-demo"
                :collapse="collapse"
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
    const verticalMenu = Vue.createApp({})
    for ([name, comp] of Object.entries(ElementPlusIconsVue)) {
        verticalMenu.component(name, comp);
    }
    verticalMenu.use(ElementPlus);
    verticalMenu.component("menu-vertical", {
        template: "#menu-vertical-template",
        methods: {
            resisePageMobile: function () {
                if (window.innerWidth <= 640) {
                    this.collapse = true
                } else {
                    this.collapse = false
                }
            }
        },
        mounted() {
            window.addEventListener('resize', this.resisePageMobile);
        },
        data(){
            return {
                input:{},
                collapse: false,
                data: <?= json_encode($data) ?>
            }
        } });

</script>