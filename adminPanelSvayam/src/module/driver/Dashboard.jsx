import React, { Component } from 'react'
import SidePan from './SidePan';
import './SidePan.css';
import ArrowBackSharpIcon from '@material-ui/icons/ArrowBackSharp';
import Header from './../../header/Header';
import MainContent from './MainContent';
import ArrowForwardSharpIcon from '@material-ui/icons/ArrowForwardSharp';
// import Chart from 'chart.js';


export default class Dashboard extends Component {
    constructor(props){
        super(props);
        this.state = {
            menuCollapse: false,
        }
    }
    componentDidMount(){
        alert("sadas");
    }
    
    handleMenu(){
        const element = document.getElementById('wrapper')
        if (!this.state.menuCollapse) {
            element.classList.add('toggled')
        } else {
            element.classList.remove('toggled')
        }
        this.setState({menuCollapse:!this.state.menuCollapse})    
    }
    
    render() {
        const { menuCollapse} = this.state;
        return (
            <div id="wrapper">
                <div id="sidebar-wrapper">
                    <SidePan history={this.props.history} handleMenu={this.handleMenu.bind(this)} menuCollapse={menuCollapse} />
                </div>
                <div id="page-content-wrapper">
                    <div className="sidebar-brand">
                        <div id="close-sidebar" onClick={this.handleMenu.bind(this)}>
                            {(!menuCollapse)?<ArrowBackSharpIcon fontSize="medium" />:< ArrowForwardSharpIcon fontSize="medium" />}
                        </div>
                    </div>
                    <Header history={this.props.history} />
                    <MainContent />
                </div>
            </div>
        )
    }
}
