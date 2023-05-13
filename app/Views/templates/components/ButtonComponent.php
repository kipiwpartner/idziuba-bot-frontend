<script type="text/x-template" id="button-component-template">
    <div class="cb-btn">
        <el-button
            :type="type"
            v-bind="vbind"
            @click="(e) => handleClick(e)"
        >
            {{title}}
        </el-button>
    </div>
</script>