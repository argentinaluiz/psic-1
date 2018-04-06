<template>
    <div>
        <div class="panel panel-default" v-for="question in classTest.questions">
            <div class="panel-heading">
                {{question.question}} - {{question.point}}
            </div>
            <div class="panel-body">
                <ol>
                    <li v-for="choice in question.choices">
                        {{choice.choice}}
                    </li>
                </ol>
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