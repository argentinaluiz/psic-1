<template>
    <div>
        <div class="panel panel-primary" v-for="question in classTest.questions">
            <div class="panel-heading">
                {{question.question}} - {{question.point}}
            </div>
            <div class="panel-body">
                
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">

    export default {
        computed: {
            classTest(){
                return this.$deepModel('psych.classTest.classTest')
            },

        },
        methods: {
            
        }
    }
</script>