import axios from 'axios'
import React, { Component } from 'react'

class SingleProject extends Component {
    constructor (props) {
        super(props)
        this.state = {
            project: {},
            quests: [],
            title: '',
            errors: []
        }
        this.handleMarkProjectAsCompleted = this.handleMarkProjectAsCompleted.bind(this)
        this.handleFieldChange = this.handleFieldChange.bind(this)
        this.handleAddNewQuest = this.handleAddNewQuest.bind(this)
        this.hasErrorFor = this.hasErrorFor.bind(this)
        this.renderErrorFor = this.renderErrorFor.bind(this)
    }

    handleMarkProjectAsCompleted () {
        const { history } = this.props

        axios.put(`/api/projects/${this.state.project.id}`)
            .then(response => history.push('/'))
    }

    handleFieldChange (event) {
        this.setState({
            title: event.target.value
        })
    }

    handleAddNewQuest (event) {
        event.preventDefault()

        const quest = {
            title: this.state.title,
            project_id: this.state.project.id
        }

        axios.post('/api/quests', quest)
            .then(response => {
 
                 this.setState({
                    title: ''
                })
                this.setState(prevState => ({
                    quests: prevState.quests.concat(response.data)
                }))
            })
            .catch(error => {
                this.setState({
                    errors: error.response.data.errors
                })
            })
    }

    hasErrorFor (field) {
        return !!this.state.errors[field]
    }

    renderErrorFor (field) {
        if (this.hasErrorFor(field)) {
            return (
                <span className='invalid-feedback'>
            <strong>{this.state.errors[field][0]}</strong>
          </span>
            )
        }
    }

    handleMarkQuestAsCompleted (questId) {
        axios.put(`/api/quests/${questId}`).then(response => {
            this.setState(prevState => ({
                quests: prevState.quests.filter(quest => {
                    return quest.id !== questId
                })
            }))
        })
    }

    componentDidMount () {
        const projectId = this.props.match.params.id

        axios.get(`/api/projects/${projectId}`).then(response => {
            this.setState({
                project: response.data,
                quests: response.data.quests
            })
        })
    }

    render () {
        const { project, quests } = this.state

        return (
            <div className='container py-4'>
                <div className='row justify-content-center'>
                    <div className='col-md-8'>
                        <div className='card'>
                            <div className='card-header'>{project.name}</div>
                            <div className='card-body'>
                                <p>{project.description}</p>

                                <button
                                    className='btn btn-primary btn-sm'
                                    onClick={this.handleMarkProjectAsCompleted}
                                >

                                    Mark as completed
                                </button>

                                <hr />
                                <form onSubmit={this.handleAddNewQuest}>
                                    <div className='input-group'>
                                        <input
                                            type='text'
                                            name='title'
                                            className={`form-control ${this.hasErrorFor('title') ? 'is-invalid' : ''}`}
                                            placeholder='Quest title'
                                            value={this.state.title}
                                            onChange={this.handleFieldChange}
                                        />
                                        <div className='input-group-append'>
                                            <button
                                                className='btn btn-primary'
                                                onClick={this.handleAddNewQuest}
                                        >
                               Add</button>
                                        </div>
                                        {this.renderErrorFor('title')}
                                    </div>
                                </form>
                                <ul className='list-group mt-3'>
                                    {quests.map(quest => (
                                        <li
                                            className='list-group-item d-flex justify-content-between align-items-center'
                                            key={quest.id}
                                        >
                                            {quest.title}

                                            <button
                                                className='btn btn-primary btn-sm'
                                                onClick={this.handleMarkQuestAsCompleted.bind(this,quest.id)}
                                            >
                                                Mark as completed
                                            </button>
                                        </li>
                                    ))}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default SingleProject
