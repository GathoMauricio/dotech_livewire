import React , {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
class ShowTaskModal extends Component{
    constructor(props){
        super(props);
        this.state = {
            modal_id:'show_task_modal',
            react_component_id: 'show_task_modal_render',
            modal_title: "Información de la tarea",
        };
        axios.get(this.props.route,{
            'params':{ id:this.props.task_id }
        }).
        then(result => {
            const data = result.data;
            this.state.priority = data.priority;
            this.state.deadline = data.deadline;
            this.state.context = data.context;
            this.state.visibility = data.visibility;
            this.state.title = data.title;
            this.state.user = data.user;
            this.state.status = data.status;
            this.state.description = data.description;
            ReactDOM.render(<ShowTaskModal />,document.getElementById(this.state.react_component_id));
        }).catch(console.log);
    }

    render() {
        return (
            <div className="modal fade" id={ this.state.modal_id } tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div className="modal-dialog modal-lg" role="document">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title font-weight-bold color-primary-sys" id="exampleModalLabel">
                                { this.state.modal_title}
                            </h5>
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action={ this.state.route } method="POST" id="frm_store_project_ajax">
                            <div className="modal-body">
                                <div className="container">
                                    <div className="row">
                                        <div className="col-md-6">
                                            <label className="color-primary-sys font-weight-bold">
                                                Visibilidad:
                                            </label>
                                            &nbsp; 
                                            <b>{ this.state.visibility }</b>
                                        </div>
                                        <div className="col-md-6">
                                            <label className="color-primary-sys font-weight-bold">
                                                Estatus:
                                            </label>
                                            &nbsp; 
                                            <b>{ this.state.status }</b>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-md-4">
                                            <label className="color-primary-sys font-weight-bold">
                                                Prioridad:
                                            </label>
                                            &nbsp; 
                                            <b>{ this.state.priority }</b>
                                        </div>
                                        <div className="col-md-4">
                                            <label className="color-primary-sys font-weight-bold">
                                                Deadline:
                                            </label>
                                            &nbsp; 
                                            <b>{ this.state.deadline }</b>
                                        </div>
                                        <div className="col-md-4">
                                            <label className="color-primary-sys font-weight-bold">
                                                Contexto:
                                            </label>
                                            &nbsp; 
                                            <b>{ this.state.context }</b>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-md-12">
                                            <label className="color-primary-sys font-weight-bold">
                                                Título:
                                            </label>
                                            &nbsp; 
                                            <b>{ this.state.title }</b>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-md-12    ">
                                            <label className="color-primary-sys font-weight-bold">
                                                Usuario: 
                                            </label>
                                            &nbsp; 
                                            <b>{ this.state.user }</b>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-md-12">
                                            <label className="color-primary-sys font-weight-bold">
                                                Descripción:
                                            </label>
                                            &nbsp; 
                                            <b>{ this.state.description }</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="modal-footer">
                                <button type="button" className="btn btn-primary-sys" data-dismiss="modal">Aceptar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        );
    };
}
export default ShowTaskModal;