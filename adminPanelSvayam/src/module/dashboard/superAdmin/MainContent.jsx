import React, { Component } from 'react'
import Card from '@material-ui/core/Card';
// import NewAction from '../../utils/notification/NewAction';
import NewsPanel from './NewsPanel'
import RecentAdded from './RecentAdded'
import BusinessTwoToneIcon from '@material-ui/icons/BusinessTwoTone';
import AccountCircleTwoToneIcon from '@material-ui/icons/AccountCircleTwoTone';
import MoodBadTwoToneIcon from '@material-ui/icons/MoodBadTwoTone';
import LocalAtmTwoToneIcon from '@material-ui/icons/LocalAtmTwoTone';

export default class MainContent extends Component {
    constructor(props) {
        super(props)
        this.state = {
            showAddNewDriver: false,
        }
    }

    showOther(type) {
        const layout = [];
        switch(type) {
            case '/driver': {
                layout.push(
                    <React.Fragment>
                        <div
                            class="btn btn-primary"
                            onClick={()=> this.setState({showAddNewDriver: !this.state.showAddNewDriver})}
                        >
                            <span>Add New</span>
                        </div>
                        {this.state.showAddNewDriver 
                            ? 
                                <div>New</div>
                            : null}
                    </React.Fragment>
                )
            }
            break;
            case '/setting': {
                
            }
            break;
        }
        
        return layout;
    }

    renderTable(type) {
        console.log(this.props.data);
        const layout = [];
        switch(type) {
            case '/driver': {
                for (let index in this.props.data) {
                    let driverData = this.props.data[index];
                    layout.push(
                        <tr key={index}>
                            <td>{driverData.name}</td>
                            <td>{index}</td>
                            <td>{driverData.isOnline == 1 ? "Online" : "Offline" }</td>
                        </tr>
                    )
                }
                return(
                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Contact No</th>
                                <th>Status</th>
                            </tr>
                            {layout}
                        </table>
                    </div>
                )
            }
            case '/history': {
                for (let index in this.props.data) {
                    let booking = this.props.data[index];
                    layout.push(
                        <tr key={index}>
                            <td>{index}</td>
                            <td>{booking.onDate || "--"}</td>
                            <td>{booking.driver || "--"}</td>
                            <td>{booking.rider || "--"}</td>
                            <td>{Math.round(booking.fare)}</td>
                            <td>{booking.status || "--"}</td>
                            <td>{booking.distance || "--"}</td>
                        </tr>
                    )
                }
                return(
                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Driver</th>
                                <th>Rider</th>
                                <th>Fare</th>
                                <th>Status</th>
                                <th>Distance</th>
                            </tr>
                            {layout}
                        </table>
                    </div>
                )
            }
            default : return null;
        }
    }

    render() {
        const currentPath = this.props.history.location.pathname;
        if (currentPath !== "/dashboard") {
            return (
                <React.Fragment>
                    <div style={{padding: "15px"}}>
                        <h4>Data from Server</h4>
                        {this.renderTable(currentPath)}
                        {this.showOther(currentPath)}
                    </div>
                </React.Fragment>
            )
        }
        return (
            <React.Fragment>
                {/* <NewAction /> */}
                <div className="m-5">
                    <div className="row my-5">
                        <div className="col-lg-7 col-md-12 col-12 ">
                            <Card className="shadow h-100">
                                <NewsPanel />
                            </Card>
                        </div>
                        <div className="col-lg-5 col-md-12 col-12 h-100 ">
                            <div className="row mb-3">
                                <div className="col-6">
                                    <Card className="p-2 shadow  bg-dark text-white">
                                        <div className="row">
                                            <div className="col-6">
                                                <div className="display-4">6642</div>
                                                <div className="h5">Profit</div>
                                            </div>
                                            <div className="col-6">
                                                <LocalAtmTwoToneIcon fontSize="large" className="h-100 w-50 text-white" />
                                            </div>
                                        </div>
                                    </Card>
                                </div>
                                <div className="col-6">
                                    <Card className="p-2 shadow bg-danger text-white">
                                        <div className="row">
                                            <div className="col-6">
                                                <div className="display-4">6642</div>
                                                <div className="h5">Pending</div>
                                            </div>
                                            <div className="col-6">
                                                <MoodBadTwoToneIcon fontSize="large" className="h-100 w-50 text-white" />
                                            </div>
                                        </div>
                                    </Card>
                                </div>
                            </div>
                        
                            <div className="row mt-4">
                                <div className="col-6">
                                    <Card className="p-2 shadow bg-info">
                                        <div className="row">
                                            <div className="col-6">
                                                <div className="display-4">42</div>
                                                <div className="h5">Today Booked</div>
                                            </div>
                                            <div className="col-6">
                                                <BusinessTwoToneIcon fontSize="large" className="h-100 w-50 text-dark" />
                                            </div>
                                        </div>
                                    </Card>
                                </div>
                                <div className="col-6">
                                    <Card className="p-2 shadow bg-warning">
                                        <div className="row">
                                            <div className="col-6">
                                                <div className="display-4">6642</div>
                                                <div className="h5">User</div>
                                            </div>
                                            <div className="col-6">
                                                <AccountCircleTwoToneIcon fontSize="large" className="h-100 w-50 text-dark" />
                                            </div>
                                        </div>
                                    </Card>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* ----------------------SECOND ROW----------------------- */}
                    <div className="row">
                        <div className="col-lg-7 col-md-12 col-12">
                            <Card className="shadow">
                                <RecentAdded />
                            </Card>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        )
    }
}
