import React, { Component } from 'react'
import SidePan from './SidePan';
import './SidePan.css';
import ArrowBackSharpIcon from '@material-ui/icons/ArrowBackSharp';
import Header from './../../header/Header';
import MainContent from './MainContent';
import ArrowForwardSharpIcon from '@material-ui/icons/ArrowForwardSharp';
import fire from '../../../config/fire';
// import Chart from 'chart.js';


export default class Dashboard extends Component {
    constructor(props){
        super(props);
        this.state = {
            menuCollapse: false,
            _data: {},
        }
    }
    componentDidMount() {
       this.checkPage();
    }
    
    handleMenu() {
        const element = document.getElementById('wrapper')
        if (!this.state.menuCollapse) {
            element.classList.add('toggled')
        } else {
            element.classList.remove('toggled')
        }
        this.setState({menuCollapse:!this.state.menuCollapse})    
    }

    checkPage () {
        const currentPath = this.props.history.location.pathname;
        switch(currentPath)  {
            case '/driver': {
                fire.database().ref(`drivers/`).get().then((response)=> {
                    let tempData = response.val();
                    if (tempData) {
                        this.setState({_data: tempData})
                    } else {
                        console.log("Data not found");
                    }
                }).catch((err)=> {
                    console.log(err);
                })
            }
            break;
            case '/history': {
                fire.database().ref(`/booking`).get().then((response)=> {
                    let tempData = response.val();
                    if (tempData) {
                        this.setState({_data: tempData})
                    } else {
                        console.log("Data not found");
                    }
                }).catch((err)=> {
                    console.log(err);
                })
            }
            break;
            case '/setting': {
                console.log("Table not created");
            }
            break;
            default: alert("Path not matched");
        }
    }

    render() {
        const { menuCollapse} = this.state;
        return (
            <div id="wrapper">
                <div id="sidebar-wrapper">
                    <SidePan history={this.props.history} onAction={this.onLinkTouch} handleMenu={this.handleMenu.bind(this)} menuCollapse={menuCollapse} />
                </div>
                <div id="page-content-wrapper">
                    <div className="sidebar-brand">
                        <div id="close-sidebar" onClick={this.handleMenu.bind(this)}>
                            {(!menuCollapse)?<ArrowBackSharpIcon fontSize="medium" />:< ArrowForwardSharpIcon fontSize="medium" />}
                        </div>
                    </div>
                    <Header history={this.props.history} />
                    <MainContent history={this.props.history} data={this.state._data}/>
                </div>
            </div>
        )
    }
}
