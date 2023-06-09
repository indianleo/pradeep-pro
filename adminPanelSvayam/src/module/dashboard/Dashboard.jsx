import React, { Component } from 'react'
import { connect } from 'react-redux';

import SuperAdminDashboard from './superAdmin/Dashboard';
import store from '../../store';
export class Dashbdoard extends Component {
    constructor(props){
        super(props);
        this.state = {
            userType: "superAdmin",
            error: null,
        }
    }

    componentWillMount() {
        let userType = localStorage.getItem('uType');
        if (userType) {
            this.setState({ userType });
        } else {
            this.setState({error: true})
        }
    }

    componentDidMount(){
        console.log(store.getState())
    }

    render() {
        const {userType} = this.state;
        return(
            <React.Fragment>
            {
                (userType && userType === "superAdmin")
                ?
                    <SuperAdminDashboard history={this.props} /> 
                :
                    this.props.history.push("/NotFound")
            }
            </React.Fragment>
        )
    }
}

const mapStateToProps = (state, props) => {
    const {userData } = state;
    //console.log("state:", userData)
    return {
        userData
    };
};

export default connect(mapStateToProps)(Dashbdoard);