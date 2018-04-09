<template>
   <div class="col-md-12" v-if="question">
        <h3>Questão #{{questionIndex+1}}</h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                {{question.question}} - {{question.point}}
            </div>
            <div class="panel-body">
                <ul class="list-group">
                     <a href="#" @click.prevent="setChoiceTrue(choice)" v-for="(choice,index) in question.choices">
                        <li class="list-group-item" :class="activeChoice(choice)">
                            <span class="glyphicon glyphicon-ok" v-if="choice['true']"></span>
                           {{index+1}} - {{choice.choice}}
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
    import store from '../../../store/store';

    export default {
        computed:{
            question(){
                return store.state.patient.classTest.question;
            },
            questionIndex(){
                return store.state.patient.classTest.questionIndex;
            },
            choices(){
                return store.state.patient.patientClassTest.patientClassTest.choices;
            },
            patientClassTest(){
                return store.state.student.patientClassTest.patientClassTest;
            }
        },
        methods:{
            setChoiceTrue(choice){
                store.commit('patient/patientClassTest/setChoiceTrue',{choiceId: choice.id,question:this.question});
            },
            activeChoice(choice){
                return {
                    'active': this.choices[this.question.id] == choice.id
                }
            },
        }
    }
</script>

