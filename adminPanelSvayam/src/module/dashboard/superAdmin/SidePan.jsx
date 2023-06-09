import React, { Component } from 'react';
import './SidePan.css';
import icon from './../../../images/user.jpg';
import utils from './../../utils/utils'
import FiberManualRecordIcon from '@material-ui/icons/FiberManualRecord';
import ExitToAppTwoToneIcon from '@material-ui/icons/ExitToAppTwoTone';
import MonetizationOnTwoToneIcon from '@material-ui/icons/MonetizationOnTwoTone';
import HistoryTwoToneIcon from '@material-ui/icons/HistoryTwoTone';
import AssignmentIndTwoToneIcon from '@material-ui/icons/AssignmentIndTwoTone';
import LocalTaxiIcon from '@material-ui/icons/LocalTaxi';
import DashboardTwoToneIcon from '@material-ui/icons/DashboardTwoTone';
import VerifiedUserTwoToneIcon from '@material-ui/icons/VerifiedUserTwoTone';
import Link from '@material-ui/core/Link';

export default class SidePan extends Component {
    constructor(props) {
        super(props)
    
        this.state = {
            currentPath : props.history.location.pathname,
        }
    
    } // end constructor

    render() {
        const {currentPath} = this.state;
        return (
            <React.Fragment>
                <div id="menu" className="page-wrapper chiller-theme toggled">
                    <nav id="sidebar" className="sidebar-wrapper">
                        <div className="sidebar-content">
                            <div className="sidebar-header row mx-0 px-0 ">
                                <div className="user-pic col-12 m-auto text-center">
                                    <img className="img-responsive" src={icon} alt="User" />
                                </div>
                                <div className="user-info row m-0 p-0">
                                    <span className="user-name col-12">
                                        <strong className="display-6">Pradeep<VerifiedUserTwoToneIcon fontSize="large"  style={{ color: "green" }} className="pb-2"  /></strong>
                                    </span>
                                    <small className="d-block col-12">
                                        <small className="text-secondary">(SUPER ADMIN)</small>
                                        <br/>
                                        <FiberManualRecordIcon fontSize="small" className="text-success blink pb-1" />
                                        <small className="text-success">Online</small>
                                    </small>
                                    
                                </div>
                                <div className="sidebar-menu">
                                    <ul>
                                        <Link color="inherit" href="/dashboard" onClick={null}>
                                            <li className= {(currentPath === "/dashboard")?"header-menu active":"header-menu"}>
                                                <DashboardTwoToneIcon /> Dashboard
                                            </li>
                                        </Link>
                                        <Link color="inherit" href="/driver" onClick={null}>
                                            <li className= {(currentPath === "/driver")?"header-menu active":"header-menu"}>
                                                <span><AssignmentIndTwoToneIcon /> Driver</span>
                                            </li>
                                        </Link>
                                        <Link color="inherit" href="/history" onClick={null}>
                                            <li className= {(currentPath === "/history")?"header-menu active":"header-menu"}>
                                                <span><HistoryTwoToneIcon /> Booking History</span>
                                            </li>
                                        </Link>
                                        <Link color="inherit" href="/setting" onClick={null}>
                                            <li className= {(currentPath === "/setting")?"header-menu active":"header-menu"}>
                                                <span><MonetizationOnTwoToneIcon /> Manage Rates</span>
                                            </li>
                                        </Link>
                                        <Link color="inherit" href="/" onClick={null}>
                                            <li className="header-menu">
                                                <span><ExitToAppTwoToneIcon/> Logout</span>
                                            </li>
                                        </Link>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </React.Fragment>
        )
    }
}