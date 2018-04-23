<template>
    <div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Selecionar psicanalista</label>
                    <select class="form-control" name="psychoanalysts"></select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Selecionar subcategoria</label>
                    <select class="form-control" name="subjects"></select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Selecionar ficha</label>
                    <select class="form-control" name="sheets"></select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Selecionar subficha</label>
                    <select class="form-control" name="sub_sheets"></select>
                </div>
            </div>
        </div>
        <button class="btn btn-sm btn-primary" @click="store()">Adicionar</button>
        <br/><br/>
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Psicanalista</th>
                <th>Subcategoria</th>
                <th>Ficha</th>
                <th>Subficha</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="meeting in meetings">
                <td>
                    <button type="button" class="btn btn-sm btn-link" @click="destroy(meeting)">
                        <span class="glyphicon glyphicon-trash"></span> Excluir
                    </button>
                </td>
                <td>{{meeting.psychoanalyst.user.name}}</td>
                <td>{{meeting.subject.name}}</td>
                <td>{{meeting.sheet.name}}</td>
                <td>{{meeting.sub_sheet.name}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import ADMIN_CONFIG from '../../services/adminConfig';
    import store from '../../store/store';
    import 'select2';

    export default {
        props: ['classInformation'],
        computed: {
            meetings(){
                return store.state.classMeeting.meetings;
            }
        },
        mounted(){
            store.dispatch('classMeeting/query', this.classInformation);
            let selects = [
                {
                    url: `${ADMIN_CONFIG.API_URL}/psychoanalysts`,
                    selector:"select[name=psychoanalysts]",
                    processResults(data){
                        return {
                            results: data.map((psychoanalyst) => {
                                return {id: psychoanalyst.id, text: psychoanalyst.user.name}
                            })
                        }
                    }
                },
                {
                    url: `${ADMIN_CONFIG.API_URL}/subjects`,
                    selector:"select[name=subjects]",
                    processResults(data){
                        return {
                            results: data.map((subject) => {
                                return {id: subject.id, text: subject.name}
                            })
                        }
                    }
                },
                {
                    url: `${ADMIN_CONFIG.API_URL}/sheets`,
                    selector:"select[name=sheets]",
                    processResults(data){
                        return {
                            results: data.map((sheet) => {
                                return {id: sheet.id, text: sheet.name}
                            })
                        }
                    }
                },
                {
                    url: `${ADMIN_CONFIG.API_URL}/sub_sheets`,
                    selector:"select[name=sub_sheets]",
                    processResults(data){
                        return {
                            results: data.map((sub_sheet) => {
                                return {id: sub_sheet.id, text: sub_sheet.name}
                            })
                        }
                    }
                }
            ];
            //funciona apenas no padrão ES6
            for(let item of selects){
                $(item.selector).select2({
                    ajax: {
                        url: item.url,
                        dataType: 'json',
                        delay: 250,
                        data(params){
                            return {
                                q: params.term
                            }
                        },
                        processResults: item.processResults
                    },
                    minimumInputLength: 1,
                });
            }
        },
        methods: {
            destroy(meeting){
                if(confirm('Deseja remover esta patologia?')){
                    store.dispatch('classMeeting/destroy', {
                        meetingId: meeting.id,
                        classInformationId: this.classInformation
                    }).then(response => {
                        new PNotify({
                            title: 'Aviso',
                            text: 'Sessão deletada com sucesso!',
                            styling: 'brighttheme',
                            type: 'success'
                        });
                    })
                }
            },
            store(){
                store.dispatch('classMeeting/store',{
                    psychoanalystId: $("select[name=psychoanalysts]").val(),
                    subjectId: $("select[name=subjects]").val(),
                    sheetId: $("select[name=sheets]").val(),
                    subSheetId: $("select[name=sub_sheets]").val(),
                    classInformationId: this.classInformation
                }).then(response => {
                    new PNotify({
                        title: 'Aviso',
                        text: 'Sessão adicionada com sucesso!',
                        styling: 'brighttheme',
                        type: 'success'
                    });
                })
            }
        }
    }
</script>
