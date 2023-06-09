import React from 'react';
import './MCQ.css';
import { Checkbox } from '@material-ui/core';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import ArrowForwardSharpIcon from '@material-ui/icons/ArrowForwardSharp';
import ArrowBackSharpIcon from '@material-ui/icons/ArrowBackSharp';
var Question = [
    {
        question: 'अंग्रेजी संसद में भारत सरकार अधिनियम कब पारित हुआ?',
        answers: ['1852', '1856', '1858', '1860'],
        correct: 2,
    },
    {
        question: 'Who is Steve Jobs?',
        answers: [
            'CEO of Microsoft',
            'Barber in NY',
            'Movie Star',
            'CEO of Apple',
        ],
        correct: 3,
    },
    {
        question: 'Metallica is a ____ band',
        answers: ['Blues', 'Hard-Rock', 'Jazz', 'Metal'],
        correct: 3,
    },
    {
        question: 'IS is a ____',
        answers: ['Word', 'Band', 'Terror Group', 'Brand'],
        correct: 2,
    },
    {
        question: 'Who was Einstein',
        answers: [
            'A Scientist',
            'A Dentist',
            'A Serial Killer',
            'None of the above',
        ],
        correct: 0,
    },
    {
        question: 'JavaScript can be used in ____ development',
        answers: ['Back-End', 'Front-End', 'ReactJS', 'All of the Above'],
        correct: 3,
    },
    {
        question: 'Hitler was a',
        answers: [
            'Mass Murderer',
            'Dictator',
            'Jew',
            'None of the above',
            'All of the above',
        ],
        correct: 4,
    },
    {
        question: 'Korn is a',
        answers: ['Nu-Metal band', 'Religion', 'Singer'],
        correct: 0,
    },
    {
        question: 'Windows computers are',
        answers: ['Horrible', 'Great', 'Cheap', 'Invented by Bill Gates'],
        correct: 3,
    },
    {
        question: 'The BigBan stands in',
        answers: ['Egypt', 'London', 'Amsterdam', 'NewYork'],
        correct: 1,
    },
];

var counter;

export default class App extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            totalQuestion: 100,//Question.length,
            QuestionNumber:0,
            testOver:false,
            remainingTime:20,
        };
    } // end constructor

    componentWillMount(){
        let remainingTime = localStorage.getItem('testSessionTimer');
        if(remainingTime){
            this.setState({remainingTime : atob(remainingTime)})
            localStorage.removeItem('testSessionTimer')
        }
    }

    componentDidMount(){
        var count = this.state.remainingTime;
        console.log(count)
        counter = setInterval(()=>{
            count = count - 1;
            localStorage.setItem('testSessionTimer',btoa(count));
            if (count === -1) {
                clearInterval(counter);
                this.endTest();
                return;
            }

            var seconds = count % 60;
            var minutes = Math.floor(count / 60);
            var hours = Math.floor(minutes / 60);
            minutes %= 60;
            hours %= 60;

            document.getElementById('timerStart').innerHTML = hours +":"+ minutes +":"+ seconds
        }, 1000); //1000 will  run it every 1 second
    }

    componentWillUnmount(){
        clearInterval(counter);
    }

    endTest(){
        this.setState({testOver:true})
        localStorage.removeItem('startExam');
        localStorage.removeItem('testSessionTimer');
    }


    handleQuestionNumber(QuestionNumber) {
        this.setState({
            QuestionNumber: QuestionNumber
        })
    }

    leftPanel() {
        let btnGroup = [];
        for (let i = 1; i <= this.state.totalQuestion; i++) {
            btnGroup.push(
                <button type="button" className="btn leftBtn" value={i} onClick={(e)=>this.handleQuestionNumber(e.target.value - 1)}>
                    {i}
                </button>
            );
        }

        return btnGroup;
    }

    render() {
        const { QuestionNumber,totalQuestion,testOver } = this.state;

        return (
            <div>
                {(testOver)?
                    <div className="center display-1 bg-warning">Time Over! Better luck for next time.</div>
                :
                <div className="m-0 p-0">
                    <div className="row m-0 p-0">
                        <div className="col-2 leftPanel">
                            {this.leftPanel()}
                        </div>
                        <div className="col-10 bg-white p-0 position-relative">
                            <div className="timer row">
                                <div id="timerStart" className="w-auto float-end text-danger display-5"></div>
                            </div>
                            <div className="questoinArea row">
                                {Question.map((data, index) => {
                                    return QuestionNumber === index ? (
                                        <div key={index}>
                                            <div className="h4">
                                                {data.question}
                                            </div>
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
                                                );
                                            })}
                                        </div>
                                    ) : null;
                                })}
                            </div>
                            <div className="bottomArea">
                                <button type="button" className="btn bottomBtn float-start" onClick={()=>this.handleQuestionNumber(QuestionNumber-1)} disabled={(QuestionNumber === 0)? "true" : null}> <ArrowBackSharpIcon />Previous</button>
                                <button type="button" className="btn bottomBtn float-end" onClick={()=>this.handleQuestionNumber(QuestionNumber+1)} disabled={(QuestionNumber === totalQuestion-1)? "true" : null}>Next <ArrowForwardSharpIcon /></button>
                            </div>
                        </div>
                    </div>
                </div>
                }
            </div>
        );
    }
}
