<template>
    <div class="container-fluid">
        <div class="row col-md-12 text-xl-center btn btn-secondary" @click="modal=true" >Upload file</div>
        <div class="container">
            <Table ref="table"></Table>
        </div>
        <div v-if="modal">
            <transition name="modal" mode="out-in">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div  class="modal-container">
                            <Modal @close="emitClose" ></Modal>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
    import Table from '../components/TableComponent';
    import Modal from '../components/modal/ModalComponent';
    export default {
        components: {
            Table,
            Modal
        },
        data() {
            return {
                modal: false
            }
        },
        methods: {
            emitClose() {
                if(this.modal == true) {
                    this.modal = false;
                }
                this.$refs.table.update();
            }

        }
    }
</script>

<style scoped>
    .fade-enter-active {
        transition: all 0.3s ease;
    }
    .fade-leave-active {
        transition: all 0.5s ease-in;
    }
    .fade-enter, .fade-leave-to  {
        transform: scale(0) ;
        opacity: 0;
    }

    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 3s ease;

    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }
    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
        transition: all 3s ease;
        font-family: Helvetica, Arial, sans-serif;

    }

    .modal-enter {
        opacity: 0;
        /*transform: scale(0);*/

    }
    .modal-leave-active {
        opacity: 0;
        /*transform: scale(0);*/
    }
    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

</style>