import React from 'react';
import Button from '@material-ui/core/Button';

import MCQ from './module/MCQ/MCQ';
var Question = [
  {
    question: "What is 8 x 1?",
    answers: [
      "1",
      "8",
      "16",
      "9"
    ],
    correct: 1
  },
  {
    question: "Who is Steve Jobs?",
    answers: [
      "CEO of Microsoft",
      "Barber in NY",
      "Movie Star",
      "CEO of Apple"
    ],
    correct: 3
  },
  {
    question: "Metallica is a ____ band",
    answers: [
      "Blues",
      "Hard-Rock",
      "Jazz",
      "Metal"
    ],
    correct: 3
  },
  {
    question: "IS is a ____",
    answers: [
      "Word",
      "Band",
      "Terror Group",
      "Brand"
    ],
    correct: 2
  },
  {
    question: "Who was Einstein",
    answers: [
      "A Scientist",
      "A Dentist",
      "A Serial Killer",
      "None of the above"
    ],
    correct: 0
  },
  {
    question: "JavaScript can be used in ____ development",
    answers: [
      "Back-End",
      "Front-End",
      "ReactJS",
      "All of the Above"
    ],
    correct: 3
  },
  {
    question: "Hitler was a",
    answers: [
      "Mass Murderer",
      "Dictator",
      "Jew",
      "None of the above",
      "All of the above"
    ],
    correct: 4
  },
  {
    question: "Korn is a",
    answers: [
      "Nu-Metal band",
      "Religion",
      "Singer"
    ],
    correct: 0
  },
  {
    question: "Windows computers are",
    answers: [
      "Horrible",
      "Great",
      "Cheap",
      "Invented by Bill Gates"
    ],
    correct: 3
  },
  {
    question: "The BigBan stands in",
    answers: [
      "Egypt",
      "London",
      "Amsterdam",
      "NewYork"
    ],
    correct: 1
  },
];

export default class App extends React.Component {
  constructor(props) {
    super(props)

    this.state = {
      sessionStart: false
    }

  } // end constructor

  handleStart() {
    this.setState({
      sessionStart: true
    })
  }

  render() {
    const { sessionStart } = this.state;
    return (
      <div>
        {!sessionStart ?
          <Button variant="contained" color="primary" onClick={this.handleStart.bind(this)}>Start</Button>
          : <MCQ question={Question} />
        }
      </div>
    );
  }

}
