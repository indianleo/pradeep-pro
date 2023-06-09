import React from 'react';
import Pagination from '@material-ui/lab/Pagination';
import {Checkbox,Button} from '@material-ui/core';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import './MCQ.css';
export default class App extends React.Component {
    constructor(props) {
        super(props)

        this.state = {
            question: props.question,
            questionNumber: 0
        }

    } // end constructor

    handleQuestionNumber(event, questionNumber) {
        this.setState({
            questionNumber: questionNumber - 1
        })
    }


    render() {
        const { question, questionNumber } = this.state;
        return (
            <div>
                {question.map((data, index) => {
                    return (questionNumber === index ?
                        <div key={index}>
                            <div className="h1">{data.question}</div>
                            {data.answers.map((options, index) => {
                                return (
                                    <FormControlLabel
                                        key={index}
                                        control={
                                            <Checkbox
                                                // checked={state.checkedB}
                                                // onChange={handleChange}
                                                // name="checkedB"
                                                color="primary"
                                            />
                                        }
                                        label={options}
                                    />
                                )
                            })}
                        </div>
                        : null)
                })}
                <Pagination count={question.length} variant="outlined" onChange={this.handleQuestionNumber.bind(this)} shape="rounded" />
            </div>
        );
    }

}
